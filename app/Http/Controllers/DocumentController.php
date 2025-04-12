<?php

namespace App\Http\Controllers;

use App\Models\NewResidence;
use App\Models\Document;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class DocumentController extends Controller
{
    public function index(Request $request)
    {
        $residences = NewResidence::select('id', 'first_name', 'last_name')
            ->orderBy('first_name', 'asc')
            ->get();
        
        $documents = Document::select('documents.id', 'documents.type', 'documents.purpose', 'documents.status', 'documents.date_requested', 'new_residence.first_name', 'new_residence.last_name')
            ->join('new_residence', 'documents.resident_id', '=', 'new_residence.id')
            ->orderBy('documents.date_requested', 'desc')
            ->take(10)
            ->get();
        
        Log::info('Initial residents and documents prepared', [
            'residences_count' => $residences->count(),
            'documents_count' => $documents->count()
        ]);
        
        // Check if it's an AJAX request
        if ($request->ajax() || $request->wantsJson()) {
            return response()->json([
                'residences' => $residences->map(function ($resident) {
                    return [
                        'id' => $resident->id,
                        'name' => $resident->first_name . ' ' . $resident->last_name,
                    ];
                }),
                'documents' => $documents->map(function ($doc) {
                    return [
                        'id' => $doc->id,
                        'type' => $doc->type,
                        'purpose' => $doc->purpose,
                        'status' => $doc->status,
                        'date_requested' => $doc->date_requested,
                        'first_name' => $doc->first_name,
                        'last_name' => $doc->last_name,
                    ];
                }),
            ]);
        }
        
        // Return view with data for initial page load
        return view('Reslist.documents', compact('residences', 'documents'));
    }

    /**
     * Search residents based on a query string.
     */
    public function searchResidents(Request $request)
    {
        $query = $request->input('query');
        
        $residents = NewResidence::select('id', 'first_name', 'last_name')
            ->where('first_name', 'like', "%{$query}%")
            ->orWhere('last_name', 'like', "%{$query}%")
            ->orderBy('first_name', 'asc')
            ->get();
        
        return response()->json(
            $residents->map(function ($resident) {
                return [
                    'id' => $resident->id,
                    'name' => $resident->first_name . ' ' . $resident->last_name,
                ];
            })
        );
    }

    /**
     * Request a barangay certificate.
     */
    public function requestCertificate(Request $request)
    {
        $request->validate([
            'purpose' => 'required|string|max:255',
            'resident_id' => 'required|exists:new_residence,id',
        ]);
        
        $document = Document::create([
            'type' => 'certificate',
            'resident_id' => $request->resident_id,
            'purpose' => $request->purpose,
            'status' => 'pending',
            'date_requested' => now(),
        ]);
        
        return response()->json(['message' => 'Certificate requested successfully', 'document_id' => $document->id]);
    }

    /**
     * Request a barangay clearance.
     */
    public function requestClearance(Request $request)
    {
        $request->validate([
            'purpose' => 'required|string|max:255',
            'resident_id' => 'required|exists:new_residence,id',
        ]);
        
        $document = Document::create([
            'type' => 'clearance',
            'resident_id' => $request->resident_id,
            'purpose' => $request->purpose,
            'status' => 'pending',
            'date_requested' => now(),
        ]);
        
        return response()->json(['message' => 'Clearance requested successfully', 'document_id' => $document->id]);
    }
}
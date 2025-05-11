<?php

namespace App\Http\Controllers;

use App\Models\NewResidence;
use App\Models\Document;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Carbon\Carbon;
use Barryvdh\Snappy\Facades\SnappyPdf as PDF;

class DocumentController extends Controller
{
    public function index(Request $request)
    {
        try {
            Log::info('DocumentController::index called', [
                'is_ajax' => $request->ajax(),
                'wants_json' => $request->wantsJson(),
            ]);

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
                'documents_count' => $documents->count(),
                'documents' => $documents->toArray(),
            ]);
            
            if ($request->ajax() || $request->wantsJson()) {
                return response()->json([
                    'residences' => $residences->map(function ($resident) {
                        return [
                            'id' => $resident->id,
                            'name' => $resident->first_name . ' ' . $resident->last_name,
                        ];
                    }),
                    'documents' => $documents->map(function ($doc) {
                        $dateRequested = $doc->date_requested;
                        if (is_string($dateRequested)) {
                            try {
                                $dateRequested = Carbon::parse($dateRequested)->format('M d, Y');
                                Log::warning('String date detected in date_requested', [
                                    'document_id' => $doc->id,
                                    'date_requested' => $doc->date_requested,
                                ]);
                            } catch (\Exception $e) {
                                Log::error('Invalid date format in date_requested', [
                                    'document_id' => $doc->id,
                                    'date_requested' => $doc->date_requested,
                                    'error' => $e->getMessage(),
                                ]);
                                $dateRequested = 'Invalid date';
                            }
                        } else {
                            $dateRequested = $doc->date_requested->format('M d, Y');
                        }

                        return [
                            'id' => $doc->id,
                            'type' => $doc->type,
                            'purpose' => $doc->purpose,
                            'status' => $doc->status,
                            'date_requested' => $dateRequested,
                            'first_name' => $doc->first_name,
                            'last_name' => $doc->last_name,
                        ];
                    }),
                ], 200);
            }
            
            return view('Reslist.Reslist', compact('residences', 'documents'));
        } catch (\Exception $e) {
            Log::error('Error in DocumentController::index', [
                'message' => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
                'request' => $request->all(),
            ]);
            
            if ($request->ajax() || $request->wantsJson()) {
                return response()->json([
                    'error' => 'Failed to fetch documents',
                    'message' => $e->getMessage(),
                ], 500);
            }
            
            return view('Reslist.Reslist', [
                'residences' => collect([]),
                'documents' => collect([])
            ])->with('error', 'Failed to load documents. Please try again later.');
        }
    }

    public function searchResidents(Request $request)
    {
        try {
            $query = $request->input('query');
            
            $residents = NewResidence::select('id', 'first_name', 'last_name')
                ->where('first_name', 'like', "%{$query}%")
                ->orWhere('last_name', 'like', "%{$query}%")
                ->orderBy('first_name', 'asc')
                ->get();
            
            Log::info('Residents searched', [
                'query' => $query,
                'residents_count' => $residents->count(),
            ]);
            
            return response()->json(
                $residents->map(function ($resident) {
                    return [
                        'id' => $resident->id,
                        'name' => $resident->first_name . ' ' . $resident->last_name,
                    ];
                })
            );
        } catch (\Exception $e) {
            Log::error('Error in DocumentController::searchResidents', [
                'message' => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
            ]);
            return response()->json(['error' => 'Failed to search residents'], 500);
        }
    }

    public function requestCertificate(Request $request)
    {
        try {
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
            
            Log::info('Certificate requested', ['document_id' => $document->id]);
            
            return response()->json(['message' => 'Certificate requested successfully', 'document_id' => $document->id]);
        } catch (\Exception $e) {
            Log::error('Error in DocumentController::requestCertificate', [
                'message' => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
            ]);
            return response()->json(['error' => 'Failed to request certificate'], 500);
        }
    }

    public function requestClearance(Request $request)
    {
        try {
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
            
            Log::info('Clearance requested', ['document_id' => $document->id]);
            
            return response()->json(['message' => 'Clearance requested successfully', 'document_id' => $document->id]);
        } catch (\Exception $e) {
            Log::error('Error in DocumentController::requestClearance', [
                'message' => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
            ]);
            return response()->json(['error' => 'Failed to request clearance'], 500);
        }
    }

    public function view($id)
    {
        try {
            $document = Document::select('documents.id', 'documents.type', 'documents.purpose', 'documents.status', 'documents.date_requested', 'new_residence.first_name', 'new_residence.last_name')
                ->join('new_residence', 'documents.resident_id', '=', 'new_residence.id')
                ->where('documents.id', $id)
                ->first();

            if (!$document) {
                Log::warning('Document not found for viewing', ['document_id' => $id]);
                return redirect()->route('documents.index')->with('error', 'Document not found.');
            }

            Log::info('Document viewed', ['document_id' => $id]);
            return view('Reslist.view', compact('document'));
        } catch (\Exception $e) {
            Log::error('Error in DocumentController::view', [
                'message' => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
            ]);
            return redirect()->route('documents.index')->with('error', 'Failed to load document. Please try again later.');
        }
    }

    public function download($id)
    {
        try {
            $document = Document::select('documents.id', 'documents.type', 'documents.purpose', 'documents.status', 'documents.date_requested', 'new_residence.first_name', 'new_residence.last_name')
                ->join('new_residence', 'documents.resident_id', '=', 'new_residence.id')
                ->where('documents.id', $id)
                ->first();

            if (!$document) {
                Log::warning('Document not found for download', ['document_id' => $id]);
                return redirect()->route('documents.index')->with('error', 'Document not found.');
            }

            $data = [
                'document' => $document,
                'currentDate' => now()->format('F j, Y'),
            ];

            // Load the PDF view from Reslist folder
            $pdf = PDF::loadView('Reslist.pdf', $data);
            $pdf->setPaper('a4', 'portrait');

            // Download the PDF
            $fileName = strtolower($document->type) . '_document_' . $document->id . '_' . date('Y-m-d') . '.pdf';
            return $pdf->download($fileName);
        } catch (\Exception $e) {
            Log::error('Error in DocumentController::download', [
                'message' => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
            ]);
            return redirect()->route('documents.index')->with('error', 'Failed to download document. Please try again later.');
        }
    }

    public function delete($id)
    {
        try {
            $document = Document::find($id);
            
            if (!$document) {
                Log::warning('Document not found for deletion', ['document_id' => $id]);
                return response()->json(['message' => 'Document not found'], 404);
            }
            
            $document->delete();
            
            Log::info('Document deleted', ['document_id' => $id]);
            
            return response()->json(['message' => 'Document deleted successfully']);
        } catch (\Exception $e) {
            Log::error('Error in DocumentController::delete', [
                'message' => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
            ]);
            return response()->json(['error' => 'Failed to delete document'], 500);
        }
    }
}
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\NewResidence;
use App\Models\FamMember;
use Barryvdh\Snappy\Facades\SnappyPdf as PDF;
use Illuminate\Support\Facades\Log;

class ReportController extends Controller
{
    public function index(Request $request)
    {
        $activeReportType = 'residents_information';
        // Fetch residents with family members
        $residents = NewResidence::with('familyMembers')
            ->orderBy('last_name')
            ->orderBy('first_name')
            ->paginate(15);

        // Format family members into a string for each resident
        $residents->getCollection()->transform(function ($resident) {
            $familyMembers = $resident->familyMembers
                ->filter(function ($member) {
                    // Skip members with no first_name or last_name
                    return !empty(trim($member->first_name)) || !empty(trim($member->last_name));
                })
                ->map(function ($member) {
                    // Concatenate first_name and last_name, handling null/empty cases
                    $fullName = trim(($member->first_name ?? '') . ' ' . ($member->last_name ?? ''));
                    $fullName = $fullName ?: 'Unknown';
                    return "{$fullName} ({$member->relationship})";
                })->implode(', ');
            $resident->family_members_string = $familyMembers ?: 'None';

            // Log residents with invalid family member data for debugging
            if ($resident->familyMembers->count() > 0 && empty($familyMembers)) {
                Log::warning("Resident ID {$resident->id} has family members with missing names.", [
                    'family_members' => $resident->familyMembers->toArray(),
                ]);
            }

            return $resident;
        });

        $data = [
            'activeReportType' => $activeReportType,
            'residents' => $residents,
        ];

        return view('Reports.Reports', $data);
    }

    public function downloadResidentsInformationPdf()
    {
        // Fetch residents with family members
        $residents = NewResidence::with('familyMembers')
            ->orderBy('last_name')
            ->orderBy('first_name')
            ->get();

        // Format family members into a string for each resident
        $residents->transform(function ($resident) {
            $familyMembers = $resident->familyMembers
                ->filter(function ($member) {
                    // Skip members with no first_name or last_name
                    return !empty(trim($member->first_name)) || !empty(trim($member->last_name));
                })
                ->map(function ($member) {
                    // Concatenate first_name and last_name, handling null/empty cases
                    $fullName = trim(($member->first_name ?? '') . ' ' . ($member->last_name ?? ''));
                    $fullName = $fullName ?: 'Unknown';
                    return "{$fullName} ({$member->relationship})";
                })->implode(', ');
            $resident->family_members_string = $familyMembers ?: 'None';

            // Log residents with invalid family member data for debugging
            if ($resident->familyMembers->count() > 0 && empty($familyMembers)) {
                Log::warning("Resident ID {$resident->id} has family members with missing names.", [
                    'family_members' => $resident->familyMembers->toArray(),
                ]);
            }

            return $resident;
        });

        $data = [
            'residents' => $residents,
            'currentDate' => now()->format('F j, Y'),
        ];

        // Load the PDF view
        $pdf = PDF::loadView('reports_pdf.residents_information', $data);

        // Set paper orientation and size
        $pdf->setPaper('a4', 'portrait');

        // Download the PDF
        return $pdf->download('residents_information_report_' . date('Y-m-d') . '.pdf');
    }
}
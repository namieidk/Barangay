<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\NewResidence; // <-- Add this for your friend's model
use Barryvdh\Snappy\Facades\SnappyPdf as PDF; // <-- Add this for Snappy

class ReportController extends Controller
{
    // The existing index method from your friend's file
    public function index(Request $request)
    {
        $activeReportType = 'residents_information'; // Indicates which report preview to show

        // $residents = NewResidence::orderBy('last_name')->orderBy('first_name')->get();
        $residents = NewResidence::orderBy('last_name')->orderBy('first_name')->paginate(15);

        $data = [
            'activeReportType' => $activeReportType,
            'residents' => $residents,
            // You can add more data here if other report types need initial data
        ];

        return view('Reports.Reports', $data);
    }

    // New method to download the Residents Information PDF
    public function downloadResidentsInformationPdf()
    {
        // Fetch all residents. You might want to add ordering, e.g., ->orderBy('last_name')->orderBy('first_name')
        $residents = NewResidence::all(); // Or NewResidence::with('familyMembers')->get(); if you need family data too

        $data = [
            'residents' => $residents,
            // You can pass other data like the current date if needed in the PDF
            // 'currentDate' => now()->format('F j, Y'),
        ];

        // Load the dedicated PDF view and pass data
        $pdf = PDF::loadView('reports_pdf.residents_information', $data);

        // Optional: Set paper orientation or size
        $pdf->setPaper('a4', 'portrait'); // Change to 'landscape' if needed

        // Download the PDF
        return $pdf->download('residents_information_report_' . date('Y-m-d') . '.pdf');
    }
}

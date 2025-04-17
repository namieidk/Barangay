<?php

namespace App\Http\Controllers;

use App\Models\Report;
use Google_Client;
use Google_Service_Docs;
use Google_Service_Drive;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class ReportController extends Controller
{
    protected $client;

    public function __construct()
    {
        // Initialize Google Client
        $this->client = new Google_Client();
        $this->client->setApplicationName('Barangay Reports');
        $this->client->setScopes([
            Google_Service_Docs::DOCUMENTS,
            Google_Service_Drive::DRIVE_FILE,
        ]);
        $this->client->setAuthConfig(storage_path('app/credentials.json')); // Path to Google API credentials
        $this->client->setAccessType('offline');
    }

    // Display the reports dashboard
    public function index()
    {
        $reports = Report::orderBy('created_at', 'desc')->take(10)->get();
        return view('Reports.Reports', compact('reports'));
    }

    // Generate a new report
    public function generate(Request $request)
    {
        $validated = $request->validate([
            'type' => 'required|in:residents_information,clearance,indigency,business_permit,residency',
            'title' => 'required|string|max:255',
            'metadata' => 'nullable|array',
        ]);

        try {
            $driveService = new Google_Service_Drive($this->client);
            $docId = null;

            // Use the Barangay Clearance template for clearance reports
            if ($validated['type'] === 'clearance') {
                $copy = $driveService->files->copy(
                    '19lwFdu4vazom-Bk_cA7m8C_pB1rQdg3ODthsyeEja4M',
                    ['name' => $validated['title']]
                );
                $docId = $copy->id;

                // Optionally update document content
                $docsService = new Google_Service_Docs($this->client);
                $requests = [
                    new \Google_Service_Docs_Request([
                        'replaceAllText' => [
                            'replaceText' => $validated['metadata']['resident_name'] ?? 'Resident Name',
                            'containsText' => ['text' => '{{RESIDENT_NAME}}', 'matchCase' => true],
                        ],
                    ]),
                ];
                $docsService->documents->batchUpdate($docId, new \Google_Service_Docs_BatchUpdateDocumentRequest([
                    'requests' => $requests,
                ]));
            } else {
                // Create a blank document for other report types
                $docsService = new Google_Service_Docs($this->client);
                $document = new \Google_Service_Docs_Document([
                    'title' => $validated['title'],
                ]);
                $document = $docsService->documents->create($document);
                $docId = $document->documentId;
            }

            // Store report in database
            $report = Report::create([
                'title' => $validated['title'],
                'type' => $validated['type'],
                'google_doc_id' => $docId,
                'status' => 'draft',
                'metadata' => $validated['metadata'] ?? null,
                'last_updated_at' => now(),
            ]);

            Log::info('Report generated', ['report_id' => $report->id, 'google_doc_id' => $docId]);

            return redirect()->route('reports.index')->with('success', 'Report generated successfully.');
        } catch (\Exception $e) {
            Log::error('Failed to generate report', ['error' => $e->getMessage()]);
            return redirect()->back()->with('error', 'Failed to generate report: ' . $e->getMessage());
        }
    }

    // Preview a report
    public function preview(Report $report)
    {
        $reports = Report::orderBy('created_at', 'desc')->take(10)->get();
        return view('Reports.Reports', compact('report', 'reports'));
    }

    // Download report as PDF
    public function download(Report $report)
    {
        try {
            $driveService = new Google_Service_Drive($this->client);
            $file = $driveService->files->export($report->google_doc_id, 'application/pdf', ['alt' => 'media']);
            $content = $file->getBody()->getContents();

            return response($content, 200)
                ->header('Content-Type', 'application/pdf')
                ->header('Content-Disposition', 'attachment; filename="' . $report->title . '.pdf"');
        } catch (\Exception $e) {
            Log::error('Failed to download report', ['report_id' => $report->id, 'error' => $e->getMessage()]);
            return redirect()->back()->with('error', 'Failed to download report: ' . $e->getMessage());
        }
    }

    // Update report status (e.g., printed, emailed)
    public function updateStatus(Request $request, Report $report)
    {
        $validated = $request->validate([
            'status' => 'required|in:generated,printed,emailed',
        ]);

        $report->update([
            'status' => $validated['status'],
            'last_updated_at' => now(),
        ]);

        Log::info('Report status updated', ['report_id' => $report->id, 'status' => $validated['status']]);

        return redirect()->route('reports.index')->with('success', 'Report status updated.');
    }
}
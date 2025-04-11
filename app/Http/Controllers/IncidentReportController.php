<?php

namespace App\Http\Controllers;

use App\Models\IncidentReport;
use App\Models\ResPersonData;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\ValidationException;

class IncidentReportController extends Controller
{
    public function create(Request $request)
    {
        $incidentReport = null;
        $reportingPerson = null;

        // If there's a blotter entry number from search, fetch the data
        if ($request->has('blotter_entry_number')) {
            $blotterEntryNumber = $request->input('blotter_entry_number');
            $incidentReport = IncidentReport::where('blotter_entry_number', $blotterEntryNumber)->first();
            $reportingPerson = ResPersonData::find($blotterEntryNumber);
        }

        return view('BloterRec.IncidentReport', compact('incidentReport', 'reportingPerson'));
    }

    public function search(Request $request)
    {
        $request->validate([
            'blotter_entry_number' => 'required|string|exists:reporting_person_data,id',
        ]);

        $blotterEntryNumber = $request->input('blotter_entry_number');
        return redirect()->route('blotter.incident.create', ['blotter_entry_number' => $blotterEntryNumber]);
    }

    public function store(Request $request)
    {
        try {
            Log::info('Incident Report Form Data Received:', $request->all());

            $validated = $request->validate([
                'blotter_entry_number' => 'required|string|exists:reporting_person_data,id',
                'incident_type' => 'required|string|max:255',
                'incident_date_time' => 'required|date_format:Y-m-d\TH:i',
                'incident_place' => 'required|string|max:255',
                'reporting_person_name' => 'required|string|max:255',
                'reporting_person_address' => 'required|string|max:255',
                'report_date_time' => 'required|date_format:Y-m-d\TH:i',
                'certification_text' => 'required|string',
                'signature_upload' => 'nullable|image|mimes:jpeg,png,jpg|max:2048', // Max 2MB
                'signatory_name' => 'nullable|string|max:255',
                'signatory_position' => 'nullable|string|max:255',
            ]);

            // Handle signature upload
            if ($request->hasFile('signature_upload')) {
                $file = $request->file('signature_upload');
                $path = $file->store('signatures', 'public'); // Store in storage/app/public/signatures
                $validated['signature_path'] = $path;
            }

            // Check if an incident report already exists for this blotter entry
            $incidentReport = IncidentReport::updateOrCreate(
                ['blotter_entry_number' => $validated['blotter_entry_number']],
                $validated
            );

            Log::info('Incident Report Saved Successfully:', $incidentReport->toArray());

            return redirect()->route('blotter.incident.create')->with('success', 'Incident report saved successfully!');

        } catch (ValidationException $e) {
            Log::error('Validation Error:', [
                'errors' => $e->errors(),
                'input' => $request->all(),
            ]);
            return redirect()->back()->withErrors($e->errors())->withInput();

        } catch (\Exception $e) {
            Log::error('Error Saving Incident Report:', [
                'message' => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
                'input' => $request->all(),
            ]);
            return redirect()->back()->withErrors(['error' => 'Failed to save incident report: ' . $e->getMessage()])->withInput();
        }
    }
}
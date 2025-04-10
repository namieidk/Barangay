<?php

namespace App\Http\Controllers;

use App\Models\ChildLaw;
use App\Models\ResPersonData;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ChildLawController extends Controller
{
    public function index()
    {
        return view('BloterRec.ChildLaw', [ // Fixed typo from 'ChildLdaw' to 'ChildLaw'
            'blotterEntryNumber' => '',
            'typeOfIncident' => '',
        ]);
    }

    public function create(Request $request)
    {
        $blotterEntryNumber = $request->input('search');
        $reportingPerson = ResPersonData::where('id', $blotterEntryNumber)->first();

        if (!$reportingPerson && $blotterEntryNumber) {
            return redirect()->back()->withErrors(['error' => 'No reporting person data found for the given Blotter Entry Number.']);
        }

        $typeOfIncident = $reportingPerson ? $reportingPerson->type_of_incident : '';
        $blotterEntryNumber = $reportingPerson ? $blotterEntryNumber : '';

        return view('BloterRec.ChildLaw', [
            'blotterEntryNumber' => $blotterEntryNumber,
            'typeOfIncident' => $typeOfIncident,
        ]);
    }

    public function store(Request $request)
    {
        try {
            Log::info('Form Data Received:', $request->all());

            $blotterEntryNumber = $request->input('res_person_data_id');
            $reportingPerson = ResPersonData::find($blotterEntryNumber);

            if (!$reportingPerson) {
                throw new \Exception('Invalid Blotter Entry Number. Please ensure the Blotter Entry Number exists in the reporting person data.');
            }

            $validated = $request->validate([
                'res_person_data_id' => 'required|string|exists:reporting_person_data,id',
                'type_of_incident' => 'required|string|max:255',
                'guardian_first_name' => 'required|string|max:255',
                'guardian_last_name' => 'required|string|max:255',
                'guardian_address' => 'required|string|max:255',
                'guardian_telephone' => 'required|string|max:20',
                'guardian_phone' => 'required|string|max:20',
                'diversion_mechanism' => 'required|string',
                'distinguishing_features' => 'required|string',
            ]);

            $validated['type_of_incident'] = $reportingPerson->type_of_incident;

            ChildLaw::create($validated);

            Log::info('Child Law Data Saved Successfully');

            return redirect()->route('blotter.childlaw.index')->with('success', 'Child law data submitted successfully!');
        } catch (\Exception $e) {
            Log::error('Error Saving Child Law Data:', [
                'message' => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
                'input' => $request->all(),
            ]);

            if (strpos($e->getMessage(), 'Invalid Blotter Entry Number') !== false) {
                return redirect()->back()->withErrors(['error' => 'Invalid Blotter Entry Number. Please check the Blotter Entry Number and try again.'])->withInput();
            }

            return redirect()->back()->withErrors(['error' => 'Failed to save data: ' . $e->getMessage()])->withInput();
        }
    }

    public function search(Request $request)
    {
        $blotterEntryNumber = $request->input('search');
        $reportingPerson = ResPersonData::where('id', $blotterEntryNumber)->first();

        if (!$reportingPerson) {
            return redirect()->back()->withErrors(['error' => 'No record found for the given Blotter Entry Number.']);
        }

        return redirect()->route('blotter.childlaw.create', ['search' => $blotterEntryNumber]);
    }
}
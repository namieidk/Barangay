<?php

namespace App\Http\Controllers;

use App\Models\VictimData;
use App\Models\ResPersonData;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class VictimDataController extends Controller
{
    public function index()
    {
        // Pass default values to the view
        $defaults = [
            'blotterEntryNumber' => '',
            'typeOfIncident' => '',
            'barangay' => 'Barangay Incio',
            'town_city' => 'Incio City',
            'province' => 'Incio Province',
            'postal_code' => '9800',
        ];
        return view('BloterRec.VictimData', $defaults);
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

        // Pass defaults along with dynamic data
        return view('BloterRec.VictimData', [
            'blotterEntryNumber' => $blotterEntryNumber,
            'typeOfIncident' => $typeOfIncident,
            'barangay' => 'Barangay Incio',
            'town_city' => 'Incio City',
            'province' => 'Incio Province',
            'postal_code' => '9800',
        ]);
    }

    public function store(Request $request)
    {
        try {
            Log::info('Form Data Received:', $request->all());

            $blotterEntryNumber = $request->input('res_person_data_id');

            // Check if the blotter entry number exists in ResPersonData
            $reportingPerson = ResPersonData::find($blotterEntryNumber);

            if (!$reportingPerson) {
                throw new \Exception('Invalid Blotter Entry Number. Please ensure the Blotter Entry Number exists in the reporting person data.');
            }

            // Validate the request data
            $validated = $request->validate([
                'res_person_data_id' => 'required|string|exists:reporting_person_data,id',
                'type_of_incident' => 'required|string|max:255',
                'surname' => 'required|string|max:255',
                'last_name' => 'required|string|max:255',
                'middle_name' => 'required|string|max:255',
                'nickname' => 'nullable|string|max:255',
                'gender' => 'required|string|in:male,female,other',
                'citizenship' => 'required|string|max:255',
                'birthdate' => 'required|date',
                'age' => 'required|integer|min:0|max:150',
                'place_of_birth' => 'required|string|max:255',
                'telephone' => 'required|string|max:20',
                'email_address' => 'required|email|max:255',
                'civil_status' => 'required|string|in:single,married,divorced,widowed',
                'house_no' => 'required|string|max:255',
                'village' => 'required|string|max:255',
                'barangay' => 'required|string|max:255',
                'town_city' => 'required|string|max:255',
                'province' => 'required|string|max:255',
                'postal_code' => 'nullable|string|max:20',
                'other_house_no' => 'nullable|string|max:255',
                'other_village' => 'nullable|string|max:255',
                'other_barangay' => 'nullable|string|max:255',
                'other_town_city' => 'nullable|string|max:255',
                'other_province' => 'nullable|string|max:255',
                'other_postal_code' => 'nullable|string|max:20',
                'date_time_reported' => 'required|date_format:Y-m-d\TH:i',
                'date_time_incident' => 'required|date_format:Y-m-d\TH:i',
                'highest_education' => 'required|string|in:elementary,high-school,vocational,college,graduate',
                'occupation' => 'required|string|max:255',
            ]);

            // Set the type_of_incident from the reporting person
            $validated['type_of_incident'] = $reportingPerson->type_of_incident;

            // Create the victim data record
            VictimData::create($validated);

            Log::info('Victim Data Saved Successfully');

            return redirect()->route('blotter.victim.index')->with('success', 'Victim data submitted successfully!');
        } catch (\Exception $e) {
            Log::error('Error Saving Victim Data:', [
                'message' => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
                'input' => $request->all(),
            ]);

            // If the error is due to an invalid blotter entry number, redirect back with a specific error
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

        return redirect()->route('blotter.victim.create', ['search' => $blotterEntryNumber]);
    }
}
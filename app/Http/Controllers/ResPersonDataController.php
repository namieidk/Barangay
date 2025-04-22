<?php

namespace App\Http\Controllers;

use App\Models\ResPersonData;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\ValidationException;

class ResPersonDataController extends Controller
{
    public function create(Request $request)
    {
        $latestEntry = ResPersonData::orderBy('id', 'desc')->first();
        $blotterEntryNumber = $latestEntry ? (intval($latestEntry->id) + 1) : 1001;

        $typeOfIncident = $request->input('filter');
        
        $defaultBarangay = 'Barangay Incio';
        $defaultTownCity = 'Incio City';
        $defaultProvince = 'Incio Province';

        return view('BloterRec.RepPersonData', compact(
            'blotterEntryNumber',
            'typeOfIncident',
            'defaultBarangay',
            'defaultTownCity',
            'defaultProvince'
        ));
    }

    public function store(Request $request)
    {
        try {
            Log::info('Form Data Received:', $request->all());

            $latestEntry = ResPersonData::orderBy('id', 'desc')->first();
            $blotterEntryNumber = $latestEntry ? (intval($latestEntry->id) + 1) : 1001;

            $validated = $request->validate([
                'type_of_incident' => 'required|string|max:255|in:Property damage,Near misses,Environmental incidents,Fatalities,Fire incident,Minor incidents,Minor injuries,Accident report,Security incident,Hazard,Human incidents,Positive observations,Unsafe acts,Vehicle injuries,Worker injury incident,Workplace accidents,Workplace violence',
                'first_name' => 'required|string|max:255',
                'last_name' => 'required|string|max:255',
                'middle_name' => 'required|string|max:255',
                'nickname' => 'required|string|max:255',
                'gender' => 'required|string|in:male,female,non-binary,other',
                'citizenship' => 'required|string|max:255',
                'birthdate' => 'required|date',
                'age' => 'required|integer|min:0|max:150', 
                'place_of_birth' => 'required|string|max:255',
                'telephone' => 'required|string|max:20',
                'house_no' => 'required|string|max:255',
                'village' => 'required|string|max:255',
                'barangay' => 'required|string|max:255',
                'town_city' => 'required|string|max:255',
                'province' => 'required|string|max:255',
                'other_house_no' => 'nullable|string|max:255', 
                'other_village' => 'nullable|string|max:255', 
                'other_barangay' => 'nullable|string|max:255', // Changed to optional
                'other_town_city' => 'nullable|string|max:255', // Changed to optional
                'other_province' => 'nullable|string|max:255', // Changed to optional
                'date_reported' => 'required|date_format:Y-m-d\TH:i', // Ensure this matches datetime-local
                'date_incident' => 'required|date_format:Y-m-d\TH:i', // Ensure this matches datetime-local
                'email_address' => 'required|email|max:255',
                'occupation' => 'required|string|max:255',
                'education' => 'required|string|in:elementary,high-school,vocational,college,masters,doctorate',
            ]);

            $validated['id'] = (string) $blotterEntryNumber;

            $personData = ResPersonData::create($validated);

            Log::info('Data Saved Successfully:', $personData->toArray());

            return redirect()->route('BloterRec.ResPersonData')->with('success', 'Person data submitted successfully!');

        } catch (ValidationException $e) {
            Log::error('Validation Error:', [
                'errors' => $e->errors(),
                'input' => $request->all(),
            ]);
            return redirect()->back()->withErrors($e->errors())->withInput();

        } catch (\Exception $e) {
            Log::error('Error Saving Data:', [
                'message' => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
                'input' => $request->all(),
            ]);
            return redirect()->back()->withErrors(['error' => 'Failed to save data: ' . $e->getMessage()])->withInput();
        }
    }
}
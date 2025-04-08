<?php

namespace App\Http\Controllers;

use App\Models\NewResidence;
use Illuminate\Http\Request;

class ResidenceController extends Controller
{
    public function index()
    {
        $residences = NewResidence::all();
        return view('ResRec.ResRec', compact('residences')); 
    }

    public function edit($resident)
    {
        $resident = NewResidence::findOrFail($resident);
        return response()->json($resident);
    }

    public function update(Request $request, $resident)
    {
        $resident = NewResidence::findOrFail($resident);
        
        // Validate all fields
        $validatedData = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'middle_name' => 'nullable|string|max:255',
            'alias_name' => 'nullable|string|max:255',
            'gender' => 'required|in:male,female',
            'marital_status' => 'required|in:married,single,divorced,widowed',
            'spouse_name' => 'nullable|string|max:255',
            'purok' => 'required|string',
            'employment_status' => 'nullable|in:worker,self-employed,employee',
            'birth_date' => 'required|date',
            'birth_place' => 'required|string|max:255',
            'place' => 'required|string|max:255',
            'height' => 'required|numeric',
            'weight' => 'required|numeric',
            'religion' => 'required|string|max:255',
            'religion_other' => 'nullable|string|max:255',
            'voters_status' => 'required|in:registered,not_registered',
            'has_disability' => 'required|boolean',
            'blood_type' => 'required|in:A+,A-,B+,B-,AB+,AB-,O+,O-',
            'occupation' => 'required|string|max:255',
            'educational_attainment' => 'required|in:elementary,highschool,college,postgraduate',
            'phone_number' => 'required|string|max:20',
            'land_number' => 'nullable|string|max:20',
            'email' => 'required|email|max:255',
            'address' => 'required|string|max:255',
        ]);

        $resident->update($validatedData);
        return redirect()->route('ResRec.ResRec')->with('success', 'Resident updated successfully');
    }

    public function archive($resident)
    {
        $resident = NewResidence::findOrFail($resident);
        $resident->delete(); // Assuming soft deletes
        return redirect()->route('ResRec.ResRec')->with('success', 'Resident archived successfully');
    }
}
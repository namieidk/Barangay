<?php

// app/Http/Controllers/NewResidenceController.php
namespace App\Http\Controllers;

use App\Models\NewResidence;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NewResidenceController extends Controller
{
    public function store(Request $request)
    {
        // Validate the form data
        $validated = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'middle_name' => 'nullable|string|max:255',
            'alias_name' => 'nullable|string|max:255',
            'gender' => 'required|in:male,female',
            'marital_status' => 'required|in:married,single,divorced,widowed',
            'spouse_name' => 'nullable|string|max:255',
            'purok' => 'required|in:purok1,purok2,purok3,purok4',
            'employment_status' => 'required|in:worker,self-employed,employee',
            'birth_date' => 'required|date',
            'birth_place' => 'required|string|max:255',
            'place' => 'required|string|max:255',
            'height' => 'required|numeric',
            'weight' => 'required|numeric',
            'religion' => 'required|string',
            'religion_other' => 'nullable|string|max:255',
            'voters_status' => 'required|in:registered,not_registered',
            'has_disability' => 'boolean',
            'blood_type' => 'required|in:A+,A-,B+,B-,AB+,AB-,O+,O-',
            'occupation' => 'required|string|max:255',
            'educational_attainment' => 'required|in:elementary,highschool,college,postgraduate',
            'phone_number' => 'required|string|max:20',
            'land_number' => 'nullable|string|max:20',
            'email' => 'required|email|max:255',
            'address' => 'required|string|max:255',
        ]);

        // Generate custom ID (e.g., '0001', '0002', etc.)
        $lastResidence = NewResidence::orderBy('id', 'desc')->first();
        $newId = $lastResidence ? sprintf('%04d', (int)$lastResidence->id + 1) : '0001';

        // Add the custom ID to the validated data
        $validated['id'] = $newId;
        $validated['has_disability'] = $request->has('has_disability'); // Convert checkbox to boolean

        // Create the new residence record
        NewResidence::create($validated);

        return redirect()->route('ResRec.ResRec')->with('success', 'Head of family added successfully!');
    }
}

<?php

// app/Http/Controllers/FamilyMemberController.php
namespace App\Http\Controllers;

use App\Models\FamMember;
use Illuminate\Http\Request;

class FamilyMemberController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'residence_id' => 'required|string|exists:new_residence,id',
            'relationship' => 'required|string|in:wife,husband,son,daughter,mother,father,sibling,other',
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

        $validated['has_disability'] = $request->has('has_disability');
        FamMember::create($validated);

        return redirect()->back()->with('success', 'Family member added successfully!');
    }
}

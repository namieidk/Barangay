<?php

namespace App\Http\Controllers;

use App\Models\NewResidence;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class NewResidenceController extends Controller
{
    public function create()
    {
        return view('new-residence.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'profile_photo' => 'nullable|image|max:2048',
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'middle_name' => 'nullable|string|max:255',
            'alias_name' => 'nullable|string|max:255',
            'gender' => 'required|in:male,female',
            'marital_status' => 'required|in:married,single,divorced,widowed',
            'spouse_name' => 'nullable|string|max:255',
            'purok' => 'required|string|max:255',
            'employment_status' => 'required|in:worker,self-employed,employee',
            'birth_date' => 'required|date',
            'birth_place' => 'required|string|max:255',
            'place' => 'required|string|max:255',
            'height' => 'required|numeric',
            'weight' => 'required|numeric',
            'religion' => 'required|string|max:255',
            'voters_status' => 'required|in:registered,not_registered',
            'has_disability' => 'boolean',
            'blood_type' => 'required|in:A+,A-,B+,B-,AB+,AB-,O+,O-',
            'occupation' => 'required|string|max:255',
            'educational_attainment' => 'required|in:elementary,highschool,college,postgraduate',
            'phone_number' => 'required|string|max:255',
            'land_number' => 'nullable|string|max:255',
            'email' => 'required|email|max:255',
            'address' => 'required|string|max:255',
        ]);

        if ($request->hasFile('profile_photo')) {
            $path = $request->file('profile_photo')->store('profile_photos', 'public');
            $validatedData['profile_photo'] = $path;
        }

        // Handle the 'Other' religion case
        if ($request->input('religion') === 'Other') {
            $validatedData['religion'] = $request->input('religion_other');
        }

        // Convert employment_status to match database enum
        $validatedData['employment_status'] = str_replace('self-employed', 'self_employed', $validatedData['employment_status']);

        NewResidence::create($validatedData);

        return redirect()->back()->with('success', 'New residence information saved successfully!');
    }

    public function show(NewResidence $newResidence)
    {
        return view('new-residence.show', compact('newResidence'));
    }

    public function edit(NewResidence $newResidence)
    {
        return view('new-residence.edit', compact('newResidence'));
    }

    public function update(Request $request, NewResidence $newResidence)
    {
        $validatedData = $request->validate([
            'profile_photo' => 'nullable|image|max:2048',
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'middle_name' => 'nullable|string|max:255',
            'alias_name' => 'nullable|string|max:255',
            'gender' => 'required|in:male,female',
            'marital_status' => 'required|in:married,single,divorced,widowed',
            'spouse_name' => 'nullable|string|max:255',
            'purok' => 'required|string|max:255',
            'employment_status' => 'required|in:worker,self-employed,employee',
            'birth_date' => 'required|date',
            'birth_place' => 'required|string|max:255',
            'place' => 'required|string|max:255',
            'height' => 'required|numeric',
            'weight' => 'required|numeric',
            'religion' => 'required|string|max:255',
            'voters_status' => 'required|in:registered,not_registered',
            'has_disability' => 'boolean',
            'blood_type' => 'required|in:A+,A-,B+,B-,AB+,AB-,O+,O-',
            'occupation' => 'required|string|max:255',
            'educational_attainment' => 'required|in:elementary,highschool,college,postgraduate',
            'phone_number' => 'required|string|max:255',
            'land_number' => 'nullable|string|max:255',
            'email' => 'required|email|max:255',
            'address' => 'required|string|max:255',
        ]);

        if ($request->hasFile('profile_photo')) {
            if ($newResidence->profile_photo) {
                Storage::disk('public')->delete($newResidence->profile_photo);
            }
            $path = $request->file('profile_photo')->store('profile_photos', 'public');
            $validatedData['profile_photo'] = $path;
        }

        if ($request->input('religion') === 'Other') {
            $validatedData['religion'] = $request->input('religion_other');
        }

        $validatedData['employment_status'] = str_replace('self-employed', 'self_employed', $validatedData['employment_status']);
        
        $newResidence->update($validatedData);

        return redirect()->back()->with W('success', 'New residence information updated successfully!');
    }
}   
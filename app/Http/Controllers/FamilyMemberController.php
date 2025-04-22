<?php

namespace App\Http\Controllers;

use App\Models\FamMember;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class FamilyMemberController extends Controller
{
    // Display the family member list
    public function index()
    {
        $familyMembers = FamMember::all(); // Fetch all family members
        return view('ResRec.family-members', ['familyMembers' => $familyMembers]);
    }

    public function edit($id)
{
    // Find the family member by ID explicitly
    $famMember = FamMember::findOrFail($id);
    
    // Log for debugging
    Log::info('Fetching family member with ID: ' . $id);
    Log::info('Family member data: ' . json_encode($famMember));
    
    return response()->json([
        'residence_id' => $famMember->residence_id ?? '',
        'relationship' => $famMember->relationship ?? '',
        'first_name' => $famMember->first_name ?? '',
        'last_name' => $famMember->last_name ?? '',
        'middle_name' => $famMember->middle_name ?? '',
        'alias_name' => $famMember->alias_name ?? '',
        'gender' => $famMember->gender ?? '',
        'marital_status' => $famMember->marital_status ?? '',
        'spouse_name' => $famMember->spouse_name ?? '',
        'purok' => $famMember->purok ?? '',
        'employment_status' => $famMember->employment_status ?? '',
        'birth_date' => $famMember->birth_date ? $famMember->birth_date->format('Y-m-d') : '',
        'birth_place' => $famMember->birth_place ?? '',
        'place' => $famMember->place ?? '',
        'height' => $famMember->height ?? '',
        'weight' => $famMember->weight ?? '',
        'religion' => $famMember->religion ?? '',
        'religion_other' => $famMember->religion_other ?? '',
        'voters_status' => $famMember->voters_status ?? '',
        'has_disability' => $famMember->has_disability ? 1 : 0,
        'blood_type' => $famMember->blood_type ?? '',
        'occupation' => $famMember->occupation ?? '',
        'educational_attainment' => $famMember->educational_attainment ?? '',
        'phone_number' => $famMember->phone_number ?? '',
        'land_number' => $famMember->land_number ?? '',
        'email' => $famMember->email ?? '',
        'address' => $famMember->address ?? '',
    ]);
}
public function update(Request $request, $id)
{
    $famMember = FamMember::findOrFail($id);
    
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

        $famMember->update($validated);
    
        return redirect()->route('family-members.index')
            ->with('success', 'Family member updated successfully');
    }

    // Existing store method (unchanged)
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
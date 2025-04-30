<?php

namespace App\Http\Controllers;

use App\Models\NewResidence;
use App\Models\FamMember;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class ListController extends Controller
{
    public function index(Request $request)
{
    $search = $request->input('search');

    $residentsQuery = NewResidence::query();
    $familyMembersQuery = FamMember::query();

    if ($search) {
        $residentsQuery->where(function ($query) use ($search) {
            $query->where('first_name', 'like', "%{$search}%")
                ->orWhere('last_name', 'like', "%{$search}%")
                ->orWhere('id', 'like', "%{$search}%")
                ->orWhere('purok', 'like', "%{$search}%");
        });

        $familyMembersQuery->where(function ($query) use ($search) {
            $query->where('first_name', 'like', "%{$search}%")
                ->orWhere('last_name', 'like', "%{$search}%")
                ->orWhere('residence_id', 'like', "%{$search}%")
                ->orWhere('purok', 'like', "%{$search}%");
        });
    }

    $residents = $residentsQuery->get()->map(function ($resident) {
        $data = $resident->toArray();
        $data['type'] = 'head';
        return $data;
    });

    $familyMembers = $familyMembersQuery->get()->map(function ($member) {
        $data = $member->toArray();
        $data['type'] = 'member';
        return $data;
    });

    $allResidents = $residents->concat($familyMembers);

    // Log the data for debugging
    Log::info('All Residents:', $allResidents->toArray());

    if ($request->ajax()) {
        return response()->json($allResidents->values());
    }

    return view('List.List', ['residents' => $allResidents]);
}

    public function edit(Request $request, $id, $type)
    {
        try {
            if ($type === 'head') {
                $resident = NewResidence::findOrFail($id);
            } else {
                $resident = FamMember::findOrFail($id);
            }

            return response()->json([
                'id' => $resident->id,
                'residence_id' => $type === 'member' ? $resident->residence_id : null,
                'relationship' => $type === 'member' ? $resident->relationship : null,
                'first_name' => $resident->first_name ?? '',
                'last_name' => $resident->last_name ?? '',
                'middle_name' => $resident->middle_name ?? '',
                'alias_name' => $resident->alias_name ?? '',
                'gender' => $resident->gender ?? '',
                'marital_status' => $resident->marital_status ?? '',
                'spouse_name' => $resident->spouse_name ?? '',
                'purok' => $resident->purok ?? '',
                'employment_status' => $resident->employment_status ?? '',
                'birth_date' => $resident->birth_date ? date('Y-m-d', strtotime($resident->birth_date)) : '',
                'birth_place' => $resident->birth_place ?? '',
                'place' => $resident->place ?? '',
                'height' => $resident->height ?? '',
                'weight' => $resident->weight ?? '',
                'religion' => $resident->religion ?? '',
                'religion_other' => $resident->religion_other ?? '',
                'voters_status' => $resident->voters_status ?? '',
                'has_disability' => $resident->has_disability ? 1 : 0,
                'blood_type' => $resident->blood_type ?? '',
                'occupation' => $resident->occupation ?? '',
                'educational_attainment' => $resident->educational_attainment ?? '',
                'phone_number' => $resident->phone_number ?? '',
                'land_number' => $resident->land_number ?? '',
                'email' => $resident->email ?? '',
                'address' => $resident->address ?? '',
            ]);
        } catch (\Exception $e) {
            Log::error('Error fetching resident data: ' . $e->getMessage());
            return response()->json(['error' => 'Failed to fetch resident data'], 500);
        }
    }

    public function update(Request $request, $id, $type)
    {
        try {
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
                'residence_id' => $type === 'member' ? 'required|string|exists:new_residence,id' : 'nullable',
                'relationship' => $type === 'member' ? 'required|string|in:wife,husband,son,daughter,mother,father,sibling,other' : 'nullable',
            ]);

            if ($type === 'head') {
                $resident = NewResidence::findOrFail($id);
            } else {
                $resident = FamMember::findOrFail($id);
            }

            $resident->update($validated);

            if ($request->ajax()) {
                return response()->json(['success' => 'Resident updated successfully']);
            }

            return redirect()->route('list.index')->with('success', 'Resident updated successfully');
        } catch (\Exception $e) {
            Log::error('Error updating resident: ' . $e->getMessage());
            return response()->json(['error' => 'Failed to update resident: ' . $e->getMessage()], 500);
        }
    }
}
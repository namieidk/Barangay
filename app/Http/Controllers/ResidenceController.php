<?php

namespace App\Http\Controllers;

use App\Models\NewResidence;
use App\Models\ArchivedResident;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ResidenceController extends Controller
{
    /**
     * Display a listing of active residents.
     */
    public function index()
    {
        $residences = NewResidence::all();
        return view('ResRec.ResRec', compact('residences'));
    }

    /**
     * Get resident data for editing.
     */
    public function edit($resident)
    {
        $resident = NewResidence::findOrFail($resident);
        return response()->json($resident);
    }

    /**
     * Update resident data.
     */
    public function update(Request $request, $resident)
    {
        $resident = NewResidence::findOrFail($resident);

        // Validate all fields
        $validatedData = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'middle_name' => 'nullable|string|max:255',
            'alias_name' => 'nullable|string|max:255',
            'gender' => 'required|in:male,female,LGBTQA+',
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

    public function archive(Request $request, $resident)
    {
        DB::beginTransaction();
        try {
            $resident = NewResidence::findOrFail($resident);

            ArchivedResident::create([
                'first_name' => $resident->first_name,
                'last_name' => $resident->last_name,
                'middle_name' => $resident->middle_name,
                'alias_name' => $resident->alias_name,
                'gender' => $resident->gender,
                'marital_status' => $resident->marital_status,
                'spouse_name' => $resident->spouse_name,
                'purok' => $resident->purok,
                'employment_status' => $resident->employment_status,
                'birth_date' => $resident->birth_date,
                'birth_place' => $resident->birth_place,
                'place' => $resident->place,
                'height' => $resident->height,
                'weight' => $resident->weight,
                'religion' => $resident->religion,
                'religion_other' => $resident->religion_other,
                'voters_status' => $resident->voters_status,
                'has_disability' => $resident->has_disability,
                'blood_type' => $resident->blood_type,
                'occupation' => $resident->occupation,
                'educational_attainment' => $resident->educational_attainment,
                'phone_number' => $resident->phone_number,
                'land_number' => $resident->land_number,
                'email' => $resident->email,
                'address' => $resident->address,
                'archived_at' => now(),
            ]);

            $resident->forceDelete();

            DB::commit();
            return redirect()->route('ResRec.ResRec')->with('success', 'Resident archived successfully.');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('ResRec.ResRec')->with('error', 'Failed to archive resident: ' . $e->getMessage());
        }
    }
}
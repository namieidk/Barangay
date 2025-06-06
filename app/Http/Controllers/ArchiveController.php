
<?php

namespace App\Http\Controllers;

use App\Models\ArchivedResident;
use App\Models\NewResidence;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ArchiveController extends Controller
{
    /**
     * Display a listing of archived residents.
     */
    public function index()
    {
        $archivedResidents = ArchivedResident::all();
        return view('Archive.archive', compact('archivedResidents'));
    }

    /**
     * Restore an archived resident by moving back to new_residents table.
     */
    public function restore(Request $request, $resident)
    {
        DB::beginTransaction();
        try {
            $archivedResident = ArchivedResident::findOrFail($resident);

            NewResidence::create([
                'first_name' => $archivedResident->first_name,
                'last_name' => $archivedResident->last_name,
                'middle_name' => $archivedResident->middle_name,
                'alias_name' => $archivedResident->alias_name,
                'gender' => $archivedResident->gender,
                'marital_status' => $archivedResident->marital_status,
                'spouse_name' => $archivedResident->spouse_name,
                'purok' => $archivedResident->purok,
                'employment_status' => $archivedResident->employment_status,
                'birth_date' => $archivedResident->birth_date,
                'birth_place' => $archivedResident->birth_place,
                'place' => $archivedResident->place,
                'height' => $archivedResident->height,
                'weight' => $archivedResident->weight,
                'religion' => $archivedResident->religion,
                'religion_other' => $archivedResident->religion_other,
                'voters_status' => $archivedResident->voters_status,
                'has_disability' => $archivedResident->has_disability,
                'blood_type' => $archivedResident->blood_type,
                'occupation' => $archivedResident->occupation,
                'educational_attainment' => $archivedResident->educational_attainment,
                'phone_number' => $archivedResident->phone_number,
                'land_number' => $archivedResident->land_number,
                'email' => $archivedResident->email,
                'address' => $archivedResident->address,
            ]);

            // Delete from archived_residents table
            $archivedResident->delete();

            DB::commit();
            return redirect()->route('Archive.archive')->with('success', 'Resident restored successfully.');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('Archive.archive')->with('error', 'Failed to restore resident: ' . $e->getMessage());
        }
    }
}
<?php

namespace App\Http\Controllers;

use App\Models\NewResidence;
use App\Models\FamMember;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ListController extends Controller
{
    /**
     * Fetch residents for the table, with optional search filtering.
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(Request $request)
    {
        try {
            $search = $request->query('search', '');

            // Log the search parameter for debugging
            Log::info('Fetching residents with search: ' . $search);

            // Query for heads (from new_residences table)
            $headsQuery = NewResidence::query()
                ->select([
                    'id',
                    'first_name',
                    'last_name',
                    'middle_name',
                    'alias_name',
                    'gender',
                    'marital_status',
                    'spouse_name',
                    'purok',
                    'employment_status',
                    'birth_date',
                    'birth_place',
                    'place',
                    'height',
                    'weight',
                    'religion',
                    'religion_other',
                    'voters_status',
                    'has_disability',
                    'blood_type',
                    'occupation',
                    'educational_attainment',
                    'phone_number',
                    'land_number',
                    'email',
                    'address'
                ])
                ->where(function ($query) use ($search) {
                    $query->where('first_name', 'like', "%{$search}%")
                        ->orWhere('last_name', 'like', "%{$search}%")
                        ->orWhere('id', 'like', "%{$search}%")
                        ->orWhere('purok', 'like', "%{$search}%");
                })
                ->get()
                ->map(function ($head) {
                    $head->type = 'head';
                    return $head;
                });

            // Query for members (from fam_members table)
            $membersQuery = FamMember::query()
                ->select([
                    'id',
                    'residence_id',
                    'first_name',
                    'last_name',
                    'middle_name',
                    'alias_name',
                    'gender',
                    'marital_status',
                    'spouse_name',
                    'purok',
                    'employment_status',
                    'birth_date',
                    'birth_place',
                    'place',
                    'height',
                    'weight',
                    'religion',
                    'religion_other',
                    'voters_status',
                    'has_disability',
                    'blood_type',
                    'occupation',
                    'educational_attainment',
                    'phone_number',
                    'land_number',
                    'email',
                    'address',
                    'relationship'
                ])
                ->where(function ($query) use ($search) {
                    $query->where('first_name', 'like', "%{$search}%")
                        ->orWhere('last_name', 'like', "%{$search}%")
                        ->orWhere('residence_id', 'like', "%{$search}%")
                        ->orWhere('purok', 'like', "%{$search}%");
                })
                ->get()
                ->map(function ($member) {
                    $member->type = 'member';
                    return $member;
                });

            // Combine heads and members
            $residents = $headsQuery->merge($membersQuery)->toArray();

            return response()->json($residents);
        } catch (\Exception $e) {
            Log::error('Error fetching residents: ' . $e->getMessage(), [
                'exception' => $e->getTraceAsString(),
                'request_data' => $request->all(),
                'search_query' => $search
            ]);
            return response()->json(['error' => 'Failed to fetch residents'], 500);
        }
    }

    /**
     * Fetch a single resident for editing.
     *
     * @param string $id
     * @param string $type
     * @return \Illuminate\Http\JsonResponse
     */
    public function edit($id, $type)
    {
        try {
            if ($type === 'head') {
                $resident = NewResidence::findOrFail($id);
                $resident->type = 'head';
            } else {
                $resident = FamMember::where('id', $id)->firstOrFail();
                $resident->type = 'member';
            }

            return response()->json($resident);
        } catch (\Exception $e) {
            Log::error('Error fetching resident for edit: ' . $e->getMessage(), [
                'exception' => $e->getTraceAsString(),
                'id' => $id,
                'type' => $type
            ]);
            return response()->json(['error' => 'Failed to fetch resident data'], 500);
        }
    }
}
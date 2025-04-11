<?php

namespace App\Http\Controllers;

use App\Models\ResPersonData;
use Illuminate\Http\Request;

class BlotterRecordsController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->query('search');

        $query = ResPersonData::query();

        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('id', 'like', "%{$search}%")
                  ->orWhere('first_name', 'like', "%{$search}%")
                  ->orWhere('middle_name', 'like', "%{$search}%")
                  ->orWhere('last_name', 'like', "%{$search}%")
                  ->orWhere('nickname', 'like', "%{$search}%");
            });
        }

        $reportingPersons = $query->orderBy('id', 'desc')->paginate(10);

        return view('BloterRec.BloterRecView', compact('reportingPersons'));
    }
}
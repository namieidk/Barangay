<?php

// app/Http/Controllers/BlotterRecordController.php
namespace App\Http\Controllers;

use App\Models\ResPersonData;
use Illuminate\Http\Request;

class BlotterRecordController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
        
        $records = ResPersonData::when($search, function ($query, $search) {
            return $query->where('first_name', 'like', "%{$search}%")
                        ->orWhere('last_name', 'like', "%{$search}%")
                        ->orWhere('id', 'like', "%{$search}%");
        })->get();

        return view('BloterRec.BloterRecView', compact('records')); // Use dot notation for subdirectory
    }
}
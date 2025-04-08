<?php

// app/Http/Controllers/ResidenceController.php
namespace App\Http\Controllers;

use App\Models\NewResidence;
use Illuminate\Http\Request;

class ResidenceController extends Controller
{
    public function index()
    {
        $residences = NewResidence::all();
        return view('ResRec.ResRec', compact('residences')); // Assuming the blade file is 'residence-records.blade.php'
    }
}

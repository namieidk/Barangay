<?php

namespace App\Http\Controllers;

use App\Models\Official;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;

class OfficialController extends Controller
{
    public function index()
    {
        $officials = Official::all();
        // Debug: Log the data being passed
        Log::info('OfficialController@index: Officials count', ['count' => $officials->count(), 'officials' => $officials->toArray()]);
        return view('Officials.Officials', compact('officials'));
    }

    public function create()
    {
        $officials = Official::all();
        Log::info('OfficialController@create: Officials count', ['count' => $officials->count()]);
        return view('Officials.Officials', compact('officials'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'position' => 'required|string|max:255',
            'term_start' => 'required|date',
            'term_end' => 'required|date|after:term_start',
            'first_name' => 'required|string|max:255',
            'middle_name' => 'nullable|string|max:255',
            'last_name' => 'required|string|max:255',
            'birthdate' => 'required|date',
            'gender' => 'required|string|in:male,female,other',
            'contact_number' => 'required|string|max:20',
            'address' => 'required|string|max:500',
            'photo' => 'nullable|image|mimes:jpg,png,gif|max:2048',
        ]);

        if ($request->hasFile('photo')) {
            $path = $request->file('photo')->store('officials', 'public');
            $validated['photo'] = $path;
        }

        Official::create($validated);

        return redirect()->route('officials.index')->with('success', 'Official added successfully.');
    }

    public function edit(Official $official)
    {
        $officials = Official::all();
        Log::info('OfficialController@edit: Officials count', ['count' => $officials->count()]);
        return view('Officials.Officials', compact('official', 'officials'));
    }

    public function update(Request $request, Official $official)
    {
        $validated = $request->validate([
            'position' => 'required|string|max:255',
            'term_start' => 'required|date',
            'term_end' => 'required|date|after:term_start',
            'first_name' => 'required|string|max:255',
            'middle_name' => 'nullable|string|max:255',
            'last_name' => 'required|string|max:255',
            'birthdate' => 'required|date',
            'gender' => 'required|string|in:male,female,other',
            'contact_number' => 'required|string|max:20',
            'address' => 'required|string|max:500',
            'photo' => 'nullable|image|mimes:jpg,png,gif|max:2048',
        ]);

        if ($request->hasFile('photo')) {
            if ($official->photo) {
                Storage::disk('public')->delete($official->photo);
            }
            $path = $request->file('photo')->store('officials', 'public');
            $validated['photo'] = $path;
        }

        $official->update($validated);

        return redirect()->route('officials.index')->with('success', 'Official updated successfully.');
    }

    public function destroy(Official $official)
    {
        if ($official->photo) {
            Storage::disk('public')->delete($official->photo);
        }
        $official->delete();

        return redirect()->route('officials.index')->with('success', 'Official deleted successfully.');
    }

    public function show(Official $official)
    {
        $officials = Official::all();
        Log::info('OfficialController@show: Officials count', ['count' => $officials->count()]);
        return view('Officials.show', compact('official', 'officials'));
    }
}
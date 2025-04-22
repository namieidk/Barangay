<?php

namespace App\Http\Controllers;

use App\Models\Narrative;
use App\Models\ResPersonData;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class NarrativeController extends Controller
{
    public function index(Request $request)
    {
        $res_person_data_id = $request->input('res_person_data_id');
        $type_of_incident = null;

        if ($res_person_data_id) {
            $reportingPerson = ResPersonData::find($res_person_data_id);
            if ($reportingPerson) {
                $type_of_incident = $reportingPerson->type_of_incident;
            }
        }

        return view('BloterRec.Narative', compact('res_person_data_id', 'type_of_incident'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'res_person_data_id' => 'required|string|exists:reporting_person_data,id',
            'date_time' => 'required|date',
            'place_of_incident' => 'required|string|max:255',
            'incident_narrative' => 'required|string',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        Narrative::create($request->all());

        return redirect()->route('blotter.narrative.index')
            ->with('success', 'Narrative saved successfully!');
    }

    public function search(Request $request)
{
    $search = $request->input('search');

    // Initialize variables
    $res_person_data_id = $search;
    $type_of_incident = null;
    $narrative_data = null;
    $narratives = collect(); // Empty collection by default

    if ($search) {
        // Find reporting person
        $reportingPerson = ResPersonData::find($search);
        if ($reportingPerson) {
            $type_of_incident = $reportingPerson->type_of_incident;
            
            // Find associated narrative
            $narrative = Narrative::where('res_person_data_id', $search)->first();
            if ($narrative) {
                $narratives = collect([$narrative]); // Add to collection for display
                $narrative_data = $narrative; // Pass the full narrative object
            }
        }
    }

    return view('BloterRec.Narative', compact(
        'narratives', 
        'res_person_data_id', 
        'type_of_incident',
        'narrative_data' // Pass the narrative data to the view
    ));
}

    public function fetchData($id)
    {
        $reportingPerson = ResPersonData::find($id);
        $narrative = Narrative::where('res_person_data_id', $id)->first();
        
        $response = [
            'type_of_incident' => $reportingPerson ? $reportingPerson->type_of_incident : null,
            'date_time' => $narrative ? $narrative->date_time : null,
            'place_of_incident' => $narrative ? $narrative->place_of_incident : null,
        ];
        
        return response()->json($response);
    }
}

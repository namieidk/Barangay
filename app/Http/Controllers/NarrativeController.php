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

        $query = Narrative::with('reportingPerson');

        if ($search) {
            $query->where('res_person_data_id', $search); // Exact match for ID
        }

        $narratives = $query->get();

        // If a search was performed, pass the res_person_data_id and type_of_incident to the form
        $res_person_data_id = $search;
        $type_of_incident = null;
        if ($search) {
            $reportingPerson = ResPersonData::find($search);
            if ($reportingPerson) {
                $type_of_incident = $reportingPerson->type_of_incident;
            }
        }

        return view('BloterRec.Narative', compact('narratives', 'res_person_data_id', 'type_of_incident'));
    }

    public function fetchTypeOfIncident($id)
    {
        $reportingPerson = ResPersonData::find($id);
        if ($reportingPerson) {
            return response()->json(['type_of_incident' => $reportingPerson->type_of_incident]);
        }
        return response()->json(['type_of_incident' => null], 404);
    }
}
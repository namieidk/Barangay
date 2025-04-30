<?php

namespace App\Http\Controllers;

use App\Models\NewResidence;
use App\Models\FamMember;
use App\Models\Official;
use Illuminate\Http\Request;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        // Total Population: Sum of NewResidence and FamMember records
        $totalPopulation = NewResidence::count() + FamMember::count();

        // Gender Distribution
        $maleCount = NewResidence::where('gender', 'male')->count() + FamMember::where('gender', 'male')->count();
        $femaleCount = NewResidence::where('gender', 'female')->count() + FamMember::where('gender', 'female')->count();

        // Registered Voters
        $registeredVoters = NewResidence::where('voters_status', 'registered')->count() + 
                           FamMember::where('voters_status', 'registered')->count();

        // Current Barangay Officials
        $officials = Official::all();

        // Age Distribution
        $ageGroups = [
            '0-18' => 0,
            '19-35' => 0,
            '36-50' => 0,
            '51+' => 0,
        ];

        $residents = NewResidence::select('birth_date')->get();
        $familyMembers = FamMember::select('birth_date')->get();

        foreach ($residents->concat($familyMembers) as $person) {
            $age = Carbon::parse($person->birth_date)->age;
            if ($age <= 18) {
                $ageGroups['0-18']++;
            } elseif ($age <= 35) {
                $ageGroups['19-35']++;
            } elseif ($age <= 50) {
                $ageGroups['36-50']++;
            } else {
                $ageGroups['51+']++;
            }
        }

        // Population Chart Data (Last 6 Months)
        $months = [];
        $populationData = [];
        for ($i = 5; $i >= 0; $i--) {
            $date = Carbon::now()->subMonths($i);
            $monthName = $date->format('M');
            $startOfMonth = $date->startOfMonth();
            $endOfMonth = $date->endOfMonth();

            $count = NewResidence::whereBetween('created_at', [$startOfMonth, $endOfMonth])->count() +
                     FamMember::whereBetween('created_at', [$startOfMonth, $endOfMonth])->count();

            $months[] = $monthName;
            $populationData[] = $count;
        }

        // Pass data to the view
        return view('dashboard', compact(
            'totalPopulation',
            'maleCount',
            'femaleCount',
            'registeredVoters',
            'officials',
            'ageGroups',
            'months',
            'populationData'
        ));
    }
}
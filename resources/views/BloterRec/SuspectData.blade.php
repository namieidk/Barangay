<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>BRGY INCIO, DAVAO CITY SYSTEM</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style>
        .bg-4A6936-50-opacity {
            background-color: rgba(74, 105, 54, 0.5);
        }
    </style>
</head>
<body class="bg-4A6936-50-opacity min-h-screen flex">
    <!-- Rest of your content goes here -->

    <div class="fixed top-0 left-64 w-[calc(100%-16rem)] h-20 bg-[#5A7A46] text-white p-4 text-xl font-bold z-50 flex items-center">
        <label for="search" class="mr-4 text-sm">Blotter Entry Number:</label>
        <input type="text" id="search" name="search" class="p-2 rounded bg-white text-black w-40 h-8">
        <label for="filter" class="ml-4 mr-4 text-sm">Type of Incident:</label>
        <input type="text" id="filter" name="filter" class="p-2 rounded bg-white text-black w-60 h-8">
    </div>

    <!-- Sidebar -->
    <x-sidebar></x-sidebar>

    <!-- Main Content Area -->
    <div class="flex-1 ml-20 pt-20">
        <div class="p-10 w-full  max-w-5xl mx-auto">
            <!-- Form Section -->
            <div class="bg-[#385327] mr-[-180px]">
                <!-- Tab Navigation -->
                <div class="flex text-white">
                    <x-resbar href="/RepPersonData" active="{{ request()->is('RepPerData') }}" id="repperdataBtn">Reporting Person Data</x-resbar>
                    <x-resbar href="/SuspectData" active="{{ request()->is('SusData') }}" id="SusDataBtn">Suspect Data</x-resbar>
                    <x-resbar href="/VictimData" active="{{ request()->is('VicData') }}" id="SVicDataBtn">Victim Data</x-resbar>
                    <x-resbar href="/ChildLaw" active="{{ request()->is('ChildLaw') }}" id="ChildLawBtn">For Children in Conflict with the law</x-resbar>
                    <x-resbar href="/Narative" active="{{ request()->is('NarativeData') }}" id="NarativeBtn">Narative</x-resbar>
                    <x-resbar href="/IncidentReport" active="{{ request()->is('IncidentReport') }}" id="IncidentReporteBtn">Incident Report Receipt</x-resbar>
                </div>
                <x-SusData></x-SusData>
                
            </div>
        </div>
    </div>

    
</body>
</html>
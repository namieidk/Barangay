<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>BRGY INCIO, DAVAO CITY SYSTEM</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body class="min-h-screen bg-gray-100 flex font-sans">
    <!-- Sidebar -->
    <x-sidebar></x-sidebar>

    <!-- Main Content Area -->
    <div class="flex-1 ml-64 pt-20">
        <!-- Header Section -->
        <header class="fixed top-0 left-64 w-[calc(100%-16rem)] h-20 bg-[#5A7A46] text-white flex items-center justify-between px-6 shadow-lg z-50">
            <div class="flex items-center space-x-4">
                <label for="search" class="text-sm font-medium">Blotter Entry Number:</label>
                <input 
                    type="text" 
                    id="search" 
                    name="search" 
                    class="p-2 rounded-lg bg-white text-gray-800 w-40 h-9 focus:outline-none focus:ring-2 focus:ring-[#3d8257] transition"
                    placeholder="Enter number..."
                >
                <label for="filter" class="text-sm font-medium">Type of Incident:</label>
                <input 
                    type="text" 
                    id="filter" 
                    name="filter" 
                    class="p-2 rounded-lg bg-white text-gray-800 w-60 h-9 focus:outline-none focus:ring-2 focus:ring-[#3d8257] transition"
                    placeholder="Enter incident type..."
                >
            </div>
        </header>

        <!-- Main Content -->
        <div class="p-10 w-full max-w-6xl mx-auto">
            <div class="bg-white rounded-xl shadow-xl overflow-hidden">
                <!-- Tab Navigation -->
                <nav class="flex border-b border-gray-200 bg-[#301f17] text-white">
                    <x-resbar href="/RepPersonData" active="{{ request()->is('RepPerData') }}" id="repperdataBtn" class="px-6 py-4 text-sm font-medium hover:bg-[#4a2f25] transition-colors">
                        Reporting Person Data
                    </x-resbar>
                    <x-resbar href="/SuspectData" active="{{ request()->is('SusData') }}" id="SusDataBtn" class="px-6 py-4 text-sm font-medium hover:bg-[#4a2f25] transition-colors">
                        Suspect Data
                    </x-resbar>
                    <x-resbar href="/VictimData" active="{{ request()->is('VicData') }}" id="VicDataBtn" class="px-6 py-4 text-sm font-medium hover:bg-[#4a2f25] transition-colors">
                        Victim Data
                    </x-resbar>
                    <x-resbar href="/ChildLaw" active="{{ request()->is('ChildLaw') }}" id="ChildLawBtn" class="px-6 py-4 text-sm font-medium hover:bg-[#4a2f25] transition-colors">
                        For Children in Conflict with the Law
                    </x-resbar>
                    <x-resbar href="/Narative" active="{{ request()->is('NarativeData') }}" id="NarativeBtn" class="px-6 py-4 text-sm font-medium hover:bg-[#4a2f25] transition-colors">
                        Narrative
                    </x-resbar>
                    <x-resbar href="/IncidentReport" active="{{ request()->is('IncidentReport') }}" id="IncidentReporteBtn" class="px-6 py-4 text-sm font-medium hover:bg-[#4a2f25] transition-colors">
                        Incident Report Receipt
                    </x-resbar>
                </nav>

                <!-- Content Area -->
                <div class="p-6 bg-gray-50">
                    <x-RepPerData class="w-full"></x-RepPerData>
                </div>
            </div>
        </div>
    </div>

    <!-- Inline Styles for Additional Customization -->
    <style>
        /* Customizing the active tab */
        [active="true"] {
            background-color: #4a2f25;
            border-bottom: 3px solid #fac33b;
        }

        /* Smooth scrollbar */
        ::-webkit-scrollbar {
            width: 8px;
        }
        ::-webkit-scrollbar-track {
            background: #f1f1f1;
            border-radius: 4px;
        }
        ::-webkit-scrollbar-thumb {
            background: #5A7A46;
            border-radius: 4px;
        }
        ::-webkit-scrollbar-thumb:hover {
            background: #3d8257;
        }

        /* Responsive adjustments */
        @media (max-width: 768px) {
            .ml-64 {
                margin-left: 0;
            }
            header {
                left: 0;
                width: 100%;
                flex-direction: column;
                height: auto;
                padding: 1rem;
            }
            .flex-1 {
                padding-top: 8rem;
            }
            nav {
                flex-wrap: wrap;
            }
            [x-resbar] {
                flex: 1 1 50%;
                text-align: center;
            }
        }
    </style>
</body>
</html>
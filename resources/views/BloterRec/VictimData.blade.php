<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>BRGY INCIO, DAVAO CITY SYSTEM</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body class="bg-gray-100 min-h-screen flex font-sans antialiased">
    <!-- Sidebar -->
    <x-sidebar></x-sidebar>

    <!-- Main Content Area -->
    <div class="flex-1 ml-64">
        <!-- Header Section -->
        <header class="fixed top-0 left-64 w-[calc(100%-16rem)] h-20 bg-[#2d6a4f] text-white flex items-center px-6 shadow-lg z-50">
            <div class="flex items-center space-x-4 w-full max-w-6xl mx-auto">
                <label for="search" class="text-sm font-medium">Blotter Entry Number:</label>
                <input 
                    type="text" 
                    id="search" 
                    name="search" 
                    class="p-2 rounded-lg bg-white text-gray-800 w-40 h-9 focus:outline-none focus:ring-2 focus:ring-[#52b788] transition-all placeholder-gray-400"
                    placeholder="Enter number..."
                >
                <label for="filter" class="text-sm font-medium">Type of Incident:</label>
                <input 
                    type="text" 
                    id="filter" 
                    name="filter" 
                    class="p-2 rounded-lg bg-white text-gray-800 w-60 h-9 focus:outline-none focus:ring-2 focus:ring-[#52b788] transition-all placeholder-gray-400"
                    placeholder="Enter incident type..."
                >
            </div>
        </header>

        <!-- Main Content -->
        <main class="pt-24 pb-10 px-10 flex-1">
            <div class="w-full max-w-6xl mx-auto">
                <div class="bg-white rounded-xl shadow-lg overflow-hidden">
                    <!-- Tab Navigation -->
                    <nav class="flex bg-[#1f2a44] text-white border-b border-gray-700">
                        <x-resbar href="/RepPersonData" active="{{ request()->is('RepPerData') }}" id="repperdataBtn" class="px-6 py-4 text-sm font-medium hover:bg-[#2d3748] transition-all duration-200">
                            Reporting Person Data
                        </x-resbar>
                        <x-resbar href="/SuspectData" active="{{ request()->is('SusData') }}" id="SusDataBtn" class="px-6 py-4 text-sm font-medium hover:bg-[#2d3748] transition-all duration-200">
                            Suspect Data
                        </x-resbar>
                        <x-resbar href="/VictimData" active="{{ request()->is('VicData') }}" id="SVicDataBtn" class="px-6 py-4 text-sm font-medium hover:bg-[#2d3748] transition-all duration-200">
                            Victim Data
                        </x-resbar>
                        <x-resbar href="/ChildLaw" active="{{ request()->is('ChildLaw') }}" id="ChildLawBtn" class="px-6 py-4 text-sm font-medium hover:bg-[#2d3748] transition-all duration-200">
                            For Children in Conflict with the Law
                        </x-resbar>
                        <x-resbar href="/Narative" active="{{ request()->is('NarativeData') }}" id="NarativeBtn" class="px-6 py-4 text-sm font-medium hover:bg-[#2d3748] transition-all duration-200">
                            Narrative
                        </x-resbar>
                        <x-resbar href="/IncidentReport" active="{{ request()->is('IncidentReport') }}" id="IncidentReporteBtn" class="px-6 py-4 text-sm font-medium hover:bg-[#2d3748] transition-all duration-200">
                            Incident Report Receipt
                        </x-resbar>
                    </nav>

                    <!-- Content Area -->
                    <div class="p-8 bg-gray-50">
                        <x-VicData class="w-full"></x-VicData>
                    </div>
                </div>
            </div>
        </main>
    </div>

    <!-- Inline Styles for Additional Customization -->
    <style>
        /* Typography */
        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
        }

        /* Active Tab Styling */
        [active="true"] {
            background-color: #2d3748;
            border-bottom: 3px solid #52b788;
            color: #ffffff;
        }

        /* Header */
        header {
            background: linear-gradient(90deg, #2d6a4f 0%, #1f4b38 100%);
        }

        /* Inputs */
        input {
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.05);
        }

        input:focus {
            box-shadow: 0 0 0 3px rgba(82, 183, 136, 0.2);
        }

        /* Scrollbar */
        ::-webkit-scrollbar {
            width: 8px;
        }
        ::-webkit-scrollbar-track {
            background: #e2e8f0;
            border-radius: 4px;
        }
        ::-webkit-scrollbar-thumb {
            background: #2d6a4f;
            border-radius: 4px;
        }
        ::-webkit-scrollbar-thumb:hover {
            background: #1f4b38;
        }

        /* Responsive Design */
        @media (max-width: 1024px) {
            .ml-64 {
                margin-left: 0;
            }
            header {
                left: 0;
                width: 100%;
                padding: 1rem;
            }
            .pt-24 {
                padding-top: 6rem;
            }
            .max-w-6xl {
                max-width: 100%;
                margin-left: 1rem;
                margin-right: 1rem;
            }
        }

        @media (max-width: 768px) {
            header {
                flex-direction: column;
                height: auto;
                align-items: flex-start;
                gap: 1rem;
            }
            nav {
                flex-wrap: wrap;
            }
            [x-resbar] {
                flex: 1 1 50%;
                text-align: center;
            }
            .px-10 {
                padding-left: 1rem;
                padding-right: 1rem;
            }
        }

        @media (max-width: 480px) {
            [x-resbar] {
                flex: 1 1 100%;
            }
            input {
                width: 100% !important;
            }
        }
    </style>
</body>
</html>
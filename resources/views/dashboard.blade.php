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
        .bg-black-50-opacity {
            background-color: rgba(2, 3, 1, 0.5);
        }
    </style>
</head>
<body class="bg-4A6936-50-opacity min-h-screen flex">
    <!-- Header -->
    <div class="fixed top-0 left-64 w-[calc(100%-16rem)] bg-[#5A7A46] text-white p-4 text-2xl font-bold z-50 text-center">
        BRGY INCIO, DAVAO CITY SYSTEM
    </div>

    <!-- Sidebar -->
    <aside id="logo-sidebar" class="fixed top-0 left-0 z-40 w-64 h-screen transition-transform -translate-x-full sm:translate-x-0" aria-label="Sidebar">
        <div class="h-full px-3 py-4 overflow-y-auto bg-[#4A6936] text-white flex flex-col">
            <!-- Logo -->
            <div class="flex justify-center" style="margin-top: 100;">
                <div class="w-100 h-100 rounded-full flex items-center justify-center">
                    <img src="{{ asset('/logo.png') }}" class="h-100 w-100 rounded-full" alt="Logo" />
                </div>
            </div>
            
            <!-- Navigation Menu -->
            <ul class="space-y-4 font-medium flex-1">
                <li>
                    <a href="dashboard" class="flex items-center p-2 rounded-lg hover:bg-[#5A7A46] group">
                        <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                            <path d="m19.707 9.293-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L2 10.414V18a2 2 0 0 0 2 2h3a1 1 0 0 0 1-1v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 0 1 1h3a2 2 0 0 0 2-2v-7.586l.293.293a1 1 0 0 0 1.414-1.414Z"/>
                        </svg>
                        <span class="ms-3">Home</span>
                    </a>
                </li>
                <li>
                    <a href="NewRes" class="flex items-center p-2 rounded-lg hover:bg-[#5A7A46] group">
                        <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M14 2a3.963 3.963 0 0 0-1.4.267 6.439 6.439 0 0 1-1.331 6.638A4 4 0 1 0 14 2Zm1 9h-1.264A6.957 6.957 0 0 1 15 15v2a2.97 2.97 0 0 1-.184 1H19a1 1 0 0 0 1-1v-1a5.006 5.006 0 0 0-5-5ZM6.5 9a4.5 4.5 0 1 0 0-9 4.5 4.5 0 0 0 0 9ZM8 10H5a5.006 5.006 0 0 0-5 5v2a1 1 0 0 0 1 1h11a1 1 0 0 0 1-1v-2a5.006 5.006 0 0 0-5-5Z"/>
                        </svg>
                        <span class="ms-3">New Residence</span>
                    </a>
                </li>
                <li>
                    <a href="#" class="flex items-center p-2 rounded-lg hover:bg-[#5A7A46] group">
                        <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M5 5V.13a2.96 2.96 0 0 0-1.293.749L.879 3.707A2.96 2.96 0 0 0 .13 5H5Z"/>
                            <path d="M6.737 11.061a2.961 2.961 0 0 1 .81-1.515l6.117-6.116A4.839 4.839 0 0 1 16 2.141V2a1.97 1.97 0 0 0-1.933-2H7v5a2 2 0 0 1-2 2H0v11a1.969 1.969 0 0 0 1.933 2h12.134A1.97 1.97 0 0 0 16 18v-3.093l-1.546 1.546c-.413.413-.94.695-1.513.81l-3.4.679a2.947 2.947 0 0 1-1.85-.227 2.96 2.96 0 0 1-1.635-3.257l.681-3.397Z"/>
                        </svg>
                        <span class="ms-3">Residence Records</span>
                    </a>
                </li>
                <li>
                    <a href="#" class="flex items-center p-2 rounded-lg hover:bg-[#5A7A46] group">
                        <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M9 2a1 1 0 0 0-1 1v1H5a1 1 0 0 0-1 1v14a1 1 0 0 0 1 1h10a1 1 0 0 0 1-1V5a1 1 0 0 0-1-1h-3V3a1 1 0 0 0-1-1H9Zm0 2h2v1H9V4Zm-5 2h3v1h6V6h3v12H4V6Zm7 5a1 1 0 1 1-2 0 1 1 0 0 1 2 0Zm-4 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0Zm8 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0Zm-4 4a1 1 0 1 1-2 0 1 1 0 0 1 2 0Zm-4 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0Zm8 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0Z"/>
                        </svg>
                        <span class="ms-3">Blotter Records</span>
                    </a>
                </li>
                <li>
                    <a href="#" class="flex items-center p-2 rounded-lg hover:bg-[#5A7A46] group">
                        <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M18 0H2a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2ZM5 12a1 1 0 1 1 0-2 1 1 0 0 1 0 2Zm0-3a1 1 0 1 1 0-2 1 1 0 0 1 0 2Zm0-3a1 1 0 1 1 0-2 1 1 0 0 1 0 2Zm10 6H9a1 1 0 0 1 0-2h6a1 1 0 0 1 0 2Zm0-3H9a1 1 0 0 1 0-2h6a1 1 0 0 1 0 2Zm0-3H9a1 1 0 0 1 0-2h6a1 1 0 0 1 0 2Z"/>
                        </svg>
                        <span class="ms-3">Residence List</span>
                    </a>
                </li>
                <li>
                    <a href="#" class="flex items-center p-2 rounded-lg hover:bg-[#5A7A46] group">
                        <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M16 0H4a2 2 0 0 0-2 2v1H1a1 1 0 0 0 0 2h1v2H1a1 1 0 0 0 0 2h1v2H1a1 1 0 0 0 0 2h1v2H1a1 1 0 0 0 0 2h1v1a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2Zm-5.5 4.5a3 3 0 1 1 0 6 3 3 0 0 1 0-6ZM13.929 17H7.071a.5.5 0 0 1-.5-.5 3.935 3.935 0 0 1 3.929-3.929h.142A3.935 3.935 0 0 1 14.429 16.5a.5.5 0 0 1-.5.5Z"/>
                        </svg>
                        <span class="ms-3">Reports</span>
                    </a>
                </li>
                <li>
                    <a href="#" class="flex items-center p-2 rounded-lg hover:bg-[#5A7A46] group">
                        <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M18 7.5h-.423l-.452-1.09.3-.3a1.5 1.5 0 0 0 0-2.121L16.01 2.575a1.5 1.5 0 0 0-2.121 0l-.3.3-1.089-.452V2A1.5 1.5 0 0 0 11 .5H9A1.5 1.5 0 0 0 7.5 2v.423l-1.09.452-.3-.3a1.5 1.5 0 0 0-2.121 0L2.576 3.99a1.5 1.5 0 0 0 0 2.121l.3.3L2.423 7.5H2A1.5 1.5 0 0 0 .5 9v2A1.5 1.5 0 0 0 2 12.5h.423l.452 1.09-.3.3a1.5 1.5 0 0 0 0 2.121l1.415 1.413a1.5 1.5 0 0 0 2.121 0l.3-.3 1.09.452V18A1.5 1.5 0 0 0 9 19.5h2a1.5 1.5 0 0 0 1.5-1.5v-.423l1.09-.452.3.3a1.5 1.5 0 0 0 2.121 0l1.415-1.414a1.5 1.5 0 0 0 0-2.121l-.3-.3.452-1.09H18a1.5 1.5 0 0 0 1.5-1.5V9A1.5 1.5 0 0 0 18 7.5Zm-8 6a3.5 3.5 0 1 1 0-7 3.5 3.5 0 0 1 0 7Z"/>
                        </svg>
                        <span class="ms-3">Settings</span>
                    </a>
                </li>
                <li>
                    <a href="#" class="flex items-center p-2 rounded-lg hover:bg-[#5A7A46] group">
                        <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 16">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 8h11m0 0L8 4m4 4-4 4m4-11h3a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2h-3"/>
                        </svg>
                        <span class="ms-3">Logout</span>
                    </a>
                </li>
            </ul>
            
            <!-- Date and Time -->
            <div class="text-center mt-auto pt-4">
                <div class="text-sm">{{ date('n/j/Y') }}</div>
                <div class="text-xl font-semibold mt-1">{{ date('g:i:sA') }}</div>
            </div>
        </div>
    </aside>

    <!-- Main Content Area -->
    <div class="flex-1 ml-10 pt-20">
        <div class="p-10 w-full max-w-5xl mx-auto">
            <!-- Dashboard Heading -->
            <h1 class="text-5xl font-bold mb-4 pl-0">Dashboard</h1>

            <!-- Flex Container for Table and Cards -->
            <div class="flex flex-row gap-6">
                <!-- Table Section (Left Side) -->
                <div class="w-[600px] h-[500px] overflow-hidden">
                    <div class="bg-[#385327] p-4">
                        <h1 class="text-[#ffffff] text-3xl font-bold">Current Barangay Officials</h1>
                    </div>
                    <div class="bg-[#4A6936] text-[#ffffff] grid grid-cols-3 p-4">
                        <div class="font-medium">Full Name</div>
                        <div class="font-medium">Committee</div>
                        <div class="font-medium">Position</div>
                    </div>
                    <div class="bg-[#77a659] h-[calc(100%-112px)]">
                        <!-- Adjusted height to fit within 500px; data rows can be added here -->
                    </div>
                </div>

                <!-- Cards Section (Right Side) -->
                <div class="container pl-10 max-w-md flex-1 mr-[-300px] mt-[-80px]">
                    <div class="mb-8 text-center">
                        <h1 class="text-3xl font-bold text-[#073f03] mb-2">Residents Record</h1>
                        <div class="border-b-2 border-[#073f03] max-w-md mx-auto"></div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-8">
                        <div class="bg-[#77a659] p-6 rounded-sm">
                            <h2 class="text-lg font-bold text-black mb-4">Total Population</h2>
                            <svg class="w-12 h-12 mt-[30px] ml-[-20px] text-[#073f03]" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                            </svg>
                        </div>

                        <!-- Male Card -->
                        <div class="bg-[#77a659] p-6 rounded-sm">
                            <h2 class="text-xl font-bold text-black mb-4 text-center">Male</h2>
                            <svg class="w-12 h-12 mt-[30px] ml-[-20px] text-[#073f03]" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                            </svg>
                        </div>

                        <!-- Registered Voter Card -->
                        <div class="bg-[#77a659] p-6 rounded-sm">
                            <h2 class="text-lg font-bold text-black mb-4">Registered Voter</h2>
                            <svg class="w-12 h-12" width="48" height="35" viewBox="0 0 48 35" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <g style="mix-blend-mode:overlay">
                                    <path d="M10.3545 25.8733H6.41921L2 33.1437H45.1203L40.7011 25.8733H38.9624" stroke="#073f03" stroke-width="3.44" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M28.6704 13.2092L15.293 9.23877L9.10449 30.0868H37.7123L41.5844 17.0428L32.6917 14.403" stroke="#073f03" stroke-width="3.44" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M33.68 7.63834C32.8332 9.33175 29.5083 12.1404 29.2191 12.5741C28.93 13.0078 26.4931 15.1348 28.1247 16.4979C29.7562 17.861 32.317 14.5773 33.143 14.0197C33.9689 13.4621 38.0169 12.3675 38.8842 11.6448C39.7515 10.9221 40.9493 10.1578 41.2591 9.3937L39.5657 4.02371C39.5657 4.02371 32.2756 3.89936 31.305 4.02371C30.3343 4.14807 26.2584 9.60206 26.8649 11.2311C27.5877 13.1726 30.0933 11.6907 30.0933 11.6907" stroke="#073f03" stroke-width="3.44" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M39.5649 4.02477L43.3861 2L46.0903 9.23874L41.2585 9.39363" stroke="#073f03" stroke-width="3.44" stroke-linecap="round" stroke-linejoin="round"/>
                                </g>
                            </svg>
                        </div>

                        <!-- Female Card -->
                        <div class="bg-[#77a659] p-6 rounded-sm">
                            <h2 class="text-xl font-bold text-black mb-4 text-center">Female</h2>
                            <svg class="w-12 h-12 mt-[30px] ml-[-20px] text-[#073f03]" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 12a4 4 0 100-8 4 4 0 000 8zm-2 2a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                            </svg>
                        </div>
                    </div>

                    <!-- Blotter Records Summary -->
                    <div class="mb-8 text-center">
                        <h1 class="text-3xl font-bold text-[#073f03] mb-2">Blotter Records Summary</h1>
                        <div class="border-b-2 border-[#073f03] max-w-md mx-auto"></div>
                    </div>

                    <!-- Bottom Row of Cards -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <!-- Settled Cases Card -->
                        <div class="border border-[#96bb7e] rounded-sm overflow-hidden bg-[#d1e2c4]">
                            <div class="bg-[#96bb7e] p-4 mt-4">
                                <h2 class="text-lg font-bold text-black text-center">Settled Cases</h2>
                            </div>
                            <div class="h-20 p-2"></div>
                        </div>

                        <!-- Schedule Cases Card -->
                        <div class="border border-[#96bb7e] rounded-sm overflow-hidden bg-[#d1e2c4]">
                            <div class="bg-[#96bb7e] p-4 mt-4">
                                <h2 class="text-lg font-bold text-black text-center">Schedule Cases</h2>
                            </div>
                            <div class="h-20 p-2"></div>
                        </div>

                        <!-- Unsettled Cases Card -->
                        <div class="border border-[#96bb7e] rounded-sm overflow-hidden bg-[#d1e2c4]">
                            <div class="bg-[#96bb7e] p-4 mt-4">
                                <h2 class="text-lg font-bold text-black text-center">Unsettled Cases</h2>
                            </div>
                            <div class="h-20 p-2"></div>
                        </div>

                        <!-- Unscheduled Cases Card -->
                        <div class="border border-[#96bb7e] rounded-sm overflow-hidden bg-[#d1e2c4]">
                            <div class="bg-[#96bb7e] p-4 mt-4">
                                <h2 class="text-sm font-bold text-black text-center">Unscheduled Cases</h2>
                            </div>
                            <div class="h-20 p-2"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
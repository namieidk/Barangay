<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BRGY INCIO, DAVAO CITY SYSTEM - Reports</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    @vite (['resources/css/app.css', 'resources/js/app.js'])
    <style>
        /* Basic Tailwind-like styles */
        body { 
            background-color: #f9fafb; 
            min-height: 100vh; 
            display: flex; 
            font-family: sans-serif;
            margin: 0;
            padding: 0;
        }
        .bg-gray-50 { background-color: #f9fafb; }
        .bg-white { background-color: #ffffff; }
        .bg-green-700 { background-color: #15803d; }
        .bg-green-50 { background-color: #f0fdf4; }
        .bg-blue-50 { background-color: #eff6ff; }
        .bg-purple-50 { background-color: #faf5ff; }
        .bg-gray-100 { background-color: #f3f4f6; }
        .bg-yellow-50 { background-color: #fefce8; }
        .text-white { color: #ffffff; }
        .text-gray-500 { color: #6b7280; }
        .text-gray-700 { color: #374151; }
        .text-gray-800 { color: #1f2937; }
        .text-green-700 { color: #15803d; }
        .text-green-100 { color: #dcfce7; }
        .text-blue-700 { color: #1d4ed8; }
        .text-purple-700 { color: #7e22ce; }
        .text-yellow-700 { color: #a16207; }
        .text-sm { font-size: 0.875rem; }
        .text-xs { font-size: 0.75rem; }
        .text-lg { font-size: 1.125rem; }
        .text-xl { font-size: 1.25rem; }
        .text-4xl { font-size: 2.25rem; }
        .font-medium { font-weight: 500; }
        .font-semibold { font-weight: 600; }
        .font-bold { font-weight: 700; }
        .flex { display: flex; }
        .flex-1 { flex: 1 1 0%; }
        .flex-col { flex-direction: column; }
        .items-center { align-items: center; }
        .justify-between { justify-content: space-between; }
        .justify-center { justify-content: center; }
        .justify-end { justify-content: flex-end; }
        .w-full { width: 100%; }
        .max-w-5xl { max-width: 64rem; }
        .mx-auto { margin-left: auto; margin-right: auto; }
        .mx-2 { margin-left: 0.5rem; margin-right: 0.5rem; }
        .mr-2 { margin-right: 0.5rem; }
        .mr-3 { margin-right: 0.75rem; }
        .mb-2 { margin-bottom: 0.5rem; }
        .mb-4 { margin-bottom: 1rem; }
        .mb-6 { margin-bottom: 1.5rem; }
        .mb-8 { margin-bottom: 2rem; }
        .mt-0 { margin-top: 0; }
        .mt-2 { margin-top: 0.5rem; }
        .mt-6 { margin-top: 1.5rem; }
        .mt-8 { margin-top: 2rem; }
        .ml-64 { margin-left: 16rem; }
        .p-1 { padding: 0.25rem; }
        .p-2 { padding: 0.5rem; }
        .p-3 { padding: 0.75rem; }
        .p-4 { padding: 1rem; }
        .p-6 { padding: 1.5rem; }
        .pt-4 { padding-top: 1rem; }
        .px-5 { padding-left: 1.25rem; padding-right: 1.25rem; }
        .py-2 { padding-top: 0.5rem; padding-bottom: 0.5rem; }
        .py-3 { padding-top: 0.75rem; padding-bottom: 0.75rem; }
        .pr-6 { padding-right: 1.5rem; }
        .pl-6 { padding-left: 1.5rem; }
        .space-y-1 > * + * { margin-top: 0.25rem; }
        .space-x-3 > * + * { margin-left: 0.75rem; }
        .space-x-4 > * + * { margin-left: 1rem; }
        .space-x-2 > * + * { margin-left: 0.5rem; }
        .rounded-lg { border-radius: 0.5rem; }
        .rounded-xl { border-radius: 0.75rem; }
        .border { border-width: 1px; }
        .border-b { border-bottom-width: 1px; }
        .border-r { border-right-width: 1px; }
        .border-t { border-top-width: 1px; }
        .border-gray-100 { border-color: #f3f4f6; }
        .border-gray-200 { border-color: #e5e7eb; }
        .border-gray-300 { border-color: #d1d5db; }
        .shadow-lg { box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05); }
        .shadow-sm { box-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.05); }
        .overflow-hidden { overflow: hidden; }
        .text-left { text-align: left; }
        .text-center { text-align: center; }
        .transition { transition-property: background-color, border-color, color, fill, stroke, opacity, box-shadow, transform; transition-timing-function: cubic-bezier(0.4, 0, 0.2, 1); transition-duration: 150ms; }
        .focus\:outline-none:focus { outline: 2px solid transparent; outline-offset: 2px; }
        .focus\:ring-2:focus { box-shadow: 0 0 0 2px rgba(59, 130, 246, 0.5); }
        .focus\:ring-green-200:focus { box-shadow: 0 0 0 2px rgba(187, 247, 208, 0.5); }
        .hover\:bg-green-50:hover { background-color: #f0fdf4; }
        .hover\:bg-blue-100:hover { background-color: #dbeafe; }
        .hover\:bg-purple-100:hover { background-color: #f3e8ff; }
        .hover\:bg-green-100:hover { background-color: #dcfce7; }
        .hover\:bg-gray-200:hover { background-color: #e5e7eb; }
        .hover\:bg-green-700:hover { background-color: #15803d; }
        .hover\:bg-yellow-100:hover { background-color: #fef9c3; }
        .hover\:text-green-700:hover { color: #15803d; }
        .hover\:text-yellow-700:hover { color: #a16207; }
        .inline { display: inline; }
        .divide-y > * + * { border-top-width: 1px; }
        .divide-gray-100 { border-color: #f3f4f6; }
        .hidden { display: none; }
        .block { display: block; }
        .cursor-pointer { cursor: pointer; }
        .page-header {
            padding-top: 1rem;
            padding-bottom: 0.5rem;
            margin-bottom: 1rem;
        }
        .main-content {
            flex: 1;
            margin-left: 16rem; /* Width of sidebar */
            padding: 1.5rem;
        }
        /* For small screens, hide sidebar by default */
        @media (max-width: 640px) {
            .main-content {
                margin-left: 0;
            }
        }
        /* Table styles */
        .archive-table {
            width: 100%;
            border-collapse: collapse;
        }
        .archive-table th,
        .archive-table td {
            padding: 0.75rem;
            text-align: left;
            border-bottom: 1px solid #e5e7eb;
        }
        .archive-table th {
            background-color: #f9fafb;
            font-weight: 600;
            color: #374151;
        }
        .archive-table tr:hover {
            background-color: #f0fdf4;
        }
    </style>
    <script>
        // Function to toggle archive table visibility
        function toggleArchiveTable() {
            const archiveTable = document.getElementById('archiveTable');
            const mainPreview = document.getElementById('mainPreview');
            
            if (archiveTable.classList.contains('hidden')) {
                archiveTable.classList.remove('hidden');
                archiveTable.classList.add('block');
                mainPreview.classList.add('hidden');
            } else {
                archiveTable.classList.add('hidden');
                archiveTable.classList.remove('block');
                mainPreview.classList.remove('hidden');
            }
        }
    </script>
</head>
<body class="bg-gray-50 min-h-screen flex font-sans">
    <!-- Mobile toggle button -->
    <button data-drawer-target="logo-sidebar" data-drawer-toggle="logo-sidebar" aria-controls="logo-sidebar" type="button" class="inline-flex items-center p-2 mt-2 ms-3 text-sm text-white rounded-lg sm:hidden hover:bg-[#5A7A46] focus:outline-none focus:ring-2 focus:ring-gray-200">
       <span class="sr-only">Open sidebar</span>
       <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
          <path clip-rule="evenodd" fill-rule="evenodd" d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z"></path>
       </svg>
    </button>
    
    <x-sidebar></x-sidebar>

    <!-- Main Content -->
    <div class="main-content">
        <!-- Page Header -->
        <div class="page-header">
            <h1 class="text-4xl font-bold text-gray-800 mt-0">Reports Management</h1>
        </div>
        
        <div class="w-full max-w-5xl mx-auto">
            <!-- Main Reports Card -->
            <div class="bg-white rounded-xl shadow-lg overflow-hidden">
                <!-- Card Header -->
                <div class="bg-[#537B2F] p-4 text-white">
                    <h2 class="text-xl font-semibold">Barangay Document Reports</h2>
                    <p class="text-green-100 text-sm">Generate, view, and print official barangay documents</p>
                </div>

                <!-- Card Content -->
                <div class="flex flex-col md:flex-row p-6">
                    <!-- Left Sidebar - Report Types -->
                    <div class="w-full md:w-1/3 md:pr-6 md:border-r border-gray-200 mb-6 md:mb-0">
                        <h3 class="text-lg font-medium text-gray-700 mb-4">Select Document Type</h3>
                        
                        <div class="space-y-1">
                            <div class="flex items-center w-full p-3 rounded-lg hover:bg-green-50 text-left transition duration-150 text-gray-700 hover:text-green-700 font-medium bg-green-50 text-green-700">
                                <i class="fas fa-file-alt mr-3 text-green-600"></i>
                                Residents Information Report
                            </div>
                            
                            <div class="flex items-center w-full p-3 rounded-lg hover:bg-green-50 text-left transition duration-150 text-gray-700 hover:text-green-700 font-medium">
                                <i class="fas fa-certificate mr-3 text-gray-500"></i>
                                Barangay Clearance Report
                            </div>
                            
                            <div class="flex items-center w-full p-3 rounded-lg hover:bg-green-50 text-left transition duration-150 text-gray-700 hover:text-green-700 font-medium">
                                <i class="fas fa-hand-holding-heart mr-3 text-gray-500"></i>
                                Barangay Indigency Report
                            </div>
                            
                            <div class="flex items-center w-full p-3 rounded-lg hover:bg-green-50 text-left transition duration-150 text-gray-700 hover:text-green-700 font-medium">
                                <i class="fas fa-store mr-3 text-gray-500"></i>
                                Business Permit Report
                            </div>
                            
                            <div class="flex items-center w-full p-3 rounded-lg hover:bg-green-50 text-left transition duration-150 text-gray-700 hover:text-green-700 font-medium">
                                <i class="fas fa-home mr-3 text-gray-500"></i>
                                Certificate of Residency Report
                            </div>
                            
                            <!-- Archive Button - Added in document type section -->
                            <div onclick="toggleArchiveTable()" class="flex items-center w-full p-3 rounded-lg hover:bg-yellow-100 text-left transition duration-150 text-yellow-700 hover:text-yellow-700 font-medium cursor-pointer">
                                <i class="fas fa-archive mr-3 text-yellow-700"></i>
                                Archived Reports
                            </div>
                        </div>
                    </div>
                    
                    <!-- Right Content - Document Preview -->
                    <div class="w-full md:w-2/3 md:pl-6">
                        <!-- Main Preview Section -->
                        <div id="mainPreview">
                            <div class="flex justify-between items-center mb-6">
                                <h3 class="text-lg font-medium text-gray-700">Document Preview</h3>
                                
                                <div class="flex space-x-3">
                                    <a href="{{ route('reports.residents_information.download.pdf') }}" class="p-2 bg-blue-50 rounded-lg text-blue-700 hover:bg-blue-100 transition" title="Download PDF">
                                        <i class="fas fa-file-pdf"></i>
                                    </a>
                                    <span class="p-2 bg-green-50 rounded-lg text-green-700 hover:bg-green-100 transition" title="Print Document">
                                        <i class="fas fa-print"></i>
                                    </span>
                                    <span class="p-2 bg-purple-50 rounded-lg text-purple-700 hover:bg-purple-100 transition" title="Email Document">
                                        <i class="fas fa-envelope"></i>
                                    </span>
                                </div>
                            </div>
                            
                            <!-- Document Name -->
                            <div class="text-center mb-4">
                                <span class="text-sm text-gray-500">PREVIEW OF</span>
                                <h4 class="text-lg font-bold text-gray-800">Residents Information Report</h4>
                            </div>
                            
                            <!-- Document Preview Box -->
                            <div class="border border-gray-300 rounded-lg overflow-hidden bg-white shadow-sm">
                                <div class="bg-gray-50 p-2 border-b text-xs text-gray-500 flex justify-between">
                                    <span>Document ID: RPT-123-20250429</span>
                                    <span>Last Updated: April 29, 2025</span> {{-- This header part can be dynamic later too --}}
                                </div>

                                <div class="w-full h-[520px] overflow-y-auto bg-white"> {{-- Ensured bg-white and fixed width from parent is md:w-[400px] --}}
                                    @if(isset($activeReportType) && $activeReportType == 'residents_information')
                                        @if(isset($residents) && $residents->count() > 0)
                                            @include('reports_partials._residents_information_preview', ['residents' => $residents])
                                        @else
                                            <div class="p-6 flex items-center justify-center h-full text-gray-500">
                                                No residents data available for preview.
                                            </div>
                                        @endif
                                    @else
                                        {{-- Placeholder for other report types or default message --}}
                                        <div class="p-6 flex items-center justify-center h-full text-gray-500">
                                            <p class="text-center">
                                                Select a report type from the left to see a preview.
                                                <br><span class="text-xs">(Currently, only "Residents Information Report" preview is active for demo)</span>
                                            </p>
                                        </div>
                                    @endif
                                </div>
                            </div>
                            
                            <!-- Action Buttons -->
                            <div class="mt-6 flex justify-end space-x-4">
                                <a href="#" class="px-5 py-2 bg-gray-100 rounded-lg text-gray-700 hover:bg-gray-200 transition font-medium">
                                    <i class="fas fa-eye mr-2"></i> View Full Document
                                </a>
                                <a href="#" class="px-5 py-2 bg-[#e6ffe6] rounded-lg text-dark hover:bg-[#d4f7d4] transition font-medium">
                                    <i class="fas fa-pen mr-2"></i> Edit Document
                                </a>
                            </div>
                        </div>
                        
                        <!-- Archive Table - Hidden by default -->
                        <div id="archiveTable" class="hidden">
                            <div class="flex justify-between items-center mb-6">
                                <h3 class="text-lg font-medium text-gray-700">Archived Reports</h3>
                                
                                <div class="flex space-x-3">
                                    <button onclick="toggleArchiveTable()" class="p-2 bg-gray-100 rounded-lg text-gray-700 hover:bg-gray-200 transition" title="Back to Document Preview">
                                        <i class="fas fa-arrow-left"></i>
                                    </button>
                                </div>
                            </div>
                            
                            <div class="bg-white rounded-lg border border-gray-300 shadow-sm overflow-hidden">
                                <div class="p-4 bg-gray-50 border-b border-gray-200">
                                    <h3 class="font-medium text-gray-700">Archived Residents Information Reports</h3>
                                </div>
                                <div class="p-4">
                                    <table class="archive-table">
                                        <thead>
                                            <tr>
                                                <th>Document ID</th>
                                                <th>Resident Name</th>
                                                <th>Date Created</th>
                                                <th>Status</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>RPT-122-20250428</td>
                                                <td>Juan Dela Cruz</td>
                                                <td>April 28, 2025</td>
                                                <td>Archived</td>
                                                <td>
                                                    <div class="flex space-x-2">
                                                        <span class="p-1 bg-blue-50 rounded-lg text-blue-700 hover:bg-blue-100 transition cursor-pointer" title="View">
                                                            <i class="fas fa-eye"></i>
                                                        </span>
                                                        <span class="p-1 bg-green-50 rounded-lg text-green-700 hover:bg-green-100 transition cursor-pointer" title="Restore">
                                                            <i class="fas fa-undo"></i>
                                                        </span>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>RPT-119-20250426</td>
                                                <td>Maria Santos</td>
                                                <td>April 26, 2025</td>
                                                <td>Archived</td>
                                                <td>
                                                    <div class="flex space-x-2">
                                                        <span class="p-1 bg-blue-50 rounded-lg text-blue-700 hover:bg-blue-100 transition cursor-pointer" title="View">
                                                            <i class="fas fa-eye"></i>
                                                        </span>
                                                        <span class="p-1 bg-green-50 rounded-lg text-green-700 hover:bg-green-100 transition cursor-pointer" title="Restore">
                                                            <i class="fas fa-undo"></i>
                                                        </span>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>RPT-115-20250423</td>
                                                <td>Pedro Reyes</td>
                                                <td>April 23, 2025</td>
                                                <td>Archived</td>
                                                <td>
                                                    <div class="flex space-x-2">
                                                        <span class="p-1 bg-blue-50 rounded-lg text-blue-700 hover:bg-blue-100 transition cursor-pointer" title="View">
                                                            <i class="fas fa-eye"></i>
                                                        </span>
                                                        <span class="p-1 bg-green-50 rounded-lg text-green-700 hover:bg-green-100 transition cursor-pointer" title="Restore">
                                                            <i class="fas fa-undo"></i>
                                                        </span>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>RPT-112-20250420</td>
                                                <td>Ana Gonzales</td>
                                                <td>April 20, 2025</td>
                                                <td>Archived</td>
                                                <td>
                                                    <div class="flex space-x-2">
                                                        <span class="p-1 bg-blue-50 rounded-lg text-blue-700 hover:bg-blue-100 transition cursor-pointer" title="View">
                                                            <i class="fas fa-eye"></i>
                                                        </span>
                                                        <span class="p-1 bg-green-50 rounded-lg text-green-700 hover:bg-green-100 transition cursor-pointer" title="Restore">
                                                            <i class="fas fa-undo"></i>
                                                        </span>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>RPT-109-20250417</td>
                                                <td>Ramon Diaz</td>
                                                <td>April 17, 2025</td>
                                                <td>Archived</td>
                                                <td>
                                                    <div class="flex space-x-2">
                                                        <span class="p-1 bg-blue-50 rounded-lg text-blue-700 hover:bg-blue-100 transition cursor-pointer" title="View">
                                                            <i class="fas fa-eye"></i>
                                                        </span>
                                                        <span class="p-1 bg-green-50 rounded-lg text-green-700 hover:bg-green-100 transition cursor-pointer" title="Restore">
                                                            <i class="fas fa-undo"></i>
                                                        </span>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
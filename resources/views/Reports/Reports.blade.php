<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>BRGY INCIO, DAVAO CITY SYSTEM - Reports</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
</head>
<body class="bg-gray-50 min-h-screen flex font-sans">
    <!-- Sidebar -->
    <x-sidebar></x-sidebar>

    <div class="flex-1 ml-20 pt-14">
        <div class="p-6 w-full max-w-5xl mx-auto">
            <!-- Dashboard Header with Breadcrumbs -->
            <div class="mb-8">
                <div class="text-sm text-gray-500 mb-2">
                    <span>Dashboard</span>
                    <span class="mx-2">/</span>
                    <span class="text-green-700 font-medium">Reports</span>
                </div>
                <h1 class="text-4xl font-bold text-gray-800">Reports Management</h1>
            </div>

            <!-- Main Reports Card -->
            <div class="bg-white rounded-xl shadow-lg overflow-hidden">
                <!-- Card Header -->
                <div class="bg-green-700 p-4 text-white">
                    <h2 class="text-xl font-semibold">Barangay Document Reports</h2>
                    <p class="text-green-100 text-sm">Generate, view, and print official barangay documents</p>
                </div>

                <!-- Card Content -->
                <div class="flex p-6">
                    <!-- Left Sidebar - Report Types -->
                    <div class="w-1/3 pr-6 border-r border-gray-200">
                        <h3 class="text-lg font-medium text-gray-700 mb-4">Select Document Type</h3>
                        
                        <div class="space-y-1">
                            <form action="{{ route('reports.generate') }}" method="POST" class="inline">
                                @csrf
                                <input type="hidden" name="type" value="residents_information">
                                <input type="hidden" name="title" value="Residents Information Report">
                                <button type="submit" class="flex items-center w-full p-3 rounded-lg hover:bg-green-50 text-left transition duration-150 text-gray-700 hover:text-green-700 font-medium focus:outline-none focus:ring-2 focus:ring-green-200 {{ request('type') == 'residents_information' ? 'bg-green-50 text-green-700' : '' }}">
                                    <i class="fas fa-file-alt mr-3 text-green-600"></i>
                                    Residents Information Report
                                </button>
                            </form>
                            
                            <form action="{{ route('reports.generate') }}" method="POST" class="inline">
                                @csrf
                                <input type="hidden" name="type" value="clearance">
                                <input type="hidden" name="title" value="Barangay Clearance Report">
                                <input type="hidden" name="metadata[resident_name]" value="Sample Resident">
                                <button type="submit" class="flex items-center w-full p-3 rounded-lg hover:bg-green-50 text-left transition duration-150 text-gray-700 hover:text-green-700 font-medium focus:outline-none focus:ring-2 focus:ring-green-200 {{ request('type') == 'clearance' ? 'bg-green-50 text-green-700' : '' }}">
                                    <i class="fas fa-certificate mr-3 text-gray-500"></i>
                                    Barangay Clearance Report
                                </button>
                            </form>
                            
                            <form action="{{ route('reports.generate') }}" method="POST" class="inline">
                                @csrf
                                <input type="hidden" name="type" value="indigency">
                                <input type="hidden" name="title" value="Barangay Indigency Report">
                                <button type="submit" class="flex items-center w-full p-3 rounded-lg hover:bg-green-50 text-left transition duration-150 text-gray-700 hover:text-green-700 font-medium focus:outline-none focus:ring-2 focus:ring-green-200 {{ request('type') == 'indigency' ? 'bg-green-50 text-green-700' : '' }}">
                                    <i class="fas fa-hand-holding-heart mr-3 text-gray-500"></i>
                                    Barangay Indigency Report
                                </button>
                            </form>
                            
                            <form action="{{ route('reports.generate') }}" method="POST" class="inline">
                                @csrf
                                <input type="hidden" name="type" value="business_permit">
                                <input type="hidden" name="title" value="Business Permit Report">
                                <button type="submit" class="flex items-center w-full p-3 rounded-lg hover:bg-green-50 text-left transition duration-150 text-gray-700 hover:text-green-700 font-medium focus:outline-none focus:ring-2 focus:ring-green-200 {{ request('type') == 'business_permit' ? 'bg-green-50 text-green-700' : '' }}">
                                    <i class="fas fa-store mr-3 text-gray-500"></i>
                                    Business Permit Report
                                </button>
                            </form>
                            
                            <form action="{{ route('reports.generate') }}" method="POST" class="inline">
                                @csrf
                                <input type="hidden" name="type" value="residency">
                                <input type="hidden" name="title" value="Certificate of Residency Report">
                                <button type="submit" class="flex items-center w-full p-3 rounded-lg hover:bg-green-50 text-left transition duration-150 text-gray-700 hover:text-green-700 font-medium focus:outline-none focus:ring-2 focus:ring-green-200 {{ request('type') == 'residency' ? 'bg-green-50 text-green-700' : '' }}">
                                    <i class="fas fa-home mr-3 text-gray-500"></i>
                                    Certificate of Residency Report
                                </button>
                            </form>
                        </div>
                    </div>
                    
                    <!-- Right Content - Document Preview -->
                    <div class="w-2/3 pl-6">
                        <div class="flex justify-between items-center mb-6">
                            <h3 class="text-lg font-medium text-gray-700">Document Preview</h3>
                            
                            <div class="flex space-x-3">
                                @if(isset($report))
                                    <a href="{{ route('reports.download', $report) }}" class="p-2 bg-blue-50 rounded-lg text-blue-700 hover:bg-blue-100 transition" title="Download PDF">
                                        <i class="fas fa-file-pdf"></i>
                                    </a>
                                    <form action="{{ route('reports.updateStatus', $report) }}" method="POST" class="inline">
                                        @csrf
                                        <input type="hidden" name="status" value="printed">
                                        <button type="submit" class="p-2 bg-green-50 rounded-lg text-green-700 hover:bg-green-100 transition" title="Print Document">
                                            <i class="fas fa-print"></i>
                                        </button>
                                    </form>
                                    <form action="{{ route('reports.updateStatus', $report) }}" method="POST" class="inline">
                                        @csrf
                                        <input type="hidden" name="status" value="emailed">
                                        <button type="submit" class="p-2 bg-purple-50 rounded-lg text-purple-700 hover:bg-purple-100 transition" title="Email Document">
                                            <i class="fas fa-envelope"></i>
                                        </button>
                                    </form>
                                @endif
                            </div>
                        </div>
                        
                        <!-- Document Name -->
                        <div class="text-center mb-4">
                            <span class="text-sm text-gray-500">PREVIEW OF</span>
                            <h4 class="text-lg font-bold text-gray-800">{{ isset($report) ? $report->title : 'Select a Report' }}</h4>
                        </div>
                        
                        <!-- Document Preview Box -->
                        <div class="border border-gray-300 rounded-lg overflow-hidden bg-white shadow-sm">
                            <div class="bg-gray-50 p-2 border-b text-xs text-gray-500 flex justify-between">
                                <span>Document ID: {{ isset($report) ? 'RPT-' . $report->id . '-' . now()->format('Ymd') : 'N/A' }}</span>
                                <span>Last Updated: {{ isset($report) ? $report->last_updated_at->format('F d, Y') : 'N/A' }}</span>
                            </div>
                            
                            <!-- Document Content Preview -->
                            <div class="p-6 flex justify-center">
                                <div class="border border-gray-200 p-1 bg-white shadow-sm">
                                    @if(isset($report) && $report->google_doc_id)
                                        <iframe src="https://docs.google.com/document/d/{{ $report->google_doc_id }}/preview" width="400" height="520"></iframe>
                                    @else
                                        <div class="w-[400px] h-[520px] flex items-center justify-center text-gray-500">
                                            Select a report to preview
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        
                        <!-- Action Buttons -->
                        <div class="mt-6 flex justify-end space-x-4">
                            @if(isset($report))
                                <a href="https://docs.google.com/document/d/{{ $report->google_doc_id }}/edit" target="_blank" class="px-5 py-2 bg-gray-100 rounded-lg text-gray-700 hover:bg-gray-200 transition font-medium">
                                    <i class="fas fa-eye mr-2"></i> View Full Document
                                </a>
                                <a href="{{ route('reports.preview', $report) }}" class="px-5 py-2 bg-green-600 rounded-lg text-white hover:bg-green-700 transition font-medium">
                                    <i class="fas fa-pen mr-2"></i> Edit Document
                                </a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Recent Activity Section -->
            <div class="mt-8">
                <h3 class="text-lg font-medium text-gray-700 mb-4">Recent Document Activity</h3>
                
                <div class="bg-white rounded-xl shadow-sm p-4">
                    <div class="divide-y divide-gray-100">
                        @forelse($reports as $activity)
                            <div class="py-3 flex justify-between items-center">
                                <div>
                                    <span class="text-sm text-gray-500">{{ ucfirst($activity->status) }}</span>
                                    <p class="font-medium">{{ $activity->title }}</p>
                                </div>
                                <span class="text-sm text-gray-500">{{ $activity->updated_at->diffForHumans() }}</span>
                            </div>
                        @empty
                            <div class="py-3 text-center text-gray-500">
                                No recent activity
                            </div>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
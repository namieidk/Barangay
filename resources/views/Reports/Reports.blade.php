<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>BRGY INCIO, DAVAO CITY SYSTEM</title>
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
                    <p class="text-green-100 text-sm">Generate, view and print official barangay documents</p>
                </div>

                <!-- Card Content -->
                <div class="flex p-6">
                    <!-- Left Sidebar - Report Types -->
                    <div class="w-1/3 pr-6 border-r border-gray-200">
                        <h3 class="text-lg font-medium text-gray-700 mb-4">Select Document Type</h3>
                        
                        <div class="space-y-1">
                            <button type="button" class="flex items-center w-full p-3 rounded-lg hover:bg-green-50 text-left transition duration-150 text-gray-700 hover:text-green-700 font-medium focus:outline-none focus:ring-2 focus:ring-green-200 bg-green-50 text-green-700">
                                <i class="fas fa-file-alt mr-3 text-green-600"></i>
                                Residents Information Report
                            </button>
                            
                            <button type="button" class="flex items-center w-full p-3 rounded-lg hover:bg-green-50 text-left transition duration-150 text-gray-700 hover:text-green-700 font-medium focus:outline-none focus:ring-2 focus:ring-green-200">
                                <i class="fas fa-certificate mr-3 text-gray-500"></i>
                                Barangay Clearance Report
                            </button>
                            
                            <button type="button" class="flex items-center w-full p-3 rounded-lg hover:bg-green-50 text-left transition duration-150 text-gray-700 hover:text-green-700 font-medium focus:outline-none focus:ring-2 focus:ring-green-200">
                                <i class="fas fa-hand-holding-heart mr-3 text-gray-500"></i>
                                Barangay Indigency Report
                            </button>
                            
                            <button type="button" class="flex items-center w-full p-3 rounded-lg hover:bg-green-50 text-left transition duration-150 text-gray-700 hover:text-green-700 font-medium focus:outline-none focus:ring-2 focus:ring-green-200">
                                <i class="fas fa-store mr-3 text-gray-500"></i>
                                Business Permit Report
                            </button>
                            
                            <button type="button" class="flex items-center w-full p-3 rounded-lg hover:bg-green-50 text-left transition duration-150 text-gray-700 hover:text-green-700 font-medium focus:outline-none focus:ring-2 focus:ring-green-200">
                                <i class="fas fa-home mr-3 text-gray-500"></i>
                                Certificate of Residency Report
                            </button>
                        </div>
                    </div>
                    
                    <!-- Right Content - Document Preview -->
                    <div class="w-2/3 pl-6">
                        <div class="flex justify-between items-center mb-6">
                            <h3 class="text-lg font-medium text-gray-700">Document Preview</h3>
                            
                            <div class="flex space-x-3">
                                <button class="p-2 bg-blue-50 rounded-lg text-blue-700 hover:bg-blue-100 transition" title="Download PDF">
                                    <i class="fas fa-file-pdf"></i>
                                </button>
                                <button class="p-2 bg-green-50 rounded-lg text-green-700 hover:bg-green-100 transition" title="Print Document">
                                    <i class="fas fa-print"></i>
                                </button>
                                <button class="p-2 bg-purple-50 rounded-lg text-purple-700 hover:bg-purple-100 transition" title="Email Document">
                                    <i class="fas fa-envelope"></i>
                                </button>
                            </div>
                        </div>
                        
                        <!-- Document Name -->
                        <div class="text-center mb-4">
                            <span class="text-sm text-gray-500">PREVIEW OF</span>
                            <h4 class="text-lg font-bold text-gray-800">RESIDENTS INFORMATION REPORT</h4>
                        </div>
                        
                        <!-- Document Preview Box -->
                        <div class="border border-gray-300 rounded-lg overflow-hidden bg-white shadow-sm">
                            <div class="bg-gray-50 p-2 border-b text-xs text-gray-500 flex justify-between">
                                <span>Document ID: RIR-2025-0412</span>
                                <span>Last Updated: April 12, 2025</span>
                            </div>
                            
                            <!-- Document Content Preview -->
                            <div class="p-6 flex justify-center">
                                <div class="border border-gray-200 p-1 bg-white shadow-sm">
                                    <img
                                        src="/api/placeholder/400/520"
                                        alt="Document Preview"
                                        class="object-cover"
                                    />
                                </div>
                            </div>
                        </div>
                        
                        <!-- Action Buttons -->
                        <div class="mt-6 flex justify-end space-x-4">
                            <button class="px-5 py-2 bg-gray-100 rounded-lg text-gray-700 hover:bg-gray-200 transition font-medium">
                                <i class="fas fa-eye mr-2"></i> View Full Document
                            </button>
                            <button class="px-5 py-2 bg-green-600 rounded-lg text-white hover:bg-green-700 transition font-medium">
                                <i class="fas fa-pen mr-2"></i> Edit Document
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Recent Activity Section -->
            <div class="mt-8">
                <h3 class="text-lg font-medium text-gray-700 mb-4">Recent Document Activity</h3>
                
                <div class="bg-white rounded-xl shadow-sm p-4">
                    <div class="divide-y divide-gray-100">
                        <div class="py-3 flex justify-between items-center">
                            <div>
                                <span class="text-sm text-gray-500">Generated</span>
                                <p class="font-medium">Barangay Clearance - Juan Dela Cruz</p>
                            </div>
                            <span class="text-sm text-gray-500">10 minutes ago</span>
                        </div>
                        <div class="py-3 flex justify-between items-center">
                            <div>
                                <span class="text-sm text-gray-500">Printed</span>
                                <p class="font-medium">Certificate of Indigency - Maria Santos</p>
                            </div>
                            <span class="text-sm text-gray-500">1 hour ago</span>
                        </div>
                        <div class="py-3 flex justify-between items-center">
                            <div>
                                <span class="text-sm text-gray-500">Updated</span>
                                <p class="font-medium">Business Permit - ABC Grocery Store</p>
                            </div>
                            <span class="text-sm text-gray-500">Yesterday</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
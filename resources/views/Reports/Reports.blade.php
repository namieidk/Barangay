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

    <div class="fixed top-0 left-64 w-[calc(100%-16rem)] bg-[#5A7A46] text-white p-4 text-2xl font-bold z-50 text-center">
        BRGY INCIO, DAVAO CITY SYSTEM
    </div>

    <!-- Sidebar -->
    <x-sidebar></x-sidebar>

    <!-- Main Content Area -->
    <div class="flex-1 ml-20 pt-20">
        <div class="p-10 w-full max-w-5xl mx-auto">
            <!-- Dashboard Heading -->
            <h1 class="text-5xl font-bold mb-8 pl-0 mt-[-50px]">Reports</h1>

            <div class="w-[1124px] h-[500px] bg-green-700">
                <!-- Content inside the container -->
                <h1 class="ml-10 mt-10 text-white text-xl font-semibold">Select Reports:</h1>
                <div class="ml-10 mt-4 flex items-start">
                    <form class="p-4 w-[300px]" style="background-color: rgba(120, 150, 102, 0.5); backdrop-filter: blur(4px);">
                        <button type="button" class="block w-full text-left py-2 text-white hover:underline">
                            1. Residents Information Report
                        </button>
                        <button type="button" class="block w-full text-left py-2 text-white hover:underline">
                            2. Barangay Clearance Report
                        </button>
                        <button type="button" class="block w-full text-left py-2 text-white hover:underline">
                            3. Barangay Indigency Report
                        </button>
                        <button type="button" class="block w-full text-left py-2 text-white hover:underline">
                            4. Business Permit Report
                        </button>
                        <button type="button" class="block w-full text-left py-2 text-white hover:underline">
                            5. Certificate Residency Report
                        </button>
                    </form>
                    <!-- Right Side Content -->
                    <div class="ml-4 mt-4 flex items-start gap-8">
                        <!-- Icon Buttons -->
                        <div class="flex flex-col gap-4">
                            <button type="button" class="text-white text-2xl hover:text-gray-200" title="File">
                                📄
                            </button>
                            <button type="button" class="text-white text-2xl hover:text-gray-200" title="Printer">
                                🖨️
                            </button>
                        </div>
                        <!-- Label and Border -->
                        <div class="flex flex-col items-end ">
                            <label class="text-white mb-2 ">(NAME OF THE SELECTED DOCUMENT)</label>
                            <img
                                src="/placeholder.svg?height=240&width=240"
                                alt="Profile"
                                style="width: 300px; height: 340px;"
                                class="border border-black"
                            />
                        </div>

                        </div>
                        </div>
                        <div class="flex item-end mt-100 ml-10">
                            <button class="bg-yellow-500 text-primary-dark hover:bg-yellow-600 px-6 py-2 rounded-full text-lg font-medium border-2 border-white" style="background-color: #FFD700;">
                                Edit Details
                            </button>
                        </div>
                        </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
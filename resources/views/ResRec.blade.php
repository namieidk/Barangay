<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>BRGY INCIO, DAVAO CITY SYSTEM</title>
    <style>
        .bg-4A6936-50-opacity {
            background-color: rgba(74, 105, 54, 0.5);
        }
    </style>
</head>
<body class="min-h-screen flex">
    <!-- Header -->
    <div class="fixed top-0 left-64 w-[calc(100%-16rem)] bg-[#5A7A46] text-white p-4 text-2xl font-bold z-50 text-center">
        BRGY INCIO, DAVAO CITY SYSTEM
    </div>

    <!-- Sidebar -->
    <x-sidebar></x-sidebar>

    <!-- Main Content Area -->
    <div class="flex-1 ml-64 pt-20 bg-4A6936-50-opacity">
        <div class="p-10 w-full max-w-5xl mx-auto">
            <h1 class="text-5xl font-bold mb-8 pl-0 mt-[-50px]">New Residents</h1>

            <!-- Moved Search Input Section -->
            <div class="mb-4">
                <input
                    type="text"
                    placeholder="Type any of text in fields"
                    class="w-96 p-4 bg-white text-gray-700 border border-gray-300 rounded-lg mb-4"
                />
                <div class="flex gap-4">
                    <button class="flex items-center gap-2 bg-secondary text-primary-foreground px-6 py-2 rounded-full">
                        <Search class="w-5 h-5" />
                        Search
                    </button>
                    <button class="bg-secondary text-primary-foreground px-6 py-2 rounded-full">Clear</button>
                </div>
            </div>
        </div>

        <!-- Remaining Content -->
        <div class="p-4 md:p-8">
            <div class="max-w-7xl mx-auto">
                <ResidentTable />
            </div>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full border-collapse border-2 border-black">
                <thead>
                    <tr class="bg-table-header text-white">
                        <th class="border border-black p-3 text-left">Resident ID</th>
                        <th class="border border-black p-3 text-left">First Name</th>
                        <th class="border border-black p-3 text-left">Middle Name</th>
                        <th class="border border-black p-3 text-left">Last Name</th>
                        <th class="border border-black p-3 text-left">Nick Name</th>
                        <th class="border border-black p-3 text-left">Gender</th>
                        <th class="border border-black p-3 text-left">Age</th>
                        <th class="border border-black p-3 text-left">Purok</th>
                        <th class="border border-black p-3 text-left">Marital Status</th>
                        <th class="border border-black p-3 text-left">Voter Status</th>
                    </tr>
                </thead>
                <tbody class="bg-white">
                    <!-- Table body content goes here -->
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
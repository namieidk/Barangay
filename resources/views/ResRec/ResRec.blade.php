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
    <div class="flex-1 ml-64 pt-24 bg-4A6936-50-opacity">
        <div class="p-10 w-full max-w-5xl">
            <h1 class="text-5xl font-bold mb-4 mt-[-50px] ml-0">Residence Records</h1>

            <form class="max-w-md ml-0 mb-6">   
                <label for="default-search" class="mb-2 text-sm font-medium text-black sr-only">Search</label>
                <div class="relative">
                    <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                        <svg class="w-4 h-4 text-black" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                        </svg>
                    </div>
                    <input type="search" id="default-search" class="block w-full p-2 ps-10 text-sm text-black border border-gray-300 rounded-lg bg-white focus:ring-blue-500 focus:border-blue-500" placeholder="Search Residents" required />
                    <button type="submit" class="text-black absolute end-2.5 bottom-1 bg-white hover:bg-gray-200 focus:ring-4 focus:outline-none focus:ring-gray-300 font-medium rounded-lg text-sm px-4 py-1">Search</button>
                </div>
            </form>



<div class="relative overflow-x-auto shadow-md sm:rounded-lg w-[120%] ml-0">
    <table class="w-[120%] text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400 ml-auto">
        <thead class="text-xs text-gray-700 uppercase bg-green-700 text-white ">
            <tr>
                <th scope="col" class="px-6 py-3">
                    ResID
                </th>
                <th scope="col" class="px-6 py-3">
                    First Name
                </th>
                <th scope="col" class="px-6 py-3">
                    Middle Name
                </th>
                <th scope="col" class="px-6 py-3">
                    Last Name
                </th>
                <th scope="col" class="px-6 py-3">
                    Nickname
                </th>
                <th scope="col" class="px-6 py-3">
                    Gender
                </th>
                <th scope="col" class="px-6 py-3">
                    Age
                </th>
                <th scope="col" class="px-6 py-3">
                    Purok
                </th>
                <th scope="col" class="px-6 py-3">
                    Marital Status
                </th>
                <th scope="col" class="px-6 py-3">
                    Voter Status
                </th>
                <th scope="col" class="px-6 py-3">
                    Action
                </th>
            </tr>
        </thead>
        <tbody class="bg-white">
            <tr>
                <td colspan="12" class="px-6 py-4 text-center text-gray-500">
                    No residents yet
                </td>
            </tr>
        </tbody>
    </table>
</div>

        </div>
    </div>
    
</body>
</html>
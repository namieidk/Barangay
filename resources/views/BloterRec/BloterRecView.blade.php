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
    <!-- Sidebar -->
    <x-sidebar></x-sidebar>

    <!-- Main Content Area -->
    <div class="flex-1 ml-64 pt-14 bg-[#FBF5DF]">
        <div class="p-6 w-full max-w-5xl">
            <h1 class="text-5xl font-bold mb-4 mt-[-50px] ml-0">Blotter Records</h1>

            <!-- Search Form -->
            <form method="GET" action="{{ route('blotter.records.index') }}" class="max-w-md ml-0 mb-4 flex items-center space-x-4">
                <label for="default-search" class="mb-2 text-sm font-medium text-black sr-only">Search</label>
                <div class="relative flex-1">
                    <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                        <svg class="w-4 h-4 text-black" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                        </svg>
                    </div>
                    <div class="flex ms-[-15px]">
                        <input type="search" id="default-search" name="search" class="block w-full p-2 ps-10 text-sm text-black border border-gray-300 rounded-l-lg bg-white focus:ring-blue-500 focus:border-blue-500" placeholder="Search Residents" value="{{ request('search') }}" />
                        <button type="submit" class="text-black bg-white hover:bg-gray-200 focus:ring-4 focus:outline-none focus:ring-gray-300 font-medium rounded-r-lg text-sm px-4 py-1">
                            Search
                        </button>
                    </div>
                </div>
            </form>

            <!-- Add Blotter Button -->
            <a href="{{ route('BloterRec.ResPersonData') }}" class="bg-[#d1e2c4] text-black hover:bg-white focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-4 py-2 mb-6">
                Add Blotter
            </a>

            <!-- Success/Error Messages -->
            @if (session('success'))
                <div class="alert-success p-4 mb-6 bg-green-100 text-green-800 rounded-lg">
                    {{ session('success') }}
                </div>
            @endif
            @if ($errors->any())
                <div class="alert-error p-4 mb-6 bg-red-100 text-red-800 rounded-lg">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <!-- Table -->
            <div class="relative overflow-x-auto shadow-md sm:rounded-lg w-[120%] mt-5">
                <table class="w-[120%] text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400 ml-auto">
                    <thead class="text-xs text-gray-700 uppercase bg-[#301f17] text-white">
                        <tr>
                            <th scope="col" class="px-6 py-3">ResID</th>
                            <th scope="col" class="px-6 py-3">First Name</th>
                            <th scope="col" class="px-6 py-3">Middle Name</th>
                            <th scope="col" class="px-6 py-3">Last Name</th>
                            <th scope="col" class="px-6 py-3">Nickname</th>
                            <th scope="col" class="px-6 py-3">Gender</th>
                            <th scope="col" class="px-6 py-3">Age</th>
                            <th scope="col" class="px-6 py-3">Purok</th>
                            <th scope="col" class="px-6 py-3">Action</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white">
                        @forelse ($reportingPersons as $person)
                            <tr class="border-b dark:border-gray-700">
                                <td class="px-6 py-4">{{ $person->id }}</td>
                                <td class="px-6 py-4">{{ $person->first_name }}</td>
                                <td class="px-6 py-4">{{ $person->middle_name }}</td>
                                <td class="px-6 py-4">{{ $person->last_name }}</td>
                                <td class="px-6 py-4">{{ $person->nickname }}</td>
                                <td class="px-6 py-4">{{ $person->gender }}</td>
                                <td class="px-6 py-4">{{ $person->age }}</td>
                                <td class="px-6 py-4">{{ $person->village }}</td> <!-- Assuming Purok is village -->
                                <td class="px-6 py-4">
                                    <a href="{{ route('blotter.incident.create', ['blotter_entry_number' => $person->id]) }}" class="text-blue-600 hover:underline">View Incident</a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="9" class="px-6 py-4 text-center text-gray-500">
                                    No residents found
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <!-- Pagination Links -->
            <div class="mt-4">
                {{ $reportingPersons->links() }}
            </div>
        </div>
    </div>
</body>
</html>
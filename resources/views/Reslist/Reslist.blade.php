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
    <!-- Sidebar -->
    <x-sidebar></x-sidebar>

    <!-- Main Content Area -->
    <div class="flex-1 ml-20 pt-14">
        <div class="p-6 w-full max-w-5xl mx-auto">
            <!-- Dashboard Heading -->
            <h1 class="text-5xl font-bold mb-8 pl-0 mt-[-50px]">Residence List</h1>

    <div class="min-h-screen bg-[#77a659]" style="width: 1124px; ">
        <!-- Header -->
        <header class="flex items-center justify-between p-4 bg-[#385327] text-white">
            <div class="flex items-center gap-4">
                <h1 class="text-2xl font-bold">Find by Purok:</h1>
                <form class="relative w-120">
                    <label for="underline_select" class="sr-only">Underline select</label>
                    <select id="underline_select" class="block py-2.5 px-0 w-[300px] text-sm text-gray-500 bg-white border-0 border-gray-200 appearance-none focus:outline-none focus:ring-0 focus:border-gray-400">
                        <option selected>Choose a Purok</option>
                        <option value="Purok1">Purok 1</option>
                        <option value="Purok2">Purok 2</option>
                        <option value="Purok3">Purok 3</option>
                        <option value="Purok4">Purok 4</option>
                    </select>
                </form>
                <button class="bg-[#d1e2c4] text-black hover:bg-white px-6 py-2 rounded-full text-lg font-medium " >
                    Edit Details
                </button>
                <span class="text-white text-lg ml-4">Name when click</span>
        </div>
        </header>

        <main class="flex p-4 gap-6">
            <div class="w-1/4" id="name-list-section">
                <div class="flex items-center justify-between mb-4 gap-8">
                    <h2 class="text-lg font-bold text-primary-light">List of Names</h2>
                    <button class="bg-[#d1e2c4]  text-black hover:bg-white px-4 py-1 rounded-full text-md font-medium border-2 " >
                     Show All
                     </button>
                </div>
                <div class="bg-white h-[560px] w-full overflow-y-auto p-4">
                    <form>
                        <table class="w-full text-left border-collapse" id="name-table">
                            <thead>
                                <tr>
                                    <th class="border-b-2 border-gray-300 py-2 px-4">ID</th>
                                    <th class="border-b-2 border-gray-300 py-2 px-4">Name</th>
                                    <th class="border-b-2 border-gray-300 py-2 px-4">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="border-b border-gray-200 py-2 px-4 text-gray-500" colspan="2">No names available</td>
                                </tr>
                            </tbody>
                        </table>
                    </form>
                </div>
            </div>

            <div class="w-1/2 space-y-4">
                <div class="flex items-center space-y-1">
                    <label class="text-white text-lg w-40">First Name:</label>
                    <input class="bg-transparent border-b border-white rounded-none text-white focus:border-primary-light flex-1" />
                </div>

                <div class="flex items-center space-y-1">
                    <label class="text-white text-lg w-40">Last Name:</label>
                    <input class="bg-transparent border-b border-white rounded-none text-white focus:border-primary-light flex-1" />
                </div>

                <div class="flex items-center space-y-1">
                    <label class="text-white text-lg w-40">Middle Name:</label>
                    <input class="bg-transparent border-b border-white rounded-none text-white focus:border-primary-light flex-1" />
                </div>

                <div class="flex items-center space-y-1">
                    <label class="text-white text-lg w-40">Alias Name:</label>
                    <input class="bg-transparent border-b border-white rounded-none text-white focus:border-primary-light flex-1" />
                </div>

                <div class="flex items-center space-y-1">
                    <label class="text-white text-lg w-40">Gender:</label>
                    <input class="bg-transparent border-b border-white rounded-none text-white focus:border-primary-light flex-1" />
                </div>

                <div class="flex items-center space-y-1">
                    <label class="text-white text-lg w-40">Marital Status:</label>
                    <input class="bg-transparent border-b border-white rounded-none text-white focus:border-primary-light flex-1" />
                </div>

                <div class="flex items-center space-y-1">
                    <label class="text-white text-lg w-40">Name of Spouse:</label>
                    <input class="bg-transparent border-b border-white rounded-none text-white focus:border-primary-light flex-1" />
                </div>

                <div class="flex items-center space-y-1">
                    <label class="text-white text-lg w-40">Purok:</label>
                    <input class="bg-transparent border-b border-white rounded-none text-white focus:border-primary-light flex-1" />
                </div>

                <div class="flex items-center space-y-1">
                    <label class="text-white text-lg w-40">Employment Status:</label>
                    <input class="bg-transparent border-b border-white rounded-none text-white focus:border-primary-light flex-1" />
                </div>

                <div class="flex items-center space-y-1">
                    <label class="text-white text-lg w-40">Religion:</label>
                    <input class="bg-transparent border-b border-white rounded-none text-white focus:border-primary-light flex-1" />
                </div>
            </div>

            <div class="w-1/4 space-y-4">
                <div class="mb-4">
                    <img
                        src="/placeholder.svg?height=240&width=240"
                        alt="Profile"
                        width="240"
                        height="240"
                        class="w-full h-auto border border-black"
                    />
                </div>

                <div class="space-y-1 flex items-center">
                    <label class="text-white text-lg w-40">Age:</label>
                    <input class="bg-transparent border-b border-white rounded-none text-white focus:border-primary-light flex-1" />
                </div>

                <div class="space-y-1 flex items-center">
                    <label class="text-white text-lg w-40">Birth Date:</label>
                    <input class="bg-transparent border-b border-white rounded-none text-white focus:border-primary-light flex-1" />
                </div>

                <div class="space-y-1 flex items-center">
                    <label class="text-white text-lg w-40">Height in (Cm):</label>
                    <input class="bg-transparent border-b border-white rounded-none text-white focus:border-primary-light flex-1" />
                </div>

                <div class="space-y-1 flex items-center">
                    <label class="text-white text-lg w-40">Weight in (Kg):</label>
                    <input class="bg-transparent border-b border-white rounded-none text-white focus:border-primary-light flex-1" />
                </div>

                
            </div>
        </main>
    </div>
            
        </div>
    </div>

    
</body>
</html>
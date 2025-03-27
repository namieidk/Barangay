<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite (['resources/css/app.css', 'resources/js/app.js'])
    <title>Other Info</title>
    <style>
        body {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            margin: 0;
        }
        .container {
            margin-top: 20px; /* Adjusted margin to the top */
            width: 500px; /* Set container width to 500px */
        }
    </style>
</head>
<body>
<div class=" w-[1124px]"> <!-- Adjusted container -->
    <div class="p-1 w-full h-auto mx-auto"> <!-- Removed background design -->
        <div class="flex flex-col md:flex-row gap-8">
            <!-- Profile Photo Section -->
            <div class="flex flex-col items-center">
                <div class="w-[300px] h-[300px] bg-gray-100 mb-2 relative">
                    <img src="/placeholder.svg?height=300&width=300" alt="Profile" class="w-full h-full object-cover" />
                </div>
                <p class="text-[#fc0000] text-center">Double click Image to Attach</p>
            </div>

            <!-- Form Fields -->
            <div class="flex-1 grid grid-cols-1 md:grid-cols-2 gap-x-12 gap-y-4">
                <!-- Left Column -->
                <div class="space-y-4">
                    <div class="space-y-1">
                        <label for="last-name" class="text-[#000000] font-medium">
                            Blood Type: <span class="text-red-500">*</span>
                        </label>
                        <select class="w-full border-b border-[#000000] bg-transparent outline-none text-[#000000] focus:border-[#000000]">
                            <option value="" disabled selected>Select Blood Type</option>
                            <option value="A+">A+</option>
                            <option value="A-">A-</option>
                            <option value="B+">B+</option>
                            <option value="B-">B-</option>
                            <option value="AB+">AB+</option>
                            <option value="AB-">AB-</option>
                            <option value="O+">O+</option>
                            <option value="O-">O-</option>
                        </select>
                    </div>
                    <div class="space-y-1">
                        <label for="last-name" class="text-[#000000] font-medium">
                            Occupation: <span class="text-red-500">*</span>
                        </label>
                        <input type="text" class="w-full border-b border-[#000000] bg-transparent outline-none text-[#000000]" placeholder="Enter occupation">
                    </div>
                    <div class="space-y-1">
                        <label for="last-name" class="text-[#000000] font-medium">
                            Educational Attaintment: <span class="text-red-500">*</span>
                        </label>
                        <select class="w-full border-b border-[#000000] bg-transparent outline-none text-[#000000] focus:border-[#000000]">
                            <option value="" disabled selected>Select Educational Attainment</option>
                            <option value="elementary">Elementary</option>
                            <option value="highschool">High School</option>
                            <option value="college">College</option>
                            <option value="postgraduate">Postgraduate</option>
                        </select>
                    </div>
                </div>

                <!-- Right Column (Notes Section) -->
                <div class="space-y-30">
                    <div class="space-y-30">
                        <label class="text-[#000000] font-medium">Notes:</label>
                        <textarea class="w-full h-[250px] border border-[#000000] bg-white rounded-lg p-2 text-[#000000] outline-none focus:border-[#000000]" placeholder="Enter notes here"></textarea>
                    </div>
                </div>
            </div>
        </div>

        <!-- Save Button -->
        <div class="flex justify-end mt-[250px]">
            <button class="bg-[#d1e2c4] text-[#000000] px-8 py-3 rounded-full text-lg">Save</button>
        </div>
    </div>
</div>
</body>
</html>
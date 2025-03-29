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
        }
    </style>
</head>
<body>
<div class="w-[1124px] h-[700px] ml-8"> <!-- Adjusted container -->
    <div class="p-1 h-auto mx-auto"> <!-- Removed background design -->
        <div class="flex flex-col md:flex-row gap-8">
            <!-- Profile Photo Section -->
            <div class="flex flex-col items-center ">
                <div class="w-[300px] h-[300px] bg-gray-100 mb-2 relative">
                    <img src="/placeholder.svg?height=300&width=300" alt="Profile" class="w-full h-full object-cover" />
                </div>
                <p class="text-[#fc0000] text-center">Double click Image to Attach</p>
            </div>

            <!-- Form Fields -->
            <div class="flex-1 grid grid-cols-1 md:grid-cols-2 gap-x-12 gap-y-4">
                <!-- Left Column -->
                <div class="space-y-4">
                    <div class="space-y-1  ">
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

                    <div class="ml-[-750px] mt-[350px]">
                        <label for="message" class="block mb-2 text-sm font-medium text-gray-900">Your message</label>
                        <textarea id="message" rows="4" class="block p-2.5 w-[500px] text-sm text-black bg-white rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500" placeholder="Write your thoughts here..."></textarea>
                    </div>
                
            </div>
        </div>
        <!-- Save Button -->
    <div class="flex justify-end mt-[120px] mr-[80px]">
        <button class="bg-[#d1e2c4] text-[#000000] px-8 py-3 rounded-full text-lg">Save</button>
    </div>
</div>
</body>
</html>
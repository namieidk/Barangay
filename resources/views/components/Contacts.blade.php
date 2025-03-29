<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  @vite (['resources/css/app.css', 'resources/js/app.js'])
  <title>Contacts</title>
</head>
<body>
  
<div class="w-[1124px] h-[700px] mt-[20px] ml-[30px]">
    <div class="flex flex-col md:flex-row gap-8">
        
        <!-- Profile Photo Section -->
        <div class="flex flex-col items-center">
            <div class="w-[300px] h-[300px] bg-gray-100 mb-2 relative">
                <img src="/placeholder.svg?height=300&width=300" alt="Profile" class="w-full h-full object-cover" />
            </div>
            <p class="text-[#fc0000] text-center">Double click Image to Attach</p>
        </div>

        <!-- Form Fields -->
        <div class="flex-1 grid grid-cols-1 md:grid-cols-2 gap-x-12 gap-y-4 ml-[80px]">
            <!-- Left Column -->
            <div class="space-y-4">
                <div class="space-y-1">
                    <label class="text-[#000000] font-medium">Phone Number:</label>
                    <input type="text" class="w-full border-b border-[#000000] bg-transparent outline-none text-[#000000]">
                </div>
                <div class="space-y-1">
                    <label class="text-[#000000] font-medium">Land Number:</label>
                    <input type="text" class="w-full border-b border-[#000000] bg-transparent outline-none text-[#000000]">
                </div>
                <div class="space-y-1">
                    <label class="text-[#000000] font-medium">Email Address:</label>
                    <input type="text" class="w-full border-b border-[#000000] bg-transparent outline-none text-[#000000]">
                </div>
                <div class="space-y-1">
                    <label class="text-[#000000] font-medium">Street/Unit/Bldg/Village:</label>
                    <input type="text" class="w-full border-b border-[#000000] bg-transparent outline-none text-[#000000]">
                </div>
            </div>
        </div>
    </div>

    <!-- Save Button -->
    <div class="flex justify-end mt-[250px] mr-[80px]">
        <button class="bg-[#d1e2c4] text-[#000000] px-8 py-3 rounded-full text-lg">Save</button>
    </div>
</div>
</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite (['resources/css/app.css', 'resources/js/app.js'])
    <title>Personal Information</title>
</head>
<body>

<div class="p-8 bg-[#77a659]">
                    <div class="flex flex-col md:flex-row gap-8">
                        <!-- Profile Photo Section -->
                        <div class="flex flex-col items-center">
                            <div class="w-[300px] h-[300px] bg-gray-100 mb-2 relative">
                                <img
                                    src="/placeholder.svg?height=300&width=300"
                                    alt="Profile photo placeholder"
                                    width="300"
                                    height="300"
                                    class="w-full h-full object-cover"
                                />
                            </div>
                            <p class="text-[#fc0000] text-center">Double click Image to Attach</p>
                        </div>

                        <!-- Form Fields -->
                        <div class="flex-1 grid grid-cols-1 md:grid-cols-2 gap-x-12 gap-y-4">
                            <!-- Left Column -->
                            <div class="space-y-4">
                            <div class="space-y-1">
                        <label for="first-name" class="text-[#000000] font-medium">
                         First Name: <span class="text-red-500">*</span>
                        </label>
                         <input 
                          type="text" 
                          id="first-name" 
                          name="first-name" 
                          class="w-full border-b border-[#000000] bg-transparent outline-none text-[#000000]" 
                            required
                            >
                        </div>

                        <div class="space-y-1">
                        <label for="last-name" class="text-[#000000] font-medium">
                         Last Name: <span class="text-red-500">*</span>
                        </label>
                        <input 
                         type="text" 
                         id="last-name" 
                          name="last-name" 
                         class="w-full border-b border-[#000000] bg-transparent outline-none text-[#000000]" 
                           required
                           >
                        </div>

                         <div class="space-y-1">
                         <label for="last-name" class="text-[#000000] font-medium">
                         Middle Name: <span class="text-red-500">*</span>
                        </label>
                            <input type="text" class="w-full border-b border-[#000000] bg-transparent outline-none text-[#000000]">
                         </div>

                        <div class="space-y-1">
                            <label for="last-name" class="text-[#000000] font-medium">
                         Allias Name: <span class="text-red-500">*</span>
                        </label>
                         <input type="text" class="w-full border-b border-[#000000] bg-transparent outline-none text-[#000000]">
                        </div>

                         <div class="space-y-1">
                         <label for="last-name" class="text-[#000000] font-medium">
                         Gender: <span class="text-red-500">*</span>
                        </label>
                            <select class="w-full border-b border-[#000000] bg-transparent outline-none text-[#000000] focus:border-[#000000]">
                                    <option value="" disabled selected>Select gender</option>
                                    <option value="male">Male</option>
                                    <option value="female">Female</option>
                            </select>
                        </div>

                        <div class="space-y-1">
                            <label for="last-name" class="text-[#000000] font-medium">
                            Marital Status: <span class="text-red-500">*</span>
                            </label>
                        <select class="w-full border-b border-[#000000] bg-transparent outline-none text-[#000000] focus:border-[#000000]">
                                <option value="" disabled selected>Select Status</option>
                                <option value="married">Married</option>
                                <option value="single">Single</option>
                                <option value="divorced">Divorced</option>
                                <option value="widowed">Widowed</option>
                            </select>
                        </div>

                        <div class="space-y-1">
                            <label for="last-name" class="text-[#000000] font-medium">
                             Name of Spouse: <span class="text-red-500">*</span>
                            </label>
                             <input type="text" class="w-full border-b border-[#000000] bg-transparent outline-none text-[#000000]">
                        </div>

                        <div class="space-y-1">
                            <label for="last-name" class="text-[#000000] font-medium">
                             Purok: <span class="text-red-500">*</span>
                            </label>
                                <select class="w-full border-b border-[#000000] bg-transparent outline-none text-[#000000] focus:border-[#000000]">
                                    <option value="" disabled selected>Select Purok</option>
                                    <option value="purok1">Purok Sampaguita</option>
                                    <option value="purok2">Purok Mabini</option>
                                    <option value="purok3">Purok Ilaw</option>
                                    <option value="purok4">Purok Bukid</option>
                                </select>
                        </div>

                        <div class="space-y-1">
                            <label for="last-name" class="text-[#000000] font-medium">
                                 Employment Status: <span class="text-red-500">*</span>
                            </label>
                                    <select class="w-full border-b border-[#000000] bg-transparent outline-none text-[#000000] focus:border-[#000000]">
                                        <option value="" disabled selected>Select Employment Status</option>
                                        <option value="worker">Worker</option>
                                        <option value="self-employed">Self Employed</option>
                                        <option value="employee">Employee</option>
                                    </select>
                            </div>
                        </div>

                            <!-- Right Column -->
                            <div class="space-y-4">
                                <div class="space-y-1">
                                <label for="last-name" class="text-[#000000] font-medium">
                                Birth Date: <span class="text-red-500">*</span>
                            </label>
                                    <input type="date" class="w-full border-b border-[#000000] bg-transparent outline-none text-[#000000] focus:border-[#000000]">
                                </div>

                                <div class="space-y-1">
                                <label for="last-name" class="text-[#000000] font-medium">
                                      Place of Birth: <span class="text-red-500">*</span>
                                </label>
                                    <input type="text" class="w-full border-b border-[#000000] bg-transparent outline-none text-[#000000]">
                                </div>

                                <div class="space-y-1">
                                    <label for="last-name" class="text-[#000000] font-medium">
                                         Place: <span class="text-red-500">*</span>
                                    </label>
                                    <input type="text" class="w-full border-b border-[#000000] bg-transparent outline-none text-[#000000]">
                                </div>

                                <div class="space-y-1">
                                    <label for="last-name" class="text-[#000000] font-medium">
                                         Height in (Cm): <span class="text-red-500">*</span>
                                    </label>
                                    <input type="text" class="w-full border-b border-[#000000] bg-transparent outline-none text-[#000000]">
                                </div>

                                <div class="space-y-1">
                                     <label for="last-name" class="text-[#000000] font-medium">
                                         Weight in (Kg): <span class="text-red-500">*</span>
                                    </label>
                                    <input type="text" class="w-full border-b border-[#000000] bg-transparent outline-none text-[#000000]">
                                </div>

                                <div class="space-y-1">
                                    <label for="last-name" class="text-[#000000] font-medium">
                                         Religion: <span class="text-red-500">*</span>
                                    </label>
                                    <select id="religionSelect" class="w-full border-b border-[#000000] bg-transparent outline-none text-[#000000] focus:border-[#000000]" onchange="toggleReligionInput()">
                                        <option value="" disabled selected>Select Religion</option>
                                        <option value="Christianity">Christianity</option>
                                        <option value="Islam">Islam</option>
                                        <option value="Buddhism">Buddhism</option>
                                        <option value="Hinduism">Hinduism</option>
                                        <option value="Other">Other</option>
                                    </select>
                                    <input type="text" id="religionInput" class="w-full border-b border-[#000000] bg-transparent outline-none text-[#000000] focus:border-[#000000] hidden" placeholder="Enter your religion">
                                </div>

                                <div class="space-y-1">
                                     <label for="last-name" class="text-[#000000] font-medium">
                                        Voters Status: <span class="text-red-500">*</span>
                                     </label>
                                    <select class="w-full border-b border-[#000000] bg-transparent outline-none text-[#000000] focus:border-[#000000]">
                                        <option value="" disabled selected>Select Voters Status</option>
                                        <option value="Registered">Registered</option>
                                        <option value="notRegistered">Not Registered</option>
                                    </select>
                                </div>

                                <div class="flex items-center gap-2 mt-8">
                                    <input type="checkbox" id="disability" class="w-5 h-5 border border-[#000000]" />
                                    <label for="disability" class="text-[#000000] font-medium">
                                        Person with Disability
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Save Button -->
                    <div class="flex justify-end mt-8">
                        <button class="bg-[#d1e2c4] text-[#000000] px-8 py-3 rounded-full text-lg">Save</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function toggleReligionInput() {
            const select = document.getElementById('religionSelect');
            const input = document.getElementById('religionInput');
            if (select.value === 'Other') {
                input.classList.remove('hidden');
            } else {
                input.classList.add('hidden');
                input.value = '';
            }
        }
    </script>
</body>
</html>
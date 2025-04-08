<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>BRGY INCIO, DAVAO CITY SYSTEM</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body class="bg-green-700 min-h-screen flex">
    <!-- Sidebar -->
    <x-sidebar></x-sidebar>

    <!-- Main Content Area -->
    <div class="flex-1 ml-20 pt-14">
        <div class="p-6 w-full max-w-5xl mx-auto">
            <!-- Dashboard Heading -->
            <h1 class="text-5xl font-bold mb-8 pl-0 mt-[-50px]">New Residents</h1>

            <!-- Form Section -->
            <div class="bg-[#FDF5E6] mr-[-180px] shadow-md rounded-lg overflow-hidden">
                <form action="{{ route('new-residence.store') }}" method="POST" enctype="multipart/form-data" class="p-8">
                    @csrf
                    
                    <!-- Progress Steps -->
                    <div class="mb-10">
                        <div class="flex items-center justify-between">
                            <div class="w-full flex items-center">
                                <div class="relative z-10">
                                    <div id="step-1-indicator" class="w-10 h-10 flex items-center justify-center rounded-full bg-blue-600 text-white font-semibold">
                                        1
                                    </div>
                                </div>
                                <div class="w-full h-1 bg-gray-200">
                                    <div id="progress-bar" class="h-full bg-blue-600 w-0 transition-all duration-300"></div>
                                </div>
                                <div class="relative z-10">
                                    <div id="step-2-indicator" class="w-10 h-10 flex items-center justify-center rounded-full bg-gray-200 text-gray-600 font-semibold">
                                        2
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="flex justify-between mt-2">
                            <span class="text-sm font-medium text-blue-600">Personal Details</span>
                            <span class="text-sm font-medium text-gray-500">Contact & Additional Info</span>
                        </div>
                    </div>

                    <!-- First Form Section -->
                    <div id="form-section-1">
                        <div class="flex flex-col md:flex-row gap-8">
                            <div class="flex-1 grid grid-cols-1 md:grid-cols-2 gap-x-12 gap-y-6">
                                <!-- Left Column -->
                                <div class="space-y-6">
                                    <div class="space-y-2">
                                        <label for="first-name" class="block text-gray-700 font-medium">
                                            First Name <span class="text-red-500">*</span>
                                        </label>
                                        <input 
                                            type="text" 
                                            id="first-name" 
                                            name="first_name" 
                                            class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" 
                                            value="{{ old('first_name') }}"
                                            required
                                        >
                                        @error('first_name')
                                            <span class="text-red-500 text-sm">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="space-y-2">
                                        <label for="last-name" class="block text-gray-700 font-medium">
                                            Last Name <span class="text-red-500">*</span>
                                        </label>
                                        <input 
                                            type="text" 
                                            id="last-name" 
                                            name="last_name" 
                                            class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" 
                                            value="{{ old('last_name') }}"
                                            required
                                        >
                                        @error('last_name')
                                            <span class="text-red-500 text-sm">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="space-y-2">
                                        <label for="middle-name" class="block text-gray-700 font-medium">
                                            Middle Name
                                        </label>
                                        <input 
                                            type="text" 
                                            id="middle-name" 
                                            name="middle_name"
                                            class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                            value="{{ old('middle_name') }}"
                                        >
                                        @error('middle_name')
                                            <span class="text-red-500 text-sm">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="space-y-2">
                                        <label for="alias-name" class="block text-gray-700 font-medium">
                                            Alias Name
                                        </label>
                                        <input 
                                            type="text" 
                                            id="alias-name" 
                                            name="alias_name"
                                            class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                            value="{{ old('alias_name') }}"
                                        >
                                        @error('alias_name')
                                            <span class="text-red-500 text-sm">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="space-y-2">
                                        <label for="gender" class="block text-gray-700 font-medium">
                                            Gender <span class="text-red-500">*</span>
                                        </label>
                                        <select 
                                            id="gender" 
                                            name="gender"
                                            class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                            required
                                        >
                                            <option value="" disabled {{ old('gender') == '' ? 'selected' : '' }}>Select gender</option>
                                            <option value="male" {{ old('gender') == 'male' ? 'selected' : '' }}>Male</option>
                                            <option value="female" {{ old('gender') == 'female' ? 'selected' : '' }}>Female</option>
                                        </select>
                                        @error('gender')
                                            <span class="text-red-500 text-sm">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <!-- Right Column -->
                                <div class="space-y-6">
                                    <div class="space-y-2">
                                        <label for="birth-date" class="block text-gray-700 font-medium">
                                            Birth Date <span class="text-red-500">*</span>
                                        </label>
                                        <input 
                                            type="date" 
                                            id="birth-date" 
                                            name="birth_date"
                                            class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                            value="{{ old('birth_date') }}"
                                            required
                                        >
                                        @error('birth_date')
                                            <span class="text-red-500 text-sm">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="space-y-2">
                                        <label for="birth-place" class="block text-gray-700 font-medium">
                                            Place of Birth <span class="text-red-500">*</span>
                                        </label>
                                        <input 
                                            type="text" 
                                            id="birth-place" 
                                            name="birth_place"
                                            class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                            value="{{ old('birth_place') }}"
                                            required
                                        >
                                        @error('birth_place')
                                            <span class="text-red-500 text-sm">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="space-y-2">
                                        <label for="marital-status" class="block text-gray-700 font-medium">
                                            Marital Status <span class="text-red-500">*</span>
                                        </label>
                                        <select 
                                            id="marital-status" 
                                            name="marital_status"
                                            class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                            required
                                        >
                                            <option value="" disabled {{ old('marital_status') == '' ? 'selected' : '' }}>Select Status</option>
                                            <option value="married" {{ old('marital_status') == 'married' ? 'selected' : '' }}>Married</option>
                                            <option value="single" {{ old('marital_status') == 'single' ? 'selected' : '' }}>Single</option>
                                            <option value="divorced" {{ old('marital_status') == 'divorced' ? 'selected' : '' }}>Divorced</option>
                                            <option value="widowed" {{ old('marital_status') == 'widowed' ? 'selected' : '' }}>Widowed</option>
                                        </select>
                                        @error('marital_status')
                                            <span class="text-red-500 text-sm">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="space-y-2">
                                        <label for="spouse-name" class="block text-gray-700 font-medium">
                                            Name of Spouse
                                        </label>
                                        <input 
                                            type="text" 
                                            id="spouse-name" 
                                            name="spouse_name"
                                            class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                            value="{{ old('spouse_name') }}"
                                        >
                                        @error('spouse_name')
                                            <span class="text-red-500 text-sm">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="space-y-2">
                                        <label for="purok" class="block text-gray-700 font-medium">
                                            Purok <span class="text-red-500">*</span>
                                        </label>
                                        <select 
                                            id="purok" 
                                            name="purok"
                                            class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                            required
                                        >
                                            <option value="" disabled {{ old('purok') == '' ? 'selected' : '' }}>Select Purok</option>
                                            <option value="purok1" {{ old('purok') == 'purok1' ? 'selected' : '' }}>Purok Sampaguita</option>
                                            <option value="purok2" {{ old('purok') == 'purok2' ? 'selected' : '' }}>Purok Mabini</option>
                                            <option value="purok3" {{ old('purok') == 'purok3' ? 'selected' : '' }}>Purok Ilaw</option>
                                            <option value="purok4" {{ old('purok') == 'purok4' ? 'selected' : '' }}>Purok Bukid</option>
                                        </select>
                                        @error('purok')
                                            <span class="text-red-500 text-sm">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="mt-8 grid grid-cols-1 md:grid-cols-3 gap-6">
                            <div class="space-y-2">
                                <label for="place" class="block text-gray-700 font-medium">
                                    Place <span class="text-red-500">*</span>
                                </label>
                                <input 
                                    type="text" 
                                    id="place" 
                                    name="place"
                                    class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                    value="{{ old('place') }}"
                                    required
                                >
                                @error('place')
                                    <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="space-y-2">
                                <label for="height" class="block text-gray-700 font-medium">
                                    Height in (cm) <span class="text-red-500">*</span>
                                </label>
                                <input 
                                    type="text" 
                                    id="height" 
                                    name="height"
                                    class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                    value="{{ old('height') }}"
                                    required
                                >
                                @error('height')
                                    <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="space-y-2">
                                <label for="weight" class="block text-gray-700 font-medium">
                                    Weight in (kg) <span class="text-red-500">*</span>
                                </label>
                                <input 
                                    type="text" 
                                    id="weight" 
                                    name="weight"
                                    class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                    value="{{ old('weight') }}"
                                    required
                                >
                                @error('weight')
                                    <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="mt-8 grid grid-cols-1 md:grid-cols-3 gap-6">
                            <div class="space-y-2">
                                <label for="religionSelect" class="block text-gray-700 font-medium">
                                    Religion <span class="text-red-500">*</span>
                                </label>
                                <select 
                                    id="religionSelect" 
                                    name="religion"
                                    class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" 
                                    onchange="toggleReligionInput()"
                                    required
                                >
                                    <option value="" disabled {{ old('religion') == '' ? 'selected' : '' }}>Select Religion</option>
                                    <option value="Christianity" {{ old('religion') == 'Christianity' ? 'selected' : '' }}>Christianity</option>
                                    <option value="Islam" {{ old('religion') == 'Islam' ? 'selected' : '' }}>Islam</option>
                                    <option value="Buddhism" {{ old('religion') == 'Buddhism' ? 'selected' : '' }}>Buddhism</option>
                                    <option value="Hinduism" {{ old('religion') == 'Hinduism' ? 'selected' : '' }}>Hinduism</option>
                                    <option value="Other" {{ old('religion') == 'Other' ? 'selected' : '' }}>Other</option>
                                </select>
                                <input 
                                    type="text" 
                                    id="religionInput" 
                                    name="religion_other"
                                    class="mt-2 w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 hidden" 
                                    placeholder="Enter your religion"
                                    value="{{ old('religion_other') }}"
                                >
                                @error('religion')
                                    <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="space-y-2">
                                <label for="voters-status" class="block text-gray-700 font-medium">
                                    Voters Status <span class="text-red-500">*</span>
                                </label>
                                <select 
                                    id="voters-status" 
                                    name="voters_status"
                                    class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                    required
                                >
                                    <option value="" disabled {{ old('voters_status') == '' ? 'selected' : '' }}>Select Voters Status</option>
                                    <option value="registered" {{ old('voters_status') == 'registered' ? 'selected' : '' }}>Registered</option>
                                    <option value="not_registered" {{ old('voters_status') == 'not_registered' ? 'selected' : '' }}>Not Registered</option>
                                </select>
                                @error('voters_status')
                                    <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="space-y-2">
                                <label for="employment-status" class="block text-gray-700 font-medium">
                                    Employment Status <span class="text-red-500">*</span>
                                </label>
                                <select 
                                    id="employment-status" 
                                    name="employment_status"
                                    class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                    required
                                >
                                    <option value="" disabled {{ old('employment_status') == '' ? 'selected' : '' }}>Select Employment Status</option>
                                    <option value="worker" {{ old('employment_status') == 'worker' ? 'selected' : '' }}>Worker</option>
                                    <option value="self-employed" {{ old('employment_status') == 'self-employed' ? 'selected' : '' }}>Self Employed</option>
                                    <option value="employee" {{ old('employment_status') == 'employee' ? 'selected' : '' }}>Employee</option>
                                </select>
                                @error('employment_status')
                                    <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="mt-8">
                            <label class="inline-flex items-center">
                                <input 
                                    type="checkbox" 
                                    id="disability" 
                                    name="has_disability"
                                    class="h-5 w-5 rounded border-gray-300 text-blue-600 focus:ring-blue-500"
                                    {{ old('has_disability') ? 'checked' : '' }}
                                />
                                <span class="ml-2 text-gray-700 font-medium">Person with Disability</span>
                            </label>
                            @error('has_disability')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mt-8 flex justify-end">
                            <button type="button" id="next-btn" class="inline-flex items-center px-6 py-3 border border-transparent text-base font-medium rounded-md shadow-sm text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition duration-150">
                                Next Step
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-2" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </button>
                        </div>
                    </div>

                    <!-- Second Form Section -->
                    <div id="form-section-2" class="hidden">
                        <div class="flex flex-col md:flex-row gap-8">
                            <div class="flex-1 grid grid-cols-1 md:grid-cols-2 gap-x-12 gap-y-6">
                                <!-- Left Column -->
                                <div class="space-y-6">
                                    <div class="space-y-2">
                                        <label for="blood-type" class="block text-gray-700 font-medium">
                                            Blood Type <span class="text-red-500">*</span>
                                        </label>
                                        <select 
                                            id="blood-type" 
                                            name="blood_type"
                                            class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                            required
                                        >
                                            <option value="" disabled {{ old('blood_type') == '' ? 'selected' : '' }}>Select Blood Type</option>
                                            <option value="A+" {{ old('blood_type') == 'A+' ? 'selected' : '' }}>A+</option>
                                            <option value="A-" {{ old('blood_type') == 'A-' ? 'selected' : '' }}>A-</option>
                                            <option value="B+" {{ old('blood_type') == 'B+' ? 'selected' : '' }}>B+</option>
                                            <option value="B-" {{ old('blood_type') == 'B-' ? 'selected' : '' }}>B-</option>
                                            <option value="AB+" {{ old('blood_type') == 'AB+' ? 'selected' : '' }}>AB+</option>
                                            <option value="AB-" {{ old('blood_type') == 'AB-' ? 'selected' : '' }}>AB-</option>
                                            <option value="O+" {{ old('blood_type') == 'O+' ? 'selected' : '' }}>O+</option>
                                            <option value="O-" {{ old('blood_type') == 'O-' ? 'selected' : '' }}>O-</option>
                                        </select>
                                        @error('blood_type')
                                            <span class="text-red-500 text-sm">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="space-y-2">
                                        <label for="occupation" class="block text-gray-700 font-medium">
                                            Occupation <span class="text-red-500">*</span>
                                        </label>
                                        <input 
                                            type="text" 
                                            id="occupation" 
                                            name="occupation"
                                            class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" 
                                            placeholder="Enter occupation"
                                            value="{{ old('occupation') }}"
                                            required
                                        >
                                        @error('occupation')
                                            <span class="text-red-500 text-sm">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="space-y-2">
                                        <label for="education" class="block text-gray-700 font-medium">
                                            Educational Attainment <span class="text-red-500">*</span>
                                        </label>
                                        <select 
                                            id="education" 
                                            name="educational_attainment"
                                            class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                            required
                                        >
                                            <option value="" disabled {{ old('educational_attainment') == '' ? 'selected' : '' }}>Select Educational Attainment</option>
                                            <option value="elementary" {{ old('educational_attainment') == 'elementary' ? 'selected' : '' }}>Elementary</option>
                                            <option value="highschool" {{ old('educational_attainment') == 'highschool' ? 'selected' : '' }}>High School</option>
                                            <option value="college" {{ old('educational_attainment') == 'college' ? 'selected' : '' }}>College</option>
                                            <option value="postgraduate" {{ old('educational_attainment') == 'postgraduate' ? 'selected' : '' }}>Postgraduate</option>
                                        </select>
                                        @error('educational_attainment')
                                            <span class="text-red-500 text-sm">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <!-- Right Column (Contact Info) -->
                                <div class="space-y-6">
                                    <div class="space-y-2">
                                        <label for="phone" class="block text-gray-700 font-medium">
                                            Phone Number <span class="text-red-500">*</span>
                                        </label>
                                        <div class="relative">
                                            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor">
                                                    <path d="M2 3a1 1 0 011-1h2.153a1 1 0 01.986.836l.74 4.435a1 1 0 01-.54 1.06l-1.548.773a11.037 11.037 0 006.105 6.105l.774-1.548a1 1 0 011.059-.54l4.435.74a1 1 0 01.836.986V17a1 1 0 01-1 1h-2C7.82 18 2 12.18 2 5V3z" />
                                                </svg>
                                            </div>
                                            <input 
                                                type="text" 
                                                id="phone" 
                                                name="phone_number"
                                                class="w-full pl-10 px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                                placeholder="+63 XXX XXX XXXX"
                                                value="{{ old('phone_number') }}"
                                                required
                                            >
                                        </div>
                                        @error('phone_number')
                                            <span class="text-red-500 text-sm">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="space-y-2">
                                        <label for="land" class="block text-gray-700 font-medium">
                                            Land Number
                                        </label>
                                        <div class="relative">
                                            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor">
                                                    <path d="M2 3a1 1 0 011-1h2.153a1 1 0 01.986.836l.74 4.435a1 1 0 01-.54 1.06l-1.548.773a11.037 11.037 0 006.105 6.105l.774-1.548a1 1 0 011.059-.54l4.435.74a1 1 0 01.836.986V17a1 1 0 01-1 1h-2C7.82 18 2 12.18 2 5V3z" />
                                                </svg>
                                            </div>
                                            <input 
                                                type="text" 
                                                id="land" 
                                                name="land_number"
                                                class="w-full pl-10 px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:column-gap-blue-500"
                                                value="{{ old('land_number') }}"
                                            >
                                        </div>
                                        @error('land_number')
                                            <span class="text-red-500 text-sm">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="space-y-2">
                                        <label for="email" class="block text-gray-700 font-medium">
                                            Email Address <span class="text-red-500">*</span>
                                        </label>
                                        <div class="relative">
                                            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor">
                                                    <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z" />
                                                    <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z" />
                                                </svg>
                                            </div>
                                            <input 
                                                type="email" 
                                                id="email" 
                                                name="email"
                                                class="w-full pl-10 px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                                value="{{ old('email') }}"
                                                required
                                            >
                                        </div>
                                        @error('email')
                                            <span class="text-red-500 text-sm">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="space-y-2">
                                        <label for="address" class="block text-gray-700 font-medium">
                                            Street/Unit/Bldg/Village <span class="text-red-500">*</span>
                                        </label>
                                        <input 
                                            type="text" 
                                            id="address" 
                                            name="address"
                                            class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                            value="{{ old('address') }}"
                                            required
                                        >
                                        @error('address')
                                            <span class="text-red-500 text-sm">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="mt-8 flex justify-between">
                            <button type="button" id="back-btn" class="inline-flex items-center px-6 py-3 border border-transparent text-base font-medium rounded-md shadow-sm text-white bg-gray-600 hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500 transition duration-150">
                                Back
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-2" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M9.707 16.707a1 1 0 01-1.414 0l-6-6a1 1 0 010-1.414l6-6a1 1 0 011.414 1.414L5.414 9H17a1 1 0 110 2H5.414l4.293 4.293a1 1 0 010 1.414z" clip-rule="evenodd" />
                                </svg>
                            </button>
                            <button type="submit" id="save-btn" class="inline-flex items-center px-6 py-3 border border-transparent text-base font-medium rounded-md shadow-sm text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition duration-150">
                                Save
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-2" viewBox="0 0 20 20" fill="currentColor">
                                    <path d="M7.707 10.293a1 1 0 10-1.414 1.414l3 3a1 1 0 001.414 0l3-3a1 1 0 00-1.414-1.414L11 11.586V6a1 1 0 00-1-1H9a1 1 0 00-1 1v5.586l-1.293-1.293z" />
                                    <path fill-rule="evenodd" d="M3 3a2 2 0 012-2h10a2 2 0 012 2v14a2 2 0 01-2 2H5a2 2 0 01-2-2V3zm2-1a1 1 0 00-1 1v14a1 1 0 001 1h10a1 1 0 001-1V3a1 1 0 00-1-1H5z" clip-rule="evenodd" />
                                </svg>
                            </button>
                        </div>
                    </div>
                </form>
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

        const formSection1 = document.getElementById('form-section-1');
        const formSection2 = document.getElementById('form-section-2');
        const nextBtn = document.getElementById('next-btn');
        const backBtn = document.getElementById('back-btn');
        const step1Indicator = document.getElementById('step-1-indicator');
        const step2Indicator = document.getElementById('step-2-indicator');
        const progressBar = document.getElementById('progress-bar');

        nextBtn.addEventListener('click', () => {
            formSection1.classList.add('hidden');
            formSection2.classList.remove('hidden');
            step1Indicator.classList.remove('bg-blue-600');
            step1Indicator.classList.add('bg-gray-200', 'text-gray-600');
            step2Indicator.classList.remove('bg-gray-200', 'text-gray-600');
            step2Indicator.classList.add('bg-blue-600', 'text-white');
            progressBar.classList.add('w-full');
        });

        backBtn.addEventListener('click', () => {
            formSection2.classList.add('hidden');
            formSection1.classList.remove('hidden');
            step2Indicator.classList.remove('bg-blue-600', 'text-white');
            step2Indicator.classList.add('bg-gray-200', 'text-gray-600');
            step1Indicator.classList.remove('bg-gray-200', 'text-gray-600');
            step1Indicator.classList.add('bg-blue-600', 'text-white');
            progressBar.classList.remove('w-full');
        });
    </script>
</body>
</html>
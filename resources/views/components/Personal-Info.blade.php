<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>Personal Information</title>
</head>
<body>
    @if (session('success'))
        <div class="p-4 mb-4 text-green-800 bg-green-100 rounded">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('new-residence.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        
        <div class="p-8 bg-[#FDFDFD]">
            <!-- First Form Section -->
            <div id="form-section-1">
                <div class="flex flex-col md:flex-row gap-8">
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
                                    name="first_name" 
                                    class="w-full border-b border-[#000000] bg-transparent outline-none text-[#000000]" 
                                    value="{{ old('first_name') }}"
                                    required
                                >
                                @error('first_name')
                                    <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="space-y-1">
                                <label for="last-name" class="text-[#000000] font-medium">
                                    Last Name: <span class="text-red-500">*</span>
                                </label>
                                <input 
                                    type="text" 
                                    id="last-name" 
                                    name="last_name" 
                                    class="w-full border-b border-[#000000] bg-transparent outline-none text-[#000000]" 
                                    value="{{ old('last_name') }}"
                                    required
                                >
                                @error('last_name')
                                    <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="space-y-1">
                                <label for="middle-name" class="text-[#000000] font-medium">
                                    Middle Name:
                                </label>
                                <input 
                                    type="text" 
                                    id="middle-name" 
                                    name="middle_name"
                                    class="w-full border-b border-[#000000] bg-transparent outline-none text-[#000000]"
                                    value="{{ old('middle_name') }}"
                                >
                                @error('middle_name')
                                    <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="space-y-1">
                                <label for="alias-name" class="text-[#000000] font-medium">
                                    Alias Name:
                                </label>
                                <input 
                                    type="text" 
                                    id="alias-name" 
                                    name="alias_name"
                                    class="w-full border-b border-[#000000] bg-transparent outline-none text-[#000000]"
                                    value="{{ old('alias_name') }}"
                                >
                                @error('alias_name')
                                    <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="space-y-1">
                                <label for="gender" class="text-[#000000] font-medium">
                                    Gender: <span class="text-red-500">*</span>
                                </label>
                                <select 
                                    id="gender" 
                                    name="gender"
                                    class="w-full border-b border-[#000000] bg-transparent outline-none text-[#000000] focus:border-[#000000]"
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

                            <div class="space-y-1">
                                <label for="marital-status" class="text-[#000000] font-medium">
                                    Marital Status: <span class="text-red-500">*</span>
                                </label>
                                <select 
                                    id="marital-status" 
                                    name="marital_status"
                                    class="w-full border-b border-[#000000] bg-transparent outline-none text-[#000000] focus:border-[#000000]"
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

                            <div class="space-y-1">
                                <label for="spouse-name" class="text-[#000000] font-medium">
                                    Name of Spouse:
                                </label>
                                <input 
                                    type="text" 
                                    id="spouse-name" 
                                    name="spouse_name"
                                    class="w-full border-b border-[#000000] bg-transparent outline-none text-[#000000]"
                                    value="{{ old('spouse_name') }}"
                                >
                                @error('spouse_name')
                                    <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="space-y-1">
                                <label for="purok" class="text-[#000000] font-medium">
                                    Purok: <span class="text-red-500">*</span>
                                </label>
                                <select 
                                    id="purok" 
                                    name="purok"
                                    class="w-full border-b border-[#000000] bg-transparent outline-none text-[#000000] focus:border-[#000000]"
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

                            <div class="space-y-1">
                                <label for="employment-status" class="text-[#000000] font-medium">
                                    Employment Status: <span class="text-red-500">*</span>
                                </label>
                                <select 
                                    id="employment-status" 
                                    name="employment_status"
                                    class="w-full border-b border-[#000000] bg-transparent outline-none text-[#000000] focus:border-[#000000]"
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

                        <!-- Right Column -->
                        <div class="space-y-4">
                            <div class="space-y-1">
                                <label for="birth-date" class="text-[#000000] font-medium">
                                    Birth Date: <span class="text-red-500">*</span>
                                </label>
                                <input 
                                    type="date" 
                                    id="birth-date" 
                                    name="birth_date"
                                    class="w-full border-b border-[#000000] bg-transparent outline-none text-[#000000] focus:border-[#000000]"
                                    value="{{ old('birth_date') }}"
                                    required
                                >
                                @error('birth_date')
                                    <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="space-y-1">
                                <label for="birth-place" class="text-[#000000] font-medium">
                                    Place of Birth: <span class="text-red-500">*</span>
                                </label>
                                <input 
                                    type="text" 
                                    id="birth-place" 
                                    name="birth_place"
                                    class="w-full border-b border-[#000000] bg-transparent outline-none text-[#000000]"
                                    value="{{ old('birth_place') }}"
                                    required
                                >
                                @error('birth_place')
                                    <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="space-y-1">
                                <label for="place" class="text-[#000000] font-medium">
                                    Place: <span class="text-red-500">*</span>
                                </label>
                                <input 
                                    type="text" 
                                    id="place" 
                                    name="place"
                                    class="w-full border-b border-[#000000] bg-transparent outline-none text-[#000000]"
                                    value="{{ old('place') }}"
                                    required
                                >
                                @error('place')
                                    <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="space-y-1">
                                <label for="height" class="text-[#000000] font-medium">
                                    Height in (Cm): <span class="text-red-500">*</span>
                                </label>
                                <input 
                                    type="text" 
                                    id="height" 
                                    name="height"
                                    class="w-full border-b border-[#000000] bg-transparent outline-none text-[#000000]"
                                    value="{{ old('height') }}"
                                    required
                                >
                                @error('height')
                                    <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="space-y-1">
                                <label for="weight" class="text-[#000000] font-medium">
                                    Weight in (Kg): <span class="text-red-500">*</span>
                                </label>
                                <input 
                                    type="text" 
                                    id="weight" 
                                    name="weight"
                                    class="w-full border-b border-[#000000] bg-transparent outline-none text-[#000000]"
                                    value="{{ old('weight') }}"
                                    required
                                >
                                @error('weight')
                                    <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="space-y-1">
                                <label for="religion" class="text-[#000000] font-medium">
                                    Religion: <span class="text-red-500">*</span>
                                </label>
                                <select 
                                    id="religionSelect" 
                                    name="religion"
                                    class="w-full border-b border-[#000000] bg-transparent outline-none text-[#000000] focus:border-[#000000]" 
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
                                    class="w-full border-b border-[#000000] bg-transparent outline-none text-[#000000] focus:border-[#000000] hidden" 
                                    placeholder="Enter your religion"
                                    value="{{ old('religion_other') }}"
                                >
                                @error('religion')
                                    <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="space-y-1">
                                <label for="voters-status" class="text-[#000000] font-medium">
                                    Voters Status: <span class="text-red-500">*</span>
                                </label>
                                <select 
                                    id="voters-status" 
                                    name="voters_status"
                                    class="w-full border-b border-[#000000] bg-transparent outline-none text-[#000000] focus:border-[#000000]"
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

                            <div class="flex items-center gap-2 mt-8">
                                <input 
                                    type="checkbox" 
                                    id="disability" 
                                    name="has_disability"
                                    class="w-5 h-5 border border-[#000000]"
                                    {{ old('has_disability') ? 'checked' : '' }}
                                />
                                <label for="disability" class="text-[#000000] font-medium">
                                    Person with Disability
                                </label>
                                @error('has_disability')
                                    <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mt-8 flex justify-end">
                    <button type="button" id="next-btn" class="bg-[#000000] text-white px-6 py-2 rounded hover:bg-[#333333]">
                        Next
                    </button>
                </div>
            </div>

            <!-- Second Form Section -->
            <div id="form-section-2" class="hidden">
                <div class="flex-1 grid grid-cols-1 md:grid-cols-2 gap-x-12 gap-y-4">
                    <!-- Left Column -->
                    <div class="space-y-4">
                        <div class="space-y-1">
                            <label for="blood-type" class="text-[#000000] font-medium">
                                Blood Type: <span class="text-red-500">*</span>
                            </label>
                            <select 
                                id="blood-type" 
                                name="blood_type"
                                class="w-full border-b border-[#000000] bg-transparent outline-none text-[#000000] focus:border-[#000000]"
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
                        <div class="space-y-1">
                            <label for="occupation" class="text-[#000000] font-medium">
                                Occupation: <span class="text-red-500">*</span>
                            </label>
                            <input 
                                type="text" 
                                id="occupation" 
                                name="occupation"
                                class="w-full border-b border-[#000000] bg-transparent outline-none text-[#000000]" 
                                placeholder="Enter occupation"
                                value="{{ old('occupation') }}"
                                required
                            >
                            @error('occupation')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="space-y-1">
                            <label for="education" class="text-[#000000] font-medium">
                                Educational Attainment: <span class="text-red-500">*</span>
                            </label>
                            <select 
                                id="education" 
                                name="educational_attainment"
                                class="w-full border-b border-[#000000] bg-transparent outline-none text-[#000000] focus:border-[#000000]"
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
                    <div class="space-y-4">
                        <div class="space-y-1">
                            <label for="phone" class="text-[#000000] font-medium">
                                Phone Number: <span class="text-red-500">*</span>
                            </label>
                            <input 
                                type="text" 
                                id="phone" 
                                name="phone_number"
                                class="w-full border-b border-[#000000] bg-transparent outline-none text-[#000000]"
                                value="{{ old('phone_number') }}"
                                required
                            >
                            @error('phone_number')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="space-y-1">
                            <label for="land" class="text-[#000000] font-medium">
                                Land Number:
                            </label>
                            <input 
                                type="text" 
                                id="land" 
                                name="land_number"
                                class="w-full border-b border-[#000000] bg-transparent outline-none text-[#000000]"
                                value="{{ old('land_number') }}"
                            >
                            @error('land_number')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="space-y-1">
                            <label for="email" class="text-[#000000] font-medium">
                                Email Address: <span class="text-red-500">*</span>
                            </label>
                            <input 
                                type="email" 
                                id="email" 
                                name="email"
                                class="w-full border-b border-[#000000] bg-transparent outline-none text-[#000000]"
                                value="{{ old('email') }}"
                                required
                            >
                            @error('email')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="space-y-1">
                            <label for="address" class="text-[#000000] font-medium">
                                Street/Unit/Bldg/Village: <span class="text-red-500">*</span>
                            </label>
                            <input 
                                type="text" 
                                id="address" 
                                name="address"
                                class="w-full border-b border-[#000000] bg-transparent outline-none text-[#000000]"
                                value="{{ old('address') }}"
                                required
                            >
                            @error('address')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="mt-8 flex justify-between">
                    <button type="button" id="back-btn" class="bg-[#000000] text-white px-6 py-2 rounded hover:bg-[#333333]">
                        Back
                    </button>
                    <button type="submit" id="save-btn" class="bg-[#000000] text-white px-6 py-2 rounded hover:bg-[#333333]">
                        Save
                    </button>
                </div>
            </div>
        </div>
    </form>

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

        nextBtn.addEventListener('click', () => {
            formSection1.classList.add('hidden');
            formSection2.classList.remove('hidden');
        });

        backBtn.addEventListener('click', () => {
            formSection2.classList.add('hidden');
            formSection1.classList.remove('hidden');
        });
    </script>
</body>
</html>
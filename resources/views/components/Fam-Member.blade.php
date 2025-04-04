<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>Personal Information</title>
</head>
<body class="bg-gray-100 min-h-screen flex items-center justify-center">
    <!-- Main Container -->
    <div class="p-8 bg-[#FDFDFD] rounded-lg shadow-lg">
        <div class="flex flex-col md:flex-row gap-8">
            <!-- Profile Photo Section -->
            <div class="relative overflow-x-auto shadow-md sm:rounded-lg w-full max-h-[400px] overflow-y-auto">
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-[#5A7A46] text-white">
                <tr>
                    <th scope="col" class="px-6 py-3">First Name</th>
                    <th scope="col" class="px-6 py-3">Last Name</th>
                    <th scope="col" class="px-6 py-3">Middle Name</th>
                    <th scope="col" class="px-6 py-3">Nickname</th>
                    <th scope="col" class="px-6 py-3">Gender</th>
                    <th scope="col" class="px-6 py-3">Age</th>
                    <th scope="col" class="px-6 py-3">Purok</th>
                    <th scope="col" class="px-6 py-3">Marital Status</th>
                    <th scope="col" class="px-6 py-3">Voter Status</th>
                    <th scope="col" class="px-6 py-3">Blood Type</th>
                    <th scope="col" class="px-6 py-3">Occupation</th>
                    <th scope="col" class="px-6 py-3">Educational Attainment</th>
                    <th scope="col" class="px-6 py-3">Phone Number</th>
                    <th scope="col" class="px-6 py-3">Email</th>
                    <th scope="col" class="px-6 py-3">Address</th>
                    <th scope="col" class="px-6 py-3">Emergency Contact Name</th>
                    <th scope="col" class="px-6 py-3">Emergency Contact Number</th>
                </tr>
                </thead>
                <tbody class="bg-white">
                <tr>
                    <td colspan="17" class="px-6 py-4 text-center text-gray-500">
                    No residents yet
                    </td>
                </tr>
                </tbody>
            </table>
            </div>
        </div>

        <!-- Save Buttons -->
        <div class="flex justify-end mt-8 gap-4">
            <button id="addMemberBtn" class="bg-[#d1e2c4] text-[#000000] px-8 py-3 rounded-full text-lg">Add Another Member</button>
            <button class="bg-[#d1e2c4] text-[#000000] px-8 py-3 rounded-full text-lg">Save</button>
        </div>
    </div>

    <!-- Modal Structure -->
    <div id="profileModal" class="fixed inset-0 bg-black bg-opacity-50 hidden flex justify-center items-center z-50">
        <!-- Modal Content -->
        <div class="bg-[#BCD3AD] p-6 rounded-lg shadow-lg w-[1124px] h-[700px] relative overflow-y-auto ">
            <!-- Close Button -->
            <button id="closeModal" class="absolute top-4 right-4 text-gray-500 hover:text-gray-700">
                <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>

            <!-- Page 1: Personal Information -->
            <div id="modalPage1" class="flex-1 grid grid-cols-1 md:grid-cols-2 gap-x-12 gap-y-4 px-4 ">
                <!-- Left Column -->
                <div class="space-y-4">
                    <div class="space-y-1">
                        <label for="modal-first-name" class="text-[#000000] font-medium">
                            First Name: <span class="text-red-500">*</span>
                        </label>
                        <input 
                            type="text" 
                            id="modal-first-name" 
                            name="first_name" 
                            class="w-full border-b border-[#000000] bg-transparent outline-none text-[#000000]" 
                            required
                        >
                    </div>

                    <div class="space-y-1">
                        <label for="modal-last-name" class="text-[#000000] font-medium">
                            Last Name: <span class="text-red-500">*</span>
                        </label>
                        <input 
                            type="text" 
                            id="modal-last-name" 
                            name="last_name" 
                            class="w-full border-b border-[#000000] bg-transparent outline-none text-[#000000]" 
                            required
                        >
                    </div>

                    <div class="space-y-1">
                        <label for="modal-middle-name" class="text-[#000000] font-medium">
                            Middle Name: <span class="text-red-500">*</span>
                        </label>
                        <input type="text" id="modal-middle-name" name="middle_name" class="w-full border-b border-[#000000] bg-transparent outline-none text-[#000000]" required>
                    </div>

                    <div class="space-y-1">
                        <label for="modal-alias-name" class="text-[#000000] font-medium">
                            Alias Name: <span class="text-red-500">*</span>
                        </label>
                        <input type="text" id="modal-alias-name" name="alias_name" class="w-full border-b border-[#000000] bg-transparent outline-none text-[#000000]" required>
                    </div>

                    <div class="space-y-1">
                        <label for="modal-gender" class="text-[#000000] font-medium">
                            Gender: <span class="text-red-500">*</span>
                        </label>
                        <select id="modal-gender" name="gender" class="w-full border-b border-[#000000] bg-transparent outline-none text-[#000000] focus:border-[#000000]" required>
                            <option value="" disabled selected>Select gender</option>
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                        </select>
                    </div>

                    <div class="space-y-1">
                        <label for="modal-marital-status" class="text-[#000000] font-medium">
                            Marital Status: <span class="text-red-500">*</span>
                        </label>
                        <select id="modal-marital-status" name="marital_status" class="w-full border-b border-[#000000] bg-transparent outline-none text-[#000000] focus:border-[#000000]" required>
                            <option value="" disabled selected>Select Status</option>
                            <option value="married">Married</option>
                            <option value="single">Single</option>
                            <option value="divorced">Divorced</option>
                            <option value="widowed">Widowed</option>
                        </select>
                    </div>

                    <div class="space-y-1">
                        <label for="modal-spouse-name" class="text-[#000000] font-medium">
                            Name of Spouse: <span class="text-red-500">*</span>
                        </label>
                        <input type="text" id="modal-spouse-name" name="spouse_name" class="w-full border-b border-[#000000] bg-transparent outline-none text-[#000000]" required>
                    </div>

                    <div class="space-y-1">
                        <label for="modal-purok" class="text-[#000000] font-medium">
                            Purok: <span class="text-red-500">*</span>
                        </label>
                        <select id="modal-purok" name="purok" class="w-full border-b border-[#000000] bg-transparent outline-none text-[#000000] focus:border-[#000000]" required>
                            <option value="" disabled selected>Select Purok</option>
                            <option value="purok1">Purok Sampaguita</option>
                            <option value="purok2">Purok Mabini</option>
                            <option value="purok3">Purok Ilaw</option>
                            <option value="purok4">Purok Bukid</option>
                        </select>
                    </div>

                    <div class="space-y-1">
                        <label for="modal-employment-status" class="text-[#000000] font-medium">
                            Employment Status: <span class="text-red-500">*</span>
                        </label>
                        <select id="modal-employment-status" name="employment_status" class="w-full border-b border-[#000000] bg-transparent outline-none text-[#000000] focus:border-[#000000]" required>
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
                        <label for="modal-birth-date" class="text-[#000000] font-medium">
                            Birth Date: <span class="text-red-500">*</span>
                        </label>
                        <input type="date" id="modal-birth-date" name="birth_date" class="w-full border-b border-[#000000] bg-transparent outline-none text-[#000000] focus:border-[#000000]" required>
                    </div>

                    <div class="space-y-1">
                        <label for="modal-place-of-birth" class="text-[#000000] font-medium">
                            Place of Birth: <span class="text-red-500">*</span>
                        </label>
                        <input type="text" id="modal-place-of-birth" name="place_of_birth" class="w-full border-b border-[#000000] bg-transparent outline-none text-[#000000]" required>
                    </div>

                    <div class="space-y-1">
                        <label for="modal-place" class="text-[#000000] font-medium">
                            Place: <span class="text-red-500">*</span>
                        </label>
                        <input type="text" id="modal-place" name="place" class="w-full border-b border-[#000000] bg-transparent outline-none text-[#000000]" required>
                    </div>

                    <div class="space-y-1">
                        <label for="modal-height" class="text-[#000000] font-medium">
                            Height in (Cm): <span class="text-red-500">*</span>
                        </label>
                        <input type="text" id="modal-height" name="height" class="w-full border-b border-[#000000] bg-transparent outline-none text-[#000000]" required>
                    </div>

                    <div class="space-y-1">
                        <label for="modal-weight" class="text-[#000000] font-medium">
                            Weight in (Kg): <span class="text-red-500">*</span>
                        </label>
                        <input type="text" id="modal-weight" name="weight" class="w-full border-b border-[#000000] bg-transparent outline-none text-[#000000]" required>
                    </div>

                    <div class="space-y-1">
                        <label for="modal-religion" class="text-[#000000] font-medium">
                            Religion: <span class="text-red-500">*</span>
                        </label>
                        <select id="modal-religionSelect" name="religion" class="w-full border-b border-[#000000] bg-transparent outline-none text-[#000000] focus:border-[#000000]" onchange="toggleModalReligionInput()" required>
                            <option value="" disabled selected>Select Religion</option>
                            <option value="Christianity">Christianity</option>
                            <option value="Islam">Islam</option>
                            <option value="Buddhism">Buddhism</option>
                            <option value="Hinduism">Hinduism</option>
                            <option value="Other">Other</option>
                        </select>
                        <input type="text" id="modal-religionInput" name="religion_other" class="w-full border-b border-[#000000] bg-transparent outline-none text-[#000000] focus:border-[#000000] hidden" placeholder="Enter your religion">
                    </div>

                    <div class="space-y-1">
                        <label for="modal-voters-status" class="text-[#000000] font-medium">
                            Voters Status: <span class="text-red-500">*</span>
                        </label>
                        <select id="modal-voters-status" name="voters_status" class="w-full border-b border-[#000000] bg-transparent outline-none text-[#000000] focus:border-[#000000]" required>
                            <option value="" disabled selected>Select Voters Status</option>
                            <option value="Registered">Registered</option>
                            <option value="notRegistered">Not Registered</option>
                        </select>
                    </div>

                    <div class="flex items-center gap-2 mt-8">
                        <input type="checkbox" id="modal-disability" name="disability" class="w-5 h-5 border border-[#000000]">
                        <label for="modal-disability" class="text-[#000000] font-medium">
                            Person with Disability
                        </label>
                    </div>
                </div>
            </div>

            <!-- Page 2: Other Info and Contacts -->
            <div id="modalPage2" class="flex-1 grid grid-cols-1 md:grid-cols-2 gap-x-12 gap-y-4 px-4 hidden">
                <!-- Left Column -->
                <div class="space-y-4">
                    <div class="space-y-1">
                        <label for="modal-blood-type" class="text-[#000000] font-medium">
                            Blood Type: <span class="text-red-500">*</span>
                        </label>
                        <select id="modal-blood-type" name="blood_type" class="w-full border-b border-[#000000] bg-transparent outline-none text-[#000000] focus:border-[#000000]" required>
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
                        <label for="modal-occupation" class="text-[#000000] font-medium">
                            Occupation: <span class="text-red-500">*</span>
                        </label>
                        <input type="text" id="modal-occupation" name="occupation" class="w-full border-b border-[#000000] bg-transparent outline-none text-[#000000]" placeholder="Enter occupation" required>
                    </div>

                    <div class="space-y-1">
                        <label for="modal-education" class="text-[#000000] font-medium">
                            Educational Attainment: <span class="text-red-500">*</span>
                        </label>
                        <select id="modal-education" name="educational_attainment" class="w-full border-b border-[#000000] bg-transparent outline-none text-[#000000] focus:border-[#000000]" required>
                            <option value="" disabled selected>Select Educational Attainment</option>
                            <option value="elementary">Elementary</option>
                            <option value="highschool">High School</option>
                            <option value="college">College</option>
                            <option value="postgraduate">Postgraduate</option>
                        </select>
                    </div>

                    <div class="space-y-1">
                        <label for="modal-phone-number" class="text-[#000000] font-medium">
                            Phone Number: <span class="text-red-500">*</span>
                        </label>
                        <input type="text" id="modal-phone-number" name="phone_number" class="w-full border-b border-[#000000] bg-transparent outline-none text-[#000000]" placeholder="Enter phone number" required>
                    </div>

                    <div class="space-y-1">
                        <label for="modal-land-number" class="text-[#000000] font-medium">
                            Land Number: <span class="text-red-500">*</span>
                        </label>
                        <input type="text" id="modal-land-number" name="land_number" class="w-full border-b border-[#000000] bg-transparent outline-none text-[#000000]" placeholder="Enter land number" required>
                    </div>
                </div>

                <!-- Right Column -->
                <div class="space-y-4">
                    <div class="space-y-1">
                        <label for="modal-email" class="text-[#000000] font-medium">
                            Email Address: <span class="text-red-500">*</span>
                        </label>
                        <input type="email" id="modal-email" name="email" class="w-full border-b border-[#000000] bg-transparent outline-none text-[#000000]" placeholder="Enter email address" required>
                    </div>

                    <div class="space-y-1">
                        <label for="modal-address" class="text-[#000000] font-medium">
                            Street/Unit/Bldg/Village: <span class="text-red-500">*</span>
                        </label>
                        <input type="text" id="modal-address" name="address" class="w-full border-b border-[#000000] bg-transparent outline-none text-[#000000]" placeholder="Enter address" required>
                    </div>

                    <div class="space-y-1">
                        <label for="modal-emergency-contact-name" class="text-[#000000] font-medium">
                            Emergency Contact Name: <span class="text-red-500">*</span>
                        </label>
                        <input type="text" id="modal-emergency-contact-name" name="emergency_contact_name" class="w-full border-b border-[#000000] bg-transparent outline-none text-[#000000]" placeholder="Enter emergency contact name" required>
                    </div>

                    <div class="space-y-1">
                        <label for="modal-emergency-contact-number" class="text-[#000000] font-medium">
                            Emergency Contact Number: <span class="text-red-500">*</span>
                        </label>
                        <input type="text" id="modal-emergency-contact-number" name="emergency_contact_number" class="w-full border-b border-[#000000] bg-transparent outline-none text-[#000000]" placeholder="Enter emergency contact number" required>
                    </div>
                </div>
            </div>

            <!-- Modal Buttons -->
            <div class="flex justify-end mt-8 gap-4 px-4">
                <button id="modalPrevBtn" class="bg-[#d1e2c4] text-[#000000] px-8 py-3 rounded-full text-lg hidden">Previous</button>
                <button id="modalNextBtn" class="bg-[#d1e2c4] text-[#000000] px-8 py-3 rounded-full text-lg">Next</button>
                <button id="modalSaveBtn" class="bg-[#d1e2c4] text-[#000000] px-8 py-3 rounded-full text-lg hidden">Save</button>
            </div>
        </div>
    </div>

    <script>
        // Toggle Religion Input for Main Form
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

        // Toggle Religion Input for Modal
        function toggleModalReligionInput() {
            const select = document.getElementById('modal-religionSelect');
            const input = document.getElementById('modal-religionInput');
            if (select.value === 'Other') {
                input.classList.remove('hidden');
            } else {
                input.classList.add('hidden');
                input.value = '';
            }
        }

        // Modal Handling
        const addMemberBtn = document.getElementById('addMemberBtn');
        const profileModal = document.getElementById('profileModal');
        const closeModalBtn = document.getElementById('closeModal');
        const modalPage1 = document.getElementById('modalPage1');
        const modalPage2 = document.getElementById('modalPage2');
        const modalNextBtn = document.getElementById('modalNextBtn');
        const modalPrevBtn = document.getElementById('modalPrevBtn');
        const modalSaveBtn = document.getElementById('modalSaveBtn');

        addMemberBtn.addEventListener('click', function() {
            profileModal.classList.remove('hidden');
            modalPage1.classList.remove('hidden');
            modalPage2.classList.add('hidden');
            modalNextBtn.classList.remove('hidden');
            modalPrevBtn.classList.add('hidden');
            modalSaveBtn.classList.add('hidden');
        });

        closeModalBtn.addEventListener('click', function() {
            profileModal.classList.add('hidden');
        });

        profileModal.addEventListener('click', function(event) {
            if (event.target === this) {
                this.classList.add('hidden');
            }
        });

        // Next Button Logic
        modalNextBtn.addEventListener('click', function() {
            modalPage1.classList.add('hidden');
            modalPage2.classList.remove('hidden');
            modalNextBtn.classList.add('hidden');
            modalPrevBtn.classList.remove('hidden');
            modalSaveBtn.classList.remove('hidden');
        });

        // Previous Button Logic
        modalPrevBtn.addEventListener('click', function() {
            modalPage1.classList.remove('hidden');
            modalPage2.classList.add('hidden');
            modalNextBtn.classList.remove('hidden');
            modalPrevBtn.classList.add('hidden');
            modalSaveBtn.classList.add('hidden');
        });

        // Handle Modal Save
        modalSaveBtn.addEventListener('click', function() {
            const formData = {
                first_name: document.getElementById('modal-first-name').value,
                last_name: document.getElementById('modal-last-name').value,
                middle_name: document.getElementById('modal-middle-name').value,
                alias_name: document.getElementById('modal-alias-name').value,
                gender: document.getElementById('modal-gender').value,
                marital_status: document.getElementById('modal-marital-status').value,
                spouse_name: document.getElementById('modal-spouse-name').value,
                purok: document.getElementById('modal-purok').value,
                employment_status: document.getElementById('modal-employment-status').value,
                birth_date: document.getElementById('modal-birth-date').value,
                place_of_birth: document.getElementById('modal-place-of-birth').value,
                place: document.getElementById('modal-place').value,
                height: document.getElementById('modal-height').value,
                weight: document.getElementById('modal-weight').value,
                religion: document.getElementById('modal-religionSelect').value === 'Other' ? document.getElementById('modal-religionInput').value : document.getElementById('modal-religionSelect').value,
                voters_status: document.getElementById('modal-voters-status').value,
                disability: document.getElementById('modal-disability').checked,
                blood_type: document.getElementById('modal-blood-type').value,
                occupation: document.getElementById('modal-occupation').value,
                educational_attainment: document.getElementById('modal-education').value,
                phone_number: document.getElementById('modal-phone-number').value,
                land_number: document.getElementById('modal-land-number').value,
                email: document.getElementById('modal-email').value,
                address: document.getElementById('modal-address').value,
                emergency_contact_name: document.getElementById('modal-emergency-contact-name').value,
                emergency_contact_number: document.getElementById('modal-emergency-contact-number').value
            };
            console.log(formData);
            profileModal.classList.add('hidden'); // Close modal after saving
        });
    </script>
</body>
</html>
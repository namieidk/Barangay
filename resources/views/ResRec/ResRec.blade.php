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
        .modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0,0,0,0.5);
            z-index: 1000;
        }
        .modal-content {
            background-color: white;
            margin: 5% auto;
            padding: 20px;
            width: 90%;
            max-width: 600px;
            max-height: 80vh;
            overflow-y: auto;
            border-radius: 8px;
            position: relative;
        }
        .close {
            position: absolute;
            right: 20px;
            top: 10px;
            font-size: 24px;
            cursor: pointer;
        }
        .form-page {
            display: none;
        }
        .form-page.active {
            display: block;
        }
    </style>
</head>
<body class="min-h-screen flex">
    <x-sidebar></x-sidebar>

    <div class="flex-1 ml-64 pt-14 bg-4A6936-50-opacity">
        <div class="p-6 w-full max-w-5xl">
            <h1 class="text-5xl font-bold mb-4 mt-[-50px] ml-0">Residence Records</h1>

            @if(session('success'))
                <div class="mb-4 text-black">
                    {{ session('success') }}
                </div>
            @endif

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
                <table class="w-[120%] text-sm text-left rtl:text-right text-gray-500">
                    <thead class="text-xs text-white uppercase bg-[#385327]">
                        <tr>
                            <th scope="col" class="px-6 py-3">ResID</th>
                            <th scope="col" class="px-6 py-3">First Name</th>
                            <th scope="col" class="px-6 py-3">Middle Name</th>
                            <th scope="col" class="px-6 py-3">Last Name</th>
                            <th scope="col" class="px-6 py-3">Nickname</th>
                            <th scope="col" class="px-6 py-3">Gender</th>
                            <th scope="col" class="px-6 py-3">Age</th>
                            <th scope="col" class="px-6 py-3">Purok</th>
                            <th scope="col" class="px-6 py-3">Marital Status</th>
                            <th scope="col" class="px-6 py-3">Voter Status</th>
                            <th scope="col" class="px-6 py-3">Action</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white">
                        @forelse($residences as $residence)
                            <tr>
                                <td class="px-6 py-3">{{ $residence->id }}</td>
                                <td class="px-6 py-3">{{ $residence->first_name }}</td>
                                <td class="px-6 py-3">{{ $residence->middle_name }}</td>
                                <td class="px-6 py-3">{{ $residence->last_name }}</td>
                                <td class="px-6 py-3">{{ $residence->alias_name }}</td>
                                <td class="px-6 py-3">{{ $residence->gender }}</td>
                                <td class="px-6 py-3">{{ now()->diffInYears($residence->birth_date) }}</td>
                                <td class="px-6 py-3">{{ $residence->purok }}</td>
                                <td class="px-6 py-3">{{ $residence->marital_status }}</td>
                                <td class="px-6 py-3">{{ $residence->voters_status }}</td>
                                <td class="px-6 py-3">
                                    <button onclick="showModal('{{ $residence->id }}')" class="text-green-500 hover:text-green-700">Add Family Member</button>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="11" class="px-6 py-4 text-center text-gray-500">
                                    No residents yet
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <!-- Modal Structure -->
            <div id="addFamilyModal" class="modal">
                <div class="modal-content">
                    <span class="close" onclick="hideModal()">×</span>
                    <h2 class="text-2xl font-bold mb-4">Add Family Member</h2>
                    <form id="familyMemberForm" method="POST" action="{{ route('family.store') }}">
                        @csrf
                        <input type="hidden" name="residence_id" id="residence_id">

                        <!-- Relationship Selection Page -->
                        <div class="form-page active" id="page0">
                            <div class="space-y-4">
                                <label class="block text-sm font-medium">Relationship to Head of Family *</label>
                                <select name="relationship" id="relationship" class="w-full p-2 border rounded" required>
                                    <option value="" disabled selected>Select Relationship</option>
                                    <option value="wife">Wife</option>
                                    <option value="husband">Husband</option>
                                    <option value="son">Son</option>
                                    <option value="daughter">Daughter</option>
                                    <option value="mother">Mother</option>
                                    <option value="father">Father</option>
                                    <option value="sibling">Sibling</option>
                                    <option value="other">Other</option>
                                </select>
                            </div>
                            <button type="button" onclick="nextPage(1)" class="mt-4 bg-[#385327] text-white px-4 py-2 rounded">Next</button>
                        </div>

                        <!-- Page 1 -->
                        <div class="form-page" id="page1">
                            <div class="grid grid-cols-2 gap-4">
                                <div>
                                    <label class="block text-sm font-medium">First Name *</label>
                                    <input type="text" name="first_name" class="w-full p-2 border rounded" required>
                                </div>
                                <div>
                                    <label class="block text-sm font-medium">Last Name *</label>
                                    <input type="text" name="last_name" class="w-full p-2 border rounded" required>
                                </div>
                                <div>
                                    <label class="block text-sm font-medium">Middle Name</label>
                                    <input type="text" name="middle_name" class="w-full p-2 border rounded">
                                </div>
                                <div>
                                    <label class="block text-sm font-medium">Nickname</label>
                                    <input type="text" name="alias_name" class="w-full p-2 border rounded">
                                </div>
                                <div>
                                    <label class="block text-sm font-medium">Gender *</label>
                                    <select name="gender" class="w-full p-2 border rounded" required>
                                        <option value="male">Male</option>
                                        <option value="female">Female</option>
                                    </select>
                                </div>
                                <div>
                                    <label class="block text-sm font-medium">Marital Status *</label>
                                    <select name="marital_status" class="w-full p-2 border rounded" required>
                                        <option value="married">Married</option>
                                        <option value="single">Single</option>
                                        <option value="divorced">Divorced</option>
                                        <option value="widowed">Widowed</option>
                                    </select>
                                </div>
                                <div>
                                    <label class="block text-sm font-medium">Spouse Name</label>
                                    <input type="text" name="spouse_name" class="w-full p-2 border rounded">
                                </div>
                                <div>
                                    <label class="block text-sm font-medium">Purok *</label>
                                    <select name="purok" class="w-full p-2 border rounded" required>
                                        <option value="purok1">Purok 1</option>
                                        <option value="purok2">Purok 2</option>
                                        <option value="purok3">Purok 3</option>
                                        <option value="purok4">Purok 4</option>
                                    </select>
                                </div>
                            </div>
                            <div class="mt-4 flex justify-between">
                                <button type="button" onclick="nextPage(0)" class="bg-gray-500 text-white px-4 py-2 rounded">Previous</button>
                                <button type="button" onclick="nextPage(2)" class="bg-[#385327] text-white px-4 py-2 rounded">Next</button>
                            </div>
                        </div>

                        <!-- Page 2 -->
                        <div class="form-page" id="page2">
                            <div class="grid grid-cols-2 gap-4">
                                <div>
                                    <label class="block text-sm font-medium">Employment Status *</label>
                                    <select name="employment_status" class="w-full p-2 border rounded" required>
                                        <option value="worker">Worker</option>
                                        <option value="self-employed">Self-employed</option>
                                        <option value="employee">Employee</option>
                                    </select>
                                </div>
                                <div>
                                    <label class="block text-sm font-medium">Birth Date *</label>
                                    <input type="date" name="birth_date" class="w-full p-2 border rounded" required>
                                </div>
                                <div>
                                    <label class="block text-sm font-medium">Birth Place *</label>
                                    <input type="text" name="birth_place" class="w-full p-2 border rounded" required>
                                </div>
                                <div>
                                    <label class="block text-sm font-medium">Current Place *</label>
                                    <input type="text" name="place" class="w-full p-2 border rounded" required>
                                </div>
                                <div>
                                    <label class="block text-sm font-medium">Height (cm) *</label>
                                    <input type="number" name="height" class="w-full p-2 border rounded" required>
                                </div>
                                <div>
                                    <label class="block text-sm font-medium">Weight (kg) *</label>
                                    <input type="number" name="weight" class="w-full p-2 border rounded" required>
                                </div>
                                <div>
                                    <label class="block text-sm font-medium">Religion *</label>
                                    <input type="text" name="religion" class="w-full p-2 border rounded" required>
                                </div>
                                <div>
                                    <label class="block text-sm font-medium">Other Religion</label>
                                    <input type="text" name="religion_other" class="w-full p-2 border rounded">
                                </div>
                            </div>
                            <div class="mt-4 flex justify-between">
                                <button type="button" onclick="nextPage(1)" class="bg-gray-500 text-white px-4 py-2 rounded">Previous</button>
                                <button type="button" onclick="nextPage(3)" class="bg-[#385327] text-white px-4 py-2 rounded">Next</button>
                            </div>
                        </div>

                        <!-- Page 3 -->
                        <div class="form-page" id="page3">
                            <div class="grid grid-cols-2 gap-4">
                                <div>
                                    <label class="block text-sm font-medium">Voter Status *</label>
                                    <select name="voters_status" class="w-full p-2 border rounded" required>
                                        <option value="registered">Registered</option>
                                        <option value="not_registered">Not Registered</option>
                                    </select>
                                </div>
                                <div>
                                    <label class="block text-sm font-medium">Has Disability</label>
                                    <select name="has_disability" class="w-full p-2 border rounded">
                                        <option value="0">No</option>
                                        <option value="1">Yes</option>
                                    </select>
                                </div>
                                <div>
                                    <label class="block text-sm font-medium">Blood Type *</label>
                                    <select name="blood_type" class="w-full p-2 border rounded" required>
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
                                <div>
                                    <label class="block text-sm font-medium">Occupation *</label>
                                    <input type="text" name="occupation" class="w-full p-2 border rounded" required>
                                </div>
                                <div>
                                    <label class="block text-sm font-medium">Educational Attainment *</label>
                                    <select name="educational_attainment" class="w-full p-2 border rounded" required>
                                        <option value="elementary">Elementary</option>
                                        <option value="highschool">Highschool</option>
                                        <option value="college">College</option>
                                        <option value="postgraduate">Postgraduate</option>
                                    </select>
                                </div>
                                <div>
                                    <label class="block text-sm font-medium">Phone Number *</label>
                                    <input type="text" name="phone_number" class="w-full p-2 border rounded" required>
                                </div>
                                <div>
                                    <label class="block text-sm font-medium">Landline Number</label>
                                    <input type="text" name="land_number" class="w-full p-2 border rounded">
                                </div>
                                <div class="col-span-2">
                                    <label class="block text-sm font-medium">Email *</label>
                                    <input type="email" name="email" class="w-full p-2 border rounded" required>
                                </div>
                                <div class="col-span-2">
                                    <label class="block text-sm font-medium">Address *</label>
                                    <input type="text" name="address" class="w-full p-2 border rounded" required>
                                </div>
                            </div>
                            <div class="mt-4 flex justify-between">
                                <button type="button" onclick="nextPage(2)" class="bg-gray-500 text-white px-4 py-2 rounded">Previous</button>
                                <button type="submit" class="bg-[#385327] text-white px-4 py-2 rounded">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        function showModal(residenceId) {
            document.getElementById('addFamilyModal').style.display = 'block';
            document.getElementById('residence_id').value = residenceId;
            nextPage(0); // Start at the relationship selection page
        }

        function hideModal() {
            document.getElementById('addFamilyModal').style.display = 'none';
            document.getElementById('familyMemberForm').reset();
            nextPage(0); // Reset to relationship selection page
        }

        function nextPage(pageNum) {
            document.querySelectorAll('.form-page').forEach(page => {
                page.classList.remove('active');
            });
            document.getElementById(`page${pageNum}`).classList.add('active');
        }

        window.onclick = function(event) {
            const modal = document.getElementById('addFamilyModal');
            if (event.target === modal) {
                hideModal();
            }
        }
    </script>
</body>
</html>
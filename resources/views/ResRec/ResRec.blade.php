<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>BRGY INCIO, DAVAO CITY SYSTEM</title>
    <style>
        :root {
            --primary: #385327;
            --primary-light: rgba(56, 83, 39, 0.8);
            --primary-lighter: rgba(56, 83, 39, 0.1);
            --accent: #6A994E;
            --light: #F2F2F2;
            --dark: #333333;
        }
        
        body {
            font-family: 'Inter', 'Segoe UI', sans-serif;
            background-color: var(--light);
        }
        
        .bg-primary { background-color: var(--primary); }
        .bg-primary-light { background-color: var(--primary-light); }
        .bg-primary-lighter { background-color: var(--primary-lighter); }
        .text-primary { color: var(--primary); }
        .text-accent { color: var(--accent); }
        
        .btn-primary {
            background-color: var(--primary);
            color: white;
            padding: 0.5rem 1rem;
            border-radius: 0.375rem;
            font-weight: 500;
            transition: all 0.2s ease-in-out;
        }
        
        .btn-primary:hover {
            background-color: var(--accent);
            transform: translateY(-2px);
        }
        
        .btn-secondary {
            background-color: #718096;
            color: white;
            padding: 0.5rem 1rem;
            border-radius: 0.375rem;
            font-weight: 500;
            transition: all 0.2s ease-in-out;
        }
        
        .btn-secondary:hover {
            background-color: #4A5568;
            transform: translateY(-2px);
        }
        
        .btn-action {
            color: var(--accent);
            transition: all 0.2s ease-in-out;
            text-decoration: none;
            font-weight: 500;
        }
        
        .btn-action:hover {
            color: var(--primary);
            text-decoration: underline;
        }
        
        .card {
            background-color: white;
            border-radius: 0.5rem;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            padding: 1.5rem;
            transition: all 0.3s ease;
        }
        
        .card:hover {
            box-shadow: 0 10px 15px rgba(0, 0, 0, 0.1);
            transform: translateY(-5px);
        }
        
        .table-container {
            overflow-x: auto;
            border-radius: 0.5rem;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
        }
        
        table {
            width: 100%;
            border-collapse: separate;
            border-spacing: 0;
        }
        
        table th {
            background-color: var(--primary);
            color: white;
            font-weight: 600;
            text-transform: uppercase;
            font-size: 0.75rem;
            letter-spacing: 0.05em;
            padding: 1rem;
            text-align: left;
        }
        
        table th:first-child { border-top-left-radius: 0.5rem; }
        table th:last-child { border-top-right-radius: 0.5rem; }
        table tr:nth-child(even) { background-color: var(--primary-lighter); }
        table tr:hover { background-color: rgba(106, 153, 78, 0.1); }
        table td { padding: 1rem; vertical-align: middle; border-bottom: 1px solid #E2E8F0; }
        
        .search-container { position: relative; max-width: 24rem; }
        .search-input {
            width: 100%;
            padding: 0.75rem 1rem 0.75rem 2.5rem;
            border: 1px solid #E2E8F0;
            border-radius: 0.5rem;
            font-size: 0.875rem;
            transition: all 0.2s ease;
            background-color: white;
        }
        
        .search-input:focus {
            outline: none;
            border-color: var(--accent);
            box-shadow: 0 0 0 3px rgba(106, 153, 78, 0.2);
        }
        
        .search-icon {
            position: absolute;
            left: 0.75rem;
            top: 50%;
            transform: translateY(-50%);
            color: #718096;
        }
        
        .modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            z-index: 1000;
            backdrop-filter: blur(3px);
        }
        
        .modal-content {
            background-color: white;
            margin: 3% auto;
            padding: 2rem;
            width: 90%;
            max-width: 800px;
            max-height: 90vh;
            overflow-y: auto;
            border-radius: 0.5rem;
            position: relative;
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
            animation: modalFadeIn 0.3s ease;
        }
        
        .modal-sm {
            max-width: 400px;
        }
        
        @keyframes modalFadeIn {
            from { opacity: 0; transform: translateY(-20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        
        .close {
            position: absolute;
            right: 1.5rem;
            top: 1.5rem;
            font-size: 1.5rem;
            cursor: pointer;
            transition: all 0.2s ease;
            height: 2rem;
            width: 2rem;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
        }
        
        .close:hover { background-color: #F7FAFC; color: #E53E3E; }
        
        .form-page { display: none; animation: fadePage 0.3s ease; }
        @keyframes fadePage { from { opacity: 0; } to { opacity: 1; } }
        .form-page.active { display: block; }
        
        .progress-bar { display: flex; justify-content: space-between; margin-bottom: 2rem; position: relative; }
        .progress-bar::before {
            content: '';
            position: absolute;
            top: 50%;
            left: 0;
            height: 2px;
            width: 100%;
            background-color: #E2E8F0;
            z-index: 1;
        }
        
        .progress-step { position: relative; z-index: 2; display: flex; flex-direction: column; align-items: center; }
        .step-circle {
            width: 2rem;
            height: 2rem;
            border-radius: 50%;
            background-color: white;
            border: 2px solid #E2E8F0;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 600;
            font-size: 0.875rem;
            margin-bottom: 0.5rem;
            transition: all 0.3s ease;
        }
        
        .progress-step.active .step-circle { background-color: var(--primary); border-color: var(--primary); color: white; }
        .progress-step.completed .step-circle { background-color: var(--accent); border-color: var(--accent); color: white; }
        .step-text { font-size: 0.75rem; color: #718096; font-weight: 500; }
        .progress-step.active .step-text { color: var(--primary); font-weight: 600; }
        
        .form-control { margin-bottom: 1.5rem; }
        .form-label { display: block; margin-bottom: 0.5rem; font-weight: 500; color: var(--dark); font-size: 0.875rem; }
        .form-input, .form-select {
            width: 100%;
            padding: 0.75rem;
            border: 1px solid #E2E8F0;
            border-radius: 0.375rem;
            font-size: 0.875rem;
            transition: all 0.2s ease;
        }
        
        .form-input:focus, .form-select:focus {
            outline: none;
            border-color: var(--accent);
            box-shadow: 0 0 0 3px rgba(106, 153, 78, 0.2);
        }
        
        .required::after { content: ' *'; color: #E53E3E; }
        
        .page-header { display: flex; justify-content: space-between; align-items: center; margin-bottom: 2rem; }
        .add-new-btn {
            background-color: var(--accent);
            color: white;
            padding: 0.5rem 1rem;
            border-radius: 0.375rem;
            font-weight: 500;
            display: flex;
            align-items: center;
            gap: 0.5rem;
            transition: all 0.2s ease-in-out;
        }
        
        .add-new-btn:hover { background-color: var(--primary); transform: translateY(-2px); }
        
        .notifications { position: fixed; top: 1rem; right: 1rem; z-index: 1000; }
        .notification {
            background-color: white;
            padding: 1rem;
            border-radius: 0.375rem;
            margin-bottom: 0.5rem;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            display: flex;
            align-items: center;
            gap: 0.5rem;
            animation: notificationFadeIn 0.3s ease;
        }
        
        @keyframes notificationFadeIn {
            from { opacity: 0; transform: translateX(20px); }
            to { opacity: 1; transform: translateX(0); }
        }
        
        .notification-success { border-left: 4px solid #48BB78; }
        .notification-error { border-left: 4px solid #F56565; }
        
        .content-area { margin-left: 250px; padding: 2rem; min-height: 100vh; }
        
        .badge {
            padding: 0.25rem 0.5rem;
            border-radius: 9999px;
            font-size: 0.75rem;
            font-weight: 500;
        }
        
        .badge-green { background-color: rgba(72, 187, 120, 0.1); color: #48BB78; }
        .badge-red { background-color: rgba(245, 101, 101, 0.1); color: #F56565; }
        
        @media (max-width: 768px) {
            .content-area { margin-left: 0; }
            .menu-toggle { display: block; }
        }
    </style>
</head>
<body class="min-h-screen bg-gray-50">
    <!-- Sidebar Component -->
    <x-sidebar></x-sidebar>

    <!-- Main Content -->
    <div class="content-area">
        <!-- Notifications Area -->
        <div class="notifications">
            @if(session('success'))
                <div class="notification notification-success">
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="#48BB78" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path>
                        <polyline points="22 4 12 14.01 9 11.01"></polyline>
                    </svg>
                    <span>{{ session('success') }}</span>
                </div>
            @endif
        </div>

        <!-- Page Header -->
        <div class="page-header">
            <h1 class="text-2xl font-bold text-gray-800">Residence Records</h1>
            <button class="add-new-btn">
                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <line x1="12" y1="5" x2="12" y2="19"></line>
                    <line x1="5" y1="12" x2="19" y2="12"></line>
                </svg>
                <span>Add New Resident</span>
            </button>
        </div>

        <!-- Search Bar -->
        <div class="card mb-6">
            <div class="search-container">
                <svg xmlns="http://www.w3.org/2000/svg" class="search-icon" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <circle cx="11" cy="11" r="8"></circle>
                    <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                </svg>
                <input type="search" id="resident-search" class="search-input" placeholder="Search by name, ID, or purok..." />
            </div>
        </div>

        <!-- Data Table -->
        <div class="card">
            <div class="table-container">
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Gender</th>
                            <th>Age</th>
                            <th>Purok</th>
                            <th>Marital Status</th>
                            <th>Voter</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($residences as $residence)
                            <tr>
                                <td>{{ $residence->id }}</td>
                                <td>
                                    <div>
                                        <div class="font-medium">{{ $residence->first_name }} {{ $residence->middle_name }} {{ $residence->last_name }}</div>
                                        <div class="text-xs text-gray-500">{{ $residence->alias_name }}</div>
                                    </div>
                                </td>
                                <td>{{ ucfirst($residence->gender) }}</td>
                                <td>{{ now()->diffInYears($residence->birth_date) }}</td>
                                <td>{{ ucfirst($residence->purok) }}</td>
                                <td>{{ ucfirst($residence->marital_status) }}</td>
                                <td>
                                    @if($residence->voters_status == 'registered')
                                        <span class="badge badge-green">Registered</span>
                                    @else
                                        <span class="badge badge-red">Not Registered</span>
                                    @endif
                                </td>
                                <td>
                                    <div class="flex space-x-3">
                                        <button onclick="showModal('{{ $residence->id }}')" class="btn-action">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                <path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                                                <circle cx="8.5" cy="7" r="4"></circle>
                                                <line x1="20" y1="8" x2="20" y2="14"></line>
                                                <line x1="23" y1="11" x2="17" y2="11"></line>
                                            </svg>
                                            <span class="sr-only">Add Family</span>
                                        </button>
                                        <button onclick="showEditModal('{{ $residence->id }}')" class="btn-action">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path>
                                                <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path>
                                            </svg>
                                            <span class="sr-only">Edit</span>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="8" class="text-center py-6 text-gray-500">
                                    No residents found
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Add Family Modal -->
        <div id="addFamilyModal" class="modal">
            <div class="modal-content">
                <span class="close" onclick="hideModal()">×</span>
                <h2 class="text-2xl font-bold mb-6">Add Family Member</h2>
                
                <div class="progress-bar">
                    <div class="progress-step active" id="step0">
                        <div class="step-circle">1</div>
                        <div class="step-text">Relationship</div>
                    </div>
                    <div class="progress-step" id="step1">
                        <div class="step-circle">2</div>
                        <div class="step-text">Personal Info</div>
                    </div>
                    <div class="progress-step" id="step2">
                        <div class="step-circle">3</div>
                        <div class="step-text">Details</div>
                    </div>
                    <div class="progress-step" id="step3">
                        <div class="step-circle">4</div>
                        <div class="step-text">Contact</div>
                    </div>
                </div>
                
                <form id="familyMemberForm" method="POST" action="{{ route('family.store') }}">
                    @csrf
                    <input type="hidden" name="residence_id" id="residence_id">

                    <div class="form-page active" id="page0">
                        <div class="form-control">
                            <label class="form-label required">Relationship to Head of Family</label>
                            <select name="relationship" id="relationship" class="form-select" required>
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
                        <button type="button" onclick="nextPage(1)" class="btn-primary">Next</button>
                    </div>

                    <div class="form-page" id="page1">
                        <div class="grid grid-cols-2 gap-4">
                            <div class="form-control">
                                <label class="form-label required">First Name</label>
                                <input type="text" name="first_name" class="form-input" required>
                            </div>
                            <div class="form-control">
                                <label class="form-label required">Last Name</label>
                                <input type="text" name="last_name" class="form-input" required>
                            </div>
                            <div class="form-control">
                                <label class="form-label">Middle Name</label>
                                <input type="text" name="middle_name" class="form-input">
                            </div>
                            <div class="form-control">
                                <label class="form-label">Nickname</label>
                                <input type="text" name="alias_name" class="form-input">
                            </div>
                            <div class="form-control">
                                <label class="form-label required">Gender</label>
                                <select name="gender" class="form-select" required>
                                    <option value="male">Male</option>
                                    <option value="female">Female</option>
                                </select>
                            </div>
                            <div class="form-control">
                                <label class="form-label required">Marital Status</label>
                                <select name="marital_status" class="form-select" required>
                                    <option value="married">Married</option>
                                    <option value="single">Single</option>
                                    <option value="divorced">Divorced</option>
                                    <option value="widowed">Widowed</option>
                                </select>
                            </div>
                            <div class="form-control">
                                <label class="form-label">Spouse Name</label>
                                <input type="text" name="spouse_name" class="form-input">
                            </div>
                            <div class="form-control">
                                <label class="form-label required">Purok</label>
                                <select name="purok" class="form-select" required>
                                    <option value="purok1">Purok 1</option>
                                    <option value="purok2">Purok 2</option>
                                    <option value="purok3">Purok 3</option>
                                    <option value="purok4">Purok 4</option>
                                </select>
                            </div>
                        </div>
                        <div class="flex justify-between mt-4">
                            <button type="button" onclick="nextPage(0)" class="btn-secondary">Previous</button>
                            <button type="button" onclick="nextPage(2)" class="btn-primary">Next</button>
                        </div>
                    </div>

                    <div class="form-page" id="page2">
                        <div class="grid grid-cols-2 gap-4">
                            <div class="form-control">
                                <label class="form-label required">Employment Status</label>
                                <select name="employment_status" class="form-select" required>
                                    <option value="worker">Worker</option>
                                    <option value="self-employed">Self-employed</option>
                                    <option value="employee">Employee</option>
                                </select>
                            </div>
                            <div class="form-control">
                                <label class="form-label required">Birth Date</label>
                                <input type="date" name="birth_date" class="form-input" required>
                            </div>
                            <div class="form-control">
                                <label class="form-label required">Birth Place</label>
                                <input type="text" name="birth_place" class="form-input" required>
                            </div>
                            <div class="form-control">
                                <label class="form-label required">Current Place</label>
                                <input type="text" name="place" class="form-input" required>
                            </div>
                            <div class="form-control">
                                <label class="form-label required">Height (cm)</label>
                                <input type="number" name="height" class="form-input" required>
                            </div>
                            <div class="form-control">
                                <label class="form-label required">Weight (kg)</label>
                                <input type="number" name="weight" class="form-input" required>
                            </div>
                            <div class="form-control">
                                <label class="form-label required">Religion</label>
                                <input type="text" name="religion" class="form-input" required>
                            </div>
                            <div class="form-control">
                                <label class="form-label">Other Religion</label>
                                <input type="text" name="religion_other" class="form-input">
                            </div>
                        </div>
                        <div class="flex justify-between mt-4">
                            <button type="button" onclick="nextPage(1)" class="btn-secondary">Previous</button>
                            <button type="button" onclick="nextPage(3)" class="btn-primary">Next</button>
                        </div>
                    </div>

                    <div class="form-page" id="page3">
                        <div class="grid grid-cols-2 gap-4">
                            <div class="form-control">
                                <label class="form-label required">Voter Status</label>
                                <select name="voters_status" class="form-select" required>
                                    <option value="registered">Registered</option>
                                    <option value="not_registered">Not Registered</option>
                                </select>
                            </div>
                            <div class="form-control">
                                <label class="form-label">Has Disability</label>
                                <select name="has_disability" class="form-select">
                                    <option value="0">No</option>
                                    <option value="1">Yes</option>
                                </select>
                            </div>
                            <div class="form-control">
                                <label class="form-label required">Blood Type</label>
                                <select name="blood_type" class="form-select" required>
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
                            <div class="form-control">
                                <label class="form-label required">Occupation</label>
                                <input type="text" name="occupation" class="form-input" required>
                            </div>
                            <div class="form-control">
                                <label class="form-label required">Educational Attainment</label>
                                <select name="educational_attainment" class="form-select" required>
                                    <option value="elementary">Elementary</option>
                                    <option value="highschool">Highschool</option>
                                    <option value="college">College</option>
                                    <option value="postgraduate">Postgraduate</option>
                                </select>
                            </div>
                            <div class="form-control">
                                <label class="form-label required">Phone Number</label>
                                <input type="text" name="phone_number" class="form-input" required>
                            </div>
                            <div class="form-control">
                                <label class="form-label">Landline Number</label>
                                <input type="text" name="land_number" class="form-input">
                            </div>
                            <div class="form-control col-span-2">
                                <label class="form-label required">Email</label>
                                <input type="email" name="email" class="form-input" required>
                            </div>
                            <div class="form-control col-span-2">
                                <label class="form-label required">Address</label>
                                <input type="text" name="address" class="form-input" required>
                            </div>
                        </div>
                        <div class="flex justify-between mt-4">
                            <button type="button" onclick="nextPage(2)" class="btn-secondary">Previous</button>
                            <button type="submit" class="btn-primary">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <!-- Edit Modal -->
        <div id="editModal" class="modal">
            <div class="modal-content">
                <span class="close" onclick="hideEditModal()">×</span>
                <h2 class="text-2xl font-bold mb-6">Edit Resident</h2>
                <form id="editResidentForm" method="POST" action="">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="resident_id" id="edit_resident_id">

                    <div class="grid grid-cols-2 gap-4">
                        <!-- Personal Information -->
                        <div class="form-control">
                            <label class="form-label required">First Name</label>
                            <input type="text" name="first_name" id="edit_first_name" class="form-input" required>
                        </div>
                        <div class="form-control">
                            <label class="form-label required">Last Name</label>
                            <input type="text" name="last_name" id="edit_last_name" class="form-input" required>
                        </div>
                        <div class="form-control">
                            <label class="form-label">Middle Name</label>
                            <input type="text" name="middle_name" id="edit_middle_name" class="form-input">
                        </div>
                        <div class="form-control">
                            <label class="form-label">Nickname</label>
                            <input type="text" name="alias_name" id="edit_alias_name" class="form-input">
                        </div>
                        <div class="form-control">
                            <label class="form-label required">Gender</label>
                            <select name="gender" id="edit_gender" class="form-select" required>
                                <option value="male">Male</option>
                                <option value="female">Female</option>
                            </select>
                        </div>
                        <div class="form-control">
                            <label class="form-label required">Marital Status</label>
                            <select name="marital_status" id="edit_marital_status" class="form-select" required>
                                <option value="married">Married</option>
                                <option value="single">Single</option>
                                <option value="divorced">Divorced</option>
                                <option value="widowed">Widowed</option>
                            </select>
                        </div>
                        <div class="form-control">
                            <label class="form-label">Spouse Name</label>
                            <input type="text" name="spouse_name" id="edit_spouse_name" class="form-input">
                        </div>
                        <div class="form-control">
                            <label class="form-label required">Purok</label>
                            <input type="text" name="purok" id="edit_purok" class="form-input" required>
                        </div>

                        <!-- Additional Details -->
                        <div class="form-control">
                            <label class="form-label">Employment Status</label>
                            <select name="employment_status" id="edit_employment_status" class="form-select">
                                <option value="">Select Employment Status</option>
                                <option value="worker">Worker</option>
                                <option value="self-employed">Self-employed</option>
                                <option value="employee">Employee</option>
                            </select>
                        </div>
                        <div class="form-control">
                            <label class="form-label required">Birth Date</label>
                            <input type="date" name="birth_date" id="edit_birth_date" class="form-input" required>
                        </div>
                        <div class="form-control">
                            <label class="form-label required">Birth Place</label>
                            <input type="text" name="birth_place" id="edit_birth_place" class="form-input" required>
                        </div>
                        <div class="form-control">
                            <label class="form-label required">Current Place</label>
                            <input type="text" name="place" id="edit_place" class="form-input" required>
                        </div>
                        <div class="form-control">
                            <label class="form-label required">Height (cm)</label>
                            <input type="number" name="height" id="edit_height" class="form-input" required>
                        </div>
                        <div class="form-control">
                            <label class="form-label required">Weight (kg)</label>
                            <input type="number" name="weight" id="edit_weight" class="form-input" required>
                        </div>
                        <div class="form-control">
                            <label class="form-label required">Religion</label>
                            <input type="text" name="religion" id="edit_religion" class="form-input" required>
                        </div>
                        <div class="form-control">
                            <label class="form-label">Other Religion</label>
                            <input type="text" name="religion_other" id="edit_religion_other" class="form-input">
                        </div>

                        <!-- Contact Information -->
                        <div class="form-control">
                            <label class="form-label required">Voter Status</label>
                            <select name="voters_status" id="edit_voters_status" class="form-select" required>
                                <option value="registered">Registered</option>
                                <option value="not_registered">Not Registered</option>
                            </select>
                        </div>
                        <div class="form-control">
                            <label class="form-label required">Has Disability</label>
                            <select name="has_disability" id="edit_has_disability" class="form-select" required>
                                <option value="0">No</option>
                                <option value="1">Yes</option>
                            </select>
                        </div>
                        <div class="form-control">
                            <label class="form-label required">Blood Type</label>
                            <select name="blood_type" id="edit_blood_type" class="form-select" required>
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
                        <div class="form-control">
                            <label class="form-label required">Occupation</label>
                            <input type="text" name="occupation" id="edit_occupation" class="form-input" required>
                        </div>
                        <div class="form-control">
                            <label class="form-label required">Educational Attainment</label>
                            <select name="educational_attainment" id="edit_educational_attainment" class="form-select" required>
                                <option value="elementary">Elementary</option>
                                <option value="highschool">Highschool</option>
                                <option value="college">College</option>
                                <option value="postgraduate">Postgraduate</option>
                            </select>
                        </div>
                        <div class="form-control">
                            <label class="form-label required">Phone Number</label>
                            <input type="text" name="phone_number" id="edit_phone_number" class="form-input" required>
                        </div>
                        <div class="form-control">
                            <label class="form-label">Landline Number</label>
                            <input type="text" name="land_number" id="edit_land_number" class="form-input">
                        </div>
                        <div class="form-control col-span-2">
                            <label class="form-label required">Email</label>
                            <input type="email" name="email" id="edit_email" class="form-input" required>
                        </div>
                        <div class="form-control col-span-2">
                            <label class="form-label required">Address</label>
                            <input type="text" name="address" id="edit_address" class="form-input" required>
                        </div>
                    </div>

                    <div class="flex justify-between mt-4">
                        <button type="button" onclick="hideEditModal()" class="btn-secondary">Cancel</button>
                        <button type="submit" class="btn-primary">Save Changes</button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Archive Confirmation Modal -->
        <div id="archiveModal" class="modal">
            <div class="modal-content modal-sm">
                <span class="close" onclick="hideArchiveModal()">×</span>
                <h2 class="text-2xl font-bold mb-6">Archive Resident</h2>
                <p class="mb-6">Are you sure you want to archive this resident? This action can be undone later.</p>
                <form id="archiveResidentForm" method="POST" action="">
                    @csrf
                    @method('DELETE')
                    <input type="hidden" name="resident_id" id="archive_resident_id">
                    <div class="flex justify-between">
                        <button type="button" onclick="hideArchiveModal()" class="btn-secondary">Cancel</button>
                        <button type="submit" class="btn-primary bg-red-500 hover:bg-red-600">Archive</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        // Add Family Modal Functions
        function showModal(residenceId) {
            document.getElementById('addFamilyModal').style.display = 'block';
            document.getElementById('residence_id').value = residenceId;
            updateProgress(0);
        }

        function hideModal() {
            document.getElementById('addFamilyModal').style.display = 'none';
            document.getElementById('familyMemberForm').reset();
            updateProgress(0);
        }

        function nextPage(pageNum) {
            document.querySelectorAll('.form-page').forEach(page => {
                page.classList.remove('active');
            });
            document.getElementById(`page${pageNum}`).classList.add('active');
            updateProgress(pageNum);
        }

        function updateProgress(currentStep) {
            const steps = document.querySelectorAll('.progress-step');
            steps.forEach((step, index) => {
                step.classList.remove('active', 'completed');
                if (index < currentStep) {
                    step.classList.add('completed');
                } else if (index === currentStep) {
                    step.classList.add('active');
                }
            });
        }

        // Edit Modal Functions
        function showEditModal(residenceId) {
            const modal = document.getElementById('editModal');
            const form = document.getElementById('editResidentForm');
            const residentIdInput = document.getElementById('edit_resident_id');
            
            form.action = `/residents/${residenceId}`;
            residentIdInput.value = residenceId;

            fetch(`/residents/${residenceId}/edit`)
                .then(response => response.json())
                .then(data => {
                    document.getElementById('edit_first_name').value = data.first_name || '';
                    document.getElementById('edit_last_name').value = data.last_name || '';
                    document.getElementById('edit_middle_name').value = data.middle_name || '';
                    document.getElementById('edit_alias_name').value = data.alias_name || '';
                    document.getElementById('edit_gender').value = data.gender || '';
                    document.getElementById('edit_marital_status').value = data.marital_status || '';
                    document.getElementById('edit_spouse_name').value = data.spouse_name || '';
                    document.getElementById('edit_purok').value = data.purok || '';
                    document.getElementById('edit_employment_status').value = data.employment_status || '';
                    document.getElementById('edit_birth_date').value = data.birth_date || '';
                    document.getElementById('edit_birth_place').value = data.birth_place || '';
                    document.getElementById('edit_place').value = data.place || '';
                    document.getElementById('edit_height').value = data.height || '';
                    document.getElementById('edit_weight').value = data.weight || '';
                    document.getElementById('edit_religion').value = data.religion || '';
                    document.getElementById('edit_religion_other').value = data.religion_other || '';
                    document.getElementById('edit_voters_status').value = data.voters_status || '';
                    document.getElementById('edit_has_disability').value = data.has_disability ? '1' : '0';
                    document.getElementById('edit_blood_type').value = data.blood_type || '';
                    document.getElementById('edit_occupation').value = data.occupation || '';
                    document.getElementById('edit_educational_attainment').value = data.educational_attainment || '';
                    document.getElementById('edit_phone_number').value = data.phone_number || '';
                    document.getElementById('edit_land_number').value = data.land_number || '';
                    document.getElementById('edit_email').value = data.email || '';
                    document.getElementById('edit_address').value = data.address || '';
                    modal.style.display = 'block';
                })
                .catch(error => console.error('Error:', error));
        }

        function hideEditModal() {
            document.getElementById('editModal').style.display = 'none';
            document.getElementById('editResidentForm').reset();
        }

        // Archive Modal Functions
        function showArchiveModal(residenceId) {
            const modal = document.getElementById('archiveModal');
            const form = document.getElementById('archiveResidentForm');
            const residentIdInput = document.getElementById('archive_resident_id');
            
            form.action = `/residents/${residenceId}/archive`;
            residentIdInput.value = residenceId;
            modal.style.display = 'block';
        }

        function hideArchiveModal() {
            document.getElementById('archiveModal').style.display = 'none';
        }

        // Close modals when clicking outside
        window.onclick = function(event) {
            const addModal = document.getElementById('addFamilyModal');
            const editModal = document.getElementById('editModal');
            const archiveModal = document.getElementById('archiveModal');
            
            if (event.target === addModal) hideModal();
            if (event.target === editModal) hideEditModal();
            if (event.target === archiveModal) hideArchiveModal();
        }
    </script>
</body>
</html>
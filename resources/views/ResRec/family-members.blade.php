<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>BRGY INCIO, DAVAO CITY SYSTEM - Family Member List</title>
    <style>
        :root {
            --primary: #e6ffe6;
            --primary-light: rgba(209, 215, 205, 0.8);
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
            color: black;
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
            background-color: white;
        }
        
        table th {
            background-color: var(--primary);
            color: black;
            font-weight: 600;
            text-transform: uppercase;
            font-size: 0.75rem;
            letter-spacing: 0.05em;
            padding: 1rem;
            text-align: left;
        }
        
        table th:first-child { border-top-left-radius: 0.5rem; }
        table th:last-child { border-top-right-radius: 0.5rem; }
        table tbody tr:hover td { background-color: #F0F8FF !important; }
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
            background-color: #e6ffe6;
            color: #333;
            padding: 0.5rem 1rem;
            border-radius: 0.375rem;
            font-weight: 500;
            display: flex;
            align-items: center;
            gap: 0.5rem;
            transition: all 0.2s ease-in-out;
        }
        
        .add-new-btn:hover {
            background-color: #d4f7d4;
            transform: translateY(-2px);
        }
        
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
            <h1 class="text-2xl font-bold text-gray-800">Family Member List</h1>
            <a href="{{ route('family-members.index') }}" class="add-new-btn">
                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <line x1="12" y1="5" x2="12" y2="19"></line>
                    <line x1="5" y1="12" x2="19" y2="12"></line>
                </svg>
                <span>Add New Family Member</span>
            </a>
        </div>

        <!-- Search Bar -->
        <div class="card mb-6">
            <div class="search-container">
                <svg xmlns="http://www.w3.org/2000/svg" class="search-icon" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <circle cx="11" cy="11" r="8"></circle>
                    <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                </svg>
                <input type="search" id="family-search" class="search-input" placeholder="Search by name, ID, or purok..." />
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
                        @forelse($familyMembers as $member)
                            <tr>
                                <td>{{ $member->id }}</td>
                                <td>
                                    <div>
                                        <div class="font-medium">{{ $member->first_name }} {{ $member->middle_name }} {{ $member->last_name }}</div>
                                        <div class="text-xs text-gray-500">{{ $member->alias_name }}</div>
                                    </div>
                                </td>
                                <td>{{ ucfirst($member->gender) }}</td>
                                <td>{{ sprintf('%02d', abs(now()->diffInYears($member->birth_date))) }}</td>
                                <td>{{ ucfirst($member->purok) }}</td>
                                <td>{{ ucfirst($member->marital_status) }}</td>
                                <td>
                                    @if($member->voters_status == 'registered')
                                        <span class="badge badge-green">Registered</span>
                                    @else
                                        <span class="badge badge-red">Not Registered</span>
                                    @endif
                                </td>
                                <td>
    <div class="flex space-x-3">
        <button type="button" class="btn-action" data-id="{{ $member->id }}">
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
                                    No family members found
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Edit Modal -->
        <div id="editModal" class="modal">
            <div class="modal-content">
                <span class="close" onclick="hideEditModal()">×</span>
                <h2 class="text-2xl font-bold mb-6">Edit Family Member</h2>
                <form id="editFamilyForm" method="POST" action="">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="family_member_id" id="edit_family_member_id">

                    <div class="grid grid-cols-2 gap-4">
                        <!-- Personal Information -->
                        <div class="form-control">
                            <label class="form-label required">Residence ID</label>
                            <input type="text" name="residence_id" id="edit_residence_id" class="form-input" required>
                        </div>
                        <div class="form-control">
                            <label class="form-label required">Relationship</label>
                            <select name="relationship" id="edit_relationship" class="form-select" required>
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
                            <select name="purok" id="edit_purok" class="form-select" required>
                                <option value="purok1">Purok 1</option>
                                <option value="purok2">Purok 2</option>
                                <option value="purok3">Purok 3</option>
                                <option value="purok4">Purok 4</option>
                            </select>
                        </div>

                        <!-- Additional Details -->
                        <div class="form-control">
                            <label class="form-label required">Employment Status</label>
                            <select name="employment_status" id="edit_employment_status" class="form-select" required>
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
    </div>

    <script>
        // Edit Modal Functions
function showEditModal(memberId) {
    const modal = document.getElementById('editModal');
    const form = document.getElementById('editFamilyForm');
    
    // Show the modal immediately
    modal.style.display = 'block';
    
    // Set the form action and member ID
    form.action = `/family-members/${memberId}`;
    document.getElementById('edit_family_member_id').value = memberId;
    
    // Get CSRF token from the page
    const csrfToken = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content') || 
                      document.querySelector('input[name="_token"]')?.value || '';
    
    // Add loading indicator
    const formContent = document.querySelector('.modal-content');
    const loadingElement = document.createElement('div');
    loadingElement.id = 'loading-indicator';
    loadingElement.style.cssText = 'position: absolute; top: 0; left: 0; right: 0; bottom: 0; background: rgba(255,255,255,0.7); display: flex; justify-content: center; align-items: center; z-index: 10;';
    loadingElement.innerHTML = '<div>Loading...</div>';
    formContent.appendChild(loadingElement);
    
    // Fetch the member data
    fetch(`/family-members/${memberId}/edit`, {
        method: 'GET',
        headers: {
            'X-CSRF-TOKEN': csrfToken,
            'Accept': 'application/json',
            'X-Requested-With': 'XMLHttpRequest'
        }
    })
    .then(response => {
        if (!response.ok) {
            throw new Error(`HTTP error! Status: ${response.status}`);
        }
        return response.json();
    })
    .then(data => {
        // Remove loading indicator
        document.getElementById('loading-indicator')?.remove();
        
        // Populate form fields with data
        document.getElementById('edit_residence_id').value = data.residence_id || '';
        document.getElementById('edit_relationship').value = data.relationship || '';
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
    })
    .catch(error => {
        console.error('Error fetching data:', error);
        document.getElementById('loading-indicator')?.remove();
        
        // Show error message to user
        const errorDiv = document.createElement('div');
        errorDiv.className = 'bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded';
        errorDiv.innerHTML = `<strong>Error!</strong> Failed to load family member data. Please try again.`;
        formContent.prepend(errorDiv);
        
        // Remove error message after 3 seconds
        setTimeout(() => {
            errorDiv.remove();
        }, 3000);
    });
}

function hideEditModal() {
    document.getElementById('editModal').style.display = 'none';
    document.getElementById('editFamilyForm').reset();
}

// Close modal when clicking outside
window.onclick = function(event) {
    const editModal = document.getElementById('editModal');
    if (event.target === editModal) {
        hideEditModal();
    }
}

// Make sure the page loads all listeners
document.addEventListener('DOMContentLoaded', function() {
    // Ensure we have CSRF token for AJAX requests
    if (!document.querySelector('meta[name="csrf-token"]')) {
        const meta = document.createElement('meta');
        meta.name = 'csrf-token';
        meta.content = document.querySelector('input[name="_token"]')?.value || '';
        document.head.appendChild(meta);
    }
    
    // Debug logging for edit buttons
    document.querySelectorAll('.btn-action').forEach(button => {
        button.addEventListener('click', function(event) {
            // Prevent any default behavior
            event.preventDefault();
            event.stopPropagation();
            
            // Get the member ID
            const memberId = this.getAttribute('data-id') || 
                             this.closest('tr').querySelector('td:first-child').textContent;
            
            // Log for debugging
            console.log('Edit button clicked for member ID:', memberId);
            
            // Show the edit modal
            showEditModal(memberId);
        });
    });
});
    </script>
</body>
</html>
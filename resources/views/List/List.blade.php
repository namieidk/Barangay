<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Residents List</title>
    <style>
        :root {
            --primary: #e6ffe6;
            --primary-light: rgba(71, 47, 180, 0.8);
            --primary-lighter: rgba(226, 223, 230, 0.1);
            --accent: #6A994E;
            --light: rgb(246, 246, 248);
            --dark: #333333;
            --sidebar-width: 250px;
        }

        body {
            font-family: 'Inter', 'Segoe UI', sans-serif;
            background-color: var(--light);
            margin: 0;
            display: flex;
            min-height: 100vh;
        }

        .sidebar {
            width: var(--sidebar-width);
            background-color: #2D3748;
            color: white;
            padding: 1.5rem;
            position: fixed;
            top: 0;
            bottom: 0;
            overflow-y: auto;
        }

        .sidebar h2 {
            font-size: 1.25rem;
            margin-bottom: 1.5rem;
        }

        .sidebar ul {
            list-style: none;
            padding: 0;
        }

        .sidebar li {
            margin-bottom: 1rem;
        }

        .sidebar a {
            color: #E2E8F0;
            text-decoration: none;
            font-size: 0.875rem;
            display: block;
            padding: 0.5rem;
            border-radius: 0.25rem;
            transition: background-color 0.2s ease;
        }

        .sidebar a:hover {
            background-color: rgba(255, 255, 255, 0.1);
        }

        .main-container {
            flex: 1;
            margin-left: var(--sidebar-width);
            padding: 2rem;
        }

        .card {
            background-color: white;
            border-radius: 0.5rem;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            padding: 1.5rem;
            margin-bottom: 1.5rem;
        }

        .table-container {
            overflow-x: auto;
            border-radius: 0.5rem;
        }

        table {
            width: 100%;
            border-collapse: separate;
            border-spacing: 0;
            background-color: white;
        }

        table th {
            background-color: var(--primary);
            color: #000000;
            font-weight: 600;
            padding: 1rem;
            text-align: left;
        }

        table td {
            padding: 1rem;
            vertical-align: middle;
            border-bottom: 1px solid #E2E8F0;
        }

        .btn-action {
            color: var(--accent);
            cursor: pointer;
            transition: color 0.2s ease;
        }

        .btn-action:hover {
            color: var(--primary-light);
        }

        .badge {
            padding: 0.25rem 0.5rem;
            border-radius: 9999px;
            font-size: 0.75rem;
            font-weight: 500;
        }

        .badge-green {
            background-color: rgba(72, 187, 120, 0.1);
            color: #48BB78;
        }

        .badge-red {
            background-color: rgba(245, 101, 101, 0.1);
            color: #F56565;
        }

        .search-container {
            position: relative;
            max-width: 24rem;
        }

        .search-input {
            width: 100%;
            padding: 0.75rem 1rem 0.75rem 2.5rem;
            border: 1px solid #E2E8F0;
            border-radius: 0.375rem;
            font-size: 0.875rem;
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
        }

        .close {
            position: absolute;
            right: 1.5rem;
            top: 1.5rem;
            font-size: 1.5rem;
            cursor: pointer;
        }

        .form-control {
            margin-bottom: 1.5rem;
        }

        .form-label {
            display: block;
            margin-bottom: 0.5rem;
            font-weight: 500;
            color: var(--dark);
            font-size: 0.875rem;
        }

        .form-label.required:after {
            content: '*';
            color: #E53E3E;
            margin-left: 0.25rem;
        }

        .form-input, .form-select {
            width: 100%;
            padding: 0.75rem;
            border: 1px solid #E2E8F0;
            border-radius: 0.375rem;
            font-size: 0.875rem;
        }

        .btn-primary {
            background-color: var(--primary);
            color: #333;
            padding: 0.5rem 1rem;
            border-radius: 0.375rem;
            font-weight: 500;
            cursor: pointer;
            border: none;
        }

        .btn-secondary {
            background-color: #718096;
            color: white;
            padding: 0.5rem 1rem;
            border-radius: 0.375rem;
            font-weight: 500;
            cursor: pointer;
            border: none;
        }

        .content-area {
            padding: 2rem;
            min-height: 100vh;
        }

        .grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 1rem;
        }

        .col-span-2 {
            grid-column: span 2;
        }

        .flex {
            display: flex;
        }

        .justify-between {
            justify-content: space-between;
        }

        .mt-4 {
            margin-top: 1rem;
        }

        .mb-6 {
            margin-bottom: 1.5rem;
        }

        @media (max-width: 768px) {
            .sidebar {
                width: 200px;
            }
            .main-container {
                margin-left: 200px;
            }
        }

        @media (max-width: 640px) {
            body {
                flex-direction: column;
            }
            .sidebar {
                width: 100%;
                position: static;
            }
            .main-container {
                margin-left: 0;
            }
        }
    </style>
</head>
<body>
    <!-- Sidebar -->
    <x-sidebar></x-sidebar>

    <!-- Main Content -->
    <div class="main-container">
        <div class="content-area">
            <h1>Residents List</h1>

            <!-- Search Bar -->
            <div class="card mb-6">
                <div class="search-container">
                    <svg xmlns="http://www.w3.org/2000/svg" class="search-icon" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <circle cx="11" cy="11" r="8"></circle>
                        <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                    </svg>
                    <input type="search" id="resident-search" class="search-input" placeholder="Search by name, ID, or purok..." oninput="debouncedSearchResidents()" />
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
                                <th>Type</th>
                                <th>Gender</th>
                                <th>Age</th>
                                <th>Purok</th>
                                <th>Marital Status</th>
                                <th>Voter</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody id="residents-table-body">
                            <tr>
                                <td colspan="9" class="text-center py-6 text-gray-500">Loading residents...</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Edit Resident Modal -->
            <div id="editResidentModal" class="modal">
                <div class="modal-content">
                    <span class="close" onclick="closeModal('editResidentModal')">×</span>
                    <h2 style="font-size: 1.5rem; font-weight: bold; margin-bottom: 1.5rem;">Edit Resident</h2>
                    <form id="editResidentForm">
                        @csrf
                        <div class="grid">
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
                                    <option value="purok1">Purok Sampaguita</option>
                                    <option value="purok2">Purok Mabini</option>
                                    <option value="purok3">Purok Ilaw</option>
                                    <option value="purok4">Purok Bukid</option>
                                </select>
                            </div>
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
                            <div class="form-control">
                                <label class="form-label required">Voter Status</label>
                                <select name="voters_status" class="form-select" required>
                                    <option value="registered">Registered</option>
                                    <option value="not_registered">Not Registered</option>
                                </select>
                            </div>
                            <div class="form-control">
                                <label class="form-label required">Has Disability</label>
                                <select name="has_disability" class="form-select" required>
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
                            <div class="form-control" id="residence_id_field" style="display: none;">
                                <label class="form-label required">Residence ID</label>
                                <input type="text" name="residence_id" class="form-input">
                            </div>
                            <div class="form-control" id="relationship_field" style="display: none;">
                                <label class="form-label required">Relationship</label>
                                <select name="relationship" class="form-select">
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
                        </div>

                        <div class="flex justify-between mt-4">
                            <button type="button" class="btn-secondary" onclick="closeModal('editResidentModal')">Cancel</button>
                            <button type="submit" class="btn-primary">Save Changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
    let currentResidentId = null;
    let currentResidentType = null;

    function closeModal(modalId) {
        document.getElementById(modalId).style.display = 'none';
        document.getElementById('editResidentForm').reset();
    }

    async function searchResidents() {
        const search = document.getElementById('resident-search').value;
        try {
            const response = await fetch(`/list?search=${encodeURIComponent(search)}`, {
                headers: {
                    'X-Requested-With': 'XMLHttpRequest'
                }
            });
            if (!response.ok) throw new Error(`Network response was not ok: ${response.status}`);
            const residents = await response.json();
            console.log('Fetched residents:', residents); // Debug
            populateTable(residents);
        } catch (error) {
            console.error('Search error:', error);
            alert('Failed to fetch residents');
        }
    }

    function populateTable(residents) {
        const tbody = document.getElementById('residents-table-body');
        tbody.innerHTML = '';
        if (!residents || residents.length === 0) {
            tbody.innerHTML = '<tr><td colspan="9" class="text-center py-6 text-gray-500">No residents found</td></tr>';
            return;
        }

        residents.forEach(resident => {
            const age = calculateAge(resident.birth_date);
            const row = document.createElement('tr');
            row.innerHTML = `
                <td>${resident.type === 'head' ? (resident.id || 'N/A') : (resident.residence_id || 'N/A')}</td>
                <td>${(resident.first_name || '')} ${(resident.last_name || '')}</td>
                <td>${resident.type ? (resident.type.charAt(0).toUpperCase() + resident.type.slice(1)) : 'N/A'}</td>
                <td>${resident.gender ? (resident.gender.charAt(0).toUpperCase() + resident.gender.slice(1)) : 'N/A'}</td>
                <td>${age}</td>
                <td>${resident.purok ? resident.purok.replace('purok', 'Purok ') : 'N/A'}</td>
                <td>${resident.marital_status ? (resident.marital_status.charAt(0).toUpperCase() + resident.marital_status.slice(1)) : 'N/A'}</td>
                <td>
                    <span class="badge ${resident.voters_status === 'registered' ? 'badge-green' : 'badge-red'}">
                        ${resident.voters_status === 'registered' ? 'Yes' : 'No'}
                    </span>
                </td>
                <td>
                    <span class="btn-action" onclick="editResident('${resident.id || ''}', '${resident.type || ''}')">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path>
                            <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path>
                        </svg>
                    </span>
                </td>
            `;
            tbody.appendChild(row);
        });
    }

    function calculateAge(birthDate) {
        if (!birthDate) return 'N/A';
        const today = new Date();
        const birth = new Date(birthDate);
        let age = today.getFullYear() - birth.getFullYear();
        const monthDiff = today.getMonth() - birth.getMonth();
        if (monthDiff < 0 || (monthDiff === 0 && today.getDate() < birth.getDate())) {
            age--;
        }
        return age;
    }

    async function editResident(id, type) {
        if (!id || !type) {
            alert('Invalid resident ID or type');
            return;
        }
        currentResidentId = id;
        currentResidentType = type;
        try {
            const response = await fetch(`/list/${id}/${type}/edit`, {
                headers: {
                    'X-Requested-With': 'XMLHttpRequest'
                }
            });
            if (!response.ok) throw new Error(`Failed to fetch resident data: ${response.status}`);
            const resident = await response.json();
            console.log('Edit resident data:', resident); // Debug
            const form = document.getElementById('editResidentForm');
            Object.keys(resident).forEach(key => {
                const input = form.querySelector(`[name="${key}"]`);
                if (input) {
                    input.value = resident[key] || '';
                }
            });

            // Show/hide residence_id and relationship fields based on type
            const residenceIdField = document.getElementById('residence_id_field');
            const relationshipField = document.getElementById('relationship_field');
            if (type === 'member') {
                residenceIdField.style.display = 'block';
                relationshipField.style.display = 'block';
            } else {
                residenceIdField.style.display = 'none';
                relationshipField.style.display = 'none';
            }

            document.getElementById('editResidentModal').style.display = 'block';
        } catch (error) {
            console.error('Edit error:', error);
            alert('Failed to load resident data');
        }
    }

    document.getElementById('editResidentForm').addEventListener('submit', async (e) => {
        e.preventDefault();
        const formData = new FormData(e.target);
        try {
            const response = await fetch(`/list/${currentResidentId}/${currentResidentType}`, {
                method: 'PUT',
                body: formData,
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                    'X-Requested-With': 'XMLHttpRequest'
                }
            });
            if (response.ok) {
                const result = await response.json();
                closeModal('editResidentModal');
                alert(result.success || 'Resident updated successfully');
                searchResidents(); // Refresh table
            } else {
                const errorData = await response.json();
                alert('Failed to update resident: ' + (errorData.error || 'Unknown error'));
            }
        } catch (error) {
            console.error('Update error:', error);
            alert('Failed to update resident');
        }
    });

    // Debounce function to prevent rapid search requests
    function debounce(func, wait) {
        let timeout;
        return function executedFunction(...args) {
            const later = () => {
                clearTimeout(timeout);
                func(...args);
            };
            clearTimeout(timeout);
            timeout = setTimeout(later, wait);
        };
    }

    const debouncedSearchResidents = debounce(searchResidents, 300);
    document.getElementById('resident-search').addEventListener('input', debouncedSearchResidents);

    // Fetch residents on page load
    document.addEventListener('DOMContentLoaded', () => {
        searchResidents();
    });
</script>
</body>
</html>

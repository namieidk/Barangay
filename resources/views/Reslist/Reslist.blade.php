<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>BRGY INCIO, DAVAO CITY SYSTEM</title>
    <style>
        :root {
            --primary: #2b6241;
            --primary-light: #3d8257;
            --primary-dark: #1d472e;
            --accent: #fac33b;
            --accent-light: #fbd16b;
            --light-bg: #f8f9fa;
            --text-dark: #333;
            --text-light: #f8f9fa;
            --border-color: #dee2e6;
            --shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        
        body {
            background-color: var(--light-bg);
            min-height: 100vh;
            display: flex;
        }
        
        .main-content {
            flex: 1;
            margin-left: 280px;
            padding: 2rem;
        }
        
        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 2rem;
            padding-bottom: 1rem;
            border-bottom: 1px solid var(--border-color);
        }
        
        .header h1 {
            font-size: 2rem;
            color: var(--primary-dark);
            font-weight: 700;
        }
        
        .search-container {
            position: relative;
            width: 100%;
            max-width: 400px;
        }
        
        .search-container input {
            width: 100%;
            padding: 0.75rem 1rem 0.75rem 3rem;
            border: 1px solid var(--border-color);
            border-radius: 50px;
            font-size: 0.9rem;
            transition: all 0.3s ease;
        }
        
        .search-container input:focus {
            outline: none;
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(59, 130, 87, 0.2);
        }
        
        .search-icon {
            position: absolute;
            left: 1rem;
            top: 50%;
            transform: translateY(-50%);
            color: #6c757d;
        }
        
        .content-card {
            background: white;
            border-radius: 12px;
            box-shadow: var(--shadow);
            overflow: hidden;
        }
        
        .card-header {
            background-color: var(--primary);
            color: white;
            padding: 1.5rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        
        .card-header h2 {
            font-size: 1.25rem;
            font-weight: 600;
        }
        
        .purok-filter {
            display: flex;
            align-items: center;
            gap: 1rem;
        }
        
        .purok-filter select {
            padding: 0.5rem 1rem;
            border: none;
            border-radius: 4px;
            background-color: white;
            font-size: 0.9rem;
            min-width: 180px;
        }
        
        .btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: 0.5rem 1.5rem;
            border-radius: 4px;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.3s ease;
            border: none;
        }
        
        .btn-primary {
            background-color: var(--accent);
            color: var(--text-dark);
        }
        
        .btn-primary:hover {
            background-color: var(--accent-light);
        }
        
        .btn-outline {
            background-color: transparent;
            border: 1px solid white;
            color: white;
        }
        
        .btn-outline:hover {
            background-color: rgba(255, 255, 255, 0.1);
        }
        
        .card-body {
            padding: 1.5rem;
            display: grid;
            grid-template-columns: 1fr 2fr;
            gap: 2rem;
        }
        
        .name-list {
            border-right: 1px solid var(--border-color);
            padding-right: 1rem;
        }
        
        .name-list-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1rem;
        }
        
        .name-list-container {
            height: 480px;
            overflow-y: auto;
            border: 1px solid var(--border-color);
            border-radius: 6px;
        }
        
        table {
            width: 100%;
            border-collapse: collapse;
        }
        
        th, td {
            padding: 0.75rem 1rem;
            text-align: left;
        }
        
        th {
            background-color: #f8f9fa;
            font-weight: 600;
            color: var(--text-dark);
        }
        
        tr {
            border-bottom: 1px solid var(--border-color);
        }
        
        tr:hover {
            background-color: rgba(59, 130, 87, 0.05);
        }
        
        .resident-info {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 1.5rem;
        }
        
        .form-group {
            display: flex;
            flex-direction: column;
            margin-bottom: 1.25rem;
        }
        
        .form-label {
            font-size: 0.875rem;
            color: var(--primary);
            margin-bottom: 0.5rem;
            font-weight: 500;
        }
        
        .form-control {
            padding: 0.75rem;
            border: 1px solid var(--border-color);
            border-radius: 4px;
            font-size: 0.9rem;
            transition: all 0.3s ease;
        }
        
        .form-control:focus {
            outline: none;
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(59, 130, 87, 0.2);
        }
        
        .action-buttons {
            display: flex;
            justify-content: flex-end;
            gap: 1rem;
            margin-top: 2rem;
        }
        
        .btn-secondary {
            background-color: #e9ecef;
            color: var(--text-dark);
        }
        
        .btn-secondary:hover {
            background-color: #dee2e6;
        }
        
        .btn-save {
            background-color: var(--primary);
            color: white;
        }
        
        .btn-save:hover {
            background-color: var(--primary-light);
        }

        .family-members {
            margin-top: 1rem;
            display: none;
        }

        .family-members.active {
            display: block;
        }

        /* Custom scrollbar */
        ::-webkit-scrollbar {
            width: 8px;
        }
        
        ::-webkit-scrollbar-track {
            background: #f1f1f1;
        }
        
        ::-webkit-scrollbar-thumb {
            background: #ccc;
            border-radius: 4px;
        }
        
        ::-webkit-scrollbar-thumb:hover {
            background: #aaa;
        }
    </style>
</head>
<body>
    <!-- Sidebar Component -->
    <x-sidebar></x-sidebar>

    <!-- Main Content Area -->
    <div class="main-content">
        <div class="header">
            <h1>Resident Management</h1>
            <div class="search-container">
                <div class="search-icon">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M11 19C15.4183 19 19 15.4183 19 11C19 6.58172 15.4183 3 11 3C6.58172 3 3 6.58172 3 11C3 15.4183 6.58172 19 11 19Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M21 21L16.65 16.65" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </div>
                <input type="text" placeholder="Search residents..." id="resident-search" />
            </div>
        </div>

        @if (session('success'))
            <div class="alert alert-success" style="padding: 1rem; background-color: #d4edda; color: #155724; border-radius: 4px; margin-bottom: 1rem;">
                {{ session('success') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="alert alert-danger" style="padding: 1rem; background-color: #f8d7da; color: #721c24; border-radius: 4px; margin-bottom: 1rem;">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="content-card">
            <div class="card-header">
                <div class="purok-filter">
                    <h2>Find by Purok:</h2>
                    <select id="purok-filter">
                        <option value="">Choose a Purok</option>
                        <option value="purok1">Purok 1</option>
                        <option value="purok2">Purok 2</option>
                        <option value="purok3">Purok 3</option>
                        <option value="purok4">Purok 4</option>
                    </select>
                </div>
                <button class="btn btn-primary" id="edit-details-btn" disabled>
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" style="margin-right: 6px;">
                        <path d="M11 4H4C3.46957 4 2.96086 4.21071 2.58579 4.58579C2.21071 4.96086 2 5.46957 2 6V20C2 20.5304 2.21071 21.0391 2.58579 21.4142C2.96086 21.7893 3.46957 22 4 22H18C18.5304 22 19.0391 21.7893 19.4142 21.4142C19.7893 21.0391 20 20.5304 20 20V13" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M18.5 2.50001C18.8978 2.10219 19.4374 1.87869 20 1.87869C20.5626 1.87869 21.1022 2.10219 21.5 2.50001C21.8978 2.89784 22.1213 3.4374 22.1213 4.00001C22.1213 4.56262 21.8978 5.10219 21.5 5.50001L12 15L8 16L9 12L18.5 2.50001Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                    Edit Details
                </button>
            </div>
            
            <div class="card-body">
                <!-- Left Column - Name List -->
                <div class="name-list">
                    <div class="name-list-header">
                        <h3 style="color: var(--primary-dark); font-weight: 600;">List of Residents</h3>
                        <button class="btn btn-secondary" style="padding: 0.35rem 1rem; font-size: 0.85rem;" onclick="showAllResidents()">
                            Show All
                        </button>
                    </div>
                    <div class="name-list-container">
                        <table id="resident-table">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (isset($residences) && $residences->count() > 0)
                                    @foreach ($residences as $resident)
                                        <tr onclick="showResidentDetails('{{ $resident->id }}')" class="resident-row" data-id="{{ $resident->id }}">
                                            <td>{{ $resident->id }}</td>
                                            <td>{{ $resident->first_name }} {{ $resident->last_name }}</td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="2">No residents available in the database.</td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                        <button class="btn btn-outline" id="family-members-btn" onclick="toggleFamilyMembers()" style="margin-top: 1rem; width: 100%;" disabled>Family Members</button>
                        <div class="family-members" id="family-members-list">
                            <table>
                                <thead>
                                    <tr>
                                        <th>Relationship</th>
                                        <th>Name</th>
                                    </tr>
                                </thead>
                                <tbody id="family-members-table">
                                    <!-- Populated dynamically -->
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <!-- Right Column - Resident Info -->
                <div class="resident-info">
                    <div>
                        <div class="form-group">
                            <label class="form-label">First Name</label>
                            <input type="text" class="form-control" id="first_name" name="first_name" readonly>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Last Name</label>
                            <input type="text" class="form-control" id="last_name" name="last_name" readonly>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Middle Name</label>
                            <input type="text" class="form-control" id="middle_name" name="middle_name" readonly>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Alias Name</label>
                            <input type="text" class="form-control" id="alias_name" name="alias_name" readonly>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Gender</label>
                            <input type="text" class="form-control" id="gender" name="gender" readonly>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Marital Status</label>
                            <input type="text" class="form-control" id="marital_status" name="marital_status" readonly>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Spouse Name</label>
                            <input type="text" class="form-control" id="spouse_name" name="spouse_name" readonly>
                        </div>
                    </div>
                    <div>
                        <div class="form-group">
                            <label class="form-label">Purok</label>
                            <input type="text" class="form-control" id="purok" name="purok" readonly>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Employment Status</label>
                            <input type="text" class="form-control" id="employment_status" name="employment_status" readonly>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Birth Date</label>
                            <input type="text" class="form-control" id="birth_date" name="birth_date" readonly>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Height (cm)</label>
                            <input type="text" class="form-control" id="height" name="height" readonly>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Weight (kg)</label>
                            <input type="text" class="form-control" id="weight" name="weight" readonly>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Religion</label>
                            <input type="text" class="form-control" id="religion" name="religion" readonly>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Age</label>
                            <input type="text" class="form-control" id="age" readonly>
                        </div>
                    </div>
                    <div class="action-buttons">
                        <button class="btn btn-secondary" onclick="clearResidentDetails()">Clear</button>
                        <button class="btn btn-save" id="save-btn" onclick="saveResidentDetails()" disabled>Save</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        let selectedResidentId = null;
        let isEditing = false;

        function showResidentDetails(residentId) {
            selectedResidentId = residentId;
            document.getElementById('edit-details-btn').disabled = false;
            document.getElementById('family-members-btn').disabled = false;
            document.querySelectorAll('.resident-row').forEach(row => {
                row.classList.remove('selected');
            });
            document.querySelector(`.resident-row[data-id="${residentId}"]`).classList.add('selected');

            fetch(`/residents/${residentId}`)
                .then(response => response.json())
                .then(data => {
                    document.getElementById('first_name').value = data.first_name || '';
                    document.getElementById('last_name').value = data.last_name || '';
                    document.getElementById('middle_name').value = data.middle_name || '';
                    document.getElementById('alias_name').value = data.alias_name || '';
                    document.getElementById('gender').value = data.gender || '';
                    document.getElementById('marital_status').value = data.marital_status || '';
                    document.getElementById('spouse_name').value = data.spouse_name || '';
                    document.getElementById('purok').value = data.purok || '';
                    document.getElementById('employment_status').value = data.employment_status || '';
                    document.getElementById('birth_date').value = data.birth_date || '';
                    document.getElementById('height').value = data.height || '';
                    document.getElementById('weight').value = data.weight || '';
                    document.getElementById('religion').value = data.religion || '';
                    const birthDate = new Date(data.birth_date);
                    const age = new Date().getFullYear() - birthDate.getFullYear();
                    document.getElementById('age').value = age || '';
                })
                .catch(error => console.error('Error fetching resident:', error));
        }

        function toggleFamilyMembers() {
            const familyList = document.getElementById('family-members-list');
            if (familyList.classList.contains('active')) {
                familyList.classList.remove('active');
            } else if (selectedResidentId) {
                fetch(`/residents/${selectedResidentId}/family-members`)
                    .then(response => response.json())
                    .then(data => {
                        const tbody = document.getElementById('family-members-table');
                        tbody.innerHTML = '';
                        data.forEach(member => {
                            const tr = document.createElement('tr');
                            tr.innerHTML = `
                                <td>${member.relationship}</td>
                                <td>${member.first_name} ${member.last_name}</td>
                            `;
                            tbody.appendChild(tr);
                        });
                        familyList.classList.add('active');
                    })
                    .catch(error => console.error('Error fetching family members:', error));
            }
        }

        function clearResidentDetails() {
            selectedResidentId = null;
            isEditing = false;
            document.getElementById('edit-details-btn').disabled = true;
            document.getElementById('family-members-btn').disabled = true;
            document.getElementById('save-btn').disabled = true;
            document.querySelectorAll('.resident-row').forEach(row => row.classList.remove('selected'));
            document.querySelectorAll('.resident-info .form-control').forEach(input => {
                input.value = '';
                input.setAttribute('readonly', 'true');
            });
            document.getElementById('family-members-list').classList.remove('active');
        }

        function showAllResidents() {
            clearResidentDetails();
            document.querySelectorAll('#resident-table tbody tr').forEach(row => {
                row.style.display = '';
            });
        }

        document.getElementById('edit-details-btn').addEventListener('click', () => {
            if (selectedResidentId && !isEditing) {
                isEditing = true;
                document.querySelectorAll('.resident-info .form-control').forEach(input => {
                    if (input.id !== 'age') input.removeAttribute('readonly');
                });
                document.getElementById('save-btn').disabled = false;
            }
        });

        function saveResidentDetails() {
            if (!isEditing || !selectedResidentId) return;

            const formData = new FormData();
            document.querySelectorAll('.resident-info .form-control').forEach(input => {
                if (input.name) formData.append(input.name, input.value);
            });

            fetch(`/residents/${selectedResidentId}`, {
                method: 'PUT',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                    'Accept': 'application/json',
                },
                body: formData
            })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        isEditing = false;
                        document.querySelectorAll('.resident-info .form-control').forEach(input => input.setAttribute('readonly', 'true'));
                        document.getElementById('save-btn').disabled = true;
                        alert('Resident details updated successfully!');
                    } else {
                        alert('Failed to update resident details.');
                    }
                })
                .catch(error => console.error('Error saving resident:', error));
        }

        document.getElementById('purok-filter').addEventListener('change', function() {
            const selectedPurok = this.value;
            const rows = document.querySelectorAll('#resident-table tbody tr');
            rows.forEach(row => {
                const residentId = row.dataset.id;
                fetch(`/residents/${residentId}`)
                    .then(response => response.json())
                    .then(data => {
                        if (!selectedPurok || data.purok === selectedPurok) {
                            row.style.display = '';
                        } else {
                            row.style.display = 'none';
                        }
                    });
            });
        });

        document.getElementById('resident-search').addEventListener('input', function() {
            const searchTerm = this.value.toLowerCase();
            const rows = document.querySelectorAll('#resident-table tbody tr');
            rows.forEach(row => {
                const name = row.cells[1].textContent.toLowerCase();
                row.style.display = name.includes(searchTerm) ? '' : 'none';
            });
        });
    </script>
</body>
</html>
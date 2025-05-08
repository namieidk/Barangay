<!-- resources/views/Archive/archive.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>BRGY INCIO, DAVAO CITY SYSTEM - Archive</title>
    <style>
        :root {
            --primary: #e6ffe6;
            --primary-light: rgba(71, 47, 180, 0.8);
            --primary-lighter: rgba(226, 223, 230, 0.1);
            --accent: #6A994E;
            --light: rgb(246, 246, 248);
            --dark: #333333;
        }
        
        body {
            font-family: 'Inter', 'Segoe UI', sans-serif;
            background-color: var(--light);
        }
        
        .bg-primary { background-color: var(--primary); }
        .bg-primary-light { background-color: var(--primary-light); }
        .bg-primary-lighter { background-color: var(--primary-lighter); }
        .text-primary { color: #000000; }
        .text-accent { color: var(--accent); }
        
        .btn-primary {
            background-color: var(--primary);
            color: #333;
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
            color: #000000;
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
        
        .search-container {
            position: relative;
            max-width: 24rem;
            display: flex;
            align-items: center;
        }
        
        .search-input {
            width: 100%;
            padding: 0.75rem 1rem 0.75rem 2.5rem;
            border: 1px solid #E2E8F0;
            border-radius: 0.5rem;
            font-size: 0.875rem;
            background-color: white;
            transition: all 0.2s ease;
        }
        
        .search-input:focus {
            outline: none;
            border-color: var(--accent);
            box-shadow: 0 0 0 3px rgba(106, 153, 78, 0.2);
        }
        
        .search-input::placeholder {
            color: #999;
        }
        
        .search-icon {
            position: absolute;
            left: 0.75rem;
            top: 50%;
            transform: translateY(-50%);
            color: #718096;
            width: 18px;
            height: 18px;
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
            max-width: 400px;
            border-radius: 0.5rem;
            position: relative;
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
            animation: modalFadeIn 0.3s ease;
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
        
        .notification-success { border-left: 4px solid rgb(84, 77, 131); }
        .notification-error { border-left: 4px solid #F56565; }
        
        .content-area { margin-left: 250px; padding: 2rem; min-height: 100vh; }
        
        @media (max-width: 768px) {
            .content-area { margin-left: 0; }
        }
    </style>
</head>
<body class="min-h-screen bg-[FAF9F6]">
    <!-- Sidebar Component -->
    <x-sidebar></x-sidebar>

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
            @if(session('error'))
                <div class="notification notification-error">
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="#F56565" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <circle cx="12" cy="12" r="10"></circle>
                        <line x1="12" y1="8" x2="12" y2="12"></line>
                        <line x1="12" y1="16" x2="12" y2="16"></line>
                    </svg>
                    <span>{{ session('error') }}</span>
                </div>
            @endif
        </div>

        <!-- Page Header -->
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-bold text-gray-800">Archived Residents</h1>
        </div>

        <!-- Search Bar -->
        <div class="card mb-6">
            <div class="search-container">
                <svg xmlns="http://www.w3.org/2000/svg" class="search-icon" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <circle cx="11" cy="11" r="8"></circle>
                    <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                </svg>
                <input type="search" id="archive-search" class="search-input" placeholder="Search archived residents..." />
            </div>
        </div>

        <!-- Archive Data Table -->
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
                            <th>Archived Date</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if(isset($archivedResidents) && count($archivedResidents) > 0)
                            @foreach($archivedResidents as $resident)
                                <tr>
                                    <td>{{ $resident->id }}</td>
                                    <td>
                                        <div class="font-medium">{{ $resident->first_name }} {{ $resident->middle_name }} {{ $resident->last_name }}</div>
                                        <div class="text-xs text-gray-500">{{ $resident->alias_name }}</div>
                                    </td>
                                    <td>{{ ucfirst($resident->gender) }}</td>
                                    <td>{{ sprintf('%02d', abs(now()->diffInYears($resident->birth_date))) }}</td>
                                    <td>{{ ucfirst($resident->purok) }}</td>
                                    <td>{{ ucfirst($resident->marital_status) }}</td>
                                    <td>{{ $resident->archived_at->format('Y-m-d') }}</td>
                                    <td>
                                        <button onclick="showRestoreModal('{{ $resident->id }}')" class="btn-action">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                <path d="M3 12a9 9 0 1 1 18 0 9 9 0 0 1-18 0z"/>
                                                <path d="M12 7v5l4 2"/>
                                            </svg>
                                            <span class="sr-only">Restore</span>
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="8" class="text-center py-6 text-gray-500">
                                    No archived residents found
                                </td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Restore Confirmation Modal -->
        <div id="restoreModal" class="modal">
            <div class="modal-content">
                <span class="close" onclick="hideRestoreModal()">×</span>
                <h2 class="text-2xl font-bold mb-6">Restore Resident</h2>
                <p class="mb-6">Are you sure you want to restore this resident? This will move them back to the active residents list.</p>
                <form id="restoreResidentForm" method="POST" action="">
                    @csrf
                    <input type="hidden" name="resident_id" id="restore_resident_id">
                    <div class="flex justify-between">
                        <button type="button" onclick="hideRestoreModal()" class="btn-secondary">Cancel</button>
                        <button type="submit" class="btn-primary bg-green-500 hover:bg-green-600">Restore</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        // Restore Modal Functions
        function showRestoreModal(residentId) {
            const modal = document.getElementById('restoreModal');
            const form = document.getElementById('restoreResidentForm');
            const residentIdInput = document.getElementById('restore_resident_id');
            
            form.action = `{{ route('residents.restore', ['resident' => '']) }}/${residentId}`;
            residentIdInput.value = residentId;
            modal.style.display = 'block';
        }

        function hideRestoreModal() {
            document.getElementById('restoreModal').style.display = 'none';
        }

        // Close modal when clicking outside
        window.onclick = function(event) {
            const restoreModal = document.getElementById('restoreModal');
            if (event.target === restoreModal) hideRestoreModal();
        }

        // Search functionality
        document.getElementById('archive-search').addEventListener('keyup', function() {
            const searchValue = this.value.toLowerCase();
            const tableRows = document.querySelectorAll('tbody tr');
            
            tableRows.forEach(row => {
                const nameCell = row.querySelector('td:nth-child(2)');
                if (nameCell) {
                    const name = nameCell.textContent.toLowerCase();
                    if (name.includes(searchValue)) {
                        row.style.display = '';
                    } else {
                        row.style.display = 'none';
                    }
                }
            });
        });
    </script>
</body>
</html>
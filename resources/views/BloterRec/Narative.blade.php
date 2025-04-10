<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>Narrative - BRGY INCIO, DAVAO CITY SYSTEM</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style>
        /* [Existing styles remain unchanged] */
        /* Base Styles */
        body {
            font-family: 'Inter', 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f4f6f9;
            margin: 0;
            padding: 0;
            line-height: 1.6;
        }

        .form-container {
            max-width: 1200px;
            margin: 0 auto;
            background-color: #ffffff;
            border-radius: 16px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.05);
            overflow: hidden;
        }

        nav {
            background-color: #1f2a44;
            border-bottom: 1px solid #e2e8f0;
        }
        [active="true"] {
            background-color: #2d3748;
            border-bottom: 3px solid #52b788;
            color: #ffffff;
        }

        .form-content {
            padding: 40px;
        }
        .step-title {
            font-size: 24px;
            font-weight: 600;
            color: #2d6a4f;
            margin-bottom: 24px;
            padding-bottom: 12px;
            border-bottom: 2px solid #e2e8f0;
        }
        .form-row {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
            margin-bottom: 24px;
        }
        .form-group {
            margin-bottom: 16px;
        }
        .form-label {
            display: block;
            font-size: 14px;
            font-weight: 500;
            color: #374151;
            margin-bottom: 8px;
        }
        .form-label span {
            color: #ef4444;
            margin-left: 4px;
        }
        .form-control {
            width: 100%;
            padding: 12px 16px;
            border: 1px solid #d1d5db;
            border-radius: 8px;
            background-color: #ffffff;
            font-size: 14px;
            color: #1f2937;
            transition: all 0.2s ease;
        }
        .form-control:focus {
            border-color: #2d6a4f;
            box-shadow: 0 0 0 3px rgba(45, 106, 79, 0.1);
            outline: none;
        }
        textarea.form-control {
            min-height: 120px;
            resize: vertical;
        }

        .navigation-buttons {
            display: flex;
            justify-content: flex-end;
            margin-top: 32px;
            padding-top: 24px;
            border-top: 1px solid #e2e8f0;
            gap: 16px;
        }
        .btn {
            padding: 12px 24px;
            border-radius: 8px;
            font-size: 14px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            border: none;
        }
        .btn-primary {
            background-color: #2d6a4f;
            color: #ffffff;
        }
        .btn-primary:hover {
            background-color: #1f4b38;
        }
        .btn-secondary {
            background-color: #f1f5f9;
            color: #4b5563;
            border: 1px solid #d1d5db;
        }
        .btn-secondary:hover {
            background-color: #e2e8f0;
        }

        .search-section {
            margin-bottom: 24px;
            padding: 16px;
            background-color: #f9fafb;
            border-radius: 8px;
            border: 1px solid #e2e8f0;
        }
        .search-section .form-row {
            grid-template-columns: 1fr auto;
            align-items: end;
        }

        .search-results {
            margin-top: 24px;
        }
        .search-results table {
            width: 100%;
            border-collapse: collapse;
            background-color: #ffffff;
            border-radius: 8px;
            overflow: hidden;
        }
        .search-results th, .search-results td {
            padding: 12px 16px;
            text-align: left;
            border-bottom: 1px solid #e2e8f0;
        }
        .search-results th {
            background-color: #f9fafb;
            font-weight: 600;
            color: #374151;
        }
        .search-results td {
            color: #1f2937;
        }

        ::-webkit-scrollbar {
            width: 8px;
        }
        ::-webkit-scrollbar-track {
            background: #e2e8f0;
            border-radius: 4px;
        }
        ::-webkit-scrollbar-thumb {
            background: #2d6a4f;
            border-radius: 4px;
        }
        ::-webkit-scrollbar-thumb:hover {
            background: #1f4b38;
        }

        @media (max-width: 1024px) {
            .ml-64 {
                margin-left: 0;
            }
            .max-w-6xl {
                max-width: 100%;
                margin-left: 1rem;
                margin-right: 1rem;
            }
        }
        @media (max-width: 768px) {
            .form-content {
                padding: 24px;
            }
            .form-row {
                grid-template-columns: 1fr;
            }
            .search-section .form-row {
                grid-template-columns: 1fr;
                gap: 16px;
            }
            .px-8 {
                padding-left: 1rem;
                padding-right: 1rem;
            }
        }
        @media (max-width: 480px) {
            nav [x-resbar] {
                flex: 1 1 100%;
            }
        }
    </style>
</head>
<body class="bg-gray-100 min-h-screen flex font-sans antialiased">
    <x-sidebar></x-sidebar>

    <div class="flex-1 ml-64">
        <main class="pt-10 pb-10 px-8 flex-1">
            <div class="w-full max-w-6xl mx-auto">
                <div class="form-container">
                    <nav class="flex bg-[#1f2a44] text-white border-b border-gray-700">
                        <x-resbar href="{{ route('BloterRec.ResPersonData') }}" active="{{ request()->routeIs('blotter.reporting.*') }}" id="repperdataBtn" class="px-6 py-4 text-sm font-medium hover:bg-[#2d3748] transition-all duration-200">
                            Reporting Person Data
                        </x-resbar>
                        <x-resbar href="{{ route('blotter.suspect.index') }}" active="{{ request()->routeIs('blotter.suspect.*') }}" id="SusDataBtn" class="px-6 py-4 text-sm font-medium hover:bg-[#2d3748] transition-all duration-200">
                            Suspect Data
                        </x-resbar>
                        <x-resbar href="{{ route('blotter.victim.index') }}" active="{{ request()->routeIs('blotter.victim.*') }}" id="VicDataBtn" class="px-6 py-4 text-sm font-medium hover:bg-[#2d3748] transition-all duration-200">
                            Victim Data
                        </x-resbar>
                        <x-resbar href="/ChildLaw" active="{{ request()->is('ChildLaw') }}" id="ChildLawBtn" class="px-6 py-4 text-sm font-medium hover:bg-[#2d3748] transition-all duration-200">
                            For Children in Conflict with the Law
                        </x-resbar>
                        <x-resbar href="{{ route('blotter.narrative.index') }}" active="{{ request()->routeIs('blotter.narrative.*') }}" id="NarrativeBtn" class="px-6 py-4 text-sm font-medium hover:bg-[#2d3748] transition-all duration-200">
                            Narrative
                        </x-resbar>
                        <x-resbar href="/IncidentReport" active="{{ request()->is('IncidentReport') }}" id="IncidentReportBtn" class="px-6 py-4 text-sm font-medium hover:bg-[#2d3748] transition-all duration-200">
                            Incident Report Receipt
                        </x-resbar>
                    </nav>

                    <div class="form-content">
                        <!-- Search Section -->
                        <div class="search-section">
                            <form method="POST" action="{{ route('blotter.narrative.search') }}">
                                @csrf
                                <div class="form-row">
                                    <div class="form-group">
                                        <label for="search" class="form-label">Search by ID:</label>
                                        <input 
                                            type="text" 
                                            id="search" 
                                            name="search" 
                                            class="form-control w-full"
                                            placeholder="Enter Reporting Person ID..."
                                            value="{{ old('search') }}"
                                        >
                                    </div>
                                    <button type="submit" class="btn btn-primary">Search</button>
                                </div>
                            </form>
                        </div>

                        <!-- Search Results -->
                        @if(isset($narratives) && $narratives->isNotEmpty())
                            <div class="search-results">
                                <h2 class="step-title">Search Results</h2>
                                <table>
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Blotter Entry Number</th>
                                            <th>Type of Incident</th>
                                            <th>Date & Time</th>
                                            <th>Place of Incident</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($narratives as $narrative)
                                            <tr>
                                                <td>{{ $narrative->id }}</td>
                                                <td>{{ $narrative->res_person_data_id }}</td>
                                                <td>{{ $narrative->reportingPerson->type_of_incident ?? 'N/A' }}</td>
                                                <td>{{ $narrative->date_time->format('Y-m-d H:i') }}</td>
                                                <td>{{ $narrative->place_of_incident }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @elseif(isset($narratives))
                            <div class="search-results">
                                <p>No matching narratives found.</p>
                            </div>
                        @endif

                        <!-- Success/Error Messages -->
                        @if (session('success'))
                            <div class="alert-success p-4 mb-6 bg-green-100 text-green-800 rounded-lg">
                                {{ session('success') }}
                            </div>
                        @endif
                        @if ($errors->any())
                            <div class="alert-error p-4 mb-6 bg-red-100 text-red-800 rounded-lg">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <!-- Form -->
                        <form id="narrativeForm" method="POST" action="{{ route('blotter.narrative.store') }}">
                            @csrf
                            <h2 class="step-title">Narrative</h2>
                            <div class="form-row">
                                <div class="form-group">
                                    <label for="res_person_data_id" class="form-label">Reporting Person ID<span>*</span></label>
                                    <input type="text" id="res_person_data_id" name="res_person_data_id" class="form-control" value="{{ $res_person_data_id ?? old('res_person_data_id') }}" required>
                                    @error('res_person_data_id')
                                        <div class="text-red-600 text-sm mt-1">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="type_of_incident" class="form-label">Type of Incident</label>
                                    <input type="text" id="type_of_incident" name="type_of_incident" class="form-control" value="{{ $type_of_incident ?? old('type_of_incident') }}" readonly>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group">
                                    <label for="date_time" class="form-label">Date & Time of Incident<span>*</span></label>
                                    <input type="datetime-local" id="date_time" name="date_time" class="form-control" value="{{ old('date_time') }}" required>
                                    @error('date_time')
                                        <div class="text-red-600 text-sm mt-1">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="place_of_incident" class="form-label">Place of Incident<span>*</span></label>
                                    <input type="text" id="place_of_incident" name="place_of_incident" class="form-control" value="{{ old('place_of_incident') }}" required>
                                    @error('place_of_incident')
                                        <div class="text-red-600 text-sm mt-1">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group w-full">
                                    <label for="incident_narrative" class="form-label">Narrative<span>*</span></label>
                                    <textarea id="incident_narrative" name="incident_narrative" class="form-control" placeholder="Detail the WHO, WHAT, WHEN, WHERE, WHY, and HOW of the incident..." required>{{ old('incident_narrative') }}</textarea>
                                    @error('incident_narrative')
                                        <div class="text-red-600 text-sm mt-1">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="navigation-buttons">
                                <button type="button" class="btn btn-secondary" onclick="window.close()">Close</button>
                                <button type="submit" class="btn btn-primary">Save Narrative</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </main>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const form = document.getElementById('narrativeForm');
            const resPersonDataIdInput = document.getElementById('res_person_data_id');
            const typeOfIncidentInput = document.getElementById('type_of_incident');

            // AJAX to fetch type_of_incident based on res_person_data_id
            resPersonDataIdInput.addEventListener('change', function() {
                const id = this.value;
                if (id) {
                    fetch(`/narrative/fetch-type/${id}`, {
                        method: 'GET',
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}',
                            'Accept': 'application/json'
                        }
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.type_of_incident) {
                            typeOfIncidentInput.value = data.type_of_incident;
                        } else {
                            typeOfIncidentInput.value = '';
                            alert('No matching Reporting Person found for this ID.');
                        }
                    })
                    .catch(error => {
                        console.error('Error:', error);
                        alert('Failed to fetch Type of Incident.');
                    });
                }
            });

            form.addEventListener('submit', function(e) {
                const requiredFields = form.querySelectorAll('input[required], textarea[required]');
                let isValid = true;

                requiredFields.forEach(field => {
                    if (!field.value.trim()) {
                        isValid = false;
                        field.style.borderColor = '#ef4444';
                    } else {
                        field.style.borderColor = '#d1d5db';
                    }
                });

                if (!isValid) {
                    e.preventDefault();
                    alert('Please fill in all required fields before submitting.');
                }
            });
        });
    </script>
</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>Victim Data - BRGY INCIO, DAVAO CITY SYSTEM</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style>
        /* Base Styles */
        body {
            font-family: 'Inter', 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f4f6f9;
            margin: 0;
            padding: 0;
            line-height: 1.6;
        }

        /* Layout */
        .form-container {
            max-width: 1200px;
            margin: 0 auto;
            background-color: #ffffff;
            border-radius: 16px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.05);
            overflow: hidden;
        }

        /* Tab Navigation */
        nav {
            background-color: #1f2a44;
            border-bottom: 1px solid #e2e8f0;
        }
        [active="true"] {
            background-color: #2d3748;
            border-bottom: 3px solid #52b788;
            color: #ffffff;
        }

        /* Stepper */
        .stepper-container {
            background-color: #f9fafb;
            padding: 24px 0;
            border-bottom: 1px solid #e2e8f0;
        }
        .stepper {
            display: flex;
            justify-content: space-between;
            max-width: 900px;
            margin: 0 auto;
            position: relative;
        }
        .stepper::before {
            content: '';
            position: absolute;
            top: 20px;
            left: 0;
            right: 0;
            height: 2px;
            background-color: #e2e8f0;
            z-index: 1;
        }
        .step {
            display: flex;
            flex-direction: column;
            align-items: center;
            position: relative;
            z-index: 2;
            cursor: pointer;
        }
        .step-circle {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background-color: #ffffff;
            border: 2px solid #e2e8f0;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 16px;
            font-weight: 600;
            margin-bottom: 10px;
            color: #6b7280;
            transition: all 0.3s ease;
        }
        .step.active .step-circle {
            background-color: #2d6a4f;
            border-color: #2d6a4f;
            color: #ffffff;
        }
        .step.completed .step-circle {
            background-color: #52b788;
            border-color: #52b788;
            color: #ffffff;
        }
        .step-label {
            font-size: 14px;
            color: #6b7280;
            font-weight: 500;
            text-align: center;
        }
        .step.active .step-label {
            color: #2d6a4f;
            font-weight: 600;
        }
        .step.completed .step-label {
            color: #52b788;
        }

        /* Form Content */
        .form-content {
            padding: 40px;
        }
        .step-content {
            display: none;
        }
        .step-content.active {
            display: block;
            animation: fadeIn 0.4s ease;
        }
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(10px); }
            to { opacity: 1; transform: translateY(0); }
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

        /* Buttons */
        .navigation-buttons {
            display: flex;
            justify-content: space-between;
            margin-top: 32px;
            padding-top: 24px;
            border-top: 1px solid #e2e8f0;
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

        /* Progress Bar */
        .progress-bar-container {
            height: 8px;
            background-color: #e2e8f0;
            border-radius: 4px;
            margin: 32px 0 16px;
            overflow: hidden;
        }
        .progress-bar {
            height: 100%;
            background-color: #52b788;
            width: 0%;
            transition: width 0.3s ease;
        }

        /* Search Section */
        .search-section {
            margin-bottom: 24px;
            padding: 16px;
            background-color: #f9fafb;
            border-radius: 8px;
            border: 1px solid #e2e8f0;
        }
        .search-section .form-row {
            grid-template-columns: 1fr 1fr auto;
            align-items: end;
        }

        /* Scrollbar */
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

        /* Responsive Design */
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
            .stepper {
                overflow-x: auto;
                padding: 0 16px;
            }
            .step {
                min-width: 100px;
            }
            .form-row {
                grid-template-columns: 1fr;
            }
            .search-section .form-row {
                grid-template-columns: 1fr;
                gap: 16px;
            }
            .px-10 {
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
    <!-- Sidebar -->
    <x-sidebar></x-sidebar>

    <!-- Main Content Area -->
    <div class="flex-1 ml-64">
        <!-- Main Content -->
        <main class="pt-10 pb-10 px-10 flex-1">
            <div class="w-full max-w-6xl mx-auto">
                <div class="form-container">
                    <!-- Tab Navigation -->
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
                        <x-resbar href="/Narative" active="{{ request()->is('NarativeData') }}" id="NarativeBtn" class="px-6 py-4 text-sm font-medium hover:bg-[#2d3748] transition-all duration-200">
                            Narrative
                        </x-resbar>
                        <x-resbar href="/IncidentReport" active="{{ request()->is('IncidentReport') }}" id="IncidentReporteBtn" class="px-6 py-4 text-sm font-medium hover:bg-[#2d3748] transition-all duration-200">
                            Incident Report Receipt
                        </x-resbar>
                    </nav>

                    <!-- Content Area -->
                    <div class="form-content">
                        <!-- Search Section -->
                        <div class="search-section">
                            <form method="POST" action="{{ route('blotter.victim.search') }}">
                                @csrf
                                <div class="form-row">
                                    <div class="form-group">
                                        <label for="search" class="form-label">Blotter Entry Number:</label>
                                        <input 
                                            type="text" 
                                            id="search" 
                                            name="search" 
                                            class="form-control w-full"
                                            placeholder="Enter number..."
                                            value="{{ old('search') }}"
                                        >
                                    </div>
                                    <div class="form-group">
                                        <label for="filter" class="form-label">Type of Incident:</label>
                                        <input 
                                            type="text" 
                                            id="filter" 
                                            name="filter" 
                                            class="form-control w-full"
                                            placeholder="Enter incident type..."
                                            value="{{ $typeOfIncident ?? '' }}"
                                            readonly
                                        >
                                    </div>
                                    <button type="submit" class="btn btn-primary">Search</button>
                                </div>
                            </form>
                        </div>

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

                        <!-- Stepper -->
                        <div class="stepper-container">
                            <div class="stepper">
                                <div class="step active" data-step="1">
                                    <div class="step-circle">1</div>
                                    <div class="step-label">Personal Info</div>
                                </div>
                                <div class="step" data-step="2">
                                    <div class="step-circle">2</div>
                                    <div class="step-label">Contact Info</div>
                                </div>
                                <div class="step" data-step="3">
                                    <div class="step-circle">3</div>
                                    <div class="step-label">Current Address</div>
                                </div>
                                <div class="step" data-step="4">
                                    <div class="step-circle">4</div>
                                    <div class="step-label">Other Address</div>
                                </div>
                                <div class="step" data-step="5">
                                    <div class="step-circle">5</div>
                                    <div class="step-label">Additional Info</div>
                                </div>
                            </div>
                        </div>

                        <!-- Form -->
                        <form id="victimForm" method="POST" action="{{ route('blotter.victim.store') }}">
                            @csrf
                            <input type="hidden" name="res_person_data_id" value="{{ $blotterEntryNumber ?? '' }}">
                            <input type="hidden" name="type_of_incident" value="{{ $typeOfIncident ?? '' }}">

                            <!-- Step 1: Personal Information -->
                            <div class="step-content active" data-step="1">
                                <h2 class="step-title">Personal Information</h2>
                                <div class="form-row">
                                    <div class="form-group">
                                        <label for="surname" class="form-label">Surname<span>*</span></label>
                                        <input type="text" id="surname" name="surname" class="form-control" value="{{ old('surname') }}" required>
                                        @error('surname')
                                            <div class="text-red-600 text-sm mt-1">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="last_name" class="form-label">Last Name<span>*</span></label>
                                        <input type="text" id="last_name" name="last_name" class="form-control" value="{{ old('last_name') }}" required>
                                        @error('last_name')
                                            <div class="text-red-600 text-sm mt-1">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="middle_name" class="form-label">Middle Name<span>*</span></label>
                                        <input type="text" id="middle_name" name="middle_name" class="form-control" value="{{ old('middle_name') }}" required>
                                        @error('middle_name')
                                            <div class="text-red-600 text-sm mt-1">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group">
                                        <label for="nickname" class="form-label">Nickname</label>
                                        <input type="text" id="nickname" name="nickname" class="form-control" value="{{ old('nickname') }}">
                                        @error('nickname')
                                            <div class="text-red-600 text-sm mt-1">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="gender" class="form-label">Gender<span>*</span></label>
                                        <select id="gender" name="gender" class="form-control" required>
                                            <option value="" {{ old('gender') == '' ? 'selected' : '' }}>Select gender</option>
                                            <option value="male" {{ old('gender') == 'male' ? 'selected' : '' }}>Male</option>
                                            <option value="female" {{ old('gender') == 'female' ? 'selected' : '' }}>Female</option>
                                            <option value="other" {{ old('gender') == 'other' ? 'selected' : '' }}>Other</option>
                                        </select>
                                        @error('gender')
                                            <div class="text-red-600 text-sm mt-1">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="navigation-buttons">
                                    <button type="button" class="btn btn-secondary prev-btn" style="display: none;">Previous</button>
                                    <button type="button" class="btn btn-primary next-btn">Next</button>
                                </div>
                            </div>

                            <!-- Step 2: Contact Information -->
                            <div class="step-content" data-step="2">
                                <h2 class="step-title">Contact Information</h2>
                                <div class="form-row">
                                    <div class="form-group">
                                        <label for="citizenship" class="form-label">Citizenship<span>*</span></label>
                                        <input type="text" id="citizenship" name="citizenship" class="form-control" value="{{ old('citizenship') }}" required>
                                        @error('citizenship')
                                            <div class="text-red-600 text-sm mt-1">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="birthdate" class="form-label">Birthdate<span>*</span></label>
                                        <input type="date" id="birthdate" name="birthdate" class="form-control" value="{{ old('birthdate') }}" required>
                                        @error('birthdate')
                                            <div class="text-red-600 text-sm mt-1">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="age" class="form-label">Age<span>*</span></label>
                                        <input type="number" id="age" name="age" class="form-control" value="{{ old('age') }}" required>
                                        @error('age')
                                            <div class="text-red-600 text-sm mt-1">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group">
                                        <label for="place_of_birth" class="form-label">Place of Birth<span>*</span></label>
                                        <input type="text" id="place_of_birth" name="place_of_birth" class="form-control" value="{{ old('place_of_birth') }}" required>
                                        @error('place_of_birth')
                                            <div class="text-red-600 text-sm mt-1">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="telephone" class="form-label">Telephone<span>*</span></label>
                                        <input type="tel" id="telephone" name="telephone" class="form-control" value="{{ old('telephone') }}" required>
                                        @error('telephone')
                                            <div class="text-red-600 text-sm mt-1">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="navigation-buttons">
                                    <button type="button" class="btn btn-secondary prev-btn">Previous</button>
                                    <button type="button" class="btn btn-primary next-btn">Next</button>
                                </div>
                            </div>

                            <!-- Step 3: Current Address -->
                            <div class="step-content" data-step="3">
                                <h2 class="step-title">Current Address</h2>
                                <div class="form-row">
                                    <div class="form-group">
                                        <label for="house_no" class="form-label">Address (House No.)<span>*</span></label>
                                        <input type="text" id="house_no" name="house_no" class="form-control" value="{{ old('house_no') }}" required>
                                        @error('house_no')
                                            <div class="text-red-600 text-sm mt-1">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="village" class="form-label">Village/Sitio<span>*</span></label>
                                        <input type="text" id="village" name="village" class="form-control" value="{{ old('village') }}" required>
                                        @error('village')
                                            <div class="text-red-600 text-sm mt-1">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="barangay" class="form-label">Barangay<span>*</span></label>
                                        <input type="text" id="barangay" name="barangay" class="form-control" value="{{ old('barangay', $barangay ?? 'Barangay Incio') }}" required>
                                        @error('barangay')
                                            <div class="text-red-600 text-sm mt-1">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group">
                                        <label for="town_city" class="form-label">Town/City<span>*</span></label>
                                        <input type="text" id="town_city" name="town_city" class="form-control" value="{{ old('town_city', $town_city ?? 'Incio City') }}" required>
                                        @error('town_city')
                                            <div class="text-red-600 text-sm mt-1">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="province" class="form-label">Province<span>*</span></label>
                                        <input type="text" id="province" name="province" class="form-control" value="{{ old('province', $province ?? 'Incio Province') }}" required>
                                        @error('province')
                                            <div class="text-red-600 text-sm mt-1">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="postal_code" class="form-label">Postal Code</label>
                                        <input type="text" id="postal_code" name="postal_code" class="form-control" value="{{ old('postal_code', $postal_code ?? '9800') }}">
                                        @error('postal_code')
                                            <div class="text-red-600 text-sm mt-1">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="navigation-buttons">
                                    <button type="button" class="btn btn-secondary prev-btn">Previous</button>
                                    <button type="button" class="btn btn-primary next-btn">Next</button>
                                </div>
                            </div>

                            <!-- Step 4: Other Address -->
                            <div class="step-content" data-step="4">
                                <h2 class="step-title">Other Address</h2>
                                <div class="form-row">
                                    <div class="form-group">
                                        <label for="other_house_no" class="form-label">Other Address (House No.)</label>
                                        <input type="text" id="other_house_no" name="other_house_no" class="form-control" value="{{ old('other_house_no') }}">
                                        @error('other_house_no')
                                            <div class="text-red-600 text-sm mt-1">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="other_village" class="form-label">Village/Sitio</label>
                                        <input type="text" id="other_village" name="other_village" class="form-control" value="{{ old('other_village') }}">
                                        @error('other_village')
                                            <div class="text-red-600 text-sm mt-1">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="other_barangay" class="form-label">Barangay</label>
                                        <input type="text" id="other_barangay" name="other_barangay" class="form-control" value="{{ old('other_barangay') }}">
                                        @error('other_barangay')
                                            <div class="text-red-600 text-sm mt-1">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group">
                                        <label for="other_town_city" class="form-label">Town/City</label>
                                        <input type="text" id="other_town_city" name="other_town_city" class="form-control" value="{{ old('other_town_city') }}">
                                        @error('other_town_city')
                                            <div class="text-red-600 text-sm mt-1">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="other_province" class="form-label">Province</label>
                                        <input type="text" id="other_province" name="other_province" class="form-control" value="{{ old('other_province') }}">
                                        @error('other_province')
                                            <div class="text-red-600 text-sm mt-1">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="other_postal_code" class="form-label">Postal Code</label>
                                        <input type="text" id="other_postal_code" name="other_postal_code" class="form-control" value="{{ old('other_postal_code') }}">
                                        @error('other_postal_code')
                                            <div class="text-red-600 text-sm mt-1">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="navigation-buttons">
                                    <button type="button" class="btn btn-secondary prev-btn">Previous</button>
                                    <button type="button" class="btn btn-primary next-btn">Next</button>
                                </div>
                            </div>

                            <!-- Step 5: Additional Information -->
                            <div class="step-content" data-step="5">
                                <h2 class="step-title">Additional Information</h2>
                                <div class="form-row">
                                    <div class="form-group">
                                        <label for="date_time_reported" class="form-label">Date & Time Reported<span>*</span></label>
                                        <input type="datetime-local" id="date_time_reported" name="date_time_reported" class="form-control" value="{{ old('date_time_reported') }}" required>
                                        @error('date_time_reported')
                                            <div class="text-red-600 text-sm mt-1">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="date_time_incident" class="form-label">Date & Time of Incident<span>*</span></label>
                                        <input type="datetime-local" id="date_time_incident" name="date_time_incident" class="form-control" value="{{ old('date_time_incident') }}" required>
                                        @error('date_time_incident')
                                            <div class="text-red-600 text-sm mt-1">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group">
                                        <label for="email_address" class="form-label">Email Address<span>*</span></label>
                                        <input type="email" id="email_address" name="email_address" class="form-control" value="{{ old('email_address') }}" required>
                                        @error('email_address')
                                            <div class="text-red-600 text-sm mt-1">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="occupation" class="form-label">Occupation<span>*</span></label>
                                        <input type="text" id="occupation" name="occupation" class="form-control" value="{{ old('occupation') }}" required>
                                        @error('occupation')
                                            <div class="text-red-600 text-sm mt-1">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group">
                                        <label for="civil_status" class="form-label">Civil Status<span>*</span></label>
                                        <select id="civil_status" name="civil_status" class="form-control" required>
                                            <option value="" {{ old('civil_status') == '' ? 'selected' : '' }}>Select status</option>
                                            <option value="single" {{ old('civil_status') == 'single' ? 'selected' : '' }}>Single</option>
                                            <option value="married" {{ old('civil_status') == 'married' ? 'selected' : '' }}>Married</option>
                                            <option value="divorced" {{ old('civil_status') == 'divorced' ? 'selected' : '' }}>Divorced</option>
                                            <option value="widowed" {{ old('civil_status') == 'widowed' ? 'selected' : '' }}>Widowed</option>
                                        </select>
                                        @error('civil_status')
                                            <div class="text-red-600 text-sm mt-1">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="highest_education" class="form-label">Highest Educational Attainment<span>*</span></label>
                                        <select id="highest_education" name="highest_education" class="form-control" required>
                                            <option value="" {{ old('highest_education') == '' ? 'selected' : '' }}>Select education level</option>
                                            <option value="elementary" {{ old('highest_education') == 'elementary' ? 'selected' : '' }}>Elementary</option>
                                            <option value="high-school" {{ old('highest_education') == 'high-school' ? 'selected' : '' }}>High School</option>
                                            <option value="vocational" {{ old('highest_education') == 'vocational' ? 'selected' : '' }}>Vocational</option>
                                            <option value="college" {{ old('highest_education') == 'college' ? 'selected' : '' }}>College</option>
                                            <option value="graduate" {{ old('highest_education') == 'graduate' ? 'selected' : '' }}>Graduate</option>
                                        </select>
                                        @error('highest_education')
                                            <div class="text-red-600 text-sm mt-1">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="progress-bar-container">
                                    <div class="progress-bar" id="progress-bar"></div>
                                </div>
                                <div class="navigation-buttons">
                                    <button type="button" class="btn btn-secondary prev-btn">Previous</button>
                                    <button type="submit" class="btn btn-primary submit-btn">Save</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </main>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const form = document.getElementById('victimForm');
            const nextBtn = document.querySelector('.next-btn');
            const prevBtn = document.querySelector('.prev-btn');
            const submitBtn = document.querySelector('.submit-btn');
            const progressBar = document.getElementById('progress-bar');
            const steps = document.querySelectorAll('.step');
            const stepContents = document.querySelectorAll('.step-content');

            let currentStep = 1;
            const totalSteps = steps.length;

            function updateProgressBar() {
                const percent = ((currentStep - 1) / (totalSteps - 1)) * 100;
                progressBar.style.width = `${percent}%`;
            }

            function showStep(stepNumber) {
                stepContents.forEach(content => content.classList.remove('active'));
                document.querySelector(`.step-content[data-step="${stepNumber}"]`).classList.add('active');

                steps.forEach(step => {
                    const stepNum = parseInt(step.getAttribute('data-step'));
                    step.classList.remove('active', 'completed');
                    if (stepNum === stepNumber) {
                        step.classList.add('active');
                    } else if (stepNum < stepNumber) {
                        step.classList.add('completed');
                    }
                });

                prevBtn.style.display = stepNumber === 1 ? 'none' : 'block';
                nextBtn.style.display = stepNumber === totalSteps ? 'none' : 'block';
                submitBtn.style.display = stepNumber === totalSteps ? 'block' : 'none';

                updateProgressBar();
            }

            function validateStep(stepNumber) {
                const currentStepElement = document.querySelector(`.step-content[data-step="${stepNumber}"]`);
                const requiredFields = currentStepElement.querySelectorAll('input[required], select[required]');
                let isValid = true;

                requiredFields.forEach(field => {
                    if (!field.value.trim()) {
                        isValid = false;
                        field.style.borderColor = '#ef4444';
                    } else {
                        field.style.borderColor = '#d1d5db';
                    }
                });

                return isValid;
            }

            nextBtn.addEventListener('click', function() {
                if (validateStep(currentStep)) {
                    currentStep++;
                    showStep(currentStep);
                } else {
                    alert('Please fill in all required fields before proceeding.');
                }
            });

            prevBtn.addEventListener('click', function() {
                currentStep--;
                showStep(currentStep);
            });

            steps.forEach(step => {
                step.addEventListener('click', function() {
                    const stepNum = parseInt(this.getAttribute('data-step'));
                    if (stepNum < currentStep || stepNum === currentStep + 1) {
                        if (stepNum < currentStep || validateStep(currentStep)) {
                            currentStep = stepNum;
                            showStep(currentStep);
                        } else {
                            alert('Please fill in all required fields before proceeding.');
                        }
                    }
                });
            });

            form.addEventListener('submit', function(e) {
                if (!validateStep(currentStep)) {
                    e.preventDefault();
                    alert('Please fill in all required fields before submitting.');
                }
            });

            updateProgressBar();

            // Age calculation based on birthdate
            const birthdateInput = document.getElementById('birthdate');
            const ageInput = document.getElementById('age');
            birthdateInput.addEventListener('change', function() {
                if (this.value) {
                    const birthDate = new Date(this.value);
                    const today = new Date();
                    let age = today.getFullYear() - birthDate.getFullYear();
                    const monthDiff = today.getMonth() - birthDate.getMonth();
                    if (monthDiff < 0 || (monthDiff === 0 && today.getDate() < birthDate.getDate())) {
                        age--;
                    }
                    ageInput.value = age;
                }
            });
        });
    </script>
</body>
</html>
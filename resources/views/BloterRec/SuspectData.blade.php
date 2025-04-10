<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>Suspect Data - BRGY INCIO, DAVAO CITY SYSTEM</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style>
        /* Dashboard Styles */
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f5f7fa;
            color: #333;
            line-height: 1.6;
            margin: 0;
            padding: 0;
        }
        [active="true"] {
            background-color: #4a2f25;
            border-bottom: 3px solid #fac33b;
        }
        ::-webkit-scrollbar {
            width: 8px;
        }
        ::-webkit-scrollbar-track {
            background: #f1f1f1;
            border-radius: 4px;
        }
        ::-webkit-scrollbar-thumb {
            background: #5A7A46;
            border-radius: 4px;
        }
        ::-webkit-scrollbar-thumb:hover {
            background: #3d8257;
        }
        @media (max-width: 768px) {
            .ml-64 {
                margin-left: 0;
            }
            .flex-1 {
                padding-top: 2rem; /* Adjusted since header is removed */
            }
            nav {
                flex-wrap: wrap;
            }
            [x-resbar] {
                flex: 1 1 50%;
                text-align: center;
            }
        }

        /* Form Styles */
        .form-container {
            max-width: 1200px;
            margin: 0 auto;
            background-color: #fff;
            border-radius: 12px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }
        .form-header {
            background-color: #3b82f6;
            color: white;
            padding: 20px 30px;
        }
        .stepper {
            display: flex;
            justify-content: space-between;
            margin: 0 auto;
            max-width: 800px;
            padding: 20px 10px;
            position: relative;
        }
        .stepper::before {
            content: '';
            position: absolute;
            top: 50%;
            left: 0;
            right: 0;
            height: 2px;
            background-color: #e5e7eb;
            z-index: 1;
        }
        .step {
            display: flex;
            flex-direction: column;
            align-items: center;
            position: relative;
            z-index: 2;
        }
        .step-number {
            width: 35px;
            height: 35px;
            border-radius: 50%;
            background-color: #e5e7eb;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
            margin-bottom: 8px;
            color: #6b7280;
            border: 2px solid #e5e7eb;
            transition: all 0.3s ease;
        }
        .step.active .step-number {
            background-color: #3b82f6;
            color: white;
            border-color: #3b82f6;
        }
        .step.completed .step-number {
            background-color: #10b981;
            color: white;
            border-color: #10b981;
        }
        .step-label {
            font-size: 14px;
            font-weight: 500;
            color: #6b7280;
        }
        .step.active .step-label {
            color: #3b82f6;
            font-weight: 600;
        }
        .step.completed .step-label {
            color: #10b981;
        }
        .form-content {
            padding: 30px;
        }
        .step-content {
            display: none;
        }
        .step-content.active {
            display: block;
        }
        .form-section {
            margin-bottom: 25px;
        }
        .section-title {
            font-size: 20px;
            font-weight: 600;
            color: #333;
            margin-bottom: 20px;
        }
        .form-row {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 16px;
            margin-bottom: 15px;
        }
        .form-group {
            margin-bottom: 20px;
        }
        .form-label {
            display: block;
            font-size: 14px;
            font-weight: 500;
            color: #4b5563;
            margin-bottom: 6px;
        }
        .required {
            color: #ef4444;
            margin-left: 4px;
        }
        .form-control {
            width: 100%;
            padding: 10px 12px;
            border: 1px solid #d1d5db;
            border-radius: 6px;
            background-color: #fff;
            transition: all 0.3s;
            font-size: 14px;
            box-sizing: border-box;
        }
        .form-control:focus {
            outline: none;
            border-color: #3b82f6;
            box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.2);
        }
        .navigation-buttons {
            display: flex;
            justify-content: space-between;
            margin-top: 30px;
            padding-top: 20px;
            border-top: 1px solid #e5e7eb;
        }
        .btn {
            padding: 10px 20px;
            border-radius: 6px;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.3s;
        }
        .btn-primary {
            background-color: #3b82f6;
            color: white;
            border: none;
        }
        .btn-primary:hover {
            background-color: #2563eb;
        }
        .btn-secondary {
            background-color: #f3f4f6;
            color: #4b5563;
            border: 1px solid #d1d5db;
        }
        .btn-secondary:hover {
            background-color: #e5e7eb;
        }
        .progress-bar-container {
            height: 8px;
            background-color: #e5e7eb;
            border-radius: 4px;
            margin-top: 30px;
            overflow: hidden;
        }
        .progress-bar {
            height: 100%;
            background-color: #3b82f6;
            width: 0%;
            transition: width 0.3s ease;
        }
        .error {
            color: #ef4444;
            font-size: 12px;
            margin-top: 4px;
        }
        .alert-success, .alert-error {
            padding: 15px;
            margin-bottom: 20px;
            border-radius: 6px;
        }
        .alert-success {
            background-color: #d1fae5;
            color: #065f46;
        }
        .alert-error {
            background-color: #fee2e2;
            color: #991b1b;
        }
    </style>
</head>
<body class="min-h-screen bg-gray-100 flex font-sans">
    <!-- Sidebar -->
    <x-sidebar></x-sidebar>

    <!-- Main Content Area -->
    <div class="flex-1 ml-64 pt-10">
        <!-- Main Content -->
        <div class="p-10 w-full max-w-6xl mx-auto">
            <div class="bg-white rounded-xl shadow-xl overflow-hidden">
                <!-- Tab Navigation -->
                <nav class="flex border-b border-gray-200 bg-[#301f17] text-white">
                    <x-resbar href="{{ route('BloterRec.ResPersonData') }}" active="{{ request()->routeIs('blotter.reporting.*') }}" id="repperdataBtn" class="px-6 py-4 text-sm font-medium hover:bg-[#4a2f25] transition-colors">
                        Reporting Person Data
                    </x-resbar>
                    <x-resbar href="{{ route('blotter.suspect.index') }}" active="{{ request()->routeIs('blotter.suspect.*') }}" id="SusDataBtn" class="px-6 py-4 text-sm font-medium hover:bg-[#4a2f25] transition-colors">
                        Suspect Data
                    </x-resbar>
                    <x-resbar href="/VictimData" active="{{ request()->is('VicData') }}" id="VicDataBtn" class="px-6 py-4 text-sm font-medium hover:bg-[#4a2f25] transition-colors">
                        Victim Data
                    </x-resbar>
                    <x-resbar href="/ChildLaw" active="{{ request()->is('ChildLaw') }}" id="ChildLawBtn" class="px-6 py-4 text-sm font-medium hover:bg-[#4a2f25] transition-colors">
                        For Children in Conflict with the Law
                    </x-resbar>
                    <x-resbar href="/Narative" active="{{ request()->is('NarativeData') }}" id="NarativeBtn" class="px-6 py-4 text-sm font-medium hover:bg-[#4a2f25] transition-colors">
                        Narrative
                    </x-resbar>
                    <x-resbar href="/IncidentReport" active="{{ request()->is('IncidentReport') }}" id="IncidentReporteBtn" class="px-6 py-4 text-sm font-medium hover:bg-[#4a2f25] transition-colors">
                        Incident Report Receipt
                    </x-resbar>
                </nav>

                <!-- Content Area -->
                <div class="p-6 bg-gray-50">
                    <!-- Moved Search Form -->
                    <div class="mb-6">
                        <form method="POST" action="{{ route('blotter.suspect.search') }}">
                            @csrf
                            <div class="flex items-center space-x-4">
                                <div class="form-group">
                                    <label for="search" class="form-label">Blotter Entry Number:</label>
                                    <input 
                                        type="text" 
                                        id="search" 
                                        name="search" 
                                        class="form-control w-40"
                                        placeholder="Enter number..."
                                    >
                                </div>
                                <div class="form-group">
                                    <label for="filter" class="form-label">Type of Incident:</label>
                                    <input 
                                        type="text" 
                                        id="filter" 
                                        name="filter" 
                                        class="form-control w-60"
                                        placeholder="Enter incident type..."
                                        value="{{ $typeOfIncident ?? '' }}"
                                        readonly
                                    >
                                </div>
                                <button type="submit" class="btn btn-primary">Search</button>
                            </div>
                        </form>
                    </div>

                    <!-- Display Success or Error Messages -->
                    @if (session('success'))
                        <div class="alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                    @if ($errors->any())
                        <div class="alert-error">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <div class="stepper">
                        <div class="step active" data-step="1">
                            <div class="step-number">1</div>
                            <span class="step-label">Personal Info</span>
                        </div>
                        <div class="step" data-step="2">
                            <div class="step-number">2</div>
                            <span class="step-label">Primary Address</span>
                        </div>
                        <div class="step" data-step="3">
                            <div class="step-number">3</div>
                            <span class="step-label">Secondary Address</span>
                        </div>
                        <div class="step" data-step="4">
                            <div class="step-number">4</div>
                            <span class="step-label">Incident Details</span>
                        </div>
                        <div class="step" data-step="5">
                            <div class="step-number">5</div>
                            <span class="step-label">Physical Description</span>
                        </div>
                    </div>

                    <div class="form-content">
                        <form id="suspect-form" method="POST" action="{{ route('blotter.suspect.store') }}">
                            @csrf
                            <!-- Hidden Fields -->
                            <input type="hidden" name="res_person_data_id" value="{{ $blotterEntryNumber ?? '' }}">
                            <input type="hidden" name="type_of_incident" value="{{ $typeOfIncident ?? '' }}">

                            <!-- Step 1: Personal Information -->
                            <div class="step-content active" data-step="1">
                                <div class="form-section">
                                    <h2 class="section-title">Basic Information</h2>
                                    <div class="form-row">
                                        <div class="form-group">
                                            <label for="surname" class="form-label">First Name<span class="required">*</span></label>
                                            <input type="text" id="surname" name="surname" class="form-control" value="{{ old('surname') }}">
                                            @error('surname')
                                                <div class="error">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="last_name" class="form-label">Last Name<span class="required">*</span></label>
                                            <input type="text" id="last_name" name="last_name" class="form-control" value="{{ old('last_name') }}">
                                            @error('last_name')
                                                <div class="error">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="middle_name" class="form-label">Middle Name<span class="required">*</span></label>
                                            <input type="text" id="middle_name" name="middle_name" class="form-control" value="{{ old('middle_name') }}">
                                            @error('middle_name')
                                                <div class="error">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="nickname" class="form-label">Nickname</label>
                                            <input type="text" id="nickname" name="nickname" class="form-control" value="{{ old('nickname') }}">
                                            @error('nickname')
                                                <div class="error">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-row">
                                        <div class="form-group">
                                            <label for="gender" class="form-label">Gender<span class="required">*</span></label>
                                            <select id="gender" name="gender" class="form-control">
                                                <option value="" {{ old('gender') == '' ? 'selected' : '' }}>Select gender</option>
                                                <option value="male" {{ old('gender') == 'male' ? 'selected' : '' }}>Male</option>
                                                <option value="female" {{ old('gender') == 'female' ? 'selected' : '' }}>Female</option>
                                                <option value="other" {{ old('gender') == 'other' ? 'selected' : '' }}>Other</option>
                                            </select>
                                            @error('gender')
                                                <div class="error">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="citizenship" class="form-label">Citizenship<span class="required">*</span></label>
                                            <input type="text" id="citizenship" name="citizenship" class="form-control" value="{{ old('citizenship') }}">
                                            @error('citizenship')
                                                <div class="error">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="birthdate" class="form-label">Birthdate<span class="required">*</span></label>
                                            <input type="date" id="birthdate" name="birthdate" class="form-control" value="{{ old('birthdate') }}">
                                            @error('birthdate')
                                                <div class="error">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="age" class="form-label">Age<span class="required">*</span></label>
                                            <input type="number" id="age" name="age" class="form-control" value="{{ old('age') }}">
                                            @error('age')
                                                <div class="error">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-row">
                                        <div class="form-group">
                                            <label for="place_of_birth" class="form-label">Place of Birth<span class="required">*</span></label>
                                            <input type="text" id="place_of_birth" name="place_of_birth" class="form-control" value="{{ old('place_of_birth') }}">
                                            @error('place_of_birth')
                                                <div class="error">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="telephone" class="form-label">Telephone<span class="required">*</span></label>
                                            <input type="tel" id="telephone" name="telephone" class="form-control" value="{{ old('telephone') }}">
                                            @error('telephone')
                                                <div class="error">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="email_address" class="form-label">Email Address<span class="required">*</span></label>
                                            <input type="email" id="email_address" name="email_address" class="form-control" value="{{ old('email_address') }}">
                                            @error('email_address')
                                                <div class="error">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="civil_status" class="form-label">Civil Status<span class="required">*</span></label>
                                            <select id="civil_status" name="civil_status" class="form-control">
                                                <option value="" {{ old('civil_status') == '' ? 'selected' : '' }}>Select status</option>
                                                <option value="single" {{ old('civil_status') == 'single' ? 'selected' : '' }}>Single</option>
                                                <option value="married" {{ old('civil_status') == 'married' ? 'selected' : '' }}>Married</option>
                                                <option value="divorced" {{ old('civil_status') == 'divorced' ? 'selected' : '' }}>Divorced</option>
                                                <option value="widowed" {{ old('civil_status') == 'widowed' ? 'selected' : '' }}>Widowed</option>
                                            </select>
                                            @error('civil_status')
                                                <div class="error">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="navigation-buttons">
                                    <button type="button" class="btn btn-secondary prev-btn" data-prev="1" style="display: none;">Previous</button>
                                    <button type="button" class="btn btn-primary next-btn" data-next="2">Next</button>
                                </div>
                            </div>

                            <!-- Step 2: Primary Address -->
                            <div class="step-content" data-step="2">
                                <div class="form-section">
                                    <h2 class="section-title">Primary Address</h2>
                                    <div class="form-row">
                                        <div class="form-group">
                                            <label for="house_no" class="form-label">House No.<span class="required">*</span></label>
                                            <input type="text" id="house_no" name="house_no" class="form-control" value="{{ old('house_no') }}">
                                            @error('house_no')
                                                <div class="error">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="village" class="form-label">Village/Sitio<span class="required">*</span></label>
                                            <input type="text" id="village" name="village" class="form-control" value="{{ old('village') }}">
                                            @error('village')
                                                <div class="error">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="barangay" class="form-label">Barangay<span class="required">*</span></label>
                                            <input type="text" id="barangay" name="barangay" class="form-control" value="{{ old('barangay', $barangay ?? 'Barangay Incio') }}">
                                            @error('barangay')
                                                <div class="error">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-row">
                                        <div class="form-group">
                                            <label for="town_city" class="form-label">Town/City<span class="required">*</span></label>
                                            <input type="text" id="town_city" name="town_city" class="form-control" value="{{ old('town_city', $town_city ?? 'Incio City') }}">
                                            @error('town_city')
                                                <div class="error">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="province" class="form-label">Province<span class="required">*</span></label>
                                            <input type="text" id="province" name="province" class="form-control" value="{{ old('province', $province ?? 'Incio Province') }}">
                                            @error('province')
                                                <div class="error">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="postal_code" class="form-label">Postal Code</label>
                                            <input type="text" id="postal_code" name="postal_code" class="form-control" value="{{ old('postal_code', $postal_code ?? '9800') }}">
                                            @error('postal_code')
                                                <div class="error">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="navigation-buttons">
                                    <button type="button" class="btn btn-secondary prev-btn" data-prev="1">Previous</button>
                                    <button type="button" class="btn btn-primary next-btn" data-next="3">Next</button>
                                </div>
                            </div>

                            <!-- Step 3: Secondary Address -->
                            <div class="step-content" data-step="3">
                                <div class="form-section">
                                    <h2 class="section-title">Secondary Address</h2>
                                    <div class="form-row">
                                        <div class="form-group">
                                            <label for="other_house_no" class="form-label">Other House No.</label>
                                            <input type="text" id="other_house_no" name="other_house_no" class="form-control" value="{{ old('other_house_no') }}">
                                            @error('other_house_no')
                                                <div class="error">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="other_village" class="form-label">Village/Sitio</label>
                                            <input type="text" id="other_village" name="other_village" class="form-control" value="{{ old('other_village') }}">
                                            @error('other_village')
                                                <div class="error">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="other_barangay" class="form-label">Barangay</label>
                                            <input type="text" id="other_barangay" name="other_barangay" class="form-control" value="{{ old('other_barangay') }}">
                                            @error('other_barangay')
                                                <div class="error">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-row">
                                        <div class="form-group">
                                            <label for="other_town_city" class="form-label">Town/City</label>
                                            <input type="text" id="other_town_city" name="other_town_city" class="form-control" value="{{ old('other_town_city') }}">
                                            @error('other_town_city')
                                                <div class="error">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="other_province" class="form-label">Province</label>
                                            <input type="text" id="other_province" name="other_province" class="form-control" value="{{ old('other_province') }}">
                                            @error('other_province')
                                                <div class="error">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="other_postal_code" class="form-label">Postal Code</label>
                                            <input type="text" id="other_postal_code" name="other_postal_code" class="form-control" value="{{ old('other_postal_code') }}">
                                            @error('other_postal_code')
                                                <div class="error">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="navigation-buttons">
                                    <button type="button" class="btn btn-secondary prev-btn" data-prev="2">Previous</button>
                                    <button type="button" class="btn btn-primary next-btn" data-next="4">Next</button>
                                </div>
                            </div>

                            <!-- Step 4: Incident Information -->
                            <div class="step-content" data-step="4">
                                <div class="form-section">
                                    <h2 class="section-title">Incident Information</h2>
                                    <div class="form-row">
                                        <div class="form-group">
                                            <label for="date_time_reported" class="form-label">Date & Time Reported<span class="required">*</span></label>
                                            <input type="datetime-local" id="date_time_reported" name="date_time_reported" class="form-control" value="{{ old('date_time_reported') }}">
                                            @error('date_time_reported')
                                                <div class="error">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="date_time_incident" class="form-label">Date & Time of Incident<span class="required">*</span></label>
                                            <input type="datetime-local" id="date_time_incident" name="date_time_incident" class="form-control" value="{{ old('date_time_incident') }}">
                                            @error('date_time_incident')
                                                <div class="error">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-row">
                                        <div class="form-group">
                                            <label for="highest_education" class="form-label">Highest Educational Attainment<span class="required">*</span></label>
                                            <select id="highest_education" name="highest_education" class="form-control">
                                                <option value="" {{ old('highest_education') == '' ? 'selected' : '' }}>Select education level</option>
                                                <option value="elementary" {{ old('highest_education') == 'elementary' ? 'selected' : '' }}>Elementary</option>
                                                <option value="high-school" {{ old('highest_education') == 'high-school' ? 'selected' : '' }}>High School</option>
                                                <option value="vocational" {{ old('highest_education') == 'vocational' ? 'selected' : '' }}>Vocational</option>
                                                <option value="college" {{ old('highest_education') == 'college' ? 'selected' : '' }}>College</option>
                                                <option value="graduate" {{ old('highest_education') == 'graduate' ? 'selected' : '' }}>Graduate</option>
                                            </select>
                                            @error('highest_education')
                                                <div class="error">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="occupation" class="form-label">Occupation<span class="required">*</span></label>
                                            <input type="text" id="occupation" name="occupation" class="form-control" value="{{ old('occupation') }}">
                                            @error('occupation')
                                                <div class="error">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="relation_to_victim" class="form-label">Relation to the Victim<span class="required">*</span></label>
                                            <input type="text" id="relation_to_victim" name="relation_to_victim" class="form-control" value="{{ old('relation_to_victim') }}">
                                            @error('relation_to_victim')
                                                <div class="error">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="navigation-buttons">
                                    <button type="button" class="btn btn-secondary prev-btn" data-prev="3">Previous</button>
                                    <button type="button" class="btn btn-primary next-btn" data-next="5">Next</button>
                                </div>
                            </div>

                            <!-- Step 5: Physical Description -->
                            <div class="step-content" data-step="5">
                                <div class="form-section">
                                    <h2 class="section-title">Physical Description</h2>
                                    <div class="form-row">
                                        <div class="form-group">
                                            <label for="height_cm" class="form-label">Height (cm)<span class="required">*</span></label>
                                            <input type="number" id="height_cm" name="height_cm" class="form-control" value="{{ old('height_cm') }}">
                                            @error('height_cm')
                                                <div class="error">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="weight_kg" class="form-label">Weight (kg)<span class="required">*</span></label>
                                            <input type="number" id="weight_kg" name="weight_kg" class="form-control" value="{{ old('weight_kg') }}">
                                            @error('weight_kg')
                                                <div class="error">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-row">
                                        <div class="form-group">
                                            <label for="eye_color" class="form-label">Color Of The Eye<span class="required">*</span></label>
                                            <input type="text" id="eye_color" name="eye_color" class="form-control" value="{{ old('eye_color') }}">
                                            @error('eye_color')
                                                <div class="error">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="eye_description" class="form-label">Description Of Eye<span class="required">*</span></label>
                                            <input type="text" id="eye_description" name="eye_description" class="form-control" value="{{ old('eye_description') }}">
                                            @error('eye_description')
                                                <div class="error">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-row">
                                        <div class="form-group">
                                            <label for="hair_color" class="form-label">Color Of The Hair<span class="required">*</span></label>
                                            <input type="text" id="hair_color" name="hair_color" class="form-control" value="{{ old('hair_color') }}">
                                            @error('hair_color')
                                                <div class="error">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="hair_description" class="form-label">Description Of The Hair<span class="required">*</span></label>
                                            <input type="text" id="hair_description" name="hair_description" class="form-control" value="{{ old('hair_description') }}">
                                            @error('hair_description')
                                                <div class="error">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-row">
                                        <div class="form-group">
                                            <label for="influence" class="form-label">Under the Influence of?<span class="required">*</span></label>
                                            <input type="text" id="influence" name="influence" class="form-control" value="{{ old('influence') }}">
                                            @error('influence')
                                                <div class="error">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="progress-bar-container">
                                    <div class="progress-bar" id="progress-bar"></div>
                                </div>

                                <div class="navigation-buttons">
                                    <button type="button" class="btn btn-secondary prev-btn" data-prev="4">Previous</button>
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const steps = document.querySelectorAll('.step');
            const stepContents = document.querySelectorAll('.step-content');
            const nextButtons = document.querySelectorAll('.next-btn');
            const prevButtons = document.querySelectorAll('.prev-btn');
            const progressBar = document.getElementById('progress-bar');
            const form = document.getElementById('suspect-form');

            let currentStep = 1;
            const totalSteps = steps.length;

            function updateProgressBar() {
                const percent = ((currentStep - 1) / (totalSteps - 1)) * 100;
                progressBar.style.width = `${percent}%`;
            }

            function goToStep(stepNumber) {
                stepContents.forEach(content => {
                    content.classList.remove('active');
                });

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

                currentStep = stepNumber;
                updateProgressBar();
            }

            nextButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const nextStep = parseInt(this.getAttribute('data-next'));
                    goToStep(nextStep);
                });
            });

            prevButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const prevStep = parseInt(this.getAttribute('data-prev'));
                    goToStep(prevStep);
                });
            });

            steps.forEach(step => {
                step.addEventListener('click', function() {
                    const stepNum = parseInt(this.getAttribute('data-step'));
                    goToStep(stepNum);
                });
            });

            form.addEventListener('submit', function(e) {
                // Let the form submit naturally to the server
            });

            updateProgressBar();
        });

        document.addEventListener('DOMContentLoaded', function() {
            const birthdateInput = document.getElementById('birthdate');
            const ageInput = document.getElementById('age');
            
            function calculateAge(birthdate) {
                const today = new Date();
                const birthDate = new Date(birthdate);
                let age = today.getFullYear() - birthDate.getFullYear();
                const monthDiff = today.getMonth() - birthDate.getMonth();
                
                if (monthDiff < 0 || (monthDiff === 0 && today.getDate() < birthDate.getDate())) {
                    age--;
                }
                
                return age;
            }
            
            birthdateInput.addEventListener('change', function() {
                if (this.value) {
                    const calculatedAge = calculateAge(this.value);
                    ageInput.value = calculatedAge;
                }
            });
        });
    </script>
</body>
</html>
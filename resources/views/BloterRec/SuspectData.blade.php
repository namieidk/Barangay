<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>Suspect Data - BRGY INCIO, DAVAO CITY SYSTEM</title>
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
            background-color: #e6ffe6;
            border-color: #e6ffe6;
            color: black;
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
            background-color:#e6ffe6;
            color: #333;
        }
        .btn-primary:hover {
            background-color: #d4f7d4;
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
                    <nav class="flex border-b border-gray-200 bg-[#537B2F] text-[#ffffff]">
    <x-resbar href="{{ route('BloterRec.ResPersonData') }}" active="{{ request()->routeIs('blotter.reporting.*') }}" id="repperdataBtn" class="px-6 py-4 text-sm font-medium text-[#ffffff] bg-[#537B2F]  hover:bg-[#2D5128] transition-all duration-200">
        Reporting Person Data
    </x-resbar>
    <x-resbar href="{{ route('blotter.suspect.index') }}" active="{{ request()->routeIs('blotter.suspect.*') }}" id="SusDataBtn" class="px-6 py-4 text-sm font-medium text-[#ffffff] bg-[#537B2F]  hover:bg-[#2D5128] transition-all duration-200">
        Suspect Data
    </x-resbar>
    <x-resbar href="{{ route('blotter.victim.index') }}" active="{{ request()->routeIs('blotter.victim.*') }}" id="VicDataBtn" class="px-6 py-4 text-sm font-medium text-[#ffffff] bg-[#537B2F]  hover:bg-[#2D5128] transition-all duration-200">
        Victim Data
    </x-resbar>
    <x-resbar href="/ChildLaw" active="{{ request()->is('ChildLaw') }}" id="ChildLawBtn" class="px-6 py-4 text-sm font-medium text-[#ffffff] bg-[#537B2F]  hover:bg-[#2D5128] transition-all duration-200">
        For Children in Conflict with the Law
    </x-resbar>
    <x-resbar href="{{ route('blotter.narrative.index') }}" active="{{ request()->routeIs('blotter.narrative.*') }}" id="NarrativeBtn" class="px-6 py-4 text-sm font-medium text-[#ffffff] bg-[#537B2F]  hover:bg-[#2D5128] transition-all duration-200">
        Narrative
    </x-resbar>
    <x-resbar href="/IncidentReport" active="{{ request()->is('IncidentReport') }}" id="IncidentReporteBtn" class="px-6 py-4 text-sm font-medium text-[#ffffff] bg-[#537B2F]  hover:bg-[#2D5128] transition-all duration-200">
        Incident Report Receipt
    </x-resbar>
</nav>

                    <!-- Content Area -->
                    <div class="form-content">
                        <!-- Search Section -->
                        <div class="search-section">
                            <form method="POST" action="{{ route('blotter.suspect.search') }}">
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
                                    <button type="submit" class="btn btn-primary text-[#333] bg-[#e6ffe6] hover:bg-[#d4f7d4]">Search</button>
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
                                    <div class="step-label">Primary Address</div>
                                </div>
                                <div class="step" data-step="3">
                                    <div class="step-circle">3</div>
                                    <div class="step-label">Secondary Address</div>
                                </div>
                                <div class="step" data-step="4">
                                    <div class="step-circle">4</div>
                                    <div class="step-label">Incident Details</div>
                                </div>
                                <div class="step" data-step="5">
                                    <div class="step-circle">5</div>
                                    <div class="step-label">Physical Description</div>
                                </div>
                            </div>
                        </div>

                        <!-- Form -->
                        <form id="suspectForm" method="POST" action="{{ route('blotter.suspect.store') }}">
                            @csrf
                            <input type="hidden" name="res_person_data_id" value="{{ $blotterEntryNumber ?? '' }}">
                            <input type="hidden" name="type_of_incident" value="{{ $typeOfIncident ?? '' }}">

                            <!-- Step 1: Personal Information -->
                            <div class="step-content active" data-step="1">
                                <h2 class="step-title">Personal Information</h2>
                                <div class="form-row">
                                    <div class="form-group">
                                        <label for="surname" class="form-label">First Name<span>*</span></label>
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
                                        <label for="nickname" class="form-label">Nickname<span>*</span></label>
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
                                    <div class="form-group">
    <label for="citizenship" class="form-label">Citizenship<span>*</span></label>
    <select id="citizenship" name="citizenship" class="form-control" required>
        <option value="">Select a country</option>
        <option value="Afghanistan" {{ old('citizenship') == 'Afghanistan' ? 'selected' : '' }}>Afghanistan</option>
        <option value="Albania" {{ old('citizenship') == 'Albania' ? 'selected' : '' }}>Albania</option>
        <option value="Algeria" {{ old('citizenship') == 'Algeria' ? 'selected' : '' }}>Algeria</option>
        <option value="Andorra" {{ old('citizenship') == 'Andorra' ? 'selected' : '' }}>Andorra</option>
        <option value="Angola" {{ old('citizenship') == 'Angola' ? 'selected' : '' }}>Angola</option>
        <option value="Antigua and Barbuda" {{ old('citizenship') == 'Antigua and Barbuda' ? 'selected' : '' }}>Antigua and Barbuda</option>
        <option value="Argentina" {{ old('citizenship') == 'Argentina' ? 'selected' : '' }}>Argentina</option>
        <option value="Armenia" {{ old('citizenship') == 'Armenia' ? 'selected' : '' }}>Armenia</option>
        <option value="Australia" {{ old('citizenship') == 'Australia' ? 'selected' : '' }}>Australia</option>
        <option value="Austria" {{ old('citizenship') == 'Austria' ? 'selected' : '' }}>Austria</option>
        <option value="Azerbaijan" {{ old('citizenship') == 'Azerbaijan' ? 'selected' : '' }}>Azerbaijan</option>
        <option value="Bahamas" {{ old('citizenship') == 'Bahamas' ? 'selected' : '' }}>Bahamas</option>
        <option value="Bahrain" {{ old('citizenship') == 'Bahrain' ? 'selected' : '' }}>Bahrain</option>
        <option value="Bangladesh" {{ old('citizenship') == 'Bangladesh' ? 'selected' : '' }}>Bangladesh</option>
        <option value="Barbados" {{ old('citizenship') == 'Barbados' ? 'selected' : '' }}>Barbados</option>
        <option value="Belarus" {{ old('citizenship') == 'Belarus' ? 'selected' : '' }}>Belarus</option>
        <option value="Belgium" {{ old('citizenship') == 'Belgium' ? 'selected' : '' }}>Belgium</option>
        <option value="Belize" {{ old('citizenship') == 'Belize' ? 'selected' : '' }}>Belize</option>
        <option value="Benin" {{ old('citizenship') == 'Benin' ? 'selected' : '' }}>Benin</option>
        <option value="Bhutan" {{ old('citizenship') == 'Bhutan' ? 'selected' : '' }}>Bhutan</option>
        <option value="Bolivia" {{ old('citizenship') == 'Bolivia' ? 'selected' : '' }}>Bolivia</option>
        <option value="Bosnia and Herzegovina" {{ old('citizenship') == 'Bosnia and Herzegovina' ? 'selected' : '' }}>Bosnia and Herzegovina</option>
        <option value="Botswana" {{ old('citizenship') == 'Botswana' ? 'selected' : '' }}>Botswana</option>
        <option value="Brazil" {{ old('citizenship') == 'Brazil' ? 'selected' : '' }}>Brazil</option>
        <option value="Brunei" {{ old('citizenship') == 'Brunei' ? 'selected' : '' }}>Brunei</option>
        <option value="Bulgaria" {{ old('citizenship') == 'Bulgaria' ? 'selected' : '' }}>Bulgaria</option>
        <option value="Burkina Faso" {{ old('citizenship') == 'Burkina Faso' ? 'selected' : '' }}>Burkina Faso</option>
        <option value="Burundi" {{ old('citizenship') == 'Burundi' ? 'selected' : '' }}>Burundi</option>
        <option value="Cabo Verde" {{ old('citizenship') == 'Cabo Verde' ? 'selected' : '' }}>Cabo Verde</option>
        <option value="Cambodia" {{ old('citizenship') == 'Cambodia' ? 'selected' : '' }}>Cambodia</option>
        <option value="Cameroon" {{ old('citizenship') == 'Cameroon' ? 'selected' : '' }}>Cameroon</option>
        <option value="Canada" {{ old('citizenship') == 'Canada' ? 'selected' : '' }}>Canada</option>
        <option value="Central African Republic" {{ old('citizenship') == 'Central African Republic' ? 'selected' : '' }}>Central African Republic</option>
        <option value="Chad" {{ old('citizenship') == 'Chad' ? 'selected' : '' }}>Chad</option>
        <option value="Chile" {{ old('citizenship') == 'Chile' ? 'selected' : '' }}>Chile</option>
        <option value="China" {{ old('citizenship') == 'China' ? 'selected' : '' }}>China</option>
        <option value="Colombia" {{ old('citizenship') == 'Colombia' ? 'selected' : '' }}>Colombia</option>
        <option value="Comoros" {{ old('citizenship') == 'Comoros' ? 'selected' : '' }}>Comoros</option>
        <option value="Congo" {{ old('citizenship') == 'Congo' ? 'selected' : '' }}>Congo</option>
        <option value="Costa Rica" {{ old('citizenship') == 'Costa Rica' ? 'selected' : '' }}>Costa Rica</option>
        <option value="Croatia" {{ old('citizenship') == 'Croatia' ? 'selected' : '' }}>Croatia</option>
        <option value="Cuba" {{ old('citizenship') == 'Cuba' ? 'selected' : '' }}>Cuba</option>
        <option value="Cyprus" {{ old('citizenship') == 'Cyprus' ? 'selected' : '' }}>Cyprus</option>
        <option value="Czech Republic" {{ old('citizenship') == 'Czech Republic' ? 'selected' : '' }}>Czech Republic</option>
        <option value="Denmark" {{ old('citizenship') == 'Denmark' ? 'selected' : '' }}>Denmark</option>
        <option value="Djibouti" {{ old('citizenship') == 'Djibouti' ? 'selected' : '' }}>Djibouti</option>
        <option value="Dominica" {{ old('citizenship') == 'Dominica' ? 'selected' : '' }}>Dominica</option>
        <option value="Dominican Republic" {{ old('citizenship') == 'Dominican Republic' ? 'selected' : '' }}>Dominican Republic</option>
        <option value="Ecuador" {{ old('citizenship') == 'Ecuador' ? 'selected' : '' }}>Ecuador</option>
        <option value="Egypt" {{ old('citizenship') == 'Egypt' ? 'selected' : '' }}>Egypt</option>
        <option value="El Salvador" {{ old('citizenship') == 'El Salvador' ? 'selected' : '' }}>El Salvador</option>
        <option value="Equatorial Guinea" {{ old('citizenship') == 'Equatorial Guinea' ? 'selected' : '' }}>Equatorial Guinea</option>
        <option value="Eritrea" {{ old('citizenship') == 'Eritrea' ? 'selected' : '' }}>Eritrea</option>
        <option value="Estonia" {{ old('citizenship') == 'Estonia' ? 'selected' : '' }}>Estonia</option>
        <option value="Eswatini" {{ old('citizenship') == 'Eswatini' ? 'selected' : '' }}>Eswatini</option>
        <option value="Ethiopia" {{ old('citizenship') == 'Ethiopia' ? 'selected' : '' }}>Ethiopia</option>
        <option value="Fiji" {{ old('citizenship') == 'Fiji' ? 'selected' : '' }}>Fiji</option>
        <option value="Finland" {{ old('citizenship') == 'Finland' ? 'selected' : '' }}>Finland</option>
        <option value="France" {{ old('citizenship') == 'France' ? 'selected' : '' }}>France</option>
        <option value="Gabon" {{ old('citizenship') == 'Gabon' ? 'selected' : '' }}>Gabon</option>
        <option value="Gambia" {{ old('citizenship') == 'Gambia' ? 'selected' : '' }}>Gambia</option>
        <option value="Georgia" {{ old('citizenship') == 'Georgia' ? 'selected' : '' }}>Georgia</option>
        <option value="Germany" {{ old('citizenship') == 'Germany' ? 'selected' : '' }}>Germany</option>
        <option value="Ghana" {{ old('citizenship') == 'Ghana' ? 'selected' : '' }}>Ghana</option>
        <option value="Greece" {{ old('citizenship') == 'Greece' ? 'selected' : '' }}>Greece</option>
        <option value="Grenada" {{ old('citizenship') == 'Grenada' ? 'selected' : '' }}>Grenada</option>
        <option value="Guatemala" {{ old('citizenship') == 'Guatemala' ? 'selected' : '' }}>Guatemala</option>
        <option value="Guinea" {{ old('citizenship') == 'Guinea' ? 'selected' : '' }}>Guinea</option>
        <option value="Guinea-Bissau" {{ old('citizenship') == 'Guinea-Bissau' ? 'selected' : '' }}>Guinea-Bissau</option>
        <option value="Guyana" {{ old('citizenship') == 'Guyana' ? 'selected' : '' }}>Guyana</option>
        <option value="Haiti" {{ old('citizenship') == 'Haiti' ? 'selected' : '' }}>Haiti</option>
        <option value="Honduras" {{ old('citizenship') == 'Honduras' ? 'selected' : '' }}>Honduras</option>
        <option value="Hungary" {{ old('citizenship') == 'Hungary' ? 'selected' : '' }}>Hungary</option>
        <option value="Iceland" {{ old('citizenship') == 'Iceland' ? 'selected' : '' }}>Iceland</option>
        <option value="India" {{ old('citizenship') == 'India' ? 'selected' : '' }}>India</option>
        <option value="Indonesia" {{ old('citizenship') == 'Indonesia' ? 'selected' : '' }}>Indonesia</option>
        <option value="Iran" {{ old('citizenship') == 'Iran' ? 'selected' : '' }}>Iran</option>
        <option value="Iraq" {{ old('citizenship') == 'Iraq' ? 'selected' : '' }}>Iraq</option>
        <option value="Ireland" {{ old('citizenship') == 'Ireland' ? 'selected' : '' }}>Ireland</option>
        <option value="Israel" {{ old('citizenship') == 'Israel' ? 'selected' : '' }}>Israel</option>
        <option value="Italy" {{ old('citizenship') == 'Italy' ? 'selected' : '' }}>Italy</option>
        <option value="Jamaica" {{ old('citizenship') == 'Jamaica' ? 'selected' : '' }}>Jamaica</option>
        <option value="Japan" {{ old('citizenship') == 'Japan' ? 'selected' : '' }}>Japan</option>
        <option value="Jordan" {{ old('citizenship') == 'Jordan' ? 'selected' : '' }}>Jordan</option>
        <option value="Kazakhstan" {{ old('citizenship') == 'Kazakhstan' ? 'selected' : '' }}>Kazakhstan</option>
        <option value="Kenya" {{ old('citizenship') == 'Kenya' ? 'selected' : '' }}>Kenya</option>
        <option value="Kiribati" {{ old('citizenship') == 'Kiribati' ? 'selected' : '' }}>Kiribati</option>
        <option value="Korea, North" {{ old('citizenship') == 'Korea, North' ? 'selected' : '' }}>Korea, North</option>
        <option value="Korea, South" {{ old('citizenship') == 'Korea, South' ? 'selected' : '' }}>Korea, South</option>
        <option value="Kosovo" {{ old('citizenship') == 'Kosovo' ? 'selected' : '' }}>Kosovo</option>
        <option value="Kuwait" {{ old('citizenship') == 'Kuwait' ? 'selected' : '' }}>Kuwait</option>
        <option value="Kyrgyzstan" {{ old('citizenship') == 'Kyrgyzstan' ? 'selected' : '' }}>Kyrgyzstan</option>
        <option value="Laos" {{ old('citizenship') == 'Laos' ? 'selected' : '' }}>Laos</option>
        <option value="Latvia" {{ old('citizenship') == 'Latvia' ? 'selected' : '' }}>Latvia</option>
        <option value="Lebanon" {{ old('citizenship') == 'Lebanon' ? 'selected' : '' }}>Lebanon</option>
        <option value="Lesotho" {{ old('citizenship') == 'Lesotho' ? 'selected' : '' }}>Lesotho</option>
        <option value="Liberia" {{ old('citizenship') == 'Liberia' ? 'selected' : '' }}>Liberia</option>
        <option value="Libya" {{ old('citizenship') == 'Libya' ? 'selected' : '' }}>Libya</option>
        <option value="Liechtenstein" {{ old('citizenship') == 'Liechtenstein' ? 'selected' : '' }}>Liechtenstein</option>
        <option value="Lithuania" {{ old('citizenship') == 'Lithuania' ? 'selected' : '' }}>Lithuania</option>
        <option value="Luxembourg" {{ old('citizenship') == 'Luxembourg' ? 'selected' : '' }}>Luxembourg</option>
        <option value="Madagascar" {{ old('citizenship') == 'Madagascar' ? 'selected' : '' }}>Madagascar</option>
        <option value="Malawi" {{ old('citizenship') == 'Malawi' ? 'selected' : '' }}>Malawi</option>
        <option value="Malaysia" {{ old('citizenship') == 'Malaysia' ? 'selected' : '' }}>Malaysia</option>
        <option value="Maldives" {{ old('citizenship') == 'Maldives' ? 'selected' : '' }}>Maldives</option>
        <option value="Mali" {{ old('citizenship') == 'Mali' ? 'selected' : '' }}>Mali</option>
        <option value="Malta" {{ old('citizenship') == 'Malta' ? 'selected' : '' }}>Malta</option>
        <option value="Marshall Islands" {{ old('citizenship') == 'Marshall Islands' ? 'selected' : '' }}>Marshall Islands</option>
        <option value="Mauritania" {{ old('citizenship') == 'Mauritania' ? 'selected' : '' }}>Mauritania</option>
        <option value="Mauritius" {{ old('citizenship') == 'Mauritius' ? 'selected' : '' }}>Mauritius</option>
        <option value="Mexico" {{ old('citizenship') == 'Mexico' ? 'selected' : '' }}>Mexico</option>
        <option value="Micronesia" {{ old('citizenship') == 'Micronesia' ? 'selected' : '' }}>Micronesia</option>
        <option value="Moldova" {{ old('citizenship') == 'Moldova' ? 'selected' : '' }}>Moldova</option>
        <option value="Monaco" {{ old('citizenship') == 'Monaco' ? 'selected' : '' }}>Monaco</option>
        <option value="Mongolia" {{ old('citizenship') == 'Mongolia' ? 'selected' : '' }}>Mongolia</option>
        <option value="Montenegro" {{ old('citizenship') == 'Montenegro' ? 'selected' : '' }}>Montenegro</option>
        <option value="Morocco" {{ old('citizenship') == 'Morocco' ? 'selected' : '' }}>Morocco</option>
        <option value="Mozambique" {{ old('citizenship') == 'Mozambique' ? 'selected' : '' }}>Mozambique</option>
        <option value="Myanmar" {{ old('citizenship') == 'Myanmar' ? 'selected' : '' }}>Myanmar</option>
        <option value="Namibia" {{ old('citizenship') == 'Namibia' ? 'selected' : '' }}>Namibia</option>
        <option value="Nauru" {{ old('citizenship') == 'Nauru' ? 'selected' : '' }}>Nauru</option>
        <option value="Nepal" {{ old('citizenship') == 'Nepal' ? 'selected' : '' }}>Nepal</option>
        <option value="Netherlands" {{ old('citizenship') == 'Netherlands' ? 'selected' : '' }}>Netherlands</option>
        <option value="New Zealand" {{ old('citizenship') == 'New Zealand' ? 'selected' : '' }}>New Zealand</option>
        <option value="Nicaragua" {{ old('citizenship') == 'Nicaragua' ? 'selected' : '' }}>Nicaragua</option>
        <option value="Niger" {{ old('citizenship') == 'Niger' ? 'selected' : '' }}>Niger</option>
        <option value="Nigeria" {{ old('citizenship') == 'Nigeria' ? 'selected' : '' }}>Nigeria</option>
        <option value="North Macedonia" {{ old('citizenship') == 'North Macedonia' ? 'selected' : '' }}>North Macedonia</option>
        <option value="Norway" {{ old('citizenship') == 'Norway' ? 'selected' : '' }}>Norway</option>
        <option value="Oman" {{ old('citizenship') == 'Oman' ? 'selected' : '' }}>Oman</option>
        <option value="Pakistan" {{ old('citizenship') == 'Pakistan' ? 'selected' : '' }}>Pakistan</option>
        <option value="Palau" {{ old('citizenship') == 'Palau' ? 'selected' : '' }}>Palau</option>
        <option value="Panama" {{ old('citizenship') == 'Panama' ? 'selected' : '' }}>Panama</option>
        <option value="Papua New Guinea" {{ old('citizenship') == 'Papua New Guinea' ? 'selected' : '' }}>Papua New Guinea</option>
        <option value="Paraguay" {{ old('citizenship') == 'Paraguay' ? 'selected' : '' }}>Paraguay</option>
        <option value="Peru" {{ old('citizenship') == 'Peru' ? 'selected' : '' }}>Peru</option>
        <option value="Philippines" {{ old('citizenship') == 'Philippines' ? 'selected' : '' }}>Philippines</option>
        <option value="Poland" {{ old('citizenship') == 'Poland' ? 'selected' : '' }}>Poland</option>
        <option value="Portugal" {{ old('citizenship') == 'Portugal' ? 'selected' : '' }}>Portugal</option>
        <option value="Qatar" {{ old('citizenship') == 'Qatar' ? 'selected' : '' }}>Qatar</option>
        <option value="Romania" {{ old('citizenship') == 'Romania' ? 'selected' : '' }}>Romania</option>
        <option value="Russia" {{ old('citizenship') == 'Russia' ? 'selected' : '' }}>Russia</option>
        <option value="Rwanda" {{ old('citizenship') == 'Rwanda' ? 'selected' : '' }}>Rwanda</option>
        <option value="Saint Kitts and Nevis" {{ old('citizenship') == 'Saint Kitts and Nevis' ? 'selected' : '' }}>Saint Kitts and Nevis</option>
        <option value="Saint Lucia" {{ old('citizenship') == 'Saint Lucia' ? 'selected' : '' }}>Saint Lucia</option>
        <option value="Saint Vincent and the Grenadines" {{ old('citizenship') == 'Saint Vincent and the Grenadines' ? 'selected' : '' }}>Saint Vincent and the Grenadines</option>
        <option value="Samoa" {{ old('citizenship') == 'Samoa' ? 'selected' : '' }}>Samoa</option>
        <option value="San Marino" {{ old('citizenship') == 'San Marino' ? 'selected' : '' }}>San Marino</option>
        <option value="Sao Tome and Principe" {{ old('citizenship') == 'Sao Tome and Principe' ? 'selected' : '' }}>Sao Tome and Principe</option>
        <option value="Saudi Arabia" {{ old('citizenship') == 'Saudi Arabia' ? 'selected' : '' }}>Saudi Arabia</option>
        <option value="Senegal" {{ old('citizenship') == 'Senegal' ? 'selected' : '' }}>Senegal</option>
        <option value="Serbia" {{ old('citizenship') == 'Serbia' ? 'selected' : '' }}>Serbia</option>
        <option value="Seychelles" {{ old('citizenship') == 'Seychelles' ? 'selected' : '' }}>Seychelles</option>
        <option value="Sierra Leone" {{ old('citizenship') == 'Sierra Leone' ? 'selected' : '' }}>Sierra Leone</option>
        <option value="Singapore" {{ old('citizenship') == 'Singapore' ? 'selected' : '' }}>Singapore</option>
        <option value="Slovakia" {{ old('citizenship') == 'Slovakia' ? 'selected' : '' }}>Slovakia</option>
        <option value="Slovenia" {{ old('citizenship') == 'Slovenia' ? 'selected' : '' }}>Slovenia</option>
        <option value="Solomon Islands" {{ old('citizenship') == 'Solomon Islands' ? 'selected' : '' }}>Solomon Islands</option>
        <option value="Somalia" {{ old('citizenship') == 'Somalia' ? 'selected' : '' }}>Somalia</option>
        <option value="South Africa" {{ old('citizenship') == 'South Africa' ? 'selected' : '' }}>South Africa</option>
        <option value="South Sudan" {{ old('citizenship') == 'South Sudan' ? 'selected' : '' }}>South Sudan</option>
        <option value="Spain" {{ old('citizenship') == 'Spain' ? 'selected' : '' }}>Spain</option>
        <option value="Sri Lanka" {{ old('citizenship') == 'Sri Lanka' ? 'selected' : '' }}>Sri Lanka</option>
        <option value="Sudan" {{ old('citizenship') == 'Sudan' ? 'selected' : '' }}>Sudan</option>
        <option value="Suriname" {{ old('citizenship') == 'Suriname' ? 'selected' : '' }}>Suriname</option>
        <option value="Sweden" {{ old('citizenship') == 'Sweden' ? 'selected' : '' }}>Sweden</option>
        <option value="Switzerland" {{ old('citizenship') == 'Switzerland' ? 'selected' : '' }}>Switzerland</option>
        <option value="Syria" {{ old('citizenship') == 'Syria' ? 'selected' : '' }}>Syria</option>
        <option value="Taiwan" {{ old('citizenship') == 'Taiwan' ? 'selected' : '' }}>Taiwan</option>
        <option value="Tajikistan" {{ old('citizenship') == 'Tajikistan' ? 'selected' : '' }}>Tajikistan</option>
        <option value="Tanzania" {{ old('citizenship') == 'Tanzania' ? 'selected' : '' }}>Tanzania</option>
        <option value="Thailand" {{ old('citizenship') == 'Thailand' ? 'selected' : '' }}>Thailand</option>
        <option value="Timor-Leste" {{ old('citizenship') == 'Timor-Leste' ? 'selected' : '' }}>Timor-Leste</option>
        <option value="Togo" {{ old('citizenship') == 'Togo' ? 'selected' : '' }}>Togo</option>
        <option value="Tonga" {{ old('citizenship') == 'Tonga' ? 'selected' : '' }}>Tonga</option>
        <option value="Trinidad and Tobago" {{ old('citizenship') == 'Trinidad and Tobago' ? 'selected' : '' }}>Trinidad and Tobago</option>
        <option value="Tunisia" {{ old('citizenship') == 'Tunisia' ? 'selected' : '' }}>Tunisia</option>
        <option value="Turkey" {{ old('citizenship') == 'Turkey' ? 'selected' : '' }}>Turkey</option>
        <option value="Turkmenistan" {{ old('citizenship') == 'Turkmenistan' ? 'selected' : '' }}>Turkmenistan</option>
        <option value="Tuvalu" {{ old('citizenship') == 'Tuvalu' ? 'selected' : '' }}>Tuvalu</option>
        <option value="Uganda" {{ old('citizenship') == 'Uganda' ? 'selected' : '' }}>Uganda</option>
        <option value="Ukraine" {{ old('citizenship') == 'Ukraine' ? 'selected' : '' }}>Ukraine</option>
        <option value="United Arab Emirates" {{ old('citizenship') == 'United Arab Emirates' ? 'selected' : '' }}>United Arab Emirates</option>
        <option value="United Kingdom" {{ old('citizenship') == 'United Kingdom' ? 'selected' : '' }}>United Kingdom</option>
        <option value="United States" {{ old('citizenship') == 'United States' ? 'selected' : '' }}>United States</option>
        <option value="Uruguay" {{ old('citizenship') == 'Uruguay' ? 'selected' : '' }}>Uruguay</option>
        <option value="Uzbekistan" {{ old('citizenship') == 'Uzbekistan' ? 'selected' : '' }}>Uzbekistan</option>
        <option value="Vanuatu" {{ old('citizenship') == 'Vanuatu' ? 'selected' : '' }}>Vanuatu</option>
        <option value="Vatican City" {{ old('citizenship') == 'Vatican City' ? 'selected' : '' }}>Vatican City</option>
        <option value="Venezuela" {{ old('citizenship') == 'Venezuela' ? 'selected' : '' }}>Venezuela</option>
        <option value="Vietnam" {{ old('citizenship') == 'Vietnam' ? 'selected' : '' }}>Vietnam</option>
        <option value="Yemen" {{ old('citizenship') == 'Yemen' ? 'selected' : '' }}>Yemen</option>
        <option value="Zambia" {{ old('citizenship') == 'Zambia' ? 'selected' : '' }}>Zambia</option>
        <option value="Zimbabwe" {{ old('citizenship') == 'Zimbabwe' ? 'selected' : '' }}>Zimbabwe</option>
    </select>
    @error('citizenship')
        <div class="text-red-600 text-sm mt-1">{{ $message }}</div>
    @enderror
</div>
                                </div>
                                <div class="form-row">
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
                                    <div class="form-group">
                                        <label for="place_of_birth" class="form-label">Place of Birth<span>*</span></label>
                                        <input type="text" id="place_of_birth" name="place_of_birth" class="form-control" value="{{ old('place_of_birth') }}" required>
                                        @error('place_of_birth')
                                            <div class="text-red-600 text-sm mt-1">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="navigation-buttons">
                                    <button type="button" class="btn btn-secondary prev-btn" style="display: none;">Previous</button>
                                    <button type="button" class="btn btn-primary next-btn text-[#333] bg-[#e6ffe6] hover:bg-[#d4f7d4]">Next</button>
                                </div>
                            </div>

                            <!-- Step 2: Primary Address -->
                            <div class="step-content" data-step="2">
                                <h2 class="step-title">Primary Address</h2>
                                <div class="form-row">
                                    <div class="form-group">
                                        <label for="house_no" class="form-label">House No.<span>*</span></label>
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

                            <!-- Step 3: Secondary Address -->
                            <div class="step-content" data-step="3">
                                <h2 class="step-title">Secondary Address</h2>
                                <div class="form-row">
                                    <div class="form-group">
                                        <label for="other_house_no" class="form-label">Other House No.</label>
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

                            <!-- Step 4: Incident Information -->
                            <div class="step-content" data-step="4">
                                <h2 class="step-title">Incident Information</h2>
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
                                        <label for="telephone" class="form-label">Telephone<span>*</span></label>
                                        <input type="tel" id="telephone" name="telephone" class="form-control" value="{{ old('telephone') }}" required>
                                        @error('telephone')
                                            <div class="text-red-600 text-sm mt-1">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="email_address" class="form-label">Email Address<span>*</span></label>
                                        <input type="email" id="email_address" name="email_address" class="form-control" value="{{ old('email_address') }}" required>
                                        @error('email_address')
                                            <div class="text-red-600 text-sm mt-1">{{ $message }}</div>
                                        @enderror
                                    </div>
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
                                </div>
                                <div class="form-row">
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
                                    <div class="form-group">
                                        <label for="occupation" class="form-label">Occupation<span>*</span></label>
                                        <input type="text" id="occupation" name="occupation" class="form-control" value="{{ old('occupation') }}" required>
                                        @error('occupation')
                                            <div class="text-red-600 text-sm mt-1">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="relation_to_victim" class="form-label">Relation to Victim<span>*</span></label>
                                        <input type="text" id="relation_to_victim" name="relation_to_victim" class="form-control" value="{{ old('relation_to_victim') }}" required>
                                        @error('relation_to_victim')
                                            <div class="text-red-600 text-sm mt-1">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="navigation-buttons">
                                    <button type="button" class="btn btn-secondary prev-btn">Previous</button>
                                    <button type="button" class="btn btn-primary next-btn">Next</button>
                                </div>
                            </div>

                            <!-- Step 5: Physical Description -->
                            <div class="step-content" data-step="5">
                                <h2 class="step-title">Physical Description</h2>
                                <div class="form-row">
                                    <div class="form-group">
                                        <label for="height_cm" class="form-label">Height (cm)<span>*</span></label>
                                        <input type="number" id="height_cm" name="height_cm" class="form-control" value="{{ old('height_cm') }}" required>
                                        @error('height_cm')
                                            <div class="text-red-600 text-sm mt-1">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="weight_kg" class="form-label">Weight (kg)<span>*</span></label>
                                        <input type="number" id="weight_kg" name="weight_kg" class="form-control" value="{{ old('weight_kg') }}" required>
                                        @error('weight_kg')
                                            <div class="text-red-600 text-sm mt-1">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group">
                                        <label for="eye_color" class="form-label">Eye Color<span>*</span></label>
                                        <input type="text" id="eye_color" name="eye_color" class="form-control" value="{{ old('eye_color') }}" required>
                                        @error('eye_color')
                                            <div class="text-red-600 text-sm mt-1">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="eye_description" class="form-label">Eye Description<span>*</span></label>
                                        <input type="text" id="eye_description" name="eye_description" class="form-control" value="{{ old('eye_description') }}" required>
                                        @error('eye_description')
                                            <div class="text-red-600 text-sm mt-1">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group">
                                        <label for="hair_color" class="form-label">Hair Color<span>*</span></label>
                                        <input type="text" id="hair_color" name="hair_color" class="form-control" value="{{ old('hair_color') }}" required>
                                        @error('hair_color')
                                            <div class="text-red-600 text-sm mt-1">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="hair_description" class="form-label">Hair Description<span>*</span></label>
                                        <input type="text" id="hair_description" name="hair_description" class="form-control" value="{{ old('hair_description') }}" required>
                                        @error('hair_description')
                                            <div class="text-red-600 text-sm mt-1">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group">
                                        <label for="influence" class="form-label">Under the Influence of?<span>*</span></label>
                                        <input type="text" id="influence" name="influence" class="form-control" value="{{ old('influence') }}" required>
                                        @error('influence')
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
            const form = document.getElementById('suspectForm');
            const nextBtn = document.querySelectorAll('.next-btn');
            const prevBtn = document.querySelectorAll('.prev-btn');
            const submitBtn = document.querySelector('.submit-btn');
            const progressBar = document.getElementById('progress-bar');
            const steps = document.querySelectorAll('.step');
            const stepContents = document.querySelectorAll('.step-content');

            let currentStep = 1;
            const totalSteps = steps.length;

            const dateReportedInput = document.getElementById('date_time_reported');
if (dateReportedInput) {
    const now = new Date();
    const year = now.getFullYear();
    const month = String(now.getMonth() + 1).padStart(2, '0');
    const day = String(now.getDate()).padStart(2, '0');
    const hours = String(now.getHours()).padStart(2, '0');
    const minutes = String(now.getMinutes()).padStart(2, '0');
    
    const formattedDateTime = `${year}-${month}-${day}T${hours}:${minutes}`;
    dateReportedInput.value = formattedDateTime;
}

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

                prevBtn.forEach(btn => btn.style.display = stepNumber === 1 ? 'none' : 'block');
                nextBtn.forEach(btn => btn.style.display = stepNumber === totalSteps ? 'none' : 'block');
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

            nextBtn.forEach(btn => {
                btn.addEventListener('click', function() {
                    if (validateStep(currentStep)) {
                        currentStep++;
                        showStep(currentStep);
                    } else {
                        alert('Please fill in all required fields before proceeding.');
                    }
                });
            });

            prevBtn.forEach(btn => {
                btn.addEventListener('click', function() {
                    currentStep--;
                    showStep(currentStep);
                });
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
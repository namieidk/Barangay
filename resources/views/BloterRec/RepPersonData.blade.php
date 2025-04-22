<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>BRGY INCIO, DAVAO CITY SYSTEM</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f5f7fa;
            color: #333;
            line-height: 1.6;
            margin: 0;
            padding: 0;
        }
        .form-container {
            max-width: 1200px;
            margin: 30px auto;
            background-color: #fff;
            border-radius: 12px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            overflow: hidden;
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
            background-color: #e6ffe6;
            color: black;
            border-color: #e6ffe6;
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
            color:rgb(46, 112, 46);
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
        .input-group {
            margin-bottom: 20px;
        }
        .form-label {
            display: block;
            font-size: 14px;
            font-weight: 500;
            color: #4b5563;
            margin-bottom: 6px;
        }
        .form-input {
            width: 100%;
            padding: 10px 12px;
            border: 1px solid #d1d5db;
            border-radius: 6px;
            background-color: #fff;
            transition: all 0.3s;
            font-size: 14px;
            box-sizing: border-box;
        }
        .form-input:focus {
            outline: none;
            border-color: #3b82f6;
            box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.2);
        }
        .required {
            color: #ef4444;
            margin-left: 4px;
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
            background-color: #e6ffe6;
            color: #333;
            border: none;
        }
        .btn-primary:hover {
            background-color: #d4f7d4;
        }
        .btn-secondary {
            background-color: #f3f4f6;
            color: #4b5563;
            border: 1px solid #d1d5db;
        }
        .btn-secondary:hover {
            background-color: #e5e7eb;
        }
        .btn-success {
            background-color: #10b981;
            color: white;
            border: none;
        }
        .btn-success:hover {
            background-color: #059669;
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
            background-color: #d4f7d4;
            width: 0%;
            transition: width 0.3s ease;
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
                padding-top: 2rem;
            }
            nav {
                flex-wrap: wrap;
            }
            [x-resbar] {
                flex: 1 1 50%;
                text-align: center;
            }
        }
    </style>
</head>
<body class="min-h-screen bg-gray-100 flex font-sans">
    <x-sidebar></x-sidebar>

    <div class="flex-1 ml-64 pt-10">
        <div class="p-10 w-full max-w-6xl mx-auto">
        <nav class="flex border-b border-gray-200 bg-[#e6ffe6] text-[#333]">
    <x-resbar href="{{ route('BloterRec.ResPersonData') }}" active="{{ request()->routeIs('blotter.reporting.*') }}" id="repperdataBtn" class="px-6 py-4 text-sm font-medium text-[#333] bg-[#e6ffe6] hover:bg-[#d4f7d4] transition-all duration-200">
        Reporting Person Data
    </x-resbar>
    <x-resbar href="{{ route('blotter.suspect.index') }}" active="{{ request()->routeIs('blotter.suspect.*') }}" id="SusDataBtn" class="px-6 py-4 text-sm font-medium text-[#333] bg-[#e6ffe6] hover:bg-[#d4f7d4] transition-all duration-200">
        Suspect Data
    </x-resbar>
    <x-resbar href="{{ route('blotter.victim.index') }}" active="{{ request()->routeIs('blotter.victim.*') }}" id="VicDataBtn" class="px-6 py-4 text-sm font-medium text-[#333] bg-[#e6ffe6] hover:bg-[#d4f7d4] transition-all duration-200">
        Victim Data
    </x-resbar>
    <x-resbar href="/ChildLaw" active="{{ request()->is('ChildLaw') }}" id="ChildLawBtn" class="px-6 py-4 text-sm font-medium text-[#333] bg-[#e6ffe6] hover:bg-[#d4f7d4] transition-all duration-200">
        For Children in Conflict with the Law
    </x-resbar>
    <x-resbar href="{{ route('blotter.narrative.index') }}" active="{{ request()->routeIs('blotter.narrative.*') }}" id="NarrativeBtn" class="px-6 py-4 text-sm font-medium text-[#333] bg-[#e6ffe6] hover:bg-[#d4f7d4] transition-all duration-200">
        Narrative
    </x-resbar>
    <x-resbar href="/IncidentReport" active="{{ request()->is('IncidentReport') }}" id="IncidentReporteBtn" class="px-6 py-4 text-sm font-medium text-[#333] bg-[#e6ffe6] hover:bg-[#d4f7d4] transition-all duration-200">
        Incident Report Receipt
    </x-resbar>
</nav>

                <div class="p-6 bg-gray-50">
                    @if (session('success'))
                        <div class="text-green-600 font-semibold mb-4">{{ session('success') }}</div>
                    @endif
                    @if ($errors->any())
                        <div class="text-red-500 mb-4">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form id="personForm" method="POST" action="{{ route('BloterRec.ResPersonData.store') }}">
                        @csrf

                        <div class="stepper">
                            <div class="step active" data-step="1">
                                <div class="step-number">1</div>
                                <div class="step-label">Personal Info</div>
                            </div>
                            <div class="step" data-step="2">
                                <div class="step-number">2</div>
                                <div class="step-label">Current Address</div>
                            </div>
                            <div class="step" data-step="3">
                                <div class="step-number">3</div>
                                <div class="step-label">Other Address</div>
                            </div>
                            <div class="step" data-step="4">
                                <div class="step-number">4</div>
                                <div class="step-label">Additional Info</div>
                            </div>
                        </div>

                        <div class="form-content">
                            <div class="step-content active" data-step="1">
                                <h2 class="text-xl font-semibold mb-4">Personal Information</h2>
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                    <div class="input-group">
                                        <label for="blotter_entry_number" class="form-label">Blotter Entry Number<span class="required">*</span></label>
                                        <input 
                                            type="text" 
                                            id="blotter_entry_number" 
                                            name="blotter_entry_number" 
                                            class="form-input @error('blotter_entry_number') border-red-500 @enderror" 
                                            value="{{ $blotterEntryNumber ?? 'N/A' }}" 
                                            readonly
                                        >
                                        @error('blotter_entry_number')
                                            <span class="text-red-500 text-sm">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="input-group">
                                        <label for="type_of_incident" class="form-label">Type of Incident<span class="required">*</span></label>
                                        <select 
                                            id="type_of_incident" 
                                            name="type_of_incident" 
                                            class="form-input @error('type_of_incident') border-red-500 @enderror" 
                                            required
                                        >
                                            <option value="">Select incident type</option>
                                            <option value="Property damage" {{ old('type_of_incident', $typeOfIncident) == 'Property damage' ? 'selected' : '' }}>Property damage</option>
                                            <option value="Near misses" {{ old('type_of_incident', $typeOfIncident) == 'Near misses' ? 'selected' : '' }}>Near misses</option>
                                            <option value="Environmental incidents" {{ old('type_of_incident', $typeOfIncident) == 'Environmental incidents' ? 'selected' : '' }}>Environmental incidents</option>
                                            <option value="Fatalities" {{ old('type_of_incident', $typeOfIncident) == 'Fatalities' ? 'selected' : '' }}>Fatalities</option>
                                            <option value="Fire incident" {{ old('type_of_incident', $typeOfIncident) == 'Fire incident' ? 'selected' : '' }}>Fire incident</option>
                                            <option value="Minor incidents" {{ old('type_of_incident', $typeOfIncident) == 'Minor incidents' ? 'selected' : '' }}>Minor incidents</option>
                                            <option value="Minor injuries" {{ old('type_of_incident', $typeOfIncident) == 'Minor injuries' ? 'selected' : '' }}>Minor injuries</option>
                                            <option value="Accident report" {{ old('type_of_incident', $typeOfIncident) == 'Accident report' ? 'selected' : '' }}>Accident report</option>
                                            <option value="Security incident" {{ old('type_of_incident', $typeOfIncident) == 'Security incident' ? 'selected' : '' }}>Security incident</option>
                                            <option value="Hazard" {{ old('type_of_incident', $typeOfIncident) == 'Hazard' ? 'selected' : '' }}>Hazard</option>
                                            <option value="Human incidents" {{ old('type_of_incident', $typeOfIncident) == 'Human incidents' ? 'selected' : '' }}>Human incidents</option>
                                            <option value="Positive observations" {{ old('type_of_incident', $typeOfIncident) == 'Positive observations' ? 'selected' : '' }}>Positive observations</option>
                                            <option value="Unsafe acts" {{ old('type_of_incident', $typeOfIncident) == 'Unsafe acts' ? 'selected' : '' }}>Unsafe acts</option>
                                            <option value="Vehicle injuries" {{ old('type_of_incident', $typeOfIncident) == 'Vehicle injuries' ? 'selected' : '' }}>Vehicle injuries</option>
                                            <option value="Worker injury incident" {{ old('type_of_incident', $typeOfIncident) == 'Worker injury incident' ? 'selected' : '' }}>Worker injury incident</option>
                                            <option value="Workplace accidents" {{ old('type_of_incident', $typeOfIncident) == 'Workplace accidents' ? 'selected' : '' }}>Workplace accidents</option>
                                            <option value="Workplace violence" {{ old('type_of_incident', $typeOfIncident) == 'Workplace violence' ? 'selected' : '' }}>Workplace violence</option>
                                        </select>
                                        @error('type_of_incident')
                                            <span class="text-red-500 text-sm">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="input-group">
                                        <label for="first_name" class="form-label">First Name<span class="required">*</span></label>
                                        <input type="text" id="first_name" name="first_name" class="form-input @error('first_name') border-red-500 @enderror" value="{{ old('first_name') }}" required>
                                        @error('first_name')
                                            <span class="text-red-500 text-sm">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="input-group">
                                        <label for="last_name" class="form-label">Last Name<span class="required">*</span></label>
                                        <input type="text" id="last_name" name="last_name" class="form-input @error('last_name') border-red-500 @enderror" value="{{ old('last_name') }}" required>
                                        @error('last_name')
                                            <span class="text-red-500 text-sm">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="input-group">
                                        <label for="middle_name" class="form-label">Middle Name<span class="required">*</span></label>
                                        <input type="text" id="middle_name" name="middle_name" class="form-input @error('middle_name') border-red-500 @enderror" value="{{ old('middle_name') }}" required>
                                        @error('middle_name')
                                            <span class="text-red-500 text-sm">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="input-group">
                                        <label for="nickname" class="form-label">Nickname<span class="required">*</span></label>
                                        <input type="text" id="nickname" name="nickname" class="form-input @error('nickname') border-red-500 @enderror" value="{{ old('nickname') }}" required>
                                        @error('nickname')
                                            <span class="text-red-500 text-sm">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="input-group">
                                        <label for="gender" class="form-label">Gender<span class="required">*</span></label>
                                        <select id="gender" name="gender" class="form-input @error('gender') border-red-500 @enderror" required>
                                            <option value="">Select gender</option>
                                            <option value="male" {{ old('gender') == 'male' ? 'selected' : '' }}>Male</option>
                                            <option value="female" {{ old('gender') == 'female' ? 'selected' : '' }}>Female</option>
                                            <option value="LGBTQA+" {{ old('gender') == 'LGBTQA+' ? 'selected' : '' }}>LGBTQA+</option>
                                        </select>
                                        @error('gender')
                                            <span class="text-red-500 text-sm">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="input-group">
    <label for="citizenship" class="form-label">Citizenship<span class="required">*</span></label>
    <select id="citizenship" name="citizenship" class="form-input @error('citizenship') border-red-500 @enderror" required>
        <option value="">Select your citizenship</option>
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
        <option value="Congo (Congo-Brazzaville)" {{ old('citizenship') == 'Congo (Congo-Brazzaville)' ? 'selected' : '' }}>Congo (Congo-Brazzaville)</option>
        <option value="Costa Rica" {{ old('citizenship') == 'Costa Rica' ? 'selected' : '' }}>Costa Rica</option>
        <option value="Croatia" {{ old('citizenship') == 'Croatia' ? 'selected' : '' }}>Croatia</option>
        <option value="Cuba" {{ old('citizenship') == 'Cuba' ? 'selected' : '' }}>Cuba</option>
        <option value="Cyprus" {{ old('citizenship') == 'Cyprus' ? 'selected' : '' }}>Cyprus</option>
        <option value="Czech Republic" {{ old('citizenship') == 'Czech Republic' ? 'selected' : '' }}>Czech Republic</option>
        <option value="Democratic Republic of the Congo" {{ old('citizenship') == 'Democratic Republic of the Congo' ? 'selected' : '' }}>Democratic Republic of the Congo</option>
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
        <option value="Holy See" {{ old('citizenship') == 'Holy See' ? 'selected' : '' }}>Holy See</option>
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
        <option value="North Korea" {{ old('citizenship') == 'North Korea' ? 'selected' : '' }}>North Korea</option>
        <option value="North Macedonia" {{ old('citizenship') == 'North Macedonia' ? 'selected' : '' }}>North Macedonia</option>
        <option value="Norway" {{ old('citizenship') == 'Norway' ? 'selected' : '' }}>Norway</option>
        <option value="Oman" {{ old('citizenship') == 'Oman' ? 'selected' : '' }}>Oman</option>
        <option value="Pakistan" {{ old('citizenship') == 'Pakistan' ? 'selected' : '' }}>Pakistan</option>
        <option value="Palau" {{ old('citizenship') == 'Palau' ? 'selected' : '' }}>Palau</option>
        <option value="Palestine" {{ old('citizenship') == 'Palestine' ? 'selected' : '' }}>Palestine</option>
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
        <option value="South Korea" {{ old('citizenship') == 'South Korea' ? 'selected' : '' }}>South Korea</option>
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
        <option value="Venezuela" {{ old('citizenship') == 'Venezuela' ? 'selected' : '' }}>Venezuela</option>
        <option value="Vietnam" {{ old('citizenship') == 'Vietnam' ? 'selected' : '' }}>Vietnam</option>
        <option value="Yemen" {{ old('citizenship') == 'Yemen' ? 'selected' : '' }}>Yemen</option>
        <option value="Zambia" {{ old('citizenship') == 'Zambia' ? 'selected' : '' }}>Zambia</option>
        <option value="Zimbabwe" {{ old('citizenship') == 'Zimbabwe' ? 'selected' : '' }}>Zimbabwe</option>
    </select>
    @error('citizenship')
        <span class="text-red-500 text-sm">{{ $message }}</span>
    @enderror
</div>
                                    <div class="input-group">
                                        <label for="birthdate" class="form-label">Birthdate<span class="required">*</span></label>
                                        <input type="date" id="birthdate" name="birthdate" class="form-input @error('birthdate') border-red-500 @enderror" value="{{ old('birthdate') }}" required>
                                        @error('birthdate')
                                            <span class="text-red-500 text-sm">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="input-group">
                                        <label for="age" class="form-label">Age<span class="required">*</span></label>
                                        <input type="number" id="age" name="age" class="form-input @error('age') border-red-500 @enderror" value="{{ old('age') }}" required>
                                        @error('age')
                                            <span class="text-red-500 text-sm">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="input-group">
                                        <label for="place_of_birth" class="form-label">Place of Birth<span class="required">*</span></label>
                                        <input type="text" id="place_of_birth" name="place_of_birth" class="form-input @error('place_of_birth') border-red-500 @enderror" value="{{ old('place_of_birth') }}" required>
                                        @error('place_of_birth')
                                            <span class="text-red-500 text-sm">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="input-group">
                                        <label for="telephone" class="form-label">Telephone<span class="required">*</span></label>
                                        <input type="tel" id="telephone" name="telephone" class="form-input @error('telephone') border-red-500 @enderror" value="{{ old('telephone') }}" required>
                                        @error('telephone')
                                            <span class="text-red-500 text-sm">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="step-content" data-step="2">
                                <h2 class="text-xl font-semibold mb-4">Current Address</h2>
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                    <div class="input-group">
                                        <label for="house_no" class="form-label">House No.<span class="required">*</span></label>
                                        <input type="text" id="house_no" name="house_no" class="form-input @error('house_no') border-red-500 @enderror" value="{{ old('house_no') }}" required>
                                        @error('house_no')
                                            <span class="text-red-500 text-sm">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="input-group">
                                        <label for="village" class="form-label">Village/Sitio<span class="required">*</span></label>
                                        <input type="text" id="village" name="village" class="form-input @error('village') border-red-500 @enderror" value="{{ old('village') }}" required>
                                        @error('village')
                                            <span class="text-red-500 text-sm">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="input-group">
                                        <label for="barangay" class="form-label">Barangay<span class="required">*</span></label>
                                        <input type="text" id="barangay" name="barangay" class="form-input @error('barangay') border-red-500 @enderror" value="{{ old('barangay', $defaultBarangay) }}" required>
                                        @error('barangay')
                                            <span class="text-red-500 text-sm">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="input-group">
                                        <label for="town_city" class="form-label">Town/City<span class="required">*</span></label>
                                        <input type="text" id="town_city" name="town_city" class="form-input @error('town_city') border-red-500 @enderror" value="{{ old('town_city', $defaultTownCity) }}" required>
                                        @error('town_city')
                                            <span class="text-red-500 text-sm">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="input-group">
                                        <label for="province" class="form-label">Province<span class="required">*</span></label>
                                        <input type="text" id="province" name="province" class="form-input @error('province') border-red-500 @enderror" value="{{ old('province', $defaultProvince) }}" required>
                                        @error('province')
                                            <span class="text-red-500 text-sm">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="step-content" data-step="3">
                                <h2 class="text-xl font-semibold mb-4">Other Address (Optional)</h2>
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                    <div class="input-group">
                                        <label for="other_house_no" class="form-label">House No.</label>
                                        <input type="text" id="other_house_no" name="other_house_no" class="form-input @error('other_house_no') border-red-500 @enderror" value="{{ old('other_house_no') }}">
                                        @error('other_house_no')
                                            <span class="text-red-500 text-sm">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="input-group">
                                        <label for="other_village" class="form-label">Village/Sitio</label>
                                        <input type="text" id="other_village" name="other_village" class="form-input @error('other_village') border-red-500 @enderror" value="{{ old('other_village') }}">
                                        @error('other_village')
                                            <span class="text-red-500 text-sm">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="input-group">
                                        <label for="other_barangay" class="form-label">Barangay</label>
                                        <input type="text" id="other_barangay" name="other_barangay" class="form-input @error('other_barangay') border-red-500 @enderror" value="{{ old('other_barangay') }}">
                                        @error('other_barangay')
                                            <span class="text-red-500 text-sm">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="input-group">
                                        <label for="other_town_city" class="form-label">Town/City</label>
                                        <input type="text" id="other_town_city" name="other_town_city" class="form-input @error('other_town_city') border-red-500 @enderror" value="{{ old('other_town_city') }}">
                                        @error('other_town_city')
                                            <span class="text-red-500 text-sm">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="input-group">
                                        <label for="other_province" class="form-label">Province</label>
                                        <input type="text" id="other_province" name="other_province" class="form-input @error('other_province') border-red-500 @enderror" value="{{ old('other_province') }}">
                                        @error('other_province')
                                            <span class="text-red-500 text-sm">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="step-content" data-step="4">
                                <h2 class="text-xl font-semibold mb-4">Additional Information</h2>
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                    <div class="input-group">
                                        <label for="date_reported" class="form-label">Date & Time Reported<span class="required">*</span></label>
                                        <input type="datetime-local" id="date_reported" name="date_reported" class="form-input @error('date_reported') border-red-500 @enderror" value="{{ old('date_reported') }}" required>
                                        @error('date_reported')
                                            <span class="text-red-500 text-sm">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="input-group">
                                        <label for="date_incident" class="form-label">Date & Time of Incident<span class="required">*</span></label>
                                        <input type="datetime-local" id="date_incident" name="date_incident" class="form-input @error('date_incident') border-red-500 @enderror" value="{{ old('date_incident') }}" required>
                                        @error('date_incident')
                                            <span class="text-red-500 text-sm">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="input-group">
                                        <label for="email_address" class="form-label">Email Address<span class="required">*</span></label>
                                        <input type="email" id="email_address" name="email_address" class="form-input @error('email_address') border-red-500 @enderror" value="{{ old('email_address') }}" required>
                                        @error('email_address')
                                            <span class="text-red-500 text-sm">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="input-group">
                                        <label for="occupation" class="form-label">Occupation<span class="required">*</span></label>
                                        <input type="text" id="occupation" name="occupation" class="form-input @error('occupation') border-red-500 @enderror" value="{{ old('occupation') }}" required>
                                        @error('occupation')
                                            <span class="text-red-500 text-sm">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="input-group">
                                        <label for="education" class="form-label">Highest Educational Attainment<span class="required">*</span></label>
                                        <select id="education" name="education" class="form-input @error('education') border-red-500 @enderror" required>
                                            <option value="">Select education level</option>
                                            <option value="elementary" {{ old('education') == 'elementary' ? 'selected' : '' }}>Elementary</option>
                                            <option value="high-school" {{ old('education') == 'high-school' ? 'selected' : '' }}>High School</option>
                                            <option value="vocational" {{ old('education') == 'vocational' ? 'selected' : '' }}>Vocational</option>
                                            <option value="college" {{ old('education') == 'college' ? 'selected' : '' }}>College</option>
                                            <option value="masters" {{ old('education') == 'masters' ? 'selected' : '' }}>Master's Degree</option>
                                            <option value="doctorate" {{ old('education') == 'doctorate' ? 'selected' : '' }}>Doctorate</option>
                                        </select>
                                        @error('education')
                                            <span class="text-red-500 text-sm">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="progress-bar-container">
                                <div class="progress-bar" style="width: 25%;"></div>
                            </div>

                            <div class="navigation-buttons">
                                <button type="button" class="text-[#333] bg-[#e6ffe6] hover:bg-[#d4f7d4] btn btn-secondary prev-step" style="display: none;">Previous</button>
                                <button type="button" class="text-[#333] bg-[#e6ffe6] hover:bg-[#d4f7d4] btn btn-primary next-step">Next</button>
                                <button type="submit" class="text-[#333] bg-[#e6ffe6] hover:bg-[#d4f7d4] btn btn-success submit-form" style="display: none;">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
    document.addEventListener('DOMContentLoaded', function() {
        let currentStep = 1;
        const totalSteps = 4;
        
        const form = document.getElementById('personForm');
        const nextBtn = document.querySelector('.next-step');
        const prevBtn = document.querySelector('.prev-step');
        const submitBtn = document.querySelector('.submit-form');
        const progressBar = document.querySelector('.progress-bar');
        
        // Set default date and time for date_reported
        const dateReportedInput = document.getElementById('date_reported');
        if (dateReportedInput) {
            const now = new Date();
            // Format date to YYYY-MM-DDThh:mm (datetime-local input format)
            const year = now.getFullYear();
            const month = String(now.getMonth() + 1).padStart(2, '0');
            const day = String(now.getDate()).padStart(2, '0');
            const hours = String(now.getHours()).padStart(2, '0');
            const minutes = String(now.getMinutes()).padStart(2, '0');
            
            const formattedDateTime = `${year}-${month}-${day}T${hours}:${minutes}`;
            dateReportedInput.value = formattedDateTime;
        }
        
        function updateProgressBar() {
            const progressPercentage = (currentStep / totalSteps) * 100;
            progressBar.style.width = `${progressPercentage}%`;
        }
        
        function showStep(stepNumber) {
            document.querySelectorAll('.step-content').forEach(step => {
                step.classList.remove('active');
            });
            
            document.querySelector(`.step-content[data-step="${stepNumber}"]`).classList.add('active');
            
            document.querySelectorAll('.step').forEach(step => {
                const stepNum = parseInt(step.getAttribute('data-step'));
                step.classList.remove('active', 'completed');
                
                if (stepNum === currentStep) {
                    step.classList.add('active');
                } else if (stepNum < currentStep) {
                    step.classList.add('completed');
                }
            });
            
            if (currentStep === 1) {
                prevBtn.style.display = 'none';
            } else {
                prevBtn.style.display = 'block';
            }
            
            if (currentStep === totalSteps) {
                nextBtn.style.display = 'none';
                submitBtn.style.display = 'block';
            } else {
                nextBtn.style.display = 'block';
                submitBtn.style.display = 'none';
            }
            
            updateProgressBar();
        }
        
        function validateStep(stepNumber) {
            const currentStepElement = document.querySelector(`.step-content[data-step="${stepNumber}"]`);
            const requiredFields = currentStepElement.querySelectorAll('input[required], select[required]');
            
            let isValid = true;
            
            requiredFields.forEach(field => {
                if (!field.value.trim()) {
                    isValid = false;
                    field.classList.add('border-red-500');
                } else {
                    field.classList.remove('border-red-500');
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
        
        form.addEventListener('submit', function(e) {
            if (!validateStep(currentStep)) {
                e.preventDefault();
                alert('Please fill in all required fields before submitting.');
            }
        });
        
        showStep(currentStep);
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
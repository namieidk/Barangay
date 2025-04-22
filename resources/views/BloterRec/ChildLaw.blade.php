<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>Child Law - BRGY INCIO, DAVAO CITY SYSTEM</title>
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
            color: #333;
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
            background-color: #e6ffe6;
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

                    <!-- Content Area -->
                    <div class="form-content">
                        <!-- Search Section -->
                        <div class="search-section">
                            <form method="POST" action="{{ route('blotter.childlaw.search') }}">
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
                                    <div class="step-label">Guardian Info</div>
                                </div>
                                <div class="step" data-step="2">
                                    <div class="step-circle">2</div>
                                    <div class="step-label">Diversion Mechanism</div>
                                </div>
                                <div class="step" data-step="3">
                                    <div class="step-circle">3</div>
                                    <div class="step-label">Distinguishing Features</div>
                                </div>
                            </div>
                        </div>

                        <!-- Form -->
                        <form id="personDataForm" method="POST" action="{{ route('blotter.childlaw.store') }}">
                            @csrf
                            <input type="hidden" name="res_person_data_id" value="{{ $blotterEntryNumber ?? '' }}">
                            <input type="hidden" name="type_of_incident" value="{{ $typeOfIncident ?? '' }}">

                            <!-- Step 1: Guardian Information -->
                            <div class="step-content active" data-step="1">
                                <h2 class="step-title">Guardian Information</h2>
                                <div class="form-row">
                                    <div class="form-group">
                                        <label for="guardianFirstName" class="form-label">Guardian First Name<span>*</span></label>
                                        <input type="text" id="guardianFirstName" name="guardian_first_name" class="form-control" value="{{ old('guardian_first_name') }}" required>
                                        @error('guardian_first_name')
                                            <div class="text-red-600 text-sm mt-1">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="guardianLastName" class="form-label">Guardian Last Name<span>*</span></label>
                                        <input type="text" id="guardianLastName" name="guardian_last_name" class="form-control" value="{{ old('guardian_last_name') }}" required>
                                        @error('guardian_last_name')
                                            <div class="text-red-600 text-sm mt-1">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="guardianAddress" class="form-label">Guardian Address<span>*</span></label>
                                        <input type="text" id="guardianAddress" name="guardian_address" class="form-control" value="{{ old('guardian_address') }}" required>
                                        @error('guardian_address')
                                            <div class="text-red-600 text-sm mt-1">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="guardianTelephone" class="form-label">Telephone<span>*</span></label>
                                        <input type="tel" id="guardianTelephone" name="guardian_telephone" class="form-control" value="{{ old('guardian_telephone') }}" required>
                                        @error('guardian_telephone')
                                            <div class="text-red-600 text-sm mt-1">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="guardianPhone" class="form-label">Phone Number<span>*</span></label>
                                        <input type="tel" id="guardianPhone" name="guardian_phone" class="form-control" value="{{ old('guardian_phone') }}" required>
                                        @error('guardian_phone')
                                            <div class="text-red-600 text-sm mt-1">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="navigation-buttons">
                                    <button type="button" class="btn btn-secondary prev-btn" style="display: none;">Previous</button>
                                    <button type="button" class="btn btn-primary next-btn">Next</button>
                                </div>
                            </div>

                            <!-- Step 2: Diversion Mechanism -->
                            <div class="step-content" data-step="2">
                                <h2 class="step-title">Diversion Mechanism</h2>
                                <div class="form-group">
                                    <label for="diversionMechanism" class="form-label">Diversion Mechanism<span>*</span></label>
                                    <textarea id="diversionMechanism" name="diversion_mechanism" class="form-control" rows="4" required>{{ old('diversion_mechanism') }}</textarea>
                                    @error('diversion_mechanism')
                                        <div class="text-red-600 text-sm mt-1">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="navigation-buttons">
                                    <button type="button" class="btn btn-secondary prev-btn">Previous</button>
                                    <button type="button" class="btn btn-primary next-btn">Next</button>
                                </div>
                            </div>

                            <!-- Step 3: Distinguishing Features -->
                            <div class="step-content" data-step="3">
                                <h2 class="step-title">Distinguishing Features</h2>
                                <div class="form-group">
                                    <label for="distinguishingFeatures" class="form-label">Other Distinguishing Features<span>*</span></label>
                                    <p class="help-text">
                                        Describe in detail the clothes, vehicle, sunglasses, weapon(s), scars, and any other notable data or activities observed by the reporting person and/or witness(es).
                                    </p>
                                    <textarea id="distinguishingFeatures" name="distinguishing_features" class="form-control" rows="5" required>{{ old('distinguishing_features') }}</textarea>
                                    @error('distinguishing_features')
                                        <div class="text-red-600 text-sm mt-1">{{ $message }}</div>
                                    @enderror
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
            const form = document.getElementById('personDataForm');
            const nextBtn = document.querySelectorAll('.next-btn');
            const prevBtn = document.querySelectorAll('.prev-btn');
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

                prevBtn.forEach(btn => btn.style.display = stepNumber === 1 ? 'none' : 'block');
                nextBtn.forEach(btn => btn.style.display = stepNumber === totalSteps ? 'none' : 'block');
                submitBtn.style.display = stepNumber === totalSteps ? 'block' : 'none';

                updateProgressBar();
            }

            function validateStep(stepNumber) {
                const currentStepElement = document.querySelector(`.step-content[data-step="${stepNumber}"]`);
                const requiredFields = currentStepElement.querySelectorAll('input[required], textarea[required], select[required]');
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
        });
    </script>
</body>
</html>
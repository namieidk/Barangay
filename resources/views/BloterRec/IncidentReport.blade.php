<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>Incident Report Receipt - BRGY INCIO, DAVAO CITY SYSTEM</title>
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

        /* Search Section */
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
        .form-control[readonly] {
            background-color: #f1f5f9;
            cursor: not-allowed;
        }
        .form-text {
            display: block;
            margin-top: 0.25rem;
            font-size: 0.875rem;
            color: #6b7280;
        }

        /* Signature Section */
        .signature-section {
            display: flex;
            align-items: flex-start;
            margin-top: 2rem;
            padding: 1.5rem;
            background-color: #f0f7ff;
            border-radius: 0.5rem;
        }
        .signature-container {
            display: grid;
            grid-template-columns: 150px 1fr;
            gap: 2rem;
            align-items: flex-start;
        }
        .signature-image {
            width: 150px;
            height: 150px;
            border: 2px dashed #3b82f6;
            border-radius: 0.5rem;
            overflow: hidden;
            background-color: white;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .signature-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
        .signature-details {
            flex: 1;
        }
        .signature-name {
            font-size: 1.25rem;
            font-weight: 700;
            color: #2d6a4f;
            padding-bottom: 0.5rem;
            border-bottom: 2px solid #2d6a4f;
            margin-bottom: 0.5rem;
        }
        .signature-position {
            font-size: 1rem;
            color: #374151;
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
            .signature-section {
                flex-direction: column;
            }
            .signature-image {
                margin-bottom: 1.5rem;
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
    <x-sidebar></x-sidebar>

    <div class="flex-1 ml-64">
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

                    <!-- Form Content -->
                    <div class="form-content">
                        <!-- Search Section -->
                        <div class="search-section">
                            <form method="POST" action="{{ route('blotter.incident.search') }}">
                                @csrf
                                <div class="form-row">
                                    <div class="form-group">
                                        <label for="search_blotter_entry_number" class="form-label">Blotter Entry Number<span>*</span></label>
                                        <input type="text" id="search_blotter_entry_number" name="blotter_entry_number" class="form-control" value="{{ old('blotter_entry_number') }}" required>
                                        @error('blotter_entry_number')
                                            <div class="text-red-600 text-sm mt-1">{{ $message }}</div>
                                        @enderror
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

                        <!-- Conditional Form Display -->
                        @if ($incidentReport || $reportingPerson)
                            <!-- Stepper -->
                            <div class="stepper-container">
                                <div class="stepper">
                                    <div class="step active" data-step="1">
                                        <div class="step-circle">1</div>
                                        <div class="step-label">Incident Information</div>
                                    </div>
                                    <div class="step" data-step="2">
                                        <div class="step-circle">2</div>
                                        <div class="step-label">Reporting Person</div>
                                    </div>
                                    <div class="step" data-step="3">
                                        <div class="step-circle">3</div>
                                        <div class="step-label">Certification</div>
                                    </div>
                                </div>
                            </div>

                            <!-- Incident Report Form -->
                            <form id="incidentReportForm" method="POST" action="{{ route('blotter.incident.store') }}" enctype="multipart/form-data">
                                @csrf

                                <!-- Step 1: Incident Information -->
                                <div class="step-content active" data-step="1">
                                    <h2 class="step-title">Incident Information</h2>
                                    <div class="form-row">
                                        <div class="form-group">
                                            <label for="blotter_entry_number" class="form-label">Blotter Entry Number<span>*</span></label>
                                            <input type="text" id="blotter_entry_number" name="blotter_entry_number" class="form-control" value="{{ $incidentReport->blotter_entry_number ?? $reportingPerson->id ?? old('blotter_entry_number') }}" required readonly>
                                            @error('blotter_entry_number')
                                                <div class="text-red-600 text-sm mt-1">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="incident_type" class="form-label">Type of Incident<span>*</span></label>
                                            <input type="text" id="incident_type" name="incident_type" class="form-control" value="{{ $incidentReport->incident_type ?? ($reportingPerson->type_of_incident ?? old('incident_type')) }}" required>
                                            @error('incident_type')
                                                <div class="text-red-600 text-sm mt-1">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group">
                                            <label for="incident_date_time" class="form-label">Date & Time of Incident<span>*</span></label>
                                            <input type="datetime-local" id="incident_date_time" name="incident_date_time" class="form-control" value="{{ isset($incidentReport) && $incidentReport->incident_date_time ? $incidentReport->incident_date_time->format('Y-m-d\TH:i') : (isset($reportingPerson) && $reportingPerson->date_incident ? $reportingPerson->date_incident->format('Y-m-d\TH:i') : old('incident_date_time')) }}" required>
                                            @error('incident_date_time')
                                                <div class="text-red-600 text-sm mt-1">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="incident_place" class="form-label">Place of Incident<span>*</span></label>
                                            <input type="text" id="incident_place" name="incident_place" class="form-control" value="{{ $incidentReport->incident_place ?? old('incident_place') }}" required>
                                            @error('incident_place')
                                                <div class="text-red-600 text-sm mt-1">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="navigation-buttons">
                                        <button type="button" class="btn btn-secondary prev-btn" style="display: none;">Previous</button>
                                        <button type="button" class="btn btn-primary next-btn">Next</button>
                                    </div>
                                </div>

                                <!-- Step 2: Reporting Person Details -->
                                <div class="step-content" data-step="2">
                                    <h2 class="step-title">Reporting Person Details</h2>
                                    <div class="form-row">
                                        <div class="form-group">
                                            <label for="reporting_person_name" class="form-label">Name of Reporting Person<span>*</span></label>
                                            <input type="text" id="reporting_person_name" name="reporting_person_name" class="form-control" value="{{ $incidentReport->reporting_person_name ?? (isset($reportingPerson) ? ($reportingPerson->first_name . ' ' . $reportingPerson->last_name) : old('reporting_person_name')) }}" required>
                                            @error('reporting_person_name')
                                                <div class="text-red-600 text-sm mt-1">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="reporting_person_address" class="form-label">Address of Reporting Person<span>*</span></label>
                                            <input type="text" id="reporting_person_address" name="reporting_person_address" class="form-control" value="{{ $incidentReport->reporting_person_address ?? (isset($reportingPerson) ? ($reportingPerson->house_no . ', ' . $reportingPerson->village . ', ' . $reportingPerson->barangay . ', ' . $reportingPerson->town_city . ', ' . $reportingPerson->province) : old('reporting_person_address')) }}" required>
                                            @error('reporting_person_address')
                                                <div class="text-red-600 text-sm mt-1">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group">
                                            <label for="report_date_time" class="form-label">Date & Time of Report<span>*</span></label>
                                            <input type="datetime-local" id="report_date_time" name="report_date_time" class="form-control" value="{{ isset($incidentReport) && $incidentReport->report_date_time ? $incidentReport->report_date_time->format('Y-m-d\TH:i') : (isset($reportingPerson) && $reportingPerson->date_reported ? $reportingPerson->date_reported->format('Y-m-d\TH:i') : old('report_date_time')) }}" required>
                                            @error('report_date_time')
                                                <div class="text-red-600 text-sm mt-1">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="navigation-buttons">
                                        <button type="button" class="btn btn-secondary prev-btn">Previous</button>
                                        <button type="button" class="btn btn-primary next-btn">Next</button>
                                    </div>
                                </div>

                                <!-- Step 3: Certification -->
                                <div class="step-content" data-step="3">
                                    <h2 class="step-title">Certification</h2>
                                    <div class="form-group">
                                        <label for="certification_text" class="form-label">Certification Statement<span>*</span></label>
                                        <p class="form-text">This is to certify that the reporting person reported an incident to be recorded in the barangay blotter which involves:</p>
                                        <textarea id="certification_text" name="certification_text" rows="4" class="form-control" placeholder="Enter certification details here..." required>{{ $incidentReport->certification_text ?? old('certification_text') }}</textarea>
                                        @error('certification_text')
                                            <div class="text-red-600 text-sm mt-1">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="signature-section">
                                        <div class="signature-image">
                                            <img id="preview-image" src="{{ $incidentReport && $incidentReport->signature_path ? Storage::url($incidentReport->signature_path) : asset('placeholder.svg') }}" alt="Signature">
                                        </div>
                                        <div class="signature-details">
                                            <div class="signature-name" id="person-name-display">{{ $incidentReport->signatory_name ?? '[Name]' }}</div>
                                            <div class="signature-position" id="person-position-display">{{ $incidentReport->signatory_position ?? '[Position/Name/Signature]' }}</div>
                                            <div class="form-group" style="margin-top: 1rem;">
                                                <label for="signature_upload" class="form-label">Upload Signature</label>
                                                <input type="file" id="signature_upload" name="signature_upload" class="form-control" accept="image/*">
                                                @error('signature_upload')
                                                    <div class="text-red-600 text-sm mt-1">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="signatory_name" class="form-label">Signatory Name</label>
                                                <input type="text" id="signatory_name" name="signatory_name" class="form-control" value="{{ $incidentReport->signatory_name ?? old('signatory_name') }}">
                                                @error('signatory_name')
                                                    <div class="text-red-600 text-sm mt-1">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="signatory_position" class="form-label">Signatory Position</label>
                                                <input type="text" id="signatory_position" name="signatory_position" class="form-control" value="{{ $incidentReport->signatory_position ?? old('signatory_position') }}">
                                                @error('signatory_position')
                                                    <div class="text-red-600 text-sm mt-1">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="progress-bar-container">
                                        <div class="progress-bar" id="progress-bar"></div>
                                    </div>
                                    <div class="navigation-buttons">
                                        <button type="button" class="btn btn-secondary prev-btn">Previous</button>
                                        <button type="submit" class="btn btn-primary submit-btn">Save Report</button>
                                    </div>
                                </div>
                            </form>
                        @else
                            <p class="text-gray-600 text-center">Please search for a blotter entry number to proceed with creating or editing an incident report.</p>
                        @endif
                    </div>
                </div>
            </div>
        </main>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const form = document.getElementById('incidentReportForm');
            if (!form) return; // Exit if form is not present

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
                const requiredFields = currentStepElement.querySelectorAll('input[required], textarea[required]');
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

            function previewImage(input) {
                const preview = document.getElementById('preview-image');
                if (input.files && input.files[0]) {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        preview.src = e.target.result;
                    }
                    reader.readAsDataURL(input.files[0]);
                }
            }

            function updateName(input) {
                document.getElementById('person-name-display').textContent = input.value || '[Name]';
            }

            function updatePosition(input) {
                document.getElementById('person-position-display').textContent = input.value || '[Position/Name/Signature]';
            }

            document.getElementById('signature_upload').addEventListener('change', function() {
                previewImage(this);
            });

            document.getElementById('signatory_name').addEventListener('input', function() {
                updateName(this);
            });

            document.getElementById('signatory_position').addEventListener('input', function() {
                updatePosition(this);
            });

            updateProgressBar();
        });
    </script>
</body>
</html>
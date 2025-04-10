<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>Person Data</title>
    <style>
        body {
            font-family: 'Inter', 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f4f6f9;
            margin: 0;
            padding: 0;
            line-height: 1.6;
        }

        .form-container {
            max-width: 1200px;
            margin: 40px auto;
            background-color: #ffffff;
            border-radius: 16px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.05);
            overflow: hidden;
        }

        .form-header {
            background-color: #2d6a4f;
            color: #ffffff;
            padding: 24px 32px;
            text-align: center;
            border-bottom: 4px solid #1f4b38;
        }

        .form-header h1 {
            font-size: 28px;
            font-weight: 700;
            margin: 0;
        }

        .form-header p {
            font-size: 16px;
            opacity: 0.9;
            margin-top: 8px;
        }

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

        @media (max-width: 768px) {
            .form-container {
                margin: 20px;
            }

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
        }
    </style>
</head>
<body>
    <div class="form-container">
        <div class="form-header">
            <h1>Person Data Form</h1>
            <p>Please provide all required information to proceed</p>
        </div>

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

        <div class="form-content">
            <form id="personForm">
                <!-- Step 1: Personal Information -->
                <div class="step-content active" data-step="1">
                    <h2 class="step-title">Personal Information</h2>
                    <div class="form-row">
                        <div class="form-group">
                            <label for="surname" class="form-label">Surname<span>*</span></label>
                            <input type="text" id="surname" name="surname" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="last-name" class="form-label">Last Name<span>*</span></label>
                            <input type="text" id="last-name" name="last-name" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="middle-name" class="form-label">Middle Name<span>*</span></label>
                            <input type="text" id="middle-name" name="middle-name" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group">
                            <label for="nickname" class="form-label">Nickname<span>*</span></label>
                            <input type="text" id="nickname" name="nickname" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="gender" class="form-label">Gender<span>*</span></label>
                            <select id="gender" name="gender" class="form-control" required>
                                <option value="">Select gender</option>
                                <option value="male">Male</option>
                                <option value="female">Female</option>
                                <option value="other">Other</option>
                            </select>
                        </div>
                    </div>
                </div>

                <!-- Step 2: Contact Information -->
                <div class="step-content" data-step="2">
                    <h2 class="step-title">Contact Information</h2>
                    <div class="form-row">
                        <div class="form-group">
                            <label for="citizenship" class="form-label">Citizenship<span>*</span></label>
                            <input type="text" id="citizenship" name="citizenship" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="birthdate" class="form-label">Birthdate<span>*</span></label>
                            <input type="date" id="birthdate" name="birthdate" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="age" class="form-label">Age<span>*</span></label>
                            <input type="number" id="age" name="age" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group">
                            <label for="place-of-birth" class="form-label">Place of Birth<span>*</span></label>
                            <input type="text" id="place-of-birth" name="place-of-birth" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="telephone" class="form-label">Telephone<span>*</span></label>
                            <input type="tel" id="telephone" name="telephone" class="form-control" required>
                        </div>
                    </div>
                </div>

                <!-- Step 3: Current Address -->
                <div class="step-content" data-step="3">
                    <h2 class="step-title">Current Address</h2>
                    <div class="form-row">
                        <div class="form-group">
                            <label for="house-no" class="form-label">Address (House No.)<span>*</span></label>
                            <input type="text" id="house-no" name="house-no" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="village" class="form-label">Village/Sitio<span>*</span></label>
                            <input type="text" id="village" name="village" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="barangay" class="form-label">Barangay<span>*</span></label>
                            <input type="text" id="barangay" name="barangay" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group">
                            <label for="town-city" class="form-label">Town/City<span>*</span></label>
                            <input type="text" id="town-city" name="town-city" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="province" class="form-label">Province<span>*</span></label>
                            <input type="text" id="province" name="province" class="form-control" required>
                        </div>
                    </div>
                </div>

                <!-- Step 4: Other Address -->
                <div class="step-content" data-step="4">
                    <h2 class="step-title">Other Address</h2>
                    <div class="form-row">
                        <div class="form-group">
                            <label for="other-address" class="form-label">Other Address<span>*</span></label>
                            <input type="text" id="other-address" name="other-address" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="other-village" class="form-label">Village/Sitio<span>*</span></label>
                            <input type="text" id="other-village" name="other-village" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="other-barangay" class="form-label">Barangay<span>*</span></label>
                            <input type="text" id="other-barangay" name="other-barangay" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group">
                            <label for="other-town-city" class="form-label">Town/City<span>*</span></label>
                            <input type="text" id="other-town-city" name="other-town-city" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="other-province" class="form-label">Province<span>*</span></label>
                            <input type="text" id="other-province" name="other-province" class="form-control" required>
                        </div>
                    </div>
                </div>

                <!-- Step 5: Additional Information -->
                <div class="step-content" data-step="5">
                    <h2 class="step-title">Additional Information</h2>
                    <div class="form-row">
                        <div class="form-group">
                            <label for="date-reported" class="form-label">Date & Time Reported<span>*</span></label>
                            <input type="datetime-local" id="date-reported" name="date-reported" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="date-incident" class="form-label">Date & Time of Incident<span>*</span></label>
                            <input type="datetime-local" id="date-incident" name="date-incident" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group">
                            <label for="email-address" class="form-label">Email Address<span>*</span></label>
                            <input type="email" id="email-address" name="email-address" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="occupation" class="form-label">Occupation<span>*</span></label>
                            <input type="text" id="occupation" name="occupation" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group">
                            <label for="civil-status" class="form-label">Civil Status<span>*</span></label>
                            <select id="civil-status" name="civil-status" class="form-control" required>
                                <option value="">Select status</option>
                                <option value="single">Single</option>
                                <option value="married">Married</option>
                                <option value="divorced">Divorced</option>
                                <option value="widowed">Widowed</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="educational-attainment" class="form-label">Highest Educational Attainment<span>*</span></label>
                            <select id="educational-attainment" name="educational-attainment" class="form-control" required>
                                <option value="">Select education level</option>
                                <option value="elementary">Elementary</option>
                                <option value="high-school">High School</option>
                                <option value="vocational">Vocational</option>
                                <option value="college">College</option>
                                <option value="graduate">Graduate</option>
                            </select>
                        </div>
                    </div>
                </div>

                <!-- Progress Bar -->
                <div class="progress-bar-container">
                    <div class="progress-bar" id="progress-bar"></div>
                </div>

                <!-- Navigation Buttons -->
                <div class="navigation-buttons">
                    <button type="button" class="btn btn-secondary prev-btn" style="display: none;">Previous</button>
                    <button type="button" class="btn btn-primary next-btn">Next</button>
                    <button type="submit" class="btn btn-primary submit-btn" style="display: none;">Save</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const form = document.getElementById('personForm');
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
                e.preventDefault();
                if (validateStep(currentStep)) {
                    alert('Form submitted successfully!');
                } else {
                    alert('Please fill in all required fields before submitting.');
                }
            });

            updateProgressBar();
        });
    </script>
</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>Person Data</title>
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
            background-color: #3b82f6;
            width: 0%;
            transition: width 0.3s ease;
        }
    </style>
</head>
<body>
    <div class="form-container">
        <div class="form-header">
            <h1 class="text-2xl font-bold">Person Data Form</h1>
            <p>Please complete all required information across the following steps</p>
        </div>
        
        <!-- Stepper Header -->
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
            <form id="personForm">
                <!-- Step 1: Personal Information -->
                <div class="step-content active" data-step="1">
                    <h2 class="text-xl font-semibold mb-4">Personal Information</h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div class="input-group">
                            <label for="surname" class="form-label">Surname<span class="required">*</span></label>
                            <input type="text" id="surname" name="surname" class="form-input" required>
                        </div>
                        <div class="input-group">
                            <label for="last-name" class="form-label">Last Name<span class="required">*</span></label>
                            <input type="text" id="last-name" name="last-name" class="form-input" required>
                        </div>
                        <div class="input-group">
                            <label for="middle-name" class="form-label">Middle Name<span class="required">*</span></label>
                            <input type="text" id="middle-name" name="middle-name" class="form-input" required>
                        </div>
                        <div class="input-group">
                            <label for="nickname" class="form-label">Nickname<span class="required">*</span></label>
                            <input type="text" id="nickname" name="nickname" class="form-input" required>
                        </div>
                        <div class="input-group">
                            <label for="gender" class="form-label">Gender<span class="required">*</span></label>
                            <select id="gender" name="gender" class="form-input" required>
                                <option value="">Select gender</option>
                                <option value="male">Male</option>
                                <option value="female">Female</option>
                                <option value="non-binary">Non-binary</option>
                                <option value="other">Other</option>
                            </select>
                        </div>
                        <div class="input-group">
                            <label for="citizenship" class="form-label">Citizenship<span class="required">*</span></label>
                            <input type="text" id="citizenship" name="citizenship" class="form-input" required>
                        </div>
                        <div class="input-group">
                            <label for="birthdate" class="form-label">Birthdate<span class="required">*</span></label>
                            <input type="date" id="birthdate" name="birthdate" class="form-input" required>
                        </div>
                        <div class="input-group">
                            <label for="age" class="form-label">Age<span class="required">*</span></label>
                            <input type="number" id="age" name="age" class="form-input" required>
                        </div>
                        <div class="input-group">
                            <label for="place-of-birth" class="form-label">Place of Birth<span class="required">*</span></label>
                            <input type="text" id="place-of-birth" name="place-of-birth" class="form-input" required>
                        </div>
                        <div class="input-group">
                            <label for="telephone" class="form-label">Telephone<span class="required">*</span></label>
                            <input type="tel" id="telephone" name="telephone" class="form-input" required>
                        </div>
                    </div>
                </div>

                <!-- Step 2: Current Address -->
                <div class="step-content" data-step="2">
                    <h2 class="text-xl font-semibold mb-4">Current Address</h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div class="input-group">
                            <label for="house-no" class="form-label">House No.<span class="required">*</span></label>
                            <input type="text" id="house-no" name="house-no" class="form-input" required>
                        </div>
                        <div class="input-group">
                            <label for="village" class="form-label">Village/Sitio<span class="required">*</span></label>
                            <input type="text" id="village" name="village" class="form-input" required>
                        </div>
                        <div class="input-group">
                            <label for="barangay" class="form-label">Barangay<span class="required">*</span></label>
                            <input type="text" id="barangay" name="barangay" class="form-input" required>
                        </div>
                        <div class="input-group">
                            <label for="town-city" class="form-label">Town/City<span class="required">*</span></label>
                            <input type="text" id="town-city" name="town-city" class="form-input" required>
                        </div>
                        <div class="input-group">
                            <label for="province" class="form-label">Province<span class="required">*</span></label>
                            <input type="text" id="province" name="province" class="form-input" required>
                        </div>
                    </div>
                </div>

                <!-- Step 3: Other Address -->
                <div class="step-content" data-step="3">
                    <h2 class="text-xl font-semibold mb-4">Other Address</h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div class="input-group">
                            <label for="other-address" class="form-label">House No.<span class="required">*</span></label>
                            <input type="text" id="other-address" name="other-address" class="form-input" required>
                        </div>
                        <div class="input-group">
                            <label for="other-village" class="form-label">Village/Sitio<span class="required">*</span></label>
                            <input type="text" id="other-village" name="other-village" class="form-input" required>
                        </div>
                        <div class="input-group">
                            <label for="other-barangay" class="form-label">Barangay<span class="required">*</span></label>
                            <input type="text" id="other-barangay" name="other-barangay" class="form-input" required>
                        </div>
                        <div class="input-group">
                            <label for="other-town-city" class="form-label">Town/City<span class="required">*</span></label>
                            <input type="text" id="other-town-city" name="other-town-city" class="form-input" required>
                        </div>
                        <div class="input-group">
                            <label for="other-province" class="form-label">Province<span class="required">*</span></label>
                            <input type="text" id="other-province" name="other-province" class="form-input" required>
                        </div>
                    </div>
                </div>

                <!-- Step 4: Additional Information -->
                <div class="step-content" data-step="4">
                    <h2 class="text-xl font-semibold mb-4">Additional Information</h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div class="input-group">
                            <label for="date-reported" class="form-label">Date & Time Reported<span class="required">*</span></label>
                            <input type="datetime-local" id="date-reported" name="date-reported" class="form-input" required>
                        </div>
                        <div class="input-group">
                            <label for="date-incident" class="form-label">Date & Time of Incident<span class="required">*</span></label>
                            <input type="datetime-local" id="date-incident" name="date-incident" class="form-input" required>
                        </div>
                        <div class="input-group">
                            <label for="email-address" class="form-label">Email Address<span class="required">*</span></label>
                            <input type="email" id="email-address" name="email-address" class="form-input" required>
                        </div>
                        <div class="input-group">
                            <label for="occupation" class="form-label">Occupation<span class="required">*</span></label>
                            <input type="text" id="occupation" name="occupation" class="form-input" required>
                        </div>
                        <div class="input-group">
                            <label for="education" class="form-label">Highest Educational Attainment<span class="required">*</span></label>
                            <select id="education" name="education" class="form-input" required>
                                <option value="">Select education level</option>
                                <option value="elementary">Elementary</option>
                                <option value="high-school">High School</option>
                                <option value="vocational">Vocational</option>
                                <option value="college">College</option>
                                <option value="masters">Master's Degree</option>
                                <option value="doctorate">Doctorate</option>
                            </select>
                        </div>
                    </div>
                </div>

                <!-- Progress Bar -->
                <div class="progress-bar-container">
                    <div class="progress-bar" style="width: 25%;"></div>
                </div>

                <!-- Navigation Buttons -->
                <div class="navigation-buttons">
                    <button type="button" class="btn btn-secondary prev-step" style="display: none;">Previous</button>
                    <button type="button" class="btn btn-primary next-step">Next</button>
                    <button type="submit" class="btn btn-success submit-form" style="display: none;">Submit</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            let currentStep = 1;
            const totalSteps = 4;
            
            // Elements
            const form = document.getElementById('personForm');
            const nextBtn = document.querySelector('.next-step');
            const prevBtn = document.querySelector('.prev-step');
            const submitBtn = document.querySelector('.submit-form');
            const progressBar = document.querySelector('.progress-bar');
            
            // Update progress bar
            function updateProgressBar() {
                const progressPercentage = (currentStep / totalSteps) * 100;
                progressBar.style.width = `${progressPercentage}%`;
            }
            
            // Show current step
            function showStep(stepNumber) {
                // Hide all steps
                document.querySelectorAll('.step-content').forEach(step => {
                    step.classList.remove('active');
                });
                
                // Show current step
                document.querySelector(`.step-content[data-step="${stepNumber}"]`).classList.add('active');
                
                // Update stepper
                document.querySelectorAll('.step').forEach(step => {
                    const stepNum = parseInt(step.getAttribute('data-step'));
                    step.classList.remove('active', 'completed');
                    
                    if (stepNum === currentStep) {
                        step.classList.add('active');
                    } else if (stepNum < currentStep) {
                        step.classList.add('completed');
                    }
                });
                
                // Update buttons
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
                
                // Update progress bar
                updateProgressBar();
            }
            
            // Validate current step
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
            
            // Next button click
            nextBtn.addEventListener('click', function() {
                if (validateStep(currentStep)) {
                    currentStep++;
                    showStep(currentStep);
                } else {
                    alert('Please fill in all required fields before proceeding.');
                }
            });
            
            // Previous button click
            prevBtn.addEventListener('click', function() {
                currentStep--;
                showStep(currentStep);
            });
            
            // Form submission
            form.addEventListener('submit', function(e) {
                e.preventDefault();
                
                if (validateStep(currentStep)) {
                    // Here you would normally submit the form
                    alert('Form submitted successfully!');
                    // Optionally reset the form or redirect
                } else {
                    alert('Please fill in all required fields before submitting.');
                }
            });
            
            // Initialize the form
            showStep(currentStep);
        });
    </script>
</body>
</html>
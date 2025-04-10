<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
    </style>
</head>
<body>
    <div class="form-container">
        <div class="form-header">
            <h1 class="text-2xl font-bold">Personal Information Form</h1>
            <p>Please complete all required fields</p>
        </div>

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
            <form id="person-form">
                <!-- Step 1: Personal Information -->
                <div class="step-content active" data-step="1">
                    <div class="form-section">
                        <h2 class="section-title">Basic Information</h2>
                        <div class="form-row">
                            <div class="form-group">
                                <label for="surname" class="form-label">Surname<span class="required">*</span></label>
                                <input type="text" id="surname" name="surname" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="last-name" class="form-label">Last Name<span class="required">*</span></label>
                                <input type="text" id="last-name" name="last-name" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="middle-name" class="form-label">Middle Name<span class="required">*</span></label>
                                <input type="text" id="middle-name" name="middle-name" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="nickname" class="form-label">Nickname</label>
                                <input type="text" id="nickname" name="nickname" class="form-control">
                            </div>
                        </div>
                        
                        <div class="form-row">
                            <div class="form-group">
                                <label for="gender" class="form-label">Gender<span class="required">*</span></label>
                                <select id="gender" name="gender" class="form-control">
                                    <option value="">Select gender</option>
                                    <option value="male">Male</option>
                                    <option value="female">Female</option>
                                    <option value="other">Other</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="citizenship" class="form-label">Citizenship<span class="required">*</span></label>
                                <input type="text" id="citizenship" name="citizenship" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="birthdate" class="form-label">Birthdate<span class="required">*</span></label>
                                <input type="date" id="birthdate" name="birthdate" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="age" class="form-label">Age<span class="required">*</span></label>
                                <input type="number" id="age" name="age" class="form-control">
                            </div>
                        </div>
                        
                        <div class="form-row">
                            <div class="form-group">
                                <label for="place-of-birth" class="form-label">Place of Birth<span class="required">*</span></label>
                                <input type="text" id="place-of-birth" name="place-of-birth" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="telephone" class="form-label">Telephone<span class="required">*</span></label>
                                <input type="tel" id="telephone" name="telephone" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="email-address" class="form-label">Email Address<span class="required">*</span></label>
                                <input type="email" id="email-address" name="email-address" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="civil-status" class="form-label">Civil Status<span class="required">*</span></label>
                                <select id="civil-status" name="civil-status" class="form-control">
                                    <option value="">Select status</option>
                                    <option value="single">Single</option>
                                    <option value="married">Married</option>
                                    <option value="divorced">Divorced</option>
                                    <option value="widowed">Widowed</option>
                                </select>
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
                                <label for="house-no" class="form-label">House No.<span class="required">*</span></label>
                                <input type="text" id="house-no" name="house-no" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="village" class="form-label">Village/Sitio<span class="required">*</span></label>
                                <input type="text" id="village" name="village" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="barangay" class="form-label">Barangay<span class="required">*</span></label>
                                <input type="text" id="barangay" name="barangay" class="form-control">
                            </div>
                        </div>
                        
                        <div class="form-row">
                            <div class="form-group">
                                <label for="town-city" class="form-label">Town/City<span class="required">*</span></label>
                                <input type="text" id="town-city" name="town-city" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="province" class="form-label">Province<span class="required">*</span></label>
                                <input type="text" id="province" name="province" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="postal-code" class="form-label">Postal Code</label>
                                <input type="text" id="postal-code" name="postal-code" class="form-control">
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
                                <label for="other-address" class="form-label">Other Address<span class="required">*</span></label>
                                <input type="text" id="other-address" name="other-address" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="other-village" class="form-label">Village/Sitio<span class="required">*</span></label>
                                <input type="text" id="other-village" name="other-village" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="other-barangay" class="form-label">Barangay<span class="required">*</span></label>
                                <input type="text" id="other-barangay" name="other-barangay" class="form-control">
                            </div>
                        </div>
                        
                        <div class="form-row">
                            <div class="form-group">
                                <label for="other-town-city" class="form-label">Town/City<span class="required">*</span></label>
                                <input type="text" id="other-town-city" name="other-town-city" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="other-province" class="form-label">Province<span class="required">*</span></label>
                                <input type="text" id="other-province" name="other-province" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="other-postal-code" class="form-label">Postal Code</label>
                                <input type="text" id="other-postal-code" name="other-postal-code" class="form-control">
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
                                <label for="date-time-reported" class="form-label">Date & Time Reported<span class="required">*</span></label>
                                <input type="datetime-local" id="date-time-reported" name="date-time-reported" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="date-time-incident" class="form-label">Date & Time of Incident<span class="required">*</span></label>
                                <input type="datetime-local" id="date-time-incident" name="date-time-incident" class="form-control">
                            </div>
                        </div>
                        
                        <div class="form-row">
                            <div class="form-group">
                                <label for="highest-education" class="form-label">Highest Educational Attainment<span class="required">*</span></label>
                                <select id="highest-education" name="highest-education" class="form-control">
                                    <option value="">Select education level</option>
                                    <option value="elementary">Elementary</option>
                                    <option value="high-school">High School</option>
                                    <option value="vocational">Vocational</option>
                                    <option value="college">College</option>
                                    <option value="graduate">Graduate</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="job-occupation" class="form-label">Occupation<span class="required">*</span></label>
                                <input type="text" id="job-occupation" name="job-occupation" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="relation-to-victim" class="form-label">Relation to the Victim<span class="required">*</span></label>
                                <input type="text" id="relation-to-victim" name="relation-to-victim" class="form-control">
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
                                <label for="height-cm" class="form-label">Height (cm)<span class="required">*</span></label>
                                <input type="number" id="height-cm" name="height-cm" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="weight-kg" class="form-label">Weight (kg)<span class="required">*</span></label>
                                <input type="number" id="weight-kg" name="weight-kg" class="form-control">
                            </div>
                        </div>
                        
                        <div class="form-row">
                            <div class="form-group">
                                <label for="eye-color" class="form-label">Color Of The Eye<span class="required">*</span></label>
                                <input type="text" id="eye-color" name="eye-color" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="eye-description" class="form-label">Description Of Eye<span class="required">*</span></label>
                                <input type="text" id="eye-description" name="eye-description" class="form-control">
                            </div>
                        </div>
                        
                        <div class="form-row">
                            <div class="form-group">
                                <label for="hair-color" class="form-label">Color Of The Hair<span class="required">*</span></label>
                                <input type="text" id="hair-color" name="hair-color" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="hair-description" class="form-label">Description Of The Hair<span class="required">*</span></label>
                                <input type="text" id="hair-description" name="hair-description" class="form-control">
                            </div>
                        </div>
                        
                        <div class="form-row">
                            <div class="form-group">
                                <label for="influence" class="form-label">Under the Influence of?<span class="required">*</span></label>
                                <input type="text" id="influence" name="influence" class="form-control">
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

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const steps = document.querySelectorAll('.step');
            const stepContents = document.querySelectorAll('.step-content');
            const nextButtons = document.querySelectorAll('.next-btn');
            const prevButtons = document.querySelectorAll('.prev-btn');
            const progressBar = document.getElementById('progress-bar');
            const form = document.getElementById('person-form');
            
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
                e.preventDefault();
                alert('Form submitted successfully!');
            });
            
            updateProgressBar();
        });
    </script>
</body>
</html>
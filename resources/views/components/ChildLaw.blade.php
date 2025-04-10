<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Person Data Form</title>
    <style>
        /* Reset and base styles */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
        }

        body {
            background-color: #f4f6f9;
            color: #1f2937;
            line-height: 1.6;
            padding: 2rem 1rem;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
        }

        h1 {
            font-size: 2rem;
            font-weight: 700;
            color: #1e3a8a;
            margin-bottom: 2rem;
            letter-spacing: -0.025em;
        }

        /* Card styles */
        .card {
            background-color: #ffffff;
            border-radius: 12px;
            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.05);
            border: 1px solid #e2e8f0;
            overflow: hidden;
            transition: transform 0.2s ease;
        }

        .card:hover {
            transform: translateY(-2px);
        }

        .card-header {
            padding: 1.5rem 2rem;
            background: linear-gradient(135deg, #dbeafe 0%, #e0f2fe 100%);
            border-bottom: 1px solid #e2e8f0;
        }

        .card-title {
            font-size: 1.5rem;
            font-weight: 600;
            color: #1e3a8a;
            letter-spacing: -0.01em;
        }

        .card-content {
            padding: 2rem;
        }

        .card-footer {
            padding: 1.5rem 2rem;
            background-color: #f9fafb;
            border-top: 1px solid #e2e8f0;
            display: flex;
            justify-content: flex-end;
            gap: 1rem;
        }

        /* Form styles */
        .form-group {
            margin-bottom: 2rem;
        }

        .form-grid {
            display: grid;
            grid-template-columns: 1fr;
            gap: 1.5rem;
            margin-bottom: 2rem;
        }

        @media (min-width: 640px) {
            .form-grid {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media (min-width: 1024px) {
            .form-grid {
                grid-template-columns: repeat(4, 1fr);
            }
        }

        .form-field {
            display: flex;
            flex-direction: column;
            gap: 0.5rem;
        }

        label {
            font-size: 0.875rem;
            font-weight: 500;
            color: #374151;
            letter-spacing: 0.01em;
        }

        input, textarea {
            padding: 0.75rem 1rem;
            border: 1px solid #d1d5db;
            border-radius: 8px;
            font-size: 0.875rem;
            width: 100%;
            background-color: #ffffff;
            color: #1f2937;
            transition: all 0.2s ease;
        }

        input:focus, textarea:focus {
            border-color: #3b82f6;
            box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.1);
            outline: none;
        }

        textarea {
            resize: vertical;
            min-height: 120px;
            line-height: 1.5;
        }

        .help-text {
            font-size: 0.75rem;
            color: #6b7280;
            margin-top: 0.25rem;
            font-style: italic;
        }

        /* Button styles */
        .button {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
            padding: 0.75rem 1.5rem;
            font-size: 0.875rem;
            font-weight: 600;
            border-radius: 8px;
            cursor: pointer;
            transition: all 0.2s ease;
        }

        .button-outline {
            background-color: #ffffff;
            color: #4b5563;
            border: 1px solid #d1d5db;
        }

        .button-outline:hover {
            background-color: #f1f5f9;
            border-color: #9ca3af;
            color: #1f2937;
        }

        .button-primary {
            background-color: #3b82f6;
            color: #ffffff;
            border: 1px solid transparent;
        }

        .button-primary:hover {
            background-color: #2563eb;
        }

        /* Icon styles */
        .icon {
            width: 1.25rem;
            height: 1.25rem;
            flex-shrink: 0;
        }

        /* Responsive adjustments */
        @media (max-width: 640px) {
            .card-header, .card-content, .card-footer {
                padding: 1rem;
            }
            h1 {
                font-size: 1.5rem;
            }
            .card-title {
                font-size: 1.25rem;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        
        <div class="card">
            <div class="card-header">
                <h2 class="card-title">Personal Information Form</h2>
            </div>
            
            <form id="personDataForm">
                <div class="card-content">
                    <div class="form-grid">
                        <div class="form-field">
                            <label for="guardianName">Name of Guardian</label>
                            <input type="text" id="guardianName" name="guardianName" placeholder="Enter guardian's name">
                        </div>
                        
                        <div class="form-field">
                            <label for="guardianAddress">Guardian Address</label>
                            <input type="text" id="guardianAddress" name="guardianAddress" placeholder="Enter address">
                        </div>
                        
                        <div class="form-field">
                            <label for="guardianTelephone">Telephone</label>
                            <input type="tel" id="guardianTelephone" name="guardianTelephone" placeholder="Enter telephone">
                        </div>
                        
                        <div class="form-field">
                            <label for="guardianPhone">Phone Number</label>
                            <input type="tel" id="guardianPhone" name="guardianPhone" placeholder="Enter phone number">
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="diversionMechanism">Diversion Mechanism</label>
                        <textarea id="diversionMechanism" name="diversionMechanism" placeholder="Provide details about the diversion mechanism..." rows="4"></textarea>
                    </div>
                    
                    <div class="form-group">
                        <label for="distinguishingFeatures">Other Distinguishing Features</label>
                        <p class="help-text">
                            Describe in detail the clothes, vehicle, sunglasses, weapon(s), scars, and any other notable data or activities observed by the reporting person and/or witness(es).
                        </p>
                        <textarea id="distinguishingFeatures" name="distinguishingFeatures" placeholder="Describe distinguishing features in detail..." rows="5"></textarea>
                    </div>
                </div>
                
                <div class="card-footer">
                    <button type="button" class="button button-outline" onclick="window.close()">
                        <svg class="icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <line x1="18" y1="6" x2="6" y2="18"></line>
                            <line x1="6" y1="6" x2="18" y2="18"></line>
                        </svg>
                        Close
                    </button>
                    
                    <button type="submit" class="button button-primary">
                        <svg class="icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M19 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11l5 5v11a2 2 0 0 1-2 2z"></path>
                            <polyline points="17 21 17 13 7 13 7 21"></polyline>
                            <polyline points="7 3 7 8 15 8"></polyline>
                        </svg>
                        Save
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script>
        document.getElementById('personDataForm').addEventListener('submit', function(e) {
            e.preventDefault();
            const formData = new FormData(this);
            const data = Object.fromEntries(formData);
            console.log('Form submitted with data:', data);
            // Add your backend submission logic here (e.g., fetch request)
            alert('Form submitted successfully!');
        });
    </script>
</body>
</html>
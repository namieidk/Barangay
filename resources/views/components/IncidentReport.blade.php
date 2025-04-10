<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>Incident Report Transaction Receipt</title>
    <style>
        :root {
            --primary-color: #1e3a8a;
            --primary-light: #3b82f6;
            --primary-lighter: #dbeafe;
            --accent-color: #10b981;
            --accent-light: #d1fae5;
            --text-color: #1f2937;
            --text-light: #6b7280;
            --border-color: #e5e7eb;
            --background-color: #f9fafb;
            --card-background: #ffffff;
            --error-color: #ef4444;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
        }

        body {
            background-color: var(--background-color);
            color: var(--text-color);
            line-height: 1.5;
            padding: 2rem 1rem;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
        }

        .card {
            background-color: var(--card-background);
            border-radius: 0.75rem;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            margin-bottom: 2rem;
        }

        .card-header {
            background: linear-gradient(to right, var(--primary-color), var(--primary-light));
            padding: 1.5rem 2rem;
            border-bottom: 1px solid var(--border-color);
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .card-title {
            font-size: 1.5rem;
            font-weight: 700;
            color: white;
            margin: 0;
        }

        .card-body {
            padding: 2rem;
        }

        .form-section {
            margin-bottom: 2rem;
        }

        .form-row {
            display: flex;
            flex-wrap: wrap;
            margin: 0 -1rem;
        }

        .form-group {
            flex: 1 0 220px;
            padding: 0 1rem;
            margin-bottom: 1.5rem;
        }

        .form-label {
            display: block;
            font-weight: 500;
            margin-bottom: 0.5rem;
            color: var(--text-color);
        }

        .required::after {
            content: "*";
            color: var(--error-color);
            margin-left: 0.25rem;
        }

        .form-control {
            display: block;
            width: 100%;
            padding: 0.75rem 1rem;
            font-size: 1rem;
            line-height: 1.5;
            color: var(--text-color);
            background-color: #fff;
            background-clip: padding-box;
            border: 1px solid var(--border-color);
            border-radius: 0.5rem;
            transition: all 0.2s ease-in-out;
        }

        .form-control:focus {
            border-color: var(--primary-light);
            outline: 0;
            box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.25);
        }

        .form-text {
            display: block;
            margin-top: 0.25rem;
            font-size: 0.875rem;
            color: var(--text-light);
        }

        .signature-section {
            display: flex;
            align-items: flex-start;
            margin-top: 2rem;
            padding: 1.5rem;
            background-color: var(--primary-lighter);
            border-radius: 0.5rem;
        }

        .signature-image {
            width: 150px;
            height: 150px;
            border: 2px dashed var(--primary-light);
            border-radius: 0.5rem;
            overflow: hidden;
            background-color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 2rem;
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
            color: var(--primary-color);
            padding-bottom: 0.5rem;
            border-bottom: 2px solid var(--primary-color);
            margin-bottom: 0.5rem;
        }

        .signature-position {
            font-size: 1rem;
            color: var(--text-color);
        }

        .card-footer {
            display: flex;
            justify-content: flex-end;
            padding: 1.5rem 2rem;
            background-color: rgba(0, 0, 0, 0.02);
            border-top: 1px solid var(--border-color);
            gap: 1rem;
        }

        .btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            font-weight: 500;
            text-align: center;
            white-space: nowrap;
            vertical-align: middle;
            user-select: none;
            border: 1px solid transparent;
            padding: 0.75rem 1.5rem;
            font-size: 1rem;
            line-height: 1.5;
            border-radius: 0.5rem;
            transition: all 0.2s ease-in-out;
            cursor: pointer;
        }

        .btn-primary {
            color: #fff;
            background-color: var(--primary-color);
            border-color: var(--primary-color);
        }

        .btn-primary:hover {
            background-color: #1e40af;
            border-color: #1e40af;
        }

        .btn-secondary {
            color: #fff;
            background-color: #6b7280;
            border-color: #6b7280;
        }

        .btn-secondary:hover {
            background-color: #4b5563;
            border-color: #4b5563;
        }

        .btn-accent {
            color: #fff;
            background-color: var(--accent-color);
            border-color: var(--accent-color);
        }

        .btn-accent:hover {
            background-color: #059669;
            border-color: #059669;
        }

        .btn-outline {
            color: var(--primary-color);
            background-color: transparent;
            border-color: var(--primary-color);
        }

        .btn-outline:hover {
            color: #fff;
            background-color: var(--primary-color);
        }

        .section-title {
            font-size: 1.125rem;
            font-weight: 600;
            color: var(--primary-color);
            margin-bottom: 1.5rem;
            padding-bottom: 0.5rem;
            border-bottom: 1px solid var(--border-color);
        }

        /* Responsive adjustments */
        @media (max-width: 768px) {
            .card-header {
                flex-direction: column;
                align-items: flex-start;
                gap: 1rem;
            }
            
            .form-group {
                flex: 0 0 100%;
            }
            
            .signature-section {
                flex-direction: column;
            }
            
            .signature-image {
                margin-right: 0;
                margin-bottom: 1.5rem;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h1 class="card-title">INCIDENT REPORT TRANSACTION RECEIPT</h1>
                <button class="btn btn-outline">View Receipt</button>
            </div>
            
            <form>
                <div class="card-body">
                    <div class="form-section">
                        <h2 class="section-title">Incident Information</h2>
                        <div class="form-row">
                            <div class="form-group">
                                <label for="blotter-entry-number" class="form-label required">Blotter Entry Number</label>
                                <input type="text" id="blotter-entry-number" name="blotter_entry_number" class="form-control" required>
                            </div>
                            
                            <div class="form-group">
                                <label for="incident-type" class="form-label required">Type of Incident</label>
                                <input type="text" id="incident-type" name="incident_type" class="form-control" required>
                            </div>
                            
                            <div class="form-group">
                                <label for="incident-date-time" class="form-label required">Date & Time of Incident</label>
                                <input type="datetime-local" id="incident-date-time" name="incident_date_time" class="form-control" required>
                            </div>
                            
                            <div class="form-group">
                                <label for="incident-place" class="form-label required">Place of Incident</label>
                                <input type="text" id="incident-place" name="incident_place" class="form-control" required>
                            </div>
                        </div>
                    </div>
                    
                    <div class="form-section">
                        <h2 class="section-title">Reporting Person Details</h2>
                        <div class="form-row">
                            <div class="form-group">
                                <label for="reporting-person-name" class="form-label required">Name of Reporting Person</label>
                                <input type="text" id="reporting-person-name" name="reporting_person_name" class="form-control" required>
                            </div>
                            
                            <div class="form-group">
                                <label for="reporting-person-address" class="form-label required">Address of Reporting Person</label>
                                <input type="text" id="reporting-person-address" name="reporting_person_address" class="form-control" required>
                            </div>
                            
                            <div class="form-group">
                                <label for="report-date-time" class="form-label required">Date & Time of Report</label>
                                <input type="datetime-local" id="report-date-time" name="report_date_time" class="form-control" required>
                            </div>
                        </div>
                    </div>
                    
                    <div class="form-section">
                        <h2 class="section-title">Certification</h2>
                        <div class="form-group">
                            <label for="certification-text" class="form-label required">Certification Statement</label>
                            <p class="form-text">This is to certify that the reporting person reported an incident to be recorded in the barangay blotter which involves:</p>
                            <textarea id="certification-text" name="certification_text" rows="3" class="form-control" placeholder="Enter certification details here..." required></textarea>
                        </div>
                        
                        <div class="signature-section">
                            <div class="signature-image">
                                <img id="preview-image" src="/placeholder.svg" alt="Signature">
                            </div>
                            
                            <div class="signature-details">
                                <div class="signature-name" id="person-name-display">[Name]</div>
                                <div class="signature-position" id="person-position-display">[Position/Name/Signature]</div>
                                
                                <div class="form-group" style="margin-top: 1rem;">
                                    <label for="signature-upload" class="form-label">Upload Signature</label>
                                    <input type="file" id="signature-upload" name="signature_upload" class="form-control" accept="image/*" onchange="previewImage(this)">
                                </div>
                                
                                <div class="form-group">
                                    <label for="signatory-name" class="form-label">Signatory Name</label>
                                    <input type="text" id="signatory-name" name="signatory_name" class="form-control" onchange="updateName(this)">
                                </div>
                                
                                <div class="form-group">
                                    <label for="signatory-position" class="form-label">Signatory Position</label>
                                    <input type="text" id="signatory-position" name="signatory_position" class="form-control" onchange="updatePosition(this)">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="card-footer">
                    <button type="button" class="btn btn-secondary" onclick="window.close()">Close</button>
                    <button type="submit" class="btn btn-primary">Save Report</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        // Preview uploaded image
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
        
        // Update signatory name display
        function updateName(input) {
            document.getElementById('person-name-display').textContent = input.value || '[Name]';
        }
        
        // Update signatory position display
        function updatePosition(input) {
            document.getElementById('person-position-display').textContent = input.value || '[Position/Name/Signature]';
        }
        
        // Form validation
        document.querySelector('form').addEventListener('submit', function(e) {
            e.preventDefault();
            
            // Basic validation
            const requiredFields = document.querySelectorAll('[required]');
            let isValid = true;
            
            requiredFields.forEach(field => {
                if (!field.value.trim()) {
                    field.style.borderColor = 'var(--error-color)';
                    isValid = false;
                } else {
                    field.style.borderColor = 'var(--border-color)';
                }
            });
            
            if (isValid) {
                // Form is valid, you can submit it
                console.log('Form is valid, submitting...');
                // Uncomment the line below to actually submit the form
                // this.submit();
            }
        });
    </script>
</body>
</html>
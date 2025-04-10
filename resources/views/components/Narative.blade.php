<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>Incident Report Form</title>
    <style>
        /* Custom styles with CSS variables */
        :root {
            --primary-color: #1e3a8a; /* Deep blue for professionalism */
            --primary-light: #3b82f6; /* Lighter blue for accents */
            --primary-lighter: #dbeafe; /* Very light blue for backgrounds */
            --text-color: #1f2937; /* Dark gray for text */
            --border-color: #d1d5db; /* Soft gray for borders */
            --background-color: #f4f6f9; /* Light gray-blue background */
            --card-background: #ffffff; /* White for cards */
            --error-color: #dc2626; /* Vibrant red for errors */
            --success-color: #059669; /* Green for success states */
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
        }

        body {
            background-color: var(--background-color);
            color: var(--text-color);
            line-height: 1.6;
            padding: 2.5rem 1rem;
            overflow-x: hidden;
        }

        .container {
            max-width: 1280px;
            margin: 0 auto;
        }

        .page-title {
            font-size: 2rem;
            font-weight: 700;
            color: var(--primary-color);
            text-align: center;
            margin-bottom: 2rem;
            letter-spacing: -0.025em;
        }

        .card {
            background-color: var(--card-background);
            border-radius: 12px;
            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.05);
            overflow: hidden;
            margin-bottom: 2.5rem;
            transition: transform 0.2s ease;
        }

        .card:hover {
            transform: translateY(-2px);
        }

        .card-header {
            background: linear-gradient(135deg, var(--primary-color), var(--primary-light));
            padding: 1.5rem 2rem;
            border-bottom: 1px solid var(--border-color);
        }

        .card-title {
            font-size: 1.5rem;
            font-weight: 600;
            color: #ffffff;
            letter-spacing: -0.01em;
        }

        .card-body {
            padding: 2rem;
        }

        .form-row {
            display: grid;
            grid-template-columns: 1fr;
            gap: 1.5rem;
            margin-bottom: 2rem;
        }

        @media (min-width: 640px) {
            .form-row {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media (min-width: 1024px) {
            .form-row {
                grid-template-columns: repeat(4, 1fr);
            }
        }

        .form-group {
            display: flex;
            flex-direction: column;
            gap: 0.5rem;
        }

        .form-label {
            font-weight: 500;
            font-size: 0.875rem;
            color: var(--text-color);
            letter-spacing: 0.01em;
        }

        .required::after {
            content: "*";
            color: var(--error-color);
            margin-left: 0.25rem;
            font-weight: 700;
        }

        .form-control {
            width: 100%;
            padding: 0.75rem 1rem;
            font-size: 0.95rem;
            color: var(--text-color);
            background-color: #fff;
            border: 1px solid var(--border-color);
            border-radius: 8px;
            transition: all 0.2s ease;
        }

        .form-control:focus {
            border-color: var(--primary-light);
            box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.1);
            outline: none;
        }

        textarea.form-control {
            min-height: 160px;
            resize: vertical;
            line-height: 1.5;
        }

        .form-text {
            font-size: 0.75rem;
            color: #6b7280;
            margin-top: 0.25rem;
            font-style: italic;
        }

        .card-footer {
            display: flex;
            justify-content: flex-end;
            padding: 1.5rem 2rem;
            background-color: #f9fafb;
            border-top: 1px solid var(--border-color);
            gap: 1rem;
        }

        .btn {
            padding: 0.75rem 1.5rem;
            font-size: 0.95rem;
            font-weight: 600;
            border-radius: 8px;
            border: 1px solid transparent;
            cursor: pointer;
            transition: all 0.2s ease;
        }

        .btn-primary {
            background-color: var(--primary-light);
            color: #ffffff;
        }

        .btn-primary:hover {
            background-color: #2563eb;
        }

        .btn-secondary {
            background-color: #6b7280;
            color: #ffffff;
        }

        .btn-secondary:hover {
            background-color: #4b5563;
        }

        /* Responsive adjustments */
        @media (max-width: 640px) {
            .card-header, .card-body, .card-footer {
                padding: 1.25rem;
            }
            .page-title {
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
                <h2 class="card-title">Incident Details</h2>
            </div>
            
            <form>
                <div class="card-body">
                    <div class="form-row">
                        <div class="form-group">
                            <label for="blotter-entry-number" class="form-label required">Blotter Entry Number</label>
                            <input type="text" id="blotter-entry-number" name="blotter-entry-number" class="form-control" placeholder="Enter blotter number" required>
                        </div>
                        
                        <div class="form-group">
                            <label for="incident-type" class="form-label required">Type of Incident</label>
                            <input type="text" id="incident-type" name="incident-type" class="form-control" placeholder="Specify incident type" required>
                        </div>
                        
                        <div class="form-group">
                            <label for="date-time" class="form-label required">Date & Time</label>
                            <input type="datetime-local" id="date-time" name="date-time" class="form-control" required>
                        </div>
                        
                        <div class="form-group">
                            <label for="place-of-incident" class="form-label required">Place of Incident</label>
                            <input type="text" id="place-of-incident" name="place-of-incident" class="form-control" placeholder="Enter location" required>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="incident-narrative" class="form-label required">Incident Narrative</label>
                        <span class="form-text">Detail the WHO, WHAT, WHEN, WHERE, WHY, and HOW of the incident.</span>
                        <textarea id="incident-narrative" name="incident-narrative" class="form-control" placeholder="Provide a detailed description of the incident..." rows="6" required></textarea>
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
        document.querySelector('form').addEventListener('submit', function(e) {
            e.preventDefault();
            
            const requiredFields = this.querySelectorAll('[required]');
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
                const formData = new FormData(this);
                const data = Object.fromEntries(formData);
                console.log('Form submitted with data:', data);
                alert('Report saved successfully!');
                // Uncomment below to submit to a backend
                // this.submit();
            } else {
                alert('Please fill in all required fields.');
            }
        });
    </script>
</body>
</html>
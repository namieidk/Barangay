<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>BRGY INCIO, DAVAO CITY SYSTEM - Document Management</title>
    <style>
        :root {
            --primary: #2b6241;
            --primary-light: #3d8257;
            --primary-dark: #1d472e;
            --accent: #fac33b;
            --accent-light: #fbd16b;
            --light-bg: #f8f9fa;
            --text-dark: #333;
            --text-light: #f8f9fa;
            --border-color: #dee2e6;
            --shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            --card-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        body {
            background-color: var(--light-bg);
            min-height: 100vh;
            display: flex;
            color: var(--text-dark);
            line-height: 1.6;
        }

        .main-content {
            flex: 1;
            margin-left: 280px;
            padding: 2rem;
            transition: margin-left 0.3s ease;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 2rem;
            padding-bottom: 1rem;
            border-bottom: 1px solid var(--border-color);
            background: linear-gradient(to right, var(--primary-light), var(--primary));
            color: var(--text-light);
            border-radius: 8px;
            padding: 1rem 2rem;
            box-shadow: var(--shadow);
        }

        .header h1 {
            font-size: 2rem;
            font-weight: 700;
            letter-spacing: 0.5px;
        }

        .search-container {
            position: relative;
            width: 100%;
            max-width: 400px;
        }

        .search-container input {
            width: 100%;
            padding: 0.75rem 1rem 0.75rem 3rem;
            border: 1px solid var(--border-color);
            border-radius: 50px;
            font-size: 0.9rem;
            transition: all 0.3s ease;
            background-color: white;
            box-shadow: inset 0 1px 2px rgba(0, 0, 0, 0.05);
        }

        .search-container input:focus {
            outline: none;
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(59, 130, 87, 0.2);
        }

        .search-icon {
            position: absolute;
            left: 1rem;
            top: 50%;
            transform: translateY(-50%);
            color: #6c757d;
        }

        .document-cards {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 2rem;
            margin-bottom: 2rem;
        }

        .document-card {
            background: white;
            border-radius: 12px;
            box-shadow: var(--card-shadow);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            overflow: hidden;
            height: 100%;
            border: 1px solid var(--border-color);
        }

        .document-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
        }

        .doc-header {
            background: linear-gradient(135deg, var(--primary), var(--primary-dark));
            color: white;
            padding: 1.5rem;
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .doc-icon {
            background-color: rgba(255, 255, 255, 0.2);
            width: 48px;
            height: 48px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: transform 0.3s ease;
        }

        .document-card:hover .doc-icon {
            transform: scale(1.1);
        }

        .doc-title h2 {
            font-size: 1.5rem;
            font-weight: 600;
            margin-bottom: 0.25rem;
        }

        .doc-title p {
            font-size: 0.9rem;
            opacity: 0.8;
        }

        .doc-body {
            padding: 1.5rem;
        }

        .document-details {
            margin-bottom: 1.5rem;
        }

        .document-details h3 {
            font-size: 1.1rem;
            color: var(--primary-dark);
            margin-bottom: 1rem;
            font-weight: 600;
            border-bottom: 2px solid var(--primary-light);
            padding-bottom: 0.25rem;
        }

        .info-list {
            list-style: none;
        }

        .info-list li {
            display: flex;
            align-items: center;
            margin-bottom: 0.75rem;
            font-size: 0.95rem;
            color: #555;
        }

        .info-list li svg {
            margin-right: 0.75rem;
            color: var(--primary);
            flex-shrink: 0;
        }

        .form-group {
            display: flex;
            flex-direction: column;
            margin-bottom: 1.25rem;
        }

        .form-label {
            font-size: 0.875rem;
            color: var(--primary);
            margin-bottom: 0.5rem;
            font-weight: 500;
        }

        .form-control {
            padding: 0.75rem;
            border: 1px solid var(--border-color);
            border-radius: 6px;
            font-size: 0.9rem;
            transition: all 0.3s ease;
            background-color: #fff;
        }

        .form-control:focus {
            outline: none;
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(59, 130, 87, 0.2);
        }

        select.form-control {
            appearance: none;
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='16' height='16' viewBox='0 0 24 24' fill='none' stroke='%232b6241' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'%3E%3Cpolyline points='6 9 12 15 18 9'%3E%3C/polyline%3E%3C/svg%3E");
            background-repeat: no-repeat;
            background-position: right 1rem center;
            background-size: 16px;
            padding-right: 2.5rem;
        }

        .btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: 0.75rem 1.5rem;
            border-radius: 6px;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.3s ease;
            border: none;
            font-size: 0.95rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .btn-primary {
            background-color: var(--primary);
            color: white;
        }

        .btn-primary:hover {
            background-color: var(--primary-light);
            transform: translateY(-2px);
        }

        .btn-accent {
            background-color: var(--accent);
            color: var(--text-dark);
        }

        .btn-accent:hover {
            background-color: var(--accent-light);
            transform: translateY(-2px);
        }

        .btn svg {
            margin-right: 0.5rem;
        }

        .btn-full {
            width: 100%;
        }

        .recent-list {
            margin-top: 3rem;
        }

        .section-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1.5rem;
            padding-bottom: 0.5rem;
            border-bottom: 1px solid var(--border-color);
        }

        .section-header h2 {
            font-size: 1.5rem;
            color: var(--primary-dark);
            font-weight: 600;
            letter-spacing: 0.5px;
        }

        .table-container {
            background: white;
            border-radius: 12px;
            box-shadow: var(--shadow);
            overflow-x: auto;
            border: 1px solid var(--border-color);
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            padding: 1rem 1.5rem;
            text-align: left;
            font-size: 0.9rem;
        }

        th {
            background-color: var(--light-bg);
            font-weight: 600;
            color: var(--primary-dark);
            text-transform: uppercase;
            letter-spacing: 0.5px;
            border-bottom: 2px solid var(--primary-light);
        }

        tr {
            border-bottom: 1px solid var(--border-color);
            transition: background-color 0.3s ease;
        }

        tr:hover {
            background-color: rgba(59, 130, 87, 0.05);
        }

        td .status {
            display: inline-block;
            padding: 0.25rem 0.75rem;
            border-radius: 50px;
            font-size: 0.8rem;
            font-weight: 500;
            text-transform: capitalize;
        }

        td .status-pending {
            background-color: #fff3cd;
            color: #856404;
        }

        td .status-approved {
            background-color: #d4edda;
            color: #155724;
        }

        td .status-rejected {
            background-color: #f8d7da;
            color: #721c24;
        }

        .badge {
            display: inline-flex;
            align-items: center;
            padding: 0.35rem 0.75rem;
            border-radius: 50px;
            font-size: 0.75rem;
            font-weight: 600;
            text-transform: uppercase;
        }

        .badge-certificate {
            background-color: #e6f7ff;
            color: #0070a8;
        }

        .badge-clearance {
            background-color: #e6ffe6;
            color: #006600;
        }

        .action-btns {
            display: flex;
            gap: 0.5rem;
        }

        .btn-icon {
            width: 32px;
            height: 32px;
            border-radius: 6px;
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: #f8f9fa;
            color: var(--text-dark);
            transition: all 0.3s ease;
            border: 1px solid var(--border-color);
        }

        .btn-icon:hover {
            background-color: var(--primary-light);
            color: white;
            transform: scale(1.05);
        }

        .alert {
            padding: 1rem;
            border-radius: 6px;
            margin-bottom: 1.5rem;
            font-size: 0.9rem;
            box-shadow: var(--shadow);
        }

        .alert-success {
            background-color: #d4edda;
            color: #155724;
            border-left: 4px solid #28a745;
        }

        .alert-danger {
            background-color: #f8d7da;
            color: #721c24;
            border-left: 4px solid #dc3545;
        }

        .no-data {
            text-align: center;
            padding: 2rem;
            color: #6c757d;
            font-size: 1rem;
            font-style: italic;
        }

        @media (max-width: 1024px) {
            .main-content {
                margin-left: 0;
                padding: 1.5rem;
            }

            .document-cards {
                grid-template-columns: 1fr;
            }
        }

        @media (max-width: 768px) {
            .header {
                flex-direction: column;
                gap: 1rem;
                text-align: center;
            }

            .search-container {
                max-width: 100%;
            }

            th, td {
                padding: 0.75rem;
                font-size: 0.85rem;
            }
        }
    </style>
</head>
<body>
    <!-- Sidebar Component -->
    <x-sidebar></x-sidebar>

    <!-- Main Content Area -->
    <div class="main-content">
        <!-- Header -->
        <div class="header">
            <h1>Document Management</h1>
            <div class="search-container">
                <div class="search-icon">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M11 19C15.4183 19 19 15.4183 19 11C19 6.58172 15.4183 3 11 3C6.58172 3 3 6.58172 3 11C3 15.4183 6.58172 19 11 19Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M21 21L16.65 16.65" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </div>
                <input type="text" placeholder="Search documents..." id="document-search" />
            </div>
        </div>

        <!-- Success and Error Alerts -->
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Document Cards -->
        <div class="document-cards">
            <!-- Barangay Certificate Card -->
            <div class="document-card">
                <div class="doc-header">
                    <div class="doc-icon">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M14 2H6C5.46957 2 4.96086 2.21071 4.58579 2.58579C4.21071 2.96086 4 3.46957 4 4V20C4 20.5304 4.21071 21.0391 4.58579 21.4142C4.96086 21.7893 5.46957 22 6 22H18C18.5304 22 19.0391 21.7893 19.4142 21.4142C19.7893 21.0391 20 20.5304 20 20V8L14 2Z" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M14 2V8H20" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M16 13H8" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M16 17H8" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M10 9H9H8" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </div>
                    <div class="doc-title">
                        <h2>Barangay Certificate</h2>
                        <p>Official document of residency and good moral character</p>
                    </div>
                </div>
                <div class="doc-body">
                    <div class="document-details">
                        <h3>Certificate Information</h3>
                        <ul class="info-list">
                            <li>
                                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M12 22C17.5228 22 22 17.5228 22 12C22 6.47715 17.5228 2 12 2C6.47715 2 2 6.47715 2 12C2 17.5228 6.47715 22 12 22Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M12 6V12L16 14" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                                Processing time: 1-2 business days
                            </li>
                            <li>
                                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M21 15V19C21 19.5304 20.7893 20.0391 20.4142 20.4142C20.0391 20.7893 19.5304 21 19 21H5C4.46957 21 3.96086 20.7893 3.58579 20.4142C3.21071 20.0391 3 19.5304 3 19V15" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M7 10L12 15L17 10" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M12 15V3" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                                Downloadable PDF format
                            </li>
                            <li>
                                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M12 22C17.5228 22 22 17.5228 22 12C22 6.47715 17.5228 2 12 2C6.47715 2 2 6.47715 2 12C2 17.5228 6.47715 22 12 22Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M9 12H15" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M12 9V15" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                                Valid for 6 months from date of issuance
                            </li>
                        </ul>
                    </div>
                    
                    <div class="form-group">
                        <label class="form-label">Purpose of Certificate</label>
                        <select class="form-control" id="certificate-purpose" name="certificate_purpose">
                            <option value="">Select purpose</option>
                            <option value="employment">Employment</option>
                            <option value="education">Educational Requirement</option>
                            <option value="loan">Loan Application</option>
                            <option value="travel">Travel Requirement</option>
                            <option value="business">Business Permit</option>
                            <option value="other">Other</option>
                        </select>
                    </div>
                    
                    <div class="form-group">
                        <label class="form-label">Select Resident</label>
                        <input type="text" class="form-control" id="certificate-resident-search" placeholder="Search resident...">
                        <select class="form-control" id="certificate-resident" name="certificate_resident">
                            <option value="">Select a resident</option>
                            @if (!empty($residences) && $residences->count() > 0)
                                @foreach ($residences as $resident)
                                    <option value="{{ $resident->id }}">{{ $resident->first_name }} {{ $resident->last_name }}</option>
                                @endforeach
                            @endif
                        </select>
                    </div>
                    
                    <button class="btn btn-primary btn-full" id="request-certificate">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M12 8V16" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M8 12H16" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M12 22C17.5228 22 22 17.5228 22 12C22 6.47715 17.5228 2 12 2C6.47715 2 2 6.47715 2 12C2 17.5228 6.47715 22 12 22Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                        Request Certificate
                    </button>
                </div>
            </div>
            
            <!-- Barangay Clearance Card -->
            <div class="document-card">
                <div class="doc-header">
                    <div class="doc-icon">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M9 11L12 14L22 4" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M21 12V19C21 19.5304 20.7893 20.0391 20.4142 20.4142C20.0391 20.7893 19.5304 21 19 21H5C4.46957 21 3.96086 20.7893 3.58579 20.4142C3.21071 20.0391 3 19.5304 3 19V5C3 4.46957 3.21071 3.96086 3.58579 3.58579C3.96086 3.21071 4.46957 3 5 3H16" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </div>
                    <div class="doc-title">
                        <h2>Barangay Clearance</h2>
                        <p>Certification that resident has no derogatory record</p>
                    </div>
                </div>
                <div class="doc-body">
                    <div class="document-details">
                        <h3>Clearance Information</h3>
                        <ul class="info-list">
                            <li>
                                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M12 22C17.5228 22 22 17.5228 22 12C22 6.47715 17.5228 2 12 2C6.47715 2 2 6.47715 2 12C2 17.5228 6.47715 22 12 22Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M12 6V12L16 14" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                                Processing time: 2-3 business days
                            </li>
                            <li>
                                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M18 8H19C20.0609 8 21.0783 8.42143 21.8284 9.17157C22.5786 9.92172 23 10.9391 23 12C23 13.0609 22.5786 14.0783 21.8284 14.8284C21.0783 15.5786 20.0609 16 19 16H18" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M2 8H18V17C18 18.0609 17.5786 19.0783 16.8284 19.8284C16.0783 20.5786 15.0609 21 14 21H6C4.93913 21 3.92172 20.5786 3.17157 19.8284C2.42143 19.0783 2 18.0609 2 17V8Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M6 1V4" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M10 1V4" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M14 1V4" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                                Valid for 3 months from date of issuance
                            </li>
                            <li>
                                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M20 6L9 17L4 12" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                                Includes verification of no pending cases
                            </li>
                        </ul>
                    </div>
                    
                    <div class="form-group">
                        <label class="form-label">Purpose of Clearance</label>
                        <select class="form-control" id="clearance-purpose" name="clearance_purpose">
                            <option value="">Select purpose</option>
                            <option value="employment">Employment</option>
                            <option value="business">Business Permit</option>
                            <option value="police">Police Requirement</option>
                            <option value="travel">Travel Requirement</option>
                            <option value="legal">Legal Purposes</option>
                            <option value="other">Other</option>
                        </select>
                    </div>
                    
                    <div class="form-group">
                        <label class="form-label">Select Resident</label>
                        <input type="text" class="form-control" id="clearance-resident-search" placeholder="Search resident...">
                        <select class="form-control" id="clearance-resident" name="clearance_resident">
                            <option value="">Select a resident</option>
                            @if (!empty($residences) && $residences->count() > 0)
                                @foreach ($residences as $resident)
                                    <option value="{{ $resident->id }}">{{ $resident->first_name }} {{ $resident->last_name }}</option>
                                @endforeach
                            @endif
                        </select>
                    </div>
                    
                    <button class="btn btn-accent btn-full" id="request-clearance">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M12 8V16" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M8 12H16" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M12 22C17.5228 22 22 17.5228 22 12C22 6.47715 17.5228 2 12 2C6.47715 2 2 6.47715 2 12C2 17.5228 6.47715 22 12 22Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                        Request Clearance
                    </button>
                </div>
            </div>
        </div>

        
    </div>

    <script>
        // CSRF token for AJAX requests
        const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

        // Function to update select options
        function updateSelectOptions(selectElement, residents) {
            selectElement.innerHTML = '<option value="">Select a resident</option>';
            residents.forEach(resident => {
                const option = document.createElement('option');
                option.value = resident.id;
                option.textContent = resident.name;
                selectElement.appendChild(option);
            });
        }

        // Function to show alerts
        function showAlert(message, type = 'success') {
            const alertContainer = document.createElement('div');
            alertContainer.className = `alert alert-${type}`;
            alertContainer.textContent = message;
            document.querySelector('.main-content').prepend(alertContainer);
            setTimeout(() => alertContainer.remove(), 5000);
        }
        // Search functionality for certificate resident
        const certificateSearchInput = document.getElementById('certificate-resident-search');
        const certificateSelect = document.getElementById('certificate-resident');

        certificateSearchInput.addEventListener('input', async () => {
            const query = certificateSearchInput.value.trim();
            if (query.length < 2) {
                updateSelectOptions(certificateSelect, initialResidents);
                return;
            }

            try {
                const response = await fetch('/documents/search-residents', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': csrfToken,
                    },
                    body: JSON.stringify({ query }),
                });

                if (!response.ok) {
                    throw new Error('Network response was not ok');
                }

                const residents = await response.json();
                updateSelectOptions(certificateSelect, residents);
            } catch (error) {
                console.error('Error fetching residents:', error);
                showAlert('Failed to search residents', 'danger');
            }
        });

        // Search functionality for clearance resident
        const clearanceSearchInput = document.getElementById('clearance-resident-search');
        const clearanceSelect = document.getElementById('clearance-resident');

        clearanceSearchInput.addEventListener('input', async () => {
            const query = clearanceSearchInput.value.trim();
            if (query.length < 2) {
                updateSelectOptions(clearanceSelect, initialResidents);
                return;
            }

            try {
                const response = await fetch('/documents/search-residents', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': csrfToken,
                    },
                    body: JSON.stringify({ query }),
                });

                if (!response.ok) {
                    throw new Error('Network response was not ok');
                }

                const residents = await response.json();
                updateSelectOptions(clearanceSelect, residents);
            } catch (error) {
                console.error('Error fetching residents:', error);
                showAlert('Failed to search residents', 'danger');
            }
        });

        // Request Certificate
        document.getElementById('request-certificate').addEventListener('click', async () => {
            const purpose = document.getElementById('certificate-purpose').value;
            const residentId = document.getElementById('certificate-resident').value;

            if (!purpose || !residentId) {
                showAlert('Please select a purpose and resident', 'danger');
                return;
            }

            try {
                const response = await fetch('/documents/request-certificate', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': csrfToken,
                    },
                    body: JSON.stringify({ purpose, resident_id: residentId }),
                });

                const result = await response.json();
                if (response.ok) {
                    showAlert(result.message || 'Certificate requested successfully');
                    document.getElementById('certificate-purpose').value = '';
                    document.getElementById('certificate-resident').value = '';
                    certificateSearchInput.value = '';
                    refreshDocumentsList();
                } else {
                    showAlert(result.message || 'Failed to request certificate', 'danger');
                }
            } catch (error) {
                console.error('Error requesting certificate:', error);
            }
        });

        // Request Clearance
        document.getElementById('request-clearance').addEventListener('click', async () => {
            const purpose = document.getElementById('clearance-purpose').value;
            const residentId = document.getElementById('clearance-resident').value;

            if (!purpose || !residentId) {
                showAlert('Please select a purpose and resident', 'danger');
                return;
            }

            try {
                const response = await fetch('/documents/request-clearance', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': csrfToken,
                    },
                    body: JSON.stringify({ purpose, resident_id: residentId }),
                });

                const result = await response.json();
                if (response.ok) {
                    showAlert(result.message || 'Clearance requested successfully');
                    document.getElementById('clearance-purpose').value = '';
                    document.getElementById('clearance-resident').value = '';
                    clearanceSearchInput.value = '';
                    refreshDocumentsList();
                } else {
                    showAlert(result.message || 'Failed to request clearance', 'danger');
                }
            } catch (error) {
                console.error('Error requesting clearance:', error);
            }
        });

       
    </script>
</body>
</html>
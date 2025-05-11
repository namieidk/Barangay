<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>Document Preview - {{ $document->type === 'certificate' ? 'Barangay Certificate' : 'Barangay Clearance' }}</title>
    <style>
        :root {
            --primary: rgb(132, 177, 132);
            --primary-light: rgb(90, 144, 90);
            --primary-dark: black;
            --accent: rgb(132, 177, 132);
            --accent-light: rgb(90, 144, 90);
            --light-bg: #f8f9fa;
            --text-light: #ffffff;
            --text-dark: black;
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
            padding: 2rem;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 2rem;
            padding-bottom: 1rem;
            border-bottom: 1px solid var(--border-color);
            background-color: white;
            border-radius: 8px;
            padding: 1rem 2rem;
            box-shadow: var(--shadow);
        }

        .header h1 {
            font-size: 2rem;
            font-weight: 700;
            letter-spacing: 0.5px;
        }

        .document-preview {
            background: white;
            border-radius: 12px;
            box-shadow: var(--card-shadow);
            padding: 2rem;
            max-width: 800px;
            margin: 0 auto;
            border: 1px solid var(--border-color);
        }

        .document-preview .header-info {
            text-align: center;
            margin-bottom: 2rem;
        }

        .document-preview .header-info p {
            margin: 0;
            font-size: 0.9rem;
        }

        .document-preview h2 {
            text-align: center;
            font-size: 1.5rem;
            font-weight: 600;
            margin-bottom: 1rem;
            border-bottom: 1px solid var(--primary-light);
            padding-bottom: 0.5rem;
        }

        .document-details {
            margin-bottom: 2rem;
        }

        .document-details ul {
            list-style: none;
        }

        .document-details li {
            display: flex;
            justify-content: space-between;
            margin-bottom: 0.75rem;
            font-size: 0.95rem;
        }

        .document-details li span:first-child {
            font-weight: 500;
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
            color: var(--text-light);
        }

        .btn-primary {
            background-color: var(--primary);
        }

        .btn-primary:hover {
            background-color: var(--primary-light);
            transform: translateY(-2px);
        }

        .btn svg {
            margin-right: 0.5rem;
        }

        .status {
            display: inline-block;
            padding: 0.25rem 0.75rem;
            border-radius: 50px;
            font-size: 0.8rem;
            font-weight: 500;
            text-transform: capitalize;
        }

        .status-pending {
            background-color: #fff3cd;
            color: #856404;
        }

        .status-approved {
            background-color: #d4edda;
            color: #155724;
        }

        .status-rejected {
            background-color: #f8d7da;
            color: #721c24;
        }

        @media (max-width: 768px) {
            .main-content {
                padding: 1rem;
            }

            .header {
                flex-direction: column;
                gap: 1rem;
                text-align: center;
            }

            .document-preview {
                padding: 1rem;
            }
        }
    </style>
</head>
<body>
    <!-- Main Content Area -->
    <div class="main-content">
        <!-- Header -->
        <div class="header">
            <h1>Document Preview</h1>
            <a href="{{ url()->previous() }}" class="btn btn-primary">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M15 19L8 12L15 5" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
                Back
            </a>
        </div>

        <!-- Document Preview -->
        <div class="document-preview">
            <div class="header-info">
                <p>Republic of the Philippines</p>
                <p>City of Davao</p>
                <p>Barangay Incio</p>
                <p><strong>OFFICE OF THE PUNONG BARANGAY</strong></p>
            </div>

            <h2>{{ $document->type === 'certificate' ? 'Barangay Certificate' : 'Barangay Clearance' }}</h2>

            <div class="document-details">
                <ul>
                    <li>
                        <span>Document ID:</span>
                        <span>{{ $document->id }}</span>
                    </li>
                    <li>
                        <span>Resident Name:</span>
                        <span>{{ $document->first_name }} {{ $document->last_name }}</span>
                    </li>
                    <li>
                        <span>Document Type:</span>
                        <span>{{ ucfirst($document->type) }}</span>
                    </li>
                    <li>
                        <span>Purpose:</span>
                        <span>{{ ucfirst($document->purpose) }}</span>
                    </li>
                    <li>
                        <span>Date Requested:</span>
                        <span>{{ $document->date_requested->format('F j, Y') }}</span>
                    </li>
                    
                </ul>
            </div>

            <a href="{{ route('documents.download', $document->id) }}" class="btn btn-primary">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M21 15V19C21 19.5304 20.7893 20.0391 20.4142 20.4142C20.0391 20.7893 19.5304 21 19 21H5C4.46957 21 3.96086 20.7893 3.58579 20.4142C3.21071 20.0391 3 19.5304 3 19V15" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M7 10L12 15L17 10" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M12 15V3" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
                Download PDF
            </a>
        </div>
    </div>
</body>
</html>
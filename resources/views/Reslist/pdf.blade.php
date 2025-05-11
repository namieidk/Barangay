<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>{{ $document->type === 'certificate' ? 'Barangay Certificate' : 'Barangay Clearance' }}</title>
    <style>
        body {
            font-family: 'DejaVu Sans', sans-serif;
            font-size: 12px;
            color: #000;
            line-height: 1.6;
            margin: 0;
            padding: 0;
        }

        .container {
            width: 100%;
            margin: 0 auto;
            padding: 20px;
            max-width: 800px;
        }

        .header-info {
            text-align: center;
            margin-bottom: 30px;
        }

        .header-info p {
            margin: 0;
        }

        h2 {
            text-align: center;
            font-size: 18px;
            font-weight: 600;
            margin-bottom: 20px;
            border-bottom: 1px solid #000;
            padding-bottom: 10px;
        }

        .document-details {
            margin-bottom: 30px;
        }

        .document-details ul {
            list-style: none;
            padding: 0;
        }

        .document-details li {
            display: flex;
            justify-content: space-between;
            margin-bottom: 10px;
        }

        .document-details li span:first-child {
            font-weight: 500;
        }

        .status {
            display: inline-block;
            padding: 3px 10px;
            border-radius: 20px;
            font-size: 10px;
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

        .footer {
            text-align: center;
            margin-top: 50px; 
            font-size: 10px;
            color: #555;
            padding-top: 20px; 
            border-top: 1px solid #ddd; 
        }

        .footer p {
            margin: 5px 0;
        }

        .certificate-text, .clearance-text {
            text-align: left; 
            margin-bottom: 30px;
            margin-left: 20px; 
        }

        .certificate-text p, .clearance-text p {
            margin: 5px 0;
            margin-bottom: 20px;
            margin-left: 20px; 
        }

        .signature {
            text-align: right;
            margin-top: 100px;
            margin-left: 10px; 
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header-info">
            <p>Republic of the Philippines</p>
            <p>City of Davao</p>
            <p>Barangay Incio</p>
            <p><strong>OFFICE OF THE PUNONG BARANGAY</strong></p>
        </div>

        <h2>{{ $document->type === 'certificate' ? 'Barangay Certificate' : 'Barangay Clearance' }}</h2>

        @if($document->type === 'clearance')
            <div class="clearance-text">
                <p>TO WHOM IT MAY CONCERN:</p>
                <p>This is to certify that <strong>{{ $document->first_name }} {{ $document->last_name }}</strong>, a resident of Barangay Incio, Davao City, is known to be of good moral character and law-abiding citizen in the community.</p>
                <p>To certify further, that he/she has no derogatory and/or criminal records filed in this barangay.</p>
                <p>ISSUED this <strong>{{ now()->format('jS') }}</strong> day of <strong>{{ now()->format('F') }}</strong>, 2025, at Barangay Incio, Davao City, upon request of the interested party for whatever legal purposes it may serve.</p>
            </div>
            <div class="signature">
                <p><strong>Glaiza Mae Incio</strong></p>
                <p>Barangay Captain</p>
            </div>
        @else
            <div class="certificate-text">
                <p>TO WHOM IT MAY CONCERN:</p>
                <p>This is to certify that <strong>{{ $document->first_name }} {{ $document->last_name }}</strong> is a bonafide resident of Barangay Incio, Davao City.</p>
                <p>This certification is issued for the purpose of <strong>{{ ucfirst($document->purpose) }}</strong>.</p>
                <p>ISSUED this <strong>{{ now()->format('jS') }}</strong> day of <strong>{{ now()->format('F') }}</strong>, 2025, at Barangay Incio, Davao City, upon request of the interested party for whatever legal purposes it may serve.</p>
            </div>
            
            <div class="signature">
                <p><strong>Glaiza Mae Incio</strong></p>
                <p>Barangay Captain</p>
            </div>
        @endif

        <div class="footer">
            <p>Generated on: {{ $currentDate }}</p>
            <p>O.R. No: _________ | Date Issued:{{ $currentDate }}| Doc. Stamp: Paid</p>
        </div>
    </div>
</body>
</html>
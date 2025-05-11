<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Residents Information Report</title>
    <style>
        body { font-family: 'DejaVu Sans', sans-serif; font-size: 10px; }
        .container { width: 100%; margin: 0 auto; }
        h1 { text-align: center; border-bottom: 1px solid #000; padding-bottom: 5px; margin-bottom: 20px; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #ddd; padding: 6px; text-align: left; }
        th { background-color: #f2f2f2; font-weight: bold; }
        .text-center { text-align: center; }
        .page-break { page-break-after: always; }
        .header-info { text-align: center; margin-bottom: 20px; }
        .header-info p { margin: 0; }
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

        <h1>Residents Information Report</h1>
        <p class="text-center">Generated on: {{ $currentDate }}</p>

        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Last Name</th>
                    <th>First Name</th>
                    <th>Middle Name</th>
                    <th>Purok</th>
                    <th>Address</th>
                    <th>Birth Date</th>
                    <th>Gender</th>
                    <th>Contact No.</th>
                    <th>Family Members</th>
                </tr>
            </thead>
            <tbody>
                @if(isset($residents) && count($residents) > 0)
                    @foreach ($residents as $resident)
                        <tr>
                            <td>{{ $resident->id }}</td>
                            <td>{{ $resident->last_name }}</td>
                            <td>{{ $resident->first_name }}</td>
                            <td>{{ $resident->middle_name ?? 'N/A' }}</td>
                            <td>{{ $resident->purok ?? 'N/A' }}</td>
                            <td>{{ $resident->address ?? 'N/A' }}</td>
                            <td>{{ $resident->birth_date ? \Carbon\Carbon::parse($resident->birth_date)->format('M d, Y') : 'N/A' }}</td>
                            <td>{{ $resident->gender ?? 'N/A' }}</td>
                            <td>{{ $resident->phone_number ?? 'N/A' }}</td>
                            <td>{{ $resident->family_members_string }}</td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="10" class="text-center">No residents data found.</td>
                    </tr>
                @endif
            </tbody>
        </table>
    </div>
</body>
</html>
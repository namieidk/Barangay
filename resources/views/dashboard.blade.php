<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BRGY INCIO, DAVAO CITY SYSTEM</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.0/flowbite.min.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/4.4.0/chart.umd.min.js" rel="stylesheet" />
    <style>
        :root {
            --primary: #2D5F2E;
            --primary-light: #4A7D4B;
            --primary-dark: #1D4D1F;
            --secondary: #8FB98A;
            --secondary-light: #C5E2C1;
            --text-light: #FFFFFF;
            --text-dark: #1A1A1A;
            --accent: #FFCD29;
            --bg-light: #F8FFF5;
            --border-radius: 8px;
            --shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        body {
            font-family: 'Inter', sans-serif;
            background-color: var(--bg-light);
            margin: 0;
            padding: 0;
        }

        .logo-container {
            padding: 1.5rem 0;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .sidebar {
            background: linear-gradient(180deg, var(--primary-dark) 0%, var(--primary) 100%);
            box-shadow: var(--shadow);
        }

        .sidebar-link {
            color: var(--text-light);
            border-radius: var(--border-radius);
            transition: all 0.3s ease;
            margin-bottom: 0.5rem;
        }

        .sidebar-link:hover, .sidebar-link.active {
            background-color: rgba(255, 255, 255, 0.1);
            padding-left: 1.75rem;
        }

        .header {
            background: linear-gradient(90deg, var(--primary) 0%, var(--primary-light) 100%);
            box-shadow: var(--shadow);
            height: 64px;
        }

        .card {
            background-color: white;
            border-radius: var(--border-radius);
            box-shadow: var(--shadow);
            transition: transform 0.3s ease;
        }

        .card:hover {
            transform: translateY(-5px);
        }

        .card-header {
            background-color: var(--primary);
            color: var(--text-light);
            border-radius: var(--border-radius) var(--border-radius) 0 0;
            padding: 1rem;
        }

        .stat-card {
            border-left: 4px solid var(--primary);
        }

        .table-header {
            background-color: var(--primary);
            color: var(--text-light);
        }

        .table-row:nth-child(even) {
            background-color: var(--secondary-light);
        }

        .chart-container {
            height: 300px; /* Increased height for larger charts */
            width: 100%;
        }

        .badge {
            background-color: var(--accent);
            color: var(--text-dark);
            padding: 0.25rem 0.75rem;
            border-radius: 9999px;
            font-weight: 600;
            font-size: 0.75rem;
        }

        .datetime-container {
            background-color: rgba(255, 255, 255, 0.1);
            border-radius: var(--border-radius);
            padding: 0.75rem;
        }

        .bg-4A6936-50-opacity {
            background-color: rgba(74, 105, 54, 0.5);
        }

        .bg-black-50-opacity {
            background-color: rgba(2, 3, 1, 0.5);
        }
    </style>
</head>
<body class="bg-4A6936-50-opacity min-h-screen flex">
    <!-- Header -->
    <div class="fixed top-0 left-64 w-[calc(100%-16rem)] bg-[#5A7A46] text-white p-4 text-2xl font-bold z-50 text-center">
        BRGY INCIO, DAVAO CITY SYSTEM
    </div>

    <x-sidebar></x-sidebar>

    <!-- Main Content Area -->
    <div class="flex-1 ml-64 pt-20"> <!-- Adjusted margin-left to align with header -->
        <div class="p-8 w-full max-w-7xl mx-auto"> <!-- Increased max-width and padding -->
            <!-- Dashboard Heading -->
            <h1 class="text-4xl font-bold mb-8 text-gray-800">Dashboard Overview</h1> <!-- Larger font size -->

            <!-- Stats Cards -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8 mb-8"> <!-- Increased gap -->
                <div class="bg-white rounded-lg shadow-md p-8 stat-card"> <!-- Larger padding -->
                    <div class="flex justify-between items-start">
                        <div>
                            <p class="text-base font-medium text-gray-500">Total Population</p> <!-- Larger text -->
                            <h3 class="text-4xl font-bold text-gray-800 mt-2">2,854</h3> <!-- Larger font -->
                            <p class="text-sm text-green-600 mt-2">
                                <span class="font-medium">↑ 3.2%</span> from last month
                            </p>
                        </div>
                        <div class="bg-green-100 p-4 rounded-lg">
                            <svg class="w-8 h-8 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                            </svg>
                        </div>
                    </div>
                </div>

                <div class="bg-white rounded-lg shadow-md p-8 stat-card">
                    <div class="flex justify-between items-start">
                        <div>
                            <p class="text-base font-medium text-gray-500">Male</p>
                            <h3 class="text-4xl font-bold text-gray-800 mt-2">1,382</h3>
                            <p class="text-sm text-green-600 mt-2">
                                <span class="font-medium">↑ 2.8%</span> from last month
                            </p>
                        </div>
                        <div class="bg-blue-100 p-4 rounded-lg">
                            <svg class="w-8 h-8 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                            </svg>
                        </div>
                    </div>
                </div>

                <div class="bg-white rounded-lg shadow-md p-8 stat-card">
                    <div class="flex justify-between items-start">
                        <div>
                            <p class="text-base font-medium text-gray-500">Female</p>
                            <h3 class="text-4xl font-bold text-gray-800 mt-2">1,472</h3>
                            <p class="text-sm text-green-600 mt-2">
                                <span class="font-medium">↑ 3.5%</span> from last month
                            </p>
                        </div>
                        <div class="bg-pink-100 p-4 rounded-lg">
                            <svg class="w-8 h-8 text-pink-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 12a4 4 0 100-8 4 4 0 000 8zm-2 2a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                            </svg>
                        </div>
                    </div>
                </div>

                <div class="bg-white rounded-lg shadow-md p-8 stat-card">
                    <div class="flex justify-between items-start">
                        <div>
                            <p class="text-base font-medium text-gray-500">Registered Voters</p>
                            <h3 class="text-4xl font-bold text-gray-800 mt-2">1,924</h3>
                            <p class="text-sm text-green-600 mt-2">
                                <span class="font-medium">↑ 1.2%</span> from last month
                            </p>
                        </div>
                        <div class="bg-purple-100 p-4 rounded-lg">
                            <svg class="w-8 h-8 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Main Content Grid -->
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8"> <!-- Increased gap -->
                <!-- Officials Table -->
                <div class="lg:col-span-1">
                    <div class="bg-white rounded-lg shadow-md">
                        <div class="bg-green-700 text-white p-6 rounded-t-lg"> <!-- Larger padding -->
                            <h2 class="text-xl font-semibold">Current Barangay Officials</h2> <!-- Larger font -->
                        </div>
                        <div class="overflow-x-auto">
                            <table class="w-full text-base text-left text-gray-700"> <!-- Larger text -->
                                <thead class="text-sm uppercase bg-gray-50 border-b">
                                    <tr>
                                        <th scope="col" class="px-6 py-4">Full Name</th> <!-- Larger padding -->
                                        <th scope="col" class="px-6 py-4">Committee</th>
                                        <th scope="col" class="px-6 py-4">Position</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="border-b hover:bg-gray-50">
                                        <td class="px-6 py-4 font-medium">Juan Dela Cruz</td>
                                        <td class="px-6 py-4">Peace and Order</td>
                                        <td class="px-6 py-4">Barangay Captain</td>
                                    </tr>
                                    <tr class="border-b hover:bg-gray-50">
                                        <td class="px-6 py-4 font-medium">Maria Santos</td>
                                        <td class="px-6 py-4">Health and Sanitation</td>
                                        <td class="px-6 py-4">Secretary</td>
                                    </tr>
                                    <tr class="border-b hover:bg-gray-50">
                                        <td class="px-6 py-4 font-medium">Pedro Reyes</td>
                                        <td class="px-6 py-4">Finance</td>
                                        <td class="px-6 py-4">Treasurer</td>
                                    </tr>
                                    <tr class="border-b hover:bg-gray-50">
                                        <td class="px-6 py-4 font-medium">Ana Lim</td>
                                        <td class="px-6 py-4">Education</td>
                                        <td class="px-6 py-4">Kagawad</td>
                                    </tr>
                                    <tr class="hover:bg-gray-50">
                                        <td class="px-6 py-4 font-medium">Ramon Garcia</td>
                                        <td class="px-6 py-4">Infrastructure</td>
                                        <td class="px-6 py-4">Kagawad</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="p-6 text-center">
                            <a href="#" class="text-base text-green-600 hover:text-green-800">View All Officials</a> <!-- Larger text -->
                        </div>
                    </div>
                </div>

                <!-- Charts Section -->
                <div class="lg:col-span-2">
                    <div class="bg-white rounded-lg shadow-md p-8 mb-8"> <!-- Larger padding -->
                        <div class="flex justify-between items-center mb-6">
                            <h2 class="text-xl font-semibold text-gray-800">Population Demographics</h2> <!-- Larger font -->
                            <select class="bg-gray-50 border border-gray-300 text-gray-700 text-base rounded-lg focus:ring-green-500 focus:border-green-500 p-3"> <!-- Larger select -->
                                <option>Last 30 Days</option>
                                <option>Last 90 Days</option>
                                <option>This Year</option>
                            </select>
                        </div>
                        <div class="chart-container">
                            <canvas id="populationChart"></canvas>
                        </div>
                    </div>

                    <div class="bg-white rounded-lg shadow-md p-8"> <!-- Larger padding -->
                        <div class="flex justify-between items-center mb-6">
                            <h2 class="text-xl font-semibold text-gray-800">Age Distribution</h2> <!-- Larger font -->
                            <button class="text-base text-green-600 hover:text-green-800"> <!-- Larger text -->
                                View Details
                            </button>
                        </div>
                        <div class="chart-container">
                            <canvas id="ageChart"></canvas>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Blotter Records Summary -->
            <div class="mt-8">
                <h2 class="text-3xl font-bold mb-6 text-gray-800">Blotter Records Summary</h2> <!-- Larger font -->
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8"> <!-- Increased gap -->
                    <!-- Settled Cases Card -->
                    <div class="bg-green-100 p-6 rounded-lg flex flex-col items-center shadow-md"> <!-- Larger padding -->
                        <h3 class="text-base font-medium text-green-800 mb-4">Settled Cases</h3> <!-- Larger text -->
                        <span class="text-4xl font-bold text-green-700">28</span> <!-- Larger font -->
                    </div>

                    <!-- Scheduled Cases Card -->
                    <div class="bg-blue-100 p-6 rounded-lg flex flex-col items-center shadow-md">
                        <h3 class="text-base font-medium text-blue-800 mb-4">Scheduled Cases</h3>
                        <span class="text-4xl font-bold text-blue-700">12</span>
                    </div>

                    <!-- Unsettled Cases Card -->
                    <div class="bg-red-100 p-6 rounded-lg flex flex-col items-center shadow-md">
                        <h3 class="text-base font-medium text-red-800 mb-4">Unsettled Cases</h3>
                        <span class="text-4xl font-bold text-red-700">7</span>
                    </div>

                    <!-- Unscheduled Cases Card -->
                    <div class="bg-yellow-100 p-6 rounded-lg flex flex-col items-center shadow-md">
                        <h3 class="text-base font-medium text-yellow-800 mb-4">Unscheduled Cases</h3>
                        <span class="text-4xl font-bold text-yellow-700">5</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Chart.js initialization (example)
        document.addEventListener('DOMContentLoaded', function() {
            new Chart(document.getElementById('populationChart'), {
                type: 'bar',
                data: {
                    labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
                    datasets: [{
                        label: 'Population',
                        data: [1200, 1250, 1300, 1350, 1400, 1450],
                        backgroundColor: 'rgba(45, 95, 46, 0.2)',
                        borderColor: 'rgba(45, 95, 46, 1)',
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        y: { beginAtZero: true }
                    }
                }
            });

            new Chart(document.getElementById('ageChart'), {
                type: 'pie',
                data: {
                    labels: ['0-18', '19-35', '36-50', '51+'],
                    datasets: [{
                        data: [30, 40, 20, 10],
                        backgroundColor: ['#2D5F2E', '#4A7D4B', '#8FB98A', '#C5E2C1']
                    }]
                }
            });
        });
    </script>
</body>
</html>
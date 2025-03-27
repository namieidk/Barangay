<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>BRGY INCIO, DAVAO CITY SYSTEM</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style>
        .bg-4A6936-50-opacity {
            background-color: rgba(74, 105, 54, 0.5);
        }
    </style>
</head>
<body class="bg-4A6936-50-opacity min-h-screen flex">
    <!-- Rest of your content goes here -->

    <div class="fixed top-0 left-64 w-[calc(100%-16rem)] bg-[#5A7A46] text-white p-4 text-2xl font-bold z-50 text-center">
        BRGY INCIO, DAVAO CITY SYSTEM
    </div>

    <!-- Sidebar -->
    <x-sidebar></x-sidebar>

    <!-- Main Content Area -->
    <div class="flex-1 ml-20 pt-20">
        <div class="p-10 w-full max-w-5xl mx-auto">
            <!-- Dashboard Heading -->
            <h1 class="text-5xl font-bold mb-8 pl-0 mt-[-50px]">New Residents</h1>

            <!-- Form Section -->
            <div class="bg-[#385327] mr-[-180px]">
                <!-- Tab Navigation -->
                <div class="flex text-white">
                    <button id="personalInfoBtn" class="bg-[#385327] py-2 px-4 font-medium hover:bg-[#4A6936] focus:outline-none" onclick="showTab('personalInfo')">Personal Info</button>
                    <button id="otherInfoBtn" class="bg-[#385327] py-2 px-4 font-medium hover:bg-[#4A6936] focus:outline-none" onclick="showTab('otherInfo')">Other Info</button>
                    <button id="contactsBtn" class="bg-[#385327] py-2 px-4 font-medium hover:bg-[#4A6936] focus:outline-none" onclick="showTab('contacts')">Contacts</button>
                </div>

                <!-- Tab Content -->
                <div id="personalInfo" class="p-8 bg-[#77a659] hidden">
                    <x-PersonalInfo></x-PersonalInfo>
                </div>
                <div id="otherInfo" class="p-8 bg-[#77a659] hidden">
                    <x-OtherInfo></x-OtherInfo>
                </div>
                <div id="contacts" class="p-8 bg-[#77a659] hidden">
                    <x-Contacts></x-Contacts>
                </div>
            </div>
        </div>
    </div>

    <script>
        function showTab(tabName) {
            // Hide all tab content
            document.getElementById('personalInfo').classList.add('hidden');
            document.getElementById('otherInfo').classList.add('hidden');
            document.getElementById('contacts').classList.add('hidden');

            // Remove active styling from all buttons
            document.getElementById('personalInfoBtn').classList.remove('bg-green-900');
            document.getElementById('otherInfoBtn').classList.remove('bg-green-900');
            document.getElementById('contactsBtn').classList.remove('bg-green-900');

            // Show the selected tab content and style the active button
            document.getElementById(tabName).classList.remove('hidden');
            document.getElementById(tabName + 'Btn').classList.add('bg-green-900');
        }

        // Show Personal Info tab by default
        showTab('personalInfo');
    </script>
</body>
</html>
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
        <h1 class="text-5xl font-bold mb-8 pl-0 mt-[-50px]">New Residents</h1>
            <!-- Form Section -->
            <div class="bg-[#385327] mr-[-180px]">
                <!-- Tab Navigation -->
                <div class="flex text-white">
                    <x-resbar href="/ResRecPerInfo" active="{{ request()->is('PersonalInfo') }}" id="personalInfoBtn">Personal Info</x-resbar>
                    <x-resbar href="/ResRecOtherInfo" active="{{ request()->is('OtherInfo') }}" id="otherInfoBtn">Other Info</x-resbar>
                    <x-resbar href="/ResRecContacts" active="{{ request()->is('Contacts') }}" id="contactsBtn">Contacts</x-resbar>
                    <x-resbar href="/BrgyClear" active="{{ request()->is('BrgyClear') }}" id="brgyClearBtn">Brgy Clearance</x-resbar>
                </div>
                <x-Brgy-Clearance></x-Brgy-Clearance>
            </div>
        </div>
    </div>

    
</body>
</html>
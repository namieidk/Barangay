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
                    <x-resbar href="/PersonalInfo" active="{{ request()->is('PersonalInfo') }}" id="personalInfoBtn">Head of The Family</x-resbar>
                    <x-resbar href="/FamMember" active="{{ request()->is('FamMem') }}" id="FamMemBtn">Family Member</x-resbar>
                </div>
                <x-Personal-Info></x-Personal-Info>
            </div>
        </div>
    </div>

    
</body>
</html>
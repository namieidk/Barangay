<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>BRGY INCIO, DAVAO CITY SYSTEM</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    
</head>
<body class="bg-[#FBF5DF] min-h-screen flex">
    <!-- Rest of your content goes here -->

    <!-- Sidebar -->
    <x-sidebar></x-sidebar>

    <!-- Main Content Area -->
    <div class="flex-1 ml-20 pt-14">
        <div class="p-6 w-full max-w-5xl mx-auto">
            <!-- Dashboard Heading -->
            <h1 class="text-5xl font-bold mb-8 pl-0 mt-[-50px]">New Residents</h1>

            <!-- Form Section -->
            <div class="bg-[#385327] mr-[-180px]">
                <!-- Tab Navigation -->
                <div class="flex text-white p-2">
                <x-resbar href="/NewRes" active="{{ request()->is('NewRes') }}" id="personalInfoBtn">Head of The Family</x-resbar>
                    <x-resbar href="/FamMember" active="{{ request()->is('Fam-Member') }}" id="Fam-MemberBtn">Family Member</x-resbar>
                </div>
                <x-Fam-Member></x-Fam-Member>
            </div>
        </div>
    </div>

    
</body>
</html>
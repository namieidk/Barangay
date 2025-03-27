<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>BRGY INCIO, DAVAO CITY SYSTEM</title>

    <!-- Include Tailwind CSS -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body class="bg-green-100 flex items-center justify-center min-h-screen">
    <!-- Header -->
    <div class="absolute top-0 left-0 w-full bg-green-700 text-white p-4 text-2xl font-bold">
        BRGY INCIO, DAVAO CITY SYSTEM
    </div>

    <!-- Main Container -->
    <div class="bg-green-700 text-white p-10 rounded-lg shadow-lg flex justify-between items-center w-full max-w-5xl mx-4">
        <!-- Mission and Vision Section -->
        <div class="flex-1 mr-10">
            <h1 class="text-xl font-bold mb-4">Mission</h1>
            <p class="text-lg leading-relaxed mb-6"> <!-- Changed text-base to text-lg -->
                To foster a safe, inclusive, and progressive community by promoting good governance, sustainable development, and active citizen participation. We are committed to delivering efficient public services, enhancing social welfare, and ensuring the well-being of every resident through transparency, unity, and innovation.
            </p>

            <h1 class="text-2xl font-bold mb-4">Vision</h1>
            <p class="text-lg leading-relaxed"> <!-- Changed text-base to text-lg -->
                A harmonious, resilient, and empowered barangay where every citizen enjoys a high quality of life, sustainable economic growth, a secure environment, built on the foundations of integrity, cooperation, and community-driven development.
            </p>
        </div>

        <!-- Logo and Login Form Section -->
        <div class="flex flex-col items-start" >
            <!-- Logo -->
            <img src="{{ asset('/logo.png') }}" alt="Barangay Logo" class="w-40 h-40 mb-6 ml-[-10px]">

            <!-- Login Form -->
            <form method="POST" action="{{ route('login') }}" class="flex flex-col w-full  max-w-xs ml-[-10px] mt-[-30px]">
                @csrf

                <!-- Username Field -->
                <div class="mb-4">
                    <input id="username" type="text" name="username" value="{{ old('username') }}" required autocomplete="username" autofocus placeholder="Username" class="w-full h-10 p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500">
                    @error('username')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Password Field -->
                <div class="mb-4">
                    <input id="password" type="password" name="password" required autocomplete="current-password" placeholder="Password" class="w-full h-10 p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500">
                    @error('password')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Remember Me Checkbox -->
                <div class="flex items-center mb-4">
                    <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }} class="mr-2 h-3 w-3">
                    <label for="remember" class="text-sm">Remember me</label>
                </div>

                <!-- Login Button -->
                <button type="submit" class="w-full h-10 p-3 bg-white text-black border border-gray-300 rounded-full hover:bg-gray-100 flex items-center justify-center">Login</button>

                <!-- Register Link (Optional) -->
                <div class="mt-4 text-center">
                    <a href="{{ route('register') }}" class="text-sm text-gray-300 hover:underline">Register</a>
                </div>
            </form>
        </div>
    </div>
    
</body>
</html>
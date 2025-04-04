<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>BRGY INCIO, DAVAO CITY SYSTEM - Register</title>

    <!-- Include Tailwind CSS -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body class="bg-green-100 flex items-center justify-center h-screen p-4">
    <!-- Main Container (Card) -->
    <div class="bg-white text-black rounded-lg shadow-lg w-[500px] mx-4">
        <!-- Card Header -->
        <div class="p-6 border-b border-gray-200">
            <h2 class="text-2xl font-bold">Create an account</h2>
            <p class="text-sm text-gray-600">Enter your information to register</p>
        </div>

        <!-- Register Form (Card Content) -->
        <form method="POST" action="{{ route('register') }}" class="p-6 space-y-2">
            @csrf

            <!-- Two-column grid for First Name and Last Name -->
            <div class="grid grid-cols-2 gap-4">
                <!-- First Name Field -->
                <div class="space-y-2">
                    <label for="first_name" class="block text-sm font-medium text-gray-700">First Name</label>
                    <input 
                        id="first_name" 
                        type="text" 
                        name="first_name" 
                        value="{{ old('first_name') }}" 
                        required 
                        autofocus 
                        placeholder="John" 
                        class="w-full h-8 p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-green-500 text-sm"
                    >
                    @error('first_name')
                        <span class="text-red-500 text-xs">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Last Name Field -->
                <div class="space-y-2">
                    <label for="last_name" class="block text-sm font-medium text-gray-700">Last Name</label>
                    <input 
                        id="last_name" 
                        type="text" 
                        name="last_name" 
                        value="{{ old('last_name') }}" 
                        required 
                        placeholder="Doe" 
                        class="w-full h-8 p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-green-500 text-sm"
                    >
                    @error('last_name')
                        <span class="text-red-500 text-xs">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <!-- Email Field -->
            <div class="space-y-2">
                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                <input 
                    id="email" 
                    type="email" 
                    name="email" 
                    value="{{ old('email') }}" 
                    required 
                    autocomplete="email" 
                    placeholder="john.doe@example.com" 
                    class="w-full h-8 p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-green-500 text-sm"
                >
                @error('email')
                    <span class="text-red-500 text-xs">{{ $message }}</span>
                @enderror
            </div>

            <!-- Username Field -->
            <div class="space-y-2">
                <label for="username" class="block text-sm font-medium text-gray-700">Username</label>
                <input 
                    id="username" 
                    type="text" 
                    name="username" 
                    value="{{ old('username') }}" 
                    required 
                    autocomplete="username" 
                    placeholder="johndoe" 
                    class="w-full h-8 p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-green-500 text-sm"
                >
                @error('username')
                    <span class="text-red-500 text-xs">{{ $message }}</span>
                @enderror
            </div>

            <!-- Password Field -->
            <div class="space-y-2">
                <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                <input 
                    id="password" 
                    type="password" 
                    name="password" 
                    required 
                    autocomplete="new-password" 
                    placeholder="••••••••" 
                    class="w-full h-8 p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-green-500 text-sm"
                >
                @error('password')
                    <span class="text-red-500 text-xs">{{ $message }}</span>
                @enderror
            </div>

            <!-- Confirm Password Field -->
            <div class="space-y-2">
                <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Confirm Password</label>
                <input 
                    id="password_confirmation" 
                    type="password" 
                    name="password_confirmation" 
                    required 
                    autocomplete="new-password" 
                    placeholder="••••••••" 
                    class="w-full h-8 p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-green-500 text-sm"
                >
                @error('password_confirmation')
                    <span class="text-red-500 text-xs">{{ $message }}</span>
                @enderror
            </div>

            <!-- Register Button (Card Footer) -->
            <div class="pt-2">
                <button 
                    type="submit" 
                    class="w-full h-10 bg-green-700 text-white rounded-md hover:bg-green-800 focus:outline-none focus:ring-2 focus:ring-green-500 text-base font-semibold"
                >
                    {{ __('Register') }}
                </button>
            </div>

            <!-- Back to Login Link -->
            <div class="flex justify-center pt-2">
                <a href="{{ route('login') }}" class="text-xs text-gray-600 hover:underline">
                    {{ __('Back to Login') }}
                </a>
            </div>
        </form>
    </div>
</body>
</html>

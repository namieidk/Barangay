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
    <div class="absolute top-0 left-0 w-full bg-[#385327] text-white p-4 text-2xl font-bold">
        BRGY INCIO, DAVAO CITY SYSTEM
    </div>

    <!-- Main Container -->
    <div class="bg-[#77a659] text-white p-10 rounded-lg shadow-lg flex justify-between items-center w-full max-w-5xl mx-4">
        <!-- Mission and Vision Section -->
        <div class="flex-1 mr-10">
            <h1 class="text-xl font-bold mb-4">Mission</h1>
            <p class="text-lg leading-relaxed mb-6">
                To foster a safe, inclusive, and progressive community by promoting good governance, sustainable development, and active citizen participation. We are committed to delivering efficient public services, enhancing social welfare, and ensuring the well-being of every resident through transparency, unity, and innovation.
            </p>

            <h1 class="text-2xl font-bold mb-4">Vision</h1>
            <p class="text-lg leading-relaxed">
                A harmonious, resilient, and empowered barangay where every citizen enjoys a high quality of life, sustainable economic growth, a secure environment, built on the foundations of integrity, cooperation, and community-driven development.
            </p>
        </div>

        <!-- Logo and Login Form Section -->
        <div class="flex flex-col items-start">
            <!-- Login Form -->
            <form method="POST" action="{{ route('login') }}" class="flex flex-col w-full max-w-xs ml-[-10px] mt-[-30px]">
                @csrf

                <!-- Logo (Centered) -->
                <div class="flex justify-center mb-6">
                    <img src="{{ asset('/logo.png') }}" alt="Barangay Logo" class="w-40 h-40">
                </div>

                <!-- Session Status -->
                <x-auth-session-status class="mb-4 text-sm text-gray-300" :status="session('status')" />

                <!-- Email Field -->
                <div class="mb-4">
                    <input 
                        id="email" 
                        type="email" 
                        name="email" 
                        value="{{ old('email') }}" 
                        required 
                        autofocus 
                        autocomplete="username" 
                        placeholder="Email" 
                        class="w-full h-10 p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500 text-black"
                    >
                    <x-input-error :messages="$errors->get('email')" class="text-red-500 text-sm mt-1" />
                </div>

                <!-- Password Field -->
                <div class="mb-4">
                    <input 
                        id="password" 
                        type="password" 
                        name="password" 
                        required 
                        autocomplete="current-password" 
                        placeholder="Password" 
                        class="w-full h-10 p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500 text-black"
                    >
                    <x-input-error :messages="$errors->get('password')" class="text-red-500 text-sm mt-1" />
                </div>

                <!-- Remember Me and Forgot Password Row -->
                <div class="flex items-center justify-between w-full mb-4">
                    <div class="flex items-center">
                        <input 
                            type="checkbox" 
                            name="remember" 
                            id="remember_me" 
                            {{ old('remember') ? 'checked' : '' }} 
                            class="mr-2 h-3 w-3 text-indigo-600 focus:ring-indigo-500"
                        >
                        <label for="remember_me" class="text-sm">{{ __('Remember me') }}</label>
                    </div>
                    @if (Route::has('password.request'))
                        <a href="{{ route('password.request') }}" class="text-sm text-gray-300 hover:underline">
                            {{ __('Forgot your password?') }}
                        </a>
                    @endif
                </div>

                <!-- Login Button (Centered) -->
                <div class="flex justify-center">
                    <button 
                        type="submit" 
                        class="w-40 h-12 bg-white text-black border border-gray-300 rounded-full hover:bg-gray-100 flex items-center justify-center text-base font-semibold mb-4"
                    >
                        {{ __('Log in') }}
                    </button>
                </div>

                <!-- Register Link (Centered Below Login Button) -->
                @if (Route::has('register'))
                    <div class="flex justify-center">
                        <a href="{{ route('register') }}" class="text-sm text-gray-300 hover:underline">
                            {{ __('Register') }}
                        </a>
                    </div>
                @endif
            </form>
        </div>
    </div>
</body>
</html>

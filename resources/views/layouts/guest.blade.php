<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name') }} - {{ request()->is('login') ? 'Log in' : 'Register' }}</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700&display=swap" rel="stylesheet" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        .blur-bg { backdrop-filter: blur(10px); }
        @media (max-width: 768px) { .blur-bg { backdrop-filter: none; } }
    </style>
</head>

<body class="min-h-screen bg-gradient-to-br from-[#0f0f0f] via-[#111111] to-[#0d0d0d] text-white antialiased">

    <div class="min-h-screen flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-4xl w-full lg:grid lg:grid-cols-2 lg:gap-12">

            <!-- Left Side – Image + Branding (visible on large screens only) -->
            <div class="hidden lg:block relative rounded-2xl overflow-hidden shadow-2xl">
                <img src="{{ asset('images/login-bg.jpg') }}" alt="PrimeHeadline" class="w-full h-full object-cover">
                <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-transparent"></div>
                <div class="absolute bottom-8 left-8 right-8 text-white">
                    <h1 class="text-4xl font-bold">PrimeHeadline</h1>
                    <p class="mt-2 text-white/90">Log in to explore a smarter way of reading news — accurate, timely, and effortless.</p>
                </div>
            </div>

            <!-- Right Side – Form -->
            <div class="flex flex-col justify-center">
                <div class="max-w-md w-full mx-auto space-y-8">

                    <!-- Dynamic Header – changes automatically -->
                    <div class="text-center">
                        @if(request()->is('login') || request()->routeIs('login'))
                            <h2 class="text-4xl font-bold text-white drop-shadow-md">Welcome back</h2>
                            <p class="mt-3 text-lg text-white/70">Sign in to continue reading</p>
                        @else
                            <h2 class="text-4xl font-bold text-white drop-shadow-md">Create your account</h2>
                            <p class="mt-3 text-lg text-white/70">Join PrimeHeadline today</p>
                        @endif
                    </div>

                    {{ $slot }}

                    <!-- Footer -->
                    <div class="text-center text-sm text-white/40">
                        © {{ date('Y') }} PrimeHeadline. All rights reserved.
                    </div>
                </div>
            </div>

        </div>
    </div>

   @push('scripts')
<script>
    // Prevent browser from auto-filling password after logout
    document.addEventListener('DOMContentLoaded', function () {
        const passwordField = document.getElementById('password');
        if (passwordField && passwordField.value) {
            passwordField.value = '';
        }
    });
</script>
@endpush
    @stack('scripts')
</body>
</html>

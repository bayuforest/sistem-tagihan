<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Login - {{ config('app.name', 'Antapani City Mas') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700&display=swap" rel="stylesheet" />
        
        <!-- Tailwind CDN for immediate styling without build -->
        <script src="https://cdn.tailwindcss.com"></script>

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans text-gray-900 antialiased bg-gray-50 flex min-h-screen">
        
        <!-- Left Side: Image / Illustration -->
        <div class="hidden lg:flex lg:w-[55%] relative items-center justify-center overflow-hidden" style="background-color: #F0F7FF;">
            <!-- Subtle gradient overlay -->
            <div class="absolute inset-0 bg-gradient-to-r from-transparent to-blue-50/50 z-10 pointer-events-none"></div>
            
            <!-- Cartoon Accent from Dashboard -->
            <img src="{{ asset('images/warga/hero.jpg') }}" alt="Ilustrasi Perumahan" class="w-full h-full object-cover z-0" style="object-position: right center;">
            
            <!-- Text Overlay on Image -->
            <div class="absolute bottom-12 left-12 z-20 max-w-lg bg-white/80 backdrop-blur-md p-6 rounded-2xl shadow-lg border border-white/50">
                <h3 class="text-xl font-bold text-slate-800">Sistem Manajemen Perumahan</h3>
                <p class="text-slate-600 mt-2 text-sm leading-relaxed">
                    Pantau tagihan, kelola layanan, dan dapatkan informasi terbaru seputar lingkungan Antapani City Mas secara real-time.
                </p>
            </div>
        </div>

        <!-- Right Side: Form -->
        <div class="w-full lg:w-[45%] flex items-center justify-center p-8 sm:p-12 lg:p-16 xl:p-24 bg-white shadow-2xl z-20 relative">
            <div class="w-full max-w-md">
                
                <!-- Mobile Logo (Hidden on large screens if desired, but good to have) -->
                <div class="mb-10 text-center lg:text-left">
                    <a href="/" class="inline-block transition-transform hover:scale-105">
                        <img src="{{ asset('images/warga/logo.png') }}" alt="Logo Antapani City Mas" class="h-16 mx-auto lg:mx-0 drop-shadow-sm">
                    </a>
                    <h2 class="mt-8 text-3xl font-extrabold text-slate-800 tracking-tight">Selamat Datang!</h2>
                    <p class="mt-3 text-sm text-slate-500 font-medium">Silakan masuk ke akun Anda untuk melanjutkan.</p>
                </div>

                <!-- Session Status / Errors -->
                <div class="mt-6">
                    {{ $slot }}
                </div>
                
                <div class="mt-12 text-center text-xs text-slate-400">
                    &copy; {{ date('Y') }} Antapani City Mas. All rights reserved.
                </div>
            </div>
        </div>

    </body>
</html>

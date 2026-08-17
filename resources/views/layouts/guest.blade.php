<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Login - {{ config('app.name', 'Antapani City Mas') }}</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com" rel="preconnect">
        <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
        
        <!-- Tailwind CDN for immediate styling without build -->
        <script src="https://cdn.tailwindcss.com"></script>
        <script>
            tailwind.config = {
                theme: {
                    extend: {
                        colors: {
                            indigo: {
                                500: '#EAA315',
                                600: '#EAA315',
                            },
                            orange: {
                                400: '#F2BC4C',
                                500: '#EAA315',
                                600: '#EAA315', // Warna utama tema web (accent)
                                700: '#D9910D', // Hover
                                800: '#C2820A', // Active
                            }
                        },
                        fontFamily: {
                            sans: ['Poppins', 'sans-serif'],
                        }
                    }
                }
            }
        </script>

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans text-gray-900 antialiased bg-slate-50 min-h-screen flex items-center justify-center p-4 sm:p-8 relative">
        
        <!-- Background decoration (optional) -->
        <div class="absolute top-0 left-0 w-full h-64 bg-orange-500/10 -skew-y-3 transform origin-top-left -z-10"></div>

        <!-- Main Card -->
        <div class="w-full max-w-4xl bg-white rounded-[24px] shadow-2xl flex overflow-hidden border border-slate-100 z-10">
            
            <!-- Left Side: Image / Illustration -->
            <div class="hidden md:flex md:w-1/2 relative items-center justify-center overflow-hidden bg-blue-50">
                <div class="absolute inset-0 bg-gradient-to-t from-black/50 to-transparent z-10 pointer-events-none"></div>
                <img src="{{ asset('images/warga/hero.jpg') }}" alt="Ilustrasi Perumahan" class="w-full h-full object-cover z-0" style="object-position: center;">
                
                <div class="absolute bottom-8 left-8 right-8 z-20 bg-white/90 backdrop-blur-md p-5 rounded-2xl shadow-sm border border-white/50">
                    <h3 class="text-lg font-bold text-slate-800">Antapani City Mas</h3>
                    <p class="text-slate-600 mt-1 text-[13px] leading-relaxed">
                        Sistem manajemen perumahan modern. Pantau tagihan dan dapatkan informasi terbaru secara real-time.
                    </p>
                </div>
            </div>

            <!-- Right Side: Form -->
            <div class="w-full md:w-1/2 flex flex-col justify-center p-8 sm:p-10 relative">
                <div class="w-full max-w-sm mx-auto">
                    <!-- Mobile Logo -->
                    <div class="mb-6 text-center md:text-left">
                        <a href="/" class="inline-block transition-transform hover:scale-105">
                            <img src="{{ asset('images/warga/logo.png') }}" alt="Logo Antapani City Mas" class="h-12 mx-auto md:mx-0 drop-shadow-sm" style="filter: hue-rotate(10deg) saturate(0.9);">
                        </a>
                        <h2 class="mt-5 text-2xl font-extrabold text-slate-800 tracking-tight">Selamat Datang</h2>
                        <p class="mt-1 text-[13px] text-slate-500 font-medium">Masuk untuk melanjutkan ke dashboard.</p>
                    </div>

                    <!-- Session Status / Errors -->
                    <div class="mt-4">
                        {{ $slot }}
                    </div>
                    
                    <div class="mt-8 text-center text-[11px] text-slate-400">
                        &copy; {{ date('Y') }} Antapani City Mas. All rights reserved.
                    </div>
                </div>
            </div>
        </div>

    </body>
</html>

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }} - Portal Warga</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        
        <style>
            /* Custom CSS variables that align with admin theme but with a slightly softer touch for residents */
            :root {
                --color-primary: #f97316; /* Orange */
                --color-secondary: #3b82f6; /* Blue */
                --color-bg-soft: #f3f4f6; /* Light gray */
                --color-success: #10b981; /* Green */
                --color-danger: #ef4444; /* Red */
                --color-warning: #f59e0b; /* Amber */
            }
        </style>
    </head>
    <body class="font-sans antialiased text-gray-800">
        <div class="min-h-screen bg-gray-50 dark:bg-gray-900 flex flex-col">
            @include('layouts.navigation-warga')

            <!-- Page Heading -->
            @isset($header)
                <header class="bg-white dark:bg-gray-800 shadow-sm border-b border-gray-100 dark:border-gray-700">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endisset

            <!-- Page Content -->
            <main class="flex-grow">
                {{ $slot }}
            </main>
            
            <!-- Simple Footer -->
            <footer class="bg-white dark:bg-gray-800 border-t border-gray-200 dark:border-gray-700 mt-12 py-8 text-center text-sm text-gray-500">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex flex-col items-center">
                    <p class="font-semibold text-gray-700 dark:text-gray-300 mb-2">Antapani City Mas</p>
                    <p class="mb-4">Portal layanan warga Antapani City Mas</p>
                    <div class="flex space-x-4">
                        <a href="#" class="hover:text-blue-500 transition-colors">Bantuan</a>
                        <a href="#" class="hover:text-blue-500 transition-colors">Kontak</a>
                        <a href="#" class="hover:text-blue-500 transition-colors">Informasi</a>
                        <a href="#" class="hover:text-blue-500 transition-colors">Kebijakan Privasi</a>
                    </div>
                    <p class="mt-6">&copy; {{ date('Y') }} Antapani City Mas. All rights reserved.</p>
                </div>
            </footer>
        </div>
    </body>
</html>

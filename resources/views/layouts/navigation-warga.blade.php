<nav x-data="{ open: false }" class="bg-white dark:bg-gray-800 border-b border-gray-100 dark:border-gray-700 shadow-sm sticky top-0 z-50">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex items-center">
                <!-- Logo & Brand -->
                <div class="shrink-0 flex items-center gap-2">
                    <a href="{{ route('warga.dashboard') }}" class="flex items-center gap-2">
        <div class="flex justify-between h-20">
            <!-- Logo -->
            <div class="shrink-0 flex items-center">
                <a href="{{ route('warga.dashboard') }}" class="flex items-center gap-2">
                    <svg class="w-10 h-10 text-orange-500" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M2 12C2 12 5 9 12 9C19 9 22 12 22 12" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                        <path d="M4 16C4 16 7 13 12 13C17 13 20 16 20 16" stroke="#3b82f6" stroke-width="2" stroke-linecap="round"/>
                        <path d="M12 3L4 9H20L12 3Z" fill="currentColor"/>
                    </svg>
                    <div>
                        <div class="font-bold text-orange-500 text-lg leading-tight">Antapani</div>
                        <div class="font-bold text-blue-500 text-lg leading-tight">City Mas</div>
                    </div>
                </a>
            </div>

            <!-- Navigation Links (Middle) -->
            <div class="hidden sm:flex sm:items-center sm:space-x-8">
                <a href="{{ route('warga.dashboard') }}" class="inline-flex items-center gap-2 px-1 pt-1 border-b-2 border-orange-500 text-sm font-medium leading-5 text-orange-600 focus:outline-none transition duration-150 ease-in-out h-full">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path></svg>
                    Dashboard
                </a>
                @if(session('warga_id'))
                    <a href="#tagihan" class="inline-flex items-center gap-2 px-1 pt-1 border-b-2 border-transparent text-sm font-medium leading-5 text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none transition duration-150 ease-in-out h-full">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                        Tagihan Saya
                    </a>
                    <a href="#riwayat" class="inline-flex items-center gap-2 px-1 pt-1 border-b-2 border-transparent text-sm font-medium leading-5 text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none transition duration-150 ease-in-out h-full">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        Riwayat
                    </a>
                @endif
                <a href="#informasi" class="inline-flex items-center gap-2 px-1 pt-1 border-b-2 border-transparent text-sm font-medium leading-5 text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none transition duration-150 ease-in-out h-full">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    Informasi
                </a>
            </div>

            <!-- Profile Area (Right) -->
            <div class="hidden sm:flex sm:items-center sm:ms-6">
                @if(session('warga_id') && isset($resident))
                    @php
                        $blok = explode('-', $resident->alamat)[0] ?? '';
                    @endphp
                    <!-- Logged in as Warga -->
                    <div class="flex items-center gap-3 border-r pr-4 mr-4">
                        <img src="https://ui-avatars.com/api/?name={{ urlencode($resident->nama) }}&background=EBF4FF&color=1E40AF" class="w-10 h-10 rounded-full border border-gray-200">
                        <div class="flex flex-col text-sm">
                            <span class="font-bold text-gray-800">{{ $resident->nama }} <svg class="w-4 h-4 inline text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg></span>
                            <span class="text-xs text-gray-500">Blok {{ $blok }} - {{ $resident->alamat }}</span>
                        </div>
                    </div>
                    
                    <form method="POST" action="{{ route('warga.keluar') }}">
                        @csrf
                        <button type="submit" class="text-gray-400 hover:text-red-500 transition-colors" title="Keluar">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path></svg>
                        </button>
                    </form>
                @else
                    <!-- Guest Warga -->
                    <a href="{{ route('login') }}" class="inline-flex items-center px-4 py-2 bg-blue-50 text-blue-600 rounded-lg font-semibold text-sm hover:bg-blue-100 transition ease-in-out duration-150">
                        Login Admin
                    </a>
                @endif
            </div>

            <!-- Hamburger -->
            <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden border-t">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('warga.dashboard')" :active="request()->routeIs('warga.dashboard')">
                {{ __('Dashboard') }}
            </x-responsive-nav-link>
            @if(session('warga_id'))
                <x-responsive-nav-link href="#tagihan" :active="false">
                    {{ __('Tagihan Saya') }}
                </x-responsive-nav-link>
                <x-responsive-nav-link href="#riwayat" :active="false">
                    {{ __('Riwayat') }}
                </x-responsive-nav-link>
            @endif
            <x-responsive-nav-link href="#informasi" :active="false">
                {{ __('Informasi') }}
            </x-responsive-nav-link>
        </div>

        <div class="pt-4 pb-1 border-t border-gray-200">
            <div class="mt-3 space-y-1">
                @if(session('warga_id'))
                    <form method="POST" action="{{ route('warga.keluar') }}">
                        @csrf
                        <x-responsive-nav-link :href="route('warga.keluar')"
                                onclick="event.preventDefault(); this.closest('form').submit();" class="text-red-600 font-bold">
                            {{ __('Keluar (Tutup Profil)') }}
                        </x-responsive-nav-link>
                    </form>
                @else
                    <x-responsive-nav-link :href="route('login')" class="text-blue-600 font-bold">
                        {{ __('Login Admin') }}
                    </x-responsive-nav-link>
                @endif
            </div>
        </div>
    </div>
</nav>

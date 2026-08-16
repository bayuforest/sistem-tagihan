<x-warga-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard Warga') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100 flex flex-col items-center justify-center min-h-[400px]">
                    <div class="w-32 h-32 mb-6 text-gray-400">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 12l8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
                        </svg>
                    </div>
                    
                    <h3 class="text-2xl font-bold mb-2">Akun Belum Terhubung</h3>
                    <p class="text-gray-500 mb-6 text-center max-w-md">
                        Akun Anda belum dihubungkan dengan data profil warga. Silakan hubungi pengurus perumahan Antapani City Mas untuk menghubungkan akun Anda agar dapat melihat tagihan.
                    </p>
                    
                    <a href="{{ route('profile.edit') }}" class="px-6 py-2 bg-blue-600 text-white rounded-lg shadow hover:bg-blue-700 transition">
                        Update Profil
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-warga-layout>

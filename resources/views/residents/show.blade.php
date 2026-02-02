<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800">
            Detail Resident
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-xl mx-auto bg-white p-6 shadow rounded">
            <p><strong>Nama:</strong> {{ $resident->nama }}</p>
            <p><strong>Alamat:</strong> {{ $resident->alamat }}</p>

            <a href="{{ route('residents.index') }}"
               class="mt-4 inline-block text-blue-600">
                ← Kembali
            </a>
        </div>
    </div>
</x-app-layout>

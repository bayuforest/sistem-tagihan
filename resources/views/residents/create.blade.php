<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800">
            Tambah Resident
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-6 shadow rounded">

                <form action="{{ route('residents.store') }}" method="POST">
                    @csrf

                    <div class="mb-4">
                        <label class="block">Nama</label>
                        <input type="text" name="nama"
                               value="{{ old('nama') }}"
                               class="w-full border rounded px-3 py-2">
                        @error('nama')
                            <small class="text-red-600">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label class="block">Alamat</label>
                        <input type="text" name="alamat"
                               value="{{ old('alamat') }}"
                               class="w-full border rounded px-3 py-2">
                        @error('alamat')
                            <small class="text-red-600">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="flex justify-end space-x-2">
                        <a href="{{ route('residents.index') }}"
                           class="px-4 py-2 bg-gray-300 rounded">
                            Batal
                        </a>
                        <button class="px-4 py-2 bg-blue-600 text-white rounded">
                            Simpan
                        </button>
                    </div>

                </form>

            </div>
        </div>
    </div>
</x-app-layout>

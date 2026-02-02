<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800">
            Edit Resident
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-6 shadow rounded">

                <form action="{{ route('residents.update', $resident) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-4">
                        <label class="block">Nama</label>
                        <input type="text" name="nama"
                               value="{{ old('nama', $resident->nama) }}"
                               class="w-full border rounded px-3 py-2">
                    </div>

                    <div class="mb-4">
                        <label class="block">Alamat</label>
                        <input type="text" name="alamat"
                               value="{{ old('alamat', $resident->alamat) }}"
                               class="w-full border rounded px-3 py-2">
                    </div>

                    <div class="flex justify-end space-x-2">
                        <a href="{{ route('residents.index') }}"
                           class="px-4 py-2 bg-gray-300 rounded">
                            Batal
                        </a>
                        <button class="px-4 py-2 bg-blue-600 text-white rounded">
                            Update
                        </button>
                    </div>

                </form>

            </div>
        </div>
    </div>
</x-app-layout>

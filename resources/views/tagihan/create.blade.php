<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800">
            Tambah Tagihan
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-xl mx-auto bg-white p-6 shadow rounded">

            <form action="{{ route('tagihan.store') }}" method="POST">
                @csrf

                <div class="mb-4">
                    <label class="block">Bulan Tagihan</label>
                    <input type="month" name="bulan_tagihan"
                           class="w-full border rounded px-3 py-2"
                           required>
                    <small class="text-gray-500">
                        Sistem otomatis simpan sebagai tanggal 1
                    </small>
                </div>

                <div class="mb-4">
                    <label class="block">Resident</label>
                    <select name="resident_id"
                            class="w-full border rounded px-3 py-2"
                            required>
                        <option value="">-- Pilih Resident --</option>
                        @foreach($residents as $resident)
                            <option value="{{ $resident->id }}">
                                {{ $resident->nama }} - {{ $resident->alamat }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-4">
                    <label class="block">Meteran Awal</label>
                    <input type="number" name="meteran_awal"
                           class="w-full border rounded px-3 py-2"
                           required>
                </div>

                <div class="mb-4">
                    <label class="block">Meteran Akhir</label>
                    <input type="number" name="meteran_akhir"
                           class="w-full border rounded px-3 py-2"
                           required>
                </div>

                <div class="flex justify-end space-x-2">
                    <a href="{{ route('tagihan.index') }}"
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
</x-app-layout>

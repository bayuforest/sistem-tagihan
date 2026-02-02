<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800">
            Edit Tagihan
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-xl mx-auto bg-white p-6 shadow rounded">

            <form action="{{ route('tagihan.update', $tagihan) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-4">
                    <label class="block">Resident</label>
                    <input type="text"
                           class="w-full border rounded px-3 py-2 bg-gray-100"
                           value="{{ $tagihan->resident->nama }}"
                           disabled>
                </div>

                <div class="mb-4">
                    <label class="block">Meteran Awal</label>
                    <input type="number" name="meteran_awal"
                           value="{{ $tagihan->meteran_awal }}"
                           class="w-full border rounded px-3 py-2"
                           required>
                </div>

                <div class="mb-4">
                    <label class="block">Meteran Akhir</label>
                    <input type="number" name="meteran_akhir"
                           value="{{ $tagihan->meteran_akhir }}"
                           class="w-full border rounded px-3 py-2"
                           required>
                </div>

                <div class="flex justify-end space-x-2">
                    <a href="{{ route('tagihan.index') }}"
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
</x-app-layout>

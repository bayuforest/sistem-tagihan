<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800">
            Data Tagihan
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            @if(session('success'))
                <div class="mb-4 text-green-600">
                    {{ session('success') }}
                </div>
            @endif

            <a href="{{ route('tagihan.create') }}"
               class="mb-4 inline-block px-4 py-2 bg-blue-600 text-white rounded">
                + Tambah Tagihan
            </a>

            <div class="bg-white shadow rounded">
                <table class="min-w-full border">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="border px-4 py-2">Bulan</th>
                            <th class="border px-4 py-2">Resident</th>
                            <th class="border px-4 py-2">Meteran</th>
                            <th class="border px-4 py-2">Air</th>
                            <th class="border px-4 py-2">IPL</th>
                            <th class="border px-4 py-2">Abodement</th>
                            <th class="border px-4 py-2">Total</th>
                            <th class="border px-4 py-2">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($tagihan as $t)
                            <tr>
                                <td class="border px-4 py-2">
                                    {{ \Carbon\Carbon::parse($t->bulan_tagihan)->format('F Y') }}
                                </td>
                                <td class="border px-4 py-2">
                                    {{ $t->resident->nama }}
                                </td>
                                <td class="border px-4 py-2 text-center">
                                    {{ $t->meteran_awal }} - {{ $t->meteran_akhir }}
                                </td>
                                <td class="border px-4 py-2 text-right">
                                    {{ number_format($t->tagihan_air) }}
                                </td>
                                <td class="border px-4 py-2 text-right">
                                    {{ number_format($t->ipl) }}
                                </td>
                                <td class="border px-4 py-2 text-right">
                                    {{ number_format($t->abodement) }}
                                </td>
                                <td class="border px-4 py-2 text-right font-semibold">
                                    {{ number_format($t->tagihan_air + $t->ipl + $t->abodement) }}
                                </td>
                                <td class="border px-4 py-2 space-x-2">
                                    <a href="{{ route('tagihan.edit', $t) }}" class="text-blue-600">Edit</a>

                                    <form action="{{ route('tagihan.destroy', $t) }}"
                                          method="POST" class="inline"
                                          onsubmit="return confirm('Hapus tagihan?')">
                                        @csrf
                                        @method('DELETE')
                                        <button class="text-red-600">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="8" class="text-center py-4">
                                    Belum ada data tagihan
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</x-app-layout>

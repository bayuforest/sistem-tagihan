<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800">
            Data Resident
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            @if (session('success'))
                <div class="mb-4 text-green-600">
                    {{ session('success') }}
                </div>
            @endif

            <a href="{{ route('residents.create') }}"
               class="mb-4 inline-block px-4 py-2 bg-blue-600 text-white rounded">
                + Tambah Resident
            </a>

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <table class="min-w-full border">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="border px-4 py-2">No</th>
                            <th class="border px-4 py-2">Nama</th>
                            <th class="border px-4 py-2">Alamat</th>
                            <th class="border px-4 py-2">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($residents as $resident)
                            <tr>
                                <td class="border px-4 py-2">{{ $loop->iteration }}</td>
                                <td class="border px-4 py-2">{{ $resident->nama }}</td>
                                <td class="border px-4 py-2">{{ $resident->alamat }}</td>
                                <td class="border px-4 py-2 space-x-2">
                                    <a href="{{ route('residents.edit', $resident) }}"
                                       class="text-blue-600">Edit</a>

                                    <form action="{{ route('residents.destroy', $resident) }}"
                                          method="POST" class="inline"
                                          onsubmit="return confirm('Yakin hapus?')">
                                        @csrf
                                        @method('DELETE')
                                        <button class="text-red-600">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach

                        @if ($residents->count() === 0)
                            <tr>
                                <td colspan="4" class="text-center py-4">
                                    Data masih kosong
                                </td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</x-app-layout>

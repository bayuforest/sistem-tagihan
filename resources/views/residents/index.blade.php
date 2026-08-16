@extends('layouts.admin', ['header' => 'Data Warga'])

@section('content')
    <div style="margin-bottom: 24px; display: flex; justify-content: flex-end; align-items: center;">
        <a href="{{ route('residents.create') }}" class="btn btn-primary">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" style="width: 18px; height: 18px;">
              <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
            </svg>
            Tambah Warga
        </a>
    </div>

    @if (session('success'))
        <div style="background: rgba(46, 204, 113, 0.1); color: #2ecc71; padding: 16px 20px; border-radius: var(--radius-md); margin-bottom: 24px; font-weight: 500; display: flex; align-items: center; gap: 10px;">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" style="width: 20px; height: 20px;">
              <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
            </svg>
            {{ session('success') }}
        </div>
    @endif

    <div class="table-container">
        <div class="table-header">
            <h2>Daftar Seluruh Warga</h2>
        </div>
        <div style="overflow-x: auto;">
            <table>
                <thead>
                    <tr>
                        <th style="width: 60px;">No</th>
                        <th>Nama</th>
                        <th>Alamat</th>
                        <th style="width: 150px;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($residents as $resident)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td style="font-weight: 500;">{{ $resident->nama }}</td>
                            <td style="color: var(--text-muted);">{{ $resident->alamat }}</td>
                            <td>
                                <div class="action-buttons">
                                    <a href="{{ route('residents.edit', $resident) }}" class="btn-action btn-edit">Edit</a>
                                    <form action="{{ route('residents.destroy', $resident) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus data warga ini?');" style="margin: 0;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn-action btn-delete">Hapus</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" style="text-align: center; color: var(--text-muted); padding: 40px;">Data warga belum tersedia.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection

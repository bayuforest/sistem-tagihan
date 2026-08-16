@extends('layouts.admin', ['header' => 'Tambah Resident'])

@section('content')
    <div class="card" style="max-width: 600px; margin: 0 auto;">
        <div style="margin-bottom: 24px;">
            <h2 style="font-size: 1.25rem; font-weight: 600;">Data Warga Baru</h2>
            <p style="color: var(--text-muted); font-size: 0.9rem;">Masukkan informasi detail warga yang baru.</p>
        </div>

        <form action="{{ route('residents.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label class="form-label">Nama</label>
                <input type="text" name="nama" value="{{ old('nama') }}" class="form-control" placeholder="Masukkan nama warga">
                @error('nama')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label class="form-label">Alamat</label>
                <input type="text" name="alamat" value="{{ old('alamat') }}" class="form-control" placeholder="Contoh: Blok A No. 10">
                @error('alamat')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div style="display: flex; justify-content: flex-end; gap: 12px; margin-top: 32px;">
                <a href="{{ route('residents.index') }}" class="btn btn-secondary">Batal</a>
                <button type="submit" class="btn btn-primary">Simpan Data</button>
            </div>
        </form>
    </div>
@endsection

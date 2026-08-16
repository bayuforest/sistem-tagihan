@extends('layouts.admin', ['header' => 'Edit Resident'])

@section('content')
    <div class="card" style="max-width: 600px; margin: 0 auto;">
        <div style="margin-bottom: 24px;">
            <h2 style="font-size: 1.25rem; font-weight: 600;">Edit Data Warga</h2>
            <p style="color: var(--text-muted); font-size: 0.9rem;">Perbarui informasi detail warga berikut.</p>
        </div>

        <form action="{{ route('residents.update', $resident) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label class="form-label">Nama</label>
                <input type="text" name="nama" value="{{ old('nama', $resident->nama) }}" class="form-control">
                @error('nama')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label class="form-label">Alamat</label>
                <input type="text" name="alamat" value="{{ old('alamat', $resident->alamat) }}" class="form-control">
                @error('alamat')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div style="display: flex; justify-content: flex-end; gap: 12px; margin-top: 32px;">
                <a href="{{ route('residents.index') }}" class="btn btn-secondary">Batal</a>
                <button type="submit" class="btn btn-primary">Update Data</button>
            </div>
        </form>
    </div>
@endsection

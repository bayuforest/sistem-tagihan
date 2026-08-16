@extends('layouts.admin', ['header' => 'Tambah Tagihan'])

@section('content')
    <div class="card" style="max-width: 600px; margin: 0 auto;">
        <div style="margin-bottom: 24px;">
            <h2 style="font-size: 1.25rem; font-weight: 600;">Buat Tagihan Baru</h2>
            <p style="color: var(--text-muted); font-size: 0.9rem;">Pilih warga dan masukkan informasi pemakaian bulan ini.</p>
        </div>

        <form action="{{ route('tagihan.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label class="form-label">Bulan Tagihan</label>
                <input type="month" name="bulan_tagihan" class="form-control" required value="{{ old('bulan_tagihan') }}">
                <span class="form-text">Sistem otomatis simpan sebagai tanggal 1</span>
                @error('bulan_tagihan')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label class="form-label">Resident</label>
                <select name="resident_id" class="form-control" required>
                    <option value="" disabled selected>-- Pilih Resident --</option>
                    @foreach($residents as $resident)
                        <option value="{{ $resident->id }}" {{ old('resident_id') == $resident->id ? 'selected' : '' }}>
                            {{ $resident->nama }} - {{ $resident->alamat }}
                        </option>
                    @endforeach
                </select>
                @error('resident_id')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 16px;">
                <div class="form-group">
                    <label class="form-label">Meteran Awal</label>
                    <input type="number" name="meteran_awal" class="form-control" required value="{{ old('meteran_awal') }}">
                    @error('meteran_awal')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label class="form-label">Meteran Akhir</label>
                    <input type="number" name="meteran_akhir" class="form-control" required value="{{ old('meteran_akhir') }}">
                    @error('meteran_akhir')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <div class="form-group">
                <label class="form-label">Tagihan Air (Rp)</label>
                <input type="number" name="tagihan_air" class="form-control" required value="{{ old('tagihan_air') }}">
                <span class="form-text">Diisi manual oleh petugas</span>
                @error('tagihan_air')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div style="display: flex; justify-content: flex-end; gap: 12px; margin-top: 32px;">
                <a href="{{ route('tagihan.index') }}" class="btn btn-secondary">Batal</a>
                <button type="submit" class="btn btn-primary">Simpan Tagihan</button>
            </div>
        </form>
    </div>
@endsection

@extends('layouts.admin', ['header' => 'Tambah Tagihan'])

@section('content')
    <div class="card" style="max-width: 600px; margin: 0 auto;">
        @if(session('error'))
            <div style="background: rgba(231, 76, 60, 0.1); color: #e74c3c; padding: 16px 20px; border-radius: var(--radius-md); margin-bottom: 24px; font-weight: 500; display: flex; align-items: center; gap: 10px;">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor" style="width: 20px; height: 20px;" viewBox="0 0 16 16" role="img" aria-label="Warning:">
                    <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                </svg>
                {{ session('error') }}
            </div>
        @endif

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

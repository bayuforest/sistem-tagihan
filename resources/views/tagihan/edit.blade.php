@extends('layouts.admin', ['header' => 'Edit Tagihan'])

@section('content')
    <div class="card" style="max-width: 600px; margin: 0 auto;">
        <div style="margin-bottom: 24px;">
            <h2 style="font-size: 1.25rem; font-weight: 600;">Edit Data Tagihan</h2>
            <p style="color: var(--text-muted); font-size: 0.9rem;">Perbarui rincian pemakaian dan tagihan warga.</p>
        </div>

        <form action="{{ route('tagihan.update', $tagihan) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label class="form-label">Resident</label>
                <input type="text" class="form-control" value="{{ $tagihan->resident->nama }}" disabled style="background-color: #f1f3f5; color: #828a96;">
            </div>

            <div class="form-group">
                <label class="form-label">Bulan Tagihan</label>
                <input type="text" class="form-control" value="{{ \Carbon\Carbon::parse($tagihan->bulan_tagihan)->format('F Y') }}" disabled style="background-color: #f1f3f5; color: #828a96;">
            </div>

            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 16px;">
                <div class="form-group">
                    <label class="form-label">Meteran Awal</label>
                    <input type="number" name="meteran_awal" value="{{ old('meteran_awal', $tagihan->meteran_awal) }}" class="form-control" required>
                    @error('meteran_awal')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label class="form-label">Meteran Akhir</label>
                    <input type="number" name="meteran_akhir" value="{{ old('meteran_akhir', $tagihan->meteran_akhir) }}" class="form-control" required>
                    @error('meteran_akhir')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <div class="form-group">
                <label class="form-label">Tagihan Air (Rp)</label>
                <input type="number" name="tagihan_air" value="{{ old('tagihan_air', $tagihan->tagihan_air) }}" class="form-control" required>
                <span class="form-text">Diisi sesuai perhitungan manual / mandiri</span>
                @error('tagihan_air')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div style="display: flex; justify-content: flex-end; gap: 12px; margin-top: 32px;">
                <a href="{{ route('tagihan.index') }}" class="btn btn-secondary">Batal</a>
                <button type="submit" class="btn btn-primary">Update Tagihan</button>
            </div>
        </form>
    </div>
@endsection

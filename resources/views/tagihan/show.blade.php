@extends('layouts.admin', ['header' => 'Detail Tagihan'])

@section('content')
    <div class="card" style="max-width: 700px; margin: 0 auto;">
        <div style="margin-bottom: 24px; display: flex; justify-content: space-between; align-items: flex-start;">
            <div>
                <h2 style="font-size: 1.25rem; font-weight: 600;">Rincian Tagihan Warga</h2>
                <p style="color: var(--text-muted); font-size: 0.9rem;">ID Tagihan: #{{ $tagihan->id }}</p>
            </div>
            
            <div>
                @if($tagihan->status === 'Lunas')
                    <span class="status-badge status-paid" style="font-size: 0.9rem; padding: 8px 16px;">Lunas</span>
                @else
                    <span class="status-badge status-unpaid" style="font-size: 0.9rem; padding: 8px 16px;">Belum Lunas</span>
                @endif
            </div>
        </div>

        <div style="border-top: 1px solid var(--border-color); padding-top: 24px; display: grid; grid-template-columns: 1fr 1fr; gap: 24px;">
            
            <div>
                <p style="color: var(--text-muted); font-size: 0.85rem; font-weight: 500; text-transform: uppercase; letter-spacing: 0.5px; margin-bottom: 4px;">Bulan Tagihan</p>
                <p style="font-weight: 600; font-size: 1.1rem; color: var(--text-main);">{{ \Carbon\Carbon::parse($tagihan->bulan_tagihan)->format('F Y') }}</p>
            </div>

            <div>
                <p style="color: var(--text-muted); font-size: 0.85rem; font-weight: 500; text-transform: uppercase; letter-spacing: 0.5px; margin-bottom: 4px;">Resident</p>
                <p style="font-weight: 600; font-size: 1.1rem; color: var(--text-main);">{{ $tagihan->resident->nama }}</p>
                <p style="color: var(--text-muted); font-size: 0.9rem;">{{ $tagihan->resident->alamat }}</p>
            </div>

            <div style="grid-column: span 2; border-top: 1px dashed var(--border-color); padding-top: 20px;">
                <p style="color: var(--text-muted); font-size: 0.85rem; font-weight: 500; text-transform: uppercase; letter-spacing: 0.5px; margin-bottom: 12px;">Data Meteran Air</p>
                <div style="display: flex; gap: 40px;">
                    <div>
                        <p style="font-size: 0.9rem; color: var(--text-muted); margin-bottom: 2px;">Meteran Awal</p>
                        <p style="font-weight: 600;">{{ $tagihan->meteran_awal }} m³</p>
                    </div>
                    <div>
                        <p style="font-size: 0.9rem; color: var(--text-muted); margin-bottom: 2px;">Meteran Akhir</p>
                        <p style="font-weight: 600;">{{ $tagihan->meteran_akhir }} m³</p>
                    </div>
                    <div>
                        <p style="font-size: 0.9rem; color: var(--text-muted); margin-bottom: 2px;">Total Pemakaian</p>
                        <p style="font-weight: 600; color: var(--primary-dark);">{{ $tagihan->meteran_akhir - $tagihan->meteran_awal }} m³</p>
                    </div>
                </div>
            </div>

            <div style="grid-column: span 2; border-top: 1px dashed var(--border-color); padding-top: 20px;">
                <p style="color: var(--text-muted); font-size: 0.85rem; font-weight: 500; text-transform: uppercase; letter-spacing: 0.5px; margin-bottom: 12px;">Rincian Biaya</p>
                
                <div style="display: flex; justify-content: space-between; margin-bottom: 10px;">
                    <span style="color: var(--text-main); font-weight: 500;">Tagihan Air</span>
                    <span>Rp {{ number_format($tagihan->tagihan_air, 0, ',', '.') }}</span>
                </div>
                
                <div style="display: flex; justify-content: space-between; margin-bottom: 10px;">
                    <span style="color: var(--text-main); font-weight: 500;">IPL (Iuran Pemeliharaan Lingkungan)</span>
                    <span>Rp {{ number_format($tagihan->ipl, 0, ',', '.') }}</span>
                </div>
                
                <div style="display: flex; justify-content: space-between; margin-bottom: 16px; padding-bottom: 16px; border-bottom: 1px solid var(--border-color);">
                    <span style="color: var(--text-main); font-weight: 500;">Biaya Abodement</span>
                    <span>Rp {{ number_format($tagihan->abodement, 0, ',', '.') }}</span>
                </div>

                <div style="display: flex; justify-content: space-between; font-size: 1.25rem;">
                    <span style="font-weight: 700; color: var(--text-main);">Total Tagihan</span>
                    <span style="font-weight: 700; color: var(--primary-color);">Rp {{ number_format($tagihan->tagihan_air + $tagihan->ipl + $tagihan->abodement, 0, ',', '.') }}</span>
                </div>
            </div>
            
        </div>

        <div style="margin-top: 40px; display: flex; justify-content: space-between;">
            <a href="{{ route('tagihan.index') }}" class="btn btn-secondary">Kembali</a>
            <div style="display: flex; gap: 12px;">
                <a href="{{ route('tagihan.edit', $tagihan) }}" class="btn btn-primary" style="background-color: var(--text-main);">Edit Tagihan</a>
                
                @if($tagihan->status === 'Belum Lunas')
                    <form action="{{ route('tagihan.update', $tagihan) }}" method="POST" style="margin: 0;">
                        @csrf
                        @method('PUT')
                        <!-- Kita bisa menggunakan form update ini untuk mensimulasikan update status jika diperlukan -->
                        <!-- Saat ini ini hanya contoh jika kita punya logic set lunas terpisah, tapi kalau tidak ada, mungkin edit saja sudah cukup -->
                        <input type="hidden" name="meteran_awal" value="{{ $tagihan->meteran_awal }}">
                        <input type="hidden" name="meteran_akhir" value="{{ $tagihan->meteran_akhir }}">
                        <input type="hidden" name="tagihan_air" value="{{ $tagihan->tagihan_air }}">
                        <!-- <button type="submit" class="btn btn-primary">Tandai Lunas</button> -->
                    </form>
                @endif
            </div>
        </div>
    </div>
@endsection

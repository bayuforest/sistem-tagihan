@extends('layouts.admin', ['header' => 'Data Tagihan'])

@section('content')
    <div style="margin-bottom: 24px; display: flex; justify-content: flex-end; align-items: center;">
        <a href="{{ route('tagihan.create') }}" class="btn btn-primary">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" style="width: 18px; height: 18px;">
              <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
            </svg>
            Buat Tagihan Baru
        </a>
    </div>

    @if(session('success'))
        <div style="background: rgba(46, 204, 113, 0.1); color: #2ecc71; padding: 16px 20px; border-radius: var(--radius-md); margin-bottom: 24px; font-weight: 500; display: flex; align-items: center; gap: 10px;">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" style="width: 20px; height: 20px;">
              <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
            </svg>
            {{ session('success') }}
        </div>
    @endif

    <div class="table-container">
        <div class="table-header">
            <h2>Daftar Seluruh Tagihan</h2>
        </div>
        <div style="overflow-x: auto;">
            <table>
                <thead>
                    <tr>
                        <th>Bulan</th>
                        <th>Resident</th>
                        <th style="text-align: center;">Meteran (Awal - Akhir)</th>
                        <th style="text-align: right;">Total</th>
                        <th style="text-align: center;">Status</th>
                        <th style="text-align: center;">Detail</th>
                        <th style="width: 130px; text-align: center;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($tagihan as $t)
                        <tr>
                            <td style="font-weight: 500;">{{ \Carbon\Carbon::parse($t->bulan_tagihan)->format('F Y') }}</td>
                            <td>{{ $t->resident->alamat }}</td>
                            <td style="text-align: center; color: var(--text-muted);">{{ $t->meteran_awal }} - {{ $t->meteran_akhir }}</td>
                            <td style="text-align: right; font-weight: 600; color: var(--primary-dark);">{{ number_format($t->tagihan_air + $t->ipl + $t->abodement, 0, ',', '.') }}</td>
                            <td style="text-align: center;">
                                @if($t->status === 'Paid')
                                    <span class="status-badge status-paid">Paid</span>
                                @else
                                    <span class="status-badge status-unpaid">Unpaid</span>
                                @endif
                            </td>
                            <td style="text-align: center;">
                                <a href="{{ route('tagihan.show', $t) }}" class="btn-action btn-info">Detail</a>
                            </td>
                            <td>
                                <div class="action-buttons">
                                    <a href="{{ route('tagihan.edit', $t) }}" class="btn-action btn-edit">Edit</a>
                                    <form action="{{ route('tagihan.destroy', $t) }}" method="POST" onsubmit="return confirm('Hapus tagihan ini?');" style="margin: 0;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn-action btn-delete">Hapus</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" style="text-align: center; color: var(--text-muted); padding: 40px;">Belum ada data tagihan yang tersimpan.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection

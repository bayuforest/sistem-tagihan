@extends('layouts.admin')

@section('content')
    <div class="grid-cards">
        <div class="card stat-card">
            <div class="stat-info">
                <h3>Total Warga</h3>
                <div class="stat-value">{{ \App\Models\Resident::count() ?? 0 }}</div>
            </div>
            <div class="stat-icon">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M15 19.128a9.38 9.38 0 0 0 2.625.372 9.337 9.337 0 0 0 4.121-.952 4.125 4.125 0 0 0-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 0 1 8.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0 1 11.964-3.07M12 6.375a3.375 3.375 0 1 1-6.75 0 3.375 3.375 0 0 1 6.75 0Zm8.25 2.25a2.625 2.625 0 1 1-5.25 0 2.625 2.625 0 0 1 5.25 0Z" />
                </svg>
            </div>
        </div>
        
        <div class="card stat-card">
            <div class="stat-info">
                <h3>Total Tagihan Unpaid</h3>
                <div class="stat-value">Rp {{ number_format(\App\Models\Tagihan::where('status', 'Unpaid')->sum('tagihan_air') + \App\Models\Tagihan::where('status', 'Unpaid')->sum('ipl') + \App\Models\Tagihan::where('status', 'Unpaid')->sum('abodement'), 0, ',', '.') }}</div>
            </div>
            <div class="stat-icon">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 18.75a60.07 60.07 0 0 1 15.797 2.101c.727.198 1.453-.342 1.453-1.096V18.75M3.75 4.5v.75A.75.75 0 0 1 3 6h-.75m0 0v-.375c0-.621.504-1.125 1.125-1.125H20.25M2.25 6v9m18-10.5v.75c0 .414.336.75.75.75h.75m-1.5-1.5h.375c.621 0 1.125.504 1.125 1.125v9.75c0 .621-.504 1.125-1.125 1.125h-.375m1.5-1.5H21a.75.75 0 0 0-.75.75v.75m0 0H3.75m0 0h-.375a1.125 1.125 0 0 1-1.125-1.125V15m1.5 1.5v-.75A.75.75 0 0 0 3 15h-.75M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm3 0h.008v.008H18V10.5Zm-12 0h.008v.008H6V10.5Z" />
                </svg>
            </div>
        </div>
        
        <div class="card stat-card">
            <div class="stat-info">
                <h3>Tagihan Aktif</h3>
                <div class="stat-value">{{ \App\Models\Tagihan::count() ?? 0 }}</div>
            </div>
            <div class="stat-icon">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                </svg>
            </div>
        </div>
    </div>

    <div class="table-container">
        <div class="table-header">
            <h2>Tagihan Terbaru</h2>
            <a href="{{ route('tagihan.index') }}" class="btn btn-primary">Lihat Semua</a>
        </div>
        <div style="overflow-x: auto;">
            <table>
                <thead>
                    <tr>
                        <th>Bulan</th>
                        <th>Warga</th>
                        <th>Meteran</th>
                        <th>Total Tagihan</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $recentTagihans = \App\Models\Tagihan::with('resident')->orderBy('created_at', 'desc')->take(5)->get();
                    @endphp
                    
                    @forelse ($recentTagihans as $tagihan)
                    <tr>
                        <td>{{ \Carbon\Carbon::parse($tagihan->bulan_tagihan)->format('F Y') }}</td>
                        <td>{{ $tagihan->resident->nama ?? '-' }}</td>
                        <td>{{ $tagihan->meteran_awal }} - {{ $tagihan->meteran_akhir }}</td>
                        <td>Rp {{ number_format($tagihan->tagihan_air + $tagihan->ipl + $tagihan->abodement, 0, ',', '.') }}</td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="4" style="text-align: center; color: var(--text-muted); padding: 30px;">Belum ada tagihan terbaru.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection

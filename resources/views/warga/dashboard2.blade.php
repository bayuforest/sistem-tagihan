<x-warga-layout>
    <!-- Background Wrapper -->
    <div class="py-8 bg-white md:bg-[#F8FAFC] min-h-screen">
        <div class="max-w-[1200px] mx-auto sm:px-6 lg:px-8 space-y-6">
            
            @if(!$resident)
                <div class="bg-white rounded-3xl shadow-sm border border-gray-100 p-12 max-w-2xl mx-auto mt-12 text-center">
                    <p class="text-gray-500">Menunggu data Warga...</p>
                </div>
            @else
                
                @php
                    $blok = explode('-', $resident->alamat)[0] ?? '';
                    $idPelanggan = 'ACM-' . str_pad($resident->id, 6, '0', STR_PAD_LEFT);
                @endphp

                <!-- Hero Section (Light Blue bg, seamless image on right) -->
                <div class="bg-[#F0F7FF] rounded-[2rem] overflow-hidden relative flex flex-col md:flex-row h-auto md:h-[280px]">
                    <div class="p-8 md:p-12 md:pl-16 flex-1 flex flex-col justify-center z-10">
                        <h1 class="text-[2rem] md:text-[2.5rem] font-bold tracking-tight mb-1 text-[#0F172A] leading-tight">
                            Selamat Datang, <br>
                            <span class="text-orange-500">{{ $resident->nama }} 👋</span>
                        </h1>
                        <p class="text-gray-600 text-sm md:text-base max-w-md mt-4">
                            Pantau tagihan IPL & Air dan dapatkan informasi terbaru dari perumahan di Dashboard.
                        </p>
                    </div>
                    <div class="w-full md:w-[60%] h-48 md:h-full relative overflow-hidden flex justify-end">
                        <!-- Fade gradient so text area blends into image -->
                        <div class="absolute inset-y-0 left-0 w-32 bg-gradient-to-r from-[#F0F7FF] to-transparent z-10 hidden md:block"></div>
                        <img src="{{ asset('images/warga/hero.jpg') }}" alt="Community" class="w-full h-full object-cover object-left md:object-center mix-blend-multiply opacity-90">
                    </div>
                </div>

                <!-- Data Warga Card -->
                <div class="bg-white rounded-[1.5rem] shadow-sm border border-gray-100 p-6 md:px-8 flex flex-col md:flex-row items-center gap-6 relative">
                    <div class="w-12 h-12 bg-blue-600 text-white rounded-full flex items-center justify-center shrink-0">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                    </div>
                    <div class="flex-1 w-full">
                        <h3 class="font-bold text-gray-800 text-lg mb-4">Data Warga</h3>
                        <div class="grid grid-cols-2 md:grid-cols-4 gap-4 md:gap-8">
                            <div>
                                <p class="text-xs text-gray-400 font-medium mb-1">Nama</p>
                                <p class="font-bold text-gray-800">{{ $resident->nama }}</p>
                            </div>
                            <div>
                                <p class="text-xs text-gray-400 font-medium mb-1">Blok</p>
                                <p class="font-bold text-gray-800">Blok {{ $blok }}</p>
                            </div>
                            <div>
                                <p class="text-xs text-gray-400 font-medium mb-1">Nomor Rumah</p>
                                <p class="font-bold text-gray-800">{{ $resident->alamat }}</p>
                            </div>
                            <div>
                                <p class="text-xs text-gray-400 font-medium mb-1">Nomor Pelanggan</p>
                                <p class="font-bold text-gray-800">{{ $idPelanggan }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="hidden md:block w-32 h-24 shrink-0">
                        <img src="{{ asset('images/warga/house.jpg') }}" class="w-full h-full object-contain mix-blend-multiply" alt="House Icon">
                    </div>
                </div>

                <!-- Tagihan Section (3 Columns) -->
                <div id="tagihan" class="grid grid-cols-1 lg:grid-cols-3 gap-6 relative">
                    <!-- Tagihan Air -->
                    <div class="bg-white rounded-[1.5rem] shadow-sm border border-gray-100 p-6 flex flex-col relative overflow-hidden">
                        <!-- Watermark/TopRight Icon -->
                        <div class="absolute top-4 right-4 opacity-20 text-blue-500">
                            <svg class="w-16 h-16" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2c-5.33 4.55-8 8.48-8 11.8a8 8 0 0 0 16 0c0-3.32-2.67-7.25-8-11.8zm0 18a6 6 0 0 1-6-6c0-2.17 1.83-5.28 6-9.17 4.17 3.89 6 7 6 9.17a6 6 0 0 1-6 6z"/></svg>
                        </div>

                        <div class="flex items-center gap-3 mb-6 relative z-10">
                            <div class="w-10 h-10 bg-blue-600 text-white rounded-full flex items-center justify-center shrink-0 shadow-md">
                                <span class="font-bold">1</span>
                            </div>
                            <h3 class="font-bold text-gray-800 text-lg">Tagihan Air</h3>
                        </div>

                        @if($latestTagihan)
                            <div class="space-y-4 mb-8 relative z-10 flex-1">
                                <div class="flex justify-between items-center pb-2 border-b border-gray-50 border-dashed">
                                    <span class="text-sm text-gray-500">Periode</span>
                                    <span class="text-sm font-bold text-gray-800">{{ $latestTagihan->bulan_tagihan->format('F Y') }}</span>
                                </div>
                                <div class="flex justify-between items-center pb-2 border-b border-gray-50 border-dashed">
                                    <span class="text-sm text-gray-500">Meter Awal</span>
                                    <span class="text-sm font-bold text-gray-800">{{ $latestTagihan->meteran_awal }} m³</span>
                                </div>
                                <div class="flex justify-between items-center pb-2 border-b border-gray-50 border-dashed">
                                    <span class="text-sm text-gray-500">Meter Akhir</span>
                                    <span class="text-sm font-bold text-gray-800">{{ $latestTagihan->meteran_akhir }} m³</span>
                                </div>
                                <div class="flex justify-between items-center pb-2 border-b border-gray-50 border-dashed">
                                    <span class="text-sm text-gray-500">Pemakaian</span>
                                    <span class="text-sm font-bold text-gray-800">{{ $latestTagihan->pemakaian_air }} m³</span>
                                </div>
                            </div>

                            <div class="flex items-end justify-between relative z-10">
                                <div>
                                    <p class="text-xs text-gray-500 mb-1">Total</p>
                                    <p class="text-xl font-bold text-blue-600">Rp{{ number_format($latestTagihan->tagihan_air + $latestTagihan->abodement, 0, ',', '.') }}</p>
                                </div>
                                @if($latestTagihan->status == 'Paid')
                                    <span class="text-xs font-bold text-green-600 bg-green-100 border border-green-200 px-3 py-1.5 rounded-md">LUNAS</span>
                                @else
                                    <span class="text-xs font-bold text-red-600 bg-red-50 border border-red-100 px-3 py-1.5 rounded-md">BELUM BAYAR</span>
                                @endif
                            </div>
                        @else
                            <div class="flex-1 flex items-center justify-center text-gray-400">Belum ada data</div>
                        @endif
                    </div>

                    <!-- Tagihan IPL -->
                    <div class="bg-white rounded-[1.5rem] shadow-sm border border-gray-100 p-6 flex flex-col relative overflow-hidden">
                        <!-- Watermark/TopRight Icon -->
                        <div class="absolute top-4 right-4 opacity-20 text-orange-500">
                            <svg class="w-16 h-16" fill="currentColor" viewBox="0 0 24 24"><path d="M12 3L2 12h3v8h6v-6h2v6h6v-8h3L12 3zm0 2.7l5 4.5V18h-2v-6H9v6H7v-7.8l5-4.5z"/></svg>
                        </div>

                        <div class="flex items-center gap-3 mb-6 relative z-10">
                            <div class="w-10 h-10 bg-orange-500 text-white rounded-full flex items-center justify-center shrink-0 shadow-md">
                                <span class="font-bold">2</span>
                            </div>
                            <h3 class="font-bold text-gray-800 text-lg">Tagihan IPL</h3>
                        </div>

                        @if($latestTagihan)
                            <div class="space-y-4 mb-8 relative z-10 flex-1">
                                <div class="flex justify-between items-center pb-2 border-b border-gray-50 border-dashed">
                                    <span class="text-sm text-gray-500">Periode</span>
                                    <span class="text-sm font-bold text-gray-800">{{ $latestTagihan->bulan_tagihan->format('F Y') }}</span>
                                </div>
                                <div class="flex flex-col items-center justify-center mt-6">
                                    <p class="text-sm text-gray-500 mb-2">Total Tagihan IPL</p>
                                    <p class="text-3xl font-extrabold text-orange-500">Rp{{ number_format($latestTagihan->ipl, 0, ',', '.') }}</p>
                                </div>
                            </div>

                            <div class="flex items-end justify-between relative z-10">
                                <div>
                                    <p class="text-xs text-gray-500 mb-1">Total</p>
                                    <p class="text-xl font-bold text-orange-500">Rp{{ number_format($latestTagihan->ipl, 0, ',', '.') }}</p>
                                </div>
                                @if($latestTagihan->status == 'Paid')
                                    <span class="text-xs font-bold text-green-600 bg-green-100 border border-green-200 px-3 py-1.5 rounded-md">LUNAS</span>
                                @else
                                    <span class="text-xs font-bold text-red-600 bg-red-50 border border-red-100 px-3 py-1.5 rounded-md">BELUM BAYAR</span>
                                @endif
                            </div>
                        @else
                            <div class="flex-1 flex items-center justify-center text-gray-400">Belum ada data</div>
                        @endif
                    </div>

                    <!-- Total Tagihan (Action) -->
                    <div class="bg-white rounded-[1.5rem] shadow-[0_4px_20px_rgba(59,130,246,0.1)] border-2 border-blue-100 p-8 flex flex-col justify-center items-center text-center relative overflow-hidden">
                        <!-- Wallet Icon top right -->
                        <div class="absolute top-6 right-6">
                            <div class="w-12 h-12 bg-orange-100 text-orange-500 rounded-xl flex items-center justify-center">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                            </div>
                        </div>

                        <h3 class="font-bold text-gray-800 text-lg mb-2 self-start">Total Tagihan Anda</h3>
                        
                        <div class="w-full text-left mt-4 mb-2">
                            <p class="text-[2.5rem] font-extrabold text-[#1e3a8a] leading-none">Rp{{ number_format($totalTunggakan, 0, ',', '.') }}</p>
                        </div>
                        
                        <div class="w-full text-left bg-blue-50/50 rounded-lg p-3 mb-6">
                            <p class="text-xs text-gray-600">Total ini mencakup keseluruhan<br> tagihan yang belum dibayar.</p>
                        </div>

                        @if($totalTunggakan > 0)
                            <button class="w-full bg-orange-500 hover:bg-orange-600 text-white font-bold py-3.5 px-6 rounded-xl shadow-lg shadow-orange-200 transition-transform transform hover:-translate-y-1 mb-3">
                                Bayar Sekarang
                            </button>
                        @else
                            <button disabled class="w-full bg-green-500 text-white font-bold py-3.5 px-6 rounded-xl shadow-lg shadow-green-200 mb-3 opacity-90 cursor-not-allowed">
                                Lunas
                            </button>
                        @endif
                        
                        <a href="#riwayat" class="text-xs text-blue-600 font-semibold hover:underline">
                            Lihat Detail Tagihan &rarr;
                        </a>
                    </div>
                </div>

                <!-- Status Legend -->
                <div class="flex flex-col md:flex-row items-start md:items-center gap-4 mt-2">
                    <span class="font-bold text-sm text-gray-800">Status Tagihan:</span>
                    <div class="flex gap-4 flex-wrap">
                        <div class="flex items-center gap-2">
                            <span class="text-[10px] font-bold text-green-600 bg-green-100 border border-green-200 px-2 py-1 rounded">LUNAS</span>
                            <span class="text-[10px] text-gray-500">Tagihan telah dibayar</span>
                        </div>
                        <div class="flex items-center gap-2">
                            <span class="text-[10px] font-bold text-yellow-600 bg-yellow-100 border border-yellow-200 px-2 py-1 rounded">MENUNGGU</span>
                            <span class="text-[10px] text-gray-500">Menunggu konfirmasi pembayaran</span>
                        </div>
                        <div class="flex items-center gap-2">
                            <span class="text-[10px] font-bold text-red-600 bg-red-50 border border-red-100 px-2 py-1 rounded">BELUM BAYAR</span>
                            <span class="text-[10px] text-gray-500">Harap segera bayar</span>
                        </div>
                    </div>
                </div>

                <!-- 2-Column Grid for Graph and Info -->
                <div class="grid grid-cols-1 lg:grid-cols-[60%_auto] gap-6">
                    
                    <!-- Detail Pemakaian Air (Bar Chart) -->
                    <div class="bg-white rounded-[1.5rem] shadow-sm border border-gray-100 p-6 md:p-8 relative">
                        <div class="flex items-center gap-3 mb-8">
                            <div class="w-8 h-8 bg-blue-600 text-white rounded-full flex items-center justify-center shrink-0">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z"></path></svg>
                            </div>
                            <h3 class="font-bold text-gray-800 text-lg">Detail Pemakaian Air</h3>
                        </div>

                        <div class="flex flex-col md:flex-row gap-8 items-end">
                            <div class="w-full md:w-1/3 text-center md:text-left">
                                <p class="text-sm text-gray-500 mb-1">Pemakaian Bulan Ini</p>
                                <p class="text-4xl font-extrabold text-[#0ea5e9] mb-1">{{ $latestTagihan ? $latestTagihan->pemakaian_air : 0 }} <span class="text-xl">m³</span></p>
                                <div class="inline-flex items-center gap-1 text-xs text-green-500 font-bold bg-green-50 px-2 py-1 rounded-md">
                                    <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 10l7-7m0 0l7 7m-7-7v18"></path></svg>
                                    Normal
                                </div>
                            </div>

                            <div class="w-full md:w-2/3 relative">
                                <p class="text-[10px] text-gray-400 font-bold mb-4 uppercase tracking-wider text-center md:text-right">Grafik Pemakaian Air 6 Bulan Terakhir</p>
                                
                                <div class="flex items-end justify-between h-32 border-b border-gray-100 pb-2 relative w-full pr-10">
                                    <!-- Bar 1 -->
                                    <div class="flex flex-col items-center w-[12%] group">
                                        <div class="text-[10px] text-gray-400 font-bold mb-1 opacity-0 group-hover:opacity-100 transition-opacity">22</div>
                                        <div class="w-full bg-blue-300 rounded-t-sm" style="height: 55%;"></div>
                                        <div class="text-[10px] text-gray-500 mt-2">Mar</div>
                                    </div>
                                    <!-- Bar 2 -->
                                    <div class="flex flex-col items-center w-[12%] group">
                                        <div class="text-[10px] text-gray-400 font-bold mb-1 opacity-0 group-hover:opacity-100 transition-opacity">20</div>
                                        <div class="w-full bg-blue-300 rounded-t-sm" style="height: 50%;"></div>
                                        <div class="text-[10px] text-gray-500 mt-2">Apr</div>
                                    </div>
                                    <!-- Bar 3 -->
                                    <div class="flex flex-col items-center w-[12%] group">
                                        <div class="text-[10px] text-gray-400 font-bold mb-1 opacity-0 group-hover:opacity-100 transition-opacity">25</div>
                                        <div class="w-full bg-blue-300 rounded-t-sm" style="height: 62%;"></div>
                                        <div class="text-[10px] text-gray-500 mt-2">Mei</div>
                                    </div>
                                    <!-- Bar 4 -->
                                    <div class="flex flex-col items-center w-[12%] group">
                                        <div class="text-[10px] text-gray-400 font-bold mb-1 opacity-0 group-hover:opacity-100 transition-opacity">23</div>
                                        <div class="w-full bg-blue-300 rounded-t-sm" style="height: 57%;"></div>
                                        <div class="text-[10px] text-gray-500 mt-2">Jun</div>
                                    </div>
                                    <!-- Bar 5 -->
                                    <div class="flex flex-col items-center w-[12%] group">
                                        <div class="text-[10px] text-gray-400 font-bold mb-1 opacity-0 group-hover:opacity-100 transition-opacity">28</div>
                                        <div class="w-full bg-blue-300 rounded-t-sm" style="height: 70%;"></div>
                                        <div class="text-[10px] text-gray-500 mt-2">Jul</div>
                                    </div>
                                    <!-- Bar 6 (Current) -->
                                    <div class="flex flex-col items-center w-[12%] group relative">
                                        <div class="text-[10px] text-blue-600 font-bold mb-1">{{ $latestTagihan ? $latestTagihan->pemakaian_air : 18 }}</div>
                                        <div class="w-full bg-blue-500 rounded-t-sm shadow-md shadow-blue-200" style="height: {{ $latestTagihan ? min(($latestTagihan->pemakaian_air / 40) * 100, 100) : 45 }}%;"></div>
                                        <div class="text-[10px] font-bold text-gray-800 mt-2">Agu</div>
                                    </div>
                                    
                                    <!-- Little mascot/icon on the bottom right of the chart -->
                                    <div class="absolute -right-4 -bottom-6 w-12 h-12 text-blue-500 drop-shadow-md">
                                        <svg viewBox="0 0 24 24" fill="currentColor"><path d="M12 2c-5.33 4.55-8 8.48-8 11.8a8 8 0 0 0 16 0c0-3.32-2.67-7.25-8-11.8zm0 18a6 6 0 0 1-6-6c0-2.17 1.83-5.28 6-9.17 4.17 3.89 6 7 6 9.17a6 6 0 0 1-6 6zm-2-7a2 2 0 1 0 0 4 2 2 0 0 0 0-4z"/></svg>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Informasi Pembayaran -->
                    <div class="bg-white rounded-[1.5rem] shadow-sm border border-gray-100 p-6 md:p-8">
                        <div class="flex items-center gap-3 mb-6">
                            <div class="w-8 h-8 bg-blue-600 text-white rounded-full flex items-center justify-center shrink-0">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                            </div>
                            <h3 class="font-bold text-gray-800 text-lg">Informasi Pembayaran</h3>
                        </div>

                        <div class="space-y-4">
                            <div class="flex items-start gap-4 p-3 hover:bg-gray-50 rounded-xl transition-colors cursor-pointer border border-transparent hover:border-gray-100">
                                <div class="text-blue-500 bg-blue-50 p-2 rounded-lg shrink-0">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"></path></svg>
                                </div>
                                <div>
                                    <p class="text-sm font-bold text-gray-800">Metode Pembayaran</p>
                                    <p class="text-xs text-gray-500 mt-1">Transfer Bank, QRIS, Virtual Account, atau tunai di kantor pengelola.</p>
                                </div>
                            </div>

                            <div class="flex items-start gap-4 p-3 hover:bg-gray-50 rounded-xl transition-colors cursor-pointer border border-transparent hover:border-gray-100">
                                <div class="text-blue-500 bg-blue-50 p-2 rounded-lg shrink-0">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                                </div>
                                <div>
                                    <p class="text-sm font-bold text-gray-800">Batas Pembayaran</p>
                                    <p class="text-xs text-gray-500 mt-1">Tanggal 10 setiap bulannya.</p>
                                </div>
                            </div>

                            <div class="flex items-start gap-4 p-3 hover:bg-gray-50 rounded-xl transition-colors cursor-pointer border border-transparent hover:border-gray-100">
                                <div class="text-orange-500 bg-orange-50 p-2 rounded-lg shrink-0">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                </div>
                                <div>
                                    <p class="text-sm font-bold text-gray-800">Denda Keterlambatan</p>
                                    <p class="text-xs text-gray-500 mt-1">2% per bulan dari total tunggakan.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Informasi Perumahan -->
                <div class="mt-4">
                    <div class="flex items-center gap-2 mb-4">
                        <div class="w-8 h-8 bg-orange-500 text-white rounded-full flex items-center justify-center shrink-0">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5.882V19.24a1.76 1.76 0 01-3.417.592l-2.147-6.15M18 13a3 3 0 100-6M5.436 13.683A4.001 4.001 0 017 6h1.832c4.1 0 7.625-1.234 9.168-3v14c-1.543-1.766-5.067-3-9.168-3H7a3.988 3.988 0 01-1.564-.317z"></path></svg>
                        </div>
                        <h2 class="text-lg font-bold text-gray-800">Informasi Perumahan</h2>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                        <!-- Card 1 -->
                        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-4 flex gap-4 hover:shadow-md transition-shadow cursor-pointer">
                            <div class="w-20 h-20 rounded-xl overflow-hidden shrink-0 bg-gray-100">
                                <img src="{{ asset('images/warga/kerja_bakti.jpg') }}" class="w-full h-full object-cover">
                            </div>
                            <div class="flex flex-col justify-center">
                                <h4 class="font-bold text-gray-800 text-sm mb-1 leading-tight">Kerja Bakti Lingkungan</h4>
                                <p class="text-[11px] text-gray-500 mb-2">Minggu, 24 Agustus 2026</p>
                                <span class="text-[11px] font-bold text-blue-600">Lihat Detail &rarr;</span>
                            </div>
                        </div>

                        <!-- Card 2 -->
                        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-4 flex gap-4 hover:shadow-md transition-shadow cursor-pointer">
                            <div class="w-20 h-20 rounded-xl overflow-hidden shrink-0 bg-gray-100">
                                <img src="{{ asset('images/warga/gangguan_air.jpg') }}" class="w-full h-full object-cover">
                            </div>
                            <div class="flex flex-col justify-center">
                                <h4 class="font-bold text-gray-800 text-sm mb-1 leading-tight">Gangguan Distribusi Air</h4>
                                <p class="text-[11px] text-gray-500 mb-2">Sabtu, 23 Agustus 2026</p>
                                <span class="text-[11px] font-bold text-blue-600">Lihat Detail &rarr;</span>
                            </div>
                        </div>

                        <!-- Card 3 -->
                        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-4 flex gap-4 hover:shadow-md transition-shadow cursor-pointer">
                            <div class="w-20 h-20 rounded-xl overflow-hidden shrink-0 bg-gray-100">
                                <img src="{{ asset('images/warga/satpam.jpg') }}" class="w-full h-full object-cover">
                            </div>
                            <div class="flex flex-col justify-center">
                                <h4 class="font-bold text-gray-800 text-sm mb-1 leading-tight">Keamanan Lingkungan</h4>
                                <p class="text-[11px] text-gray-500 mb-2">Jaga selalu keamanan bersama</p>
                                <span class="text-[11px] font-bold text-blue-600">Lihat Detail &rarr;</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Footer -->
                <div class="mt-12 pt-8 border-t border-gray-200 flex flex-col md:flex-row justify-between items-center gap-4 pb-8">
                    <div class="flex items-center gap-2">
                        <svg class="w-8 h-8 text-orange-500" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M2 12C2 12 5 9 12 9C19 9 22 12 22 12" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                            <path d="M4 16C4 16 7 13 12 13C17 13 20 16 20 16" stroke="#3b82f6" stroke-width="2" stroke-linecap="round"/>
                            <path d="M12 3L4 9H20L12 3Z" fill="currentColor"/>
                        </svg>
                        <div>
                            <div class="font-bold text-orange-500 text-sm leading-tight">Antapani</div>
                            <div class="font-bold text-blue-600 text-sm leading-tight">City Mas</div>
                        </div>
                    </div>
                    
                    <div class="text-xs text-gray-400 text-center">
                        &copy; 2026 Antapani City Mas. Hak Cipta Dilindungi.
                    </div>

                    <div class="flex items-center gap-2">
                        <span class="text-xs text-gray-400 font-bold mr-2">Ikuti Kami</span>
                        <a href="#" class="w-6 h-6 rounded-full bg-[#1877F2] text-white flex items-center justify-center">
                            <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 24 24"><path d="M22 12c0-5.52-4.48-10-10-10S2 6.48 2 12c0 4.84 3.44 8.87 8 9.8V15H8v-3h2V9.5C10 7.57 11.57 6 13.5 6H16v3h-2c-.55 0-1 .45-1 1v2h3v3h-3v6.95c5.05-.5 9-4.76 9-9.95z"/></svg>
                        </a>
                        <a href="#" class="w-6 h-6 rounded-full bg-[#E4405F] text-white flex items-center justify-center">
                            <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2.16c3.2 0 3.58.01 4.85.07 3.25.15 4.77 1.69 4.92 4.92.06 1.27.07 1.65.07 4.85s-.01 3.58-.07 4.85c-.15 3.23-1.67 4.77-4.92 4.92-1.27.06-1.65.07-4.85.07s-3.58-.01-4.85-.07c-3.25-.15-4.77-1.69-4.92-4.92-.06-1.27-.07-1.65-.07-4.85s.01-3.58.07-4.85c.15-3.23 1.67-4.77 4.92-4.92 1.27-.06 1.65-.07 4.85-.07M12 0C8.74 0 8.33.01 7.05.07c-4.27.2-6.78 2.71-6.98 6.98C0 8.33 0 8.74 0 12s.01 3.67.07 4.95c.2 4.27 2.71 6.78 6.98 6.98 1.28.06 1.69.07 4.95.07s3.67-.01 4.95-.07c4.27-.2 6.78-2.71 6.98-6.98C24 15.67 24 15.26 24 12s-.01-3.67-.07-4.95c-.2-4.27-2.71-6.78-6.98-6.98C15.67.01 15.26 0 12 0zm0 5.84A6.16 6.16 0 1 0 18.16 12 6.16 6.16 0 0 0 12 5.84zm0 10.16A4 4 0 1 1 16 12a4 4 0 0 1-4 4zm7.85-11.4a1.44 1.44 0 1 1-2.88 0 1.44 1.44 0 0 1 2.88 0z"/></svg>
                        </a>
                        <a href="#" class="w-6 h-6 rounded-full bg-[#1DA1F2] text-white flex items-center justify-center">
                            <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 24 24"><path d="M24 4.56a9.83 9.83 0 0 1-2.83.78 4.93 4.93 0 0 0 2.17-2.72 9.86 9.86 0 0 1-3.13 1.2 4.93 4.93 0 0 0-8.38 4.48A13.98 13.98 0 0 1 1.67 3.15 4.93 4.93 0 0 0 3.2 9.72 4.9 4.9 0 0 1 .96 9.1v.06a4.93 4.93 0 0 0 3.95 4.83 4.92 4.92 0 0 1-2.22.08 4.93 4.93 0 0 0 4.6 3.42 9.87 9.87 0 0 1-6.1 2.1c-.4 0-.79-.02-1.18-.07a13.94 13.94 0 0 0 7.55 2.21c9.06 0 14.01-7.5 14.01-14.01 0-.21 0-.42-.01-.63A10.03 10.03 0 0 0 24 4.56z"/></svg>
                        </a>
                    </div>
                </div>

            @endif
        </div>
    </div>
</x-warga-layout>

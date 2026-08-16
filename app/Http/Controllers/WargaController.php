<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tagihan;
use App\Models\Resident;

class WargaController extends Controller
{
    public function index()
    {
        // SEMENTARA: Langsung bypass form pencarian dan ambil salah satu warga
        $resident = Resident::first();

        if (!$resident) {
            // Jika database kosong
            return view('warga.dashboard.index', ['resident' => null]);
        }

        // Set session otomatis agar navigasi mendeteksi warga sudah "masuk"
        if (!session('warga_id')) {
            session(['warga_id' => $resident->id]);
        }

        $tagihans = Tagihan::where('resident_id', $resident->id)
            ->orderBy('bulan_tagihan', 'desc')
            ->get();

        $latestTagihan = $tagihans->first();

        $totalTunggakan = $tagihans->where('status', 'Unpaid')->sum(function ($tagihan) {
            return $tagihan->tagihan_air + $tagihan->ipl + $tagihan->abodement;
        });

        return view('warga.dashboard.index', compact('resident', 'tagihans', 'latestTagihan', 'totalTunggakan'));
    }

    public function cekTagihan(Request $request)
    {
        $request->validate([
            'no_rumah' => 'required|string|max:50',
        ]);

        $resident = Resident::where('alamat', $request->no_rumah)->first();

        if ($resident) {
            session(['warga_id' => $resident->id]);
            return redirect()->route('warga.dashboard')->with('success', 'Berhasil menemukan data rumah.');
        }

        return redirect()->route('warga.dashboard')->with('error', 'Nomor rumah tidak ditemukan. Pastikan penulisannya benar.');
    }

    public function keluar()
    {
        session()->forget('warga_id');
        return redirect()->route('warga.dashboard');
    }
}

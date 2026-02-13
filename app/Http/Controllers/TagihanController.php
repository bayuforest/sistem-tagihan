<?php

namespace App\Http\Controllers;

use App\Models\Tagihan;
use App\Models\Resident;
use Illuminate\Http\Request;

class TagihanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tagihan = Tagihan::with('resident')
            ->orderByDesc('bulan_tagihan')
            ->get();

        return view('tagihan.index', compact('tagihan'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $residents = Resident::orderBy('nama')->get();
        return view('tagihan.create', compact('residents'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'bulan_tagihan' => 'required',
            'resident_id'   => 'required|exists:residents,id',
            'meteran_awal'  => 'required|integer|min:0',
            'meteran_akhir' => 'required|integer|gte:meteran_awal',
            'tagihan_air'   => 'required|integer|min:0',
        ]);

        $bulanTagihan = $validated['bulan_tagihan'] . '-01';

        Tagihan::create([
            'bulan_tagihan' => $bulanTagihan,
            'resident_id'   => $validated['resident_id'],
            'meteran_awal'  => $validated['meteran_awal'],
            'meteran_akhir' => $validated['meteran_akhir'],
            'tagihan_air'   => $validated['tagihan_air'],
            'ipl'           => 160000,
            'abodement'     => 10000,
        ]);

        return redirect()
            ->route('tagihan.index')
            ->with('success', 'Tagihan berhasil ditambahkan');
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tagihan $tagihan)
    {
        return view('tagihan.edit', compact('tagihan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Tagihan $tagihan)
    {
        $validated = $request->validate([
            'meteran_awal'  => 'required|integer|min:0',
            'meteran_akhir' => 'required|integer|gte:meteran_awal',
            'tagihan_air'   => 'required|integer|min:0',
        ]);

        $tagihan->update($validated);

        return redirect()
            ->route('tagihan.index')
            ->with('success', 'Tagihan berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tagihan $tagihan)
    {
        $tagihan->delete();

        return redirect()
            ->route('tagihan.index')
            ->with('success', 'Tagihan berhasil dihapus');
    }
}

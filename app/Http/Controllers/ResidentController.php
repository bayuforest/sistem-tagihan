<?php

namespace App\Http\Controllers;

use App\Models\Resident;
use Illuminate\Http\Request;

class ResidentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $residents = Resident::orderBy('nama')->get();
        return view('residents.index', compact('residents'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('residents.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama'   => 'required|string|max:50',
            'alamat' => 'required|string|max:50',
        ]);

        Resident::create($validated);

        return redirect()
            ->route('residents.index')
            ->with('success', 'Data resident berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Resident $resident)
    {
        return view('residents.show', compact('resident'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Resident $resident)
    {
        return view('residents.edit', compact('resident'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Resident $resident)
    {
        $validated = $request->validate([
            'nama'   => 'required|string|max:50',
            'alamat' => 'required|string|max:50',
        ]);

        $resident->update($validated);

        return redirect()
            ->route('residents.index')
            ->with('success', 'Data resident berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Resident $resident)
    {
        $resident->delete();

        return redirect()
            ->route('residents.index')
            ->with('success', 'Data resident berhasil dihapus');
    }
}

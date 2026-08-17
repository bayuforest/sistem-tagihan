<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ResidentController;
use App\Http\Controllers\TagihanController;
use App\Http\Controllers\WargaController;
use Illuminate\Support\Facades\Route;

// Public Warga Routes
Route::get('/', [WargaController::class, 'index'])->name('warga.dashboard');
Route::get('/warga', [WargaController::class, 'index']); // Alias
Route::post('/warga/cek', [WargaController::class, 'cekTagihan'])->name('warga.cek');
Route::post('/warga/keluar', [WargaController::class, 'keluar'])->name('warga.keluar');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::resource('residents', ResidentController::class);
    Route::resource('tagihan', TagihanController::class);
});

require __DIR__.'/auth.php';

Route::get('/run-migration', function () {
    \Illuminate\Support\Facades\Artisan::call('migrate');
    return \Illuminate\Support\Facades\Artisan::output();
});

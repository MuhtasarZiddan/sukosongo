<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UmkmController;
use App\Http\Controllers\PerangkatDesaController; // <-- Ini tambahan barunya
use App\Http\Controllers\BeritaController;
use Illuminate\Support\Facades\Route;

// Route halaman utama (welcome)
Route::get('/', function () {
    return view('welcome');
});

// Route yang dikunci (Hanya bisa dibuka kalau sudah login sebagai admin)
Route::middleware(['auth', 'verified'])->group(function () {
    
    // Route Dashboard UMKM
    Route::get('/dashboard', [UmkmController::class, 'index'])->name('dashboard');
    Route::resource('umkm', UmkmController::class)->except(['index', 'show']);

    // Route Struktur Organisasi / Perangkat Desa
    Route::resource('perangkat', PerangkatDesaController::class)->except(['show']);

    //Route Berita
    Route::resource('berita', BeritaController::class)->except(['show', 'index']);

});

// Route untuk edit profil (Bawaan sistem login)
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Memanggil route khusus login/register
require __DIR__.'/auth.php';
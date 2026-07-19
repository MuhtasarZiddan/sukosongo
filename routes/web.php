<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UmkmController; // <-- 1. Kita panggil controller UMKM di sini
use Illuminate\Support\Facades\Route;

// Route halaman utama (welcome)
Route::get('/', function () {
    return view('welcome');
});

// Route yang dikunci (Hanya bisa dibuka kalau sudah login)
Route::middleware(['auth', 'verified'])->group(function () {
    
    // 2. Route Dashboard yang tadinya kosong, sekarang diarahkan ke UmkmController
    Route::get('/dashboard', [UmkmController::class, 'index'])->name('dashboard');
    
    // 3. Route "Sakti" untuk otomatis membuat jalur Tambah, Edit, dan Hapus UMKM
    Route::resource('umkm', UmkmController::class)->except(['index', 'show']);

});

// Route untuk edit profil (Bawaan sistem login, jangan dihapus)
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});



// Memanggil route khusus login/register
require __DIR__.'/auth.php';
<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UmkmController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PerangkatDesaController; // <-- Ini tambahan barunya
use App\Http\Controllers\BeritaController;
use Illuminate\Support\Facades\Route;

// Route halaman utama (welcome)
Route::get('/', function (BeritaController $beritaController, PerangkatDesaController $perangkatController) {
    $beritaTerbaru = $beritaController->terbaru();
    $strukturData = $perangkatController->dataStruktur();

    return view('welcome', array_merge(
        compact('beritaTerbaru'),
        $strukturData
    ));
});

Route::get('/profil-desa', function () {
    return view('profil-desa');
});

Route::get('/berita', [BeritaController::class, 'publicIndex'])->name('berita.page');

Route::get('/berita/{berita}', [BeritaController::class, 'show'])->name('berita.detail');

// Route katalog UMKM publik — bisa diakses siapa aja, tanpa login
Route::get('/umkm', [UmkmController::class, 'halamanumkm'])->name('umkm.halamanumkm');

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

route::middleware(['auth', 'role:superadmin|admin'])->group(function () {
    Route::get('/user', [UserController::class, 'index'])->name('users.index');
    Route::get('/user-create', [UserController::class, 'create'])->name('users.create');
    Route::post('/user-store', [UserController::class, 'store'])->name('users.store');
    Route::get('/user-edit/{user}', [UserController::class, 'edit'])->name('users.edit');
    Route::put('/user-update/{user}', [UserController::class, 'update'])->name('users.update');
    Route::delete('/user-delete/{user}', [UserController::class, 'destroy'])->name('users.destroy');
});

require __DIR__.'/auth.php';
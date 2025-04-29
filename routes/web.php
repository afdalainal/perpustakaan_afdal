<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('superadmin.dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::resource('buku', \App\Http\Controllers\Superadmin\BukuController::class);
    Route::resource('pengguna', \App\Http\Controllers\Superadmin\PenggunaController::class);
    Route::resource('peminjaman', \App\Http\Controllers\Superadmin\PeminjamanController::class);
    Route::resource('pengembalian', \App\Http\Controllers\Superadmin\PengembalianController::class);

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
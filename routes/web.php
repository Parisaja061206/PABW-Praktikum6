<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LaporBanjirController;

// Halaman Utama & Form Pelaporan (Bisa diakses tanpa login)
Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/laporan/tambah', [LaporBanjirController::class, 'create'])->name('laporan.create');
Route::post('/laporan', [LaporBanjirController::class, 'store'])->name('laporan.store');

// Auth Routes (Tamu / Belum Login)
Route::middleware('guest')->group(function () {
    Route::get('/register', [RegisterController::class, 'create'])->name('register');
    Route::post('/register', [RegisterController::class, 'store']);
    Route::get('/login', [LoginController::class, 'create'])->name('login');
    Route::post('/login', [LoginController::class, 'store']);
});

// Logout Route
Route::post('/logout', [LoginController::class, 'destroy'])->name('logout');

// Protected Routes (Hanya bisa diakses petugas yang sudah login)
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [HomeController::class, 'dashboard'])->name('dashboard');
    Route::get('/profile', [HomeController::class, 'profile'])->name('profile');
    
    // Halaman daftar laporan kini diproteksi agar hanya petugas yang bisa melihat
    Route::get('/laporan', [LaporBanjirController::class, 'index'])->name('laporan.index');
});
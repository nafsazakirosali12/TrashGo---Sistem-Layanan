<?php

use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\MasyarakatAuthController;
use App\Http\Controllers\MasyarakatController;
use App\Http\Controllers\PetugasAuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PetugasController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;

Route::get('/', function () {
    return view('layouts.app');
});

Route::middleware('admin.auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    // PROFIL ADMIN
    Route::get('/admin/profil', [ProfileController::class, 'index'])->name('admin.profil.index');
    Route::get('/admin/profil/edit', [ProfileController::class, 'edit'])->name('admin.profil.edit');
    Route::post('/admin/profil/update', [ProfileController::class, 'update'])->name('admin.profil.update');
});

Route::middleware('masyarakat.auth')->group(function () {
   Route::get('/home_masyarakat', [MasyarakatController::class, 'index'])->name('home_masyarakat');
});

Route::middleware('petugas.auth')->group(function () {
   Route::get('/home_petugas', [PetugasController::class, 'index'])->name('home_petugas');
});

// Route::get('/tambah-akun', [PetugasController::class, 'index'])->name('tambah-akun');
// Route::get('/tambah-akun/create', [PetugasController::class, 'create'])->name('tambah-akun.create');
// Route::get('/tambah-akun/{id}', [PetugasController::class, 'edit'])->name('tambah-akun.edit');
// Route::post('/tambah-akun', [PetugasController::class, 'store'])->name('tambah-akun.store');
// Route::put('/tambah-akun/{id}', [PetugasController::class, 'update'])->name('tambah-akun.update');
// Route::delete('/tambah-akun/{id}', [PetugasController::class, 'delete'])->name('tambah-akun.delete');

Route::get('/tambah-akun', [PetugasController::class, 'index'])->name('tambah-akun');
Route::get('/tambah-akun/create', [PetugasController::class, 'create'])->name('tambah-akun.create');
Route::post('/tambah-akun', [PetugasController::class, 'store'])->name('tambah-akun.store');
Route::get('/tambah-akun/{id}', [PetugasController::class, 'edit'])->name('tambah-akun.edit');
Route::put('/tambah-akun/{id}', [PetugasController::class, 'update'])->name('tambah-akun.update');
Route::delete('/tambah-akun/{id}', [PetugasController::class, 'destroy'])->name('tambah-akun.delete');

Route::resource('kategori', KategoriController::class);

Route::get('/profil', function () {
    return view('pages.profil.index');
});

// Route::view('/admin/profil', 'pages.profil.index')->name('pages.profil.index');
// Route::view('/admin/profile/edit', 'pages.profil.edit')->name('pages.profil.edit');
    
// ============== LOGIN & LOGOUT ================
Route::get('/login', [AuthController::class, 'showLogin'])->middleware('guest:admin,masyarakat,petugas');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// UNTUK MONITORING ORDER
use App\Http\Controllers\OrderController;
Route::get('/monitoring', [OrderController::class, 'monitoring'])->name('monitoring');

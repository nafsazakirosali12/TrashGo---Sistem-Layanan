<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PetugasController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\DashboardController;

Route::get('/', function () {
    return view('layouts.app');
});

Route::middleware('admin.auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
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

//untuk profil pengguna
use App\Http\Controllers\ProfileController;

Route::get('/admin/profil', [ProfileController::class, 'index'])
    ->middleware('admin.auth')
    ->name('admin.profil.index');

Route::get('/admin/profil/edit', [ProfileController::class, 'edit'])
    ->middleware('admin.auth')
    ->name('admin.profil.edit');

Route::post('/admin/profil/update', [ProfileController::class, 'update'])
    ->middleware('admin.auth')
    ->name('admin.profil.update');

    
// ============== LOGIN & LOGOUT ================
Route::get('/login', [AuthController::class, 'showLogin'])->middleware('guest:admin');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout']);

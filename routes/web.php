<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PetugasController;

Route::get('/', function () {
    return view('layouts.app');
});

Route::get('/dashboard', function () {
    return view('pages.dashboard');
})->name('dashboard');

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
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\Admin\AuthController;

Route::get('/', function () {
    return view('layouts.app');
});

Route::middleware('admin.auth')->group(function () {
    Route::get('/dashboard', function () {
        return view('pages.dashboard');
    });
});

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
Route::get('/admin/login', [AuthController::class, 'showLogin'])->middleware('guest:admin');
Route::post('/admin/login', [AuthController::class, 'login']);
Route::post('/admin/logout', [AuthController::class, 'logout']);



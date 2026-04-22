<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KategoriController;

Route::get('/', function () {
    return view('layouts.app');
});

Route::get('/dashboard', function () {
    return view('pages.dashboard');
});

Route::get('/profil', function () {
    return view('pages.profil.index');
});

Route::resource('kategori', KategoriController::class);
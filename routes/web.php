<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('layouts.app');
});

Route::get('/dashboard', function () {
    return view('pages.dashboard');
});

Route::get('/profil', function () {
    return view('pages.profil.index');
});

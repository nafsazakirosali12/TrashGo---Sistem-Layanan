<?php

use App\Http\Controllers\AboutController;
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
use App\Http\Controllers\OrderController;
use App\Http\Controllers\NotifikasiController;
use App\Http\Controllers\PointController;
use App\Http\Controllers\PembayaranController;


Route::get('/', function () {
    return view('masyarakat.pages.home_masyarakat');
});

Route::middleware('admin.auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    // PROFIL ADMIN
    Route::get('/admin/profil', [ProfileController::class, 'index'])->name('admin.profil.index');
    Route::get('/admin/profil/edit', [ProfileController::class, 'edit'])->name('admin.profil.edit');
    Route::post('/admin/profil/update', [ProfileController::class, 'update'])->name('admin.profil.update');
    Route::get('/tambah-akun', [PetugasController::class, 'index'])->name('tambah-akun');
    Route::get('/tambah-akun/create', [PetugasController::class, 'create'])->name('tambah-akun.create');
    Route::post('/tambah-akun', [PetugasController::class, 'store'])->name('tambah-akun.store');
    Route::get('/tambah-akun/{id}', [PetugasController::class, 'edit'])->name('tambah-akun.edit');
    Route::put('/tambah-akun/{id}', [PetugasController::class, 'update'])->name('tambah-akun.update');
    Route::delete('/tambah-akun/{id}', [PetugasController::class, 'destroy'])->name('tambah-akun.delete');
    Route::resource('kategori', KategoriController::class);
    Route::get('/monitoring', [OrderController::class, 'monitoring'])->name('monitoring');
});

Route::middleware('masyarakat.auth')->group(function () {
   Route::get('/home_masyarakat', [MasyarakatController::class, 'index'])->name('masyarakat.pages.home_masyarakat');
   Route::get('/masyarakat/profile', [MasyarakatController::class, 'profile'])->name('masyarakat.profile_m');
   Route::get('/masyarakat/profile/edit', [MasyarakatController::class, 'editProfile'])->name('masyarakat.profile_m.edit_m');
   Route::post('/masyarakat/profile/update', [MasyarakatController::class, 'updateProfile'])->name('masyarakat.profile_m.update');
   Route::get('/point', [PointController::class, 'index'])->name('masyarakat.pages.point');
   Route::get('/notifikasi', [NotifikasiController::class, 'index'])->name('masyarakat.pages.notifikasi');
   Route::get('/riwayat_order', [OrderController::class, 'history'])->name('masyarakat.pages.riwayat_order');
   Route::get('/about_us', [AboutController::class, 'about_us'])->name('masyarakat.pages.about_us');
   Route::get('/order', [OrderController::class, 'index'])->name('masyarakat.pages.order');
   Route::post('/order', [OrderController::class, 'store'])->name('order.store');
   Route::get('/pembayaran/{order}', [PembayaranController::class, 'show'])->name('pembayaran.show');
   Route::post('/pembayaran/{order}', [PembayaranController::class, 'store'])->name('pembayaran.store');
});

Route::middleware('petugas.auth')->group(function () {
   Route::get('/home_petugas', [PetugasController::class, 'index'])->name('home_petugas');

});

Route::get('/profil', function () {
    return view('pages.profil.index');
});

// ============== LOGIN & LOGOUT ================
Route::get('/login', [AuthController::class, 'showLogin'])->name('login')->middleware('guest:admin,masyarakat,petugas');
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');


Route::get('/order', [OrderController::class, 'index'])->name('masyarakat.pages.order');

Route::get('/point', [PointController::class, 'index'])->name('masyarakat.pages.point');

Route::get('/riwayat-order', [OrderController::class, 'riwayat'])->name('masyarakat.pages.riwayat_order');

// ============== REGISTER ================
Route::get('/register', [AuthController::class, 'showRegister'])
    ->middleware('guest:admin,masyarakat,petugas');

Route::post('/register', [AuthController::class, 'register']);

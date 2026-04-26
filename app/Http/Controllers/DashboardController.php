<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;
use App\Models\Pembayaran;

class DashboardController extends Controller
{
    public function index()
    {
        $total_pembayaran = Pembayaran::where('status', 'successed')->sum('total_pembayaran');
        $total_kategori = Kategori::count();
        return view('pages.dashboard', compact('total_pembayaran', 'total_kategori'));
    }
}
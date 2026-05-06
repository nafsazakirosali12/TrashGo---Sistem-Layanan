<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Pembayaran;
use App\Models\Order;
use App\Models\Petugas;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $total_pembayaran = Pembayaran::where('status', 'success')->sum('total_pembayaran');

        $total_kategori = Kategori::count();

        $total_order = Order::count();

        $total_petugas = Petugas::count();

        return view('pages.dashboard', compact(
            'total_pembayaran',
            'total_kategori',
            'total_order',
            'total_petugas'
        ));
    }
}
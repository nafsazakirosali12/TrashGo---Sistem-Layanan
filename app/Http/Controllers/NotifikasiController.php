<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Pembayaran;

class NotifikasiController extends Controller
{
    public function index()
    {
        $orders = Order::latest()->get();
        $pembayarans = Pembayaran::latest()->get();

        return view('masyarakat.pages.notifikasi', compact('orders', 'pembayarans'));
    }
}

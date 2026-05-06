<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Pembayaran;

class NotifikasiController extends Controller
{
    public function index()
    {
        $lastTimeOrder = Order::latest()->first()?->created_at;
        $lastTimePembayaran = Pembayaran::latest()->first()?->created_at;

        $lastTime = collect([$lastTimeOrder, $lastTimePembayaran])->max();

        session(['last_read_notif' => $lastTime]);

        $orders = Order::latest()->get();
        $pembayarans = Pembayaran::latest()->get();

        return view('masyarakat.pages.notifikasi', compact('orders', 'pembayarans'));
    }
}

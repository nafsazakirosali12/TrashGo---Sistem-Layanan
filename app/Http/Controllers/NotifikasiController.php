<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Pembayaran;

class NotifikasiController extends Controller
{
    public function index()
        {
            $user = auth('masyarakat')->user();

            $orders = Order::where('masyarakat_id', $user->id)->latest()->get();
            $pembayarans = Pembayaran::where('masyarakat_id', $user->id)->latest()->get();

            // simpan waktu terakhir baca
            $lastTimeOrder = $orders->first()?->created_at;
            $lastTimePembayaran = $pembayarans->first()?->created_at;

            $lastTime = collect([$lastTimeOrder, $lastTimePembayaran])->max();

            $user = auth('masyarakat')->user();

            $user->last_read_notif = $lastTime; 
            $user->save();

            return view('masyarakat.pages.notifikasi', compact('orders', 'pembayarans'));
        }
}

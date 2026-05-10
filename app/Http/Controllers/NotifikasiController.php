<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Order;
use App\Models\Pembayaran;

class NotifikasiController extends Controller
{
    public function index()
    {
        $user = auth('masyarakat')->user();

        $orders = Order::where('masyarakat_id', $user->id)
            ->select(
                'id',
                'status',
                'created_at',
                DB::raw("'order' as type")
            );

        $pembayarans = Pembayaran::where('masyarakat_id', $user->id)
            ->select(
                'id',
                'status',
                'created_at',
                DB::raw("'payment' as type")
            );

        $notifications = $orders
            ->unionAll($pembayarans)
            ->orderByDesc('created_at')
            ->paginate(15);

        // update last read
        $lastTime = $notifications->first()?->created_at;

        $user->last_read_notif = $lastTime;
        $user->save();

        return view('masyarakat.pages.notifikasi', compact('notifications'));
    }
}
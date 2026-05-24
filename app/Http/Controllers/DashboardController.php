<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Pembayaran;
use App\Models\Order;
use App\Models\Petugas;
use Illuminate\Http\Request;
use App\Models\Pickup;
use App\Models\Pendapatan;
use Illuminate\Support\Facades\Auth;

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
    
    public function dashboard_p()
    {
        $petugas_id = Auth::guard('petugas')->id();

        // total pendapatan
        $total_pendapatan = Order::where('status', 'completed')
            ->whereHas('pickup', function ($query) use ($petugas_id) {
                $query->where('petugas_id', $petugas_id);
            })
            ->sum('total_harga');

        // total pengangkutan selesai
        $pickup_completed = Pickup::where('petugas_id', $petugas_id)
            ->whereHas('order', function ($query) {
                $query->where('status', 'completed');
            })
            ->count();

        // total pengangkutan diproses
        $pickup_processing = Pickup::where('petugas_id', $petugas_id)
            ->whereHas('order', function ($query) {
                $query->where('status', 'processing');
            })
            ->count();

        // total pengangkutan selesai hari ini
        $pickup_today = Pickup::where('petugas_id', $petugas_id)
            ->whereDate('created_at', today())
            ->whereHas('order', function ($query) {
                $query->where('status', 'completed');
            })
            ->count();

        return view('petugas.layouts_p.dashboard_p', compact(
            'total_pendapatan',
            'pickup_completed',
            'pickup_processing',
            'pickup_today'
        ));
    }
}
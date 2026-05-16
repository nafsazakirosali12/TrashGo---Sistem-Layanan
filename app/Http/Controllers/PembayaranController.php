<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Pembayaran;
use App\Models\Point;
use Illuminate\Http\Request;
use Carbon\Carbon;

class PembayaranController extends Controller
{
    public function store(Request $request, $order_id)
    {
        // 1. VALIDASI
        $request->validate([
            'metode_pembayaran' => 'required|in:cod,transfer',
            'point_digunakan' => 'nullable|integer',
            'bukti_pembayaran' => 'required_if:metode_pembayaran,transfer|image',
        ]);

        // 2. AMBIL ORDER
        $order = Order::findOrFail($order_id);

        $total = $order->total_harga;

        $pakaiPoint = $request->has('pakai_point');
        $pointDigunakan = 0;
        $diskon = 0;

        // 3. LOGIKA POINT
        if ($pakaiPoint) {

        $pointDigunakan = $request->point_digunakan ?? 0;

        if ($pointDigunakan < 10) {
            return back()->with('error', 'Minimal 10 point');
        }

        $totalPointUser = Point::where('masyarakat_id', $order->masyarakat_id)
            ->sum('total_point');

        if ($pointDigunakan > $totalPointUser) {
            return back()->with('error', 'Point tidak cukup');
        }

        $diskon = $pointDigunakan * 10;
        $total -= $diskon;

        if ($total < 0) $total = 0;

        Point::create([
            'masyarakat_id' => $order->masyarakat_id,
            'order_id' => $order->id,
            'total_point' => -$pointDigunakan,
            'tanggal_point' => Carbon::now(),
        ]);
    }

        // 4. UPLOAD BUKTI
        $bukti = null;

        if ($request->hasFile('bukti_pembayaran')) {
            $bukti = $request->file('bukti_pembayaran')
                ->store('bukti_pembayaran', 'public');
        }

        // 5. SIMPAN PEMBAYARAN
        $statusPembayaran = 'pending';
            
        $pembayaran = Pembayaran::create([
            'masyarakat_id' => $order->masyarakat_id,
            'order_id' => $order->id,
            'metode_pembayaran' => $request->metode_pembayaran,
            'pakai_point' => $pakaiPoint,
            'point_digunakan' => $pointDigunakan,
            'total_pembayaran' => $total,
            'bukti_pembayaran' => $bukti,
            'tanggal_pembayaran' => Carbon::now(),
            'status' =>  $statusPembayaran,
        ]);

        // 6. UPDATE STATUS ORDER
        $order->update([
            'status' => 'pending'
        ]);

        // 7. REDIRECT
        // return redirect()->route('masyarakat.pages.notifikasi')->with('success', 'Pembayaran berhasil diproses!');
        return redirect()->route('masyarakat.pages.notifikasi')
            ->with([
                'success' => 'Pembayaran berhasil diproses!',
                'highlight_order_id' => $order->id,
                'highlight_payment_id' => $pembayaran->id
            ]);
    }

    public function show($order_id)
    {
        $order = Order::findOrFail($order_id);

        $total_point = Point::where('masyarakat_id', $order->masyarakat_id)
            ->sum('total_point');

        return view('masyarakat.pages.pembayaran', compact('order', 'total_point'));
    }
}
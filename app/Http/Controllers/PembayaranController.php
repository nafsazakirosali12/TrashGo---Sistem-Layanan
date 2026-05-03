<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Pembayaran;
use Illuminate\Http\Request;
use Carbon\Carbon;

class PembayaranController extends Controller
{
    public function store(Request $request, $order_id)
    {
        $request->validate([
            'metode_pembayaran' => 'required|in:cod,transfer',
            'pakai_point' => 'nullable',
            'point_digunakan' => 'nullable|integer',
            'bukti_pembayaran' => 'nullable|image',
        ]);

        $order = Order::findOrFail($order_id);

        $total = $order->total_harga;

        $pakaiPoint = $request->has('pakai_point');

        $pointDigunakan = 0;
        $diskon = 0;

        if ($pakaiPoint) {

            $pointDigunakan = $request->point_digunakan;

            if ($pointDigunakan < 10) {
                return back()->with('error', 'Minimal penggunaan 10 point');
            }

            $diskon = $pointDigunakan * 10;

            $total = $total - $diskon;

            if ($total < 0) {
                $total = 0;
            }
        }

        $bukti = null;

        if ($request->hasFile('bukti_pembayaran')) {
            $bukti = $request->file('bukti_pembayaran')
                ->store('bukti_pembayaran', 'public');
        }

        Pembayaran::create([
            'masyarakat_id' => $order->masyarakat_id,
            'order_id' => $order->id,
            'metode_pembayaran' => $request->metode_pembayaran,
            'pakai_point' => $pakaiPoint,
            'point_digunakan' => $pointDigunakan,
            'total_pembayaran' => $total,
            'bukti_pembayaran' => $bukti,
            'tanggal_pembayaran' => Carbon::now(),
            'status' => 'pending',
        ]);

        return redirect()->route('order.show', $order->id)
            ->with('success', 'Pembayaran berhasil diproses!');
    }

    public function show($order_id)
    {
        $order = Order::findOrFail($order_id);

        return view('pembayaran.show', compact('order'));
    }
}
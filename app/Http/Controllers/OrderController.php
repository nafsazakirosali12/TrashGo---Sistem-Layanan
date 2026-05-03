<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Point;
use Carbon\Carbon;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function monitoring()
    {
        $orders = Order::all(); // ambil semua data
        return view('admin.monitoring', compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function store(Request $request)
    {
        // 1. VALIDASI FORM
        $request->validate([
            'kategori_id' => 'required',
            'lokasi' => 'required',
            'tanggal' => 'required',
            'waktu' => 'required',
            'total_harga' => 'required|integer',
            'catatan' => 'required',
        ]);

        // 2. SIMPAN ORDER
        $order = Order::create([
            'masyarakat_id' => auth()->id(),
            'kategori_id' => $request->kategori_id,
            'lokasi' => $request->lokasi,
            'tanggal' => $request->tanggal,
            'waktu' => $request->waktu,
            'total_harga' => $request->total_harga,
            'catatan' => $request->catatan,
            'status' => 'pending',
        ]);

        // 3. LANJUT KE PEMBAYARAN
        return redirect()->route('pembayaran.show', $order->id);
    }
}

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order)
    {
        //
    }

    public function update_status_point($id)
    {
        $order = Order::findOrfail($id);
        $order->status = 'completed';
        $order->save();

        $cek_point = Point::where('order_id', $order->id)->where('total_point', 10)->first();
        if(!$cek_point){
            Point::create([
                'masyarakat_id' => $order->masyarakat_id,
                'order_id' => $order->id,
                'total_point' => 10,
                'tanggal_point' => Carbon::now(),
            ]);
        }
        
        return redirect()->back()->with('success', 'Order berstatus completed dan 10 Poin telah diberikan!');
    }
}

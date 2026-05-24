<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Pickup;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Pendapatan;
use App\Models\Point;
use Carbon\Carbon;

class PickupController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $orders = Order::with(['masyarakat', 'kategori', 'pembayaran'])
            ->where('status', 'pending')
            ->latest()
            ->paginate(16);

        return view('petugas.pages_p.daftar_pesanan', compact('orders'));
    }

public function ambil(int $id)
{
    $order = Order::findOrFail($id);

    // optional: cegah double ambil order yang sama oleh petugas yang sama
    $exists = Pickup::where('order_id', $id)
        ->where('petugas_id', Auth::guard('petugas')->id())
        ->where('status', 'processing')
        ->exists();

    if ($exists) {
        return back()->with('error', 'Order sudah kamu ambil');
    }

    Pickup::create([
        'order_id' => $order->id,
        'petugas_id' => Auth::guard('petugas')->id(),
        'status' => 'processing',
    ]);

    return redirect()->route('pengangkutan')
        ->with('success', 'Pesanan berhasil diambil');
}

    /**
     * Show the form for creating a new resource.
     */
public function create()
{
    $pickups = Pickup::with([
        'order.masyarakat',
        'order.kategori',
        'order.pembayaran'
    ])
    ->where('petugas_id', Auth::guard('petugas')->id())
    ->where('status', 'processing')
    ->latest()
    ->get();

    return view(
        'petugas.pages_p.pengangkutan_p',
        compact('pickups')
    );
}

    public function selesai($id)
    {
        // $order = Order::findOrFail($id);
        // $order->status = 'completed';
        // $order->save();
        // Pickup::where('order_id', $order->id)->update(['status' => 'completed']);
        // return back()->with('success', 'Pengangkutan selesai');
        $order = Order::findOrFail($id);

    $order->update([
        'status' => 'completed'
    ]);

    Pickup::where('order_id', $id)
        ->where('petugas_id', Auth::guard('petugas')->id())
        ->update([
            'status' => 'completed'
        ]);

    // TAMBAH POINT
    $cek_point = Point::where('order_id', $order->id)
        ->where('total_point', '>', 0)
        ->first();

    if(!$cek_point){
        Point::create([
            'masyarakat_id' => $order->masyarakat_id,
            'order_id' => $order->id,
            'total_point' => 10,
            'tanggal_point' => Carbon::now(),
        ]);
    }

    // TAMBAH PENDAPATAN
    Pendapatan::create([
        'order_id' => $order->id,
        'petugas_id' => Auth::guard('petugas')->id(),
        'total_pendapatan' => $order->total_harga,
        'tanggal_pendapatan' => Carbon::now(),
    ]);

    return back()->with('success', 'Pengangkutan selesai');
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
    public function show(Pickup $pickup)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pickup $pickup)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
public function update(Request $request, $id)
{
    $order = Order::findOrFail($id);

    // update status order
    $order->status = $request->status_order;
    $order->save();

    // update status pembayaran
    if ($order->pembayaran) {

        $order->pembayaran->status = $request->status_pembayaran;
        $order->pembayaran->save();

    }

    // // update status pickup
    // if ($order->pickup) {

    //     $order->pickup->status = $request->status_pickup;
    //     $order->pickup->save();

    // }

    return back()->with('success', 'Data berhasil diupdate');
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pickup $pickup)
    {
        //
    }
}

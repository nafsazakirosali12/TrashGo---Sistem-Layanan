<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Pickup;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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

    // ubah status order jadi processing
    $order->status = 'processing';
    $order->save();
    
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
    $order = Order::with('pembayaran')->findOrFail($id);

    // cek status order
    if ($order->status !== 'completed') {
        return back()->with('error', 'Status order harus completed terlebih dahulu');
    }

    // cek pembayaran
    if ($order->pembayaran->status !== 'success') {
        return back()->with('error', 'Status pembayaran harus success terlebih dahulu');
    }

    // pindahkan pickup ke completed
    Pickup::where('order_id', $id)
        ->where('petugas_id', Auth::guard('petugas')->id())
        ->update([
            'status' => 'completed'
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

    // update pembayaran
    if ($order->pembayaran) {

        $order->pembayaran->status = $request->status_pembayaran;

        $order->pembayaran->save();
    }

    // update order
    $order->status = $request->status_order;

    $order->save();

    return back()->with('success', 'Data pengangkutan berhasil diperbarui');
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pickup $pickup)
    {
        //
    }
}

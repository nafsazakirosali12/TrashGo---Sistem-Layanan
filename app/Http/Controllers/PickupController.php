<?php

namespace App\Http\Controllers;

use App\Models\Pickup;
use Illuminate\Http\Request;
use App\Models\Order;

class PickupController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $orders = Order::with('pembayaran')->where('status', 'processing')->get();
        return view('petugas.pages_p.pengangkutan_p', compact('orders'));
    }

    public function selesai($id)
    {
        $order = Order::findOrFail($id);
        $order->status = 'completed';
        $order->save();
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

    // update / create pembayaran
    $order->pembayaran()->updateOrCreate(
        ['order_id' => $order->id],
        ['status' => $request->status_payment]
    );

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

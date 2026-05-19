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
        $berhasil = DB::transaction(function () use ($id) {
            $order = Order::where('id', $id)
                ->where('status', 'pending')
                ->lockForUpdate()
                ->first();

            if (!$order) {
                return false;
            }

            $order->update([
                'status' => 'processing',
            ]);

            Pickup::create([
                'order_id' => $order->id,
                'petugas_id' => Auth::guard('petugas')->id(),
                'status' => 'processing',
            ]);

            return true;
        });

        if (!$berhasil) {
            return redirect()->route('daftar-pesanan')
                ->with('error', 'Pesanan sudah diambil oleh petugas lain.');
        }

        return redirect()->route('pengangkutan')
            ->with('success', 'Pesanan berhasil diambil dan masuk ke pengangkutan.');
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

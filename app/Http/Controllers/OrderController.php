<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Point;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Kategori;

class OrderController extends Controller
{
    // public function index()
    // {
    //     $orders = Order::where('masyarakat_id', auth()->id())->get();

    //     return view('masyarakat.pages.order', compact('orders'));
    // }
    /**
     * Display a listing of the resource.
     */
    public function monitoring()
    {
        $orders = Order::all(); // ambil semua data
        return view('admin.monitoring', [
            'dataOrders' => Order::with(['masyarakat','kategori'])->get()
            ]);
    }

    public function index()
    {
        $user = auth('masyarakat')->user();

    // cek profil lengkap
    if (
        empty($user->alamat) ||
        empty($user->no_telepon)
    ) {
       return redirect('/masyarakat/profile/edit?redirect=order')
       ->with('warning', 'Lengkapi profil terlebih dahulu sebelum melakukan order.');
    }

    $kategoris = Kategori::all();

    return view('masyarakat.pages.order', compact('kategoris', 'user'));

    }

    // public function create()
    // {
    //     $kategoris = Kategori::all();

    //     return view('masyarakat.pages.order_form', compact('kategoris'));
    // }

    /**
     * Show the form for creating a new resource.
     */
    public function store(Request $request)
    {
        // $user = auth()->user();
        // if (!$user) {
        //     return redirect('/login');
        // }

        // 1. VALIDASI FORM
        $request->validate([
            'kategori_id' => 'required',
            'lokasi' => 'required',
            'tanggal' => 'required',
            'waktu' => 'required',
            // 'total_harga' => 'required|integer',
            'catatan' => 'required',
        ]);

        // 2. SIMPAN ORDER
        $order = Order::create([
            'masyarakat_id' => auth('masyarakat')->id(),
            'kategori_id' => $request->kategori_id,
            'lokasi' => $request->lokasi,
            'tanggal' => $request->tanggal,
            'waktu' => $request->waktu,
            'total_harga' => 10000,
            'catatan' => $request->catatan,
            'status' => 'pending',
        ]);

        // 3. LANJUT KE PEMBAYARAN
        return redirect()->route('pembayaran.show', $order->id) ->with('success', 'Order berhasil dibuat, lanjut ke pembayaran!');
    }
    /**
     * Display the specified resource.
     */
    // public function show(Order $order)
    // {
    //     //
    // }

    public function history()
    {
        $riwayatOrders = Order::with(['kategori', 'pembayaran'])
            ->where('masyarakat_id', auth('masyarakat')->id())
            ->latest()
            ->paginate(9);

        return view('masyarakat.pages.riwayat_order', compact('riwayatOrders'));
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

        $cek_point = Point::where('order_id', $order->id)->where('total_point', '>', 0)->first();
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

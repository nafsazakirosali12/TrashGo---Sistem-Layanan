<?php

namespace App\Http\Controllers;

use App\Models\Pendapatan;
use Illuminate\Http\Request;
use Carbon\Carbon;

class PendapatanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $petugasId = auth('petugas')->id();

        $query = Pendapatan::with([
            'order.pembayaran'
        ])->where('petugas_id', $petugasId);

        // FILTER TANGGAL
        if(request('dari') && request('sampai')){
            $query->whereBetween(
                'tanggal_pendapatan',
                [
                    Carbon::parse(request('dari'))->startOfDay(),
                    Carbon::parse(request('sampai'))->endOfDay()
                ]
            );
        }

        $pendapatans = $query->latest()->paginate(10);

        // TOTAL HARI INI
        $hariIni = Pendapatan::where('petugas_id', $petugasId)->whereDate(
                'tanggal_pendapatan',
                Carbon::today()
            )->sum('total_pendapatan');

        // TOTAL MINGGU INI
        $mingguIni = Pendapatan::where('petugas_id', $petugasId)->whereBetween(
            'tanggal_pendapatan',
            [
                Carbon::now()->startOfWeek(),
                Carbon::now()->endOfWeek()
            ]
        )->sum('total_pendapatan');

        // TOTAL BULAN INI
        $bulanIni = Pendapatan::where('petugas_id', $petugasId)->whereMonth(
            'tanggal_pendapatan',
            Carbon::now()->month
        )->whereYear(
            'tanggal_pendapatan',
            Carbon::now()->year
        )->sum('total_pendapatan');

        // TOTAL TAHUN INI
        $tahunIni = Pendapatan::where(
            'petugas_id',
            auth('petugas')->id()
        )->whereYear(
            'tanggal_pendapatan',
            Carbon::now()->year
        )->sum('total_pendapatan');

        return view('petugas.pages_p.pendapatan', compact(
            'pendapatans',
            'hariIni',
            'mingguIni',
            'bulanIni',
            'tahunIni'
        ));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
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
    public function show(Pendapatan $pendapatan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pendapatan $pendapatan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pendapatan $pendapatan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pendapatan $pendapatan)
    {
        //
    }
}

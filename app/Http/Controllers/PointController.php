<?php

namespace App\Http\Controllers;

use App\Models\Point;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PointController extends Controller
{
    public function index()
    {
        $masyarakat_id = Auth::guard('masyarakat')->id();
        $riwayat_point = Point::where('masyarakat_id', $masyarakat_id)->orderBy('tanggal_point', 'desc')->get();
        $total_point = Point::where('masyarakat_id', $masyarakat_id)->sum('total_point');
        return view('masyarakat.pages.point', compact('riwayat_point', 'total_point'));
    }
}

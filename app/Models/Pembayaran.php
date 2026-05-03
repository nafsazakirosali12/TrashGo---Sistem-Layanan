<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
    protected $table = 'pembayarans';

    protected $fillable = [
        'masyarakat_id',
        'order_id',
        'metode_pembayaran',
        'pakai_point',
        'point_digunakan',
        'total_pembayaran',
        'bukti_pembayaran',
        'tanggal_pembayaran',
        'status',
    ];

    public function order()
    {
        return $this->belongsTo(Order::class, 'order_id');
    }

    public function masyarakat()
    {
        return $this->belongsTo(Masyarakat::class, 'masyarakat_id', 'id');
    }
}
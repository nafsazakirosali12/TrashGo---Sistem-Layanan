<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
    protected $table = 'pembayarans';

    protected $fillable = [
        'masyarakat_id',
        'order_id',
        'point_id',
        'metode_pembayaran',
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

    public function point()
    {
        return $this->belongsTo(Point::class, 'point_id');
    }
}
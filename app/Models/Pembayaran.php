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
        'status',
        'bukti_pembayaran',
        'total_pembayaran',
        'tanggal_pembayaran',
        'metode_pembayaran',
    ];
}

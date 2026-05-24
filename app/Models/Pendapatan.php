<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pendapatan extends Model
{
    protected $table = 'pendapatans';
    protected $fillable = [
        'order_id',
        'petugas_id',
        'total_pendapatan',
        'tanggal_pendapatan',
    ];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}

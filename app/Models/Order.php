<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'orders';
    protected $fillable = [
        'masyarakat_id',
        'kategori_id',
        'lokasi',
        'tanggal',
        'waktu',
        'total_harga',
        'catatan',
        'status',
    ];

    public function masyarakat()
    {
        return $this->belongsTo(Masyarakat::class, 'masyarakat_id', 'id');
    }

    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'kategori_id');
    }

    public function pembayaran()
    {
        return $this->hasOne(Pembayaran::class, 'order_id');
    }
}
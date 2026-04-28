<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'orders';
    protected $fillable = [
        'masyarakat_id',
        'kategori_id',
        'status',
        'total_harga',
        'tanggal_order',
        'catatan',
    ];

public function masyarakat()
{
    return $this->belongsTo(Masyarakat::class, 'masyarakat_id', 'id');
}

public function kategori()
{
    return $this->belongsTo(Kategori::class);
}

}

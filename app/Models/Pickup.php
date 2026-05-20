<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pickup extends Model
{
    protected $table = 'pickups';
    protected $fillable = [
        'order_id',
        'petugas_id',
        'status',
    ];

    public function order()
    {
        return $this->belongsTo(Order::class, 'order_id');
    }

    public function petugas()
    {
        return $this->belongsTo(Petugas::class, 'petugas_id');
    }
}

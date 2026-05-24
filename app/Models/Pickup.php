<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pickup extends Model
{
    protected $fillable = [
        'order_id',
        'petugas_id',
        'status'
    ];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}
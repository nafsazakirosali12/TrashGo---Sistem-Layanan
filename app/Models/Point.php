<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Point extends Model
{
    protected $table = 'points';
    protected $fillable = [
        'masyarakat_id',
        'order_id',
        'total_point',
        'tanggal_point'
    ];

    public function masyarakat()
    {
        return $this->belongsTo(Masyarakat::class, 'masyarakat_id');
    }
    public function order()
    {
        return $this->belongsTo(Order::class, 'order_id');
    }
    public function pickup()
    {
        return $this->belongsTo(Pickup::class, 'pickup_id');
    }
}

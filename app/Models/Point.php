<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Point extends Model
{
    protected $table = 'points';
    protected $fillable = [
        'order_id',
        'pickup_id',
        'total_point',
        'tanggal_point'
    ];
}

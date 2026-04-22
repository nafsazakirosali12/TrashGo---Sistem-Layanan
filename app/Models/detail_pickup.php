<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class detail_pickup extends Model
{
    protected $table = 'detail_pickups';
    protected $fillable = [
        'pickup_id',
        'petugas_id',
    ];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class detail_order extends Model
{
    protected $table = 'detail_orders';
    protected $fillable = [
        'order_id',
        'masyarakat_id',
    ];
}

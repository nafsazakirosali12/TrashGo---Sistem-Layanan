<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Petugas extends Model
{
    protected $table = 'petugas';
    protected $fillable = [
        'order_id',
        'pendapatan_id',
        'nama_tim',
        'nama_ketua',
        'email',
        'password',
        'alamat',
        'status',
    ];
}

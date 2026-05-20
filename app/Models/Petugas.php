<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Hash;

class Petugas extends Authenticatable
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
        'foto_petugas',
    ];
    protected $hidden = [
        'password',
    ];
    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = Hash::make($value);
    }

    // relasi ke pickup
    public function pickups()
    {
        return $this->hasMany(Pickup::class, 'petugas_id');
    }
}

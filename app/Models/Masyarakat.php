<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Hash;

class Masyarakat extends Authenticatable
{
    protected $table = 'masyarakats';
    protected $primaryKey = 'id';
    protected $fillable = [
        'nama_masyarakat',
        'jenis_kelamin',
        'alamat',
        'email',
        'password',
        'no_telepon',
        'foto_masyarakat',
    ];

    protected $hidden = [
        'password',
    ];
    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = Hash::make($value);
    }
}

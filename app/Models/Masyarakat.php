<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Masyarakat extends Model
{
    protected $table = 'masyarakats';
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
}

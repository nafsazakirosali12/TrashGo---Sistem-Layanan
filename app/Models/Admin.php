<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    protected $table = 'admins';
    protected $fillable = [
        'nama_admin',
        'email',
        'password',
        'foto_admin',
    ];

    protected $hidden = [
        'password',
    ];
}

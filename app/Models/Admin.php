<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Autheticable;

class Admin extends Autheticable
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
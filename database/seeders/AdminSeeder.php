<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;
use App\Models\Admin;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Admin::create([
        'nama_admin' => 'RecyCode',
        'email' => 'recycode@gmail.com',
        'password' => 'layanan222',
    ]);
        Admin::create([
            'nama_admin' => 'lia',
            'email' => 'lia@gmail.com',
            'password' => 'liaimut18',
        ]);
    }
}
<?php

namespace Database\Seeders;

use App\Models\Masyarakat;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MasyarakatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Masyarakat::create([
            'nama_masyarakat' => 'Rizkania',
            'email' => 'rizka@gmail.com',
            'password' => 'rizka123',
        ]);

        // Masyarakat::create([
        //     'nama_masyarakat' => 'Ananda',
        //     'email' => 'nana@gmail.com',
        //     'password' => 'nana123',
        // ]);
    }
}

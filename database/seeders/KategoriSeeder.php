<?php

namespace Database\Seeders;

use App\Models\Kategori;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Kategori::create([
            'nama_kategori' => 'Organik',
            'deskripsi' => 'Sampah organik adalah limbah yang berasal dari sisa makhluk hidup (tumbuhan, hewan, manusia) yang dapat terurai secara alami oleh mikroorganisme.'
        ]);

        Kategori::create([
            'nama_kategori' => 'Anorganik',
            'deskripsi' => 'Sampah anorganik adalah limbah yang berasal dari bahan non-hayati, produk sintetik, atau hasil proses teknologi yang sulit atau tidak dapat terurai secara alami oleh mikroorganisme.'
        ]);

        Kategori::create([
            'nama_kategori' => 'Bahan Berbahaya dan Beracun',
            'deskripsi' => 'Limbah Bahan Berbahaya dan Beracun (B3) adalah sisa usaha/kegiatan yang mengandung zat beracun, infeksius, mudah meledak, atau korosif yang dapat merusak lingkungan dan kesehatan.'
        ]);
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Buku;

class BukuSeeder extends Seeder
{
    public function run()
    {
        for ($i = 1; $i <= 10; $i++) {
            Buku::create([
                'judul' => "Judul Buku $i",
                'penulis' => "Penulis $i",
                'penerbit' => "Penerbit $i",
                'tahun_terbit' => rand(2000, 2023),
                'stok' => rand(1, 20),
            ]);
        }
    }
}
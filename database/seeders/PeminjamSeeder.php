<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Peminjaman;

class PeminjamSeeder extends Seeder
{
    public function run()
    {
        for ($i = 1; $i <= 10; $i++) {
            Peminjaman::create([
                'id_buku' => rand(1, 10),
                'id_pengguna' => rand(1, 10),
                'tanggal_pinjam' => now()->subDays(rand(5, 20)),
                'tanggal_kembali' => now()->addDays(rand(1, 10)),
                'status' => rand(0, 1) ? 'dipinjam' : 'dikembalikan',
            ]);
        }
    }
}
<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Pengembalian;

class PengembalianSeeder extends Seeder
{
    public function run()
    {
        for ($i = 1; $i <= 10; $i++) {
            Pengembalian::create([
                'id_peminjaman' => $i,
                'tanggal_pengembalian' => now()->addDays($i),
                'denda' => rand(0, 5000),
            ]);
        }
    }
}
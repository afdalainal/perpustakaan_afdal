<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Pengguna;

class PenggunaSeeder extends Seeder
{
    public function run()
    {
        for ($i = 1; $i <= 10; $i++) {
            Pengguna::create([
                'nama' => "Pengguna $i",
                'jenis_pengguna' => $i % 2 == 0 ? 'siswa' : 'dosen',
                'alamat' => "Alamat $i",
                'no_telepon' => '08' . rand(1000000000, 9999999999),
            ]);
        }
    }
}
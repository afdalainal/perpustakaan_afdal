<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Peminjaman;

class Pengguna extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama', 'jenis_pengguna', 'alamat', 'no_telepon',
    ];
    public function peminjaman()
{
    return $this->hasMany(Peminjaman::class, 'id_pengguna');
}
}
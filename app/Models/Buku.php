<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Peminjaman;

class Buku extends Model
{
    use HasFactory;
    protected $fillable = [
    'judul',
    'penulis',
    'penerbit',
    'tahun_terbit',
    'stok',
    ];
    public function peminjaman()
    {
        return $this->hasMany(Peminjaman::class, 'id_buku');
    }
}
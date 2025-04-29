<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Buku;
use App\Models\Pengguna;

class Peminjaman extends Model
{
    use HasFactory;
    protected $table = 'peminjamans'; 
    protected $fillable = [
        'id_buku', 'id_pengguna', 'tanggal_pinjam', 'tanggal_kembali', 'status'
    ];

    /**
     * Relasi dengan model Buku
     */
    public function buku()
    {
        return $this->belongsTo(Buku::class, 'id_buku');
    }

    /**
     * Relasi dengan model Pengguna
     */
    public function pengguna()
    {
        return $this->belongsTo(Pengguna::class, 'id_pengguna');
    }
}
<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Peminjaman;

class Pengembalian extends Model
{
    use HasFactory;
    protected $table = 'pengembalians'; 
    protected $fillable = [
        'id_peminjaman', 'tanggal_pengembalian', 'denda'
    ];

    public function peminjaman()
    {
        return $this->belongsTo(Peminjaman::class, 'id_peminjaman');
    }
}
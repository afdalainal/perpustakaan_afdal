<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pengguna extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama', 'jenis_pengguna', 'alamat', 'no_telepon',
    ];
}
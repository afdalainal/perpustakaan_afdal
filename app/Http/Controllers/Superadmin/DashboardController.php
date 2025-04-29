<?php

namespace App\Http\Controllers\Superadmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Buku;
use App\Models\Peminjaman;
use App\Models\Pengembalian;
use App\Models\Pengguna;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $totalBuku = Buku::count();

        $bukuFavorit = Buku::withCount('peminjaman')
            ->orderBy('peminjaman_count', 'desc')
            ->first();

        $totalPeminjaman = Peminjaman::count();
        $totalDipinjam = Peminjaman::where('status', 'dipinjam')->count();
        $totalPenggunaAktif = $totalPeminjaman - $totalDipinjam; 

        $totalSiswa = Pengguna::where('jenis_pengguna', 'siswa')->count();
        $totalDosen = Pengguna::where('jenis_pengguna', 'dosen')->count();

        return view('superadmin.dashboard', compact(
            'totalBuku',
            'bukuFavorit',
            'totalDipinjam',
            'totalPenggunaAktif',
            'totalSiswa',
            'totalDosen'
        ));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
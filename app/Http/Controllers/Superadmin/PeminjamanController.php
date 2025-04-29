<?php

namespace App\Http\Controllers\Superadmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Peminjaman;
use App\Models\Buku;
use App\Models\Pengguna;

class PeminjamanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $peminjaman = Peminjaman::with(['buku', 'pengguna'])->get();
        return view('superadmin.peminjaman.index', compact('peminjaman'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $bukus = Buku::where('stok', '>', 0)->get();
        $penggunas = Pengguna::all();
        return view('superadmin.peminjaman.create', compact('bukus', 'penggunas'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'id_buku' => 'required|exists:bukus,id',
            'id_pengguna' => 'required|exists:penggunas,id',
            'tanggal_pinjam' => 'required|date',
            'status' => 'required|in:dipinjam,dikembalikan',
        ]);
        $buku = Buku::findOrFail($validated['id_buku']);
        $buku->decrement('stok');
        Peminjaman::create($validated);
        return redirect()->route('peminjaman.index')->with('success', 'Peminjaman berhasil dilakukan!');
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
    public function edit($id)
    {
        $peminjaman = Peminjaman::findOrFail($id);
        $bukus = Buku::all();
        $penggunas = Pengguna::all();
        return view('superadmin.peminjaman.show', compact('peminjaman', 'bukus', 'penggunas'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'id_buku' => 'required|exists:bukus,id',
            'id_pengguna' => 'required|exists:penggunas,id',
            'tanggal_pinjam' => 'required|date',
            'tanggal_kembali' => 'nullable|date',
            'status' => 'required|in:dipinjam,dikembalikan',
        ]);

        $peminjaman = Peminjaman::findOrFail($id);
        $peminjaman->update($validated);

        return redirect()->route('peminjaman.index')->with('success', 'Peminjaman berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $peminjaman = Peminjaman::findOrFail($id);
        $peminjaman->delete();

        return redirect()->route('peminjaman.index')->with('success', 'Peminjaman berhasil dihapus!');
    }
}
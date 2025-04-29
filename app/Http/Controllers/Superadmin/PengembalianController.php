<?php

namespace App\Http\Controllers\Superadmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pengembalian;
use App\Models\Peminjaman;

class PengembalianController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pengembalian = Pengembalian::with('peminjaman')->get();
        return view('superadmin.pengembalian.index', compact('pengembalian'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $peminjaman = Peminjaman::where('status', 'dipinjam')->get(); 
        return view('superadmin.pengembalian.create', compact('peminjaman'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'id_peminjaman' => 'required|exists:peminjamans,id',
            'tanggal_pengembalian' => 'required|date',
            'denda' => 'nullable|numeric',
        ]);

        $peminjaman = Peminjaman::findOrFail($validated['id_peminjaman']);
        $peminjaman->update([
            'status' => 'dikembalikan',
            'tanggal_kembali' => $validated['tanggal_pengembalian']
        ]);
        Pengembalian::create($validated);
        return redirect()->route('pengembalian.index')->with('success', 'Pengembalian berhasil dicatat!');
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
        $pengembalian = Pengembalian::findOrFail($id);
        $peminjaman = Peminjaman::where('status', 'dipinjam')->get();  
        return view('superadmin.pengembalian.show', compact('pengembalian', 'peminjaman'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'id_peminjaman' => 'required|exists:peminjaman,id',
            'tanggal_pengembalian' => 'required|date',
            'denda' => 'nullable|numeric',
        ]);

        $pengembalian = Pengembalian::findOrFail($id);
        $pengembalian->update($validated);

        return redirect()->route('pengembalian.index')->with('success', 'Data pengembalian berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $pengembalian = Pengembalian::findOrFail($id);
        $pengembalian->delete();

        return redirect()->route('pengembalian.index')->with('success', 'Data pengembalian berhasil dihapus!');
    }
}
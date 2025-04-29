<?php

namespace App\Http\Controllers\Superadmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BukuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $buku = \App\Models\Buku::all();
        return view('superadmin.buku.index', compact('buku'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('superadmin.buku.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'penulis' => 'nullable|string|max:255',
            'penerbit' => 'nullable|string|max:255',
            'tahun_terbit' => 'required|integer|digits:4',
            'stok' => 'required|integer|min:1',
        ]);

        \App\Models\Buku::create([
            'judul' => $validated['judul'],
            'penulis' => $validated['penulis'],
            'penerbit' => $validated['penerbit'],
            'tahun_terbit' => $validated['tahun_terbit'],
            'stok' => $validated['stok'],
        ]);

        return redirect()->route('buku.index')->with('success', 'Buku berhasil disubmit!');
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
        $buku = \App\Models\Buku::findOrFail($id);
        return view('superadmin.buku.show', compact('buku'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'penulis' => 'nullable|string|max:255',
            'penerbit' => 'nullable|string|max:255',
            'tahun_terbit' => 'required|integer|digits:4',
            'stok' => 'required|integer|min:1',
        ]);
        $buku = \App\Models\Buku::findOrFail($id);
        $buku->update([
            'judul' => $validated['judul'],
            'penulis' => $validated['penulis'],
            'penerbit' => $validated['penerbit'],
            'tahun_terbit' => $validated['tahun_terbit'],
            'stok' => $validated['stok'],
        ]);
        return redirect()->route('buku.index')->with('success', 'Buku berhasil diperbarui!');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $buku = \App\Models\Buku::findOrFail($id);
        $buku->delete();
        return redirect()->route('buku.index')->with('success', 'Buku berhasil dihapus!');
    }

}
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\bukuModel;
use App\Models\kategoriModel;

class bukuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $buku = bukuModel::all();
        $kategori = kategoriModel::all();  // ambil semua kategori
        return view('buku.index', compact('buku', 'kategori'));
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
        bukuModel::create([
            'id_buku' => $request->id_buku,
            'id_kategori' => $request->id_kategori,
            'judul_buku' => $request->judul_buku,
            'penerbit' => $request->penerbit,
            'tahun_terbit' => $request->tahun_terbit
        ]);

        return redirect()->back()->with('success', 'Data berhasil ditambahkan');
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
        $buku = bukumodel::findOrFail($id);
        $buku->update([
            'id_buku' => $request->id_buku,
            'id_kategori' => $request->id_kategori,
            'judul_buku' => $request->judul_buku,
            'penerbit' => $request->penerbit,
            'tahun_terbit' => $request->tahun_terbit
        ]);

        return redirect()->route('buku')->with('success', 'Data berhasil ditambahkan');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $buku = bukuModel::findOrFail($id);
        $buku->delete();

        return redirect()->back()->with('success', 'Data berhasil dihapus');
    }
}

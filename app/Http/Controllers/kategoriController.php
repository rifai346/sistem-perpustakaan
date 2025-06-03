<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\kategoriModel;

class kategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('kategori.index', [
            'kategori' => kategoriModel::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() {}

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        kategoriModel::create([
            'id_kategori' => $request->id_kategori,
            'nama_kategori' => $request->nama_kategori,
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
        // dd($request->all());
        $kategori = kategoriModel::findOrFail($id);
        $kategori->update([
            'id_kategori' => $request->id_kategori,
            'nama_kategori' => $request->nama_kategori,
        ]);

        return redirect()->route('kategori')->with('success', 'Data berhasil ditambahkan');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $kategori = kategoriModel::findOrFail($id);
        $kategori->delete();

        return redirect()->back()->with('success', 'Data berhasil dihapus');
    }
}

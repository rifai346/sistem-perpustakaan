<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\peminjamanModel;
use App\Models\bukuModel;
use App\Models\memberModel;
use Illuminate\Support\Facades\DB;

class peminjamanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $buku = bukuModel::all();
        $peminjaman = peminjamanModel::all();  // ambil semua kategori
        $member = memberModel::all();  // ambil semua kategori
        $peminjaman = DB::table('peminjaman')
            ->join('bukus', 'peminjaman.id_buku', '=', 'bukus.id_buku')
            ->join('member', 'peminjaman.id_member', '=', 'member.id_member')
            ->select('peminjaman.*', 'bukus.judul_buku', 'member.nama_member')
            ->get();

        return view('peminjaman.index', compact('buku', 'peminjaman', 'member'));
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
        peminjamanModel::create([
            'id_peminjaman' => $request->id_peminjaman,
            'id_buku' => $request->id_buku,
            'id_member' => $request->id_member,
            'tgl_peminjaman' => $request->tgl_peminjaman,
            'status' => $request->status
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
        $peminjaman = peminjamanModel::findOrFail($id);
        $peminjaman->update([
            'id_peminjaman' => $request->id_peminjaman,
            'id_buku' => $request->id_buku,
            'id_member' => $request->id_member,
            'tgl_peminjaman' => $request->tgl_peminjaman,
            'status' => $request->status
        ]);

        return redirect()->route('peminjaman')->with('success', 'Data berhasil ditambahkan');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $peminjaman = peminjamanModel::findOrFail($id);
        $peminjaman->delete();

        return redirect()->back()->with('success', 'Data berhasil dihapus');
    }
}

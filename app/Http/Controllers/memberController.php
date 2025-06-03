<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\memberModel;

class memberController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('member.index', [
            'member' => memberModel::all()
        ]);
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
        memberModel::create([
            'id_member' => $request->id_member,
            'nama_member' => $request->nama_member,
            'alamat' => $request->alamat,
            'program_studi' => $request->program_studi
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
        $member = memberModel::findOrFail($id);
        $member->update([
            'id_member' => $request->id_member,
            'nama_member' => $request->nama_member,
            'alamat' => $request->alamat,
            'program_studi' => $request->program_studi
        ]);

        return redirect()->route('member')->with('success', 'Data berhasil ditambahkan');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $member = memberModel::findOrFail($id);
        $member->delete();

        return redirect()->back()->with('success', 'Data berhasil dihapus');
    }
}

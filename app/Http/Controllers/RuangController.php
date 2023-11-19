<?php

namespace App\Http\Controllers;

use App\Models\Ruang;
use Illuminate\Http\Request;

class RuangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $ruangs = Ruang::all();
        return view('ruang.index', compact('ruangs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('ruang.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'nama_ruang' => 'required',
            'kode_ruang' => 'required',
            'keterangan' => 'required',
        ]);

        $ruangs = new Ruang;
        $ruangs->nama_ruang = $request->nama_ruang;
        $ruangs->kode_ruang = $request->kode_ruang;
        $ruangs->keterangan = $request->keterangan;
        $ruangs->save();

        return redirect()->route('ruang.index')->with('success', 'Ruang berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Ruang $ruang)
    {
        //
        return view('ruang.show', compact('ruang'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Ruang $ruang)
    {
        //
        return view('ruang.edit', compact('ruang'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Ruang $ruang)
    {
        //
        $request->validate([
            'nama_ruang' => 'required',
            'kode_ruang' => 'required',
            'keterangan' => 'required',
        ]);

        $ruang->update($request->all());
        return redirect()->route('ruang.index')->with('success', 'Ruang berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Ruang $ruang)
    {
        //
        $ruang->delete();
        return redirect()->route('ruang.index')->with('success', 'Ruang berhasil dihapus');
    }
}

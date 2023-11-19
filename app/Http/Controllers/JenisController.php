<?php

namespace App\Http\Controllers;

use App\Models\Jenis;
use Illuminate\Http\Request;

class JenisController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $jenis = Jenis::all();
        return view('jenis.index', compact('jenis'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('jenis.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'nama_jenis' => 'required',
            'kode_jenis' => 'required',
            'keterangan' => 'required',
        ]);

        $jenis = new Jenis;
        $jenis->nama_jenis = $request->nama_jenis;
        $jenis->kode_jenis = $request->kode_jenis;
        $jenis->keterangan = $request->keterangan;
        $jenis->save();

        return redirect()->route('jenis.index')->with('success', 'Jenis berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Jenis $jeni)
    {
        //
        return view('jenis.show', compact('jeni'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Jenis $jeni)
    {
        //
        return view('jenis.edit', compact('jeni'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Jenis $jeni)
    {
        //
        $request->validate([
            'nama_jenis' => 'required',
            'kode_jenis' => 'required',
            'keterangan' => 'required',
        ]);

        $jeni->update($request->all());
        return redirect()->route('jenis.index')->with('success', 'Jenis berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Jenis $jeni)
    {
        //
        $jeni->delete();
        return redirect()->route('jenis.index')->with('success', 'Jenis berhasil dihapus');
    }
}

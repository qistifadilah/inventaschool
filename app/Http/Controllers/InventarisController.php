<?php

namespace App\Http\Controllers;

use App\Models\Inventaris;
use App\Models\Jenis;
use App\Models\Ruang;
use App\Models\User;
use Illuminate\Http\Request;

class InventarisController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $inventaris = Inventaris::with('ruang', 'jenis', 'user')->get();
        return view('inventaris.index', compact('inventaris'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Inventaris $inventaris, Jenis $jenis, Ruang $ruang, User $user)
    {
        //
        $inventaris = $inventaris::all();
        $jenis = $jenis::all();
        $ruang = $ruang::all();
        $user = $user::all();
        return view('inventaris.create', compact('inventaris', 'jenis', 'ruang', 'user'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Inventaris $inventaris)
    {
        //
        $request->validate([
            'kode_inventaris' => 'required',
            'nama_barang' => 'required',
            'kondisi' => 'required',
            'keterangan' => 'required',
            'stok' => 'required',
            'id_jenis' => 'required',
            'id_ruang' => 'required',
            'tanggal_register' => 'required',
            'id_user' => 'required',
        ]);

        $inventaris = new Inventaris();
        $inventaris->kode_inventaris = $request->kode_inventaris;
        $inventaris->nama_barang = $request->nama_barang;
        $inventaris->kondisi = $request->kondisi;
        $inventaris->keterangan = $request->keterangan;
        $inventaris->stok = $request->stok;
        $inventaris->id_jenis = $request->id_jenis;
        $inventaris->id_ruang = $request->id_ruang;
        $inventaris->tanggal_register = $request->tanggal_register;
        $inventaris->id_user = $request->id_user;
        $inventaris->save();

        return redirect()->route('inventaris.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Inventaris $inventari, Jenis $jenis, Ruang $ruang, User $user)
    {
        //
        $jenis = $jenis->all();
        $ruang = $ruang->all();
        $user = $user->all();
        return view('inventaris.show', compact('inventari', 'jenis', 'ruang', 'user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Inventaris $inventari, Jenis $jenis, Ruang $ruang, User $user)
    {
        //
        $jenis = $jenis->all();
        $ruang = $ruang->all();
        $user = $user->all();
        return view('inventaris.edit', compact('inventari', 'jenis', 'ruang', 'user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Inventaris $inventari)
    {
        //
        $request->validate([
            'kode_inventaris' => 'required',
            'nama_barang' => 'required',
            'kondisi' => 'required',
            'keterangan' => 'required',
            'stok' => 'required',
            'id_jenis' => 'required',
            'id_ruang' => 'required',
            'tanggal_register' => 'required',
            'id_user' => 'required',
        ]);

        $inventari->update($request->all());
        return redirect()->route('inventaris.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Inventaris $inventari)
    {
        //
        $inventari->delete();
        return redirect()->route('inventaris.index');
    }
}

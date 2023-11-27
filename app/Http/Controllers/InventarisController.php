<?php

namespace App\Http\Controllers;

use App\Models\Inventaris;
use App\Models\Jenis;
use App\Models\Ruang;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

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


    // Metode untuk membuat kode Inventaris baru
    private function kode()
    {
        // Mendapatkan nomor urut terakhir dari database
        $lastInventaris = Inventaris::latest()->first();

        // Jika tidak ada data Inventaris sebelumnya
        if (!$lastInventaris) {
            $nextNumber = 1;
        } else {
            // Mendapatkan nomor urut dan menambahkan 1
            $nextNumber = (int)substr($lastInventaris->kode, 1) + 1;
        }

        // Mengonversi nomor urut menjadi format PXXX
        $nextKode = 'INV' . str_pad($nextNumber, 3, '0', STR_PAD_LEFT);

        return $nextKode;
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

        $today = now()->toDateString();

        // Mendapatkan kode peminjaman baru
        $nextKode = $this->kode();

        return view('inventaris.create', compact('inventaris', 'jenis', 'ruang', 'user', 'today', 'nextKode'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Inventaris $inventaris)
    {
        //
        $request->validate([
            'id_user'           => 'required',
            // 'nama_barang' => 'required|unique:inventaris,nama_barang,except,id',
            'nama_barang'       => ['required',
                Rule::unique('inventaris')->where(function ($query) use ($request) 
                {
                    return $query
                        ->whereNamaBarang($request->nama_barang)
                        ->whereIdRuang($request->id_ruang);
                }),
            ],
            'kondisi'           => 'required',
            'keterangan'        => 'required',
            'stok'              => 'required',
            'id_jenis'          => 'required',
            'id_ruang'          => 'required',
            'tanggal_register'  => 'required',
        ]);

        $today = now()->toDateString();

        $nextKode = $this->kode();

        $inventaris = new Inventaris();
        $inventaris->kode_inventaris    = $nextKode;
        $inventaris->nama_barang        = $request->nama_barang;
        $inventaris->kondisi            = $request->kondisi;
        $inventaris->keterangan         = $request->keterangan;
        $inventaris->stok               = $request->stok;
        $inventaris->id_jenis           = $request->id_jenis;
        $inventaris->id_ruang           = $request->id_ruang;
        $inventaris->tanggal_register   = $today;
        $inventaris->id_user            = $request->id_user;
        $inventaris->save();

        return redirect()->route('inventaris.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Inventaris $inventari, Jenis $jenis, Ruang $ruang, User $user)
    {
        //
        $jenis  = $jenis->all();
        $ruang  = $ruang->all();
        $user   = $user->all();
        return view('inventaris.show', compact('inventari', 'jenis', 'ruang', 'user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Inventaris $inventari, Jenis $jenis, Ruang $ruang, User $user)
    {
        //
        $jenis  = $jenis->all();
        $ruang  = $ruang->all();
        $user   = $user->all();
        $today = now()->toDateString();
        
        return view('inventaris.edit', compact('inventari', 'jenis', 'ruang', 'user', 'today'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Inventaris $inventari)
    {
        //
        $request->validate([
            'id_user'           => 'required',
            'kode_inventaris'   => 'required',
            'nama_barang'       => 'required',
            'kondisi'           => 'required',
            'keterangan'        => 'required',
            'stok'              => 'required',
            'id_jenis'          => 'required',
            'id_ruang'          => 'required',
            'tanggal_register'  => 'required',
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

<?php

namespace App\Http\Controllers;

use App\Models\Inventaris;
use App\Models\Peminjaman;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class PeminjamanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $peminjamans = Peminjaman::all();
        return view('peminjaman.index', compact('peminjamans'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Peminjaman $peminjaman, User $user, Inventaris $inventaris)
    {
        //
        $peminjaman = Peminjaman::all();
        $inventaris = Inventaris::all();
        $user = User::all();

        // Mendapatkan tanggal hari ini
        $today = now()->toDateString();
        return view('peminjaman.create', compact('peminjaman','inventaris', 'user', 'today'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Peminjaman $peminjaman)
    {
        //
        try {
            $request->validate([
                'id_user' => 'required',
                'id_inventaris' => 'required',
                'jumlah' => 'required|integer|min:1',
                'status' => 'required',
            ]);

            // Cek apakah jumlah melebihi stok
            $inventaris = Inventaris::find($request->id_inventaris);

            if ($inventaris && $request->jumlah > $inventaris->stok) {
                throw ValidationException::withMessages([
                    'jumlah' => ['Jumlah peminjaman melebihi stok yang tersedia.'],
                ])->redirectTo(route('peminjaman.create'));
            };

        $today = now()->toDateString();

        $peminjaman = new Peminjaman();
        $peminjaman->id_user = $request->id_user;
        $peminjaman->id_inventaris = $request->id_inventaris;
        $peminjaman->jumlah = $request->jumlah;
        $peminjaman->tanggal_pinjam = $today;
        $peminjaman->tanggal_kembali = $request->input('tanggal_kembali', 'N/A');
        $peminjaman->status = $request->status;
        $peminjaman->save();

        return redirect()->route('peminjaman.index')->with('success', 'Peminjaman berhasil disimpan');
        } catch (ValidationException $e) {
            // Tangkap ValidationException dan tangani sesuai kebutuhan
            return redirect()->back()->withErrors($e->validator->errors())->withInput();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Peminjaman $peminjaman)
    {
        //
        return view('peminjaman.show', compact('peminjaman'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Peminjaman $peminjaman, User $user, Inventaris $inventaris)
    {
        //
        $inventaris = $inventaris::all();
        $user = $user::all();

        // Mendapatkan tanggal hari ini
        $today = now()->toDateString();
        return view('peminjaman.edit', compact('peminjaman', 'inventaris', 'user', 'today'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Peminjaman $peminjaman)
    {
        //
        $request->validate([
            'id_user' => 'required',
            'id_inventaris' => 'required',
            'tanggal_kembali' => 'required|date',
            'jumlah' => 'required|integer|min:1',
            'status' => 'required',
        ]);

        $today = now()->toDateString();

        $peminjaman->id_user = $request->id_user;
        $peminjaman->id_inventaris = $request->id_inventaris;
        $peminjaman->tanggal_kembali = $today;
        $peminjaman->jumlah = $request->jumlah;
        $peminjaman->status = $request->status;
        $peminjaman->save();

        return redirect()->route('peminjaman.index')->with('success', 'Peminjaman berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Peminjaman $peminjaman)
    {
        //
        $peminjaman->delete();
        return redirect()->route('peminjaman.index')->with('success', 'Peminjaman berhasil dihapus');
    }
}

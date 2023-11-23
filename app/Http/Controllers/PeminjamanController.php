<?php

namespace App\Http\Controllers;

use App\Models\Inventaris;
use App\Models\Peminjaman;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class PeminjamanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $user = Auth::user();

        if ($user->id_role == 1) {
            $peminjamans = Peminjaman::where('id_user', $user->id)->get();
            return view('peminjaman.index', compact('peminjamans'));
        };
        if ($user->id_role == 2) {
            $peminjamans = Peminjaman::where('id_petugas', $user->id)->orWhere('status', '1')->get();
            return view('peminjaman.index', compact('peminjamans'));
        };
        if ($user->id_role == 3) {
            $peminjamans = Peminjaman::all();
            return view('peminjaman.index', compact('peminjamans'));
        };
    }

    // Metode untuk membuat kode peminjaman baru
    private function kode()
    {
        // Mendapatkan nomor urut terakhir dari database
        $lastPeminjaman = Peminjaman::latest()->first();

        // Jika tidak ada data peminjaman sebelumnya
        if (!$lastPeminjaman) {
            $nextNumber = 1;
        } else {
            // Mendapatkan nomor urut dan menambahkan 1
            $nextNumber = (int)substr($lastPeminjaman->kode, 1) + 1;
        }

        // Mengonversi nomor urut menjadi format PXXX
        $nextKode = 'P' . str_pad($nextNumber, 3, '0', STR_PAD_LEFT);

        return $nextKode;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Peminjaman $peminjaman, User $user, Inventaris $inventaris)
    {
        //
        $peminjaman = Peminjaman::all();
        $inventaris = Inventaris::all();
        $user       = User::all();

        // Mendapatkan tanggal hari ini
        $today = now()->toDateString();
        // Mendapatkan kode peminjaman baru
        $nextKode = $this->kode();

        return view('peminjaman.create', compact('peminjaman', 'inventaris', 'user', 'today', 'nextKode'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Peminjaman $peminjaman)
    {
        //
        try {
            $request->validate([
                'id_user'       => 'required',
                'id_inventaris' => 'required',
                'jumlah'        => 'required|integer|min:1',
                'status'        => 'required',
            ]);

            // Cek apakah jumlah melebihi stok
            $inventaris = Inventaris::find($request->id_inventaris);

            if ($inventaris && $request->jumlah > $inventaris->stok) {
                throw ValidationException::withMessages([
                    'jumlah' => ['Jumlah peminjaman melebihi stok yang tersedia.'],
                ])->redirectTo(route('peminjaman.create'));
            };

            $today = now()->toDateString();
            $nextKode = $this->kode();

            $peminjaman = new Peminjaman();
            $peminjaman->kode               = $nextKode;
            $peminjaman->id_user            = $request->id_user;
            $peminjaman->id_petugas         = $request->input('id_petugas', 'N/A');
            $peminjaman->id_inventaris      = $request->id_inventaris;
            $peminjaman->jumlah             = $request->jumlah;
            $peminjaman->tanggal_pinjam     = $today;
            $peminjaman->tanggal_kembali    = $request->input('tanggal_kembali', 'N/A');
            $peminjaman->status             = $request->status;
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
    public function show(Peminjaman $peminjaman, User $user, Inventaris $inventaris)
    {
        //
        $inventaris = $inventaris::all();
        $user       = $user::all();
        
        // Mendapatkan user dengan ID petugas yang sesuai
        $petugas = $user->firstWhere('id', $peminjaman->id_petugas);

        // Mendapatkan nama petugas
        $namaPetugas = $petugas ? $petugas->name : 'N/A';

        return view('peminjaman.show', compact('peminjaman', 'inventaris', 'user', 'namaPetugas'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Peminjaman $peminjaman, User $user, Inventaris $inventaris)
    {
        //
        $inventaris = $inventaris::all();
        $user       = $user::all();

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
            'id_inventaris'     => 'required',
            'tanggal_kembali'   => 'required|date',
            'status'            => 'required',
        ]);

        $today = now()->toDateString();

        $peminjaman->id_petugas         = $request->id_petugas;
        $peminjaman->id_inventaris      = $request->id_inventaris;
        $peminjaman->tanggal_kembali    = $today;
        $peminjaman->status             = $request->status;
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

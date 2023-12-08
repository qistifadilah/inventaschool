<?php

namespace App\Http\Controllers;

use App\Models\Peminjaman;
use App\Models\Inventaris;
use App\Models\Ruang;
use App\Models\User;
use PDF;

class GenerateController extends Controller
{
    public function generatePDF(Peminjaman $peminjaman, User $user, Inventaris $inventaris, Ruang $ruangs)
    {
        //
        $inventaris = $inventaris::all();
        $user       = $user::all();
        $ruangs     = Ruang::all();
        $petugas = $user->firstWhere('id', $peminjaman->id_petugas);
        // Mendapatkan nama petugas
        $namaPetugas = $petugas ? $petugas->name : 'N/A';

        $pdf =  PDF::loadView('peminjaman.print', compact('peminjaman', 'inventaris', 'ruangs', 'user', 'namaPetugas'))->output();

        // Mengirimkan PDF sebagai respons
        return response($pdf, 200)
        ->header('Content-Type', 'application/pdf')
        ->header('Content-Disposition', 'attachment; filename="peminjaman.pdf"');
    }
}
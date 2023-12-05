<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Jenis;
use App\Models\Ruang;
use App\Models\User;
use App\Models\Laporan;
use App\Models\Peminjaman;

class Inventaris extends Model
{
    use HasFactory;
    protected $table = 'inventaris';
    protected $fillable = [
        'kode_inventaris',
        'nama_barang',
        'kondisi',
        'keterangan',
        'stok',
        'id_jenis',
        'id_ruang',
        'tanggal_register',
        'id_user',
    ];

    public function jenis()
    {
        return $this->belongsTo(Jenis::class, 'id_jenis', 'id');
    }

    public function ruang()
    {
        return $this->belongsTo(Ruang::class, 'id_ruang', 'id');
    }

    public function user()
    {
        return $this->belongsToMany(User::class, 'id_user', 'id');
    }

    public function laporan()
    {
        return $this->hasMany(Laporan::class);
    }

    public function peminjaman()
    {
        return $this->hasMany(Peminjaman::class);
    }
}
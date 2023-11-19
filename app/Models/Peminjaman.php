<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Laporan;
use App\Models\User;
use App\Models\Inventaris;

class Peminjaman extends Model
{
    use HasFactory;
    protected $table = 'peminjamans';
    protected $fillable = [
        'id_inventaris',
        'id_user',
        'tanggal_pinjam',
        'tanggal_kembali',
        'jumlah',
        'status_peminjaman',
    ];

    public function laporan()
    {
        return $this->hasMany(Laporan::class, 'id_peminjaman', 'id');
    }

    public function inventaris()
    {
        return $this->belongsTo(Inventaris::class, 'id_inventaris', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user', 'id');
    }
}
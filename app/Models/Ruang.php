<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Inventaris;

class Ruang extends Model
{
    use HasFactory;
    protected $table = 'ruangs';
    protected $fillable = [
        'nama_ruang',
        'kode_ruang',
        'keterangan',
    ];

    public function inventaris()
    {
        return $this->hasMany(Inventaris::class);
    }
}

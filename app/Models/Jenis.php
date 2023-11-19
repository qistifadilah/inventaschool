<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Inventaris;

class Jenis extends Model
{
    use HasFactory;
    protected $table = 'jenis';
    protected $fillable = [
        'nama_jenis',
        'kode_jenis',
        'keterangan',
    ];

    public function inventaris()
    {
        return $this->hasMany(Inventaris::class);
    }
}

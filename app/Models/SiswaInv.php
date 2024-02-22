<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SiswaInv extends Model
{
    use HasFactory;
    protected $table = "siswainv";
    protected $primaryKey = "id";
    protected $fillable = [
        'nama', 'kelas'
    ];

    public function peminjaman(){
        return $this->hasMany(PeminjamanInv::class, 'id_siswa');
    }
}

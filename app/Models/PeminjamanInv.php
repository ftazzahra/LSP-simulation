<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PeminjamanInv extends Model
{
    use HasFactory;
    protected $table = "peminjamaninv";
    protected $primaryKey = "id";
    protected $fillable = [
       'id_siswa', 'id_barang', 'tgl_masuk', 'tgl_keluar', 'deadline', 'status'
    ];

    public function siswa()
    {
        return $this->belongsTo(SiswaInv::class, 'id_siswa');    
    }

    public function barang()
    {
        return $this->belongsTo(BarangInv::class, 'id_barang');    
    }
}

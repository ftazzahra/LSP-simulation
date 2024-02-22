<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BarangInv extends Model
{
    use HasFactory;
    protected $table = "baranginv";
    protected $primaryKey = "id";
    protected $fillable = [
       'nama_barang', 'gambar'
    ];

    public function peminjaman(){
        return $this->hasMany(PeminjamanInv::class, 'id_barang');
    }
}

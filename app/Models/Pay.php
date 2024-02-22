<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pay extends Model
{
    use HasFactory;
    protected $table = "pay";
    protected $primaryKey = "id";
    protected $fillable = ['id_siswi', 'jumlah_bayar', 'tanggal_bayar'];

    public function siswa() {
        return $this->belongsTo(Siswa::class, 'id_siswi');
    }
}

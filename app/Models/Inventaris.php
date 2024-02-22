<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inventaris extends Model
{
    use HasFactory;
    protected $table = 'peminjamaninv';
    protected $fillable = [
        'id_siswa', 'id_barang','tgl_pinjam', 'tgl_kembali', 'deadline', 'status'
    ];
}

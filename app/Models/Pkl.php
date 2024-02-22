<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pkl extends Model
{
    use HasFactory;
    protected $table = 'pkl';
    protected $fillable = ['id_intern', 'id_dudi','tgl_masuk', 'tgl_keluar'];

    public function intern()
    {
        return $this->belongsTo(Intern::class, 'id_intern');
    }

    public function dudi()
    {
        return $this->belongsTo(Dudi::class, 'id_dudi');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dudi extends Model
{
    use HasFactory;
    protected $table = 'dudi';
    protected $fillable = ['nama_pt', 'alamat'];

    public function pkl()
    {
        return $this->hasMany(Pkl::class, 'id_dudi');
    }
}

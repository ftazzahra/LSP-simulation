<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    use HasFactory;
    protected $table = "siswi";
    protected $primaryKey = "id";
    protected $fillable = [
        'nama', 'kelas'
    ];

    public function pay(){
        return $this->hasMany(Pay::class, 'id_siswi');
    }
}

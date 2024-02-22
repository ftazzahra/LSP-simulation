<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Intern extends Model
{
    use HasFactory;
    protected $table = 'intern';
    protected $fillable = [
        'nama', 'kelas'
    ];

    public function pkl()
    {
        return $this->hasMany(Pkl::class, 'id_intern');
    }
}

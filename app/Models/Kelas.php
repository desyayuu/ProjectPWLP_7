<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Mahasiswa;

class Kelas extends Model
{
    use HasFactory;
    protected $table='kelas'; //definisikan model ini related dengan tabel kelas

    public function mahasiswa(){
        return $this->hasMany(Mahasiswa::class);
    }
}

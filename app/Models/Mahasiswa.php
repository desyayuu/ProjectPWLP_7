<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Kelas;

class Mahasiswa extends Model
{
    protected $table="mahasiswas"; // Eloquent akan membuat model mahasiswa 
    //menyimpan record di tabel mahasiswas
    public $timestamps= false; 
    protected $primaryKey = 'nim'; // Memanggil isi DB Dengan primarykey
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
    'nim',
    'nama',
    'tanggal_lahir',
    'kelas_id',
    'jurusan',
    'no_handphone',
    'email',
    ];

    public function kelas(){
        return $this->belongsTo(Kelas::class);
    }
    public function mataKuliah(){
        return $this->belongsToMany(MataKuliah::class, "mahasiswa_matakuliah", "mahasiswa_id", "matakuliah_id")
        ->withPivot('nilai');
    }
}

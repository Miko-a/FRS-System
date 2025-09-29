<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    protected $table = 'kelas';
    protected $primaryKey = 'kelas_id';
    protected $keyType = 'integer';
    protected $fillable = ['kode_dosen', 'hari', 'jam_mulai', 'jam_selesai', 'ruang_kelas', 'kapasitas', 'kode_mk'];

    public function dosen(){
        return $this->belongsTo(Dosen::class, 'kode_dosen', 'nip');
    }
    public function matakuliah(){
        return $this->belongsTo(Matakuliah::class, 'kode_mk', 'kode_mk');
    }
    public function pengambilan(){
        return $this->hasMany(Pengambilan::class, 'kelas_id', 'kelas_id');
    }
}

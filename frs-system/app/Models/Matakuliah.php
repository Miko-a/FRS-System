<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Matakuliah extends Model
{
    protected $table = 'matakuliah';
    protected $primaryKey = 'kode_mk';
    public $incrementing = false;
    protected $keyType = 'string';
    protected $fillable = ['kode_mk', 'nama_mk', 'sks', 'semester', 'jenis_mk'];

    public function kelas(){
        return $this->hasMany(Kelas::class, 'kode_mk', 'kode_mk');
    }

    public function dosen(){
    return $this->hasManyThrough(
        Dosen::class, 
        Kelas::class,  
        'kode_mk',      
        'nip',          
        'kode_mk',      
        'kode_dosen'   
    );
    }

    public function getRouteKeyName(){
        return 'kode_mk';
    }

    public function prasyarat() {
        return $this->belongsToMany(
            Matakuliah::class,
            'matakuliah_prasyarat',
            'matakuliah_kode',
            'prasyarat_kode',
        );
    }

    public function dipersyaratkanOleh() {
        return $this->belongsToMany(
            Matakuliah::class,
            'matakuliah_prasyarat',
            'matakuliah_kode',
            'prasyarat_kode',
        );
    }
}

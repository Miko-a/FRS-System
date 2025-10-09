<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    protected $table = 'mahasiswa';
    protected $primaryKey = 'nrp';
    public $incrementing = false;
    protected $keyType = 'string';
    protected $fillable = ['nrp', 'nama', 'angkatan', 'program_studi', 'semester', 'ipk', 'max_sks', 
    'sks_yg_diambil','login_id'];

    public function pengambilan(){
        return $this->hasMany(Pengambilan::class, 'nrp', 'nrp');
    }
    public function getMaxSKS(){
        $ipk = $this->ipk;

        if ($ipk >= 3.5){
            return 24;
        }
        if ($ipk >= 3.0){
            return 22;
        }
        if ($ipk >= 2.5){
            return 20;
        }
        return 18;
    }
    public function login(){
        return $this->belongsTo(Login::class, 'login_id', 'login_id');
    }
}

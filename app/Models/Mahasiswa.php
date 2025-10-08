<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    protected $table = 'mahasiswa';
    protected $primaryKey = 'nrp';
    public $incrementing = false;
    protected $keyType = 'string';
    protected $fillable = ['nrp', 'nama', 'angkatan', 'program_studi', 'semester', 'ipk'];

    public function pengambilan(){
        return $this->hasMany(Pengambilan::class, 'nrp', 'nrp');
    }
    public function login(){
        return $this->belongsTo(Login::class, 'login_id', 'login_id');
    }
}

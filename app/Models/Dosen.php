<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Dosen extends Model
{
   protected $table = 'dosen';
   protected $primaryKey = 'nip';
   public $incrementing = false;
   protected $keyType = 'string';
   protected $fillable = ['nip', 'nama', 'program_studi', 'login_id'];


public function kelas(){
   return $this->hasMany(Kelas::class, 'kode_dosen', 'nip');
}
public function login(){
   return $this->belongsTo(Login::class, 'login_id', 'login_id');
}
}

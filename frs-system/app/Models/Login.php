<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Authenticatable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;

class Login extends Model implements AuthenticatableContract
{
    use Authenticatable;

    protected $table = 'login';
    protected $primaryKey = 'login_id';
    public $incrementing = true;
    protected $keyType = 'integer';
    protected $fillable = ['email', 'password','role'];


    public function mahasiswa(){
        return $this->hasOne(Mahasiswa::class, 'login_id');
    }

    public function dosen() {
        return $this->hasOne(Dosen::class, 'login_id');
    }
}

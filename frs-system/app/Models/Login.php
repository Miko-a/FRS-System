<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Login extends Model
{
    protected $table = 'login';
    protected $primaryKey = 'login_id';
    public $incrementing = true;
    protected $keyType = 'integer';
    protected $fillable = ['email', 'password','role'];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pengambilan extends Model
{
    protected $table = 'pengambilan';
    protected $primaryKey = 'pengambilan_id';
    public $incrementing = true;
    protected $keyType = 'integer';
    protected $fillable = ['nrp', 'kelas_id'];

    public function mahasiswa(){
        return $this->belongsTo(Mahasiswa::class, 'nrp', 'nrp');
    }
    public function kelas(){
        return $this->belongsTo(Kelas::class, 'kelas_id', 'kelas_id');
    }
}

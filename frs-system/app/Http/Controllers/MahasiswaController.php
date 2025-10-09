<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    public function show()
    {
        $mahasiswa = auth()->user()->Mahasiswa;
        return view('mahasiswa.profile', compact('mahasiswa'));
    }

    // public function showAjuanUbahJadwal()
    // {
    //     $dosen = auth()->user()->Dosen;
    //     return view('dosen.AjuanUbahJadwal', compact('dosen'));
    // }

public function showInformasiKelas() { 
    $mahasiswa = auth()->user()->Mahasiswa; $kelas = \App\Models\Pengambilan::with('kelas.matakuliah') 
    ->where('nrp', $mahasiswa->nrp) ->get()->pluck('kelas'); 
    return view('mahasiswa.informasiKelas', compact('kelas')); 
}

    // public function showKurikulum() {
    //     $dosen = auth()->user()->Dosen;
    //     return view('dosen.kurikulum', compact('dosen'));
    // }

    public function showKurikulum()
    {
        $matakuliahs = \App\Models\Matakuliah::with('prasyarat')->get();
        return view('mahasiswa.kurikulum', compact('matakuliahs'));
    }
}

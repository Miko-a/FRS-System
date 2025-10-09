<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DosenController extends Controller
{
    public function show()
    {
        $dosen = auth()->user()->Dosen;
        return view('dosen.profile', compact('dosen'));
    }

    public function showAjuanUbahJadwal()
    {
        $dosen = auth()->user()->Dosen;
        return view('dosen.AjuanUbahJadwal', compact('dosen'));
    }

    public function showInformasiKelas() {
        $dosen = auth()->user()->Dosen;
        $kelas = \App\Models\Kelas::with(['matakuliah', 'mahasiswa'])
                      ->where('kode_dosen', $dosen->nip)
                      ->get();
        return view('dosen.informasiKelas', compact('dosen', 'kelas'));
    }

    // public function showKurikulum() {
    //     $dosen = auth()->user()->Dosen;
    //     return view('dosen.kurikulum', compact('dosen'));
    // }

    public function showKurikulum()
    {
        $matakuliahs = \App\Models\Matakuliah::with('prasyarat')->get();
        return view('dosen.kurikulum', compact('matakuliahs'));
    }
}
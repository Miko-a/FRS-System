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
}
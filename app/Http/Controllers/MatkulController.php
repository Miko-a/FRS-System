<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Matakuliah;
use App\Models\Kelas;

class MatkulController extends Controller
{
    public function index(){
        $matakuliah = Matakuliah::get();
        // dd($matakuliah);
        return view('matkul.index', compact('matakuliah'));
    }

    public function show(string $id)
    {
        $matkul = Matakuliah::findOrFail($id);
        return view('matkul.show', compact('matkul'));
    }

}

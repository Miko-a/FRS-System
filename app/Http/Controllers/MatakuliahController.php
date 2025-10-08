<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Matakuliah;
use App\Models\Kelas;

class MatakuliahController extends Controller
{
    public function index(){
        $matakuliah = Matakuliah::get();
        // dd($matakuliah);
        return view('matakuliah.index', compact('matakuliah'));
    }

    public function create(){
        return view('matakuliah.create');
    }

    public function store(Request $request){
        $validated = $request->validate ([
            'kode_mk' => 'required|unique:matakuliah,kode_mk',
            'nama_mk' => 'required',
            'sks' => 'required|integer',
            'semester' => 'required|integer',
            'jenis_mk' => 'required|in:wajib,pilihan'
        ]);

        Matakuliah::create($validated);
        return redirect()->route('matakuliah.create')->with('success', 'Informasi mata kuliah berhasil ditambahkan.');
    }

    public function show(string $id)
    {
        $matkul = Matakuliah::findOrFail($id);
        return view('matakuliah.show', compact('matkul'));
    }

    public function edit($kode_mk){
        $matkul = Matakuliah::findOrFail($kode_mk);
        $daftarmatkul = Matakuliah::all();
        return view('matakuliah.edit', compact('matkul', 'daftarmatkul'));
    }
    public function getMatkul($kode_mk){
        $matkul = Matakuliah::where('kode_mk', $kode_mk)->first();

        if(!$matkul) return response()->json(null);

        return response()->json([
        'nama_mk' => $matkul->nama_mk,
        'sks' => $matkul->sks,
        'semester' => $matkul->semester,
        'jenis_mk' => $matkul->jenis_mk,
        ]);
    }

public function update(Request $request, $kode_mk)
{
    $validated = $request->validate([
        'kode_mk' => 'required|string|max:10',
        'nama_mk' => 'required|string|max:100',
        'sks' => 'required|integer|min:2|max:10',
        'semester' => 'required|integer|min:1|max:8',
        'jenis_mk' => 'required|in:wajib,pilihan',
    ]);

    $matkul = Matakuliah::where('kode_mk', $kode_mk)->firstOrFail();
    $matkul->update($validated);

    return redirect() ->route('matakuliah.edit', ['matakuliah' => $kode_mk])->with('success', 'Informasi mata kuliah berhasil diperbarui.');
}

    public function destroy(string $id){
        $matkul = Matakuliah::findOrFail($id);
        $matkul->delete();

        return redirect()->route('matakuliah.index')->with('success', 'Mata kuliah berhasil dihapus.');
    }

}

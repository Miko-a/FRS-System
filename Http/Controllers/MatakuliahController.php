<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Matakuliah;

class MatakuliahController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Matakuliah::all();
        return view('matakuliah.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('matakuliah.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate ([
            'kode_mk' => 'required|unique:matakuliah,kode_mk',
            'nama_mk' => 'required',
            'sks' => 'required|integer',
            'semester' => 'required|integer',
            'jenis_mk' => 'required|in:wajib,pilihan'
        ]);

        Matakuliah::create($validated);
        return redirect()->route('matakuliah.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $matkul = Matakuliah::findOeFail($id);
        return view('matakuliah.show', compact('matkul'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $matkul = Matakuliah::findOrFail($id);
        return view('matakuliah.edit', compact('matkul'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'kode_mk' => 'required|unique:matakuliah,kode_mk',
            'nama_mk' => 'required',
            'sks' => 'required|integer',
            'semester' => 'required|integer',
            'jenis_mk' => 'required|in:wajib,pilihan',
        ]);

        $matkul = Matakuliah::findOrFail($id);
        $matkul::update($validated);

        return redirect()->route('matakuliah.index')->with('success', 'Mata kuliah berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $matkul = Matakuliah::findOrFail($id);
        $matkul->delete();

        return redirect()->route('matakuliah.index')->with('success', 'Mata kuliah berhasil dihapus.');
    }
}

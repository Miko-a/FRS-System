<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Kelas;
use App\Models\Matakuliah;
use App\Models\Dosen;

class KelasController extends Controller
{

    public function index()
    {
        $kelas = Kelas::with(['matakuliah', 'dosen', 'mahasiswa'])->get();
        return view('kelas.index', compact('kelas'));
    }

    public function create()
    {
        $matakuliah = Matakuliah::all();
        $dosen = Dosen::all();
        return view('kelas.create', compact('matakuliah', 'dosen'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'kode_dosen' => 'required|exists:dosen,nip',
            'kode_mk' => 'required|exists:matakuliah,kode_mk',
            'kode_kelas' => 'required|max:1',
            'hari' => 'required|string',
            'jam_mulai' => 'required',
            'jam_selesai' => 'required|after:jam_mulai',
            'ruang_kelas' => 'required|string',
            'kapasitas' => 'required|integer|min:1',
        ]);

        $ada = Kelas::where('kode_mk', $request->kode_mk)->where('kode_kelas', $request->kode_kelas)->exists();

        $kelasdipake = Kelas::where('hari', $request->hari)->where('ruang_kelas', $request->ruang_kelas)->where(function($query) use ($request) {
                $query->whereBetween('jam_mulai', [$request->jam_mulai, $request->jam_selesai])->orWhereBetween('jam_selesai', [$request->jam_mulai, $request->jam_selesai])->orWhere(function($q) use ($request) {
                        $q->where('jam_mulai', '<=', $request->jam_mulai)->where('jam_selesai', '>=', $request->jam_selesai);
                    });
            })->exists();        
        
        $dosen = Kelas::where('kode_dosen', $request->kode_dosen)->where('hari', $request->hari)->where(function($query) use ($request){
            $query->whereBetween('jam_mulai', [$request->jam_mulai, $request->jam_selesai])->orWhereBetween('jam_selesai', [$request->jam_mulai, $request->jam_selesai])->orWhere(function($q) use ($request) {
                        $q->where('jam_mulai', '<=', $request->jam_mulai)->where('jam_selesai', '>=', $request->jam_selesai);
                    });
        })->exists();

        if ($ada)
            return back()->withErrors([
                'kode_kelas' => 'Kelas matakuliah ini sudah ada!'
        ])->withInput();

        if ($kelasdipake)
            return back()->withErrors([
                'ruang_kelas' => 'Ruang kelas ini sudah digunakan kelas lain!'
        ])->withInput();

        if ($dosen)
            return back()->withErrors([
                'kode_dosen' => 'Dosen ini sudah mengajar di kelas lain dengan jadwal yang sama!'
                ])->withInput();
        Kelas::create($request->all());
        return redirect()->route('kelas.create')->with('success', 'Informasi Kelas berhasil ditambahkan.');
    }

    public function show(string $id)
    {
        $kelas = Kelas::with(['matakuliah', 'dosen', 'mahasiswa'])->findOrFail($id);
        return view('kelas.show', compact('kelas'));
    }

    public function edit(string $id)
    {
        $kelas = Kelas::findOrFail($id);
        $matakuliah = Matakuliah::all();
        $dosen = Dosen::all();
        return view('kelas.edit', compact('kelas', 'matakuliah', 'dosen'));
    }

    public function getByMatkul($kode_mk){
        $kelas = Kelas::where('kode_mk', $kode_mk)->with('dosen', 'matakuliah', 'mahasiswa')->get();
        return response()->json($kelas);
    }
    public function update(Request $request, Kelas $kelas)
    {
        $validated = $request->validate([
            'kode_dosen' => 'required|exists:dosen,nip',
            'kode_mk' => 'required|exists:matakuliah,kode_mk',
            'hari' => 'required|string',
            'jam_mulai' => 'required',
            'jam_selesai' => 'required|after:jam_mulai',
            'ruang_kelas' => 'required|string',
            'kapasitas' => 'required|integer|min:1',
        ]);

        $kelas->update($validated);
        return redirect()->route('kelas.edit',  $kelas->kelas_id)->with('success', 'Informasi Kelas berhasil diperbarui.');
    }

    public function destroy(string $id)
    {
        $kelas = Kelas::findOrFail($id);
        $kelas->delete();
        return redirect()->route('kelas.index')->with('success', 'Kelas berhasil dihapus.');
    }
}

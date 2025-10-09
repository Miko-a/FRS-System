<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Jobs\JobsWait;

class MahasiswaController extends Controller
{
    public function show()
    {
        $mahasiswa = auth()->user()->Mahasiswa;
        return view('mahasiswa.profile', compact('mahasiswa'));
    }

    public function showAmbilForm()
    {
        $kelass = \App\Models\Kelas::with(['matakuliah', 'dosen'])->get();
        return view('mahasiswa.ambil', compact('kelass'));
    }

    public function ambilMatkul(Request $request)
    {
        $mahasiswa = auth()->user()->Mahasiswa;
        $matakuliahs = \App\Models\Matakuliah::with('prasyarat')->get();
        $kelass = \App\Models\Kelas::with('matakuliah')->get();

        JobsWait::dispatch($mahasiswa->nrp, $kelas_id);
        return redirect()->route('mahasiswa.informasiKelas')->name('success', 'Permintaan pengambilan mata kuliah sedang diproses.');

        // return view('mahasiswa.ambil', compact('mahasiswa', 'matakuliahs', 'kelass'));
    }

    public function dropMatkul(Request $request) {
        $kelas = \App\Models\Kelas::findOrFail($request->kelas_id);
        $mahasiswa = auth()->user()->Mahasiswa;
        $pengambilan = \App\Models\Pengambilan::where('nrp', $mahasiswa->nrp)
            ->where('kelas_id', $kelas->kelas_id)
            ->first();

        // dd($pengambilan);

        $pengambilan->delete();
        return redirect()->route('mahasiswa.informasiKelas')->with('success', 'Mata kuliah berhasil di-drop.');
        
    }

    public function showInformasiKelas() { 
        $mahasiswa = auth()->user()->Mahasiswa; 
        $kelas = \App\Models\Pengambilan::with('kelas.matakuliah')->where('nrp', $mahasiswa->nrp)->get()->pluck('kelas'); 
        return view('mahasiswa.informasiKelas', compact('kelas')); 
    }

    public function showKurikulum()
    {
        $matakuliahs = \App\Models\Matakuliah::with('prasyarat')->get();
        return view('mahasiswa.kurikulum', compact('matakuliahs'));
    }

    public function showDashboard() {
        $user = auth()->user();
        $notifications = $user->unreadNotifications;

        return view('mahasiswa.dashboard', compact('notifications'));
    }
}

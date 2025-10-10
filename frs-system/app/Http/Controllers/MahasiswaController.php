<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Jobs\JobsWait;
use App\Models\Pengambilan;

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
        $kelas_obj = $kelass->where('kelas_id', $request->kelas_id)->first();
        $kelas_id = $kelas_obj->kelas_id;

        // Jika kapasitas penuh
        if ($kelas_obj->pengambilan()->count() >= $kelas_obj->kapasitas) {
            return redirect()->back()->withErrors(['kapasitas' => 'Kelas penuh!']);
        }

        // Jika mahasiswa sudah mengambil matkul tsb
        if ($mahasiswa->pengambilan()->where('kelas_id', $kelas_id)->exists()) {
            return redirect()->back()->withErrors(['duplicate' => 'Anda sudah mengambil mata kuliah ini!']);
        }

        // Jika sks tidak cukup
        if ($mahasiswa->sks_yg_diambil + $kelas_obj->matakuliah->sks > $mahasiswa->max_sks) {
            return redirect()->back()->withErrors(['limit' => 'Anda sudah mencapai batas maksimal pengambilan mata kuliah!']);
        } else {
            $mahasiswa->sks_yg_diambil += $kelas_obj->matakuliah->sks;
            $mahasiswa->save();
        }

        JobsWait::dispatch($mahasiswa->nrp, $kelas_id);
        return redirect()->route('mahasiswa.informasiKelas')->with('success', 'Permintaan pengambilan mata kuliah sedang diproses.');

        // return view('mahasiswa.ambil', compact('mahasiswa', 'matakuliahs', 'kelass'));
    }

    public function dropMatkul(Request $request) {
        $kelas = \App\Models\Kelas::findOrFail($request->kelas_id);
        $mahasiswa = auth()->user()->Mahasiswa;
        $pengambilan = \App\Models\Pengambilan::where('nrp', $mahasiswa->nrp)
            ->where('kelas_id', $kelas->kelas_id)
            ->first();
        
        // Hapus lalu kurangi sks mahasiswa
        if ($pengambilan->delete()) {
            $mahasiswa->sks_yg_diambil -= $kelas->matakuliah->sks;
            $mahasiswa->save();
        }

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

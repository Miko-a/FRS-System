<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Login;
use App\Models\Dosen;
use App\Models\Mahasiswa;

class UserController extends Controller
{
    public function index(){
        $dosen = Dosen::with('login')->get()->map(function($d){
            return (object)[
                'id' => $d->nip,
                'login_id' => $d->login->login_id ?? null,
                'nama' => $d->nama,
                'email' => $d->login->email ?? '-',
                'role' => $d->login->role ?? 'dosen',
                'tipe' => 'dosen'
            ];
        });
        $mahasiswa = Mahasiswa::with('login')->get()->map(function($m){
            return (object)[
                'id' => $m->nrp,
                'login_id' => $m->login->login_id ?? null,
                'nama' => $m->nama,
                'email' => $m->login->email ?? '-',
                'role' => $m->login->role ?? 'mahasiswa',
                'tipe' => 'mahasiswa'
            ];
        });

        $users = $dosen->concat($mahasiswa);

        return view('user.index', compact('users'));
    }

    public function createAkun() {
        return view('user.createAkun');
    }

    public function storeAkun(Request $request){
        $validated = $request->validate([
            'role' => 'required|in:dosen,mahasiswa',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6|confirmed',
        ]);

        $login = \App\Models\Login::create([
        'email' => $validated['email'],
        'password' => bcrypt($validated['password']),
        'role' => $validated['role'],
        ]);

        session(['login_id' => $login->login_id,
        'role' => $validated['role']]);

        return redirect()->route('user.createBiodata', ['role' => $validated['role']]);
    }

    public function createBiodata($role){
        $login_id = session('login_id');
        if (!$login_id) {
            return redirect()->route('user.createAkun')->with('error', 'Lengkapi data akun terlebih dahulu.');
        }

        return view('user.createBiodata', compact('role'));
    }

    public function storeBiodata(Request $request, $role){
        $login_id = session('login_id');
        $role = session('role');

        if (!$login_id || !$role) {
            return redirect()->route('user.createAkun')->with('error', 'Lengkapi data akun terlebih dahulu.');
        }

        if ($role === 'dosen') {
            $validated = $request->validate([
                'nip' => 'required|unique:dosen,nip',
                'nama' => 'required|string',
                'program_studi' => 'required|string',
            ]);

            $validated['login_id'] = $login_id;

            Dosen::create($validated);
        } elseif ($role === 'mahasiswa') {
            $validated = $request->validate([
                'nrp' => 'required|unique:mahasiswa,nrp',
                'nama' => 'required|string',
                'angkatan' => 'required|integer',
                'program_studi' => 'required|string',
                'semester' => 'required|integer',
                'ipk' => 'required|numeric|between:0,4.00',
            ]);

            $validated['login_id'] = $login_id;

            $mhsbaru = new \App\Models\Mahasiswa($validated);

            $validated['max_sks'] = $mhsbaru->getMaxSKS();
            $validated['sks_yg_diambil'] = 0;

            Mahasiswa::create($validated);

        } else {
            return redirect()->route('user.createAkun')->with('error', 'Role tidak valid.');
        }

        session()->forget(['login_id', 'role']);

        return redirect()->route('user.index')->with('success', 'User berhasil ditambahkan.');
    }

  
    public function edit(string $login_id){
        $user = Login::where('login_id', $login_id)->firstOrFail();

        if($user->role === 'dosen'){
            $dosen = Dosen::where('login_id', $login_id)->first();
            return view('user.edit', compact('user', 'dosen'));
        }
        else if ($user->role === 'mahasiswa'){
            $mahasiswa = Mahasiswa::where('login_id', $login_id)->first();
            return view('user.edit', compact('user', 'mahasiswa'));
            
        }
        return view('user.edit', compact('user'));
    }

    public function update(Request $request, string $id)
    {
        $user = Login::findOrFail($id);

        $validated = $request->validate([
        'email' => 'required|email|unique:login,email,'.$user->login_id.',login_id',
        'password' => 'nullable|min:6|confirmed',
        ]);

        $user->email = $validated['email'];     
        
        if(!empty($validated['password'])){
            $user->password = bcrypt($validated['password']);
        }
        $user->save();

        return redirect()->route('user.index')->with('success', 'User berhasil diperbarui');
    }

    public function show(string $id){
        $user = Login::where('login_id', $id)->findOrFail($id);
        if($user->role === 'dosen'){
         $dosen = Dosen::where('login_id', $id)->first();
        return view('user.show', compact('user', 'dosen'));
         }
        else if ($user->role === 'mahasiswa'){
        $mahasiswa = Mahasiswa::where('login_id', $id)->first();
        return view('user.show', compact('user', 'mahasiswa'));
        }
    }

    public function destroy(string $id)
    {
        $user = Login::findOrFail($id);
        $user->delete();
        return redirect()->route('user.index')->with('success', 'User berhasil dihapus.');
    }
}
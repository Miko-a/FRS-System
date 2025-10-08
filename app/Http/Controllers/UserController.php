<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\login;
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

    public function create(){
        $dosen = Dosen::doesntHave('login')->get();
        $mahasiswa = Mahasiswa::doesntHave('login')->get();
        return view('user.create', compact('dosen', 'mahasiswa'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'login_id' => 'required',
            'role' => 'required|in:dosen,mahasiswa',
            'email' => 'required|email|unique:login,email',
            'password' => 'required|min:6|confirmed',
            'role' => 'required|in:admin,dosen,mahasiswa'
        ]);

        $login = new Login();
        $login->email = $validated['email'];
        $login->password = bcrypt($validated['password']);
        $login->role = $validated['role'];
        $login->save();


        if($validated['tipe'] === 'dosen'){
        $dosen = Dosen::findOrFail($validated['loginable_id']);
        $dosen->login_id = $login->login_id;
        $dosen->save();
         } else {
        $mahasiswa = Mahasiswa::findOrFail($validated['loginable_id']);
        $mahasiswa->login_id = $login->login_id;
        $mahasiswa->save();
        }
        return redirect()->route('user.index')->with('success', 'User berhasil ditambahkan.');
    }

    public function edit(string $login_id)
    {
    $user = Login::where('login_id', $login_id)->firstOrFail();

    if($user->role === 'dosen' && $user->dosen){
        $namaLengkap = $user->dosen->nama;
        $role = 'dosen';
    }
    else if ($user->role === 'mahasiswa' && $user->mahasiswa){
        $namaLengkap = $user->mahasiswa->nama;
        $role = 'mahasiswa';
    }
    else{
        $namaLengkap = '-';
        $role = null;
    }
    return view('user.edit', compact('user', 'namaLengkap', 'role'));
    }
    public function update(Request $request, string $id)
    {
        $user = Login::findOrFail($id);

        $validated = $request->validate([
        'email' => 'required|email|unique:login,email,'.$user->login_id.',login_id',
        'password' => 'nullable|min:6|confirmed',
        'role' => 'required|in:admin,dosen,mahasiswa'
        ]);

        $user->email = $validated['email'];
        $user->role = $validated['role'];
        
        if(!empty($validated['password'])){
            $user->password = bcrypt($validated['password']);
        }
        $user->save();

        return redirect()->route('user.index')->with('success', 'User berhasil diperbarui');
    }

    public function destroy(string $id)
    {
        $user = Login::findOrFail($id);
        $user->delete();
        return redirect()->route('user.index')->with('success', 'User berhasil dihapus.');
    }
}

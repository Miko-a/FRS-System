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
                'nama' => $d->nama,
                'email' => $d->login->email ?? '-',
                'role' => $d->login->role ?? 'dosen',
                'tipe' => 'dosen'
            ];
        });
        $mahasiswa = Mahasiswa::with('login')->get()->map(function($m){
            return (object)[
                'id' => $m->nrp,
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
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = Login::findOrFail($id);
        $user->delete();
        return redirect()->route('user.index')->with('success', 'User berhasil dihapus.');
    }
}

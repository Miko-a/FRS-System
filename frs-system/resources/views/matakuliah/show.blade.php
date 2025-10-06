<<<<<<< HEAD
@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Detail Mata Kuliah</h1>
    <table class="table">
        <tr>
            <th>Kode MK</th>
            <td>{{ $matkul->kode_mk }}</td>
        </tr>
        <tr>
            <th>Nama MK</th>
            <td>{{ $matkul->nama_mk }}</td>
        </tr>
        <tr>
            <th>SKS</th>
            <td>{{ $matkul->sks }}</td>
        </tr>
        <tr>
            <th>Semester</th>
            <td>{{ $matkul->semester }}</td>
        </tr>
        <tr>
            <th>Jenis MK</th>
            <td>{{ ucfirst($matkul->jenis_mk) }}</td>
        </tr>
    </table>
    <a href="{{ route('matakuliah.index') }}" class="btn btn-secondary">Kembali</a>
</div>
@endsection
=======
@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Detail Mata Kuliah</h1>
    <table class="table">
        <tr>
            <th>Kode MK</th>
            <td>{{ $matkul->kode_mk }}</td>
        </tr>
        <tr>
            <th>Nama MK</th>
            <td>{{ $matkul->nama_mk }}</td>
        </tr>
        <tr>
            <th>SKS</th>
            <td>{{ $matkul->sks }}</td>
        </tr>
        <tr>
            <th>Semester</th>
            <td>{{ $matkul->semester }}</td>
        </tr>
        <tr>
            <th>Jenis MK</th>
            <td>{{ ucfirst($matkul->jenis_mk) }}</td>
        </tr>
    </table>
    <a href="{{ route('matakuliah.index') }}" class="btn btn-secondary">Kembali</a>
</div>
@endsection
>>>>>>> ee6e01452fc50caf4e6b7d74cc922ea1d7b2cc8f

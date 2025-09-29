@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Detail Mata Kuliah</h1>
    <table class="table">
        <tr>
            <th>Kode MK</th>
            <td>{{ $matakuliah->kode_mk }}</td>
        </tr>
        <tr>
            <th>Nama MK</th>
            <td>{{ $matakuliah->nama_mk }}</td>
        </tr>
        <tr>
            <th>SKS</th>
            <td>{{ $matakuliah->sks }}</td>
        </tr>
        <tr>
            <th>Semester</th>
            <td>{{ $matakuliah->semester }}</td>
        </tr>
        <tr>
            <th>Jenis MK</th>
            <td>{{ ucfirst($matakuliah->jenis_mk) }}</td>
        </tr>
    </table>
    <a href="{{ route('matakuliah.index') }}" class="btn btn-secondary">Kembali</a>
</div>
@endsection
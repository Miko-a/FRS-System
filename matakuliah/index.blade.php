@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Daftar Mata Kuliah</h1>
    <a href="{{ route('matakuliah.create') }}" class="btn btn-primary mb-3">Tambah Mata Kuliah</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Kode MK</th>
                <th>Nama MK</th>
                <th>SKS</th>
                <th>Semester</th>
                <th>Jenis</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $matkul)
            <tr>
                <td>{{ $matkul->kode_mk }}</td>
                <td>{{ $matkul->nama_mk }}</td>
                <td>{{ $matkul->sks }}</td>
                <td>{{ $matkul->semester }}</td>
                <td>{{ ucfirst($matkul->jenis_mk) }}</td>
                <td>
                    <a href="{{ route('matakuliah.show', $matkul->id) }}" class="btn btn-info btn-sm">Detail</a>
                    <a href="{{ route('matakuliah.edit', $matkul->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('matakuliah.destroy', $matkul->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus?')">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
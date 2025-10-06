<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Laravel App')</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <div class="container">
        @yield('content')
    </div>
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>

@section('title', 'Daftar Mata Kuliah')

@section('content')
<div class="container">
    <h1>Daftar Mata Kuliah</h1>
    <a href="{{ route('matakuliah.create') }}" class="btn btn-primary mb-3">Tambah Mata Kuliah</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nama Mata Kuliah</th>
                <th>SKS</th>
                <th>Semester</th>
                <th>Jenis</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($matakuliah as $matkul)
            <tr>
                <td>{{ $matkul->nama_mk }}</td>
                <td>{{ $matkul->sks }}</td>
                <td>{{ $matkul->semester }}</td>
                <td>{{ ucfirst($matkul->jenis_mk) }}</td>
                <td>
                    <!-- Pastikan parameter yang dikirim adalah model atau primary key -->
                    <a href="{{ route('matakuliah.show', $matkul) }}" class="btn btn-info btn-sm">Detail</a>
                    <a href="{{ route('matakuliah.edit', $matkul) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('matakuliah.destroy', $matkul) }}" method="POST" style="display:inline;">
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

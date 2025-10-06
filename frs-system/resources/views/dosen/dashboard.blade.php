<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Dosen</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <div class="container">
        <h1>Selamat Datang, {{ Auth::user()->name }}</h1>
        <p>Ini adalah dashboard dosen.</p>
        <ul>
            <li><a href="{{ route('matakuliah.index') }}">Kelola Mata Kuliah</a></li>
             <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
            <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
        </ul>
    </div>
</body>
</html>
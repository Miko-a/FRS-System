<!DOCTYPE html>
<html lang="en" class="h-full bg-gray-900">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ambil Mata Kuliah</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="h-full text-gray-100">

<nav class="bg-gray-800/50">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
      <div class="flex h-16 items-center justify-between">
        <div class="flex items-center">
          <div class="shrink-0">
            <a href="{{ route('mahasiswa.dashboard') }}">
              <img src="{{ asset('images/logo.png') }}" alt="Logo" class="size-10 w-auto h-10"/>
            </a>
          </div>
          <div class="hidden md:block">
            <div class="ml-10 flex items-baseline space-x-4">
              <a href="{{ route('mahasiswa.dashboard') }}" class="rounded-md bg-gray-950/50 px-3 py-2 text-sm font-medium text-white">Dashboard</a>
              <a href="{{ route('matakuliah.create') }}" class="rounded-md px-3 py-2 text-sm font-medium text-gray-300 hover:bg-white/5 hover:text-white">Ambil Mata Kuliah</a>
              <a href="{{ route('matakuliah.index') }}" class="rounded-md px-3 py-2 text-sm font-medium text-gray-300 hover:bg-white/5 hover:text-white">List Mata Kuliah</a>
            </div>
          </div>
        </div>

        <div class="flex items-center space-x-4">
          <div class="flex items-center space-x-2">
            <img src="{{ asset('images/profile.png') }}" alt="User" class="size-9 rounded-full outline -outline-offset-1 outline-white/10" />
            <span class="text-gray-300 text-sm">{{ optional(Auth::user()->Mahasiswa)->nama ?? Auth::user()->name }}</span>
          </div>

          <form id="logout-form" action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="rounded-md px-3 py-2 text-sm font-medium text-gray-300 hover:bg-white/5 hover:text-white transition">
              Logout
            </button>
          </form>
        </div>
      </div>
    </div>
</nav>

<header class="bg-gray-800 border-b border-gray-700">
    <div class="max-w-7xl mx-auto px-4 py-6 sm:px-6 lg:px-8">
        <h1 class="text-3xl font-bold text-white">Ambil Mata Kuliah</h1>
    </div>
</header>

<main class="max-w-7xl mx-auto px-4 py-10 sm:px-6 lg:px-8">
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">

        @foreach($kelas as $k)
            @php
                $isFull = $k->ambil_count >= $k->kuota; // ambil_count = jumlah mahasiswa yang sudah ambil kelas
            @endphp
            <div class="bg-gray-800/50 rounded-2xl p-6 shadow-lg flex flex-col items-center hover:shadow-indigo-500/30 transition">
                <h3 class="text-xl font-semibold mb-2 text-indigo-400">{{ $k->matakuliah->nama_mk }}</h3>
                <p class="text-gray-400 mb-1 text-sm">Dosen: {{ $k->dosen->nama }}</p>
                <p class="text-gray-400 mb-1 text-sm">Semester: {{ $k->matakuliah->semester }}</p>
                <p class="text-gray-400 mb-4 text-sm">Kuota: {{ $k->ambil_count }}/{{ $k->kuota }}</p>

                @if($isFull)
                    <button disabled class="px-4 py-2 bg-gray-600 text-white rounded-md cursor-not-allowed">
                        Kuota Penuh
                    </button>
                @else
                    <form action="{{ route('kelas.ambil', $k->id) }}" method="POST">
                        @csrf
                        <button type="submit" class="px-4 py-2 bg-indigo-600 hover:bg-indigo-500 text-white rounded-md">
                            Ambil
                        </button>
                    </form>
                @endif
            </div>
        @endforeach

    </div>
</main>
</body>
</html>

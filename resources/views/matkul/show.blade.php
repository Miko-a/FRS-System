<!DOCTYPE html>
<html lang="en" class="h-full bg-gray-900">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="h-full">
    
    <div class="min-h-full">

    <nav class="bg-gray-800/50">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="flex h-16 items-center justify-between">


        <div class="flex items-center">
          <div class="shrink-0">
            <a href="{{route ('dosen.dashboard') }}">
            <img src="{{ asset('images/logo.png') }}" alt="Logo" class="size-10 w-auto h-10"/>
            </a>
          </div>
            <div class="hidden md:block">
                <div class="ml-10 flex items-baseline space-x-4">
                    <a href="{{ route('dosen.dashboard') }}" aria-current="page" class="rounded-md bg-gray-950/50 px-3 py-2 text-sm font-medium text-white">Dashboard</a>

                    <a href="{{ route('matkul.index') }}" class="rounded-md px-3 py-2 text-sm font-medium text-gray-300 hover:bg-white/5 hover:text-white">Informasi Kelas</a>

                    <a href="{{ route('dosen.ajuanUbahJadwal') }}" class="rounded-md px-3 py-2 text-sm font-medium text-gray-300 hover:bg-white/5 hover:text-white">Perubahan Jadwal</a>

                    <a href="{{ route('matkul.index') }}" class="rounded-md px-3 py-2 text-sm font-medium text-gray-300 hover:bg-white/5 hover:text-white">Kurikulum</a>
                </div>
            </div>
            </div>

            <div class="flex items-center space-x-4">
            <div class="flex items-center space-x-2">
                <a href="{{ route('dosen.profile') }}">
                    <img src="{{ asset('images/profile.png') }}" alt="User" class="size-9 rounded-full outline -outline-offset-1 outline-white/10" />
                    <span class="text-gray-300 text-sm">{{ Auth::user()->name }}</span>
                </a>
            </div>

            <form id="logout-form" action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" 
                        class="rounded-md px-3 py-2 text-sm font-medium text-gray-300 hover:bg-white/5 hover:text-white transition">
                Logout
                </button>
            </form>
            </div>
        </div>
        </div>
    </nav>

<header class="bg-gray-800 border-b border-gray-700">
    <div class="max-w-7xl mx-auto px-4 py-6 sm:px-6 lg:px-8">
        <h1 class="text-3xl font-bold text-white">Detail Mata Kuliah</h1>
    </div>
</header>
    
<main class="max-w-3xl mx-auto px-4 py-10 sm:px-6 lg:px-8">
    <div class="bg-gray-800/60 p-8 rounded-2xl shadow-xl space-y-6">

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
                <p class="text-gray-400">Kode MK</p>
                <p class="text-white font-medium">{{ $matkul->kode_mk }}</p>
            </div>
            <div>
                <p class="text-gray-400">Nama MK</p>
                <p class="text-white font-medium">{{ $matkul->nama_mk }}</p>
            </div>
            <div>
                <p class="text-gray-400">SKS</p>
                <p class="text-white font-medium">{{ $matkul->sks }}</p>
            </div>
            <div>
                <p class="text-gray-400">Semester</p>
                <p class="text-white font-medium">{{ $matkul->semester }}</p>
            </div>
            <div>
                <p class="text-gray-400">Dpsen Pengampu</p>
                <p class="text-white font-medium">{{ $matkul->dosen->pluck('nama')->implode(', ') }}</p>
            </div>
            <div class="md:col-span-2">
                <p class="text-gray-400">Jenis MK</p>
                <p class="text-white font-medium">{{ ucfirst($matkul->jenis_mk) }}</p>
            </div>
        </div>

        <div class="flex justify-end">
            <a href="{{ route('matkul.index') }}" class="px-4 py-2 bg-gray-700 hover:bg-gray-600 text-white rounded-md">Kembali</a>
        </div>
        
    </div>
</main>
</body>
</html>

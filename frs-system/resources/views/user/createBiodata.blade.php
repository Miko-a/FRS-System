<!DOCTYPE html>
<html lang="en" class="h-full bg-gray-900">
<head>
    <meta charset="UTF-8">
    <title>Tambah User - Langkah 2</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="h-full text-gray-100">
<nav class="bg-gray-800/50">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="flex h-16 items-center justify-between">
            <div class="flex items-center">
                <div class="shrink-0">
                    <a href="{{ route('admin.dashboard') }}">
                        <img src="{{ asset('images/logo.png') }}" alt="Logo" class="w-auto h-10"/>
                    </a>
                </div>
                <div class="hidden md:block">
                    <div class="ml-10 flex items-baseline space-x-4">
                        <a href="{{ route ('admin.dashboard')}}" class="rounded-md px-3 py-2 text-sm font-medium text-white">Dashboard</a>
                        <a href="{{ route('matakuliah.index') }}" class="rounded-md px-3 py-2 text-sm font-medium text-gray-300 hover:bg-white/5 hover:text-white">List Mata Kuliah</a>
                        <a href="{{ route('kelas.index') }}" class="rounded-md px-3 py-2 text-sm font-medium text-gray-300 hover:bg-white/5 hover:text-white">List Kelas</a>
                        <a href="{{ route('user.index') }}" class="rounded-md bg-gray-950/50 px-3 py-2 text-sm font-medium text-gray-300 hover:bg-white/5 hover:text-white">List User</a>
                        
                    </div>
                </div>
            </div>
            <div class="flex items-center space-x-4">
                <div class="flex items-center space-x-2">
                    <img src="{{ asset('images/profile.png') }}" alt="User" class="size-10 rounded-full outline -outline-offset-1 outline-white/10"/>
                    <span class="text-gray-300 text-sm">{{ Auth::user()->name }}</span>
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

<div class="max-w-lg mx-auto mt-20 bg-gray-800/70 p-8 rounded-2xl shadow-xl border border-gray-700">
    <h2 class="text-2xl font-semibold mb-6 text-center text-white">Langkah 2: Biodata {{ ucfirst($role) }}</h2>

    <form action="{{ route('user.storeBiodata', ['role' => $role]) }}" method="POST">
        @csrf

        @if ($role === 'dosen')
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-300 mb-1">NIP</label>
                <input type="text" name="nip" class="w-full bg-gray-800 border border-gray-700 rounded-lg px-3 py-2 text-gray-100">
                @error('nip')<span class="text-red-500 text-sm">{{ $message }}</span>@enderror
            </div>

            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-300 mb-1">Nama</label>
                <input type="text" name="nama" class="w-full bg-gray-800 border border-gray-700 rounded-lg px-3 py-2 text-gray-100">
                @error('nama')<span class="text-red-500 text-sm">{{ $message }}</span>@enderror
            </div>

            <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-300 mb-1">Program Studi</label>
                    <select name="program_studi" class="w-full bg-gray-700 border border-gray-600 rounded-lg px-3 py-2 text-gray-100 focus:outline-none focus:ring-2 focus:ring-indigo-500" required>
                        <option value="">-- Pilih Program Studi --</option>
                        <option value="Teknik Informatika">Teknik Informatika</option>
                        <option value="RKA">RKA</option>
                        <option value="RPL">RPL</option>
                    </select>
            </div>
        @else
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-300 mb-1">NRP</label>
                <input type="text" name="nrp" class="w-full bg-gray-800 border border-gray-700 rounded-lg px-3 py-2 text-gray-100">
                @error('nrp')<span class="text-red-500 text-sm">{{ $message }}</span>@enderror
            </div>

            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-300 mb-1">Nama</label>
                <input type="text" name="nama" class="w-full bg-gray-800 border border-gray-700 rounded-lg px-3 py-2 text-gray-100">
                @error('nama')<span class="text-red-500 text-sm">{{ $message }}</span>@enderror
            </div>

            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-300 mb-1">Angkatan</label>
                <input type="number" name="angkatan" class="w-full bg-gray-800 border border-gray-700 rounded-lg px-3 py-2 text-gray-100">
            </div>

            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-300 mb-1">Program Studi</label>
                    <select name="program_studi" class="w-full bg-gray-700 border border-gray-600 rounded-lg px-3 py-2 text-gray-100 focus:outline-none focus:ring-2 focus:ring-indigo-500" required>
                        <option value="">-- Pilih Program Studi --</option>
                        <option value="Teknik Informatika">Teknik Informatika</option>
                        <option value="RKA">RKA</option>
                        <option value="RPL">RPL</option>
                    </select>
            </div>

            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-300 mb-1">Semester</label>
                <input type="number" name="semester" class="w-full bg-gray-800 border border-gray-700 rounded-lg px-3 py-2 text-gray-100">
            </div>

            <div class="mb-6">
                <label class="block text-sm font-medium text-gray-300 mb-1">IPK</label>
                <input type="text" name="ipk" class="w-full bg-gray-800 border border-gray-700 rounded-lg px-3 py-2 text-gray-100">
            </div>
        @endif

        <div class="flex justify-between">
            <a href="{{ route('user.createAkun') }}" class="px-5 py-2 mt-8 rounded-lg bg-gray-700 hover:bg-gray-600 text-gray-200 font-medium">Kembali</a>
            <button type="submit" class="px-5 py-2 mt-8 rounded-lg bg-indigo-600 hover:bg-indigo-700 text-white font-semibold">Simpan</button>
        </div>
    </form>
</div>
</body>
</html>

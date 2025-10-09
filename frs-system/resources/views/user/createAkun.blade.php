<!DOCTYPE html>
<html lang="en" class="h-full bg-gray-900">
<head>
    <meta charset="UTF-8">
    <title>Tambah User - Langkah 1</title>
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
    <h2 class="text-2xl font-semibold mb-6 text-center text-white">Langkah 1: Data Login</h2>
    
    <form action="{{ route('user.storeAkun') }}" method="POST">
        @csrf

        <div class="mb-4">
            <label class="block text-sm font-medium text-gray-300 mb-1">Role</label>
            <select name="role" class="w-full bg-gray-800 border border-gray-700 rounded-lg px-3 py-2 text-gray-100">
                <option value="">Pilih Role</option>
                <option value="dosen">Dosen</option>
                <option value="mahasiswa">Mahasiswa</option>
                <option value="admin">Admin</option>
            </select>
            @error('role')<span class="text-red-500 text-sm">{{ $message }}</span>@enderror
        </div>

        <div class="mb-4">
            <label class="block text-sm font-medium text-gray-300 mb-1">Email</label>
            <input type="email" name="email" class="w-full bg-gray-800 border border-gray-700 rounded-lg px-3 py-2 text-gray-100">
            @error('email')<span class="text-red-500 text-sm">{{ $message }}</span>@enderror
        </div>

        <div class="mb-4">
            <label class="block text-sm font-medium text-gray-300 mb-1">Password</label>
            <input type="password" name="password" class="w-full bg-gray-800 border border-gray-700 rounded-lg px-3 py-2 text-gray-100">
            @error('password')<span class="text-red-500 text-sm">{{ $message }}</span>@enderror
        </div>

        <div class="mb-6">
            <label class="block text-sm font-medium text-gray-300 mb-1">Konfirmasi Password</label>
            <input type="password" name="password_confirmation" class="w-full bg-gray-800 border border-gray-700 rounded-lg px-3 py-2 text-gray-100">
        </div>

        <div class="flex justify-end">
            <button type="submit" class="px-5 py-2 rounded-lg bg-indigo-600 hover:bg-indigo-700 text-white font-semibold">
                Lanjut
            </button>
        </div>
    </form>
</div>
</body>
</html>

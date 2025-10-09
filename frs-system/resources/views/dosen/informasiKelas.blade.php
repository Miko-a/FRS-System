<!DOCTYPE html>
<html lang="en" class="h-full bg-gray-900">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Informasi Kelas</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="h-full">

    <div class="min-h-full">

    <nav class="bg-gray-800/50">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="flex h-16 items-center justify-between">


            <div class="flex items-center">
                <div class="shrink-0">
                    <a href="{{ route('dosen.dashboard') }}">
                        <img src="{{ asset('images/logo.png') }}" alt="Logo" class="w-auto h-10"/>
                    </a>
                </div>
            <div class="hidden md:block">
                <div class="ml-10 flex items-baseline space-x-4">
                    <a href="{{ route('dosen.dashboard') }}" class="rounded-md px-3 py-2 text-sm font-medium text-gray-300 hover:bg-white/5 hover:text-white">Dashboard</a>

                    <a href="{{ route ('dosen.informasiKelas') }}" aria-current="page" class="rounded-md bg-gray-950/50 px-3 py-2 text-sm font-medium text-white">Informasi Kelas</a>

                    <a href="{{ route('dosen.ajuanUbahJadwal') }}" class="rounded-md px-3 py-2 text-sm font-medium text-gray-300 hover:bg-white/5 hover:text-white">Perubahan Jadwal</a>

                    <a href="{{ route('dosen.kurikulum') }}" class="rounded-md px-3 py-2 text-sm font-medium text-gray-300 hover:bg-white/5 hover:text-white">Kurikulum</a>
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

    <header class="relative bg-gray-800 after:pointer-events-none after:absolute after:inset-x-0 after:inset-y-0 after:border-y after:border-white/10">
        <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between">
                <h1 class="text-3xl font-bold tracking-tight text-white">Informasi Kelas</h1>
                <!-- kutambahin fitur buat ngajuin perubahan -->
                <a href="{{ route('dosen.ajuanUbahJadwal') }}" class="inline-flex items-center px-4 py-2 bg-indigo-600 hover:bg-yellow-500 rounded-md text-white text-sm font-medium transition">
                    Ajukan Perubahan
                </a>
            </div>
        </div>
    </header>
    <main class="max-w-7xl mx-auto px-4 py-10 sm:px-6 lg:px-8">
        <div class="overflow-x-auto bg-gray-800/60 p-6 rounded-2xl shadow-xl">
            <table class="min-w-full divide-y divide-gray-700 text-gray-100">
                <thead>
                    <tr class="bg-gray-900">
                        <th class="px-6 py-3 text-left text-sm font-medium">Mata Kuliah</th>
                        <th class="px-6 py-3 text-left text-sm font-medium">Kode Kelas</th>
                        <th class="px-6 py-3 text-left text-sm font-medium">Hari</th>
                        <th class="px-6 py-3 text-left text-sm font-medium">Jam</th>
                        <th class="px-6 py-3 text-left text-sm font-medium">Ruang</th>
                        <th class="px-6 py-3 text-left text-sm font-medium">Kapasitas</th>
                        <th class="px-6 py-3 text-left text-sm font-medium">Jumlah Mahasiswa</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-700">
                    @foreach ($kelas as $k)
                    <tr>
                        <td class="px-6 py-4">{{ $k->matakuliah->nama_mk ?? '-' }}</td>
                        <td class="px-6 py-4">{{ $k->kode_kelas }}</td>
                        <td class="px-6 py-4">{{ $k->hari }}</td>
                        <td class="px-6 py-4">{{ $k->jam_mulai }} - {{ $k->jam_selesai }}</td>
                        <td class="px-6 py-4">{{ $k->ruang_kelas }}</td>
                        <td class="px-6 py-4">{{ $k->kapasitas }}</td>
                        <td class="px-6 py-4">{{ $k->mahasiswa->count() }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

            <div class="mt-8 flex justify-center">
                <a href="{{ route('dosen.dashboard') }}" class="px-4 py-2 bg-indigo-600 hover:bg-indigo-500 rounded-md text-white transition">
                    Kembali ke Dashboard
                </a>
            </div>
            
        </div>
    </main>
</body>
</html>

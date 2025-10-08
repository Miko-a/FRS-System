<!DOCTYPE html>
<html lang="en" class="h-full bg-gray-900">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kurikulum Dosen</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="h-full">
    <div class="min-h-full">

    <nav class="bg-gray-800/50">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="flex h-16 items-center justify-between">


            <div class="flex items-center">
            <div class="shrink-0">
                <img src="{{ asset('images/logo.png') }}" alt="Logo" class="size-10 w-auto h-10" />
            </div>
            <div class="hidden md:block">
                <div class="ml-10 flex items-baseline space-x-4">
                    <a href="{{ route('dosen.dashboard') }}" class="rounded-md px-3 py-2 text-sm font-medium text-gray-300 hover:bg-white/5 hover:text-white">Dashboard</a>

                    <a href="{{ route('dosen.informasiKelas') }}" class="rounded-md px-3 py-2 text-sm font-medium text-gray-300 hover:bg-white/5 hover:text-white">Informasi Kelas</a>

                    <a href="{{ route('dosen.ajuanUbahJadwal') }}" class="rounded-md px-3 py-2 text-sm font-medium text-gray-300 hover:bg-white/5 hover:text-white">Perubahan Jadwal</a>

                    <a href="#" aria-current="page" class="rounded-md bg-gray-950/50 px-3 py-2 text-sm font-medium text-white">Kurikulum</a>
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
        <h1 class="text-3xl font-bold tracking-tight text-white">Kurikulum Dosen</h1>
        </div>
    </header>

    <main>
        <main>
    <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
        <div class="bg-gray-800 rounded-lg p-6">
            <h2 class="text-xl font-semibold text-white mb-4">Daftar Mata Kuliah & Prasyarat</h2>
            <table class="min-w-full divide-y divide-gray-700">
                <thead>
                    <tr>
                        <th class="px-4 py-2 text-left text-gray-300">Kode</th>
                        <th class="px-4 py-2 text-left text-gray-300">Nama Mata Kuliah</th>
                        <th class="px-4 py-2 text-left text-gray-300">Prasyarat</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-700">
                    @foreach($matakuliahs as $mk)
                        <tr>
                            <td class="px-4 py-2 text-gray-100">{{ $mk->kode_mk }}</td>
                            <td class="px-4 py-2 text-gray-100">{{ $mk->nama_mk }}</td>
                            <td class="px-4 py-2 text-gray-100">
                                @if($mk->prasyarat->count())
                                    <ul class="list-disc list-inside">
                                        @foreach($mk->prasyarat as $pr)
                                            <li>{{ $pr->nama_mk }}</li>
                                        @endforeach
                                    </ul>
                                @else
                                    <span class="italic text-gray-400">Tidak ada</span>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</main>
    </main>
</body>
</html>
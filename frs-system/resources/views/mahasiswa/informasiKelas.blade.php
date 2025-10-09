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
                    <a href="{{ route('mahasiswa.dashboard') }}">
                        <img src="{{ asset('images/logo.png') }}" alt="Logo" class="w-auto h-10"/>
                    </a>
                </div>
            <div class="hidden md:block">
                <div class="ml-10 flex items-baseline space-x-4">
                    <a href="{{ route('mahasiswa.dashboard') }}" aria-current="page" class="rounded-md  px-3 py-2 text-sm font-medium text-white">Dashboard</a>

                    <a href="{{ route('mahasiswa.ambil') }}" class="rounded-md px-3 py-2 text-sm font-medium text-gray-300 hover:bg-white/5 hover:text-white">Ambil Mata Kuliah</a>

                    <a href="{{ route('mahasiswa.informasiKelas') }}" class="rounded-md bg-gray-950/50 px-3 py-2 text-sm font-medium text-gray-300 hover:bg-white/5 hover:text-white">List Kelas</a>

                    <a href="{{ route('mahasiswa.kurikulum') }}" class="rounded-md px-3 py-2 text-sm font-medium text-gray-300 hover:bg-white/5 hover:text-white">Kurikulum</a>
                </div>
            </div>
            </div>

            <div class="flex items-center space-x-4">
            <div class="flex items-center space-x-2">
                <a href="{{ route('mahasiswa.profile') }}">
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
        <h1 class="text-3xl font-bold tracking-tight text-white">Informasi Kelas</h1>
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
                        <th class="px-6 py-3 text-left text-sm font-medium">Aksi</th>
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
                        <td class="px-6 py-4">
                            <form action="{{ route('mahasiswa.dropMatkul') }}" method="POST" class="drop-form">
                                @csrf
                                <input type="hidden" name="kelas_id" value="{{ $k->kelas_id }}">
                                <button type="submit" class="px-3 py-1 bg-red-600 hover:bg-red-500 text-white rounded-md text-sm center">
                                    Drop
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

            <div class="mt-8 flex justify-center">
                <a href="{{ route('mahasiswa.dashboard') }}" class="px-4 py-2 bg-indigo-600 hover:bg-indigo-500 rounded-md text-white transition">
                    Kembali ke Dashboard
                </a>
            </div>
            
        </div>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        document.querySelectorAll('.drop-form').forEach(form => {
            form.addEventListener('submit', function(e) {
                e.preventDefault();
                Swal.fire({
                    title: 'Yakin ingin drop mata kuliah ini?',
                    text: "Tindakan ini tidak dapat dibatalkan.",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#3085d6',
                    confirmButtonText: 'Ya, Drop!',
                    cancelButtonText: 'Batal'
                }).then((result) => {
                    if (result.isConfirmed) {
                        form.submit();
                    }
                });
            });
        });
    </script>

    @if (session('success'))
    <script>
    Swal.fire({
        title: "Berhasil!",
        text: "{{ session('success') }}",
        icon: "success",
        confirmButtonColor: "#4F46E5",
    });
    </script>
    @endif


</body>
</html>
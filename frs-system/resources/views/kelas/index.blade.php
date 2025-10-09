<!DOCTYPE html>
<html lang="en" class="h-full bg-gray-900">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List Kelas</title>
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
                        <a href="{{ route('kelas.index') }}" class="rounded-md bg-gray-950/50 px-3 py-2 text-sm font-medium text-gray-300 hover:bg-white/5 hover:text-white">List Kelas</a>
                        <a href="{{ route('user.index') }}" class="rounded-md px-3 py-2 text-sm font-medium text-gray-300 hover:bg-white/5 hover:text-white">List User</a>
                        
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

<header class="bg-gray-800 border-b border-gray-700">
    <div class="max-w-7xl mx-auto px-4 py-6 sm:px-6 lg:px-8">
        <h1 class="text-3xl font-bold text-white">List Kelas</h1>
    </div>
</header>

<main class="max-w-7xl mx-auto px-4 py-10 sm:px-6 lg:px-8">
    <div class="flex justify-end mb-6">
        <a href="{{ route('kelas.create') }}" 
           class="px-4 py-2 bg-indigo-600 hover:bg-indigo-500 text-white rounded-md">Tambah Kelas</a>
    </div>

    <div class="overflow-x-auto bg-gray-800/60 p-6 rounded-2xl shadow-xl">
        <table class="min-w-full divide-y divide-gray-700 text-gray-100">
            <thead>
                <tr class="bg-gray-900">
                    <th class="px-6 py-3 text-left text-sm font-medium">Mata Kuliah</th>
                    <th class="px-6 py-3 text-left text-sm font-medium">Kode Kelas</th>
                    <th class="px-6 py-3 text-left text-sm font-medium">Dosen Pengajar</th>
                    <th class="px-6 py-3 text-left text-sm font-medium">Hari</th>
                    <th class="px-6 py-3 text-left text-sm font-medium">Jam</th>
                    <th class="px-6 py-3 text-left text-sm font-medium">Ruang</th>
                    <th class="px-6 py-3 text-left text-sm font-medium">Kapasitas</th>
                    <th class="px-6 py-3 text-left text-sm font-medium">Jumlah Mahasiswa</th>
                    <th class="px-6 py-3 text-left text-sm font-medium">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-700">
                @foreach ($kelas as $k)
                <tr>
                    <td class="px-6 py-4">{{ $k->matakuliah->nama_mk ?? '-' }}</td>
                    <td class="px-6 py-4">{{ $k->kode_kelas }}</td>
                    <td class="px-6 py-4">{{ $k->dosen->nama ?? '-' }}</td>
                    <td class="px-6 py-4">{{ $k->hari }}</td>
                    <td class="px-6 py-4">{{ $k->jam_mulai }} - {{ $k->jam_selesai }}</td>
                    <td class="px-6 py-4">{{ $k->ruang_kelas }}</td>
                    <td class="px-6 py-4">{{ $k->kapasitas }}</td>
                    <td class="px-6 py-4">{{ $k->mahasiswa->count() }}</td>
                    <td class="px-6 py-4 flex gap-2">
                        <a href="{{ route('kelas.show', $k->kelas_id) }}" 
                           class="px-3 py-1 bg-blue-600 hover:bg-blue-500 text-white rounded-md text-sm">Detail</a>
                        <a href="{{ route('kelas.edit', $k->kelas_id) }}" 
                           class="px-3 py-1 bg-yellow-600 hover:bg-yellow-500 text-white rounded-md text-sm">Edit</a>
                        <form action="{{ route('kelas.destroy', $k->kelas_id) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" 
                                    class="px-3 py-1 bg-red-600 hover:bg-red-500 text-white rounded-md text-sm" 
                                    onclick="return confirm('Yakin ingin menghapus?')">Hapus</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</main>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

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

<!DOCTYPE html>
<html lang="en" class="h-full bg-gray-900">
<head>
    <meta charset="UTF-8">
    <title>Edit User</title>
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

<header class="bg-gray-800 border-b border-gray-700">
    <div class="max-w-7xl mx-auto px-4 py-6 sm:px-6 lg:px-8">
        <h1 class="text-3xl font-bold text-white">Edit User</h1>
    </div>
</header>

<main class="max-w-3xl mx-auto px-4 py-10 sm:px-6 lg:px-8">
    <div class="bg-gray-800/70 p-8 rounded-2xl shadow-xl border border-gray-700">
        <form action="{{ route('user.update', $user->login_id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="space-y-6">

                <div>
                    <label class="block text-sm font-medium text-gray-300 mb-1">Email</label>
                    <input type="email" name="email" value="{{ old('email', $user->email) }}" 
                           class="w-full rounded-lg bg-gray-800 border border-gray-700 px-3 py-2 text-gray-100">
                    @error('email') 
                    <span class="text-red-500 text-sm">{{ $message }}</span> 
                    @enderror
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-300 mb-1">Password (kosongkan jika tidak diubah)</label>
                    <input type="password" name="password" class="w-full rounded-lg bg-gray-800 border border-gray-700 px-3 py-2 text-gray-100">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-300 mb-1">Konfirmasi Password</label>
                    <input type="password" name="password_confirmation" class="w-full rounded-lg bg-gray-800 border border-gray-700 px-3 py-2 text-gray-100">
                    @error('password')
                    <span class="text-red-500 text-sm">{{ $message }}</span> 
                    @enderror
                </div>
                @if ($user->role === 'dosen')
                    <hr class="border-gray-700">
                    <h2 class="text-lg font-semibold text-indigo-400">Data Dosen</h2>

                    <div>
                        <label class="block text-sm font-medium text-gray-300 mb-1">NIP</label>
                        <input type="text" name="nip" value="{{ old('nip', $dosen->nip ?? '') }}"
                               class="w-full rounded-lg bg-gray-800 border border-gray-700 px-3 py-2 text-gray-100">
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-300 mb-1">Nama Lengkap</label>
                        <input type="text" name="nama" value="{{ old('nama', $dosen->nama ?? '') }}"
                               class="w-full rounded-lg bg-gray-800 border border-gray-700 px-3 py-2 text-gray-100">
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-300 mb-1">Program Studi</label>
                        <select name="program_studi" class="w-full bg-gray-700 border border-gray-600 rounded-lg px-3 py-2 text-gray-100">
                            <option value="">-- Pilih Program Studi --</option>
                            <option value="Teknik Informatika" {{ old('program_studi', $dosen->program_studi ?? '') == 'Teknik Informatika' ? 'selected' : '' }}>Teknik Informatika</option>
                            <option value="RKA" {{ old('program_studi', $dosen->program_studi ?? '') == 'RKA' ? 'selected' : '' }}>RKA</option>
                            <option value="RPL" {{ old('program_studi', $dosen->program_studi ?? '') == 'RPL' ? 'selected' : '' }}>RPL</option>
                        </select>
                    </div>

                @elseif ($user->role === 'mahasiswa')
                    <hr class="border-gray-700">
                    <h2 class="text-lg font-semibold text-indigo-400">Data Mahasiswa</h2>

                    <div>
                        <label class="block text-sm font-medium text-gray-300 mb-1">NRP</label>
                        <input type="text" name="nrp" value="{{ old('nrp', $mahasiswa->nrp ?? '') }}"
                               class="w-full rounded-lg bg-gray-800 border border-gray-700 px-3 py-2 text-gray-100">
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-300 mb-1">Nama Lengkap</label>
                        <input type="text" name="nama" value="{{ old('nama', $mahasiswa->nama ?? '') }}"
                               class="w-full rounded-lg bg-gray-800 border border-gray-700 px-3 py-2 text-gray-100">
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-300 mb-1">Angkatan</label>
                        <input type="number" name="angkatan" value="{{ old('angkatan', $mahasiswa->angkatan ?? '') }}"
                               class="w-full rounded-lg bg-gray-800 border border-gray-700 px-3 py-2 text-gray-100">
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-300 mb-1">Program Studi</label>
                        <select name="program_studi" class="w-full bg-gray-700 border border-gray-600 rounded-lg px-3 py-2 text-gray-100">
                            <option value="">-- Pilih Program Studi --</option>
                            <option value="Teknik Informatika" {{ old('program_studi', $mahasiswa->program_studi ?? '') == 'Teknik Informatika' ? 'selected' : '' }}>Teknik Informatika</option>
                            <option value="RKA" {{ old('program_studi', $mahasiswa->program_studi ?? '') == 'RKA' ? 'selected' : '' }}>RKA</option>
                            <option value="RPL" {{ old('program_studi', $mahasiswa->program_studi ?? '') == 'RPL' ? 'selected' : '' }}>RPL</option>
                        </select>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-300 mb-1">Semester</label>
                        <input type="number" name="semester" value="{{ old('semester', $mahasiswa->semester ?? '') }}"
                               class="w-full rounded-lg bg-gray-800 border border-gray-700 px-3 py-2 text-gray-100">
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-300 mb-1">IPK</label>
                        <input type="text" name="ipk" value="{{ old('ipk', $mahasiswa->ipk ?? '') }}"
                               class="w-full rounded-lg bg-gray-800 border border-gray-700 px-3 py-2 text-gray-100">
                    </div>
                @endif

                <div class="flex justify-end gap-3 pt-6">
                    <a href="{{ route('user.index') }}" class="px-5 py-2.5 rounded-lg bg-gray-700 hover:bg-gray-600 text-gray-200 font-medium">Batalkan</a>
                    <button type="submit" class="px-5 py-2.5 rounded-lg bg-indigo-600 hover:bg-indigo-700 text-white font-semibold">Simpan</button>
                </div>

            </div>
        </form>
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
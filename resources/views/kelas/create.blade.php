<!DOCTYPE html>
<html lang="en" class="h-full bg-gray-900">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Kelas</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="h-full text-gray-100">

<nav class="bg-gray-800/50">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
      <div class="flex h-16 items-center justify-between">


        <div class="flex items-center">
          <div class="shrink-0">
            <a href="{{route ('admin.dashboard') }}">
            <img src="{{ asset('images/logo.png') }}" alt="Logo" class="size-10 w-auto h-10"/>
            </a>
          </div>
          <div class="hidden md:block">
            <div class="ml-10 flex items-baseline space-x-4">
            <a href="{{ route ('admin.dashboard')}}" aria-current="page" class="rounded-md px-3 py-2 text-sm font-medium text-white">Dashboard</a>
            <a href="{{ route('matakuliah.index') }}" class="rounded-md px-3 py-2 text-sm font-medium text-gray-300 hover:bg-white/5 hover:text-white">List Mata Kuliah</a>
            <a href="{{ route('kelas.index') }}" class="rounded-md bg-gray-950/50 px-3 py-2 text-sm font-medium text-gray-300 hover:bg-white/5 hover:text-white">List Kelas</a>
            <a href="{{ route('user.index') }}" class="rounded-md px-3 py-2 text-sm font-medium text-gray-300 hover:bg-white/5 hover:text-white">List User</a>
            </div>
          </div>
        </div>

        <div class="flex items-center space-x-4">
          <div class="flex items-center space-x-2">
            <img src="{{ asset('images/profile.png') }}" alt="User" class="size-9 rounded-full outline -outline-offset-1 outline-white/10" />
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
            <h1 class="text-3xl font-bold text-white">Tambah Kelas</h1>
        </div>
    </header>

   <main class="max-w-3xl mx-auto px-4 py-10 sm:px-6 lg:px-8">
    <div class="bg-gray-800/70 p-8 rounded-2xl shadow-xl border border-gray-700">
        <form action="{{ route('kelas.store') }}" method="POST">
            @csrf
            <div class="space-y-6">
                <div>
                    <label class="block text-sm font-medium text-gray-300 mb-1">Mata Kuliah</label>
                    <select name="kode_mk" class="w-full rounded-lg bg-gray-800 border border-gray-700 px-3 py-2 text-gray-100">
                        <option value="" {{ old('kode_mk') ? '' : 'selected' }}>Pilih Mata Kuliah</option>
                        @foreach ($matakuliah as $mk)
                            <option value="{{ $mk->kode_mk }}" {{ old('kode_mk') == $mk->kode_mk ? 'selected' : '' }}>
                                {{ $mk->nama_mk }}
                            </option>
                        @endforeach
                    </select>

                    @error('kode_mk')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-300 mb-1">Kode Kelas</label>
                    <input type="text" name="kode_kelas" value="{{ old('kode_kelas') }}" class="w-full rounded-lg bg-gray-800 border border-gray-700 px-3 py-2 text-gray-100" maxlength="1">
                    @error('kode_kelas')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-300 mb-1">Dosen</label>
                    <select name="kode_dosen" class="w-full rounded-lg bg-gray-800 border border-gray-700 px-3 py-2 text-gray-100">
                        <option value="" {{ old('kode_dosen') ? '' : 'selected' }}>Pilih Dosen</option>
                        @foreach ($dosen as $d)
                            <option value="{{ $d->nip }}" {{ old('kode_dosen') == $d->nip ? 'selected' : '' }}>
                                {{ $d->nama }}
                            </option>
                        @endforeach
                    </select>

                    @error('kode_dosen')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-300 mb-1">Hari</label>
                    <select name="hari" class="w-full rounded-lg bg-gray-800 border border-gray-700 px-3 py-2 text-gray-100">
                        <option value="" {{ old('hari') ? '' : 'selected' }}>Pilih Hari</option>
                        @foreach(['Senin','Selasa','Rabu','Kamis','Jumat'] as $h)
                            <option value="{{ $h }}" {{ old('hari') == $h ? 'selected' : '' }}>
                                {{ $h }}
                            </option>
                        @endforeach
                    </select>

                    @error('hari')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-300 mb-1">Jam</label>
                    <div class="flex gap-2">
                        <input type="time" name="jam_mulai" value="{{ old('jam_mulai') }}" class="w-1/2 rounded-lg bg-gray-800 border border-gray-700 px-3 py-2 text-gray-100">
                        <input type="time" name="jam_selesai" value="{{ old('jam_selesai') }}" class="w-1/2 rounded-lg bg-gray-800 border border-gray-700 px-3 py-2 text-gray-100">
                    </div>

                    @error('jam_mulai')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror

                    @error('jam_selesai')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-300 mb-1">Ruang</label>
                    <input type="text" name="ruang_kelas" value="{{ old('ruang_kelas') }}" class="w-full rounded-lg bg-gray-800 border border-gray-700 px-3 py-2 text-gray-100" maxlength="5">
                    
                    @error('ruang_kelas')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-300 mb-1">Kapasitas</label>
                    <input type="number" name="kapasitas" value="{{ old('kapasitas') }}" class="w-full rounded-lg bg-gray-800 border border-gray-700 px-3 py-2 text-gray-100" min='0' max='200'>
                    
                    @error('kapasitas')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <div class="flex justify-end gap-3 pt-4">
                    <a href="{{ route('kelas.index') }}" class="px-5 py-2.5 rounded-lg bg-gray-700 hover:bg-gray-600 text-gray-200 font-medium transition duration-200">Batalkan</a>
                    <button type="submit" class="px-5 py-2.5 rounded-lg bg-indigo-600 hover:bg-indigo-700 text-white font-semibold transition duration-200">Simpan</button>
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

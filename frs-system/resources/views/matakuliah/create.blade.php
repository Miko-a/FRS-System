<!DOCTYPE html>
<html lang="en" class="h-full bg-gray-900">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Mata Kuliah</title>
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
            <a href="{{ route('matakuliah.index') }}" class="rounded-md bg-gray-950/50 px-3 py-2 text-sm font-medium text-gray-300 hover:bg-white/5 hover:text-white">List Mata Kuliah</a>
            <a href="{{ route('kelas.index') }}" class="rounded-md px-3 py-2 text-sm font-medium text-gray-300 hover:bg-white/5 hover:text-white">List Kelas</a>
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
            <h1 class="text-3xl font-bold text-white">Tambah Mata Kuliah</h1>
        </div>
    </header>

    <main class="max-w-3xl mx-auto px-4 py-10 sm:px-6 lg:px-8">
        <div class="bg-gray-800/60 p-8 rounded-2xl shadow-xl">
            <form action="{{ route('matakuliah.store') }}" method="POST" class="space-y-6">
                @csrf

                <div> 
                    <label for="kode_mk" class="block text-sm font-medium text-gray-300 mb-2">Kode MK</label> 
                    <input type="text" id="kode_mk" name="kode_mk" maxlength="5"  
                    class="w-full rounded-md bg-gray-900 border border-gray-700 text-gray-100 px-3 py-2 focus:border-indigo-500 focus:ring focus:ring-indigo-500/30" > 

                    @error('kode_mk')
                      <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <div>
                    <label for="nama_mk" class="block text-sm font-medium text-gray-300 mb-2">Nama MK</label>
                    <input type="text" id="nama_mk" name="nama_mk" maxlength="100"
                    class="w-full rounded-md bg-gray-900 border border-gray-700 text-gray-100 px-3 py-2 focus:border-indigo-500 focus:ring focus:ring-indigo-500/30">

                    @error('nama_mk')
                      <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <div>
                    <label for="sks" class="block text-sm font-medium text-gray-300 mb-2">SKS</label>
                    <input type="number" id="sks" name="sks" min="2" max="10"
                    class="w-full rounded-md bg-gray-900 border border-gray-700 text-gray-100 px-3 py-2 focus:border-indigo-500 focus:ring focus:ring-indigo-500/30">
                    
                    @error('sks')
                      <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror              
                  </div>

                <div>
                    <label for="semester" class="block text-sm font-medium text-gray-300 mb-2">Semester</label>
                    <input type="number" id="semester" name="semester" min="1" max="8"
                    class="w-full rounded-md bg-gray-900 border border-gray-700 text-gray-100 px-3 py-2 focus:border-indigo-500 focus:ring focus:ring-indigo-500/30">
                
                    @error('semester')
                      <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror         
                
                  </div>

                <div>
                    <label for="jenis_mk" class="block text-sm font-medium text-gray-300 mb-2">Jenis MK</label>
                    <select id="jenis_mk" name="jenis_mk"
                    class="w-full rounded-md bg-gray-900 border border-gray-700 text-gray-100 px-3 py-2 focus:border-indigo-500 focus:ring focus:ring-indigo-500/30">
                        <option value="wajib">Wajib</option>
                        <option value="pilihan">Pilihan</option>
                    </select>
                </div>

                <div class="flex justify-end">
                    <a href="{{ route('matakuliah.index') }}"
                        class="px-4 py-2 bg-gray-700 hover:bg-gray-600 text-white rounded-md mr-3">Batal</a>
                    <button type="submit"
                        class="px-4 py-2 bg-indigo-600 hover:bg-indigo-500 text-white rounded-md">Simpan</button>
                </div>
            </form>
        </div>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @if (session('success'))
  <script>
      Swal.fire({
          title: 'Berhasil!',
          text: "{{ session('success') }}",
          icon: 'success',
          confirmButtonColor: '#4F46E5',
      });
  </script>
  @endif
</body>
</html>

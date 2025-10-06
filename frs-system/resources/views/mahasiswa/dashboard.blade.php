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
            <img src="{{ asset('images/logo.png') }}" alt="Logo" class="size-10 w-auto h-10" />
          </div>
          <div class="hidden md:block">
            <div class="ml-10 flex items-baseline space-x-4">
              <a href="#" aria-current="page" class="rounded-md bg-gray-950/50 px-3 py-2 text-sm font-medium text-white">Dashboard</a>
              <a href="{{ route('matakuliah.index') }}" class="rounded-md px-3 py-2 text-sm font-medium text-gray-300 hover:bg-white/5 hover:text-white">Ambil Mata Kuliah</a>
               <a href="{{ route('matakuliah.index') }}" class="rounded-md px-3 py-2 text-sm font-medium text-gray-300 hover:bg-white/5 hover:text-white">List Mata Kuliah</a>
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

  <header class="relative bg-gray-800 after:pointer-events-none after:absolute after:inset-x-0 after:inset-y-0 after:border-y after:border-white/10">
    <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
      <h1 class="text-3xl font-bold tracking-tight text-white">Dashboard</h1>
    </div>
  </header>

  <main>
    <div class="mx-auto max-w-7xl px-4 py-10 sm:px-6 lg:px-8 text-white text-center">
      <h2 class="text-5xl font-semibold mb-6">Halo, {{ Auth::user()->Mahasiswa->nama }}!</h2>
      <p class="text-gray-300 mb-10 text-lg">Selamat datang di dashboard ITS FRS. Silakan pilih menu di bawah untuk mengelola mata kuliah dan aktivitas akademik Anda.</p>

      <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mt-10">
        
        <div class="bg-gray-800/50 rounded-2xl p-8 shadow-lg flex flex-col items-center hover:shadow-indigo-500/30 transition">
          <img src="https://cdn-icons-png.flaticon.com/512/3135/3135755.png" alt="Ambil Mata Kuliah" class="w-24 h-24 mb-4">
          <h3 class="text-xl font-semibold mb-2 text-indigo-400">Ambil Mata Kuliah</h3>
          <p class="text-gray-400 mb-6 text-sm text-center">Pilih dan ambil mata kuliah yang tersedia untuk semester ini.</p>
          <a href="{{ route('matakuliah.index') }}" 
             class="px-4 py-2 bg-indigo-600 hover:bg-indigo-500 text-white rounded-md transition">
             Ambil Sekarang
          </a>
        </div>


         <div class="bg-gray-800/50 rounded-2xl p-8 shadow-lg flex flex-col items-center hover:shadow-indigo-500/30 transition">
          <img src="https://cdn-icons-png.flaticon.com/512/2942/2942077.png" alt="Lihat Mata Kuliah" class="w-24 h-24 mb-4">
          <h3 class="text-xl font-semibold mb-2 text-indigo-400">Lihat Mata Kuliah</h3>
          <p class="text-gray-400 mb-6 text-sm text-center">Lihat daftar mata kuliah yang telah kamu ambil dan jadwalnya.</p>
          <a href="{{ route('matakuliah.index') }}" 
             class="px-4 py-2 bg-indigo-600 hover:bg-indigo-500 text-white rounded-md transition">
             Lihat Sekarang
          </a>
        </div>

        <div class="bg-gray-800/50 rounded-2xl p-8 shadow-lg flex flex-col items-center hover:shadow-green-500/30 transition">
          <img src="https://cdn-icons-png.flaticon.com/512/2942/2942077.png" alt="Lihat Mata Kuliah" class="w-24 h-24 mb-4">
          <h3 class="text-xl font-semibold mb-2 text-green-400">Lihat Mata Kuliah</h3>
          <p class="text-gray-400 mb-6 text-sm text-center">Lihat daftar mata kuliah yang telah kamu ambil dan jadwalnya.</p>
          <a href="{{ route('matakuliah.show', 1) }}" 
             class="px-4 py-2 bg-green-600 hover:bg-green-500 text-white rounded-md transition">
             Lihat Sekarang
          </a>
        </div>

        <div class="bg-gray-800/50 rounded-2xl p-8 shadow-lg flex flex-col items-center hover:shadow-green-500/30 transition">
          <img src="https://cdn-icons-png.flaticon.com/512/2942/2942077.png" alt="Lihat Mata Kuliah" class="w-24 h-24 mb-4">
          <h3 class="text-xl font-semibold mb-2 text-green-400">Lihat Mata Kuliah</h3>
          <p class="text-gray-400 mb-6 text-sm text-center">Lihat daftar mata kuliah yang telah kamu ambil dan jadwalnya.</p>
          <a href="{{ route('matakuliah.show', 1) }}" 
             class="px-4 py-2 bg-green-600 hover:bg-green-500 text-white rounded-md transition">
             Lihat Sekarang
          </a>
        </div>

      </div>
    </div>
  </main>
</div>

</body>
</html>

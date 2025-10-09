<!DOCTYPE html>
<html lang="en" class="h-full bg-gray-900">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ambil Mata Kuliah</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="h-full">
<div class="min-h-full">

  <nav class="bg-gray-800/50">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
      <div class="flex h-16 items-center justify-between">
        <div class="flex items-center">
          <div class="shrink-0">
            <a href="{{route ('mahasiswa.dashboard') }}">
            <img src="{{ asset('images/logo.png') }}" alt="Logo" class="size-10 w-auto h-10"/>
            </a>
          </div>
          <div class="hidden md:block">
                <div class="ml-10 flex items-baseline space-x-4">
                    <a href="{{ route('mahasiswa.dashboard') }}" class="rounded-md px-3 py-2 text-sm font-medium text-gray-300 hover:bg-white/5 hover:text-white">Dashboard</a>

                    <a href="{{ route('mahasiswa.ambil') }}" aria-current="page" class="rounded-md bg-gray-950/50 px-3 py-2 text-sm font-medium text-white">Ambil Mata Kuliah</a>

                    <a href="{{ route('mahasiswa.informasiKelas') }}" class="rounded-md px-3 py-2 text-sm font-medium text-gray-300 hover:bg-white/5 hover:text-white">List Kelas</a>

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

  <main class="py-10">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
      <h1 class="text-2xl font-semibold text-white mb-6">Ambil Mata Kuliah</h1>

      @if (session('success'))
        <div class="mb-4 rounded border border-green-500/50 bg-green-500/10 px-4 py-3 text-green-300">
          {{ session('success') }}
        </div>
      @endif

      @if ($errors->any())
        <div class="mb-4 rounded border border-red-500/50 bg-red-500/10 px-4 py-3 text-red-300">
          <ul class="list-disc list-inside">
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
      @endif>

      <div class="mb-6">
        <label class="block text-sm text-gray-300 mb-2">Cari mata kuliah atau kelas</label>
        <input id="search" type="text" placeholder="Contoh: IF101, Algoritma, KLS-A"
               class="w-full rounded-md border border-white/10 bg-gray-800 px-3 py-2 text-gray-100 placeholder-gray-400 focus:border-indigo-500 focus:outline-none focus:ring-1 focus:ring-indigo-500" />
      </div>

      @php
        // Pastikan $kelass dikirim dari controller: Kelas::with('matakuliah')->get()
        $grouped = isset($kelass) ? $kelass->groupBy(function($k){
          $mk = $k->matakuliah ?? null;
          return ($mk->kode ?? 'MK-') . ' - ' . ($mk->nama ?? 'Tanpa Nama');
        }) : collect();
      @endphp

      @if ($grouped->isEmpty())
        <div class="rounded-md border border-white/10 bg-gray-800 p-6 text-gray-300">
          Belum ada kelas yang tersedia.
        </div>
      @else
        <div class="space-y-6" id="kelas-container">
          @foreach ($grouped as $mkKey => $kelasList)
            @php
              $mkFirst = $kelasList->first()->matakuliah ?? null;
              $mkKode = $mkFirst->kode ?? '-';
              $mkNama = $mkFirst->nama ?? $mkFirst;
              $mkSks  = $mkFirst->sks ?? null;
              $prasy  = method_exists($mkFirst, 'prasyarat') ? ($mkFirst->prasyarat ?? collect()) : collect();
            @endphp

            <section class="rounded-lg border border-white/10 bg-gray-800/60">
              <header class="border-b border-white/10 p-4">
                <div class="flex items-center justify-between">
                  <div>
                    <h2 class="text-lg font-semibold text-white">{{ $mkNama }}</h2>
                    <p class="text-sm text-gray-400">Kode: {{ $mkKode }} @if($mkSks) • {{ $mkSks }} SKS @endif</p>
                  </div>
                  @if($prasy && $prasy->count())
                    <div class="text-right">
                      <p class="text-xs text-gray-400">Prasyarat:</p>
                      <div class="text-xs text-gray-300">
                        @foreach ($prasy as $p)
                          <span class="inline-block rounded bg-gray-700/70 px-2 py-0.5 mr-1 mb-1">
                            {{ $p->kode ?? '' }} {{ $p->nama ?? '' }}
                          </span>
                        @endforeach
                      </div>
                    </div>
                  @endif
                </div>
              </header>

              <div class="p-4 overflow-x-auto">
                <table class="min-w-full divide-y divide-white/10">
                  <thead>
                    <tr class="text-left text-xs uppercase tracking-wider text-gray-400">
                      <th class="px-3 py-2">Kode Kelas</th>
                      <th class="px-3 py-2">Jadwal</th>
                      <th class="px-3 py-2">Ruang</th>
                      <th class="px-3 py-2">Dosen</th>
                      <th class="px-3 py-2">Aksi</th>
                    </tr>
                  </thead>
                  <tbody class="divide-y divide-white/10">
                    @foreach ($kelasList as $kelas)
                      @php
                        // Field mungkin berbeda, gunakan fallback aman
                        $kodeKelas = $kelas->kode_kelas ?? $kelas->kode ?? 'Kelas';
                        $hari      = $kelas->hari ?? null;
                        $jam       = $kelas->jam ?? ($kelas->waktu ?? null);
                        $ruang     = $kelas->ruang ?? $kelas->ruangan ?? '-';
                        $dosen     = optional($kelas->dosen)->nama ?? '-';
                        $kelasId   = $kelas->id ?? $kelas->kelas_id ?? null;
                      @endphp
                      <tr class="text-sm text-gray-200 kelas-row">
                        <td class="px-3 py-2 font-medium" data-search="{{ $kodeKelas }} {{ $mkKode }} {{ $mkNama }}">
                          {{ $kodeKelas }}
                        </td>
                        <td class="px-3 py-2">
                          @if($hari || $jam)
                            {{ $hari ?? '' }} {{ $jam ?? '' }}
                          @else
                            -
                          @endif
                        </td>
                        <td class="px-3 py-2">{{ $ruang }}</td>
                        <td class="px-3 py-2">{{ $dosen }}</td>
                        <td class="px-3 py-2">
                          @if($kelasId)
                            <form action="{{ url('/mahasiswa/ambil') }}" method="POST" class="inline">
                              @csrf
                              <input type="hidden" name="kelas_id" value="{{ $kelasId }}">
                              <button type="submit"
                                class="rounded bg-indigo-600 px-3 py-1.5 text-sm font-medium text-white hover:bg-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-400">
                                Ambil
                              </button>
                            </form>
                          @else
                            <span class="text-gray-400">ID kelas tidak tersedia</span>
                          @endif
                        </td>
                      </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            </section>
          @endforeach
        </div>
      @endif
    </div>
  </main>
</div>

<script>
  const search = document.getElementById('search');
  search?.addEventListener('input', function () {
    const q = this.value.toLowerCase();
    document.querySelectorAll('#kelas-container .kelas-row').forEach(row => {
      const text = (row.querySelector('[data-search]')?.getAttribute('data-search') || row.textContent).toLowerCase();
      row.style.display = text.includes(q) ? '' : 'none';
    });
  });
</script>
</body>
</html>
</html>
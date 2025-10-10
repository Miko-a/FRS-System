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
            <a href="<?php echo e(route ('mahasiswa.dashboard')); ?>">
            <img src="<?php echo e(asset('images/logo.png')); ?>" alt="Logo" class="size-10 w-auto h-10"/>
            </a>
          </div>
          <div class="hidden md:block">
                <div class="ml-10 flex items-baseline space-x-4">
                    <a href="<?php echo e(route('mahasiswa.dashboard')); ?>" class="rounded-md px-3 py-2 text-sm font-medium text-gray-300 hover:bg-white/5 hover:text-white">Dashboard</a>

                    <a href="<?php echo e(route('mahasiswa.ambil')); ?>" aria-current="page" class="rounded-md bg-gray-950/50 px-3 py-2 text-sm font-medium text-white">Ambil Mata Kuliah</a>

                    <a href="<?php echo e(route('mahasiswa.informasiKelas')); ?>" class="rounded-md px-3 py-2 text-sm font-medium text-gray-300 hover:bg-white/5 hover:text-white">List Kelas</a>

                    <a href="<?php echo e(route('mahasiswa.kurikulum')); ?>" class="rounded-md px-3 py-2 text-sm font-medium text-gray-300 hover:bg-white/5 hover:text-white">Kurikulum</a>
                </div>
          </div>
        </div>

        <div class="flex items-center space-x-4">
          <div class="flex items-center space-x-2">
            <a href="<?php echo e(route('mahasiswa.profile')); ?>">
                    <img src="<?php echo e(asset('images/profile.png')); ?>" alt="User" class="size-9 rounded-full outline -outline-offset-1 outline-white/10" />
                    <span class="text-gray-300 text-sm"><?php echo e(Auth::user()->name); ?></span>
                </a>
          </div>

          <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST">
            <?php echo csrf_field(); ?>
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

      <?php if(session('success')): ?>
        <div class="mb-4 rounded border border-green-500/50 bg-green-500/10 px-4 py-3 text-green-300">
          <?php echo e(session('success')); ?>

        </div>
      <?php endif; ?>

        <?php if($errors->any()): ?>
          <div class="mb-4 rounded border border-red-500/50 bg-red-500/10 px-4 py-3 text-red-300">
            <ul class="list-disc list-inside">
              <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li><?php echo e($error); ?></li>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
          </div>
        <?php endif; ?>

      <div class="mb-6">
        <label class="block text-sm text-gray-300 mb-2">Cari mata kuliah atau kelas</label>
        <input id="search" type="text" placeholder="Contoh: IF101, Algoritma, KLS-A"
               class="w-full rounded-md border border-white/10 bg-gray-800 px-3 py-2 text-gray-100 placeholder-gray-400 focus:border-indigo-500 focus:outline-none focus:ring-1 focus:ring-indigo-500" />
      </div>

      <?php
        $grouped = isset($kelass) ? $kelass->groupBy(function($k){
          $mk = $k->matakuliah ?? null;
          $kode = $mk->kode ?? $mk->kode_mk ?? 'MK-';
          $nama = $mk->nama ?? $mk->nama_mk ?? 'Tanpa Nama';
          return $kode . ' - ' . $nama;
        }) : collect();
      ?>

      <?php if($grouped->isEmpty()): ?>
        <div class="rounded-md border border-white/10 bg-gray-800 p-6 text-gray-300">
          Belum ada kelas yang tersedia.
        </div>
      <?php else: ?>
        <div class="space-y-6" id="kelas-container">
          <?php $__currentLoopData = $grouped; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $mkKey => $kelasList): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php
              $mkFirst = $kelasList->first()->matakuliah ?? null;
              $mkKode = $mkFirst->kode ?? $mkFirst->kode_mk ?? '-';
              $mkNama = $mkFirst->nama ?? $mkFirst->nama_mk ?? 'Tanpa Nama';
              $mkSks  = $mkFirst->sks ?? null;
              $prasy  = method_exists($mkFirst, 'prasyarat') ? ($mkFirst->prasyarat ?? collect()) : collect();
            ?>

            <section class="rounded-lg border border-white/10 bg-gray-800/60">
              <header class="border-b border-white/10 p-4">
                <div class="flex items-center justify-between">
                  <div>
                    <h2 class="text-lg font-semibold text-white"><?php echo e($mkNama); ?></h2>
                    <p class="text-sm text-gray-400">Kode: <?php echo e($mkKode); ?> <?php if($mkSks): ?> • <?php echo e($mkSks); ?> SKS <?php endif; ?></p>
                  </div>
                  <?php if($prasy && $prasy->count()): ?>
                    <div class="text-right">
                      <p class="text-xs text-gray-400">Prasyarat:</p>
                      <div class="text-xs text-gray-300">
                        <?php $__currentLoopData = $prasy; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                          <span class="inline-block rounded bg-gray-700/70 px-2 py-0.5 mr-1 mb-1">
                            <?php echo e($p->kode ?? $p->kode_mk ?? ''); ?> <?php echo e($p->nama ?? $p->nama_mk ?? ''); ?>

                          </span>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                      </div>
                    </div>
                  <?php endif; ?>
                </div>
              </header>

              <div class="p-4 overflow-x-auto">
                <table class="min-w-full divide-y divide-white/10">
                  <thead>
                    <tr class="text-left text-xs uppercase tracking-wider text-gray-400">
                      <th class="px-3 py-2">Kode Kelas</th>
                      <th class="px-3 py-2">Jadwal</th>
                      <th class="px-3 py-2">Ruang</th>
                      <th class="px-3 py-2">Kapasitas</th>
                      <th class="px-3 py-2">Dosen</th>
                      <th class="px-3 py-2">Aksi</th>
                    </tr>
                  </thead>
                  <tbody class="divide-y divide-white/10">
                    <?php $__currentLoopData = $kelasList; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $kelas): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <?php
                        $kodeKelas = $kelas->kode_kelas ?? $kelas->kode ?? 'Kelas';
                        $hari      = $kelas->hari ?? null;
                        $jam       = $kelas->jam_mulai . ' - ' . $kelas->jam_selesai ?? null;
                        $kapasitas = $kelas->kapasitas ?? '-';
                        $ruang     = $kelas->ruang_kelas ?? '-';
                        $dosen     = optional($kelas->dosen)->nama ?? '-';
                        $kelasId   = $kelas->id ?? $kelas->kelas_id ?? null;
                      ?>
                      <tr class="text-sm text-gray-200 kelas-row">
                        <td class="px-3 py-2 font-medium" data-search="<?php echo e($kodeKelas); ?> <?php echo e($mkKode); ?> <?php echo e($mkNama); ?>">
                          <?php echo e($kodeKelas); ?>

                        </td>
                        <td class="px-3 py-2">
                          <?php if($hari || $jam): ?>
                            <?php echo e($hari ?? ''); ?> <?php echo e($jam ?? ''); ?>

                          <?php else: ?>
                            -
                          <?php endif; ?>
                        </td>
                        <td class="px-3 py-2"><?php echo e($ruang); ?></td>
                        <td class="px-3 py-2">
                          <!-- jumlah anggota terdaftar / kapasitas kelas -->
                          <?php echo e($kelas->pengambilan->count()); ?> / <?php echo e($kapasitas); ?>

                        </td>
                        <td class="px-3 py-2"><?php echo e($dosen); ?></td>
                        <td class="px-3 py-2">
                          <?php if($kelasId): ?>
                            <form action="<?php echo e(url('/mahasiswa/ambil')); ?>" method="POST" class="inline">
                              <?php echo csrf_field(); ?>
                              <input type="hidden" name="kelas_id" value="<?php echo e($kelasId); ?>">
                              <button type="submit"
                                class="rounded bg-indigo-600 px-3 py-1.5 text-sm font-medium text-white hover:bg-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-400">
                                Ambil
                              </button>
                            </form>
                          <?php else: ?>
                            <span class="text-gray-400">ID kelas tidak tersedia</span>
                          <?php endif; ?>
                        </td>
                      </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  </tbody>
                </table>
              </div>
            </section>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
      <?php endif; ?>
    </div>
  </main>
</div>

<!-- <script>
  const search = document.getElementById('search');
  search?.addEventListener('input', function () {
    const q = this.value.toLowerCase();
    document.querySelectorAll('#kelas-container .kelas-row').forEach(row => {
      const text = (row.querySelector('[data-search]')?.getAttribute('data-search') || row.textContent).toLowerCase();
      row.style.display = text.includes(q) ? '' : 'none';
    });
  }); -->
</script>
</body>
</html>
</html><?php /**PATH C:\Users\acer\FRS-System\frs-system\resources\views/mahasiswa/ambil.blade.php ENDPATH**/ ?>
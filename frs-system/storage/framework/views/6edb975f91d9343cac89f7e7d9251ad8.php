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
                <img src="<?php echo e(asset('images/logo.png')); ?>" alt="Logo" class="size-10 w-auto h-10" />
            </div>
            <div class="hidden md:block">
                <div class="ml-10 flex items-baseline space-x-4">
                    <a href="<?php echo e(route('dosen.dashboard')); ?>" class="rounded-md px-3 py-2 text-sm font-medium text-gray-300 hover:bg-white/5 hover:text-white">Dashboard</a>

                    <a href="#" aria-current="page" class="rounded-md bg-gray-950/50 px-3 py-2 text-sm font-medium text-white">Informasi Kelas</a>

                    <a href="<?php echo e(route('dosen.ajuanUbahJadwal')); ?>" class="rounded-md px-3 py-2 text-sm font-medium text-gray-300 hover:bg-white/5 hover:text-white">Perubahan Jadwal</a>

                    <a href="<?php echo e(route('dosen.kurikulum')); ?>" class="rounded-md px-3 py-2 text-sm font-medium text-gray-300 hover:bg-white/5 hover:text-white">Kurikulum</a>
                </div>
            </div>
            </div>

            <div class="flex items-center space-x-4">
            <div class="flex items-center space-x-2">
                <a href="<?php echo e(route('dosen.profile')); ?>">
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
                        <th class="px-6 py-3 text-left text-sm font-medium">Kapasitas</th>
                        <th class="px-6 py-3 text-left text-sm font-medium">Jumlah Mahasiswa</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-700">
                    <?php $__currentLoopData = $kelas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td class="px-6 py-4"><?php echo e($k->matakuliah->nama_mk ?? '-'); ?></td>
                        <td class="px-6 py-4"><?php echo e($k->kode_kelas); ?></td>
                        <td class="px-6 py-4"><?php echo e($k->hari); ?></td>
                        <td class="px-6 py-4"><?php echo e($k->jam_mulai); ?> - <?php echo e($k->jam_selesai); ?></td>
                        <td class="px-6 py-4"><?php echo e($k->ruang_kelas); ?></td>
                        <td class="px-6 py-4"><?php echo e($k->kapasitas); ?></td>
                        <td class="px-6 py-4"><?php echo e($k->mahasiswa->count()); ?></td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>

            <div class="mt-8 flex justify-center">
                <a href="<?php echo e(route('dosen.dashboard')); ?>" class="px-4 py-2 bg-indigo-600 hover:bg-indigo-500 rounded-md text-white transition">
                    Kembali ke Dashboard
                </a>
            </div>
            
        </div>
    </main>
</body>
</html><?php /**PATH C:\Users\acer\FRS-System\frs-system\resources\views/dosen/informasiKelas.blade.php ENDPATH**/ ?>
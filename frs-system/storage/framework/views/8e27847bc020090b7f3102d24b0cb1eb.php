<!DOCTYPE html>
<html lang="en" class="h-full bg-gray-900">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kurikulum Mata Kuliah</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="h-full">
    <div class="min-h-full">

    <nav class="bg-gray-800/50">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="flex h-16 items-center justify-between">


            <div class="flex items-center">
                <div class="shrink-0">
                    <a href="<?php echo e(route('mahasiswa.dashboard')); ?>">
                        <img src="<?php echo e(asset('images/logo.png')); ?>" alt="Logo" class="w-auto h-10"/>
                    </a>
                </div>
            <div class="hidden md:block">
                <div class="ml-10 flex items-baseline space-x-4">
              <a href="<?php echo e(route('mahasiswa.dashboard')); ?>" aria-current="page" class="rounded-md  px-3 py-2 text-sm font-medium text-white">Dashboard</a>

              <a href="#" class="rounded-md px-3 py-2 text-sm font-medium text-gray-300 hover:bg-white/5 hover:text-white">Ambil Mata Kuliah</a>

              <a href="<?php echo e(route('mahasiswa.informasiKelas')); ?>" class="rounded-md px-3 py-2 text-sm font-medium text-gray-300 hover:bg-white/5 hover:text-white">List Kelas</a>

              <a href="<?php echo e(route('mahasiswa.kurikulum')); ?>" class="rounded-md bg-gray-950/50 px-3 py-2 text-sm font-medium text-gray-300 hover:bg-white/5 hover:text-white">Kurikulum</a>
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

    <header class="relative bg-gray-800 after:pointer-events-none after:absolute after:inset-x-0 after:inset-y-0 after:border-y after:border-white/10">
        <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
        <h1 class="text-3xl font-bold tracking-tight text-white">Kurikulum Mata Kuliah</h1>
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
                    <?php $__currentLoopData = $matakuliahs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $mk): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td class="px-4 py-2 text-gray-100"><?php echo e($mk->kode_mk); ?></td>
                            <td class="px-4 py-2 text-gray-100"><?php echo e($mk->nama_mk); ?></td>
                            <td class="px-4 py-2 text-gray-100">
                                <?php if($mk->prasyarat->count()): ?>
                                    <ul class="list-disc list-inside">
                                        <?php $__currentLoopData = $mk->prasyarat; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pr): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <li><?php echo e($pr->nama_mk); ?></li>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </ul>
                                <?php else: ?>
                                    <span class="italic text-gray-400">Tidak ada</span>
                                <?php endif; ?>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        </div>
    </div>
</main>
    </main>
</body>
</html><?php /**PATH C:\Users\iss5i\Documents\FRS-System\frs-system\resources\views/mahasiswa/kurikulum.blade.php ENDPATH**/ ?>
<!DOCTYPE html>
<html lang="en" class="h-full bg-gray-900">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Mata Kuliah</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="h-full text-gray-100">

<nav class="bg-gray-800/50">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="flex h-16 items-center justify-between">
            <div class="flex items-center">
                <div class="shrink-0">
                    <a href="<?php echo e(route('admin.dashboard')); ?>">
                        <img src="<?php echo e(asset('images/logo.png')); ?>" alt="Logo" class="w-auto h-10"/>
                    </a>
                </div>
                <div class="hidden md:block ml-10 flex items-baseline space-x-4">
                     <a href="<?php echo e(route ('admin.dashboard')); ?>" aria-current="page" class="rounded-md px-3 py-2 text-sm font-medium text-white">Dashboard</a>
                        <a href="<?php echo e(route('matakuliah.index')); ?>" class="rounded-md px-3 py-2 text-sm font-medium text-gray-300 hover:bg-white/5 hover:text-white">List Mata Kuliah</a>
                        <a href="<?php echo e(route('kelas.index')); ?>" class="rounded-md px-3 py-2 text-sm font-medium text-gray-300 hover:bg-white/5 hover:text-white">List Kelas</a>
                        <a href="<?php echo e(route('user.index')); ?>" class="rounded-md bg-gray-950/50 px-3 py-2 text-sm font-medium text-gray-300 hover:bg-white/5 hover:text-white">List User</a>

                </div>
            </div>

            <div class="flex items-center space-x-4">
                <div class="flex items-center space-x-2">
                    <img src="<?php echo e(asset('images/profile.png')); ?>" alt="User" class="size-10 rounded-full outline -outline-offset-1 outline-white/10"/>
                    <span class="text-gray-300 text-sm"><?php echo e(Auth::user()->name); ?></span>
                </div>
                <form action="<?php echo e(route('logout')); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <button type="submit" class="rounded-md px-3 py-2 text-sm font-medium text-gray-300 hover:bg-white/5 hover:text-white transition">
                        Logout
                    </button>
                </form>
            </div>
        </div>
    </div>
</nav>

<header class="bg-gray-800 border-b border-gray-700">
    <div class="max-w-7xl mx-auto px-4 py-6 sm:px-6 lg:px-8">
        <h1 class="text-3xl font-bold text-white">Detail Mata Kuliah</h1>
    </div>
</header>
    
<main class="max-w-3xl mx-auto px-4 py-10 sm:px-6 lg:px-8">
    <div class="bg-gray-800/60 p-8 rounded-2xl shadow-xl space-y-6">

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
                <p class="text-gray-400">Kode MK</p>
                <p class="text-white font-medium"><?php echo e($matkul->kode_mk); ?></p>
            </div>
            <div>
                <p class="text-gray-400">Nama MK</p>
                <p class="text-white font-medium"><?php echo e($matkul->nama_mk); ?></p>
            </div>
            <div>
                <p class="text-gray-400">SKS</p>
                <p class="text-white font-medium"><?php echo e($matkul->sks); ?></p>
            </div>
            <div>
                <p class="text-gray-400">Semester</p>
                <p class="text-white font-medium"><?php echo e($matkul->semester); ?></p>
            </div>
            <div>
                <p class="text-gray-400">Dpsen Pengampu</p>
                <p class="text-white font-medium"><?php echo e($matkul->dosen->pluck('nama')->implode(', ')); ?></p>
            </div>
            <div class="md:col-span-2">
                <p class="text-gray-400">Jenis MK</p>
                <p class="text-white font-medium"><?php echo e(ucfirst($matkul->jenis_mk)); ?></p>
            </div>
        </div>

        <div class="flex justify-end">
            <a href="<?php echo e(route('matakuliah.index')); ?>" class="px-4 py-2 bg-gray-700 hover:bg-gray-600 text-white rounded-md">Kembali</a>
        </div>
        
    </div>
</main>
</body>
</html>
<?php /**PATH C:\Users\iss5i\Documents\FRS-System\frs-system\resources\views/matakuliah/show.blade.php ENDPATH**/ ?>
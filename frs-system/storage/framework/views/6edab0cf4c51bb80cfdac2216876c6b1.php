<!DOCTYPE html>
<html lang="en" class="h-full bg-gray-900">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil Dosen</title>
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
                    <a href="<?php echo e(route('dosen.dashboard')); ?>"  class="rounded-md px-3 py-2 text-sm font-medium text-gray-300 hover:bg-white/5 hover:text-white">Dashboard</a>

                    <a href="<?php echo e(route('matakuliah.index')); ?>" class="rounded-md px-3 py-2 text-sm font-medium text-gray-300 hover:bg-white/5 hover:text-white">Informasi Kelas</a>

                    <a href="<?php echo e(route('dosen.ajuanUbahJadwal')); ?>" class="rounded-md px-3 py-2 text-sm font-medium text-gray-300 hover:bg-white/5 hover:text-white">Perubahan Jadwal</a>

                    <a href="<?php echo e(route('matakuliah.index')); ?>" class="rounded-md px-3 py-2 text-sm font-medium text-gray-300 hover:bg-white/5 hover:text-white">Kurikulum</a>
                </div>
            </div>
            </div>

            <div class="flex items-center space-x-4">
            <div class="flex items-center space-x-2">
                <a href="#" aria-current="page">
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
        <h1 class="text-3xl font-bold tracking-tight text-white">Profil Anda</h1>
        </div>
    </header>

    <div class="min-h-full flex flex-col items-center justify-center py-10">
        <div class="bg-gray-800/70 rounded-2xl shadow-lg p-10 w-full max-w-md text-white">
            <div class="flex flex-col items-center mb-6">
                <img src="<?php echo e(asset('images/profile.png')); ?>" alt="Foto Dosen" class="w-24 h-24 rounded-full mb-4 border-4 border-indigo-500 shadow">
                <h2 class="text-2xl font-bold"><?php echo e(Auth::user()->Dosen->nama); ?></h2>
                <p class="text-indigo-300"><?php echo e(Auth::user()->email); ?></p>
            </div>
            <div class="space-y-4">
                <div>
                    <span class="font-semibold text-gray-300">NIP:</span>
                    <span><?php echo e(Auth::user()->Dosen->nip); ?></span>
                </div>
                <div>
                    <span class="font-semibold text-gray-300">Program Studi:</span>
                    <span><?php echo e(Auth::user()->Dosen->program_studi); ?></span>
                </div>
                <!-- Tambahkan data lain sesuai kebutuhan -->
            </div>
            <div class="mt-8 flex justify-center">
                <a href="<?php echo e(route('dosen.dashboard')); ?>" class="px-4 py-2 bg-indigo-600 hover:bg-indigo-500 rounded-md text-white transition">Kembali ke Dashboard</a>
            </div>
        </div>
    </div>
</body>
</html><?php /**PATH C:\Users\acer\FRS-System\frs-system\resources\views/dosen/profile.blade.php ENDPATH**/ ?>
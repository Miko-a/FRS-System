<!DOCTYPE html>
<html lang="en" class="h-full bg-gray-900">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Kelas</title>
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
                <div class="hidden md:block">
                    <div class="ml-10 flex items-baseline space-x-4">
                        <a href="<?php echo e(route('admin.dashboard')); ?>" class="rounded-md px-3 py-2 text-sm font-medium text-gray-300 hover:bg-white/5 hover:text-white">Dashboard</a>
                        <a href="<?php echo e(route('matakuliah.index')); ?>" class="rounded-md px-3 py-2 text-sm font-medium text-white">List Mata Kuliah</a>
                        <a href="<?php echo e(route('kelas.index')); ?>" class="rounded-md bg-gray-950/50 px-3 py-2 text-sm font-medium text-gray-300 hover:bg-white/5 hover:text-white">List Kelas</a>
                        <a href="<?php echo e(route('kelas.index')); ?>" class="rounded-md px-3 py-2 text-sm font-medium text-gray-300 hover:bg-white/5 hover:text-white">List User</a>
                    </div>
                </div>
            </div>

            <div class="flex items-center space-x-4">
                <div class="flex items-center space-x-2">
                    <img src="<?php echo e(asset('images/profile.png')); ?>" alt="User" class="size-10 rounded-full outline -outline-offset-1 outline-white/10"/>
                    <span class="text-gray-300 text-sm"><?php echo e(Auth::user()->name); ?></span>
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

<header class="bg-gray-800 border-b border-gray-700">
    <div class="max-w-7xl mx-auto px-4 py-6 sm:px-6 lg:px-8">
        <h1 class="text-3xl font-bold text-white">Edit Kelas</h1>
    </div>
</header>


<main class="max-w-3xl mx-auto px-4 py-10 sm:px-6 lg:px-8">
    <div class="bg-gray-800/70 p-8 rounded-2xl shadow-xl border border-gray-700">
        <form action="<?php echo e(route('kelas.update', $kelas->kelas_id)); ?>" method="POST">
            <?php echo csrf_field(); ?>
            <?php echo method_field('PUT'); ?>

            <div class="space-y-6">

                <div>
                    <label class="block text-sm font-medium text-gray-300 mb-1">Nama Mata Kuliah</label>
                    <input type="text" value="<?php echo e($kelas->matakuliah->nama_mk); ?>" readonly
                           class="w-full rounded-lg bg-gray-700 border border-gray-600 px-3 py-2 text-gray-100">
                </div>

                <input type="hidden" name="kode_mk" value="<?php echo e($kelas->kode_mk); ?>">

                <div>
                    <label class="block text-sm font-medium text-gray-300 mb-1">Kode Kelas</label>
                    <input type="text" value="<?php echo e($kelas->kode_kelas); ?>" readonly
                           class="w-full rounded-lg bg-gray-700 border border-gray-600 px-3 py-2 text-gray-100">
                </div>

                <div class="mt-4 p-4 bg-gray-700/50 rounded-lg space-y-4">

                    <div>
                        <label class="block text-sm font-medium text-gray-300 mb-1">Dosen</label>
                        <select name="kode_dosen" class="w-full rounded-lg bg-gray-800 border border-gray-700 px-3 py-2 text-gray-100">
                            <?php $__currentLoopData = $dosen; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $d): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($d->nip); ?>" <?php echo e($kelas->kode_dosen == $d->nip ? 'selected' : ''); ?>>
                                    <?php echo e($d->nama); ?>

                                </option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-300 mb-1">Hari</label>
                        <select name="hari" class="w-full rounded-lg bg-gray-800 border border-gray-700 px-3 py-2 text-gray-100">
                            <?php $__currentLoopData = ['Senin','Selasa','Rabu','Kamis','Jumat']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $h): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($h); ?>" <?php echo e($kelas->hari == $h ? 'selected' : ''); ?>><?php echo e($h); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-300 mb-1">Jam</label>
                        <div class="flex gap-2">
                            <input type="time" name="jam_mulai" class="w-1/2 rounded-lg bg-gray-800 border border-gray-700 px-3 py-2 text-gray-100" value="<?php echo e($kelas->jam_mulai); ?>">
                            <input type="time" name="jam_selesai" class="w-1/2 rounded-lg bg-gray-800 border border-gray-700 px-3 py-2 text-gray-100" value="<?php echo e($kelas->jam_selesai); ?>">
                        </div>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-300 mb-1">Ruang</label>
                        <input type="text" name="ruang_kelas" maxlength="5" class="w-full rounded-lg bg-gray-800 border border-gray-700 px-3 py-2 text-gray-100" value="<?php echo e($kelas->ruang_kelas); ?>">
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-300 mb-1">Kapasitas</label>
                        <input type="number" name="kapasitas" min='0' max='200' class="w-full rounded-lg bg-gray-800 border border-gray-700 px-3 py-2 text-gray-100" value="<?php echo e($kelas->kapasitas); ?>">
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-300 mb-1">Jumlah Mahasiswa</label>
                        <input type="number" readonly class="w-full rounded-lg bg-gray-600 border border-gray-700 px-3 py-2 text-gray-100" value="<?php echo e($kelas->mahasiswa->count()); ?>">
                    </div>

                </div>

                <div class="flex justify-end gap-3 pt-4">
                    <a href="<?php echo e(route('kelas.index')); ?>" class="px-5 py-2.5 rounded-lg bg-gray-700 hover:bg-gray-600 text-gray-200 font-medium transition duration-200">Batalkan</a>
                    <button type="submit" class="px-5 py-2.5 rounded-lg bg-indigo-600 hover:bg-indigo-700 text-white font-semibold transition duration-200">Simpan</button>
                </div>

            </div>
        </form>
    </div>
</main>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <?php if(session('success')): ?>
    <script>
    Swal.fire({
        title: "Berhasil!",
        text: "<?php echo e(session('success')); ?>",
        icon: "success",
        confirmButtonColor: "#4F46E5",
    });
    </script>
    <?php endif; ?>
</body>
</html>
<?php /**PATH C:\Users\iss5i\Documents\FRS-System\frs-system\resources\views/kelas/edit.blade.php ENDPATH**/ ?>
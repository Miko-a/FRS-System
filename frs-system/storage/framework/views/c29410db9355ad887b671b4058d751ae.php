<!DOCTYPE html>
<html lang="en" class="h-full bg-gray-900">
<head>
    <meta charset="UTF-8">
    <title>Edit User</title>
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
                        <a href="<?php echo e(route ('admin.dashboard')); ?>" class="rounded-md px-3 py-2 text-sm font-medium text-white">Dashboard</a>
                        <a href="<?php echo e(route('matakuliah.index')); ?>" class="rounded-md px-3 py-2 text-sm font-medium text-gray-300 hover:bg-white/5 hover:text-white">List Mata Kuliah</a>
                        <a href="<?php echo e(route('kelas.index')); ?>" class="rounded-md px-3 py-2 text-sm font-medium text-gray-300 hover:bg-white/5 hover:text-white">List Kelas</a>
                        <a href="<?php echo e(route('user.index')); ?>" class="rounded-md bg-gray-950/50 px-3 py-2 text-sm font-medium text-gray-300 hover:bg-white/5 hover:text-white">List User</a>
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
        <h1 class="text-3xl font-bold text-white">Edit User</h1>
    </div>
</header>

<main class="max-w-3xl mx-auto px-4 py-10 sm:px-6 lg:px-8">
    <div class="bg-gray-800/70 p-8 rounded-2xl shadow-xl border border-gray-700">
        <form action="<?php echo e(route('user.update', $user->login_id)); ?>" method="POST">
            <?php echo csrf_field(); ?>
            <?php echo method_field('PUT'); ?>

            <div class="space-y-6">

                <div>
                    <label class="block text-sm font-medium text-gray-300 mb-1">Email</label>
                    <input type="email" name="email" value="<?php echo e(old('email', $user->email)); ?>" 
                           class="w-full rounded-lg bg-gray-800 border border-gray-700 px-3 py-2 text-gray-100">
                    <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> 
                    <span class="text-red-500 text-sm"><?php echo e($message); ?></span> 
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-300 mb-1">Password (kosongkan jika tidak diubah)</label>
                    <input type="password" name="password" class="w-full rounded-lg bg-gray-800 border border-gray-700 px-3 py-2 text-gray-100">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-300 mb-1">Konfirmasi Password</label>
                    <input type="password" name="password_confirmation" class="w-full rounded-lg bg-gray-800 border border-gray-700 px-3 py-2 text-gray-100">
                    <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <span class="text-red-500 text-sm"><?php echo e($message); ?></span> 
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>
                <?php if($user->role === 'dosen'): ?>
                    <hr class="border-gray-700">
                    <h2 class="text-lg font-semibold text-indigo-400">Data Dosen</h2>

                    <div>
                        <label class="block text-sm font-medium text-gray-300 mb-1">NIP</label>
                        <input type="text" name="nip" value="<?php echo e(old('nip', $dosen->nip ?? '')); ?>"
                               class="w-full rounded-lg bg-gray-800 border border-gray-700 px-3 py-2 text-gray-100">
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-300 mb-1">Nama Lengkap</label>
                        <input type="text" name="nama" value="<?php echo e(old('nama', $dosen->nama ?? '')); ?>"
                               class="w-full rounded-lg bg-gray-800 border border-gray-700 px-3 py-2 text-gray-100">
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-300 mb-1">Program Studi</label>
                        <select name="program_studi" class="w-full bg-gray-700 border border-gray-600 rounded-lg px-3 py-2 text-gray-100">
                            <option value="">-- Pilih Program Studi --</option>
                            <option value="Teknik Informatika" <?php echo e(old('program_studi', $dosen->program_studi ?? '') == 'Teknik Informatika' ? 'selected' : ''); ?>>Teknik Informatika</option>
                            <option value="RKA" <?php echo e(old('program_studi', $dosen->program_studi ?? '') == 'RKA' ? 'selected' : ''); ?>>RKA</option>
                            <option value="RPL" <?php echo e(old('program_studi', $dosen->program_studi ?? '') == 'RPL' ? 'selected' : ''); ?>>RPL</option>
                        </select>
                    </div>

                <?php elseif($user->role === 'mahasiswa'): ?>
                    <hr class="border-gray-700">
                    <h2 class="text-lg font-semibold text-indigo-400">Data Mahasiswa</h2>

                    <div>
                        <label class="block text-sm font-medium text-gray-300 mb-1">NRP</label>
                        <input type="text" name="nrp" value="<?php echo e(old('nrp', $mahasiswa->nrp ?? '')); ?>"
                               class="w-full rounded-lg bg-gray-800 border border-gray-700 px-3 py-2 text-gray-100">
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-300 mb-1">Nama Lengkap</label>
                        <input type="text" name="nama" value="<?php echo e(old('nama', $mahasiswa->nama ?? '')); ?>"
                               class="w-full rounded-lg bg-gray-800 border border-gray-700 px-3 py-2 text-gray-100">
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-300 mb-1">Angkatan</label>
                        <input type="number" name="angkatan" value="<?php echo e(old('angkatan', $mahasiswa->angkatan ?? '')); ?>"
                               class="w-full rounded-lg bg-gray-800 border border-gray-700 px-3 py-2 text-gray-100">
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-300 mb-1">Program Studi</label>
                        <select name="program_studi" class="w-full bg-gray-700 border border-gray-600 rounded-lg px-3 py-2 text-gray-100">
                            <option value="">-- Pilih Program Studi --</option>
                            <option value="Teknik Informatika" <?php echo e(old('program_studi', $mahasiswa->program_studi ?? '') == 'Teknik Informatika' ? 'selected' : ''); ?>>Teknik Informatika</option>
                            <option value="RKA" <?php echo e(old('program_studi', $mahasiswa->program_studi ?? '') == 'RKA' ? 'selected' : ''); ?>>RKA</option>
                            <option value="RPL" <?php echo e(old('program_studi', $mahasiswa->program_studi ?? '') == 'RPL' ? 'selected' : ''); ?>>RPL</option>
                        </select>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-300 mb-1">Semester</label>
                        <input type="number" name="semester" value="<?php echo e(old('semester', $mahasiswa->semester ?? '')); ?>"
                               class="w-full rounded-lg bg-gray-800 border border-gray-700 px-3 py-2 text-gray-100">
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-300 mb-1">IPK</label>
                        <input type="text" name="ipk" value="<?php echo e(old('ipk', $mahasiswa->ipk ?? '')); ?>"
                               class="w-full rounded-lg bg-gray-800 border border-gray-700 px-3 py-2 text-gray-100">
                    </div>
                <?php endif; ?>

                <div class="flex justify-end gap-3 pt-6">
                    <a href="<?php echo e(route('user.index')); ?>" class="px-5 py-2.5 rounded-lg bg-gray-700 hover:bg-gray-600 text-gray-200 font-medium">Batalkan</a>
                    <button type="submit" class="px-5 py-2.5 rounded-lg bg-indigo-600 hover:bg-indigo-700 text-white font-semibold">Simpan</button>
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
</html><?php /**PATH C:\Users\iss5i\Documents\FRS-System\frs-system\resources\views/user/edit.blade.php ENDPATH**/ ?>
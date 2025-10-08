<!DOCTYPE html>
<html lang="en" class="h-full bg-gray-900">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Mata Kuliah</title>
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
                        <a href="<?php echo e(route('matakuliah.index')); ?>" class="rounded-md bg-gray-950/50 px-3 py-2 text-sm font-medium text-white">List Mata Kuliah</a>
                        <a href="<?php echo e(route('kelas.index')); ?>" class="rounded-md px-3 py-2 text-sm font-medium text-gray-300 hover:bg-white/5 hover:text-white">List Kelas</a>
                        <a href="<?php echo e(route('matakuliah.index')); ?>" class="rounded-md px-3 py-2 text-sm font-medium text-gray-300 hover:bg-white/5 hover:text-white">List User</a>
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
        <h1 class="text-3xl font-bold text-white">Edit Mata Kuliah</h1>
    </div>
</header>

<main class="max-w-3xl mx-auto px-4 py-10 sm:px-6 lg:px-8">
    <div class="bg-gray-800/70 p-8 rounded-2xl shadow-xl border border-gray-700">
        <form action="<?php echo e(route('matakuliah.update', $matkul->kode_mk)); ?>" method="POST">
            <?php echo csrf_field(); ?>
            <?php echo method_field('PUT'); ?>

            <div class="space-y-6">
                
                <div>
                    <label for="kode_mk" class="block text-sm font-medium text-gray-300 mb-1">Kode MK</label>
                    <select id="kode_mk" name="kode_mk"
                        class="w-full rounded-lg bg-gray-800 border border-gray-700 focus:border-indigo-500 focus:ring-indigo-500 px-3 py-2 text-gray-100">
                        <option value="" disabled <?php echo e(!$matkul->kode_mk ? 'selected' : ''); ?>>Pilih Kode MK</option>
                        <?php $__currentLoopData = $daftarmatkul; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $mk): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($mk->kode_mk); ?>" <?php echo e($matkul->kode_mk == $mk->kode_mk ? 'selected' : ''); ?>>
                                <?php echo e($mk->kode_mk); ?>

                            </option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>

                <div>
                    <label for="nama_mk" class="block text-sm font-medium text-gray-300 mb-1">Nama MK</label>
                    <input type="text" id="nama_mk" name="nama_mk" required maxlength='100'
                        value="<?php echo e($matkul->nama_mk); ?>"
                        class="w-full rounded-lg bg-gray-800 border border-gray-700 px-3 py-2 text-gray-100">
                </div>

                <div>
                    <label for="sks" class="block text-sm font-medium text-gray-300 mb-1">SKS</label>
                    <input type="number" id="sks" name="sks" required min='2' max='10'
                        value="<?php echo e($matkul->sks); ?>"
                        class="w-full rounded-lg bg-gray-800 border border-gray-700 px-3 py-2 text-gray-100">
                </div>

                <div>
                    <label for="semester" class="block text-sm font-medium text-gray-300 mb-1">Semester</label>
                    <input type="number" id="semester" name="semester" required min='1' max='8'
                        value="<?php echo e($matkul->semester); ?>"
                        class="w-full rounded-lg bg-gray-800 border border-gray-700 px-3 py-2 text-gray-100">
                </div>

                <div>
                    <label for="jenis_mk" class="block text-sm font-medium text-gray-300 mb-1">Jenis MK</label>
                    <select id="jenis_mk" name="jenis_mk"
                        class="w-full rounded-lg bg-gray-800 border border-gray-700 focus:border-indigo-500 focus:ring-indigo-500 px-3 py-2 text-gray-100">
                        <option value="wajib" <?php echo e($matkul->jenis_mk == 'wajib' ? 'selected' : ''); ?>>Wajib</option>
                        <option value="pilihan" <?php echo e($matkul->jenis_mk == 'pilihan' ? 'selected' : ''); ?>>Pilihan</option>
                    </select>
                </div>

                <div class="flex justify-end gap-3 pt-4">
                    <a href="<?php echo e(route('matakuliah.index')); ?>"
                        class="px-5 py-2.5 rounded-lg bg-gray-700 hover:bg-gray-600 text-gray-200 font-medium transition duration-200">
                        Batalkan
                    </a>
                    <button type="submit"
                        class="px-5 py-2.5 rounded-lg bg-indigo-600 hover:bg-indigo-700 text-white font-semibold transition duration-200">
                        Simpan
                    </button>
                </div>
            </div>
        </form>
    </div>
</main>
<script>
document.getElementById('kode_mk').addEventListener('change', function() {
    const kode = this.value;
    if (!kode) return;

    fetch(`/matakuliah/get/${kode}`)
        .then(res => res.json())
        .then(data => {
            if (data) {
                document.getElementById('nama_mk').value = data.nama_mk || '';
                document.getElementById('sks').value = data.sks || '';
                document.getElementById('semester').value = data.semester || '';
                document.getElementById('jenis_mk').value = data.jenis_mk || '';
            }
        })
        .catch(err => console.error('Error:', err));
});
</script>

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
<?php /**PATH C:\Users\iss5i\Documents\FRS-System\frs-system\resources\views/matakuliah/edit.blade.php ENDPATH**/ ?>
<!DOCTYPE html>
<html lang="en" class="h-full bg-gray-900">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List User</title>
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
        <h1 class="text-3xl font-bold text-white">List User</h1>
    </div>
</header>

<main class="max-w-7xl mx-auto px-4 py-10 sm:px-6 lg:px-8">
    <div class="flex justify-end mb-6">
        <a href="<?php echo e(route('user.createAkun')); ?>" 
           class="px-4 py-2 bg-indigo-600 hover:bg-indigo-500 text-white rounded-md">Tambah User</a>
    </div>

    <div class="overflow-x-auto bg-gray-800/60 p-6 rounded-2xl shadow-xl">
        <table class="min-w-full divide-y divide-gray-700 text-gray-100">
            <thead>
                <tr class="bg-gray-900">
                    <th class="px-6 py-3 text-left text-sm font-medium">Nama Lengkap</th>
                    <th class="px-6 py-3 text-left text-sm font-medium">Email</th>
                    <th class="px-6 py-3 text-left text-sm font-medium">Role</th>
                    <th class="px-6 py-3 text-left text-sm font-medium">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-700">
                <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td class="px-6 py-4"><?php echo e($user->nama); ?></td>
                    <td class="px-6 py-4"><?php echo e($user->email); ?></td>
                    <td class="px-6 py-4"><?php echo e($user->role); ?></td>
                    <td class="px-6 py-4 flex gap-2">

                        <a href="<?php echo e(route('user.show', $user->login_id)); ?>" 
                           class="px-3 py-1 bg-blue-600 hover:bg-blue-500 text-white rounded-md text-sm">Detail</a>

                        <a href="<?php echo e(route('user.edit', $user->login_id)); ?>" 
                           class="px-3 py-1 bg-yellow-600 hover:bg-yellow-500 text-white rounded-md text-sm">Edit</a>
                           
                        <form action="<?php echo e(route('user.destroy', $user->login_id)); ?>" method="POST" class="inline delete-user-form">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('DELETE'); ?>
                            <button type="submit" class="px-3 py-1 bg-red-600 hover:bg-red-500 text-white rounded-md text-sm" 
                                    onclick="return confirm('Yakin ingin menghapus?')">Hapus</button>
                        </form>
                    </td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
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
</html><?php /**PATH C:\Users\acer\FRS-System\frs-system\resources\views/user/index.blade.php ENDPATH**/ ?>
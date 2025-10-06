<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $__env->yieldContent('title', 'Laravel App'); ?></title>
    <link rel="stylesheet" href="<?php echo e(asset('css/app.css')); ?>">
</head>
<body>
    <div class="container">
        <?php echo $__env->yieldContent('content'); ?>
    </div>
    <script src="<?php echo e(asset('js/app.js')); ?>"></script>
</body>
</html>

<?php $__env->startSection('title', 'Daftar Mata Kuliah'); ?>

<?php $__env->startSection('content'); ?>
<div class="container">
    <h1>Daftar Mata Kuliah</h1>
    <a href="<?php echo e(route('matakuliah.create')); ?>" class="btn btn-primary mb-3">Tambah Mata Kuliah</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nama Mata Kuliah</th>
                <th>SKS</th>
                <th>Semester</th>
                <th>Jenis</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $matakuliah; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $matkul): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td><?php echo e($matkul->nama_mk); ?></td>
                <td><?php echo e($matkul->sks); ?></td>
                <td><?php echo e($matkul->semester); ?></td>
                <td><?php echo e(ucfirst($matkul->jenis_mk)); ?></td>
                <td>
                    
                    <a href="<?php echo e(route('matakuliah.show', $matkul)); ?>" class="btn btn-info btn-sm">Detail</a>
                    <a href="<?php echo e(route('matakuliah.edit', $matkul)); ?>" class="btn btn-warning btn-sm">Edit</a>
                    <form action="<?php echo e(route('matakuliah.destroy', $matkul)); ?>" method="POST" style="display:inline;">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('DELETE'); ?>
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus?')">Hapus</button>
                    </form>
                </td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
</div>
<?php $__env->stopSection(); ?>
<?php /**PATH C:\Users\iss5i\Documents\FRS-System\frs-system\resources\views/matakuliah/index.blade.php ENDPATH**/ ?>
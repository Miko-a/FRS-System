<<<<<<< HEAD


<?php $__env->startSection('content'); ?>
<div class="container">
    <h1>Detail Mata Kuliah</h1>
    <table class="table">
        <tr>
            <th>Kode MK</th>
            <td><?php echo e($matkul->kode_mk); ?></td>
        </tr>
        <tr>
            <th>Nama MK</th>
            <td><?php echo e($matkul->nama_mk); ?></td>
        </tr>
        <tr>
            <th>SKS</th>
            <td><?php echo e($matkul->sks); ?></td>
        </tr>
        <tr>
            <th>Semester</th>
            <td><?php echo e($matkul->semester); ?></td>
        </tr>
        <tr>
            <th>Jenis MK</th>
            <td><?php echo e(ucfirst($matkul->jenis_mk)); ?></td>
        </tr>
    </table>
    <a href="<?php echo e(route('matakuliah.index')); ?>" class="btn btn-secondary">Kembali</a>
</div>
<?php $__env->stopSection(); ?>
=======


<?php $__env->startSection('content'); ?>
<div class="container">
    <h1>Detail Mata Kuliah</h1>
    <table class="table">
        <tr>
            <th>Kode MK</th>
            <td><?php echo e($matkul->kode_mk); ?></td>
        </tr>
        <tr>
            <th>Nama MK</th>
            <td><?php echo e($matkul->nama_mk); ?></td>
        </tr>
        <tr>
            <th>SKS</th>
            <td><?php echo e($matkul->sks); ?></td>
        </tr>
        <tr>
            <th>Semester</th>
            <td><?php echo e($matkul->semester); ?></td>
        </tr>
        <tr>
            <th>Jenis MK</th>
            <td><?php echo e(ucfirst($matkul->jenis_mk)); ?></td>
        </tr>
    </table>
    <a href="<?php echo e(route('matakuliah.index')); ?>" class="btn btn-secondary">Kembali</a>
</div>
<?php $__env->stopSection(); ?>
>>>>>>> ee6e01452fc50caf4e6b7d74cc922ea1d7b2cc8f

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\iss5i\Documents\FRS-System\frs-system\resources\views/matakuliah/show.blade.php ENDPATH**/ ?>
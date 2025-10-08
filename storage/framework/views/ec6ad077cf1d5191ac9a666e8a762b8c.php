<!DOCTYPE html>
<html lang="en" class="h-full bg-gray-900">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajuan Perubahan Jadwal</title>
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
                    <a href="<?php echo e(route('dosen.dashboard')); ?>" aria-current="page" class="rounded-md px-3 py-2 text-sm font-medium text-white">Dashboard</a>

                    <a href="<?php echo e(route('matakuliah.index')); ?>" class="rounded-md px-3 py-2 text-sm font-medium text-gray-300 hover:bg-white/5 hover:text-white">Informasi Kelas</a>

                    <a href="#" aria-current="page" class="rounded-md bg-gray-950/50 px-3 py-2 text-sm font-medium text-white">Perubahan Jadwal</a>

                    <a href="<?php echo e(route('matakuliah.index')); ?>" class="rounded-md px-3 py-2 text-sm font-medium text-gray-300 hover:bg-white/5 hover:text-white">Kurikulum</a>
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
        <h1 class="text-3xl font-bold tracking-tight text-white">Pengajuan Perubahan Jadwal</h1>
        </div>
    </header>

    <div class="min-h-full flex flex-col items-center justify-center py-10">
        <div class="bg-gray-800/70 rounded-2xl shadow-lg p-10 w-full max-w-md text-white">
            <!-- <h2 class="text-2xl font-bold mb-6 text-center">Pengajuan Perubahan Jadwal</h2> -->

            <form>
                <a>Silahkan isi form berikut untuk mengajukan perubahan jadwal:</a> <br><br>
                <div>
                    <label for="mata_kuliah" class="block text-gray-300 font-semibold mb-1">Mata Kuliah</label>
                    <input type="text" id="mata_kuliah" name="mata_kuliah" required
                        class="w-full px-3 py-2 rounded bg-gray-700 border border-gray-600 text-white focus:outline-none focus:ring-2 focus:ring-indigo-500">
                </div>

                <br>



                <div>
                    <label for="jadwal_lama" class="block text-gray-300 font-semibold mb-1">Jadwal Lama</label>
                    <input type="datetime-local" id="jadwal_lama" name="jadwal_lama" required
                        class="w-full px-3 py-2 rounded bg-gray-700 border border-gray-600 text-white focus:outline-none focus:ring-2 focus:ring-indigo-500">
                </div>
                
                <br>

                <div>
                    <label for="jadwal_baru" class="block text-gray-300 font-semibold mb-1">Jadwal Baru</label>
                    <input type="datetime-local" id="jadwal_baru" name="jadwal_baru" required
                        class="w-full px-3 py-2 rounded bg-gray-700 border border-gray-600 text-white focus:outline-none focus:ring-2 focus:ring-indigo-500">
                </div>

                <!-- Nanti jadwal di ubah, nunggu kelas (php walaupun di comment tetep error cik)-->

                <br>

                <div>
                    <label for="alasan" class="block text-gray-300 font-semibold mb-1">Alasan Perubahan</label>
                    <textarea id="alasan" name="alasan" rows="3" required
                        class="w-full px-3 py-2 rounded bg-gray-700 border border-gray-600 text-white focus:outline-none focus:ring-2 focus:ring-indigo-500"></textarea>
                </div>
                <br>
                <br>
                <div class="flex justify-center">
                    <button type="submit" id="submitBtn"
                        class="bg-indigo-600 hover:bg-indigo-500 text-white font-bold py-2 px-6 rounded focus:outline-none focus:shadow-outline transition">
                        Ajukan Perubahan
                    </button>
                </div>
                <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
                <script>
                    document.addEventListener('DOMContentLoaded', function() {
                        const form = document.querySelector('form');
                        const submitBtn = document.getElementById('submitBtn');
                        form.addEventListener('submit', function(e) {
                            e.preventDefault();
                            Swal.fire({
                                title: 'Pengajuan Berhasil!',
                                text: 'Ajuan perubahan jadwal telah dikirim.',
                                icon: 'success',
                                confirmButtonText: 'OK'
                            });
                        });
                    });
                </script>
            </form>

            <div class="mt-8 flex justify-center">
                <a href="<?php echo e(route('dosen.dashboard')); ?>" class="px-4 py-2 bg-indigo-600 hover:bg-indigo-500 rounded-md text-white transition">Kembali ke Dashboard</a>
            </div>
        </div>
    </div>
</body>
</html><?php /**PATH C:\Users\acer\FRS-System\frs-system\resources\views/dosen/AjuanUbahJadwal.blade.php ENDPATH**/ ?>
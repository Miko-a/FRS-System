<!DOCTYPE html>
<html lang="en" class="h-full bg-gray-900">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil Dosen</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="h-full">
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
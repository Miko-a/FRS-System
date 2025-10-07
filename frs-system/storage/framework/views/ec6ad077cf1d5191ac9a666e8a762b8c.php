<!DOCTYPE html>
<html lang="en" class="h-full bg-gray-900">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajuan Perubahan Jadwal</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="h-full">
    <div class="min-h-full flex flex-col items-center justify-center py-10">
        <div class="bg-gray-800/70 rounded-2xl shadow-lg p-10 w-full max-w-md text-white">
            <h2 class="text-2xl font-bold mb-6 text-center">Pengajuan Ubah Jadwal</h2>

            <form>
                <div>
                    <label for="mata_kuliah" class="block text-gray-300 font-semibold mb-1">Mata Kuliah</label>
                    <input type="text" id="mata_kuliah" name="mata_kuliah" required
                        class="w-full px-3 py-2 rounded bg-gray-700 border border-gray-600 text-white focus:outline-none focus:ring-2 focus:ring-indigo-500">
                </div>
                <div>
                    <label for="jadwal_lama" class="block text-gray-300 font-semibold mb-1">Jadwal Lama</label>
                    <input type="datetime-local" id="jadwal_lama" name="jadwal_lama" required
                        class="w-full px-3 py-2 rounded bg-gray-700 border border-gray-600 text-white focus:outline-none focus:ring-2 focus:ring-indigo-500">
                </div>
                <div>
                    <label for="jadwal_baru" class="block text-gray-300 font-semibold mb-1">Jadwal Baru</label>
                    <input type="datetime-local" id="jadwal_baru" name="jadwal_baru" required
                        class="w-full px-3 py-2 rounded bg-gray-700 border border-gray-600 text-white focus:outline-none focus:ring-2 focus:ring-indigo-500">
                </div>
                <div>
                    <label for="alasan" class="block text-gray-300 font-semibold mb-1">Alasan Perubahan</label>
                    <textarea id="alasan" name="alasan" rows="3" required
                        class="w-full px-3 py-2 rounded bg-gray-700 border border-gray-600 text-white focus:outline-none focus:ring-2 focus:ring-indigo-500"></textarea>
                </div>
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
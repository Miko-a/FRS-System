<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Matakuliah;

class MatakuliahSeeder extends Seeder
{
    public function run()
    {
        // 1. Buat data mata kuliah
        Matakuliah::create([
            'kode_mk' => 'MK101',
            'nama_mk' => 'Dasar Pemrograman',
            'sks' => 3,
            'semester' => 1,
            'jenis_mk' => 'Wajib',
        ]);
        Matakuliah::create([
            'kode_mk' => 'MK102',
            'nama_mk' => 'Struktur Data',
            'sks' => 3,
            'semester' => 2,
            'jenis_mk' => 'Wajib',
        ]);
        Matakuliah::create([
            'kode_mk' => 'MK103',
            'nama_mk' => 'Algoritma dan Pemrograman',
            'sks' => 3,
            'semester' => 2,
            'jenis_mk' => 'Wajib',
        ]);
        Matakuliah::create([
            'kode_mk' => 'MK104',
            'nama_mk' => 'Basis Data',
            'sks' => 3,
            'semester' => 2,
            'jenis_mk' => 'Wajib',
        ]);
        Matakuliah::create([
            'kode_mk' => 'MK201',
            'nama_mk' => 'Sistem Operasi',
            'sks' => 3,
            'semester' => 3,
            'jenis_mk' => 'Wajib',
        ]);
        Matakuliah::create([
            'kode_mk' => 'MK202',
            'nama_mk' => 'Jaringan Komputer',
            'sks' => 3,
            'semester' => 4,
            'jenis_mk' => 'Wajib',
        ]);
        Matakuliah::create([
            'kode_mk' => 'MK203',
            'nama_mk' => 'Pemrograman Jaringan',
            'sks' => 3,
            'semester' => 5,
            'jenis_mk' => 'Wajib',
        ]);

        // 2. Tambahkan prasyarat (attach ke relasi)
        // Struktur Data butuh Dasar Pemrograman
        Matakuliah::find('MK102')->prasyarat()->attach('MK101');

        // Sistem Operasi tidak punya prasyarat
        // Jaringan Komputer butuh Sistem Operasi
        Matakuliah::find('MK202')->prasyarat()->attach('MK201');
        // Pemrograman Jaringan butuh Jaringan Komputer
        Matakuliah::find('MK203')->prasyarat()->attach('MK202');
    }
}

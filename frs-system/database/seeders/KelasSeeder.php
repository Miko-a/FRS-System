<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Kelas;

class KelasSeeder extends Seeder
{
    public function run(): void
    {
       $datakelas = [
            [
                'kode_kelas' => 'A',      
                'kode_dosen' => '199012345678901237',
                'hari' => 'Senin',
                'jam_mulai' => '07:00:00',
                'jam_selesai' => '08:50:00',
                'ruang_kelas' => 'IF101',
                'kapasitas' => 40,
                'kode_mk' => 'MK101',
            ],
            [        
                'kode_kelas' => 'G', 
                'kode_dosen' => '198012345678901235',
                'hari' => 'Rabu',
                'jam_mulai' => '10:00:00',
                'jam_selesai' => '11:50:00',
                'ruang_kelas' => 'IF105',
                'kapasitas' => 70,
                'kode_mk' => 'MK102',
            ],
            [ 
                'kode_kelas' => 'C',        
                'kode_dosen' => '198512345678901236',
                'hari' => 'Jumat',
                'jam_mulai' => '09:00:00',
                'jam_selesai' => '10:50:00',
                'ruang_kelas' => 'LP1',
                'kapasitas' => 70,
                'kode_mk' => 'MK103',
            ],
            [        
                'kode_kelas' => 'B', 
                'kode_dosen' => '197812345678901234',
                'hari' => 'Kamis',
                'jam_mulai' => '15:30:00',
                'jam_selesai' => '17:20:00',
                'ruang_kelas' => 'IF104',
                'kapasitas' => 40,
                'kode_mk' => 'MK104',
            ]
        ];

        foreach ($datakelas as $data){
            Kelas::create($data);
        }
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Matakuliah;

class MatakuliahSeeder extends Seeder
{
    public function run(): void
    {
        $datamatkul = [
            [        
                'kode_mk' => 'MK101',
                'nama_mk' => 'Jaringan Komputer',
                'sks' => 4,
                'semester'=>3,
                'jenis_mk'=>'wajib',
            ],
            [        
                'kode_mk' => 'MK102',
                'nama_mk' => 'Konsep Kecerdasan Artificial (A)',
                'sks' => 3,
                'semester'=>3,
                'jenis_mk'=>'wajib',
            ],
            [        
                'kode_mk' => 'MK103',
                'nama_mk' => 'Konsep Kecerdasan Artificial (B)',
                'sks' => 3,
                'semester'=>3,
                'jenis_mk'=>'wajib',
            ],
            [        
                'kode_mk' => 'MK104',
                'nama_mk' => 'Data Mining',
                'sks' => 3,
                'semester'=>5,
                'jenis_mk'=>'pilihan',
            ]
        ];

        foreach ($datamatkul as $data){
            Matakuliah::create($data);
        }
    }
}

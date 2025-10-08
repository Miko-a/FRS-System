<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Mahasiswa;
use App\Models\Login;

class MahasiswaSeeder extends Seeder
{
    public function run(): void
    {
       $datamhs = [
            [        
                'nrp' => '5025241101',
                'nama' => 'Andi Sutanto',
                'angkatan' => 2024,
                'program_studi' => 'Teknik Informatika',
                'semester' => 3,
                'ipk' => 3.78,
            ],
            [        
                'nrp' => '5025241021',
                'nama' => 'Steven Wijaya',
                'angkatan' => 2024,
                'program_studi' => 'Teknik Informatika',
                'semester' => 3,
                'ipk' => 3.80,
            ],
            [        
                'nrp' => '5025221051',
                'nama' => 'Melati Mustika',
                'angkatan' => 2022,
                'program_studi' => 'Teknik Informatika',
                'semester' => 7,
                'ipk' => 3.65,
            ],
            [        
                'nrp' => '5025231125',
                'nama' => 'Valencia Arsyana',
                'angkatan' => 2023,
                'program_studi' => 'Teknik Informatika',
                'semester' => 5,
                'ipk' => 3.89,
            ]
        ];

        foreach ($datamhs as $data){
             $maxSks = match(true) {
                $data['ipk'] >= 3.00 => 24,
                $data['ipk'] >= 2.50 => 21,
                $data['ipk'] >= 2.00 => 18,
                default => 15,
            };
            $login = Login::create([
                'email' => $data['nrp'].'@its.ac.id',
                'password' => bcrypt('mhs123'),
                'role' => 'mahasiswa',
            ]);
            Mahasiswa::create([
                ...$data,
                'max_sks' => $maxSks,
                'sks_yg_diambil' => 0,
                'login_id' => $login->login_id,
            ]);
        }
    }
}

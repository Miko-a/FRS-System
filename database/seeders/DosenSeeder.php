<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Dosen;
use App\Models\Login;

class DosenSeeder extends Seeder
{
    public function run(): void
    {
       $datadosen = [
            [        
                'nip' => '197812345678901234',
                'nama' => 'Dr. Ir. Budi, M.T.',
                'program_studi' => 'Teknik Informatika',
                'email' => 'budi@its.ac.id',
            ],
            [        
                'nip' => '198012345678901235',
                'nama' => 'Prof. Harsono, Ph.D.',
                'program_studi' => 'RPL',
                'email' => 'harsono@its.ac.id',
            ],
            [        
                'nip' => '198512345678901236',
                'nama' => 'Dr. Anton Susilo, M.T.',
                'program_studi' => 'RKA',
                'email' => 'susilo@its.ac.id',
            ],
            [        
                'nip' => '199012345678901237',
                'nama' => 'Ir. Liliana, M.Eng.',
                'program_studi' => 'Teknik Informatika',
                'email' => 'liliana@its.ac.id',
            ]
        ];

        foreach ($datadosen as $data){
            $login = Login::where('email', $data['email'])->first();
            if ($login){
                Dosen::create([
                    'nip' =>$data['nip'],
                    'nama'=>$data['nama'],
                    'program_studi'=>$data['program_studi'],
                    'login_id' =>$login->login_id,
                ]);
            }
            
        }
    }
}

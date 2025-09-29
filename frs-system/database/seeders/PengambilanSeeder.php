<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Pengambilan;

class PengambilanSeeder extends Seeder
{
    public function run(): void
    {
        $dataambil = [
            [
                'nrp' => '5025241101',
                'kelas_id' => 1,
            ],
            [
                'nrp' => '5025241101',
                'kelas_id' => 2,
            ],
            [
                'nrp' => '5025241021',
                'kelas_id' => 3,
            ],
            [
                'nrp' => '5025241021',
                'kelas_id' => 1,
            ],
            [
                'nrp' => '5025221051',
                'kelas_id' => 4,
            ],
            [
                'nrp' => '5025231125',
                'kelas_id' => 4,
            ],
        ];

        foreach($dataambil as $data){
            Pengambilan::create($data);
        }
    }
}

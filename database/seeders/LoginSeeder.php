<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Login;

class LoginSeeder extends Seeder
{
    public function run(): void
    {
      $logindata = [
        [
            'email' => 'admin@its.ac.id',
            'password' => bcrypt('admin123'),
            'role' => 'admin',
        ],
        [
            'email' => 'budi@its.ac.id',
            'password' => bcrypt('dosen123'),
            'role' => 'dosen',
        ],
        [
            'email' => 'harsono@its.ac.id',
            'password' => bcrypt('dosen123'),
            'role' => 'dosen',
        ],
        [
            'email' => 'susilo@its.ac.id',
            'password' => bcrypt('dosen123'),
            'role' => 'dosen',
        ],
        [
            'email' => 'liliana@its.ac.id',
            'password' => bcrypt('dosen123'),
            'role' => 'dosen',
        ],
        [
            'email' => '5025241101@its.ac.id',
            'password' => bcrypt('mhs123'),
            'role' => 'mahasiswa',
        ],
        [
            'email' => '5025241021@its.ac.id',
            'password' => bcrypt('mhs123'),
            'role' => 'mahasiswa',
        ],
        [
            'email' => '5025221051@its.ac.id',
            'password' => bcrypt('mhs123'),
            'role' => 'mahasiswa',
        ],
        [
            'email' => '5025231125@its.ac.id',
            'password' => bcrypt('mhs123'),
            'role' => 'mahasiswa',
        ],
      ];

      foreach ($logindata as $data){
        Login::updateOrCreate(
        ['email' => $data['email']],
        [
            'password' => $data['password'],
            'role' => $data['role']
        ]
        );
      }
    }
}

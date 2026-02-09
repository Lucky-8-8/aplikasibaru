<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\Siswa;

class SiswaSeeder extends Seeder
{
    public function run()
    {
        Siswa::create([
            'nis' => '1234567890',
            'nama_lengkap' => 'Budi Santoso',
            'kelas' => 'XI RPL 1',
            'email' => 'siswa@gmail.com',
            'password' => Hash::make('123456')
        ]);
    }
}
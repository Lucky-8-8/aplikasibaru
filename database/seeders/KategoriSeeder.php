<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Kategori;

class KategoriSeeder extends Seeder
{
    public function run()
    {
        $kategori = [
            'Sarana Prasarana',
            'Kebersihan',
            'Keamanan',
            'Pelayanan',
            'Lainnya'
        ];

        foreach ($kategori as $k) {
            Kategori::create([
                'nama_kategori' => $k
            ]);
        }
    }
}
<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KategoriSeeder extends Seeder
{
    public function run()
    {
        DB::table('m_kategori')->insert([
            ['kategori_id' => 1, 'kategori_kode' => 'MKN', 'kategori_nama' => 'Makanan'],
            ['kategori_id' => 2, 'kategori_kode' => 'MIN', 'kategori_nama' => 'Minuman'],
            ['kategori_id' => 3, 'kategori_kode' => 'KEB', 'kategori_nama' => 'Kebutuhan Rumah Tangga'],
            ['kategori_id' => 4, 'kategori_kode' => 'KOS', 'kategori_nama' => 'Kosmetik'],
            ['kategori_id' => 5, 'kategori_kode' => 'OBT', 'kategori_nama' => 'Obat-obatan'],
        ]);
    }
}

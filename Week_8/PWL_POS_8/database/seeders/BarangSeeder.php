<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BarangSeeder extends Seeder
{
    public function run()
    {
        DB::table('m_barang')->insert([
            ['barang_id' => 1, 'kategori_id' => 1, 'barang_kode' => 'MKN001', 'barang_nama' => 'Indomie Goreng', 'harga_beli' => 2800, 'harga_jual' => 3500],
            ['barang_id' => 2, 'kategori_id' => 1, 'barang_kode' => 'MKN002', 'barang_nama' => 'Roti Tawar', 'harga_beli' => 10000, 'harga_jual' => 12000],
            ['barang_id' => 3, 'kategori_id' => 2, 'barang_kode' => 'MIN001', 'barang_nama' => 'Aqua 600ml', 'harga_beli' => 3000, 'harga_jual' => 5000],
            ['barang_id' => 4, 'kategori_id' => 2, 'barang_kode' => 'MIN002', 'barang_nama' => 'Teh Pucuk Harum', 'harga_beli' => 4000, 'harga_jual' => 6000],
            ['barang_id' => 5, 'kategori_id' => 3, 'barang_kode' => 'KEB001', 'barang_nama' => 'Sabun Lifebuoy', 'harga_beli' => 2500, 'harga_jual' => 5000],
            ['barang_id' => 6, 'kategori_id' => 3, 'barang_kode' => 'KEB002', 'barang_nama' => 'Detergen Rinso', 'harga_beli' => 12000, 'harga_jual' => 15000],
            ['barang_id' => 7, 'kategori_id' => 4, 'barang_kode' => 'KOS001', 'barang_nama' => 'Shampoo Pantene', 'harga_beli' => 15000, 'harga_jual' => 18000],
            ['barang_id' => 8, 'kategori_id' => 4, 'barang_kode' => 'KOS002', 'barang_nama' => 'Lipstik Wardah', 'harga_beli' => 30000, 'harga_jual' => 35000],
            ['barang_id' => 9, 'kategori_id' => 5, 'barang_kode' => 'OBT001', 'barang_nama' => 'Paracetamol', 'harga_beli' => 1000, 'harga_jual' => 3000],
            ['barang_id' => 10, 'kategori_id' => 5, 'barang_kode' => 'OBT002', 'barang_nama' => 'Minyak Kayu Putih', 'harga_beli' => 8000, 'harga_jual' => 12000],
        ]);
    }
}
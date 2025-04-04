<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PenjualanDetailSeeder extends Seeder
{
    public function run()
    {
        $detail_id = 1;
        for ($penjualan_id = 1; $penjualan_id <= 10; $penjualan_id++) {
            for ($i = 0; $i < 3; $i++) {
                $barang_id = rand(1, 10);
                $harga_jual = DB::table('m_barang')->where('barang_id', $barang_id)->value('harga_jual');
                $jumlah = rand(1, 5);

                DB::table('t_penjualan_detail')->insert([
                    'detail_id' => $detail_id++,
                    'penjualan_id' => $penjualan_id,
                    'barang_id' => $barang_id,
                    'harga' => $harga_jual,
                    'jumlah' => $jumlah,
                ]);
            }
        }
    }
}
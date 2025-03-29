<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SupplierSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('m_supplier')->insert([
            [
                'supplier_nama' => 'PT. Sumber Makmur',
                'supplier_telepon' => '081234567890',
                'supplier_alamat' => 'Jl. Merdeka No. 10',
                'supplier_kota' => 'Jakarta'
            ],
            [
                'supplier_nama_supplier' => 'CV. Berkah Abadi',
                'supplier_telepon' => '085678901234',
                'supplier_alamat' => 'Jl. Kenangan No. 5',
                'supplier_kota' => 'Bandung'
            ],
            [
                'supplier_nama_supplier' => 'UD. Sukses Selalu',
                'supplier_telepon' => '087890123456',
                'supplier_alamat' => 'Jl. Raya Surabaya No. 21',
                'supplier_kota' => 'Surabaya'
            ],
        ]);
    }
}
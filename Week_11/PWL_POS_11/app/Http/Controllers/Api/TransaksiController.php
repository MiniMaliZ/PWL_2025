<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\BarangModel;
use App\Models\PenjualanDetailModel;
use App\Models\PenjualanModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class TransaksiController extends Controller
{
    public function index()
    {
        $data = PenjualanModel::with('detail.barang', 'user')->get();
        return $data;
    }

    public function addTransaction(Request $request)
    {
        $request->merge(['user_id' => auth()?->user()?->user_id ?? 1]);
        $request->merge(['penjualan_tanggal' => now()->format('Y-m-d H:i:s')]);
        $request->merge(['penjualan_kode' => 'PJ' . now()->format('YmdHis')]);

        $rules = [
            'user_id' => 'required|exists:m_user,user_id',
            'pembeli' => 'required|string|max:100',
            'penjualan_kode' => 'required|string|unique:t_penjualan,penjualan_kode',
            'penjualan_tanggal' => 'required|date',
            'barang_id.*' => 'required|exists:m_barang,barang_id',
            'harga.*' => 'required|numeric|min:0',
            'jumlah.*' => 'required|integer|min:1'
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'msgField' => $validator->errors()
            ]);
        }

        DB::beginTransaction();
        try {
            $penjualan = PenjualanModel::create([
                'user_id' => auth()?->user()?->user_id ?? 1,
                'pembeli' => $request->pembeli,
                'penjualan_kode' => $request->penjualan_kode,
                'penjualan_tanggal' => $request->penjualan_tanggal
            ]);

            foreach ($request->barang_id as $i => $barangId) {
                $barang = BarangModel::find($barangId);
                $barang->update([
                    'stok' => $barang->stok - $request->jumlah[$i]
                ]);

                PenjualanDetailModel::create([
                    'penjualan_id' => $penjualan->penjualan_id,
                    'barang_id' => $barangId,
                    'harga' => $request->harga[$i],
                    'jumlah' => $request->jumlah[$i]
                ]);
            }

            DB::commit();
            return response()->json($penjualan, 201);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['status' => false, 'message' => $e]);
        }
    }

    public function show($penjualan)
    {
        $data = PenjualanModel::with('detail.barang', 'user')->find($penjualan);
        return $data;
    }
}
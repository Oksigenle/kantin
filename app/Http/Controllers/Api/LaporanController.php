<?php

namespace App\Http\Controllers\Api;

use App\Transformers\LaporanTransformer;
use App\Transformers\ProdukTransformer;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Laporan;
use App\Produk;

class LaporanController extends Controller
{

    public function index()
    {
        $laporans = Laporan::all(); 

        $laporan = fractal($laporans, new LaporanTransformer())->toArray();
        return response()->json($laporan);
    }

    public function store(Request $request)
    {
        $lapor = Produk::all();
        foreach ($lapor as $value) {
            $codes = $value->kode_produk;
        }

        $jumlah = $request->jumlah;
        $pembeli = $request->nama_pembeli;
        $kode = $request->kode_produk;
        
        $produks = Produk::where('kode_produk','like',"%".$kode."%")->get();
        
        foreach ($produks as $value) {
            $nama = $value->nama_produk;
            $harga = $value->harga; 
            $stok = $value->stok;
        }     

        if ($kode == $codes || $jumlah <= $stok) { 
            $laporans = new Laporan();
            $laporans->nama_pembeli = $pembeli;
            $laporans->nama_produk = $nama; 
            $laporans->kode_produk = $kode;
            $laporans->harga = $harga;
            $laporans->jumlah = $jumlah;
            $laporans->total = $harga * $jumlah;
            $laporans->save();
            $laporan = fractal($laporans, new LaporanTransformer())->toArray();

            $response = [
                'status' => 'Success' ,
                'data'  => $laporan
            ];
            return response()->json($response);
        }else {
            return response()->json([
                'status' => ' Stok tidak tesedia' ,
            ], 403); 
        }

    }

    public function cek(Request $request)
    {
        $kode = $request->kode_produk;
        $laporans = Produk::where('kode_produk','like',"%".$kode."%")->get();
        foreach ($laporans as $value) {
            $stok = $value->stok;
            $code = $value->kode_produk;
        }

        $laporan = fractal($laporans, new ProdukTransformer())->toArray();
        if ($stok == 0) {
            return response()->json([
                'message' => 'Stok habis',
            ], 201);
        }else{
            return response()->json([
                'message' => 'Success',
                'data'  => $laporan
            ], 200);
        }
    }
}  
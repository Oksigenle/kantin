<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Laporan;

class LaporanTransformer extends TransformerAbstract
{
    public function transform(Laporan $laporan)
    { 
        return [
            'id' => $laporan->id,
            'nama_pembeli' => $laporan->nama_pembeli,
            'nama_produk' => $laporan->nama_produk,
            'kode_produk' => $laporan->kode_produk,
            'harga' => $laporan->harga,
            'jumlah' => $laporan->jumlah,
            'total' => $laporan->total
        ];
    }
}

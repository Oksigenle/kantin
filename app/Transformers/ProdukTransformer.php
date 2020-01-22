<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Produk;

class ProdukTransformer extends TransformerAbstract
{
    public function transform(Produk $produk)
    {
        return [
            'id' => $produk->id,
            'nama_produk' => $produk->nama_produk,
            'kode_produk' => $produk->kode_produk,
            'harga' => $produk->harga,
        ];
    }
}

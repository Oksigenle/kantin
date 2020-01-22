<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Laporan extends Model
{
    protected $fillable = ['nama_pembeli', 'kode_produk', 'harga', 'stok'];
}
 
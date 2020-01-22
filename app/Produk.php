<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    protected $fillable = ['nama_produk','kode_produk', 'harga', 'stok'];
    public $timestamps = false;
}

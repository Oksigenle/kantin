<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Produk;

class ProdukController extends Controller
{
    public function index()
    {
        $produks = Produk::latest()->paginate(env('PER_PAGE'));
        return view('produk.index', compact('produks'));
    }

    public function create()
    {
        return view('produk.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_produk'=>'required',
            'harga'=> 'required|integer',
            'stok' => 'required|integer',
            'kode_produk' => 'required|exists:produks,kode_produk'
        
        ]); 
        
        $input = request()->all();
        $produks = Produk::create($input);
        return redirect('/produks')->with('Success', 'Successfully');
    }
    
    public function edit($id)
    {
        $produks = Produk::find($id);

        return view('produk.edit', compact('produks'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_produk'=>'required',
            'harga'=> 'required|integer',
            'stok' => 'required|integer',
            'kode_produk' => 'required'
          ]);
    
          $produks = Produk::find($id);
          $produks->nama_produk = $request->get('nama_produk');
          $produks->harga = $request->get('harga');
          $produks->stok = $request->get('stok');
          $produks->kode_produk = $request->get('kode_produk');
          $produks->save();
    
          return redirect('/produks')->with('status', 'Successfully');
    }

    public function destroy($id)
    {
        $produks = Produk::find($id);
        $produks->delete();
   
        return redirect('/produks')->with('status', 'Successfully');
    }

 
    public function cari(Request $request)
    {
        $cari = $request->get('cari');
		$produks = produk::where('nama_produk','like',"%".$cari."%")->paginate(env('PER_PAGE'));

		return view('produk.index', compact('produks'));
    }

    public function tambah($id)
    {
        $produk = Produk::find($id);

        return view('produk.tambah', compact('produk'));
    }

    public function tambahan(Request $request, $id)
    {
        $request->validate([
            'stok' => 'required|integer'
        ]);
    
        $produk = Produk::find($id);
        $produk->stok = $request->get('stok') + $produk->stok;
        $produk->save();

        return redirect('/produks')->with('status', 'Successfully');
    }
}

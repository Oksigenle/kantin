@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header" align="center">
                    <div class="card-header" style="background-color: rgb(78, 190, 249); color: rgb(0, 0, 0)" >
                        <b>DAFTAR BARANG</b>
                    </div>
                </div> 

                <div class="card-header">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <div class="row justify-content-center">
                                <div class="col-md-2">
                                    <a href="{{route('produks.create')}}" class="btn btn-primary">Tambah</a>
                                </div>
                                <div class="col-sm-10">

                                    <form action="{{route('cari')}}" method="GET" align="right">
                                    <input type="text" name="cari" placeholder="Cari nama produk..." value="{{ old('cari') }}">
                                    <input type="submit" value="Cari">
                                </form>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    
                    <br>
 
                    <table class="table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Kode Produk</th>
                                <th>Nama Produk</th> 
                                <th>Harga</th>
                                <th>Stok</th>
                                <th>Kontrol</th>
                            </tr>
                        </thead>
                        @php $no = 1; @endphp
                        @foreach($produks as $produk)
                            <tbody>
                                <tr>
                                    <td>{{$no++}}</td>
                                    <td>{{$produk->kode_produk}}</td>
                                    <td>{{$produk->nama_produk}}</td>
                                    <td>{{"Rp. ".number_format($produk->harga, 0, ".", "." )}}</td>
                                    <td>{{$produk->stok}}</td>
                                    <td>
                                        <form action="{{ route('produks.destroy', $produk->id) }}" method="post">
                                            {{ csrf_field() }}
                                            {{ method_field('DELETE') }}
                                            <a href="{{ route('produk.tambah', $produk->id) }}" class=" btn btn-sm btn-success">+Stok</a>
                                            <a href="{{ route('produks.edit',$produk->id) }}" class=" btn btn-sm btn-primary">Edit</a>
                                            <button class="btn btn-sm btn-danger" type="submit" onclick="return confirm('Yakin ingin menghapus data?')">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            </tbody>
                        @endforeach
                    </table>
                    <br>
                    <hr>
                    {!! $produks->appends(Request::except('page'))->links()!!}
                   
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header" align="center">
                    <div class="card-header" align="center" style="background-color: rgb(78, 190, 249); color: rgb(0, 0, 0)" >
                        Edit Produk
                    </div>
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>  
                    @endif


                    <form method="post" action="{{ route('produks.update', $produks->id) }}">
                        @method('PATCH')
                        @csrf
                        <div class="form-group">
                            <label for="name">Nama Produk:</label>
                            <input type="text" class="form-control" name="nama_produk" value="{{ $produks->nama_produk }} "/>
                        </div>
                        <div class="form-group">
                            <label for="price">Harga :</label>
                            <input type="text" class="form-control" name="harga" value="{{ $produks->harga }}" />
                        </div>
                        <div class="form-group">
                            <label for="quantity">Stok:</label>
                            <input type="text" class="form-control" name="stok" value="{{ $produks->stok }}" />
                        </div>
                        <div class="form-group">
                            <label for="quantity">Kode Produk:</label>
                            <input type="text" class="form-control" name="kode_produk" value="{{ $produks->kode_produk }}" />
                        </div>
                        <button type="submit" class="btn btn-success">Update</button>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <a href="{{ url('/produks') }}" class="btn btn-primary">Back</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

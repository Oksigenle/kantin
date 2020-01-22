@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header" align="center">
                    <div class="card-header" align="center" style="background-color: rgb(78, 190, 249); color: rgb(0, 0, 0)" >
                        <b>Add Produk</b>
                    </div>
                </div>

                <div class="card-body">
                    <div class="card-body">
                        @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div><br />
                        @endif
                        <form method="post" action="{{ route('produks.store') }}">
                            <div class="form-group">
                                @csrf
                                <label for="name">Nama produk:</label>
                                <input type="text" class="form-control" name="nama_produk"/>
                            </div>
                            <div class="form-group">
                                <label for="price">Harga :</label>
                                <input type="text" class="form-control" name="harga"/>
                            </div>
                            <div class="form-group">
                                <label for="quantity">Stok:</label>
                                <input type="text" class="form-control" name="stok"/>
                            </div>

                            <div class="form-group">
                                <label for="quantity">Kode Produk:</label>
                                <input type="text" class="form-control" name="kode_produk"/>
                            </div>
                            <button type="submit" class="btn btn-success">Add</button>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            &nbsp;&nbsp;&nbsp;&nbsp;
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <a href="{{ url('/produks') }}" class="btn btn-primary">Back</a>
                            <!-- <a href="javascript:history.back()" class="btn btn-primary">Back</a> -->
                        </form>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

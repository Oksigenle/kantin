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


                    <form method="post" action="{{ route('produk.tambahan', $produk->id) }}">
                        @method('PATCH')
                        @csrf
                        <div class="form-group">
                            <label for="quantity">Stok:</label>
                            <input type="text" class="form-control" name="stok" value="" />
                        </div>
                        <button type="submit" class="btn btn-success">Tambah</button>
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



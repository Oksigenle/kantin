@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12"> 
            <div class="card">
                <div class="card-header" align="center">
                    <div class="card-header" style="background-color: rgb(78, 190, 249); color: rgb(0, 0, 0)" >
                        <b>DAFTAR PEMBELI</b> 
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<br>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12"> 
            <div class="card">
                <form action="/filters" method="GET">
                    <div class="card-header">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <div class="row justify-content-center">
                                    <!-- style="text-align:justify" -->
                                        
                                        Dari

                                        <div class="col-md-2">
                                            <input type="date" name="start" class="form-control" value="<?php echo date('Y-m-d');?>">
                                        </div>
                                        Ke
                                        <div class="col-md-2">
                                            <input type="date" name="end" class="form-control" value="<?php echo date('Y-m-d');?>">
                                        </div>
                                        <div class="col-md-2">
                                            <input type="submit" value="Filter">
                                        </div>
                                    
                                    </form>

                                    

                                    <div class="col-md-4">
                                        <form action="/caris" method="GET" align="right">
                                            <input type="text" name="cari" placeholder="Cari nama pembeli..." value="{{ old('cari') }}">
                                            <input type="submit" value="Cari"> 
                                            <a href="{{route('laporans.index')}}" class="btn btn-warning btn-sm">Refresh</a>

                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <!-- </form> -->




                <div class="card-body">
                    @if (session()->get('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session()->get('success') }}
                        </div>
                    @endif 

                    <form>
                        <div class=" col-md-2">
                            <a href="{{url('export')}}" class="btn btn-success btn-sm">Download</a>
                        </div><br>
                        <div id="order_table">
                        <table class="table table-bordered">
                            <thead>
                                <tr>

                                    <th width="2%" >#</th>
                                    <th width="10%">Tanggal</th>
                                    <th width="22%">Nama Pembeli</th>
                                    <th width="22%">Nama Barang</th>
                                    <th width="12%">Harga Barang</th>
                                    <th width="1%">Jumlah</th>
                                    <th width="12%">Total BON</th>
                                    
                                    <!-- <th>Kontrol</th> -->
                                </tr>
                            </thead>
                            @php $no = 1; @endphp
                            @foreach($laporans as $pembeli)
                                <tbody>
                                    <tr>
                                        <td>{{$no++}}</td>
                                        <td>{{$pembeli->created_at->format('Y-m-d')}}</td> 
                                        <td>{{$pembeli->nama_pembeli}}</td>
                                        <td>{{$pembeli->nama_produk}}</td>
                                        <td>{{"Rp. ".number_format($pembeli->harga, 0, ".", "." )}}</td>
                                        <td>{{$pembeli->jumlah}}</td>
                                        <td>{{"Rp. ".number_format($pembeli->total, 0, ".", "." )}}</td>  
                                    </tr>
                                
                                </tbody>
                            @endforeach
                        </table>
                        </div> 
                    </form>
                    <hr>
                    Halaman : {{ $laporans->currentPage() }} <br/>
                    Jumlah Pembeli : {{ $laporans->total() }} <br/>
                    Data Per Halaman : {{ $laporans->perPage() }} <br/>
                    
                    {!! $laporans->appends(Request::except('page'))->links()!!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@extends('layouts.master')

@section('content')
    <div class="card card-primary">
        <div class="card-header">
            <h2 class="card-title">Daftar Barang Masuk</h2>
        </div>
        <div class="card-body">
            
            <div class="row">
                    <div class="col-md-3">
                        <a href="/masuk/create" class="btn btn-primary">Tambah Barang Masuk</a>
                    </div>
                    <div class="col-md-2">
                        <a href="/masuk/pdf" class="btn btn-primary">Cetak Pdf</a>
                    </div>
                    <div class="col-md-2">
                        <a href="/masuk/excel" class="btn btn-primary">Cetak Excel</a>
                    </div>
                    <div class="col-md-5">
                        <form action="/masuk/search" method="get">
                            <div class="input-group">
                                <input type="search" name="search" class="form-control">
                                <span class="input-group-prepend">
                                    <button type="submit" class="btn btn-primary">Search</button>
                                </span>
                            </div>
                        </form>
                    </div>
            </div>
            <div class="ml-3 mt-3">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>No Transaksi</th>
                            <th>Tanggal</th>
                            <th>Nama Barang</th>
                            <th>Satuan</th>
                            <th>Jumlah Barang</th>
                            <th>Harga Barang</th>
                            <th>Harga Total</th>
                            <th>Penyedia</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($masuks as $masuk)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$masuk->no_transaksi}}</td>
                            <td>{{$masuk->tgl_transaksi}}</td>
                            <td>{{$masuk->barang->nm_barang}}</td>
                            <td>{{$masuk->satuan->nm_satuan}}</td>
                            <td>{{$masuk->jml_barang}}</td>
                            <td>{{$masuk->hrg_satuan}}</td>
                            <td>{{$masuk->hrg_total}}</td>
                            <td>{{$masuk->penyedia->nm_penyedia}}</td>
                            <td>
                                <a href="/masuk/{{$masuk->id}}/edit" class="btn btn-sm btn-warning">Edit</a>
                                <form action="/masuk/{{$masuk->id}}" method="POST" style="display: inline">
                                    @csrf 
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
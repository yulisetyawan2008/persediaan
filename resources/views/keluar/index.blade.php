@extends('layouts.master')

@section('content')
    <div class="card card-primary">
        <div class="card-header">
            <h2 class="card-title">Daftar Barang Keluar</h2>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-3">
                    <a href="keluar/create" class="btn btn-primary">Tambah Barang Keluar</a>
                </div>
                <div class="col-md-2">
                    <a href="keluar/pdf" class="btn btn-primary">Cetak PDF</a>
                </div>
                <div class="col-md-2">
                    <a href="keluar/excel" class="btn btn-primary">Cetak Excel</a>
                </div>
                <div class="col-md-5">
                    <form action="#" method="get">
                        <div class="input-group">
                            <input type="search" name="search" class="form-control">
                            <span class="input-group-prepend">
                                <button type="submit" class="btn btn-primary">Search</button>
                            </span>
                        </div>
                    </form>
                </div>
            </div>
            <hr>
           
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
                            <th>Harga Satuan</th>
                            <th>Harga Total</th>
                            <th>Tujuan</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($keluars as $keluar)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$keluar->no_trans}}</td>
                            <td>{{$keluar->tgl_keluar}}</td>
                            <td>{{$keluar->barang->nm_barang}}</td>
                            <td>{{$keluar->satuan->nm_satuan}}</td>
                            <td>{{$keluar->jml_barang}}</td>
                            <td>{{$keluar->hrg_satuan}}</td>
                            <td>{{$keluar->hrg_total}}</td>
                            <td>{{$keluar->tujuan->nm_tujuan}}</td>
                            <td>
                                <a href="/keluar/{{$keluar->id}}/edit" class="btn btn-sm btn-warning">Edit</a>
                                <form action="/keluar/{{$keluar->id}}" method="POST" style="display: inline">
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
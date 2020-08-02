@extends('layouts.master')

@section('content')
    <div class="card card-primary">
        <div class="card-header">
            <h2 class="card-title">Daftar Barang Persediaan</h2>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-3">
                    <a href="barang/create" class="btn btn-primary">Tambah Barang</a>
                </div>
                <div class="col-md-2">
                    <a href="barang/pdf" class="btn btn-primary">Cetak PDF</a>
                </div>
                <div class="col-md-2">
                    <a href="barang/excel" class="btn btn-primary">Cetak Excel</a>
                </div>
                <div class="col-md-5">
                    <form action="/barang/search" method="get">
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
            Total barang: {{$barangs->total()}}<br>
            Halaman : {{$barangs->currentPage()}} dari {{$barangs->lastPage()}} halaman
            <div class="ml-3 mt-3">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Barang</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($barangs as $barang)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$barang->nm_barang}}</td>
                            <td>
                                <a href="/barang/{{$barang->id}}/edit" class="btn btn-sm btn-warning">Edit</a>
                                <form action="/barang/{{$barang->id}}" method="POST" style="display: inline">
                                    @csrf 
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger" ><i class="fas fa-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                {{$barangs->links()}}
            </div>
        </div>
        
    </div>
@endsection
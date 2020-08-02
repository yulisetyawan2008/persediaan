@extends('layouts.master')

@section('content')
    <div class="card card-primary">
        <div class="card-header">
            <h2 class="card-title">Daftar Satuan Barang Persediaan</h2>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-3">
                    <a href="/satuan/create" class="btn btn-primary">Tambah Satuan</a>
                </div>
                <div class="col-md-2">
                    <a href="/satuan/pdf" class="btn btn-primary">Cetak Pdf</a>
                </div>
                <div class="col-md-2">
                    <a href="/satuan/excel" class="btn btn-primary">Cetak Excel</a>
                </div>
                <div class="col-md-5">
                    <form action="/satuan/search" method="get">
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
            Total barang : {{$satuans->total()}}<br>
            Halaman : {{$satuans->currentPage()}} dari {{$satuans->lastPage()}} halaman
            <div class="ml-3 mt-3">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Satuan</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($satuans as $satuan)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$satuan->nm_satuan}}</td>
                            <td>
                                <a href="satuan/{{$satuan->id}}/edit" class="btn btn-sm btn-warning">Edit</a>
                                <form action="/satuan/{{$satuan->id}}" method="POST" style="display: inline">
                                    @csrf 
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                {{$satuans->links()}}
            </div>
        </div>
    </div>
@endsection
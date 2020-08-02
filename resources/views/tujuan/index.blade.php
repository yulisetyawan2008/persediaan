@extends('layouts.master')

@section('content')
    <div class="card card-primary">
        <div class="card-header">
            <h2 class="card-title">Daftar Tujuan</h2>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-3">
                    <a href="/tujuan/create" class="btn btn-primary">Tambah Tujuan</a>
                </div>
                <div class="col-md-2">
                    <a href="/tujuan/pdf" class="btn btn-primary">Cetak PDF</a>
                </div>
                <div class="col-md-2">
                    <a href="/tujuan/excel" class="btn btn-primary">Cetak Excel</a>
                </div>
                <div class="col-md-5">
                    <form action="/tujuan/search" method="get">
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
            Total tujuan : {{$tujuans->total()}}<br>
            Halaman : {{$tujuans->currentPage()}} dari {{$tujuans->lastPage()}} halaman
            <div class="ml-3 mt-3">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Tujuan</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($tujuans as $tujuan)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$tujuan->nm_tujuan}}</td>
                            <td>
                                <a href="/tujuan/{{$tujuan->id}}/edit" class="btn btn-sm btn-warning">Edit</a>
                                <form action="/tujuan/{{$tujuan->id}}" method="POST" style="display: inline">
                                    @csrf 
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                {{$tujuans->links()}}
            </div>
        </div>
    </div>
@endsection
@extends('layouts.master')

@section('content')
    <div class="card card-primary">
        <div class="card-header">
            <h2 class="card-title">Daftar Penyedia</h2>
        </div>
        <div class="card-body">
            <div class="row">
                    <div class="col-md-3">
                        <a href="/penyedia/create" class="btn btn-primary">Tambah Penyedia</a>
                    </div>
                    <div class="col-md-2">
                        <a href="/penyedia/pdf" class="btn btn-primary">Cetak Pdf</a>
                    </div>
                    <div class="col-md-2">
                        <a href="/penyedia/excel" class="btn btn-primary">Cetak Excel</a>
                    </div>
                    <div class="col-md-5">
                        <form action="/penyedia/search" method="get">
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
            Total penyedia : {{$penyedias->total()}}<br>
            Halaman : {{$penyedias->currentPage()}} dari {{$penyedias->lastPage()}} halaman
            <div class="ml-3 mt-3">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Penyedia</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($penyedias as $penyedia)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$penyedia->nm_penyedia}}</td>
                            <td>
                                <a href="/penyedia/{{$penyedia->id}}/edit" class="btn btn-sm btn-warning">Edit</a>
                                <form action="/penyedia/{{$penyedia->id}}" method="POST" style="display: inline">
                                    @csrf 
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                {{$penyedias->links()}}
            </div>
        </div>
    </div>
@endsection
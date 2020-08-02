@extends('layouts.master')

@section('content')
    <div class="jumbotron bg-primary">
        <div class="card card-primary">
            <div class="card-header">
                <h2 class="card-title">Edit Nama Barang</h2>
            </div>
            <div class="card-body">
                <div class="ml-3 mt-3">
                    <form action="/barang/{{$barang->id}}" method="POST">
                        @csrf 
                        @method('PUT')
                        <div class="form-group">
                            <label for="nm_barang">Barang</label>
                            <input type="text" class="form-control" id="nm_barang" name = "nm_barang" value="{{$barang->nm_barang}}">
                        </div>
                        <input hidden name="created_at" value="{{$barang->created_at}}">
                        <input hidden name="updated_at" value="{{\Carbon\Carbon::now()}}">
                        <div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
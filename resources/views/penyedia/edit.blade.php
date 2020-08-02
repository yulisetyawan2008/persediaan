@extends('layouts.master')

@section('content')
    <div class="jumbotron bg-primary">
        <div class="card card-primary">
            <div class="card-header">
                <h2 class="card-title">Edit Penyedia</h2>
            </div>
            <div class="card-body">
                <div class="ml-3 mt-3">
                    <form action="/penyedia/{{$penyedia->id}}" method="POST">
                        @csrf 
                        @method('PUT')
                        <div class="form-group">
                            <label for="nm_penyedia">Nama Penyedia</label>
                            <input type="text" class="form-control" id="nm_penyedia" name = "nm_penyedia" value="{{$penyedia->nm_penyedia}}">
                        </div>
                        <input hidden name="created_at" value="{{$penyedia->created_at}}">
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
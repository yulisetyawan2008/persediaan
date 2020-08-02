@extends('layouts.master')

@section('content')
    <div class="jumbotron bg-primary">
        <div class="card card-primary">
            <div class="card-header">
                <h2 class="card-title">Input Tujuan</h2>
            </div>
            <div class="card-body">
                <div class="ml-3 mt-3">
                    <form action="/tujuan" method="POST">
                        @csrf 
                        <div class="form-group">
                            <label for="nm_tujuan">Tujuan</label>
                            <input type="text" class="form-control" id="nm_tujuan" name = "nm_tujuan" placeholder="Nama tujuan">
                        </div>
                        <input hidden name="created_at" value="{{\Carbon\Carbon::now()}}">
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
@extends('layouts.master')

@section('content')
    <div class="jumbotron bg-primary">
        <div class="card card-primary">
            <div class="card-header">
                <h2 class="card-title">Edit Barang Keluar</h2>
            </div>
            <div class="card-body keluar">
                <div class="ml-3 mt-3">
                    <form action="/keluar/{{$keluar->id}}" method="POST">
                        @csrf 
                        @method('PUT')
                        <div class="form-group">
                            <label for="no_trans">Nomor Transaksi</label>
                            <input type="text" class="form-control" id="no_trans" name = "no_trans" value="{{$keluar->no_trans}}">
                        </div>
                        <div class="form-group">
                                            <label class="control-label " for="tgl_keluar">
                                            Tanggal Transaksi
                                            </label>
                                            <div class="bootstrap-iso">
                                                <div class="input-group">
                                                    <div class="input-group-addon">
                                                        <i class="fa fa-calendar">
                                                        </i>
                                                    </div>
                                                    <input class="form-control" id="tgl_keluar" name="tgl_keluar" value="{{$keluar->tgl_keluar}}" type="text"/>
                                                </div>
                                            </div>
                        </div>
                        <div class="form-group">
                            <label for="barang_id">Nama Barang</label>
                            <select name="barang_id" id="barang_id" class="form-control">
                            @foreach($barangs as $key => $barang)
                                @if($barang->id == $keluar->barang_id)
                                    <option value="{{$barang->id}}" selected>{{$barang->nm_barang}}</option>
                                @else
                                    <option value="{{$barang->id}}"> {{ $barang->nm_barang}}</option>
                                @endif
                            @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="satuan_id">Satuan</label>
                            <select name="satuan_id" id="satuan_id" class="form-control">
                            @foreach($satuans as $key => $satuan)
                                @if($satuan->id == $keluar->satuan_id)
                                    <option value="{{$satuan->id}}" selected>{{$satuan->nm_satuan}}</option>
                                @else
                                    <option value="{{$satuan->id}}"> {{ $satuan->nm_satuan}}</option>
                                @endif
                            @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="jml_barang">Jumlah Barang</label>
                            <input type="text" class="form-control" id="jml_barang" name = "jml_barang" value="{{$keluar->jml_barang}}">
                        </div>
                        <div class="form-group">
                            <label for="tujuan_id">Tujuan</label>
                            <select name="tujuan_id" id="tujuan_id" class="form-control">
                            @foreach($tujuans as $key => $tujuan)
                                @if($tujuan->id == $keluar->tujuan_id)
                                    <option value="{{$tujuan->id}}" selected>{{$tujuan->nm_tujuan}}</option>
                                @else
                                    <option value="{{$tujuan->id}}"> {{ $tujuan->nm_tujuan}}</option>
                                @endif
                            @endforeach
                            </select>
                        </div>
                        <input hidden name="created_at" value="{{$keluar->created_at}}">
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

@push('scripts')
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>
    <script>
    $(document).ready(function(){
        var date_input=$('input[name="tgl_keluar"]'); //our date input has the name "date"
        var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
        date_input.datepicker({
            format: 'mm/dd/yyyy',
            container: container,
            todayHighlight: true,
            autoclose: true,
        })
    })
</script>

@endpush
@extends('layouts.master')

@section('content')
    <div class="jumbotron bg-primary">
        <div class="card card-primary">
            <div class="card-header">
                <h2 class="card-title">Edit Barang Masuk</h2>
            </div>
            <div class="card-body masuk">
                <div class="ml-3 mt-3">
                    <form action="/masuk/{{$masuk->id}}" method="POST">
                        @csrf 
                        @method('PUT')
                        <div class="form-group">
                            <label for="no_transaksi">Nomor Transaksi</label>
                            <input type="text" class="form-control" id="no_transaksi" name = "no_transaksi" value="{{$masuk->no_transaksi}}">
                        </div>
                        <div class="form-group">
                                            <label class="control-label " for="tgl_transaksi">
                                            Tanggal Transaksi
                                            </label>
                                            <div class="bootstrap-iso">
                                                <div class="input-group">
                                                    <div class="input-group-addon">
                                                        <i class="fa fa-calendar">
                                                        </i>
                                                    </div>
                                                    <input class="form-control" id="tgl_transaksi" name="tgl_transaksi" value="{{$masuk->tgl_transaksi}}" type="text"/>
                                                </div>
                                            </div>
                        </div>
                        <div class="form-group">
                            <label for="barang_id">Nama Barang</label>
                            <select name="barang_id" id="barang_id" class="form-control">
                            @foreach($barangs as $key => $barang)
                                @if($barang->id == $masuk->barang_id)
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
                                @if($satuan->id == $masuk->satuan_id)
                                    <option value="{{$satuan->id}}" selected>{{$satuan->nm_satuan}}</option>
                                @else
                                    <option value="{{$satuan->id}}"> {{ $satuan->nm_satuan}}</option>
                                @endif
                            @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="jml_barang">Jumlah Barang</label>
                            <input type="text" class="form-control" id="jml_barang" name = "jml_barang" value="{{$masuk->jml_barang}}">
                        </div>
                        <div class="form-group">
                            <label for="hrg_satuan">Harga Barang</label>
                            <input type="text" class="form-control" id="hrg_satuan" name = "hrg_satuan" value="{{$masuk->hrg_satuan}}">
                        </div>
                        <div class="form-group">
                            <label for="hrg_total">Harga Total</label>
                            <input type="text" class="form-control" id="hrg_total" name = "hrg_total" placeholder="{{$masuk->hrg_total}}" readonly>
                        </div>
                        <div class="form-group">
                            <label for="penyedia_id">Penyedia</label>
                            <select name="penyedia_id" id="penyedia_id" class="form-control">
                            @foreach($penyedias as $key => $penyedia)
                                @if($penyedia->id == $masuk->penyedia_id)
                                    <option value="{{$penyedia->id}}" selected>{{$penyedia->nm_penyedia}}</option>
                                @else
                                    <option value="{{$penyedia->id}}"> {{ $penyedia->nm_penyedia}}</option>
                                @endif
                            @endforeach
                            </select>
                        </div>
                        <input hidden name="created_at" value="{{$masuk->created_at}}">
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
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script type="text/javascript">
        $(".masuk").keyup(function(){
            var jml_barang = parseInt($("#jml_barang").val())
            var hrg_satuan = parseInt($("#hrg_satuan").val())

            var hrg_total = jml_barang * hrg_satuan;
            $("#hrg_total").attr("value", hrg_total)
        });
    </script>

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>
    <script>
    $(document).ready(function(){
        var date_input=$('input[name="tgl_transaksi"]'); //our date input has the name "date"
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
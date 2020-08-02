@extends('layouts.master')

@section('content')
    <form action="/laporan/cari" method="GET">
        {{ csrf_field() }}
        <div class="form-group">
            <label for="dari">Dari</label>
            <input name="dari" type="text" id="dari" class="form-control datepicker" placeholder="Dari Tanggal">
        </div>
        <div class="form-group">
            <label for="sampai">Sampai</label>
            <input name="sampai" type="text" id="sampai" class="form-control datepicker" placeholder="Sampai Tanggal">
        </div>
        <button type="submit" class="btn btn-info">Cari</button>
    </form>

    @if(isset($masuks))
        <div class="row mt-3">
            <div class="col-md-12">
                <div class="card shadow">
                    <div class="card-header border-0">
                        <h3 class="mb-0">Data Barang Masuk</h3>
                        <a href="/export/masuk/{{$dari}}/{{$sampai}}" class="btn btn-success">Export to Excel</a>
                    </div>
                    <div class="table-responsive">
                        <table id="table-barang-masuk" class="table align-items-center table-flush">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">No Transaksi</th>
                                    <th scope="col">Tanggal</th>
                                    <th scope="col">Nama Barang</th>
                                    <th scope="col">Satuan</th>
                                    <th scope="col">Jumlah</th>
                                    <th scope="col">Harga Satuan</th>
                                    <th scope="col">Harga Total</th>
                                    <th scope="col">Penyedia</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($masuks as $masuk)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$masuk->no_transaksi}}</td>
                                    <td>{{date('d M Y', strtotime($masuk->tgl_transaksi))}}</td>
                                    <td>{{$masuk->nm_barang}}</td>
                                    <td>{{$masuk->nm_satuan}}</td>
                                    <td>{{$masuk->jml_barang}}</td>
                                    <td>Rp. {{number_format($masuk->hrg_satuan,0)}}</td>
                                    <td>Rp. {{number_format($masuk->hrg_total,0)}}</td>
                                    <td>{{$masuk->nm_penyedia}}</td>
                                </tr>
                                @endforeach
                                <tr>
                                    <td colspan="7">Jumlah Total</td>
                                    <td>Rp. {{number_format($totals,0)}}</td>
                                    <td></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                
            </div>
        </div>
    @endif

    @if(isset($keluars))
        <div class="row mt-3">
            <div class="col-md-12">
                <div class="card shadow">
                    <div class="card-header border-0">
                        <h3 class="mb-0">Data Barang Keluar</h3>
                        <a href="" class="btn btn-success">Export to Excel</a>
                    </div>
                    <div class="table-responsive">
                        <table id="table-barang-masuk" class="table align-items-center table-flush">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">No Transaksi</th>
                                    <th scope="col">Tanggal</th>
                                    <th scope="col">Nama Barang</th>
                                    <th scope="col">Satuan</th>
                                    <th scope="col">Jumlah</th>
                                    <th scope="col">Harga Satuan</th>
                                    <th scope="col">Harga Total</th>
                                    <th scope="col">Tujuan</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($keluars as $keluar)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$keluar->no_trans}}</td>
                                    <td>{{date('d M Y', strtotime($keluar->tgl_keluar))}}</td>
                                    <td>{{$keluar->nm_barang}}</td>
                                    <td>{{$keluar->nm_satuan}}</td>
                                    <td>{{$keluar->jml_barang}}</td>
                                    <td>Rp. {{number_format($keluar->hrg_satuan,0)}}</td>
                                    <td>Rp. {{number_format($keluar->hrg_total,0)}}</td>
                                    <td>{{$keluar->nm_tujuan}}</td>
                                </tr>
                                @endforeach
                                <tr>
                                    <td colspan="7">Jumlah Total</td>
                                    <td>Rp. {{number_format($tots,0)}}</td>
                                    <td></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                
            </div>
        </div>
    @endif

@endsection

@push('scripts')
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            $(".datepicker").datepicker();
        });
    </script>
@endpush

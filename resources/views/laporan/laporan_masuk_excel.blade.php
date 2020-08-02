<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
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
</body>
</html>
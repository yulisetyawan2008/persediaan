<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2>Daftar Barang Keluar</h2>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nomor Transaksi</th>
                <th>Tanggal Transaksi</th>
                <th>Nama Barang</th>
                <th>Satuan</th>
                <th>Jumlah Barang</th>
                <th>Tujuan</th>

            </tr>
        </thead>
        <tbody>
            @foreach($datas as $d)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$d->no_trans}}</td>
                <td>{{$d->tgl_keluar}}</td>
                <td>{{$d->barang->nm_barang}}</td>
                <td>{{$d->satuan->nm_satuan}}</td>
                <td>{{$d->jml_barang}}</td>
                <td>{{$d->tujuan->nm_tujuan}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
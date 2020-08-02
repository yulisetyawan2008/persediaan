<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2>Daftar Tujuan</h2>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Tujuan</th>
            </tr>
        </thead>
        <tbody>
            @foreach($datas as $d)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$d->nm_tujuan}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
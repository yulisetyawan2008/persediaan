<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2>Daftar Penyedia</h2>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Penyedia</th>
            </tr>
        </thead>
        <tbody>
            @foreach($datas as $d)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$d->nm_penyedia}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Mahasiswa</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            background-color: #ffffff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        th, td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }
        th {
            background-color: #DAC0A3;
        }
        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        tr{
            
        }
    </style>
</head>
<body>
    <h2>
        <center>Daftar Pegawai</center>
    </h2>
    <table>
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Nama</th>
                <th scope="col">NIP</th>
                <th scope="col">Alamat</th>
                <th scope="col">Tanggal Dibuat</th>
            </tr>
        </thead>
        <tbody>
            @php $no = 1; @endphp
            @foreach ($pegawai as $item)
            <tr>
                <td>{{$no}}</td>
                <td>{{$item->nama}}</td>
                <td>{{$item->nip}}</td>
                <td>{{$item->alamat}}</td>
                <td>{{$item->created_at}}</td>
            </tr>
            @php $no++; @endphp
            @endforeach
        </tbody>
    </table>
</body>
</html>
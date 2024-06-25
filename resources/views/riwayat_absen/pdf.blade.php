<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Riwayat Absen - PDF Export</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        table th, table td {
            border: 1px solid #ccc;
            padding: 8px;
        }
        table th {
            background-color: #f2f2f2;
        }
        img {
            max-width: 50px;
            height: auto;
        }
    </style>
</head>
<body>
    <h2>Riwayat Absen</h2>
    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>NIP</th>
                <th>Jabatan</th>
                <!-- <th>Photo</th> -->
                <th>Lokasi</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach($riwayatAbsens as $riwayatAbsen)
            <tr>
                <td>{{ $riwayatAbsen->name }}</td>
                <td>{{ $riwayatAbsen->nip }}</td>
                <td>{{ $riwayatAbsen->jabatan }}</td>
                <!-- <td><img src="{{ public_path('uploads/' . $riwayatAbsen->photo) }}" alt="Photo"></td> -->
                <td>{{ $riwayatAbsen->location_name }}</td>
                <td>{{ $riwayatAbsen->status }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>

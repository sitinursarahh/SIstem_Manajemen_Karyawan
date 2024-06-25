<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Informasi Gaji</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <style>
        /* Reset dan gaya dasar */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }
        body {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            background: rgb(255, 255, 255);
        }
        .container {
            max-width: 800px;
            margin: auto;
            padding: 20px;
            margin-top: 20px;
        }
        h1 {
            text-align: center;
            margin-bottom: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        table, th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        /* Gaya untuk sidebar */
        .sidebar {
            width: 220px;
            background-color: #2c3e50;
            color: white;
            padding: 15px;
            transition: transform 0.3s ease;
            transform: translateX(0);
            display: flex;
            flex-direction: column;
            height: 100vh;
            position: fixed;
            top: 0;
            left: 0;
            bottom: 0;
        }
        .sidebar.hide {
            transform: translateX(-100%);
        }
        .sidebar h2 {
            text-align: center;
            margin-bottom: 20px;
        }
        .sidebar ul {
            list-style: none;
            padding: 0;
            flex-grow: 1;
        }
        .sidebar ul li {
            margin: 15px 0;
        }
        .sidebar ul li a {
            color: white;
            text-decoration: none;
        }
        .sidebar ul li.active {
            background-color: #000000;
        }

        /* Gaya untuk konten utama */
        .main-content {
            margin-left: 220px;
            display: flex;
            flex-direction: column;
            transition: margin-left 0.3s ease;
            width: calc(100% - 220px);
        }
        .main-content.expanded {
            margin-left: 0;
            width: 100%;
        }
        header, footer {
            background-color: #34495e;
            color: white;
            padding: 10px;
            width: 100%;
            flex-shrink: 0;
            transition: margin-left 0.3s ease;
        }
        header.expanded {
            margin-left: 0;
        }
        .navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0 20px;
        }
        .toggle-btn {
            background: none;
            border: none;
            color: white;
            font-size: 24px;
            cursor: pointer;
        }
        .profile a {
            color: white;
            text-decoration: none;
            margin-left: 10px;
        }
        main {
            flex: 1;
            padding: 20px;
            overflow-y: auto;
            display: flex;
            align-items: flex-start;
        }

/* Gaya untuk modal */
    .detail-modal {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.5);
        display: none;
        justify-content: center;
        align-items: center;
    }
    .detail-content {
        background-color: white;
        padding: 20px;
        max-width: 600px;
        width: 80%;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
        position: relative;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
    }
    .back-btn {
        background: #007bff;
        color: white;
        padding: 10px 20px;
        border-radius: 5px;
        font-size: 16px;
        cursor: pointer;
        border: none;
        margin-top: 20px;
        display: block;
        margin-left: auto;
        margin-right: auto;
    }
    .detail-btn-top {
        position: absolute;
        top: 20px;
        right: 20px;
    }    </style>
</head>
<body>
    <div class="sidebar" id="sidebar">
        <h2>Presensiku</h2>
        <ul>
        <li><a href="{{ route('dashboard.index') }}">Home</a></li>
            @can('admin')
                <li><a href="{{ route('dashboard.showDataPengguna') }}">Data Pengguna</a></li>
            @endcan
            @cannot('admin')
            <li><a href="{{ route('dashboard.absenKaryawan') }}">Absen</a></li>
            @endcannot
            @can('admin')
            <li><a href="{{ route('riwayat_absen.index') }}">Riwayat Absen</a></li>
            @endcan
            <li><a href="{{ route('profil.show') }}">Profil</a></li>
            @cannot('admin')
            <li><a href="{{ route('pengumumanUser.indexUser') }}">Pengumuman</a></li>
            <li><a href="{{ route('informasiUser.gaji') }}">Informasi</a></li>
            @endcannot
            @can('admin')
            <li><a href="{{ route('pengumuman.index') }}">Pengumuman</a></li>
            <li><a href="{{ route('informasi.gaji') }}">Informasi</a></li>
            @endcan
        </ul>
        <div class="logout">
            <a href="{{ route('login.logout') }}" class="btn btn-danger">Logout</a>
        </div>
    </div>
    <div class="main-content" id="main-content">
        <header id="header">
            <nav class="navbar">
                <button class="toggle-btn" id="toggle-btn">☰</button>
                <h1>Informasi Gaji</h1>
                <div class="profile">
                    <span>{{ Auth::user()->name }}</span>
                </div>
            </nav>
        </header>
        <main>
            <div class="container">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nama</th>
                            <th scope="col">NIP</th>
                            <th scope="col">Jabatan</th>
                            <th scope="col">Total Gaji</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $n = 1;
                        @endphp
                        @foreach ($salaries as $salary)
                        <tr id="salary-{{ $salary->id }}" data-id="{{ $salary->id }}" data-nama="{{ $salary->nama }}" data-gaji-pokok="{{ $salary->gaji_pokok }}" data-tunjangan="{{ $salary->tunjangan }}" data-transport="{{ $salary->transport }}" data-lembur="{{ $salary->lembur }}">
                            <th scope="row">{{ $n }}</th>
                            <td>{{ $salary->nama }}</td>
                            <td>{{ $salary->nip }}</td>
                            <td>{{ $salary->jabatan }}</td>
                            <td>{{ $salary->gaji_pokok + $salary->tunjangan + $salary->transport + $salary->lembur }}</td>
                            <td>
                                <button class="btn btn-warning detail-btn" data-row-id="salary-{{ $salary->id }}">Detail</button> 
                            </td>
                        </tr>
                        @php
                            $n++;
                        @endphp
                        @endforeach
                    </tbody>
                </table>
            </div>
        </main>
    </div>

    <!-- Modal Detail -->
    <div class="detail-modal" id="detail-modal">
        <div class="detail-content">
            <div class="detail-btn-top">
                <button class="btn btn-danger close-btn" id="close-detail-modal" type="button">X</button>
            </div>
            <h2>Detail Gaji</h2>
            <div class="detail-info">
                <p><strong>Nama:</strong> <span id="detail-nama"></span></p>
                <p><strong>Gaji Pokok:</strong> <span id="detail-gaji-pokok"></span></p>
                <p><strong>Tunjangan:</strong> <span id="detail-tunjangan"></span></p>
                <p><strong>Transport:</strong> <span id="detail-transport"></span></p>
                <p><strong>Lembur:</strong> <span id="detail-lembur"></span></p>
                <p><strong>Total Gaji:</strong> <span id="detail-total-gaji"></span></p>
            </div>
            <button class="back-btn" id="back-to-table">Kembali</button>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-Or7StBUt7A4ZO3zY6QaSMy/a0o3Sp9Zr3FXzj13mY2GnRf59Lq2aBpJnF7AkR3d6" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-IpdBD2OsCgaW34+nGs5kZv26l+lGB4XsujnI1kFxO2NhO1lUeJps/2efI1EGc6vJ" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            // Toggle sidebar
            $('#toggle-btn').on('click', function() {
                $('#sidebar').toggleClass('hide');
                $('#main-content').toggleClass('expanded');
                $('#header').toggleClass('expanded');
            });

            // Show detail modal
            $('.detail-btn').on('click', function() {
                var rowId = $(this).data('row-id');
                var nama = $('#' + rowId).data('nama');
                var gajiPokok = $('#' + rowId).data('gaji-pokok');
                var tunjangan = $('#' + rowId).data('tunjangan');
                var transport = $('#' + rowId).data('transport');
                var lembur = $('#' + rowId).data('lembur');
                var totalGaji = gajiPokok + tunjangan + transport + lembur;

                $('#detail-nama').text(nama);
                $('#detail-gaji-pokok').text(gajiPokok);
                $('#detail-tunjangan').text(tunjangan);
                $('#detail-transport').text(transport);
                $('#detail-lembur').text(lembur);
                $('#detail-total-gaji').text(totalGaji);

                $('#detail-modal').fadeIn();
            });

            // Close detail modal
            $('#close-detail-modal').on('click', function() {
                $('#detail-modal').fadeOut();
            });

            // Back to table from detail modal
            $('#back-to-table').on('click', function() {
                $('#detail-modal').fadeOut();
            });
        });
    </script>
</body>
</html>

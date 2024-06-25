<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Pengumuman Karyawan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
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
        .sidebar ul li:hover {
            background-color: #34495e; /* Warna latar belakang saat di-hover */
        }
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
        .profile {
            color: white;
        }
        main {
            flex: 1;
            padding: 20px;
            overflow-y: auto;
        }
        .container {
            padding: 20px;
        }
        .alert {
            position: relative;
            padding: 20px;
            margin-bottom: 15px;
            border: 1px solid transparent;
            border-radius: .25rem;
            transition: all 0.3s ease;
        }
        .alert:hover {
            border-color: rgba(0, 123, 255, 0.5);
            box-shadow: 0 0 10px rgba(0, 123, 255, 0.5);
        }
        .alert-info {
            background-color: #d1ecf1;
            border-color: #bee5eb;
            color: #0c5460;
        }
    </style>
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
                <h1>@yield('title', 'Pengumuman Karyawan')</h1>
                <div class="profile">
                    <span>{{ Auth::user()->name }}</span>
                </div>
            </nav>
        </header>
        <main>
            <div class="container mt-3">
                <h2>Pengumuman Karyawan</h2>
                @foreach($pengumuman as $p)
                    <div class="alert alert-info">
                        <h4><strong>{{ $p->judul }}</strong></h4>
                        <p>{{ $p->isi }}</p>
                        <small>{{ $p->created_at ? $p->created_at->format('d-m-Y H:i') : 'Tanggal tidak tersedia' }}</small>
                    </div>
                @endforeach
            </div>
        </main>
    </div>
    <script>
        const toggleBtn = document.getElementById('toggle-btn');
        const sidebar = document.getElementById('sidebar');
        const mainContent = document.getElementById('main-content');
        const header = document.getElementById('header');

        toggleBtn.addEventListener('click', () => {
            sidebar.classList.toggle('hide');
            mainContent.classList.toggle('expanded');
            header.classList.toggle('expanded');
        });
    </script>
</body>
</html>

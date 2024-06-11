<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Absen Karyawan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }
        body {
            display: flex;
            flex-direction: column;
            height: 100vh;
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
        .main-content {
            margin-left: 220px;
            flex: 1;
            display: flex;
            flex-direction: column;
            transition: margin-left 0.3s ease;
        }
        .main-content.expanded {
            margin-left: 0;
        }
        header, footer {
            background-color: #34495e;
            color: white;
            padding: 10px;
            width: 100%;
            flex-shrink: 0;
        }
        .navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
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
        }
    </style>
</head>
<body>
    <div class="sidebar" id="sidebar">
        <h2>Presensiku</h2>
        <ul>
            <li><a href="{{ route('dashboard.index') }}">Home</a></li>
            <li><a href="{{ route('dashboard.showDataPengguna') }}">Data Pengguna</a></li>
            <li><a href="{{ route('dashboard.absenKaryawan') }}">Absen</a></li>
            <li><a href="{{ route('profil.show') }}">Profil</a></li>
            <li><a href="#">Informasi</a></li>
        </ul>
        <div class="logout">
            <a href="{{ route('login.logout') }}" class="btn btn-danger">Logout</a>
        </div>
    </div>
    <div class="main-content" id="main-content">
        <header>
            <nav class="navbar">
                <button class="toggle-btn" id="toggle-btn">☰</button>
                <h1>Absen Karyawan</h1>
                <div class="profile">
                    <span>{{ Auth::user()->name }}</span>
                </div>
            </nav>
        </header>
        
        <main>
            <div class="container mt-3">
                <div class="row">
                    <div class="col-md-10">
                        <h1>Form Absen Karyawan</h1>
                        
                        <form action="{{ route('absen.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="name" class="form-label">Nama</label>
                                <input type="text" class="form-control" id="name" name="name" value="{{ Auth::user()->name }}" readonly>
                            </div>
                            <div class="mb-3">
                                <label for="nip" class="form-label">NIP</label>
                                <input type="text" class="form-control" id="nip" name="nip" value="{{ Auth::user()->nip }}" readonly>
                            </div>
                            <div class="mb-3">
                                <label for="jabatan" class="form-label">Jabatan</label>
                                <input type="text" class="form-control" id="jabatan" name="jabatan" value="{{ Auth::user()->jabatan }}" readonly>
                            </div>
                            <div class="mb-3">
                                <label for="photo" class="form-label">Foto Bukti Absen</label>
                                <input type="file" class="form-control" id="photo" name="photo" accept="image/*" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Absen</button>
                        </form>
                    </div>
                </div>
            </div>
        </main>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>

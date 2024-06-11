<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Profil Pengguna</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>
<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <h1 class="mb-4">Profil Pengguna</h1>
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Informasi Profil</h5>
                        <p class="card-text"><strong>Nama:</strong> {{ $user->name }}</p>
                        <p class="card-text"><strong>Email:</strong> {{ $user->email }}</p>
                        <p class="card-text"><strong>NIP:</strong> {{ $user->nip }}</p>
                        <p class="card-text"><strong>Jabatan:</strong> {{ $user->jabatan }}</p>
                        <a href="{{ route('dashboard.index') }}" class="btn btn-primary">Kembali ke Dashboard</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>

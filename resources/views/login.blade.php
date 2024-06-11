<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Login</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    
        <style>
        body {
            background-image: url('https://i.pinimg.com/736x/1a/9a/df/1a9adf48a3715c09bc0614712db5f754.jpg'); /* Updated background image */
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center;
        }
        .background-image {
            position: absolute;
            top: 0;
            right: 0;
            width: 50%;
            height: 100%;
            background-image: url('https://pmb.akba.ac.id/templates/evolo/images/registration.png');
            background-size: 475px; /* Adjusted background size */
            background-repeat: no-repeat;
            background-position: center;
            z-index: -1;
        }
        .form-container {
            max-width: 700px;
            margin-top: 100px;
            margin-left: 100px;
            margin-right: 40px; /* Adjusted margin-left to move the container to the right */
            padding: 40px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            background-color: rgba(255, 255, 255, 1);
            border: 6px solid rgba(0, 0, 0, 0.1); 
        }
        .form-container label {
            text-align: left;
            display: block; 
        }
    </style>

    </head>
    <body>

        <div class="background-image"></div>
        <div class="container p-3">
            <div class="col-md-5">
            <h1 class="text-center">Login</h1>
            <div class="row justify-content-start mt-3">
            <div class="form-container text-center">
                <div class="mb-5">
                    <div class="form">
                        <form method="post" action="{{ route('login.auth') }}">
                            @csrf
                            
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="text" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}">
                                @error('email')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>                            
                                @enderror
                            </div>
                            
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password">
                                @error('password')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>                            
                                @enderror
                            </div>


                            <div class="mb-3 form-check">
                                <input type="checkbox" class="form-check-input" id="checkRemember" name="checkRemember">
                                <label class="form-check-label" for="checkRemember">Ingat Saya</label>
                            </div>                            


                            <div class="row text-end">
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-primary">Login</button>
                                    <a href="{{ route('register.show') }}" class="btn btn-success">Register</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>


        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    </body>
</html>

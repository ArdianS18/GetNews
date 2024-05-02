<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Login | GetMedia.Id</title>
    <link rel="icon" type="image/png" href="{{ asset('favicon.png') }}">
</head>

<body style="background-color: #F8FAFD">
    <div class="" style="margin-top:1%">
        <section>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12 col-lg-6 mt-5">
                        <div class="d-flex justify-content-center mt-4">
                            <img width="480px" src="{{asset('assets/img/auth/bg-login.svg')}}" alt="">
                        </div>
                    </div>
                    <div class="col-md-12 col-lg-6">
                        <div class="d-flex card p-5 m-5 border-none">
                            <div class="card-body">
                                <form method="POST" action="{{ route('login') }}">
                                    @csrf
                                    <div class="">
                                        <h4>Selamaat Datang di GetMedia</h4>
                                    </div>
        
                                    <!-- Email input -->
                                    <div class="form-outline mt-4 mb-4">
                                        <label class="form-label" for="email">Alamat Email</label>
                                        <input type="text" id="email"
                                            class=" @error('email') is-invalid @enderror form-control"
                                            placeholder="Masukan Alamat Email" name="email" value="{{ old('email') }}"
                                            required autocomplete="email" autofocus />
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
        
                                    </div>
        
                                    <!-- Password input -->
                                    <div class="form-outline mb-3">
                                        <label class="form-label" for="form3Example4">Password</label>
                                        <input id="password" type="password"
                                            class="form-control @error('password') is-invalid @enderror"
                                            name="password" required autocomplete="current-password"
                                            placeholder="Masukan Password">
        
                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
        
                                    <div class="d-flex justify-content-end align-items-center">
                                        <a href="{{ route('confirm.email') }}" class="text-body">Lupa password?</a>
                                    </div>

                                    <div class="mt-3">
                                        <button type="submit" class="btn btn-lg text-white w-100"
                                            style="background-color: #0F4D8A;">
                                            {{ __('Login') }}
                                        </button>
                                    </div>
        
                                    <div class="text-center mt-4 pt-2">
                                        <p class="small mt-2 pt-1 mb-0">Belum memiliki akun? <a href="{{ route('register') }}"
                                                class="link-primary">Daftar Sekarang</a></p>
                                    </div>
        
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <a href="#!" class="text-white me-4">
                <i class="fab fa-facebook-f"></i>
            </a>
            <a href="#!" class="text-white me-4">
                <i class="fab fa-twitter"></i>
            </a>
            <a href="#!" class="text-white me-4">
                <i class="fab fa-google"></i>
            </a>
            <a href="#!" class="text-white">
                <i class="fab fa-linkedin-in"></i>
            </a>
    </div>
    <!-- Right -->
    </div>
    </section>
    </div>
</body>

</html>

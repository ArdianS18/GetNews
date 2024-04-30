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

<body>
    <div class="container" style="margin-top: 10%;">
        <section>
            <div class="container-fluid h-custom">
                <div class="row d-flex justify-content-center align-items-center">
                    <div class="col-md-12 col-lg-6 col-xl-6">
                        <img width="500px" src="assets/img/log.png" alt="">
                    </div>
                    <div class="col-md-12 col-lg-6 col-xl-4 offset-xl-1">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <div
                                class="d-flex flex-row align-items-center justify-content-center justify-content-lg-start">
                                <h2>Login Akun GetMedia.id </h2>
                            </div>
                            @if ($errors->any())
                                @foreach ($errors->all() as $error)
                                    <div class="alert mt-3 alert-danger alert-dismissible fade show" role="alert">
                                        {{ $error }}
                                        <button type="button" class="btn-close" data-bs-dismiss="alert"
                                            aria-label="Close"></button>
                                    </div>
                                @endforeach
                            @endif

                            <!-- Email input -->
                            <div class="form-outline mt-4 mb-4">
                                <label class="form-label" for="email">Alamat Email</label>
                                <input type="text" id="email"
                                    class=" @error('email') is-invalid @enderror form-control form-control-lg"
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
                                    class="form-control form-control-lg @error('password') is-invalid @enderror"
                                    name="password" required autocomplete="current-password"
                                    placeholder="Masukan Password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="d-flex justify-content-between align-items-center">
                                <a href="{{ route('confirm.email') }}" class="text-body">Lupa password?</a>
                            </div>

                            <div class="text-center text-lg-start mt-4 pt-2">
                                <button type="submit" class="btn btn-lg text-white"
                                    style="padding-left: 2.5rem; padding-right: 2.5rem; background-color: #0F4D8A;">
                                    {{ __('Login') }}
                                </button>
                                <p class="small mt-2 pt-1 mb-0">Tidak Punya Akun? <a href="{{ route('register') }}"
                                        class="link-danger">Daftar</a></p>
                            </div>

                        </form>
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>

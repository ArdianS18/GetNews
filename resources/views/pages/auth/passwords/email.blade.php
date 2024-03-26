<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/remixicon.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/uicons-regular-rounded.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/flaticon_baxo.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/swiper.bundle.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/aos.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/header.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/footer.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/responsive.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/dark-theme.css') }}">
    <title>Reset Password | GetMedia.Id</title>
    <link rel="icon" type="image/png" href="{{ asset('favicon.png') }}">
</head>

<body>
    <div class="container" style="margin-top: 10%;">
        <section>
            <div class="container-fluid h-custom">
                <div class="row d-flex justify-content-center">
                    <div class="col-md-12 col-lg-6">
                        <img width="500px" src="{{asset('assets/img/forget-pw.svg')}}" alt="">
                    </div>
                    <div class="col-md-12 col-lg-6">
                        <div class="ms-5">
                            <h4 class="ms-5">Lupa Kata Sandi Anda?</h4>
                            <p class="ms-5">Silakan masukkan alamat email yang terkait dengan akun Anda dan Kami akan mengirimkan email berisi tautan untuk mengatur ulang kata sandi Anda.</p>
                            <form method="POST" action="{{ route('password.email') }}">
                                @csrf
                                <div class="row mb-3 mt-5">
                                    <label for="email" class="ms-5 form-label">{{ __('Email Address') }}</label>
                                    <div class="col-md-11">
                                        <input id="email" type="email" class="ms-5 form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-0">
                                    <div class="col-md-12 ms-5">
                                        <button type="submit" class="btn btn-md col-md-11 mt-3 text-white" style="background-color: #0F4D8A;">
                                            Kirim
                                        </button>
                                        <a href="/login" class="btn btn-md col-md-11 mt-3" style="background-color: #CAD9E7; font-color: #0F4D8A;">
                                            Kembali Ke Login
                                        </a>
                                    </div>
                                </div>
                            </form>
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
    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/dist/libs/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>

</body>

</html>

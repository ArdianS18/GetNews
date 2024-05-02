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

<body style="background-color: #F8FAFD;">
    <div class="align-item-center mt-3">
        <section>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12 col-lg-6">
                        <div class="">
                            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24"><path fill="#393939" d="M9.904 17.308L4.596 12l5.308-5.308l.708.72L6.523 11.5h12.88v1H6.524l4.089 4.088z"/></svg>
                            <img src="{{asset('assets/img/logo-getmedia-dark.svg')}}" width="140" alt="">
                        </div>
                        <div class="d-flex justify-content-center p-5 mt-5">
                            <img width="500px" src="{{asset('assets/img/auth/bg-forget-password.svg')}}" alt="">
                        </div>
                    </div>
                    <div class="col-md-12 col-lg-6 mt-5">
                        <div class="card p-5 mt-5">
                            <div class="card-body">
                                <div class="mt-4">
                                    <h4 class="mb-3">Lupa Kata Sandi Anda?</h4>
                                    <p class="mt-4
                                    
                                    mb-5">Silakan masukkan alamat email yang terkait dengan akun Anda dan Kami akan mengirimkan email berisi tautan untuk mengatur ulang kata sandi Anda.</p>
                                    <form method="POST" action="{{ route('password.email') }}">
                                        @csrf
                                        <div class="">
                                            <label for="email" class="form-label">{{ __('Email Address') }}</label>
                                                <input id="email" type="email" class=" form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                                @error('email')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                        </div>
                                        <div class="row mb-0">
                                            <div class="col-md-12 mb-5">
                                                <button type="submit" class="btn btn-md col-md-11 mt-5 w-100 text-white" style="background-color: #0F4D8A;">
                                                    Kirim
                                                </button>
                                                <a href="/login" class="btn btn-md col-md-11 w-100 mt-4" style="background-color: #CAD9E7; font-color: #0F4D8A;">
                                                    Kembali Ke Login
                                                </a>
                                            </div>
                                        </div>
                                    </form>
                                </div>                                
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
    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/dist/libs/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>

</body>

</html>

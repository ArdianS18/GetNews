{{-- @extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Reset Password') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('password.update') }}">
                        @csrf

                        <input type="hidden" name="token" value="{{ $token }}">

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Reset Password') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection --}}


<!DOCTYPE html>
<html lang="en">

{{-- <head>
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
</head> --}}

<head><meta http-equiv="content-type" content="text/html;charset=UTF-8"><!-- /Added by HTTrack -->

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0">

    <title>Reset Password | GetMedia.Id</title>
    <meta name="description" content="Start your development with a Dashboard for Bootstrap 5">
    <meta name="keywords" content="dashboard, bootstrap 5 dashboard, bootstrap 5 design, bootstrap 5">
    <meta name="csrf-token" content="y0lzh53YmoH0xFgY2vFjhD4S1TOiq6lE58zbW7ec">
    <link rel="canonical" href="https://1.envato.market/vuexy_admin">
    <link rel="icon" type="image/png" href="{{ asset('favicon.png') }}">

    <link rel="preconnect" href="https://fonts.googleapis.com/">
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin="">
    <link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&amp;display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://task.hummatech.com/assets/vendor/css/pages/page-auth.css">
    <link rel="stylesheet" type="text/css" href="https://demos.pixinvent.com/vuexy-html-laravel-admin-template/demo/assets/vendor/css/rtl/core.css?id=9dd8321ea008145745a7d78e072a6e36" class="template-customizer-core-css"><link rel="stylesheet" type="text/css" href="https://demos.pixinvent.com/vuexy-html-laravel-admin-template/demo/assets/vendor/css/rtl/theme-default.css?id=a4539ede8fbe0ee4ea3a81f2c89f07d9" class="template-customizer-theme-css">
</head>

<body style="background-color: #FFFFFF">
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-5J3LMKC" height="0" width="0"
        style="display: none; visibility: hidden"></iframe></noscript>
    <div class="authentication-wrapper authentication-cover authentication-bg">
        <div class="authentication-inner row">
            <div class="d-none d-lg-flex col-lg-7 p-0">
                <div class="auth-cover-bg auth-cover-bg-color"  style="background-color: #F7F7F7">
                    <div class="mt-4 ms-4">
                        <a href="{{route('login')}}">
                            <img src="{{asset('assets/img/auth/get-back.svg')}}" width="190" alt="">
                        </a>
                    </div>
                    <div class="d-flex justify-content-center align-items-center p-5">
                        <img src="{{asset('assets/img/auth/bg-forget-password.svg')}}" width="550px" alt="auth-login-cover" class="img-fluid my-5" data-app-dark-img="illustrations/auth-login-illustration-dark.html">
                    </div>
                </div>
            </div>
            <div class="d-flex col-12 col-lg-5 align-items-center p-sm-5 p-4" >
                <div class="w-px-400 mx-auto">
                    <h3 class="mb-3">Reset Kata Sandi Anda.</h3>
                    <p class="mb-5">Jaga keamanan akun Anda dengan mengganti kata sandi secara teratur. Mohon masukkan kata sandi lama dan yang baru untuk melanjutkan.</p>

                    @if ($errors->any())
                        @foreach ($errors->all() as $error)
                            <div class="alert mt-3 alert-danger alert-dismissible fade show" role="alert">
                                {{ $error }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                        @endforeach
                    @endif

                    <form method="POST" action="{{ route('password.update') }}">
                        @csrf
                        <input type="hidden" name="token" value="{{ $token }}">

                        <div class="row mb-3 mt-5">
                            <label for="email" class="form-label">{{ __('Email Address') }}</label>
                            <div class="col-md-11">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3 mt-2">
                            <label for="password" class="form-label">{{ __('Password') }}</label>

                            <div class="col-md-11">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3 mt-3">
                            <label for="password" class="form-label">{{ __('Confirm Password') }}</label>

                            <div class="col-md-11">
                                <input id="password-confirm" type="password" class="form-control @error('password') is-invalid @enderror" name="password_confirmation" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-md col-md-11 mt-3 text-white" style="background-color: #0F4D8A;">
                                    Ubah
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</body>

</html>

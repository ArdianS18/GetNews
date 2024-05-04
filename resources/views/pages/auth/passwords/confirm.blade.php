<!DOCTYPE html>
<html lang="en">

<head><meta http-equiv="content-type" content="text/html;charset=UTF-8"><!-- /Added by HTTrack -->

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0">

    <title>Login | GetMedia.Id</title>
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



<body style="background-color: #F7F7F7">

    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-5J3LMKC" height="0" width="0"
        style="display: none; visibility: hidden"></iframe></noscript>
<div class="authentication-wrapper authentication-cover authentication-bg">
    <div class="authentication-inner row">
        <div class="d-none d-lg-flex col-lg-7 p-0">
            <div class="mt-3 ms-3">
                <a href="{{route('login')}}">
                    <img src="{{asset('assets/img/auth/get-back.svg')}}" width="190" alt="">
                </a>
            </div>
            <div class="auth-cover-bg auth-cover-bg-color d-flex align-items-center">
                <img src="{{asset('assets/img/auth/bg-forget-password.svg')}}" width="520px" alt="auth-login-cover" class="img-fluid my-5 " data-app-dark-img="illustrations/auth-login-illustration-dark.html">
            </div>
        </div>
        <div class="d-flex col-12 col-lg-5 align-items-center p-sm-5 p-4" >
            <div class="w-100 h-100" style="background-color: #FFFFFF;border-radius:20px">
                <div class="w-px-400 mx-auto">
                    <h3 class="mb-3"  style="margin-top: 30%">Lupa Kata Sandi Anda?</h3>
	                <p class="mt-4">Silakan masukkan alamat email yang terkait dengan akun Anda dan Kami akan mengirimkan email berisi tautan untuk mengatur ulang kata sandi Anda.</p>
	
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
                        <div class="mb-3">
                            <label for="password" class=" form-label">{{ __('Password') }}</label>
                            <input id="password" type="password" class=" form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                        </div>
                        <div class="mb-3">
                            <label for="password" class=" form-label">{{ __('Confirm Password') }}</label>
                            <input id="password" type="password" class=" form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                        </div>
                        
                        <button type="submit" class="btn d-grid w-100 waves-effect text-white waves-light" style="background-color: #175A95;">
                            Kirim
                        </button>
                        <a href="/login" class="btn btn-md col-md-11 w-100 mt-4 btn-light-primary text-primary" style="background-color: #d5e3ef;">
                            Kembali Ke Login
                        </a>
                    <input type="hidden">
                        </form>

                    <div class="text-center mt-4">
                            <p>Belum memiliki akun?<a href="{{route('register')}}"> Daftar Sekarang!</a></p>
                    </div>
                    

                </div>
            </div>
        </div>
    </div>
</div>

</body>


</html>

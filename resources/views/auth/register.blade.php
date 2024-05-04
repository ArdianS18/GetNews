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
                <img src="{{asset('assets/img/auth/bg-registrasi.svg')}}" width="590px" alt="auth-login-cover" class="img-fluid my-5 auth-illustration" data-app-dark-img="illustrations/auth-login-illustration-dark.html">
            </div>
        </div>
        <div class="d-flex col-12 col-lg-5 align-items-center p-sm-5 p-4" >
            <div class="w-100 h-100" style="background-color: #FFFFFF;border-radius:20px">
                <div class="w-px-500 mx-auto">
                    <h3 class="mb-1" style="margin-top: 17%">Buat Akun GetMedia.id</h3>
                    @if ($errors->any())
                        @foreach ($errors->all() as $error)
                            <div class="alert mt-3 alert-danger alert-dismissible fade show" role="alert">
                                {{ $error }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                        @endforeach
                    @endif
                        <form id="formAuthentication" class="py-3" action="{{route('register')}}" method="POST">
                            @csrf   
                            <div class="row">                  
                                <div class="my-1 col-12">
                                    <label for="name" class="form-label">Nama Lengkap</label>
                                    <input type="text" class="form-control" id="name" name="name" placeholder="Masukkan name Anda">
                                </div>    
                                <div class="my-1 col-lg-6">
                                    <label for="phone_number" class="form-label">Nomor Hp</label>
                                    <input type="text" id="phone_number" class="form-control" name="phone_number" placeholder="Masukkan email Anda">
                                </div>
                                <div class="my-1 col-lg-6">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" id="email" class="form-control" name="email" placeholder="Masukkan email Anda">
                                </div>
                                <div class="my-1 col-lg-6">
                                    <label for="password" class="form-label">Password</label>
                                    <div class="input-group input-group-merge has-validation">
                                        <input type="password" id="password" class="form-control" name="password" placeholder="············">
                                        <span class="input-group-text cursor-pointer"></span>
                                    </div>
                                </div>
                                <div class="my-1 col-lg-6">
                                    <label for="password" class="form-label">Konfirmasi Password</label>
                                    <input type="password" id="password" class="form-control" name="password" placeholder="Masukkan password Anda">
                                </div>
                                <div class="my-1 col-lg-12">
                                    <label for="addres" class="form-label">Alamat</label>
                                    <textarea type="text" id="address" rows="4" class="form-control" name="address" placeholder="Masukkan address Anda"></textarea>
                                </div>
                            </div>

                            <button type="submit" class="btn mt-3 d-grid w-100 waves-effect text-white waves-light" style="background-color: #175A95;">
                                Masuk
                            </button>
                        </form>

                        <div class="text-center">
                                <p>Sudah memiliki akun?<a href="{{route('login')}}"> Masuk Sekarang!</a></p>
                        </div>
                    

                </div>
            </div>
        </div>
    </div>
</div>

</body>


</html>

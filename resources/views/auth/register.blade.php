<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>GetMedia | Register</title>
    <style>
        .important{
            color: red;
        }
    </style>
</head>

<body style="background-color: #F8FAFD;">
    <section>
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6 col-md-12 mt-2">
                    <div class="mt-3">
                        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24"><path fill="#393939" d="M9.904 17.308L4.596 12l5.308-5.308l.708.72L6.523 11.5h12.88v1H6.524l4.089 4.088z"/></svg>
                        <img src="{{asset('assets/img/logo-getmedia-dark.svg')}}" width="140" alt="">
                    </div>
                    <div class="d-flex justify-content-center mt-5 pt-5">
                        <img width="480px" class="img-fluid" style="height:auto; object-fit:cover" src="{{ asset('assets/img/auth/bg-registrasi.svg') }}" alt="">
                    </div>
                </div>
                <div class="col-md-12 col-lg-6 mt-3">
                    <div class="card p-5 m-5 border-none">
                        <div class="card-body">
                            <form method="POST" action="{{ route('register') }}">
                                @csrf
                                <div class="pt-4 pb-4">
                                    <h4>Daftar Akun GetMedia.id</h4>
                                </div>


                                <div class="from-outline mt-2  mb-4">
                                    <label class="form-label" for="email">Nama Lengkap<span class="important">*</span></label>
                                    <input id="name" type="text" placeholder="Nama Lengkap"
                                        class="form-control @error('name') is-invalid @enderror" name="name"
                                        value="{{ old('name') }}" autocomplete="name" autofocus>

                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="row justify-content-between mt-2">
                                    <div class="col-lg-6 col-md-12 from-outline mb-2">
                                        <label class="form-label" for="nomor">Nomor Hp<span class="important">*</span></label>
                                        <input id="nomor" type="text" placeholder="Nomor Hp"
                                            class="gap-8 form-control @error('nomor') is-invalid @enderror" name="phone_number"
                                            value="{{ old('phone_number') }}" autocomplete="name" autofocus>

                                        @error('nomor')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="col-lg-6 col-md-12 from-outline mb-2 padding-right-2">
                                        <label class="form-label" for="email">Email<span class="important">*</span></label>
                                        <input id="email" type="email" placeholder="email"
                                            class="gap-8 form-control @error('email') is-invalid @enderror" name="email"
                                            value="{{ old('email') }}" autocomplete="email" autofocus>

                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row justify-content-between mt-2">
                                    <div class="col-lg-6 col-md-12 from-outline mb-2">
                                        <label class="form-label" for="password">Password<span class="important">*</span></label>
                                        <input id="password" type="password" placeholder="Password"
                                            class="form-control @error('password') is-invalid @enderror" name="password"
                                            value="{{ old('password') }}" autocomplete="password" autofocus>

                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="col-lg-6 col-md-12 from-outline mb-2">
                                        <label class="form-label" for="password_confirmation">Konfirmasi Password<span class="important">*</span></label>
                                        <input id="password" type="password" placeholder="Password"
                                            class="form-control @error('password_confirmation') is-invalid @enderror"
                                            name="password_confirmation" value="{{ old('password') }}"
                                            autocomplete="password" autofocus>
                                        @error('password_confirmation')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <button type="submit" class="btn btn-lg mt-3 text-white"
                                    style="width:-webkit-fill-available;background-color: #0F4D8A;">
                                    Daftar
                                </button>

                                <div class="text-center mt-2 pt-2  pb-5">
                                    <p class="small mt-2 pt-1 mb-0">Sudah memiliki akun? <a href="{{ route('login') }}"
                                            class="link-primary">Masuk Sekarang</a></p>
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
        </div>
    </section>
</body>

</html>

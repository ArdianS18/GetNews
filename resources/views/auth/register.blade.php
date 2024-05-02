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

<body>
    <section style="margin-top: 8%">
        <div class="container">
            <div class="row">
                <div class="col-lg-7 col-md-12 d-flex justify-content-center">
                    <img width="500px" class="img-fluid" style="height:auto; object-fit:cover" src="{{ asset('assets/img/register.svg') }}"
                        alt="">
                </div>
                <div class="col-md-12 col-lg-5">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="row align-items-center justify-content-center justify-content-lg-start">
                            <h2>Daftar Akun GetMedia.id</h2>
                        </div>


                        <div class="from-outline mt-2">
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
                        <div class="from-outline mt-2 mb-4">
                            <label class="form-label" for="email">Alamat<span class="important">*</span></label>
                            <textarea name="address" id="alamat" placeholder="Masukan Alamat" cols="10" rows="5"
                                class="form-control @error('alamat') is-invalid @enderror" value="{{ old('alamat') }}"
                                autocomplete="alamat" autofocus></textarea>
                            @error('alamat')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-lg text-white"
                            style="width:-webkit-fill-available;background-color: #0F4D8A;">
                            Daftar
                        </button>
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
        </div>
    </section>
</body>

</html>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Document</title>
</head>

<body>
    <div class="container" style="margin-top: 10%;">
        <section>
            <div class="container-fluid h-custom">
                <div class="row d-flex justify-content-center align-items-center">
                    <div class="col-md-12 col-lg-6 col-xl-6">
                        <img width="500px" src="{{ asset('storage/public/log.png') }}" alt="">
                    </div>
                    <div class="col-md-12 col-lg-6 col-xl-4 offset-xl-1">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <div
                                class="d-flex flex-row align-items-center justify-content-center justify-content-lg-start">
                                <h2>Daftar Akun GetMedia.id</h2>
                            </div>
                            <!-- Email input -->
                            <div class="form-outline mt-4 mb-4">
                                <label class="form-label" for="email">Email address</label>
                                <input type="email" id="email"
                                    class=" @error('email') is-invalid @enderror form-control form-control-lg"
                                    placeholder="Enter a valid email address" name="email" value="{{ old('email') }}"
                                    required autocomplete="email" autofocu />
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
                                    placeholder="Enter password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="d-flex justify-content-between align-items-center">
                                <!-- Checkbox -->
                                <div class="form-check mb-0">
                                    <input class="form-check-input me-2" type="checkbox" name="remember" id="remember"
                                        {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                                <a href="{{ route('password.request') }}" class="text-body">Forgot password?</a>
                            </div>

                            <div class="text-center text-lg-start mt-4 pt-2">
                                <button type="submit" class="btn btn-lg text-white"
                                    style="padding-left: 2.5rem; padding-right: 2.5rem; background-color: #0F4D8A;">
                                    {{ __('Login') }}
                                </button>
                                <p class="small mt-2 pt-1 mb-0">Don't have an account? <a href="{{ route('register') }}"
                                        class="link-danger">Register</a></p>
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
</body>

</html>

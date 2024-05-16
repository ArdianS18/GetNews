<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="Sebuah portal berita untuk membaca berita yang saedang trending dan hot">
  @include('layouts.user.css')

    <link rel="icon" type="image/png" href="{{ asset('favicon.png') }}">
    @yield('style')

</head>

<body>

    {{-- @if (Auth::check() && !Auth::user()->email_verified_at)
        <div class="alert alert-danger mb-n1 text-center" role="alert">
            Anda belum verifikasi email,
            <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                @csrf
                <button type="submit"
                    class="text-danger btn btn-link p-0 m-0 align-baseline">{{ __('verifikasi ulang') }}</button>.
            </form>
        </div>
     @endif --}}

    <div class="loader-wrapper">
        <div class="loader"></div>
        <div class="loader-section section-left"></div>
        <div class="loader-section section-right"></div>
    </div>

    <div class="switch-theme-mode">
        <label id="switch" class="switch">
            <input type="checkbox" onchange="toggleTheme()" id="slider" />
            <span class="slider round"></span>
        </label>
    </div>
    @include('layouts.user.navbar-header')
    @include('layouts.user.mobile-navbar')

    @yield('content')

    {{-- <script data-cfasync="false" src="{{ asset('../../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js') }}"></script> --}}
    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/js/swiper.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/js/aos.js') }}"></script>
    <script src="{{ asset('assets/js/main.js') }}"></script>

    {{-- <script src="{{ asset('assets/dist/libs/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/dist/libs/simplebar/dist/simplebar.min.js') }}"></script>
    <script src="{{ asset('assets/dist/libs/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
    <!-- core files -->
    <script src="{{ asset('assets/dist/js/app.min.js') }}"></script>
    <script src="{{ asset('assets/dist/js/app.init.js') }}"></script>
    <script src="{{ asset('assets/dist/js/app-style-switcher.js') }}"></script>
    <script src="{{ asset('assets/dist/js/sidebarmenu.js') }}"></script>
    <script src="{{ asset('assets/dist/js/custom.js') }}"></script> --}}
    <!-- current page js files -->
    {{-- <script src="{{ asset('assets/dist/libs/apexcharts/dist/apexcharts.min.js') }}"></script> --}}
    {{-- <script src="{{ asset('assets/dist/js/dashboard5.js') }}"></script> --}}
    <script src="{{ asset('admin/dist/libs/sweetalert2/dist/sweetalert2.min.js') }}"></script>

    @include('layouts.user.footer')
    @yield('script')
    <script>
          document.addEventListener("DOMContentLoaded", function() {
            var searchBtn = document.getElementById('search-btn');

            searchBtn.addEventListener('click', function() {
                window.scrollTo({
                    top: 0,
                    behavior: 'smooth'
                });
            });
        });
    </script>
</body>

</html>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <meta name="description" content="Sebuah portal berita untuk membaca berita yang saedang trending dan hot">
    @include('layouts.user.css')
    <title>@yield('title', 'Halaman') - {{ config('app.name') }} </title>

    <link rel="icon" type="image/png" href="{{ asset('favicon.png') }}">
    @yield('style')
    <style>
        .theme-dark .tag-list li a {
            background-color: transparent;
            border: 1px solid rgba(255, 255, 255, 0.2);
            color: var(--whiteColor);

            &.active,
            &:hover {
                background-color: var(--secondaryColor);
            }
        }

        .theme-dark .searchModal .modal-dialog {
            background-color: #222 !important;
        }

        .theme-dark .searchModal .modal-dialog .btn-close {
            color: #fff !important;
        }

        .modal.show {
            display: block;
        }

        .modal-dialog .form-control {
            width: 100%;
        }

        @media (max-width: 768px) {
            .logo-mobile {
                width: 150px;
            }

        }

        @media (max-width: 992px) {
            .sidebar-toggler {
                width: 1% !important;
            }
        }


        body {
            overflow-x: hidden;
        }
    </style>
</head>

<body>
    @include('layouts.user.navbar-header')
    @include('layouts.user.mobile-navbar')
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


    @yield('content')
    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/js/swiper.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/js/aos.js') }}"></script>
    <script src="{{ asset('assets/js/main.js') }}"></script>


    <script src="{{ asset('admin/dist/libs/sweetalert2/dist/sweetalert2.min.js') }}"></script>


    @include('layouts.user.footer')
    @yield('script')

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var input = document.getElementById('search-input');
            var errorText = document.getElementById('error-text-input');

            function checkInput() {
                if (input && input.value.trim() === '') {
                    input.focus();
                    input.classList.add('border-danger');
                    if (errorText) {
                        errorText.classList.add('text-danger');
                        errorText.textContent = 'Input harus diisi';
                    }
                    return false; 
                } else {
                    input.classList.remove('error');
                    if (errorText) {
                        errorText.classList.remove('text-danger');
                        errorText.textContent = '';
                    }
                    return true; 
                }
            }

            document.getElementById('save-btn').addEventListener('click', function(event) {
                if (!checkInput()) {
                    event.preventDefault(); 
                }
            });

            var searchBtns = document.querySelectorAll('#search-btn');

            searchBtns.forEach(function(searchBtn) {
                searchBtn.addEventListener('click', function() {
                    window.scrollTo({
                        top: 0,
                        behavior: 'smooth'
                    });

                    if (input) {
                        input.focus();
                    }
                });
            });
        });
    </script>
</body>

</html>

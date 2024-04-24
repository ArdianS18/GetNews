@extends('layouts.user.app')
@section('style')
<head>
    <title>{{ env('APP_NAME') }}</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="handheldfriendly" content="true" />
    <meta name="MobileOptimized" content="width" />
    <meta name="description" content="Mordenize" />
    <meta name="author" content="" />
    <meta name="keywords" content="Mordenize" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!--  Favicon -->
    <link rel="shortcut icon" type="{{ asset('image/png') }}" href="{{ env('APP_LOGO') }}" />
    <!-- Owl Carousel  -->
    <link rel="stylesheet" href="{{ asset('admin/assets/dist/libs/owl.carousel/dist/assets/owl.carousel.min.css') }}">
    <!-- Core Css -->
    <link rel="stylesheet" href="{{ asset('admin/dist/libs/sweetalert2/dist/sweetalert2.min.css') }}">
    <link id="themeColors" rel="stylesheet" href="{{ asset('admin/dist/css/style.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('admin/dist/libs/prismjs/themes/prism-okaidia.min.css') }}">
    <link rel="stylesheet"
        href="{{ asset('admin/dist/libs/bootstrap-switch/dist/css/bootstrap3/bootstrap-switch.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/dist/libs/select2/dist/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/dist/libs/sweetalert2/dist/sweetalert2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/dist/css/app.css') }}">
    <link rel="stylesheet"
        href="{{ asset('admin/dist/libs/bootstrap-duallistbox/dist/bootstrap-duallistbox.min.css') }}">
    <style>
        .important {
            color: red;
        }
    </style>
</head>
@endsection
@section('content')
<div class="ps-5 pe-5">
<div class="card shadow-sm position-relative overflow-hidden" style="background-color: #175A95;">
    <div class="card-body px-4 py-4">
        <div class="row justify-content-between">
            <div class="col-8 text-white">
                <h4 class="fw-semibold mb-4 mt-4 text-white">Hi, Daffa Prasetya</h4>
                <p class="fs-4">Jangan lewatkan kenyamanan membaca berita dengan firtu berlangganan memberikan pengalaman membaca yang lebih baik</p>
            </div>
            <div class="col-2">
                <div class="text-center">
                    <img src="{{asset('assets/img/bg-berlangganan.svg')}}" width="200px" alt="" class="">
                </div>
            </div>
        </div>
    </div>
</div>

<div class="d-flex mt-4 mb-4 justify-content-center">
    <h4>Menu Berlangganan</h4>
</div>

<div class="container">
    <div class="row pb-4">
        <div class="col-lg-4 col-md-6 col-sm-12 card-hover">
            <div class="card bg-transparent">
                <div class="mt-5 text-center">
                    <h4 class="fw-semibold">Lorem Ipsum dolor</h4>
                </div>
                <div class="d-flex mt-3 justify-content-center">
                    <img src="{{ asset('premium.svg') }}" width="45%" height="200" style="object-fit:cover" class="mb-4" alt="...">
                </div>
                <div class="d-flex align-items-center">
                    <div class="ms-auto">
                        <div class="d-flex justify-content-end">

                        </div>
                    </div>
                </div>
                <div class="ms-4 d-flex justify-content-center mb-3 mt-2">
                    <h2 class="card-text text-info">Rp 170.000</h2>
                    <h5 class="mb-0 mt-2 text-info">/bulan</h5>
                </div>
                <div class="px-4">
                    <div class="row">

                        <div class="col-lg-12 mb-3" style="display: flex; align-items: center;">
                            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 36 35" fill="none" style="flex-shrink: 0; margin-right: 10px;">
                                <path d="M18 3.28125C9.93586 3.28125 3.375 9.65986 3.375 17.5C3.375 25.3401 9.93586 31.7188 18 31.7188C26.0641 31.7188 32.625 25.3401 32.625 17.5C32.625 9.65986 26.0641 3.28125 18 3.28125ZM25.6113 12.7347L16.1613 23.6722C16.0577 23.7922 15.9287 23.8892 15.7831 23.9565C15.6375 24.0239 15.4788 24.06 15.3176 24.0625H15.2986C15.1409 24.0624 14.985 24.0302 14.841 23.9677C14.6969 23.9053 14.568 23.8142 14.4626 23.7002L10.4126 19.3252C10.3097 19.2191 10.2297 19.0942 10.1772 18.9576C10.1248 18.821 10.1009 18.6757 10.1071 18.53C10.1132 18.3844 10.1493 18.2414 10.2131 18.1095C10.2769 17.9776 10.3671 17.8594 10.4786 17.7619C10.59 17.6644 10.7204 17.5895 10.862 17.5417C11.0037 17.4938 11.1537 17.474 11.3033 17.4834C11.453 17.4927 11.5992 17.5311 11.7333 17.5962C11.8675 17.6612 11.9869 17.7517 12.0846 17.8623L15.2691 21.3021L23.8887 11.3278C24.082 11.1105 24.3556 10.9759 24.6502 10.9531C24.9448 10.9302 25.2368 11.021 25.4631 11.2059C25.6894 11.3907 25.8319 11.6547 25.8596 11.9407C25.8873 12.2268 25.7981 12.512 25.6113 12.7347Z" fill="#13DEB9"></path>
                            </svg>
                            <p class="fs-3 fw-semibold" style="margin: 0; flex-grow: 1;">Daftar Hadir Tamu</p>
                        </div>
                        <div class="col-lg-12 mb-3" style="display: flex; align-items: center;">
                            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 36 35" fill="none" style="flex-shrink: 0; margin-right: 10px;">
                                <path d="M18 3.28125C9.93586 3.28125 3.375 9.65986 3.375 17.5C3.375 25.3401 9.93586 31.7188 18 31.7188C26.0641 31.7188 32.625 25.3401 32.625 17.5C32.625 9.65986 26.0641 3.28125 18 3.28125ZM25.6113 12.7347L16.1613 23.6722C16.0577 23.7922 15.9287 23.8892 15.7831 23.9565C15.6375 24.0239 15.4788 24.06 15.3176 24.0625H15.2986C15.1409 24.0624 14.985 24.0302 14.841 23.9677C14.6969 23.9053 14.568 23.8142 14.4626 23.7002L10.4126 19.3252C10.3097 19.2191 10.2297 19.0942 10.1772 18.9576C10.1248 18.821 10.1009 18.6757 10.1071 18.53C10.1132 18.3844 10.1493 18.2414 10.2131 18.1095C10.2769 17.9776 10.3671 17.8594 10.4786 17.7619C10.59 17.6644 10.7204 17.5895 10.862 17.5417C11.0037 17.4938 11.1537 17.474 11.3033 17.4834C11.453 17.4927 11.5992 17.5311 11.7333 17.5962C11.8675 17.6612 11.9869 17.7517 12.0846 17.8623L15.2691 21.3021L23.8887 11.3278C24.082 11.1105 24.3556 10.9759 24.6502 10.9531C24.9448 10.9302 25.2368 11.021 25.4631 11.2059C25.6894 11.3907 25.8319 11.6547 25.8596 11.9407C25.8873 12.2268 25.7981 12.512 25.6113 12.7347Z" fill="#13DEB9"></path>
                            </svg>
                            <p class="fs-3 fw-semibold" style="margin: 0; flex-grow: 1;">Daftar Hadir Tamu</p>
                        </div>
                        <div class="col-lg-12 mb-3" style="display: flex; align-items: center;">
                            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 36 35" fill="none" style="flex-shrink: 0; margin-right: 10px;">
                                <path d="M18 3.28125C9.93586 3.28125 3.375 9.65986 3.375 17.5C3.375 25.3401 9.93586 31.7188 18 31.7188C26.0641 31.7188 32.625 25.3401 32.625 17.5C32.625 9.65986 26.0641 3.28125 18 3.28125ZM25.6113 12.7347L16.1613 23.6722C16.0577 23.7922 15.9287 23.8892 15.7831 23.9565C15.6375 24.0239 15.4788 24.06 15.3176 24.0625H15.2986C15.1409 24.0624 14.985 24.0302 14.841 23.9677C14.6969 23.9053 14.568 23.8142 14.4626 23.7002L10.4126 19.3252C10.3097 19.2191 10.2297 19.0942 10.1772 18.9576C10.1248 18.821 10.1009 18.6757 10.1071 18.53C10.1132 18.3844 10.1493 18.2414 10.2131 18.1095C10.2769 17.9776 10.3671 17.8594 10.4786 17.7619C10.59 17.6644 10.7204 17.5895 10.862 17.5417C11.0037 17.4938 11.1537 17.474 11.3033 17.4834C11.453 17.4927 11.5992 17.5311 11.7333 17.5962C11.8675 17.6612 11.9869 17.7517 12.0846 17.8623L15.2691 21.3021L23.8887 11.3278C24.082 11.1105 24.3556 10.9759 24.6502 10.9531C24.9448 10.9302 25.2368 11.021 25.4631 11.2059C25.6894 11.3907 25.8319 11.6547 25.8596 11.9407C25.8873 12.2268 25.7981 12.512 25.6113 12.7347Z" fill="#13DEB9"></path>
                            </svg>
                            <p class="fs-3 fw-semibold" style="margin: 0; flex-grow: 1;">Daftar Hadir Tamu</p>
                        </div>

                    </div>

                </div>

                <div class="px-4 mb-3 mt-2">
                    <button class="btn w-100 btn-light-primary text-primary">
                        Beli
                    </button>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-12 card-hover">
            <div class="card bg-transparent">
                <div class="mt-5 text-center">
                    <h4 class="fw-semibold">Lorem Ipsum dolor</h4>
                </div>
                <div class="d-flex mt-3 justify-content-center">
                    <img src="{{ asset('premium.svg') }}" width="45%" height="200" style="object-fit:cover" class="mb-4" alt="...">
                </div>
                <div class="d-flex align-items-center">
                    <div class="ms-auto">
                        <div class="d-flex justify-content-end">

                        </div>
                    </div>
                </div>
                <div class="ms-4 d-flex justify-content-center mb-3 mt-2">
                    <h2 class="card-text text-info">Rp 170.000</h2>
                    <h5 class="mb-0 mt-2 text-info">/bulan</h5>
                </div>
                <div class="px-4">
                    <div class="row">
                        <div class="col-lg-12 mb-3" style="display: flex; align-items: center;">
                            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 36 35" fill="none" style="flex-shrink: 0; margin-right: 10px;">
                                <path d="M18 3.28125C9.93586 3.28125 3.375 9.65986 3.375 17.5C3.375 25.3401 9.93586 31.7188 18 31.7188C26.0641 31.7188 32.625 25.3401 32.625 17.5C32.625 9.65986 26.0641 3.28125 18 3.28125ZM25.6113 12.7347L16.1613 23.6722C16.0577 23.7922 15.9287 23.8892 15.7831 23.9565C15.6375 24.0239 15.4788 24.06 15.3176 24.0625H15.2986C15.1409 24.0624 14.985 24.0302 14.841 23.9677C14.6969 23.9053 14.568 23.8142 14.4626 23.7002L10.4126 19.3252C10.3097 19.2191 10.2297 19.0942 10.1772 18.9576C10.1248 18.821 10.1009 18.6757 10.1071 18.53C10.1132 18.3844 10.1493 18.2414 10.2131 18.1095C10.2769 17.9776 10.3671 17.8594 10.4786 17.7619C10.59 17.6644 10.7204 17.5895 10.862 17.5417C11.0037 17.4938 11.1537 17.474 11.3033 17.4834C11.453 17.4927 11.5992 17.5311 11.7333 17.5962C11.8675 17.6612 11.9869 17.7517 12.0846 17.8623L15.2691 21.3021L23.8887 11.3278C24.082 11.1105 24.3556 10.9759 24.6502 10.9531C24.9448 10.9302 25.2368 11.021 25.4631 11.2059C25.6894 11.3907 25.8319 11.6547 25.8596 11.9407C25.8873 12.2268 25.7981 12.512 25.6113 12.7347Z" fill="#13DEB9"></path>
                            </svg>
                            <p class="fs-3 fw-semibold" style="margin: 0; flex-grow: 1;">Daftar Hadir Tamu</p>
                        </div>
                        <div class="col-lg-12 mb-3" style="display: flex; align-items: center;">
                            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 36 35" fill="none" style="flex-shrink: 0; margin-right: 10px;">
                                <path d="M18 3.28125C9.93586 3.28125 3.375 9.65986 3.375 17.5C3.375 25.3401 9.93586 31.7188 18 31.7188C26.0641 31.7188 32.625 25.3401 32.625 17.5C32.625 9.65986 26.0641 3.28125 18 3.28125ZM25.6113 12.7347L16.1613 23.6722C16.0577 23.7922 15.9287 23.8892 15.7831 23.9565C15.6375 24.0239 15.4788 24.06 15.3176 24.0625H15.2986C15.1409 24.0624 14.985 24.0302 14.841 23.9677C14.6969 23.9053 14.568 23.8142 14.4626 23.7002L10.4126 19.3252C10.3097 19.2191 10.2297 19.0942 10.1772 18.9576C10.1248 18.821 10.1009 18.6757 10.1071 18.53C10.1132 18.3844 10.1493 18.2414 10.2131 18.1095C10.2769 17.9776 10.3671 17.8594 10.4786 17.7619C10.59 17.6644 10.7204 17.5895 10.862 17.5417C11.0037 17.4938 11.1537 17.474 11.3033 17.4834C11.453 17.4927 11.5992 17.5311 11.7333 17.5962C11.8675 17.6612 11.9869 17.7517 12.0846 17.8623L15.2691 21.3021L23.8887 11.3278C24.082 11.1105 24.3556 10.9759 24.6502 10.9531C24.9448 10.9302 25.2368 11.021 25.4631 11.2059C25.6894 11.3907 25.8319 11.6547 25.8596 11.9407C25.8873 12.2268 25.7981 12.512 25.6113 12.7347Z" fill="#13DEB9"></path>
                            </svg>
                            <p class="fs-3 fw-semibold" style="margin: 0; flex-grow: 1;">Daftar Hadir Tamu</p>
                        </div>
                        <div class="col-lg-12 mb-3" style="display: flex; align-items: center;">
                            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 36 35" fill="none" style="flex-shrink: 0; margin-right: 10px;">
                                <path d="M18 3.28125C9.93586 3.28125 3.375 9.65986 3.375 17.5C3.375 25.3401 9.93586 31.7188 18 31.7188C26.0641 31.7188 32.625 25.3401 32.625 17.5C32.625 9.65986 26.0641 3.28125 18 3.28125ZM25.6113 12.7347L16.1613 23.6722C16.0577 23.7922 15.9287 23.8892 15.7831 23.9565C15.6375 24.0239 15.4788 24.06 15.3176 24.0625H15.2986C15.1409 24.0624 14.985 24.0302 14.841 23.9677C14.6969 23.9053 14.568 23.8142 14.4626 23.7002L10.4126 19.3252C10.3097 19.2191 10.2297 19.0942 10.1772 18.9576C10.1248 18.821 10.1009 18.6757 10.1071 18.53C10.1132 18.3844 10.1493 18.2414 10.2131 18.1095C10.2769 17.9776 10.3671 17.8594 10.4786 17.7619C10.59 17.6644 10.7204 17.5895 10.862 17.5417C11.0037 17.4938 11.1537 17.474 11.3033 17.4834C11.453 17.4927 11.5992 17.5311 11.7333 17.5962C11.8675 17.6612 11.9869 17.7517 12.0846 17.8623L15.2691 21.3021L23.8887 11.3278C24.082 11.1105 24.3556 10.9759 24.6502 10.9531C24.9448 10.9302 25.2368 11.021 25.4631 11.2059C25.6894 11.3907 25.8319 11.6547 25.8596 11.9407C25.8873 12.2268 25.7981 12.512 25.6113 12.7347Z" fill="#13DEB9"></path>
                            </svg>
                            <p class="fs-3 fw-semibold" style="margin: 0; flex-grow: 1;">Daftar Hadir Tamu</p>
                        </div>

                    </div>

                </div>

                <div class="px-4 mb-3 mt-2">
                    <button class="btn w-100 btn-light-primary text-primary">
                        Beli
                    </button>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-12 card-hover">
            <div class="card bg-transparent">
                <div class="mt-5 text-center">
                    <h4 class="fw-semibold">Lorem Ipsum dolor</h4>
                </div>
                <div class="d-flex mt-3 justify-content-center">
                    <img src="{{ asset('premium.svg') }}" width="45%" height="200" style="object-fit:cover" class="mb-4" alt="...">
                </div>
                <div class="d-flex align-items-center">
                    <div class="ms-auto">
                        <div class="d-flex justify-content-end">

                        </div>
                    </div>
                </div>
                <div class="ms-4 d-flex justify-content-center mb-3 mt-2">
                    <h2 class="card-text text-info">Rp 170.000</h2>
                    <h5 class="mb-0 mt-2 text-info">/bulan</h5>
                </div>
                <div class="px-4">
                    <div class="row">
                        <div class="col-lg-12 mb-3" style="display: flex; align-items: center;">
                            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 36 35" fill="none" style="flex-shrink: 0; margin-right: 10px;">
                                <path d="M18 3.28125C9.93586 3.28125 3.375 9.65986 3.375 17.5C3.375 25.3401 9.93586 31.7188 18 31.7188C26.0641 31.7188 32.625 25.3401 32.625 17.5C32.625 9.65986 26.0641 3.28125 18 3.28125ZM25.6113 12.7347L16.1613 23.6722C16.0577 23.7922 15.9287 23.8892 15.7831 23.9565C15.6375 24.0239 15.4788 24.06 15.3176 24.0625H15.2986C15.1409 24.0624 14.985 24.0302 14.841 23.9677C14.6969 23.9053 14.568 23.8142 14.4626 23.7002L10.4126 19.3252C10.3097 19.2191 10.2297 19.0942 10.1772 18.9576C10.1248 18.821 10.1009 18.6757 10.1071 18.53C10.1132 18.3844 10.1493 18.2414 10.2131 18.1095C10.2769 17.9776 10.3671 17.8594 10.4786 17.7619C10.59 17.6644 10.7204 17.5895 10.862 17.5417C11.0037 17.4938 11.1537 17.474 11.3033 17.4834C11.453 17.4927 11.5992 17.5311 11.7333 17.5962C11.8675 17.6612 11.9869 17.7517 12.0846 17.8623L15.2691 21.3021L23.8887 11.3278C24.082 11.1105 24.3556 10.9759 24.6502 10.9531C24.9448 10.9302 25.2368 11.021 25.4631 11.2059C25.6894 11.3907 25.8319 11.6547 25.8596 11.9407C25.8873 12.2268 25.7981 12.512 25.6113 12.7347Z" fill="#13DEB9"></path>
                            </svg>
                            <p class="fs-3 fw-semibold" style="margin: 0; flex-grow: 1;">Daftar Hadir Tamu</p>
                        </div>
                        <div class="col-lg-12 mb-3" style="display: flex; align-items: center;">
                            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 36 35" fill="none" style="flex-shrink: 0; margin-right: 10px;">
                                <path d="M18 3.28125C9.93586 3.28125 3.375 9.65986 3.375 17.5C3.375 25.3401 9.93586 31.7188 18 31.7188C26.0641 31.7188 32.625 25.3401 32.625 17.5C32.625 9.65986 26.0641 3.28125 18 3.28125ZM25.6113 12.7347L16.1613 23.6722C16.0577 23.7922 15.9287 23.8892 15.7831 23.9565C15.6375 24.0239 15.4788 24.06 15.3176 24.0625H15.2986C15.1409 24.0624 14.985 24.0302 14.841 23.9677C14.6969 23.9053 14.568 23.8142 14.4626 23.7002L10.4126 19.3252C10.3097 19.2191 10.2297 19.0942 10.1772 18.9576C10.1248 18.821 10.1009 18.6757 10.1071 18.53C10.1132 18.3844 10.1493 18.2414 10.2131 18.1095C10.2769 17.9776 10.3671 17.8594 10.4786 17.7619C10.59 17.6644 10.7204 17.5895 10.862 17.5417C11.0037 17.4938 11.1537 17.474 11.3033 17.4834C11.453 17.4927 11.5992 17.5311 11.7333 17.5962C11.8675 17.6612 11.9869 17.7517 12.0846 17.8623L15.2691 21.3021L23.8887 11.3278C24.082 11.1105 24.3556 10.9759 24.6502 10.9531C24.9448 10.9302 25.2368 11.021 25.4631 11.2059C25.6894 11.3907 25.8319 11.6547 25.8596 11.9407C25.8873 12.2268 25.7981 12.512 25.6113 12.7347Z" fill="#13DEB9"></path>
                            </svg>
                            <p class="fs-3 fw-semibold" style="margin: 0; flex-grow: 1;">Daftar Hadir Tamu</p>
                        </div>
                        <div class="col-lg-12 mb-3" style="display: flex; align-items: center;">
                            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 36 35" fill="none" style="flex-shrink: 0; margin-right: 10px;">
                                <path d="M18 3.28125C9.93586 3.28125 3.375 9.65986 3.375 17.5C3.375 25.3401 9.93586 31.7188 18 31.7188C26.0641 31.7188 32.625 25.3401 32.625 17.5C32.625 9.65986 26.0641 3.28125 18 3.28125ZM25.6113 12.7347L16.1613 23.6722C16.0577 23.7922 15.9287 23.8892 15.7831 23.9565C15.6375 24.0239 15.4788 24.06 15.3176 24.0625H15.2986C15.1409 24.0624 14.985 24.0302 14.841 23.9677C14.6969 23.9053 14.568 23.8142 14.4626 23.7002L10.4126 19.3252C10.3097 19.2191 10.2297 19.0942 10.1772 18.9576C10.1248 18.821 10.1009 18.6757 10.1071 18.53C10.1132 18.3844 10.1493 18.2414 10.2131 18.1095C10.2769 17.9776 10.3671 17.8594 10.4786 17.7619C10.59 17.6644 10.7204 17.5895 10.862 17.5417C11.0037 17.4938 11.1537 17.474 11.3033 17.4834C11.453 17.4927 11.5992 17.5311 11.7333 17.5962C11.8675 17.6612 11.9869 17.7517 12.0846 17.8623L15.2691 21.3021L23.8887 11.3278C24.082 11.1105 24.3556 10.9759 24.6502 10.9531C24.9448 10.9302 25.2368 11.021 25.4631 11.2059C25.6894 11.3907 25.8319 11.6547 25.8596 11.9407C25.8873 12.2268 25.7981 12.512 25.6113 12.7347Z" fill="#13DEB9"></path>
                            </svg>
                            <p class="fs-3 fw-semibold" style="margin: 0; flex-grow: 1;">Daftar Hadir Tamu</p>
                        </div>
                    </div>
                </div>

                <div class="px-4 mb-3 mt-2">
                    <button class="btn w-100 btn-light-primary text-primary">
                        Beli
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

</div>
@endsection
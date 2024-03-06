@extends('layouts.user.app')
@section('style')
    <style>
        .border-primary {
            border-color: #0f4d8a !important;
            border-width: 5px !important;
        }

        .btn-primary {
            --bs-btn-color: #fff;
            --bs-btn-bg: #0f4d8a;
            --bs-btn-border-color: #0f4d8a;
            --bs-btn-hover-color: #fff;
            --bs-btn-hover-bg: #0b5ed7;
            --bs-btn-hover-border-color: #0a58ca;
            --bs-btn-focus-shadow-rgb: 49, 132, 253;
            --bs-btn-active-color: #fff;
            --bs-btn-active-bg: #0a58ca;
            --bs-btn-active-border-color: #0a53be;
            --bs-btn-active-shadow: inset 0 3px 5px rgba(0, 0, 0, 0.125);
            --bs-btn-disabled-color: #fff;
            --bs-btn-disabled-bg: #0f4d8a;
            --bs-btn-disabled-border-color: #0f4d8a;
        }



        .strip-right {
            border-right: 1px solid #0f4d8a;
            padding-right: 30px;
            height: 60%;
        }

        .strip-right h6,
        .strip-right p {
            margin-left: 1px;
        }
    </style>
@endsection
@section('content')
    <div class="row">
        <div class="col-lg-4 col-md-12 col-12 mb-3">
            <div class="card shadow border-bottom border-primary" style="border:transparent">
                <div class="card-body">
                    <div class="row mb-3">
                        <div class="col-8 d-flex align-items-center">
                            <img src="{{ asset('default.png') }}" class="rounded-circle user-profile mb-3" width="50"
                                height="50" />
                            <div class="ms-3">
                                <p class="fs-4 fw-semibold fs-2">Mohammad Daffa</p>
                            </div>
                        </div>
                        <div class="col-4 d-flex justify-content-end">
                            <div class="">
                                <button class="btn px-4 py-1 btn-primary  mt-2">ikuti</button>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6 col-md-4">
                            <div class="strip-right">
                                <div>
                                    <h6>Pengikut</h6>
                                </div>
                                <p class="">349</p>
                            </div>
                        </div>
                        <div class="col-6 col-md-4">
                            <div class="strip-right">
                                <div>
                                    <h6>Diikuti</h6>
                                </div>
                                <p class="">349</p>
                            </div>
                        </div>
                        <div class="col-6 col-md-4">
                            <div>
                                <div>
                                    <h6>Berita</h6>
                                </div>
                                <p class="">349</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-12 col-12 mb-3">
            <div class="card shadow border-bottom border-primary" style="border:transparent">
                <div class="card-body">
                    <div class="row mb-3">
                        <div class="col-8 d-flex align-items-center">
                            <img src="{{ asset('default.png') }}" class="rounded-circle user-profile mb-3" width="50"
                                height="50" />
                            <div class="ms-3">
                                <p class="fs-4 fw-semibold fs-2">Mohammad Daffa</p>
                            </div>
                        </div>
                        <div class="col-4 d-flex justify-content-end">
                            <div class="">
                                <button class="btn px-4 py-1 btn-primary  mt-2">ikuti</button>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6 col-md-4">
                            <div class="strip-right">
                                <div>
                                    <h6>Pengikut</h6>
                                </div>
                                <p class="">349</p>
                            </div>
                        </div>
                        <div class="col-6 col-md-4">
                            <div class="strip-right">
                                <div>
                                    <h6>Diikuti</h6>
                                </div>
                                <p class="">349</p>
                            </div>
                        </div>
                        <div class="col-6 col-md-4">
                            <div>
                                <div>
                                    <h6>Berita</h6>
                                </div>
                                <p class="">349</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-12 col-12 mb-3">
            <div class="card shadow border-bottom border-primary" style="border:transparent">
                <div class="card-body">
                    <div class="row mb-3">
                        <div class="col-8 d-flex align-items-center">
                            <img src="{{ asset('default.png') }}" class="rounded-circle user-profile mb-3" width="50"
                                height="50" />
                            <div class="ms-3">
                                <p class="fs-4 fw-semibold fs-2">Mohammad Daffa</p>
                            </div>
                        </div>
                        <div class="col-4 d-flex justify-content-end">
                            <div class="">
                                <button class="btn px-4 py-1 btn-primary  mt-2">ikuti</button>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6 col-md-4">
                            <div class="strip-right">
                                <div>
                                    <h6>Pengikut</h6>
                                </div>
                                <p class="">349</p>
                            </div>
                        </div>
                        <div class="col-6 col-md-4">
                            <div class="strip-right">
                                <div>
                                    <h6>Diikuti</h6>
                                </div>
                                <p class="">349</p>
                            </div>
                        </div>
                        <div class="col-6 col-md-4">
                            <div>
                                <div>
                                    <h6>Berita</h6>
                                </div>
                                <p class="">349</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-12 col-12 mb-3">
            <div class="card shadow border-bottom border-primary" style="border:transparent">
                <div class="card-body">
                    <div class="row mb-3">
                        <div class="col-8 d-flex align-items-center">
                            <img src="{{ asset('default.png') }}" class="rounded-circle user-profile mb-3" width="50"
                                height="50" />
                            <div class="ms-3">
                                <p class="fs-4 fw-semibold fs-2">Mohammad Daffa</p>
                            </div>
                        </div>
                        <div class="col-4 d-flex justify-content-end">
                            <div class="">
                                <button class="btn px-4 py-1 btn-primary  mt-2">ikuti</button>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6 col-md-4">
                            <div class="strip-right">
                                <div>
                                    <h6>Pengikut</h6>
                                </div>
                                <p class="">349</p>
                            </div>
                        </div>
                        <div class="col-6 col-md-4">
                            <div class="strip-right">
                                <div>
                                    <h6>Diikuti</h6>
                                </div>
                                <p class="">349</p>
                            </div>
                        </div>
                        <div class="col-6 col-md-4">
                            <div>
                                <div>
                                    <h6>Berita</h6>
                                </div>
                                <p class="">349</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-12 col-12 mb-3">
            <div class="card shadow border-bottom border-primary" style="border:transparent">
                <div class="card-body">
                    <div class="row mb-3">
                        <div class="col-8 d-flex align-items-center">
                            <img src="{{ asset('default.png') }}" class="rounded-circle user-profile mb-3" width="50"
                                height="50" />
                            <div class="ms-3">
                                <p class="fs-4 fw-semibold fs-2">Mohammad Daffa</p>
                            </div>
                        </div>
                        <div class="col-4 d-flex justify-content-end">
                            <div class="">
                                <button class="btn px-4 py-1 btn-primary  mt-2">ikuti</button>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6 col-md-4">
                            <div class="strip-right">
                                <div>
                                    <h6>Pengikut</h6>
                                </div>
                                <p class="">349</p>
                            </div>
                        </div>
                        <div class="col-6 col-md-4">
                            <div class="strip-right">
                                <div>
                                    <h6>Diikuti</h6>
                                </div>
                                <p class="">349</p>
                            </div>
                        </div>
                        <div class="col-6 col-md-4">
                            <div>
                                <div>
                                    <h6>Berita</h6>
                                </div>
                                <p class="">349</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-12 col-12 mb-3">
            <div class="card shadow border-bottom border-primary" style="border:transparent">
                <div class="card-body">
                    <div class="row mb-3">
                        <div class="col-8 d-flex align-items-center">
                            <img src="{{ asset('default.png') }}" class="rounded-circle user-profile mb-3" width="50"
                                height="50" />
                            <div class="ms-3">
                                <p class="fs-4 fw-semibold fs-2">Mohammad Daffa</p>
                            </div>
                        </div>
                        <div class="col-4 d-flex justify-content-end">
                            <div class="">
                                <button class="btn px-4 py-1 btn-primary  mt-2">ikuti</button>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6 col-md-4">
                            <div class="strip-right">
                                <div>
                                    <h6>Pengikut</h6>
                                </div>
                                <p class="">349</p>
                            </div>
                        </div>
                        <div class="col-6 col-md-4">
                            <div class="strip-right">
                                <div>
                                    <h6>Diikuti</h6>
                                </div>
                                <p class="">349</p>
                            </div>
                        </div>
                        <div class="col-6 col-md-4">
                            <div>
                                <div>
                                    <h6>Berita</h6>
                                </div>
                                <p class="">349</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <ul class="page-nav list-style text-center mt-5">
        <li><a href="team.html"><i class="flaticon-arrow-left"></i></a></li>
        <li><a class="active" href="team.html">1</a></li>
        <li><a href="team.html">2</a></li>
        <li><a href="team.html">3</a></li>
        <li><a href="team.html"><i class="flaticon-arrow-right"></i></a></li>
    </ul>
@endsection

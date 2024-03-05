@extends('layouts.user.app')

@section('style')
    <style>
        .card-author{
            box-shadow: 0  5px 2px rgba(0, 0, 0, 0.1);
            border: 1px solid #f4f4f4; 
            padding: 2%;
        }
        .card-profile{
            box-shadow: 0  5px 2px rgba(0, 0, 0, 0.1);
            border: 1px solid #f4f4f4; 
            padding: 7%;
            border-radius: 10px;
            /* width: 400px;
            height: 130px; */
        }
    </style>
@endsection


@section('content')
    <div class="row">
        <div class="col-lg-4 col-md-6 col-12">
            <div class="card shadow border-start border-primary" style="border:transparent">
                <div class="card-body">
                    <div class="d-flex align-items-center mb-4">
                        <img src="{{ asset('default.png') }}" class="rounded-circle mb-3 user-profile" width="50"
                            height="50" />
                        <div class="ms-3">
                            <p class="fs-4 fw-semibold fs-2">Mohammad Daffa</p>
                        </div>
                    </div>
                    <div class="d-flex ">
                        <div class="d-flex justify-content-start gap-4 container-fluid">
                            <div>
                                <div>
                                    <h6>Followers</h6>
                                </div>
                                <p class="d-flex justify-content-center">349</p>
                            </div>
                            <div>
                                <div>
                                    <h6>Followers</h6>
                                </div>
                                <p class="d-flex justify-content-center">349</p>
                            </div>
                            <div>
                                <div>
                                    <h6>Followers</h6>
                                </div>
                                <p class="d-flex justify-content-center">349</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-6 col-12">
            <div class="card shadow border-start border-danger" style="border:transparent">
                <div class="card-body">
                    <div class="d-flex align-items-center mb-4">
                        <img src="{{ asset('default.png') }}" class="rounded-circle mb-3 user-profile" width="50"
                            height="50" />
                        <div class="ms-3">
                            <p class="fs-4 fw-semibold fs-2">Mohammad Daffa</p>
                        </div>
                    </div>
                    <div class="d-flex ">
                        <div class="d-flex justify-content-start gap-4 container-fluid">
                            <div>
                                <div>
                                    <h6>Followers</h6>
                                </div>
                                <p class="d-flex justify-content-center badge bg-primary fs-6">349</p>
                            </div>
                            <div>
                                <div>
                                    <h6>Followers</h6>
                                </div>
                                <p class="d-flex justify-content-center badge bg-warning fs-6">349</p>
                            </div>
                            <div>
                                <div>
                                    <h6>Followers</h6>
                                </div>
                                <p class="d-flex justify-content-center badge bg-success fs-6">349</p>
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

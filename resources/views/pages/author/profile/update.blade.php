@extends('layouts.author.sidebar')

@section('style')
    <style>
    .card-detail{
      padding: 25px;
      border-radius: 10px;
      background-color: #fff;
    }
    </style>
@endsection
@section('content')
    <div class="">
        <div class="col-md-12 col-lg-6">
            <div class="row card-detail shadow-sm">
                <div class="">
                    <h5>Berita Penulis</h5>
                    <p>Ganti foto profil disini</p>
                </div>
                <div class="justify-content-center align-items-center text-center">
                    <img src="{{asset('assets/img/profile.svg')}}" width="6 0px" alt="">
                    <p>js</p>
                </div>
            </div>
        </div>
    </div>
@endsection
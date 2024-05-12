@extends('layouts.user.app')
@section('content')
<div class="error-wrap ptb-100">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 offset-lg-2">
                <div class="error-content">
                    <img src="{{ asset('assets/img/404.webp') }}" alt="Iamge" />
                    <h2>MAAF KAMI TIDAK MENEMUKAN HALAMAN YANG ANDA CARI.
                    </h2>
                    <a href="/" class="btn-one">Kembali<i class="flaticon-right-arrow"></i></a>
                </div>
            </div>
            <div class="col-lg-8 offset-lg-2 mt-5">
                <h3 align="center" class="mb-4">Kumpulan Berita yang Mungkin Anda Suka.
                </h3>
                <div class="row">
                    @foreach ($news as $news)
                   <div class="col-md-6 col-12">
                    <div class="news-card-one">
                        <div class="news-card-img">
                            <img src="http://127.0.0.1:8000/storage/news/4tHdgZ6ne6zOmIxmbYk1CpryXyby7iCzFG06PmeR.jpg" width="100%" height="100px" style="object-fit: cover;">
                        </div>
                        <div class="news-card-info">
                            <h3><a data-toggle="tooltip" data-placement="top" title="23" href="http://127.0.0.1:8000/2024/5/9/23">23</a>
                            </h3>
                            <ul class="news-metainfo list-style">
                                <li><i class="fi fi-rr-calendar-minus"></i>
                                    <a href="javascript:void(0)">09 Mei 2024</a>
                                </li>
                                <li>
                                    <i class="fi fi-rr-eye">
                                    </i><a href="news-by-dateus">1</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                   </div>
                    @endforeach
                </div>
            </div>
        </div>
        </div>

        <div>
    </div>
</div>
@endsection
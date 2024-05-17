@extends('layouts.user.app')
@section('content')
<div class="error-wrap ptb-100">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 offset-lg-2">
                <div class="error-content justify-content-center">
                    <img src="{{ asset('assets/img/404.webp') }}" alt="Iamge" style="height: 170px;"/>
                    <h6 style="color: #888888">404 Not Found</h6>
                    <h5>Maaf Kami Tidak Menemukan Halaman Yang Anda Cari.</h5>
                    <a href="/" class="btn mt-3" style="background-color: #DD1818; color: white">
                        <div class="gap-2">
                            <i class="flaticon-left-arrow gap-"></i>
                            Kembali ke beranda
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-lg-10 offset-lg-1 mt-4">
                <h5 align="center" class="mb-4">Berita Direkomendasikan</h5>
                <hr>
                <div class="row">
                    @foreach ($news as $news)
                    @php
                    $dateParts = date_parse($news->upload_date);
                    @endphp

                    <div class="col-md-6 col-12">
                        <div class="news-card-five">
                            <div class="news-card-img">
                                <img src="{{ asset('storage/' . $news->photo) }}" alt="Image" width="100%" height="150" style="object-fit: cover"/>
                                <a data-toggle="tooltip" data-placement="top" title="{{ $news->newsCategories[0]->category->name }}" href="{{ route('categories.show.user', ['category' => $news->newsCategories[0]->category->slug,]) }}" class="news-cat">{{ $news->newsCategories[0]->category->name }}</a>
                            </div>
                            <div class="news-card-info">
                                <h3><a data-toggle="tooltip" data-placement="top" title="{{ $news->name }}" href="{{ route('news.user', ['news' => $news->slug,'year'=> $dateParts['year'],'month'=>$dateParts['month'],'day'=> $dateParts['day'] ]) }}">
                                    {!! Illuminate\Support\Str::limit($news->name, $limit = 60, $end = '...')  !!}
                                </a></h3>
                                <p>
                                    {!! Illuminate\Support\Str::limit(strip_tags($news->content), 20, '...') !!}
                                </p>
                                <ul class="news-metainfo list-style">
                                    <li><i class="fi fi-rr-calendar-minus"></i><a
                                        href="javascript:void(0)">{{ \Carbon\Carbon::parse($news->upload_date)->translatedFormat('d F Y') }}</a>
                                    </li>
                                    <li><i class="fi fi-rr-eye"></i>{{ $news->views->count() }}</li>
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

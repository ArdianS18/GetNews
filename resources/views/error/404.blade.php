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
                    <a href="/" class="btn-one"><i class="flaticon-left-arrow"></i> Kembali</a>
                </div>
            </div>
            <div class="col-lg-8 offset-lg-2 mt-4">
                <h3 align="center" class="mb-4">Berita yang Mungkin Anda Suka.
                </h3>
                <div class="row">
                    @foreach ($news as $news)
                    @php
                    $dateParts = date_parse($news->upload_date);
                @endphp
                   <div class="col-md-6 col-12">
                    <div class="news-card-one">
                        <div class="news-card-img">
                            <img src="{{ asset('storage/'.$news->photo) }}" width="100%" height="100px" style="object-fit: cover;">
                        </div>
                        <div class="news-card-info">
                            <h3><a data-toggle="tooltip" data-placement="top" title="{{ $news->name }}" href="{{ route('news.user', ['news' => $news->slug,'year'=> $dateParts['year'],'month'=>$dateParts['month'],'day'=> $dateParts['day'] ]) }}">{!! Illuminate\Support\Str::limit($news->name, $limit = 40, $end = '...')  !!}</a>
                            </h3>
                            <ul class="news-metainfo list-style">
                                <li><i class="fi fi-rr-calendar-minus"></i>
                                    <a href="javascript:void(0)">{{  \Carbon\Carbon::parse($news->upload_date)->translatedFormat('d F Y') }}</a>
                                </li>
                                <li>
                                    <i class="fi fi-rr-eye">
                                    </i><a href="news-by-dateus">{{ $news->views->count() }}</a>
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
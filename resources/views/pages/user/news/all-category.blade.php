@extends('layouts.user.app')

@section('content')
<div class="col-lg-12">
    <div class="breadcrumb-wrap">
        <h2 class="breadcrumb-title">{{ $category->name }}
            @if ($data === "trending")
                - Trending
            @else
                - Terbaru
            @endif
        </h2>
        <ul class="breadcrumb-menu list-style">
            <li><a href="/">Home</a></li>
            <li>{{ $category->name }}</li>
        </ul>
    </div>
</div>

<div class="sports-wrap ptb-100">
    <div class="container">
        <div class="row gx-55 gx-5">
            <div class="col-lg-8">
                <div class="mb-5">
                    @forelse ($trending as $tren)
                        @php
                            $dateParts = date_parse($tren->upload_date);
                        @endphp
                        <div class="news-card-five">
                            <div class="news-card-img">
                                <a href="{{ route('news.user', ['news' => $tren->slug,'year'=> $dateParts['year'],'month'=>$dateParts['month'],'day'=> $dateParts['day'] ]) }}">
                                    <img src="{{ asset('storage/' . $tren->photo) }}" alt="Image" height="140" width="100%" />
                                </a>
                                <a data-toggle="tooltip" data-placement="top" title="{{ $tren->newsCategories[0]->category->name }}" href="{{ route('categories.show.user', ['category' => $tren->newsCategories[0]->category->slug]) }}"
                                    class="news-cat">{{ $tren->newsCategories[0]->category->name }}</a>
                            </div>
                            <div class="news-card-info">
                                <h3><a data-toggle="tooltip" data-placement="top" title="{{ $tren->name }}" href="{{ route('news.user', ['news' => $tren->slug,'year'=> $dateParts['year'],'month'=>$dateParts['month'],'day'=> $dateParts['day'] ]) }}">
                                        {!! Illuminate\Support\Str::limit($tren->name, $limit = 50, $end = '...')  !!}
                                    </a>
                                </h3>
                                <ul class="news-metainfo list-style">
                                    <li><i class="fi fi-rr-calendar-minus"></i><a
                                            href="javascript:void(0)">{{ \Carbon\Carbon::parse($tren->created_at)->translatedFormat('d F Y') }}</a>
                                    </li>
                                    <li><i class="fi fi-rr-eye"></i>{{ $tren->views_count }}</li>
                                </ul>
                            </div>
                        </div>
                    @empty
                        <div class="d-flex justify-content-center">
                            <div>
                                <img src="{{ asset('assets/img/no-data.svg') }}" alt="">
                            </div>
                        </div>
                        <div class="text-center">
                            <h4>Tidak ada data</h4>
                        </div>
                    @endforelse
                </div>

                <ul class="page-nav list-style text-center mt-20">
                    <li><a href="{{ $trending->previousPageUrl() }}"><i class="flaticon-arrow-left"></i></a></li>

                    @for ($i = 1; $i <= $trending->lastPage(); $i++)
                        <li><a href="{{ $trending->url($i) }}" class="btn btn-black {{ $trending->currentPage() == $i ? 'active' : '' }}">{{ $i }}</a></li>
                    @endfor

                    <li><a href="{{ $trending->nextPageUrl() }}"><i class="flaticon-arrow-right"></i></a></li>
                </ul>

                <div class="text-center item-center d-flex justify-content-center mt-4" style="background-color:#F6F6F6; width:100%;height:200px;">
                    <h5 class="mt-5">Iklan</h5>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="">
                    <div class="sidebar">
                        <div class="sidebar-widget-two">
                            <form class="search-box-widget">
                                <input type="search" name="search" placeholder="Search">
                                <button type="submit">
                                    <i class="fi fi-rr-search"></i>
                                </button>
                            </form>
                        </div>
                        <div class="sidebar-widget">
                            <h3 class="sidebar-widget-title">Kategori</h3>
                            <ul class="category-widget list-style">
                                @foreach ($totalCategories as $category)
                                    <li><a data-toggle="tooltip" data-placement="top" title="{{ $category->name }}"
                                            href="{{ route('categories.show.user', ['category' => $category->slug]) }}"><img
                                                src="{{ asset('assets/img/icons/arrow-right.svg') }}"
                                                alt="Image">{{ $category->name }}
                                            <span>({{ $category->news_categories_count }})</span></a></li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="sidebar-widget">
                            <h3 class="sidebar-widget-title">Berita Popular</h3>
                            <div class="pp-post-wrap">
                                @forelse ($news as $news)
                                @php
                                $dateParts = date_parse($news->upload_date);
                            @endphp
                                    <div class="news-card-one">
                                        <div class="news-card-img">
                                            <img src="{{ asset('storage/' . $news->photo) }}" width="100%" height="80" style="object-fit: cover;">
                                        </div>
                                        <div class="news-card-info">
                                            <h3><a data-toggle="tooltip" data-placement="top" title="{{ $news->name }}"
                                                href="{{ route('news.user', ['news' => $news->slug,'year'=> $dateParts['year'],'month'=>$dateParts['month'],'day'=> $dateParts['day'] ]) }}">{!! Illuminate\Support\Str::limit($news->name, $limit = 40, $end = '...')  !!}</a>
                                            </h3>
                                            <ul class="news-metainfo list-style">
                                                <li><i class="fi fi-rr-calendar-minus"></i>
                                                    <a href="javascript:void(0)">{{  \Carbon\Carbon::parse($news->upload_date)->translatedFormat('d F Y') }}</a>
                                                </li>
                                                <li>
                                                    <i class="fi fi-rr-eye">
                                                    </i><a href="news-by-dateus">{{ $news->views_count }}</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                @empty
                                    <div class="d-flex justify-content-center">
                                        <div>
                                            <img src="{{ asset('assets/img/no-data.svg') }}" alt="">
                                        </div>
                                    </div>
                                    <div class="text-center">
                                        <h4>Tidak ada data</h4>
                                    </div>
                                @endforelse
                            </div>
                        </div>
                        <div class="sidebar-widget" style="height: 700px">
                            <h3 class="sidebar-widget-title">iklan</h3>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>
</div>
@endsection

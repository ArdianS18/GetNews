@extends('layouts.user.app')

@section('content')
<div class="col-lg-12">
    <div class="breadcrumb-wrap">
        <h2 class="breadcrumb-title">{{ $category->name }}</h2>
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
                <div class="row justify-content-center">
                    @forelse ($newsCategories as $newsCategory)
                        <div class="col-md-6">
                            <div class="news-card-thirteen">
                                <div class="news-card-img">
                                    <img src="{{ asset('storage/' . $newsCategory->news->photo) }}" alt="{{ $newsCategory->news->photo }}" width="100%" height="250" style="width: 100%;object-fit:cover;">
                                    <a href="{{ route('categories.show.user', ['category' => $newsCategory->news->newsCategories[0]->category->slug]) }}" class="news-cat">{{ $newsCategory->category->name }}</a>
                                </div>
                                <div class="news-card-info">
                                    <h3><a href="{{ route('news.user', ['news' => $newsCategory->news->slug]) }}">{!! Illuminate\Support\Str::limit(strip_tags($newsCategory->news->name), 50, '...') !!}</a></h3>
                                    <ul class="news-metainfo list-style">
                                        <li><i class="fi fi-rr-calendar-minus"></i><a href="javascript:void(0)">{{ $newsCategory->news->created_at->format('M d, Y') }}</a></li>
                                        <li><i class="fi fi-rr-eye"></i>{{ $newsCategory->news->views->count() }}</li>
                                    </ul>
                                </div>
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
                    <li><a href="{{ $newsCategories->previousPageUrl() }}"><i class="flaticon-arrow-left"></i></a></li>
                    @for ($i = 1; $i <= $newsCategories->lastPage(); $i++)
                    <li><a href="{{ $newsCategories->url($i) }}" class="btn btn-black {{ $newsCategories->currentPage() == $i ? 'active' : '' }}">{{ $i }}</a></li>
                    @endfor
                    <li><a href="{{ $newsCategories->nextPageUrl() }}"><i class="flaticon-arrow-right"></i></a></li>
                </ul>
            </div>

            <div class="col-lg-4">
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
                                <li><a href="{{ route('categories.show.user', ['category' => $category->slug]) }}"><img
                                            src="{{ asset('assets/img/icons/arrow-right.svg') }}"
                                            alt="Image">{{ $category->name }}
                                        <span>({{ $category->total }})</span></a></li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="sidebar-widget">
                        <h3 class="sidebar-widget-title">Berita Popular</h3>
                        <div class="pp-post-wrap">
                            @forelse ($news as $news)
                                <div class="news-card-one">
                                    <div class="news-card-img">
                                        <img src="{{ asset('storage/' . $news->photo) }}"width="100%" height="80" style="object-fit: cover;">
                                    </div>
                                    <div class="news-card-info">
                                        <h3><a href="#">{!! Illuminate\Support\Str::limit($news->name, $limit = 40, $end = '...')  !!}</a>
                                        </h3>
                                        <ul class="news-metainfo list-style">
                                            <li><i class="fi fi-rr-calendar-minus"></i>
                                                <a href="javascript:void(0)">{{  \Carbon\Carbon::parse($news->upload_date)->translatedFormat('d F Y') }}</a>
                                            </li>
                                            <li>
                                                <i class="fi fi-rr-eye">
                                                </i><a href="javascript:void(0)">{{ $news->views_count }}</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            @empty
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
@endsection

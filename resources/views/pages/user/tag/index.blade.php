@extends('layouts.user.app')

@section('content')
    <div class="col-lg-12">
        <div class="breadcrumb-wrap">
            <h2 class="breadcrumb-title">{{ $tag->name }}</h2>
            <ul class="breadcrumb-menu list-style">
                <li><a href="/">Home</a></li>
                <li>{{ $tag->name }}</li>
            </ul>
        </div>
    </div>

    <div class="sports-wrap ptb-100">
        <div class="container">
            <div class="row gx-55 gx-5">
                <div class="col-lg-8">
                    <div class="row justify-content-center">
                        @forelse ($news as $item)
                            @php
                                $dateParts = date_parse($item->news->upload_date);
                            @endphp
                            <div class="col-md-6">
                                <div class="news-card-thirteen">
                                    <div class="news-card-img">
                                        <img src="{{ asset('storage/' . $item->news->photo) }}"
                                            alt="{{ $item->news->photo }}" width="400px" height="300"
                                            style="width: 100%;object-fit:cover;">
                                        <a href="{{ route('categories.show.user', ['category' => $item->news->newsCategories[0]->category->slug]) }}"
                                            class="news-cat">{{ $item->news->newsCategories[0]->category->name }}</a>
                                    </div>
                                    <div class="news-card-info">
                                        <h3><a
                                                href="{{ route('news.user', ['news' => $item->news->slug, 'year' => $dateParts['year'], 'month' => $dateParts['month'], 'day' => $dateParts['day']]) }}">{{ $item->news->name }}</a>
                                        </h3>
                                        <ul class="news-metainfo list-style">
                                            <li><i class="fi fi-rr-calendar-minus"></i><a
                                                    href="javascript:void(0)">{{\Carbon\Carbon::parse($item->news->upload_date)->translatedFormat('d F Y') }}</a>
                                            </li>
                                            <li><i class="fi fi-rr-eye"></i>{{ $item->news->views->count() }}</li>
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
                        <li><a href="{{ $news->previousPageUrl() }}"><i class="flaticon-arrow-left"></i></a></li>
                        @for ($i = 1; $i <= $news->lastPage(); $i++)
                            <li><a href="{{ $news->url($i) }}"
                                    class="btn btn-black {{ $news->currentPage() == $i ? 'active' : '' }}">{{ $i }}</a>
                            </li>
                        @endfor
                        <li><a href="{{ $news->nextPageUrl() }}"><i class="flaticon-arrow-right"></i></a></li>
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
                                            <span>({{ $category->news_categories_count }})</span></a></li>
                                @endforeach
                            </ul>
                        </div>

                        <div class="sidebar-widget">
                            <h3 class="sidebar-widget-title">Berita Popular</h3>
                            <div class="pp-post-wrap">
                                @forelse ($populars as $popular)
                                @php
                                $dateParts = date_parse($popular->upload_date);
                            @endphp
                                    <div class="news-card-one">
                                        <div class="news-card-img">
                                            <img src="{{ asset('storage/' . $popular->photo) }}" style="object-fit: cover"
                                                width="100%" height="80">
                                        </div>
                                        <div class="news-card-info">
                                            <h3><a href="#">{!! Illuminate\Support\Str::limit($popular->name, $limit = 20, $end = '...') !!}</a>
                                            </h3>
                                            <ul class="news-metainfo list-style">
                                                <li>

                                                    <i><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                                            viewBox="0 0 512 512">
                                                            <path
                                                                d="M368.005 272h-96v96h96v-96zm-32-208v32h-160V64h-48v32h-24.01c-22.002 0-40 17.998-40 40v272c0 22.002 17.998 40 40 40h304.01c22.002 0 40-17.998 40-40V136c0-22.002-17.998-40-40-40h-24V64h-48zm72 344h-304.01V196h304.01v212z"
                                                                fill="#E93314" />
                                                        </svg></i><a
                                                        href="javascript:void(0)">{{ \Carbon\Carbon::parse($popular->upload_date)->translatedFormat('d F Y') }}</a>
                                                </li>
                                                <li>
                                                    <i class="fi fi-rr-eye">
                                                    </i><a href="javascript:void(0)">{{ $popular->views_count }}</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                @empty
                                @endforelse
                            </div>
                        </div>
                        <div class="sidebar-widget">
                            <h3 class="sidebar-widget-title">Popular Tags</h3>
                            <ul class="tag-list list-style">
                                @forelse ($popularTags as $tag)
                                    <li><a href="{{ route('tag.show.user', ['tag' => $tag->slug]) }}">{{ $tag->name }}</a>
                                    </li>
                                @empty
                                @endforelse
                            </ul>
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

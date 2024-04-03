@extends('layouts.user.app')

@section('content')
    <div class="col-lg-12">
        <div class="breadcrumb-wrap">
            <h2 class="breadcrumb-title">{{ $category->name }}</h2>
            <ul class="breadcrumb-menu list-style">
                <li><a href="{{ route('user.home') }}">Home</a></li>
                <li>{{ $category->name }}</li>
            </ul>
        </div>
    </div>

    <div class="container gp-5">
        <div class="d-flex mt-5 gap-5">
            <div class="sports-wrap ptb-100">
                <div class="row gx-55 gx-5">
                    <div class="col-lg-8">
                        <div class="row justify-content-center">
                            @forelse ($newsCategories as $newsCategory)
                                <div class="col-md-6">
                                    <div class="news-card-thirteen">
                                        <div class="news-card-img">
                                            <img src="{{ asset('storage/' . $newsCategory->news->photo) }}"
                                                alt="{{ $newsCategory->news->photo }}" style="width: 100%;height:100%;"
                                                width="400px" height="234">
                                            {{-- <img src="{{asset('assets/img/test1.svg')}}" width="400px" height="234" style="width: 100%;height:100%;" alt="Iamge"> --}}
                                            <a href="kesehatan.html"
                                                class="news-cat">{{ $newsCategory->category->name }}</a>
                                        </div>
                                        <div class="news-card-info">
                                            <h3><a href="kesehatan-details.html">{{ $newsCategory->news->name }}</a></h3>
                                            <ul class="news-metainfo list-style">
                                                <li><i class="fi fi-rr-calendar-minus"></i><a
                                                        href="news-by-date.html">{{ $newsCategory->news->created_at->format('M d, Y') }}</a>
                                                </li>
                                                <li><i class="fi fi-rr-eye"></i>{{ $newsCategory->news->views->count() }}
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            @empty
                            @endforelse
                        </div>
                        <ul class="page-nav list-style text-center mt-20">
                            <li><a href="{{ $newsCategories->previousPageUrl() }}"><i class="flaticon-arrow-left"></i></a>
                            </li>
                            @for ($i = 1; $i <= $newsCategories->lastPage(); $i++)
                                <li><a href="{{ $newsCategories->url($i) }}"
                                        class="btn btn-black {{ $newsCategories->currentPage() == $i ? 'active' : '' }}">{{ $i }}</a>
                                </li>
                            @endfor
                            <li><a href="{{ $newsCategories->nextPageUrl() }}"><i class="flaticon-arrow-right"></i></a>
                            </li>
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
                                                <img src="{{ asset('storage/' . $news->photo) }}">
                                            </div>
                                            <div class="news-card-info">
                                                <h3><a href="business-details.html">{{ $news->name }}</a>
                                                </h3>
                                                <ul class="news-metainfo list-style">
                                                    <li>

                                                        <i><svg xmlns="http://www.w3.org/2000/svg" width="20"
                                                                height="20" viewBox="0 0 512 512">
                                                                <path
                                                                    d="M368.005 272h-96v96h96v-96zm-32-208v32h-160V64h-48v32h-24.01c-22.002 0-40 17.998-40 40v272c0 22.002 17.998 40 40 40h304.01c22.002 0 40-17.998 40-40V136c0-22.002-17.998-40-40-40h-24V64h-48zm72 344h-304.01V196h304.01v212z"
                                                                    fill="#E93314" />
                                                            </svg></i><a
                                                            href="news-by-date.html">{{ $news->created_at_formatted }}</a>
                                                    </li>
                                                    <li>
                                                        <i class="fi fi-rr-eye">
                                                        </i><a href="news-by-date.html">{{ $news->views_count }}</a>
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
    </div>
@endsection

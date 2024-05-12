@extends('layouts.user.app')

@section('content')
    <div class="col-lg-12">
        <div class="breadcrumb-wrap">
            <h2 class="breadcrumb-title">{{ $subCategory->name }}</h2>
            <ul class="breadcrumb-menu list-style">
                <li><a data-toggle="tooltip" data-placement="top" title="Beranda" href="/">Home</a></li>
                <li><a data-toggle="tooltip" data-placement="top" title="{{ $subCategory->category->name }}"
                        href="{{ route('categories.show.user', ['category' => $subCategory->category->slug]) }}">{{ $subCategory->category->name }}</a>
                </li>
                <li>{{ $subCategory->name }}</li>
            </ul>
        </div>
    </div>

    <div class="sports-wrap ptb-100">
        <div class="container">
            <div class="row gx-55 gx-5">
                <div class="col-lg-8">
                    <div class="row">
                        @forelse ($newsSubCategories as $newsSubCategory)
                        @php
                        $dateParts = date_parse($newsSubCategory->upload_date);
                    @endphp
             
                            <div class="col-md-6">
                                <div class="news-card-thirteen">
                                    <div class="news-card-img">
                                        <img src="{{ asset('storage/' . $newsSubCategory->news->photo) }}"
                                            alt="{{ $newsSubCategory->news->photo }}" width="100%" height="250" style="width: 100%;object-fit:cover;">
                                        <a data-toggle="tooltip" data-placement="top" title="{{ $newsSubCategory->subCategory->name }}" href="{{ route('subcategories.show.user', ['category'=>$subCategory->category->slug,'subCategory' => $newsSubCategory->subCategory->slug]) }}"
                                            class="news-cat">{{ $newsSubCategory->subCategory->name }}</a>
                                    </div>
                                    <div class="news-card-info">
                                        <h3><a  data-toggle="tooltip" data-placement="top" title="{{ $newsSubCategory->news->name }}"
                                                href="{{ route('news.user', ['news' => $newsSubCategory->news->slug,'year'=> $dateParts['year'],'month'=>$dateParts['month'],'day'=> $dateParts['day'] ]) }}">{!! Illuminate\Support\Str::limit(strip_tags($newsSubCategory->news->name), 50, '...') !!}</a>
                                        </h3>
                                        <ul class="news-metainfo list-style">
                                            <li><i class="fi fi-rr-calendar-minus"></i><a
                                                    href="javascript:void(0)">{{ \Carbon\Carbon::parse( $newsSubCategory->news->upload_date)->translatedFormat('d F Y') }}</a>
                                            </li>
                                            <li><i
                                                    class="fi fi-rr-eye"></i>{{ $newsSubCategory->news->views->count() }}
                                            </li>
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
                        <li><a href="{{ $newsSubCategories->previousPageUrl() }}"><i
                                    class="flaticon-arrow-left"></i></a></li>
                        @for ($i = 1; $i <= $newsSubCategories->lastPage(); $i++)
                            <li><a href="{{ $newsSubCategories->url($i) }}"
                                    class="btn btn-black {{ $newsSubCategories->currentPage() == $i ? 'active' : '' }}">{{ $i }}</a>
                            </li>
                        @endfor
                        <li><a href="{{ $newsSubCategories->nextPageUrl() }}"><i class="flaticon-arrow-right"></i></a>
                        </li>
                    </ul>
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
                                                <span>({{ $category->total }})</span></a></li>
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

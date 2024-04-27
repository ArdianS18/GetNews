@extends('layouts.user.app')

@section('style')
    <style>
        .news-card-post{
            box-shadow: 0  5px 2px rgba(0, 0, 0, 0.1);
            border: 1px solid #f4f4f4;
            padding: 2%;
            border-radius: 10px;
        }
        .card-category{
            box-shadow: 0  5px 2px rgba(0, 0, 0, 0.1);
            border: 1px solid #f4f4f4; 
            padding: 4%;
            border-radius: 10px;   
        }
    </style>
@endsection

@section('content')
    <div class="mb-3 row">
        <div class="col-lg-3">
            <form>
                <div class="input-group">
                    <input type="text" name="query" class="form-control search-chat py-2 px-5 ps-5" placeholder="Search">
                    <i class="ti ti-search position-absolute top-50 translate-middle-y fs-6 text-dark ms-3"></i>
                    <button type="submit" style="background-color: #C7C7C7;" class="btn btn-sm text-black px-4">Cari</button>
                </div>
            </form>     
        </div>    
    </div>


    <div class="">
        <div class="modal fade searchModal" id="searchModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form>
                        <input type="text" class="form-control" placeholder="Search here....">
                        <button type="submit"><i class="fi fi-rr-search"></i></button>
                    </form>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><i class="ri-close-line"></i></button>
                </div>
            </div>
        </div>
    </div>
    
    <div class="">
    <div class="sports-wrap ptb-100">
    <div class="ps-5 pe-5">
    <div class="row gx-55 gx-5">
        <div class="col-lg-8">
            <div class="row">
                @forelse ($news as $item)
                <div class="col-md-6">   
                    <div class="news-card-thirteen">
                        <div class="news-card-img">
                            <img src="{{ asset('storage/' . $item->photo) }}" alt="{{ $item->photo }}" width="400px" height="300" style="width: 100%;object-fit:cover;">
                            @foreach ($subCategories as $subCategory)
                                <p class="tag">
                                    {{-- <a href="{{ route('subcategories.show.user', ['subCategory' => $subCategory->subCategory->slug]) }}" class="news-cat">{{ $subCategory->subCategory->name }}</a> --}}
                                </p>
                            @endforeach
                        </div>
                        <div class="news-card-info">
                            <h3>
                                <a
                                    href="{{ route('news.user', ['news' => $item->slug, 'page' => '1']) }}">{{ $item->name }}</a>
                            </h3>
                            <ul class="news-metainfo list-style">
                                <li><i class="fi fi-rr-calendar-minus"></i><a href="news-by-date.html">{{ \Carbon\Carbon::parse($item->created_at)->translatedFormat('d F Y') }}</a></li>
                                <li><i class="fi fi-rr-clock-three"></i>{{ $item->views }}</li>
                            </ul>
                        </div>
                    </div>
                </div>
                @empty
                    <div class="d-flex justify-content-center">
                        <div>
                            <img src="{{ asset('no-data.svg') }}" width="550px" alt="">
                        </div>
                    </div>
                    <div class="text-center">
                        <h4>Tidak ada data</h4>
                    </div>
                @endforelse
                {{-- <ul class="page-nav list-style text-right d-flex justify-content-end mt-20">
                    <li><a href="{{ $news->previousPageUrl() }}"><i class="flaticon-arrow-right"></i></a></li>
                    @for ($i = 1; $i <= $news->lastPage(); $i++)
                        <li><a href="{{ $news->url($i) }}" class="btn btn-black {{ $news->currentPage() == $i ? 'active' : '' }}">{{ $i }}</a></li>
                    @endfor
                    <li><a href="{{ $news->nextPageUrl() }}"><i class="flaticon-arrow-right"></i></a></li>
                </ul> --}}
            </div>
            <div class="text-center item-center d-flex justify-content-center" style="background-color:#F6F6F6; width:100%;height:200px;">
                <h5 class="mt-5">Iklan</h5>
            </div> 
        </div>

        <div class="col-lg-4">
            <div class="sidebar">
                <div class="sidebar-widget-two">
                    <form action="#" class="search-box-widget">
                        <input type="search" placeholder="Search">
                        <button type="submit">
                            <i class="fi fi-rr-search"></i>
                        </button>
                    </form>
                </div>
                <div class="sidebar-widget">
                    <h3 class="sidebar-widget-title">Kategori</h3>
                    <ul class="category-widget list-style">
                        @foreach ($totalCategories as $category)
                            <li><a
                                    href="{{ route('categories.show.user', ['category' => $category->slug]) }}"><img
                                        src="{{ asset('assets/img/icons/arrow-right.svg') }}"
                                        alt="Image">{{ $category->name }}
                                    <span>({{ $category->total }})</span>  
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
                <div class="sidebar-widget">
                    <h3 class="sidebar-widget-title">Berita Popular</h3>
                    <div class="pp-post-wrap">
                        @forelse ($news as $news)
                        <div class="news-card-one">
                            <div class="news-card-img">
                                <img src="{{ asset('storage/' . $news->photo) }}"width="100%" height="80">
                            </div>
                            <div class="news-card-info">
                                <h3><a href="business-details.html">{{ $news->name }}</a>
                                </h3>
                                <ul class="news-metainfo list-style">
                                    <li>

                                        <i><svg xmlns="http://www.w3.org/2000/svg" width="20"
                                                height="20" viewBox="0 0 512 512">
                                                <path
                                                    d=
                                                    "M368.005 272h-96v96h96v-96zm-32-208v32h-160V64h-48v32h-24.01c-22.002 0-40 17.998-40 40v272c0 22.002 17.998 40 40 40h304.01c22.002 0 40-17.998 40-40V136c0-22.002-17.998-40-40-40h-24V64h-48zm72 344h-304.01V196h304.01v212z"
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
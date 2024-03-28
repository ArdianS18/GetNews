@extends('layouts.user.app')

@section('content')

<div class="col-lg-12">
    <div class="breadcrumb-wrap">
        <h2 class="breadcrumb-title">{{ $category->name }}</h2>
        <ul class="breadcrumb-menu list-style">
            <li><a href="index.html">Home</a></li>
            <li>Kategori {{ $category->name }}</li>
        </ul>
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
                            <img src="{{asset('assets/img/test1.svg')}}" width="400px" height="234" style="width: 100%;height:100%;" alt="Iamge">
                            <a href="kesehatan.html" class="news-cat">{{ $newsCategory->category->name }}</a>
                        </div>
                        <div class="news-card-info">
                            <h3><a href="kesehatan-details.html">{{ $newsCategory->news->name }}</a></h3>
                            <ul class="news-metainfo list-style">
                                <li><i class="fi fi-rr-calendar-minus"></i><a href="news-by-date.html">{{ $newsCategory->news->created_at }}</a></li>
                                <li><i class="fi fi-rr-clock-three"></i>15 Min Read</li>
                            </ul>
                        </div>
                    </div>
                </div>
            @empty

            @endforelse
            <div class="col-md-6">
                <div class="news-card-thirteen">
                    <div class="news-card-img">
                        <img src="{{asset('assets/img/test1.svg')}}" width="400px" height="234" style="width: 100%;height:100%;" alt="Iamge">
                        <a href="kesehatan.html" class="news-cat">{{ $category->name }}</a>
                    </div>
                    <div class="news-card-info">
                        <h3><a href="kesehatan-details.html">Recovery And Cleanup In Florida After Hurricane Ian</a></h3>
                        <ul class="news-metainfo list-style">
                            <li><i class="fi fi-rr-calendar-minus"></i><a href="news-by-date.html">Feb 27, 2023</a></li>
                            <li><i class="fi fi-rr-clock-three"></i>15 Min Read</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="news-card-thirteen">
                    <div class="news-card-img">
                        <img src="{{asset('assets/img/test1.svg')}}" width="400px" height="234" style="width: 100%;height:100%;" alt="Iamge">
                        <a href="kesehatan.html" class="news-cat">kesehatan</a>
                    </div>
                    <div class="news-card-info">
                        <h3><a href="kesehatan-details.html">Recovery And Cleanup In Florida After Hurricane Ian</a></h3>
                        <ul class="news-metainfo list-style">
                            <li><i class="fi fi-rr-calendar-minus"></i><a href="news-by-date.html">Feb 27, 2023</a></li>
                            <li><i class="fi fi-rr-clock-three"></i>15 Min Read</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="news-card-thirteen">
                    <div class="news-card-img">
                        <img src="{{asset('assets/img/test1.svg')}}" width="400px" height="234" style="width: 100%;height:100%;" alt="Iamge">
                        <a href="kesehatan.html" class="news-cat">kesehatan</a>
                    </div>
                    <div class="news-card-info">
                        <h3><a href="kesehatan-details.html">Recovery And Cleanup In Florida After Hurricane Ian</a></h3>
                        <ul class="news-metainfo list-style">
                            <li><i class="fi fi-rr-calendar-minus"></i><a href="news-by-date.html">Feb 27, 2023</a></li>
                            <li><i class="fi fi-rr-clock-three"></i>15 Min Read</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="news-card-thirteen">
                    <div class="news-card-img">
                        <img src="{{asset('assets/img/test1.svg')}}" width="400px" height="234" style="width: 100%;height:100%;" alt="Iamge">
                        <a href="kesehatan.html" class="news-cat">kesehatan</a>
                    </div>
                    <div class="news-card-info">
                        <h3><a href="kesehatan-details.html">Recovery And Cleanup In Florida After Hurricane Ian</a></h3>
                        <ul class="news-metainfo list-style">
                            <li><i class="fi fi-rr-calendar-minus"></i><a href="news-by-date.html">Feb 27, 2023</a></li>
                            <li><i class="fi fi-rr-clock-three"></i>15 Min Read</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="news-card-thirteen">
                    <div class="news-card-img">
                        <img src="{{asset('assets/img/test1.svg')}}" width="400px" height="234" style="width: 100%;height:100%;" alt="Iamge">
                        <a href="kesehatan.html" class="news-cat">kesehatan</a>
                    </div>
                    <div class="news-card-info">
                        <h3><a href="kesehatan-details.html">Recovery And Cleanup In Florida After Hurricane Ian</a></h3>
                        <ul class="news-metainfo list-style">
                            <li><i class="fi fi-rr-calendar-minus"></i><a href="news-by-date.html">Feb 27, 2023</a></li>
                            <li><i class="fi fi-rr-clock-three"></i>15 Min Read</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="news-card-thirteen">
                    <div class="news-card-img">
                        <img src="{{asset('assets/img/test1.svg')}}" width="400px" height="234" style="width: 100%;height:100%;" alt="Iamge">
                        <a href="kesehatan.html" class="news-cat">kesehatan</a>
                    </div>
                    <div class="news-card-info">
                        <h3><a href="kesehatan-details.html">Recovery And Cleanup In Florida After Hurricane Ian</a></h3>
                        <ul class="news-metainfo list-style">
                            <li><i class="fi fi-rr-calendar-minus"></i><a href="news-by-date.html">Feb 27, 2023</a></li>
                            <li><i class="fi fi-rr-clock-three"></i>15 Min Read</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="news-card-thirteen">
                    <div class="news-card-img">
                        <img src="{{asset('assets/img/test1.svg')}}" width="400px" height="234" style="width: 100%;height:100%;" alt="Iamge">
                        <a href="kesehatan.html" class="news-cat">kesehatan</a>
                    </div>
                    <div class="news-card-info">
                        <h3><a href="kesehatan-details.html">Recovery And Cleanup In Florida After Hurricane Ian</a></h3>
                        <ul class="news-metainfo list-style">
                            <li><i class="fi fi-rr-calendar-minus"></i><a href="news-by-date.html">Feb 27, 2023</a></li>
                            <li><i class="fi fi-rr-clock-three"></i>15 Min Read</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <ul class="page-nav list-style text-center mt-20">
            <li><a href="kesehatan.html"><i class="flaticon-arrow-left"></i></a></li>
            <li><a class="active" href="kesehatan.html">01</a></li>
            <li><a href="kesehatan.html">02</a></li>
            <li><a href="kesehatan.html">03</a></li>
            <li><a href="kesehatan.html"><i class="flaticon-arrow-right"></i></a></li>
        </ul>
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
                <li><a href="business.html"><img src="{{ asset('assets/img/icons/arrow-right.svg') }}"
                            alt="Image">Celebration <span>(6)</span></a></li>
                <li><a href="business.html"><img src="{{ asset('assets/img/icons/arrow-right.svg') }}"
                            alt="Image">Culture<span>(3)</span></a></li>
                <li><a href="business.html"><img src="{{ asset('assets/img/icons/arrow-right.svg') }}"
                            alt="Image">Fashion<span>(2)</span></a></li>
                <li><a href="business.html"><img src="{{ asset('assets/img/icons/arrow-right.svg') }}"
                            alt="Image">Inspiration<span>(8)</span></a></li>
                <li><a href="business.html"><img src="{{ asset('assets/img/icons/arrow-right.svg') }}"
                            alt="Image">Lifestyle<span>(6)</span></a></li>
                <li><a href="business.html"><img src="{{ asset('assets/img/icons/arrow-right.svg') }}"
                            alt="Image">Politics<span>(2)</span></a></li>
                <li><a href="business.html"><img src="{{ asset('assets/img/icons/arrow-right.svg') }}"
                            alt="Image">Trending<span>(4)</span></a></li>
            </ul>
        </div>
        <div class="sidebar-widget">
            <h3 class="sidebar-widget-title">Berita Popular</h3>
            <div class="pp-post-wrap">
                <div class="news-card-one">
                    <div class="news-card-img">
                        <img src="{{ asset('assets/img/news/news-thumb-4.webp') }}" alt="Image">
                    </div>
                    <div class="news-card-info">
                        <h3><a href="business-details.html">Bernie Nonummy Pelopai Iatis Eum Litora</a>
                        </h3>
                        <ul class="news-metainfo list-style">
                            <li>

                                <i><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                        viewBox="0 0 512 512">
                                        <path
                                            d="M368.005 272h-96v96h96v-96zm-32-208v32h-160V64h-48v32h-24.01c-22.002 0-40 17.998-40 40v272c0 22.002 17.998 40 40 40h304.01c22.002 0 40-17.998 40-40V136c0-22.002-17.998-40-40-40h-24V64h-48zm72 344h-304.01V196h304.01v212z"
                                            fill="#E93314" />
                                    </svg></i><a href="news-by-date.html">Mar 03, 2023</a>
                            </li>

                            <i><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                    viewBox="0 0 512 512">
                                    <path
                                        d="M198 448h172c15.7 0 28.6-9.6 34.2-23.4l57.1-135.4c1.7-4.4 2.6-9 2.6-14v-38.6c0-21.1-17-44.6-37.8-44.6H306.9l18-81.5.6-6c0-7.9-3.2-15.1-8.3-20.3L297 64 171 191.3c-6.8 6.9-11 16.5-11 27.1v192c0 21.1 17.2 37.6 38 37.6z"
                                        fill="#E93314" />
                                    <path d="M48 224h64v224H48z" fill="#E93314" />
                                </svg>
                            </i><a href="news-by-date.html">1.203</a></li>

                            </li>
                        </ul>
                    </div>
                </div>
                <div class="news-card-one">
                    <div class="news-card-img">
                        <img src="{{ asset('assets/img/news/news-thumb-5.webp') }}" alt="Image">
                    </div>
                    <div class="news-card-info">
                        <h3><a href="business-details.html">How Youth Viral Diseases May The Year 2023</a>
                        </h3>
                        <ul class="news-metainfo list-style">
                            <li>
                                <i><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                        viewBox="0 0 512 512">
                                        <path
                                            d="M368.005 272h-96v96h96v-96zm-32-208v32h-160V64h-48v32h-24.01c-22.002 0-40 17.998-40 40v272c0 22.002 17.998 40 40 40h304.01c22.002 0 40-17.998 40-40V136c0-22.002-17.998-40-40-40h-24V64h-48zm72 344h-304.01V196h304.01v212z"
                                            fill="#E93314" />
                                    </svg></i><a href="news-by-date.html">Mar 03, 2023</a>
                            </li>

                            <i><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                    viewBox="0 0 512 512">
                                    <path
                                        d="M198 448h172c15.7 0 28.6-9.6 34.2-23.4l57.1-135.4c1.7-4.4 2.6-9 2.6-14v-38.6c0-21.1-17-44.6-37.8-44.6H306.9l18-81.5.6-6c0-7.9-3.2-15.1-8.3-20.3L297 64 171 191.3c-6.8 6.9-11 16.5-11 27.1v192c0 21.1 17.2 37.6 38 37.6z"
                                        fill="#E93314" />
                                    <path d="M48 224h64v224H48z" fill="#E93314" />
                                </svg>
                            </i><a href="news-by-date.html">1.203</a></li>

                            </li>
                        </ul>
                    </div>
                </div>
                <div class="news-card-one">
                    <div class="news-card-img">
                        <img src="{{ asset('assets/img/news/news-thumb-6.webp') }}" alt="Image">
                    </div>
                    <div class="news-card-info">
                        <h3><a href="business-details.html">Man Wearing Black Pullover Hoodie To Smoke</a>
                        </h3>
                        <ul class="news-metainfo list-style">
                            <li>
                                <i><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                        viewBox="0 0 512 512">
                                        <path
                                            d="M368.005 272h-96v96h96v-96zm-32-208v32h-160V64h-48v32h-24.01c-22.002 0-40 17.998-40 40v272c0 22.002 17.998 40 40 40h304.01c22.002 0 40-17.998 40-40V136c0-22.002-17.998-40-40-40h-24V64h-48zm72 344h-304.01V196h304.01v212z"
                                            fill="#E93314" />
                                    </svg></i><a href="news-by-date.html">Mar 03, 2023</a>
                            </li>

                            <i><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                    viewBox="0 0 512 512">
                                    <path
                                        d="M198 448h172c15.7 0 28.6-9.6 34.2-23.4l57.1-135.4c1.7-4.4 2.6-9 2.6-14v-38.6c0-21.1-17-44.6-37.8-44.6H306.9l18-81.5.6-6c0-7.9-3.2-15.1-8.3-20.3L297 64 171 191.3c-6.8 6.9-11 16.5-11 27.1v192c0 21.1 17.2 37.6 38 37.6z"
                                        fill="#E93314" />
                                    <path d="M48 224h64v224H48z" fill="#E93314" />
                                </svg>
                            </i><a href="news-by-date.html">1.203</a></li>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="news-card-one">
                    <div class="news-card-img">
                        <img src="{{ asset('assets/img/news/news-thumb-6.webp') }}" alt="Image">
                    </div>
                    <div class="news-card-info">
                        <h3><a href="business-details.html">Man Wearing Black Pullover Hoodie To Smoke</a>
                        </h3>
                        <ul class="news-metainfo list-style">
                            <li>
                                <i><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                        viewBox="0 0 512 512">
                                        <path
                                            d="M368.005 272h-96v96h96v-96zm-32-208v32h-160V64h-48v32h-24.01c-22.002 0-40 17.998-40 40v272c0 22.002 17.998 40 40 40h304.01c22.002 0 40-17.998 40-40V136c0-22.002-17.998-40-40-40h-24V64h-48zm72 344h-304.01V196h304.01v212z"
                                            fill="#E93314" />
                                    </svg></i><a href="news-by-date.html">Mar 03, 2023</a>
                            </li>

                            <i><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                    viewBox="0 0 512 512">
                                    <path
                                        d="M198 448h172c15.7 0 28.6-9.6 34.2-23.4l57.1-135.4c1.7-4.4 2.6-9 2.6-14v-38.6c0-21.1-17-44.6-37.8-44.6H306.9l18-81.5.6-6c0-7.9-3.2-15.1-8.3-20.3L297 64 171 191.3c-6.8 6.9-11 16.5-11 27.1v192c0 21.1 17.2 37.6 38 37.6z"
                                        fill="#E93314" />
                                    <path d="M48 224h64v224H48z" fill="#E93314" />
                                </svg>
                            </i><a href="news-by-date.html">1.203</a></li>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="news-card-one">
                    <div class="news-card-img">
                        <img src="{{ asset('assets/img/news/news-thumb-6.webp') }}" alt="Image">
                    </div>
                    <div class="news-card-info">
                        <h3><a href="business-details.html">Man Wearing Black Pullover Hoodie To Smoke</a>
                        </h3>
                        <ul class="news-metainfo list-style">
                            <li>
                                <i><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                        viewBox="0 0 512 512">
                                        <path
                                            d="M368.005 272h-96v96h96v-96zm-32-208v32h-160V64h-48v32h-24.01c-22.002 0-40 17.998-40 40v272c0 22.002 17.998 40 40 40h304.01c22.002 0 40-17.998 40-40V136c0-22.002-17.998-40-40-40h-24V64h-48zm72 344h-304.01V196h304.01v212z"
                                            fill="#E93314" />
                                    </svg></i><a href="news-by-date.html">Mar 03, 2023</a>
                            </li>

                            <i><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                    viewBox="0 0 512 512">
                                    <path
                                        d="M198 448h172c15.7 0 28.6-9.6 34.2-23.4l57.1-135.4c1.7-4.4 2.6-9 2.6-14v-38.6c0-21.1-17-44.6-37.8-44.6H306.9l18-81.5.6-6c0-7.9-3.2-15.1-8.3-20.3L297 64 171 191.3c-6.8 6.9-11 16.5-11 27.1v192c0 21.1 17.2 37.6 38 37.6z"
                                        fill="#E93314" />
                                    <path d="M48 224h64v224H48z" fill="#E93314" />
                                </svg>
                            </i><a href="news-by-date.html">1.203</a></li>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="news-card-one">
                    <div class="news-card-img">
                        <img src="{{ asset('assets/img/news/news-thumb-6.webp') }}" alt="Image">
                    </div>
                    <div class="news-card-info">
                        <h3><a href="business-details.html">Man Wearing Black Pullover Hoodie To Smoke</a>
                        </h3>
                        <ul class="news-metainfo list-style">
                            <li>
                                <i><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                        viewBox="0 0 512 512">
                                        <path
                                            d="M368.005 272h-96v96h96v-96zm-32-208v32h-160V64h-48v32h-24.01c-22.002 0-40 17.998-40 40v272c0 22.002 17.998 40 40 40h304.01c22.002 0 40-17.998 40-40V136c0-22.002-17.998-40-40-40h-24V64h-48zm72 344h-304.01V196h304.01v212z"
                                            fill="#E93314" />
                                    </svg></i><a href="news-by-date.html">Mar 03, 2023</a>
                            </li>

                            <i><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                    viewBox="0 0 512 512">
                                    <path
                                        d="M198 448h172c15.7 0 28.6-9.6 34.2-23.4l57.1-135.4c1.7-4.4 2.6-9 2.6-14v-38.6c0-21.1-17-44.6-37.8-44.6H306.9l18-81.5.6-6c0-7.9-3.2-15.1-8.3-20.3L297 64 171 191.3c-6.8 6.9-11 16.5-11 27.1v192c0 21.1 17.2 37.6 38 37.6z"
                                        fill="#E93314" />
                                    <path d="M48 224h64v224H48z" fill="#E93314" />
                                </svg>
                            </i><a href="news-by-date.html">1.203</a></li>
                            </li>
                        </ul>
                    </div>
                </div>
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

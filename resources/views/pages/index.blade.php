@extends('layouts.user.app')
@section('style')
    <style>

    </style>
@endsection
@section('content')
    <div class="">
        <div class="trending-news-box">
            <div class="d-flex justify-content-center gap-2 mb-3">
                <div class="trending-prev"><i class="flaticon-left-arrow"></i></div>
                <h4>Trending Now</h4>
                <div class="trending-next"><i class="flaticon-right-arrow"></i></div>
            </div>
            <div class="row gx-5">
                <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12">
                    <div class="trending-news-slider swiper">
                        <div class="swiper-wrapper">
                            @foreach ($trendings as $trending)
                                <div class="swiper-slide news-card-one">
                                    <div class="news-card-img">
                                        <img src="{{ asset('storage/' . $trending->news->photo) }}" width="100%" height="90" style="object-fit: cover;" alt="Image" />
                                    </div>
                                    <div class="news-card-info">
                                        <h3><a href="{{ route('news.user', ['news' => $trending->news->slug, ]) }}">
                                            {!! Illuminate\Support\Str::limit($trending->news->name, $limit = 50, $end = '...')  !!}
                                        </a></h3>
                                        <ul class="news-metainfo list-style">
                                            <li><i class="fi fi-rr-eye"></i>{{ $trending->total }}</li>
                                        </ul>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid pb-75">
        <div class="news-col-wrap">
            <div class="news-col-one">
                @php $counter= 0; @endphp
                @foreach ($news_left as $newss)
                    @if ($counter < 1)
                        <div class="news-card-two">
                            <div class="news-card-img">
                                <img src="{{ asset('storage/' . $newss->photo) }}" style="object-fit: cover;" width="100%" alt="Image"
                                    height="250" />

                                <a href="{{ route('categories.show.user', ['category' => $newss->newsCategories[0]->category->slug]) }}"
                                    class="news-cat">{{ $newss->newsCategories[0]->category->name }}</a>
                            </div>
                            <div class="news-card-info">
                                <h3><a href="{{ route('news.user', ['news' => $newss->slug, ]) }}">
                                        {!! Illuminate\Support\Str::limit($newss->name, $limit = 60, $end = '...')  !!}
                                    </a>
                                <ul class="news-metainfo list-style">
                                    <li><i class="fi fi-rr-calendar-minus"></i><a href="javascript:void(0)">
                                            <p>{{ \Carbon\Carbon::parse($newss->upload_date)->translatedFormat('d F Y') }}
                                            </p>
                                        </a>
                                    </li>
                                    <li><i class="fi fi-rr-eye"></i>{{ $newss->views_count }}</li>
                                </ul>
                            </div>
                        </div>
                    @elseif ($counter < 4)
                        <div class="news-card-three">
                            <div class="news-card-img">
                                <img src="{{ asset('storage/' . $newss->photo) }}" alt="Image" height="100"
                                    width="100%" style="object-fit: cover" />
                            </div>
                            <div class="news-card-info">
                                <a href="{{ route('categories.show.user', ['category' => $newss->newsCategories[0]->category->slug]) }}"
                                    class="news-cat">{{ $newss->newsCategories[0]->category->name }}</a>
                                <h3>
                                    <a href="{{ route('news.user', ['news' => $newss->slug, 'page' => 1]) }}">
                                        {!! Illuminate\Support\Str::limit($newss->name, $limit = 40, $end = '...')  !!}
                                    </a>
                                </h3>
                                <ul class="news-metainfo list-style">
                                    <li><i class="fi fi-rr-calendar-minus"></i><a
                                            href="javascript:void(0)">{{ \Carbon\Carbon::parse($newss->created_at)->translatedFormat('d F Y') }}</a>
                                    </li>
                                    <li><i class="fi fi-rr-eye"></i>{{ $newss->views_count }}</li>

                                </ul>
                            </div>
                        </div>
                    @else
                    @endif
                    @php $counter++; @endphp

                    @if ($counter == 5)
                        @php $counter = 0; @endphp
                    @endif
                @endforeach
            </div>
            <div class="news-col-two">
                @php $counter= 0; @endphp
                @foreach ($news_mid as $mid)
                    @if ($counter < 1)
                        <div class="news-card-four">
                            <img src="{{ asset('storage/' . $mid->photo) }}" alt="Image" width="100%" style="object-fit: cover"
                                height="450" />
                            <div class="news-card-info">
                                <h3><a href="{{ route('news.user', ['news' => $mid->slug, ]) }}">
                                        {!! Illuminate\Support\Str::limit($mid->name, $limit = 50, $end = '...')  !!}
                                    </a>
                                <ul class="news-metainfo list-style">
                                    <li><i class="fi fi-rr-calendar-minus"></i><a href="javascript:void(0)">
                                            <p>{{ \Carbon\Carbon::parse($mid->created_at)->translatedFormat('d F Y') }}</p>
                                        </a></li>
                                    <li><i class="fi fi-rr-eye mt-2"></i>{{ $mid->views_count }}</li>
                                </ul>
                            </div>
                        </div>
                    @elseif ($counter < 3)
                        <div class="news-card-five">
                            <div class="news-card-img">
                                <img src="{{ asset('storage/' . $mid->photo) }}" alt="Image" height="150"
                                    width="100%" />
                                <a href="{{ route('categories.show.user', ['category' => $mid->newsCategories[0]->category->slug]) }}"
                                    class="news-cat">{{ $mid->newsCategories[0]->category->name }}</a>
                            </div>
                            <div class="news-card-info">
                                <h3><a href="{{ route('news.user', ['news' => $mid->slug, 'page' => 1]) }}">
                                        {!! Illuminate\Support\Str::limit($mid->name, $limit = 50, $end = '...')  !!}
                                    </a>
                                </h3>
                                <ul class="news-metainfo list-style">
                                    <li><i class="fi fi-rr-calendar-minus"></i><a
                                            href="javascript:void(0)">{{ \Carbon\Carbon::parse($newss->created_at)->translatedFormat('d F Y') }}</a>
                                    </li>
                                    <li><i class="fi fi-rr-eye"></i>{{ $mid->views_count }}</li>
                                </ul>
                            </div>
                        </div>
                    @else
                    @endif
                    @php $counter++; @endphp
                    @if ($counter == 4)
                        @php $counter = 0; @endphp
                    @endif
                @endforeach
            </div>
            <div class="news-col-three">
                @php $counters= 0; @endphp
                @foreach ($news_right as $barus)
                    @if ($counters < 1)
                        <div class="news-card-two">
                            <div class="news-card-img">
                                <img src="{{ asset('storage/' . $barus->photo) }}" style="object-fit: cover;"
                                    alt="Image" height="250" width="100%" />
                                <a href="{{ route('categories.show.user', ['category' => $barus->newsCategories[0]->category->slug]) }}"
                                    class="news-cat">{{ $barus->newsCategories[0]->category->name }}</a>
                            </div>
                            <div class="news-card-info">
                                <h3><a href="{{ route('news.user', ['news' => $barus->slug, ]) }}">
                                        {{-- {{ $barus->name }} --}}
                                        {!! Illuminate\Support\Str::limit($barus->name, $limit = 60, $end = '...')  !!}
                                    </a>
                                <ul class="news-metainfo list-style">
                                    <li><i class="fi fi-rr-calendar-minus"></i><a href="javascript:void(0)">
                                            <p>{{ \Carbon\Carbon::parse($barus->created_at)->translatedFormat('d F Y') }}
                                            </p>
                                        </a></li>
                                    <li><i class="fi fi-rr-eye"></i>{{ $barus->views_count }}</li>
                                </ul>
                            </div>
                        </div>
                    @elseif ($counters < 4)
                        <div class="news-card-three">
                            <div class="news-card-img">
                                <img src="{{ asset('storage/' . $barus->photo) }}" style="object-fit:cover;" width="100%" height="100"
                                    alt="Image" />
                            </div>
                            <div class="news-card-info">
                                <a
                                    href="{{ route('categories.show.user', ['category' => $barus->newsCategories[0]->category->slug]) }}" class="news-cat">{{ $barus->newsCategories[0]->category->name }}</a>
                                <h3><a href="{{ route('news.user', ['news' => $barus->slug, 'page' => 1]) }}">
                                        {!! Illuminate\Support\Str::limit($barus->name, $limit = 40, $end = '...')  !!}
                                    </a>
                                </h3>
                                <ul class="news-metainfo list-style">
                                    <li><i class="fi fi-rr-calendar-minus"></i><a
                                            href="javascript:void(0)">{{ \Carbon\Carbon::parse($barus->created_at)->translatedFormat('d F Y') }}</a>
                                    </li>
                                    <li><i class="fi fi-rr-eye"></i>{{ $barus->views_count }}</li>
                                </ul>
                            </div>
                        </div>
                    @else
                    @endif
                    @php $counters++; @endphp
                    @if ($counters == 5)
                        @php $counters = 0; @endphp
                    @endif
                @endforeach
            </div>
        </div>
    </div>

    <div class="bg_gray editor-news pt-100 pb-75">
        <div class="container-fluid">
            <div class="row gx-5">
                <div class="col-xl-6">
                    <div class="editor-box">
                        <div class="row align-items-end mb-40">
                            <div class="col-md-6">
                                <h2 class="section-title">Editor's Pick
                                    <img class="section-title-img" src="assets/img/section-img.webp" alt="Image" />
                                </h2>
                            </div>
                        </div>
                        <div class="tab-content col-md-12 editor-news-content">
                            <div class="tab-pane fade show active" id="tab_1" role="tabpanel">
                                <div class="row">
                                    @forelse ($picks as $pick)
                                        <div class="col-md-6">
                                            <div class="news-card-six">
                                                <div class="news-card-img">
                                                    <img src="{{ asset('storage/' . $pick->photo) }}" alt="Image" />
                                                </div>
                                                <div class="news-card-info">
                                                    <div class="news-author">
                                                        <div class="news-author-img">
                                                            <img src="{{ asset($pick->user->photo ? 'storage/' . $pick->user->photo : 'default.png') }}"
                                                                alt="Image" width="40px" height="40px"
                                                                style="border-radius: 50%; object-fit:cover;" />
                                                        </div>
                                                        <h5>By <a href="author.html">{{ $pick->user->name }}</a>
                                                        </h5>
                                                    </div>
                                                    <h3>
                                                        <a href="{{ route('news.user', ['news' => $pick->slug, ]) }}">
                                                            {!! Illuminate\Support\Str::limit($pick->name, $limit = 47, $end = '...')  !!}
                                                        </a>
                                                    </h3>
                                                    <ul class="news-metainfo list-style">
                                                        <li><i class="fi fi-rr-calendar-minus"></i><a
                                                                href="javascript:void(0)">{{ \Carbon\Carbon::parse($pick->created_at)->translatedFormat('d F Y') }}</a>
                                                        </li>
                                                        <li><i class="fi fi-rr-eye"></i>{{ $pick->views_count }}</li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    @empty
                                    @endforelse
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6">
                    <div class="pp-news-box">
                        <ul class="nav nav-tabs news-tablist-two" role="tablist">
                            <li class="nav-item">
                                <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#tab_10" type="button"
                                    role="tab">Popular News</button>
                            </li>
                            <li class="nav-item">
                                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#tab_11" type="button"
                                    role="tab">Recent News</button>
                            </li>
                        </ul>

                        <div class="tab-content news-tab-content">
                            <div class="tab-pane fade show active" id="tab_10" role="tabpanel">
                                @forelse ($populars as $popular)
                                    <div class="news-card-seven">
                                        <div class="news-card-img">
                                            <img src="{{ asset('storage/' . $popular->photo) }}" alt="Image" width="100%" height="110" style="object-fit: cover"/>
                                        </div>
                                        <div class="news-card-info">
                                            <a href="{{ route('categories.show.user', ['category' => $popular->newsCategories[0]->category->slug]) }}" class="news-cat">{{ $popular->newsCategories[0]->category->name }}</a>
                                            <h3><a href="{{ route('news.user', ['news' => $popular->slug, ]) }}">
                                                {!! Illuminate\Support\Str::limit($popular->name, $limit = 60, $end = '...')  !!}
                                            </a></h3>
                                            <ul class="news-metainfo list-style">
                                                <li><i class="fi fi-rr-calendar-minus"></i><a
                                                        href="javascript:void(0)">{{ \Carbon\Carbon::parse($popular->created_at)->translatedFormat('d F Y') }}</a>
                                                </li>
                                                <li><i class="fi fi-rr-eye"></i>{{ $popular->views_count }}</li>
                                            </ul>
                                        </div>
                                    </div>
                                @empty
                                @endforelse
                            </div>
                            <div class="tab-pane fade" id="tab_11" role="tabpanel">
                                @forelse ($news_recent as $recent)
                                    <div class="news-card-seven">
                                        <div class="news-card-img">
                                            <img src="{{ asset('storage/' . $recent->photo) }}" alt="Image" width="100%" height="110" style="object-fit: cover"/>
                                        </div>
                                        <div class="news-card-info">
                                            <a href="{{ route('categories.show.user', ['category' => $recent->newsCategories[0]->category->slug]) }}" class="news-cat">{{ $recent->newsCategories[0]->category->name }}</a>
                                            <h3><a href="{{ route('news.user', ['news' => $recent->slug, ]) }}">
                                                {!! Illuminate\Support\Str::limit($recent->name, $limit = 60, $end = '...')  !!}
                                            </a></h3>
                                            <ul class="news-metainfo list-style">
                                                <li><i class="fi fi-rr-calendar-minus"></i><a
                                                        href="javascript:void(0)">{{ \Carbon\Carbon::parse($recent->upload_date)->translatedFormat('d F Y') }}</a>
                                                </li>
                                                <li><i class="fi fi-rr-eye"></i>{{ $recent->views_count }}</li>
                                            </ul>
                                        </div>
                                    </div>
                                @empty
                                @endforelse
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>



    <div class="general-news ptb-100">
        <div class="container-fluid">
            <div class="content-wrapper">
                <div class="left-content">
                    <div class="row align-items-end mb-40">
                        <div class="col-md-7">
                            <h2 class="section-title">General News<img class="section-title-img"
                                    src="assets/img/section-img.webp" alt="Image" /></h2>
                        </div>
                        <div class="col-md-5 text-md-end">
                            <a href="/all-news-post" class="link-one">View All News<i class="flaticon-right-arrow"></i></a>
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        @forelse ($generals as $general)
                            <div class="col-xl-6">
                                <div class="news-card-twelve">
                                    <div class="news-card-img">
                                        <img src="{{ asset('storage/' . $general->photo) }}" alt="Image" width="100%" height="130" style="object-fit: cover"/>
                                        {{-- <img src="assets/img/news/news-20.webp" alt="Image" /> --}}
                                    </div>
                                    <div class="news-card-info">
                                        <a href="{{ route('categories.show.user', ['category' => $general->newsCategories[0]->category->slug]) }}" class="news-cat">{{ $general->newsCategories[0]->category->name }}</a>
                                        <h3><a href="{{ route('news.user', ['news' => $general->slug, ]) }}">
                                            {!! Illuminate\Support\Str::limit($general->name, $limit = 47, $end = '...')  !!}
                                        </a></h3>
                                        <ul class="news-metainfo list-style">
                                            <li><i class="fi fi-rr-calendar-minus"></i><a
                                                    href="javascript:void(0)">{{ \Carbon\Carbon::parse($general->upload_date)->translatedFormat('d F Y') }}</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        @empty
                        @endforelse
                    </div>
                    <div class="ad-section">
                        <p>SPONSORED AD</p>
                    </div>
                    <div class="promo-wrap">
                        <div class="promo-card-two">
                            <img src="assets/img/promo-shape-1.webp" alt="Image" class="promo-shape" />
                            <div class="promo-content">
                                <a href="index.html" class="logo">
                                    <img class="logo-light" src="assets/img/logo.webp" alt="Image" />
                                    <img class="logo-dark" src="assets/img/logo-white.webp" alt="Image" />
                                </a>
                                <p>The European languages are members of the same family separ existence is a Baxo. For
                                    science, music, sport, etc.</p>
                            </div>
                            <img src="assets/img/promo-img-2.webp" alt="Image" class="promo-img" />
                        </div>
                    </div>
                </div>
                <div class="sidebar">
                    <div class="sidebar-widget-two">
                        <div class="contact-widget">
                            <img src="assets/img/contact-bg.svg" alt="Image" class="contact-shape" />
                            <a href="index.html" class="logo">
                                <img class="logo-light" src="{{asset('assets/img/logo-getmedia-dark.svg')}}" alt="Image" />
                                <img class="logo-dark" src="{{asset('assets/img/logo-get-media.png')}}" alt="Image" />
                            </a>
                            <p>Mauris mattis auctor cursus. Phasellus iso tellus tellus, imperdiet ut imperdiet eu,
                                noiaculis a sem Donec vehicula luctus nunc in laoreet Aliquam</p>
                            <ul class="social-profile list-style">
                                <li>
                                    <a href="https://www.fb.com/" target="_blank"><i class="flaticon-facebook-1"></i></a>
                                </li>
                                <li>
                                    <a href="https://www.twitter.com/" target="_blank"><i
                                            class="flaticon-twitter-1"></i></a>
                                </li>
                                <li>
                                    <a href="https://www.instagram.com/" target="_blank"><i
                                            class="flaticon-instagram-2"></i></a>
                                </li>
                                <li>
                                    <a href="https://www.linkedin.com/" target="_blank"><i
                                            class="flaticon-linkedin"></i></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="sidebar-widget">
                        <h3 class="sidebar-widget-title">Popular Posts</h3>
                        <div class="pp-post-wrap">
                            @forelse ($popular_post as $post)
                                <div class="news-card-one">
                                    <div class="news-card-img">
                                        <img src="{{ asset('storage/' . $post->photo) }}" alt="Image" width="100%" height="80"/>
                                        {{-- <img src="assets/img/news/news-thumb-4.webp" alt="Image" /> --}}
                                    </div>
                                    <div class="news-card-info">
                                        <h3><a href="{{ route('news.user', ['news' => $post->slug, ]) }}">
                                            {!! Illuminate\Support\Str::limit($post->name, $limit = 20, $end = '...')  !!}
                                        </a></h3>
                                        <ul class="news-metainfo list-style">
                                            <li><i class="fi fi-rr-calendar-minus"></i><a href="news-by-date.html">Apr 22,
                                                    2023</a></li>
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
                            @forelse ($tags as $tag)
                            <li><a href="{{ route('tag.show.user',['tag'=>$tag->slug]) }}">{{ $tag->name }}</a></li>
                            @empty

                            @endforelse
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        var swiper = new Swiper('.trending-news-slider', {
            autoplay: {
                delay: 4000,
            },
            breakpoints: {
                768: {
                    slidesPerView: 1
                },
                1024: {
                    slidesPerView: 2
                },
                1440: {
                    slidesPerView: 3,
                }
            }
        });
    </script>
@endsection

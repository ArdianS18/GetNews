@extends('layouts.user.app')
@section('title', 'Informasi Berita Terkini,Terbaru dan Akurat')
@section('style')
    <style>
        @media (max-width: 768px) {
            .img-responsive {
                height: 300px;
            }
        }

        .scrollscreen .scrollscreen--track {
            width: 18px;
            background: transparent;
            position: relative;
            position: absolute;
            right: 0;
            top: 0;
            height: 100%;
            pointer-events: none;
        }
    </style>
@endsection
@section('content')
    <div class="">
        <div class="trending-news-box">
            <div class="d-flex justify-content-center gap-3 mb-3">
                <div class="trending-prev"><i class="flaticon-left-arrow"></i></div>
                <h4>Artikel Populer</h4>
                <div class="trending-next ms-3"><i class="flaticon-right-arrow"></i></div>
            </div>
            <div class="row gx-5">
                <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12">
                    <div class="trending-news-slider swiper">
                        <div class="swiper-wrapper">
                            @foreach ($trendings as $trending)
                                @php
                                    $dateParts = date_parse($trending->news->upload_date);
                                @endphp
                                <div class="swiper-slide news-card-one">
                                    <div class="news-card-img">
                                        <a
                                            href="{{ route('news.user', ['news' => $trending->news->slug, 'year' => $dateParts['year'], 'month' => $dateParts['month'], 'day' => $dateParts['day']]) }}">
                                            <img src="{{ asset('storage/' . $trending->news->photo) }}" width="100%"
                                                height="90" style="object-fit: cover;" alt="Image" />
                                        </a>
                                    </div>
                                    <div class="news-card-info">
                                        <h3><a data-toggle="tooltip" data-placement="top"
                                                title="{{ $trending->news->name }}"
                                                href="{{ route('news.user', ['news' => $trending->news->slug, 'year' => $dateParts['year'], 'month' => $dateParts['month'], 'day' => $dateParts['day']]) }}">
                                                {!! Illuminate\Support\Str::limit($trending->news->name, $limit = 40, $end = '...') !!}
                                            </a></h3>
                                        <ul class="news-metainfo list-style">
                                            <li><i class="fi fi-rr-eye"></i><p>{{ $trending->total }}</p></li>
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
                    @php
                        $dateParts = date_parse($newss->news->upload_date);
                    @endphp
                    @if ($counter < 1)
                        <div class="news-card-two">
                            <div class="news-card-img">
                                <a
                                    href="{{ route('news.user', ['news' => $newss->news->slug, 'year' => $dateParts['year'], 'month' => $dateParts['month'], 'day' => $dateParts['day']]) }}">
                                    <img src="{{ asset('storage/' . $newss->news->photo) }}" class="img-responsive"
                                        style="object-fit: cover;" width="100%" alt="Image" height="250" />
                                </a>
                                <a href="{{ route('categories.show.user', ['category' => $newss->news->newsCategories[0]->category->slug]) }}"
                                    class="news-cat">{{ $newss->news->newsCategories[0]->category->name }}</a>
                            </div>
                            <div class="news-card-info">
                                <h3><a data-toggle="tooltip" data-placement="top" title="{{ $newss->name }}"
                                        href="{{ route('news.user', ['news' => $newss->news->slug, 'year' => $dateParts['year'], 'month' => $dateParts['month'], 'day' => $dateParts['day']]) }}">
                                        {!! Illuminate\Support\Str::limit($newss->news->name, $limit = 60, $end = '...') !!}
                                    </a>
                                </h3>
                                <ul class="news-metainfo list-style">
                                    <li><i class="fi fi-rr-calendar-minus"></i>
                                        {{ \Carbon\Carbon::parse($newss->news->upload_date)->translatedFormat('d F Y') }}
                                    </li>
                                    <li><i class="fi fi-rr-eye"></i>{{ $newss->total }}</li>
                                </ul>
                            </div>
                        </div>
                    @elseif ($counter < 4)
                        <div class="news-card-three">
                            <div class="news-card-img">
                                <a
                                    href="{{ route('news.user', ['news' => $newss->news->slug, 'year' => $dateParts['year'], 'month' => $dateParts['month'], 'day' => $dateParts['day']]) }}">
                                    <img src="{{ asset('storage/' . $newss->news->photo) }}" alt="Image" height="100"
                                        width="100%" style="object-fit: cover" />
                                </a>
                            </div>
                            <div class="news-card-info">
                                <a href="{{ route('categories.show.user', ['category' => $newss->news->newsCategories[0]->category->slug]) }}"
                                    class="news-cat">{{ $newss->news->newsCategories[0]->category->name }}</a>
                                <h3>
                                    <a data-toggle="tooltip" data-placement="top" title="{{ $newss->news->name }}"
                                        href="{{ route('news.user', ['news' => $newss->news->slug, 'year' => $dateParts['year'], 'month' => $dateParts['month'], 'day' => $dateParts['day']]) }}">
                                        {!! Illuminate\Support\Str::limit($newss->news->name, $limit = 40, $end = '...') !!}
                                    </a>
                                </h3>
                                <ul class="news-metainfo list-style">
                                    <li><i class="fi fi-rr-calendar-minus"></i><a
                                            href="javascript:void(0)">{{ \Carbon\Carbon::parse($newss->news->created_at)->translatedFormat('d F Y') }}</a>
                                    </li>
                                    <li><i class="fi fi-rr-eye"></i>{{ $newss->total }}</li>

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
                    @php
                        $dateParts = date_parse($mid->upload_date);
                    @endphp
                    @if ($counter < 1)
                        <div class="news-card-four">
                            <div class="news-card-img">
                                <a
                                    href="{{ route('news.user', ['news' => $mid->slug, 'year' => $dateParts['year'], 'month' => $dateParts['month'], 'day' => $dateParts['day']]) }}">
                                    <img src="{{ asset('storage/' . $mid->photo) }}" class="img-responsive" alt="Image"
                                        width="100%" style="object-fit: cover" height="450" />
                                </a>
                            </div>

                            <div class="news-card-info">
                                <h3><a data-toggle="tooltip" data-placement="top" title="{{ $mid->name }}"
                                        href="{{ route('news.user', ['news' => $mid->slug, 'year' => $dateParts['year'], 'month' => $dateParts['month'], 'day' => $dateParts['day']]) }}">
                                        {!! Illuminate\Support\Str::limit($mid->name, $limit = 50, $end = '...') !!}
                                    </a>
                                </h3>

                                <ul class="news-metainfo list-style">
                                    <li><i class="fi fi-rr-calendar-minus"></i><a href="javascript:void(0)">
                                            <p>{{ \Carbon\Carbon::parse($mid->created_at)->translatedFormat('d F Y') }}</p>
                                        </a></li>
                                    <li><i class="fi fi-rr-eye" style="margin-top: 2px;"></i>{{ $mid->views_count }}</li>
                                </ul>
                            </div>
                        </div>
                    @elseif ($counter < 3)
                        <hr>
                        <div class="news-card-five">
                            <div class="news-card-img">
                                <a
                                    href="{{ route('news.user', ['news' => $mid->slug, 'year' => $dateParts['year'], 'month' => $dateParts['month'], 'day' => $dateParts['day']]) }}">
                                    <img src="{{ asset('storage/' . $mid->photo) }}" class="img-responsive" alt="Image"
                                        height="150" width="100%" />
                                </a>
                                <a href="{{ route('categories.show.user', ['category' => $mid->newsCategories[0]->category->slug]) }}"
                                    class="news-cat">{{ $mid->newsCategories->random()->category->name }}</a>
                            </div>
                            <div class="news-card-info">
                                <h3><a data-toggle="tooltip" data-placement="top" title="{{ $mid->name }}"
                                        href="{{ route('news.user', ['news' => $mid->slug, 'year' => $dateParts['year'], 'month' => $dateParts['month'], 'day' => $dateParts['day']]) }}">
                                        {!! Illuminate\Support\Str::limit($mid->name, $limit = 55, $end = '...') !!}
                                    </a>
                                </h3>
                                <p>{!! Illuminate\Support\Str::limit(strip_tags($mid->content), 75, '...') !!}</p>
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
                    @php
                        $dateParts = date_parse($barus->upload_date);
                    @endphp
                    @if ($counters < 1)
                        <div class="news-card-two">
                            <div class="news-card-img">
                                <a
                                    href="{{ route('news.user', ['news' => $barus->slug, 'year' => $dateParts['year'], 'month' => $dateParts['month'], 'day' => $dateParts['day']]) }}">
                                    <img src="{{ asset('storage/' . $barus->photo) }}" class="img-responsive"
                                        style="object-fit: cover;" alt="Image" height="250" width="100%" />
                                </a>
                                <a href="{{ route('categories.show.user', ['category' => $barus->newsCategories[0]->category->slug]) }}"
                                    class="news-cat">{{ $barus->newsCategories[0]->category->name }}</a>
                            </div>
                            <div class="news-card-info">
                                <h3><a data-toggle="tooltip" data-placement="top" title="{{ $barus->name }}"
                                        href="{{ route('news.user', ['news' => $barus->slug, 'year' => $dateParts['year'], 'month' => $dateParts['month'], 'day' => $dateParts['day']]) }}">
                                        {!! Illuminate\Support\Str::limit($barus->name, $limit = 60, $end = '...') !!}
                                    </a>
                                </h3>
                                <ul class="news-metainfo list-style">
                                    <li><i class="fi fi-rr-calendar-minus"></i>
                                        {{ \Carbon\Carbon::parse($barus->created_at)->translatedFormat('d F Y') }}
                                    </li>
                                    <li><i class="fi fi-rr-eye"></i>{{ $barus->views_count }}</li>
                                </ul>
                            </div>
                        </div>
                    @elseif ($counters < 4)
                        <div class="news-card-three">
                            <div class="news-card-img">
                                <a
                                    href="{{ route('news.user', ['news' => $barus->slug, 'year' => $dateParts['year'], 'month' => $dateParts['month'], 'day' => $dateParts['day']]) }}">
                                    <img src="{{ asset('storage/' . $barus->photo) }}" class="img-responsive"
                                        style="object-fit:cover;" width="100%" height="100" alt="Image" />
                                </a>
                            </div>
                            <div class="news-card-info">
                                <a data-toggle="tooltip" data-placement="top" title="{{ $barus->name }}"
                                    href="{{ route('categories.show.user', ['category' => $barus->newsCategories[0]->category->slug]) }}"
                                    class="news-cat">{{ $barus->newsCategories[0]->category->name }}</a>
                                <h3><a
                                        href="{{ route('news.user', ['news' => $barus->slug, 'year' => $dateParts['year'], 'month' => $dateParts['month'], 'day' => $dateParts['day']]) }}">
                                        {!! Illuminate\Support\Str::limit($barus->name, $limit = 40, $end = '...') !!}
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
                                <h2 class="section-title">Pilihan Editor
                                    <img class="section-title-img" src="assets/img/section-img.webp" alt="Image" />
                                </h2>
                            </div>
                        </div>
                        <div class="tab-content col-md-12 editor-news-content">
                            <div class="tab-pane fade show active" id="tab_1" role="tabpanel">
                                <div class="row">
                                    @forelse ($picks as $pick)
                                        @php
                                            $dateParts = date_parse($pick->upload_date);
                                        @endphp
                                        <div class="col-md-6">
                                            <div class="news-card-six">
                                                <div class="news-card-img">
                                                    <a
                                                        href="{{ route('news.user', ['news' => $pick->slug, 'year' => $dateParts['year'], 'month' => $dateParts['month'], 'day' => $dateParts['day']]) }}">
                                                        <img src="{{ asset('storage/' . $pick->photo) }}"
                                                            class="img-responsive" width="100%" height="220"
                                                            style="object-fit: cover;" alt="Image" />
                                                    </a>
                                                    <a href="{{ route('categories.show.user', ['category' => $mid->newsCategories[0]->category->slug]) }}"
                                                        class="news-cat">{{ $mid->newsCategories[0]->category->name }}</a>
                                                </div>
                                                <div class="news-card-info">
                                                    <div class="news-author">
                                                        <div class="news-author-img">
                                                            <a
                                                                href="{{ route('news.user', ['news' => $pick->slug, 'year' => $dateParts['year'], 'month' => $dateParts['month'], 'day' => $dateParts['day']]) }}">
                                                                <img src="{{ asset($pick->user->photo ? 'storage/' . $pick->user->photo : 'default.png') }}"
                                                                    alt="Image" width="40px" height="40px"
                                                                    style="border-radius: 50%; object-fit:cover;" />
                                                            </a>
                                                        </div>
                                                        <h5>By <a
                                                                href="{{ route('author.detail', ['id' => $pick->user->slug, 'year' => $dateParts['year'], 'month' => $dateParts['month'], 'day' => $dateParts['day']]) }}">{{ $pick->user->name }}</a>
                                                        </h5>
                                                    </div>
                                                    <h3>
                                                        <a data-toggle="tooltip" data-placement="top"
                                                            title="{{ $pick->name }}"
                                                            href="{{ route('news.user', ['news' => $pick->slug, 'year' => $dateParts['year'], 'month' => $dateParts['month'], 'day' => $dateParts['day']]) }}">
                                                            {!! Illuminate\Support\Str::limit($pick->name, $limit = 47, $end = '...') !!}
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
                            <div>
                                @if ($picks->count() > 5)
                                <a href="{{ route('news.post') }}" class="btn-three d-block w-100">Lihat Semua Berita<i
                                        class="flaticon-arrow-right"></i></a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6">
                    <div class="pp-news-box">
                        <ul class="nav nav-tabs news-tablist-two" role="tablist">
                            <li class="nav-item">
                                <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#tab_10"
                                    type="button" role="tab">Artikel Popular</button>
                            </li>
                            <li class="nav-item">
                                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#tab_11" type="button"
                                    role="tab">Artikel Terbaru</button>
                            </li>
                        </ul>

                        <div class="tab-content news-tab-content">
                            <div class="tab-pane fade show active" id="tab_10" role="tabpanel">
                                @forelse ($populars as $popular)
                                    @php
                                        $dateParts = date_parse($popular->news->upload_date);
                                    @endphp
                                    <div class="news-card-seven">
                                        <div class="news-card-img">
                                            <img src="{{ asset('storage/' . $popular->news->photo) }}" class="img-responsive"
                                                alt="Image" width="100%" height="110"
                                                style="object-fit: cover" />
                                        </div>
                                        <div class="news-card-info">
                                            <a href="{{ route('categories.show.user', ['category' => $popular->news->newsCategories[0]->category->slug]) }}"
                                                class="news-cat">{{ $popular->news->newsCategories[0]->category->name }}</a>
                                            <h3><a data-toggle="tooltip" data-placement="top"
                                                    title="{{ $popular->news->name }}"
                                                    href="{{ route('news.user', ['news' => $popular->news->slug, 'year' => $dateParts['year'], 'month' => $dateParts['month'], 'day' => $dateParts['day']]) }}">
                                                    {!! Illuminate\Support\Str::limit($popular->news->name, $limit = 60, $end = '...') !!}
                                                </a></h3>
                                            <ul class="news-metainfo list-style">
                                                <li><i class="fi fi-rr-calendar-minus"></i><a
                                                        href="javascript:void(0)">{{ \Carbon\Carbon::parse($popular->news->created_at)->translatedFormat('d F Y') }}</a>
                                                </li>
                                                <li><i class="fi fi-rr-eye"></i>{{ $popular->total }}</li>
                                            </ul>
                                        </div>
                                    </div>
                                @empty
                                @endforelse
                            </div>
                            <div class="tab-pane fade" id="tab_11" role="tabpanel">
                                @forelse ($news_recent as $recent)
                                    @php
                                        $dateParts = date_parse($recent->upload_date);
                                    @endphp
                                    <div class="news-card-seven">
                                        <div class="news-card-img">
                                            <img src="{{ asset('storage/' . $recent->photo) }}" class="img-responsive"
                                                alt="Image" width="100%" height="110"
                                                style="object-fit: cover" />
                                        </div>
                                        <div class="news-card-info">
                                            <a href="{{ route('categories.show.user', ['category' => $recent->newsCategories[0]->category->slug]) }}"
                                                class="news-cat">{{ $recent->newsCategories[0]->category->name }}</a>
                                            <h3><a data-toggle="tooltip" data-placement="top"
                                                    title="{{ $recent->name }}"
                                                    href="{{ route('news.user', ['news' => $recent->slug, 'year' => $dateParts['year'], 'month' => $dateParts['month'], 'day' => $dateParts['day']]) }}">
                                                    {!! Illuminate\Support\Str::limit($recent->name, $limit = 60, $end = '...') !!}
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

    <div class="container-fluid pb-75 mt-5">
        <div class="row align-items-end mb-40">
            <div class="col-md-6">
                <h2 class="section-title">Artikel Premium
                    <img class="section-title-img" src="assets/img/section-img.webp" alt="Image" />
                </h2>
            </div>
        </div>
        <div class="popular-news-slider swiper">

            @forelse ($premium as $pre)
                <div class="swiper-wrapper">
                    @php
                        $dateParts = date_parse($pre->upload_date);
                    @endphp
                    <div class="swiper-slide pp-news-card">
                        <img src="{{ asset('storage/' . $pre->photo) }}" alt="Image" style="width: 600px;">
                        <div class="pp-news-info">
                            <a href="{{ route('categories.show.user', ['category' => $pre->newsCategories[0]->category->slug]) }}"
                                class="news-cat">{{ $pre->newsCategories[0]->category->name }}</a>
                            <h3 class="mb-4"><a data-toggle="tooltip" data-placement="top"
                                    title="{{ $pre->name }}"
                                    href="{{ route('news.user', ['news' => $pre->slug, 'year' => $dateParts['year'], 'month' => $dateParts['month'], 'day' => $dateParts['day']]) }}">
                                    {!! Illuminate\Support\Str::limit($pre->name, $limit = 60, $end = '...') !!}</a>
                            </h3>
                            <ul class="news-metainfo list-style mb-4">
                                <li><i class="fi fi-rr-calendar-minus"></i><a
                                        href="news-by-date.html">{{ \Carbon\Carbon::parse($pre->created_at)->translatedFormat('d F Y') }}</a>
                                </li>
                                <li><i class="fi fi-rr-eye"></i>{{ $pre->views_count }}x Views</li>
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
                    <h4>Tidak ada Artikel Premium</h4>
                </div>
            @endforelse
            {{-- <div class="swiper-slide pp-news-card">
                        <img src="assets/img/news/news-87.webp" alt="Image" style="width: 600px;">
                        <div class="pp-news-info">
                            <a href="business.html" class="news-cat">Technology</a>
                            <h3 class="mb-4"><a href="business-details.html">Discovering The Logical Treasures Of 15 Regions</a></h3>
                            <ul class="news-metainfo list-style mb-4">
                                <li><i class="fi fi-rr-calendar-minus"></i><a href="news-by-date.html">Feb 03, 2023</a></li>
                                <li><i class="fi fi-rr-eye"></i>1.2k Views</li>
                            </ul>
                        </div>
                    </div>
                    <div class="swiper-slide pp-news-card">
                        <img src="assets/img/news/news-88.webp" alt="Image" style="width: 600px;">
                        <div class="pp-news-info">
                            <a href="business.html" class="news-cat">Sports</a>
                            <h3 class="mb-4"><a href="business-details.html">The Spirit Of Competition: The Excitement Of Sports</a></h3>
                            <ul class="news-metainfo list-style mb-4">
                                <li><i class="fi fi-rr-calendar-minus"></i><a href="news-by-date.html">Feb 03, 2023</a></li>
                                <li><i class="fi fi-rr-eye"></i>1.2k Views</li>
                            </ul>
                        </div>
                    </div>
                    <div class="swiper-slide pp-news-card">
                        <img src="assets/img/news/news-89.webp" alt="Image" style="width: 600px;">
                        <div class="pp-news-info">
                            <a href="business.html" class="news-cat">Politics</a>
                            <h3 class="mb-4"><a href="business-details.html">Queen Misses Games Due To Health Reasons</a></h3>
                            <ul class="news-metainfo list-style mb-4">
                                <li><i class="fi fi-rr-calendar-minus"></i><a href="news-by-date.html">Feb 03, 2023</a></li>
                                <li><i class="fi fi-rr-eye"></i>1.2k Views</li>
                            </ul>
                        </div>
                    </div> --}}

        </div>
    </div>

    <div class="bg_gray popular-news ptb-100">
        <div class="container-fluid">
            <div class="row align-items-end mb-40">
                <div class="col-md-7">
                    <h2 class="section-title">Artikel Paling Popular<img class="section-title-img"
                            src="assets/img/section-img.webp" alt="Image" /></h2>
                </div>
                <div class="col-md-5 text-md-end">
                    <a href="/all-news-post" class="link-one">Lihat lainnya<i class="flaticon-right-arrow"></i></a>
                </div>
            </div>
            <div class="row gx-55">
                <div class="col-xl-6">
                    <div class="row">
                        @php $counters= 0; @endphp
                        @forelse ($most_populer as $most)
                            @php
                                $dateParts = date_parse($most->upload_date);
                            @endphp
                            @if ($counters < 1)
                                <div class="col-12">
                                    <div class="news-card-eleven">
                                        <div class="news-card-img">
                                            <img src="{{ asset('storage/' . $most->photo) }}" classimg-responsive="100%"
                                                height="500" style="object-fit: cover;" alt="Image" />
                                        </div>
                                        <div class="news-card-info">
                                            <div class="news-author">
                                                <div class="news-author-img">
                                                    <img src="{{ asset($most->user->photo ? 'storage/' . $most->user->photo : 'default.png') }}"
                                                        alt="Image" width="40px" height="40px"
                                                        style="border-radius: 50%; object-fit:cover;" />
                                                </div>
                                                <h5>By <a
                                                        href="{{ route('author.detail', ['id' => $most->user->slug]) }}">{{ $most->user->name }}</a>
                                                </h5>
                                            </div>
                                            <h3>
                                                <a data-toggle="tooltip" data-placement="top"
                                                    title="{{ $most->name }}"
                                                    href="{{ route('news.user', ['news' => $most->slug, 'year' => $dateParts['year'], 'month' => $dateParts['month'], 'day' => $dateParts['day']]) }}">
                                                    {!! Illuminate\Support\Str::limit($most->name, $limit = 47, $end = '...') !!}
                                                </a>
                                            </h3>
                                            <ul class="news-metainfo list-style">
                                                <li><i class="fi fi-rr-calendar-minus"></i><a
                                                        href="javascript:void(0)">{{ \Carbon\Carbon::parse($most->created_at)->translatedFormat('d F Y') }}</a>
                                                </li>
                                                <li><i class="fi fi-rr-eye"></i>{{ $most->views_count }}</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            @else
                                <div class="col-md-6">
                                    <div class="news-card-ten">
                                        <a href="{{ route('categories.show.user', ['category' => $most->newsCategories[0]->category->slug]) }}"
                                            class="news-cat">{{ $most->newsCategories[0]->category->name }}</a>
                                        <h3>
                                            <a data-toggle="tooltip" data-placement="top" title="{{ $most->name }}"
                                                href="{{ route('news.user', ['news' => $most->slug, 'year' => $dateParts['year'], 'month' => $dateParts['month'], 'day' => $dateParts['day']]) }}">
                                                {!! Illuminate\Support\Str::limit($most->name, $limit = 47, $end = '...') !!}
                                            </a>
                                        </h3>
                                        <ul class="news-metainfo list-style">
                                            <li><i class="fi fi-rr-calendar-minus"></i><a
                                                    href="javascript:void(0)">{{ \Carbon\Carbon::parse($popular->created_at)->translatedFormat('d F Y') }}</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            @endif
                            @php $counters++; @endphp
                            @if ($counters == 5)
                                @php $counters = 0; @endphp
                            @endif
                        @empty
                        @endforelse
                    </div>
                </div>
                <div class="col-xl-6">
                    <div class="row">
                        @forelse ($most_populer2 as $most2)
                            @php
                                $dateParts = date_parse($most2->upload_date);
                            @endphp
                            <div class="col-md-6">
                                <div class="news-card-six">
                                    <div class="news-card-img">
                                        <img src="{{ asset('storage/' . $most2->photo) }}" class="img-responsive"
                                            width="100%" height="250" style="object-fit: cover;" alt="Image" />
                                        <a href="{{ route('categories.show.user', ['category' => $most2->newsCategories[0]->category->slug]) }}"
                                            class="news-cat">{{ $most2->newsCategories[0]->category->name }}</a>
                                    </div>
                                    <div class="news-card-info">
                                        <div class="news-author">
                                            <div class="news-author-img">
                                                <img src="{{ asset($most2->user->photo ? 'storage/' . $most2->user->photo : 'default.png') }}"
                                                    alt="Image" width="40px" height="40px"
                                                    style="border-radius: 50%; object-fit:cover;" />
                                            </div>
                                            <h5>By <a
                                                    href="{{ route('author.detail', ['id' => $most2->user->slug, 'year' => $dateParts['year'], 'month' => $dateParts['month'], 'day' => $dateParts['day']]) }}">{{ $most2->user->name }}</a>
                                            </h5>
                                        </div>
                                        <h3>
                                            <a data-toggle="tooltip" data-placement="top" title="{{ $most2->name }}"
                                                href="{{ route('news.user', ['news' => $most2->slug, 'year' => $dateParts['year'], 'month' => $dateParts['month'], 'day' => $dateParts['day']]) }}">
                                                {!! Illuminate\Support\Str::limit($most2->name, $limit = 47, $end = '...') !!}
                                            </a>
                                        </h3>
                                        <ul class="news-metainfo list-style">
                                            <li><i class="fi fi-rr-calendar-minus"></i><a
                                                    href="javascript:void(0)">{{ \Carbon\Carbon::parse($most2->created_at)->translatedFormat('d F Y') }}</a>
                                            </li>
                                            <li><i class="fi fi-rr-eye"></i>{{ $most2->views_count }}</li>
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

    <div class="general-news ptb-100">
        <div class="container-fluid">
            <div class="content-wrapper">
                <div class="left-content">
                    <div class="row align-items-end mb-40">
                        <div class="col-md-7">
                            <h2 class="section-title">Berita Umum<img class="section-title-img"
                                    src="assets/img/section-img.webp" alt="Image" /></h2>
                        </div>
                        <div class="col-md-5 text-md-end">
                            <a href="/all-news-post" class="link-one">Lihat lainnya<i
                                    class="flaticon-right-arrow"></i></a>
                        </div>
                    </div>
                    <div class="row">
                        @forelse ($generals as $general)
                            @php
                                $dateParts = date_parse($general->upload_date);
                            @endphp
                            <div class="col-xl-6">
                                <div class="news-card-twelve">
                                    <div class="news-card-img">
                                        <img src="{{ asset('storage/' . $general->photo) }}" class="img-responsive"
                                            alt="Image" width="100%" height="130" style="object-fit: cover" />
                                    </div>
                                    <div class="news-card-info">
                                        <a href="{{ route('categories.show.user', ['category' => $general->newsCategories[0]->category->slug]) }}"
                                            class="news-cat">{{ $general->newsCategories[0]->category->name }}</a>
                                        <h3><a data-toggle="tooltip" data-placement="top" title="{{ $general->name }}"
                                                href="{{ route('news.user', ['news' => $general->slug, 'year' => $dateParts['year'], 'month' => $dateParts['month'], 'day' => $dateParts['day']]) }}">
                                                {!! Illuminate\Support\Str::limit($general->name, $limit = 35, $end = '...') !!}
                                            </a></h3>
                                        <ul class="news-metainfo list-style">
                                            <li><i class="fi fi-rr-calendar-minus"></i><a
                                                    href="javascript:void(0)">{{ \Carbon\Carbon::parse($general->upload_date)->translatedFormat('d F Y') }}</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        @empty
                        @endforelse
                    </div>
                    <div class="ad-section">
                        <p>Di Seponsori Oleh</p>
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
                                <img class="logo-light" src="{{ asset('assets/img/logo-getmedia-dark.svg') }}"
                                    alt="Image" />
                                <img class="logo-dark" src="{{ asset('assets/img/logo-get-media.png') }}"
                                    alt="Image" />
                            </a>
                            <p>Mauris mattis auctor cursus. Phasellus iso tellus tellus, imperdiet ut imperdiet eu,
                                noiaculis a sem Donec vehicula luctus nunc in laoreet Aliquam</p>
                            {{-- <ul class="social-profile list-style">
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
                            </ul> --}}
                            <ul class="social-profile list-style">
                                <li>
                                  <a href="https://www.fb.com/" target="_blank"><i class="ri-facebook-fill"></i></a>
                                </li>
                                <li>
                                  <a href="https://www.twitter.com/" target="_blank"><i class="ri-twitter-fill"></i></a>
                                </li>
                                <li>
                                  <a href="https://www.instagram.com/" target="_blank"><i class="ri-instagram-line"></i></a>
                                </li>
                                <li>
                                  <a href="https://www.linkedin.com/" target="_blank"><i class="ri-linkedin-fill"></i></a>
                                </li>
                              </ul>
                        </div>
                    </div>
                    <div class="sidebar-widget">
                        <h3 class="sidebar-widget-title">Postingan Popular</h3>
                        <div class="pp-post-wrap">
                            @forelse ($popular_post as $post)
                                @php
                                    $dateParts = date_parse($post->upload_date);
                                @endphp
                                <div class="news-card-one">
                                    <div class="news-card-img">
                                        <img src="{{ asset('storage/' . $post->photo) }}" alt="Image"
                                            style="object-fit: cover;" width="100%" height="80" />
                                    </div>
                                    <div class="news-card-info">
                                        <h3><a data-toggle="tooltip" data-placement="top" title="{{ $post->name }}"
                                                href="{{ route('news.user', ['news' => $post->slug, 'year' => $dateParts['year'], 'month' => $dateParts['month'], 'day' => $dateParts['day']]) }}">
                                                {!! Illuminate\Support\Str::limit($post->name, $limit = 20, $end = '...') !!}
                                            </a></h3>
                                        <ul class="news-metainfo list-style">
                                            <li><i class="fi fi-rr-calendar-minus"></i><a
                                                    href="javascript:void(0)">{{ \Carbon\Carbon::parse($general->upload_date)->translatedFormat('d F Y') }}</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            @empty
                            @endforelse
                        </div>
                    </div>
                    <div class="sidebar-widget">
                        <h3 class="sidebar-widget-title">Tag Popular</h3>
                        <ul class="tag-list list-style">
                            @forelse ($tags as $tag)
                                <li><a
                                        href="{{ route('tag.show.user', ['tag' => $tag->slug]) }}">{{ $tag->name }}</a>
                                </li>
                            @empty
                            @endforelse
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="latest-news pb-100">
        <div class="container-fluid">
            <div class="content-wrapper">
                <div class="left-content">
                    <div class="row align-items-end mb-40">
                        <div class="col-md-7">
                            <h2 class="section-title">Artikel Terbaru<img class="section-title-img"
                                    src="assets/img/section-img.webp" alt="Image" /></h2>
                        </div>
                        <div class="col-md-5 text-md-end">
                            <a href="/all-news-post" class="link-one">Lihat lainnya<i
                                    class="flaticon-right-arrow"></i></a>
                        </div>
                    </div>
                    <div class="row gx-5">
                        <div class="col-xl-7">
                            <div class="scrollscreen">
                                @forelse ($news_latests as $news_latest)
                                    @php
                                        $dateParts = date_parse($news_latest->upload_date);
                                    @endphp
                                    <div class="news-card-five">
                                        <div class="news-card-img">
                                            <img src="{{ asset('storage/' . $news_latest->photo) }}"
                                                class="img-responsive" alt="Image" width="100%" height="110"
                                                style="object-fit: cover" />
                                            <a href="{{ route('categories.show.user', ['category' => $news_latest->newsCategories[0]->category->slug]) }}"
                                                class="news-cat">{{ $news_latest->newsCategories[0]->category->name }}</a>
                                        </div>
                                        <div class="news-card-info">
                                            <h3><a data-toggle="tooltip" data-placement="top"
                                                    title="{{ $news_latest->name }}"
                                                    href="{{ route('news.user', ['news' => $news_latest->slug, 'year' => $dateParts['year'], 'month' => $dateParts['month'], 'day' => $dateParts['day']]) }}">
                                                    {!! Illuminate\Support\Str::limit($news_latest->name, $limit = 60, $end = '...') !!}
                                                </a></h3>
                                            <ul class="news-metainfo list-style">
                                                <li><i class="fi fi-rr-calendar-minus"></i><a
                                                        href="javascript:void(0)">{{ \Carbon\Carbon::parse($news_latest->upload_date)->translatedFormat('d F Y') }}</a>
                                                </li>
                                                <li><i class="fi fi-rr-eye"></i>{{ $news_latest->views_count }}</li>
                                            </ul>
                                        </div>
                                    </div>
                                @empty
                                @endforelse
                            </div>
                        </div>
                        <div class="col-xl-5">

                            @php $counter= 0; @endphp
                            @foreach ($news_latests2 as $news_latest2)
                                @php
                                    $dateParts = date_parse($news_latest2->upload_date);
                                @endphp
                                @if ($counter < 1)
                                    <div class="news-card-two">
                                        <div class="news-card-img">
                                            <img src="{{ asset('storage/' . $news_latest2->photo) }}"
                                                class="img-responsive" alt="Image"  height="271" style="object-fit: cover;"/>
                                            <a href="{{ route('categories.show.user', ['category' => $news_latest2->newsCategories[0]->category->slug]) }}"
                                                class="news-cat">{{ $news_latest2->newsCategories[0]->category->name }}</a>
                                        </div>
                                        <div class="news-card-info">
                                            <h3>
                                                <a data-toggle="tooltip" data-placement="top"
                                                    title="{{ $news_latest2->name }}"
                                                    href="{{ route('news.user', ['news' => $news_latest2->slug, 'year' => $dateParts['year'], 'month' => $dateParts['month'], 'day' => $dateParts['day']]) }}">
                                                    {!! Illuminate\Support\Str::limit($news_latest2->name, $limit = 50, $end = '...') !!}
                                                </a>
                                            </h3>
                                            <ul class="news-metainfo list-style">
                                                <li><i class="fi fi-rr-calendar-minus"></i><a href="javascript:void(0)">
                                                        <p>{{ \Carbon\Carbon::parse($news_latest2->created_at)->translatedFormat('d F Y') }}
                                                        </p>
                                                    </a></li>
                                                <li><i class="fi fi-rr-eye"></i>{{ $news_latest2->views_count }}</li>
                                            </ul>
                                        </div>
                                    </div>
                                @elseif ($counter < 3)
                                    <div class="news-card-three">
                                        <div class="news-card-img">
                                            <img src="{{ asset('storage/' . $news_latest2->photo) }}"
                                                class="img-responsive" alt="Image" height="120" style="object-fit: cover;"/>
                                        </div>
                                        <div class="news-card-info">
                                            <a href="{{ route('categories.show.user', ['category' => $news_latest2->newsCategories[0]->category->slug]) }}"
                                                class="news-cat">{{ $news_latest2->newsCategories[0]->category->name }}</a>
                                            <h3>
                                                <a data-toggle="tooltip" data-placement="top"
                                                    title="{{ $news_latest2->name }}"
                                                    href="{{ route('news.user', ['news' => $news_latest2->slug, 'year' => $dateParts['year'], 'month' => $dateParts['month'], 'day' => $dateParts['day']]) }}">
                                                    {!! Illuminate\Support\Str::limit($news_latest2->name, $limit = 50, $end = '...') !!}
                                                </a>
                                            </h3>
                                            <ul class="news-metainfo list-style">
                                                <li><i class="fi fi-rr-calendar-minus"></i><a
                                                        href="javascript:void(0)">{{ \Carbon\Carbon::parse($newss->created_at)->translatedFormat('d F Y') }}</a>
                                                </li>
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
                    </div>
                </div>
                <div class="sidebar">
                    <div class="sidebar-widget">
                        <h3 class="sidebar-widget-title">Kategori Populer</h3>
                        <ul class="category-widget list-style">
                            @forelse ($categorypopuler as $category)
                                <li><a data-toggle="tooltip" data-placement="top" title="{{ $category->name }}"
                                        href="{{ route('categories.show.user', ['category' => $category->slug]) }}"><i
                                            class="flaticon-right-arrow"></i>{{ $category->name }}
                                        <span>({{ $category->news_categories_count }})</span></a></li>
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
        function toggleTheme() {
            if (localStorage.getItem('get_media_theme') === 'theme-dark') {
                setTheme('theme-light');
            } else {
                setTheme('theme-dark');
            }
        }
        function setTheme(themeName) { localStorage.setItem('get_media_theme', themeName); document.documentElement.className = themeName; }

        (function() {
            if (localStorage.getItem('get_media_theme') === 'theme-dark') {
                setTheme('theme-dark');
                document.getElementById('slider').checked = false;
            } else {
                setTheme('theme-light');
                document.getElementById('slider').checked = true;
            }
        })();
    </script>
@endsection

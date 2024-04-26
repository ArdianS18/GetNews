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
                                        <img src="{{ asset('storage/' . $trending->news->photo) }}" alt="Image" />
                                    </div>
                                    <div class="news-card-info">
                                        <h3><a href="business-details.html">{{ $trending->news->name }}</a></h3>
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
                                <img src="{{ asset('storage/' . $newss->photo) }}" style="object-fit: cover;" alt="Image"
                                    height="250" />

                                <a href="{{ route('categories.show.user', ['category' => $newss->newsCategories[0]->category->slug]) }}"
                                    class="news-cat">{{ $newss->newsCategories[0]->category->name }}</a>
                            </div>
                            <div class="news-card-info">
                                <h3><a
                                        href="{{ route('news.user', ['news' => $newss->slug, 'page' => '1']) }}">{{ $newss->name }}</a>
                                </h3>
                                <ul class="news-metainfo list-style">
                                    <li><i class="fi fi-rr-calendar-minus"></i><a href="javascript:void(0)">
                                            <p>{{ \Carbon\Carbon::parse($newss->created_at)->translatedFormat('d F Y') }}
                                            </p>
                                        </a>
                                    </li>
                                    <li><i class="fi fi-rr-eye"></i>{{ $newss->views }}</li>
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
                                    <a
                                        href="{{ route('news.user', ['news' => $newss->slug, 'page' => 1]) }}">{{ $newss->name }}</a>
                                </h3>
                                <ul class="news-metainfo list-style">
                                    <li><i class="fi fi-rr-calendar-minus"></i><a
                                            href="news-by-date.html">{{ \Carbon\Carbon::parse($newss->created_at)->translatedFormat('d F Y') }}</a>
                                    </li>
                                    <li><i class="fi fi-rr-eye"></i>{{ $newss->views }}</li>

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
                            <img src="{{ asset('storage/' . $mid->photo) }}" alt="Image" style="object-fit: cover"
                                height="450" />
                            <div class="news-card-info">
                                <h3><a
                                        href="{{ route('news.user', ['news' => $mid->slug, 'page' => '1']) }}">{{ $mid->name }}</a>
                                </h3>
                                <ul class="news-metainfo list-style">
                                    <li><i class="fi fi-rr-calendar-minus"></i><a href="news-by-date.html">
                                            <p>{{ \Carbon\Carbon::parse($mid->created_at)->translatedFormat('d F Y') }}</p>
                                        </a></li>
                                    <li><i class="fi fi-rr-eye"></i>{{ $mid->views }}</li>
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
                                <h3><a
                                        href="{{ route('news.user', ['news' => $mid->slug, 'page' => 1]) }}">{{ $mid->name }}</a>
                                </h3>
                                <ul class="news-metainfo list-style">
                                    <li><i class="fi fi-rr-calendar-minus"></i><a
                                            href="news-by-date.html">{{ \Carbon\Carbon::parse($newss->created_at)->translatedFormat('d F Y') }}</a>
                                    </li>
                                    <li><i class="fi fi-rr-eye"></i>{{ $newss->views }}</li>
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
                                <h3><a
                                        href="{{ route('news.user', ['news' => $barus->slug, 'page' => '1']) }}">{{ $barus->name }}</a>
                                </h3>
                                <ul class="news-metainfo list-style">
                                    <li><i class="fi fi-rr-calendar-minus"></i><a href="javascript:void(0)">
                                            <p>{{ \Carbon\Carbon::parse($barus->created_at)->translatedFormat('d F Y') }}
                                            </p>
                                        </a></li>
                                    <li><i class="fi fi-rr-eye"></i>{{ $barus->views }}</li>
                                </ul>
                            </div>
                        </div>
                    @elseif ($counters < 4)
                        <div class="news-card-three">
                            <div class="news-card-img">
                                <img src="{{ asset('storage/' . $barus->photo) }}" style="object-fit:cover;" height="100"
                                    alt="Image" />
                            </div>
                            <div class="news-card-info">
                                <a
                                    href="{{ route('categories.show.user', ['category' => $barus->newsCategories[0]->category->slug]) }}">{{ $barus->newsCategories[0]->category->name }}</a>
                                <h3><a
                                        href="{{ route('news.user', ['news' => $barus->slug, 'page' => 1]) }}">{{ $barus->name }}</a>
                                </h3>
                                <ul class="news-metainfo list-style">
                                    <li><i class="fi fi-rr-calendar-minus"></i><a
                                            href="news-by-date.html">{{ \Carbon\Carbon::parse($barus->created_at)->translatedFormat('d F Y') }}</a>
                                    </li>
                                    <li><i class="fi fi-rr-eye"></i>{{ $barus->views }}</li>
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
                            <div class="col-xl-6 col-md-6">
                                <h2 class="section-title">Editor's Pick<img class="section-title-img"
                                        src="assets/img/section-img.webp" alt="Image" /></h2>
                            </div>
                            <div class="col-xl-6 col-md-6">
                                <ul class="nav nav-tabs news-tablist" role="tablist">
                                    {{-- @forelse ($editor_pick as $pick)
                                    <li class="nav-item">
                                        <button class="nav-link" data-bs-toggle="tab{{ $pick->category->id }}" data-bs-target="#tab_1{{ $pick->category->id }}"
                                        type="button" role="tab{{ $pick->category->id }}">{{ $pick->category->name }}
                                        </button>
                                    </li>
                                    @empty
                                    @endforelse --}}
                                </ul>
                            </div>
                        </div>
                        <div class="tab-content editor-news-content">
                            <div class="tab-pane fade show active" id="tab_1" role="tabpanel">
                                <div class="row">
                                    @forelse ($picks as $pick)
                                    <div class="col-md-6">
                                        <div class="news-card-six">
                                            <div class="news-card-img">
                                                <img src="{{ asset('storage/' . $pick->photo) }}" alt="Image" />
                                                <a href="{{ route('categories.show.user', ['category' => $pick->newsCategories[0]->category->slug]) }}" class="news-cat">{{ $pick->newsCategories[0]->category->name }}</a>
                                            </div>
                                            <div class="news-card-info">
                                                <div class="news-author">
                                                    <div class="news-author-img">
                                                        <img src="{{ asset( $pick->author->user->photo ? 'storage/'.$pick->author->user->photo : "default.png")  }}" alt="Image" width="40px" height="40px" style="border-radius: 50%; object-fit:cover;"/>
                                                        {{-- <img src="assets/img/author/author-thumb-1.webp" alt="Image" /> --}}
                                                    </div>
                                                    <h5>By <a href="author.html">{{ $pick->author->user->name }}</a></h5>
                                                </div>
                                                <h3><a href="{{ route('news.user', ['news' => $pick->slug, 'page' => '1']) }}">{{ $pick->name }}</a></h3>
                                                <ul class="news-metainfo list-style">
                                                    <li><i class="fi fi-rr-calendar-minus"></i><a href="news-by-date.html">{{ \Carbon\Carbon::parse($pick->created_at)->translatedFormat('d F Y') }}</a></li>
                                                    {{-- <li><i class="fi fi-rr-comment"></i>03</li> --}}
                                                    <li><i class="fi fi-rr-eye"></i>{{ $pick->views }}</li>
                                                </ul>
                                            </div>
                                        </div>
                                    @empty
                                    @endforelse
                                    {{-- <div class="col-md-6">
                                        <div class="news-card-six">
                                            <div class="news-card-img">
                                                <img src="assets/img/news/news-39.webp" alt="Image" />
                                                <a href="business.html" class="news-cat">Politics</a>
                                            </div>
                                            <div class="news-card-info">
                                                <div class="news-author">
                                                    <div class="news-author-img">
                                                        <img src="assets/img/author/author-thumb-2.webp" alt="Image" />
                                                    </div>
                                                    <h5>By <a href="author.html">ELIJAH JAMES</a></h5>
                                                </div>
                                                <h3><a href="business-details.html">Will Humans be able to live in Mars in
                                                        the future?</a></h3>
                                                <ul class="news-metainfo list-style">
                                                    <li><i class="fi fi-rr-calendar-minus"></i><a
                                                            href="news-by-date.html">Mar 22, 2023</a></li>
                                                    <li><i class="fi fi-rr-comment"></i>03</li>
                                                    <li><i class="fi fi-rr-eye"></i>10 Min Read</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="news-card-six">
                                            <div class="news-card-img">
                                                <img src="assets/img/news/news-40.webp" alt="Image" />
                                                <a href="business.html" class="news-cat">Politics</a>
                                            </div>
                                            <div class="news-card-info">
                                                <div class="news-author">
                                                    <div class="news-author-img">
                                                        <img src="assets/img/author/author-thumb-3.webp" alt="Image" />
                                                    </div>
                                                    <h5>By<a href="author.html">BANKS GAIN</a></h5>
                                                </div>
                                                <h3><a href="business-details.html">Here’s the proof momentum strategy
                                                        work</a></h3>
                                                <ul class="news-metainfo list-style">
                                                    <li><i class="fi fi-rr-calendar-minus"></i><a
                                                            href="news-by-date.html">Apr 15, 2023</a></li>
                                                    <li><i class="fi fi-rr-comment"></i>03</li>
                                                    <li><i class="fi fi-rr-eye"></i>15 Min Read</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="news-card-six">
                                            <div class="news-card-img">
                                                <img src="assets/img/news/news-41.webp" alt="Image" />
                                                <a href="business.html" class="news-cat">Politics</a>
                                            </div>
                                            <div class="news-card-info">
                                                <div class="news-author">
                                                    <div class="news-author-img">
                                                        <img src="assets/img/author/author-thumb-4.webp" alt="Image" />
                                                    </div>
                                                    <h5>By <a href="author.html">HARPAR LUNA</a></h5>
                                                </div>
                                                <h3><a href="business-details.html">The Promise And Potential Of Synthetic
                                                        Assets</a></h3>
                                                <ul class="news-metainfo list-style">
                                                    <li><i class="fi fi-rr-calendar-minus"></i><a
                                                            href="news-by-date.html">Apr 14, 2023</a></li>
                                                    <li><i class="fi fi-rr-comment"></i>03</li>
                                                    <li><i class="fi fi-rr-eye"></i>15 Min Read</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div> --}}
                                </div>
                            </div>
                            <div class="tab-pane fade" id="tab_2" role="tabpanel">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="news-card-six">
                                            <div class="news-card-img">
                                                <img src="assets/img/news/news-42.webp" alt="Image" />
                                                <a href="business.html" class="news-cat">Sports</a>
                                            </div>
                                            <div class="news-card-info">
                                                <div class="news-author">
                                                    <div class="news-author-img">
                                                        <img src="assets/img/author/author-thumb-5.webp" alt="Image" />
                                                    </div>
                                                    <h5>By <a href="author.html">OLIVIA EMMA</a></h5>
                                                </div>
                                                <h3><a href="business-details.html">Joe Gibbs discusses Ty Gibbs incident
                                                        at Martinsville</a></h3>
                                                <ul class="news-metainfo list-style">
                                                    <li><i class="fi fi-rr-calendar-minus"></i><a
                                                            href="news-by-date.html">Apr 07, 2023</a></li>
                                                    <li><i class="fi fi-rr-comment"></i>03</li>
                                                    <li><i class="fi fi-rr-eye"></i>12 Min Read</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="news-card-six">
                                            <div class="news-card-img">
                                                <img src="assets/img/news/news-43.webp" alt="Image" />
                                                <a href="business.html" class="news-cat">Sports</a>
                                            </div>
                                            <div class="news-card-info">
                                                <div class="news-author">
                                                    <div class="news-author-img">
                                                        <img src="assets/img/author/author-thumb-2.webp" alt="Image" />
                                                    </div>
                                                    <h5>By <a href="author.html">ELIJAH JAMES</a></h5>
                                                </div>
                                                <h3><a href="business-details.html">The Heart of a Champion: Mental
                                                        Toughness in Sports</a></h3>
                                                <ul class="news-metainfo list-style">
                                                    <li><i class="fi fi-rr-calendar-minus"></i><a
                                                            href="news-by-date.html">Apr 03, 2023</a></li>
                                                    <li><i class="fi fi-rr-comment"></i>03</li>
                                                    <li><i class="fi fi-rr-eye"></i>15 Min Read</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="news-card-six">
                                            <div class="news-card-img">
                                                <img src="assets/img/news/news-44.webp" alt="Image" />
                                                <a href="business.html" class="news-cat">Sports</a>
                                            </div>
                                            <div class="news-card-info">
                                                <div class="news-author">
                                                    <div class="news-author-img">
                                                        <img src="assets/img/author/author-thumb-3.webp" alt="Image" />
                                                    </div>
                                                    <h5>By<a href="author.html">BANKS GAIN</a></h5>
                                                </div>
                                                <h3><a href="business-details.html">Breaking Barriers: Inspiring Stories in
                                                        Sports</a></h3>
                                                <ul class="news-metainfo list-style">
                                                    <li><i class="fi fi-rr-calendar-minus"></i><a
                                                            href="news-by-date.html">Feb 03, 2023</a></li>
                                                    <li><i class="fi fi-rr-comment"></i>03</li>
                                                    <li><i class="fi fi-rr-eye"></i>12 Min Read</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="news-card-six">
                                            <div class="news-card-img">
                                                <img src="assets/img/news/news-45.webp" alt="Image" />
                                                <a href="business.html" class="news-cat">Sports</a>
                                            </div>
                                            <div class="news-card-info">
                                                <div class="news-author">
                                                    <div class="news-author-img">
                                                        <img src="assets/img/author/author-thumb-4.webp" alt="Image" />
                                                    </div>
                                                    <h5>By <a href="author.html">HARPAR LUNA</a></h5>
                                                </div>
                                                <h3><a href="business-details.html">Unleashing Your Inner Athlete: The
                                                        Power of Sports</a></h3>
                                                <ul class="news-metainfo list-style">
                                                    <li><i class="fi fi-rr-calendar-minus"></i><a
                                                            href="news-by-date.html">Apr 03, 2023</a></li>
                                                    <li><i class="fi fi-rr-comment"></i>03</li>
                                                    <li><i class="fi fi-rr-eye"></i>14 Min Read</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="tab_3" role="tabpanel">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="news-card-six">
                                            <div class="news-card-img">
                                                <img src="assets/img/news/news-46.webp" alt="Image" />
                                                <a href="business.html" class="news-cat">Business</a>
                                            </div>
                                            <div class="news-card-info">
                                                <div class="news-author">
                                                    <div class="news-author-img">
                                                        <img src="assets/img/author/author-thumb-1.webp" alt="Image" />
                                                    </div>
                                                    <h5>By <a href="author.html">OLIVIA EMMA</a></h5>
                                                </div>
                                                <h3><a href="business-details.html">Navigating the Entrepreneurial Journey:
                                                        Tips for Success</a></h3>
                                                <ul class="news-metainfo list-style">
                                                    <li><i class="fi fi-rr-calendar-minus"></i><a
                                                            href="news-by-date.html">Apr 15, 2023</a></li>
                                                    <li><i class="fi fi-rr-comment"></i>03</li>
                                                    <li><i class="fi fi-rr-eye"></i>15 Min Read</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="news-card-six">
                                            <div class="news-card-img">
                                                <img src="assets/img/news/news-47.webp" alt="Image" />
                                                <a href="business.html" class="news-cat">Business</a>
                                            </div>
                                            <div class="news-card-info">
                                                <div class="news-author">
                                                    <div class="news-author-img">
                                                        <img src="assets/img/author/author-thumb-2.webp" alt="Image" />
                                                    </div>
                                                    <h5>By <a href="author.html">ELIJAH JAMES</a></h5>
                                                </div>
                                                <h3><a href="business-details.html">Revolutionizing Business: The Power of
                                                        Innovation</a></h3>
                                                <ul class="news-metainfo list-style">
                                                    <li><i class="fi fi-rr-calendar-minus"></i><a
                                                            href="news-by-date.html">Mar 03, 2023</a></li>
                                                    <li><i class="fi fi-rr-comment"></i>03</li>
                                                    <li><i class="fi fi-rr-eye"></i>10 Min Read</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="news-card-six">
                                            <div class="news-card-img">
                                                <img src="assets/img/news/news-48.webp" alt="Image" />
                                                <a href="business.html" class="news-cat">Business</a>
                                            </div>
                                            <div class="news-card-info">
                                                <div class="news-author">
                                                    <div class="news-author-img">
                                                        <img src="assets/img/author/author-thumb-3.webp" alt="Image" />
                                                    </div>
                                                    <h5>By<a href="author.html">BANKS GAIN</a></h5>
                                                </div>
                                                <h3><a href="business-details.html">From Start-Up to Scale-Up: Growing Your
                                                        Business</a></h3>
                                                <ul class="news-metainfo list-style">
                                                    <li><i class="fi fi-rr-calendar-minus"></i><a
                                                            href="news-by-date.html">Feb 22, 2023</a></li>
                                                    <li><i class="fi fi-rr-comment"></i>03</li>
                                                    <li><i class="fi fi-rr-eye"></i>15 Min Read</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="news-card-six">
                                            <div class="news-card-img">
                                                <img src="assets/img/news/news-49.webp" alt="Image" />
                                                <a href="business.html" class="news-cat">Business</a>
                                            </div>
                                            <div class="news-card-info">
                                                <div class="news-author">
                                                    <div class="news-author-img">
                                                        <img src="assets/img/author/author-thumb-4.webp" alt="Image" />
                                                    </div>
                                                    <h5>By <a href="author.html">HARPAR LUNA</a></h5>
                                                </div>
                                                <h3><a href="business-details.html">Building a Thriving Business:
                                                        Strategies for Success</a></h3>
                                                <ul class="news-metainfo list-style">
                                                    <li><i class="fi fi-rr-calendar-minus"></i><a
                                                            href="news-by-date.html">Feb 05, 2023</a></li>
                                                    <li><i class="fi fi-rr-comment"></i>03</li>
                                                    <li><i class="fi fi-rr-eye"></i>15 Min Read</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6">
                    <div class="pp-news-box">
                        <ul class="nav nav-tabs news-tablist-two" role="tablist">
                            <li class="nav-item">
                                <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#tab_10"
                                    type="button" role="tab">Popular News</button>
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
                                            <img src="{{ asset('storage/' . $popular->photo) }}" alt="Image" />
                                        </div>
                                        <div class="news-card-info">
                                            <a href="business.html" class="news-cat">{{ $popular->category_names }}</a>
                                            <h3><a href="business-details.html">{{ $popular->name }}</a></h3>
                                            <ul class="news-metainfo list-style">
                                                <li><i class="fi fi-rr-calendar-minus"></i><a href="news-by-date.html">Feb
                                                        03,
                                                        2023</a></li>
                                                <li><i class="fi fi-rr-comment"></i>03</li>
                                                <li><i class="fi fi-rr-eye"></i>15 Min Read</li>
                                            </ul>
                                        </div>
                                    </div>
                                @empty
                                @endforelse
                                {{-- <div class="news-card-seven">
                                    <div class="news-card-img">
                                        <img src="assets/img/news/news-50.webp" alt="Image" />
                                    </div>
                                    <div class="news-card-info">
                                        <a href="business.html" class="news-cat">Lifestyle</a>
                                        <h3><a href="business-details.html">Jiraiya Banks Wants to Teach You How to Build a
                                                House</a></h3>
                                        <ul class="news-metainfo list-style">
                                            <li><i class="fi fi-rr-calendar-minus"></i><a href="news-by-date.html">Feb 03,
                                                    2023</a></li>
                                            <li><i class="fi fi-rr-comment"></i>03</li>
                                            <li><i class="fi fi-rr-eye"></i>15 Min Read</li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="news-card-seven">
                                    <div class="news-card-img">
                                        <img src="assets/img/news/news-51.webp" alt="Image" />
                                    </div>
                                    <div class="news-card-info">
                                        <a href="business.html" class="news-cat">Photography</a>
                                        <h3><a href="business-details.html">The Secret Math Behind Mind Reading Magic
                                                Tricks</a></h3>
                                        <ul class="news-metainfo list-style">
                                            <li><i class="fi fi-rr-calendar-minus"></i><a href="news-by-date.html">Apr 25,
                                                    2023</a></li>
                                            <li><i class="fi fi-rr-comment"></i>03</li>
                                            <li><i class="fi fi-rr-eye"></i>15 Min Read</li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="news-card-seven">
                                    <div class="news-card-img">
                                        <img src="assets/img/news/news-52.webp" alt="Image" />
                                    </div>
                                    <div class="news-card-info">
                                        <a href="business.html" class="news-cat">Business</a>
                                        <h3><a href="business-details.html">Recovery and Cleanup in Florida After Hurricane
                                                Ian</a></h3>
                                        <ul class="news-metainfo list-style">
                                            <li><i class="fi fi-rr-calendar-minus"></i><a href="news-by-date.html">Msr 15,
                                                    2023</a></li>
                                            <li><i class="fi fi-rr-comment"></i>03</li>
                                            <li><i class="fi fi-rr-eye"></i>15 Min Read</li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="news-card-seven">
                                    <div class="news-card-img">
                                        <img src="assets/img/news/news-53.webp" alt="Image" />
                                    </div>
                                    <div class="news-card-info">
                                        <a href="business.html" class="news-cat">Sports</a>
                                        <h3><a href="business-details.html">6 Romantic places You Want to Visit with Your
                                                Partner</a></h3>
                                        <ul class="news-metainfo list-style">
                                            <li><i class="fi fi-rr-calendar-minus"></i><a href="news-by-date.html">Feb 22,
                                                    2023</a></li>
                                            <li><i class="fi fi-rr-comment"></i>03</li>
                                            <li><i class="fi fi-rr-eye"></i>15 Min Read</li>
                                        </ul>
                                    </div>
                                </div> --}}
                            </div>
                            <div class="tab-pane fade" id="tab_11" role="tabpanel">
                                @forelse ($news_recent as $recent)
                                    <div class="news-card-seven">
                                        <div class="news-card-img">
                                            <img src="{{ asset('storage/' . $recent->photo) }}" alt="Image" />
                                        </div>
                                        <div class="news-card-info">
                                            <a href="business.html" class="news-cat">{{ $recent->category_names }}</a>
                                            <h3><a href="business-details.html">{{ $recent->name }}</a></h3>
                                            <ul class="news-metainfo list-style">
                                                <li><i class="fi fi-rr-calendar-minus"></i><a href="news-by-date.html">Feb
                                                        15, 2023</a></li>
                                                <li><i class="fi fi-rr-comment"></i>03</li>
                                                <li><i class="fi fi-rr-eye"></i>15 Min Read</li>
                                            </ul>
                                        </div>
                                    </div>
                                @empty
                                @endforelse
                                {{-- <div class="news-card-seven">
                                    <div class="news-card-img">
                                        <img src="assets/img/news/news-54.webp" alt="Image" />
                                    </div>
                                    <div class="news-card-info">
                                        <a href="business.html" class="news-cat">Lifestyle</a>
                                        <h3><a href="business-details.html">Discovering Your Personal Bliss: A Guide to a
                                                Fulfilling Lifestyle</a></h3>
                                        <ul class="news-metainfo list-style">
                                            <li><i class="fi fi-rr-calendar-minus"></i><a href="news-by-date.html">Feb 15,
                                                    2023</a></li>
                                            <li><i class="fi fi-rr-comment"></i>03</li>
                                            <li><i class="fi fi-rr-eye"></i>15 Min Read</li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="news-card-seven">
                                    <div class="news-card-img">
                                        <img src="assets/img/news/news-55.webp" alt="Image" />
                                    </div>
                                    <div class="news-card-info">
                                        <a href="business.html" class="news-cat">Photography</a>
                                        <h3><a href="business-details.html">Capturing Life's Moments: Tips for Better
                                                Photography</a></h3>
                                        <ul class="news-metainfo list-style">
                                            <li><i class="fi fi-rr-calendar-minus"></i><a href="news-by-date.html">Feb 14,
                                                    2023</a></li>
                                            <li><i class="fi fi-rr-comment"></i>03</li>
                                            <li><i class="fi fi-rr-eye"></i>15 Min Read</li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="news-card-seven">
                                    <div class="news-card-img">
                                        <img src="assets/img/news/news-56.webp" alt="Image" />
                                    </div>
                                    <div class="news-card-info">
                                        <a href="business.html" class="news-cat">Business</a>
                                        <h3><a href="business-details.html">Empowering Your Business: Strategies for
                                                Growth</a></h3>
                                        <ul class="news-metainfo list-style">
                                            <li><i class="fi fi-rr-calendar-minus"></i><a href="news-by-date.html">Feb 18,
                                                    2023</a></li>
                                            <li><i class="fi fi-rr-comment"></i>03</li>
                                            <li><i class="fi fi-rr-eye"></i>15 Min Read</li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="news-card-seven">
                                    <div class="news-card-img">
                                        <img src="assets/img/news/news-57.webp" alt="Image" />
                                    </div>
                                    <div class="news-card-info">
                                        <a href="business.html" class="news-cat">Sports</a>
                                        <h3><a href="business-details.html">Unleashing Your Inner Champion: The Excitement
                                                of Sports Competition</a></h3>
                                        <ul class="news-metainfo list-style">
                                            <li><i class="fi fi-rr-calendar-minus"></i><a href="news-by-date.html">Feb 22,
                                                    2023</a></li>
                                            <li><i class="fi fi-rr-comment"></i>03</li>
                                            <li><i class="fi fi-rr-eye"></i>12 Min Read</li>
                                        </ul>
                                    </div>
                                </div> --}}
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
                            <a href="/news-post" class="link-one">View All News<i class="flaticon-right-arrow"></i></a>
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        @forelse ($generals as $general)
                            <div class="col-xl-6">
                                <div class="news-card-twelve">
                                    <div class="news-card-img">
                                        <img src="{{ asset('storage/' . $general->photo) }}" alt="Image" />
                                        {{-- <img src="assets/img/news/news-20.webp" alt="Image" /> --}}
                                    </div>
                                    <div class="news-card-info">
                                        <a href="business.html" class="news-cat">{{ $general->category_names }}</a>
                                        <h3><a href="business-details.html">{{ $general->name }}</a></h3>
                                        <ul class="news-metainfo list-style">
                                            <li><i class="fi fi-rr-calendar-minus"></i><a
                                                    href="news-by-date.html">{{ $general->upload_date }}</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        @empty
                        @endforelse
                        {{-- <div class="col-xl-6">
                            <div class="news-card-twelve">
                                <div class="news-card-img">
                                    <img src="assets/img/news/news-20.webp" alt="Image" />
                                </div>
                                <div class="news-card-info">
                                    <a href="business.html" class="news-cat">Fashion</a>
                                    <h3><a href="business-details.html">Is This The Beginning Of The End Of The
                                            Internet?</a></h3>
                                    <ul class="news-metainfo list-style">
                                        <li><i class="fi fi-rr-calendar-minus"></i><a href="news-by-date.html">Feb 22,
                                                2023</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-6">
                            <div class="news-card-twelve">
                                <div class="news-card-img">
                                    <img src="assets/img/news/news-21.webp" alt="Image" />
                                </div>
                                <div class="news-card-info">
                                    <a href="business.html" class="news-cat">Politics</a>
                                    <h3><a href="business-details.html">7 Steps To Get Professional Facial Results At
                                            Home</a></h3>
                                    <ul class="news-metainfo list-style">
                                        <li><i class="fi fi-rr-calendar-minus"></i><a href="news-by-date.html">Feb 25,
                                                2023</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-6">
                            <div class="news-card-twelve">
                                <div class="news-card-img">
                                    <img src="assets/img/news/news-22.webp" alt="Image" />
                                </div>
                                <div class="news-card-info">
                                    <a href="business.html" class="news-cat">Inspiration</a>
                                    <h3><a href="business-details.html">Creative Photography Ideas From Smart Devices</a>
                                    </h3>
                                    <ul class="news-metainfo list-style">
                                        <li><i class="fi fi-rr-calendar-minus"></i><a href="news-by-date.html">Feb 18,
                                                2023</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-6">
                            <div class="news-card-twelve">
                                <div class="news-card-img">
                                    <img src="assets/img/news/news-23.webp" alt="Image" />
                                </div>
                                <div class="news-card-info">
                                    <a href="business.html" class="news-cat">Politics</a>
                                    <h3><a href="business-details.html">6 Romantic Places You Should Visit In 2023</a></h3>
                                    <ul class="news-metainfo list-style">
                                        <li><i class="fi fi-rr-calendar-minus"></i><a href="news-by-date.html">Feb 20,
                                                2023</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-6">
                            <div class="news-card-twelve">
                                <div class="news-card-img">
                                    <img src="assets/img/news/news-24.webp" alt="Image" />
                                </div>
                                <div class="news-card-info">
                                    <a href="business.html" class="news-cat">Sports</a>
                                    <h3><a href="business-details.html">The Best Place To Celebrate Birthday And Music</a>
                                    </h3>
                                    <ul class="news-metainfo list-style">
                                        <li><i class="fi fi-rr-calendar-minus"></i><a href="news-by-date.html">Feb 27,
                                                2023</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-6">
                            <div class="news-card-twelve">
                                <div class="news-card-img">
                                    <img src="assets/img/news/news-25.webp" alt="Image" />
                                </div>
                                <div class="news-card-info">
                                    <a href="business.html" class="news-cat">Business</a>
                                    <h3><a href="business-details.html">Splurge Or Save Last Minute Pampering Gift
                                            Ideas</a></h3>
                                    <ul class="news-metainfo list-style">
                                        <li><i class="fi fi-rr-calendar-minus"></i><a href="news-by-date.html">Feb 18,
                                                2023</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div> --}}
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
                                <img class="logo-light" src="assets/img/logo.webp" alt="Image" />
                                <img class="logo-dark" src="assets/img/logo-white.webp" alt="Image" />
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
                                        <img src="{{ asset('storage/' . $post->photo) }}" alt="Image" />
                                        {{-- <img src="assets/img/news/news-thumb-4.webp" alt="Image" /> --}}
                                    </div>
                                    <div class="news-card-info">
                                        <h3><a href="business-details.html">{{ $post->name }}</a></h3>
                                        <ul class="news-metainfo list-style">
                                            <li><i class="fi fi-rr-calendar-minus"></i><a href="news-by-date.html">Apr 22,
                                                    2023</a></li>
                                        </ul>
                                    </div>
                                </div>
                            @empty
                            @endforelse
                            {{-- <div class="news-card-one">
                                <div class="news-card-img">
                                    <img src="assets/img/news/news-thumb-4.webp" alt="Image" />
                                </div>
                                <div class="news-card-info">
                                    <h3><a href="business-details.html">Bernie Nonummy Pelopai Iatis Eum Litora</a></h3>
                                    <ul class="news-metainfo list-style">
                                        <li><i class="fi fi-rr-calendar-minus"></i><a href="news-by-date.html">Apr 22,
                                                2023</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="news-card-one">
                                <div class="news-card-img">
                                    <img src="assets/img/news/news-thumb-5.webp" alt="Image" />
                                </div>
                                <div class="news-card-info">
                                    <h3><a href="business-details.html">How Youth Viral Diseases May The Year 2023</a></h3>
                                    <ul class="news-metainfo list-style">
                                        <li><i class="fi fi-rr-calendar-minus"></i><a href="news-by-date.html">Apr 23,
                                                2023</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="news-card-one">
                                <div class="news-card-img">
                                    <img src="assets/img/news/news-thumb-6.webp" alt="Image" />
                                </div>
                                <div class="news-card-info">
                                    <h3><a href="business-details.html">Man Wearing Black Pullover Hoodie To Smoke</a></h3>
                                    <ul class="news-metainfo list-style">
                                        <li><i class="fi fi-rr-calendar-minus"></i><a href="news-by-date.html">Apr 14,
                                                2023</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="news-card-one">
                                <div class="news-card-img">
                                    <img src="assets/img/news/news-thumb-7.webp" alt="Image" />
                                </div>
                                <div class="news-card-info">
                                    <h3><a href="business-details.html">First Prototype Flight Using Kinetic Launch
                                            System</a></h3>
                                    <ul class="news-metainfo list-style">
                                        <li><i class="fi fi-rr-calendar-minus"></i><a href="news-by-date.html">Apr 07,
                                                2023</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="news-card-one">
                                <div class="news-card-img">
                                    <img src="assets/img/news/news-thumb-8.webp" alt="Image" />
                                </div>
                                <div class="news-card-info">
                                    <h3><a href="business-details.html">Beauty Queens Need Material & Products</a></h3>
                                    <ul class="news-metainfo list-style">
                                        <li><i class="fi fi-rr-calendar-minus"></i><a href="news-by-date.html">Apr 03,
                                                2023</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="news-card-one">
                                <div class="news-card-img">
                                    <img src="assets/img/news/news-thumb-9.webp" alt="Image" />
                                </div>
                                <div class="news-card-info">
                                    <h3><a href="business-details.html">That Woman Comes From Heaven Look Like Angel</a>
                                    </h3>
                                    <ul class="news-metainfo list-style">
                                        <li><i class="fi fi-rr-calendar-minus"></i><a href="news-by-date.html">Apr 01,
                                                2023</a></li>
                                    </ul>
                                </div>
                            </div> --}}
                        </div>
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

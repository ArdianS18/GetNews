@extends('layouts.user.app')

<head>
    <style>
        .theme-dark blockquote {
            border-left: 5px solid #ffffff;
            padding: 10px 20px;
            margin: 20px 0;
            background: #1d1d1d;
            font-style: italic;
        }

        .quote-box {
            border-left: 5px solid #183249;
            padding: 10px 20px;
            margin: 20px 0;
            background: #f9f9f9;
            font-style: italic;
        }

        .coin-container {
            position: fixed;
            left: 20px;
            bottom: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .coin-loader {
            position: relative;
            width: 50px;
            /* Lebih besar dari ukuran coin */
            height: 50px;
            /* Lebih besar dari ukuran coin */
        }

        .coin-circle {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            border: 3px solid transparent;
            border-top-color: #0F4D8A;
            /* Warna lingkaran */
            border-radius: 100%;
            width: 100%;
            height: 100%;
            animation: spin 60s linear infinite;
            /* border-left-color: #0F4D8A; */
        }

        @keyframes spin {
            0% {
                transform: rotate(0deg);
            }

            100% {
                transform: rotate(360deg);
            }
        }
    </style>
    @section('title', $news->name)
    @php
        $dateParts = date_parse($news->upload_date);
        $newsContent = strip_tags($news->content);
        $description = implode(' ', array_slice(explode(' ', $newsContent), 0, 20)) . '...';

        $datePartsRelated = date_parse($relatedNews->upload_date);

    @endphp

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:site" content="@GetMedia">
    <meta property="og:description" content="{{ $description }}">
    <meta property="og:title" content="{{ $news->name }} | GetMedia">
    <meta property="og:image" content="{{ asset('storage/' . $news->photo) }}">
    <meta property="og:url"
        content="https://media.mijurnal.com/{{ $dateParts['year'] }}/{{ $dateParts['month'] }}/{{ $dateParts['day'] }}/{{ $news->slug }}">
    <meta property="og:type" content="article">
    <meta property="og:site_name" content="GetMedia">
</head>

@section('style')
    <style>
        body {
            overflow-x: hidden
        }

        .slideshow-container {
            position: relative;
        }

        .slideshow {
            display: flex;
            justify-content: center;
            align-items: center;
            /* Sesuaikan dengan tinggi gambar slideshow */
        }

        .slideshow img {
            max-height: 100%;
            object-fit: cover;
        }

        .thumbnail-container {
            overflow-x: auto;
            white-space: nowrap;
            scrollbar-width: none;
            -ms-overflow-style: none;
        }

        .thumbnail-container::-webkit-scrollbar {
            display: none;
        }

        .thumbnail {
            display: inline-block;
            margin-right: 10px;
        }

        .thumbnail img {
            width: 100px;
            height: 100px;
            object-fit: cover;
        }

        #prev-button,
        #next-button {
            margin-top: 10px;
        }

        .breadcrumb {
            margin-bottom: 10px;
        }

        .breadcrumb a {
            text-decoration: none;
        }

        .breadcrumb .separator {
            margin: 0 5px;
            color: #000000;
        }

        .last {
            color: #E93314 !important;
        }

        .breadcrumb-menu list-style:last-child {
            color: #E93314 !important
        }

        .breadcrumb-wrap {
            background-color: transparent !important;
            padding: 0px !important
        }

        .breadcrumb-menu {
            text-align: start !important
        }

        .shareLink {
            .permalink {
                position: relative;
                border-radius: 30px;

                .textLink {
                    text-align: center;
                    padding: 12px 60px 12px 30px;
                    height: 45px;
                    width: 450px;
                    font-size: 16px;
                    letter-spacing: .3px;
                    color: #494949;
                    border-radius: 25px;
                    border: 1px solid #f2f2f2;
                    background-color: #f2f2f2;
                    outline: 0;
                    appearance: none;
                    transition: all .3s ease;

                    @media (max-width: 767px) {
                        width: 100%;
                    }

                    &:focus {
                        border-color: #d8d8d8;
                    }

                    &::selection {
                        color: #fff;
                        background-color: #ff0a4b;
                    }
                }

                .copyLink {
                    position: absolute;
                    top: 50%;
                    right: 25px;
                    cursor: pointer;
                    transform: translateY(-50%);

                    &:hover {
                        &:after {
                            opacity: 1;
                            transform: translateY(0) translateX(-50%);
                        }
                    }

                    &:after {
                        content: attr(tooltip);
                        width: 140px;
                        bottom: -40px;
                        left: 50%;
                        padding: 5px;
                        border-radius: 4px;
                        font-size: 0.8rem;
                        opacity: 0;
                        pointer-events: none;
                        position: absolute;
                        background-color: #000000;
                        color: #ffffff;
                        transform: translateY(-10px) translateX(-50%);
                        transition: all 300ms ease;
                        text-align: center;
                    }

                    i {
                        font-size: 20px;
                        color: #ff0a4b;
                    }
                }
            }
        }

        .btn-outline-primary {
            --bs-btn-color: #175A95 d;
            --bs-btn-border-color: #175A95;
            --bs-btn-hover-color: #fff;
            --bs-btn-hover-bg: #175A95;
            --bs-btn-hover-border-color: #175A95;
            --bs-btn-focus-shadow-rgb: 13, 110, 253;
            --bs-btn-active-color: #fff;
            --bs-btn-active-bg: #175A95;
            --bs-btn-active-border-color: #175A95;
            --bs-btn-active-shadow: inset 0 3px 5px rgba(0, 0, 0, 0.125);
            --bs-btn-disabled-color: #175A95;
            --bs-btn-disabled-bg: transparent;
            --bs-btn-disabled-border-color: #175A95fd;
            --bs-gradient: none;
        }

        @media (max-width: 768px) {
            .font-date {
                font-size: 12px;
            }
        }
    </style>
@endsection
@section('content')
    <div class="news-details-wrap">
        <div class="container">
            <div class="row gx-55 gx-5">
                <div class="col-lg-8">
                    <article>
                        <div class="breadcrumb-wrap mb-3">
                            <ul class="breadcrumb-menu list-style">
                                <li><a data-toggle="tooltip" data-placement="top" title="Beranda" href="/">
                                        Home</a></li>
                                <li><a data-toggle="tooltip" data-placement="top"
                                        title="{{ $news->newsCategories[0]->category->name }}"
                                        href="{{ route('categories.show.user', ['category' => $news->newsCategories[0]->category->slug]) }}">{{ $news->newsCategories[0]->category->name }}
                                    </a>
                                </li>
                                <li> <a class="last" data-toggle="tooltip" data-placement="top"
                                        title="{{ $news->newsSubCategories[0]->subCategory->name }}"
                                        href="{{ route('subcategories.show.user', ['category' => $news->newsCategories[0]->category->slug, 'subCategory' => $news->newsSubCategories[0]->subCategory->slug]) }}">{{ $news->newsSubCategories[0]->subCategory->name }}</a>
                                </li>
                            </ul>
                        </div>
                        <h2 class="d-flex justify-content-start mb-2">{{ $news->name }}</h2>
                        <p class="d-flex gap-1">Share : <a id="wa" class="logo" data-name="{{ $news->name }}"
                                data-slug="{{ $news->slug }}">
                                <svg height="19" width="19" version="1.1" id="Capa_1"
                                    xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                    viewBox="0 0 58 58" xml:space="preserve" fill="#000000">
                                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                    <g id="SVGRepo_iconCarrier">
                                        <g>
                                            <path style="fill:#2CB742;"
                                                d="M0,58l4.988-14.963C2.457,38.78,1,33.812,1,28.5C1,12.76,13.76,0,29.5,0S58,12.76,58,28.5 S45.24,57,29.5,57c-4.789,0-9.299-1.187-13.26-3.273L0,58z">
                                            </path>
                                            <path style="fill:#FFFFFF;"
                                                d="M47.683,37.985c-1.316-2.487-6.169-5.331-6.169-5.331c-1.098-0.626-2.423-0.696-3.049,0.42 c0,0-1.577,1.891-1.978,2.163c-1.832,1.241-3.529,1.193-5.242-0.52l-3.981-3.981l-3.981-3.981c-1.713-1.713-1.761-3.41-0.52-5.242 c0.272-0.401,2.163-1.978,2.163-1.978c1.116-0.627,1.046-1.951,0.42-3.049c0,0-2.844-4.853-5.331-6.169 c-1.058-0.56-2.357-0.364-3.203,0.482l-1.758,1.758c-5.577,5.577-2.831,11.873,2.746,17.45l5.097,5.097l5.097,5.097 c5.577,5.577,11.873,8.323,17.45,2.746l1.758-1.758C48.048,40.341,48.243,39.042,47.683,37.985z">
                                            </path>
                                        </g>
                                    </g>
                                </svg>

                            </a>
                            <a id="fb">
                                <svg xmlns="http://www.w3.org/2000/svg" width="19" height="19" viewBox="0 0 263 263">
                                    <path fill="#1877F2"
                                        d="M256 128C256 57.308 198.692 0 128 0C57.308 0 0 57.308 0 128c0 63.888 46.808 116.843 108 126.445V165H75.5v-37H108V99.8c0-32.08 19.11-49.8 48.348-49.8C170.352 50 185 52.5 185 52.5V84h-16.14C152.959 84 148 93.867 148 103.99V128h35.5l-5.675 37H148v89.445c61.192-9.602 108-62.556 108-126.445" />
                                    <path fill="#FFF"
                                        d="m177.825 165l5.675-37H148v-24.01C148 93.866 152.959 84 168.86 84H185V52.5S170.352 50 156.347 50C127.11 50 108 67.72 108 99.8V128H75.5v37H108v89.445A128.959 128.959 0 0 0 128 256a128.9 128.9 0 0 0 20-1.555V165z" />
                                </svg>
                            </a>
                            <a id="tw" class="logo">
                                <svg class="logo-dark" style="margin-top: 1px;" xmlns="http://www.w3.org/2000/svg"
                                    width="16" height="16" viewBox="0 0 14 14">
                                    <g fill="none">
                                        <g clip-path="url(#primeTwitter0)">
                                            <path fill="#ffffff"
                                                d="M11.025.656h2.147L8.482 6.03L14 13.344H9.68L6.294 8.909l-3.87 4.435H.275l5.016-5.75L0 .657h4.43L7.486 4.71zm-.755 11.4h1.19L3.78 1.877H2.504z" />
                                        </g>
                                        <defs>
                                            <clipPath id="primeTwitter0">
                                                <path fill="#fff" d="M0 0h14v14H0z" />
                                            </clipPath>
                                        </defs>
                                    </g>
                                </svg>
                                <svg class="logo-light" style="margin-top: 1px;" xmlns="http://www.w3.org/2000/svg"
                                    width="16" height="16" viewBox="0 0 14 14">
                                    <g fill="none">
                                        <g clip-path="url(#primeTwitter0)">
                                            <path fill="#000000"
                                                d="M11.025.656h2.147L8.482 6.03L14 13.344H9.68L6.294 8.909l-3.87 4.435H.275l5.016-5.75L0 .657h4.43L7.486 4.71zm-.755 11.4h1.19L3.78 1.877H2.504z" />
                                        </g>
                                        <defs>
                                            <clipPath id="primeTwitter0">
                                                <path fill="#fff" d="M0 0h14v14H0z" />
                                            </clipPath>
                                        </defs>
                                    </g>
                                </svg>
                            </a>
                            {{-- <a id="tw">
                                <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 128 128">
                                    <path
                                        d="M75.916 54.2L122.542 0h-11.05L71.008 47.06L38.672 0H1.376l48.898 71.164L1.376 128h11.05L55.18 78.303L89.328 128h37.296L75.913 54.2ZM60.782 71.79l-4.955-7.086l-39.42-56.386h16.972L65.19 53.824l4.954 7.086l41.353 59.15h-16.97L60.782 71.793Z" />
                                </svg>
                            </a> --}}
                            <a id="tele">
                                <svg xmlns="http://www.w3.org/2000/svg" width="19" height="19" viewBox="0 0 263 263">
                                    <defs>
                                        <linearGradient id="logosTelegram0" x1="50%" x2="50%" y1="0%"
                                            y2="100%">
                                            <stop offset="0%" stop-color="#2AABEE" />
                                            <stop offset="100%" stop-color="#229ED9" />
                                        </linearGradient>
                                    </defs>
                                    <path fill="url(#logosTelegram0)"
                                        d="M128 0C94.06 0 61.48 13.494 37.5 37.49A128.038 128.038 0 0 0 0 128c0 33.934 13.5 66.514 37.5 90.51C61.48 242.506 94.06 256 128 256s66.52-13.494 90.5-37.49c24-23.996 37.5-56.576 37.5-90.51c0-33.934-13.5-66.514-37.5-90.51C194.52 13.494 161.94 0 128 0" />
                                    <path fill="#FFF"
                                        d="M57.94 126.648c37.32-16.256 62.2-26.974 74.64-32.152c35.56-14.786 42.94-17.354 47.76-17.441c1.06-.017 3.42.245 4.96 1.49c1.28 1.05 1.64 2.47 1.82 3.467c.16.996.38 3.266.2 5.038c-1.92 20.24-10.26 69.356-14.5 92.026c-1.78 9.592-5.32 12.808-8.74 13.122c-7.44.684-13.08-4.912-20.28-9.63c-11.26-7.386-17.62-11.982-28.56-19.188c-12.64-8.328-4.44-12.906 2.76-20.386c1.88-1.958 34.64-31.748 35.26-34.45c.08-.338.16-1.598-.6-2.262c-.74-.666-1.84-.438-2.64-.258c-1.14.256-19.12 12.152-54 35.686c-5.1 3.508-9.72 5.218-13.88 5.128c-4.56-.098-13.36-2.584-19.9-4.708c-8-2.606-14.38-3.984-13.82-8.41c.28-2.304 3.46-4.662 9.52-7.072" />
                                </svg>
                            </a>
                            <a id="copylink" tooltip="Salin Link">
                                <span style="border-radius: 50%; background-color: #cccccc"
                                    class="d-flex justify-content-center p-1 copyLink" onclick="copyToClipboard()"
                                    id="copy">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="10" height="10"
                                        viewBox="0 0 256 256">
                                        <path fill="#292929"
                                            d="M240 88.23a54.43 54.43 0 0 1-16 37L189.25 160a54.27 54.27 0 0 1-38.63 16h-.05A54.63 54.63 0 0 1 96 119.84a8 8 0 0 1 16 .45A38.62 38.62 0 0 0 150.58 160a38.4 38.4 0 0 0 27.31-11.31l34.75-34.75a38.63 38.63 0 0 0-54.63-54.63l-11 11A8 8 0 0 1 135.7 59l11-11a54.65 54.65 0 0 1 77.3 0a54.86 54.86 0 0 1 16 40.23m-131 97.43l-11 11A38.4 38.4 0 0 1 70.6 208a38.63 38.63 0 0 1-27.29-65.94L78 107.31a38.63 38.63 0 0 1 66 28.4a8 8 0 0 0 16 .45A54.86 54.86 0 0 0 144 96a54.65 54.65 0 0 0-77.27 0L32 130.75A54.62 54.62 0 0 0 70.56 224a54.28 54.28 0 0 0 38.64-16l11-11a8 8 0 0 0-11.2-11.34" />
                                    </svg>

                                </span>
                            </a>
                        </p>
                        <div class="slideshow-container mb-3">
                            <div class="slideshow news-img">
                                <img id="main-image" src="{{ asset('storage/' . $news->photo) }}" width="100%"
                                    height="470" style="object-fit: cover" alt="Image">
                                <a data-toggle="tooltip" data-placement="top"
                                    title="{{ $news->newsCategories[0]->category->name }}"
                                    href="{{ route('categories.show.user', ['category' => $news->newsCategories[0]->category->slug]) }}"
                                    class="news-cat">{{ $news->newsCategories[0]->category->name }}</a>
                            </div>
                        </div>

                        <div class="">
                            <ul class="news-metainfo list-style">
                                <div class="d-flex justify-content-between">
                                    <div class="col-lg-11 col-md-11">
                                        <div class="row">
                                            <div class="col-md-12 col-lg-3 mb-3">
                                                <li class="author">
                                                    <span class="author-img">
                                                        <img src="{{ asset($news->user->photo ? 'storage/' . $news->user->photo : 'default.png') }}"
                                                            alt="Image" width="40px" height="30px"
                                                            style="border-radius: 50%; object-fit:cover;" />
                                                    </span>
                                                    <div>
                                                        <a style="display: inline;text-decoration:none"
                                                            data-toggle="tooltip" data-placement="top"
                                                            title="author - {{ $news->user->name }}"
                                                            href="{{ route('author.detail', ['id' => $news->user->slug]) }}">{{ $news->user->name }}</a>
                                                        </span>
                                                    </div>
                                                </li>
                                            </div>

                                            <div class="col-md-12 col-sm-12 col-lg-9">
                                                <li><i class="fi fi-rr-calendar-minus"></i>
                                                    <span id="formattedDate" class="font-date"></span>
                                                </li>
                                                <li>
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="mb-1" width="21"
                                                        height="21" viewBox="0 0 24 24">
                                                        <path fill="#e93314"
                                                            d="M12 6.5a9.77 9.77 0 0 1 8.82 5.5c-1.65 3.37-5.02 5.5-8.82 5.5S4.83 15.37 3.18 12A9.77 9.77 0 0 1 12 6.5m0-2C7 4.5 2.73 7.61 1 12c1.73 4.39 6 7.5 11 7.5s9.27-3.11 11-7.5c-1.73-4.39-6-7.5-11-7.5m0 5a2.5 2.5 0 0 1 0 5a2.5 2.5 0 0 1 0-5m0-2c-2.48 0-4.5 2.02-4.5 4.5s2.02 4.5 4.5 4.5s4.5-2.02 4.5-4.5s-2.02-4.5-4.5-4.5" />
                                                    </svg>
                                                    <span class="ms-1">{{ $news->views->count() }}</span>
                                                </li>
                                                <li>
                                                    @auth()
                                                        <form id="form-like">
                                                            @csrf
                                                            @if (auth()->check())
                                                                <button type="submit"
                                                                    style="background: transparent;border:transparent"
                                                                    class="like">
                                                                    <svg class="last mb-1" xmlns="http://www.w3.org/2000/svg"
                                                                        width="18" height="18" viewBox="0 0 24 24">
                                                                        <path fill="#E93314"
                                                                            d="M18 21H7V8l7-7l1.25 1.25q.175.175.288.475t.112.575v.35L14.55 8H21q.8 0 1.4.6T23 10v2q0 .175-.05.375t-.1.375l-3 7.05q-.225.5-.75.85T18 21m-9-2h9l3-7v-2h-9l1.35-5.5L9 8.85zM9 8.85V19zM7 8v2H4v9h3v2H2V8z" />
                                                                    </svg>
                                                                </button>
                                                            @endif

                                                        </form>

                                                        <form id="form-liked" style="display: none;">
                                                            @csrf
                                                            <button type="submit"
                                                                style="background: transparent;border:transparent"
                                                                class="liked">
                                                                <svg class="last mb-1" xmlns="http://www.w3.org/2000/svg"
                                                                    width="18" height="18" viewBox="0 0 24 24">
                                                                    <path fill="red"
                                                                        d="M18 21H8V8l7-7l1.25 1.25q.175.175.288.475t.112.575v.35L15.55 8H21q.8 0 1.4.6T23 10v2q0 .175-.037.375t-.113.375l-3 7.05q-.225.5-.75.85T18 21M6 8v13H2V8z" />
                                                                </svg>
                                                            </button>
                                                        </form>
                                                    @else
                                                        <form id="form-like">
                                                            @csrf
                                                            <button type="button"
                                                                style="background: transparent;border:transparent"
                                                                class="like not-login">
                                                                <svg class="mb-1" xmlns="http://www.w3.org/2000/svg"
                                                                    width="18" height="18" viewBox="0 0 24 24">
                                                                    <path fill="#E93314"
                                                                        d="M18 21H7V8l7-7l1.25 1.25q.175.175.288.475t.112.575v.35L14.55 8H21q.8 0 1.4.6T23 10v2q0 .175-.05.375t-.1.375l-3 7.05q-.225.5-.75.85T18 21m-9-2h9l3-7v-2h-9l1.35-5.5L9 8.85zM9 8.85V19zM7 8v2H4v9h3v2H2V8z" />
                                                                </svg>
                                                            </button>
                                                        </form>

                                                        <form id="form-liked" style="display: none;">
                                                            @csrf
                                                            <button type="submit"
                                                                style="background: transparent;border:transparent"
                                                                class="liked">
                                                                <svg class="mb-1" xmlns="http://www.w3.org/2000/svg"
                                                                    width="18" height="18" viewBox="0 0 24 24">
                                                                    <path fill="red"
                                                                        d="M18 21H8V8l7-7l1.25 1.25q.175.175.288.475t.112.575v.35L15.55 8H21q.8 0 1.4.6T23 10v2q0 .175-.037.375t-.113.375l-3 7.05q-.225.5-.75.85T18 21M6 8v13H2V8z" />
                                                                </svg>
                                                            </button>
                                                        </form>
                                                    @endauth

                                                    <span id="like"
                                                        data-like="{{ $newsLike }}">{{ $newsLike }}</span>
                                                </li>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-1 col-sm-1 col-lg-1">
                                        <li>
                                            <a class="" href="#" role="button" id="dropdownMenuLink"
                                                data-bs-toggle="dropdown" aria-expanded="false">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="23" height="23"
                                                    viewBox="0 0 24 24">
                                                    <path fill="none" stroke="currentColor" stroke-linejoin="round"
                                                        stroke-width="3"
                                                        d="M12 12h.01v.01H12zm0-7h.01v.01H12zm0 14h.01v.01H12z" />
                                                </svg>
                                            </a>

                                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                                <li>
                                                    <button class="btn btn-sm" data-bs-toggle="modal"
                                                        data-bs-target="#share">
                                                        Bagikan
                                                    </button>
                                                </li>
                                                <li>
                                                    <button class="btn btn-sm" data-bs-toggle="modal"
                                                        data-bs-target="#tambahdataLabel">
                                                        Laporkan
                                                    </button>
                                                </li>
                                            </ul>
                                        </li>
                                    </div>
                                </div>
                            </ul>
                        </div>

                        {{-- modal tambah --}}
                        <div class="modal fade" id="tambahdataLabel" tabindex="-1" aria-labelledby="tambahdataLabel"
                            aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title text-dark" id="tambahdataLabel"><span
                                                style="color: #0F4D8A; font-size: 25px;" class="mb-2 me-1"></span>Laporkan
                                        </h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>

                                    <div class="modal-body">
                                        <form action="{{ route('report.store', ['news' => $news->id]) }}" method="post">
                                            @method('post')
                                            @csrf
                                            <div class="mb-3 form-group">
                                                <label for="message" class="form-label">Masukan Detail
                                                    Laporan:</label>
                                                <textarea name="message" id="message" class="form-control" rows="7" style="resize: none"></textarea>
                                                @error('message')
                                                    <span class="invalid-feedback" role="alert" style="color: red;">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="mb-3">
                                                <p>
                                                    Artikel dan pengguna yang dilaporkan akan ditinjau oleh staf Getmedia
                                                    untuk menentukan apakah artikel dan pengguna tersebut melanggar Pedoman
                                                    Komunitas kami atau tidak. Akun akan dikenai sanksi jika melanggar
                                                    Pedoman Komunitas, dan pelanggaran serius atau berulang dapat berakibat
                                                    pada penghentian akun.
                                                </p>
                                            </div>

                                            <div class="">
                                                <div class="d-flex justify-content-end me-2">
                                                    <button type="button" class="me-2 btn btn-secondary"
                                                        data-bs-dismiss="modal">Batal</button>
                                                    <button type="submit" class="btn btn-danger">Laporkan</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="modal fade" id="share" tabindex="-1" aria-labelledby="tambahdataLabel"
                            aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="tambahdataLabel"><span
                                                style="color: #0F4D8A; font-size: 25px;" class="mb-2 me-1"></span>Bagikan
                                        </h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>

                                    <div class="modal-body">

                                        <div class="container">
                                            <div class="mb-3 form-group">
                                                <label for="message" class="form-label fw-bold">Url</label>
                                                <div class="shareLink">
                                                    <div class="permalink">
                                                        <input class="textLink" type="text" name="shortlink"
                                                            value="https://media.mijurnal.com/{{ $dateParts['year'] }}/{{ $dateParts['month'] }}/{{ $dateParts['day'] }}/{{ $news->slug }}"
                                                            id="copy-link" readonly="">
                                                        <span class="copyLink" onclick="copyToClipboard()" id="copy"
                                                            tooltip="Salin Link">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="20"
                                                                height="20" viewBox="0 0 32 32">
                                                                <path fill="#000000"
                                                                    d="M28 10v18H10V10zm0-2H10a2 2 0 0 0-2 2v18a2 2 0 0 0 2 2h18a2 2 0 0 0 2-2V10a2 2 0 0 0-2-2" />
                                                                <path fill="#000000" d="M4 18H2V4a2 2 0 0 1 2-2h14v2H4Z" />
                                                            </svg> </span>
                                                    </div>
                                                </div>
                                                @error('message')
                                                    <span class="invalid-feedback" role="alert" style="color: red;">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="mt-3">

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        {{-- @foreach ($pages as $index => $page) --}}
                        <div class="news-para">
                            {{-- <p>{!! $pages !!}</p> --}}
                            @php
                                $paragraphs = explode('</p>', $news->content);
                                $insertAt = ceil(count($paragraphs) / 2);
                            @endphp

                            @foreach ($paragraphs as $index => $paragraph)
                                {!! $paragraph !!}
                                </p>
                                @if ($index == $insertAt)
                                    <div class="related-news">
                                        <blockquote class="quote-box">
                                            <p>Baca juga : <a
                                                    href="{{ route('news.user', ['year' => $datePartsRelated['year'], 'month' => $datePartsRelated['month'], 'day' => $datePartsRelated['day'], 'news' => $relatedNews->slug]) }}">{{ $relatedNews->name }}</a>
                                            </p>
                                        </blockquote>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                        <p> Tag :
                            @forelse ($tags as $tag)
                                <a data-toggle="tooltip" data-placement="top" title="{{ $tag->tag->name }}"
                                    href="{{ route('tag.show.user', ['tag' => $tag->tag->slug]) }}"
                                    class="btn btn-rounded btn-outline-primary">{{ $tag->tag->name }}</a>
                            @empty
                            @endforelse
                        </p>

                        <div class="modal fade" id="reportModal" tabindex="-1" aria-labelledby="reportModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="reportModalLabel">Laporkan Komentar</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form id="reportForm" method="post">
                                            <div class="form-group">
                                                <label for="reportReason">Alasan</label>
                                                <textarea name="content" class="form-control" id="reportReason" rows="3" required style="resize: none"></textarea>
                                            </div>
                                            <input type="hidden" id="commentId" name="commentId" />
                                            <div class="d-flex justify-content-end mt-4">
                                                <button type="submit" class="btn btn-primary">Laporkan</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="deleteModalLabel">Delete Komentar</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body" method="delete">
                                        <form id="deleteForm">
                                            <div class="form-group">
                                                <label for="deleteReason">Yakin ingin menghapus komentar anda?</label>
                                            </div>
                                            <input type="hidden" id="commentId" name="commentId" />
                                            <div class="d-flex justify-content-end mt-4 gap-2">
                                                <button type="button" data-bs-dismiss="modal"
                                                    class="btn btn-danger">Tidak</button>
                                                <button type="submit" class="btn btn-primary">Hapus</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <h3 class="comment-title mt-5">{{ $comments->count() }} Komentar</h3>
                        <div class="comment-item-wrap">
                            @php
                                $groupedReplies = [];
                                foreach ($comments as $comment) {
                                    if ($comment->parent_id) {
                                        $parentId = $comment->parent_id;

                                        if (!isset($groupedReplies[$parentId])) {
                                            $groupedReplies[$parentId] = [];
                                        }
                                        $groupedReplies[$parentId][] = $comment;
                                    }
                                }
                            @endphp
                            @forelse ($comments as $index => $comment)
                                <div class="comment-item w-100" style="display: {{ $index < 5 ? 'block' : 'none' }}">
                                    <div class="row">
                                        @if ($comment->parent_id == null)
                                            <div class="col-lg-1">
                                                <div class="comment-author-img">
                                                    <img src="{{ asset($comment->user->photo ? 'storage/' . $comment->user->photo : 'default.png') }}"
                                                        alt="Image" class="img-fluid" width="60"
                                                        style="object-fit:cover; height: 60px;" />
                                                </div>
                                            </div>

                                            <div class="col-lg-11">
                                                <div class="comment-author-wrap">
                                                    <div class="comment-author-info">
                                                        <div class="row align-items-start">
                                                            <div class="col-md-9 order-md-1 order-sm-1 order-1">
                                                                <div class="comment-author-name">
                                                                    <h5>
                                                                        @if ($comment->user_id === $comment->news->user_id)
                                                                            <a
                                                                                href="{{ route('author.detail', ['id' => $comment->user->slug]) }}">
                                                                        @endif

                                                                        {{ $comment->user->name }}

                                                                        @if ($comment->user_id === $comment->news->user_id)
                                                                            <span style="font-size: 0.8em;font-weight:400;color:red"> -
                                                                                pembuat</span>
                                                                            </a>
                                                                        @endif
                                                                    </h5>
                                                                    <div class="mt-2">
                                                                        <span
                                                                            class="comment-date">{{ \Carbon\Carbon::parse($comment->created_at)->format('M d,Y | g:i A') }}</span>
                                                                    </div>
                                                                </div>

                                                            </div>
                                                            <div class="col-md-3 text-end order-sm-3 order-2">
                                                                <div class="comment">
                                                                    <a class="" href="#" role="button"
                                                                        id="dropdownMenuLink" data-bs-toggle="dropdown"
                                                                        aria-expanded="false">
                                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                                            width="23" height="23"
                                                                            viewBox="0 0 24 24">
                                                                            <path fill="none" stroke="currentColor"
                                                                                stroke-linejoin="round" stroke-width="3"
                                                                                d="M12 12h.01v.01H12zm0-7h.01v.01H12zm0 14h.01v.01H12z" />
                                                                        </svg>
                                                                    </a>
                                                                    <ul class="dropdown-menu"
                                                                        aria-labelledby="dropdownMenuLink">
                                                                        @if (Auth::check() && $comment->user_id === auth()->user()->id)
                                                                            @if ($comment->news->user_id === auth()->user()->id)
                                                                                <li>
                                                                                    <button class="btn btn-sm pin"
                                                                                        data-id="{{ $comment->id }}">
                                                                                        Pin
                                                                                    </button>
                                                                                </li>
                                                                            @endif
                                                                            <li>
                                                                                <button class="btn btn-sm edit-btn"
                                                                                    onclick="showEditForm({{ $comment->id }})">
                                                                                    Edit
                                                                                </button>
                                                                            </li>
                                                                            <li>
                                                                                <button class="btn btn-sm delete"
                                                                                    data-id="{{ $comment->id }}">
                                                                                    Hapus
                                                                                </button>
                                                                            </li>
                                                                        @elseif (Auth::check() &&
                                                                                $comment->news->user_id === (auth()->user()->roles->pluck('name')[0] == 'author') &&
                                                                                $comment->user_id != auth()->user()->author->user_id)
                                                                            @if ($comment->news->user_id === auth()->user()->id)
                                                                                <li>
                                                                                    <button class="btn btn-sm pin"
                                                                                        data-id="{{ $comment->id }}">
                                                                                        Pin
                                                                                    </button>
                                                                                </li>
                                                                            @endif
                                                                            <li>
                                                                                <button class="btn btn-sm edit-btn"
                                                                                    onclick="showEditForm({{ $comment->id }})">
                                                                                    Edit
                                                                                </button>
                                                                            </li>
                                                                            <li>
                                                                                <button class="btn btn-sm delete"
                                                                                    data-id="{{ $comment->id }}">
                                                                                    Hapus
                                                                                </button>
                                                                            </li>
                                                                        @elseif (Auth::check() && $comment->news->user_id === auth()->user()->id)
                                                                            <li>
                                                                                <button class="btn btn-sm pin"
                                                                                    data-id="{{ $comment->id }}">
                                                                                    Pin
                                                                                </button>
                                                                            </li>
                                                                            <li>
                                                                                <button class="btn btn-sm edit-btn"
                                                                                    onclick="showEditForm({{ $comment->id }})">
                                                                                    Edit
                                                                                </button>
                                                                            </li>
                                                                            <li>
                                                                                <button class="btn btn-sm delete"
                                                                                    data-id="{{ $comment->id }}">
                                                                                    Hapus
                                                                                </button>
                                                                            </li>
                                                                        @endif

                                                                        @if (Auth::check() && $comment->user_id != auth()->user()->id)
                                                                            <li>
                                                                                <button class="btn btn-sm report-icon"
                                                                                    data-id="{{ $comment->id }}">
                                                                                    Laporkan
                                                                                </button>
                                                                            </li>
                                                                        @endif
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-9 order-md-3 order-sm-2 order-2">
                                                                <div class="comment-text">
                                                                    <p>{{ $comment->content }}</p>
                                                                </div>
                                                                @if ($comment->parent_id == null)
                                                                    <a href="javascript:void(0)" class="reply-btn mt-3"
                                                                        onclick="showReplyForm({{ $comment->id }})">Balas</a>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>


                                            <div id="edit-form-{{ $comment->id }}" class="edit-form mt-3"
                                                style="display: none;">
                                                <form action="{{ route('comment.update', ['comment' => $comment->id]) }}"
                                                    method="POST">
                                                    @method('post')
                                                    @csrf
                                                    <textarea name="content" class="form-control mb-2" cols="100" rows="2" placeholder="Edit Komentar">{{ $comment->content }}</textarea>
                                                    @auth
                                                        <div>
                                                            <button type="submit" class="btn-two w-100 btn"
                                                                style="background-color: #0F4D8A;padding:10px !important">Edit
                                                                Komentar</button>
                                                        </div>
                                                    @else
                                                        <div>
                                                            <button type="button" class="btn-two w-100 btn not-login"
                                                                style="background-color: #0F4D8A;padding:10px !important">Edit
                                                                Komentar</button>
                                                        </div>
                                                    @endauth
                                                </form>
                                            </div>

                                            <div id="reply-form-{{ $comment->id }}" class="reply-form mt-3"
                                                style="display: none;">
                                                <form
                                                    action="{{ route('reply.comment.create', ['news' => $news->id, 'id' => $comment->id]) }}"
                                                    method="post">
                                                    @csrf
                                                    <textarea name="content" class="form-control mb-2" cols="100" rows="2" placeholder="Balas Komentar"></textarea>
                                                    @auth
                                                        <div>
                                                            <button type="submit" class="btn-two w-100 btn"
                                                                style="background-color: #0F4D8A;padding:10px !important">Kirim
                                                                Balasan</button>
                                                        </div>
                                                    @else
                                                        <div>
                                                            <button type="button" class="btn-two w-100 btn not-login"
                                                                style="background-color: #0F4D8A;padding:10px !important">Kirim
                                                                Balasan</button>
                                                        </div>
                                                    @endauth
                                                </form>
                                            </div>
                                        @endif
                                    </div>

                                    @foreach ($groupedReplies[$comment->id] ?? [] as $reply)
                                        <div class="">
                                            <div class="row comment-item w-100 ms-5 mt-4">
                                                <div class="col-lg-1">
                                                    <div class="comment-author-img">
                                                        <img src="{{ asset($reply->user->photo ? 'storage/' . $reply->user->photo : 'default.png') }}"
                                                            alt="Image" class="img-fluid" width="90"
                                                            style="object-fit:cover; height: 60px;" />
                                                    </div>
                                                </div>

                                                <div class="col-lg-11">
                                                    <div class="comment-author-wrap">
                                                        <div class="comment-author-info">
                                                            <div class="row align-items-start">
                                                                <div class="col-md-9 order-md-1 order-sm-1 order-1">
                                                                    <div class="comment-author-name">
                                                                        <h5>
                                                                            @if ($reply->user_id === $reply->news->user_id)
                                                                                <a
                                                                                    href="{{ route('author.detail', ['id' => $reply->user->slug]) }}">
                                                                            @endif

                                                                            {{ $reply->user->name }}

                                                                            @if ($reply->user_id === $reply->news->user_id)
                                                                                <span style="font-size: 0.8em;font-weight:400;color:red"> -
                                                                                    pembuat</span>
                                                                                </a>
                                                                            @endif
                                                                        </h5>
                                                                        <div class="d-flex">
                                                                            <span
                                                                                class="comment-date">{{ \Carbon\Carbon::parse($reply->created_at)->format('M d,Y | g:i A') }}</span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-3 text-end order-sm-3 order-2">
                                                                    <div class="comment">
                                                                        <a class="" href="#" role="button"
                                                                            id="dropdownMenuLink"
                                                                            data-bs-toggle="dropdown"
                                                                            aria-expanded="false">
                                                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                                                width="23" height="23"
                                                                                viewBox="0 0 24 24">
                                                                                <path fill="none" stroke="currentColor"
                                                                                    stroke-linejoin="round"
                                                                                    stroke-width="3"
                                                                                    d="M12 12h.01v.01H12zm0-7h.01v.01H12zm0 14h.01v.01H12z" />
                                                                            </svg>
                                                                        </a>
                                                                        <ul class="dropdown-menu"
                                                                            aria-labelledby="dropdownMenuLink">
                                                                            @if (Auth::check() && $reply->user_id === auth()->user()->id)
                                                                                <li>
                                                                                    <button class="btn btn-sm"
                                                                                        onclick="showEditReplyForm({{ $reply->id }})">
                                                                                        Edit
                                                                                    </button>
                                                                                </li>
                                                                                <li>
                                                                                    <button class="btn btn-sm delete"
                                                                                        data-id="{{ $reply->id }}">
                                                                                        Hapus
                                                                                    </button>
                                                                                </li>
                                                                            @elseif (Auth::check() &&
                                                                                    $reply->news->user_id === (auth()->user()->roles->pluck('name')[0] == 'author') &&
                                                                                    $reply->user_id != auth()->user()->author->user_id)
                                                                                @if ($comment->news->user_id === auth()->user()->id)
                                                                                    <li>
                                                                                        <button class="btn btn-sm pin"
                                                                                            data-id="{{ $reply->id }}">
                                                                                            Pin
                                                                                        </button>
                                                                                    </li>
                                                                                @endif
                                                                                <li>
                                                                                    <button class="btn btn-sm edit-btn"
                                                                                        onclick="showEditReplyForm({{ $reply->id }})">
                                                                                        Edit
                                                                                    </button>
                                                                                </li>
                                                                                <li>
                                                                                    <button class="btn btn-sm delete"
                                                                                        data-id="{{ $reply->id }}">
                                                                                        Hapus
                                                                                    </button>
                                                                                </li>
                                                                            @elseif (Auth::check() && $reply->news->user_id === auth()->user()->id)
                                                                                <li>
                                                                                    <button class="btn btn-sm pin"
                                                                                        data-id="{{ $reply->id }}">
                                                                                        Pin
                                                                                    </button>
                                                                                </li>
                                                                                <li>
                                                                                    <button class="btn btn-sm edit-btn"
                                                                                        onclick="showEditReplyForm({{ $reply->id }})">
                                                                                        Edit
                                                                                    </button>
                                                                                </li>
                                                                                <li>
                                                                                    <button class="btn btn-sm delete"
                                                                                        data-id="{{ $reply->id }}">
                                                                                        Hapus
                                                                                    </button>
                                                                                </li>
                                                                            @endif

                                                                            @if (Auth::check() && $reply->user_id != auth()->user()->id)
                                                                                <li>
                                                                                    <button class="btn btn-sm report-icon"
                                                                                        data-id="{{ $reply->id }}">
                                                                                        Laporkan
                                                                                    </button>
                                                                                </li>
                                                                            @endif
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                                <div
                                                                    class="col-md-12 col-sm-12 col-12 order-md-3 order-sm-2 order-2">
                                                                    <div class="comment-text">
                                                                        <p>{{ $reply->content }}</p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>

                                        <!-- Form Balasan -->
                                        <div id="reply-form-{{ $reply->id }}" class="reply-form mt-3"
                                            style="display: none;">
                                            <form
                                                action="{{ route('reply.comment.create', ['news' => $news->id, 'id' => $reply->id]) }}"
                                                method="post">
                                                @csrf
                                                <textarea name="content" cols="100" rows="3" placeholder="Type your reply here"></textarea>
                                                @auth
                                                    <div>
                                                        <button type="submit" class="btn-two w-100 btn btn-sm"
                                                            style="background-color: #0F4D8A">Kirim Balasan</button>
                                                    </div>
                                                @else
                                                    <div>
                                                        <button type="submit" class="btn-two w-100 btn btn-sm not-login"
                                                            style="background-color: #0F4D8A">Kirim Balasan</button>
                                                    </div>
                                                @endauth
                                            </form>
                                        </div>

                                        <div id="edit-reply-form-{{ $reply->id }}" class="edit-reply-form mt-3"
                                            style="display: none;">
                                            <form action="{{ route('comment.update', ['comment' => $reply->id]) }}"
                                                method="POST">
                                                @method('post')
                                                @csrf
                                                <textarea name="content" class="form-control mb-2" cols="100" rows="2" placeholder="Edit Komentar">{{ $reply->content }}</textarea>
                                                @auth
                                                    <div>
                                                        <button type="submit" class="btn-two w-100 btn"
                                                            style="background-color: #0F4D8A;padding:10px !important">Edit
                                                            Komentar</button>
                                                    </div>
                                                @else
                                                    <div>
                                                        <button type="button" class="btn-two w-100 btn not-login"
                                                            style="background-color: #0F4D8A;padding:10px !important">Edit
                                                            Komentar</button>
                                                    </div>
                                                @endauth
                                            </form>
                                        </div>
                                    @endforeach
                                </div>
                            @empty
                            @endforelse

                            @if ($comments->count() > 5)
                                <div class="text-center left-content mt-3">
                                    <a id="load-more" class="link-one" style="color: var(--secondaryColor);">Lihat
                                        Selengkapnya
                                        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25"
                                            viewBox="0 0 24 24">
                                            <path fill="#E93314" d="M7.41 8.59L12 13.17l4.59-4.58L18 10l-6 6l-6-6z" />
                                        </svg>

                                    </a>
                                    {{-- <button id="load-more" class="btn btn-primary">Lihat Selengkapnya</button> --}}
                                </div>
                            @endif
                        </div>
                        <div id="cmt-form">
                            <div class="mb-30">
                                <h3 class="comment-box-title">Tinggalkan Komentar</h3>
                            </div>
                            <form action="{{ route('comment.create', ['news' => $news->id]) }}" class="comment-form"
                                method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <textarea name="content" id="messages" cols="30" rows="10" placeholder="Isi komentar disini"></textarea>
                                        </div>
                                    </div>
                                    @auth
                                        <div class="d-flex justify-content-end mt-3">
                                            <button type="submit" class="btn-two"
                                                style="background-color: #0F4D8A">Komentar</button>
                                        </div>
                                    @else
                                        <div class="d-flex justify-content-end mt-3">
                                            <button type="button" class="btn-two not-login"
                                                style="background-color: #0F4D8A">Komentar</button>
                                        </div>
                                    @endauth
                                </div>
                            </form>
                        </div>

                        <div class="mt-5">
                            <div class="comment-box-title">
                                <h1><b>Berita Relevan</b></h1>
                            </div>
                            @forelse ($newsCategories as $news)
                                @php
                                    $dateParts = date_parse($news->upload_date);
                                @endphp
                                <div class="news-card-five">
                                    <div class="news-card-img">
                                        <img src="{{ asset('storage/' . $news->photo) }}" alt="{{ $news->photo }}"
                                            width="100%" height="130" style="object-fit: cover" />
                                        <a data-toggle="tooltip" data-placement="top"
                                            title="{{ $news->newsCategories[0]->category->name }}"
                                            href="{{ route('categories.show.user', ['category' => $news->newsCategories[0]->category->slug]) }}"
                                            class="news-cat">{{ $news->newsCategories[0]->category->name }}</a>
                                    </div>
                                    <div class="news-card-info">
                                        <h3><a data-toggle="tooltip" data-placement="top" title="{{ $news->name }}"
                                                href="{{ route('news.user', ['news' => $news->slug, 'year' => $dateParts['year'], 'month' => $dateParts['month'], 'day' => $dateParts['day']]) }}">{!! Illuminate\Support\Str::limit($news->name, $limit = 50, $end = '...') !!}</a>
                                        </h3>
                                        <p>{!! Illuminate\Support\Str::limit(strip_tags($news->content), 150, '...') !!}</p>
                                        <ul class="news-metainfo list-style">
                                            <li><i class="fi fi-rr-calendar-minus"></i><a
                                                    href="javascript:void(0)">{{ \Carbon\Carbon::parse($news->upload_date)->translatedFormat('d F Y') }}</a>
                                            </li>
                                            <li><i class="fi fi-rr-eye"></i>{{ $news->views_count }}</li>
                                        </ul>
                                    </div>
                                </div>
                            @empty
                            @endforelse
                        </div>
                    </article>
                </div>

                <div class="col-lg-4">
                    <div class="sidebar">
                        <x-news-category :categories="$totalCategories" />
                        <x-news-populer :populars="$populars" />

                        <div class="sidebar-widget" style="height: 700px">
                            <h3 class="sidebar-widget-title">iklan</h3>
                        </div>
                        <x-tag :tags="$tagPopulars" />
                        <div class="sidebar-widget">
                            <h3 class="sidebar-widget-title">Berita Terbaru</h3>
                            <div class="pp-post-wrap">
                                @forelse ($news_recents as $recent)
                                    @php
                                        $dateParts = date_parse($recent->upload_date);
                                    @endphp
                                    <div class="news-card-one">
                                        <div class="news-card-img">
                                            <img src="{{ asset('storage/' . $recent->photo) }}" style="object-fit: cover"
                                                alt="Image" width="100%" height="80">
                                        </div>
                                        <div class="news-card-info">
                                            <h3><a data-toggle="tooltip" data-placement="top"
                                                    title="{{ $recent->name }}"
                                                    href="{{ route('news.user', ['news' => $recent->slug, 'year' => $dateParts['year'], 'month' => $dateParts['month'], 'day' => $dateParts['day']]) }}">{!! Illuminate\Support\Str::limit(strip_tags($recent->name), 40, '...') !!}</a>
                                            </h3>
                                            <ul class="news-metainfo list-style">
                                                <li><i class="fi fi-rr-calendar-minus"></i>
                                                    <a
                                                        href="javascript:void(0)">{{ \Carbon\Carbon::parse($recent->upload_date)->translatedFormat('d F Y') }}</a>
                                                </li>

                                                <svg xmlns="http://www.w3.org/2000/svg" width="21" height="21"
                                                    viewBox="0 0 24 24">
                                                    <path fill="#e93314"
                                                        d="M12 6.5a9.77 9.77 0 0 1 8.82 5.5c-1.65 3.37-5.02 5.5-8.82 5.5S4.83 15.37 3.18 12A9.77 9.77 0 0 1 12 6.5m0-2C7 4.5 2.73 7.61 1 12c1.73 4.39 6 7.5 11 7.5s9.27-3.11 11-7.5c-1.73-4.39-6-7.5-11-7.5m0 5a2.5 2.5 0 0 1 0 5a2.5 2.5 0 0 1 0-5m0-2c-2.48 0-4.5 2.02-4.5 4.5s2.02 4.5 4.5 4.5s4.5-2.02 4.5-4.5s-2.02-4.5-4.5-4.5" />
                                                </svg>
                                                </i>{{ $recent->views->count() }}</li>

                                                </li>
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

    {{-- <div class="coin-container" style="position: fixed; left: 20px; bottom: 20px; display: flex; align-items: center;">
        <img src="{{asset('assets/img/coin-load.svg')}}" alt="Coin" style="width: 50px; height: 50px;">
        <div class="loading-bar" style="width: 100px; height: 10px; background-color: #ddd; margin-left: 10px; position: relative;">
            <div class="loading-progress" style="height: 100%; background-color: #4CAF50; width: 0%;"></div>
        </div>
    </div> --}}

    @auth
        <div class="coin-container" style="position: fixed; left: 20px; bottom: 20px;">
            <div class="coin-loader">
                <img src="{{ asset('assets/img/coin-load.svg') }}" alt="Coin" style="width: 50px; height: 50px;">
                <div class="coin-circle"></div>
            </div>
        </div>
    @endauth

@endsection

@section('script')

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            @if (session('success'))
                Swal.fire({
                    title: 'Success!',
                    text: '{{ session('success') }}',
                    icon: 'success',
                    confirmButtonText: 'OK'
                });
            @endif

            @if (session('draft'))
                Swal.fire({
                    title: 'Success Draft!',
                    text: '{{ session('draft') }}',
                    icon: 'warning',
                    confirmButtonText: 'OK'
                });
            @endif
        });
    </script>

    {{-- <script>
        setInterval(() => {
            fetch('/coin-add', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
            })
            .then(function(response) {
                if (response.ok) {
                    return response.json();
                } else {
                    throw new Error('Error: ' + response.status);
                }
            })
            .then(function(data) {})
            .catch(function(error) {
                console.error(error);
            });
        }, 60000);
    </script> --}}

    <script>
        function toggleReplyForm(commentId) {
            var replyForm = document.getElementById("reply-form-" + commentId);
            if (replyForm.style.display === "none") {
                replyForm.style.display = "block";
            } else {
                replyForm.style.display = "none";
            }
        }
    </script>

    @auth
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                setInterval(() => {
                    fetch('/coin-add', {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                            },
                        })
                        .then(function(response) {
                            if (response.ok) {
                                return response.json();
                            } else {
                                throw new Error('Error: ' + response.status);
                            }
                        })
                        .then(function(data) {})
                        .catch(function(error) {
                            console.error(error);
                        });
                }, 60000);
            });
        </script>
    @else
        <script>
            console.error('Anda tidak login');
        </script>
    @endauth

    <script>
        document.addEventListener('DOMContentLoaded', function() {

            var formLike = document.getElementById('form-like');
            var formLiked = document.getElementById('form-liked');
            var likeCount = document.getElementById('like');
            var likedByUser = {{ $likedByUser ? 'true' : 'false' }};
            var likeData = parseInt(likeCount.getAttribute('data-like'));

            if (likedByUser) {
                formLike.style.display = 'none';
                formLiked.style.display = 'inline-block';
            } else {
                formLike.style.display = 'inline-block';
                formLiked.style.display = 'none';
            }

            formLike.addEventListener('submit', function(event) {
                event.preventDefault();
                formLike.style.display = 'none';
                formLiked.style.display = 'inline-block';
                likeData++;
                likeCount.innerHTML = likeData;
                likeCount.setAttribute('data-like', likeData);
            });

            formLiked.addEventListener('submit', function(event) {
                event.preventDefault();
                formLike.style.display = 'inline-block';
                formLiked.style.display = 'none';
                likeData--;
                likeCount.innerHTML = likeData;
                likeCount.setAttribute('data-like', likeData);
            });
        });

        const notLoginElements = document.querySelectorAll('.not-login');

        notLoginElements.forEach(function(element) {
            element.addEventListener('click', function() {
                Swal.fire({
                    title: 'Error!!',
                    icon: 'error',
                    text: 'Anda Belum Login Silahkan Login Terlebih Dahulu'
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = '{{ route('login') }}';
                    }
                });
            });
        });

        document.getElementById('form-like').addEventListener('submit', function(event) {
            event.preventDefault();
            var form = event.target;
            var csrfToken = form.querySelector('input[name="_token"]').value;

            fetch('/news-like/{{ $newsId }}', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': csrfToken
                    },
                })
                .then(function(response) {
                    if (response.ok) {
                        return response.json();
                    } else {
                        throw new Error('Error: ' + response.status);
                    }
                })
                .then(function(data) {})
                .catch(function(error) {
                    console.error(error);
                });
        });

        document.getElementById('form-liked').addEventListener('submit', function(event) {
            event.preventDefault();
            var form = event.target;
            var csrfToken = form.querySelector('input[name="_token"]').value;

            fetch('/news-unlike/{{ $newsId }}', {
                    method: 'DELETE',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': csrfToken
                    },
                })
                .then(function(response) {
                    if (response.ok) {
                        return response.json();
                    } else {
                        throw new Error('Error: ' + response.status);
                    }
                })
                .then(function(data) {})
                .catch(function(error) {
                    console.error(error);
                });

        });


        function copyToClipboard() {
            var element = document.getElementById('wa');
            var dataSlug = element.dataset.slug;

            var copyText =
                `https://media.mijurnal.com/{{ $dateParts['year'] }}/{{ $dateParts['month'] }}/{{ $dateParts['day'] }}/${dataSlug}`;

            navigator.clipboard.writeText(copyText)
                .then(() => {
                    Swal.fire({
                        icon: 'success',
                        title: 'Link disalin!',
                        text: 'Link telah disalin ke clipboard',
                        allowOutsideClick: false
                    });
                })
                .catch((error) => {
                    console.error('Gagal menyalin teks:', error);
                });
        }



        document.addEventListener('DOMContentLoaded', function() {
            document.getElementById('wa').addEventListener('click', function() {
                shareOnWhatsapp('your_news_id_here');
            });

            document.getElementById('fb').addEventListener('click', function() {
                shareOnFacebook('your_news_id_here');
            });

            document.getElementById('tele').addEventListener('click', function() {
                shareOnTelegram('your_news_id_here');
            });

            document.getElementById('tw').addEventListener('click', function() {
                shareOnTwitter('your_news_id_here');
            });
        });

        function shareOnWhatsapp(newsId) {
            var element = document.getElementById('wa');
            var dataSlug = element.dataset.slug;
            var dataName = element.dataset.name;

            var url =
                `https://media.mijurnal.com/{{ $dateParts['year'] }}/{{ $dateParts['month'] }}/{{ $dateParts['day'] }}/${dataSlug}`;
            var text = `${dataName}, Baca Selengkapnya di: ${url}`

            var whatsappLink = 'https://api.whatsapp.com/send?text=' + encodeURIComponent(text);

            window.open(whatsappLink, '_blank');
        }

        function shareOnFacebook(newsId) {
            var element = document.getElementById('wa');
            var dataSlug = element.dataset.slug;
            var dataName = element.dataset.name;

            var url =
                `https://media.mijurnal.com/{{ $dateParts['year'] }}/{{ $dateParts['month'] }}/{{ $dateParts['day'] }}/${dataSlug}`;
            var facebookLink = 'https://www.facebook.com/sharer/sharer.php?u=' + encodeURIComponent(url);
            window.open(facebookLink, '_blank');
        }

        function shareOnTwitter(newsId) {
            var element = document.getElementById('wa');
            var dataSlug = element.dataset.slug;
            var dataName = element.dataset.name;

            var url =
                `https://media.mijurnal.com/{{ $dateParts['year'] }}/{{ $dateParts['month'] }}/{{ $dateParts['day'] }}/${dataSlug}`;
            var text = `${dataName},Baca Selengkapnya di: ${url}`

            var twitterLink = 'https://twitter.com/intent/tweet?url=' + encodeURIComponent(text);
            window.open(twitterLink, '_blank');
        }


        function shareOnTelegram(newsId) {
            var element = document.getElementById('wa');
            var dataSlug = element.dataset.slug;
            var dataName = element.dataset.name;

            var url =
                `https://media.mijurnal.com/{{ $dateParts['year'] }}/{{ $dateParts['month'] }}/{{ $dateParts['day'] }}/${dataSlug}`;
            var text = `${dataName}, Baca Selengkapnya di: ${url}`

            var telegramLink = 'https://t.me/share/url?url=' + encodeURIComponent(text);
            window.open(telegramLink, '_blank');
        }
    </script>

    <script>
        function showReplyForm(commentId) {
            var replyForm = document.getElementById('reply-form-' + commentId);
            if (replyForm) {
                if (replyForm.style.display === 'block') {
                    replyForm.style.display = 'none';
                } else {
                    replyForm.style.display = 'block';
                }
            }
        }
    </script>

    <script>
        function showEditForm(commentId) {
            var replyForm = document.getElementById('edit-form-' + commentId);
            if (replyForm) {
                if (replyForm.style.display === 'block') {
                    replyForm.style.display = 'none';
                } else {
                    replyForm.style.display = 'block';
                }
            }
        }
    </script>

    <script>
        function showEditReplyForm(replyId) {
            var replyForm = document.getElementById('edit-reply-form-' + replyId);
            if (replyForm) {
                if (replyForm.style.display === 'block') {
                    replyForm.style.display = 'none';
                } else {
                    replyForm.style.display = 'block';
                }
            }
        }
    </script>

    <script>
        var uploadDate = new Date("{{ $news->upload_date }}");
        var days = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];
        var months = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober',
            'November', 'Desember'
        ];
        var formattedDate = days[uploadDate.getDay()] + ', ' + uploadDate.getDate() + ' ' + months[uploadDate.getMonth()] +
            ' ' + uploadDate.getFullYear();
        document.getElementById("formattedDate").textContent = formattedDate;
    </script>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

    <script>
        $(document).ready(function() {
            $('.report-icon').on('click', function() {
                var commentId = $(this).data('id');
                $('#commentId').val(commentId);
                $('#reportModal').modal('show');
            });

            $('#reportForm').on('submit', function(e) {
                e.preventDefault();
                var commentId = $('#commentId').val();
                var actionUrl = '/comment-report/' + commentId;
                $(this).attr('action', actionUrl);
                this.submit();
            });
        });
    </script>

    <script>
        $(document).ready(function() {
            $('.delete').on('click', function() {
                var commentId = $(this).data('id');
                $('#commentId').val(commentId);
                $('#deleteModal').modal('show');
            });

            $('#deleteForm').on('submit', function(e) {
                e.preventDefault();
                var commentId = $('#commentId').val();
                var actionUrl = '/comment-delete/' + commentId;
                $(this).attr('action', actionUrl);
                this.submit();
            });
        });
    </script>

    <script>
        $(document).ready(function() {
            $('.pin').click(function() {
                var commentId = $(this).data('id');
                var form = $('<form>', {
                    'action': '/comment-pin/' + commentId,
                    'method': 'POST'
                });

                form.appendTo('body').submit();
            });
        });
    </script>

    <script>
        $(document).ready(function() {
            $('.unpin').click(function() {
                var commentId = $(this).data('id');
                var form = $('<form>', {
                    'action': '/comment-unpin/' + commentId,
                    'method': 'POST'
                });

                form.appendTo('body').submit();
            });
        });

        document.addEventListener('DOMContentLoaded', function() {
            let comments = document.querySelectorAll('.comment-item');
            let loadMoreButton = document.getElementById('load-more');
            let visibleComments = 5;

            loadMoreButton.addEventListener('click', function() {
                for (let i = visibleComments; i < visibleComments + 10 && i < comments.length; i++) {
                    comments[i].style.display = 'block';
                }
                visibleComments += 10;
                if (visibleComments >= comments.length) {
                    loadMoreButton.style.display = 'none';
                }
            });
        });
    </script>

@endsection

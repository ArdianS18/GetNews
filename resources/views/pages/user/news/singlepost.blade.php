@extends('layouts.user.app')

<head>
    <title>{{ $news->name }} | GetMedia</title>
    <meta name="description" content=" {!! implode(' ', array_slice(explode(' ', strip_tags($news->content)), 0, 30)) !!}">
    <meta property="og:description" content="{!! implode(' ', array_slice(explode(' ', strip_tags($news->content)), 0, 30)) !!}">
    <meta property="og:title" content="{{ $news->name }} | GetMedia">
    <meta property="og:image" content="{{ asset('storage/' . $news->photo) }}">
    @php
        $dateParts = date_parse($news->upload_date);
    @endphp
    <meta property="og:url"
        content="{{ config('app.url') }}/berita/{{ $dateParts['year'] }}/{{ $dateParts['month'] }}/{{ $dateParts['day'] }}/{{ $news->slug }}">
    <meta property="og:type" content="article">
    <meta property="og:site_name" content="GetMedia">
    <link rel="image_src" href="{{ asset('storage/' . $news->photo) }}">
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

                        <div class="d-flex justify-content-between">
                            <ul class="news-metainfo list-style">
                                <li class="author">
                                    <span class="author-img">
                                        <img src="{{ asset($news->user->photo ? 'storage/' . $news->user->photo : 'default.png') }}"
                                            alt="Image" width="40px" height="30px"
                                            style="border-radius: 50%; object-fit:cover;" />
                                    </span>
                                    <div>
                                        <a style="display: inline;text-decoration:none" data-toggle="tooltip"
                                            data-placement="top" title="author - {{ $news->user->name }}"
                                            href="{{ route('author.detail', ['id' => $news->user->id]) }}">{{ $news->user->name }}</a>
                                            {{ $news->newsCategories[0]->category->name }}
                                        </span>
                                    </div>
                                </li>
                                <li><i class="fi fi-rr-calendar-minus"></i>
                                    {{-- <a href="javascript:void(0)"> --}}
                                        {{-- {{ \Carbon\Carbon::parse($news->upload_date)->format('l, d F Y') }} --}}
                                        <span id="formattedDate"></span>
                                    {{-- </a> --}}
                                </li>
                                <li>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24">
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
                                                <button type="submit" style="background: transparent;border:transparent"
                                                    class="like">
                                                    <svg class="last" xmlns="http://www.w3.org/2000/svg" width="21"
                                                        height="21" viewBox="0 0 24 24">
                                                        <path fill="#E93314"
                                                            d="M18 21H7V8l7-7l1.25 1.25q.175.175.288.475t.112.575v.35L14.55 8H21q.8 0 1.4.6T23 10v2q0 .175-.05.375t-.1.375l-3 7.05q-.225.5-.75.85T18 21m-9-2h9l3-7v-2h-9l1.35-5.5L9 8.85zM9 8.85V19zM7 8v2H4v9h3v2H2V8z" />
                                                    </svg>
                                                </button>
                                            @endif

                                        </form>

                                        <form id="form-liked" style="display: none;">
                                            @csrf
                                            <button type="submit" style="background: transparent;border:transparent"
                                                class="liked">
                                                <svg class="last" xmlns="http://www.w3.org/2000/svg" width="21"
                                                    height="21" viewBox="0 0 24 24">
                                                    <path fill="red"
                                                        d="M18 21H8V8l7-7l1.25 1.25q.175.175.288.475t.112.575v.35L15.55 8H21q.8 0 1.4.6T23 10v2q0 .175-.037.375t-.113.375l-3 7.05q-.225.5-.75.85T18 21M6 8v13H2V8z" />
                                                </svg>
                                            </button>
                                        </form>
                                    @else
                                        <form id="form-like">
                                            @csrf
                                            <button type="button" style="background: transparent;border:transparent"
                                                class="like not-login">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="21" height="21"
                                                    viewBox="0 0 24 24">
                                                    <path fill="#E93314"
                                                        d="M18 21H7V8l7-7l1.25 1.25q.175.175.288.475t.112.575v.35L14.55 8H21q.8 0 1.4.6T23 10v2q0 .175-.05.375t-.1.375l-3 7.05q-.225.5-.75.85T18 21m-9-2h9l3-7v-2h-9l1.35-5.5L9 8.85zM9 8.85V19zM7 8v2H4v9h3v2H2V8z" />
                                                </svg>
                                            </button>
                                        </form>

                                        <form id="form-liked" style="display: none;">
                                            @csrf
                                            <button type="submit" style="background: transparent;border:transparent"
                                                class="liked">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="21" height="21"
                                                    viewBox="0 0 24 24">
                                                    <path fill="red"
                                                        d="M18 21H8V8l7-7l1.25 1.25q.175.175.288.475t.112.575v.35L15.55 8H21q.8 0 1.4.6T23 10v2q0 .175-.037.375t-.113.375l-3 7.05q-.225.5-.75.85T18 21M6 8v13H2V8z" />
                                                </svg>
                                            </button>
                                        </form>
                                    @endauth

                                    <span id="like" data-like="{{ $newsLike }}">{{ $newsLike }}</span>

                                </li>

                            </ul>

                            <div class="">
                                <a class="" href="#" role="button" id="dropdownMenuLink"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25"
                                        viewBox="0 0 24 24">
                                        <path fill="none" stroke="currentColor" stroke-linejoin="round"
                                            stroke-width="3" d="M12 12h.01v.01H12zm0-7h.01v.01H12zm0 14h.01v.01H12z" />
                                    </svg>
                                </a>

                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                    <li>
                                        <button class="btn btn-sm" data-bs-toggle="modal" data-bs-target="#share">
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
                            </div>
                        </div>

                        {{-- modal tambah --}}
                        <div class="modal fade" id="tambahdataLabel" tabindex="-1" aria-labelledby="tambahdataLabel"
                            aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="tambahdataLabel"><span
                                                style="color: #0F4D8A; font-size: 25px;" class="mb-2 me-1"></span>Laporkan
                                        </h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <form action="{{ route('report.store', ['news' => $news->id]) }}" method="post">
                                        @method('post')
                                        @csrf
                                        <div class="modal-body">
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
                                                    Video dan pengguna yang dilaporkan akan ditinjau oleh staf
                                                    YouTube 24/7 untuk menentukan apakah video dan pengguna
                                                    tersebut melanggar Pedoman Komunitas kami atau tidak. Akun
                                                    akan dikenai sanksi jika melanggar Pedoman Komunitas, dan
                                                    pelanggaran serius atau berulang dapat berakibat pada
                                                    penghentian akun.
                                                </p>
                                            </div>
                                        </div>
                                        <div class="">
                                            <div class="d-flex justify-content-end me-2">
                                                <button type="button" class="me-2 btn btn-secondary"
                                                    data-bs-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary">Simpan</button>
                                            </div>
                                        </div>
                                    </form>
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
                                                            value="https://media.mijurnal.com/berita/{{ $news->slug }}"
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
                                                <Label class="form-label">Atau Bagikan Melalui :</Label>
                                                <div class="row">
                                                    <div class="col-md-6 col-12 mb-3">
                                                        <button class="btn shadow-sm gap-3" id="wa"
                                                            style="width:-webkit-fill-available !important"><svg
                                                                xmlns="http://www.w3.org/2000/svg" width="31.76"
                                                                height="32" viewBox="0 0 256 258">
                                                                <defs>
                                                                    <linearGradient id="logosWhatsappIcon0" x1="50%"
                                                                        x2="50%" y1="100%" y2="0%">
                                                                        <stop offset="0%" stop-color="#1FAF38" />
                                                                        <stop offset="100%" stop-color="#60D669" />
                                                                    </linearGradient>
                                                                    <linearGradient id="logosWhatsappIcon1" x1="50%"
                                                                        x2="50%" y1="100%" y2="0%">
                                                                        <stop offset="0%" stop-color="#F9F9F9" />
                                                                        <stop offset="100%" stop-color="#FFF" />
                                                                    </linearGradient>
                                                                </defs>
                                                                <path fill="url(#logosWhatsappIcon0)"
                                                                    d="M5.463 127.456c-.006 21.677 5.658 42.843 16.428 61.499L4.433 252.697l65.232-17.104a122.994 122.994 0 0 0 58.8 14.97h.054c67.815 0 123.018-55.183 123.047-123.01c.013-32.867-12.775-63.773-36.009-87.025c-23.23-23.25-54.125-36.061-87.043-36.076c-67.823 0-123.022 55.18-123.05 123.004" />
                                                                <path fill="url(#logosWhatsappIcon1)"
                                                                    d="M1.07 127.416c-.007 22.457 5.86 44.38 17.014 63.704L0 257.147l67.571-17.717c18.618 10.151 39.58 15.503 60.91 15.511h.055c70.248 0 127.434-57.168 127.464-127.423c.012-34.048-13.236-66.065-37.3-90.15C194.633 13.286 162.633.014 128.536 0C58.276 0 1.099 57.16 1.071 127.416m40.24 60.376l-2.523-4.005c-10.606-16.864-16.204-36.352-16.196-56.363C22.614 69.029 70.138 21.52 128.576 21.52c28.3.012 54.896 11.044 74.9 31.06c20.003 20.018 31.01 46.628 31.003 74.93c-.026 58.395-47.551 105.91-105.943 105.91h-.042c-19.013-.01-37.66-5.116-53.922-14.765l-3.87-2.295l-40.098 10.513z" />
                                                                <path fill="#FFF"
                                                                    d="M96.678 74.148c-2.386-5.303-4.897-5.41-7.166-5.503c-1.858-.08-3.982-.074-6.104-.074c-2.124 0-5.575.799-8.492 3.984c-2.92 3.188-11.148 10.892-11.148 26.561c0 15.67 11.413 30.813 13.004 32.94c1.593 2.123 22.033 35.307 54.405 48.073c26.904 10.609 32.379 8.499 38.218 7.967c5.84-.53 18.844-7.702 21.497-15.139c2.655-7.436 2.655-13.81 1.859-15.142c-.796-1.327-2.92-2.124-6.105-3.716c-3.186-1.593-18.844-9.298-21.763-10.361c-2.92-1.062-5.043-1.592-7.167 1.597c-2.124 3.184-8.223 10.356-10.082 12.48c-1.857 2.129-3.716 2.394-6.9.801c-3.187-1.598-13.444-4.957-25.613-15.806c-9.468-8.442-15.86-18.867-17.718-22.056c-1.858-3.184-.199-4.91 1.398-6.497c1.431-1.427 3.186-3.719 4.78-5.578c1.588-1.86 2.118-3.187 3.18-5.311c1.063-2.126.531-3.986-.264-5.579c-.798-1.593-6.987-17.343-9.819-23.64" />
                                                            </svg>Whatsapp</button>
                                                    </div>
                                                    <div class="col-md-6 col-12 mb-3">
                                                        <button class="btn shadow-sm gap-3" id="fb"
                                                            style="width:-webkit-fill-available !important"><svg
                                                                xmlns="http://www.w3.org/2000/svg" width="32"
                                                                height="32" viewBox="0 0 256 256">
                                                                <path fill="#1877F2"
                                                                    d="M256 128C256 57.308 198.692 0 128 0C57.308 0 0 57.308 0 128c0 63.888 46.808 116.843 108 126.445V165H75.5v-37H108V99.8c0-32.08 19.11-49.8 48.348-49.8C170.352 50 185 52.5 185 52.5V84h-16.14C152.959 84 148 93.867 148 103.99V128h35.5l-5.675 37H148v89.445c61.192-9.602 108-62.556 108-126.445" />
                                                                <path fill="#FFF"
                                                                    d="m177.825 165l5.675-37H148v-24.01C148 93.866 152.959 84 168.86 84H185V52.5S170.352 50 156.347 50C127.11 50 108 67.72 108 99.8V128H75.5v37H108v89.445A128.959 128.959 0 0 0 128 256a128.9 128.9 0 0 0 20-1.555V165z" />
                                                            </svg>Facebook</button>
                                                    </div>
                                                    <div class="col-md-6 col-12 mb-3">
                                                        <button class="btn shadow-sm gap-3" id="tele"
                                                            style="width:-webkit-fill-available !important"><svg
                                                                xmlns="http://www.w3.org/2000/svg" width="32"
                                                                height="32" viewBox="0 0 256 256">
                                                                <defs>
                                                                    <linearGradient id="logosTelegram0" x1="50%"
                                                                        x2="50%" y1="0%" y2="100%">
                                                                        <stop offset="0%" stop-color="#2AABEE" />
                                                                        <stop offset="100%" stop-color="#229ED9" />
                                                                    </linearGradient>
                                                                </defs>
                                                                <path fill="url(#logosTelegram0)"
                                                                    d="M128 0C94.06 0 61.48 13.494 37.5 37.49A128.038 128.038 0 0 0 0 128c0 33.934 13.5 66.514 37.5 90.51C61.48 242.506 94.06 256 128 256s66.52-13.494 90.5-37.49c24-23.996 37.5-56.576 37.5-90.51c0-33.934-13.5-66.514-37.5-90.51C194.52 13.494 161.94 0 128 0" />
                                                                <path fill="#FFF"
                                                                    d="M57.94 126.648c37.32-16.256 62.2-26.974 74.64-32.152c35.56-14.786 42.94-17.354 47.76-17.441c1.06-.017 3.42.245 4.96 1.49c1.28 1.05 1.64 2.47 1.82 3.467c.16.996.38 3.266.2 5.038c-1.92 20.24-10.26 69.356-14.5 92.026c-1.78 9.592-5.32 12.808-8.74 13.122c-7.44.684-13.08-4.912-20.28-9.63c-11.26-7.386-17.62-11.982-28.56-19.188c-12.64-8.328-4.44-12.906 2.76-20.386c1.88-1.958 34.64-31.748 35.26-34.45c.08-.338.16-1.598-.6-2.262c-.74-.666-1.84-.438-2.64-.258c-1.14.256-19.12 12.152-54 35.686c-5.1 3.508-9.72 5.218-13.88 5.128c-4.56-.098-13.36-2.584-19.9-4.708c-8-2.606-14.38-3.984-13.82-8.41c.28-2.304 3.46-4.662 9.52-7.072" />
                                                            </svg>Telegram</button>
                                                    </div>
                                                    <div class="col-md-6 col-12 mb-3">
                                                        <button id="tw" class="btn shadow-sm gap-3"
                                                            style="width:-webkit-fill-available !important"><svg
                                                                xmlns="http://www.w3.org/2000/svg" width="32"
                                                                height="32" viewBox="0 0 24 24">
                                                                <path fill="#000000"
                                                                    d="M18.205 2.25h3.308l-7.227 8.26l8.502 11.24H16.13l-5.214-6.817L4.95 21.75H1.64l7.73-8.835L1.215 2.25H8.04l4.713 6.231zm-1.161 17.52h1.833L7.045 4.126H5.078z" />
                                                            </svg>Twitter</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        {{-- @foreach ($pages as $index => $page) --}}
                        <div class="news-para">
                            {{-- <p>{!! $pages !!}</p> --}}
                            <p>{!! $news->content !!}</p>
                        </div>
                        Tag :
                        @forelse ($tags as $tag)
                            <a data-toggle="tooltip" data-placement="top" title="{{ $tag->tag->name }}"
                                href="{{ route('tag.show.user', ['tag' => $tag->tag->slug]) }}"
                                class="btn btn-rounded btn-outline-primary">{{ $tag->tag->name }}</a>
                        @empty
                        @endforelse
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
                            @forelse ($comments as $comment)
                                @if ($comment->parent_id == null)
                                    <div class="comment-item w-100">
                                        <div class="comment-author-img">
                                            <img src="{{ asset($comment->user->photo ? 'storage/' . $comment->user->photo : 'default.png') }}"
                                                alt="Image" class="img-fluid" width="90"
                                                style="object-fit:cover;" />
                                        </div>
                                        <div class="comment-author-wrap">
                                            <div class="comment-author-info">
                                                <div class="row align-items-start">
                                                    <div class="col-md-9 col-sm-3 col-3 order-md-1 order-sm-1 order-1">
                                                        <div class="comment-author-name">
                                                            <h5>{{ $comment->user->name }}</h5>
                                                            <div class="d-flex">
                                                                <span
                                                                    class="comment-date">{{ \Carbon\Carbon::parse($comment->created_at)->format('M d,Y | g:i A') }}</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div
                                                        class="col-md-3 col-sm-3 col-3 text-md-end order-md-2 order-sm-3 order-3">
                                                        <div class="">
                                                            <i><svg xmlns="http://www.w3.org/2000/svg" width="19"
                                                                    height="19" viewBox="0 0 24 24">
                                                                    <path fill="none" stroke="currentColor"
                                                                        stroke-linecap="round" stroke-linejoin="round"
                                                                        stroke-width="2"
                                                                        d="M5 14v7M5 4.971v9.541c5.6-5.538 8.4 2.64 14-.086v-9.54C13.4 7.61 10.6-.568 5 4.97Z" />
                                                                </svg></i>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12 col-sm-12 col-12 order-md-3 order-sm-2 order-2">
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
                                    <div id="reply-form-{{ $comment->id }}" class="reply-form mt-3"
                                        style="display: none;">
                                        <form
                                            action="{{ route('reply.comment.create', ['news' => $news->id, 'id' => $comment->id]) }}"
                                            method="post">
                                            @csrf
                                            <textarea name="content" class="form-control mb-2" cols="100" rows="2" placeholder="Balas Komentar"></textarea>
                                            <div>
                                                <button type="submit" class="btn-two w-100 btn"
                                                    style="background-color: #0F4D8A;padding:10px !important">Kirim
                                                    Balasan</button>
                                            </div>
                                        </form>
                                    </div>
                                @endif
                                @foreach ($groupedReplies[$comment->id] ?? [] as $reply)
                                    <div class="comment-item w-100 ms-5">
                                        <div class="comment-author-img">
                                            <img src="{{ asset($reply->user->photo ? 'storage/' . $reply->user->photo : 'default.png') }}"
                                                alt="Image" class="img-fluid" width="90"
                                                style="object-fit:cover;" />
                                        </div>
                                        <div class="comment-author-wrap">
                                            <div class="comment-author-info">
                                                <div class="row align-items-start">
                                                    <div class="col-md-9 col-sm-3 col-3 order-md-1 order-sm-1 order-1">
                                                        <div class="comment-author-name">
                                                            <h5>{{ $reply->user->name }}</h5>
                                                            <div class="d-flex">
                                                                <span
                                                                    class="comment-date">{{ \Carbon\Carbon::parse($reply->created_at)->format('M d,Y | g:i A') }}</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div
                                                        class="col-md-3 col-sm-3 col-3 text-md-end order-md-2 order-sm-3 order-3">
                                                        <div class="">
                                                            <i><svg xmlns="http://www.w3.org/2000/svg" width="19"
                                                                    height="19" viewBox="0 0 24 24">
                                                                    <path fill="none" stroke="currentColor"
                                                                        stroke-linecap="round" stroke-linejoin="round"
                                                                        stroke-width="2"
                                                                        d="M5 14v7M5 4.971v9.541c5.6-5.538 8.4 2.64 14-.086v-9.54C13.4 7.61 10.6-.568 5 4.97Z" />
                                                                </svg></i>
                                                        </div>
                                                        {{-- <div class="mt-3">
                                                            <i><svg class="last" xmlns="http://www.w3.org/2000/svg"
                                                                    width="19" height="19" viewBox="0 0 24 24">
                                                                    <path fill="#E93314"
                                                                        d="M18 21H7V8l7-7l1.25 1.25q.175.175.288.475t.112.575v.35L14.55 8H21q.8 0 1.4.6T23 10v2q0 .175-.05.375t-.1.375l-3 7.05q-.225.5-.75.85T18 21m-9-2h9l3-7v-2h-9l1.35-5.5L9 8.85zM9 8.85V19zM7 8v2H4v9h3v2H2V8z" />
                                                                </svg>
                                                            </i>
                                                        </div> --}}
                                                    </div>
                                                    <div class="col-md-12 col-sm-12 col-12 order-md-3 order-sm-2 order-2">
                                                        <div class="comment-text">
                                                            <p>{{ $reply->content }}</p>
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
                                            <div>
                                                <button type="submit" class="btn-two w-100 btn btn-sm"
                                                    style="background-color: #0F4D8A">Kirim Balasan</button>
                                            </div>
                                        </form>
                                    </div>
                                @endforeach

                            @empty
                            @endforelse
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
                                                    href="javascript:void(0)">{{ \Carbon\Carbon::parse($news->upload_date)->format('M d Y') }}</a>
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
                                @forelse ($populars as $popular)
                                    @php
                                        $dateParts = date_parse($popular->upload_date);
                                    @endphp
                                    <div class="news-card-one">
                                        <div class="news-card-img">
                                            <img src="{{ asset('storage/' . $popular->photo) }}"
                                                style="object-fit: cover" alt="Image" width="100%" height="80">
                                        </div>
                                        <div class="news-card-info">
                                            <h3><a data-toggle="tooltip" data-placement="top"
                                                    title="{{ $popular->name }}"
                                                    href="{{ route('news.user', ['news' => $popular->slug, 'year' => $dateParts['year'], 'month' => $dateParts['month'], 'day' => $dateParts['day']]) }}">{!! Illuminate\Support\Str::limit(strip_tags($popular->name), 40, '...') !!}</a>
                                            </h3>
                                            <ul class="news-metainfo list-style">
                                                <li><i class="fi fi-rr-calendar-minus"></i>
                                                    <a
                                                        href="javascript:void(0)">{{ \Carbon\Carbon::parse($popular->upload_date)->translatedFormat('d F Y') }}</a>
                                                </li>

                                                <li>
                                                    <i><svg xmlns="http://www.w3.org/2000/svg" width="21"
                                                            height="21" viewBox="0 0 24 24">
                                                            <path fill="#e93314"
                                                                d="M12 6.5a9.77 9.77 0 0 1 8.82 5.5c-1.65 3.37-5.02 5.5-8.82 5.5S4.83 15.37 3.18 12A9.77 9.77 0 0 1 12 6.5m0-2C7 4.5 2.73 7.61 1 12c1.73 4.39 6 7.5 11 7.5s9.27-3.11 11-7.5c-1.73-4.39-6-7.5-11-7.5m0 5a2.5 2.5 0 0 1 0 5a2.5 2.5 0 0 1 0-5m0-2c-2.48 0-4.5 2.02-4.5 4.5s2.02 4.5 4.5 4.5s4.5-2.02 4.5-4.5s-2.02-4.5-4.5-4.5" />
                                                        </svg>
                                                    </i>
                                                    <a href="javascript:void(0)">{{ $popular->views->count() }}</a>

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
                        <div class="sidebar-widget">
                            <h3 class="sidebar-widget-title">Popular Tags</h3>
                            <ul class="tag-list list-style">
                                @forelse ($tagPopulars as $tag)
                                    <li><a data-toggle="tooltip" data-placement="top" title="{{ $tag->name }}"
                                            href="{{ route('tag.show.user', ['tag' => $tag->slug]) }}">{{ $tag->name }}</a>
                                    </li>
                                @empty
                                @endforelse
                            </ul>
                        </div>
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
@endsection

@section('script')
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

            fetch('/news-like/{{ $news->id }}', {
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

            fetch('/news-unlike/{{ $news->id }}', {
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
            var copyText = document.querySelector("#copy-link");
            copyText.select();
            copyText.setSelectionRange(0, 99999);
            document.execCommand("copy");
            Swal.fire({
                icon: 'success',
                title: 'Link disalin!',
                text: 'Link telah disalin ke clipboard',
                allowOutsideClick: false
            })
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
            var url = 'https://media.mijurnal.com/berita/{{ $news->slug }}';
            var text = "Baca Selengkapnya di: " + url

            var whatsappLink = 'https://api.whatsapp.com/send?text=' + encodeURIComponent(text);

            window.open(whatsappLink, '_blank');
        }

        function shareOnFacebook(newsId) {
            var url = 'https://media.mijurnal.com/berita/{{ $news->slug }}';
            var text = "Baca Selengkapnya di: " + url

            var facebookLink = 'https://www.facebook.com/sharer/sharer.php?u=' + encodeURIComponent(text);
            window.open(facebookLink, '_blank');
        }

        function shareOnTwitter(newsId) {
            var url = 'https://media.mijurnal.com/berita/{{ $news->slug }}';
            var text = "Baca Selengkapnya di: " + url

            var twitterLink = 'https://twitter.com/intent/tweet?url=' + encodeURIComponent(text);
            window.open(twitterLink, '_blank');
        }


        function shareOnTelegram(newsId) {
            var url = 'https://media.mijurnal.com/berita/{{ $news->slug }}';
            var text = "Baca Selengkapnya di: " + url

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
        var uploadDate = new Date("{{ $news->upload_date }}");
        var days = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];
        var months = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
        var formattedDate = days[uploadDate.getDay()] + ', ' + uploadDate.getDate() + ' ' + months[uploadDate.getMonth()] + ' ' + uploadDate.getFullYear();
        document.getElementById("formattedDate").textContent = formattedDate;
    </script>
@endsection

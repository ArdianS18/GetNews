@extends('layouts.user.app')

<head>
    <title>{{ $news->name }} | GetMedia</title>
    <meta name="description" content=" {!! implode(' ', array_slice(explode(' ', strip_tags($news->content)), 0, 30)) !!}">
    <meta property="og:description" content="{!! implode(' ', array_slice(explode(' ', strip_tags($news->content)), 0, 30)) !!}">
    <meta property="og:title" content="{{ $news->name }} | GetMedia">
    <meta property="og:image" content="{{ asset('storage/' . $news->photo) }}">
    <meta property="og:url" content="{{ config('app.url') }}/berita/{{ $news->slug }}">
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
    </style>
@endsection
@section('content')
    <div class="news-details-wrap">
        <div class="container">
            <div class="row gx-55 gx-5">
                <div class="col-lg-8">
                    <article>
                        <h2 class="d-flex justify-content-start mb-2">{{ $news->name }}</h2>
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
                                        - <span style="color: red">
                                            {{ $news->newsCategories[0]->category->name }}
                                        </span>
                                    </div>
                                </li>
                                <li>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25"
                                        viewBox="0 0 512 512">
                                        <path
                                            d="M368.005 272h-96v96h96v-96zm-32-208v32h-160V64h-48v32h-24.01c-22.002 0-40 17.998-40 40v272c0 22.002 17.998 40 40 40h304.01c22.002 0 40-17.998 40-40V136c0-22.002-17.998-40-40-40h-24V64h-48zm72 344h-304.01V196h304.01v212z"
                                            fill="#E93314" />
                                        <a href=""></a>
                                    </svg>
                                    <a
                                        href="javascript:void(0)">{{ \Carbon\Carbon::parse($news->upload_date)->format('M d Y') }}</a>
                                </li>
                                <li> <svg xmlns="http://www.w3.org/2000/svg" width="27" height="27"
                                        viewBox="0 0 24 24">
                                        <path fill="#E93314"
                                            d="M12 4.5C7 4.5 2.73 7.61 1 12c1.73 4.39 6 7.5 11 7.5s9.27-3.11 11-7.5c-1.73-4.39-6-7.5-11-7.5zM12 17c-2.76 0-5-2.24-5-5s2.24-5 5-5s5 2.24 5 5s-2.24 5-5 5zm0-8c-1.66 0-3 1.34-3 3s1.34 3 3 3s3-1.34 3-3s-1.34-3-3-3z" />
                                    </svg><span class="ms-2">{{ $news->views->count() }}</span>
                                </li>
                                <li>
                                    @auth()
                                        <form id="form-like">
                                            @csrf
                                            @if (auth()->check())
                                                <button type="submit" style="background: transparent;border:transparent"
                                                    class="like">
                                                    <svg class="last" xmlns="http://www.w3.org/2000/svg" width="27"
                                                        height="27" viewBox="0 0 24 24">
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
                                                <svg class="last" xmlns="http://www.w3.org/2000/svg" width="27"
                                                    height="27" viewBox="0 0 24 24">
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
                                                <svg xmlns="http://www.w3.org/2000/svg" width="27" height="27"
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
                                                <svg xmlns="http://www.w3.org/2000/svg" width="27" height="27"
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

                                            <div class="container">
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
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary">Simpan</button>
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
                                                <label for="message" class="form-label">Url</label>
                                                <input type="text" name="share" id="input-link">
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
                                                        <button class="btn shadow-sm gap-3" id="ig"
                                                            style="width:-webkit-fill-available !important"><svg
                                                                xmlns="http://www.w3.org/2000/svg" width="32"
                                                                height="32" viewBox="0 0 256 256">
                                                                <g fill="none">
                                                                    <rect width="256" height="256"
                                                                        fill="url(#skillIconsInstagram0)"
                                                                        rx="60" />
                                                                    <rect width="256" height="256"
                                                                        fill="url(#skillIconsInstagram1)"
                                                                        rx="60" />
                                                                    <path fill="#fff"
                                                                        d="M128.009 28c-27.158 0-30.567.119-41.233.604c-10.646.488-17.913 2.173-24.271 4.646c-6.578 2.554-12.157 5.971-17.715 11.531c-5.563 5.559-8.98 11.138-11.542 17.713c-2.48 6.36-4.167 13.63-4.646 24.271c-.477 10.667-.602 14.077-.602 41.236s.12 30.557.604 41.223c.49 10.646 2.175 17.913 4.646 24.271c2.556 6.578 5.973 12.157 11.533 17.715c5.557 5.563 11.136 8.988 17.709 11.542c6.363 2.473 13.631 4.158 24.275 4.646c10.667.485 14.073.604 41.23.604c27.161 0 30.559-.119 41.225-.604c10.646-.488 17.921-2.173 24.284-4.646c6.575-2.554 12.146-5.979 17.702-11.542c5.563-5.558 8.979-11.137 11.542-17.712c2.458-6.361 4.146-13.63 4.646-24.272c.479-10.666.604-14.066.604-41.225s-.125-30.567-.604-41.234c-.5-10.646-2.188-17.912-4.646-24.27c-2.563-6.578-5.979-12.157-11.542-17.716c-5.562-5.562-11.125-8.979-17.708-11.53c-6.375-2.474-13.646-4.16-24.292-4.647c-10.667-.485-14.063-.604-41.23-.604zm-8.971 18.021c2.663-.004 5.634 0 8.971 0c26.701 0 29.865.096 40.409.575c9.75.446 15.042 2.075 18.567 3.444c4.667 1.812 7.994 3.979 11.492 7.48c3.5 3.5 5.666 6.833 7.483 11.5c1.369 3.52 3 8.812 3.444 18.562c.479 10.542.583 13.708.583 40.396c0 26.688-.104 29.855-.583 40.396c-.446 9.75-2.075 15.042-3.444 18.563c-1.812 4.667-3.983 7.99-7.483 11.488c-3.5 3.5-6.823 5.666-11.492 7.479c-3.521 1.375-8.817 3-18.567 3.446c-10.542.479-13.708.583-40.409.583c-26.702 0-29.867-.104-40.408-.583c-9.75-.45-15.042-2.079-18.57-3.448c-4.666-1.813-8-3.979-11.5-7.479s-5.666-6.825-7.483-11.494c-1.369-3.521-3-8.813-3.444-18.563c-.479-10.542-.575-13.708-.575-40.413c0-26.704.096-29.854.575-40.396c.446-9.75 2.075-15.042 3.444-18.567c1.813-4.667 3.983-8 7.484-11.5c3.5-3.5 6.833-5.667 11.5-7.483c3.525-1.375 8.819-3 18.569-3.448c9.225-.417 12.8-.542 31.437-.563zm62.351 16.604c-6.625 0-12 5.37-12 11.996c0 6.625 5.375 12 12 12s12-5.375 12-12s-5.375-12-12-12zm-53.38 14.021c-28.36 0-51.354 22.994-51.354 51.355c0 28.361 22.994 51.344 51.354 51.344c28.361 0 51.347-22.983 51.347-51.344c0-28.36-22.988-51.355-51.349-51.355zm0 18.021c18.409 0 33.334 14.923 33.334 33.334c0 18.409-14.925 33.334-33.334 33.334c-18.41 0-33.333-14.925-33.333-33.334c0-18.411 14.923-33.334 33.333-33.334" />
                                                                    <defs>
                                                                        <radialGradient id="skillIconsInstagram0"
                                                                            cx="0" cy="0" r="1"
                                                                            gradientTransform="matrix(0 -253.715 235.975 0 68 275.717)"
                                                                            gradientUnits="userSpaceOnUse">
                                                                            <stop stop-color="#FD5" />
                                                                            <stop offset=".1" stop-color="#FD5" />
                                                                            <stop offset=".5" stop-color="#FF543E" />
                                                                            <stop offset="1" stop-color="#C837AB" />
                                                                        </radialGradient>
                                                                        <radialGradient id="skillIconsInstagram1"
                                                                            cx="0" cy="0" r="1"
                                                                            gradientTransform="matrix(22.25952 111.2061 -458.39518 91.75449 -42.881 18.441)"
                                                                            gradientUnits="userSpaceOnUse">
                                                                            <stop stop-color="#3771C8" />
                                                                            <stop offset=".128" stop-color="#3771C8" />
                                                                            <stop offset="1" stop-color="#60F"
                                                                                stop-opacity="0" />
                                                                        </radialGradient>
                                                                    </defs>
                                                                </g>
                                                            </svg>Instagram</button>
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
                                                        <button class="btn shadow-sm gap-3" id="dc"
                                                            style="width:-webkit-fill-available !important"><svg
                                                                xmlns="http://www.w3.org/2000/svg" width="32"
                                                                height="32" viewBox="0 0 256 256">
                                                                <g fill="none">
                                                                    <rect width="256" height="256" fill="#5865F2"
                                                                        rx="60" />
                                                                    <g clip-path="url(#skillIconsDiscord0)">
                                                                        <path fill="#fff"
                                                                            d="M197.308 64.797a164.918 164.918 0 0 0-40.709-12.627a.618.618 0 0 0-.654.31c-1.758 3.126-3.706 7.206-5.069 10.412c-15.373-2.302-30.666-2.302-45.723 0c-1.364-3.278-3.382-7.286-5.148-10.412a.643.643 0 0 0-.655-.31a164.472 164.472 0 0 0-40.709 12.627a.583.583 0 0 0-.268.23c-25.928 38.736-33.03 76.52-29.546 113.836a.685.685 0 0 0 .26.468c17.106 12.563 33.677 20.19 49.94 25.245a.648.648 0 0 0 .702-.23c3.847-5.254 7.276-10.793 10.217-16.618a.633.633 0 0 0-.347-.881c-5.44-2.064-10.619-4.579-15.601-7.436a.642.642 0 0 1-.063-1.064a86.364 86.364 0 0 0 3.098-2.428a.618.618 0 0 1 .646-.088c32.732 14.944 68.167 14.944 100.512 0a.617.617 0 0 1 .655.08a79.613 79.613 0 0 0 3.106 2.436a.642.642 0 0 1-.055 1.064a102.622 102.622 0 0 1-15.609 7.428a.638.638 0 0 0-.339.889a133.075 133.075 0 0 0 10.208 16.61a.636.636 0 0 0 .702.238c16.342-5.055 32.913-12.682 50.02-25.245a.646.646 0 0 0 .26-.46c4.17-43.141-6.985-80.616-29.571-113.836a.506.506 0 0 0-.26-.238M94.834 156.142c-9.855 0-17.975-9.047-17.975-20.158s7.963-20.158 17.975-20.158c10.09 0 18.131 9.127 17.973 20.158c0 11.111-7.962 20.158-17.973 20.158m66.456 0c-9.855 0-17.974-9.047-17.974-20.158s7.962-20.158 17.974-20.158c10.09 0 18.131 9.127 17.974 20.158c0 11.111-7.884 20.158-17.974 20.158" />
                                                                    </g>
                                                                    <defs>
                                                                        <clipPath id="skillIconsDiscord0">
                                                                            <path fill="#fff"
                                                                                d="M28 51h200v154.93H28z" />
                                                                        </clipPath>
                                                                    </defs>
                                                                </g>
                                                            </svg>Discord</button>
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
                        <h3 class="comment-box-title mt-6">{{ $comments->count() }} Komentar</h3>
                        @forelse ($comments as $comment)
                            @if ($comment->parent_id == null)
                                <div class="comment-item-wrap">
                                @else
                                    <div class="comment-item-wrap ms-5">
                            @endif
                            <div class="comment-item">
                                <div class="comment-author-img">
                                    <img src="{{ asset($comment->user->photo ? 'storage/' . $comment->user->photo : 'default.png') }}"
                                        alt="Image" width="80px" height="80px"
                                        style="border-radius: 50%; object-fit:cover;" />
                                </div>

                                <div class="comment-author-wrap">
                                    <div class="comment-author-info">
                                        <div class="row align-items-start">
                                            <div class="col-md-9 col-sm-3 col-3 order-md-1 order-sm-1 order-1">
                                                <div class="comment-author-name">
                                                    <h5>{{ $comment->user->name }}</h5>
                                                    <span
                                                        class="comment-date">{{ \Carbon\Carbon::parse($comment->created_at)->format('M d, Y | g:i A') }}</span>
                                                </div>
                                            </div>
                                            <div class="col-md-3 col-sm-3 col-3 text-md-end order-md-2 order-sm-3 order-3">
                                                @if ($comment->parent_id == null)
                                                    <a href="javascript:void(0)" class="reply-btn"
                                                        onclick="showReplyForm({{ $comment->id }})">Reply</a>
                                                @endif
                                            </div>
                                            <div class="col-md-12 col-sm-12 col-12 order-md-3 order-sm-2 order-2">
                                                <div class="comment-text">
                                                    <p>{{ $comment->content }}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div id="reply-form-{{ $comment->id }}" class="reply-form" style="display: none;">
                                    <form
                                        action="{{ route('reply.comment.create', ['news' => $news->id, 'id' => $comment->id]) }}"
                                        method="post">
                                        @csrf
                                        <textarea name="content" placeholder="Type your reply here"></textarea>
                                        <input type="submit" value="Submit Reply">
                                    </form>
                                </div>
                            </div>
                </div>
            @empty
                @endforelse

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
                    @forelse ($newsCategories as $newsCategory)
                        <div class="news-card-five">
                            <div class="news-card-img">
                                <img src="{{ asset('storage/' . $newsCategory->news->photo) }}"
                                    alt="{{ $newsCategory->news->photo }}" width="100%" height="130"
                                    style="object-fit: cover" />
                                <a data-toggle="tooltip" data-placement="top"
                                    title="{{ $newsCategory->category->name }}"
                                    href="{{ route('categories.show.user', ['category' => $newsCategory->news->newsCategories[0]->category->slug]) }}"
                                    class="news-cat">{{ $newsCategory->category->name }}</a>
                            </div>
                            <div class="news-card-info">
                                <h3><a data-toggle="tooltip" data-placement="top"
                                        title="{{ $newsCategory->news->name }}"
                                        href="{{ route('news.user', ['news' => $newsCategory->news->slug]) }}">{!! Illuminate\Support\Str::limit($newsCategory->news->name, $limit = 50, $end = '...') !!}</a>
                                </h3>
                                <p>{!! Illuminate\Support\Str::limit(strip_tags($newsCategory->news->content), 150, '...') !!}</p>
                                <ul class="news-metainfo list-style">
                                    <li><i class="fi fi-rr-calendar-minus"></i><a
                                            href="javascript:void(0)">{{ \Carbon\Carbon::parse($news->upload_date)->format('M d Y') }}</a>
                                    </li>
                                    <li><i class="fi fi-rr-clock-three"></i>11 Min Read</li>
                                </ul>
                            </div>
                        </div>
                    @empty
                    @endforelse
                </div>



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
                                <div class="news-card-one">
                                    <div class="news-card-img">
                                        <img src="{{ asset('storage/' . $popular->photo) }}" style="object-fit: cover"
                                            alt="Image" width="100%" height="80">
                                    </div>
                                    <div class="news-card-info">
                                        <h3><a data-toggle="tooltip" data-placement="top" title="{{ $popular->name }}"
                                                href="{{ route('news.user', ['news' => $popular->slug]) }}">{!! Illuminate\Support\Str::limit(strip_tags($popular->name), 40, '...') !!}</a>
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

                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                                viewBox="0 0 24 24">
                                                <path fill="#e93314"
                                                    d="M12 4.5C7 4.5 2.73 7.61 1 12c1.73 4.39 6 7.5 11 7.5s9.27-3.11 11-7.5c-1.73-4.39-6-7.5-11-7.5zM12 17c-2.76 0-5-2.24-5-5s2.24-5 5-5s5 2.24 5 5s-2.24 5-5 5zm0-8c-1.66 0-3 1.34-3 3s1.34 3 3 3s3-1.34 3-3s-1.34-3-3-3z" />
                                            </svg>
                                            </i><span class="text-muted">{{ $popular->views->count() }}</span></li>

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
                            @forelse ($tags as $tag)
                                <li><a data-toggle="tooltip" data-placement="top" title="{{ $tag->tag->name }}"
                                        href="{{ route('tag.show.user', ['tag' => $tag->tag->slug]) }}">{{ $tag->tag->name }}</a>
                                </li>
                            @empty
                            @endforelse
                        </ul>
                    </div>
                    <div class="sidebar-widget">
                        <h3 class="sidebar-widget-title">Berita Terbaru</h3>
                        <div class="pp-post-wrap">
                            @forelse ($news_recents as $recent)
                                <div class="news-card-one">
                                    <div class="news-card-img">
                                        <img src="{{ asset('storage/' . $recent->photo) }}" style="object-fit: cover"
                                            alt="Image" width="100%" height="80">
                                    </div>
                                    <div class="news-card-info">
                                        <h3><a data-toggle="tooltip" data-placement="top" title="{{ $recent->name }}"
                                                href="{{ route('news.user', ['news' => $recent->slug, 'page' => 1]) }}">{!! Illuminate\Support\Str::limit(strip_tags($recent->name), 40, '...') !!}</a>
                                        </h3>
                                        <ul class="news-metainfo list-style">
                                            <li>

                                                <i><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                                        viewBox="0 0 512 512">
                                                        <path
                                                            d="M368.005 272h-96v96h96v-96zm-32-208v32h-160V64h-48v32h-24.01c-22.002 0-40 17.998-40 40v272c0 22.002 17.998 40 40 40h304.01c22.002 0 40-17.998 40-40V136c0-22.002-17.998-40-40-40h-24V64h-48zm72 344h-304.01V196h304.01v212z"
                                                            fill="#E93314" />
                                                    </svg></i><a
                                                    href="javascript:void(0)">{{ \Carbon\Carbon::parse($recent->upload_date)->translatedFormat('d F Y') }}</a>
                                            </li>

                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                                viewBox="0 0 24 24">
                                                <path fill="#e93314"
                                                    d="M12 4.5C7 4.5 2.73 7.61 1 12c1.73 4.39 6 7.5 11 7.5s9.27-3.11 11-7.5c-1.73-4.39-6-7.5-11-7.5zM12 17c-2.76 0-5-2.24-5-5s2.24-5 5-5s5 2.24 5 5s-2.24 5-5 5zm0-8c-1.66 0-3 1.34-3 3s1.34 3 3 3s3-1.34 3-3s-1.34-3-3-3z" />
                                            </svg>
                                            </i><span class="text-muted">{{ $recent->views->count() }}</span></li>

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

        document.addEventListener('DOMContentLoaded', function() {
            document.getElementById('wa').addEventListener('click', function() {
                shareOnWhatsapp('your_news_id_here');
            });

            document.getElementById('fb').addEventListener('click', function() {
                shareOnFacebook('your_news_id_here');
            });

            document.getElementById('ig').addEventListener('click', function() {
                shareOnInstagram('your_news_id_here');
            });

            document.getElementById('tele').addEventListener('click', function() {
                shareOnTelegram('your_news_id_here');
            });

            document.getElementById('dc').addEventListener('click', function() {
                shareOnDiscord('your_news_id_here');
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
            var facebookLink = 'https://www.facebook.com/sharer/sharer.php?u=' + encodeURIComponent(url);
            window.open(facebookLink, '_blank');
        }

        function shareOnTwitter(newsId) {
            var url = 'https://media.mijurnal.com/berita/{{ $news->slug }}';
            var twitterLink = 'https://twitter.com/intent/tweet?url=/' + encodeURIComponent(url);
            window.open(twitterLink, '_blank');
        }

        function shareOnDiscord(newsId) {
            var url = 'https://media.mijurnal.com/berita/{{ $news->slug }}';
            var discordLink =
                'https://discord.com/api/oauth2/authorize?client_id=YOUR_CLIENT_ID&scope=bot&permissions=2048&redirect_uri=' +
                encodeURIComponent(url);
            window.open(discordLink, '_blank');
        }

        function shareOnTelegram(newsId) {
            var url = 'https://media.mijurnal.com/berita/{{ $news->slug }}';
            var telegramLink = 'https://t.me/share/url?url=' + encodeURIComponent(url);
            window.open(telegramLink, '_blank');
        }

        function shareOnInstagram(newsId) {
            var url = 'https://media.mijurnal.com/berita/{{ $news->slug }}';
            var instagramLink = 'https://www.instagram.com/?url=' + encodeURIComponent(url);
            window.open(instagramLink, '_blank');
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
@endsection

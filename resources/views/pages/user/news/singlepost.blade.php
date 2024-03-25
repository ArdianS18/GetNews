@extends('layouts.user.app')
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
    </style>
@endsection
@section('content')
    <div class="news-details-wrap">
        <div class="container">

            <div class="row gx-55 gx-5">
                <div class="col-lg-8">
                    <article>
                        <div class="slideshow-container mb-3">
                            <div class="slideshow news-img">
                                <img src="{{ asset('assets/img/test.svg') }}" alt="{{ $news->photo }}" style="width: 100%;" width="290px" height="170px" class="img-status">
                                <img id="main-image" src="{{ asset('assets/img/news/single-news-1.webp') }}" alt="Image">
                                <a href="business.html" class="news-cat">Business</a>
                            </div>

                            <div class="thumbnail-container d-flex justify-content-center">
                                <div class="thumbnails">
                                    <div class="thumbnail">
                                        <img src="{{ asset('assets/img/news/single-news-1.webp') }}" alt="Image"
                                            onclick="changeImage(this)">
                                    </div>
                                    <div class="thumbnail">
                                        <img src="{{ asset('assets/img/news/single-news-2.webp') }}" alt="Image"
                                            onclick="changeImage(this)">
                                    </div>
                                    <div class="thumbnail">
                                        <img src="{{ asset('assets/img/news/single-news-3.webp') }}" alt="Image"
                                            onclick="changeImage(this)">
                                    </div>
                                    <!-- Tambahkan thumbnail lainnya di sini -->
                                </div>
                            </div>
                        </div>

                        <div class="d-flex justify-content-between">
                            <ul class="news-metainfo list-style">
                                <li class="author">
                                    <span class="author-img">
                                        <img src="{{ asset('default.png') }}" alt="Image">
                                    </span>
                                    <a href="author.html">{{ $news->name }}</a>
                                </li>
                                <li>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25"
                                        viewBox="0 0 512 512">
                                        <path
                                            d="M368.005 272h-96v96h96v-96zm-32-208v32h-160V64h-48v32h-24.01c-22.002 0-40 17.998-40 40v272c0 22.002 17.998 40 40 40h304.01c22.002 0 40-17.998 40-40V136c0-22.002-17.998-40-40-40h-24V64h-48zm72 344h-304.01V196h304.01v212z"
                                            fill="#0F4D8A" />
                                        <a href=""></a>
                                    </svg>
                                    <a href="news-by-date.html">Mar 03, 2023</a>
                                </li>
                                <li>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25"
                                        viewBox="0 0 512 512">
                                        <path fill-opacity=".9"
                                            d="M256 43C137.789 43 43 138.851 43 256s94.789 213 213 213 213-95.851 213-213S373.149 43 256 43zm0 383.4c-93.718 0-170.4-76.683-170.4-170.4S162.282 85.6 256 85.6 426.4 162.282 426.4 256 349.718 426.4 256 426.4z"
                                            fill="#0F4D8A" />
                                        <path fill-opacity=".9"
                                            d="M266.65 149.5H234.7v127.8l111.825 67.093 15.975-26.625-95.85-56.444z"
                                            fill="#0F4D8A" />
                                    </svg>
                                    15 Min Read
                                </li>
                            </ul>

                            <div class="">
                                <a class="" href="#" role="button" id="dropdownMenuLink"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25"
                                        viewBox="0 0 24 24">
                                        <path fill="none" stroke="currentColor" stroke-linejoin="round" stroke-width="3"
                                            d="M12 12h.01v.01H12zm0-7h.01v.01H12zm0 14h.01v.01H12z" />
                                    </svg>
                                </a>

                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                    <li>
                                        <button class="btn btn-sm" data-bs-toggle="modal" data-bs-target="#tambahdataLabel">
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
                                                style="color: #0F4D8A; font-size: 25px;" class="mb-2 me-1">|</span>Laporkan
                                        </h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <form action="{{ route('report.store') }}" method="post">
                                        @csrf
                                        <div class="modal-body">

                                            <div class="container">
                                                <div class="mb-3 form-group">
                                                    <label for="message" class="form-label">Masukan Detail
                                                        Laporan:</label>
                                                    <textarea name="message" id="message" class="form-control" rows="7"></textarea>
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


                        {{-- @foreach ($pages as $index => $page) --}}
                        <div class="news-para">
                            {{-- <p>{!! $pages !!}</p> --}}
                            <p>{!! $pages[$currentPage] !!}</p>
                            <ul class="page-nav list-style mt-20">
                                <li>Halaman : </li>
                                @for ($i = 0; $i < count($pages); $i++)
                                    <li><a class="{{ $i == $currentPage ? 'active' : '' }}"
                                            href="{{ route('news.user', ['news' => $news->slug, 'page' => $i + 1]) }}">{{ $i + 1 }}</a>
                                    </li>
                                @endfor
                                <li><a href="{{ route('news.user', ['news' => $news->slug, 'page' => 'all']) }}">Semua</a>
                                </li>
                            </ul>
                        </div>
                        {{-- @endforeach --}}
                        <div class="news-img">
                            <img src="{{ asset('assets/img/news/single-news-2.webp') }}" alt="Image">
                        </div>
                        <div class="news-para">
                            <br>
                            <h5>Mastering Digital Transformation: How to Stay Ahead in a Rapidly Changing Business Landscape
                            </h5>
                            <p>There are many variations of passages of Lorem Ipsum available, but the majority have
                                suffered alteration in some form, by injected humour, or randomised words which don't look
                                even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be
                                sure there isn't anything embarrassing hidden in the middle of text.</p>
                            <h5>Unordered & Ordered Lists</h5>
                            <p>There are many variations of passages of Lorem Ipsum available, but the majority have
                                suffered alteration in some form by injected humour, or randomised words which don't look
                                even slightly believable.</p>
                            <ul class="">
                                <li>It is a long established fact that a reader will be distracted by the readable content.
                                </li>
                                <li>Lorem Ipsum is simply dummy text of the printing and typesetting</li>
                                <li>It was popularised in the 1960s with the release of Letraset sheets\</li>
                                <li>Publishing software like Aldus PageMaker including versions of Lorem Ipsum.</li>
                                <li>
                                    All the Lorem Ipsum generators on the Internet tend to repeat predefined.
                                </li>
                            </ul>
                            <p>There are many variations of passages of Lorem Ipsum available, but the majority have
                                suffered alteration in some form, by injected humour, or randomised words which don't look
                                even slightly believable. If you are going to use a <strong>adipisicing</strong> of Lorem
                                Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text.
                            </p>
                        </div>

                        <h3 class="comment-box-title mt-4">3 Komentar</h3>
                        <div class="comment-item-wrap">
                            <div class="comment-item">
                                @forelse ($comments as $comment)
                                    <div class="comment-author-img">
                                        {{-- <img src="assets/img/author/author-thumb-1.webp" alt="Image"> --}}
                                    </div>

                                    <div class="comment-author-wrap">
                                        <div class="comment-author-info">
                                            <div class="row align-items-start">
                                                <div class="col-md-9 col-sm-12 col-12 order-md-1 order-sm-1 order-1">
                                                    <div class="comment-author-name">
                                                        <h5>{{ $comment->user->name }}</h5>
                                                        <span class="comment-date">Jul 22, 2023 | 7:10 PM</span>
                                                    </div>
                                                </div>
                                                <div
                                                    class="col-md-3 col-sm-12 col-12 text-md-end order-md-2 order-sm-3 order-3">
                                                    {{-- <a href="#cmt-form" class="reply-btn">Reply</a> --}}
                                                    <a href="javascript:void(0)" class="reply-btn"
                                                        onclick="showReplyForm({{ $comment->id }})">Reply</a>
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
                                @empty
                                @endforelse
                            </div>
                        </div>
                        <div class="post-pagination">
                            <a class="prev-post" href="business-details.html">
                                <span>Berita Lainya</span>
                                <h6>The Future Of Business: Predictions And Trends To Watch</h6>
                            </a>
                            <a class="next-post" href="business-details.html">
                                <span>NEXT</span>
                                <h6>From Start-up To Scale-up: Navigating Growth In Your Business</h6>
                            </a>
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
                                            <textarea name="content" id="messages" cols="30" rows="10" placeholder="Please Enter Your Comment Here"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-12 mt-3">
                                        <button type="submit" class="btn-two" style="background-color: #0F4D8A">Kirim
                                            Komentar</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                </div>
                <div class="col-lg-4">
                    <div class="sidebar">

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
    @endsection

    @section('script')
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
            const thumbnailContainer = document.querySelector('.thumbnail-container');
            const prevButton = document.querySelector('#prev-button');
            const nextButton = document.querySelector('#next-button');

            prevButton.addEventListener('click', scrollThumbnails.bind(null, 'left'));
            nextButton.addEventListener('click', scrollThumbnails.bind(null, 'right'));

            function scrollThumbnails(direction) {
                const scrollAmount = 300;
                const containerWidth = thumbnailContainer.offsetWidth;

                if (direction === 'left') {
                    thumbnailContainer.scrollLeft -= scrollAmount;
                } else if (direction === 'right') {
                    thumbnailContainer.scrollLeft += scrollAmount;
                }
            }


            function changeImage(thumbnail) {
                const mainImage = document.getElementById('main-image');
                mainImage.src = thumbnail.src;
            }
        </script>
    @endsection

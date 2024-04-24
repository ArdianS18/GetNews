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
                                <img id="main-image" src="{{ asset('storage/' . $news->photo) }}" alt="Image">
                                <a href="{{ route('categories.show.user', ['category' => $news->newsCategories[0]->category->slug]) }}"
                                    class="news-cat">{{ $news->newsCategories[0]->category->name }}</a>
                            </div>

                            <div class="thumbnail-container d-flex justify-content-center">
                                <div class="thumbnails">
                                    <div class="thumbnail">
                                        <img src="{{ asset('storage/' . $news->photo) }}" alt="Image"
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
                                </div>
                            </div>
                        </div>

                        <div class="d-flex justify-content-between">
                            <ul class="news-metainfo list-style">
                                <li class="author">
                                    <span class="author-img">
                                        <img src="{{ asset($news->author->user->photo ? 'storage/' . $news->author->user->photo : 'default.png') }}"
                                            alt="Image" width="40px" height="30px"
                                            style="border-radius: 50%; object-fit:cover;" />
                                    </span>
                                    <a href="author.html">{{ $news->author->user->name }}</a>
                                </li>
                                <li>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25"
                                        viewBox="0 0 512 512">
                                        <path
                                            d="M368.005 272h-96v96h96v-96zm-32-208v32h-160V64h-48v32h-24.01c-22.002 0-40 17.998-40 40v272c0 22.002 17.998 40 40 40h304.01c22.002 0 40-17.998 40-40V136c0-22.002-17.998-40-40-40h-24V64h-48zm72 344h-304.01V196h304.01v212z"
                                            fill="#0F4D8A" />
                                        <a href=""></a>
                                    </svg>
                                    <a
                                        href="news-by-date.html">{{ \Carbon\Carbon::parse($news->upload_date)->format('M d Y') }}</a>
                                </li>
                                <li>
                                    <a onclick="toggleLike()" class="like">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30"
                                            viewBox="0 0 24 24">
                                            <g fill="none" fill-rule="evenodd">
                                                <path
                                                    d="M24 0v24H0V0zM12.593 23.258l-.011.002l-.071.035l-.02.004l-.014-.004l-.071-.035c-.01-.004-.019-.001-.024.005l-.004.01l-.017.428l.005.02l.01.013l.104.074l.015.004l.012-.004l.104-.074l.012-.016l.004-.017l-.017-.427c-.002-.01-.009-.017-.017-.018m.265-.113l-.013.002l-.185.093l-.01.01l-.003.011l.018.43l.005.012l.008.007l.201.093c.012.004.023 0 .029-.008l.004-.014l-.034-.614c-.003-.012-.01-.02-.02-.022m-.715.002a.023.023 0 0 0-.027.006l-.006.014l-.034.614c0 .012.007.02.017.024l.015-.002l.201-.093l.01-.008l.004-.011l.017-.43l-.003-.012l-.01-.01z" />
                                                <path fill="#000000"
                                                    d="M9.821 3.212c.296-.69 1.06-1.316 2.024-1.13c1.474.283 3.039 1.401 3.149 3.214L15 5.5V8h2.405a4 4 0 0 1 3.966 4.522l-.03.194l-.91 5a4 4 0 0 1-3.736 3.28l-.199.004H6a3 3 0 0 1-2.995-2.824L3 18v-6a3 3 0 0 1 2.824-2.995L6 9h1.34zM7 11H6a1 1 0 0 0-1 1v6a1 1 0 0 0 1 1h1zm4.625-6.92l-2.544 5.937a1 1 0 0 0-.072.259L9 10.41V19h7.496a2 2 0 0 0 1.933-1.486l.035-.156l.91-5a2 2 0 0 0-1.82-2.353L17.405 10H15a2 2 0 0 1-1.995-1.85L13 8V5.5c0-.553-.434-1.116-1.205-1.37z" />
                                            </g>
                                        </svg>
                                    </a>
                                    <a onclick="toggleLike()" style="display: none" class="liked">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30"
                                            viewBox="0 0 24 24">
                                            <g fill="none" fill-rule="evenodd">
                                                <path
                                                    d="M24 0v24H0V0zM12.593 23.258l-.011.002l-.071.035l-.02.004l-.014-.004l-.071-.035c-.01-.004-.019-.001-.024.005l-.004.01l-.017.428l.005.02l.01.013l.104.074l.015.004l.012-.004l.104-.074l.012-.016l.004-.017l-.017-.427c-.002-.01-.009-.017-.017-.018m.265-.113l-.013.002l-.185.093l-.01.01l-.003.011l.018.43l.005.012l.008.007l.201.093c.012.004.023 0 .029-.008l.004-.014l-.034-.614c-.003-.012-.01-.02-.02-.022m-.715.002a.023.023 0 0 0-.027.006l-.006.014l-.034.614c0 .012.007.02.017.024l.015-.002l.201-.093l.01-.008l.004-.011l.017-.43l-.003-.012l-.01-.01z" />
                                                <path fill="red"
                                                    d="M9.821 3.212c.296-.69 1.06-1.316 2.024-1.13c1.474.283 3.039 1.401 3.149 3.214L15 5.5V8h2.405a4 4 0 0 1 3.966 4.522l-.03.194l-.91 5a4 4 0 0 1-3.736 3.28l-.199.004H6a3 3 0 0 1-2.995-2.824L3 18v-6a3 3 0 0 1 2.824-2.995L6 9h1.34zM7 11H6a1 1 0 0 0-1 1v6a1 1 0 0 0 1 1h1zm4.625-6.92l-2.544 5.937a1 1 0 0 0-.072.259L9 10.41V19h7.496a2 2 0 0 0 1.933-1.486l.035-.156l.91-5a2 2 0 0 0-1.82-2.353L17.405 10H15a2 2 0 0 1-1.995-1.85L13 8V5.5c0-.553-.434-1.116-1.205-1.37z" />
                                            </g>
                                        </svg>
                                    </a>
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
                                {{-- <li><a href="{{ route('news.user', ['news' => $news->slug, 'page' => $i]) }}">Semua</a> --}}
                                </li>
                            </ul>
                        </div>
                        {{-- @endforeach --}}
                        {{-- <div class="news-img">
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
                        </div> --}}

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
        function toggleLike() {
            var likeButton = document.querySelector('.like');
            var likedButton = document.querySelector('.liked');

            if (likeButton.style.display !== 'none') {
                likeButton.style.display = 'none';
                likedButton.style.display = 'inline-block';
                storeData()
            } else {
                likedButton.style.display = 'none';
                likeButton.style.display = 'inline-block';
            }
        }

        function storeData() {
            
        }
    </script>

    {{-- <script>
            $('.like-form').submit(function(e){
                    e.preventDefault();
                    var form = $(this);
                    var url = form.attr('action');
                    var likeButton = form.find('.like-Button');
                    $.ajax({
                        url: url,
                        method: 'GET',
                        dataType: 'json',
                        data: form.serialize(response) {
                            if (response.liked) {
                                likeButton.addClass('liked');
                                likeButton.find('i').removeClass('fa-heart').addClass('fa-heart text-danger');
                            } else {
                                likeButton.removeClass('liked');
                                likeButton.find('i').removeClass('fa-heart text-danger').addClass('fa-heart');
                            }
                        },
                        error: function(xhr, status, error) {
                            console.log(xhr.responseText);
                        }
                    });
                });
        </script> --}}

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

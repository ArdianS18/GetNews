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
        .breadcrumb-menu list-style:last-child{
            color: #E93314 !important
        }
        .breadcrumb-wrap{
            background-color: transparent !important;
            padding: 0px !important
        }
        .breadcrumb-menu{
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
                        <div class="breadcrumb-wrap mb-3" >
                            <ul class="breadcrumb-menu list-style">
                                <li><a href="/">
                                    Home</a></li>
                                <li><a
                                    href="{{ route('categories.show.user', ['category' => $news->newsCategories[0]->category->slug]) }}">{{ $news->newsCategories[0]->category->name }} </a>
                                </li>
                                <li> <a class="last"
                                    href="{{ route('subcategories.show.user', ['category' => $news->newsCategories[0]->category->slug, 'subCategory' => $news->newsSubCategories[0]->subCategory->slug]) }}">{{ $news->newsSubCategories[0]->subCategory->name }}</a></li>
                            </ul>
                        </div>

                        <div class="slideshow-container mb-3">
                            <div class="slideshow news-img">
                                <img id="main-image" src="{{ asset('storage/' . $news->photo) }}" width="100%"
                                    height="470" style="object-fit: cover" alt="Image">
                                <a href="{{ route('categories.show.user', ['category' => $news->newsCategories[0]->category->slug]) }}"
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
                                        <a style="display: inline;text-decoration:none"
                                            href="{{ route('author.detail', ['id' => $news->user->author->id]) }}">{{ $news->user->name }}</a> - <span style="color: red">
                                            {{ $news->newsCategories[0]->category->name }}</span>
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


                        {{-- @foreach ($pages as $index => $page) --}}
                        <div class="news-para">
                            {{-- <p>{!! $pages !!}</p> --}}
                            <p>{!! $news->content !!}</p>
                        </div>
                        Tag :
                        @forelse ($tags as $tag)
                            <a href="#" class="btn btn-rounded btn-outline-primary">{{ $tag->tag->name }}</a>
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
                                                <div
                                                    class="col-md-3 col-sm-3 col-3 text-md-end order-md-2 order-sm-3 order-3">
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
                                        <a href="{{ route('categories.show.user', ['category' => $newsCategory->news->newsCategories[0]->category->slug]) }}"
                                            class="news-cat">{{ $newsCategory->category->name }}</a>
                                    </div>
                                    <div class="news-card-info">
                                        <h3><a
                                                href="{{ route('news.user', ['news' => $newsCategory->news->slug, 'page' => '1']) }}">{!! Illuminate\Support\Str::limit($newsCategory->news->name, $limit = 50, $end = '...') !!}</a>
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
                                    <li><a href="{{ route('categories.show.user', ['category' => $category->slug]) }}"><img
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
                                            <img src="{{ asset('storage/' . $popular->photo) }}"
                                                style="object-fit: cover" alt="Image" width="100%" height="80">
                                        </div>
                                        <div class="news-card-info">
                                            <h3><a
                                                    href="{{ route('news.user', ['news' => $popular->slug, 'page' => 1]) }}">{!! Illuminate\Support\Str::limit(strip_tags($popular->name), 40, '...') !!}</a>
                                            </h3>
                                            <ul class="news-metainfo list-style">
                                                <li>

                                                    <i><svg xmlns="http://www.w3.org/2000/svg" width="20"
                                                            height="20" viewBox="0 0 512 512">
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
                                    <li><a href="#">{{ $tag->tag->name }}</a></li>
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
                                            <h3><a
                                                    href="{{ route('news.user', ['news' => $recent->slug, 'page' => 1]) }}">{!! Illuminate\Support\Str::limit(strip_tags($recent->name), 40, '...') !!}</a>
                                            </h3>
                                            <ul class="news-metainfo list-style">
                                                <li>

                                                    <i><svg xmlns="http://www.w3.org/2000/svg" width="20"
                                                            height="20" viewBox="0 0 512 512">
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

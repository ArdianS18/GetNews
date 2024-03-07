@extends('layouts.user.app')

@section('content')

<div class="news-details-wrap ptb-100">
    <div class="container">
        <div class="row gx-55 gx-5">
        <div class="col-lg-8">
        <article>
            <div class="news-img">
                <img src="{{ asset('assets/img/news/single-news-1.webp') }}" alt="Image">
            </div>
        <ul class="news-metainfo list-style">
            <li class="author">
                <span class="">
                    <img src="{{ asset('assets/img/author/author-thumb-1.webp') }}" width="35px" style="border-radius: 50%;"  alt="Image">
                </span>
                <p class="m-1">{{ $news->user->name }}</p>
            </li>
            <li>
                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 512 512"><path d="M368.005 272h-96v96h96v-96zm-32-208v32h-160V64h-48v32h-24.01c-22.002 0-40 17.998-40 40v272c0 22.002 17.998 40 40 40h304.01c22.002 0 40-17.998 40-40V136c0-22.002-17.998-40-40-40h-24V64h-48zm72 344h-304.01V196h304.01v212z" fill="#0F4D8A"/>
                    <a href=""></a></svg>
                <a href="news-by-date.html">Mar 03, 2023</a></li>
            <li>
                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 512 512"><path fill-opacity=".9" d="M256 43C137.789 43 43 138.851 43 256s94.789 213 213 213 213-95.851 213-213S373.149 43 256 43zm0 383.4c-93.718 0-170.4-76.683-170.4-170.4S162.282 85.6 256 85.6 426.4 162.282 426.4 256 349.718 426.4 256 426.4z" fill="#0F4D8A"/><path fill-opacity=".9" d="M266.65 149.5H234.7v127.8l111.825 67.093 15.975-26.625-95.85-56.444z" fill="#0F4D8A"/>
                </svg>
                15 Min Read</li>
            <li>
                <form action="{{ route('news.like.store', ['id']) }}" method="POST">
                    @csrf
                    <button type="submit" >Like</button>
                </form>
                <p>{{$newsLike}}</p>

                {{-- <form action="{{ route('news.like.store', ['id' => $news->id]) }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <button type="submit" name="status" value="1" class="btn btn-primary">Like</button>
                        <button type="submit" name="status" value="0" class="btn btn-danger">Unlike</button>
                    </div>
                </form> --}}
            </li>

        </ul>
        <div class="news-para">
            <h4>{{ $news->sinopsis }}</h4>
            <p>{!!$news->content!!}<strong>gravida</strong> but also the leap into electronic typesetting, remaining essentially unchange was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum <a href="index.html">Ipsum</a> and more recently with desktop publishing software like Aldus Page maker including versions of Lorem Ipsum.</p>
            <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text.</p>
        </div>
        <div class="news-img">
            <img src="{{asset('assets/img/news/single-news-2.webp')}}" alt="Image">
        </div>
        <div class="news-para">
            <h5>Mastering Digital Transformation: How to Stay Ahead in a Rapidly Changing Business Landscape</h5>
            <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text.</p>
            <h5>Unordered & Ordered Lists</h5>
            <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form by injected humour, or randomised words which don't look even slightly believable.</p>
            <ul class="">
                <li>It is a long established fact that a reader will be distracted by the readable content.</li>
                <li>Lorem Ipsum is simply dummy text of the printing and typesetting</li>
                <li>It was popularised in the 1960s with the release of Letraset sheets\</li>
                <li>Publishing software like Aldus PageMaker including versions of Lorem Ipsum.</li>
                <li>
                All the Lorem Ipsum generators on the Internet tend to repeat predefined.
                </li>
            </ul>
            <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a <strong>adipisicing</strong> of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text.</p>
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
                            <div class="col-md-3 col-sm-12 col-12 text-md-end order-md-2 order-sm-3 order-3">
                            {{-- <a href="#cmt-form" class="reply-btn">Reply</a> --}}
                            <a href="javascript:void(0)" class="reply-btn" onclick="showReplyForm({{ $comment->id }})">Reply</a>
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
                    <form action="{{ route('reply.comment.create', ['news' => $news->id, 'id' => $comment->id]) }}" method="post">
                        @csrf
                        <textarea name="content" placeholder="Type your reply here"></textarea>
                        <input type="submit" value="Submit Reply">
                    </form>
                </div>
                @empty
                @endforelse
            </div>
        </div>
        <div id="cmt-form">

        <div class="mb-30">
        <h3 class="comment-box-title">Tinggalkan Komentar</h3>
        </div>
        <form action="{{ route('comment.create', ['news' => $news->id]) }}" class="comment-form" method="POST">
            @csrf
        <div class="row">
            <div class="col-lg-12">
                <div class="form-group">
                <textarea name="content" id="messages" cols="30" rows="10" placeholder="Please Enter Your Comment Here"></textarea>
                </div>
            </div>
            <div class="col-md-12 mt-3">
                <button type="submit" class="btn-two" style="background-color: #0F4D8A">Kirim Komentar</button>
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
                    <li><a href="business.html"><img src="{{ asset('assets/img/icons/arrow-right.svg') }}" alt="Image">Celebration <span>(6)</span></a></li>
                    <li><a href="business.html"><img src="{{ asset('assets/img/icons/arrow-right.svg') }}" alt="Image">Culture<span>(3)</span></a></li>
                    <li><a href="business.html"><img src="{{ asset('assets/img/icons/arrow-right.svg') }}" alt="Image">Fashion<span>(2)</span></a></li>
                    <li><a href="business.html"><img src="{{ asset('assets/img/icons/arrow-right.svg') }}" alt="Image">Inspiration<span>(8)</span></a></li>
                    <li><a href="business.html"><img src="{{ asset('assets/img/icons/arrow-right.svg') }}" alt="Image">Lifestyle<span>(6)</span></a></li>
                    <li><a href="business.html"><img src="{{ asset('assets/img/icons/arrow-right.svg') }}" alt="Image">Politics<span>(2)</span></a></li>
                    <li><a href="business.html"><img src="{{ asset('assets/img/icons/arrow-right.svg') }}" alt="Image">Trending<span>(4)</span></a></li>
                </ul>
            </div>


        <div class="sidebar-widget">
        <h3 class="sidebar-widget-title">Berita Popular</h3>
            <div class="pp-post-wrap">
                    <div class="news-card-one">
                        <div class="news-card-img">
                            <img src="{{asset('assets/img/news/news-thumb-4.webp')}}" alt="Image">
                        </div>
                        <div class="news-card-info">
                        <h3><a href="business-details.html">Bernie Nonummy Pelopai Iatis Eum Litora</a></h3>
                        <ul class="news-metainfo list-style">
                        <li>

                            <i><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 512 512"><path d="M368.005 272h-96v96h96v-96zm-32-208v32h-160V64h-48v32h-24.01c-22.002 0-40 17.998-40 40v272c0 22.002 17.998 40 40 40h304.01c22.002 0 40-17.998 40-40V136c0-22.002-17.998-40-40-40h-24V64h-48zm72 344h-304.01V196h304.01v212z" fill="#0F4D8A"/>
                            </svg></i><a href="news-by-date.html">Mar 03, 2023</a></li>

                            <i><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 512 512"><path d="M198 448h172c15.7 0 28.6-9.6 34.2-23.4l57.1-135.4c1.7-4.4 2.6-9 2.6-14v-38.6c0-21.1-17-44.6-37.8-44.6H306.9l18-81.5.6-6c0-7.9-3.2-15.1-8.3-20.3L297 64 171 191.3c-6.8 6.9-11 16.5-11 27.1v192c0 21.1 17.2 37.6 38 37.6z" fill="#0F4D8A"/><path d="M48 224h64v224H48z" fill="#0F4D8A"/></svg>
                            </i><a href="news-by-date.html">1.203</a></li>

                        </li>
                        </ul>
                        </div>
                    </div>
                <div class="news-card-one">
                    <div class="news-card-img">
                        <img src="{{asset('assets/img/news/news-thumb-5.webp')}}" alt="Image">
                    </div>
                    <div class="news-card-info">
                        <h3><a href="business-details.html">How Youth Viral Diseases May The Year 2023</a></h3>
                        <ul class="news-metainfo list-style">
                        <li>
                            <i><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 512 512"><path d="M368.005 272h-96v96h96v-96zm-32-208v32h-160V64h-48v32h-24.01c-22.002 0-40 17.998-40 40v272c0 22.002 17.998 40 40 40h304.01c22.002 0 40-17.998 40-40V136c0-22.002-17.998-40-40-40h-24V64h-48zm72 344h-304.01V196h304.01v212z" fill="#0F4D8A"/>
                            </svg></i><a href="news-by-date.html">Mar 03, 2023</a></li>

                            <i><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 512 512"><path d="M198 448h172c15.7 0 28.6-9.6 34.2-23.4l57.1-135.4c1.7-4.4 2.6-9 2.6-14v-38.6c0-21.1-17-44.6-37.8-44.6H306.9l18-81.5.6-6c0-7.9-3.2-15.1-8.3-20.3L297 64 171 191.3c-6.8 6.9-11 16.5-11 27.1v192c0 21.1 17.2 37.6 38 37.6z" fill="#0F4D8A"/><path d="M48 224h64v224H48z" fill="#0F4D8A"/></svg>
                            </i><a href="news-by-date.html">1.203</a></li>

                        </li>
                        </ul>
                    </div>
                </div>
                <div class="news-card-one">
                    <div class="news-card-img">
                        <img src="{{asset('assets/img/news/news-thumb-6.webp')}}" alt="Image">
                    </div>
                    <div class="news-card-info">
                    <h3><a href="business-details.html">Man Wearing Black Pullover Hoodie To Smoke</a></h3>
                        <ul class="news-metainfo list-style">
                        <li>
                            <i><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 512 512"><path d="M368.005 272h-96v96h96v-96zm-32-208v32h-160V64h-48v32h-24.01c-22.002 0-40 17.998-40 40v272c0 22.002 17.998 40 40 40h304.01c22.002 0 40-17.998 40-40V136c0-22.002-17.998-40-40-40h-24V64h-48zm72 344h-304.01V196h304.01v212z" fill="#0F4D8A"/>
                            </svg></i><a href="news-by-date.html">Mar 03, 2023</a></li>

                            <i><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 512 512"><path d="M198 448h172c15.7 0 28.6-9.6 34.2-23.4l57.1-135.4c1.7-4.4 2.6-9 2.6-14v-38.6c0-21.1-17-44.6-37.8-44.6H306.9l18-81.5.6-6c0-7.9-3.2-15.1-8.3-20.3L297 64 171 191.3c-6.8 6.9-11 16.5-11 27.1v192c0 21.1 17.2 37.6 38 37.6z" fill="#0F4D8A"/><path d="M48 224h64v224H48z" fill="#0F4D8A"/></svg>
                            </i><a href="news-by-date.html">1.203</a></li>
                        </li>
                        </ul>
                    </div>
                </div>
                <div class="news-card-one">
                    <div class="news-card-img">
                        <img src="{{asset('assets/img/news/news-thumb-6.webp')}}" alt="Image">
                    </div>
                    <div class="news-card-info">
                    <h3><a href="business-details.html">Man Wearing Black Pullover Hoodie To Smoke</a></h3>
                        <ul class="news-metainfo list-style">
                        <li>
                            <i><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 512 512"><path d="M368.005 272h-96v96h96v-96zm-32-208v32h-160V64h-48v32h-24.01c-22.002 0-40 17.998-40 40v272c0 22.002 17.998 40 40 40h304.01c22.002 0 40-17.998 40-40V136c0-22.002-17.998-40-40-40h-24V64h-48zm72 344h-304.01V196h304.01v212z" fill="#0F4D8A"/>
                            </svg></i><a href="news-by-date.html">Mar 03, 2023</a></li>

                            <i><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 512 512"><path d="M198 448h172c15.7 0 28.6-9.6 34.2-23.4l57.1-135.4c1.7-4.4 2.6-9 2.6-14v-38.6c0-21.1-17-44.6-37.8-44.6H306.9l18-81.5.6-6c0-7.9-3.2-15.1-8.3-20.3L297 64 171 191.3c-6.8 6.9-11 16.5-11 27.1v192c0 21.1 17.2 37.6 38 37.6z" fill="#0F4D8A"/><path d="M48 224h64v224H48z" fill="#0F4D8A"/></svg>
                            </i><a href="news-by-date.html">1.203</a></li>
                        </li>
                        </ul>
                    </div>
                </div>
                <div class="news-card-one">
                    <div class="news-card-img">
                        <img src="{{asset('assets/img/news/news-thumb-6.webp')}}" alt="Image">
                    </div>
                    <div class="news-card-info">
                    <h3><a href="business-details.html">Man Wearing Black Pullover Hoodie To Smoke</a></h3>
                        <ul class="news-metainfo list-style">
                        <li>
                            <i><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 512 512"><path d="M368.005 272h-96v96h96v-96zm-32-208v32h-160V64h-48v32h-24.01c-22.002 0-40 17.998-40 40v272c0 22.002 17.998 40 40 40h304.01c22.002 0 40-17.998 40-40V136c0-22.002-17.998-40-40-40h-24V64h-48zm72 344h-304.01V196h304.01v212z" fill="#0F4D8A"/>
                            </svg></i><a href="news-by-date.html">Mar 03, 2023</a></li>

                            <i><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 512 512"><path d="M198 448h172c15.7 0 28.6-9.6 34.2-23.4l57.1-135.4c1.7-4.4 2.6-9 2.6-14v-38.6c0-21.1-17-44.6-37.8-44.6H306.9l18-81.5.6-6c0-7.9-3.2-15.1-8.3-20.3L297 64 171 191.3c-6.8 6.9-11 16.5-11 27.1v192c0 21.1 17.2 37.6 38 37.6z" fill="#0F4D8A"/><path d="M48 224h64v224H48z" fill="#0F4D8A"/></svg>
                            </i><a href="news-by-date.html">1.203</a></li>
                        </li>
                        </ul>
                    </div>
                </div>
                <div class="news-card-one">
                    <div class="news-card-img">
                        <img src="{{asset('assets/img/news/news-thumb-6.webp')}}" alt="Image">
                    </div>
                    <div class="news-card-info">
                    <h3><a href="business-details.html">Man Wearing Black Pullover Hoodie To Smoke</a></h3>
                        <ul class="news-metainfo list-style">
                        <li>
                            <i><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 512 512"><path d="M368.005 272h-96v96h96v-96zm-32-208v32h-160V64h-48v32h-24.01c-22.002 0-40 17.998-40 40v272c0 22.002 17.998 40 40 40h304.01c22.002 0 40-17.998 40-40V136c0-22.002-17.998-40-40-40h-24V64h-48zm72 344h-304.01V196h304.01v212z" fill="#0F4D8A"/>
                            </svg></i><a href="news-by-date.html">Mar 03, 2023</a></li>

                            <i><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 512 512"><path d="M198 448h172c15.7 0 28.6-9.6 34.2-23.4l57.1-135.4c1.7-4.4 2.6-9 2.6-14v-38.6c0-21.1-17-44.6-37.8-44.6H306.9l18-81.5.6-6c0-7.9-3.2-15.1-8.3-20.3L297 64 171 191.3c-6.8 6.9-11 16.5-11 27.1v192c0 21.1 17.2 37.6 38 37.6z" fill="#0F4D8A"/><path d="M48 224h64v224H48z" fill="#0F4D8A"/></svg>
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
@endsection

@section('script')

    <script>
        function showReplyForm(commentId) {
            var replyForm = document.getElementById('reply-form-' + commentId);
            if (replyForm) {
                if (replyForm.style.display === 'block') {
                    replyForm.style.display = 'none'; // If the form is open, close it
                } else {
                    replyForm.style.display = 'block'; // If the form is closed, open it
                }
            }
        }
    </script>

@endsection

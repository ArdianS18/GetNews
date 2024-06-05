@extends('layouts.user.app')
@section('style')
    <style>
        .border-primary {
            border-color: #0f4d8a !important;
            border-width: 5px !important;
        }

        .btn-primary {
            --bs-btn-color: #fff;
            --bs-btn-bg: #0f4d8a;
            --bs-btn-border-color: #0f4d8a;
            --bs-btn-hover-color: #fff;
            --bs-btn-hover-bg: #0b5ed7;
            --bs-btn-hover-border-color: #0a58ca;
            --bs-btn-focus-shadow-rgb: 49, 132, 253;
            --bs-btn-active-color: #fff;
            --bs-btn-a --ctive-bg: #0a58ca;
            --bs-btn-active-border-color: #0a53be;
            --bs-btn-active-shadow: inset 0 3px 5px rgba(0, 0, 0, 0.125);
            --bs-btn-disabled-color: #fff;
            --bs-btn-disabled-bg: #0f4d8a;
            --bs-btn-disabled-border-color: #0f4d8a;
        }

        .strip-right {
            border-right: 1px solid #0f4d8a;
            padding-right: 30px;
            height: 60%;
        }

        .strip-right h6,
        .strip-right p {
            margin-left: 1px;
        }

        .card-detail {
            border-radius: 8px;
            border: 1px solid #CCCCCC;
        }

        .card-author {
            position: absolute;
            /* margin-top: ;  */
        }

         .box {
            background-image: linear-gradient(180deg, #ffffff 50%, #aad7ff 300%);
            background-size: 100% 0%;
            background-repeat: no-repeat;
            background-position: bottom;
            transition: background-size 0.5s ease;
        }

         .box:hover {
            background-size: 100% 100%;
        }
        .theme-dark .box {
            background-color: #000000;
            background-image: linear-gradient(180deg, #000000 24%, #175A95 200%);
            background-size: 100% 0%;
            background-repeat: no-repeat;
            background-position: bottom;
            transition: background-size 0.5s ease;
        }

        .theme-dark .box:hover {
            background-size: 100% 100%;
        }
        .theme-dark .text-card {
            color: #fff !important;
        }
        .theme-dark .card-detail {
            border: 1px solid rgba(255, 255, 255, 0.2) !important;
        }

        .author-box {
            width: 1200px;
            padding: 30px 40px 0px 40px;
            border-radius: 20px;
        }

        .search-box-widget button {
            position: absolute;
            top: 10px;
            right: 10px;
            height: 40px;
            background-color: #175A95;
            border-radius: 5px;
            padding: 10px 10px 10px 10px;
            border: none;
            width: 40px;
        }

        .page-nav li a.active, .page-nav li a:hover {
            color: var(--whiteColor);
            opacity: 1;
            background-color: #175A95;
            border-color: transparent;
        }
    </style>
@endsection
@section('content')

<div class="breadcrumb-wrap mt-3">
    <div class="container">
      <h2 class="breadcrumb-title">Penulis</h2>
      <ul class="breadcrumb-menu list-style">
        <li><a href="/">Beranda</a></li>
        <li>Penulis</li>
      </ul>
    </div>
</div>

<div class="author-wrap">
    <div class="container">
        <div class="d-flex justify-content-center">
            <div class="author-box d-flex justify-content-center shadow-sm">

                <form class="search-box-widget w-100">
                    <input type="text" name="name" class="form-control search-chat py-2" placeholder="Search" 
                    @if ($search)
                        value="{{ $search }}"
                    @endif
                    />
                    <button type="submit">
                      <i class="fi fi-rr-search"></i>
                    </button>
                  </form>

                {{--  --}}

                {{-- <div class="author-img">
                <img src="assets/img/author/single-author.jpg" alt="Image" />
                </div>
                <div class="author-info">
                <h4>Scarlett Emily</h4>
                <p>
                    There are many variations of passages of Lorem Ipsum available,
                    but the majority have suffered alteration in some form, by
                    injected humour, or ran domised words which don't look even
                    slightly believable.
                </p>
                <div class="author-profile">
                    <ul class="social-profile list-style">
                    <li>
                        <a href="https://www.fb.com/" target="_blank"
                        ><i class="ri-facebook-fill"></i
                        ></a>
                    </li>
                    <li>
                        <a href="https://www.twitter.com/" target="_blank"
                        ><i class="ri-twitter-fill"></i
                        ></a>
                    </li>
                    <li>
                        <a href="https://www.instagram.com/" target="_blank"
                        ><i class="ri-instagram-line"></i
                        ></a>
                    </li>
                    <li>
                        <a href="https://www.linkedin.com/" target="_blank"
                        ><i class="ri-linkedin-fill"></i
                        ></a>
                    </li>
                    </ul>
                    <div class="author-stat">
                    <span>40 Articles</span>
                    <span>191 Comments</span>
                    </div>
                </div>
                </div> --}}
            </div>
        </div>

    </div>
  </div>


    <div class="container-fluid pb-75 mt-5">

        {{-- <div class="card shadow-sm position-relative overflow-hidden" style="background-color: #175A95;">
            <div class="card-body px-4">
                <div class="row justify-content-between">
                    <div class="col-8 text-white">
                        <h4 class="fw-semibold mb-3 mt-2 text-white">Daftar Penulis</h4>
                        <p>kepo in penulis berita faforit anda</p>
                    </div>
                    <div class="col-3">
                        <div class="text-center mb-n4">
                            <img src="{{ asset('assets/img/book-bg.png') }}" width="250px" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}


        {{-- <div class="d-sm-flex align-items-center justify-content-between mt-5 mb-4">
            <form class="d-flex mb-2">
                <div class="input-group">
                    <input type="text" name="name" class="form-control search-chat py-2 px-5 ps-5"
                        placeholder="Search">

                        <svg class="position-absolute top-50 translate-middle-y ms-3" xmlns="http://www.w3.org/2000/svg"
                        width="25" height="25" viewBox="0 0 24 24">
                        <path fill="currentColor"
                            d="m19.6 21l-6.3-6.3q-.75.6-1.725.95T9.5 16q-2.725 0-4.612-1.888T3 9.5q0-2.725 1.888-4.612T9.5 3q2.725 0 4.613 1.888T16 9.5q0 1.1-.35 2.075T14.7 13.3l6.3 6.3zM9.5 14q1.875 0 3.188-1.312T14 9.5q0-1.875-1.312-3.187T9.5 5Q7.625 5 6.313 6.313T5 9.5q0 1.875 1.313 3.188T9.5 14" />
                    </svg>
                    <button type="submit" class="btn btn-outline-primary px-4">Cari</button>
                </div>
            </form>
        </div> --}}

        <div class="row">
            @forelse ($authors as $item)
                <div class="col-md-12 col-lg-3 mb-4">
                    <div class="card-detail box hover-img shadow-sm"
                        style="border: 1px solid #CCCCCC#212529;border-bottom: 3px solid #183249;">
                        <a href="{{ route('author.detail', ['id' => $item->user->slug]) }}">
                            <div class="p-5">
                                <div>

                                    <div class="text-center">
                                        <div>
                                            <div class="">
                                                <img src="{{ asset($item->user->photo ? 'storage/' . $item->user->photo : 'default.png') }}"
                                                    alt="" style="width: 140; height: 140; border-radius: 50%;"
                                                    class="mb-3" style="object-fit: cover" width="80" height="80">
                                            </div>
                                        </div>
                                        <div class="text-center" style="margin-top: 10px;">
                                            <h5 class="mb-3">{{ $item->user->name }}</h5>
                                            @if (Auth::check() && auth()->user()->id != $item->user_id)
                                                @php
                                                    $user_id = auth()->user()->id;
                                                    $author_id = $item->id;
                                                    $isFollowing = DB::table('followers')
                                                        ->where('user_id', $user_id)
                                                        ->where('author_id', $author_id)
                                                        ->exists();
                                                @endphp

                                                @if ($isFollowing)
                                                    <form action="{{ route('unfollow.author', ['author' => $item->id]) }}"
                                                        method="POST">
                                                        @method('delete')
                                                        @csrf
                                                        <button class="btn btn-sm btn-outline-secondary py-1 px-4"
                                                            style="border-radius: 8px;">Mengikuti</button>
                                                    </form>
                                                @else
                                                    <form action="{{ route('follow.author', ['author' => $item->id]) }}"
                                                        method="POST">
                                                        @method('post')
                                                        @csrf
                                                        <button class="btn btn-sm py-1 px-5 text-white"
                                                            style="background-color: #175A95; border-radius: 8px;">Ikuti</button>
                                                    </form>
                                                @endif
                                            @elseif (!Auth::check())

                                                <button type="button" class="btn btn-sm py-1 px-5 text-white not-login"
                                                    style="background-color: #175A95; border-radius: 8px;">Ikuti</button>

                                            @else
                                                @role('author')
                                                    <a href="{{ route('profile.index') }}" class="btn btn-sm btn-outline-secondary py-1 px-4"
                                                    style="border-radius: 8px;">Profile</a>
                                                @endrole
                                                @role('user')
                                                    <a href="{{ route('profile.user') }}" class="btn btn-sm btn-outline-secondary py-1 px-4"
                                                    style="border-radius: 8px;">Profile</a>
                                                @endrole

                                            @endif

                                            <div class="d-flex align-items-center justify-content-between mt-5"
                                                style="">
                                                <div class="text-center">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25"
                                                        viewBox="0 0 24 24">
                                                        <path fill="#a0a0a0"
                                                            d="M6 2a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8l-6-6zm0 2h7v5h5v11H6zm2 8v2h8v-2zm0 4v2h5v-2z" />
                                                    </svg>
                                                    <h4 class="mt-2 text-card" style="color: #434343;">{{ $item->count }}</h4>
                                                    <span class="mb-3 text-card"
                                                        style="color: #888888; font-size:20px;">Berita</span>
                                                </div>
                                                <div class="text-center">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25"
                                                        viewBox="0 0 24 24">
                                                        <path fill="#a0a0a0"
                                                            d="M5.85 17.1q1.275-.975 2.85-1.537T12 15q1.725 0 3.3.563t2.85 1.537q.875-1.025 1.363-2.325T20 12q0-3.325-2.337-5.663T12 4Q8.675 4 6.337 6.338T4 12q0 1.475.488 2.775T5.85 17.1M12 13q-1.475 0-2.488-1.012T8.5 9.5q0-1.475 1.013-2.488T12 6q1.475 0 2.488 1.013T15.5 9.5q0 1.475-1.012 2.488T12 13m0 9q-2.075 0-3.9-.788t-3.175-2.137q-1.35-1.35-2.137-3.175T2 12q0-2.075.788-3.9t2.137-3.175q1.35-1.35 3.175-2.137T12 2q2.075 0 3.9.788t3.175 2.137q1.35 1.35 2.138 3.175T22 12q0 2.075-.788 3.9t-2.137 3.175q-1.35 1.35-3.175 2.138T12 22m0-2q1.325 0 2.5-.387t2.15-1.113q-.975-.725-2.15-1.112T12 17q-1.325 0-2.5.388T7.35 18.5q.975.725 2.15 1.113T12 20m0-9q.65 0 1.075-.425T13.5 9.5q0-.65-.425-1.075T12 8q-.65 0-1.075.425T10.5 9.5q0 .65.425 1.075T12 11m0 7.5" />
                                                    </svg>
                                                    <h4 class="mt-2 text-card" style="color: #434343;">{{ $item->followers_count }}
                                                    </h4>
                                                    <span class="mb-3 text-card"
                                                        style="color: #888888; font-size:20px;">Pengikut</span>
                                                </div>
                                                <div class="text-center">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25"
                                                        viewBox="0 0 24 24">
                                                        <path fill="#a0a0a0"
                                                            d="M18 21H7V8l7-7l1.25 1.25q.175.175.288.475t.112.575v.35L14.55 8H21q.8 0 1.4.6T23 10v2q0 .175-.05.375t-.1.375l-3 7.05q-.225.5-.75.85T18 21m-9-2h9l3-7v-2h-9l1.35-5.5L9 8.85zM9 8.85V19zM7 8v2H4v9h3v2H2V8z" />
                                                    </svg>
                                                    <h4 class="mt-2 text-card" style="color: #434343;">{{ $item->count_like }}</h4>
                                                    <span class="mb-3 text-card" style="color: #888888; font-size:20px;">Like</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>

                    {{-- <a href="{{ route('author.detail', ['id' => $item->user->slug]) }}">
                        <div class="card-detail hover-img shadow-sm">
                            <div class="card-body">
                                <div class="p-4 text-center">
                                    <img src="{{asset($item->user->photo ? 'storage/'.$item->user->photo : "default.png")}}" alt="" class="rounded-circle mb-3" style="object-fit: cover" width="80" height="80">
                                    <h5>{{ $item->user->name }}</h5>
                                    @if (Auth::check() && auth()->user()->id != $item->user_id)
                                        @php
                                            $user_id = auth()->user()->id;
                                            $author_id = $item->id;
                                            $isFollowing = DB::table('followers')->where('user_id', $user_id)->where('author_id', $author_id)->exists();
                                        @endphp

                                        @if ($isFollowing)
                                            <form action="{{ route('unfollow.author', ['author' => $item->id]) }}" method="POST">
                                                @method('delete')
                                                @csrf
                                                <button class="btn btn-sm btn-outline-secondary py-1 px-4" style="border-radius: 8px;">Mengikuti</button>
                                            </form>
                                        @else
                                            <form action="{{ route('follow.author', ['author' => $item->id]) }}" method="POST">
                                                @method('post')
                                                @csrf
                                                <button class="btn btn-sm py-1 px-5 text-white" style="background-color: #175A95; border-radius: 8px;">Ikuti</button>
                                            </form>
                                        @endif
                                    @elseif (!Auth::check())
                                        Mohon untuk login
                                    @else
                                        Ini akun anda
                                    @endif

                                    <div class="d-flex align-items-center justify-content-between mt-4">
                                        <div class="text-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 24 24"><path fill="#a0a0a0" d="M6 2a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8l-6-6zm0 2h7v5h5v11H6zm2 8v2h8v-2zm0 4v2h5v-2z"/></svg>
                                            <h4 class="mt-2 text-card" style="color: #434343;">{{ $item->count }}</h4>
                                            <span class="mb-3" style="color: #888888; font-size:20px;">Berita</span>
                                        </div>
                                        <div class="text-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 24 24"><path fill="#a0a0a0" d="M5.85 17.1q1.275-.975 2.85-1.537T12 15q1.725 0 3.3.563t2.85 1.537q.875-1.025 1.363-2.325T20 12q0-3.325-2.337-5.663T12 4Q8.675 4 6.337 6.338T4 12q0 1.475.488 2.775T5.85 17.1M12 13q-1.475 0-2.488-1.012T8.5 9.5q0-1.475 1.013-2.488T12 6q1.475 0 2.488 1.013T15.5 9.5q0 1.475-1.012 2.488T12 13m0 9q-2.075 0-3.9-.788t-3.175-2.137q-1.35-1.35-2.137-3.175T2 12q0-2.075.788-3.9t2.137-3.175q1.35-1.35 3.175-2.137T12 2q2.075 0 3.9.788t3.175 2.137q1.35 1.35 2.138 3.175T22 12q0 2.075-.788 3.9t-2.137 3.175q-1.35 1.35-3.175 2.138T12 22m0-2q1.325 0 2.5-.387t2.15-1.113q-.975-.725-2.15-1.112T12 17q-1.325 0-2.5.388T7.35 18.5q.975.725 2.15 1.113T12 20m0-9q.65 0 1.075-.425T13.5 9.5q0-.65-.425-1.075T12 8q-.65 0-1.075.425T10.5 9.5q0 .65.425 1.075T12 11m0 7.5"/></svg>
                                            <h4 class="mt-2 text-card" style="color: #434343;">{{ $item->followers_count }}</h4>
                                            <span class="mb-3" style="color: #888888; font-size:20px;">Pengikut</span>
                                        </div>
                                        <div class="text-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 24 24"><path fill="#a0a0a0" d="M18 21H7V8l7-7l1.25 1.25q.175.175.288.475t.112.575v.35L14.55 8H21q.8 0 1.4.6T23 10v2q0 .175-.05.375t-.1.375l-3 7.05q-.225.5-.75.85T18 21m-9-2h9l3-7v-2h-9l1.35-5.5L9 8.85zM9 8.85V19zM7 8v2H4v9h3v2H2V8z"/></svg>
                                            <h4 class="mt-2 text-card" style="color: #434343;">{{ $item->count_like }}</h4>
                                            <span class="mb-3" style="color: #888888; font-size:20px;">Like</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a> --}}
                </div>
            @empty
                <x-no-data>
                    Penulis Tidak Tersedia !!
                </x-no-data>
            @endforelse
        </div>
        <ul class="page-nav list-style text-center mt-20">
            <li><a href="{{ $authors->previousPageUrl() }}"><i class="flaticon-arrow-left"></i></a></li>

            @for ($i = 1; $i <= $authors->lastPage(); $i++)
                <li><a href="{{ $authors->url($i) }}" class="btn btn-black {{ $authors->currentPage() == $i ? 'active' : '' }}">{{ $i }}</a></li>
            @endfor

            <li><a href="{{ $authors->nextPageUrl() }}"><i class="flaticon-arrow-right"></i></a></li>
        </ul>
    </div>
@endsection

@section('script')
    <script>
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
    </script>
@endsection

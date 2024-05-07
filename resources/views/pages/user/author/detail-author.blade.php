@extends('layouts.user.app')

@section('style')
    <style>
        .card-detail {
            box-shadow: 0 5px 2px rgba(0, 0, 0, 0.1);
            border: 1px solid #f4f4f4;
            padding: 2%;
            border-radius: 10px;
            /* width: 400px;
            height: 130px; */
        }

        .card-category {
            box-shadow: 0 5px 2px rgba(0, 0, 0, 0.1);
            border: 1px solid #f4f4f4;
            padding: 4%;
            border-radius: 10px;
        }
    </style>
@endsection

@section('content')
    <div class="ps-5 pe-5">
        <div class="">
            <div class="card shadow-sm p-5 mt-5">
                <div class="row">
                    <div class="col-md-12 col-lg-1">
                        {{-- @dd( $author->user ) --}}
                        <img src="{{asset( $author->user->photo ? 'storage/'.$author->user->photo : "default.png")}}" alt="Image" width="130px" style="border-radius: 50%;" />
                    </div>
                    <div class="col-md-12 col-lg-11">
                            <div class="d-flex">
                                <h3 class="me-2">{{ $author->user->name }}</h3>
                            @auth
                                @if (auth()->user()->id != $author->user_id)
                                    @php
                                        $user_id = auth()->user()->id;
                                        $author_id = $author->id;
                                        $isFollowing = DB::table('followers')->where('user_id', $user_id)->where('author_id', $author_id)->exists();
                                    @endphp

                                    @if ($isFollowing)
                                        <form action="{{ route('unfollow.author', ['author' => $author->id]) }}" method="POST">
                                            @method('delete')
                                            @csrf
                                            <button class="btn btn-sm btn-outline-secondary py-1 px-4" style="border-radius: 8px;">Mengikuti</button>
                                        </form>
                                    @else
                                        <form action="{{ route('follow.author', ['author' => $author->id]) }}" method="POST">
                                            @method('post')
                                            @csrf
                                            <button class="btn btn-sm py-1 px-5  not-login text-white" style="background-color: #175A95; border-radius: 8px;">Ikuti</button>
                                        </form>
                                    @endif
                                @endif
                            @endauth
                            </div>

                            <div class="col-10">
                                <p class="fs-6">lorem oancone o nicygiu IVisu ub oiiuhcc oajicomec uhceb lorem oancone o
                                    nicygiu IVisu ub oii IVisu ub oiiuhcc oajicomec uhceb lorem oancone o nicygiu IVisu ub
                                    oiiuhcc oajicomec uhceb aiuhec...</p>
                            </div>
                            <div class="d-flex justify-content-end">
                                <div class="d-flex">
                                    <button class="btn btn-sm px-5" style="background-color: #D9D9D9;">{{$newsCount->count()}} Berita</button>
                                    <button class="btn btn-sm ms-3 px-5" style="background-color: #D9D9D9;">{{ $comments }} Komentar</button>
                                </div>
                            </div>

                    </div>
                </div>
            </div>
        </div>

        <div class="card shadow-sm p-4 ps-5 pe-5 mt-5 mb-5">
            <div class="row">
                <div class="col-md-12 col-lg-8" style="padding: 2%;">
                    <div class="sidebar-widget">
                        <h3 class="sidebar-widget-title">Berita Penulis</h3>
                        <div class="pp-post-wrap">
                            @forelse ($news as $item)
                                <div class="row mt-3 mb-4">
                                    <div class="col-3">
                                        <img src="{{ asset('storage/' . $item->photo) }}" class="" width="100%"
                                            height="150px" style="object-fit: cover" alt="Image">
                                    </div>
                                    <div class="col-9">
                                        <h5>{!! Illuminate\Support\Str::limit(strip_tags($item->name), 50, '...') !!}</h5>

                                        <div class="col-9">
                                            <p>{!! Illuminate\Support\Str::limit(strip_tags($item->content), 120, '...') !!}</p>
                                        </div>
                                        <ul class="news-metainfo list-style">
                                            <li>
                                                <i class="fi fi-rr-calendar-minus"></i><a href="javascript:view(0)">{{ \Carbon\Carbon::parse($item->upload_date)->format('M d Y') }}</a>
                                            </li>

                                            <i>
                                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                                viewBox="0 0 24 24">
                                                <path fill="#E93314"
                                                    d="M18 21H7V8l7-7l1.25 1.25q.175.175.288.475t.112.575v.35L14.55 8H21q.8 0 1.4.6T23 10v2q0 .175-.05.375t-.1.375l-3 7.05q-.225.5-.75.85T18 21m-9-2h9l3-7v-2h-9l1.35-5.5L9 8.85zM9 8.85V19zM7 8v2H4v9h3v2H2V8z" />
                                            </svg>
                                            </i><a href="javascript:void(0sing)">{{ $item->newsHasLikes->count() }}</a></li>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            @empty
                                <div class="d-flex justify-content-center">
                                    <div>
                                        <img src="{{ asset('assets/img/no-data.svg') }}" alt="">
                                    </div>
                                </div>
                                <div class="text-center">
                                    <h4>Tidak ada data</h4>
                                </div>
                            @endforelse
                        </div>




                    </div>
                </div>

                <div class="col-md-12 col-lg-4">
                    <div class="" style="padding: 2%;">
                        <div class="card-category">
                            <h3 class="sidebar-widget-title">Kategori</h3>
                            <ul class="category-widget list-style">
                                @foreach ($totalCategories as $category)
                                    <li><a
                                            href="{{ route('categories.show.user', ['category' => $category->slug]) }}"><img
                                                src="{{ asset('assets/img/icons/arrow-right.svg') }}"
                                                alt="Image">{{ $category->name }}
                                            <span>({{ $category->total }})</span>
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>

                        <div class="sidebar mt-5">
                            <div class="sidebar-widget" style="height: 200px">
                                <h3 class="sidebar-widget-title">iklan</h3>
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

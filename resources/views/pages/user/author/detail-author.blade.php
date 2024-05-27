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
        @media only screen and (max-width: 768px) {
            .text-mobile {
                font-size: 10px;
            }
        }
    </style>
@endsection

@section('content')

<div class="breadcrumb-wrap">
    <div class="container">
      <h2 class="breadcrumb-title">Author</h2>
      <ul class="breadcrumb-menu list-style">
        <li><a href="/">Home</a></li>
        <li>Author</li>
      </ul>
    </div>
  </div>

  <div class="author-wrap">
    <div class="container">
      <div class="author-box">
        <div class="author-img">
            <img src="{{asset( $author->user->photo ? 'storage/'.$author->user->photo : "default.png")}}" height="150" width="150" style="object-fit: cover;" alt="Image"/>
        </div>
        <div class="author-info">
            <div class="d-flex">
                <h4 class="me-3">{{ $author->user->name }}</h4>
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
                                <button class="btn btn-sm py-1 px-5 text-white" style="background-color: #175A95; border-radius: 8px;">Ikuti</button>
                            </form>
                        @endif
                    @endif
                    @else
                    <form>
                      <button type="button" class="btn btn-sm py-1 px-5  not-login text-white" style="background-color: #175A95; border-radius: 8px;">Ikuti</button>
                  </form>
                @endauth                
            </div>

          <p>
            @if ($author->user->description)
                {{$author->user->description}}
            @else
                Tidak ada deskripsi.
            @endif
          </p>
          <div class="author-profile d-flex justify-content-end">

            <div class="author-stat">
               <span>{{$newsCount->count()}} Berita</span>
              <span>{{ $comments }} Komentar</span>
             

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="popular-news-three ptb-100">
    <div class="container">
      <div class="row gx-5">
        <div class="col-lg-8">
          <div class="section-title-two mb-40">
            <h2>Berita Ditulis</h2>
          </div>
          <div class="popular-news-wrap">
            @forelse ($news as $item)
                @php
                    $dateParts = date_parse($item->upload_date);
                @endphp
                <div class="news-card-five">
                    <div class="news-card-img">
                        <img src="{{ asset('storage/' . $item->photo) }}" class="" width="100%"
                                                height="150px" style="object-fit: cover" alt="Image">
                        {{-- <a href="business.html" class="news-cat">Lifestyle</a> --}}
                    </div>
                    <div class="news-card-info">
                        <h3>
                            <a data-toggle="tooltip" data-placement="top" title="{{ $item->name }}"
                                href="{{ route('news.user', ['news' => $item->slug, 'year' => $dateParts['year'], 'month' => $dateParts['month'], 'day' => $dateParts['day']]) }}">{!! Illuminate\Support\Str::limit($item->name, $limit = 50, $end = '...') !!}</a>
                        </h3>
                        <p>
                            {!! Illuminate\Support\Str::limit(strip_tags($item->content), 120, '...') !!}
                        </p>
                        <ul class="news-metainfo list-style">
                        <li>
                            <i class="fi fi-rr-calendar-minus"></i><a href="javascript:view(0)">{{ \Carbon\Carbon::parse($item->upload_date)->format('M d Y') }}</a>
                        </li>
                        <li>
                            <i>
                                <svg xmlns="http://www.w3.org/2000/svg" class="mb-1" width="20" height="20"
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
                <ul class="page-nav list-style text-center mt-20">
                    <li><a href="{{ $news->previousPageUrl() }}"><i class="flaticon-arrow-left"></i></a></li>

                    @for ($i = 1; $i <= $news->lastPage(); $i++)
                        <li><a href="{{ $news->url($i) }}" class="btn btn-black {{ $news->currentPage() == $i ? 'active' : '' }} && {{ $news->currentPage() == $i ? 'active' : '' }}">{{ $i }}</a></li>
                    @endfor

                    <li><a href="{{ $news->nextPageUrl() }}"><i class="flaticon-arrow-right"></i></a></li>
                </ul>
        </div>
        <div class="col-lg-4">
          <div class="sidebar">
            <div class="sidebar-widget">
                <h3 class="sidebar-widget-title">Kategori</h3>
                <ul class="category-widget list-style">
                    @foreach ($totalCategories as $category)
                        <li><a
                                href="{{ route('categories.show.user', ['category' => $category->slug]) }}"><img
                                    src="{{ asset('assets/img/icons/arrow-right.svg') }}"
                                    alt="Image">{{ $category->name }}
                                <span>({{ $category->news_categories_count }})</span>
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>

            <div class="sidebar mt-5 mb-5">
                <div class="sidebar-widget" style="height: 200px">
                    <h3 class="sidebar-widget-title">iklan</h3>
                </div>
            </div>

            <div class="sidebar-widget">
                <h3 class="sidebar-widget-title">Berita Popular</h3>
                <div class="pp-post-wrap">
                    @forelse ($newsPopular as $popular)
                    @php
                        $dateParts = date_parse($popular->upload_date);
                    @endphp
                        <div class="news-card-one">
                            <div class="news-card-img">
                                <img src="{{ asset('storage/' . $popular->photo) }}" width="100%" height="80" style="object-fit: cover;">
                            </div>
                            <div class="news-card-info">
                                <h3><a data-toggle="tooltip" data-placement="top" title="{{ $popular->name }}"
                                    href="{{ route('news.user', ['news' => $popular->slug,'year'=> $dateParts['year'],'month'=>$dateParts['month'],'day'=> $dateParts['day'] ]) }}">{!! Illuminate\Support\Str::limit($popular->name, $limit = 40, $end = '...')  !!}</a>
                                </h3>
                                <ul class="news-metainfo list-style">
                                    <li><i class="fi fi-rr-calendar-minus"></i>
                                        <a href="javascript:void(0)">{{  \Carbon\Carbon::parse($popular->upload_date)->translatedFormat('d F Y') }}</a>
                                    </li>
                                    <li>
                                        <i class="fi fi-rr-eye">
                                        </i><a href="news-by-dateus">{{ $popular->views_count }}</a>
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

@extends('layouts.user.app')

@section('style')
    <style>
        .news-card-post{
            box-shadow: 0  5px 2px rgba(0, 0, 0, 0.1);
            border: 1px solid #f4f4f4;
            padding: 2%;
            border-radius: 10px;
        }
        .card-category{
            box-shadow: 0  5px 2px rgba(0, 0, 0, 0.1);
            border: 1px solid #f4f4f4;
            padding: 4%;
            border-radius: 10px;
        }
    </style>
@endsection

@section('content')
    <div class="">
        <div class="modal fade searchModal" id="searchModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form>
                        <input type="text" class="form-control" placeholder="Search here....">
                        <button type="submit"><i class="fi fi-rr-search"></i></button>
                    </form>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><i class="ri-close-line"></i></button>
                </div>
            </div>
        </div>
    </div>

    <div class="">
    <div class="sports-wrap ptb-100">
    <div class="container">
    <div class="row gx-55 gx-5">
        <div class="col-lg-8">
            <div class="row">
                @forelse ($newsByDate as $item)
                <div class="col-md-6">
                    <div class="news-card-six">
                        <div class="news-card-img">
                            <img src="{{ asset('storage/' . $item->photo) }}" alt="{{ $item->photo }}" width="400px" height="300" style="width: 100%;object-fit:cover;">
                            @foreach ($subCategories as $subCategory)
                                <p class="tag">
                                    <a href="{{ route('categories.show.user', ['category' => $item->newsCategories[0]->category->slug]) }}" class="news-cat">{{ $item->newsCategories[0]->category->name }}</a>
                                </p>
                            @endforeach
                        </div>
                        <div class="news-card-info">
                            <div class="news-author">
                                <div class="news-author-img">
                                    <img src="{{ asset($item->user->photo ? 'storage/' . $item->user->photo : 'default.png') }}"
                                        alt="Image" width="40px" height="40px"
                                        style="border-radius: 50%; object-fit:cover;" />
                                </div>
                                <h5>By <a href="{{ route('author.detail', ['id' => $item->user->author->id]) }}">{{ $item->user->name }}</a>
                                </h5>
                            </div>
                            <h3><a
                                href="{{ route('news.user', ['news' => $item->slug, 'page' => '1']) }}">{!! Illuminate\Support\Str::limit(strip_tags($item->name), 50, '...') !!}</a>
                            </h3>
                            <ul class="news-metainfo list-style">
                                <li><i class="fi fi-rr-calendar-minus"></i><a
                                        href="javascript:void(0)">{{ \Carbon\Carbon::parse($item->upload_date)->translatedFormat('d F Y') }}</a>
                                </li>
                                <li><i
                                        class="fi fi-rr-eye"></i>{{ $item->views->count() }}
                                </li>
                            </ul>
                        </div>
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
                {{-- <ul class="page-nav list-style text-center mt-20">
                    <li><a href="{{ $newsByDate->previousPageUrl() }}"><i
                                class="flaticon-arrow-left"></i></a></li>
                    @for ($i = 1; $i <= $newsByDate->lastPage(); $i++)
                        <li><a href="{{ $newsByDate->url($i) }}"
                                class="btn btn-black {{ $newsByDate->currentPage() == $i ? 'active' : '' }}">{{ $i }}</a>
                        </li>
                    @endfor
                    <li><a href="{{ $newsByDate->nextPageUrl() }}"><i class="flaticon-arrow-right"></i></a>
                    </li>
                </ul> --}}
            </div>
            <div class="text-center item-center d-flex justify-content-center" style="background-color:#F6F6F6; width:100%;height:200px;">
                <h5 class="mt-5">Iklan</h5>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="sidebar">
                <div class="sidebar-widget-two">
                    <form class="search-box-widget">
                        <input type="search" name="search" placeholder="Search">
                        <button type="submit">
                            <i class="fi fi-rr-search"></i>
                        </button>
                    </form>
                </div>
                <div class="sidebar-widget">
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
                <div class="sidebar-widget">
                    <h3 class="sidebar-widget-title">Berita Popular</h3>
                    <div class="pp-post-wrap">
                        @forelse ($populars as $popular)
                        <div class="news-card-one">
                            <div class="news-card-img">
                                <img src="{{ asset('storage/' . $popular->photo) }}" alt="Image" width="100%" style="object-fit: cover;" height="80">
                            </div>
                            <div class="news-card-info">
                                <h3><a
                                        href="{{ route('news.user', ['news' => $popular->slug, 'page' => 1]) }}">{!! Illuminate\Support\Str::limit($popular->name, $limit = 20, $end = '...')  !!}</a>
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
                                    </i><a href="javascript:void(0)">{{ $popular->views->count() }}</a></li>

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
            </div>
        </div>

    </div>



    </div>

    </div>
    </div>
@endsection

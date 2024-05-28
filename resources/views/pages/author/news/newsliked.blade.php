<html lang="en">
@extends('layouts.admin.app')

@section('style')
    <head>
        {{-- <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}"> --}}
        <link rel="stylesheet" href="{{ asset('assets/css/remixicon.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/uicons-regular-rounded.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/flaticon_baxo.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/swiper.bundle.min.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/aos.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/header.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/footer.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/responsive.css') }}">
        <link rel="stylesheet" href="{{ asset('admin/dist/libs/sweetalert2/dist/sweetalert2.min.css') }}">
    </head>
@endsection

@section('content')
<div class="card shadow-sm position-relative overflow-hidden"  style="background-color: #175A95;">
    <div class="card-body px-4 py-4">
      <div class="row justify-content-between">
        <div class="col-8 text-white">
          <h4 class="fw-semibold mb-3 mt-2 text-white">Berita Disukai</h4>
            <p>Teruskan membaca berita, Perluas pegetahuan</p>
        </div>
        <div class="col-3">
          <div class="text-center mb-n4">
            <img src="{{asset('assets/img/news-bg.svg')}}" width="200px" alt="" class="img-fluid">
          </div>
        </div>
      </div>
    </div>
  </div>

<div class="">
    <div>
        <div class="d-flex gap-2">
            {{-- <select class="form-select" id="opsi-latest" style="width: 200px">
                <option value="">Tampilkan semua</option>
                <option value="terbaru">Terbaru</option>
                <option value="terlama">Terlama</option>
            </select> --}}
            <form action="">
            <div class="input-group" style="width: 250px">
                <select class="form-select" name="filter">
                    <option value="terbaru">Terbaru</option>
                    <option value="terlama">Terlama</option>
                    <option value="">Tampilkan Semua</option>
                </select>
                <button type="submit" class="btn btn-outline-primary">
                    Pilih
                </button>
            </div>
            </form>

            <select class="form-select" id="opsi-perpage" style="width: 200px">
                <option value="10">10</option>
                <option value="20">20</option>
                <option value="50">50</option>
                <option value="100">100</option>
            </select>
        </div>
    </div>

    <div class="card card-body mt-5">
        <div class="row mt-5">
            @forelse ($news as $item)
            @php
                $dateParts = date_parse($item->upload_date);
                @endphp
                
                <div class="col-lg-6 col-md-12">
                    <div class="news-col-wrap mb-3">
                    <div class="news-card-five">
                            <div class="news-card-img">
                                <img src="{{ asset('storage/' . $item->photo) }}" class="" width="100%" height="150px" style="object-fit: cover" alt="Image">
                                <a href="{{ route('categories.show.user', ['category' => $item->newsCategories[0]->category->slug]) }}"
                                    class="news-cat">{{ $item->newsCategories[0]->category->name }}</a>
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
                                        <i class="fi fi-rr-calendar-minus"></i><a href="javascript:view(0)">{{ \Carbon\Carbon::parse($item->upload_date)->translatedFormat('d F Y') }}</a>
                                    </li>
                                    <li>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="19" height="19" viewBox="0 0 24 24"><path d="M4 21h1V8H4a2 2 0 0 0-2 2v9a2 2 0 0 0 2 2zM20 8h-7l1.122-3.368A2 2 0 0 0 12.225 2H12L7 7.438V21h11l3.912-8.596L22 12v-2a2 2 0 0 0-2-2z" fill="#e93314"/></svg>
                                        {{ $item->news_has_likes_count }}
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

            @empty
            @endforelse
        </div>

        <ul class="page-nav list-style text-center mt-20">
            <li><a href="{{ $news->previousPageUrl() }} && {{ $news->previousPageUrl() }}"><i class="flaticon-arrow-left"></i></a></li>

            @for ($i = 1; $i <= $news->lastPage(); $i++)
                <li><a href="{{ $news->url($i) }} && {{ $news->url($i) }}" class="btn btn-black {{ $news->currentPage() == $i ? 'active' : '' }} && {{ $news->currentPage() == $i ? 'active' : '' }}">{{ $i }}</a></li>
            @endfor

            <li><a href="{{ $news->nextPageUrl() }} && {{ $news->nextPageUrl() }}"><i class="flaticon-arrow-right"></i></a></li>
        </ul>
    </div>

</div>
@endsection

@section('script')
<script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('assets/js/swiper.bundle.min.js') }}"></script>
<script src="{{ asset('assets/js/aos.js') }}"></script>
<script src="{{ asset('assets/js/main.js') }}"></script>

@endsection
@extends('layouts.user.app')
@section('title', 'cari')

@section('style')
    <style>
        .news-card-post {
            box-shadow: 0 5px 2px rgba(0, 0, 0, 0.1);
            border: 1px solid #f4f4f4;
            padding: 2%;
            border-radius: 10px;
        }

        .card-category {
            box-shadow: 0 5px 2px rgba(0, 0, 0, 0.1);
            border: 1px solid #f4f4f4;
            padding: 4%;
            border-radius: 10px;
        }

        .btn-outline-primary {
            --bs-btn-color: #175A95 d;
            --bs-btn-border-color: #175A95;
            --bs-btn-hover-color: #fff;
            --bs-btn-hover-bg: #175A95;
            --bs-btn-hover-border-color: #175A95;
            --bs-btn-focus-shadow-rgb: 13, 110, 253;
            --bs-btn-active-color: #fff;
            --bs-btn-active-bg: #175A95;
            --bs-btn-active-border-color: #175A95;
            --bs-btn-active-shadow: inset 0 3px 5px rgba(0, 0, 0, 0.125);
            --bs-btn-disabled-color: #175A95;
            --bs-btn-disabled-bg: transparent;
            --bs-btn-disabled-border-color: #175A95fd;
            --bs-gradient: none;
        }

        .theme-dark select {
            background-color: var(--codColor);
            border-color: var(--codColor);
            color: #ffffff;
        }
    </style>
@endsection

@section('content')


    <div class="">
        <div class="sports-wrap ptb-100">
            <div class="container">
                <div class="row gx-55 gx-5">
                    <div class="col-lg-8">
                        <div class="d-flex justify-content-between">
                            <div class="">
                                <h4 class="mb-3" style="border-bottom: 5px solid #175A95;display:inline-block">Hasil
                                    Pencarian "{{ $query }}"</h4>
                            </div>
                            <div class="">
                                <form class="d-flex gap-2">
                                    <input type="hidden" name="q" value="{{ $query }}">
                                    <div class="d-flex gap-2" style="height: 40px">
                                        <select class="form-select" name="opsi" style="width: 200px">
                                            <option value="terbaru">Terbaru</option>
                                            <option value="terlama">Terlama</option>
                                        </select>
                                    </div>
                                    <div>
                                        <button class="btn btn-outline-primary" id="signInBtn" type="submit">
                                            Filter
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <p>Menampilkan {{ $newsByDate->total() }} Hasil</p>
                        <div class="row">
                            @forelse ($newsByDate as $item)
                                @php
                                    $dateParts = date_parse($item->upload_date);
                                @endphp
                                <div class="col-md-6">
                                    <div class="news-card-six">
                                        <div class="news-card-img">
                                            <img src="{{ asset('storage/' . $item->photo) }}" alt="{{ $item->photo }}"
                                                width="400px" height="250" style="width: 100%;object-fit:cover;">
                                            @foreach ($subCategories as $subCategory)
                                                <p class="tag">
                                                    <a href="{{ route('categories.show.user', ['category' => $item->newsCategories[0]->category->slug]) }}"
                                                        class="news-cat">{{ $item->newsCategories[0]->category->name }}</a>
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
                                                <h5>By <a
                                                        href="{{ route('author.detail', ['id' => $item->user->slug]) }}">{{ $item->user->name }}</a>
                                                </h5>
                                            </div>
                                            <h3><a
                                                    href="{{ route('news.user', ['news' => $item->slug, 'year' => $dateParts['year'], 'month' => $dateParts['month'], 'day' => $dateParts['day']]) }}">{!! Illuminate\Support\Str::limit(strip_tags($item->name), 50, '...') !!}</a>
                                            </h3>
                                            <ul class="news-metainfo list-style">
                                                <li><i class="fi fi-rr-calendar-minus"></i><a
                                                        href="javascript:void(0)">{{ \Carbon\Carbon::parse($item->upload_date)->translatedFormat('d F Y') }}</a>
                                                </li>
                                                <li><i class="fi fi-rr-eye"></i>{{ $item->views->count() }}
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            @empty
                                <x-no-data>
                                    Pencarian "{{ $query }}"
                                    tidak ditemukan
                                </x-no-data>
                            @endforelse
                        </div>

                        <div class="text-center item-center d-flex justify-content-center"
                        style="background-color:#F6F6F6; width:100%;height:200px;">
                        <h5 class="mt-5">Iklan</h5>
                    </div>
                    <x-paginator :paginator="$newsByDate" />
                    </div>

                    <div class="col-lg-4">
                        <div class="sidebar">
                            <x-news-category :categories="$totalCategories" />
                            <x-news-populer :populars="$populars" />
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

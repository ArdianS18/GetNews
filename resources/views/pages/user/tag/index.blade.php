@extends('layouts.user.app')

@section('content')
    <div class="col-lg-12">
        <div class="breadcrumb-wrap">
            <h2 class="breadcrumb-title">{{ $tag->name }}</h2>
            <ul class="breadcrumb-menu list-style">
                <li><a href="/">Home</a></li>
                <li>{{ $tag->name }}</li>
            </ul>
        </div>
    </div>

    <div class="sports-wrap ptb-100">
        <div class="container">
            <div class="row gx-55 gx-5">
                <div class="col-lg-8">
                    <div class="row justify-content-center">
                        @forelse ($news as $item)
                            @php
                                $dateParts = date_parse($item->news->upload_date);
                            @endphp
                            <div class="col-md-6">
                                <div class="news-card-thirteen">
                                    <div class="news-card-img">
                                        <img src="{{ asset('storage/' . $item->news->photo) }}"
                                            alt="{{ $item->news->photo }}" width="400px" height="300"
                                            style="width: 100%;object-fit:cover;">
                                        <a href="{{ route('categories.show.user', ['category' => $item->news->newsCategories[0]->category->slug]) }}"
                                            class="news-cat">{{ $item->news->newsCategories[0]->category->name }}</a>
                                    </div>
                                    <div class="news-card-info">
                                        <h3><a
                                                href="{{ route('news.user', ['news' => $item->news->slug, 'year' => $dateParts['year'], 'month' => $dateParts['month'], 'day' => $dateParts['day']]) }}">{{ $item->news->name }}</a>
                                        </h3>
                                        <ul class="news-metainfo list-style">
                                            <li><i class="fi fi-rr-calendar-minus"></i><a
                                                    href="javascript:void(0)">{{\Carbon\Carbon::parse($item->news->upload_date)->translatedFormat('d F Y') }}</a>
                                            </li>
                                            <li><i class="fi fi-rr-eye"></i>{{ $item->news->views->count() }}</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <x-no-data />
                        @endforelse
                        
                    </div>
                   <x-paginator :paginator="$news"/>
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
                      <x-news-category :categories="$totalCategories"/>

                        <x-news-populer :populars="$populars"/>
                        <div class="sidebar-widget">
                            <h3 class="sidebar-widget-title">Popular Tags</h3>
                            <ul class="tag-list list-style">
                                @forelse ($popularTags as $tag)
                                    <li><a href="{{ route('tag.show.user', ['tag' => $tag->slug]) }}">{{ $tag->name }}</a>
                                    </li>
                                @empty
                                @endforelse
                            </ul>
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

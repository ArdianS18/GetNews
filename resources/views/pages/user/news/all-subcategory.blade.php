@extends('layouts.user.app')

@section('content')
<div class="col-lg-12">
    <div class="breadcrumb-wrap">
        <h2 class="breadcrumb-title">{{ $category->name }}
            @if ($data === "trending")
                - Trending
            @else
                - Terbaru
            @endif
        </h2>
        <ul class="breadcrumb-menu list-style">
            <li><a href="/">Home</a></li>
            <li>{{ $category->name }}</li>
        </ul>
    </div>
</div>

<div class="sports-wrap ptb-100">
    <div class="container">
        <div class="row gx-55 gx-5">
            <div class="col-lg-8">
                <div class="mb-5">
                    @forelse ($trending as $tren)
                        @php
                            $dateParts = date_parse($tren->upload_date);
                        @endphp
                        <div class="news-card-five">
                            <div class="news-card-img">
                                <a href="{{ route('news.user', ['news' => $tren->slug,'year'=> $dateParts['year'],'month'=>$dateParts['month'],'day'=> $dateParts['day'] ]) }}">
                                    <img src="{{ asset('storage/' . $tren->photo) }}" alt="Image" height="140" width="100%" />
                                </a>
                                <a data-toggle="tooltip" data-placement="top" title="{{ $tren->newsCategories[0]->category->name }}" href="{{ route('subcategories.show.user', ['category' => $tren->newsCategories[0]->category->slug,'subCategory' => $tren->newsSubCategories[0]->subCategory->slug ]) }}"
                                    class="news-cat">{{ $tren->newsSubCategories[0]->subCategory->name }}</a>
                            </div>
                            <div class="news-card-info">
                                <h3><a data-toggle="tooltip" data-placement="top" title="{{ $tren->name }}" href="{{ route('news.user', ['news' => $tren->slug,'year'=> $dateParts['year'],'month'=>$dateParts['month'],'day'=> $dateParts['day'] ]) }}">
                                        {!! Illuminate\Support\Str::limit($tren->name, $limit = 35, $end = '...')  !!}
                                    </a>
                                </h3>
                                <p>{!! Illuminate\Support\Str::limit(strip_tags($tren->content), 85, '...') !!}</p>
                                <ul class="news-metainfo list-style">
                                    <li><i class="fi fi-rr-calendar-minus"></i><a
                                            href="javascript:void(0)">{{ \Carbon\Carbon::parse($tren->created_at)->translatedFormat('d F Y') }}</a>
                                    </li>
                                    <li><i class="fi fi-rr-eye"></i>{{ $tren->views_count }}</li>
                                </ul>
                            </div>
                        </div>
                    @empty
                        <x-no-data />
                    @endforelse
                </div>

                <div class="text-center item-center d-flex justify-content-center mt-4" style="background-color:#F6F6F6; width:100%;height:200px;">
                    <h5 class="mt-5">Iklan</h5>
                </div>

                <x-paginator :paginator="$trending" />
            </div>

            <div class="col-lg-4">
                <div class="">
                    <div class="sidebar">
                       <x-news-category :categories="$totalCategories" />
                       <x-news-populer :populars="$news" />
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

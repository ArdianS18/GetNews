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
                @php
                    $dateParts = date_parse($item->upload_date);
                @endphp
                <div class="col-md-6">
                    <div class="news-card-six">
                        <div class="news-card-img">
                            <img src="{{ asset('storage/' . $item->photo) }}" alt="{{ $item->photo }}" width="400px" height="250" style="width: 100%;object-fit:cover;">
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
                                <h5>By <a href="{{ route('author.detail', ['id' => $item->user->slug]) }}">{{ $item->user->name }}</a>
                                </h5>
                            </div>
                            <h3><a
                                href="{{ route('news.user', ['news' => $item->slug, 'year'=> $dateParts['year'],'month'=>$dateParts['month'],'day'=> $dateParts['day'] ]) }}">{!! Illuminate\Support\Str::limit(strip_tags($item->name), 50, '...') !!}</a>
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
            </div>
            
            <div class="text-center item-center mt-4 d-flex justify-content-center" style="background-color:#F6F6F6; width:100%;height:200px;">
                <h5 class="mt-5 text-dark">Iklan</h5>
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

@extends('layouts.author.sidebar')

@section('style')
<style>
    .news-card-a {
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        border: 1px solid #ddd; /* Memberi ruang di sekitar elemen */
        /* margin-bottom: 20px;  */
        border-radius: 10px;
        padding: 2%;
        align-items: center;
    }

    
    .card-detail img {
        width: 400px; /* Lebar otomatis */
        max-width: 100%; /* Maksimum lebar adalah 100% dari lebar elemen induknya */
        max-height: 100%;
        height: auto; /* Ketinggian otomatis */
        border-radius:; /* Ganti dengan nilai yang sesuai */
    }

    @media (max-width: 767px) {
        .card-detail img {
            width: 100%; /* Menyempitkan lebar saat di tampilan mobile */
        }
    }

  </style>
@endsection

@section('content')

<div class="container">
    <div class="tab-pane" id="status" role="tabpanel">
        <div class="container">
            @forelse ($news as $news)
            <div class="news-card-a mt-5">

                <div class="row">
                    <div class="card-detail col-md-12 col-lg-10">
                        <div class="d-flex flex-column flex-md-row">
                            <div class="mb-3 mb-md-0" style="margin-left: 2%;">
                                <img src="{{ asset('storage/' . $news->photo) }}" alt="{{ $news->photo }}" width="300px" height="200px" class="img-status">                            
                            </div>
                            <div class="order-md-1" style="margin-left:20px;">
                                <h4>{{ $news->name }}</h4>
                                <p>{{ $news->sinopsis }}</p>
                            </div>
                        </div>
                    </div>
                
                    <div class="col-md-12 col-lg-2 mt-3 mt-lg-0 ">
                        <div class="d-flex justify-content-end">
                            <div class="text-md-right mt-3 mt-md-0">
                                <button class="text-white btn btn-sm" style="background-color: #F0CA40; border-radius: 8px; padding-left: 3rem; padding-right: 3rem;">
                                    {{ $news->status }}
                                </button>
                            </div>
                        </div>
                
                        <div class="mt-4 d-flex justify-content-end">
                            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 512 512"><path d="M368.005 272h-96v96h96v-96zm-32-208v32h-160V64h-48v32h-24.01c-22.002 0-40 17.998-40 40v272c0 22.002 17.998 40 40 40h304.01c22.002 0 40-17.998 40-40V136c0-22.002-17.998-40-40-40h-24V64h-48zm72 344h-304.01V196h304.01v212z" fill="#0f4d89"/>
                            </svg> Apr 25, 2023        
                        </div>
                
                        <div class="mt-4 mb-2 d-flex justify-content-end">
                            <button class="btn btn-sm m-1" style="background-color: #0F4D8A;">
                                <svg xmlns="http://www.w3.org/2000/svg" width="23" height="30" viewBox="0 0 512 512">
                                    <path d="M64 368v80h80l235.727-235.729-79.999-79.998L64 368zm377.602-217.602c8.531-8.531 8.531-21.334 0-29.865l-50.135-50.135c-8.531-8.531-21.334-8.531-29.865 0l-39.468 39.469 79.999 79.998 39.469-39.467z" fill="#ffffff"/>
                                </svg>
                            </button>
                            <button class="btn btn-sm m-1" style="background-color: #0F4D8A;">
                                <svg xmlns="http://www.w3.org/2000/svg" width="23" height="30" viewBox="0 0 512 512">
                                    <path fill="none" stroke="#ffffff" stroke-linecap="round" stroke-linejoin="round" stroke-width="32" d="M255.66 112c-77.94 0-157.89 45.11-220.83 135.33a16 16 0 0 0-.27 17.77C82.92 340.8 161.8 400 255.66 400c92.84 0 173.34-59.38 221.79-135.25a16.14 16.14 0 0 0 0-17.47C428.89 172.28 347.8 112 255.66 112"/><circle cx="256" cy="256" r="80" fill="none" stroke="#ffffff" stroke-miterlimit="10" stroke-width="32"/>
                                </svg>
                            </button>
                            {{-- <button class="btn btn-sm m-1" style="background-color: #C94F4F;">
                                <svg xmlns="http://www.w3.org/2000/svg" width="23" height="30" viewBox="0 0 512 512">
                                    <path d="M128 405.429C128 428.846 147.198 448 170.667 448h170.667C364.802 448 384 428.846 384 405.429V160H128v245.429zM416 96h-80l-26.785-32H202.786L176 96H96v32h320V96z" fill="#ffffff"/>
                                </svg>
                            </button> --}}

                            <form action="{{ route('profile.news.delete', ['news' => $news->id]) }}" method="POST">
                                @method('delete')
                                @csrf
                                <button type="submit" class="btn btn-sm m-1" style="background-color: #C94F4F;"><svg xmlns="http://www.w3.org/2000/svg" width="23" height="30" viewBox="0 0 512 512"><path d="M128 405.429C128 428.846 147.198 448 170.667 448h170.667C364.802 448 384 428.846 384 405.429V160H128v245.429zM416 96h-80l-26.785-32H202.786L176 96H96v32h320V96z" fill="#ffffff"/></svg></button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            @empty
                @endforelse
    </div>
</div>
@endsection
@extends('layouts.user.app')
@section('style')
    <style>
        .border-primary {
            border-color: #0f4d8a !important;
            border-width: 5px !important;
        }

        .btn-primary {
            --bs-btn-color: #fff;
            --bs-btn-bg:  #0f4d8a;
            --bs-btn-border-color: #0f4d8a;
            --bs-btn-hover-color: #fff;
            --bs-btn-hover-bg: #0b5ed7;
            --bs-btn-hover-border-color: #0a58ca;
            --bs-btn-focus-shadow-rgb: 49, 132, 253;
            --bs-btn-active-color: #fff;
            --bs-btn-active-bg: #0a58ca;
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
        .card-detail{
            padding: 25px;
            border-radius: 10px;
            border: 1px solid rgb(249, 249, 249);
        }
    </style>
@endsection
@section('content')

        <div>
            <div class="d-sm-flex align-items-center justify-content-between mt-3 mb-4">
                <form class="d-flex mb-2">
                    <div class="input-group">
                        <input type="text" name="name" class="form-control search-chat py-2 px-5 ps-5" placeholder="Search">
                        {{-- <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24"><path fill="currentColor" d="m19.6 21l-6.3-6.3q-.75.6-1.725.95T9.5 16q-2.725 0-4.612-1.888T3 9.5q0-2.725 1.888-4.612T9.5 3q2.725 0 4.613 1.888T16 9.5q0 1.1-.35 2.075T14.7 13.3l6.3 6.3zM9.5 14q1.875 0 3.188-1.312T14 9.5q0-1.875-1.312-3.187T9.5 5Q7.625 5 6.313 6.313T5 9.5q0 1.875 1.313 3.188T9.5 14"/></svg>    --}}
                        <button type="submit" style="background-color: #C7C7C7;" class="btn btn-sm text-black px-4">Cari</button>
                    </div>
                </form>
              </div>
              <div class="row">
                @forelse ($authors as $item)
                <div class="col-md-12 col-lg-4 mb-4">
                    <div class="card-detail hover-img shadow-sm">
                        <div class="card-body">
                            <div class="p-4 text-center">
                                <img src="{{asset($item->photo ? 'storage/'.$item->photo : "default.png")}}" alt="" class="rounded-circle mb-3" style="object-fit: cover" width="80" height="80">
                                <h5>{{ $item->name }}</h5>
                                @php
                                    $user_id = Auth::user()->id;
                                    $author_id = $item->id;
                                    $isFollowing = DB::table('followers')->where('user_id', $user_id)->where('author_id', $author_id)->exists();
                                @endphp

                                @if($isFollowing)
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
                                <div class="d-flex align-items-center justify-content-between mt-4">
                                    <div class="text-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 24 24"><path fill="#a0a0a0" d="M6 2a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8l-6-6zm0 2h7v5h5v11H6zm2 8v2h8v-2zm0 4v2h5v-2z"/></svg>
                                        <h4 class="mt-2" style="color: #434343;">{{ $item->count }}</h4>
                                        <span class="mb-3" style="color: #888888; font-size:20px;">Berita</span>
                                    </div>
                                    <div class="text-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 24 24"><path fill="#a0a0a0" d="M5.85 17.1q1.275-.975 2.85-1.537T12 15q1.725 0 3.3.563t2.85 1.537q.875-1.025 1.363-2.325T20 12q0-3.325-2.337-5.663T12 4Q8.675 4 6.337 6.338T4 12q0 1.475.488 2.775T5.85 17.1M12 13q-1.475 0-2.488-1.012T8.5 9.5q0-1.475 1.013-2.488T12 6q1.475 0 2.488 1.013T15.5 9.5q0 1.475-1.012 2.488T12 13m0 9q-2.075 0-3.9-.788t-3.175-2.137q-1.35-1.35-2.137-3.175T2 12q0-2.075.788-3.9t2.137-3.175q1.35-1.35 3.175-2.137T12 2q2.075 0 3.9.788t3.175 2.137q1.35 1.35 2.138 3.175T22 12q0 2.075-.788 3.9t-2.137 3.175q-1.35 1.35-3.175 2.138T12 22m0-2q1.325 0 2.5-.387t2.15-1.113q-.975-.725-2.15-1.112T12 17q-1.325 0-2.5.388T7.35 18.5q.975.725 2.15 1.113T12 20m0-9q.65 0 1.075-.425T13.5 9.5q0-.65-.425-1.075T12 8q-.65 0-1.075.425T10.5 9.5q0 .65.425 1.075T12 11m0 7.5"/></svg>
                                        <h4 class="mt-2" style="color: #434343;">{{ $item->count_follow }}</h4>
                                        <span class="mb-3" style="color: #888888; font-size:20px;">Pengikut</span>
                                    </div>
                                    <div class="text-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 24 24"><path fill="#a0a0a0" d="M18 21H7V8l7-7l1.25 1.25q.175.175.288.475t.112.575v.35L14.55 8H21q.8 0 1.4.6T23 10v2q0 .175-.05.375t-.1.375l-3 7.05q-.225.5-.75.85T18 21m-9-2h9l3-7v-2h-9l1.35-5.5L9 8.85zM9 8.85V19zM7 8v2H4v9h3v2H2V8z"/></svg>
                                        <h4 class="mt-2" style="color: #434343;">{{ $item->count_like }}</h4>
                                        <span class="mb-3" style="color: #888888; font-size:20px;">Like</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @empty
                    <div>
                        <h1>Tidak Ada Data</h1>
                    </div>
                @endforelse

               </div>

            </div>
@endsection

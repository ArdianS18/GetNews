@extends('layouts.author.sidebar')

@section('style')
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
    <style>
        .news-card-a {
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border: 1px solid #ddd;
            border-radius: 10px;
            padding: 2%;
            align-items: center;
            background-color: #fff;
        }

        .card-detail img {
            max-width: 100%;
            /* Maksimum lebar adalah 100% dari lebar elemen induknya */
            max-height: 100%;
            height: auto;
            /* Ketinggian otomatis */
            border-radius: ;
            /* Ganti dengan nilai yang sesuai */
        }

        @media (max-width: 767px) {
            .card-detail img {
                width: 100%;
                /* Menyempitkan lebar saat di tampilan mobile */
            }
        }
    </style>
@endsection

<head>
    <title>Author | Status News</title>
</head>

@section('content')
    <form action="" class="d-flex gap-2">
        <div>
            <div class="position-relative d-flex">
                <div class="input-group">
                    <input type="text" name="search" class="form-control search-chat py-2 ps-5" style="width: 200px"
                        id="search-name" placeholder="Search" value="">
                    <i class="ti ti-search position-absolute top-50 translate-middle-y fs-6 text-dark ms-3"></i>
                </div>
            </div>
        </div>

        <div>
            <div class="d-flex gap-2">
                <select class="form-select" style="width: 200px" name="stat">
                    <option disabled selected value="">Pilih opsi</option>
                    <option value="panding">Panding</option>
                    <option value="active">Approved</option>
                    <option value="nonactive">Reject</option>
                    <option value="">Tampilkan semua</option>
                </select>
            </div>
        </div>

        <button type="submit" class="btn btn-outline-primary">Pilih</button>
    </form>
    <div class="tab-pane">
        @forelse ($news as $item)
            <div class="card p-4 mt-4">
                <div class="row">
                    <div class="col-lg-2">
                        <div class="" style="margin-left: 2%;">
                            @if ($item->photo)
                                <img src="{{ asset('storage/' . $item->photo) }}" alt="{{ $item->photo }}" style="object-fit:cover;" width="100%" height="120">
                            @else
                                Tidak Ada Foto
                            @endif
                        </div>
                    </div>
                    <div class="col-md-12 col-lg-8">
                        <div class="d-flex">

                            <div class="order-md-1" style="margin-left:20px;">
                                <h4>{{ $item->name }}</h4>
                                <p>{!! Illuminate\Support\Str::limit($item->content, $limit = 300, $end = '...')  !!}</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12 col-lg-2 mt-3 mt-lg-0 ">
                        <div class="d-flex justify-content-end">
                            <div class="text-md-right mt-md-0">
                                <span
                                    class="badge fw-bold fs-5 @if ($item->status == 'active') bg-light-success text-success
                                @elseif($item->status == 'reject')
                                bg-light-danger text-danger

                                @else
                                bg-light-warning fs-2 text-warning @endif">
                                    @if ($item->status == 'active')
                                        Aktif
                                    @elseif ($item->status == 'reject')
                                        Ditolak
                                    @elseif ($item->status == 'draft')
                                        Draft
                                    @else
                                        Panding
                                    @endif
                                </span>
                            </div>
                        </div>

                        <div class=" d-flex justify-content-end">
                            <svg xmlns="http://www.w3.org/2000/svg" width="23" height="23" viewBox="0 0 512 512">
                                <path
                                    d="M368.005 272h-96v96h96v-96zm-32-208v32h-160V64h-48v32h-24.01c-22.002 0-40 17.998-40 40v272c0 22.002 17.998 40 40 40h304.01c22.002 0 40-17.998 40-40V136c0-22.002-17.998-40-40-40h-24V64h-48zm72 344h-304.01V196h304.01v212z"
                                    fill="#0f4d89" />
                            </svg>
                            <p class="ms-2 fs-3"> Apr 25, 2023</p>
                        </div>

                        <div class="d-flex justify-content-end">
                            <a href="{{ route('profile.news.edit', ['id' => $item->slug]) }}" class="btn btn-sm m-1"
                                style="background-color: #0F4D8A;">
                                <svg xmlns="http://www.w3.org/2000/svg" width="23" height="30" viewBox="0 0 512 512">
                                    <path
                                        d="M64 368v80h80l235.727-235.729-79.999-79.998L64 368zm377.602-217.602c8.531-8.531 8.531-21.334 0-29.865l-50.135-50.135c-8.531-8.531-21.334-8.531-29.865 0l-39.468 39.469 79.999 79.998 39.469-39.467z"
                                        fill="#ffffff" />
                                </svg>
                            </a>
                            <button class="btn btn-sm m-1" style="background-color: #0F4D8A;">
                                <a href="{{ route('detail.news', ['news' => $item->slug]) }}">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="23" height="30"
                                        viewBox="0 0 512 512">
                                        <path fill="none" stroke="#ffffff" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="32"
                                            d="M255.66 112c-77.94 0-157.89 45.11-220.83 135.33a16 16 0 0 0-.27 17.77C82.92 340.8 161.8 400 255.66 400c92.84 0 173.34-59.38 221.79-135.25a16.14 16.14 0 0 0 0-17.47C428.89 172.28 347.8 112 255.66 112" />
                                        <circle cx="256" cy="256" r="80" fill="none" stroke="#ffffff"
                                            stroke-miterlimit="10" stroke-width="32" />
                                    </svg>
                                </a>
                            </button>

                            <form action="{{ route('profile.news.delete', ['news' => $item->id]) }}" method="POST">
                                @method('post')
                                @csrf
                                <button type="submit" class="btn btn-sm m-1" style="background-color: #C94F4F;"><svg
                                        xmlns="http://www.w3.org/2000/svg" width="23" height="30"
                                        viewBox="0 0 512 512">
                                        <path
                                            d="M128 405.429C128 428.846 147.198 448 170.667 448h170.667C364.802 448 384 428.846 384 405.429V160H128v245.429zM416 96h-80l-26.785-32H202.786L176 96H96v32h320V96z"
                                            fill="#ffffff" />
                                    </svg></button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @empty
        @endforelse
    </div>
@endsection

@section('script')
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>


    <script>
        $(document).ready(function() {
            $('#content').summernote({
                height: 400,
                toolbar: [
                    ['style', ['style']],
                    ['font', ['bold', 'underline', 'clear']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['table', ['table']],
                    ['insert', ['link', 'picture', 'video']],
                    ['view', ['fullscreen', 'codeview', 'help']]
                ]

            });
        });
    </script>
@endsection

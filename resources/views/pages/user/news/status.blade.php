@extends('layouts.user.sidebar')

@section('content')

<div class="card shadow-sm position-relative overflow-hidden"  style="background-color: #175A95;">
    <div class="card-body px-4 py-4">
      <div class="row justify-content-between">
        <div class="col-8 text-white">
          <h4 class="fw-semibold mb-3 mt-2 text-white">Status Berita</h4>
            <p>Status berita yang di ajukan ditentukan admin</p>
        </div>
        <div class="col-3">
          <div class="text-center mb-n4">
            <img src="{{asset('assets/img/bg-ajuan.svg')}}" width="250px" alt="" class="img-fluid">
          </div>
        </div>
      </div>
    </div>
</div>

<div class="gap-2">
    <form class="d-flex gap-2">
        <div class="position-relative">
            <div class="input-group">
                <input type="text" name="search" class="form-control search-chat py-2 ps-5" id="search-name"
                    placeholder="Search">
                <i class="ti ti-search position-absolute top-50 translate-middle-y fs-6 text-dark ms-3"></i>
                <button class="btn px-4 me-2" style="background-color: #C7C7C7;">Cari</button>
            </div>
        </div>

        <div class="d-flex gap-2">
            <select name="status" class="form-select" id="search-status">
                <option value="">Pending</option>
                <option value="true">Blokir</option>
                <option value="false">Aktif</option>
            </select>
        </div>
    </form>
</div>

<div class="card p-4 mt-4">
    <div class="row">
        <div class="col-lg-2">
            <div class="mb-2">
                {{-- @if ($item->photo) --}}
                    <img src="{{asset('assets/img/news/news-1.webp')}}" style="object-fit:cover;" width="100%" height="120">
                {{-- @else
                    Tidak Ada Foto
                @endif --}}
            </div>
        </div>
        <div class="col-md-12 col-lg-8">
            <div class="d-flex">

                <div>
                    <h4>Judul berita</h4>
                    <p>isi berita isi berita isi berita isi berita isi berita isi berita isi berita isi berita isi berita isi berita isi berita isi berita isi berita isi berita isi berita isi berita isi berita isi berita isi berita </p>
                </div>
            </div>
        </div>

        <div class="col-md-12 col-lg-2 mt-3 mt-lg-0 ">
            <div class="d-flex justify-content-end">
                <div class="text-md-right mt-md-0">
                    {{-- <span
                        class="badge fw-bold fs-5 @if ($item->status == 'active') bg-light-success text-success
                    @elseif($item->status == 'reject')
                    bg-light-danger text-danger
                    @elseif ($item->status == 'draft')
                    bg-light-secondary text-secondary
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
                    </span> --}}
                </div>
            </div>

            <div class="mt-3 d-flex justify-content-end">
                <svg xmlns="http://www.w3.org/2000/svg" width="23" height="23" viewBox="0 0 512 512">
                    <path
                        d="M368.005 272h-96v96h96v-96zm-32-208v32h-160V64h-48v32h-24.01c-22.002 0-40 17.998-40 40v272c0 22.002 17.998 40 40 40h304.01c22.002 0 40-17.998 40-40V136c0-22.002-17.998-40-40-40h-24V64h-48zm72 344h-304.01V196h304.01v212z"
                        fill="#0f4d89" />
                </svg>
                <p class="ms-2 fs-3"> Apr 25, 2023</p>
            </div>

            <div class="d-flex justify-content-end">
                <button class="btn btn-sm m-1" style="background-color: #0F4D8A;">
                    <a href="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="23"
                            viewBox="0 0 512 512">
                            <path fill="none" stroke="#ffffff" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="32"
                                d="M255.66 112c-77.94 0-157.89 45.11-220.83 135.33a16 16 0 0 0-.27 17.77C82.92 340.8 161.8 400 255.66 400c92.84 0 173.34-59.38 221.79-135.25a16.14 16.14 0 0 0 0-17.47C428.89 172.28 347.8 112 255.66 112" />
                            <circle cx="256" cy="256" r="80" fill="none" stroke="#ffffff"
                                stroke-miterlimit="10" stroke-width="32" />
                        </svg>
                    </a>
                </button>

                <a href="" class="btn btn-sm m-1"
                    style="background-color: #FFD643;">
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="23" viewBox="0 0 512 512">
                        <path
                            d="M64 368v80h80l235.727-235.729-79.999-79.998L64 368zm377.602-217.602c8.531-8.531 8.531-21.334 0-29.865l-50.135-50.135c-8.531-8.531-21.334-8.531-29.865 0l-39.468 39.469 79.999 79.998 39.469-39.467z"
                            fill="#ffffff" />
                    </svg>
                </a>

                <form action="" method="POST">
                    @method('post')
                    @csrf
                    <button type="submit" class="btn btn-sm m-1" style="background-color: #C94F4F;"><svg
                            xmlns="http://www.w3.org/2000/svg" width="18" height="23"
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

<div class="card p-4 mt-4">
    <div class="row">
        <div class="col-lg-2">
            <div class="mb-2">
                {{-- @if ($item->photo) --}}
                    <img src="{{asset('assets/img/news/news-1.webp')}}" style="object-fit:cover;" width="100%" height="120">
                {{-- @else
                    Tidak Ada Foto
                @endif --}}
            </div>
        </div>
        <div class="col-md-12 col-lg-8">
            <div class="d-flex">

                <div>
                    <h4>Judul berita</h4>
                    <p>isi berita isi berita isi berita isi berita isi berita isi berita isi berita isi berita isi berita isi berita isi berita isi berita isi berita isi berita isi berita isi berita isi berita isi berita isi berita </p>
                </div>
            </div>
        </div>

        <div class="col-md-12 col-lg-2 mt-3 mt-lg-0 ">
            <div class="d-flex justify-content-end">
                <div class="text-md-right mt-md-0">
                    {{-- <span
                        class="badge fw-bold fs-5 @if ($item->status == 'active') bg-light-success text-success
                    @elseif($item->status == 'reject')
                    bg-light-danger text-danger
                    @elseif ($item->status == 'draft')
                    bg-light-secondary text-secondary
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
                    </span> --}}
                </div>
            </div>

            <div class="mt-3 d-flex justify-content-end">
                <svg xmlns="http://www.w3.org/2000/svg" width="23" height="23" viewBox="0 0 512 512">
                    <path
                        d="M368.005 272h-96v96h96v-96zm-32-208v32h-160V64h-48v32h-24.01c-22.002 0-40 17.998-40 40v272c0 22.002 17.998 40 40 40h304.01c22.002 0 40-17.998 40-40V136c0-22.002-17.998-40-40-40h-24V64h-48zm72 344h-304.01V196h304.01v212z"
                        fill="#0f4d89" />
                </svg>
                <p class="ms-2 fs-3"> Apr 25, 2023</p>
            </div>

            <div class="d-flex justify-content-end">
                <button class="btn btn-sm m-1" style="background-color: #0F4D8A;">
                    <a href="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="23"
                            viewBox="0 0 512 512">
                            <path fill="none" stroke="#ffffff" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="32"
                                d="M255.66 112c-77.94 0-157.89 45.11-220.83 135.33a16 16 0 0 0-.27 17.77C82.92 340.8 161.8 400 255.66 400c92.84 0 173.34-59.38 221.79-135.25a16.14 16.14 0 0 0 0-17.47C428.89 172.28 347.8 112 255.66 112" />
                            <circle cx="256" cy="256" r="80" fill="none" stroke="#ffffff"
                                stroke-miterlimit="10" stroke-width="32" />
                        </svg>
                    </a>
                </button>

                <a href="" class="btn btn-sm m-1"
                    style="background-color: #FFD643;">
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="23" viewBox="0 0 512 512">
                        <path
                            d="M64 368v80h80l235.727-235.729-79.999-79.998L64 368zm377.602-217.602c8.531-8.531 8.531-21.334 0-29.865l-50.135-50.135c-8.531-8.531-21.334-8.531-29.865 0l-39.468 39.469 79.999 79.998 39.469-39.467z"
                            fill="#ffffff" />
                    </svg>
                </a>

                <form action="" method="POST">
                    @method('post')
                    @csrf
                    <button type="submit" class="btn btn-sm m-1" style="background-color: #C94F4F;"><svg
                            xmlns="http://www.w3.org/2000/svg" width="18" height="23"
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
<div class="card p-4 mt-4">
    <div class="row">
        <div class="col-lg-2">
            <div class="mb-2">
                {{-- @if ($item->photo) --}}
                    <img src="{{asset('assets/img/news/news-1.webp')}}" style="object-fit:cover;" width="100%" height="120">
                {{-- @else
                    Tidak Ada Foto
                @endif --}}
            </div>
        </div>
        <div class="col-md-12 col-lg-8">
            <div class="d-flex">

                <div>
                    <h4>Judul berita</h4>
                    <p>isi berita isi berita isi berita isi berita isi berita isi berita isi berita isi berita isi berita isi berita isi berita isi berita isi berita isi berita isi berita isi berita isi berita isi berita isi berita </p>
                </div>
            </div>
        </div>

        <div class="col-md-12 col-lg-2 mt-3 mt-lg-0 ">
            <div class="d-flex justify-content-end">
                <div class="text-md-right mt-md-0">
                    {{-- <span
                        class="badge fw-bold fs-5 @if ($item->status == 'active') bg-light-success text-success
                    @elseif($item->status == 'reject')
                    bg-light-danger text-danger
                    @elseif ($item->status == 'draft')
                    bg-light-secondary text-secondary
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
                    </span> --}}
                </div>
            </div>

            <div class="mt-3 d-flex justify-content-end">
                <svg xmlns="http://www.w3.org/2000/svg" width="23" height="23" viewBox="0 0 512 512">
                    <path
                        d="M368.005 272h-96v96h96v-96zm-32-208v32h-160V64h-48v32h-24.01c-22.002 0-40 17.998-40 40v272c0 22.002 17.998 40 40 40h304.01c22.002 0 40-17.998 40-40V136c0-22.002-17.998-40-40-40h-24V64h-48zm72 344h-304.01V196h304.01v212z"
                        fill="#0f4d89" />
                </svg>
                <p class="ms-2 fs-3"> Apr 25, 2023</p>
            </div>

            <div class="d-flex justify-content-end">
                <button class="btn btn-sm m-1" style="background-color: #0F4D8A;">
                    <a href="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="23"
                            viewBox="0 0 512 512">
                            <path fill="none" stroke="#ffffff" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="32"
                                d="M255.66 112c-77.94 0-157.89 45.11-220.83 135.33a16 16 0 0 0-.27 17.77C82.92 340.8 161.8 400 255.66 400c92.84 0 173.34-59.38 221.79-135.25a16.14 16.14 0 0 0 0-17.47C428.89 172.28 347.8 112 255.66 112" />
                            <circle cx="256" cy="256" r="80" fill="none" stroke="#ffffff"
                                stroke-miterlimit="10" stroke-width="32" />
                        </svg>
                    </a>
                </button>

                <a href="" class="btn btn-sm m-1"
                    style="background-color: #FFD643;">
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="23" viewBox="0 0 512 512">
                        <path
                            d="M64 368v80h80l235.727-235.729-79.999-79.998L64 368zm377.602-217.602c8.531-8.531 8.531-21.334 0-29.865l-50.135-50.135c-8.531-8.531-21.334-8.531-29.865 0l-39.468 39.469 79.999 79.998 39.469-39.467z"
                            fill="#ffffff" />
                    </svg>
                </a>

                <form action="" method="POST">
                    @method('post')
                    @csrf
                    <button type="submit" class="btn btn-sm m-1" style="background-color: #C94F4F;"><svg
                            xmlns="http://www.w3.org/2000/svg" width="18" height="23"
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


@endsection
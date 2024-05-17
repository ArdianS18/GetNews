@extends('layouts.admin.app')
@section('style')
<style>
    .border-primary {
        border-bottom: 2px solid #41739e !important
    }

    .border-danger {
        border-bottom: 2px solid #e68888 !important
    }

    .border-info {
        border-bottom: 2px solid #bacff0 !important
    }

    .border-warning {
        border-bottom: 2px solid #fce287 !important
    }
</style>
<link rel="stylesheet" href="{{ 'admin/dist/libs/prismjs/themes/prism-okaidia.min.css' }}">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
@endsection


<head>
    <title>Admin | Dashboard</title>
</head>


@section('content')
<div class="row">
    <div class="col-lg-3 col-md-6">
        <div class="card border-bottom border-primary">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div>
                        <h2 class="fs-7">{{ $visitor }}</h2>
                        <h5 class="fw-medium mb-0" style="color: #41739e;">Jumlah Pengunjung</h5>
                    </div>
                    <div class="ms-auto">
                        <img src="{{ asset('assets/img/user-admin.svg')}}" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-3 col-md-6">
        <div class="card border-bottom border-danger">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div>
                        <h2 class="fs-7">{{ $authors }}</h2>
                        <h5 class="fw-medium mb-0" style="color: #e68888;">Jumlah Penulis</h5>
                    </div>
                    <div class="ms-auto">
                        <div class="ms-auto">
                            <img src="{{ asset('assets/img/author-admin.svg')}}" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-3 col-md-6">
        <div class="card border-bottom border-info">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div>
                        <h2 class="fs-7">{{ $users }}</h2>
                        <h5 class="fw-medium mb-0" style="color: #bacff0;">Jumlah Pengguna</h5>
                    </div>
                    <div class="ms-auto">
                        <img src="{{ asset('assets/img/users-admin.svg')}}" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-3 col-md-6">
        <div class="card border-bottom border-warning">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div>
                        <h2 class="fs-7">{{ $news_count }}</h2>
                        <h5 class="fw-medium mb-0" style="color: #fce287;">Jumlah Artikel</h5>
                    </div>
                    <div class="ms-auto">
                        <span style="color: #fce287;" class="display-6"><i class="ti ti-file-text"></i></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-9 col-sm-12">
        <div class="card">
            <div class="card-body">
                <div class="col-md-12 col-lg-12">
                    <h4 class="mb-5">Berita Trending</h4>
                    <div class="row">
                        @forelse ($news as $news)
                        <div class="col-md-12 col-lg-6 mb-3">
                            <div class="mb-2" style="max-width: 540px;">
                                <div class="row g-2">
                                    <div class="col-md-4">
                                        <img src="{{ asset('storage/' . $news->photo) }}" style="width: 100%; height: 100; object-fit:cover;" alt="">
                                    </div>
                                    <div class="col-md-8">
                                        <div class="card-body p-2">
                                            <h5 class="card-text">
                                                {!! Illuminate\Support\Str::limit($news->name, $limit = 60, $end = '...') !!}
                                            </h5>
                                            <div class="d-flex gap-3 align-items-center ms-0">
                                                <p class="card-text m-0"><svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 2048 2048">
                                                        <path fill="#DD1818" d="M1536 171h341v1877H0V171h341V0h171v171h853V0h171zm171 1706V683H171v1194zm0-1365V341H171v171z" />
                                                    </svg><small class="ms-1">{{ $news->created_at_formatted }}</small>
                                                </p>
                                                <p class="card-text"><svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24">
                                                        <path fill="#DD1818" d="M12 9a3 3 0 0 1 3 3a3 3 0 0 1-3 3a3 3 0 0 1-3-3a3 3 0 0 1 3-3m0-4.5c5 0 9.27 3.11 11 7.5c-1.73 4.39-6 7.5-11 7.5S2.73 16.39 1 12c1.73-4.39 6-7.5 11-7.5M3.18 12a9.821 9.821 0 0 0 17.64 0a9.821 9.821 0 0 0-17.64 0" />
                                                    </svg><small class="mt-1 ms-1">{{ $news->views }}</small></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @empty
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3 col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="mb-5">Kategori Trending</h4>
                <div>
                    @forelse ($categories as $index => $category)
                    <div class="fs-5 mb-4 mt-5 d-flex justify-content-between">
                        <div>
                            {{ $category->name }}
                        </div>
                        <div>
                            @if ($index == 1 || $index == 2)
                            <span class="badge bg-light-warning text-warning">{{ $category->news_categories_count }}</span>
                            @elseif ($index == 3 || $index == 4)
                            <span class="badge bg-light-success text-success">{{ $category->news_categories_count }}</span>
                            @else
                            <span class="badge bg-light-danger text-danger">{{ $category->news_categories_count }}</span>
                            @endif
                        </div>
                    </div>
                    @empty
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-4 col-sm-12">
        <div class="card">
            <div class="card-body">
                <h4 class="mb-5">Penulis Terbanyak</h4>
                @forelse ($authors1 as $author)
                <div>
                    <div class="d-flex justify-content-between mb-3">
                        <div class="d-flex align-items-center">
                            <img src="{{ asset($author->photo ? 'storage/' . $author->photo : 'default.png') }}" class="rounded-circle mb-3 img" style="object-fit: cover" alt="Image" width="40px" height="40px" />
                            <div class="ms-3">
                                <p class="fs-4 fw-semibold fs-2 student-name">{{ $author->name }}</p>
                            </div>
                        </div>
                        <div>
                            <div>
                                <span class="badge bg-light-danger text-danger">{{ $author->count }}</span>
                            </div>
                        </div>
                    </div>
                </div>
                @empty
                @endforelse
            </div>
        </div>
    </div>
    <div class="col-md-8 col-12">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-12">
                        <h4>Statistik Banyak Berita</h4>
                        <div id="chart-writer">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4>Statistik Pertambahan Jumlah Pengunjung</h4>
                <div class="" id="chart-pengunjung"></div>
                <div class="" id="name"></div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <h3 class="mb-3">Fitur Berlangganan</h3>
    <div class="col-lg-4 col-md-6 col-sm-12 card-hover">
        <div class="card">
            <div class="card-header text-center">
                <h4>Lorem Ipsum dolor</h4>
            </div>
            <div class="d-flex justify-content-center">
                <img src="{{ asset('premium.svg') }}" width="50%" height="200" style="object-fit:cover" class="mb-4" alt="...">
            </div>
            <div class="d-flex align-items-center">
                <div class="ms-auto">
                    <div class="d-flex justify-content-end">

                    </div>
                </div>
            </div>
            <div class="ms-4 d-flex justify-content-center mb-3 mt-2">
                <h2 class="card-text text-info">Rp 170.000</h2>
                <h5 class="mb-0 mt-2 text-info">/bulan</h5>
            </div>
            <div class="px-4">
                <div class="row">

                    <div class="col-lg-12 mb-3" style="display: flex; align-items: center;">
                        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 36 35" fill="none" style="flex-shrink: 0; margin-right: 10px;">
                            <path d="M18 3.28125C9.93586 3.28125 3.375 9.65986 3.375 17.5C3.375 25.3401 9.93586 31.7188 18 31.7188C26.0641 31.7188 32.625 25.3401 32.625 17.5C32.625 9.65986 26.0641 3.28125 18 3.28125ZM25.6113 12.7347L16.1613 23.6722C16.0577 23.7922 15.9287 23.8892 15.7831 23.9565C15.6375 24.0239 15.4788 24.06 15.3176 24.0625H15.2986C15.1409 24.0624 14.985 24.0302 14.841 23.9677C14.6969 23.9053 14.568 23.8142 14.4626 23.7002L10.4126 19.3252C10.3097 19.2191 10.2297 19.0942 10.1772 18.9576C10.1248 18.821 10.1009 18.6757 10.1071 18.53C10.1132 18.3844 10.1493 18.2414 10.2131 18.1095C10.2769 17.9776 10.3671 17.8594 10.4786 17.7619C10.59 17.6644 10.7204 17.5895 10.862 17.5417C11.0037 17.4938 11.1537 17.474 11.3033 17.4834C11.453 17.4927 11.5992 17.5311 11.7333 17.5962C11.8675 17.6612 11.9869 17.7517 12.0846 17.8623L15.2691 21.3021L23.8887 11.3278C24.082 11.1105 24.3556 10.9759 24.6502 10.9531C24.9448 10.9302 25.2368 11.021 25.4631 11.2059C25.6894 11.3907 25.8319 11.6547 25.8596 11.9407C25.8873 12.2268 25.7981 12.512 25.6113 12.7347Z" fill="#13DEB9"></path>
                        </svg>
                        <p class="fs-3 fw-semibold" style="margin: 0; flex-grow: 1;">Daftar Hadir Tamu</p>
                    </div>
                    <div class="col-lg-12 mb-3" style="display: flex; align-items: center;">
                        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 36 35" fill="none" style="flex-shrink: 0; margin-right: 10px;">
                            <path d="M18 3.28125C9.93586 3.28125 3.375 9.65986 3.375 17.5C3.375 25.3401 9.93586 31.7188 18 31.7188C26.0641 31.7188 32.625 25.3401 32.625 17.5C32.625 9.65986 26.0641 3.28125 18 3.28125ZM25.6113 12.7347L16.1613 23.6722C16.0577 23.7922 15.9287 23.8892 15.7831 23.9565C15.6375 24.0239 15.4788 24.06 15.3176 24.0625H15.2986C15.1409 24.0624 14.985 24.0302 14.841 23.9677C14.6969 23.9053 14.568 23.8142 14.4626 23.7002L10.4126 19.3252C10.3097 19.2191 10.2297 19.0942 10.1772 18.9576C10.1248 18.821 10.1009 18.6757 10.1071 18.53C10.1132 18.3844 10.1493 18.2414 10.2131 18.1095C10.2769 17.9776 10.3671 17.8594 10.4786 17.7619C10.59 17.6644 10.7204 17.5895 10.862 17.5417C11.0037 17.4938 11.1537 17.474 11.3033 17.4834C11.453 17.4927 11.5992 17.5311 11.7333 17.5962C11.8675 17.6612 11.9869 17.7517 12.0846 17.8623L15.2691 21.3021L23.8887 11.3278C24.082 11.1105 24.3556 10.9759 24.6502 10.9531C24.9448 10.9302 25.2368 11.021 25.4631 11.2059C25.6894 11.3907 25.8319 11.6547 25.8596 11.9407C25.8873 12.2268 25.7981 12.512 25.6113 12.7347Z" fill="#13DEB9"></path>
                        </svg>
                        <p class="fs-3 fw-semibold" style="margin: 0; flex-grow: 1;">Daftar Hadir Tamu</p>
                    </div>
                    <div class="col-lg-12 mb-3" style="display: flex; align-items: center;">
                        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 36 35" fill="none" style="flex-shrink: 0; margin-right: 10px;">
                            <path d="M18 3.28125C9.93586 3.28125 3.375 9.65986 3.375 17.5C3.375 25.3401 9.93586 31.7188 18 31.7188C26.0641 31.7188 32.625 25.3401 32.625 17.5C32.625 9.65986 26.0641 3.28125 18 3.28125ZM25.6113 12.7347L16.1613 23.6722C16.0577 23.7922 15.9287 23.8892 15.7831 23.9565C15.6375 24.0239 15.4788 24.06 15.3176 24.0625H15.2986C15.1409 24.0624 14.985 24.0302 14.841 23.9677C14.6969 23.9053 14.568 23.8142 14.4626 23.7002L10.4126 19.3252C10.3097 19.2191 10.2297 19.0942 10.1772 18.9576C10.1248 18.821 10.1009 18.6757 10.1071 18.53C10.1132 18.3844 10.1493 18.2414 10.2131 18.1095C10.2769 17.9776 10.3671 17.8594 10.4786 17.7619C10.59 17.6644 10.7204 17.5895 10.862 17.5417C11.0037 17.4938 11.1537 17.474 11.3033 17.4834C11.453 17.4927 11.5992 17.5311 11.7333 17.5962C11.8675 17.6612 11.9869 17.7517 12.0846 17.8623L15.2691 21.3021L23.8887 11.3278C24.082 11.1105 24.3556 10.9759 24.6502 10.9531C24.9448 10.9302 25.2368 11.021 25.4631 11.2059C25.6894 11.3907 25.8319 11.6547 25.8596 11.9407C25.8873 12.2268 25.7981 12.512 25.6113 12.7347Z" fill="#13DEB9"></path>
                        </svg>
                        <p class="fs-3 fw-semibold" style="margin: 0; flex-grow: 1;">Daftar Hadir Tamu</p>
                    </div>

                </div>

            </div>
        </div>
    </div>
    <div class="col-lg-4 col-md-6 col-sm-12 card-hover">
        <div class="card">
            <div class="card-header text-center">
                <h4>Lorem Ipsum dolor</h4>
            </div>
            <div class="d-flex justify-content-center">
                <img src="{{ asset('premium.svg') }}" width="50%" height="200" style="object-fit:cover" class="mb-4" alt="...">
            </div>
            <div class="d-flex align-items-center">
                <div class="ms-auto">
                    <div class="d-flex justify-content-end">

                    </div>
                </div>
            </div>
            <div class="ms-4 d-flex justify-content-center mb-3 mt-2">
                <h2 class="card-text text-info">Rp 170.000</h2>
                <h5 class="mb-0 mt-2 text-info">/bulan</h5>
            </div>
            <div class="px-4">
                <div class="row">

                    <div class="col-lg-12 mb-3" style="display: flex; align-items: center;">
                        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 36 35" fill="none" style="flex-shrink: 0; margin-right: 10px;">
                            <path d="M18 3.28125C9.93586 3.28125 3.375 9.65986 3.375 17.5C3.375 25.3401 9.93586 31.7188 18 31.7188C26.0641 31.7188 32.625 25.3401 32.625 17.5C32.625 9.65986 26.0641 3.28125 18 3.28125ZM25.6113 12.7347L16.1613 23.6722C16.0577 23.7922 15.9287 23.8892 15.7831 23.9565C15.6375 24.0239 15.4788 24.06 15.3176 24.0625H15.2986C15.1409 24.0624 14.985 24.0302 14.841 23.9677C14.6969 23.9053 14.568 23.8142 14.4626 23.7002L10.4126 19.3252C10.3097 19.2191 10.2297 19.0942 10.1772 18.9576C10.1248 18.821 10.1009 18.6757 10.1071 18.53C10.1132 18.3844 10.1493 18.2414 10.2131 18.1095C10.2769 17.9776 10.3671 17.8594 10.4786 17.7619C10.59 17.6644 10.7204 17.5895 10.862 17.5417C11.0037 17.4938 11.1537 17.474 11.3033 17.4834C11.453 17.4927 11.5992 17.5311 11.7333 17.5962C11.8675 17.6612 11.9869 17.7517 12.0846 17.8623L15.2691 21.3021L23.8887 11.3278C24.082 11.1105 24.3556 10.9759 24.6502 10.9531C24.9448 10.9302 25.2368 11.021 25.4631 11.2059C25.6894 11.3907 25.8319 11.6547 25.8596 11.9407C25.8873 12.2268 25.7981 12.512 25.6113 12.7347Z" fill="#13DEB9"></path>
                        </svg>
                        <p class="fs-3 fw-semibold" style="margin: 0; flex-grow: 1;">Daftar Hadir Tamu</p>
                    </div>
                    <div class="col-lg-12 mb-3" style="display: flex; align-items: center;">
                        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 36 35" fill="none" style="flex-shrink: 0; margin-right: 10px;">
                            <path d="M18 3.28125C9.93586 3.28125 3.375 9.65986 3.375 17.5C3.375 25.3401 9.93586 31.7188 18 31.7188C26.0641 31.7188 32.625 25.3401 32.625 17.5C32.625 9.65986 26.0641 3.28125 18 3.28125ZM25.6113 12.7347L16.1613 23.6722C16.0577 23.7922 15.9287 23.8892 15.7831 23.9565C15.6375 24.0239 15.4788 24.06 15.3176 24.0625H15.2986C15.1409 24.0624 14.985 24.0302 14.841 23.9677C14.6969 23.9053 14.568 23.8142 14.4626 23.7002L10.4126 19.3252C10.3097 19.2191 10.2297 19.0942 10.1772 18.9576C10.1248 18.821 10.1009 18.6757 10.1071 18.53C10.1132 18.3844 10.1493 18.2414 10.2131 18.1095C10.2769 17.9776 10.3671 17.8594 10.4786 17.7619C10.59 17.6644 10.7204 17.5895 10.862 17.5417C11.0037 17.4938 11.1537 17.474 11.3033 17.4834C11.453 17.4927 11.5992 17.5311 11.7333 17.5962C11.8675 17.6612 11.9869 17.7517 12.0846 17.8623L15.2691 21.3021L23.8887 11.3278C24.082 11.1105 24.3556 10.9759 24.6502 10.9531C24.9448 10.9302 25.2368 11.021 25.4631 11.2059C25.6894 11.3907 25.8319 11.6547 25.8596 11.9407C25.8873 12.2268 25.7981 12.512 25.6113 12.7347Z" fill="#13DEB9"></path>
                        </svg>
                        <p class="fs-3 fw-semibold" style="margin: 0; flex-grow: 1;">Daftar Hadir Tamu</p>
                    </div>
                    <div class="col-lg-12 mb-3" style="display: flex; align-items: center;">
                        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 36 35" fill="none" style="flex-shrink: 0; margin-right: 10px;">
                            <path d="M18 3.28125C9.93586 3.28125 3.375 9.65986 3.375 17.5C3.375 25.3401 9.93586 31.7188 18 31.7188C26.0641 31.7188 32.625 25.3401 32.625 17.5C32.625 9.65986 26.0641 3.28125 18 3.28125ZM25.6113 12.7347L16.1613 23.6722C16.0577 23.7922 15.9287 23.8892 15.7831 23.9565C15.6375 24.0239 15.4788 24.06 15.3176 24.0625H15.2986C15.1409 24.0624 14.985 24.0302 14.841 23.9677C14.6969 23.9053 14.568 23.8142 14.4626 23.7002L10.4126 19.3252C10.3097 19.2191 10.2297 19.0942 10.1772 18.9576C10.1248 18.821 10.1009 18.6757 10.1071 18.53C10.1132 18.3844 10.1493 18.2414 10.2131 18.1095C10.2769 17.9776 10.3671 17.8594 10.4786 17.7619C10.59 17.6644 10.7204 17.5895 10.862 17.5417C11.0037 17.4938 11.1537 17.474 11.3033 17.4834C11.453 17.4927 11.5992 17.5311 11.7333 17.5962C11.8675 17.6612 11.9869 17.7517 12.0846 17.8623L15.2691 21.3021L23.8887 11.3278C24.082 11.1105 24.3556 10.9759 24.6502 10.9531C24.9448 10.9302 25.2368 11.021 25.4631 11.2059C25.6894 11.3907 25.8319 11.6547 25.8596 11.9407C25.8873 12.2268 25.7981 12.512 25.6113 12.7347Z" fill="#13DEB9"></path>
                        </svg>
                        <p class="fs-3 fw-semibold" style="margin: 0; flex-grow: 1;">Daftar Hadir Tamu</p>
                    </div>

                </div>

            </div>
        </div>
    </div>
    <div class="col-lg-4 col-md-6 col-sm-12 card-hover">
        <div class="card">
            <div class="card-header text-center">
                <h4>Lorem Ipsum dolor</h4>
            </div>
            <div class="d-flex justify-content-center">
                <img src="{{ asset('premium.svg') }}" width="50%" height="200" style="object-fit:cover" class="mb-4" alt="...">
            </div>
            <div class="d-flex align-items-center">
                <div class="ms-auto">
                    <div class="d-flex justify-content-end">

                    </div>
                </div>
            </div>
            <div class="ms-4 d-flex justify-content-center mb-3 mt-2">
                <h2 class="card-text text-info">Rp 170.000</h2>
                <h5 class="mb-0 mt-2 text-info">/bulan</h5>
            </div>
            <div class="px-4">
                <div class="row">

                    <div class="col-lg-12 mb-3" style="display: flex; align-items: center;">
                        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 36 35" fill="none" style="flex-shrink: 0; margin-right: 10px;">
                            <path d="M18 3.28125C9.93586 3.28125 3.375 9.65986 3.375 17.5C3.375 25.3401 9.93586 31.7188 18 31.7188C26.0641 31.7188 32.625 25.3401 32.625 17.5C32.625 9.65986 26.0641 3.28125 18 3.28125ZM25.6113 12.7347L16.1613 23.6722C16.0577 23.7922 15.9287 23.8892 15.7831 23.9565C15.6375 24.0239 15.4788 24.06 15.3176 24.0625H15.2986C15.1409 24.0624 14.985 24.0302 14.841 23.9677C14.6969 23.9053 14.568 23.8142 14.4626 23.7002L10.4126 19.3252C10.3097 19.2191 10.2297 19.0942 10.1772 18.9576C10.1248 18.821 10.1009 18.6757 10.1071 18.53C10.1132 18.3844 10.1493 18.2414 10.2131 18.1095C10.2769 17.9776 10.3671 17.8594 10.4786 17.7619C10.59 17.6644 10.7204 17.5895 10.862 17.5417C11.0037 17.4938 11.1537 17.474 11.3033 17.4834C11.453 17.4927 11.5992 17.5311 11.7333 17.5962C11.8675 17.6612 11.9869 17.7517 12.0846 17.8623L15.2691 21.3021L23.8887 11.3278C24.082 11.1105 24.3556 10.9759 24.6502 10.9531C24.9448 10.9302 25.2368 11.021 25.4631 11.2059C25.6894 11.3907 25.8319 11.6547 25.8596 11.9407C25.8873 12.2268 25.7981 12.512 25.6113 12.7347Z" fill="#13DEB9"></path>
                        </svg>
                        <p class="fs-3 fw-semibold" style="margin: 0; flex-grow: 1;">Daftar Hadir Tamu</p>
                    </div>
                    <div class="col-lg-12 mb-3" style="display: flex; align-items: center;">
                        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 36 35" fill="none" style="flex-shrink: 0; margin-right: 10px;">
                            <path d="M18 3.28125C9.93586 3.28125 3.375 9.65986 3.375 17.5C3.375 25.3401 9.93586 31.7188 18 31.7188C26.0641 31.7188 32.625 25.3401 32.625 17.5C32.625 9.65986 26.0641 3.28125 18 3.28125ZM25.6113 12.7347L16.1613 23.6722C16.0577 23.7922 15.9287 23.8892 15.7831 23.9565C15.6375 24.0239 15.4788 24.06 15.3176 24.0625H15.2986C15.1409 24.0624 14.985 24.0302 14.841 23.9677C14.6969 23.9053 14.568 23.8142 14.4626 23.7002L10.4126 19.3252C10.3097 19.2191 10.2297 19.0942 10.1772 18.9576C10.1248 18.821 10.1009 18.6757 10.1071 18.53C10.1132 18.3844 10.1493 18.2414 10.2131 18.1095C10.2769 17.9776 10.3671 17.8594 10.4786 17.7619C10.59 17.6644 10.7204 17.5895 10.862 17.5417C11.0037 17.4938 11.1537 17.474 11.3033 17.4834C11.453 17.4927 11.5992 17.5311 11.7333 17.5962C11.8675 17.6612 11.9869 17.7517 12.0846 17.8623L15.2691 21.3021L23.8887 11.3278C24.082 11.1105 24.3556 10.9759 24.6502 10.9531C24.9448 10.9302 25.2368 11.021 25.4631 11.2059C25.6894 11.3907 25.8319 11.6547 25.8596 11.9407C25.8873 12.2268 25.7981 12.512 25.6113 12.7347Z" fill="#13DEB9"></path>
                        </svg>
                        <p class="fs-3 fw-semibold" style="margin: 0; flex-grow: 1;">Daftar Hadir Tamu</p>
                    </div>
                    <div class="col-lg-12 mb-3" style="display: flex; align-items: center;">
                        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 36 35" fill="none" style="flex-shrink: 0; margin-right: 10px;">
                            <path d="M18 3.28125C9.93586 3.28125 3.375 9.65986 3.375 17.5C3.375 25.3401 9.93586 31.7188 18 31.7188C26.0641 31.7188 32.625 25.3401 32.625 17.5C32.625 9.65986 26.0641 3.28125 18 3.28125ZM25.6113 12.7347L16.1613 23.6722C16.0577 23.7922 15.9287 23.8892 15.7831 23.9565C15.6375 24.0239 15.4788 24.06 15.3176 24.0625H15.2986C15.1409 24.0624 14.985 24.0302 14.841 23.9677C14.6969 23.9053 14.568 23.8142 14.4626 23.7002L10.4126 19.3252C10.3097 19.2191 10.2297 19.0942 10.1772 18.9576C10.1248 18.821 10.1009 18.6757 10.1071 18.53C10.1132 18.3844 10.1493 18.2414 10.2131 18.1095C10.2769 17.9776 10.3671 17.8594 10.4786 17.7619C10.59 17.6644 10.7204 17.5895 10.862 17.5417C11.0037 17.4938 11.1537 17.474 11.3033 17.4834C11.453 17.4927 11.5992 17.5311 11.7333 17.5962C11.8675 17.6612 11.9869 17.7517 12.0846 17.8623L15.2691 21.3021L23.8887 11.3278C24.082 11.1105 24.3556 10.9759 24.6502 10.9531C24.9448 10.9302 25.2368 11.021 25.4631 11.2059C25.6894 11.3907 25.8319 11.6547 25.8596 11.9407C25.8873 12.2268 25.7981 12.512 25.6113 12.7347Z" fill="#13DEB9"></path>
                        </svg>
                        <p class="fs-3 fw-semibold" style="margin: 0; flex-grow: 1;">Daftar Hadir Tamu</p>
                    </div>

                </div>

            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script src="{{ asset('admin/dist/libs/apexcharts/dist/apexcharts.min.js') }}"></script>

<script>
    var monthlyData = <?php echo json_encode($news2); ?>;

    var monthlyDataString = JSON.stringify(monthlyData);

    var monthlyDataObj = JSON.parse(monthlyDataString);

    var values = [];
    for (var key in monthlyDataObj) {
        if (monthlyDataObj.hasOwnProperty(key)) {
            values.push(monthlyDataObj[key]);
        }
    }
    var options = {
        series: [{
            data: values,
        }],
        chart: {
            type: 'line',
            height: 350,
            zoom: {
                type: 'x',
                enabled: true,
                autoScaleYaxis: true
            },
        },
        plotOptions: {
            bar: {
                borderRadius: 4,
                horizontal: false,
            }
        },
        // title: {
        //     text: 'Penulis Terbanyak'
        // },
        dataLabels: {
            enabled: false
        },
        xaxis: {
            categories: ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September',
                'Oktober', 'November', 'Desember'
            ]
        }
    };

    var chart = new ApexCharts(document.querySelector("#chart-writer"), options);
    chart.render();


    var visitor = <?php echo json_encode($visitorChart); ?>;
    var monthlVisitorString = JSON.stringify(visitor);
    var monthlyDataVisitor = JSON.parse(monthlVisitorString);

    var visitorUnique = [];
    for (var key in monthlyDataVisitor) {
        if (monthlyDataVisitor.hasOwnProperty(key)) {
            visitorUnique.push(monthlyDataVisitor[key]); // Mengubah values menjadi visitorUnique
        }
    }

    var options = {
        series: [{
            name: "Pengunjung Unique",
            data: visitorUnique
        }],
        chart: {
            height: 350,
            type: 'line',
            zoom: {
                enabled: false
            }
        },
        dataLabels: {
            enabled: false
        },
        stroke: {
            curve: 'straight'
        },
        grid: {
            row: {
                colors: ['#f3f3f3', 'transparent'],
                opacity: 0.5
            },
        },
        xaxis: {
            categories: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agu', 'Sep', 'Okt', 'Nov', 'Des'],
        }
    };

    var chart = new ApexCharts(document.querySelector("#chart-pengunjung"), options);
    chart.render();
</script>
@endsection

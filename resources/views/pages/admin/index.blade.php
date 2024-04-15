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
@endsection


<head>
    <title>Admin | Dashboard</title>
</head>


@section('content')
    <div class="row">
        <div class="col-12 col-md-6 col-lg-3">
            <div class="card border-bottom border-primary">
                <div class="card-body">
                    <div class="text-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" viewBox="0 0 24 24">
                            <path fill=" #41739e"
                                d="M16 17v2H2v-2s0-4 7-4s7 4 7 4m-3.5-9.5A3.5 3.5 0 1 0 9 11a3.5 3.5 0 0 0 3.5-3.5m3.44 5.5A5.32 5.32 0 0 1 18 17v2h4v-2s0-3.63-6.06-4M15 4a3.39 3.39 0 0 0-1.93.59a5 5 0 0 1 0 5.82A3.39 3.39 0 0 0 15 11a3.5 3.5 0 0 0 0-7" />
                        </svg>
                    </div>
                    <div style="color: #41739e" class="text-center mt-2">
                        <h2>Jumlah Pengunjung</h2>
                        <h3 style="color: #41739e">530</h3>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-6 col-lg-3">
            <div class="card border-bottom border-danger">
                <div class="card-body">
                    <div class="text-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" viewBox="0 0 24 24">
                            <path fill="#e68888"
                                d="M14 20v-1.25q0-.4.163-.763t.437-.637l4.925-4.925q.225-.225.5-.325t.55-.1q.3 0 .575.113t.5.337l.925.925q.2.225.313.5t.112.55q0 .275-.1.563t-.325.512l-4.925 4.925q-.275.275-.637.425t-.763.15H15q-.425 0-.712-.288T14 20M4 19v-1.8q0-.85.438-1.562T5.6 14.55q1.55-.775 3.15-1.162T12 13q.925 0 1.825.113t1.8.362l-2.75 2.75q-.425.425-.65.975T12 18.35V20H5q-.425 0-.712-.288T4 19m16.575-3.6l.925-.975l-.925-.925l-.95.95zM12 12q-1.65 0-2.825-1.175T8 8q0-1.65 1.175-2.825T12 4q1.65 0 2.825 1.175T16 8q0 1.65-1.175 2.825T12 12" />
                        </svg>
                    </div>
                    <div style="color: #e68888" class="text-center mt-2">
                        <h2>Jumlah Penulis</h2>
                        <h3 style="color: #e68888">{{ $authors }}</h3>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-6 col-lg-3">
            <div class="card border-bottom border-info">
                <div class="card-body">
                    <div class="text-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" viewBox="0 0 24 24">
                            <path fill="#bacff0"
                                d="M12 12q-1.65 0-2.825-1.175T8 8q0-1.65 1.175-2.825T12 4q1.65 0 2.825 1.175T16 8q0 1.65-1.175 2.825T12 12m-8 8v-2.8q0-.85.438-1.562T5.6 14.55q1.55-.775 3.15-1.162T12 13q1.65 0 3.25.388t3.15 1.162q.725.375 1.163 1.088T20 17.2V20z" />
                        </svg>
                    </div>
                    <div style="color: #bacff0" class="text-center mt-2">
                        <h2>Jumlah User</h2>
                        <h3 style="color: #bacff0">{{ $users }}</h3>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-6 col-lg-3">
            <div class="card border-bottom border-warning">
                <div class="card-body">
                    <div class="text-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" viewBox="0 0 24 24">
                            <path fill="#fce287"
                                d="m22 3l-1.67 1.67L18.67 3L17 4.67L15.33 3l-1.66 1.67L12 3l-1.67 1.67L8.67 3L7 4.67L5.33 3L3.67 4.67L2 3v16c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V3zM11 19H4v-6h7v6zm9 0h-7v-2h7v2zm0-4h-7v-2h7v2zm0-4H4V8h16v3z" />
                        </svg>
                    </div>
                    <div style="color:#fce287" class="text-center mt-2">
                        <h2>Jumlah Berita</h2>
                        <h3 style="color:#fce287">{{ $news_count }}</h3>
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
                        <h4 class="mb-3">Berita</h4>
                        <div class="row">
                            @forelse ($news as $news)
                                <div class="col-md-12 col-lg-6 mb-3">
                                    <div class="" style="max-width: 540px;">
                                        <div class="row g-2">
                                            <div class="col-md-4">
                                                <img src="{{ asset('storage/' . $news->photo) }}"
                                                    style="width: 100%; height: auto;" alt="">
                                            </div>
                                            <div class="col-md-8">
                                                <div class="card-body p-2">
                                                    <p class="card-text">{{ $news->name }}
                                                    </p>
                                                    <div class="d-flex gap-3 align-items-center ms-0">
                                                        <p class="card-text m-0"><svg xmlns="http://www.w3.org/2000/svg"
                                                                width="15" height="15" viewBox="0 0 2048 2048">
                                                                <path fill="#0f4d8a"
                                                                    d="M1536 171h341v1877H0V171h341V0h171v171h853V0h171zm171 1706V683H171v1194zm0-1365V341H171v171z" />
                                                            </svg><small
                                                                style="color: #0f4d8a">{{ $news->created_at_formatted }}</small>
                                                        </p>
                                                        <p class="card-text"><svg xmlns="http://www.w3.org/2000/svg"
                                                                width="20" height="20" viewBox="0 0 24 24">
                                                                <path fill="#0f4d8a"
                                                                    d="M12 9a3 3 0 0 1 3 3a3 3 0 0 1-3 3a3 3 0 0 1-3-3a3 3 0 0 1 3-3m0-4.5c5 0 9.27 3.11 11 7.5c-1.73 4.39-6 7.5-11 7.5S2.73 16.39 1 12c1.73-4.39 6-7.5 11-7.5M3.18 12a9.821 9.821 0 0 0 17.64 0a9.821 9.821 0 0 0-17.64 0" />
                                                            </svg><small
                                                                style="color: #0f4d8a">{{ $news->views_count }}</small></p>
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
                    <h4>Kategori Trending</h4>
                    <div>
                        @forelse ($categories as $category)
                            <div class="fs-5 mb-3 mt-4 d-flex justify-content-between">
                                <div>
                                    {{ $category->name }}
                                </div>
                                <div>
                                    <span class="badge bg-light-danger text-danger">{{ $category->total }}</span>
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
                    <h4 class="mb-3">Penulis</h4>
                    @forelse ($authors1 as $author)
                        <div>
                            <div class="d-flex justify-content-between">
                                <div class="d-flex align-items-center">
                                    <img src="{{ asset($author->photo ? 'storage/' . $author->photo : 'default.png') }}"
                                        class="rounded-circle mb-3 img" alt="Image" width="40px" height="40px" />
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
                            <h4>Statistik</h4>
                            <div id="chart-writer">

                            </div>
                        </div>

                    </div>
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
                    <img src="{{ asset('premium.svg') }}" width="50%" height="200" style="object-fit:cover"
                        class="mb-4" alt="...">
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
                            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 36 35"
                                fill="none" style="flex-shrink: 0; margin-right: 10px;">
                                <path
                                    d="M18 3.28125C9.93586 3.28125 3.375 9.65986 3.375 17.5C3.375 25.3401 9.93586 31.7188 18 31.7188C26.0641 31.7188 32.625 25.3401 32.625 17.5C32.625 9.65986 26.0641 3.28125 18 3.28125ZM25.6113 12.7347L16.1613 23.6722C16.0577 23.7922 15.9287 23.8892 15.7831 23.9565C15.6375 24.0239 15.4788 24.06 15.3176 24.0625H15.2986C15.1409 24.0624 14.985 24.0302 14.841 23.9677C14.6969 23.9053 14.568 23.8142 14.4626 23.7002L10.4126 19.3252C10.3097 19.2191 10.2297 19.0942 10.1772 18.9576C10.1248 18.821 10.1009 18.6757 10.1071 18.53C10.1132 18.3844 10.1493 18.2414 10.2131 18.1095C10.2769 17.9776 10.3671 17.8594 10.4786 17.7619C10.59 17.6644 10.7204 17.5895 10.862 17.5417C11.0037 17.4938 11.1537 17.474 11.3033 17.4834C11.453 17.4927 11.5992 17.5311 11.7333 17.5962C11.8675 17.6612 11.9869 17.7517 12.0846 17.8623L15.2691 21.3021L23.8887 11.3278C24.082 11.1105 24.3556 10.9759 24.6502 10.9531C24.9448 10.9302 25.2368 11.021 25.4631 11.2059C25.6894 11.3907 25.8319 11.6547 25.8596 11.9407C25.8873 12.2268 25.7981 12.512 25.6113 12.7347Z"
                                    fill="#13DEB9"></path>
                            </svg>
                            <p class="fs-3 fw-semibold" style="margin: 0; flex-grow: 1;">Daftar Hadir Tamu</p>
                        </div>
                        <div class="col-lg-12 mb-3" style="display: flex; align-items: center;">
                            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 36 35"
                                fill="none" style="flex-shrink: 0; margin-right: 10px;">
                                <path
                                    d="M18 3.28125C9.93586 3.28125 3.375 9.65986 3.375 17.5C3.375 25.3401 9.93586 31.7188 18 31.7188C26.0641 31.7188 32.625 25.3401 32.625 17.5C32.625 9.65986 26.0641 3.28125 18 3.28125ZM25.6113 12.7347L16.1613 23.6722C16.0577 23.7922 15.9287 23.8892 15.7831 23.9565C15.6375 24.0239 15.4788 24.06 15.3176 24.0625H15.2986C15.1409 24.0624 14.985 24.0302 14.841 23.9677C14.6969 23.9053 14.568 23.8142 14.4626 23.7002L10.4126 19.3252C10.3097 19.2191 10.2297 19.0942 10.1772 18.9576C10.1248 18.821 10.1009 18.6757 10.1071 18.53C10.1132 18.3844 10.1493 18.2414 10.2131 18.1095C10.2769 17.9776 10.3671 17.8594 10.4786 17.7619C10.59 17.6644 10.7204 17.5895 10.862 17.5417C11.0037 17.4938 11.1537 17.474 11.3033 17.4834C11.453 17.4927 11.5992 17.5311 11.7333 17.5962C11.8675 17.6612 11.9869 17.7517 12.0846 17.8623L15.2691 21.3021L23.8887 11.3278C24.082 11.1105 24.3556 10.9759 24.6502 10.9531C24.9448 10.9302 25.2368 11.021 25.4631 11.2059C25.6894 11.3907 25.8319 11.6547 25.8596 11.9407C25.8873 12.2268 25.7981 12.512 25.6113 12.7347Z"
                                    fill="#13DEB9"></path>
                            </svg>
                            <p class="fs-3 fw-semibold" style="margin: 0; flex-grow: 1;">Daftar Hadir Tamu</p>
                        </div>
                        <div class="col-lg-12 mb-3" style="display: flex; align-items: center;">
                            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 36 35"
                                fill="none" style="flex-shrink: 0; margin-right: 10px;">
                                <path
                                    d="M18 3.28125C9.93586 3.28125 3.375 9.65986 3.375 17.5C3.375 25.3401 9.93586 31.7188 18 31.7188C26.0641 31.7188 32.625 25.3401 32.625 17.5C32.625 9.65986 26.0641 3.28125 18 3.28125ZM25.6113 12.7347L16.1613 23.6722C16.0577 23.7922 15.9287 23.8892 15.7831 23.9565C15.6375 24.0239 15.4788 24.06 15.3176 24.0625H15.2986C15.1409 24.0624 14.985 24.0302 14.841 23.9677C14.6969 23.9053 14.568 23.8142 14.4626 23.7002L10.4126 19.3252C10.3097 19.2191 10.2297 19.0942 10.1772 18.9576C10.1248 18.821 10.1009 18.6757 10.1071 18.53C10.1132 18.3844 10.1493 18.2414 10.2131 18.1095C10.2769 17.9776 10.3671 17.8594 10.4786 17.7619C10.59 17.6644 10.7204 17.5895 10.862 17.5417C11.0037 17.4938 11.1537 17.474 11.3033 17.4834C11.453 17.4927 11.5992 17.5311 11.7333 17.5962C11.8675 17.6612 11.9869 17.7517 12.0846 17.8623L15.2691 21.3021L23.8887 11.3278C24.082 11.1105 24.3556 10.9759 24.6502 10.9531C24.9448 10.9302 25.2368 11.021 25.4631 11.2059C25.6894 11.3907 25.8319 11.6547 25.8596 11.9407C25.8873 12.2268 25.7981 12.512 25.6113 12.7347Z"
                                    fill="#13DEB9"></path>
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
                    <img src="{{ asset('premium.svg') }}" width="50%" height="200" style="object-fit:cover"
                        class="mb-4" alt="...">
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
                            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 36 35"
                                fill="none" style="flex-shrink: 0; margin-right: 10px;">
                                <path
                                    d="M18 3.28125C9.93586 3.28125 3.375 9.65986 3.375 17.5C3.375 25.3401 9.93586 31.7188 18 31.7188C26.0641 31.7188 32.625 25.3401 32.625 17.5C32.625 9.65986 26.0641 3.28125 18 3.28125ZM25.6113 12.7347L16.1613 23.6722C16.0577 23.7922 15.9287 23.8892 15.7831 23.9565C15.6375 24.0239 15.4788 24.06 15.3176 24.0625H15.2986C15.1409 24.0624 14.985 24.0302 14.841 23.9677C14.6969 23.9053 14.568 23.8142 14.4626 23.7002L10.4126 19.3252C10.3097 19.2191 10.2297 19.0942 10.1772 18.9576C10.1248 18.821 10.1009 18.6757 10.1071 18.53C10.1132 18.3844 10.1493 18.2414 10.2131 18.1095C10.2769 17.9776 10.3671 17.8594 10.4786 17.7619C10.59 17.6644 10.7204 17.5895 10.862 17.5417C11.0037 17.4938 11.1537 17.474 11.3033 17.4834C11.453 17.4927 11.5992 17.5311 11.7333 17.5962C11.8675 17.6612 11.9869 17.7517 12.0846 17.8623L15.2691 21.3021L23.8887 11.3278C24.082 11.1105 24.3556 10.9759 24.6502 10.9531C24.9448 10.9302 25.2368 11.021 25.4631 11.2059C25.6894 11.3907 25.8319 11.6547 25.8596 11.9407C25.8873 12.2268 25.7981 12.512 25.6113 12.7347Z"
                                    fill="#13DEB9"></path>
                            </svg>
                            <p class="fs-3 fw-semibold" style="margin: 0; flex-grow: 1;">Daftar Hadir Tamu</p>
                        </div>
                        <div class="col-lg-12 mb-3" style="display: flex; align-items: center;">
                            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 36 35"
                                fill="none" style="flex-shrink: 0; margin-right: 10px;">
                                <path
                                    d="M18 3.28125C9.93586 3.28125 3.375 9.65986 3.375 17.5C3.375 25.3401 9.93586 31.7188 18 31.7188C26.0641 31.7188 32.625 25.3401 32.625 17.5C32.625 9.65986 26.0641 3.28125 18 3.28125ZM25.6113 12.7347L16.1613 23.6722C16.0577 23.7922 15.9287 23.8892 15.7831 23.9565C15.6375 24.0239 15.4788 24.06 15.3176 24.0625H15.2986C15.1409 24.0624 14.985 24.0302 14.841 23.9677C14.6969 23.9053 14.568 23.8142 14.4626 23.7002L10.4126 19.3252C10.3097 19.2191 10.2297 19.0942 10.1772 18.9576C10.1248 18.821 10.1009 18.6757 10.1071 18.53C10.1132 18.3844 10.1493 18.2414 10.2131 18.1095C10.2769 17.9776 10.3671 17.8594 10.4786 17.7619C10.59 17.6644 10.7204 17.5895 10.862 17.5417C11.0037 17.4938 11.1537 17.474 11.3033 17.4834C11.453 17.4927 11.5992 17.5311 11.7333 17.5962C11.8675 17.6612 11.9869 17.7517 12.0846 17.8623L15.2691 21.3021L23.8887 11.3278C24.082 11.1105 24.3556 10.9759 24.6502 10.9531C24.9448 10.9302 25.2368 11.021 25.4631 11.2059C25.6894 11.3907 25.8319 11.6547 25.8596 11.9407C25.8873 12.2268 25.7981 12.512 25.6113 12.7347Z"
                                    fill="#13DEB9"></path>
                            </svg>
                            <p class="fs-3 fw-semibold" style="margin: 0; flex-grow: 1;">Daftar Hadir Tamu</p>
                        </div>
                        <div class="col-lg-12 mb-3" style="display: flex; align-items: center;">
                            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 36 35"
                                fill="none" style="flex-shrink: 0; margin-right: 10px;">
                                <path
                                    d="M18 3.28125C9.93586 3.28125 3.375 9.65986 3.375 17.5C3.375 25.3401 9.93586 31.7188 18 31.7188C26.0641 31.7188 32.625 25.3401 32.625 17.5C32.625 9.65986 26.0641 3.28125 18 3.28125ZM25.6113 12.7347L16.1613 23.6722C16.0577 23.7922 15.9287 23.8892 15.7831 23.9565C15.6375 24.0239 15.4788 24.06 15.3176 24.0625H15.2986C15.1409 24.0624 14.985 24.0302 14.841 23.9677C14.6969 23.9053 14.568 23.8142 14.4626 23.7002L10.4126 19.3252C10.3097 19.2191 10.2297 19.0942 10.1772 18.9576C10.1248 18.821 10.1009 18.6757 10.1071 18.53C10.1132 18.3844 10.1493 18.2414 10.2131 18.1095C10.2769 17.9776 10.3671 17.8594 10.4786 17.7619C10.59 17.6644 10.7204 17.5895 10.862 17.5417C11.0037 17.4938 11.1537 17.474 11.3033 17.4834C11.453 17.4927 11.5992 17.5311 11.7333 17.5962C11.8675 17.6612 11.9869 17.7517 12.0846 17.8623L15.2691 21.3021L23.8887 11.3278C24.082 11.1105 24.3556 10.9759 24.6502 10.9531C24.9448 10.9302 25.2368 11.021 25.4631 11.2059C25.6894 11.3907 25.8319 11.6547 25.8596 11.9407C25.8873 12.2268 25.7981 12.512 25.6113 12.7347Z"
                                    fill="#13DEB9"></path>
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
                    <img src="{{ asset('premium.svg') }}" width="50%" height="200" style="object-fit:cover"
                        class="mb-4" alt="...">
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
                            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 36 35"
                                fill="none" style="flex-shrink: 0; margin-right: 10px;">
                                <path
                                    d="M18 3.28125C9.93586 3.28125 3.375 9.65986 3.375 17.5C3.375 25.3401 9.93586 31.7188 18 31.7188C26.0641 31.7188 32.625 25.3401 32.625 17.5C32.625 9.65986 26.0641 3.28125 18 3.28125ZM25.6113 12.7347L16.1613 23.6722C16.0577 23.7922 15.9287 23.8892 15.7831 23.9565C15.6375 24.0239 15.4788 24.06 15.3176 24.0625H15.2986C15.1409 24.0624 14.985 24.0302 14.841 23.9677C14.6969 23.9053 14.568 23.8142 14.4626 23.7002L10.4126 19.3252C10.3097 19.2191 10.2297 19.0942 10.1772 18.9576C10.1248 18.821 10.1009 18.6757 10.1071 18.53C10.1132 18.3844 10.1493 18.2414 10.2131 18.1095C10.2769 17.9776 10.3671 17.8594 10.4786 17.7619C10.59 17.6644 10.7204 17.5895 10.862 17.5417C11.0037 17.4938 11.1537 17.474 11.3033 17.4834C11.453 17.4927 11.5992 17.5311 11.7333 17.5962C11.8675 17.6612 11.9869 17.7517 12.0846 17.8623L15.2691 21.3021L23.8887 11.3278C24.082 11.1105 24.3556 10.9759 24.6502 10.9531C24.9448 10.9302 25.2368 11.021 25.4631 11.2059C25.6894 11.3907 25.8319 11.6547 25.8596 11.9407C25.8873 12.2268 25.7981 12.512 25.6113 12.7347Z"
                                    fill="#13DEB9"></path>
                            </svg>
                            <p class="fs-3 fw-semibold" style="margin: 0; flex-grow: 1;">Daftar Hadir Tamu</p>
                        </div>
                        <div class="col-lg-12 mb-3" style="display: flex; align-items: center;">
                            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 36 35"
                                fill="none" style="flex-shrink: 0; margin-right: 10px;">
                                <path
                                    d="M18 3.28125C9.93586 3.28125 3.375 9.65986 3.375 17.5C3.375 25.3401 9.93586 31.7188 18 31.7188C26.0641 31.7188 32.625 25.3401 32.625 17.5C32.625 9.65986 26.0641 3.28125 18 3.28125ZM25.6113 12.7347L16.1613 23.6722C16.0577 23.7922 15.9287 23.8892 15.7831 23.9565C15.6375 24.0239 15.4788 24.06 15.3176 24.0625H15.2986C15.1409 24.0624 14.985 24.0302 14.841 23.9677C14.6969 23.9053 14.568 23.8142 14.4626 23.7002L10.4126 19.3252C10.3097 19.2191 10.2297 19.0942 10.1772 18.9576C10.1248 18.821 10.1009 18.6757 10.1071 18.53C10.1132 18.3844 10.1493 18.2414 10.2131 18.1095C10.2769 17.9776 10.3671 17.8594 10.4786 17.7619C10.59 17.6644 10.7204 17.5895 10.862 17.5417C11.0037 17.4938 11.1537 17.474 11.3033 17.4834C11.453 17.4927 11.5992 17.5311 11.7333 17.5962C11.8675 17.6612 11.9869 17.7517 12.0846 17.8623L15.2691 21.3021L23.8887 11.3278C24.082 11.1105 24.3556 10.9759 24.6502 10.9531C24.9448 10.9302 25.2368 11.021 25.4631 11.2059C25.6894 11.3907 25.8319 11.6547 25.8596 11.9407C25.8873 12.2268 25.7981 12.512 25.6113 12.7347Z"
                                    fill="#13DEB9"></path>
                            </svg>
                            <p class="fs-3 fw-semibold" style="margin: 0; flex-grow: 1;">Daftar Hadir Tamu</p>
                        </div>
                        <div class="col-lg-12 mb-3" style="display: flex; align-items: center;">
                            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 36 35"
                                fill="none" style="flex-shrink: 0; margin-right: 10px;">
                                <path
                                    d="M18 3.28125C9.93586 3.28125 3.375 9.65986 3.375 17.5C3.375 25.3401 9.93586 31.7188 18 31.7188C26.0641 31.7188 32.625 25.3401 32.625 17.5C32.625 9.65986 26.0641 3.28125 18 3.28125ZM25.6113 12.7347L16.1613 23.6722C16.0577 23.7922 15.9287 23.8892 15.7831 23.9565C15.6375 24.0239 15.4788 24.06 15.3176 24.0625H15.2986C15.1409 24.0624 14.985 24.0302 14.841 23.9677C14.6969 23.9053 14.568 23.8142 14.4626 23.7002L10.4126 19.3252C10.3097 19.2191 10.2297 19.0942 10.1772 18.9576C10.1248 18.821 10.1009 18.6757 10.1071 18.53C10.1132 18.3844 10.1493 18.2414 10.2131 18.1095C10.2769 17.9776 10.3671 17.8594 10.4786 17.7619C10.59 17.6644 10.7204 17.5895 10.862 17.5417C11.0037 17.4938 11.1537 17.474 11.3033 17.4834C11.453 17.4927 11.5992 17.5311 11.7333 17.5962C11.8675 17.6612 11.9869 17.7517 12.0846 17.8623L15.2691 21.3021L23.8887 11.3278C24.082 11.1105 24.3556 10.9759 24.6502 10.9531C24.9448 10.9302 25.2368 11.021 25.4631 11.2059C25.6894 11.3907 25.8319 11.6547 25.8596 11.9407C25.8873 12.2268 25.7981 12.512 25.6113 12.7347Z"
                                    fill="#13DEB9"></path>
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
            title: {
                text: 'Penulis Terbanyak'
            },
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
    </script>
@endsection

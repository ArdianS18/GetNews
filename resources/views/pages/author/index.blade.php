@extends('layouts.author.sidebar')

@section('style')
    <style>
        .card-profile {
            padding: 15px;
            border-radius: 10px;
        }

        .card-detail {
            padding: 25px;
            border-radius: 10px;
            background-color: #fff;
        }

        .top-right {
            position: absolute;
            top: 8px;
            right: 16px;
        }
    </style>
@endsection

<head>
    <title> Author | Profile </title>
</head>

@section('content')

    <head>
        <!-- --------------------------------------------------- -->
        <!-- Title -->
        <!-- --------------------------------------------------- -->
        <title>Mordenize</title>
        <!-- --------------------------------------------------- -->
        <!-- Required Meta Tag -->
        <!-- --------------------------------------------------- -->
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <meta name="handheldfriendly" content="true" />
        <meta name="MobileOptimized" content="width" />
        <meta name="description" content="Mordenize" />
        <meta name="author" content="" />
        <meta name="keywords" content="Mordenize" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <!-- --------------------------------------------------- -->
        <!-- Favicon -->
        <!-- --------------------------------------------------- -->
        <link rel="shortcut icon" type="image/png"
            href="https://demos.adminmart.com/premium/bootstrap/modernize-bootstrap/package/dist/images/logos/favicon.ico" />
        <!-- --------------------------------------------------- -->
        <!-- Core Css -->
        <!-- --------------------------------------------------- -->
        <link id="themeColors" rel="stylesheet" href="{{ asset('admin/dist/css/style.min.css') }}" />
    </head>

    <body>

        <!-- --------------------------------------------------- -->
        <!-- Body Wrapper -->
        <!-- --------------------------------------------------- -->
        <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-sidebartype="full"
            data-sidebar-position="fixed" data-header-position="fixed">
            <!-- --------------------------------------------------- -->
            <!-- --------------------------------------------------- -->
            <!-- Main Wrapper -->
            <!-- --------------------------------------------------- -->
            <div class="">

                <div class="container-fluid">
                    <div class="card overflow-hidden">
                        <div class="card-profile">
                            <div class="card-body p-0">
                                {{-- <img src="{{ asset( Auth::user()->photo ? 'storage/'.Auth::user()->photo : "assets/img/profile-bg.svg")  }}" width="100%" height="150px" style="border-radius:10px;" alt="" class="img-fluid" /> --}}
                                <img src="{{ asset('assets/img/profile-bg.svg') }}" width="100%" height="150px"
                                    style="border-radius:10px;" alt="" class="img-fluid">
                                <div class="row align-items-center">
                                    <div class="col-lg-5 order-lg-1 order-2">
                                        <div class="d-flex align-items-center justify-content-between m-4">
                                            <div class="text-center">
                                                <i class="ti ti-file-description fs-6 d-block mb-2"></i>
                                                <h5 class="mb-0 fw-semibold lh-1">{{ $news_post }}</h5>
                                                <p class="mb-0 fs-3">Posts</p>
                                            </div>
                                            <a class="nav-link notify-badge nav-icon-hover" href="javascript:void(0)"
                                                data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight"
                                                aria-controls="offcanvasRight">
                                                <div class="text-center">
                                                    <i class="ti ti-user-circle fs-6 d-block mb-2"></i>
                                                    <h5 class="mb-0 fw-semibold lh-1">{{ $followers }}</h5>
                                                    <p class="mb-0 fs-3">Followers</p>
                                                </div>
                                            </a>

                                            <div class="text-center">
                                                <i class="ti ti-user-check fs-6 d-block mb-2"></i>
                                                <h5 class="mb-0 fw-semibold lh-1">{{ $following }}</h5>
                                                <p class="mb-0 fs-3">Following</p>
                                            </div>
                                            <div class="text-center">
                                                <i class="ti ti-thumb-up fs-6 d-block mb-2"></i>
                                                <h5 class="mb-0 fw-semibold lh-1">{{ $news_like }}</h5>
                                                <p class="mb-0 fs-3">Like</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-2 mt-n3 order-lg-2 order-1">
                                        <div class="mt-n5">
                                            <div class="d-flex align-items-center justify-content-center mb-2">
                                                <div class=" d-flex align-items-center justify-content-center rounded-circle"
                                                    style="width: 110px; height: 110px;";>
                                                    <div class="border-4 border-white d-flex align-items-center justify-content-center rounded-circle overflow-hidden"
                                                        style="width: 100px; height: 100px;">
                                                        <img style="object-fit: cover"
                                                            src="{{ asset(Auth::user()->photo ? 'storage/' . Auth::user()->photo : 'assets/img/profile.svg') }}"
                                                            alt="" class="w-100 h-100">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="text-center">
                                                <h5 class="fs-5 mb-0 fw-semibold">{{ auth()->user()->name }}</h5>
                                                <p class="mb-0 fs-3">Penulis</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 order-lg-3 order-3">
                                        <div class="d-flex align-items-center justify-content-between">
                                            <div class="text-center">
                                                <div class="">
                                                    <span class="badge bg-light-warning text-warning fs-5 px-2 py-2">
                                                        {{ $news_panding }}
                                                    </span>
                                                </div>
                                                <div class="">
                                                    <p class="mb-0 fs-3">Panding</p>
                                                </div>
                                            </div>
                                            <div class="text-center">
                                                <div class="">
                                                    <span class="badge bg-light-danger text-danger fs-5 px-2 py-2">
                                                        {{ $news_reject }}
                                                    </span>
                                                </div>
                                                <div class="">
                                                    <p class="mb-0 fs-3">Ditolak</p>
                                                </div>
                                            </div>
                                            <div class="text-center">
                                                <div class="">
                                                    <span class="badge bg-light-success text-success fs-5 px-2 py-2">
                                                        {{ $news_active }}
                                                    </span>
                                                </div>
                                                <div class="">
                                                    <p class="mb-0 fs-3">Diterima</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="shadow-sm" style="background-color: #ECF1F4;">
                            <ul class="nav nav-pills user-profile-tab justify-content-end mt-2 rounded-2" id="pills-tab"
                                role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button
                                        class="nav-link position-relative rounded-0 active d-flex align-items-center justify-content-center bg-transparent fs-3 py-6"
                                        id="pills-berita-tab" data-bs-toggle="pill" data-bs-target="#pills-berita"
                                        type="button" role="tab" aria-controls="pills-berita"
                                        aria-selected="false">
                                        <i class="ti ti-file-description me-2 fs-6"></i>
                                        <span class="d-none d-md-block">Berita</span>
                                    </button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button
                                        class="nav-link position-relative rounded-0 d-flex align-items-center justify-content-center bg-transparent fs-3 py-6"
                                        id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile"
                                        type="button" role="tab" aria-controls="pills-profile"
                                        aria-selected="true">
                                        <i class="ti ti-user-circle me-2 fs-6"></i>
                                        <span class="d-none d-md-block">Profile</span>
                                    </button>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div class="tab-content" id="pills-tabContent">
                        <div class="tab-pane fade show active card" id="pills-berita" role="tabpanel"
                            aria-labelledby="pills-berita-tab" tabindex="0">
                            <div class="card card-body">
                                <h4 class="mb-4">Berita</h4>
                                <div class="d-sm-flex align-items-center justify-content-between mt-3 mb-5">
                                    <form class="d-flex flex-column flex-sm-row gap-2">
                                        <div class="me-3">

                                            <div class="input-group">
                                                <input type="text" name="search"
                                                    class="form-control search-chat py-2 px-5 ps-5" placeholder="Search">
                                                <i
                                                    class="ti ti-search position-absolute top-50 translate-middle-y fs-6 text-dark ms-3"></i>
                                                <button type="submit" class="btn btn-outline-primary px-4">Cari</button>
                                            </div>
                                        </div>
                                        <div class="me-3">
                                            <div class="input-group">
                                                <select class="form-select" name="filter">
                                                    <option selected disabled>Pilih Option</option>
                                                    <option value="terbaru">Terbaru</option>
                                                    <option value="terlama">Terlama</option>
                                                    <option value="">Tampilkan Semua</option>
                                                </select>
                                                <button class="btn btn-outline-primary">
                                                    Pilih
                                                </button>
                                            </div>
                                        </div>

                                    </form>

                                </div>

                                <!-- Row -->
                                <div class="row">
                                    @forelse ($news as $news)
                                        <div class="col-lg-6 col-md-12 mb-5">
                                            <div class="">
                                                <div class="row">
                                                    <div class="col-md-12 col-lg-5">
                                                        <div>
                                                            <img src="{{ asset('storage/' . $news->photo) }}"
                                                                style="width: 100%;height:150;object-fiit:cover;"
                                                                class="img-fluid" height="160px">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12 col-lg-7 align-items-center">
                                                        <div>
                                                            <h5>{!! Illuminate\Support\Str::limit(strip_tags($news->name), 60, '...') !!}</h5>
                                                            <div>
                                                                <p>{!! Illuminate\Support\Str::limit(strip_tags($news->content), 100, '...') !!}</p>
                                                            </div>
                                                        </div>
                                                        <div class="d-flex">
                                                            <div class="d-flex">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="20"
                                                                    height="20" viewBox="0 0 24 24">
                                                                    <path fill="none" stroke="#e93314"
                                                                        stroke-linecap="round" stroke-linejoin="round"
                                                                        stroke-width="1.5"
                                                                        d="M16.5 5V3m-9 2V3M3.25 8h17.5M10 14h4M3 10.044c0-2.115 0-3.173.436-3.981a3.896 3.896 0 0 1 1.748-1.651C6.04 4 7.16 4 9.4 4h5.2c2.24 0 3.36 0 4.216.412c.753.362 1.364.94 1.748 1.65c.436.81.436 1.868.436 3.983v4.912c0 2.115 0 3.173-.436 3.981a3.896 3.896 0 0 1-1.748 1.651C17.96 21 16.84 21 14.6 21H9.4c-2.24 0-3.36 0-4.216-.412a3.896 3.896 0 0 1-1.748-1.65C3 18.128 3 17.07 3 14.955z" />
                                                                </svg>
                                                                <p class="ms-2">
                                                                    {{ \Carbon\Carbon::parse($news->upload_date)->format('M d, Y') }}
                                                                </p>
                                                            </div>
                                                            <div class="d-flex ms-4">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="20"
                                                                    height="20" viewBox="0 0 24 24">
                                                                    <path fill="#E93314"
                                                                        d="M18 21H7V8l7-7l1.25 1.25q.175.175.288.475t.112.575v.35L14.55 8H21q.8 0 1.4.6T23 10v2q0 .175-.05.375t-.1.375l-3 7.05q-.225.5-.75.85T18 21m-9-2h9l3-7v-2h-9l1.35-5.5L9 8.85zM9 8.85V19zM7 8v2H4v9h3v2H2V8z" />
                                                                </svg>
                                                                <p class="ms-2">{{ $news->newsHasLikes->count() }}</p>
                                                            </div>
                                                            <div class="d-flex ms-4">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="20"
                                                                    height="20" viewBox="0 0 24 24">
                                                                    <path fill="#E93314"
                                                                        d="M12 4.5C7 4.5 2.73 7.61 1 12c1.73 4.39 6 7.5 11 7.5s9.27-3.11 11-7.5c-1.73-4.39-6-7.5-11-7.5zM12 17c-2.76 0-5-2.24-5-5s2.24-5 5-5s5 2.24 5 5s-2.24 5-5 5zm0-8c-1.66 0-3 1.34-3 3s1.34 3 3 3s3-1.34 3-3s-1.34-3-3-3z" />
                                                                </svg><span class="ms-2">{{ $news->views_count }}</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @empty
                                        <div class="col-md-12 col-lg-12">
                                            <div class="d-flex justify-content-center">
                                                <div>
                                                    <img src="{{ asset('assets/img/no-data.svg') }}" width="200px"
                                                        alt="">
                                                </div>
                                            </div>
                                            <div class="text-center">
                                                <h5>Tidak ada data</h5>
                                            </div>
                                        </div>
                                    @endforelse

                                </div>
                                <!-- End Row -->
                            </div>

                        </div>

                        <div class="tab-pane fade card p-4" id="pills-profile" role="tabpanel"
                            aria-labelledby="pills-profile-tab" tabindex="0">
                            <div class="row p-2">
                                <h4 class="mb-4">Biodata</h4>

                                <div class="col-md-12 col-lg-6 mb-4">
                                    <label class="form-label" for="nomor">Nama</label>
                                    <input type="text" id="name" name="name" placeholder="name"
                                        value="{{ auth()->user()->name }}"
                                        class="form-control @error('name') is-invalid @enderror" readonly>
                                    @error('name')
                                        <span class="invalid-feedback" role="alert" style="color: red;">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-md-12 col-lg-6 mb-4">
                                    <label class="form-label" for="nomor">No Hp</label>
                                    <input type="text" id="name" name="name" placeholder="name"
                                        value="{{ auth()->user()->phone_number }}"
                                        class="form-control @error('name') is-invalid @enderror" readonly>
                                    @error('name')
                                        <span class="invalid-feedback" role="alert" style="color: red;">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-md-12 col-lg-6 mb-4">
                                    <label class="form-label" for="email">Email</label>
                                    <input type="text" id="email" name="email" placeholder="email"
                                        value="{{ auth()->user()->email }}"
                                        class="form-control @error('email') is-invalid @enderror" readonly>
                                    @error('email')
                                        <span class="invalid-feedback" role="alert" style="color: red;">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-md-12 col-lg-6 mb-4">
                                    <label class="form-label" for="email">Tanggal Lahir</label>
                                    <input type="text" id="email" name="email" placeholder="Tanggal lahir"
                                        value="{{ auth()->user()->birth_date }}"
                                        class="form-control @error('email') is-invalid @enderror" readonly>
                                    @error('email')
                                        <span class="invalid-feedback" role="alert" style="color: red;">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-md-12 col-lg-12 mb-4">
                                    <label class="form-label" for="email">deskripsi</label>
                                    <input type="text" id="email" name="email" placeholder="Hallo"
                                        value="{{ auth()->user()->deskripsi }}"
                                        class="form-control @error('email') is-invalid @enderror" readonly>
                                </div>
                                <div class="col-md-12 col-lg-12 mb-4">
                                    <label class="form-label" for="email">Alamat</label>
                                    <textarea name="alamat" class="form-control" id="" cols="30" rows="10" readonly>{{ auth()->user()->address }}</textarea>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>


            <!--  Shopping Cart -->
            <div class="offcanvas offcanvas-end shopping-cart" tabindex="-1" id="offcanvasRight"
                aria-labelledby="offcanvasRightLabel">
                <div class="offcanvas-header py-4">
                    <h5 class="offcanvas-title fs-5 fw-semibold" id="offcanvasRightLabel">Shopping Cart</h5>
                    <span class="badge bg-primary rounded-4 px-3 py-1 lh-sm">5 new</span>
                </div>
                <div class="offcanvas-body h-100 px-4 pt-0" data-simplebar>
                    <ul class="mb-0">
                        <li class="pb-7">
                            <div class="d-flex align-items-center">
                                <img src="../../dist/images/products/product-1.jpg" width="95" height="75"
                                    class="rounded-1 me-9 flex-shrink-0" alt="" />
                                <div>
                                    <h6 class="mb-1">Supreme toys cooker</h6>
                                    <p class="mb-0 text-muted fs-2">Kitchenware Item</p>
                                    <div class="d-flex align-items-center justify-content-between mt-2">
                                        <h6 class="fs-2 fw-semibold mb-0 text-muted">$250</h6>
                                        <div class="input-group input-group-sm w-50">
                                            <button class="btn border-0 round-20 minus p-0 bg-light-success text-success "
                                                type="button" id="add1"> - </button>
                                            <input type="text"
                                                class="form-control round-20 bg-transparent text-muted fs-2 border-0  text-center qty"
                                                placeholder="" aria-label="Example text with button addon"
                                                aria-describedby="add1" value="1" />
                                            <button class="btn text-success bg-light-success  p-0 round-20 border-0 add"
                                                type="button" id="addo2"> + </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="pb-7">
                            <div class="d-flex align-items-center">
                                <img src="../../dist/images/products/product-2.jpg" width="95" height="75"
                                    class="rounded-1 me-9 flex-shrink-0" alt="" />
                                <div>
                                    <h6 class="mb-1">Supreme toys cooker</h6>
                                    <p class="mb-0 text-muted fs-2">Kitchenware Item</p>
                                    <div class="d-flex align-items-center justify-content-between mt-2">
                                        <h6 class="fs-2 fw-semibold mb-0 text-muted">$250</h6>
                                        <div class="input-group input-group-sm w-50">
                                            <button class="btn border-0 round-20 minus p-0 bg-light-success text-success "
                                                type="button" id="add2"> - </button>
                                            <input type="text"
                                                class="form-control round-20 bg-transparent text-muted fs-2 border-0  text-center qty"
                                                placeholder="" aria-label="Example text with button addon"
                                                aria-describedby="add2" value="1" />
                                            <button class="btn text-success bg-light-success  p-0 round-20 border-0 add"
                                                type="button" id="addon34"> + </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="pb-7">
                            <div class="d-flex align-items-center">
                                <img src="../../dist/images/products/product-3.jpg" width="95" height="75"
                                    class="rounded-1 me-9 flex-shrink-0" alt="" />
                                <div>
                                    <h6 class="mb-1">Supreme toys cooker</h6>
                                    <p class="mb-0 text-muted fs-2">Kitchenware Item</p>
                                    <div class="d-flex align-items-center justify-content-between mt-2">
                                        <h6 class="fs-2 fw-semibold mb-0 text-muted">$250</h6>
                                        <div class="input-group input-group-sm w-50">
                                            <button class="btn border-0 round-20 minus p-0 bg-light-success text-success "
                                                type="button" id="add3"> - </button>
                                            <input type="text"
                                                class="form-control round-20 bg-transparent text-muted fs-2 border-0  text-center qty"
                                                placeholder="" aria-label="Example text with button addon"
                                                aria-describedby="add3" value="1" />
                                            <button class="btn text-success bg-light-success  p-0 round-20 border-0 add"
                                                type="button" id="addon3"> + </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                    <div class="align-bottom">
                        <div class="d-flex align-items-center pb-7">
                            <span class="text-dark fs-3">Sub Total</span>
                            <div class="ms-auto">
                                <span class="text-dark fw-semibold fs-3">$2530</span>
                            </div>
                        </div>
                        <div class="d-flex align-items-center pb-7">
                            <span class="text-dark fs-3">Total</span>
                            <div class="ms-auto">
                                <span class="text-dark fw-semibold fs-3">$6830</span>
                            </div>
                        </div>
                        <a href="eco-checkout.html" class="btn btn-outline-primary w-100">Go to shopping cart</a>
                    </div>
                </div>
            </div>



        </div>
        <!-- ---------------------------------------------- -->
        <!-- Import Js Files -->
        <!-- ---------------------------------------------- -->
        <script src="../../dist/libs/jquery/dist/jquery.min.js"></script>
        <script src="../../dist/libs/simplebar/dist/simplebar.min.js"></script>
        <script src="../../dist/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
        <!-- ---------------------------------------------- -->
        <!-- core files -->
        <!-- ---------------------------------------------- -->
        <script src="../../dist/js/app.min.js"></script>
        <script src="../../dist/js/app.init.js"></script>
        <script src="../../dist/js/app-style-switcher.js"></script>
        <script src="../../dist/js/sidebarmenu.js"></script>

        <script src="../../dist/js/custom.js"></script>
        <!-- ---------------------------------------------- -->
        <!-- current page js files -->
        <!-- ---------------------------------------------- -->
        <script src="../../dist/js/apps/chat.js"></script>



    </body>
@endsection

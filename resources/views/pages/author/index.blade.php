@extends('layouts.author.sidebar')

@section('style')
  <style>
    .card-profile{
        padding: 15px;
        border-radius: 10px;
    }
    .card-detail{
      padding: 25px;
      border-radius: 10px;
      background-color: #fff;
    }
  </style>
@endsection
@section('content')
    
<!-- Mirrored from demos.adminmart.com/premium/bootstrap/modernize-bootstrap/package/html/main/page-user-profile.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 06 Jul 2023 01:59:16 GMT -->
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
    <link rel="shortcut icon" type="image/png" href="https://demos.adminmart.com/premium/bootstrap/modernize-bootstrap/package/dist/images/logos/favicon.ico" />
    <!-- --------------------------------------------------- -->
    <!-- Core Css -->
    <!-- --------------------------------------------------- -->
    <link  id="themeColors"  rel="stylesheet" href="../../dist/css/style.min.css" />
  </head>
  <body>

    <!-- --------------------------------------------------- -->
    <!-- Body Wrapper -->
    <!-- --------------------------------------------------- -->
    <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-sidebartype="full" data-sidebar-position="fixed" data-header-position="fixed">
      <!-- --------------------------------------------------- -->
      <!-- --------------------------------------------------- -->
      <!-- Main Wrapper -->
      <!-- --------------------------------------------------- -->
      <div class="">

        <div class="container-fluid">
          <div class="card overflow-hidden">
            <div class="card-profile">
              <div class="card-body p-0">
                <img src="{{asset('assets/img/profile-bg.svg')}}" width="100%" height="300px" style="border-radius:10px;" alt="" class="img-fluid">
                <div class="row align-items-center">
                  <div class="col-lg-5 order-lg-1 order-2">
                    <div class="d-flex align-items-center justify-content-between m-4">
                      <div class="text-center">
                        <i class="ti ti-file-description fs-6 d-block mb-2"></i>
                        <h4 class="mb-0 fw-semibold lh-1">938</h4>
                        <p class="mb-0 fs-4">Posts</p>
                      </div>
                      <div class="text-center">
                        <i class="ti ti-user-circle fs-6 d-block mb-2"></i>
                        <h4 class="mb-0 fw-semibold lh-1">3,586</h4>
                        <p class="mb-0 fs-4">Followers</p>
                      </div>
                      <div class="text-center">
                        <i class="ti ti-user-check fs-6 d-block mb-2"></i>
                        <h4 class="mb-0 fw-semibold lh-1">2,659</h4>
                        <p class="mb-0 fs-4">Following</p>
                      </div>
                      <div class="text-center">
                          <i class="ti ti-thumb-up fs-6 d-block mb-2"></i>
                          <h4 class="mb-0 fw-semibold lh-1">3.212</h4>
                          <p class="mb-0 fs-4">Like</p>
                        </div>
                    </div>
                  </div>
                  <div class="col-lg-2 mt-n3 order-lg-2 order-1">
                    <div class="mt-n5">
                      <div class="d-flex align-items-center justify-content-center mb-2">
                        <div class=" d-flex align-items-center justify-content-center rounded-circle" style="width: 110px; height: 110px;";>
                          <div class="border border-4 border-white d-flex align-items-center justify-content-center rounded-circle overflow-hidden" style="width: 100px; height: 100px;";>
                            <img src="{{asset('assets/img/profile.svg')}}" alt="" class="w-100 h-100">
                          </div>
                        </div>
                      </div>
                      <div class="text-center">
                        <h5 class="fs-5 mb-0 fw-semibold">Daffa Prasetya</h5>
                        <p class="mb-0 fs-4">Penulis</p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="shadow-sm" style="background-color: #ECF1F4;">
              <ul class="nav nav-pills user-profile-tab justify-content-end mt-2 rounded-2" id="pills-tab" role="tablist">
                <li class="nav-item" role="presentation">
                  <button class="nav-link position-relative rounded-0 active d-flex align-items-center justify-content-center bg-transparent fs-3 py-6" id="pills-berita-tab" data-bs-toggle="pill" data-bs-target="#pills-berita" type="button" role="tab" aria-controls="pills-berita" aria-selected="false">
                    <i class="ti ti-file-description me-2 fs-6"></i>
                    <span class="d-none d-md-block">Berita</span> 
                  </button>
                </li>
                <li class="nav-item" role="presentation">
                  <button class="nav-link position-relative rounded-0 d-flex align-items-center justify-content-center bg-transparent fs-3 py-6" id="pills-status-tab" data-bs-toggle="pill" data-bs-target="#pills-status" type="button" role="tab" aria-controls="pills-status" aria-selected="false">
                    <i class="ti ti-file-description me-2 fs-6"></i>
                    <span class="d-none d-md-block">Status</span> 
                  </button>
                </li>
                <li class="nav-item" role="presentation">
                  <button class="nav-link position-relative rounded-0 d-flex align-items-center justify-content-center bg-transparent fs-3 py-6" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="true">
                    <i class="ti ti-user-circle me-2 fs-6"></i>
                    <span class="d-none d-md-block">Profile</span> 
                  </button>
                </li>
                <li class="nav-item" role="presentation">
                  <button class="nav-link position-relative rounded-0 d-flex align-items-center justify-content-center bg-transparent fs-3 py-6" id="pills-followers-tab" data-bs-toggle="pill" data-bs-target="#pills-followers" type="button" role="tab" aria-controls="pills-followers" aria-selected="false">
                    <i class="ti ti-heart me-2 fs-6"></i>
                    <span class="d-none d-md-block">Followers</span> 
                  </button>
                </li>
                <li class="nav-item" role="presentation">
                  <button class="nav-link position-relative rounded-0 d-flex align-items-center justify-content-center bg-transparent fs-3 py-6" id="pills-friends-tab" data-bs-toggle="pill" data-bs-target="#pills-friends" type="button" role="tab" aria-controls="pills-friends" aria-selected="false">
                    <i class="ti ti-user-circle me-2 fs-6"></i>
                    <span class="d-none d-md-block">Friends</span> 
                  </button>
                </li>
              </ul>
            </div>
          </div>

          <div class="">

          </div>

          <div class="tab-content" id="pills-tabContent">
            <div class="tab-pane fade card-detail" id="pills-berita" role="tabpanel" aria-labelledby="pills-berita-tab" tabindex="0">
              <div class="d-sm-flex align-items-center justify-content-between mt-3 mb-4">
                <div class="">
                  <form class="d-flex">
                    <div class="input-group">
                        <input type="text" name="query" class="form-control search-chat py-2 px-5 ps-5" placeholder="Search">
                        <i class="ti ti-search position-absolute top-50 translate-middle-y fs-6 text-dark ms-3"></i>
                        <button type="submit" style="background-color: #C7C7C7;" class="btn btn-sm text-black px-4">Cari</button>
                    </div>
                  </form>
                </div>
                <div class="">
                  <select class="form-select">
                      <option value="">Terbaru</option>
                      <option value="">Terpopuler</option>
                      <option value="">Terlama</option>
                  </select>
              </div>
              </div>
            
              <!-- Row -->
              <div class="">
                @forelse ($news as $news)
                <div class="row">
                  <div class="col-lg-6 col-md-12 mb-5">
                    <div class="">
                      <div class="row">
                        <div class="col-md-12 col-lg-5">
                          <div>
                            <img src="{{asset('assets/img/test.svg')}}" style="width: 100%; height: 100%;" class="img-fluid" height="160px" alt="">
                          </div>
                        </div>
                        <div class="col-md-12 col-lg-7 align-items-center">
                          <div>
                            <h5>Lorem ih6sum koakwi kkoalk coeocnoa olawok acec</h5>
                            <p class="mt-2">Lorem ipsum koakwi kkoalk coeocnoa ol</p>
                          </div>
                          <div class="d-flex">
                            <div class="d-flex">
                              <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"><path fill="#ef6e6e" d="M5 22q-.825 0-1.412-.587T3 20V6q0-.825.588-1.412T5 4h1V2h2v2h8V2h2v2h1q.825 0 1.413.588T21 6v14q0 .825-.587 1.413T19 22zm0-2h14V10H5zM5 8h14V6H5zm0 0V6z"/></svg>
                              <p class="ms-2">Apr 25, 2023 </p>
                            </div>
                            <div class="d-flex ms-4">
                              <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"><path fill="#ef6e6e" d="M21 8q.8 0 1.4.6T23 10v2q0 .175-.038.375t-.112.375l-3 7.05q-.225.5-.75.85T18 21h-8q-.825 0-1.412-.587T8 19V8.825q0-.4.163-.762t.437-.638l5.425-5.4q.375-.35.888-.425t.987.175q.475.25.688.7t.087.925L15.55 8zM4 21q-.825 0-1.412-.587T2 19v-9q0-.825.588-1.412T4 8q.825 0 1.413.588T6 10v9q0 .825-.587 1.413T4 21"/></svg>
                              <p class="ms-2">1.203 </p>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-6 col-md-12 mb-5">
                    <div class="">
                      <div class="row">
                        <div class="col-md-12 col-lg-5">
                          <div>
                            <img src="{{asset('assets/img/test1.svg')}}" style="width: 100%; height: 100%;" class="img-fluid" height="160px" alt="">
                          </div>
                        </div>
                        <div class="col-md-12 col-lg-7 align-items-center">
                          <div>
                            <h5>Lorem ih6sum koakwi kkoalk coeocnoa olawok acec</h5>
                            <p class="mt-2">Lorem ipsum koakwi kkoalk coeocnoa ol</p>
                          </div>
                          <div class="d-flex">
                            <div class="d-flex">
                              <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"><path fill="#ef6e6e" d="M5 22q-.825 0-1.412-.587T3 20V6q0-.825.588-1.412T5 4h1V2h2v2h8V2h2v2h1q.825 0 1.413.588T21 6v14q0 .825-.587 1.413T19 22zm0-2h14V10H5zM5 8h14V6H5zm0 0V6z"/></svg>
                              <p class="ms-2">Apr 25, 2023 </p>
                            </div>
                            <div class="d-flex ms-4">
                              <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"><path fill="#ef6e6e" d="M21 8q.8 0 1.4.6T23 10v2q0 .175-.038.375t-.112.375l-3 7.05q-.225.5-.75.85T18 21h-8q-.825 0-1.412-.587T8 19V8.825q0-.4.163-.762t.437-.638l5.425-5.4q.375-.35.888-.425t.987.175q.475.25.688.7t.087.925L15.55 8zM4 21q-.825 0-1.412-.587T2 19v-9q0-.825.588-1.412T4 8q.825 0 1.413.588T6 10v9q0 .825-.587 1.413T4 21"/></svg>
                              <p class="ms-2">1.203 </p>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-6 col-md-12 mb-5">
                    <div class="">
                      <div class="row">
                        <div class="col-md-12 col-lg-5">
                          <div>
                            <img src="{{asset('assets/img/test.svg')}}" style="width: 100%; height: 100%;" class="img-fluid" height="160px" alt="">
                          </div>
                        </div>
                        <div class="col-md-12 col-lg-7 align-items-center">
                          <div>
                            <h5>Lorem ih6sum koakwi kkoalk coeocnoa olawok acec</h5>
                            <p class="mt-2">Lorem ipsum koakwi kkoalk coeocnoa ol</p>
                          </div>
                          <div class="d-flex">
                            <div class="d-flex">
                              <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"><path fill="#ef6e6e" d="M5 22q-.825 0-1.412-.587T3 20V6q0-.825.588-1.412T5 4h1V2h2v2h8V2h2v2h1q.825 0 1.413.588T21 6v14q0 .825-.587 1.413T19 22zm0-2h14V10H5zM5 8h14V6H5zm0 0V6z"/></svg>
                              <p class="ms-2">Apr 25, 2023 </p>
                            </div>
                            <div class="d-flex ms-4">
                              <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"><path fill="#ef6e6e" d="M21 8q.8 0 1.4.6T23 10v2q0 .175-.038.375t-.112.375l-3 7.05q-.225.5-.75.85T18 21h-8q-.825 0-1.412-.587T8 19V8.825q0-.4.163-.762t.437-.638l5.425-5.4q.375-.35.888-.425t.987.175q.475.25.688.7t.087.925L15.55 8zM4 21q-.825 0-1.412-.587T2 19v-9q0-.825.588-1.412T4 8q.825 0 1.413.588T6 10v9q0 .825-.587 1.413T4 21"/></svg>
                              <p class="ms-2">1.203 </p>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-6 col-md-12 mb-5">
                    <div class="">
                      <div class="row">
                        <div class="col-md-12 col-lg-5">
                          <div>
                            <img src="{{asset('assets/img/test1.svg')}}" style="width: 100%; height: 100%;" class="img-fluid" height="160px" alt="">
                          </div>
                        </div>
                        <div class="col-md-12 col-lg-7 align-items-center">
                          <div>
                            <h5>Lorem ih6sum koakwi kkoalk coeocnoa olawok acec</h5>
                            <p class="mt-2">Lorem ipsum koakwi kkoalk coeocnoa ol</p>
                          </div>
                          <div class="d-flex">
                            <div class="d-flex">
                              <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"><path fill="#ef6e6e" d="M5 22q-.825 0-1.412-.587T3 20V6q0-.825.588-1.412T5 4h1V2h2v2h8V2h2v2h1q.825 0 1.413.588T21 6v14q0 .825-.587 1.413T19 22zm0-2h14V10H5zM5 8h14V6H5zm0 0V6z"/></svg>
                              <p class="ms-2">Apr 25, 2023 </p>
                            </div>
                            <div class="d-flex ms-4">
                              <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"><path fill="#ef6e6e" d="M21 8q.8 0 1.4.6T23 10v2q0 .175-.038.375t-.112.375l-3 7.05q-.225.5-.75.85T18 21h-8q-.825 0-1.412-.587T8 19V8.825q0-.4.163-.762t.437-.638l5.425-5.4q.375-.35.888-.425t.987.175q.475.25.688.7t.087.925L15.55 8zM4 21q-.825 0-1.412-.587T2 19v-9q0-.825.588-1.412T4 8q.825 0 1.413.588T6 10v9q0 .825-.587 1.413T4 21"/></svg>
                              <p class="ms-2">1.203 </p>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-6 col-md-12 mb-5">
                    <div class="">
                      <div class="row">
                        <div class="col-md-12 col-lg-5">
                          <div>
                            <img src="{{asset('assets/img/test.svg')}}" style="width: 100%; height: 100%;" class="img-fluid" height="160px" alt="">
                          </div>
                        </div>
                        <div class="col-md-12 col-lg-7 align-items-center">
                          <div>
                            <h5>Lorem ih6sum koakwi kkoalk coeocnoa olawok acec</h5>
                            <p class="mt-2">Lorem ipsum koakwi kkoalk coeocnoa ol</p>
                          </div>
                          <div class="d-flex">
                            <div class="d-flex">
                              <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"><path fill="#ef6e6e" d="M5 22q-.825 0-1.412-.587T3 20V6q0-.825.588-1.412T5 4h1V2h2v2h8V2h2v2h1q.825 0 1.413.588T21 6v14q0 .825-.587 1.413T19 22zm0-2h14V10H5zM5 8h14V6H5zm0 0V6z"/></svg>
                              <p class="ms-2">Apr 25, 2023 </p>
                            </div>
                            <div class="d-flex ms-4">
                              <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"><path fill="#ef6e6e" d="M21 8q.8 0 1.4.6T23 10v2q0 .175-.038.375t-.112.375l-3 7.05q-.225.5-.75.85T18 21h-8q-.825 0-1.412-.587T8 19V8.825q0-.4.163-.762t.437-.638l5.425-5.4q.375-.35.888-.425t.987.175q.475.25.688.7t.087.925L15.55 8zM4 21q-.825 0-1.412-.587T2 19v-9q0-.825.588-1.412T4 8q.825 0 1.413.588T6 10v9q0 .825-.587 1.413T4 21"/></svg>
                              <p class="ms-2">1.203 </p>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-6 col-md-12 mb-5">
                    <div class="">
                      <div class="row">
                        <div class="col-md-12 col-lg-5">
                          <div>
                            <img src="{{asset('assets/img/test1.svg')}}" style="width: 100%; height: 100%;" class="img-fluid" height="160px" alt="">
                          </div>
                        </div>
                        <div class="col-md-12 col-lg-7 align-items-center">
                          <div>
                            <h5>Lorem ih6sum koakwi kkoalk coeocnoa olawok acec</h5>
                            <p class="mt-2">Lorem ipsum koakwi kkoalk coeocnoa ol</p>
                          </div>
                          <div class="d-flex">
                            <div class="d-flex">
                              <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"><path fill="#ef6e6e" d="M5 22q-.825 0-1.412-.587T3 20V6q0-.825.588-1.412T5 4h1V2h2v2h8V2h2v2h1q.825 0 1.413.588T21 6v14q0 .825-.587 1.413T19 22zm0-2h14V10H5zM5 8h14V6H5zm0 0V6z"/></svg>
                              <p class="ms-2">Apr 25, 2023 </p>
                            </div>
                            <div class="d-flex ms-4">
                              <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"><path fill="#ef6e6e" d="M21 8q.8 0 1.4.6T23 10v2q0 .175-.038.375t-.112.375l-3 7.05q-.225.5-.75.85T18 21h-8q-.825 0-1.412-.587T8 19V8.825q0-.4.163-.762t.437-.638l5.425-5.4q.375-.35.888-.425t.987.175q.475.25.688.7t.087.925L15.55 8zM4 21q-.825 0-1.412-.587T2 19v-9q0-.825.588-1.412T4 8q.825 0 1.413.588T6 10v9q0 .825-.587 1.413T4 21"/></svg>
                              <p class="ms-2">1.203 </p>
                            </div>
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
                              <img src="{{ asset('no-data.svg') }}" width="200px" alt="">
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
            <div class="tab-pane fade card-detail" id="pills-status" role="tabpanel" aria-labelledby="pills-status-tab" tabindex="0">
              <div class="d-sm-flex align-items-center justify-content-between mt-3 mb-4">
                <div class="">
                  <form class="d-flex">
                    <div class="input-group">
                        <input type="text" name="query" class="form-control search-chat py-2 px-5 ps-5" placeholder="Search">
                        <i class="ti ti-search position-absolute top-50 translate-middle-y fs-6 text-dark ms-3"></i>
                        <button type="submit" style="background-color: #C7C7C7;" class="btn btn-sm text-black px-4">Cari</button>
                    </div>
                  </form>
                </div>
                <div class="">
                  <select class="form-select">
                      <option value="">Terbaru</option>
                      <option value="">Terpopuler</option>
                      <option value="">Terlama</option>
                  </select>
                </div>
              </div>
            
              <!-- Row -->
              <div class="">
                <table class="table">
                  <thead>
                      <tr>
                          <th class="text-white" style="background-color: #175A95; border-radius: 5px 0 0 5px;">No</th>
                          <th class="text-white" style="background-color: #175A95;">Judul Berita</th>
                          <th class="text-white" style="background-color: #175A95;">Kategori</th>
                          <th class="text-white" style="background-color: #175A95;">Sub Kategori</th>
                          <th class="text-white" style="background-color: #175A95;">Tanggal Upload</th>
                          <th class="text-white" style="background-color: #175A95;">Status</th>
                          <th class="text-white" style="background-color: #175A95; border-radius: 0 5px 5px 0;">Aksi</th>
                      </tr>
                  </thead>
                  <tbody>
                      @forelse ($news as $news)
                          <tr>
                              <td>{{ $loop->iteration }}</td>
                              <td>{{ $news->name }}</td>
                              <td>{{ $news->category }}</td>
                              <td>{{ $news->subCategori->name }}</td>
                              <td>{{ \Carbon\Carbon::parse($news->upload_date)->format('d / M / Y') }}</td>
                              <td>{{ $news->status }}</td>
                              <td>
                                  <button style="background-color: #FFD643;" class="btn btn-edit text-white me-2" data-id="{{ $news->id }}"
                                      data-question="{{ $news->question }}" data-answer="{{ $news->answer }}"
                                      id="btn-edit-{{ $news->id }}">
                                      Edit
                                  </button>
      
      
                                  <button type="submit" style="background-color: #EF6E6E" class="btn btn-delete text-white"
                                      data-id="{{ $news->id }}">Hapus</button>
                              </td>
                          </tr>
                      @empty
                          <tr>
                              <td colspan="7">
                                  <div class="d-flex justify-content-center">
                                      <div>
                                          <img src="{{ asset('no-data.svg') }}" width="200px" alt="">
                                      </div>
                                  </div>
                                  <div class="text-center">
                                      <h5>Tidak ada data</h5>
                                  </div>
                              </td>
                          </tr>
                      @endforelse
                  </tbody>
                </table>
              </div>
              <!-- End Row -->
            </div>

            <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab" tabindex="0">
              <div class="row">
 
              </div>
            </div>
            <div class="tab-pane fade" id="pills-followers" role="tabpanel" aria-labelledby="pills-followers-tab" tabindex="0">
              <div class="d-sm-flex align-items-center justify-content-between mt-3 mb-4">
                <h3 class="mb-3 mb-sm-0 fw-semibold d-flex align-items-center">Followers <span class="badge text-bg-secondary fs-2 rounded-4 py-1 px-2 ms-2">20</span></h3>
                <form class="position-relative">
                  <input type="text" class="form-control search-chat py-2 ps-5" id="text-srh" placeholder="Search Followers">
                  <i class="ti ti-search position-absolute top-50 start-0 translate-middle-y text-dark ms-3"></i>
                </form>
              </div>
              <div class="row">
                <div class=" col-md-6 col-xl-4">
                  <div class="card">
                    <div class="card-body p-4 d-flex align-items-center gap-3">
                      <img src="../../dist/images/profile/user-1.jpg" alt="" class="rounded-circle" width="40" height="40">
                      <div>
                        <h5 class="fw-semibold mb-0">Betty Adams</h5>
                        <span class="fs-2 d-flex align-items-center"><i class="ti ti-map-pin text-dark fs-3 me-1"></i>Sint Maarten</span>
                      </div>
                      <button class="btn btn-outline-primary py-1 px-2 ms-auto">Follow</button>
                    </div>
                  </div>
                </div>
                <div class=" col-md-6 col-xl-4">
                  <div class="card">
                    <div class="card-body p-4 d-flex align-items-center gap-3">
                      <img src="../../dist/images/profile/user-2.jpg" alt="" class="rounded-circle" width="40" height="40">
                      <div>
                        <h5 class="fw-semibold mb-0">Virginia Wong</h5>
                        <span class="fs-2 d-flex align-items-center"><i class="ti ti-map-pin text-dark fs-3 me-1"></i>Tunisia</span>
                      </div>
                      <button class="btn btn-outline-primary py-1 px-2 ms-auto">Follow</button>
                    </div>
                  </div>
                </div>
                <div class=" col-md-6 col-xl-4">
                  <div class="card">
                    <div class="card-body p-4 d-flex align-items-center gap-3">
                      <img src="../../dist/images/profile/user-3.jpg" alt="" class="rounded-circle" width="40" height="40">
                      <div>
                        <h5 class="fw-semibold mb-0">Birdie Burgess</h5>
                        <span class="fs-2 d-flex align-items-center"><i class="ti ti-map-pin text-dark fs-3 me-1"></i>Algeria</span>
                      </div>
                      <button class="btn btn-primary py-1 px-2 ms-auto">Followed</button>
                    </div>
                  </div>
                </div>
                <div class=" col-md-6 col-xl-4">
                  <div class="card">
                    <div class="card-body p-4 d-flex align-items-center gap-3">
                      <img src="../../dist/images/profile/user-4.jpg" alt="" class="rounded-circle" width="40" height="40">
                      <div>
                        <h5 class="fw-semibold mb-0">Steven Lindsey</h5>
                        <span class="fs-2 d-flex align-items-center"><i class="ti ti-map-pin text-dark fs-3 me-1"></i>Malaysia</span>
                      </div>
                      <button class="btn btn-primary py-1 px-2 ms-auto">Followed</button>
                    </div>
                  </div>
                </div>
                <div class=" col-md-6 col-xl-4">
                  <div class="card">
                    <div class="card-body p-4 d-flex align-items-center gap-3">
                      <img src="../../dist/images/profile/user-5.jpg" alt="" class="rounded-circle" width="40" height="40">
                      <div>
                        <h5 class="fw-semibold mb-0">Hannah Rhodes</h5>
                        <span class="fs-2 d-flex align-items-center"><i class="ti ti-map-pin text-dark fs-3 me-1"></i>Grenada</span>
                      </div>
                      <button class="btn btn-primary py-1 px-2 ms-auto">Followed</button>
                    </div>
                  </div>
                </div>
                <div class=" col-md-6 col-xl-4">
                  <div class="card">
                    <div class="card-body p-4 d-flex align-items-center gap-3">
                      <img src="../../dist/images/profile/user-6.jpg" alt="" class="rounded-circle" width="40" height="40">
                      <div>
                        <h5 class="fw-semibold mb-0">Effie Gross</h5>
                        <span class="fs-2 d-flex align-items-center"><i class="ti ti-map-pin text-dark fs-3 me-1"></i>Azerbaijan</span>
                      </div>
                      <button class="btn btn-outline-primary py-1 px-2 ms-auto">Follow</button>
                    </div>
                  </div>
                </div>
                <div class=" col-md-6 col-xl-4">
                  <div class="card">
                    <div class="card-body p-4 d-flex align-items-center gap-3">
                      <img src="../../dist/images/profile/user-7.jpg" alt="" class="rounded-circle" width="40" height="40">
                      <div>
                        <h5 class="fw-semibold mb-0">Mark Barton</h5>
                        <span class="fs-2 d-flex align-items-center"><i class="ti ti-map-pin text-dark fs-3 me-1"></i>French Southern Territories</span>
                      </div>
                      <button class="btn btn-outline-primary py-1 px-2 ms-auto">Follow</button>
                    </div>
                  </div>
                </div>
                <div class=" col-md-6 col-xl-4">
                  <div class="card">
                    <div class="card-body p-4 d-flex align-items-center gap-3">
                      <img src="../../dist/images/profile/user-8.jpg" alt="" class="rounded-circle" width="40" height="40">
                      <div>
                        <h5 class="fw-semibold mb-0">Carolyn Knight</h5>
                        <span class="fs-2 d-flex align-items-center"><i class="ti ti-map-pin text-dark fs-3 me-1"></i>Nauru</span>
                      </div>
                      <button class="btn btn-primary py-1 px-2 ms-auto">Followed</button>
                    </div>
                  </div>
                </div>
                <div class=" col-md-6 col-xl-4">
                  <div class="card">
                    <div class="card-body p-4 d-flex align-items-center gap-3">
                      <img src="../../dist/images/profile/user-9.jpg" alt="" class="rounded-circle" width="40" height="40">
                      <div>
                        <h5 class="fw-semibold mb-0">Elizabeth Malone</h5>
                        <span class="fs-2 d-flex align-items-center"><i class="ti ti-map-pin text-dark fs-3 me-1"></i>Djibouti</span>
                      </div>
                      <button class="btn btn-primary py-1 px-2 ms-auto">Followed</button>
                    </div>
                  </div>
                </div>
                <div class=" col-md-6 col-xl-4">
                  <div class="card">
                    <div class="card-body p-4 d-flex align-items-center gap-3">
                      <img src="../../dist/images/profile/user-10.jpg" alt="" class="rounded-circle" width="40" height="40">
                      <div>
                        <h5 class="fw-semibold mb-0">Jon Cohen</h5>
                        <span class="fs-2 d-flex align-items-center"><i class="ti ti-map-pin text-dark fs-3 me-1"></i>United States</span>
                      </div>
                      <button class="btn btn-primary py-1 px-2 ms-auto">Followed</button>
                    </div>
                  </div>
                </div>
                <div class=" col-md-6 col-xl-4">
                  <div class="card">
                    <div class="card-body p-4 d-flex align-items-center gap-3">
                      <img src="../../dist/images/profile/user-1.jpg" alt="" class="rounded-circle" width="40" height="40">
                      <div>
                        <h5 class="fw-semibold mb-0">Mary Hernandez</h5>
                        <span class="fs-2 d-flex align-items-center"><i class="ti ti-map-pin text-dark fs-3 me-1"></i>Equatorial Guinea</span>
                      </div>
                      <button class="btn btn-outline-primary py-1 px-2 ms-auto">Follow</button>
                    </div>
                  </div>
                </div>
                <div class=" col-md-6 col-xl-4">
                  <div class="card">
                    <div class="card-body p-4 d-flex align-items-center gap-3">
                      <img src="../../dist/images/profile/user-2.jpg" alt="" class="rounded-circle" width="40" height="40">
                      <div>
                        <h5 class="fw-semibold mb-0">Willie Peterson</h5>
                        <span class="fs-2 d-flex align-items-center"><i class="ti ti-map-pin text-dark fs-3 me-1"></i>Solomon Islands</span>
                      </div>
                      <button class="btn btn-primary py-1 px-2 ms-auto">Followed</button>
                    </div>
                  </div>
                </div>
                <div class=" col-md-6 col-xl-4">
                  <div class="card">
                    <div class="card-body p-4 d-flex align-items-center gap-3">
                      <img src="../../dist/images/profile/user-3.jpg" alt="" class="rounded-circle" width="40" height="40">
                      <div>
                        <h5 class="fw-semibold mb-0">Harvey Baldwin</h5>
                        <span class="fs-2 d-flex align-items-center"><i class="ti ti-map-pin text-dark fs-3 me-1"></i>Uruguay</span>
                      </div>
                      <button class="btn btn-primary py-1 px-2 ms-auto">Followed</button>
                    </div>
                  </div>
                </div>
                <div class=" col-md-6 col-xl-4">
                  <div class="card">
                    <div class="card-body p-4 d-flex align-items-center gap-3">
                      <img src="../../dist/images/profile/user-4.jpg" alt="" class="rounded-circle" width="40" height="40">
                      <div>
                        <h5 class="fw-semibold mb-0">Alice George</h5>
                        <span class="fs-2 d-flex align-items-center"><i class="ti ti-map-pin text-dark fs-3 me-1"></i>Madagascar</span>
                      </div>
                      <button class="btn btn-outline-primary py-1 px-2 ms-auto">Follow</button>
                    </div>
                  </div>
                </div>
                <div class=" col-md-6 col-xl-4">
                  <div class="card">
                    <div class="card-body p-4 d-flex align-items-center gap-3">
                      <img src="../../dist/images/profile/user-5.jpg" alt="" class="rounded-circle" width="40" height="40">
                      <div>
                        <h5 class="fw-semibold mb-0">Beulah Simpson</h5>
                        <span class="fs-2 d-flex align-items-center"><i class="ti ti-map-pin text-dark fs-3 me-1"></i>Bahrain</span>
                      </div>
                      <button class="btn btn-primary py-1 px-2 ms-auto">Followed</button>
                    </div>
                  </div>
                </div>
                <div class=" col-md-6 col-xl-4">
                  <div class="card">
                    <div class="card-body p-4 d-flex align-items-center gap-3">
                      <img src="../../dist/images/profile/user-6.jpg" alt="" class="rounded-circle" width="40" height="40">
                      <div>
                        <h5 class="fw-semibold mb-0">Francis Barber</h5>
                        <span class="fs-2 d-flex align-items-center"><i class="ti ti-map-pin text-dark fs-3 me-1"></i>Colombia</span>
                      </div>
                      <button class="btn btn-outline-primary py-1 px-2 ms-auto">Follow</button>
                    </div>
                  </div>
                </div>
                <div class=" col-md-6 col-xl-4">
                  <div class="card">
                    <div class="card-body p-4 d-flex align-items-center gap-3">
                      <img src="../../dist/images/profile/user-7.jpg" alt="" class="rounded-circle" width="40" height="40">
                      <div>
                        <h5 class="fw-semibold mb-0">Christian Morales</h5>
                        <span class="fs-2 d-flex align-items-center"><i class="ti ti-map-pin text-dark fs-3 me-1"></i>Maldives</span>
                      </div>
                      <button class="btn btn-primary py-1 px-2 ms-auto">Followed</button>
                    </div>
                  </div>
                </div>
                <div class=" col-md-6 col-xl-4">
                  <div class="card">
                    <div class="card-body p-4 d-flex align-items-center gap-3">
                      <img src="../../dist/images/profile/user-8.jpg" alt="" class="rounded-circle" width="40" height="40">
                      <div>
                        <h5 class="fw-semibold mb-0">Laura Nelson</h5>
                        <span class="fs-2 d-flex align-items-center"><i class="ti ti-map-pin text-dark fs-3 me-1"></i>St. Helena</span>
                      </div>
                      <button class="btn btn-primary py-1 px-2 ms-auto">Followed</button>
                    </div>
                  </div>
                </div>
                <div class=" col-md-6 col-xl-4">
                  <div class="card">
                    <div class="card-body p-4 d-flex align-items-center gap-3">
                      <img src="../../dist/images/profile/user-9.jpg" alt="" class="rounded-circle" width="40" height="40">
                      <div>
                        <h5 class="fw-semibold mb-0">Blanche Strickland</h5>
                        <span class="fs-2 d-flex align-items-center"><i class="ti ti-map-pin text-dark fs-3 me-1"></i>South Africa</span>
                      </div>
                      <button class="btn btn-primary py-1 px-2 ms-auto">Followed</button>
                    </div>
                  </div>
                </div>
                <div class=" col-md-6 col-xl-4">
                  <div class="card">
                    <div class="card-body p-4 d-flex align-items-center gap-3">
                      <img src="../../dist/images/profile/user-10.jpg" alt="" class="rounded-circle" width="40" height="40">
                      <div>
                        <h5 class="fw-semibold mb-0">Adam Washington</h5>
                        <span class="fs-2 d-flex align-items-center"><i class="ti ti-map-pin text-dark fs-3 me-1"></i>Suriname</span>
                      </div>
                      <button class="btn btn-primary py-1 px-2 ms-auto">Followed</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="tab-pane fade" id="pills-friends" role="tabpanel" aria-labelledby="pills-friends-tab" tabindex="0">
              <div class="d-sm-flex align-items-center justify-content-between mt-3 mb-4">
                <h3 class="mb-3 mb-sm-0 fw-semibold d-flex align-items-center">Friends <span class="badge text-bg-secondary fs-2 rounded-4 py-1 px-2 ms-2">20</span></h3>
                <form class="position-relative">
                  <input type="text" class="form-control search-chat py-2 ps-5" id="text-srh" placeholder="Search Friends">
                  <i class="ti ti-search position-absolute top-50 start-0 translate-middle-y text-dark ms-3"></i>
                </form>
              </div>
              <div class="row">
                <div class="col-sm-6 col-lg-4">
                  <div class="card hover-img">
                    <div class="card-body p-4 text-center border-bottom">
                      <img src="../../dist/images/profile/user-1.jpg" alt="" class="rounded-circle mb-3" width="80" height="80">
                      <h5 class="fw-semibold mb-0">Betty Adams</h5>
                      <span class="text-dark fs-2">Medical Secretary</span>
                    </div>
                    <ul class="px-2 py-2 bg-light list-unstyled d-flex align-items-center justify-content-center mb-0">
                      <li class="position-relative">
                        <a class="text-primary d-flex align-items-center justify-content-center p-2 fs-5 rounded-circle fw-semibold" href="javascript:void(0)">
                          <i class="ti ti-brand-facebook"></i>
                        </a>
                      </li>
                      <li class="position-relative">
                        <a class="text-danger d-flex align-items-center justify-content-center p-2 fs-5 rounded-circle fw-semibold " href="javascript:void(0)">
                          <i class="ti ti-brand-instagram"></i>
                        </a>
                      </li>
                      <li class="position-relative">
                        <a class="text-info d-flex align-items-center justify-content-center p-2 fs-5 rounded-circle fw-semibold " href="javascript:void(0)">
                          <i class="ti ti-brand-github"></i>
                        </a>
                      </li>
                      <li class="position-relative">
                        <a class="text-secondary d-flex align-items-center justify-content-center p-2 fs-5 rounded-circle fw-semibold " href="javascript:void(0)">
                          <i class="ti ti-brand-twitter"></i>
                        </a>
                      </li>
                    </ul>
                  </div>
                </div>
                <div class="col-sm-6 col-lg-4">
                  <div class="card hover-img">
                    <div class="card-body p-4 text-center border-bottom">
                      <img src="../../dist/images/profile/user-2.jpg" alt="" class="rounded-circle mb-3" width="80" height="80">
                      <h5 class="fw-semibold mb-0">Inez Lyons</h5>
                      <span class="text-dark fs-2">Medical Technician</span>
                    </div>
                    <ul class="px-2 py-2 bg-light list-unstyled d-flex align-items-center justify-content-center mb-0">
                      <li class="position-relative">
                        <a class="text-primary d-flex align-items-center justify-content-center p-2 fs-5 rounded-circle fw-semibold" href="javascript:void(0)">
                          <i class="ti ti-brand-facebook"></i>
                        </a>
                      </li>
                      <li class="position-relative">
                        <a class="text-danger d-flex align-items-center justify-content-center p-2 fs-5 rounded-circle fw-semibold " href="javascript:void(0)">
                          <i class="ti ti-brand-instagram"></i>
                        </a>
                      </li>
                      <li class="position-relative">
                        <a class="text-info d-flex align-items-center justify-content-center p-2 fs-5 rounded-circle fw-semibold " href="javascript:void(0)">
                          <i class="ti ti-brand-github"></i>
                        </a>
                      </li>
                      <li class="position-relative">
                        <a class="text-secondary d-flex align-items-center justify-content-center p-2 fs-5 rounded-circle fw-semibold " href="javascript:void(0)">
                          <i class="ti ti-brand-twitter"></i>
                        </a>
                      </li>
                    </ul>
                  </div>
                </div>
                <div class="col-sm-6 col-lg-4">
                  <div class="card hover-img">
                    <div class="card-body p-4 text-center border-bottom">
                      <img src="../../dist/images/profile/user-3.jpg" alt="" class="rounded-circle mb-3" width="80" height="80">
                      <h5 class="fw-semibold mb-0">Lydia Bryan</h5>
                      <span class="text-dark fs-2">Preschool Teacher</span>
                    </div>
                    <ul class="px-2 py-2 bg-light list-unstyled d-flex align-items-center justify-content-center mb-0">
                      <li class="position-relative">
                        <a class="text-primary d-flex align-items-center justify-content-center p-2 fs-5 rounded-circle fw-semibold" href="javascript:void(0)">
                          <i class="ti ti-brand-facebook"></i>
                        </a>
                      </li>
                      <li class="position-relative">
                        <a class="text-danger d-flex align-items-center justify-content-center p-2 fs-5 rounded-circle fw-semibold " href="javascript:void(0)">
                          <i class="ti ti-brand-instagram"></i>
                        </a>
                      </li>
                      <li class="position-relative">
                        <a class="text-info d-flex align-items-center justify-content-center p-2 fs-5 rounded-circle fw-semibold " href="javascript:void(0)">
                          <i class="ti ti-brand-github"></i>
                        </a>
                      </li>
                      <li class="position-relative">
                        <a class="text-secondary d-flex align-items-center justify-content-center p-2 fs-5 rounded-circle fw-semibold " href="javascript:void(0)">
                          <i class="ti ti-brand-twitter"></i>
                        </a>
                      </li>
                    </ul>
                  </div>
                </div>
                <div class="col-sm-6 col-lg-4">
                  <div class="card hover-img">
                    <div class="card-body p-4 text-center border-bottom">
                      <img src="../../dist/images/profile/user-4.jpg" alt="" class="rounded-circle mb-3" width="80" height="80">
                      <h5 class="fw-semibold mb-0">Carolyn Bryant</h5>
                      <span class="text-dark fs-2">Legal Secretary</span>
                    </div>
                    <ul class="px-2 py-2 bg-light list-unstyled d-flex align-items-center justify-content-center mb-0">
                      <li class="position-relative">
                        <a class="text-primary d-flex align-items-center justify-content-center p-2 fs-5 rounded-circle fw-semibold" href="javascript:void(0)">
                          <i class="ti ti-brand-facebook"></i>
                        </a>
                      </li>
                      <li class="position-relative">
                        <a class="text-danger d-flex align-items-center justify-content-center p-2 fs-5 rounded-circle fw-semibold " href="javascript:void(0)">
                          <i class="ti ti-brand-instagram"></i>
                        </a>
                      </li>
                      <li class="position-relative">
                        <a class="text-info d-flex align-items-center justify-content-center p-2 fs-5 rounded-circle fw-semibold " href="javascript:void(0)">
                          <i class="ti ti-brand-github"></i>
                        </a>
                      </li>
                      <li class="position-relative">
                        <a class="text-secondary d-flex align-items-center justify-content-center p-2 fs-5 rounded-circle fw-semibold " href="javascript:void(0)">
                          <i class="ti ti-brand-twitter"></i>
                        </a>
                      </li>
                    </ul>
                  </div>
                </div>
                <div class="col-sm-6 col-lg-4">
                  <div class="card hover-img">
                    <div class="card-body p-4 text-center border-bottom">
                      <img src="../../dist/images/profile/user-5.jpg" alt="" class="rounded-circle mb-3" width="80" height="80">
                      <h5 class="fw-semibold mb-0">Paul Benson</h5>
                      <span class="text-dark fs-2">Safety Engineer</span>
                    </div>
                    <ul class="px-2 py-2 bg-light list-unstyled d-flex align-items-center justify-content-center mb-0">
                      <li class="position-relative">
                        <a class="text-primary d-flex align-items-center justify-content-center p-2 fs-5 rounded-circle fw-semibold" href="javascript:void(0)">
                          <i class="ti ti-brand-facebook"></i>
                        </a>
                      </li>
                      <li class="position-relative">
                        <a class="text-danger d-flex align-items-center justify-content-center p-2 fs-5 rounded-circle fw-semibold " href="javascript:void(0)">
                          <i class="ti ti-brand-instagram"></i>
                        </a>
                      </li>
                      <li class="position-relative">
                        <a class="text-info d-flex align-items-center justify-content-center p-2 fs-5 rounded-circle fw-semibold " href="javascript:void(0)">
                          <i class="ti ti-brand-github"></i>
                        </a>
                      </li>
                      <li class="position-relative">
                        <a class="text-secondary d-flex align-items-center justify-content-center p-2 fs-5 rounded-circle fw-semibold " href="javascript:void(0)">
                          <i class="ti ti-brand-twitter"></i>
                        </a>
                      </li>
                    </ul>
                  </div>
                </div>
                <div class="col-sm-6 col-lg-4">
                  <div class="card hover-img">
                    <div class="card-body p-4 text-center border-bottom">
                      <img src="../../dist/images/profile/user-6.jpg" alt="" class="rounded-circle mb-3" width="80" height="80">
                      <h5 class="fw-semibold mb-0">Robert Francis</h5>
                      <span class="text-dark fs-2">Nursing Administrator</span>
                    </div>
                    <ul class="px-2 py-2 bg-light list-unstyled d-flex align-items-center justify-content-center mb-0">
                      <li class="position-relative">
                        <a class="text-primary d-flex align-items-center justify-content-center p-2 fs-5 rounded-circle fw-semibold" href="javascript:void(0)">
                          <i class="ti ti-brand-facebook"></i>
                        </a>
                      </li>
                      <li class="position-relative">
                        <a class="text-danger d-flex align-items-center justify-content-center p-2 fs-5 rounded-circle fw-semibold " href="javascript:void(0)">
                          <i class="ti ti-brand-instagram"></i>
                        </a>
                      </li>
                      <li class="position-relative">
                        <a class="text-info d-flex align-items-center justify-content-center p-2 fs-5 rounded-circle fw-semibold " href="javascript:void(0)">
                          <i class="ti ti-brand-github"></i>
                        </a>
                      </li>
                      <li class="position-relative">
                        <a class="text-secondary d-flex align-items-center justify-content-center p-2 fs-5 rounded-circle fw-semibold " href="javascript:void(0)">
                          <i class="ti ti-brand-twitter"></i>
                        </a>
                      </li>
                    </ul>
                  </div>
                </div>
                <div class="col-sm-6 col-lg-4">
                  <div class="card hover-img">
                    <div class="card-body p-4 text-center border-bottom">
                      <img src="../../dist/images/profile/user-7.jpg" alt="" class="rounded-circle mb-3" width="80" height="80">
                      <h5 class="fw-semibold mb-0">Billy Rogers</h5>
                      <span class="text-dark fs-2">Legal Secretary</span>
                    </div>
                    <ul class="px-2 py-2 bg-light list-unstyled d-flex align-items-center justify-content-center mb-0">
                      <li class="position-relative">
                        <a class="text-primary d-flex align-items-center justify-content-center p-2 fs-5 rounded-circle fw-semibold" href="javascript:void(0)">
                          <i class="ti ti-brand-facebook"></i>
                        </a>
                      </li>
                      <li class="position-relative">
                        <a class="text-danger d-flex align-items-center justify-content-center p-2 fs-5 rounded-circle fw-semibold " href="javascript:void(0)">
                          <i class="ti ti-brand-instagram"></i>
                        </a>
                      </li>
                      <li class="position-relative">
                        <a class="text-info d-flex align-items-center justify-content-center p-2 fs-5 rounded-circle fw-semibold " href="javascript:void(0)">
                          <i class="ti ti-brand-github"></i>
                        </a>
                      </li>
                      <li class="position-relative">
                        <a class="text-secondary d-flex align-items-center justify-content-center p-2 fs-5 rounded-circle fw-semibold " href="javascript:void(0)">
                          <i class="ti ti-brand-twitter"></i>
                        </a>
                      </li>
                    </ul>
                  </div>
                </div>
                <div class="col-sm-6 col-lg-4">
                  <div class="card hover-img">
                    <div class="card-body p-4 text-center border-bottom">
                      <img src="../../dist/images/profile/user-8.jpg" alt="" class="rounded-circle mb-3" width="80" height="80">
                      <h5 class="fw-semibold mb-0">Rosetta Brewer</h5>
                      <span class="text-dark fs-2">Comptroller</span>
                    </div>
                    <ul class="px-2 py-2 bg-light list-unstyled d-flex align-items-center justify-content-center mb-0">
                      <li class="position-relative">
                        <a class="text-primary d-flex align-items-center justify-content-center p-2 fs-5 rounded-circle fw-semibold" href="javascript:void(0)">
                          <i class="ti ti-brand-facebook"></i>
                        </a>
                      </li>
                      <li class="position-relative">
                        <a class="text-danger d-flex align-items-center justify-content-center p-2 fs-5 rounded-circle fw-semibold " href="javascript:void(0)">
                          <i class="ti ti-brand-instagram"></i>
                        </a>
                      </li>
                      <li class="position-relative">
                        <a class="text-info d-flex align-items-center justify-content-center p-2 fs-5 rounded-circle fw-semibold " href="javascript:void(0)">
                          <i class="ti ti-brand-github"></i>
                        </a>
                      </li>
                      <li class="position-relative">
                        <a class="text-secondary d-flex align-items-center justify-content-center p-2 fs-5 rounded-circle fw-semibold " href="javascript:void(0)">
                          <i class="ti ti-brand-twitter"></i>
                        </a>
                      </li>
                    </ul>
                  </div>
                </div>
                <div class="col-sm-6 col-lg-4">
                  <div class="card hover-img">
                    <div class="card-body p-4 text-center border-bottom">
                      <img src="../../dist/images/profile/user-9.jpg" alt="" class="rounded-circle mb-3" width="80" height="80">
                      <h5 class="fw-semibold mb-0">Patrick Knight</h5>
                      <span class="text-dark fs-2">Retail Store Manager</span>
                    </div>
                    <ul class="px-2 py-2 bg-light list-unstyled d-flex align-items-center justify-content-center mb-0">
                      <li class="position-relative">
                        <a class="text-primary d-flex align-items-center justify-content-center p-2 fs-5 rounded-circle fw-semibold" href="javascript:void(0)">
                          <i class="ti ti-brand-facebook"></i>
                        </a>
                      </li>
                      <li class="position-relative">
                        <a class="text-danger d-flex align-items-center justify-content-center p-2 fs-5 rounded-circle fw-semibold " href="javascript:void(0)">
                          <i class="ti ti-brand-instagram"></i>
                        </a>
                      </li>
                      <li class="position-relative">
                        <a class="text-info d-flex align-items-center justify-content-center p-2 fs-5 rounded-circle fw-semibold " href="javascript:void(0)">
                          <i class="ti ti-brand-github"></i>
                        </a>
                      </li>
                      <li class="position-relative">
                        <a class="text-secondary d-flex align-items-center justify-content-center p-2 fs-5 rounded-circle fw-semibold " href="javascript:void(0)">
                          <i class="ti ti-brand-twitter"></i>
                        </a>
                      </li>
                    </ul>
                  </div>
                </div>
                <div class="col-sm-6 col-lg-4">
                  <div class="card hover-img">
                    <div class="card-body p-4 text-center border-bottom">
                      <img src="../../dist/images/profile/user-10.jpg" alt="" class="rounded-circle mb-3" width="80" height="80">
                      <h5 class="fw-semibold mb-0">Francis Sutton</h5>
                      <span class="text-dark fs-2">Astronomer</span>
                    </div>
                    <ul class="px-2 py-2 bg-light list-unstyled d-flex align-items-center justify-content-center mb-0">
                      <li class="position-relative">
                        <a class="text-primary d-flex align-items-center justify-content-center p-2 fs-5 rounded-circle fw-semibold" href="javascript:void(0)">
                          <i class="ti ti-brand-facebook"></i>
                        </a>
                      </li>
                      <li class="position-relative">
                        <a class="text-danger d-flex align-items-center justify-content-center p-2 fs-5 rounded-circle fw-semibold " href="javascript:void(0)">
                          <i class="ti ti-brand-instagram"></i>
                        </a>
                      </li>
                      <li class="position-relative">
                        <a class="text-info d-flex align-items-center justify-content-center p-2 fs-5 rounded-circle fw-semibold " href="javascript:void(0)">
                          <i class="ti ti-brand-github"></i>
                        </a>
                      </li>
                      <li class="position-relative">
                        <a class="text-secondary d-flex align-items-center justify-content-center p-2 fs-5 rounded-circle fw-semibold " href="javascript:void(0)">
                          <i class="ti ti-brand-twitter"></i>
                        </a>
                      </li>
                    </ul>
                  </div>
                </div>
                <div class="col-sm-6 col-lg-4">
                  <div class="card hover-img">
                    <div class="card-body p-4 text-center border-bottom">
                      <img src="../../dist/images/profile/user-1.jpg" alt="" class="rounded-circle mb-3" width="80" height="80">
                      <h5 class="fw-semibold mb-0">Bernice Henry</h5>
                      <span class="text-dark fs-2">Security Consultant</span>
                    </div>
                    <ul class="px-2 py-2 bg-light list-unstyled d-flex align-items-center justify-content-center mb-0">
                      <li class="position-relative">
                        <a class="text-primary d-flex align-items-center justify-content-center p-2 fs-5 rounded-circle fw-semibold" href="javascript:void(0)">
                          <i class="ti ti-brand-facebook"></i>
                        </a>
                      </li>
                      <li class="position-relative">
                        <a class="text-danger d-flex align-items-center justify-content-center p-2 fs-5 rounded-circle fw-semibold " href="javascript:void(0)">
                          <i class="ti ti-brand-instagram"></i>
                        </a>
                      </li>
                      <li class="position-relative">
                        <a class="text-info d-flex align-items-center justify-content-center p-2 fs-5 rounded-circle fw-semibold " href="javascript:void(0)">
                          <i class="ti ti-brand-github"></i>
                        </a>
                      </li>
                      <li class="position-relative">
                        <a class="text-secondary d-flex align-items-center justify-content-center p-2 fs-5 rounded-circle fw-semibold " href="javascript:void(0)">
                          <i class="ti ti-brand-twitter"></i>
                        </a>
                      </li>
                    </ul>
                  </div>
                </div>
                <div class="col-sm-6 col-lg-4">
                  <div class="card hover-img">
                    <div class="card-body p-4 text-center border-bottom">
                      <img src="../../dist/images/profile/user-2.jpg" alt="" class="rounded-circle mb-3" width="80" height="80">
                      <h5 class="fw-semibold mb-0">Estella Garcia</h5>
                      <span class="text-dark fs-2">Lead Software Test Engineer</span>
                    </div>
                    <ul class="px-2 py-2 bg-light list-unstyled d-flex align-items-center justify-content-center mb-0">
                      <li class="position-relative">
                        <a class="text-primary d-flex align-items-center justify-content-center p-2 fs-5 rounded-circle fw-semibold" href="javascript:void(0)">
                          <i class="ti ti-brand-facebook"></i>
                        </a>
                      </li>
                      <li class="position-relative">
                        <a class="text-danger d-flex align-items-center justify-content-center p-2 fs-5 rounded-circle fw-semibold " href="javascript:void(0)">
                          <i class="ti ti-brand-instagram"></i>
                        </a>
                      </li>
                      <li class="position-relative">
                        <a class="text-info d-flex align-items-center justify-content-center p-2 fs-5 rounded-circle fw-semibold " href="javascript:void(0)">
                          <i class="ti ti-brand-github"></i>
                        </a>
                      </li>
                      <li class="position-relative">
                        <a class="text-secondary d-flex align-items-center justify-content-center p-2 fs-5 rounded-circle fw-semibold " href="javascript:void(0)">
                          <i class="ti ti-brand-twitter"></i>
                        </a>
                      </li>
                    </ul>
                  </div>
                </div>
                <div class="col-sm-6 col-lg-4">
                  <div class="card hover-img">
                    <div class="card-body p-4 text-center border-bottom">
                      <img src="../../dist/images/profile/user-3.jpg" alt="" class="rounded-circle mb-3" width="80" height="80">
                      <h5 class="fw-semibold mb-0">Norman Moran</h5>
                      <span class="text-dark fs-2">Engineer Technician</span>
                    </div>
                    <ul class="px-2 py-2 bg-light list-unstyled d-flex align-items-center justify-content-center mb-0">
                      <li class="position-relative">
                        <a class="text-primary d-flex align-items-center justify-content-center p-2 fs-5 rounded-circle fw-semibold" href="javascript:void(0)">
                          <i class="ti ti-brand-facebook"></i>
                        </a>
                      </li>
                      <li class="position-relative">
                        <a class="text-danger d-flex align-items-center justify-content-center p-2 fs-5 rounded-circle fw-semibold " href="javascript:void(0)">
                          <i class="ti ti-brand-instagram"></i>
                        </a>
                      </li>
                      <li class="position-relative">
                        <a class="text-info d-flex align-items-center justify-content-center p-2 fs-5 rounded-circle fw-semibold " href="javascript:void(0)">
                          <i class="ti ti-brand-github"></i>
                        </a>
                      </li>
                      <li class="position-relative">
                        <a class="text-secondary d-flex align-items-center justify-content-center p-2 fs-5 rounded-circle fw-semibold " href="javascript:void(0)">
                          <i class="ti ti-brand-twitter"></i>
                        </a>
                      </li>
                    </ul>
                  </div>
                </div>
                <div class="col-sm-6 col-lg-4">
                  <div class="card hover-img">
                    <div class="card-body p-4 text-center border-bottom">
                      <img src="../../dist/images/profile/user-4.jpg" alt="" class="rounded-circle mb-3" width="80" height="80">
                      <h5 class="fw-semibold mb-0">Jessie Matthews</h5>
                      <span class="text-dark fs-2">Lead Software Engineer</span>
                    </div>
                    <ul class="px-2 py-2 bg-light list-unstyled d-flex align-items-center justify-content-center mb-0">
                      <li class="position-relative">
                        <a class="text-primary d-flex align-items-center justify-content-center p-2 fs-5 rounded-circle fw-semibold" href="javascript:void(0)">
                          <i class="ti ti-brand-facebook"></i>
                        </a>
                      </li>
                      <li class="position-relative">
                        <a class="text-danger d-flex align-items-center justify-content-center p-2 fs-5 rounded-circle fw-semibold " href="javascript:void(0)">
                          <i class="ti ti-brand-instagram"></i>
                        </a>
                      </li>
                      <li class="position-relative">
                        <a class="text-info d-flex align-items-center justify-content-center p-2 fs-5 rounded-circle fw-semibold " href="javascript:void(0)">
                          <i class="ti ti-brand-github"></i>
                        </a>
                      </li>
                      <li class="position-relative">
                        <a class="text-secondary d-flex align-items-center justify-content-center p-2 fs-5 rounded-circle fw-semibold " href="javascript:void(0)">
                          <i class="ti ti-brand-twitter"></i>
                        </a>
                      </li>
                    </ul>
                  </div>
                </div>
                <div class="col-sm-6 col-lg-4">
                  <div class="card hover-img">
                    <div class="card-body p-4 text-center border-bottom">
                      <img src="../../dist/images/profile/user-5.jpg" alt="" class="rounded-circle mb-3" width="80" height="80">
                      <h5 class="fw-semibold mb-0">Elijah Perez</h5>
                      <span class="text-dark fs-2">Special Education Teacher</span>
                    </div>
                    <ul class="px-2 py-2 bg-light list-unstyled d-flex align-items-center justify-content-center mb-0">
                      <li class="position-relative">
                        <a class="text-primary d-flex align-items-center justify-content-center p-2 fs-5 rounded-circle fw-semibold" href="javascript:void(0)">
                          <i class="ti ti-brand-facebook"></i>
                        </a>
                      </li>
                      <li class="position-relative">
                        <a class="text-danger d-flex align-items-center justify-content-center p-2 fs-5 rounded-circle fw-semibold " href="javascript:void(0)">
                          <i class="ti ti-brand-instagram"></i>
                        </a>
                      </li>
                      <li class="position-relative">
                        <a class="text-info d-flex align-items-center justify-content-center p-2 fs-5 rounded-circle fw-semibold " href="javascript:void(0)">
                          <i class="ti ti-brand-github"></i>
                        </a>
                      </li>
                      <li class="position-relative">
                        <a class="text-secondary d-flex align-items-center justify-content-center p-2 fs-5 rounded-circle fw-semibold " href="javascript:void(0)">
                          <i class="ti ti-brand-twitter"></i>
                        </a>
                      </li>
                    </ul>
                  </div>
                </div>
                <div class="col-sm-6 col-lg-4">
                  <div class="card hover-img">
                    <div class="card-body p-4 text-center border-bottom">
                      <img src="../../dist/images/profile/user-6.jpg" alt="" class="rounded-circle mb-3" width="80" height="80">
                      <h5 class="fw-semibold mb-0">Robert Martin</h5>
                      <span class="text-dark fs-2">Transportation Manager</span>
                    </div>
                    <ul class="px-2 py-2 bg-light list-unstyled d-flex align-items-center justify-content-center mb-0">
                      <li class="position-relative">
                        <a class="text-primary d-flex align-items-center justify-content-center p-2 fs-5 rounded-circle fw-semibold" href="javascript:void(0)">
                          <i class="ti ti-brand-facebook"></i>
                        </a>
                      </li>
                      <li class="position-relative">
                        <a class="text-danger d-flex align-items-center justify-content-center p-2 fs-5 rounded-circle fw-semibold " href="javascript:void(0)">
                          <i class="ti ti-brand-instagram"></i>
                        </a>
                      </li>
                      <li class="position-relative">
                        <a class="text-info d-flex align-items-center justify-content-center p-2 fs-5 rounded-circle fw-semibold " href="javascript:void(0)">
                          <i class="ti ti-brand-github"></i>
                        </a>
                      </li>
                      <li class="position-relative">
                        <a class="text-secondary d-flex align-items-center justify-content-center p-2 fs-5 rounded-circle fw-semibold " href="javascript:void(0)">
                          <i class="ti ti-brand-twitter"></i>
                        </a>
                      </li>
                    </ul>
                  </div>
                </div>
                <div class="col-sm-6 col-lg-4">
                  <div class="card hover-img">
                    <div class="card-body p-4 text-center border-bottom">
                      <img src="../../dist/images/profile/user-7.jpg" alt="" class="rounded-circle mb-3" width="80" height="80">
                      <h5 class="fw-semibold mb-0">Elva Wong</h5>
                      <span class="text-dark fs-2">Logistics Manager</span>
                    </div>
                    <ul class="px-2 py-2 bg-light list-unstyled d-flex align-items-center justify-content-center mb-0">
                      <li class="position-relative">
                        <a class="text-primary d-flex align-items-center justify-content-center p-2 fs-5 rounded-circle fw-semibold" href="javascript:void(0)">
                          <i class="ti ti-brand-facebook"></i>
                        </a>
                      </li>
                      <li class="position-relative">
                        <a class="text-danger d-flex align-items-center justify-content-center p-2 fs-5 rounded-circle fw-semibold " href="javascript:void(0)">
                          <i class="ti ti-brand-instagram"></i>
                        </a>
                      </li>
                      <li class="position-relative">
                        <a class="text-info d-flex align-items-center justify-content-center p-2 fs-5 rounded-circle fw-semibold " href="javascript:void(0)">
                          <i class="ti ti-brand-github"></i>
                        </a>
                      </li>
                      <li class="position-relative">
                        <a class="text-secondary d-flex align-items-center justify-content-center p-2 fs-5 rounded-circle fw-semibold " href="javascript:void(0)">
                          <i class="ti ti-brand-twitter"></i>
                        </a>
                      </li>
                    </ul>
                  </div>
                </div>
                <div class="col-sm-6 col-lg-4">
                  <div class="card hover-img">
                    <div class="card-body p-4 text-center border-bottom">
                      <img src="../../dist/images/profile/user-8.jpg" alt="" class="rounded-circle mb-3" width="80" height="80">
                      <h5 class="fw-semibold mb-0">Edith Taylor</h5>
                      <span class="text-dark fs-2">Union Representative</span>
                    </div>
                    <ul class="px-2 py-2 bg-light list-unstyled d-flex align-items-center justify-content-center mb-0">
                      <li class="position-relative">
                        <a class="text-primary d-flex align-items-center justify-content-center p-2 fs-5 rounded-circle fw-semibold" href="javascript:void(0)">
                          <i class="ti ti-brand-facebook"></i>
                        </a>
                      </li>
                      <li class="position-relative">
                        <a class="text-danger d-flex align-items-center justify-content-center p-2 fs-5 rounded-circle fw-semibold " href="javascript:void(0)">
                          <i class="ti ti-brand-instagram"></i>
                        </a>
                      </li>
                      <li class="position-relative">
                        <a class="text-info d-flex align-items-center justify-content-center p-2 fs-5 rounded-circle fw-semibold " href="javascript:void(0)">
                          <i class="ti ti-brand-github"></i>
                        </a>
                      </li>
                      <li class="position-relative">
                        <a class="text-secondary d-flex align-items-center justify-content-center p-2 fs-5 rounded-circle fw-semibold " href="javascript:void(0)">
                          <i class="ti ti-brand-twitter"></i>
                        </a>
                      </li>
                    </ul>
                  </div>
                </div>
                <div class="col-sm-6 col-lg-4">
                  <div class="card hover-img">
                    <div class="card-body p-4 text-center border-bottom">
                      <img src="../../dist/images/profile/user-9.jpg" alt="" class="rounded-circle mb-3" width="80" height="80">
                      <h5 class="fw-semibold mb-0">Violet Jackson</h5>
                      <span class="text-dark fs-2">Agricultural Inspector</span>
                    </div>
                    <ul class="px-2 py-2 bg-light list-unstyled d-flex align-items-center justify-content-center mb-0">
                      <li class="position-relative">
                        <a class="text-primary d-flex align-items-center justify-content-center p-2 fs-5 rounded-circle fw-semibold" href="javascript:void(0)">
                          <i class="ti ti-brand-facebook"></i>
                        </a>
                      </li>
                      <li class="position-relative">
                        <a class="text-danger d-flex align-items-center justify-content-center p-2 fs-5 rounded-circle fw-semibold " href="javascript:void(0)">
                          <i class="ti ti-brand-instagram"></i>
                        </a>
                      </li>
                      <li class="position-relative">
                        <a class="text-info d-flex align-items-center justify-content-center p-2 fs-5 rounded-circle fw-semibold " href="javascript:void(0)">
                          <i class="ti ti-brand-github"></i>
                        </a>
                      </li>
                      <li class="position-relative">
                        <a class="text-secondary d-flex align-items-center justify-content-center p-2 fs-5 rounded-circle fw-semibold " href="javascript:void(0)">
                          <i class="ti ti-brand-twitter"></i>
                        </a>
                      </li>
                    </ul>
                  </div>
                </div>
                <div class="col-sm-6 col-lg-4">
                  <div class="card hover-img">
                    <div class="card-body p-4 text-center border-bottom">
                      <img src="../../dist/images/profile/user-10.jpg" alt="" class="rounded-circle mb-3" width="80" height="80">
                      <h5 class="fw-semibold mb-0">Phoebe Owens</h5>
                      <span class="text-dark fs-2">Safety Engineer</span>
                    </div>
                    <ul class="px-2 py-2 bg-light list-unstyled d-flex align-items-center justify-content-center mb-0">
                      <li class="position-relative">
                        <a class="text-primary d-flex align-items-center justify-content-center p-2 fs-5 rounded-circle fw-semibold" href="javascript:void(0)">
                          <i class="ti ti-brand-facebook"></i>
                        </a>
                      </li>
                      <li class="position-relative">
                        <a class="text-danger d-flex align-items-center justify-content-center p-2 fs-5 rounded-circle fw-semibold " href="javascript:void(0)">
                          <i class="ti ti-brand-instagram"></i>
                        </a>
                      </li>
                      <li class="position-relative">
                        <a class="text-info d-flex align-items-center justify-content-center p-2 fs-5 rounded-circle fw-semibold " href="javascript:void(0)">
                          <i class="ti ti-brand-github"></i>
                        </a>
                      </li>
                      <li class="position-relative">
                        <a class="text-secondary d-flex align-items-center justify-content-center p-2 fs-5 rounded-circle fw-semibold " href="javascript:void(0)">
                          <i class="ti ti-brand-twitter"></i>
                        </a>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>


          </div>
        </div>
      </div>
    </div>
    <!--  Shopping Cart -->
    <div class="offcanvas offcanvas-end shopping-cart" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
      <div class="offcanvas-header py-4">
        <h5 class="offcanvas-title fs-5 fw-semibold" id="offcanvasRightLabel">Shopping Cart</h5>
        <span class="badge bg-primary rounded-4 px-3 py-1 lh-sm">5 new</span>
      </div>
      <div class="offcanvas-body h-100 px-4 pt-0" data-simplebar>
        <ul class="mb-0">
          <li class="pb-7">
            <div class="d-flex align-items-center">
              <img src="../../dist/images/products/product-1.jpg" width="95" height="75" class="rounded-1 me-9 flex-shrink-0" alt="" />
              <div>
                <h6 class="mb-1">Supreme toys cooker</h6>
                <p class="mb-0 text-muted fs-2">Kitchenware Item</p>
                <div class="d-flex align-items-center justify-content-between mt-2">
                  <h6 class="fs-2 fw-semibold mb-0 text-muted">$250</h6>
                  <div class="input-group input-group-sm w-50">
                    <button class="btn border-0 round-20 minus p-0 bg-light-success text-success " type="button" id="add1"> - </button>
                    <input type="text" class="form-control round-20 bg-transparent text-muted fs-2 border-0  text-center qty" placeholder="" aria-label="Example text with button addon" aria-describedby="add1" value="1" />
                    <button class="btn text-success bg-light-success  p-0 round-20 border-0 add" type="button" id="addo2"> + </button>
                  </div>
                </div>
              </div>
            </div>
          </li>
          <li class="pb-7">
            <div class="d-flex align-items-center">
              <img src="../../dist/images/products/product-2.jpg" width="95" height="75" class="rounded-1 me-9 flex-shrink-0" alt="" />
              <div>
                <h6 class="mb-1">Supreme toys cooker</h6>
                <p class="mb-0 text-muted fs-2">Kitchenware Item</p>
                <div class="d-flex align-items-center justify-content-between mt-2">
                  <h6 class="fs-2 fw-semibold mb-0 text-muted">$250</h6>
                  <div class="input-group input-group-sm w-50">
                    <button class="btn border-0 round-20 minus p-0 bg-light-success text-success " type="button" id="add2"> - </button>
                    <input type="text" class="form-control round-20 bg-transparent text-muted fs-2 border-0  text-center qty" placeholder="" aria-label="Example text with button addon" aria-describedby="add2" value="1" />
                    <button class="btn text-success bg-light-success  p-0 round-20 border-0 add" type="button" id="addon34"> + </button>
                  </div>
                </div>
              </div>
            </div>
          </li>
          <li class="pb-7">
            <div class="d-flex align-items-center">
              <img src="../../dist/images/products/product-3.jpg" width="95" height="75" class="rounded-1 me-9 flex-shrink-0" alt="" />
              <div>
                <h6 class="mb-1">Supreme toys cooker</h6>
                <p class="mb-0 text-muted fs-2">Kitchenware Item</p>
                <div class="d-flex align-items-center justify-content-between mt-2">
                  <h6 class="fs-2 fw-semibold mb-0 text-muted">$250</h6>
                  <div class="input-group input-group-sm w-50">
                    <button class="btn border-0 round-20 minus p-0 bg-light-success text-success " type="button" id="add3"> - </button>
                    <input type="text" class="form-control round-20 bg-transparent text-muted fs-2 border-0  text-center qty" placeholder="" aria-label="Example text with button addon" aria-describedby="add3" value="1" />
                    <button class="btn text-success bg-light-success  p-0 round-20 border-0 add" type="button" id="addon3"> + </button>
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
    <!--  Mobilenavbar -->
    <div class="offcanvas offcanvas-start" data-bs-scroll="true" tabindex="-1" id="mobilenavbar" aria-labelledby="offcanvasWithBothOptionsLabel">
      <nav class="sidebar-nav scroll-sidebar">
        <div class="offcanvas-header justify-content-between">
          <img src="https://demos.adminmart.com/premium/bootstrap/modernize-bootstrap/package/dist/images/logos/favicon.ico" alt="" class="img-fluid">
          <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body profile-dropdown mobile-navbar" data-simplebar=""  data-simplebar>
          <ul id="sidebarnav">
            <li class="sidebar-item">
              <a class="sidebar-link has-arrow" href="javascript:void(0)" aria-expanded="false">
                <span>
                  <i class="ti ti-apps"></i>
                </span>
                <span class="hide-menu">Apps</span>
              </a>
              <ul aria-expanded="false" class="collapse first-level my-3">
                <li class="sidebar-item py-2">
                  <a href="#" class="d-flex align-items-center">
                    <div class="bg-light rounded-1 me-3 p-6 d-flex align-items-center justify-content-center">
                      <img src="https://demos.adminmart.com/premium/bootstrap/modernize-bootstrap/package/dist/images/svgs/icon-dd-chat.svg" alt="" class="img-fluid" width="24" height="24">
                    </div>
                    <div class="d-inline-block">
                      <h6 class="mb-1 bg-hover-primary">Chat Application</h6>
                      <span class="fs-2 d-block fw-normal text-muted">New messages arrived</span>
                    </div>
                  </a>
                </li>
                <li class="sidebar-item py-2">
                  <a href="#" class="d-flex align-items-center">
                    <div class="bg-light rounded-1 me-3 p-6 d-flex align-items-center justify-content-center">
                      <img src="https://demos.adminmart.com/premium/bootstrap/modernize-bootstrap/package/dist/images/svgs/icon-dd-invoice.svg" alt="" class="img-fluid" width="24" height="24">
                    </div>
                    <div class="d-inline-block">
                      <h6 class="mb-1 bg-hover-primary">Invoice App</h6>
                      <span class="fs-2 d-block fw-normal text-muted">Get latest invoice</span>
                    </div>
                  </a>
                </li>
                <li class="sidebar-item py-2">
                  <a href="#" class="d-flex align-items-center">
                    <div class="bg-light rounded-1 me-3 p-6 d-flex align-items-center justify-content-center">
                      <img src="https://demos.adminmart.com/premium/bootstrap/modernize-bootstrap/package/dist/images/svgs/icon-dd-mobile.svg" alt="" class="img-fluid" width="24" height="24">
                    </div>
                    <div class="d-inline-block">
                      <h6 class="mb-1 bg-hover-primary">Contact Application</h6>
                      <span class="fs-2 d-block fw-normal text-muted">2 Unsaved Contacts</span>
                    </div>
                  </a>
                </li>
                <li class="sidebar-item py-2">
                  <a href="#" class="d-flex align-items-center">
                    <div class="bg-light rounded-1 me-3 p-6 d-flex align-items-center justify-content-center">
                      <img src="https://demos.adminmart.com/premium/bootstrap/modernize-bootstrap/package/dist/images/svgs/icon-dd-message-box.svg" alt="" class="img-fluid" width="24" height="24">
                    </div>
                    <div class="d-inline-block">
                      <h6 class="mb-1 bg-hover-primary">Email App</h6>
                      <span class="fs-2 d-block fw-normal text-muted">Get new emails</span>
                    </div>
                  </a>
                </li>
                <li class="sidebar-item py-2">
                  <a href="#" class="d-flex align-items-center">
                    <div class="bg-light rounded-1 me-3 p-6 d-flex align-items-center justify-content-center">
                      <img src="https://demos.adminmart.com/premium/bootstrap/modernize-bootstrap/package/dist/images/svgs/icon-dd-cart.svg" alt="" class="img-fluid" width="24" height="24">
                    </div>
                    <div class="d-inline-block">
                      <h6 class="mb-1 bg-hover-primary">User Profile</h6>
                      <span class="fs-2 d-block fw-normal text-muted">learn more information</span>
                    </div>
                  </a>
                </li>
                <li class="sidebar-item py-2">
                  <a href="#" class="d-flex align-items-center">
                    <div class="bg-light rounded-1 me-3 p-6 d-flex align-items-center justify-content-center">
                      <img src="https://demos.adminmart.com/premium/bootstrap/modernize-bootstrap/package/dist/images/svgs/icon-dd-date.svg" alt="" class="img-fluid" width="24" height="24">
                    </div>
                    <div class="d-inline-block">
                      <h6 class="mb-1 bg-hover-primary">Calendar App</h6>
                      <span class="fs-2 d-block fw-normal text-muted">Get dates</span>
                    </div>
                  </a>
                </li>
                <li class="sidebar-item py-2">
                  <a href="#" class="d-flex align-items-center">
                    <div class="bg-light rounded-1 me-3 p-6 d-flex align-items-center justify-content-center">
                      <img src="https://demos.adminmart.com/premium/bootstrap/modernize-bootstrap/package/dist/images/svgs/icon-dd-lifebuoy.svg" alt="" class="img-fluid" width="24" height="24">
                    </div>
                    <div class="d-inline-block">
                      <h6 class="mb-1 bg-hover-primary">Contact List Table</h6>
                      <span class="fs-2 d-block fw-normal text-muted">Add new contact</span>
                    </div>
                  </a>
                </li>
                <li class="sidebar-item py-2">
                  <a href="#" class="d-flex align-items-center">
                    <div class="bg-light rounded-1 me-3 p-6 d-flex align-items-center justify-content-center">
                      <img src="https://demos.adminmart.com/premium/bootstrap/modernize-bootstrap/package/dist/images/svgs/icon-dd-application.svg" alt="" class="img-fluid" width="24" height="24">
                    </div>
                    <div class="d-inline-block">
                      <h6 class="mb-1 bg-hover-primary">Notes Application</h6>
                      <span class="fs-2 d-block fw-normal text-muted">To-do and Daily tasks</span>
                    </div>
                  </a>
                </li>
                <ul class="px-8 mt-7 mb-4">
                  <li class="sidebar-item mb-3">
                    <h5 class="fs-5 fw-semibold">Quick Links</h5>
                  </li>
                  <li class="sidebar-item py-2">
                    <a class="fw-semibold text-dark" href="#">Pricing Page</a>
                  </li>
                  <li class="sidebar-item py-2">
                    <a class="fw-semibold text-dark" href="#">Authentication Design</a>
                  </li>
                  <li class="sidebar-item py-2">
                    <a class="fw-semibold text-dark" href="#">Register Now</a>
                  </li>
                  <li class="sidebar-item py-2">
                    <a class="fw-semibold text-dark" href="#">404 Error Page</a>
                  </li>
                  <li class="sidebar-item py-2">
                    <a class="fw-semibold text-dark" href="#">Notes App</a>
                  </li>
                  <li class="sidebar-item py-2">
                    <a class="fw-semibold text-dark" href="#">User Application</a>
                  </li>
                  <li class="sidebar-item py-2">
                    <a class="fw-semibold text-dark" href="#">Account Settings</a>
                  </li>
                </ul>
              </ul>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="app-chat.html" aria-expanded="false">
                <span>
                  <i class="ti ti-message-dots"></i>
                </span>
                <span class="hide-menu">Chat</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="app-calendar.html" aria-expanded="false">
                <span>
                  <i class="ti ti-calendar"></i>
                </span>
                <span class="hide-menu">Calendar</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="app-email.html" aria-expanded="false">
                <span>
                  <i class="ti ti-mail"></i>
                </span>
                <span class="hide-menu">Email</span>
              </a>
            </li>
          </ul>
        </div>
      </nav>
    </div>
    <!--  Search Bar -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-hidden="true">
      <div class="modal-dialog modal-dialog-scrollable modal-lg">
        <div class="modal-content rounded-1">
          <div class="modal-header border-bottom">
            <input type="search" class="form-control fs-3" placeholder="Search here" id="search" />
            <span data-bs-dismiss="modal" class="lh-1 cursor-pointer">
              <i class="ti ti-x fs-5 ms-3"></i>
            </span>
          </div>
          <div class="modal-body message-body" data-simplebar="">
            <h5 class="mb-0 fs-5 p-1">Quick Page Links</h5>
            <ul class="list mb-0 py-2">
              <li class="p-1 mb-1 bg-hover-light-black">
                <a href="#">
                  <span class="fs-3 text-black fw-normal d-block">Modern</span>
                  <span class="fs-3 text-muted d-block">/dashboards/dashboard1</span>
                </a>
              </li>
              <li class="p-1 mb-1 bg-hover-light-black">
                <a href="#">
                  <span class="fs-3 text-black fw-normal d-block">Dashboard</span>
                  <span class="fs-3 text-muted d-block">/dashboards/dashboard2</span>
                </a>
              </li>
              <li class="p-1 mb-1 bg-hover-light-black">
                <a href="#">
                  <span class="fs-3 text-black fw-normal d-block">Contacts</span>
                  <span class="fs-3 text-muted d-block">/apps/contacts</span>
                </a>
              </li>
              <li class="p-1 mb-1 bg-hover-light-black">
                <a href="#">
                  <span class="fs-3 text-black fw-normal d-block">Posts</span>
                  <span class="fs-3 text-muted d-block">/apps/blog/posts</span>
                </a>
              </li>
              <li class="p-1 mb-1 bg-hover-light-black">
                <a href="#">
                  <span class="fs-3 text-black fw-normal d-block">Detail</span>
                  <span class="fs-3 text-muted d-block">/apps/blog/detail/streaming-video-way-before-it-was-cool-go-dark-tomorrow</span>
                </a>
              </li>
              <li class="p-1 mb-1 bg-hover-light-black">
                <a href="#">
                  <span class="fs-3 text-black fw-normal d-block">Shop</span>
                  <span class="fs-3 text-muted d-block">/apps/ecommerce/shop</span>
                </a>
              </li>
              <li class="p-1 mb-1 bg-hover-light-black">
                <a href="#">
                  <span class="fs-3 text-black fw-normal d-block">Modern</span>
                  <span class="fs-3 text-muted d-block">/dashboards/dashboard1</span>
                </a>
              </li>
              <li class="p-1 mb-1 bg-hover-light-black">
                <a href="#">
                  <span class="fs-3 text-black fw-normal d-block">Dashboard</span>
                  <span class="fs-3 text-muted d-block">/dashboards/dashboard2</span>
                </a>
              </li>
              <li class="p-1 mb-1 bg-hover-light-black">
                <a href="#">
                  <span class="fs-3 text-black fw-normal d-block">Contacts</span>
                  <span class="fs-3 text-muted d-block">/apps/contacts</span>
                </a>
              </li>
              <li class="p-1 mb-1 bg-hover-light-black">
                <a href="#">
                  <span class="fs-3 text-black fw-normal d-block">Posts</span>
                  <span class="fs-3 text-muted d-block">/apps/blog/posts</span>
                </a>
              </li>
              <li class="p-1 mb-1 bg-hover-light-black">
                <a href="#">
                  <span class="fs-3 text-black fw-normal d-block">Detail</span>
                  <span class="fs-3 text-muted d-block">/apps/blog/detail/streaming-video-way-before-it-was-cool-go-dark-tomorrow</span>
                </a>
              </li>
              <li class="p-1 mb-1 bg-hover-light-black">
                <a href="#">
                  <span class="fs-3 text-black fw-normal d-block">Shop</span>
                  <span class="fs-3 text-muted d-block">/apps/ecommerce/shop</span>
                </a>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
    <!-- --------------------------------------------------- -->
    <!-- Customizer -->
    <!-- --------------------------------------------------- -->
   <button class="btn btn-primary p-3 rounded-circle d-flex align-items-center justify-content-center customizer-btn" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasExample" aria-controls="offcanvasExample">
    <i class="ti ti-settings fs-7" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Settings"></i>
  </button>
  <div class="offcanvas offcanvas-end customizer" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel" data-simplebar="">
    <div class="d-flex align-items-center justify-content-between p-3 border-bottom">
      <h4 class="offcanvas-title fw-semibold" id="offcanvasExampleLabel">Settings</h4>
      <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body p-4">
      <div class="theme-option pb-4">
        <h6 class="fw-semibold fs-4 mb-1">Theme Option</h6>
        <div class="d-flex align-items-center gap-3 my-3">
          <a href="javascript:void(0)"  onclick="toggleTheme('../../dist/css/style.min.css')"  class="rounded-2 p-9 customizer-box hover-img d-flex align-items-center gap-2 light-theme text-dark">
            <i class="ti ti-brightness-up fs-7 text-primary"></i>
            <span class="text-dark">Light</span>
          </a>
          <a href="javascript:void(0)" onclick="toggleTheme('../../dist/css/style-dark.min.css')" class="rounded-2 p-9 customizer-box hover-img d-flex align-items-center gap-2 dark-theme text-dark">
            <i class="ti ti-moon fs-7 "></i>
            <span class="text-dark">Dark</span>
          </a>
        </div>
      </div>
      <div class="theme-direction pb-4">
        <h6 class="fw-semibold fs-4 mb-1">Theme Direction</h6>
        <div class="d-flex align-items-center gap-3 my-3">
          <a href="index-2.html" class="rounded-2 p-9 customizer-box hover-img d-flex align-items-center gap-2">
            <i class="ti ti-text-direction-ltr fs-6 text-primary"></i>
            <span class="text-dark">LTR</span>
          </a>
          <a href="https://demos.adminmart.com/premium/bootstrap/modernize-bootstrap/package/html/rtl/index.html" class="rounded-2 p-9 customizer-box hover-img d-flex align-items-center gap-2">
            <i class="ti ti-text-direction-rtl fs-6 text-dark"></i>
            <span class="text-dark">RTL</span>
          </a>
        </div>
      </div>
      <div class="theme-colors pb-4">
        <h6 class="fw-semibold fs-4 mb-1">Theme Colors</h6>
        <div class="d-flex align-items-center gap-3 my-3">
          <ul class="list-unstyled mb-0 d-flex gap-3 flex-wrap change-colors">
            <li class="rounded-2 p-9 customizer-box hover-img d-flex align-items-center justify-content-center">
              <a href="javascript:void(0)" class="rounded-circle position-relative d-block customizer-bgcolor skin1-bluetheme-primary active-theme " onclick="toggleTheme('../../dist/css/style.min.css')"  data-color="blue_theme" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="BLUE_THEME"><i class="ti ti-check text-white d-flex align-items-center justify-content-center fs-5"></i></a>
            </li>
            <li class="rounded-2 p-9 customizer-box hover-img d-flex align-items-center justify-content-center">
              <a href="javascript:void(0)"  class="rounded-circle position-relative d-block customizer-bgcolor skin2-aquatheme-primary " onclick="toggleTheme('../../dist/css/style-aqua.min.css')"  data-color="aqua_theme" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="AQUA_THEME"><i class="ti ti-check  text-white d-flex align-items-center justify-content-center fs-5"></i></a>
            </li>
            <li class="rounded-2 p-9 customizer-box hover-img d-flex align-items-center justify-content-center">
              <a href="javascript:void(0)" class="rounded-circle position-relative d-block customizer-bgcolor skin3-purpletheme-primary" onclick="toggleTheme('../../dist/css/style-purple.min.css')"  data-color="purple_theme" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="PURPLE_THEME"><i class="ti ti-check  text-white d-flex align-items-center justify-content-center fs-5"></i></a>
            </li>
            <li class="rounded-2 p-9 customizer-box hover-img d-flex align-items-center justify-content-center">
              <a href="javascript:void(0)" class="rounded-circle position-relative d-block customizer-bgcolor skin4-greentheme-primary" onclick="toggleTheme('../../dist/css/style-green.min.css')"  data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="GREEN_THEME"><i class="ti ti-check  text-white d-flex align-items-center justify-content-center fs-5"></i></a>
            </li>
            <li class="rounded-2 p-9 customizer-box hover-img d-flex align-items-center justify-content-center">
              <a href="javascript:void(0)" class="rounded-circle position-relative d-block customizer-bgcolor skin5-cyantheme-primary" onclick="toggleTheme('../../dist/css/style-cyan.min.css')"  data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="CYAN_THEME"><i class="ti ti-check  text-white d-flex align-items-center justify-content-center fs-5"></i></a>
            </li>
            <li class="rounded-2 p-9 customizer-box hover-img d-flex align-items-center justify-content-center">
              <a href="javascript:void(0)" class="rounded-circle position-relative d-block customizer-bgcolor skin6-orangetheme-primary" onclick="toggleTheme('../../dist/css/style-orange.min.css')"  data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="ORANGE_THEME"><i class="ti ti-check  text-white d-flex align-items-center justify-content-center fs-5"></i></a>
            </li>
          </ul>
        </div>
      </div>
      <div class="layout-type pb-4">
        <h6 class="fw-semibold fs-4 mb-1">Layout Type</h6>
        <div class="d-flex align-items-center gap-3 my-3">
          <a href="index-2.html" class="rounded-2 p-9 customizer-box hover-img d-flex align-items-center gap-2">              
            <i class="ti ti-layout-sidebar fs-6 text-primary"></i>
            <span class="text-dark">Vertical</span>
          </a>
          <a href="https://demos.adminmart.com/premium/bootstrap/modernize-bootstrap/package/html/horizontal/index.html" class="rounded-2 p-9 customizer-box hover-img d-flex align-items-center gap-2">
            <i class="ti ti-layout-navbar fs-6 text-dark"></i>
            <span class="text-dark">Horizontal</span>
          </a>
        </div>
      </div>
      <div class="container-option pb-4">
        <h6 class="fw-semibold fs-4 mb-1">Container Option</h6>
        <div class="d-flex align-items-center gap-3 my-3">
          <a href="javascript:void(0)" class="rounded-2 p-9 customizer-box hover-img d-flex align-items-center gap-2 boxed-width text-dark">              
            <i class="ti ti-layout-distribute-vertical fs-7 text-primary"></i>
            <span class="text-dark">Boxed</span>
          </a>
          <a href="javascript:void(0)" class="rounded-2 p-9 customizer-box hover-img d-flex align-items-center gap-2 full-width text-dark">
            <i class="ti ti-layout-distribute-horizontal fs-7"></i>
            <span class="text-dark">Full</span>
          </a>
        </div>
      </div>
      <div class="sidebar-type pb-4">
        <h6 class="fw-semibold fs-4 mb-1">Sidebar Type</h6>
        <div class="d-flex align-items-center gap-3 my-3">
          <a  href="javascript:void(0)" class="rounded-2 p-9 customizer-box hover-img d-flex align-items-center gap-2 fullsidebar">              
            <i class="ti ti-layout-sidebar-right fs-7"></i>
            <span class="text-dark">Full</span>
          </a>
          <a  href="javascript:void(0)" class="rounded-2 p-9 customizer-box hover-img d-flex align-items-center text-dark sidebartoggler gap-2">
            <i class="ti ti-layout-sidebar fs-7"></i>
            <span class="text-dark">Collapse</span>
          </a>
        </div>
      </div>
      <div class="card-with pb-4">
        <h6 class="fw-semibold fs-4 mb-1">Card With</h6>
        <div class="d-flex align-items-center gap-3 my-3">
          <a href="javascript:void(0)" class="rounded-2 p-9 customizer-box hover-img d-flex align-items-center gap-2 text-dark cardborder">              
            <i class="ti ti-border-outer fs-7"></i>
            <span class="text-dark">Border</span>
          </a>
          <a href="javascript:void(0)" class="rounded-2 p-9 customizer-box hover-img d-flex align-items-center gap-2 cardshadow">
            <i class="ti ti-border-none fs-7"></i>
            <span class="text-dark">Shadow</span>
          </a>
        </div>
      </div>
    </div>
  </div>
        <!-- ---------------------------------------------- -->
    <!-- Customizer -->
    <!-- ---------------------------------------------- -->
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

<!-- Mirrored from demos.adminmart.com/premium/bootstrap/modernize-bootstrap/package/html/main/page-user-profile.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 06 Jul 2023 01:59:21 GMT -->
@endsection
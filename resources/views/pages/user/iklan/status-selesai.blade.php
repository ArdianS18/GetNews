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

<div class="row">
    <div class="col-md-12 col-lg-7">
        <div class="card p-4">
            <h4>Konten Pengiklanan</h5>
                <div class="d-flex mb-3 justify-content-center align-items-center">
                    <img src="{{asset('assets/img/about/about-img-1.webp')}}" alt="" width="320px" height="240px" class="mb-2" style="object-fit:cover;">
                </div>

                <div class="row from-outline">
                    <div class="col-lg-6 mb-4">
                        <label class="form-label" for="nomor">Jenis Iklan</label>
                        <input type="text" id="name" name="name" placeholder=""
                            value="{{ old('name') }}" class="form-control @error('name') is-invalid @enderror">
                        @error('name')
                            <span class="invalid-feedback" role="alert" style="color: red;">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    
                    <div class="col-lg-6 mb-4">
                        <label class="form-label" for="nomor">Halaman</label>
                        <input type="text" id="name" name="name" placeholder=""
                            value="{{ old('name') }}" class="form-control @error('name') is-invalid @enderror">
                        @error('name')
                            <span class="invalid-feedback" role="alert" style="color: red;">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
        
                    <div class="col-lg-6 mb-4">
                        <label class="form-label" for="nomor">Tanggal Awal</label>
                        <input type="text" id="name" name="name" placeholder=""
                            value="{{ old('name') }}" class="form-control @error('name') is-invalid @enderror">
                        @error('name')
                            <span class="invalid-feedback" role="alert" style="color: red;">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    
                    <div class="col-lg-6 mb-4">
                        <label class="form-label" for="nomor">Tanggal Akhir</label>
                        <input type="text" id="name" name="name" placeholder=""
                            value="{{ old('name') }}" class="form-control @error('name') is-invalid @enderror">
                        @error('name')
                            <span class="invalid-feedback" role="alert" style="color: red;">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
        
                    <div class="col-lg-12 mb-4">
                        <label class="form-label" for="nomor">URL</label>
                        <input type="text" id="name" name="name" placeholder=""
                            value="{{ old('name') }}" class="form-control @error('name') is-invalid @enderror">
                        @error('name')
                            <span class="invalid-feedback" role="alert" style="color: red;">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                
            {{-- <div class="row">
                <div class="col-md-12 col-lg-5">
                    <img src="{{asset('assets/img/about/about-img-1.webp')}}" alt="" width="100%" height="200px" class="mb-2" style=" object-fit:cover;">
                </div>
                <div class="col-md-12 col-lg-7">
                    <h4 class="mb-4 fw-semibold">Jiraiya Banks Wants To Teach You How To Build A House</h4>
                    <p>Lorem ipsum or lipsum as it is sometmes known is dum text used in laying print, graphic or web desi Lorem ipsum or lipsum as it is sometmes known is dum text used in laying print…</p>
                </div>
            </div> --}}

            {{-- <div class="mt-5">
                <p class="fw-semibold fs-4 text-black">Tanggal Upload:</p>
                <div class="d-flex justify-content-between">
                    <div class="mt-2 d-flex justify-content-end">
                        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 512 512"><path d="M368.005 272h-96v96h96v-96zm-32-208v32h-160V64h-48v32h-24.01c-22.002 0-40 17.998-40 40v272c0 22.002 17.998 40 40 40h304.01c22.002 0 40-17.998 40-40V136c0-22.002-17.998-40-40-40h-24V64h-48zm72 344h-304.01V196h304.01v212z" fill="#0f4d89"/>
                        </svg>
                        <p class="ms-2"> Apr 25, 2023</p>
                    </div>

                    <div class="text-md-right">
                        <span class="badge bg-light-warning text-warning fs-4 px-5 py-2">
                            Pending
                        </span>
                    </div>
                </div>
            </div> --}}
        </div>
    </div>

    <div class="col-md-12 col-lg-5">
        <div class="card p-4">
            <h4>Rincian pembayaran</h4>

            <div class="d-flex mt-5 justify-content-between">
                <p class="fw-semibold">Kode Voucher</p>

                <p class="fs-3" style="color: #175A95;">ABCDE</p>
            </div>

            <div class="d-flex mt-4 justify-content-between">
                <p class="fw-semibold">Harga Upload</p>

                <div class="d-flex">
                    <del><p class="fs-3 me-3" style="color: #175A95;">Rp. 100.000</p></del>
                    <p class="fs-3" style="color: #175A95;">Rp. 80.000</p>
                </div>
            </div>

            <div class="d-flex mt-4 justify-content-between">
                <p class="fw-semibold">Diskon Voucher</p>

                <div class="d-flex">
                    <p class="fs-3" style="color: #175A95;">Rp. 100.000</p>
                </div>
            </div>

            <div class="d-flex mt-4 justify-content-between">
                <p class="fw-semibold">Bayar Sebelum Tanggal</p>
                <p class="fs-3" style="color: #175A95;">12/12/2020</p>
            </div>

            <div class="d-flex mt-4 justify-content-between">
                <p class="fw-semibold">Kode Transaksi</p>
                <p class="fs-3" style="color: #175A95;">DEV-T26250149620IYONL</p>
            </div>

            <div class="d-flex mt-4 justify-content-between">
                <p class="fw-semibold">Metode Pembayaran</p>
                <img src="{{asset('assets/img/bca.svg')}}" width="80px" alt="">
            </div>

            <div class="d-flex mt-4 justify-content-between">
                    <p class="fw-semibold">Kode Pembayaran</p>

                    <div class="d-flex">
                        <p class="fs-3" style="color: #175A95;">473635346744955</p>
                        <button class="btn btn-sm text-white ms-2 px-3" style="background-color: #175A95;">
                            Salin
                        </button>
                    </div>
            </div>

            <div class="d-flex mt-4 justify-content-between">
                <p class="fw-semibold">Status</p>

                <div class="d-flex">
                    <p class="fs-3" style="color: #175A95;">Selesai</p>
                </div>
        </div>
        </div>
    </div>
</div>
@endsection
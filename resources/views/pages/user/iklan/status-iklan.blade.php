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
                    {{-- <del><p class="fs-3 me-3" style="color: #175A95;">Rp. 100.000</p></del> --}}
                    <p class="fs-3" style="color: #175A95;">Rp. 10.000</p>
                </div>
            </div>

            <div class="d-flex mt-4 justify-content-between">
                <p class="fw-semibold">Diskon Voucher</p>

                <div class="d-flex">
                    <p class="fs-3" style="color: #175A95;"><span>-</span>Rp. 20.000</p>
                </div>
            </div>

            <div class="d-flex mt-4 justify-content-between">
                <p class="fw-semibold">Total Pembayaran</p>

                <div class="d-flex">
                    <p class="fs-3" style="color: #175A95;">Rp. 80.000</p>
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
                {{-- <img src="{{asset('assets/img/bca.svg')}}" width="80px" alt=""> --}}
                <button type="button" class="btn btn-outline-light text-primary" data-bs-toggle="modal" data-bs-target="#modal-create">Pilih metode pembayaran</button>
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

        </div>
    </div>
</div>

<div class="modal fade" id="modal-create" tabindex="-1" aria-labelledby="tambahdataLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header d-flex justify-content-center text-white rounded-top-3" style="background-color: #175A95;">
                <h5 class="text-white">Pilih Metode Pembayaran</h5>
            </div>
            <form id="form-create" method="post">
                <div class="modal-body">
                    <span class="fw-semibold text-dark fs-4">Bank</span>

                    <div class="row">
                        <div class="col-lg-6 mt-2">
                            <div class="card shadow-sm card p-3">
                                <div class="d-flex">
                                    <img src="{{asset('assets/img/bank-bri.svg')}}" width="100px" alt="">
                                    <div class="ms-4 mt-3">
                                        <p class="text-dark">BRI Virtual Account</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 mt-2">
                            <div class="card shadow-sm border p-3">
                                <div class="d-flex">
                                    <img src="{{asset('assets/img/bank-mandiri.svg')}}" width="100px" alt="">
                                    <div class="ms-4 mt-3">
                                        <p class="text-dark">Marndiri Virtual Account</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="card shadow-sm border p-3">
                                <div class="d-flex">
                                    <img src="{{asset('assets/img/bank-bca.svg')}}" width="100px" alt="">
                                    <div class="ms-4 mt-3">
                                        <p class="text-dark">BCA Virtual Account</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="card shadow-sm border p-3">
                                <div class="d-flex">
                                    <img src="{{asset('assets/img/bank-bni.svg')}}" width="100px" alt="">
                                    <div class="ms-4 mt-3">
                                        <p class="text-dark">BNI Virtual Account</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="card shadow-sm border p-3">
                                <div class="d-flex">
                                    <img src="{{asset('assets/img/bank-bsi.svg')}}" width="100px" alt="">
                                    <div class="ms-4 mt-3">
                                        <p class="text-dark fs-5">BSI Virtual Account</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    

                    <span class="fw-semibold text-dark fs-4">E-Wallet</span>

                    <div class="col-lg-6 mt-2">
                        <div class="card shadow-sm border p-3">
                            <div class="d-flex">
                                <img src="{{asset('assets/img/wallet-gopay.svg')}}" width="100px" alt="">
                                <div class="ms-4 mt-3">
                                    <p class="text-dark">Gopay</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6 mt-2">
                        <div class="card shadow-sm border p-3">
                            <div class="d-flex">
                                <img src="{{asset('assets/img/wallet-ovo.svg')}}" width="100px" alt="">
                                <div class="ms-4 mt-3">
                                    <p class="text-dark">OVO</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="card shadow-sm border p-3">
                            <div class="d-flex">
                                <img src="{{asset('assets/img/wallet-dana.svg')}}" width="100px" alt="">
                                <div class="ms-4 mt-3">
                                    <p class="text-dark">Dana</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="card shadow-sm border p-3">
                            <div class="d-flex">
                                <img src="{{asset('assets/img/wallet-indomaret.svg')}}" width="100px" alt="">
                                <div class="ms-4 mt-3">
                                    <p class="text-dark">Indomart</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="card shadow-sm border p-3">
                            <div class="d-flex">
                                <img src="{{asset('assets/img/wallet-alfamart.svg')}}" width="100px" alt="">
                                <div class="ms-4 mt-3">
                                    <p class="text-dark">Alfamart</p>
                                </div>
                            </div>
                        </div>
                    </div>

                </div> 
                    
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-rounded btn-light-danger text-danger"
                        data-bs-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-rounded btn-light-success text-success">Pilih</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
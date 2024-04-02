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
            <div class="row">
                <div class="col-md-12 col-lg-5">
                    <img src="{{asset('assets/img/about/about-img-1.webp')}}" alt="" width="100%" height="200px" class="" style=" object-fit:cover;">
                </div>
                <div class="col-md-12 col-lg-7">
                    <h5 class="mb-3">Jiraiya Banks Wants To Teach You How To Build A House</h5>
                    <p>Lorem ipsum or lipsum as it is sometmes known is dum text used in laying print, graphic or web desi Lorem ipsum or lipsum as it is sometmes known is dum text used in laying print…</p>
    
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-12 col-lg-5">
        <div class="card p-4">
            <h4>Rincian pembayaran</h4>

            <div class="d-flex mt-5 justify-content-between">
                <p class="fw-semibold">Kode Voucher</p>

                <p class="fs-3" style="color: #175A95;">ABCDE</p>
            </div>

            <div class="d-flex mt-3 justify-content-between">
                <p class="fw-semibold">Harga Upload</p>

                <div class="d-flex">
                    <del><p class="fs-3 me-3" style="color: #175A95;">Rp. 100.000</p></del>
                    <p class="fs-3" style="color: #175A95;">Rp. 80.000</p>
                </div>
            </div>

            <div class="d-flex mt-3 justify-content-between">
                <p class="fw-semibold">Harga Upload</p>

                <div class="d-flex">
                    <p class="fs-3" style="color: #175A95;">Rp. 100.000</p>
                </div>
            </div>

            <div class="d-flex mt-3 justify-content-between">
                <p class="fw-semibold">Bayar Sebelum Tanggal</p>
                <p class="fs-3" style="color: #175A95;">12/12/2020</p>
            </div>

            <div class="d-flex mt-3 justify-content-between">
                <p class="fw-semibold">Kode Transaksi</p>
                <p class="fs-3" style="color: #175A95;">DEV-T26250149620IYONL</p>
            </div>

            <div class="d-flex mt-3 justify-content-between">
                <p class="fw-semibold">Metode Pembayaran</p>
                <img src="{{asset('assets/img/bca.svg')}}" width="80px" alt="">
            </div>

            <div class="d-flex mt-3 justify-content-between">
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
@endsection
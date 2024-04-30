@extends('layouts.admin.app')

@section('content')

<div class="card border border-1 shadow-sm mt-5" style="background-color: #FFFFFF">
    <div class="px-4 py-3 border-bottom">
        <h5 class="card-title fw-semibold mb-0 lh-sm">Detail Iklan</h5>
    </div>

    <div class="d-flex justify-content-between mt-4 ms-4 me-4">
        <div class="d-flex justify-content-start gap-2">
            <div>
                <div>
                    <div class="d-flex gap-2 mb-3">
                    <a href="news-approved-list" class="btn btn-lg px-3 text-white" style="background-color: #5D87FF;">Kembali</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="d-flex gap-2">
            <div class="d-flex gap-2">
                <div class="">
                <a class="btn btn-danger btn-lg px-3 btn-reject" id="btn-reject-">Tolak</a>
                </div>
                <form action="" method="post">
                    @method('patch')
                    @csrf
                    <button type="submit" class="btn btn-success btn-lg px-3">Terima</button>
                </form>
            </div>
        </div>
    </div>

    <div class="container p-4">
        <div class="card border shadow-none p-4">
            <div class="row">
                <div class="col-12 from-outline mt-2">
                    <label class="form-label" for="photo">Konten</label>
                    <div>
                        <img width="350px" src="">
                    </div>
                </div>
                <div class="col-12 col-lg-6 from-outline mt-2">
                    <label class="form-label" for="photo">Halaman</label>
                    <select name="page" id="" class="form-select">
                        <option value="">Beranda</option>
                        <option value="">Dasboard</option>
                    </select>
                </div>
                <div class="col-12 col-lg-6 from-outline mt-2">
                    <label class="form-label" for="photo">Jenis</label>
                    <select name="type" id="" class="form-select">
                        <option value="">Nama</option>
                        <option value="">Vidio</option>
                    </select>
                </div>
                <div class="col-12 col-lg-12 from-outline mt-2">
                    <label class="form-label" for="photo">Posisi Iklan</label>
                    
                </div>
                <div class="col-12 col-lg-6 from-outline mt-2">
                    <label class="form-label" for="photo">Tanggal Awal</label>
                    <input type="date" name="" id="" class="form-control">
                </div>
                <div class="col-12 col-lg-6 from-outline mt-2">
                    <label class="form-label" for="photo">Tanggal Akhir</label>
                    <input type="date" name="" id="" class="form-control">
                </div>
                <div class="col-12 col-lg-6 from-outline mt-2">
                    <label class="form-label" for="photo">URL</label>
                    <input type="date" name="" id="" class="form-control">
                </div>
                

            </div>
        </div>

        <div class="card border shadow-none p-4">
            <h4>Rincian Pembayaran</h4>
            <div class="row mt-5">
                <div class="col-lg-6 col-12">
                    <div class="d-flex mt-3 justify-content-between">
                        <p class="fw-semibold">Kode Voucher</p>
                        <p class="fs-3" style="color: #175A95;">ABCDE</p>
                    </div>
                    <div class="d-flex mt-3 justify-content-between">
                        <p class="fw-semibold">Diskon Voucher</p>
                        <p class="fs-3" style="color: #175A95;">-Rp. 20.000</p>
                    </div>
                    <div class="d-flex mt-3 justify-content-between">
                        <p class="fw-semibold">Bayar Sebelum Tanggal</p>
                        <p class="fs-3" style="color: #175A95;">12/12/2020</p>
                    </div>
                    <div class="d-flex mt-3 justify-content-between">
                        <p class="fw-semibold">Metode Pembayaran</p>

                        <div class="d-flex">
                            <img src="{{asset('assets/img/bca.svg')}}" width="80px" alt="">
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-12">
                    <div class="d-flex mt-3 justify-content-between">
                        <p class="fw-semibold">Harga Upload</p>
                        <p class="fs-3" style="color: #175A95;">Rp. 100.000</p>
                    </div>
                    <div class="d-flex mt-3 justify-content-between">
                        <p class="fw-semibold">Total Pembayaran</p>
                        <p class="fs-3" style="color: #175A95;">Rp. 80.000</p>
                    </div>
                    <div class="d-flex mt-3 justify-content-between">
                        <p class="fw-semibold">Kode Transaksi</p>
                        <p class="fs-3" style="color: #175A95;">DEV-T26250149620IYONL</p>
                    </div>
                    <div class="d-flex mt-3 justify-content-between">
                        <p class="fw-semibold">Kode Pembayaran</p>

                        <div class="d-flex">
                            <p class="fs-3" style="color: #175A95;">473635346744955</p>
                            <div class="">
                                <button class="btn btn-sm text-white ms-2 py-1 px-3" style="background-color: #175A95;">
                                    Salin
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
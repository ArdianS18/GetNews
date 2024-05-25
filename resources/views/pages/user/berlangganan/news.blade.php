@extends('layouts.user.sidebar')

@section('content')
<div class="card shadow-sm position-relative overflow-hidden"  style="background-color: #175A95;">
    <div class="card-body px-4 py-4">
      <div class="row justify-content-between">
        <div class="col-8 text-white">
          <h4 class="fw-semibold mb-3 mt-2 text-white">Hi, Daffa Prasetya</h4>
            <p>Jangan lewatkan kenyamanan membaca berita dengan firtu berlangganan memberikan pengalaman membaca yang leib baik</p>
        </div>
        <div class="col-3">
          <div class="text-center mb-n4">
            <img src="{{asset('assets/img/news-bg.svg')}}" width="200px" alt="" class="img-fluid">
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="border rounded-sm shadow-sm">
    <div class="p-4">
        <div class="d-flex justify-content-between">
            <h5>Riwayat Transaksi</h5>
            <div class="">
                <button class="btn btn-danger">
                    Berlangganan
                </button>
            </div>
        </div>
        <div class="table-responsive rounded-2 mt-4">
            <table class="table border text-nowrap customize-table mb-0 align-middle ">
                <thead>
                    <tr>
                        <th style="background-color: #D9D9D9;">Paket</th>
                        <th style="background-color: #D9D9D9;">Harga</th>
                        <th style="background-color: #D9D9D9;">Dimulai</th>
                        <th style="background-color: #D9D9D9;">Berakhir</th>
                        <th style="background-color: #D9D9D9;">Status</th>
                        <th style="background-color: #D9D9D9;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Paket 1</td>
                        <td>100.000</td>
                        <td>12/12/2020</td>
                        <td>12/01/2020</td>
                        <td>
                            <button class="btn btn-light-primary text-primary">Aktif</button>
                        </td>
                        <td>
                            <button class="btn btn-sm text-white" style="background-color: #175A95">
                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="23"
                                viewBox="0 0 512 512">
                                <path fill="none" stroke="#ffffff" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="32"
                                    d="M255.66 112c-77.94 0-157.89 45.11-220.83 135.33a16 16 0 0 0-.27 17.77C82.92 340.8 161.8 400 255.66 400c92.84 0 173.34-59.38 221.79-135.25a16.14 16.14 0 0 0 0-17.47C428.89 172.28 347.8 112 255.66 112" />
                                <circle cx="256" cy="256" r="80" fill="none" stroke="#ffffff"
                                    stroke-miterlimit="10" stroke-width="32" />
                            </svg>
                            </button>
                        </td>
                    </tr>
                </tbody>
            </table>
    
            <div id="loading"></div>
            <div class="d-flex mt-2 justify-content-end">
                <nav id="pagination">
                </nav>
            </div>
    
        </div>
    </div>
  </div>
@endsection
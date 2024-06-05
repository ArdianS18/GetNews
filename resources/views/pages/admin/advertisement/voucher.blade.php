@extends('layouts.admin.app')

@section('style')
<style>
    .progress-bar {
    background-image: linear-gradient(to right, #DD1818, #175A95);
}
</style>
@endsection
@section('content')

<div class="row">
    <div class="col-lg-6 mb-3">
        <form class="d-flex gap-2">
            <div class="position-relative">
                <div class="">
                    <input type="text" name="search" class="form-control search-chat py-2 px-5 ps-5" id="search-name"
                        placeholder="Search">
                    <i class="ti ti-search position-absolute top-50 translate-middle-y fs-6 text-dark ms-3"></i>
                </div>
            </div>

            <div class="d-flex gap-2">
                <select name="banned" class="form-select" id="search-status">
                    <option value="">Pilih status</option>
                    <option value="approved">Aktif</option>
                    <option value="reject">Blokir</option>
                    <option value="">Tampilkan semua</option>
                </select>
            </div>
        </form>
    </div>
    <div class="col-lg-6 mb-3">
        <div class="d-flex justify-content-end">
            <button type="button" class="btn text-white px-5" style="background-color: #175A95" data-bs-toggle="modal"
                data-bs-target="#modal-create"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                    viewBox="0 2 30 24">
                    <path fill="currentColor"
                        d="M18 12.998h-5v5a1 1 0 0 1-2 0v-5H6a1 1 0 0 1 0-2h5v-5a1 1 0 0 1 2 0v5h5a1 1 0 0 1 0 2" />
                </svg>
                Tambah
            </button>
        </div>
    </div>
</div>


<div class="">
    <div class="row">
        <div class="col-lg-4 col-md-12">
            <div class="card">
                <div class="card-header" style="background-color: #175A95;">
                    <div class="row">
                        <div class="col-lg-11 d-flex justify-content-center">
                            <h5 class="text-white text-center">Kode Voucher</h5>
                        </div>

                        <div class="col-lg-1 d-flexx justify-content-end">
                            <div class="dropdown dropstart" >
                                <a href="#" class="link" style="float: right;"
                                    id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 256 256">
                                        <path fill="#ffffff"
                                            d="M156 128a28 28 0 1 1-28-28a28 28 0 0 1 28 28m-28-52a28 28 0 1 0-28-28a28 28 0 0 0 28 28m0 104a28 28 0 1 0 28 28a28 28 0 0 0-28-28" />
                                    </svg>
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <li>
                                        <button class="dropdown-item btn-edit" data-bs-toggle="modal" data-bs-target="#modal-update" data-id="${data.id}" >Edit</button>
                                    </li>
                                </ul>
                            </div>
                        </div>


                    </div>

                </div>

                <div class="card-body">
                    <div class="d-flex justify-content-center">
                        <div>
                            <span class="mb-1 badge fs-5 fw-semibold bg-light-primary text-primary p-3 ps-4 pe-4" style="border-radius: 8px;">Diskon 50%</span>
                        </div>
                    </div>

                    <div class="d-flex justify-content-center mt-4">
                        <div>
                            <h5>APW32L1M93I

                            <span class="badge ms-3" style="background-color: #E9E9E9;">
                                <svg xmlns="http://www.w3.org/2000/svg" width="17" height="17" viewBox="0 0 512 512"><path fill="#888888" d="M408 480H184a72 72 0 0 1-72-72V184a72 72 0 0 1 72-72h224a72 72 0 0 1 72 72v224a72 72 0 0 1-72 72"/><path fill="#888888" d="M160 80h235.88A72.12 72.12 0 0 0 328 32H104a72 72 0 0 0-72 72v224a72.12 72.12 0 0 0 48 67.88V160a80 80 0 0 1 80-80"/></svg>
                            </span>
                            </h5>

                        </div>
                    </div>

                    <div class="text-center">
                        <div class="progress mb-3 mt-4" style="background-color: #D1D1D1;">
                            <div class="progress-bar" style="width: 60%; height: 6px; border-width: 3px;" role="progressbar"></div>
                          </div>
                        {{-- <div class="mb-3 mt-4 gradient-border"></div> --}}
                        <p>45 Terpakai dari 100 stok</p>
                    </div>

                    <div class="text-center mt-4">
                        <h5>Masa Aktif</h5>

                        <div class=" mt-3">
                            <h5 style="color: #175A95;">12 Januari 2022 - 12 Desember 2022</h5>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-12">
            <div class="card">
                <div class="card-header" style="background-color: #175A95;">
                    <div class="row">
                        <div class="col-lg-11 d-flex justify-content-center">
                            <h5 class="text-white text-center">Kode Voucher</h5>
                        </div>

                        <div class="col-lg-1 d-flexx justify-content-end">
                            <div class="dropdown dropstart" >
                                <a href="#" class="link" style="float: right;"
                                    id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 256 256">
                                        <path fill="#ffffff"
                                            d="M156 128a28 28 0 1 1-28-28a28 28 0 0 1 28 28m-28-52a28 28 0 1 0-28-28a28 28 0 0 0 28 28m0 104a28 28 0 1 0 28 28a28 28 0 0 0-28-28" />
                                    </svg>
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <li>
                                        <button class="dropdown-item btn-edit" data-bs-toggle="modal" data-bs-target="#modal-update" data-id="${data.id}" >Edit</button>
                                    </li>
                                </ul>
                            </div>
                        </div>


                    </div>

                </div>

                <div class="card-body">
                    <div class="d-flex justify-content-center">
                        <div>
                            <span class="mb-1 badge fs-5 fw-semibold bg-light-primary text-primary p-3 ps-4 pe-4" style="border-radius: 8px;">Diskon 50%</span>
                        </div>
                    </div>

                    <div class="d-flex justify-content-center mt-4">
                        <div>
                            <h5>APW32L1M93I

                            <span class="badge ms-3" style="background-color: #E9E9E9;">
                                <svg xmlns="http://www.w3.org/2000/svg" width="17" height="17" viewBox="0 0 512 512"><path fill="#888888" d="M408 480H184a72 72 0 0 1-72-72V184a72 72 0 0 1 72-72h224a72 72 0 0 1 72 72v224a72 72 0 0 1-72 72"/><path fill="#888888" d="M160 80h235.88A72.12 72.12 0 0 0 328 32H104a72 72 0 0 0-72 72v224a72.12 72.12 0 0 0 48 67.88V160a80 80 0 0 1 80-80"/></svg>
                            </span>
                            </h5>

                        </div>
                    </div>

                    <div class="text-center">
                        <div class="progress mb-3 mt-4" style="background-color: #D1D1D1;">
                            <div class="progress-bar" style="width: 100%; height: 6px; border-width: 3px;" role="progressbar"></div>
                          </div>
                        {{-- <div class="mb-3 mt-4 gradient-border"></div> --}}
                        <p>45 Terpakai dari 100 stok</p>
                    </div>

                    <div class="text-center mt-4">
                        <h5>Masa Aktif</h5>

                        <div class=" mt-3">
                            <h5 style="color: #175A95;">12 Januari 2022 - 12 Desember 2022</h5>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-12">
            <div class="card">
                <div class="card-header" style="background-color: #175A95;">
                    <div class="row">
                        <div class="col-lg-11 d-flex justify-content-center">
                            <h5 class="text-white text-center">Kode Voucher</h5>
                        </div>

                        <div class="col-lg-1 d-flexx justify-content-end">
                            <div class="dropdown dropstart" >
                                <a href="#" class="link" style="float: right;"
                                    id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 256 256">
                                        <path fill="#ffffff"
                                            d="M156 128a28 28 0 1 1-28-28a28 28 0 0 1 28 28m-28-52a28 28 0 1 0-28-28a28 28 0 0 0 28 28m0 104a28 28 0 1 0 28 28a28 28 0 0 0-28-28" />
                                    </svg>
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <li>
                                        <button class="dropdown-item btn-edit" data-bs-toggle="modal" data-bs-target="#modal-update" data-id="${data.id}" >Edit</button>
                                    </li>
                                </ul>
                            </div>
                        </div>


                    </div>

                </div>

                <div class="card-body">
                    <div class="d-flex justify-content-center">
                        <div>
                            <span class="mb-1 badge fs-5 fw-semibold bg-light-primary text-primary p-3 ps-4 pe-4" style="border-radius: 8px;">Diskon 50%</span>
                        </div>
                    </div>

                    <div class="d-flex justify-content-center mt-4">
                        <div>
                            <h5>APW32L1M93I

                            <span class="badge ms-3" style="background-color: #E9E9E9;">
                                <svg xmlns="http://www.w3.org/2000/svg" width="17" height="17" viewBox="0 0 512 512"><path fill="#888888" d="M408 480H184a72 72 0 0 1-72-72V184a72 72 0 0 1 72-72h224a72 72 0 0 1 72 72v224a72 72 0 0 1-72 72"/><path fill="#888888" d="M160 80h235.88A72.12 72.12 0 0 0 328 32H104a72 72 0 0 0-72 72v224a72.12 72.12 0 0 0 48 67.88V160a80 80 0 0 1 80-80"/></svg>
                            </span>
                            </h5>

                        </div>
                    </div>

                    <div class="text-center">
                        <div class="progress mb-3 mt-4" style="background-color: #D1D1D1;">
                            <div class="progress-bar" style="width: 90%; height: 6px; border-width: 3px;" role="progressbar"></div>
                          </div>
                        {{-- <div class="mb-3 mt-4 gradient-border"></div> --}}
                        <p>45 Terpakai dari 100 stok</p>
                    </div>

                    <div class="text-center mt-4">
                        <h5>Masa Aktif</h5>

                        <div class=" mt-3">
                            <h5 style="color: #175A95;">12 Januari 2022 - 12 Desember 2022</h5>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-12">
            <div class="card">
                <div class="card-header" style="background-color: #175A95;">
                    <div class="row">
                        <div class="col-lg-11 d-flex justify-content-center">
                            <h5 class="text-white text-center">Kode Voucher</h5>
                        </div>

                        <div class="col-lg-1 d-flexx justify-content-end">
                            <div class="dropdown dropstart" >
                                <a href="#" class="link" style="float: right;"
                                    id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 256 256">
                                        <path fill="#ffffff"
                                            d="M156 128a28 28 0 1 1-28-28a28 28 0 0 1 28 28m-28-52a28 28 0 1 0-28-28a28 28 0 0 0 28 28m0 104a28 28 0 1 0 28 28a28 28 0 0 0-28-28" />
                                    </svg>
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <li>
                                        <button class="dropdown-item btn-edit" data-bs-toggle="modal" data-bs-target="#modal-update" data-id="${data.id}" >Edit</button>
                                    </li>
                                </ul>
                            </div>
                        </div>


                    </div>

                </div>

                <div class="card-body">
                    <div class="d-flex justify-content-center">
                        <div>
                            <span class="mb-1 badge fs-5 fw-semibold bg-light-primary text-primary p-3 ps-4 pe-4" style="border-radius: 8px;">Diskon 50%</span>
                        </div>
                    </div>

                    <div class="d-flex justify-content-center mt-4">
                        <div>
                            <h5>APW32L1M93I

                            <span class="badge ms-3" style="background-color: #E9E9E9;">
                                <svg xmlns="http://www.w3.org/2000/svg" width="17" height="17" viewBox="0 0 512 512"><path fill="#888888" d="M408 480H184a72 72 0 0 1-72-72V184a72 72 0 0 1 72-72h224a72 72 0 0 1 72 72v224a72 72 0 0 1-72 72"/><path fill="#888888" d="M160 80h235.88A72.12 72.12 0 0 0 328 32H104a72 72 0 0 0-72 72v224a72.12 72.12 0 0 0 48 67.88V160a80 80 0 0 1 80-80"/></svg>
                            </span>
                            </h5>

                        </div>
                    </div>

                    <div class="text-center">
                        <div class="progress mb-3 mt-4" style="background-color: #D1D1D1;">
                            <div class="progress-bar" style="width: 60%; height: 6px; border-width: 3px;" role="progressbar"></div>
                          </div>
                        {{-- <div class="mb-3 mt-4 gradient-border"></div> --}}
                        <p>45 Terpakai dari 100 stok</p>
                    </div>

                    <div class="text-center mt-4">
                        <h5>Masa Aktif</h5>

                        <div class=" mt-3">
                            <h5 style="color: #175A95;">12 Januari 2022 - 12 Desember 2022</h5>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-12">
            <div class="card">
                <div class="card-header" style="background-color: #175A95;">
                    <div class="row">
                        <div class="col-lg-11 d-flex justify-content-center">
                            <h5 class="text-white text-center">Kode Voucher</h5>
                        </div>

                        <div class="col-lg-1 d-flexx justify-content-end">
                            <div class="dropdown dropstart" >
                                <a href="#" class="link" style="float: right;"
                                    id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 256 256">
                                        <path fill="#ffffff"
                                            d="M156 128a28 28 0 1 1-28-28a28 28 0 0 1 28 28m-28-52a28 28 0 1 0-28-28a28 28 0 0 0 28 28m0 104a28 28 0 1 0 28 28a28 28 0 0 0-28-28" />
                                    </svg>
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <li>
                                        <button class="dropdown-item btn-edit" data-bs-toggle="modal" data-bs-target="#modal-update" data-id="${data.id}" >Edit</button>
                                    </li>
                                </ul>
                            </div>
                        </div>


                    </div>

                </div>

                <div class="card-body">
                    <div class="d-flex justify-content-center">
                        <div>
                            <span class="mb-1 badge fs-5 fw-semibold bg-light-primary text-primary p-3 ps-4 pe-4" style="border-radius: 8px;">Diskon 50%</span>
                        </div>
                    </div>

                    <div class="d-flex justify-content-center mt-4">
                        <div>
                            <h5>APW32L1M93I

                            <span class="badge ms-3" style="background-color: #E9E9E9;">
                                <svg xmlns="http://www.w3.org/2000/svg" width="17" height="17" viewBox="0 0 512 512"><path fill="#888888" d="M408 480H184a72 72 0 0 1-72-72V184a72 72 0 0 1 72-72h224a72 72 0 0 1 72 72v224a72 72 0 0 1-72 72"/><path fill="#888888" d="M160 80h235.88A72.12 72.12 0 0 0 328 32H104a72 72 0 0 0-72 72v224a72.12 72.12 0 0 0 48 67.88V160a80 80 0 0 1 80-80"/></svg>
                            </span>
                            </h5>

                        </div>
                    </div>

                    <div class="text-center">
                        <div class="progress mb-3 mt-4" style="background-color: #D1D1D1;">
                            <div class="progress-bar" style="width: 60%; height: 6px; border-width: 3px;" role="progressbar"></div>
                          </div>
                        {{-- <div class="mb-3 mt-4 gradient-border"></div> --}}
                        <p>45 Terpakai dari 100 stok</p>
                    </div>

                    <div class="text-center mt-4">
                        <h5>Masa Aktif</h5>

                        <div class=" mt-3">
                            <h5 style="color: #175A95;">12 Januari 2022 - 12 Desember 2022</h5>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-12">
            <div class="card">
                <div class="card-header" style="background-color: #175A95;">
                    <div class="row">
                        <div class="col-lg-11 d-flex justify-content-center">
                            <h5 class="text-white text-center">Kode Voucher</h5>
                        </div>

                        <div class="col-lg-1 d-flexx justify-content-end">
                            <div class="dropdown dropstart" >
                                <a href="#" class="link" style="float: right;"
                                    id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 256 256">
                                        <path fill="#ffffff"
                                            d="M156 128a28 28 0 1 1-28-28a28 28 0 0 1 28 28m-28-52a28 28 0 1 0-28-28a28 28 0 0 0 28 28m0 104a28 28 0 1 0 28 28a28 28 0 0 0-28-28" />
                                    </svg>
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <li>
                                        <button class="dropdown-item btn-edit" data-bs-toggle="modal" data-bs-target="#modal-update" data-id="${data.id}" >Edit</button>
                                    </li>
                                </ul>
                            </div>
                        </div>


                    </div>

                </div>

                <div class="card-body">
                    <div class="d-flex justify-content-center">
                        <div>
                            <span class="mb-1 badge fs-5 fw-semibold bg-light-primary text-primary p-3 ps-4 pe-4" style="border-radius: 8px;">Diskon 50%</span>
                        </div>
                    </div>

                    <div class="d-flex justify-content-center mt-4">
                        <div>
                            <h5>APW32L1M93I

                            <span class="badge ms-3" style="background-color: #E9E9E9;">
                                <svg xmlns="http://www.w3.org/2000/svg" width="17" height="17" viewBox="0 0 512 512"><path fill="#888888" d="M408 480H184a72 72 0 0 1-72-72V184a72 72 0 0 1 72-72h224a72 72 0 0 1 72 72v224a72 72 0 0 1-72 72"/><path fill="#888888" d="M160 80h235.88A72.12 72.12 0 0 0 328 32H104a72 72 0 0 0-72 72v224a72.12 72.12 0 0 0 48 67.88V160a80 80 0 0 1 80-80"/></svg>
                            </span>
                            </h5>

                        </div>
                    </div>

                    <div class="text-center">
                        <div class="progress mb-3 mt-4" style="background-color: #D1D1D1;">
                            <div class="progress-bar" style="width: 60%; height: 6px; border-width: 3px;" role="progressbar"></div>
                          </div>
                        {{-- <div class="mb-3 mt-4 gradient-border"></div> --}}
                        <p>45 Terpakai dari 100 stok</p>
                    </div>

                    <div class="text-center mt-4">
                        <h5>Masa Aktif</h5>

                        <div class=" mt-3">
                            <h5 style="color: #175A95;">12 Januari 2022 - 12 Desember 2022</h5>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <div id="loading"></div>
        <div class="d-flex mt-2 justify-content-end">
            <nav id="pagination">
            </nav>
        </div>

</div>

<!-- Modal -->
<div class="modal fade" id="modal-create" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Voucher</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="form-create">
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-6">
                            <label class="form-label mt-2">Kode Voucher</label>
                            <input class="form-control" type="text" name="name">
                            <ul class="error-text"></ul>
                        </div>
                        <div class="col-lg-6">
                            <label class="form-label mt-2">Potongan Harga</label>
                            <input class="form-control" type="text" name="name">
                            <ul class="error-text"></ul>
                        </div>
                        <div class="col-lg-6">
                            <label class="form-label mt-2">Tanggal Awal</label>
                            <input class="form-control" type="date" name="name">
                            <ul class="error-text"></ul>
                        </div>
                        <div class="col-lg-6">
                            <label class="form-label mt-2">Tanggal Akhir</label>
                            <input class="form-control" type="date" name="name">
                            <ul class="error-text"></ul>
                        </div>
                        <div class="col-lg-12">
                            <label class="form-label mt-2">Stok</label>
                            <input class="form-control" type="text" name="name">
                            <ul class="error-text"></ul>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-rounded btn-light-danger text-danger"
                            data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-rounded btn-light-success text-success">Tambah</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection

@section('script')
<script>
            function get(page) {
            $.ajax({
                url: "{{ route('voucher.index') }}?page=" + page,
                method: 'Get',
                dataType: "JSON",
                data: {
                    question: $('#search-name').val()
                },
                beforeSend: function() {
                    $('#data').html("")
                    $('#loading').html(showLoading())
                    $('#pagination').html('')
                },
                success: function(response) {
                    var faq = response.data.data
                    $('#loading').html("")
                    if (response.data.data.length > 0) {
                        $.each(response.data.data, function(index, data) {
                            $('#data').append(rowFaq(index, data))
                        })
                        $('#pagination').html(handlePaginate(response.data.paginate))


                        $('.btn-edit').click(function() {
                            var faqId = $(this).data('id');
                            var data = faq.find(faq => faq.id === faqId)

                            setFormValues('form-update', data)
                            $('#form-update').data('id', data['id'])
                            $('#modal-update').modal('show')
                        })

                        $('.btn-delete').click(function() {
                            $('#form-delete').data('id', $(this).data('id'))
                            $('#modal-delete').modal('show')
                        })
                    } else {
                        $('#loading').html(showNoData('Tidak ada data'))
                    }
                }
            })
        }

</script>
@endsection

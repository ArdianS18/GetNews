@extends('layouts.admin.app')

@section('content')
    
<div class="d-flex gap-2">
    <form class="d-flex gap-2">
        <div>
            <div class="position-relative d-flex">
                <div class="input-group">
                    <input type="text" name="search"
                        class="form-control search-chat py-2 ps-5" style="width: 200px" id="search-name" placeholder="Search">
                    <i class="ti ti-search position-absolute top-50 translate-middle-y fs-6 text-dark ms-3"></i>
                </div>
            </div>
        </div>

        <div>
            <div class="d-flex gap-2">
                <select class="form-select" id="opsi-latest" style="width: 200px">
                    <option disabled selected>Pilih opsi</option>
                    <option value="terbaru">Terbaru</option>
                    <option value="terlama">Terlama</option>
                </select>
            </div>
        </div>

        <div>
            <div class="d-flex gap-2">
                <select class="form-select" id="opsi-perpage" style="width: 200px">
                    <option value="Gambar">Gambar</option>
                    <option value="Video">Video</option>
                </select>
            </div>
        </div>

        <div>
            <div class="d-flex gap-2">
                <select class="form-select" id="opsi-perpage" style="width: 200px">
                    <option value="">Tampilkan semua</option>
                </select>
            </div>
        </div>
    </form>
</div>

<div class="table-responsive rounded-2 mt-4">
    <table class="table border text-nowrap customize-table mb-0 align-middle ">
        <thead>
            <tr>
                <th style="background-color: #D9D9D9;">No</th>
                <th style="background-color: #D9D9D9;">Jenis Iklan</th>
                <th style="background-color: #D9D9D9;">Tanggal Awal</th>
                <th style="background-color: #D9D9D9;">Tanggal Akhir</th>
                <th style="background-color: #D9D9D9;">Halaman</th>
                <th style="background-color: #D9D9D9;">Aksi</th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>

    <div id="loading"></div>
    <div class="d-flex mt-2 justify-content-end">
        <nav id="pagination">
        </nav>
    </div>

</div>
@endsection
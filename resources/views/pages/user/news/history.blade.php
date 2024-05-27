@extends('layouts.user.sidebar')
@section('content')
<div class="">
    <div class="d-flex justify-content-start gap-2 ">
        <form class="d-flex gap-3">
            <div class="position-relative">
                <div class="">
                    <input type="text" name="search" class="form-control search-chat py-2 ps-5" id="search-name"
                        placeholder="Search">
                    <i class="ti ti-search position-absolute top-50 translate-middle-y fs-6 text-dark ms-3"></i>
                </div>
            </div>

            <div class="d-flex gap-3">
                <select name="banned" class="form-select" id="search-status">
                    <option value="">Terbaru</option>
                    <option value="approved">Terlama</option>
                </select>
            </div>
            <div class="d-flex gap-3">
                <select name="banned" class="form-select" id="search-status">
                    <option value="">Pendidikan</option>
                    <option value="approved">Kesehatan</option>
                    <option value="reject">Bisnis</option>
                    <option value="">Teknologi</option>
                </select>
            </div>
            <div class="d-flex gap-3">
                <select name="banned" class="form-select" id="search-status">
                    <option value="">Tampilkan semua</option>
                </select>
            </div>
        </form>
    </div>
</div>
<div class="table-responsive rounded-2 mt-4">
    <table class="table border text-nowrap customize-table mb-0 align-middle ">
        <thead>
            <tr>
                <th style="background-color: #D9D9D9;">No</th>
                <th style="background-color: #D9D9D9;">Judul Berita</th>
                <th style="background-color: #D9D9D9;">Kategori</th>
                <th style="background-color: #D9D9D9;">Tanggal Upload</th>
                <th style="background-color: #D9D9D9;">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>1</td>
                <td>Mas Anies-Mas Anies...</td>
                <td>Pendidikan</td>
                <td>12/12/2022</td>
                <td>
                    <button class="btn btn-sm text-white" style="background-color: #5D87FF;">
                        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 24 24"><path fill="#ffffff" d="M12 6.5a9.77 9.77 0 0 1 8.82 5.5c-1.65 3.37-5.02 5.5-8.82 5.5S4.83 15.37 3.18 12A9.77 9.77 0 0 1 12 6.5m0-2C7 4.5 2.73 7.61 1 12c1.73 4.39 6 7.5 11 7.5s9.27-3.11 11-7.5c-1.73-4.39-6-7.5-11-7.5m0 5a2.5 2.5 0 0 1 0 5a2.5 2.5 0 0 1 0-5m0-2c-2.48 0-4.5 2.02-4.5 4.5s2.02 4.5 4.5 4.5s4.5-2.02 4.5-4.5s-2.02-4.5-4.5-4.5"/></svg>
                    </button>
                </td>
            </tr>
        </tbody>
        
    </table>


</div>
@endsection
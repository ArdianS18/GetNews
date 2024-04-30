@extends('layouts.admin.app')
@section('style')
    <style>
    .dropdown-toggle::after {
        display: none;
    }
</style>
@endsection
@section('content')
    <div class="d-flex mb-4 mt-2 justify-content-between">
        <div class="d-flex gap-2">
            <form class="d-flex gap-2">
                <div>
                    <div class="position-relative d-flex">
                        <div class="input-group">
                            <input type="text" name="search" class="form-control search-chat py-2 ps-5" style="width: 200px"
                                id="search-name" placeholder="Search">
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
            </form>
        </div>

        <div class="">
            <button type="button" style="background-color: #175A95;" class="btn btn-mdx text-white px-5"
                data-bs-toggle="modal" data-bs-target="#modal-create">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 2 30 24">
                    <path fill="currentColor"
                        d="M18 12.998h-5v5a1 1 0 0 1-2 0v-5H6a1 1 0 0 1 0-2h5v-5a1 1 0 0 1 2 0v5h5a1 1 0 0 1 0 2" />
                </svg>
                Tambah
            </button>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6 col-12 col-lg-3 mb-4">
            <div class="card border hover-img shadow-sm">
                <div class="card-body">
                    <div class="dropdown d-flex justify-content-end">
                        <div class="dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 256 256"><path fill="#000000" d="M156 128a28 28 0 1 1-28-28a28 28 0 0 1 28 28m-28-52a28 28 0 1 0-28-28a28 28 0 0 0 28 28m0 104a28 28 0 1 0 28 28a28 28 0 0 0-28-28"/></svg>
                        </div>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton">
                            <li><a class="dropdown-item" href="#">Edit</a></li>
                            <li><a class="dropdown-item" href="#">Detail</a></li>
                            <li><a class="dropdown-item text-danger" href="#">Hapus</a></li>
                        </ul>
                    </div>
                    <div class="p-4 text-center">
                     
                        <img src="{{ asset('assets/img/profile.svg') }}" alt="" class="rounded-circle mb-3" style="object-fit: cover" width="80" height="80">
                        <h5>Daffa Prasetya</h5>
                        <p class="fs-5">daffa@gmail.com</p>
                        <span class="badge bg-light-primary text-primary">Admin</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-12 col-lg-3 mb-4">
            <div class="card border hover-img shadow-sm">
                <div class="card-body">
                    <div class="dropdown d-flex justify-content-end">
                        <div class="dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 256 256"><path fill="#000000" d="M156 128a28 28 0 1 1-28-28a28 28 0 0 1 28 28m-28-52a28 28 0 1 0-28-28a28 28 0 0 0 28 28m0 104a28 28 0 1 0 28 28a28 28 0 0 0-28-28"/></svg>
                        </div>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton">
                            <li><a class="dropdown-item" href="#">Edit</a></li>
                            <li><a class="dropdown-item" href="#">Detail</a></li>
                            <li><a class="dropdown-item text-danger" href="#">Hapus</a></li>
                        </ul>
                    </div>
                    <div class="p-4 text-center">
                     
                        <img src="{{ asset('assets/img/profile.svg') }}" alt="" class="rounded-circle mb-3" style="object-fit: cover" width="80" height="80">
                        <h5>Daffa Prasetya</h5>
                        <p class="fs-5">daffa@gmail.com</p>
                        <span class="badge bg-light-primary text-primary">Admin</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-12 col-lg-3 mb-4">
            <div class="card border hover-img shadow-sm">
                <div class="card-body">
                    <div class="dropdown d-flex justify-content-end">
                        <div class="dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 256 256"><path fill="#000000" d="M156 128a28 28 0 1 1-28-28a28 28 0 0 1 28 28m-28-52a28 28 0 1 0-28-28a28 28 0 0 0 28 28m0 104a28 28 0 1 0 28 28a28 28 0 0 0-28-28"/></svg>
                        </div>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton">
                            <li><a class="dropdown-item" href="#">Edit</a></li>
                            <li><a class="dropdown-item" href="#">Detail</a></li>
                            <li><a class="dropdown-item text-danger" href="#">Hapus</a></li>
                        </ul>
                    </div>
                    <div class="p-4 text-center">
                     
                        <img src="{{ asset('assets/img/profile.svg') }}" alt="" class="rounded-circle mb-3" style="object-fit: cover" width="80" height="80">
                        <h5>Daffa Prasetya</h5>
                        <p class="fs-5">daffa@gmail.com</p>
                        <span class="badge bg-light-primary text-primary">Admin</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-12 col-lg-3 mb-4">
            <div class="card border hover-img shadow-sm">
                <div class="card-body">
                    <div class="dropdown d-flex justify-content-end">
                        <div class="dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 256 256"><path fill="#000000" d="M156 128a28 28 0 1 1-28-28a28 28 0 0 1 28 28m-28-52a28 28 0 1 0-28-28a28 28 0 0 0 28 28m0 104a28 28 0 1 0 28 28a28 28 0 0 0-28-28"/></svg>
                        </div>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton">
                            <li><a class="dropdown-item" href="#">Edit</a></li>
                            <li><a class="dropdown-item" href="#">Detail</a></li>
                            <li><a class="dropdown-item text-danger" href="#">Hapus</a></li>
                        </ul>
                    </div>
                    <div class="p-4 text-center">
                     
                        <img src="{{ asset('assets/img/profile.svg') }}" alt="" class="rounded-circle mb-3" style="object-fit: cover" width="80" height="80">
                        <h5>Daffa Prasetya</h5>
                        <p class="fs-5">daffa@gmail.com</p>
                        <span class="badge bg-light-primary text-primary">Admin</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="d-flex mt-2 mx-4 justify-content-center">
        <nav id="pagination">
        </nav>
    </div>

    <div class="modal fade" id="modal-create" tabindex="-1" aria-labelledby="tambahdataLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="tambahdataLabel">Tambah Data</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="form-create" method="post">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-lg-6 mb-3">
                                <label for="name" class="form-label">Nama:</label>
                                <input type="text" id="name" name="name" placeholder="name"
                                    value="{{ old('name') }}" class="form-control @error('name') is-invalid @enderror">
                                @error('name')
                                    <span class="invalid-feedback" role="alert" style="color: red;">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-lg-6 mb-3">
                                <label for="email" class="form-label">Email:</label>
                                <input type="text" id="email" name="email" placeholder="email"
                                    value="{{ old('email') }}" class="form-control @error('email') is-invalid @enderror">
                                @error('email')
                                    <span class="invalid-feedback" role="alert" style="color: red;">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-lg-6 mb-3">
                                <label for="password" class="form-label">Password:</label>
                                <input type="text" id="password" name="password" placeholder="password"
                                    value="{{ old('password') }}"
                                    class="form-control @error('password') is-invalid @enderror">
                                @error('password')
                                    <span class="invalid-feedback" role="alert" style="color: red;">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-lg-6 mb-3">
                                <label for="role" class="form-label">Role:</label>
                                <select name="role" class="form-select" id="role">
                                    <option value="admin">Admin</option>
                                    <option value="user">User</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-rounded btn-light-danger text-danger"
                            data-bs-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-rounded btn-light-success text-success">Tambah</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

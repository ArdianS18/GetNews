@extends('layouts.admin.app')

@section('content')

<div class="d-flex mb-4 mt-2 justify-content-between">
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
    @forelse ($users as $user)
    <div class="col-md-12 col-lg-3 mb-4">
        <a href="">
            <div class="card border hover-img shadow-sm">
                <div class="card-body">
                    <div class="p-4 text-center">
                        <img src="{{asset('assets/img/profile.svg')}}" alt="" class="rounded-circle mb-3" style="object-fit: cover" width="80" height="80">
                        <h5>{{ $user->name }}</h5>
                        <p class="fs-5">{{ $user->email }}</p>
                        <div class="">
                            @if ($user->hasRole('admin'))
                                <button class="btn btn-light-primary px-4 text-primary">Admin</button>
                            @else
                                <button class="btn btn-light-danger px-4 text-danger">User</button>
                            @endif
                        </div>

                    </div>
                </div>
            </div>
        </a>
    </div>
    @empty
    @endforelse
    {{-- <div class="col-md-12 col-lg-3 mb-4">
        <a href="">
            <div class="card border hover-img shadow-sm">
                <div class="card-body">
                    <div class="p-4 text-center">
                        <img src="{{asset('assets/img/profile.svg')}}" alt="" class="rounded-circle mb-3" style="object-fit: cover" width="80" height="80">
                        <h5>Ardian Firmansyah</h5>
                        <p class="fs-5">ardian@gmail.com</p>
                        <div class="">
                            <button class="btn btn-light-primary px-4 text-primary">Admin</button>
                        </div>

                    </div>
                </div>
            </div>
        </a>
    </div>
    <div class="col-md-12 col-lg-3 mb-4">
        <a href="">
            <div class="card border hover-img shadow-sm">
                <div class="card-body">
                    <div class="p-4 text-center">
                        <img src="{{asset('assets/img/profile.svg')}}" alt="" class="rounded-circle mb-3" style="object-fit: cover" width="80" height="80">
                        <h5>Jovita Maharani</h5>
                        <p class="fs-5">jovita@gmail.com</p>
                        <div class="">
                            <button class="btn btn-light-danger px-4 text-danger">Penulis</button>
                        </div>

                    </div>
                </div>
            </div>
        </a>
    </div>
    <div class="col-md-12 col-lg-3 mb-4">
        <a href="">
            <div class="card border hover-img shadow-sm">
                <div class="card-body">
                    <div class="p-4 text-center">
                        <img src="{{asset('assets/img/profile.svg')}}" alt="" class="rounded-circle mb-3" style="object-fit: cover" width="80" height="80">
                        <h5>Frendika Wildan</h5>
                        <p class="fs-5">frendika@gmail.com</p>
                        <div class="">
                            <button class="btn btn-light-success px-4 text-success">Admin</button>
                        </div>

                    </div>
                </div>
            </div>
        </a>
    </div> --}}
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
            <form action="{{ route('create.account.admin') }}" method="post">
                @method('post')
                @csrf
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
                                value="{{ old('password') }}" class="form-control @error('password') is-invalid @enderror">
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

@extends('layouts.admin.app')
@section('content')

    <div class="d-flex justify-content-between">

        <div class="d-flex justify-content-start gap-2 ">
            <form class="d-flex gap-2">

                <div class="position-relative">
                    <input type="search" name="search" class="form-control search-chat py-2 ps-5" id="search-name" placeholder="Search" value="{{ request('search') }}">
                    <i class="ti ti-search position-absolute top-50 translate-middle-y fs-6 text-dark ms-3"></i>
                </div>

                <div class="d-flex gap-2">
                    <select name="status" class="form-select">
                        <option value="{{ request('status') }}">Pilih Status</option>
                        <option value="panding">Panding</option>
                        <option value="approved">Approved</option>
                        <option value="notapproved">Reject</option>
                        <option value="">Tampilkan semua</option>
                    </select>
                    <button type="submit" class="btn btn-primary">Filter</button>
                </div>
            </form>
        </div>

        <div class="d-flex justify-content-end">
            <button class="btn btn-sm btn-primary py-1 px-5" type="button"  data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                + Tambah Penulis
            </button>
        </div>
                
    </div>

    <div class="container mt-3 col-md-12 col-lg-12">
    <table class="table">
        <thead>
            <tr>
                <th>No</th>
                <th>Name</th>
                <th>Email</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->status }}</td>
                <td>
                    <div class="d-flex">
                        <button type="submit" name="status" class="btn btn-success"  data-bs-toggle="modal" data-bs-target="#detail" value="approved">Detail</button>

                        <form action="{{ route('user.approved', ['user' => $user->id]) }}" method="post">
                            @method('patch')
                            @csrf
                            <button type="submit" name="status" class="btn btn-success" value="approved">Approved</button>
                        </form>
    
                        <form action="{{ route('user.reject', ['user' => $user->id]) }}" method="post">
                            @method('patch')
                            @csrf
                            <button type="submit" name="status" class="btn btn-danger" value="notapproved">Reject</button>
                        </form>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    
    <!-- Modal -->
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="staticBackdropLabel"><span style="background-color: #0F4D8A; font-size: 12px; margin-right: 6px;">|</span>Tambah Akun</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row container">
                    <div class="col-md-12 col-lg-6 mb-3">
                        <label class="form-label" for="nomor">Nama</label>
                        <input type="text" id="name" name="name" placeholder="nama"
                            value="{{ old('name') }}" class="form-control @error('name') is-invalid @enderror">
                        @error('name')
                            <span class="invalid-feedback" role="alert" style="color: red;">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="col-md-12 col-lg-6 mb-3">
                        <label class="form-label" for="nomor">Nomor Telepon</label>
                        <input type="text" id="name" name="name" placeholder="nomor telepon"
                            value="{{ old('name') }}" class="form-control @error('name') is-invalid @enderror">
                        @error('name')
                            <span class="invalid-feedback" role="alert" style="color: red;">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="col-md-12 col-lg-6 mb-3">
                        <label class="form-label" for="nomor">Email</label>
                        <input type="text" id="name" name="name" placeholder="email"
                            value="{{ old('name') }}" class="form-control @error('name') is-invalid @enderror">
                        @error('name')
                            <span class="invalid-feedback" role="alert" style="color: red;">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="col-md-12 col-lg-6 mb-3">
                        <label class="form-label" for="nomor">CV</label>
                        <input type="file" id="name" name="name" placeholder="name"
                            value="{{ old('name') }}" class="form-control @error('name') is-invalid @enderror">
                      
                    </div>

                    <div class="col-md-12 col-lg-6 mb-3">
                        <label class="form-label" for="nomor">Password</label>
                        <input type="text" id="name" name="name" placeholder="password"
                            value="{{ old('name') }}" class="form-control @error('name') is-invalid @enderror">
                        @error('name')
                            <span class="invalid-feedback" role="alert" style="color: red;">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="col-md-12 col-lg-12 from-group mb-3">
                        <label class="form-label" for="nomor">Alamat</label>
                        <textarea name="alamat" id="" rows="6" class="form-control"></textarea>
                        {{-- <input type="text" id="name" name="name" placeholder="name"
                            value="{{ old('name') }}" class="form-control @error('name') is-invalid @enderror">
                        @error('name')
                            <span class="invalid-feedback" role="alert" style="color: red;">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror --}}
                    </div>


                </div>
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
            <button type="button" class="btn btn-primary">Tambah</button>
            </div>
        </div>
        </div>
    </div>


      <!-- Modal Detail -->
      <div class="modal fade" id="detail" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="detailLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="detailLabel"><span style="background-color: #0F4D8A; font-size: 12px; margin-right: 6px;">|</span>Tambah Akun</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row container">
                    <div class="col-md-12 col-lg-12">
                        profile
                    </div>
                    <div class="col-md-12 col-lg-6 mb-3">
                        <label class="form-label" for="nomor">Nama</label>
                        <input type="text" id="name" name="name" placeholder="nama"
                            value="{{ old('name') }}" class="form-control @error('name') is-invalid @enderror">
                        @error('name')
                            <span class="invalid-feedback" role="alert" style="color: red;">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="col-md-12 col-lg-6 mb-3">
                        <label class="form-label" for="nomor">Nomor Telepon</label>
                        <input type="text" id="name" name="name" placeholder="nomor telepon"
                            value="{{ old('name') }}" class="form-control @error('name') is-invalid @enderror">
                        @error('name')
                            <span class="invalid-feedback" role="alert" style="color: red;">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="col-md-12 col-lg-6 mb-3">
                        <label class="form-label" for="nomor">Email</label>
                        <input type="text" id="name" name="name" placeholder="email"
                            value="{{ old('name') }}" class="form-control @error('name') is-invalid @enderror">
                        @error('name')
                            <span class="invalid-feedback" role="alert" style="color: red;">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="col-md-12 col-lg-6 mb-3">
                        <label class="form-label" for="nomor">CV</label>
                        <input type="file" id="name" name="name" placeholder="name"
                            value="{{ old('name') }}" class="form-control @error('name') is-invalid @enderror">
                      
                    </div>

                    <div class="col-md-12 col-lg-6 mb-3">
                        <label class="form-label" for="nomor">Password</label>
                        <input type="text" id="name" name="name" placeholder="password"
                            value="{{ old('name') }}" class="form-control @error('name') is-invalid @enderror">
                        @error('name')
                            <span class="invalid-feedback" role="alert" style="color: red;">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="col-md-12 col-lg-12 from-group mb-3">
                        <label class="form-label" for="nomor">Alamat</label>
                        <textarea name="alamat" id="" rows="6" class="form-control"></textarea>
                        {{-- <input type="text" id="name" name="name" placeholder="name"
                            value="{{ old('name') }}" class="form-control @error('name') is-invalid @enderror">
                        @error('name')
                            <span class="invalid-feedback" role="alert" style="color: red;">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror --}}
                    </div>


                </div>
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
            <button type="button" class="btn btn-primary">Tambah</button>
            </div>
        </div>
        </div>
    </div>

</div>

@endsection

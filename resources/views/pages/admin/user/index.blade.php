@extends('layouts.admin.app')
@section('content')

    <div class="d-flex justify-content-between">

        <div class="d-flex justify-content-start gap-2 ">
            <form class="d-flex gap-2">

                <div class="position-relative">
                    <div class="input-group">
                        <input type="text" name="query" class="form-control search-chat py-2 ps-5"placeholder="Search">
                        <i class="ti ti-search position-absolute top-50 translate-middle-y fs-6 text-dark ms-3"></i>
                        <button type="submit" class="btn btn-outline-primary">Cari</button>
                    </div>
                </div>

                <div class="d-flex gap-2">
                    <select name="status" class="form-select">
                        <option value="{{ request('status') }}">Pilih Status</option>
                        <option value="panding">Panding</option>
                        <option value="approved">Approved</option>
                        <option value="reject">Reject</option>
                        <option value="">Tampilkan semua</option>
                    </select>
                    <button type="submit" class="btn btn-primary">Filter</button>
                </div>
            </form>
        </div>

        <div class="d-flex justify-content-end">
            <button class="btn btn-md py-1 px-5 text-white" type="button" style="background-color: #175A95;" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 2 30 24">
                    <path fill="currentColor" d="M18 12.998h-5v5a1 1 0 0 1-2 0v-5H6a1 1 0 0 1 0-2h5v-5a1 1 0 0 1 2 0v5h5a1 1 0 0 1 0 2" />
                </svg>
                Tambah
            </button>
        </div>

    </div>

    <div class="mt-3 col-md-12 col-lg-12">
    <table class="table">
        <thead>
            <tr>
                <th class="text-white" style="background-color: #175A95; border-radius: 5px 0 0 5px">No</th>
                <th class="text-white" style="background-color: #175A95; ">Name</th>
                <th class="text-white" style="background-color: #175A95; ">Email</th>
                <th class="text-white" style="background-color: #175A95; ">Status</th>
                <th class="text-white" style="background-color: #175A95; border-radius: 0 5px 5px 0">Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($authors as $author)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{ $author->user->name}}</td>
                <td>{{ $author->user->email }}</td>
                <td>{{ $author->status }}</td>
                <td>
                    <div class="d-flex">

                        <!-- Detail Modal toggle -->
                        {{-- <button class="btn btn-primary btn-detail me-2" data-id="{{ $author->id }}"
                            data-name="{{ $user->name }}" data-nomor="{{ $user->nomor }}" data-nomor="{{ $user->nomor }}"
                            data-email="{{ $user->email }}" data-cv="{{ $user->cv }}" data-password="{{ $user->password }}" data-alamat="{{ $user->alamat }}"
                            id="btn-detail-{{ $user->id }}">
                            Detail
                        </button> --}}

                        {{-- <button type="submit" name="status" class="btn btn-success"  data-bs-toggle="modal" data-bs-target="#detail{{$user->id}}" value="approved">Detail</button> --}}

                        <form action="{{ route('user.approved', ['user' => $author->id]) }}" method="post">
                            @method('patch')
                            @csrf
                            <button type="submit" name="status" style="background-color: #67D679;" class="btn text-white me-2" value="approved">Terima</button>
                        </form>

                        <form action="{{ route('user.reject', ['user' => $author->id]) }}" method="post">
                            @method('patch')
                            @csrf
                            <button type="submit" name="status" style="background-color: #EF6E6E;" class="btn text-white" value="reject">Tolak</button>
                        </form>
                    </div>
                </td>
            </tr>
            @empty
                <tr>
                    <td colspan="5">
                        <div class="d-flex justify-content-center">
                            <div>
                                <img src="{{ asset('no-data.svg') }}" alt="">
                            </div>
                        </div>
                        <div class="text-center">
                            <h4>Ups... Ada kesalahan!!!</h4>
                        </div>
                        {{-- <button type="submit" class="btn btn-danger btn-delete" data-id="{{ $faq->id }}">Hapus</button> --}}
                    </td>
                </tr>
            @endforelse
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

            <form action="{{ route('author.create') }}" method="POST" enctype="multipart/form-data">
                @csrf
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
                        <input type="text" id="name" name="phone_number" placeholder="nomor telepon"
                            value="{{ old('name') }}" class="form-control @error('name') is-invalid @enderror">
                        @error('name')
                            <span class="invalid-feedback" role="alert" style="color: red;">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="col-md-12 col-lg-6 mb-3">
                        <label class="form-label" for="nomor">Email</label>
                        <input type="text" id="name" name="email" placeholder="email"
                            value="{{ old('name') }}" class="form-control @error('name') is-invalid @enderror">
                        @error('name')
                            <span class="invalid-feedback" role="alert" style="color: red;">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="col-md-12 col-lg-6 mb-3">
                        <label class="form-label" for="nomor">CV</label>
                        <input type="file" id="name" name="photo" placeholder="name"
                            value="{{ old('name') }}" class="form-control @error('name') is-invalid @enderror">

                    </div>

                    <div class="col-md-12 col-lg-6 mb-3">
                        <label class="form-label" for="nomor">Password</label>
                        <input type="text" id="name" name="password" placeholder="password"
                            value="{{ old('name') }}" class="form-control @error('name') is-invalid @enderror">
                        @error('name')
                            <span class="invalid-feedback" role="alert" style="color: red;">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="col-md-12 col-lg-12 from-group mb-3">
                        <label class="form-label" for="nomor">Alamat</label>
                        <textarea name="address" id="" rows="6" class="form-control"></textarea>
                    </div>
                </div>
            </div>

            <div class="modal-footer">
                <button type="button" style="background-color: #C9C9C9;" class="btn" data-bs-dismiss="modal">Batal</button>
                <button type="submit" style="background-color: #175A95;" class="btn text-white">Tambah</button>
            </div>
        </form>
        </div>
        </div>
    </div>


    <!-- Edit Modal -->
    <div class="modal fade" id="modal-update" tabindex="-1"
        aria-labelledby="modal-update Label" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
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
                <!-- Modal body -->
                <form method="post" id="form-update">
                    @method('put')
                    @csrf
                    <div class="modal-body">
                        <div class="row container">

                            <div class="col-md-12 col-lg-12 mb-4">
                                <div class="d-flex justify-content-center">
                                    <img src="{{ asset('assets/img/news/single-news-1.webp') }}" width="180" height="180" style="border-radius: 50%;" alt="photo">
                                </div>
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
                                <input type="text" id="nomor" name="nomor" placeholder="nomor telepon"
                                    value="{{ old('nomor') }}" class="form-control @error('nomor') is-invalid @enderror">
                                @error('nomor')
                                    <span class="invalid-feedback" role="alert" style="color: red;">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="col-md-12 col-lg-6 mb-3">
                                <label class="form-label" for="nomor">Email</label>
                                <input type="text" id="email" name="email" placeholder="email"
                                    value="{{ old('name') }}" class="form-control @error('name') is-invalid @enderror">
                                @error('name')
                                    <span class="invalid-feedback" role="alert" style="color: red;">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="col-md-12 col-lg-6 mb-3">
                                <label class="form-label" for="nomor">Password</label>
                                <input type="text" id="password" name="password" placeholder="password"
                                    value="{{ old('name') }}" class="form-control @error('name') is-invalid @enderror">
                                @error('name')
                                    <span class="invalid-feedback" role="alert" style="color: red;">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="col-md-12 col-lg-12 from-group mb-3">
                                <label class="form-label" for="alamat">Alamat</label>
                                <textarea name="alamat" id="" rows="6" class="form-control">{{old('alamat')}}</textarea>
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
                        {{-- <button type="submit" class="btn btn-primary">Simpan</button> --}}
                    </div>
                </form>
            </div>
        </div>
    </div>
    <x-delete-modal-component />



    <!-- Detail Modal -->
    <div class="modal fade" id="modal-detail" tabindex="-1"
        aria-labelledby="modal-detail Label" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <!-- Modal content -->
                <div class="modal-header">
                    <h3 class="modal-title">Detail data User</h3>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <!-- Modal body -->
                <form method="post" id="form-detail">
                    @method('put')
                    @csrf
                    <div class="modal-body">
                        <div class="row container">

                            <div class="col-md-12 col-lg-12 mb-4">
                                <div class="d-flex justify-content-center">
                                    <img src="{{ asset('assets/img/news/single-news-1.webp') }}" width="180" height="180" style="border-radius: 50%;" alt="photo">
                                </div>
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
                                <input type="text" id="nomor" name="nomor" placeholder="nomor telepon"
                                    value="{{ old('nomor') }}" class="form-control @error('nomor') is-invalid @enderror">
                                @error('nomor')
                                    <span class="invalid-feedback" role="alert" style="color: red;">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="col-md-12 col-lg-6 mb-3">
                                <label class="form-label" for="nomor">Email</label>
                                <input type="text" id="email" name="email" placeholder="email"
                                    value="{{ old('name') }}" class="form-control @error('name') is-invalid @enderror">
                                @error('name')
                                    <span class="invalid-feedback" role="alert" style="color: red;">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="col-md-12 col-lg-6 mb-3">
                                <label class="form-label" for="nomor">Password</label>
                                <input type="text" id="password" name="password" placeholder="password"
                                    value="{{ old('name') }}" class="form-control @error('name') is-invalid @enderror">
                                @error('name')
                                    <span class="invalid-feedback" role="alert" style="color: red;">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="col-md-12 col-lg-12 from-group mb-3">
                                <label class="form-label" for="alamat">Alamat</label>
                                <textarea name="alamat" id="" rows="6" class="form-control">{{old('alamat')}}</textarea>
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
                        {{-- <button type="submit" class="btn btn-primary">Simpan</button> --}}
                    </div>
                </form>
            </div>
        </div>
    </div>
    <x-delete-modal-component />



</div>

@endsection

@section('script')
    <script>
        $('.btn-detail').click(function() {
            const formData = getDataAttributes($(this).attr('id'))
            var actionUrl = `user/${formData['id']}`;
            console.log(formData);
            $('#form-detail').attr('action', actionUrl);

            setFormValues('form-detail', formData)
            $('#form-detail').data('id', formData['id'])
            $('#form-detail').attr('action', );
            $('#modal-detail').modal('show')
        })

        $('.btn-update').click(function() {
            const formData = getDataAttributes($(this).attr('id'))
            var actionUrl = `user/${formData['id']}`;
            console.log(formData);
            $('#form-update').attr('action', actionUrl);

            setFormValues('form-update', formData)
            $('#form-update').data('id', formData['id'])
            $('#form-update').attr('action', );
            $('#modal-update').modal('show')
        })
    </script>
@endsection

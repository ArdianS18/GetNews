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
                        <option value="reject">Reject</option>
                        <option value="">Tampilkan semua</option>
                    </select>
                    <button type="submit" class="btn btn-primary">Filter</button>
                </div>
            </form>
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
            @foreach($authors as $author)
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
{{--
                        <form action="{{ route('user.approved', ['user' => $author->id]) }}" method="post">
                            @method('patch')
                            @csrf
                            <button type="submit" name="status" class="btn btn-success me-2" value="approved">Terima</button>
                        </form> --}}

                        {{-- <form action="{{ route('user.reject', ['user' => $author->id]) }}" method="post">
                            @method('patch')
                            @csrf
                            <button type="submit" name="status" class="btn btn-danger" value="reject">Banned</button>
                        </form> --}}

                        <a href="{{ route('banned.author', ['author' => $author->id]) }}" class="btn btn-danger">
                            UnBanned
                        </a>

                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    {{-- <x-delete-modal-component /> --}}



    <!-- Detail Modal -->
    <div class="modal fade" id="modal-detail" tabindex="-1"
        aria-labelledby="modal-detail Label" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <!-- Modal content -->
                <div class="modal-header">
                    <h3 class="modal-title">Detail data Author</h3>
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

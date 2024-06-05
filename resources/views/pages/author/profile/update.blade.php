@extends('layouts.author.sidebar')

<head>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <title>Profile Update</title>
</head>

@section('content')

    {{-- @if (session('success'))
        <div id="success-alert" class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif --}}

    <div class="">
        <div class="">
            <div class="tab-content" id="pills-tabContent">
                <div class="tab-pane fade active show" id="pills-account" role="tabpanel"
                    aria-labelledby="pills-account-tab" tabindex="0">
                    <div class="row">
                        <div class="col-lg-6 d-flex align-items-stretch">
                            <div class="card w-100 position-relative overflow-hidden">
                                <div class="card-body p-4">
                                    <h5 class="card-title fw-semibold">Ganti Profile</h5>
                                    <p class="card-subtitle mb-4">Ganti Foto Profile Anda Di Sini</p>
                                    <div class="text-center">
                                        <img src="{{ asset(Auth::user()->photo ? 'storage/' . Auth::user()->photo : 'default.png') }}"
                                            alt="" class="img-fluid rounded-circle" width="120" height="120">
                                        <form method="POST"
                                            action="{{ route('update-photo', ['user' => auth()->user()->id]) }}"
                                            id="upload-photo" enctype="multipart/form-data">
                                            @csrf
                                            <div class="d-flex align-items-center justify-content-center my-4 gap-3">
                                                <input type="file" style="display: none" name="photo" id="photo">
                                                <button class="btn btn-primary btn-upload" type="button"
                                                    id="btn-upload">Upload</button>
                                                <button type="submit" style="display: none"
                                                    id="submit-button">Save</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 d-flex align-items-stretch">
                            <div class="card w-100 position-relative overflow-hidden">
                                <div class="card-body p-4">
                                    <h5 class="card-title fw-semibold">Ganti Password</h5>
                                    <p class="card-subtitle mb-4">Untuk mengubah kata sandi Anda, silakan konfirmasi di sini
                                    </p>
                                    <form action="{{ route('change.password.profile', ['user' => auth()->user()->id]) }}"
                                        method="POST">
                                        @method('post')
                                        @csrf
                                        <div class="mb-4">
                                            <label for="exampleInputPassword1" class="form-label fw-semibold">Password
                                                Lama</label>
                                            <input type="password" name="current_password" class="form-control @error('current_password') is-invalid @enderror"
                                                id="">
                                            @error('current_password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="mb-4">
                                            <label for="" class="form-label fw-semibold">Password
                                                Baru</label>
                                            <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" id="password">
                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="">
                                            <label for="" class="form-label fw-semibold">Konfirmasi
                                                Password</label>
                                            <input type="password" name="password_confirmation" class="form-control @error('password_confirmation') is-invalid @enderror"
                                                id="password-confirmation">
                                                <span class="error-confirm-password"></span>
                                            @error('password_confirmation')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="col-12">
                                            <div class="d-flex align-items-center justify-content-end mt-4 gap-3">
                                                <button type="submit" class="btn btn-primary">Save</button>
                                                <button class="btn btn-light-danger text-danger">Cancel</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="card w-100 position-relative overflow-hidden mb-0">
                                <div class="card-body p-4">
                                    <h5 class="card-title fw-semibold">Biodata</h5>
                                    <p class="card-subtitle mb-4">Untuk mengubah detail pribadi Anda, edit dan simpan dari
                                        sini</p>
                                    <form action="{{ route('update.author.profile', ['user' => auth()->user()->id]) }}"
                                        method="POST">
                                        @method('post')
                                        @csrf
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="mb-4">
                                                    <label for="exampleInputPassword1" class="form-label fw-semibold">Nama
                                                        Anda</label>
                                                    <input type="text" class="form-control" id="exampleInputtext"
                                                        value="{{ auth()->user()->name }}" name="name">
                                                </div>
                                                <div class="mb-4">
                                                    <label for="exampleInputPassword1"
                                                        class="form-label fw-semibold">Email</label>
                                                    <input type="email" class="form-control" id="exampleInputtext"
                                                        value="{{ auth()->user()->email }}" name="email"
                                                        placeholder="Masukan Email Anda">
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="mb-4">
                                                    <label for="exampleInputPassword1" class="form-label fw-semibold">Nomer Telepon</label>
                                                    <input type="text" class="form-control" id="exampleInputtext"
                                                        value="{{ auth()->user()->phone_number }}" name="phone_number">
                                                </div>
                                                <div class="mb-4">
                                                    <label for="exampleInputPassword1"
                                                        class="form-label fw-semibold">Tanggal Lahir</label>
                                                    <input type="date" value="{{ auth()->user()->birth_date }}"
                                                        name="birth_date" class="form-control" id="exampleInputtext">
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="">
                                                    <label for="exampleInputPassword1"
                                                        class="form-label fw-semibold">Alamat</label>
                                                    <textarea type="text" class="form-control" name="address" id="exampleInputtext"
                                                        placeholder="814 Howard Street, 120065, India" style="resize: none">{{ auth()->user()->address }}</textarea>
                                                </div>
                                            </div>

                                            @hasrole('author')
                                                <div class="col-12">
                                                    <div class="mt-2">
                                                        <label for="exampleInputPassword1"
                                                            class="form-label fw-semibold">Deskripsi</label>
                                                        <textarea type="text" class="form-control" name="description" id="exampleInputtext" placeholder="Saya author.."
                                                            style="resize: none; height: 80px">{{ auth()->user()->description }}</textarea>
                                                    </div>
                                                </div>
                                            @endhasrole

                                            <div class="col-12">
                                                <div class="d-flex align-items-center justify-content-end mt-4 gap-3">
                                                    <button type="submit" class="btn btn-primary">Save</button>
                                                    <button class="btn btn-light-danger text-danger">Cancel</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            @if (session('success'))
                Swal.fire({
                    title: 'Success!',
                    text: '{{ session('success') }}',
                    icon: 'success',
                    confirmButtonText: 'OK'
                });
            @endif
        });
    </script>

    <script>
        document.getElementById('btn-upload').addEventListener('click', function() {
            document.getElementById('photo').click();
        });

        document.getElementById('photo').addEventListener('change', function() {
            document.getElementById('submit-button').click();
        });

        $('#password-confirmation').keyup(function() {
            if ($(this).val() != $('#password').val()) {
                $('.error-confirm-password').html('Password tidak sama').addClass(
                    'is-invalid text-danger mt-2')
                $('#password-confirmation').addClass('is-invalid')
            } else {
                $(this).removeClass('is-invalid')
                $('.error-confirm-password').html('')

            }
        })
    </script>
@endsection

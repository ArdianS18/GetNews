@extends('layouts.user.sidebar')

@section('style')
    <style>
        .card-profile{
            border: 1px solid #ddd;
            box-shadow: 0  5px 2px rgba(81, 81, 81, 0.1);
            border-radius: 10px;
        }

        .card-bio{
            border: 1px solid #ddd;
            box-shadow: 0  5px 2px rgba(81, 81, 81, 0.1);
            border-radius: 10px;
        }
    </style>
@endsection

@section('contentt')


    <div class="container" >
        <div class="card-profile row">
            <div class="m-3 mt-4">
                <h5>Ubah Foto Profil</h5>
            </div>
            <div class="d-flex justify-content-center align-items-center">
                <div class="">
                    <img src="assets/img/author/author-thumb-1.webp" width="120px" style="border-radius: 50%;"  alt="Image">
                </div><br>
            </div>

            <div class="mt-4 d-flex justify-content-center align-items-center">
    
                <div class="">
                    <button class="btn btn-sm text-white" style="background-color: #175A95; padding-left: 1.5rem; padding-right: 1.5rem;">Upload</button>
                </div>
            </div>

            <div class="m-2 mb-5 d-flex justify-content-center align-items-center">
    
                <span style="color: #434343; font-size: ;">Dengan Format Jpg atau Png</span>
            </div>

        </div>

        <div class="mt-5 p-5 card-bio row">
            <div class="mb-3">
                <h5>Biodata</h5>
                <p>Masukan data diri anda dengan benar</p>
            </div>
            <div class="row">
                <div class="col-md-12 col-lg-6 mt-3">
                    <label class="form-label" for="email">Nama</label>
                    <input id="name" type="text" placeholder="Nama" class="form-control form-control-lg @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="col-md-12 col-lg-6 mt-3">
                    <label class="form-label" for="email">Password Lama</label>
                    <input id="name" type="password" placeholder="Password" class="form-control form-control-lg @error('password') is-invalid @enderror" name="password" value="{{ $user->name }}" required autocomplete="password" autofocus>

                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="row">
                <div class="col-md-12 col-lg-6 mt-3">
                    <label class="form-label" for="email">Email</label>
                    <input id="name" type="email" placeholder="Email" class="form-control form-control-lg @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="col-md-12 col-lg-6 mt-3">
                    <label class="form-label" for="password">Password Baru</label>
                    <input id="name" type="password" placeholder="Password Baru" class="form-control form-control-lg @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="row">
                <div class="col-md-12 col-lg-6 mt-3">
                    <label class="form-label" for="nomor">No Hp</label>
                    <input id="name" type="text" placeholder="Nomor Hp" class="form-control form-control-lg @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="col-md-12 col-lg-6 mt-3">
                    <label class="form-label" for="password">Konfirmasi Password</label>
                    <input id="name" type="password" placeholder="konfirmasi password" class="form-control form-control-lg @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="row">
                <div class="col-md-12 col-lg-6 mt-3">
                    <label class="form-label" for="nomor">Tanggal Lahir</label>
                    <input id="tangga" type="date" placeholder="Nomor Hp" class="form-control form-control-lg @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="row">
                <div class="col-md-12 col-lg-12 mt-3">
                    <label class="form-label" for="alamat">Alamat</label>
                    <textarea name="sinopsis" id="sinopsis" rows="8" class="form-control" value="{{ old('sinopsis') }}"></textarea>
                </textarea>
                </div>
            </div>

            <div class="mt-4 d-flex justify-content-center align-items-center">
    
                <div class="">
                    {{-- <button class="btn btn-sm text-white" style="background-color: #175A95; padding-left: 1.5rem; padding-right: 1.5rem;">Upload</button> --}}
                </div>
            </div>

            <div class="m-2 mb-5 d-flex justify-content-center align-items-center">
    
                {{-- <span style="color: #434343; font-size: ;">Dengan Format Jpg atau Png</span> --}}
            </div>

        </div>
    </div>
@endsection
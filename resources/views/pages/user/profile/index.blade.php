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

@section('content')
    <div class="container p-1" >
        <div class="card-profile row">
            <div class="m-3 mt-4">
                <h5>User</h5>
            </div>
            <div>
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal{{$user->id}}">
                Daftar jadi penulis
                </button>
            </div>

            <div class="modal fade" id="exampleModal{{$user->id}}" tabindex="-1" aria-labelledby="exampleModalLabel{{$user->id}}" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel{{$user->id}}">Daftar Author</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form method="post" action="{{ route('user.author', ['user' => $user->id]) }}" enctype="multipart/form-data">
                            @csrf
                            @method('put')
                            <div class="modal-body">
                                <label class="form-label mt-2">Masukkan Cv</label>
                                <input class="form-control" type="file" name="photo">
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-outline-primary">Daftar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="d-flex justify-content-center align-items-center">
                <div class="">
                    <img src="{{ asset( Auth::user()->photo ? 'storage/'.Auth::user()->photo : "default.png")  }}" width="120px" style="border-radius: 50%;"  alt="Image">
                </div>
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
                <h5>Info</h5>

                <h5>Info Dasar</h5>

            </div>
            <div class="row">
                <div class="col-md-12 col-lg-6 mt-3">
                    <label class="form-label" for="email">Nama</label>
                    <input id="name" type="text" placeholder="Nama" class="form-control form-control-lg @error('name') is-invalid @enderror" name="name" value="{{ $user->name }}" required autocomplete="name" readonly>

                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="col-md-12 col-lg-6 mt-3">
                    <label class="form-label" for="email">Password</label>
                    <input id="name" type="password" placeholder="Password" class="form-control form-control-lg @error('password') is-invalid @enderror" name="password" value="{{ $user->password }}" required autocomplete="password" readonly>

                    <label class="form-label" for="email">No Hp</label>
                    <input id="name" type="password" placeholder="Password" class="form-control form-control-lg @error('password') is-invalid @enderror" name="password" value="{{ old('password') }}" required autocomplete="password" autofocus>

                    <label class="form-label" for="email">Password</label>
                    <input id="name" type="password" placeholder="Password" class="form-control form-control-lg @error('password') is-invalid @enderror" name="password" value="{{ $user->password }}" required autocomplete="password" readonly>

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
                    <input id="name" type="email" placeholder="Email" class="form-control form-control-lg @error('name') is-invalid @enderror" name="name" value="{{ $user->email }}" required autocomplete="name" readonly>

                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="col-md-12 col-lg-6 mt-3">
                    <label class="form-label" for="nomor">No Hp</label>
                    <input id="name" type="text" placeholder="Nomor Hp" class="form-control form-control-lg @error('name') is-invalid @enderror" name="name" value="{{ $user->phone_number }}" required autocomplete="name" readonly>

                    <label class="form-label" for="password">Tanggql Lahir</label>
                    <input id="name" type="password" placeholder="Password Baru" class="form-control form-control-lg @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                    <label class="form-label" for="nomor">No Hp</label>
                    <input id="name" type="text" placeholder="Nomor Hp" class="form-control form-control-lg @error('name') is-invalid @enderror" name="name" value="{{ $user->phone_number }}" required autocomplete="name" readonly>

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
                    <textarea name="sinopsis" id="sinopsis" rows="8" class="form-control" value="{{ $user->address }}" readonly style="resize: none">{{ $user->address }}</textarea>
                </textarea>
                </div>
            </div>


            <div class="mt-4 d-flex justify-content-center align-items-center">

                <div class="">
                    <button class="btn btn-md text-black px-4 me-4" style="background-color: #D9D9D9; padding-left: 1.5rem; padding-right: 1.5rem;">Edit Profile</button>
                </div>
            </div>

        </div>
    </div>
@endsection

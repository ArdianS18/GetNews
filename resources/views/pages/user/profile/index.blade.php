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


{{-- <div class="modal fade" id="fotoUser" tabindex="-1" aria-labelledby="fotoUserLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="fotoUserLabel">Upload Foto</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="post" action="{{ route('photo.user', ['user' => $user->id ]) }}" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <label class="form-label mt-2">Masukkan Foto</label>
                    <input class="form-control" type="file" name="photo">
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-outline-primary">Ubah</button>
                </div>
            </form>
        </div>
    </div>
</div> --}}

    <div class="container p-1" >
        <div class="card-profile row">
            <div class="container">
                <div class="d-flex justify-content-between">
                    <div class="m-3 mt-4">
                        <h5>User</h5>
                    </div>
                    <div class="m-3 mt-4">
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal{{$user->id}}">
                            Daftar jadi penulis
                        </button>
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

                    <form  method="post" action="{{ route('photo.user', ['user' => $user->id ]) }}" id="upload-photo" enctype="multipart/form-data">
                        @csrf
                        <input type="file" style="display: none" name="photo" id="photo">
                        <ul class="error-text"></ul>
                        <button class="btn btn-sm text-white btn-upload" type="button"
                            id="btn-upload" style="background-color: #175A95; padding-left: 1.5rem; padding-right: 1.5rem;">Upload</button>
                        <button type="submit" style="display: none" id="submit-button">Save</button>
                    </form>

                    {{-- <button class="btn btn-sm text-white" data-bs-toggle="modal" data-bs-target="#fotoUser" style="background-color: #175A95; padding-left: 1.5rem; padding-right: 1.5rem;">Upload</button> --}}
                </div>
            </div>

            <div class="m-2 mb-5 d-flex justify-content-center align-items-center">

                <span style="color: #434343; font-size: ;">Dengan Format Jpg atau Png</span>
            </div>

        </div>

        <div class="mt-5 p-5 card-bio row">
            <div class="mb-3">
                <h5>Info profile</h5>

            </div>

            <div class="row justify-content-between mt-2">
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
                    <label class="form-label" for="email">Email</label>
                    <input id="name" type="email" placeholder="Email" class="form-control form-control-lg @error('name') is-invalid @enderror" name="name" value="{{ $user->email }}" required autocomplete="name" readonly>

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


            <div class="mt-4 d-flex justify-content-end">

                <div class="">
                    <button class="btn btn-md text-black px-4 me-4" style="background-color: #D9D9D9; padding-left: 1.5rem; padding-right: 1.5rem;">Edit Profile</button>
                </div>
            </div>

        </div>
    </div>
@endsection

@section('script')

<script>
    document.getElementById('btn-upload').addEventListener('click', function() {
        document.getElementById('photo').click();
    });

    document.getElementById('photo').addEventListener('change', function() {
        document.getElementById('submit-button').click();
    });
</script>

@endsection

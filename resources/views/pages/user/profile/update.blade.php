@extends('layouts.user.sidebar')

@section('style')
    <style>
        .card-profile{
            border: 1px solid #ddd;
            box-shadow: 0  5px 2px rgba(81, 81, 81, 0.1);
            border-radius: 10px;
            background-color: #fff;
        }
        .card-bio{
            border: 1px solid #ddd;
            box-shadow: 0  5px 2px rgba(81, 81, 81, 0.1);
            border-radius: 10px;
            background-color: #fff;
        }
        .top-right {
            position: absolute;
            top: 8px;
            right: 16px;
            margin-top: 70px;
        }        
    </style>
@endsection

@section('content')

    <div class="" >
        <div class="card-profile">
            <img src="{{asset('assets/img/profile-bg.svg')}}" width="100%" height="180px" style="border-radius: 10px 10px 0 0;" alt="" class="img-fluid">
            <div class="top-right">
                <button class="btn btn-sm px-4 py-1 text-white m-4" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal{{$user->id}}" style="background-color: #175A95;">Daftar Jadi Penulis</button>
            </div>
            <div class="row align-items-center">
              <div class="col-lg-12 mt-n3 order-lg-2">
                <div class="mt-n5">
                  <div class="d-flex align-items-center justify-content-center mb-2">
                    <div class=" d-flex align-items-center justify-content-center rounded-circle" style="width: 110px; height: 110px;";>
                      <div class="d-flex align-items-center justify-content-center rounded-circle overflow-hidden" style="width: 100px; height: 100px;";>
                        <img src="{{asset('assets/img/profile.svg')}}" alt="" class="w-100 h-100">
                      </div>
                    </div>
                  </div>
                  <div class="text-center">
                      <button class="btn btn-sm px-4 py-1 text-white mt-2" style="background-color: #175A95;">Upload</button>
                      <p class="mt-2">File dengan format Jpg atau Png </p>
                  </div>
                </div>
              </div>
            </div>

        </div>

        <div class="mt-4 p-5 card-bio">
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
                    <input id="name" type="password" placeholder="Password" class="form-control form-control-lg @error('password') is-invalid @enderror" name="password" value="" required autocomplete="password" autofocus>

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

            <div class="d-flex justify-content-end mb-5 mt-3">
                <button class="btn btn-lg px-5 py-2 text-black" style="background-color: #D9D9D9;">Kembali</button>
                <button class="btn btn-lg px-5 py-2 text-white ms-3" style="background-color: #175A95;">Simpan</button>
            </div>

        </div>
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
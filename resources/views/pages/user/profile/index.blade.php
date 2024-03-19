@extends('layouts.user.sidebar')

@section('style')
    <style>
        .card-profile{
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
<div class="">
    <div class="card-profile">
        <div class="card-body p-0">
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

          <div class="row mt-5 ps-5 pe-5">
            <div class="mb-4">
                <h5>Info Dasar</h5>
            </div>
           
            <div class="col-md-12 col-lg-6 mb-3">
                <label class="form-label" for="email">Nama</label>
                <input id="name" type="text" placeholder="" class="form-control form-control-lg @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="col-md-12 col-lg-6 mb-3">
                <label class="form-label" for="email">No Hp</label>
                <input id="name" type="text" placeholder="" class="form-control form-control-lg @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="col-md-12 col-lg-6 mb-3">
                <label class="form-label" for="email">Email</label>
                <input id="name" type="text" placeholder="" class="form-control form-control-lg @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="col-md-12 col-lg-6 mb-3">
                <label class="form-label" for="email">Password</label>
                <input id="name" type="password" placeholder="" class="form-control form-control-lg @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="col-md-12 col-lg-6 mb-3">
                <label class="form-label" for="email">Date</label>
                <input id="name" type="date" placeholder="" class="form-control form-control-lg @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="col-md-12 col-lg-12 mb-3">
                <label class="form-label" for="email">Alamat</label>
                <textarea name="alamat" class="form-control" id="" rows="7"></textarea>
            </div>
                  
            <div class="d-flex justify-content-end mb-5 mt-3">
                <button class="btn btn-lg px-4 py-2 text-black" style="background-color: #D9D9D9;">Edit Profile</button>
            </div>
           </div>
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

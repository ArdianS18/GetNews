@extends('layouts.user.sidebar')

@section('style')
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<link rel="stylesheet" href="{{ asset('assets/dist/imageuploadify.min.css') }}">

@endsection

@section('content')
<div class="card shadow-sm position-relative overflow-hidden"  style="background-color: #175A95;">
    <div class="card-body px-4 py-4">
      <div class="row justify-content-between">
        <div class="col-8 text-white">
          <h4 class="fw-semibold mb-3 mt-2 text-white">Pengisian Iklan</h4>
            <p>Layanan pengiklanan di getmedia.id</p>
        </div>
        <div class="col-3">
          <div class="text-center mb-n4">
            <img src="{{asset('assets/img/bg-ajuan.svg')}}" width="250px" alt="" class="img-fluid">
          </div>
        </div>
      </div>
    </div>
</div>


<div class="d-flex justify-content-between">
    <h5>Isi form dibawah ini untuk konten iklan</h5>

    <button class="btn btn-md text-white px-5" style="background-color: #175A95">
        Ajukan
    </button>
</div>

<div class="card mt-4 p-4 shadow-sm">
    <div class="row mt-3 mb-4">
        <div class="row col-lg-8 col-md-12 from-outline">
            <div class="col-lg-6 mb-4">
                <label class="form-label" for="nomor">Jenis Iklan</label>
                <input type="text" id="name" name="name" placeholder=""
                    value="{{ old('name') }}" class="form-control @error('name') is-invalid @enderror">
                @error('name')
                    <span class="invalid-feedback" role="alert" style="color: red;">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            
            <div class="col-lg-6 mb-4">
                <label class="form-label" for="nomor">Halaman</label>
                <input type="text" id="name" name="name" placeholder=""
                    value="{{ old('name') }}" class="form-control @error('name') is-invalid @enderror">
                @error('name')
                    <span class="invalid-feedback" role="alert" style="color: red;">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="col-lg-6 mb-4">
                <label class="form-label" for="nomor">Tanggal Awal</label>
                <input type="text" id="name" name="name" placeholder=""
                    value="{{ old('name') }}" class="form-control @error('name') is-invalid @enderror">
                @error('name')
                    <span class="invalid-feedback" role="alert" style="color: red;">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            
            <div class="col-lg-6 mb-4">
                <label class="form-label" for="nomor">Tanggal Akhir</label>
                <input type="text" id="name" name="name" placeholder=""
                    value="{{ old('name') }}" class="form-control @error('name') is-invalid @enderror">
                @error('name')
                    <span class="invalid-feedback" role="alert" style="color: red;">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="col-lg-12 mb-4">
                <label class="form-label" for="nomor">URL</label>
                <input type="text" id="name" name="name" placeholder=""
                    value="{{ old('name') }}" class="form-control @error('name') is-invalid @enderror">
                @error('name')
                    <span class="invalid-feedback" role="alert" style="color: red;">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="row col-lg-4">
            <div class="">
                <label class="form-label" for="password_confirmation">Multi Gambar (Optional)</label>
                <input type="file" id="image-uploadify" accept="image/*" name="multi_photo[]" multiple>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
    
<script src="{{ asset('assets/dist/imageuploadify.min.js') }}"></script>

<script>
    $(document).ready(function() {
        $('#image-uploadify').imageuploadify();
    })
</script>
@endsection
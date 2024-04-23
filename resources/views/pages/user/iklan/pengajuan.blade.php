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

<form action="{{route('advertisement.store')}}" method="post">
    @csrf
<div class="d-flex justify-content-between">
    <h5>Isi form dibawah ini untuk konten iklan</h5>

    <button type="submit" class="btn btn-md text-white px-5" style="background-color: #175A95">
        Ajukan
    </button>
</div>

<div class="card mt-4 p-4 pb-5 shadow-sm">
    <div class="row mt-3 mb-4">
        <div class="row col-lg-8 col-md-12 from-outline">
            <div class="col-lg-6 mb-4">
                <label class="form-label" for="type">Jenis Iklan</label>
                <select name="type" class="form-select" id="">
                    <option value="foto">Foto</option>
                    <option value="vidio">Vidio</option>
                </select>
            </div>
            
            <div class="col-lg-6 mb-4">
                <label class="form-label" for="page">Halaman</label>
                <select name="page" class="form-select" id="">
                    <option value="news_post">News Post</option>
                    <option value="sub_category">Sub Kategori</option>
                </select>
            </div>

            <div class="col-lg-6 mb-4">
                <label class="form-label" for="start_date">Tanggal Awal</label>
                <input type="date" id="start_date" name="start_date" placeholder=""
                    value="{{ old('start_date') }}" class="form-control @error('start_date') is-invalid @enderror">
                @error('start_date')
                    <span class="invalid-feedback" role="alert" style="color: red;">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            
            <div class="col-lg-6 mb-4">
                <label class="form-label" for="end_date">Tanggal Akhir</label>
                <input type="date" id="end_date" name="end_date" placeholder=""
                    value="{{ old('end_date') }}" class="form-control @error('end_date') is-invalid @enderror">
                @error('end_date')
                    <span class="invalid-feedback" role="alert" style="color: red;">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="col-lg-12 mb-4">
                <label class="form-label" for="url">URL</label>
                <input type="text" id="url" name="url" placeholder=""
                    value="{{ old('url') }}" class="form-control @error('url') is-invalid @enderror">
                @error('url')
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
</form>
@endsection

@section('script')
    
<script src="{{ asset('assets/dist/imageuploadify.min.js') }}"></script>

<script>
    $(document).ready(function() {
        $('#image-uploadify').imageuploadify();
    })
</script>
@endsection
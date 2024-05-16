@extends('layouts.admin.app')

@section('content')
<div class="card shadow-sm position-relative overflow-hidden" style="background-color: #175A95;">
    <div class="card-body px-4 py-4">
        <div class="row justify-content-between">
            <div class="col-8 text-white">
                <h4 class="fw-semibold mb-3 mt-2 text-white">Tentang Getmedia</h4>
                <p>Info dan Slogan yang akan tampil di footer</p>
            </div>
            <div class="col-3">
                <div class="text-center mb-n4">
                    <img src="{{ asset('assets/img/bg-ajuan.svg') }}" width="250px" alt="" class="img-fluid">
                </div>
            </div>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-body">
        <h4><span class="me-2" style="color: #175A95; font-size: 20px">|</span>Kontak</h4>

        <div class="row mt-5 mb-5">
            <div class="col-md-12 col-lg-6 mb-4">
                <label class="form-label" for="nomor">Logo</label>
                <input type="file" id="logo" name="logo" placeholder=""
                    value="{{ old('logo') }}" class="form-control @error('logo') is-invalid @enderror">
                @error('logo')
                    <span class="invalid-feedback" role="alert" style="color: red;">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="col-md-12 col-lg-6 mb-4">
                <label class="form-label" for="nomor">Slogan</label>
                <input type="text" id="slogan" name="slogan" placeholder=""
                    value="{{ old('slogan') }}" class="form-control @error('slogan') is-invalid @enderror">
                @error('slogan')
                    <span class="invalid-feedback" role="alert" style="color: red;">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="col-md-12 col-lg-6 mb-4">
                <label class="form-label" for="nomor">Alamat Email</label>
                <input type="text" id="email" name="email" placeholder=""
                    value="{{ old('email') }}" class="form-control @error('email') is-invalid @enderror">
                @error('email')
                    <span class="invalid-feedback" role="alert" style="color: red;">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="col-md-12 col-lg-6 mb-4">
                <label class="form-label" for="nomor">Nomor Telepon</label>
                <input type="text" id="nomor" name="nomor" placeholder=""
                    value="{{ old('nomor') }}" class="form-control @error('nomor') is-invalid @enderror">
                @error('nomor')
                    <span class="invalid-feedback" role="alert" style="color: red;">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            
        </div>

        <h4><span class="me-2" style="color: #175A95; font-size: 20px">|</span>Social Media</h4>

        <div class="row mt-5">
            <div class="col-md-12 col-lg-6 mb-4">
                <label class="form-label" for="nomor">Url Facebook</label>
                <input type="text" id="facebook" name="facebook" placeholder=""
                    value="{{ old('facebook') }}" class="form-control @error('facebook') is-invalid @enderror">
                @error('facebook')
                    <span class="invalid-feedback" role="alert" style="color: red;">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="col-md-12 col-lg-6 mb-4">
                <label class="form-label" for="nomor">Url Twitter</label>
                <input type="text" id="twitter" name="twitter" placeholder=""
                    value="{{ old('twitter') }}" class="form-control @error('twitter') is-invalid @enderror">
                @error('twitter')
                    <span class="invalid-feedback" role="alert" style="color: red;">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="col-md-12 col-lg-6 mb-4">
                <label class="form-label" for="nomor">Url Instagram</label>
                <input type="text" id="instagram" name="instagram" placeholder=""
                    value="{{ old('instagram') }}" class="form-control @error('instagram') is-invalid @enderror">
                @error('instagram')
                    <span class="invalid-feedback" role="alert" style="color: red;">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="col-md-12 col-lg-6 mb-4">
                <label class="form-label" for="nomor">Url Linkedin</label>
                <input type="text" id="linkedun" name="linkedun" placeholder=""
                    value="{{ old('linkedun') }}" class="form-control @error('linkedun') is-invalid @enderror">
                @error('linkedun')
                    <span class="invalid-feedback" role="alert" style="color: red;">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            
        </div>

        <div class="d-flex justify-content-end mt-4 mb-3">
            <button type="submit" class="btn btn-success">
                Simpan
            </button>
        </div>

    </div>
</div>

@endsection
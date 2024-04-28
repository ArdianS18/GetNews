@extends('layouts.user.sidebar')

@section('style')
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<link rel="stylesheet" href="{{ asset('assets/dist/imageuploadify.min.css') }}">

<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">

<link href="assets/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css" />
@endsection

@section('content')

  <div class="card shadow-sm position-relative overflow-hidden"  style="background-color: #175A95;">
    <div class="card-body px-4 py-4">
      <div class="row justify-content-between">
        <div class="col-8 text-white">
          <h4 class="fw-semibold mb-3 mt-2 text-white">Pengajuan Berita</h4>
            <p>Tuliskan beritamu di getmedia</p>
        </div>
        <div class="col-3">
          <div class="text-center mb-n4">
            <img src="{{asset('assets/img/bg-ajuan.svg')}}" width="250px" alt="" class="img-fluid">
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="ms-1">
    <h5>Baca ketentuan dan persyaratan sembelum mengunggah berita</h5>
    <button type="button" data-bs-toggle="modal" data-bs-target="#staticBackdrop"
        class="btn btn-sm text-black d-flex justify-content-start"
        style="padding-left: 1rem; padding-right: 1rem; background-color: #C9C9C9;">
        Ketentuan & Persyaratan
    </button>
  </div>

  <div class="ms-1 mt-5 d-flex justify-content-between">
    <h5>Isi form dibawah ini untuk mengunggah berita</h5>
  </div>

  <form id="myForm" method="post" action="{{ route('user.berita.store') }}" enctype="multipart/form-data">
    @csrf
    <div class="ms-1 mt-5 d-flex justify-content-between">
        <h5>Isi form dibawah ini untuk mengunggah berita</h5>

        <div class="">
            {{-- <button type="button" class="btn btn-md me-2 text-black"
                style="background-color: #C9C9C9;">
                Kembali
            </button> --}}
            <button type="submit" class="btn btn-md text-white" style="background-color: #0F4D8A;" id="submitButton1">
                Rilis
            </button>
        </div>
    </div>

    <div class="card p-4 shadow-sm border mt-1">
        <div style="padding: 1%;">
            <div class="row">
                <div class="col-lg-6">
                    <div class="row">
                        <div class="col-lg-12 mb-4">
                            <label class="form-label" for="nomor">Judul Berita</label>
                            <input type="text" id="name" name="name" placeholder="name"
                                value="{{ old('name') }}" class="form-control @error('name') is-invalid @enderror">
                            @error('name')
                                <span class="invalid-feedback" role="alert" style="color: red;">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="col-lg-12 mb-4">
                            <div class="">
                                <label class="form-label" for="password_confirmation">Kategori</label>
                                <select id="category_id"
                                    class="select2 form-control category @error('category') is-invalid @enderror"
                                    name="category[]" multiple="true" value="{{ old('category') }}"
                                    aria-label="Default select example">
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                                @error('category_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-12 mb-4">
                            <div class="mt-2" style="max-width: 100%;">
                                <label class="form-label" for="password_confirmation">Sub Kategori</label>
                                <select id="sub_category_id"
                                    class="form-control sub-category select2 @error('sub_category') is-invalid @enderror"
                                    name="sub_category[]" multiple="true" value="{{ old('sub_category') }}"
                                    aria-label="Default select example">
                                </select>
                                @error('sub_category_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-12 mb-4" style="height: auto;">
                            <label class="form-label" for="content">Content</label>
                            <textarea id="content" name="content" placeholder="content" value="{{ old('content') }}" class="form"></textarea>
                            @error('content')
                                <span class="invalid-feedback" role="alert" style="color: red;">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="row">
                        <div class="col-lg-12">
                            <label class="form-label" for="photo">Preview</label>
                            <div class="gambar-iklan mb-4">
                                <img id="preview" style="object-fit: cover;" width="230" height="120" alt="">
                            </div>

                            <div class="col-lg-12 mb-4">
                                <label class="form-label" for="photo">Thumbnail Berita</label>
                                <input type="file" id="photo" name="photo" onchange="previewImage(event)" placeholder="photo"
                                    value="{{ old('photo') }}"
                                    class="text-center form-control @error('photo') is-invalid @enderror">
                                @error('photo')
                                    <span class="invalid-feedback" role="alert" style="color: red;">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <label class="form-label" for="password_confirmation">Tanggal Upload</label>
                            <input type="date" id="upload_date" name="upload_date" placeholder="date"
                                value="{{ old('date') }}" class="form-control @error('date') is-invalid @enderror">
                            @error('date')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="col-lg-12 mb-4">
                            <label class="form-label" for="password_confirmation">Tags</label>
                            <select class="form-control select2 tags" name="tags[]" multiple="multiple">
                                <option disabled>pilih tags</option>
                                @foreach ($tags as $tag)
                                    <option value="{{ $tag->name }}">{{ $tag->name }}</option>
                                @endforeach
                            </select>
                        </div>

                            <div class="col-lg-12">
                                <label class="form-label" for="password_confirmation">Multi Gambar (Optional)</label>
                                <input type="file" id="image-uploadify" accept="image/*" name="multi_photo[]" multiple>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="d-flex">
            <button type="submit" class="btn btn-md text-white m-2" style="background-color: #1EBB9E;" id="submitButton2">
                Simpan Draf
            </button>
        </div>
    </div>
</form>
@endsection

@section('script')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#content').summernote({
                height: 250,
                toolbar: [
                    ['style', ['style']],
                    ['font', ['bold', 'underline', 'clear']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['table', ['table']],
                    ['insert', ['link', 'picture', 'video']],
                    ['view', ['fullscreen', 'codeview', 'help']]
                ]

            });
        });
    </script>

    <script src="{{ asset('assets/dist/imageuploadify.min.js') }}"></script>

    <script>
        $(document).ready(function() {
            $('#image-uploadify').imageuploadify();
        })

        $('.category').change(function() {
            getSubCategory($(this).val())
        })

        function getSubCategory(id) {
            $.ajax({
                url: "sub-category-detail/" + id,
                method: "GET",
                dataType: "JSON",
                beforeSend: function() {
                    $('.sub-category').html('')
                },
                success: function(response) {
                    $.each(response.data, function(index, data) {
                        $('.sub-category').append('<option value="' + data.id + '">' + data.name +
                            '</option>');
                    });
                }
            })
        }
        $(".tags").select2({
            tags: true,
            tokenSeparators: [',', ' ']
        })
        
        function previewImage(event) {
            var input = event.target;
            var reader = new FileReader();
            reader.onload = function () {
                var imgElement = document.getElementById("preview");
                imgElement.src = reader.result;
            };
            reader.readAsDataURL(input.files[0]);
        }
    </script>
@endsection

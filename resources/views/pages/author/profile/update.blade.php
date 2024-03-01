@extends('layouts.user.sidebar')

@section('content')


<head>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <link rel="stylesheet" href="{{ asset('assets/dist/imageuploadify.min.css') }}">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>

    <link href="assets/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css"/>
    <style>
        .news-card-a {
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        border: 1px solid #ddd;
        padding: 20px; /* Memberi ruang di sekitar elemen */
        margin-bottom: 20px; /* Memberi jarak antara elemen berikutnya */
        border-radius: 10px;
        }
        /* .card-dropzone{
        border: 3px dashed #ddd;
        padding: 30px;
        margin-bottom: 20px;
        border-radius: 10px;
        height: 250px;

        } */


        .dropzone {
            border: 2px dashed #ccc;
            padding: 30px;
            text-align: center;
            border-radius: 10px;
            height: 240px;
        }

        .dz-message {
            font-size: 1.5em;
            color: #555;
        }

        /* .dz-message span {
            display: block;
            margin-top: 10px;
            color: #777;
        } */

        .dz-preview {
            display: inline-block;
            margin: 6px;
            vertical-align: top;
        }

        .dz-preview .dz-image {
            border-radius: 10px;
            overflow: hidden;
        }

        .dz-preview .dz-image img {
            width: 100%;
            height: auto;
        }

        .dz-error-message {
            display: block;
            color: #ea2121;
            margin: 0.2em 0;
        }
  </style>
</head>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<div class="container" style="margin-top: 3%;">

    <h2 class="text-center">Tambah Berita</h2>
        <div class="news-card-a mt-5">
            <div class="container" style="padding: 3%;">
                <form method="post" action="{{ route('profile.berita.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="row justify-content-between">
                    <div class="col-lg-6 col-md-12 from-outline">
                        <label class="form-label" for="nomor">Judul Berita</label>
                        <input type="text" id="name" name="name" placeholder="name" value="{{ old('name') }}" class="form-control @error('name') is-invalid @enderror">
                        @error('name')
                        <span class="invalid-feedback" role="alert" style="color: red;">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="col-lg-6 col-md-12 from-outline">
                        <label class="form-label" for="photo">Thumbnail Berita</label>
                        <input type="file" id="photo" name="photo" placeholder="photo" value="{{ old('photo') }}" class="text-center form-control @error('photo') is-invalid @enderror">
                        @error('photo')
                        <span class="invalid-feedback" role="alert" style="color: red;">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    </div>

                    <div class="row justify-content-between mt-2">

                        <div class="col-lg-6 col-md-12 col-span-3 from-outline">
                            <label class="form-label" for="email">Sinopsis berita</label>
                            <textarea name="sinopsis" id="sinopsis" rows="7" value="{{ old('sinopsis') }}"></textarea>
                            @error('sinopsis')
                            <span class="invalid-feedback" role="alert" style="color: red;">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="col-lg-6 col-md-12 row-span-1 from-outline">

                            <div class="">
                                <label class="form-label" for="password_confirmation">Tags</label>
                                <input type="text" id="tags" name="tags" placeholder="tags" value="{{ old('tags') }}" class="form-control @error('tags') is-invalid @enderror">
                                @error('tags')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{$message}}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="mt-2">
                                <label class="form-label" for="password_confirmation">Kategori</label>
                                <select class="form-control @error('category_id') is-invalid @enderror" name="category_id" value="{{ old('category_id')}}" aria-label="Default select example">
                                    <option selected>pilih kategori</option>
                                    @foreach ($categories as $category)
                                        <option value="{{$category->id}}">{{$category->name}}</option>
                                    @endforeach
                                </select>
                                @error('category_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{$message}}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="mt-2">
                                <label class="form-label" for="password_confirmation">Tanggal Upload</label>
                                <input type="date" id="upload_date" name="upload_date" placeholder="date" value="{{ old('date') }}" class="form-control @error('date') is-invalid @enderror">
                                @error('date')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{$message}}</strong>
                                </span>
                                @enderror
                            </div>

                        </div>
                    </div>

                    <div class="row justify-content-between mt-2">

                        <div class="col-lg-6 col-md-12 col-span-2 from-outline" style="height: 200px;">
                            <label class="form-label" for="content">Content</label>
                            <textarea id="content" name="content" placeholder="content"
                            value="{{ old('content') }}"  class="form @error('content') is-invalid @enderror"></textarea>
                            @error('content')
                            <span class="invalid-feedback" role="alert" style="color: red;">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>


                        <div class="col-lg-6 col-md-12 row-span-1 from-outline">

                            <div class="">
                                <label class="form-label" for="password_confirmation">Sub Kategori</label>
                                <select class="form-select @error('sub_category_id') is-invalid @enderror" name="sub_category_id" value="{{ old('sub_category_id')}}" aria-label="Default select example">
                                    <option selected>pilih sub kategori</option>
                                    @foreach ($subCategories as $subCategory)
                                        <option value="{{$subCategory->id}}">{{$subCategory->name}}</option>
                                    @endforeach
                                </select>
                                @error('sub_category_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{$message}}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="mt-2">
                                <label class="form-label" for="password_confirmation">Multi Gambar (Optional)</label>
                                <input type="file" id="image-uploadify" name="multi_photo[]" accept="image/*" multiple>
                                <input type="hidden" name="news_id" value="64116f4f-7829-3442-a8c2-045d96fe6d85">
                            </div>

                        </div>

                        <div class="d-flex justify-content-between">


                            <button type="submit" class="btn btn-md text-black m-2" style="padding-left: 1rem; padding-right: 1rem; background-color: #C9C9C9;">
                                Kembali
                            </button>

                            <div class="">

                                <button type="submit" class="btn btn-md text-black m-2 justify-content-end" style="padding-left: 1rem; padding-right: 1rem; background-color: #C9C9C9;">
                                        Ketentuan
                                </button>

                                <button type="submit" class="btn btn-md text-white m-2 justify-content-end" style="padding-left: 1rem; padding-right: 1rem; background-color: #0F4D8A;">
                                    Upload
                                </button>
                            </div>
                        </div>
                        </div>
                </form>
            </div>
        </div>
</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/  .bundle.min.js" integnrity="sha384-pzjw8V+VbWFr6J3QKZZxCpZ8F+3t4zH1t03eNV6zEYl5S+XnvLx6D5IT00jM2JpL" crossorigin="anonymous"></script>
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

<script src="{{ asset('assets/dist/imageuploadify.min.js')}}"></script>

<script>
    $(document).ready(function() {
        $('#image-uploadify').imageuploadify();
    })
   </script>



@endsection

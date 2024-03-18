@extends('layouts.author.sidebar')
@section('style')
<link rel="stylesheet" href="{{ asset('assets/dist/imageuploadify.min.css') }}">

<link rel="stylesheet" href="{{ asset('admin/dist/libs/summernote/dist/summernote-lite.min.css') }}">

<link href="assets/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css" />
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
@endsection
@section('content')

<div class="container" style="margin-top: 3%;">
    <h2 class="text-center">Update Berita</h2>
        <div class="news-card-a mt-5">
            <div class="container" style="padding: 3%;">
                <form method="post" action="{{ route('profile.berita.updated', ['news' => $news->id]) }}" enctype="multipart/form-data">
                    @method('put')
                    @csrf
                    <div class="row justify-content-between">
                    <div class="col-lg-6 col-md-12 from-outline">
                        <label class="form-label" for="nomor">Judul Berita</label>
                        <input type="text" id="name" name="name" placeholder="name" value="{{ $news->name }}" class="form-control @error('name') is-invalid @enderror">
                        @error('name')
                        <span class="invalid-feedback" role="alert" style="color: red;">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="col-lg-6 col-md-12 from-outline">
                        <label class="form-label" for="photo">Thumbnail Berita</label>
                        <input type="file" id="photo" name="photo" placeholder="photo" value="{{ $news->photo }}" class="text-center form-control @error('photo') is-invalid @enderror">
                        @error('photo')
                        <span class="invalid-feedback" role="alert" style="color: red;">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    </div>

                    <div class="row justify-content-between mt-2">

                        <div class="col-lg-6 col-md-12 row-span-1 from-outline">

                            <div class="">
                                <label class="form-label" for="password_confirmation">Tags</label>
                                <input type="text" id="tags" name="tags" placeholder="tags" value="{{ $news->tags }}" class="form-control @error('tags') is-invalid @enderror">
                                @error('tags')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{$message}}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="mt-2">
                                <label class="form-label" for="password_confirmation">Kategori</label>
                                <select class="form-control select2 @error('category_id') is-invalid @enderror" name="category_id" multiple="true" aria-label="Default select example">
                                    <option>pilih kategori</option>
                                    <option value="{{ $news->category->id }}" selected>{{ $news->category->name }}</option>
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
                                <input type="date" id="upload_date" name="upload_date" placeholder="date" value="{{ $news->upload_date }}" class="form-control @error('date') is-invalid @enderror">
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
                            value="{{ $news->content }}"  class="form summernote @error('content') is-invalid @enderror">{{$news->content}}</textarea>
                            @error('content')
                            <span class="invalid-feedback" role="alert" style="color: red;">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>


                        <div class="col-lg-6 col-md-12 row-span-1 from-outline">

                            <div class="">
                                <label class="form-label" for="password_confirmation">Sub Kategori</label>
                                <select class="form-select select2 @error('sub_category_id') is-invalid @enderror" name="sub_category_id" multiple="true" value="{{ $news->subCategory->id }}" aria-label="Default select example">
                                    <option>pilih sub kategori</option>
                                    <option value="{{ $news->subCategory->id }}" selected>{{ $news->subCategory->name }}</option>
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
                                @foreach ($newsPhoto as $photo)
                                    <img width="100px" src="{{ asset('storage/' . $photo->multi_photo) }}" alt="{{ $photo->multi_photo }}">
                                @endforeach
                            </div>

                        </div>

                        <div class="d-flex justify-content-between">


                            <a href="{{ route('profile-status.author') }}" class="btn btn-md text-black m-2" style="padding-left: 1rem; padding-right: 1rem; background-color: #C9C9C9;">Kembali</a>

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




@endsection

@section('script')

<script src="{{ asset('admin/dist/libs/summernote/dist/summernote-lite.min.js') }}"></script>


<script>
    $(document).ready(function() {
        /************************************/
      $(".summernote").summernote({
        height: 350,
        minHeight: null, 
        maxHeight: null, 
        focus: false, 
      });
      $(".inline-editor").summernote({
        airMode: false,
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

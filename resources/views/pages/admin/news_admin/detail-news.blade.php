@extends('layouts.admin.app')
@php
    $dateParts = date_parse($news->upload_date);
@endphp

@section('style')
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <link rel="stylesheet" href="{{ asset('assets/dist/imageuploadify.min.css') }}">

    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">

    <link href="assets/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css" />
    {{-- <style>
        .news-card-a {
            border: 1px solid #ddd;
            margin-bottom: 20px;
            border-radius: 10px;
            background-color: #fff;
        }
    </style> --}}
@endsection

<head>
    <title>Admin | News-Detail</title>
</head>

@section('content')
    <div>

        <div>
            <div class="px-4 py-3 border-bottom">
                <h5 class="card-title fw-semibold mb-0 lh-sm">Detail Berita</h5>
            </div>

            <div class="d-flex justify-content-between mt-4 ms-4 me-4">
                <div class="d-flex justify-content-start gap-2">

                    @if ($news->status === 'panding')
                        <div>
                            @if ($news->status === "panding")
                            <div>
                                <div class="d-flex gap-2 mb-3">
                                <a href="/news-list" class="btn btn-lg px-3 text-white" style="background-color: #5D87FF;">Kembali</a>
                                </div>
                            </div>
                            @else
                            <div>
                                <div class="d-flex gap-2 mb-3">
                                <a href="/news-approved-list" class="btn btn-lg px-3 text-white" style="background-color: #5D87FF;">Kembali</a>
                                </div>
                            </div>
                            @endif
                        </div>
                    @else
                        <div>
                            <div class="d-flex gap-2 mb-3">
                            <a href="/news-approved-list" class="btn btn-lg px-3 text-white"
                                style="background-color: #5D87FF;">Kembali</a>
                            </div>
                        </div>
                    @endif
                </div>

                <div class="d-flex gap-2">
                    <div class="">
                        <a href="{{ route('news.user',  ['news' => $news->slug,'year'=> $dateParts['year'],'month'=>$dateParts['month'],'day'=> $dateParts['day'] ]) }}" class="btn btn-warning btn-lg px-3">Preview</a>
                    </div>
                    @if ($news->status === 'panding')
                        <div class="d-flex gap-2">
                            <div class="">
                            <a class="btn btn-danger btn-lg px-3 btn-reject" id="btn-reject-{{ $news->id }}">Tolak</a>
                            </div>
                            <form action="{{ route('approved.news.admin', ['news' => $news->id]) }}" method="post">
                                @method('patch')
                                @csrf
                                <button type="submit" class="btn btn-success btn-lg px-3">Terima</button>
                            </form>

                        </div>
                    @else
                        <div>
                            <a href="{{ route('news.option.editor', ['news' => $news->id]) }}"
                                class="btn btn-lg px-3 btn-{{ $news->is_primary ? 'danger' : 'primary' }}">
                                <div class="d-flex gap-2">
                                    @if ($news->is_primary)
                                        <i><svg xmlns="http://www.w3.org/2000/svg" width="23" height="23" viewBox="0 0 24 24"><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m3 3l18 18M15 4.5l-3.249 3.249m-2.57 1.433L7 10l-1.5 1.5l7 7L14 17l.82-2.186m1.43-2.563L19.5 9M9 15l-4.5 4.5M14.5 4L20 9.5"/></svg></i>
                                        Hapus Pin
                                    @else
                                        <i><svg xmlns="http://www.w3.org/2000/svg" width="23" height="23" viewBox="0 0 24 24">
                                                <path fill="currentColor" fill-rule="evenodd"
                                                    d="M16 9V4h2V2H6v2h2v5c0 1.66-1.34 3-3 3v2h5.97v7l1 1l1-1v-7H19v-2c-1.66 0-3-1.34-3-3" />
                                            </svg></i>
                                        Pin Berita
                                    @endif
                                </div>
                            </a>
                        </div>
                    @endif
                </div>
            </div>

                <form id="myForm" method="post" action="{{ route('profile.berita.updated', ['news' => $news->id]) }}" enctype="multipart/form-data">
                    @method('put')
                    @csrf
                    <div class="container p-4">
                        <div class="">
                            <div class="row">
                                <div class="col-12 col-md-6 col-lg-5">
                                    <div class="card">
                                        <div class="card-body">
                                            <h3 for="" class="form-label">Thumbnail</h3>

                                            <div class="gambar-iklan mb-4 d-flex justify-content-center">
                                                <img id="preview" class="hide" style="object-fit: cover; border: transparent;"
                                                    width="350" height="200" alt="">
                                                <img width="350" height="200" src="{{ asset( $news->photo ? 'storage/'.$news->photo : "")  }}" alt="">

                                            </div>
                                            @if ($news->user->roles->pluck('name')[0] == "admin")
                                                <div class="d-flex justify-content-center mt-3">
                                                    <label for="image-upload" class="btn btn-primary @error('photo') is-invalid @enderror">
                                                        Unggah
                                                    </label>
                                                    <input type="file" name="photo" id="image-upload" class="hide"
                                                        onchange="previewImage(event)">
                                                </div>
                                                <div class="d-flex justify-content-center">
                                                    <p class="text-muted mt-3">File dengan format Jpg atau Png </p>
                                                </div>
                                            @endif

                                            @error('photo')
                                                <span class="invalid-feedback" role="alert" style="color: red;">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror

                                        </div>
                                    </div>
                                    <div class="card">
                                        <div class="card-body">
                                            <h3 class="mb-3">Detail Lainya</h3>
                                            <div class="col-lg-12 mb-4">
                                                <label class="form-label" for="password_confirmation">Penulis</label>
                                                <input type="text" class="form-control" value="{{ $news->user->name }}" readonly>
                                                @error('category')
                                                    <span class="invalid-feedback" role="alert" style="color: red">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="col-lg-12 mb-4">
                                                <label class="form-label" for="password_confirmation">Kategori</label>

                                                <select id="category_id"
                                                    class="select2 form-control category @error('category') is-invalid @enderror"
                                                    name="category[]" multiple="true" value="" aria-label="Default select example">
                                                    <option>pilih kategori</option>
                                                    @foreach ($categories as $category)
                                                        <option value="{{ $category->id }}"
                                                            {{ $newsCategories->contains('category_id', $category->id) ? 'selected' : '' }}>
                                                            {{ $category->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                @error('category')
                                                    <span class="invalid-feedback" role="alert" style="color: red">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="col-lg-12 mb-4">
                                                <div class="mt-2" style="max-width: 100%;">
                                                    <label class="form-label" for="password_confirmation">Sub Kategori</label>

                                                    <select id="sub_category_id"
                                                        class="form-control sub-category select2 @error('sub_category') is-invalid @enderror"
                                                        name="sub_category[]" multiple="true" value="" aria-label="Default select example">
                                                        <option>pilih sub kategori</option>
                                                        @foreach ($subCategories as $subCategory)
                                                            <option value="{{ $subCategory->id }}"
                                                                {{ $newsSubCategories->contains('sub_category_id', $subCategory->id) ? 'selected' : '' }}>
                                                                {{ $subCategory->name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                    @error('sub_category')
                                                        <span class="invalid-feedback" role="alert" style="color: red">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-lg-12 mb-4">
                                                <label class="form-label" for="password_confirmation">Tanggal Upload</label>
                                                <input type="datetime-local" id="upload_date" name="upload_date"
                                                    placeholder="date" value="{{ $news->upload_date }}"
                                                    class="form-control @error('upload_date') is-invalid @enderror">
                                                @error('upload_date')
                                                    <span class="invalid-feedback" role="alert" style="color: red">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="col-lg-12 mb-3">
                                                <label class="form-label" for="password_confirmation">Tags</label>

                                                <select class="form-control select2 tags" name="tags[]" multiple="multiple">
                                                    <option>pilih tags</option>
                                                    @foreach ($tags as $tag)
                                                        <option value="{{ $tag->name }}" {{ $newsTags->contains('tag_id', $tag->id) ? 'selected' : '' }}>
                                                            {{ $tag->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                @error('tags')
                                                    <span class="invalid-feedback" role="alert" style="color: red;">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6 col-lg-7">
                                    <div class="card">
                                        <div class="card-body">
                                            <h3 class="mb-3">Isi Berita</h3>
                                            <div>
                                                <div class="col-lg-12 mb-4">
                                                    <label class="form-label" for="nomor">Judul Berita</label>
                                                    <input type="text" id="name" name="name" placeholder="name"
                                                        value="{{ $news->name }}" class="form-control @error('name') is-invalid @enderror">
                                                    @error('name')
                                                        <span class="invalid-feedback" role="alert" style="color: red;">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                                <div class="col-lg-12 mb-4" style="height: auto;">
                                                    <label class="form-label" for="content">Isi Berita</label>
                                                    <textarea id="content" name="content" placeholder="content" value="{{ $news->content }}" style="resize: none; height: 400;" class="form @error('content') is-invalid @enderror">{{ $news->content }}</textarea>
                                                    @error('content')
                                                        <span class="invalid-feedback" role="alert" style="color: red;">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-success">Simpan</button>
                        </div>
                    </div>
                </form>
        </div>
    </div>
    </div>
    </div>
    </div>

    <div class="modal fade" id="modal-reject" tabindex="-1" aria-labelledby="modal-reject Label">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <!-- Modal content -->
                <div class="modal-header">
                    <h3 class="modal-title ms-2 mt-2">Tolak Berita Ini?</h3>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <!-- Modal body -->
                <div class="modal-body">
                    <form action="{{ route('reject-news', ['news' => $news->id])}}" method="POST">
                        @csrf
                        @method('patch')
                        <div class="container">
                            <div class="mb-3">
                                <div>
                                    <h5 class="mb-3">Berikan Alasan</h5>
                                </div>
                                <div>
                                    <textarea class="form-control" name="massage" id="" cols="30" rows="10"
                                    placeholder="Berita yang ditulis ada unsur penghinaan pihak tertentu" style="resize: none;"></textarea>
                                </div>
                            </div>

                            <div class="col-md-12 col-lg-12">
                                <div class="d-flex justify-content-end">
                                    <button data-bs-toggle="tooltip" title="Tolak" class="btn btn-danger me-2">Tolak</button>
                                    <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Batal</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    <script>

$(document).ready(function() {
            $('#content').summernote({
                height: 520,
                toolbar: [
                    ['style', ['style']],
                    ['font', ['bold', 'italic', 'underline', 'strikethrough', 'clear']],
                    ['fontsize', ['fontsize']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph', 'height']],
                    ['table', ['table']],
                    ['link', ['link']],
                    ['picture', ['picture']],
                    ['video', ['video']],
                    ['codeview', ['codeview']],
                    ['help', ['help']],
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

        var today = new Date();
        var year = today.getFullYear();
        var month = ('0' + (today.getMonth() + 1)).slice(-2);
        var day = ('0' + today.getDate()).slice(-2);
        var hours = ('0' + today.getHours()).slice(-2);
        var minutes = ('0' + today.getMinutes()).slice(-2);

        var formattedDate = year + '-' + month + '-' + day + 'T' + hours + ':' + minutes;
        document.getElementById('upload_date').value = formattedDate;

        function previewImage(event) {
            var input = event.target;
            var previewImg = document.getElementById('preview');
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    previewImg.src = e.target.result;
                    previewImg.classList.remove('hide');
                }
                reader.readAsDataURL(input.files[0]);
            } else {
                previewImg.src = '';
                previewImg.classList.add('hide');
            }
        }

    </script>

    <script>
        $(".tags").select2({
            tags: true,
            tokenSeparators: [',', ' ']
        })
    </script>

    <script>
        $('.btn-reject').click(function() {
            const formData = getDataAttributes($(this).attr('id'))
            $('#detail-synopsis').html(formData['synopsis'])
            handleDetail(formData)
            $('#modal-reject').modal('show')
        })
    </script>
@endsection

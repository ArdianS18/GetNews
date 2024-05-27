@extends('layouts.author.sidebar')

@section('style')
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <link rel="stylesheet" href="{{ asset('assets/dist/imageuploadify.min.css') }}">

    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">

    <link href="assets/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css" />
    <style>
        .tag {
            display: inline-block;
            background-color: #183249;
            color: white;
            padding: 5px 10px;
            margin: 3px;
            border-radius: 5px;
        }
    </style>
@endsection

<head>
    <title>Admin | News-Detail</title>
</head>

@section('content')
    <div class="container" style="margin-top: 3%;">
            <div class="card border border-1 shadow-sm mt-5" style="background-color: #FFFFFF">
                <div class="px-4 py-3 border-bottom">
                    <h5 class="card-title fw-semibold mb-0 lh-sm">Detail Berita</h5>
                </div>

                <div class="d-flex justify-content-between mt-4 ms-4 me-4">

                    <div class="d-flex justify-content-start gap-2">
                        @if ( $news->status === "active")
                            <div>
                                <a href="/mynews" class="btn btn-lg px-3 text-white"
                                    style="background-color: #5D87FF;">Kembali</a>
                            </div>
                        @else
                            <div>
                                <a href="/status-author" class="btn btn-lg px-3 text-white"
                                    style="background-color: #5D87FF;">Kembali</a>
                            </div>
                        @endif
                    </div>
                </div>

                <div class="container p-4">

                    <div class="card border shadow-none p-3">
                        <div class="row justify-content-between mt-2">

                            <div class="col-lg-12 col-md-12 from-outline mt-2">
                                <label class="form-label" for="photo">Thumbnail Berita</label>
                                <div>
                                    <img width="350px" src="{{ asset('storage/' . $news->photo) }}">
                                </div>
                            </div>

                            <div class="col-lg-12 col-md-12 row-span-1 from-outline mt-5">
                                <div class="mt-2">
                                    <label class="form-label" for="password_confirmation">Multi Gambar</label>
                                    <div class="d-flex gap-2">
                                        @foreach ($newsPhoto as $photo)
                                            <img width="320 px" src="{{ asset('storage/' . $photo->multi_photo) }}"
                                                alt="{{ $photo->multi_photo }}">
                                        @endforeach
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-6 col-md-12 from-outline mt-4">
                                <label class="form-label">Judul Berita</label>
                                {{-- <input type="text" name="name" class="form-control" value="{{ $news->name }}"> --}}
                                <h5>{{ $news->name }}</h5>
                            </div>
                            <div class="col-lg-6 col-md-12 from-outline mt-4">
                                <label class="form-label">Penulis</label>
                                <h5>{{ $news->user->name }}</h5>
                            </div>
                            <div class="col-lg-6 col-md-12 from-outline mt-2">
                                <label class="form-label">Tanggal Upload</label>
                                <h5>{{ $news->upload_date }}</h5>
                            </div>
                            <div class="col-lg-6 col-md-12 from-outline mt-2">
                                <label class="form-label" for="password_confirmation">Tags</label>
                                <div class="tags-container">
                                    @foreach ($newsTags as $newsTag)
                                    <p class="tag">
                                        {{ $newsTag->tag->name }}
                                    </p>
                                    @endforeach
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-12 from-outline mt-2">
                                <label class="form-label" for="password_confirmation">Kategori</label>
                                <div class="kat-container">
                                    @foreach ($newsCategories as $category)
                                    <p class="tag">
                                        {{$category->category->name}}
                                    </p>
                                    @endforeach
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-12 from-outline mt-2">
                                <label class="form-label" for="password_confirmation">Sub Kategori</label>
                                <div class="sub-container">
                                    @foreach ($newsSubCategories as $subCategory)
                                    <p class="tag">
                                        {{$subCategory->subCategory->name}}
                                    </p>
                                    @endforeach
                                </div>
                            </div>
                        </div>

                        <div class="row justify-content-between mt-2">
                            <div class="">
                                <label class="form-label">Isi Berita</label>
                              {!! $news->content !!}
                            </div>
                        </div>
                    </div>
                </div>
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
                height: 400,
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

@extends('layouts.admin.app')

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
    <div class="container" style="margin-top: 3%;">


        <div class="card border border-1 shadow-sm mt-5" style="background-color: #FFFFFF">
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
                                <a href="{{ route('approved-news.index') }}" class="btn btn-lg px-3 text-white" style="background-color: #5D87FF;">Kembali</a>
                                
                                    <a class="btn btn-warning btn-lg" id="clickEdit" onclick="edit()">Edit</a>
                                    <a class="btn btn-success btn-lg" id="clickSave" onclick="save()">Save</a>
                                </div>
                            </div>
                            @else
                            <div>
                                <div class="d-flex gap-2 mb-3">
                                <a href="news-approved-list" class="btn btn-lg px-3 text-white" style="background-color: #5D87FF;">Kembali</a>
                                    <a class="btn btn-warning btn-lg" id="clickEdit" onclick="edit()">Edit</a>
                                    <a class="btn btn-success btn-lg" id="clickSave" onclick="save()">Save</a>
                                </div>
                            </div>
                            @endif
                        </div>
                    @else
                        <div>
                            <div class="d-flex gap-2 mb-3">
                            <a href="{{ route('list.approved.index') }}" class="btn btn-lg px-3 text-white"
                                style="background-color: #5D87FF;">Kembali</a>
                                    <a class="btn btn-warning btn-lg" id="clickEdit" onclick="edit()">Edit</a>
                                    <a class="btn btn-success btn-lg" id="clickSave" onclick="save()">Simpan</a>
                            </div>
                        </div>
                    @endif
                </div>

                <div class="d-flex gap-2">
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
                                class="btn btn-lg px-3 btn-{{ $news->is_primary ? 'primary' : 'dark' }}">
                                <div class="d-flex gap-2">
                                    {{ $news->is_primary ? '' : '' }} <i><svg xmlns="http://www.w3.org/2000/svg"
                                            width="23" height="23" viewBox="0 0 24 24">
                                            <path fill="currentColor" fill-rule="evenodd"
                                                d="M16 9V4h2V2H6v2h2v5c0 1.66-1.34 3-3 3v2h5.97v7l1 1l1-1v-7H19v-2c-1.66 0-3-1.34-3-3" />
                                        </svg></i>
                                    Pin Berita
                                </div>
                            </a>
                        </div>
                    @endif
                </div>
            </div>

                <form method="post" action="{{ route('profile.berita.updated', ['news' => $news->id]) }}" enctype="multipart/form-data">
                    @method('put')
                    @csrf

                    <div class="container p-4">

                        <div class="card border shadow-none p-3">
                            <div class="row justify-content-between mt-2">

                                <div class="col-lg-12 col-md-12 from-outline mt-2">
                                    <label class="form-label" for="photo">Thumbnail Berita</label>
                                    <div>
                                        <img width="350px" src="{{ asset('storage/' . $news->photo) }}">
                                    </div>
                                </div>

                                <div class="col-lg-6 col-md-12 from-outline mt-2">
                                    <label class="form-label" for="nomor">Judul Berita</label>
                                    <input type="text" name="name" class="form-control" value="{{ $news->name }}">
                                </div>
                                <div class="col-lg-6 col-md-12 from-outline mt-2">
                                    <label class="form-label" for="nomor">Penulis</label>
                                    <input type="text" class="form-control"
                                        value="{{ $news->user->name }}" readonly>
                                </div>
                                <div class="col-lg-6 col-md-12 from-outline mt-2">
                                    <label class="form-label" for="password_confirmation">Tanggal Upload</label>
                                    <input type="date" name="upload_date" class="form-control" value="{{ $news->upload_date }}">
                                </div>
                                <div class="col-lg-6 col-md-12 from-outline mt-2">
                                    <label class="form-label" for="password_confirmation">Tags</label>
                                    <select class="form-control select2 tags" name="tags[]" multiple="multiple">
                                        <option>pilih tags</option>
                                        @foreach ($tags as $tag)
                                            <option value="{{ $tag->name }}"
                                                {{ $newsTags->contains('tag_id', $tag->id) ? 'selected' : '' }}>
                                                {{ $tag->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-lg-6 col-md-12 from-outline mt-2">
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
                                </div>
                                <div class="col-lg-6 col-md-12 from-outline mt-2">
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
                                </div>
                            </div>

                            <div class="row justify-content-between mt-2">
                                <div class="">
                                    <label class="form-label" for="content">Isi Berita</label>
                                    <textarea class="form-control" name="content" rows="10" value="{{ old('content') }}" id="content" style="resize: none; height: 400;">{!! $news->content !!}</textarea>
                                </div>

                                <div class="justify-content-start mt-2">
                                </div>
                            </div>
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

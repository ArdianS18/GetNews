@extends('layouts.author.sidebar')

@section('style')
    <link href="assets/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="{{ asset('admin/dist/libs/summernote/dist/summernote-lite.min.css') }}">

    <style>
        .news-card-a {
            box-shadow: 0 5px 2px rgba(0, 0, 0, 0.1);
            border: 1px solid #ddd;
            padding: 20px;
            margin-bottom: 20px;
            border-radius: 10px;
            background-color: #fff;
        }
    </style>
@endsection
@section('content')
<div class="card shadow-sm position-relative overflow-hidden"  style="background-color: #175A95;">
    <div class="card-body px-4 py-4">
      <div class="row justify-content-between">
        <div class="col-8 text-white">
          <h4 class="fw-semibold mb-3 mt-2 text-white">Pengisian Berita</h4>
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

    <h5>Baca ketentuan dan persyaratan sembelum mengunggah berita</h5>
    <button type="button" data-bs-toggle="modal" data-bs-target="#staticBackdrop"
        class="btn btn-sm text-black d-flex justify-content-start"
        style="padding-left: 1rem; padding-right: 1rem; background-color: #C9C9C9;">
        Ketentuan & Persyaratan
    </button>

<form id="myForm" method="post" action="{{ route('profile.berita.updated', ['news' => $news->id]) }}" enctype="multipart/form-data">
    @method('put')
    @csrf

    <div class="ms-1 mt-5 d-flex justify-content-between">
        <h5>Isi form dibawah ini untuk mengunggah berita</h5>
    </div>

    <div class="row">
        <div class="col-12 col-md-6 col-lg-5">
            <div class="card">
                <div class="card-body">
                    <h3 for="" class="form-label">Thumbnail</h3>

                    <div class="gambar-iklan mb-4 d-flex justify-content-center">
                        <img id="preview" src="{{ asset('storage/'.$news->photo) }}" style="object-fit: cover; border: transparent;"
                            width="350" height="200" alt="">
                    </div>
                    <div class="d-flex justify-content-center mt-3">
                        <label for="image-upload" class="btn btn-primary @error('photo') is-invalid @enderror">
                            Unggah
                        </label>
                        <input type="file" name="photo" id="image-upload" class="hide" value="{{ $news->photo }}"
                            onchange="previewImage(event)">
                    </div>
                    <div class="d-flex justify-content-center">
                        <p class="text-muted mt-3">File dengan format Jpg atau Png </p>
                    </div>

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
                        <label class="form-label" for="password_confirmation">Kategori</label>
                        <select id="category_id"
                            class="select2 form-control category @error('category') is-invalid @enderror"
                            name="category[]" multiple value="{{ $news->newsCategories->category_id }}"
                            aria-label="Default select example">
                            <option>pilih kategori</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}" {{ $news->newsCategories>contains('category_id', $category->id) ? 'selected' : '' }}>
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
                                name="sub_category[]" multiple="true" aria-label="Default select example">
                                @if ($subCategories != null)
                                    <option >pilih sub kategori</option>
                                    @foreach ($subCategories as $subCategory)
                                    <option value="{{ $subCategory->id }}" {{ $newsSubCategory->contains('sub_category_id', $subCategory->id) ? 'selected' : '' }}>
                                        {{ $subCategory->name }}
                                    </option>
                                    @endforeach
                                @endif

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
                            placeholder="'date'" value="{{ $news->upload_date }}"
                            class="form-control @error('upload_date') is-invalid @enderror">
                        @error('upload_date')
                            <span class="invalid-feedback" role="alert" style="color: red">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-lg-12 mb-3">
                        <label class="form-label" for="password_confirmation">Tags</label>
                        <select class="form-control  @error('tag') is-invalid @enderror select2 tags" name="tag[]" multiple="multiple" value="">
                            <option>pilih tags</option>

                            @foreach ($tags as $tag)
                            <option value="{{ $tag->name }}" {{ $newsTags->pluck('tag_id')->contains($tag->id) ? 'selected' : '' }}>
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
                            <textarea id="content" name="content" placeholder="content" value="{{ $news->content }}" class="form  @error('content') is-invalid @enderror">{{ $news->content }}</textarea>
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

    <div class="d-flex justify-content-between">
        <div>
            <button type="submit" class="btn btn-md text-white m-2" style="background-color: #1EBB9E;"
                id="submitButton2">
                Simpan Draf
            </button>
        </div>
        <div class="d-flex">
            <button type="reset" class="btn btn-danger m-2">
                Batal
            </button>
            @if ($news->status == "draft")
                <button type="submit" class="btn btn-primary m-2" id="submitButton1">
                    Rilis & Update
                </button>
            @else
                <button type="submit" class="btn btn-primary m-2" id="submitButton1">
                    Update
                </button>
            @endif
        </div>
    </div>
</form>
            <!-- Modal -->
        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false"
            tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="staticBackdropLabel">Ketentuan & Persyaratan</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="card shadow-none border p-3">
                            <p>Ketentuan dan Persyaratan Sebelum Menulis Berita</p>
                            <ol>
                                <li>Keaslian dan Orisinalitas
                                    <ul class="ms-4" style="list-style-type:disc">
                                        <li>Berita harus asli dan bukan hasil plagiasi</li>
                                        <li>Berita harus ditulis dengan gaya bahasa yang profesional dan mudah dipahami.</li>
                                        <li>Berita harus bebas dari unsur SARA, fitnah, dan konten negatif lainnya.</li>
                                    </ul>
                                </li>
                                <li>Keakuratan dan Kebenaran
                                    <ul class="ms-4" style="list-style-type:disc">
                                        <li>Berita harus akurat dan berdasarkan fakta yang dapat diverifikasi.</li>
                                        <li>Sumber informasi harus jelas dan kredibel.</li>
                                        <li>Berita harus faktual dan tidak memihak.</li>
                                    </ul>
                                </li>
                                <li>Keseimbangan
                                    <ul class="ms-4" style="list-style-type:disc">
                                        <li>Berita harus menyajikan informasi secara seimbang dan tidak memihak.</li>
                                        <li>Berita harus memberikan ruang kepada semua pihak yang terkait untuk menyampaikan pendapatnya.</li>
                                    </ul>
                                </li>
                                <li>Objektivitas
                                    <ul class="ms-4" style="list-style-type:disc">
                                        <li>Berita harus ditulis secara objektif dan tidak memihak.</li>
                                        <li>Penulis berita harus menghindari opini dan prasangka pribadi.</li>
                                    </ul>
                                </li>
                            </ol>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kembali</button>
                        {{-- <button type="button" class="btn btn-primary">Understood</button> --}}
                    </div>
                </div>
            </div>
        </div>

@endsection

@section('script')
<script src="{{ asset('admin/dist/libs/summernote/dist/summernote-lite.min.js') }}"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var form = document.getElementById('myForm');
            var submitButton1 = document.getElementById('submitButton1');
            var submitButton2 = document.getElementById('submitButton2');

            submitButton1.addEventListener('click', function() {
                form.action = "{{ route('profile.berita.updated', ['news' => $news->id ]) }}";
            });

            submitButton2.addEventListener('click', function() {
                form.action = "{{ route('news.update.draft', ['news' => $news->id]) }}";
            });
        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        $(document).ready(function() {
            $('#content').summernote({

                height: 520,
                toolbar: [
                    ['style', ['style']],
                    ['font', ['bold', 'italic', 'underline', 'strikethrough', 'clear']],
                    ['fontname', ['fontname']],
                    ['fontsize', ['fontsize']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph', 'height']],
                    ['table', ['table']],
                    ['link', ['link']],
                    ['picture', ['picture']],
                    ['video', ['video']],
                    ['codeview', ['codeview']],
                    ['help', ['help']],
                    ['insert', ['ul']]
                ],
                fontNames: ['Arial', 'Arial Black', 'Comic Sans MS', 'Courier New', 'Helvetica', 'Impact',
                    'Lucida Grande', 'Tahoma', 'Times New Roman', 'Verdana'
                ],
                fontNamesIgnoreCheck: ['Arial', 'Arial Black', 'Comic Sans MS', 'Courier New', 'Helvetica',
                    'Impact', 'Lucida Grande', 'Tahoma', 'Times New Roman', 'Verdana'
                ]
            });
        });
    </script>

    <script>
        // $('.category').change(function() {
        //     var selectedCategories = $(this).val();
        //     getSubCategory(selectedCategories);
        // })

        // function getSubCategory(ids) {
        //     $('.sub-category').html('');
        //     ids.forEach(function(id) {
        //         $.ajax({
        //             url: "sub-category-detail/" + id,
        //             method: "GET",
        //             dataType: "JSON",
        //             success: function(response) {
        //                 $.each(response.data, function(index, data) {
        //                     $('.sub-category').append('<option value="' + data.id + '">' + data.name +
        //                         '</option>');
        //                 });
        //             }
        //         });
        //     });
        // }

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
        $(document).ready(function() {
            $('#image-uploadify').imageuploadify();
        })

        var today = new Date();
        var year = today.getFullYear();
        var month = ('0' + (today.getMonth() + 1)).slice(-2);
        var day = ('0' + today.getDate()).slice(-2);
        var hours = ('0' + today.getHours()).slice(-2);
        var minutes = ('0' + today.getMinutes()).slice(-2);

        var formattedDate = year + '-' + month + '-' + day + 'T' + hours + ':' + minutes;
        document.getElementById('upload_date').value = formattedDate;

        $(".tags").select2({
            tags: true,
            tokenSeparators: [',', ' ']
        })

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

    </script>
@endsection

@extends('layouts.author.sidebar')

@section('style')
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <link rel="stylesheet" href="{{ asset('assets/dist/imageuploadify.min.css') }}">

    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">

    <link href="assets/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css" />
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
    <div class="container">
        <div class="news-card-a mt-1">
            <div style="padding: 1%;">
                <form method="post" action="{{ route('profile.berita.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="row justify-content-between">
                        <div class="col-lg-6 col-md-12 from-outline">
                            <label class="form-label" for="nomor">Judul Berita</label>
                            <input type="text" id="name" name="name" placeholder="name"
                                value="{{ old('name') }}" class="form-control @error('name') is-invalid @enderror">
                            @error('name')
                                <span class="invalid-feedback" role="alert" style="color: red;">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="col-lg-6 col-md-12 from-outline">
                            <label class="form-label" for="photo">Thumbnail Berita</label>
                            <input type="file" id="photo" name="photo" placeholder="photo"
                                value="{{ old('photo') }}"
                                class="text-center form-control @error('photo') is-invalid @enderror">
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
                                <label class="form-label" for="password_confirmation">Tanggal Upload</label>
                                <input type="date" id="upload_date" name="upload_date" placeholder="date"
                                    value="{{ old('date') }}" class="form-control @error('date') is-invalid @enderror">
                                @error('date')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="mt-2">
                                <label class="form-label" for="password_confirmation">Kategori</label>
                                <select id="category_id"
                                    class="select2 form-control category @error('category') is-invalid @enderror"
                                    name="category[]" multiple="true" value="{{ old('category') }}"
                                    aria-label="Default select example">
                                    <option selected>pilih kategori</option>
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

                        <div class="col-lg-6 col-md-12 row-span-1 from-outline">
                            <div class="">
                                <label class="form-label" for="password_confirmation">Tags</label>
                                <select class="form-control select2 tags" name="tags[]" multiple="multiple">
                                    <option>pilih tags</option>
                                    @foreach ($tags as $tag)
                                        <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="mt-2" style="max-width: 100%;">
                                <label class="form-label" for="password_confirmation">Sub Kategori</label>
                                <select id="sub_category_id"
                                    class="form-control sub-category select2 @error('sub_category') is-invalid @enderror"
                                    name="sub_category[]" multiple="true" value="{{ old('sub_category') }}"
                                    aria-label="Default select example">
                                    <option selected>pilih sub kategori</option>
                                </select>
                                @error('sub_category_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            {{-- <div class="mt-2">
                                <label class="form-label" for="password_confirmation">Tanggal Upload</label>
                                <input type="date" id="upload_date" name="upload_date" placeholder="date"
                                    value="{{ old('date') }}" class="form-control @error('date') is-invalid @enderror">
                                @error('date')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div> --}}

                        </div>
                    </div>

                    <div class="row justify-content-between mt-2">

                        <div class="col-lg-6 col-md-12 col-span-2 mt-2 from-outline" style="height: auto;">
                            <label class="form-label" for="content">Content</label>
                            <textarea id="content" name="content" placeholder="content" value="{{ old('content') }}" class="form"></textarea>
                            @error('content')
                                <span class="invalid-feedback" role="alert" style="color: red;">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>


                        <div class="col-lg-6 col-md-12 row-span-1 from-outline">

                            <div class="mt-2">
                                <label class="form-label" for="password_confirmation">Multi Gambar (Optional)</label>
                                <input type="file" id="image-uploadify" name="multi_photo[]" accept="image/*"
                                    multiple>
                            </div>

                        </div>

                        <div class="d-flex justify-content-between mt-5">
                            <button type="button" data-bs-toggle="modal" data-bs-target="#staticBackdrop"
                                class="btn btn-md text-black m-2 d-flex justify-content-start"
                                style="padding-left: 1rem; padding-right: 1rem; background-color: #C9C9C9;">
                                Ketentuan & Persyaratan
                            </button>

                            <div class="d-flex justify-content-end">
                                <button type="button" class="btn btn-md text-black m-2"
                                    style="padding-left: 2rem; padding-right: 2rem; background-color: #C9C9C9;">
                                    Simpan Draf
                                </button>
                                <button type="submit" class="btn btn-md text-white m-2"
                                    style="padding-left: 3rem; padding-right: 3rem; background-color: #0F4D8A;">
                                    Upload
                                </button>
                            </div>
                        </div>
                    </div>
            </div>
            </form>



            <!-- Modal -->
            <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false"
                tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="staticBackdropLabel"><span
                                    style="background-color: #0F4D8A; font-size: 12px; margin-right: 6px;">|</span>Ketentuan
                                & Persyaratan</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="container p-2">
                                <p>
                                    Ketentuan dan Persyaratan Sebelum Menulis Berita <br><br>
                                    1. Keaslian dan Orisinalitas
                                    Berita harus asli dan bukan hasil plagiasi.
                                    Berita harus ditulis dengan gaya bahasa yang profesional dan mudah dipahami.
                                    Berita harus bebas dari unsur SARA, fitnah, dan konten negatif lainnya. <br>
                                    2. Keakuratan dan Kebenaran
                                    Berita harus akurat dan berdasarkan fakta yang dapat diverifikasi.
                                    Sumber informasi harus jelas dan kredibel.
                                    Berita harus faktual dan tidak memihak. <br>
                                    3. Keseimbangan
                                    Berita harus menyajikan informasi secara seimbang dan tidak memihak.
                                    Berita harus memberikan ruang kepada semua pihak yang terkait untuk menyampaikan
                                    pendapatnya. <br>
                                    4. Objektivitas
                                    Berita harus ditulis secara objektif dan tidak memihak.
                                    Penulis berita harus menghindari opini dan prasangka pribadi. <br>
                                    5. Keaslian dan Orisinalitas
                                    Berita harus asli dan bukan hasil plagiasi.
                                    Berita harus ditulis dengan gaya bahasa yang profesional dan mudah dipahami.
                                    Berita harus bebas dari unsur SARA, fitnah, dan konten negatif lainnya. <br>
                                    6. Keakuratan dan Kebenaran
                                    Berita harus akurat dan berdasarkan fakta yang dapat diverifikasi.
                                    Sumber informasi harus jelas dan kredibel.
                                    Berita harus faktual dan tidak memihak. <br>
                                    7. Keseimbangan
                                    Berita harus menyajikan informasi secara seimbang dan tidak memihak.
                                    Berita harus memberikan ruang kepada semua pihak yang terkait untuk menyampaikan
                                    pendapatnya. <br>
                                    8. Objektivitas
                                    Berita harus ditulis secara objektif dan tidak memihak.
                                    Penulis berita harus menghindari opini dan prasangka pribadi. <br>
                                    4. Objektivitas
                                    Berita harus ditulis secara objektif dan tidak memihak.
                                    Penulis berita harus menghindari opini dan prasangka pribadi. <br>
                                    5. Keaslian dan Orisinalitas
                                    Berita harus asli dan bukan hasil plagiasi.
                                    Berita harus ditulis dengan gaya bahasa yang profesional dan mudah dipahami.
                                    Berita harus bebas dari unsur SARA, fitnah, dan konten negatif lainnya. <br>
                                    6. Keakuratan dan Kebenaran
                                    Berita harus akurat dan berdasarkan fakta yang dapat diverifikasi.
                                    Sumber informasi harus jelas dan kredibel.
                                    Berita harus faktual dan tidak memihak. <br>
                                    7. Keseimbangan
                                    Berita harus menyajikan informasi secara seimbang dan tidak memihak.
                                    Berita harus memberikan ruang kepada semua pihak yang terkait untuk menyampaikan
                                    pendapatnya. <br>
                                    8. Objektivitas
                                    Berita harus ditulis secara objektif dan tidak memihak.
                                    Penulis berita harus menghindari opini dan prasangka pribadi. <br>
                                </p>
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kembali</button>
                            {{-- <button type="button" class="btn btn-primary">Understood</button> --}}
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
                height: 200,
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
    </script>
@endsection

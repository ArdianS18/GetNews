@extends('layouts.user.sidebar')

@section('content')
    <div class="">

        <div class="card bg-light-info shadow-sm position-relative overflow-hidden">
            <div class="card-body px-4 py-4">
              <div class="row align-items-center">
                <div class="col-1">
                    <svg xmlns="http://www.w3.org/2000/svg" width="90" height="90" viewBox="0 0 56 56"><path fill="#175A95" d="M28 51.906c13.055 0 23.906-10.828 23.906-23.906c0-13.055-10.875-23.906-23.93-23.906C14.899 4.094 4.095 14.945 4.095 28c0 13.078 10.828 23.906 23.906 23.906m0-3.984C16.937 47.922 8.1 39.062 8.1 28c0-11.04 8.813-19.922 19.876-19.922c11.039 0 19.921 8.883 19.945 19.922c.023 11.063-8.883 19.922-19.922 19.922m-.023-15.68c1.124 0 1.757-.633 1.78-1.851l.352-12.375c.024-1.196-.914-2.086-2.156-2.086c-1.266 0-2.156.867-2.133 2.062l.305 12.399c.023 1.195.68 1.851 1.852 1.851m0 7.617c1.335 0 2.53-1.078 2.53-2.437c0-1.383-1.171-2.438-2.53-2.438c-1.383 0-2.532 1.078-2.532 2.438c0 1.336 1.172 2.437 2.532 2.437"/></svg>
                </div>
                <div class="col-7">
                  <h4 class="fw-semibold mb-8" style="color: #175A95;">Pengajuan Berita</h4>
                  {{-- <nav aria-label="breadcrumb"> --}}
                    <p style="color: #175A95;">proses pengunggahan berita ada biaya yang dikenakan untuk memuat konten tersebut. Harap dipertimbangkan dan disiapkan sebelum melanjutkan</p>
                    
                  {{-- </nav> --}}
                </div>
                {{-- <div class="col-3">
                  <div class="text-center mb-n4">
                    <img src="{{asset('assets/img/bg-nw.svg')}}" width="200px" alt="" class="img-fluid">
                  </div>
                </div> --}}
              </div>
            </div>
          </div>

        <div class="row">
            <div class="col-md-12 col-lg-7">
                <div class="card p-4 shadow-sm">
                    <h4>Data Diri</h4>
                    <p>Pastikan data diri anda di isi denga benar</p>
                    <div class="row">
                        <div class="col-12 mb-4">
                            <label class="form-label" for="nomor">Name</label>
                            <input type="text" id="name" name="name" placeholder="name"
                                value="{{ old('name') }}" class="form-control @error('name') is-invalid @enderror">
                            @error('name')
                                <span class="invalid-feedback" role="alert" style="color: red;">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="col-12 mb-4">
                            <label class="form-label" for="nomor">Email</label>
                            <input type="text" id="name" name="name" placeholder=""
                                value="{{ old('name') }}" class="form-control @error('name') is-invalid @enderror">
                            @error('name')
                                <span class="invalid-feedback" role="alert" style="color: red;">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="col-12 mb-3">
                            <label class="form-label" for="nomor">Nomor Telepon</label>
                            <input type="text" id="name" name="name" placeholder="name"
                                value="{{ old('name') }}" class="form-control @error('name') is-invalid @enderror">
                            @error('name')
                                <span class="invalid-feedback" role="alert" style="color: red;">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-12 col-lg-5">
                <div class="card p-4 shadow-sm">
                    <h4>Pembayaran</h4>
                    <div class="row">
                        <div class="col-12 mb-4 mt-5">
                            <label class="form-label" for="nomor">Metode Pembayaran</label>
                            <input type="text" id="name" name="name" placeholder="pilih metode pembayaran"
                                value="{{ old('name') }}" class="form-control @error('name') is-invalid @enderror">
                            @error('name')
                                <span class="invalid-feedback" role="alert" style="color: red;">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="col-12 mb-4">
                            <label class="form-label" for="nomor">Kode Voucher (opsional)</label>
                            <input type="text" id="name" name="name" placeholder="name"
                                value="{{ old('name') }}" class="form-control @error('name') is-invalid @enderror">
                            @error('name')
                                <span class="invalid-feedback" role="alert" style="color: red;">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="d-flex mt-5 justify-content-between">
                            <h5>Harga Upload</h5>

                            <h5>Rp. 100.000</h5>
                        </div>

                        <div class="mt-4">
                            <a href="{{route('pengajuan.berita')}}" type="submit" class="btn btn-md w-100 text-white"
                                style="background-color: #0F4D8A;">
                                Selanjutnya
                            </a>
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

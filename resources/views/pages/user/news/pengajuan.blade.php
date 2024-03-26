@extends('layouts.user.sidebar')

@section('content')
    <div class="">

        <div class="card bg-light-info shadow-none position-relative overflow-hidden">
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
                <div class="col-3">
                  <div class="text-center mb-n4">
                    <img src="{{asset('assets/img/bg-nw.svg')}}" width="200px" alt="" class="img-fluid">
                  </div>
                </div>
              </div>
            </div>
          </div>

        <div class="col-12">
            <div class="card">
              <div class="card-body wizard-content">
                {{-- <h4 class="card-title mb-0">Custom Design Example</h4> --}}
                <h6 class="card-subtitle mb-3"></h6>
                <form action="#" class="tab-wizard wizard-circle">
                  <!-- Step 1 -->
                  <h6>Buat Berita</h6>
                  <section>
                    <div class="mb-3">
                        <h5>Baca ketentuan dan persyaratan sembelum mengunggah berita</h5>
                        <button class="btn btn-sm px-3" style="background-color: #D9D9D9; color: #434343;">
                            Ketentuan & Persyaratan
                        </button>
                    </div>
                    <div class="mt-5 mb-2">
                        <h5>Isi form dibawah ini untuk mengunggah berita</h5>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="mb-3">
                          <label for="firstName1">Judul Berita:</label>
                          <input type="text" class="form-control" id="firstName1" />
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="mb-3">
                          <label for="lastName1">Thumbnail Berita :</label>
                          <input type="file" class="form-control" id="lastName1" />
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="mb-3">
                          <label for="emailAddress1">Kategori :</label>
                          <input type="text" class="form-control" id="emailAddress1" />
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="mb-3">
                          <label for="phoneNumber1">Tanggal Upload :</label>
                          <input type="date" class="form-control" id="phoneNumber1" />
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="mb-3">
                          <label for="location1">Sub Kategori :</label>
                          <select class="form-select" id="location1" name="location">
                            <option value="">Select City</option>
                            <option value="Amsterdam">India</option>
                            <option value="Berlin">USA</option>
                            <option value="Frankfurt">Dubai</option>
                          </select>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="mb-3">
                          <label for="date1">Tags :</label>
                          <input type="text" class="form-control" id="date1" />
                        </div>
                      </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6 col-md-12 col-span-2 mt-2 from-outline" style="height: auto;">
                            <label class="form-label" for="content">Isi Berita</label>
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
                    </div>
                  </section>
                  <!-- Step 2 -->
                  <h6>Pembayaran</h6>
                  <section>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="mb-3">
                          <label for="jobTitle1">Job Title :</label>
                          <input type="text" class="form-control" id="jobTitle1" />
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="mb-3">
                          <label for="videoUrl1">Company Name :</label>
                          <input type="text" class="form-control" id="videoUrl1" />
                        </div>
                      </div>
                      <div class="col-md-12">
                        <div class="mb-3">
                          <label for="shortDescription1">Job Description :</label>
                          <textarea name="shortDescription" id="shortDescription1" rows="6" class="form-control"></textarea>
                        </div>
                      </div>
                    </div>
                  </section>
                  <!-- Step 3 -->
                  <h6>Selesai</h6>
                  <section>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="mb-3">
                          <label for="int1">Interview For :</label>
                          <input type="text" class="form-control" id="int1" />
                        </div>
                        <div class="mb-3">
                          <label for="intType1">Interview Type :</label>
                          <select class="form-select" id="intType1" data-placeholder="Type to search cities" name="intType1">
                            <option value="Banquet">Normal</option>
                            <option value="Fund Raiser">Difficult</option>
                            <option value="Dinner Party">Hard</option>
                          </select>
                        </div>
                        <div class="mb-3">
                          <label for="Location1">Location :</label>
                          <select class="form-select" id="Location1" name="location">
                            <option value="">Select City</option>
                            <option value="India">India</option>
                            <option value="USA">USA</option>
                            <option value="Dubai">Dubai</option>
                          </select>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="mb-3">
                          <label for="jobTitle2">Interview Date :</label>
                          <input type="date" class="form-control" id="jobTitle2" />
                        </div>
                        <div class="mb-3">
                          <label>Requirements :</label>
                          <div class="c-inputs-stacked">
                            <div class="form-check">
                              <input type="radio" id="customRadio6" name="customRadio" class="form-check-input" />
                              <label class="form-check-label" for="customRadio6">Employee</label>
                            </div>
                            <div class="form-check">
                              <input type="radio" id="customRadio7" name="customRadio" class="form-check-input" />
                              <label class="form-check-label" for="customRadio7">Contract</label>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </section>
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

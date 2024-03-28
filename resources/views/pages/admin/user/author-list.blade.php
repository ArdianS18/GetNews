@extends('layouts.admin.app')

@section('style')
    <style>
        .card-table {
            background-color: #fff;
            padding: 25px;
            border-radius: 10px;
        }

        .table-border {
            border: 1px solid #DADADA;
            border-radius: 5px;
            /* padding: 25px; */
        }
    </style>
@endsection

@section('content')
    <div class="card-table shadow-sm">
        <div class="d-flex justify-content-between">
            <div class="d-flex justify-content-start gap-2 ">
                <form class="d-flex gap-2">
                    <div class="position-relative">
                        <div class="input-group">
                            <input type="text" name="search" class="form-control search-chat py-2 ps-5" id="search-name"
                                placeholder="Search">
                            <i class="ti ti-search position-absolute top-50 translate-middle-y fs-6 text-dark ms-3"></i>
                        </div>
                    </div>

                    <div class="d-flex gap-2">
                        <select name="status" class="form-select" id="search-status">
                            <option value="">Tampilkan semua</option>
                            <option value="1">Blokir</option>
                            <option value="0">Aktif</option>
                        </select>
                    </div>
                </form>
            </div>
            <div class="d-flex justify-content-end">
                <button class="btn btn-md py-1 px-5 text-white" type="button" style="background-color: #175A95;"
                    data-bs-toggle="modal" data-bs-target="#modal-create">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 2 30 24">
                        <path fill="currentColor"
                            d="M18 12.998h-5v5a1 1 0 0 1-2 0v-5H6a1 1 0 0 1 0-2h5v-5a1 1 0 0 1 2 0v5h5a1 1 0 0 1 0 2" />
                    </svg>
                    Tambah
                </button>
            </div>
        </div>
    </div>

    <div class="mt-4 col-md-12 col-lg-12 card-table shadow-sm">
        <div class="table-border mb-3">
            <table class="table mb-3">
                <thead>
                    <tr>
                        <th class="text-white" style="background-color: #175A95; border-radius: 5px 0 0 5px">No</th>
                        <th class="text-white" style="background-color: #175A95; ">Name</th>
                        <th class="text-white" style="background-color: #175A95; ">Email</th>
                        <th class="text-white" style="background-color: #175A95; ">Status</th>
                        <th class="text-white" style="background-color: #175A95; border-radius: 0 5px 5px 0 ">Actions</th>
                    </tr>
                </thead>
                <tbody id="data">

                </tbody>
            </table>
            <div id="loading"></div>
        </div>

        <div class="modal fade" id="modal-create" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
            aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel"><span
                                style="background-color: #0F4D8A; font-size: 12px; margin-right: 6px;">|</span>Tambah Akun
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <form method="POST" id="form-create" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-body">
                            <div class="row container">
                                <div class="col-md-12 col-lg-6 mb-3">
                                    <label class="form-label" for="nomor">Nama</label>
                                    <input type="text" id="name" name="name" placeholder="nama"
                                        value="{{ old('name') }}"
                                        class="form-control @error('name') is-invalid @enderror">
                                    @error('name')
                                        <span class="invalid-feedback" role="alert" style="color: red;">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="col-md-12 col-lg-6 mb-3">
                                    <label class="form-label" for="nomor">Nomor Telepon</label>
                                    <input type="text" id="name" name="phone_number" placeholder="nomor telepon"
                                        value="{{ old('phone_number') }}"
                                        class="form-control @error('phone_number') is-invalid @enderror">
                                    @error('phone_number')
                                        <span class="invalid-feedback" role="alert" style="color: red;">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="col-md-12 col-lg-6 mb-3">
                                    <label class="form-label" for="nomor">Email</label>
                                    <input type="text" id="email" name="email" placeholder="email"
                                        value="{{ old('email') }}"
                                        class="form-control @error('email') is-invalid @enderror">
                                    @error('email')
                                        <span class="invalid-feedback" role="alert" style="color: red;">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="col-md-12 col-lg-6 mb-3">
                                    <label class="form-label" for="nomor">CV</label>
                                    <input type="file" id="cv" name="cv" placeholder="name"
                                        value="{{ old('cv') }}"
                                        class="form-control @error('cv') is-invalid @enderror">

                                </div>

                                <div class="col-md-12 col-lg-6 mb-3">
                                    <label class="form-label" for="nomor">Password</label>
                                    <input type="text" id="password" name="password" placeholder="password"
                                        value="{{ old('password') }}"
                                        class="form-control @error('password') is-invalid @enderror">
                                    @error('password')
                                        <span class="invalid-feedback" role="alert" style="color: red;">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="col-md-12 col-lg-12 from-group mb-3">
                                    <label class="form-label" for="address">Alamat</label>
                                    <textarea name="address" id="address" rows="6" class="form-control"></textarea>
                                </div>
                            </div>
                        </div>

                        <div class="modal-footer">
                            <button type="button" style="background-color: #C9C9C9;" class="btn"
                                data-bs-dismiss="modal">Batal</button>
                            <button type="submit" style="background-color: #175A95;"
                                class="btn text-white">Tambah</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>


        {{-- <x-delete-modal-component /> --}}
        <!-- Detail Modal -->
        <div class="modal fade" id="modal-detail" tabindex="-1" aria-labelledby="modal-detail Label"
            aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <!-- Modal content -->
                    <div class="modal-header">
                        <h3 class="modal-title">Detail data Author</h3>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <!-- Modal body -->
                    <div class="modal-body">
                        <div class="d-flex justify-content-center">
                            <img src="" class="rounded-circle mb-2" id="detail-photo" width="150"
                                alt="photo-siswa" height="150" />
                        </div>
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col">
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item" style="font-weight: bold;">Nama : <span
                                                id="detail-name" style="font-weight: normal;"></span>
                                        </li>
                                        <li class="list-group-item" style="font-weight: bold;">Email: <span
                                                id="detail-email" style="font-weight: normal;"></span>
                                        </li>
                                    </ul>
                                </div>
                                <div class="col">
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item" style="font-weight: bold;">Tanggal Lahir: <span
                                                id="detail-birth_date" style="font-weight: normal;"></span></li>
                                        <li class="list-group-item" style="font-weight: bold;">Alamat: <span
                                                id="detail-address" style="font-weight: normal;"></span></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" style="background-color: #C9C9C9;" class="btn"
                            data-bs-dismiss="modal">Batal</button>
                    </div>
                </div>
            </div>
        </div>
        <x-delete-modal-component />
    </div>

    <div class="modal fade" id="modal-blokir" tabindex="-1" aria-labelledby="mySmallModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <form id="form-blokir" method="POST" class="modal-content">
                @csrf
                <div class="modal-header d-flex align-items-center">
                    <h4 class="modal-title" id="myModalLabel">
                        Blokir Penulis
                    </h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <p>Apakah anda yakin akan memblokir penulis ini?  </p>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light-danger text-danger font-medium waves-effect" data-bs-dismiss="modal">
                        Batal
                    </button>
                    <button type="submit" class="btn btn-light-danger text-secondery font-medium waves-effect" data-bs-dismiss="modal">
                        Blokir
                    </button>
                </div>
            </form>
        </div>
    </div>

@endsection

@section('script')
    <script>
        get(1)
        let debounceTimer;

        $('#search-name').keyup(function() {
            clearTimeout(debounceTimer);

            debounceTimer = setTimeout(function() {
                get(1)
            }, 500);
        });

        $('#search-status').change(function() {
            get(1)
        });

        function get(page) {
            $.ajax({
                url: "{{ route('author.admin.list') }}?page=" + page,
                method: "GET",
                data: {
                    name: $('#search-name').val(),
                    status:$('#search-status').val()
                },
                dataType: "JSON",
                beforeSend:function(){
                    $('#data').html('')
                    $('#loading').html(showLoading())
                },
                success: function(response) {
                    $('#loading').html('')
                    if (response.data.data.length) {
                        let author = response.data.data
                        $.each(response.data.data, function(index, data) {
                            $('#data').append(authorRow(index, data))
                        })
                        $('.btn-detail').click(function() {
                            var authorId = $(this).data('id');
                            var data = author.find(author => author.id === authorId)
                            handleDetail(data)
                            const detailPhoto = document.getElementById("detail-photo");
                            detailPhoto.src = data['photo'];
                            $('#modal-detail').modal('show')
                        })
                        $('.blokir').click(function(){
                            $('#form-blokir').data('id',$(this).data('id'))
                            $('#modal-blokir').modal('show')
                        })
                    }else{
                        $('#loading').html(showNoData('Penulis Tidak Ada !!'))
                    }
                }
            })
        }


        $('#form-create').submit(function(e) {
            $('.preloader').show();
            e.preventDefault();
            var formData = new FormData(this);

            $.ajax({
                url: "{{ route('author.create') }}",
                type: "POST",
                data: formData,
                processData: false,
                contentType: false,
                success: function(response) {
                    get(1)
                    $('.preloader').fadeOut();
                    var response = response.responseJSON

                    Swal.fire({
                        title: 'Berhasil!',
                        icon: 'success',
                        text: "Berhasil Menambahkan Data"
                    })
                    $('#modal-create').modal('hide')
                    emptyForm('form-create')
                },
                error: function(response) {
                    $('.preloader').fadeOut();
                    Swal.fire({
                        title: 'Error!',
                        icon: 'error',
                        text: "Terdapat masalah saat input data"
                    });
                    var response = response.responseJSON
                    var status = response.meta.code
                    if (status == 422) {
                        handleValidate(response.data, 'create')
                    }
                }
            })
        })

        $('#form-blokir').submit(function(e) {
            $('.preloader').show()
            e.preventDefault()
            const id = $(this).data('id')
            $.ajax({
                url: "banned-author/" + id,
                type: 'PUT',
                data:$(this).serialize(),
                success: function(response) {
                    $('.preloader').fadeOut()
                    get(1)
                    $('#modal-delete').modal('hide')
                    Swal.fire({
                        title: 'Berhasil!',
                        icon: 'success',
                        text: response.message
                    })
                },
                error: function(response) {
                    $('.preloader').fadeOut()
                }
            })
        })

        function authorRow(index, data) {
            let status = ""
            if (data.status == 0) {
                status = ` <div class="
                            fs-3
                            badge
                            bg-light-success
                            text-success
                            font-weight-medium
                            ">Aktif</div>`
            } else {
                status = ` <div class="
                            fs-3
                            badge
                            bg-light-danger
                            text-danger
                            font-weight-medium
                            ">Blokir</div>`
            }
            return `
        <tr>
                    <td>${index + 1}</td>
                    <td>${data.name}</td>
                    <td>${data.email}</td>
                    <td>
                        ${status}
                    <td>
                        <div class="d-flex">

                            <button data-bs-toggle="tooltip" data-id="${data.id}" title="Detail" class="btn btn-sm btn-primary btn-detail me-2" style="background-color:#0F4D8A">
                                <i><svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24"><path fill="currentColor" d="M12 6.5a9.77 9.77 0 0 1 8.82 5.5c-1.65 3.37-5.02 5.5-8.82 5.5S4.83 15.37 3.18 12A9.77 9.77 0 0 1 12 6.5m0-2C7 4.5 2.73 7.61 1 12c1.73 4.39 6 7.5 11 7.5s9.27-3.11 11-7.5c-1.73-4.39-6-7.5-11-7.5m0 5a2.5 2.5 0 0 1 0 5a2.5 2.5 0 0 1 0-5m0-2c-2.48 0-4.5 2.02-4.5 4.5s2.02 4.5 4.5 4.5s4.5-2.02 4.5-4.5s-2.02-4.5-4.5-4.5"/></svg></i>
                            </button>

                            <a data-id="${data.id}" data-bs-toggle="tooltip" title="Blokir" class="btn blokir btn-sm btn-danger">
                                <svg xmlns="http://www.w3.org/2000/svg" width="23" height="23" viewBox="0 0 512 512"><circle cx="256" cy="256" r="208" fill="none" stroke="#ffffff" stroke-miterlimit="10" stroke-width="32"/><path fill="none" stroke="#ffffff" stroke-miterlimit="10" stroke-width="32" d="m108.92 108.92l294.16 294.16"/></svg>
                            </a>

                        </div>
                    </td>
                </tr>
        `
        }

    </script>
@endsection

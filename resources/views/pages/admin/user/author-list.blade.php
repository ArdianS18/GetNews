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

<head>
    <title>Admin | Author-List</title>
</head>

@section('content')
    <div class="">
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
                            <option value="">Pilih status</option>
                            <option value="0">Aktif</option>
                            <option value="1">Blokir</option>
                            <option value="">Tampilkan semua</option>
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

    <div class="mt-4 col-md-12 col-lg-12 ">
        <div class="">
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
        </div>
        <div id="loading"></div>
        <div class="d-flex justify-content-end">
            <nav id="pagination" style="position: fixed; bottom: 10px; right: 10px py-5">
            </nav>
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
                                    <input type="text" id="create-name" name="name" placeholder="nama"
                                        value="{{ old('name') }}" class="form-control ">
                                    <ul class="error-text"></ul>


                                </div>

                                <div class="col-md-12 col-lg-6 mb-3">
                                    <label class="form-label" for="nomor">Nomor Telepon</label>
                                    <input type="text" id="create-phone_number" name="phone_number"
                                        placeholder="nomor telepon" value="{{ old('phone_number') }}" class=" @error('phone_number') is-invalid @enderror form-control">
                                    <ul class="error-text">
                                        @error('phone_number')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </ul>
                                </div>

                                <div class="col-md-12 col-lg-6 mb-3">
                                    <label class="form-label" for="nomor">Email</label>
                                    <input type="text" id="create-email" name="email" placeholder="email"
                                        value="{{ old('email') }}"  class=" @error('email') is-invalid @enderror form-control">
                                    <ul class="error-text">
                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </ul>
                                </div>

                                <div class="col-md-12 col-lg-6 mb-3">
                                    <label class="form-label" for="nomor">CV</label>
                                    <input type="file" id="create-cv" name="cv" placeholder="name"
                                        value="{{ old('cv') }}"  class=" @error('cv') is-invalid @enderror form-control">
                                    <ul class="error-text">
                                        @error('cv')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </ul>

                                </div>

                                <div class="col-md-12 col-lg-6 mb-3">
                                    <label class="form-label" for="nomor">Password</label>
                                    <input type="password" id="create-password" name="password" placeholder="password"
                                        value="{{ old('password') }}"  class=" @error('password') is-invalid @enderror form-control">
                                    <ul class="error-text">
                                        @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </ul>

                                </div>

                                <div class="col-md-12 col-lg-12 from-group mb-3">
                                    <label class="form-label" for="address">Alamat</label>
                                    <textarea name="address" id="create-address" rows="6" class=" @error('address') is-invalid @enderror form-control" style="resize: none"></textarea>
                                    <ul class="error-text">
                                        @error('address')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </ul>
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

                    <p>Apakah anda yakin akan memblokir penulis ini? </p>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light-danger text-danger font-medium waves-effect"
                        data-bs-dismiss="modal">
                        Batal
                    </button>
                    <button type="submit" class="btn btn-light-danger text-secondery font-medium waves-effect"
                        data-bs-dismiss="modal">
                        Blokir
                    </button>
                </div>
            </form>
        </div>
    </div>

    <div class="modal fade" id="modal-unblock" tabindex="-1" aria-labelledby="mySmallModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <form id="form-unblock" method="POST" class="modal-content">
                @csrf
                <div class="modal-header d-flex align-items-center">
                    <h4 class="modal-title" id="myModalLabel">
                        Buka Blokir Penulis
                    </h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <p>Apakah anda yakin akan Membuka Blokir penulis ini? </p>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light-danger text-danger font-medium waves-effect"
                        data-bs-dismiss="modal">
                        Batal
                    </button>
                    <button type="submit" class="btn btn-light-danger text-secondery font-medium waves-effect"
                        data-bs-dismiss="modal">
                        Buka
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
                    status: $('#search-status').val()
                },
                dataType: "JSON",
                beforeSend: function() {
                    $('#data').html('')
                    $('#loading').html(showLoading())
                    $('#pagination').html('')
                },
                success: function(response) {
                    $('#loading').html('')
                    if (response.data.data.length) {
                        let author = response.data.data
                        $.each(response.data.data, function(index, data) {
                            $('#data').append(authorRow(index, data))
                        })
                        $('#pagination').html(handlePaginate(response.data.paginate))

                        $('.btn-detail').click(function() {
                            var authorId = $(this).data('id');
                            var data = author.find(author => author.id === authorId)
                            handleDetail(data)
                            const detailPhoto = document.getElementById("detail-photo");
                            detailPhoto.src = data['photo'];
                            $('#modal-detail').modal('show')
                        })

                        $('.blokir').click(function() {
                            $('#form-blokir').data('id', $(this).data('id'))
                            $('#modal-blokir').modal('show')
                        })

                        $('.unblock').click(function() {
                            $('#form-unblock').data('id', $(this).data('id'))
                            $('#modal-unblock').modal('show')
                        })
                    } else {
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
                    handleValidate(response.responseJSON.errors, 'create')

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
                data: $(this).serialize(),
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
        
        $('#form-unblock').submit(function(e) {
            $('.preloader').show()
            e.preventDefault()
            const id = $(this).data('id')
            console.log(id);
            $.ajax({
                url: "banned-author/" + id,
                type: 'PUT',
                data: $(this).serialize(),
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
            let banned = ""
            if (data.status == 0) {
                status = ` <div class="
                            fs-3
                            badge
                            bg-light-success
                            text-success
                            font-weight-medium
                            ">Aktif</div>`
                banned = `
                <a data-id="${data.id}" data-bs-toggle="tooltip" title="Blokir" class="btn blokir btn-sm btn-danger">
                                <svg xmlns="http://www.w3.org/2000/svg" width="23" height="23" viewBox="0 0 512 512"><circle cx="256" cy="256" r="208" fill="none" stroke="#ffffff" stroke-miterlimit="10" stroke-width="32"/><path fill="none" stroke="#ffffff" stroke-miterlimit="10" stroke-width="32" d="m108.92 108.92l294.16 294.16"/></svg>
                            </a>
                `
            } else {
                status = ` <div class="
                            fs-3
                            badge
                            bg-light-danger
                            text-danger
                            font-weight-medium
                            ">Blokir</div>`
                banned = `
                <a data-id="${data.id}" data-bs-toggle="tooltip" title="Buka Blokir" class="btn unblock btn-sm btn-success">
                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 24 24"><path fill="#fff" d="M6.615 9H15V7q0-1.25-.875-2.125T12 4q-1.25 0-2.125.875T9 7H8q0-1.671 1.164-2.836T12 3q1.671 0 2.836 1.164T16 7v2h1.385q.666 0 1.14.475q.475.474.475 1.14v8.77q0 .666-.475 1.14q-.474.475-1.14.475H6.615q-.666 0-1.14-.475Q5 20.051 5 19.385v-8.77q0-.666.475-1.14Q5.949 9 6.615 9M12 16.5q.633 0 1.066-.434q.434-.433.434-1.066t-.434-1.066Q12.633 13.5 12 13.5t-1.066.434Q10.5 14.367 10.5 15t.434 1.066q.433.434 1.066.434"/></svg>
                </a>

                `
            }
            return `
        <tr>
                    <td>${index + 1}</td>
                    <td>
                        <img src="${data.photo}" class="rounded-circle me-2 user-profile"
                        style="object-fit: cover" width="35" height="35" alt="" />
                        ${data.name}
                    </td>
                    <td>${data.email}</td>
                    <td>
                        ${status}
                    <td>
                        <div class="d-flex">

                            <button data-bs-toggle="tooltip" data-id="${data.id}" title="Detail" class="btn btn-sm btn-primary btn-detail me-2" style="background-color:#5D87FF">
                                <i><svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 24 24"><path fill="currentColor" d="M12 6.5a9.77 9.77 0 0 1 8.82 5.5c-1.65 3.37-5.02 5.5-8.82 5.5S4.83 15.37 3.18 12A9.77 9.77 0 0 1 12 6.5m0-2C7 4.5 2.73 7.61 1 12c1.73 4.39 6 7.5 11 7.5s9.27-3.11 11-7.5c-1.73-4.39-6-7.5-11-7.5m0 5a2.5 2.5 0 0 1 0 5a2.5 2.5 0 0 1 0-5m0-2c-2.48 0-4.5 2.02-4.5 4.5s2.02 4.5 4.5 4.5s4.5-2.02 4.5-4.5s-2.02-4.5-4.5-4.5"/></svg></i>
                            </button>
                            ${banned}

                            <button data-bs-toggle="tooltip" data-id="${data.id}" title="Download" class="btn btn-sm btn-unduh ms-2" style="background-color:#0F4D8A">
                                <i>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 24 24"><path fill="#ffffff" d="M18 15v3H6v-3H4v3c0 1.1.9 2 2 2h12c1.1 0 2-.9 2-2v-3zm-1-4l-1.41-1.41L13 12.17V4h-2v8.17L8.41 9.59L7 11l5 5z"/></svg>
                                </i>
                            </button>

                        </div>
                    </td>
                </tr>
        `
        }
    </script>
@endsection

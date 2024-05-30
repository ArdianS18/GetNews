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
    <title>Admin | Author</title>
</head>

@section('content')
    <div class="d-flex justify-content-between">

        <div class="d-flex justify-content-start gap-2 ">
            <form>
                <div class="position-relative d-flex">
                    <div class="">
                        <input type="text" name="search" id="search-name" class="form-control search-chat py-2 px-5 ps-5"
                        value="{{ request('search') }}" placeholder="Cari..">
                        <i class="ti ti-search position-absolute top-50 translate-middle-y fs-6 text-dark ms-3"></i>
                    </div>
                </div>
            </form>
        </div>
    </div>


    <div class="mt-4 col-md-12 col-lg-12">
        <div class="table-responsive rounded-2 mb-3">
            <table class="table border text-nowrap customize-table mb-0 align-middle">
                <thead>
                    <tr>
                        <th style="background-color: #D9D9D9; border-radius: 5px 0 0 5px">No</th>
                        <th style="background-color: #D9D9D9;">Name</th>
                        <th style="background-color: #D9D9D9;">Email</th>
                        <th style="background-color: #D9D9D9; border-radius: 0 5px 5px 0">Actions</th>
                    </tr>
                </thead>
                <tbody id="data">

                </tbody>
            </table>
            <div id="loading"></div>
            <div class="d-flex mt-2 justify-content-end">
                <nav id="pagination">
                </nav>
            </div>
        </div>

        <div class="modal fade" id="modal-detail" tabindex="-1" aria-labelledby="modal-detail Label" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <!-- Modal content -->
                    <div class="modal-header">
                        <h3 class="modal-title">Detail data Author</h3>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <!-- Modal body -->
                    {{-- <form method="post" id="form-detail"> --}}

                    <div class="modal-body">
                        <div class="d-flex justify-content-center">
                            <img src="" class="rounded-circle mb-2" id="detail-photo" width="150"
                                alt="photo-siswa" height="150" />
                        </div>
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-6">
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item mb-3" style="font-weight: bold;">Nama : <span
                                                id="detail-name" style="font-weight: normal;"></span>
                                        </li>
                                        <li class="list-group-item mb-3" style="font-weight: bold;">Nomor Telepon: <span
                                                id="detail-phone_number" style="font-weight: normal;"></span></li>
                                    </ul>
                                </div>
                                <div class="col-md-6">
                                    <ul class="list-group list-group-flush">

                                        <li class="list-group-item mb-3" style="font-weight: bold;">Email: <span
                                                id="detail-email" style="font-weight: normal;"></span>
                                        </li>
                                        <li class="list-group-item" style="font-weight: bold;">Alamat: <span
                                                id="detail-address" style="font-weight: normal;"></span></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <div class="d-flex justify-content-end">
                            <a id="download-cv" target="_blank" download>
                                <span class="badge bg-light-primary text-primary me-2 fs-4 px-2 py-2">
                                    Download CV
                                </span>
                            </a>
                            <form method="post" id="form-tolak">
                                @csrf
                                @method('patch')
                                <button type="submit" class="btn btn-sm btn-light-danger text-danger fs-4 me-2 px-2">
                                    Tolak
                                </button>
                            </form>

                            <form method="post" id="form-terima">
                                @csrf
                                @method('patch')
                                <button id="terima" type="submit"
                                    class="btn btn-sm btn-light-success text-success fs-4 px-2">
                                    Terima </button>
                            </form>
                        </div>
                    </div>
                    {{-- </form> --}}
                </div>
            </div>
        </div>
        <x-delete-modal-component />
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

        function get(page) {
            $.ajax({
                url: "{{ route('author.admin.index') }}?page=" + page,
                method: 'Get',
                dataType: "JSON",
                data: {
                    author: $('#search-name').val(),
                },
                beforeSend: function() {
                    $('#data').html("")
                    $('#loading').html(showLoading())
                    $('#pagination').html('')
                },
                success: function(response) {
                    var author = response.data.data
                    $('#loading').html("")
                    if (response.data.data.length > 0) {
                        $.each(response.data.data, function(index, data) {
                            $('#data').append(rowNewsApproved(index, data))
                        })
                        $('#pagination').html(handlePaginate(response.data.paginate))
                        $('.btn-detail').click(function() {
                            var authorId = $(this).data('id');
                            var data = author.find(author => author.id === authorId);

                            if (data) {
                                $('#detail-photo').attr('src', data.photo); // Foto
                                // $('#download-cv').attr('href', data.cv)

                                var cv = data['cv']
                                $('#download-cv').data('cv',cv).data('name', data['name'])
                            
                                $('#data-id').text(data.id);
                                $('#form-terima').attr('data-id', data.id);
                                $('#form-tolak').attr('data-id', data.id);
                                $('#detail-name').text(data.name); // Nama
                                $('#detail-email').text(data.email); // Email
                                $('#detail-birth_date').text(data.birth_date); // Tanggal Lahir
                                $('#detail-address').text(data.address); // Alamat
                                $('#detail-cv').text(data.cv); // cv
                                $('#detail-phone_number').text(data.phone_number);

                                // Jika Anda memutuskan untuk menampilkan phone_number dan status, pastikan untuk menambahkan elemen-elemen tersebut dalam HTML Anda dan memperbaruinya di sini juga.

                                // Tampilkan modal
                                $('#modal-detail').modal('show');
                            } else {
                                console.error('Tidak ada data penulis yang ditemukan dengan id:',
                                    authorId);
                            }

                        });


                    } else {
                        $('#loading').html(showNoData('Tidak ada data'))
                    }
                }
            })
        }
        $('#form-terima').click(function(e) {
            e.preventDefault();
            Swal.fire({
                title: 'Konfirmasi',
                text: 'Apakah Anda yakin ingin menerima?',
                icon: 'question',
                showCancelButton: true,
                confirmButtonText: 'Ya',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    $('.preloader').show()

                    var id = $(this).closest('form').data('id');
                    $.ajax({
                        url: "approved-user/" + id,
                        method: 'PATCH',
                        data: $(this).closest('form').serialize(),
                        dataType: "JSON",
                        success: function(response) {
                            $('#modal-detail').modal('hide');
                            $('.preloader').hide()
                            Swal.fire({
                                title: 'Berhasil!',
                                text: response.message,
                                icon: 'success',
                                confirmButtonText: 'Oke'
                            });
                            get(1);
                        },
                        error: function(xhr, status, error) {
                            Swal.fire({
                                title: 'Error!',
                                text: 'Terjadi kesalahan, silakan coba lagi.',
                                icon: 'error',
                                confirmButtonText: 'Oke'
                            });
                        }
                    });
                }
            });
        });

        $('#form-tolak').submit(function(e) {
            e.preventDefault();
            Swal.fire({
                title: 'Konfirmasi',
                text: 'Apakah Anda yakin ingin menolak?',
                icon: 'question',
                showCancelButton: true,
                confirmButtonText: 'Ya',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    $('.preloader').show()

                    var id = $(this).data('id');
                    $.ajax({
                        url: "reject-user/" + id,
                        method: 'PATCH',
                        data: $(this).serialize(),
                        dataType: "JSON",
                        success: function(response) {
                            $('#modal-detail').modal('hide');
                            $('.preloader').hide()
                            Swal.fire({
                                title: 'Berhasil!',
                                text: response.message,
                                icon: 'success',
                                confirmButtonText: 'Oke'
                            });
                            get(1);
                        },
                        error: function(xhr, status, error) {
                            Swal.fire({
                                title: 'Error!',
                                text: 'Terjadi kesalahan, silakan coba lagi.',
                                icon: 'error',
                                confirmButtonText: 'Oke'
                            });
                        }
                    });
                }
            });
        });

        $('#download-cv').click(function(){
            event.preventDefault(); 
                var cvUrl = $(this).data('cv');
                var fileName = cvUrl.substring(cvUrl.lastIndexOf('/') + 1);
                var link = document.createElement('a');
                link.href = cvUrl;
                link.setAttribute('download', $(this).data('name'));
                link.click();
        })

        function rowNewsApproved(index, data) {
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
                    <button data-bs-toggle="tooltip" data-id="${data.id}" title="Detail" class="btn btn-sm btn-primary btn-detail me-2" style="background-color:#5D87FF">
                        <i><svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 24 24"><path fill="currentColor" d="M12 6.5a9.77 9.77 0 0 1 8.82 5.5c-1.65 3.37-5.02 5.5-8.82 5.5S4.83 15.37 3.18 12A9.77 9.77 0 0 1 12 6.5m0-2C7 4.5 2.73 7.61 1 12c1.73 4.39 6 7.5 11 7.5s9.27-3.11 11-7.5c-1.73-4.39-6-7.5-11-7.5m0 5a2.5 2.5 0 0 1 0 5a2.5 2.5 0 0 1 0-5m0-2c-2.48 0-4.5 2.02-4.5 4.5s2.02 4.5 4.5 4.5s4.5-2.02 4.5-4.5s-2.02-4.5-4.5-4.5"/></svg></i>
                    </button>
                </td>
            </tr>
        `
        }

        $('#form-delete').submit(function(e) {
            $('.preloader').show()
            e.preventDefault()
            const id = $(this).data('id')
            $.ajax({
                url: "list-news-approved/" + id,
                type: 'DELETE',
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

        $('#form-update').submit(function(e) {
            $('.preloader').show()
            e.preventDefault()
            const id = $(this).data('id')
            $.ajax({
                url: "kategori/" + id,
                type: 'PUT',
                data: $(this).serialize(),
                success: function(response) {
                    $('.preloader').fadeOut()
                    get(1)
                    $('#modal-update').modal('hide')
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
    </script>
@endsection

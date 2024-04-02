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
    <title>Admin | Sub-Category</title>
</head>

@section('content')
        <div class="">
            <div class="d-flex justify-content-between">
                <form class="d-flex">
                    <div class="input-group">
                        <input type="text" name="search" id="search-name" class="form-control search-chat py-2 ps-5"placeholder="Search">
                        <i class="ti ti-search position-absolute top-50 translate-middle-y fs-6 text-dark ms-3"></i>
                    </div>
                </form>

                <div class="">
                    <a href="{{ route('categories.index') }}" class="btn text-white mr-2 me-2" style="background-color: #175A95">Kembali</a>
                    <button type="button" style="background-color: #175A95" class="btn btn-md text-white px-5" data-bs-toggle="modal" data-bs-target="#modal-create">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 2 30 24">
                            <path fill="currentColor" d="M18 12.998h-5v5a1 1 0 0 1-2 0v-5H6a1 1 0 0 1 0-2h5v-5a1 1 0 0 1 2 0v5h5a1 1 0 0 1 0 2" />
                        </svg>
                        Tambah
                    </button>
                </div>
        </div>
    </div>

        <div class="mt-4">
            <div class="table-border mb-3">
                <table class="table text-center mb-3">
                    <thead class="table">
                        <th class="text-white" style="background-color: #175A95;  border-radius: 5px 0 0 5px;">No</th>
                        <th class="text-white" style="background-color: #175A95;">Name</th>
                        <th class="text-white" style="background-color: #175A95; border-radius: 0 5px 5px 0;">Aksi</th>
                    </thead>
                    <tbody id="data">
                </tbody>
            </table>


            <div id="loading"></div>
            <div class="d-flex mx-4 justify-content-end">
                <nav id="pagination">
                </nav>
            </div>
        </div>
    </div>


    <!-- Modal -->
    <div class="modal fade" id="modal-create" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Sub Kategori</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="form-create">
                    @csrf
                    <div class="modal-body">
                        <div>
                            <label class="form-label mt-2">Sub Kategori</label>
                            <input id="create-name" class="form-control" type="text" name="name">
                            <ul class="error-text"></ul>
                        </div>
                        <div class="modal-footer">
                            <button type="button" style="background-color: #C9C9C9;" class="btn"
                                data-bs-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-primary">Tambah</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="modal-update" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="editModalLabel">Edit</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="form-update">
                    @csrf
                    <div class="modal-body text-start">
                        <label class="form-label mt-2">Name</label>
                        <input id="update-name" class="form-control" type="text" name="name">
                    </div>
                    <div class="modal-footer">
                        <button type="button" style="background-color: #C9C9C9;" class="btn"
                            data-bs-dismiss="modal">Batal</button>
                        <button type="submit" style="background-color: #175A95;" class="btn text-white">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <x-delete-modal-component />
@endsection
@section('script')
    <script>
        $('.btn-delete').click(function() {
            id = $(this).data('id')
            var actionUrl = `/subcategories/${id}`;
            $('#form-delete').attr('action', actionUrl);
            $('#modal-delete').modal('show')
        })

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
                url: "{{ route('subkategori.index', ['category' => $category]) }}?page=" + page,
                method: 'Get',
                dataType: "JSON",
                data: {
                    name: $('#search-name').val()
                },
                beforeSend: function() {
                    $('#data').html("")
                    $('#loading').html(showLoading())
                    $('#pagination').html('')
                },
                success: function(response) {
                    var subcategory = response.data.data
                    $('#loading').html("")
                    if (response.data.data.length > 0) {
                        $.each(response.data.data, function(index, data) {
                            $('#data').append(rowSubKategori(index, data))
                        })
                        $('#pagination').html(handlePaginate(response.data.paginate))


                        $('.btn-edit').click(function() {
                            var SubCategoryId = $(this).data('id');
                            var data = subcategory.find(subcategory => subcategory.id === SubCategoryId)

                            setFormValues('form-update', data)
                            $('#form-update').data('id', data['id'])

                            $('#modal-update').modal('show')
                        })

                        $('.btn-delete').click(function() {
                            $('#form-delete').data('id', $(this).data('id'))
                            $('#modal-delete').modal('show')
                        })
                    } else {
                        $('#loading').html(showNoData('Tidak ada data'))
                    }
                }
            })
        }

        function rowSubKategori(index, data) {
            let subCategory = ""
            return `
        <tr>
                    <td>${index + 1}</td>
                    <td>${data.name}</td>
                    <td>
                        <!-- Edit Modal toggle -->
                        <button id="btn-edit-${data.id}" data-id="${data.id}" style="background-color: #FFD643;" class="btn btn-edit text-white me-2">
                            <path fill="currentColor" d="M3 17.25V21h3.75L17.81 9.94l-3.75-3.75zM20.71 7.04a.996.996 0 0 0 0-1.41l-2.34-2.34a.996.996 0 0 0-1.41 0l-1.83 1.83l3.75 3.75z"/>
                            Edit
                        </button>
                        <button data-id="${data.id}" type="submit" style="background-color: #EF6E6E"
                            class="btn btn-delete text-white me-2">Hapus</button>
                    </td>
        </tr>
        `
        }


        $('#form-create').submit(function(e) {
            $('.preloader').show();
            e.preventDefault();

            $.ajax({
                url: "{{ route('subkategori.store') }}",
                type: "POST",
                data: $(this).serialize(),
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

        $('#form-delete').submit(function(e) {
            $('.preloader').show()
            e.preventDefault()
            const id = $(this).data('id')
            $.ajax({
                url: "/SubKategori/" + id,
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
                url: "/SubKategori/" + id,
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

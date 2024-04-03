@extends('layouts.admin.app')

@section('style')
    <style>
        .card-table{
            background-color: #fff;
            padding: 25px;
            border-radius: 10px;
        }
        .table-border{
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

    <div class="card-table shadow-sm">
        <div class="d-flex justify-content-between">

            <div class="d-flex justify-content-start gap-2 ">
                <form>
                    <div class="input-group">
                        <input type="text" name="search" id="search-name" class="form-control search-chat py-2 px-5 ps-5"
                            value="{{ request('search') }}" placeholder="Search">
                        <i class="ti ti-search position-absolute top-50 translate-middle-y fs-6 text-dark ms-3"></i>
                    </div>
                </form>
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
                    <th class="text-white" style="background-color: #175A95; border-radius: 0 5px 5px 0">Actions</th>
                </tr>
            </thead>
            <tbody id="data">

            </tbody>
        </table>
        <div id="loading"></div>
        <div class="d-flex justify-content-end">
            <nav id="pagination">
            </nav>
        </div>
    </div>

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
                    <form method="post" id="form-detail">
                        @method('put')
                        @csrf
                        <div class="modal-body">
                            <div class="row container">

                                <div class="col-md-12 col-lg-12 mb-4">
                                    <div class="d-flex justify-content-center">
                                        <img src="{{ asset(Auth::user()->photo ? 'storage/' . Auth::user()->photo : 'default.png') }}"
                                            alt="photo" width="180" height="180"
                                            style="border-radius: 50%; object-fit:cover;" />
                                        {{-- <img src="{{ asset('assets/img/news/single-news-1.webp') }}" width="180" height="180" style="border-radius: 50%;" alt="photo"> --}}
                                    </div>
                                </div>

                                <div class="col-md-12 col-lg-6 mb-3">
                                    <label class="form-label" for="nomor">Nama</label>
                                    <input type="text" id="name" name="name" placeholder="nama"
                                        value="{{ old('name') }}" class="form-control" readonly>
                                </div>

                                <div class="col-md-12 col-lg-6 mb-3">
                                    <label class="form-label" for="nomor">Nomor Telepon</label>
                                    <input type="text" id="nomor" name="nomor" placeholder="nomor telepon"
                                        value="{{ old('nomor') }}" class="form-control" readonly>
                                </div>

                                <div class="col-md-12 col-lg-6 mb-3">
                                    <label class="form-label" for="nomor">Email</label>
                                    <input type="text" id="email" name="email" placeholder="email"
                                        value="{{ old('name') }}" class="form-control" readonly>
                                </div>

                                <div class="col-md-12 col-lg-12 from-group mb-3">
                                    <label class="form-label" for="alamat">Alamat</label>
                                    <textarea name="alamat" id="alamat" rows="6" class="form-control" style="resize: none" readonly>{{ old('alamat') }}</textarea>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" style="background-color: #C9C9C9;" class="btn"
                                data-bs-dismiss="modal">Batal</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        {{-- <div class="page d-flex mt-4">
            <div class="container">
                <div class="d-flex justify-content-end gap-2">
                    <a href="{{ $authors->previousPageUrl() }}" style="background-color: #175A95"
                        class="btn text-white">
                    </a>
                    @for ($i = 1; $i <= $authors->lastPage(); $i++)
                        <a href="{{ $authors->url($i) }}"
                            class="btn btn-black {{ $authors->currentPage() == $i ? 'active' : '' }}">{{ $i }}</a>
                    @endfor
                    <a href="{{ $authors->nextPageUrl() }}" style="background-color: #175A95"
                        class="btn text-white">
                    </a>
                </div>
            </div>
        </div> --}}

        <x-delete-modal-component />
    </div>

        <!-- Detail Modal -->
{{-- <div class="modal fade" id="modal-detail" tabindex="-1" aria-labelledby="modal-detailLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h3 class="modal-title">Detail Data Penulis</h3>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <!-- Modal Body -->
            <div class="modal-body">
                <div class="d-flex justify-content-center">
                    <img src="" class="rounded-circle mb-2" id="detail-photo" width="150" alt="photo-penulis" height="150" />
                </div>
                <div class="container-fluid">
                    <div class="row">
                        <div class="col">
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item" style="font-weight: bold;">Nama: <span id="detail-name" style="font-weight: normal;"></span></li>
                                <li class="list-group-item" style="font-weight: bold;">Email: <span id="detail-email" style="font-weight: normal;"></span></li>
                                <li class="list-group-item" style="font-weight: bold;">Nomor Telepon: <span id="detail-phone_number" style="font-weight: normal;"></span></li>
                            </ul>
                        </div>
                        <div class="col">
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item" style="font-weight: bold;">Tanggal Lahir: <span id="detail-birth_date" style="font-weight: normal;"></span></li>
                                <li class="list-group-item" style="font-weight: bold;">Alamat: <span id="detail-address" style="font-weight: normal;"></span></li>
                                <li class="list-group-item" style="font-weight: bold;">Status: <span id="detail-status" style="font-weight: normal;"></span></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Modal Footer -->
            <div class="modal-footer">
                <button type="button" class="btn" style="background-color: #C9C9C9;" data-bs-dismiss="modal">Batal</button>
            </div>
        </div>
    </div>
</div>
<x-delete-modal-component />
</div> --}}
@endsection

@section('script')
    <script>
        // $('.btn-detail').click(function() {
        //     const formData = getDataAttributes($(this).attr('id'))
        //     var actionUrl = `user/${formData['id']}`;
        //     console.log(formData);
        //     $('#form-detail').attr('action', actionUrl);

        //     setFormValues('form-detail', formData)
        //     $('#form-detail').data('id', formData['id'])
        //     $('#form-detail').attr('action', );
        //     $('#modal-detail').modal('show')
        // })

        // $('.btn-update').click(function() {
        //     const formData = getDataAttributes($(this).attr('id'))
        //     var actionUrl = `user/${formData['id']}`;
        //     console.log(formData);
        //     $('#form-update').attr('action', actionUrl);

        //     setFormValues('form-update', formData)
        //     $('#form-update').data('id', formData['id'])
        //     $('#form-update').attr('action', );
        //     $('#modal-update').modal('show')
        // })


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
                url: "{{ route('author.admin.list') }}?page=" + page,
                method: 'Get',
                dataType: "JSON",
                data:{
                    category:$('#search-name').val(),
                    status : 'panding'
                },
                beforeSend: function() {
                    $('#data').html("")
                    $('#loading').html(showLoading())
                    $('#pagination').html('')
                },
                success: function(response) {
                    var category = response.data.data
                    $('#loading').html("")
                    if (response.data.data.length > 0) {
                        $.each(response.data.data, function(index, data) {
                            $('#data').append(rowNewsApproved(index, data))
                        })
                        $('#pagination').html(handlePaginate(response.data.paginate))


                        // $('.btn-edit').click(function() {
                        //     var CategoryId = $(this).data('id');
                        //     var data = category.find(category => category.id === CategoryId)

                        //     setFormValues('form-update', data)
                        //     $('#form-update').data('id', data['id'])

                        //     $('#modal-update').modal('show')
                        // })
                        
                        $('.btn-detail').click(function() {
                        var authorId = $(this).data('id');
                        // Asumsikan 'category' adalah array objek penulis, pastikan itu didefinisikan dan dapat diakses di cakupan ini.
                        var data = category.find(author => author.id === authorId);

                        if (data) { // Pastikan data ditemukan
                            // Perbarui konten modal
                            $('#detail-photo').attr('src', data.photo); // Foto
                            $('#detail-name').text(data.name); // Nama
                            $('#detail-email').text(data.email); // Email
                            $('#detail-birth_date').text(data.birth_date); // Tanggal Lahir
                            $('#detail-address').text(data.address); // Alamat

                            // Jika Anda memutuskan untuk menampilkan phone_number dan status, pastikan untuk menambahkan elemen-elemen tersebut dalam HTML Anda dan memperbaruinya di sini juga.

                            // Tampilkan modal
                            $('#modal-detail').modal('show');
                        } else {
                            console.error('Tidak ada data penulis yang ditemukan dengan id:', authorId);
                        }
                    });

                        // $('.btn-delete').click(function() {
                        //     $('#form-delete').data('id', $(this).data('id'))
                        //       $('#modal-delete').modal('show')
                        // })
                    } else {
                        $('#loading').html(showNoData('Tidak ada data'))
                    }
                }
            })
        }

        function rowNewsApproved(index, data) {
            return `
            <tr>
                <td>${index + 1}</td>
                <td>${data.name}</td>
                <td>${data.email}</td>
                <td>
                    <button data-bs-toggle="tooltip" data-id="${data.id}" title="Detail" class="btn btn-sm btn-primary btn-detail me-2" style="background-color:#0F4D8A">
                        <i><svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24"><path fill="currentColor" d="M12 6.5a9.77 9.77 0 0 1 8.82 5.5c-1.65 3.37-5.02 5.5-8.82 5.5S4.83 15.37 3.18 12A9.77 9.77 0 0 1 12 6.5m0-2C7 4.5 2.73 7.61 1 12c1.73 4.39 6 7.5 11 7.5s9.27-3.11 11-7.5c-1.73-4.39-6-7.5-11-7.5m0 5a2.5 2.5 0 0 1 0 5a2.5 2.5 0 0 1 0-5m0-2c-2.48 0-4.5 2.02-4.5 4.5s2.02 4.5 4.5 4.5s4.5-2.02 4.5-4.5s-2.02-4.5-4.5-4.5"/></svg></i>
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

        $('#form-update').submit(function(e) {
            $('.preloader').show()
            e.preventDefault()
            const id = $(this).data('id')
            $.ajax({
                url: "kategori/" + id,
                type: 'PUT',
                data:$(this).serialize(),
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

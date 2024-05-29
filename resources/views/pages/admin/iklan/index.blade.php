@extends('layouts.admin.app')
@section('content')

<div class="d-flex gap-2">
    <form class="d-flex gap-2">
        <div>
            <div class="position-relative d-flex">
                <div class="input-group">
                    <input type="text" name="search"
                        class="form-control search-chat py-2 px-5 ps-5" style="width: 200px" id="search-name" placeholder="Search">
                    <i class="ti ti-search position-absolute top-50 translate-middle-y fs-6 text-dark ms-3"></i>
                </div>
            </div>
        </div>

        <div>
            <div class="d-flex gap-2">
                <select class="form-select" id="opsi-latest" style="width: 200px">
                    <option disabled>Pilih opsi</option>
                    <option value="terbaru">Terbaru</option>
                    <option value="terlama">Terlama</option>
                </select>
            </div>
        </div>

        <div>
            <div class="d-flex gap-2">
                <select class="form-select" id="opsi-jenis" style="width: 200px">
                    <option disabled>Pilih jenis</option>
                    <option value="foto">Foto</option>
                    <option value="vidio">Video</option>
                </select>
            </div>
        </div>
    </form>
</div>

<div class="modal fade" id="modal-detail" tabindex="-1" aria-labelledby="modal-detail Label"
    aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <!-- Modal content -->
            <div class="modal-header">
                <h3 class="modal-title">Detail data User</h3>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <!-- Modal body -->
            <div class="modal-body">
                <div class="d-flex justify-content-center">
                    <img src="" id="detail-photo" width="150"
                        alt="" height="150" />
                </div>
                <div class="container-fluid">
                    <div class="row">
                        <div class="col">
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item" style="font-weight: bold;">Jenis Iklan : <span
                                        id="detail-type" style="font-weight: normal;"></span>
                                </li>
                                <li class="list-group-item" style="font-weight: bold;">Nomer Telepon : <span
                                    id="detail-phone_number" style="font-weight: normal;"></span>
                            </li>
                            </ul>
                        </div>
                        <div class="col">
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item" style="font-weight: bold;">Email: <span
                                    id="detail-email" style="font-weight: normal;"></span></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light-danger mt-3 text-danger"
                    data-bs-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>

<div class="table-responsive rounded-2 mt-4">
    <table class="table border text-nowrap customize-table mb-0 align-middle ">
        <thead>
            <tr>
                <th style="background-color: #D9D9D9;">No</th>
                <th style="background-color: #D9D9D9;">Jenis Iklan</th>
                <th style="background-color: #D9D9D9;">Halaman</th>
                <th style="background-color: #D9D9D9;">Posisi Iklan</th>
                <th style="background-color: #D9D9D9;">Tanggal Awal</th>
                <th style="background-color: #D9D9D9;">Tanggal Akhir</th>
                <th style="background-color: #D9D9D9;">Url</th>
                <th style="background-color: #D9D9D9;">Aksi</th>
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

<div class="modal fade" id="modal-delete" tabindex="-1" aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <form id="form-delete" method="POST" class="modal-content">
            @csrf
            @method('DELETE')
            <div class="modal-header d-flex align-items-center">
                <h4 class="modal-title" id="myModalLabel">
                    Hapus data
                </h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <p>Apakah anda yakin akan menghapus data ini?  </p>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light-danger text-danger font-medium waves-effect" data-bs-dismiss="modal">
                    Batal
                </button>
                <button type="submit" class="btn btn-light-danger text-secondery font-medium waves-effect" data-bs-dismiss="modal">
                    Hapus
                </button>
            </div>
        </form>
    </div>
</div>
@endsection



@section('script')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-pzjw8V+VbWFr6J3QKZZxCpZ8F+3t4zH1t03eNV6zEYl5S+XnvLx6D5IT00jM2JpL" crossorigin="anonymous">
    </script>

    <script>
        get(1)
        let debounceTimer;

        $('#search-name').keyup(function() {
            clearTimeout(debounceTimer);
            debounceTimer = setTimeout(function() {
                get(1)
            }, 500);
        });

        $('#opsi-latest').change(function() {
            clearTimeout(debounceTimer);
            debounceTimer = setTimeout(function() {
                get(1)
            }, 500);
        });

        $('#opsi-jenis').change(function() {
            clearTimeout(debounceTimer);
            debounceTimer = setTimeout(function() {
                get(1)
            }, 500);
        });

        function get(page) {
            $.ajax({
                url: "{{ route('iklan.admin.approved') }}?page=" + page,
                method: 'Get',
                dataType: "JSON",
                data: {
                    name: $('#search-name').val(),
                    latest: $('#opsi-latest').val(),
                    jenis: $('#opsi-jenis').val()
                },
                beforeSend: function() {
                    $('#data').html("")
                    $('#loading').html(showLoading())
                    $('#pagination').html('')
                },
                success: function(response) {
                    var name = response.data.data
                    $('#loading').html("")
                    if (response.data.data.length > 0) {
                        console.log(response.data.data);
                        $.each(response.data.data, function(index, data) {
                            $('#data').append(rowTag(index, data))
                        })
                        $('#pagination').html(handlePaginate(response.data.paginate))

                        $('.btn-detail').click(function() {
                            var iklanId = $(this).data('id');
                            var data = name.find(name => name.id === iklanId)
                            handleDetail(data)
                            const detailType = document.getElementById("detail-type");
                            detailType.src = data['type'];
                            $('#modal-detail').modal('show')
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

        function limitString(str, maxLength) {
            return str.length > maxLength ? str.substring(0, maxLength) + '...' : str;
        }

        function rowTag(index, data) {
            console.log(data);
            return `
            <tr>
                <td>${index + 1}</td>
                <td>${data.type}</td>
                <td>${data.page}</td>
                <td>${data.position}</td>
                <td>${data.start_date}</td>
                <td>${data.end_date}</td>
                <td>${data.url}</td>
                <td>
                    <div class="d-flex gap-2">
                            <button data-id="${data.id}" style="background-color: #EF6E6E"
                                class="btn btn-sm btn-delete text-white ms-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24"><path fill="#ffffff" d="M7 21q-.825 0-1.412-.587T5 19V6q-.425 0-.712-.288T4 5q0-.425.288-.712T5 4h4q0-.425.288-.712T10 3h4q.425 0 .713.288T15 4h4q.425 0 .713.288T20 5q0 .425-.288.713T19 6v13q0 .825-.587 1.413T17 21zM17 6H7v13h10zm-7 11q.425 0 .713-.288T11 16V9q0-.425-.288-.712T10 8q-.425 0-.712.288T9 9v7q0 .425.288.713T10 17m4 0q.425 0 .713-.288T15 16V9q0-.425-.288-.712T14 8q-.425 0-.712.288T13 9v7q0 .425.288.713T14 17M7 6v13z"/></svg>
                            </button>

                            <button data-bs-toggle="tooltip" data-id="${data.id}" title="Detail" class="btn btn-sm btn-primary btn-detail me-2" style="background-color:#5D87FF">
                                <i><svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 24 24"><path fill="currentColor" d="M12 6.5a9.77 9.77 0 0 1 8.82 5.5c-1.65 3.37-5.02 5.5-8.82 5.5S4.83 15.37 3.18 12A9.77 9.77 0 0 1 12 6.5m0-2C7 4.5 2.73 7.61 1 12c1.73 4.39 6 7.5 11 7.5s9.27-3.11 11-7.5c-1.73-4.39-6-7.5-11-7.5m0 5a2.5 2.5 0 0 1 0 5a2.5 2.5 0 0 1 0-5m0-2c-2.48 0-4.5 2.02-4.5 4.5s2.02 4.5 4.5 4.5s4.5-2.02 4.5-4.5s-2.02-4.5-4.5-4.5"/></svg></i>
                            </button>
                    </div>
                </td>
            </tr>
        `
        }

        $('#form-delete').submit(function(e) {
            $('.preloader').show()
            e.preventDefault()
            const id = $(this).data('id')
            $.ajax({
                url: "delete-iklan-admin/" + id,
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

    </script>
@endsection

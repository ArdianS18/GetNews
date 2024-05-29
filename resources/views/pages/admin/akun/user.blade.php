@extends('layouts.admin.app')

@section('content')
<div class="">
    <div class="d-flex gap-2 mb-3 mt-2">
        <form class="d-flex gap-2">
            <div>
                <div class="position-relative d-flex">
                    <div class="">
                        <input type="text" name="search"
                            class="form-control search-chat py-2 px-5 ps-5" id="search-name" placeholder="Search">
                        <i class="ti ti-search position-absolute top-50 translate-middle-y fs-6 text-dark ms-3"></i>
                    </div>
                </div>
            </div>
            <div>
                <div class="d-flex gap-2">
                    <select class="form-select" id="opsi" style="width: 200px">
                        <option value="terbaru">Terbaru</option>
                        <option value="terlama">Terlama</option>
                    </select>
                </div>
            </div>
        </form>
    </div>
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
                    <img src="" class="rounded-circle mb-4" id="detail-photo" width="150"
                        alt="photo-siswa" height="150" />
                </div>
                <div class="container-fluid">
                    <div class="row">
                        <div class="col">
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item" style="font-weight: bold;">Nama : <span
                                        id="detail-name" style="font-weight: normal;"></span>
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
    <table class="table border text-nowrap customize-table mb-0 align-middle">
        <thead>
            <tr>
                <th style="background-color: #D9D9D9;">No</th>
                <th style="background-color: #D9D9D9;">Nama</th>
                <th style="background-color: #D9D9D9;">Email</th>
                <th style="background-color: #D9D9D9;">Nomer Telepon</th>
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

    $('#opsi').change(function() {
            get(1)
    });

    function get(page) {
        $.ajax({
            url: "{{ route('account.user') }}?page=" + page,
            method: 'Get',
            dataType: "JSON",
            data: {
                name: $('#search-name').val(),
                opsi: $('#opsi').val()
            },
            beforeSend: function() {
                $('#data').html("")
                $('#loading').html(showLoading())
                $('#pagination').html('')
            },
            success: function(response) {
                var faq = response.data.data
                $('#loading').html("")
                if (response.data.data.length > 0) {
                    $.each(response.data.data, function(index, data) {
                        $('#data').append(rowFaq(index, data))
                    })
                    $('#pagination').html(handlePaginate(response.data.paginate))

                    $('.btn-detail').click(function() {
                            var userId = $(this).data('id');
                            var data = faq.find(faq => faq.id === userId)
                            handleDetail(data)
                            const detailPhoto = document.getElementById("detail-photo");
                            detailPhoto.src = data['photo'];
                            $('#modal-detail').modal('show')
                    })
                } else {
                    $('#loading').html(showNoData('Tidak ada data'))
                }
            }
        })
    }

    function rowFaq(index, data) {
        return `
        <tr>
            <td>${index + 1}</td>
            <td>
                <img src="${data.photo}" class="rounded-circle me-2 user-profile" style="object-fit: cover" width="35" height="35" alt="" />
                ${data.name}
            </td>
            <td>${data.email}</td>
            <td>${data.phone_number}</td>
            <td>
                <button data-bs-toggle="tooltip" data-id="${data.id}" title="Detail" class="btn btn-sm btn-primary btn-detail me-2" style="background-color:#5D87FF">
                    <i><svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 24 24"><path fill="currentColor" d="M12 6.5a9.77 9.77 0 0 1 8.82 5.5c-1.65 3.37-5.02 5.5-8.82 5.5S4.83 15.37 3.18 12A9.77 9.77 0 0 1 12 6.5m0-2C7 4.5 2.73 7.61 1 12c1.73 4.39 6 7.5 11 7.5s9.27-3.11 11-7.5c-1.73-4.39-6-7.5-11-7.5m0 5a2.5 2.5 0 0 1 0 5a2.5 2.5 0 0 1 0-5m0-2c-2.48 0-4.5 2.02-4.5 4.5s2.02 4.5 4.5 4.5s4.5-2.02 4.5-4.5s-2.02-4.5-4.5-4.5"/></svg></i>
                </button>
            </td>
        </tr>
    `
    }
</script>
@endsection

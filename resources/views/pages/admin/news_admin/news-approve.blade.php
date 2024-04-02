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

@section('content')
    <div class="card-table">
        <div class="d-flex gap-2 mb-3 mt-2">
            <form class="d-flex">
                <div class="input-group">
                    <input type="text" name="search" id="search-name" class="form-control search-chat py-2 px-5 ps-5"
                        value="{{ request('search') }}" placeholder="Search">
                    <i class="ti ti-search position-absolute top-50 translate-middle-y fs-6 text-dark ms-3"></i>
                </div>
            </form>
        </div>
    </div>

    <div class="card-table mt-4 shadow-sm">
        <div class="table-border mb-3">
            <table class="table">
                <thead class="table">
                    <tr>
                        <th class="text-white" style="background-color: #175A95; border-radius: 5px 0 0 5px;">No</th>
                        <th class="text-white" style="background-color: #175A95;">Penulis</th>
                        <th class="text-white" style="background-color: #175A95;">Email</th>
                        <th class="text-white" style="background-color: #175A95;">Judul berita</th>
                        <th class="text-white" style="background-color: #175A95;">Tanggal Upload</th>
                        <th class="text-white" style="background-color: #175A95; border-radius: 0 5px 5px 0;">Option</th>
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
    </div>
@endsection

@section('script')
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-pzjw8V+VbWFr6J3QKZZxCpZ8F+3t4zH1t03eNV6zEYl5S+XnvLx6D5IT00jM2JpL" crossorigin="anonymous">
</script>

<script>
    $(document).ready(function() {
        $('#synopsis').summernote({
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
                url: "{{ route('list.approved.index') }}?page=" + page,
                method: 'Get',
                dataType: "JSON",
                data:{
                    category:$('#search-name').val()
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


                        $('.btn-edit').click(function() {
                            var CategoryId = $(this).data('id');
                            var data = category.find(category => category.id === CategoryId)

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

        function rowNewsApproved(index, data) {
            return `
            <tr>
                <td>${index + 1}</td>
                <td>${data.author_name}</td>
                <td>${data.email}</td>
                <td>${data.name}</td>
                <td>${data.upload_date}</td>
                <td>
                    <button data-id="${data.id}" type="submit" style="background-color: #EF6E6E"
                        class="btn btn-sm btn-delete text-white me-2">
                        <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24"><path fill="#ffffff" d="M7 21q-.825 0-1.412-.587T5 19V6q-.425 0-.712-.288T4 5q0-.425.288-.712T5 4h4q0-.425.288-.712T10 3h4q.425 0 .713.288T15 4h4q.425 0 .713.288T20 5q0 .425-.288.713T19 6v13q0 .825-.587 1.413T17 21zM17 6H7v13h10zm-7 11q.425 0 .713-.288T11 16V9q0-.425-.288-.712T10 8q-.425 0-.712.288T9 9v7q0 .425.288.713T10 17m4 0q.425 0 .713-.288T15 16V9q0-.425-.288-.712T14 8q-.425 0-.712.288T13 9v7q0 .425.288.713T14 17M7 6v13z"/></svg>
                    </button>
                        <a href="/detail-news-admin/${data.id}" data-id="${data.id}" data-bs-toggle="tooltip" title="Sub Category" class="btn btn-sm btn-primary btn-detail" style="background-color: #0F4D8A;">
                            <i><svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24"><path fill="currentColor" d="M12 6.5a9.77 9.77 0 0 1 8.82 5.5c-1.65 3.37-5.02 5.5-8.82 5.5S4.83 15.37 3.18 12A9.77 9.77 0 0 1 12 6.5m0-2C7 4.5 2.73 7.61 1 12c1.73 4.39 6 7.5 11 7.5s9.27-3.11 11-7.5c-1.73-4.39-6-7.5-11-7.5m0 5a2.5 2.5 0 0 1 0 5a2.5 2.5 0 0 1 0-5m0-2c-2.48 0-4.5 2.02-4.5 4.5s2.02 4.5 4.5 4.5s4.5-2.02 4.5-4.5s-2.02-4.5-4.5-4.5"/></svg></i>
                        </a>
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

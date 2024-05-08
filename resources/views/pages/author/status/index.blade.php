@extends('layouts.author.sidebar')

@section('style')
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
    <style>
        .news-card-a {
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border: 1px solid #ddd;
            border-radius: 10px;
            padding: 2%;
            align-items: center;
            background-color: #fff;
        }

        .card-detail img {
            max-width: 100%;
            /* Maksimum lebar adalah 100% dari lebar elemen induknya */
            max-height: 100%;
            height: auto;
            /* Ketinggian otomatis */
            border-radius: ;
            /* Ganti dengan nilai yang sesuai */
        }

        @media (max-width: 767px) {
            .card-detail img {
                width: 100%;
                /* Menyempitkan lebar saat di tampilan mobile */
            }
        }
    </style>
@endsection

<head>
    <title>Author | Status News</title>
</head>

@section('content')
    <form class="d-flex gap-2">
        <div>
            <div class="position-relative d-flex">
                <div class="input-group">
                    <input type="text" name="name" class="form-control search-chat py-2 ps-5" style="width: 200px"
                        id="search-name" placeholder="Search">
                    <i class="ti ti-search position-absolute top-50 translate-middle-y fs-6 text-dark ms-3"></i>
                </div>
            </div>
        </div>
        <div>
            <div class="d-flex gap-2">
                <select class="form-select" id="status" style="width: 200px" name="status">
                    <option value="">Tampilkan semua</option>
                    <option value="panding">Panding</option>
                    <option value="active">Approved</option>
                    <option value="nonactive">Reject</option>
                </select>
            </div>
        </div>
        {{-- <button type="submit" class="btn btn-outline-primary">Pilih</button> --}}
    </form>

    <div class="tab-pane" id="data">

    </div>

    <div class="loading">
        <div class="d-flex mt-2 justify-content-end">
            <nav id="pagination">
            </nav>
        </div>
    </div>


    <x-delete-modal-component />
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

        $('#status').change(function() {
            get(1)
        });

        function get(page) {
            $.ajax({
                url: '{{ route('list.news.author') }}?page='+page,
                methode: 'GET',
                dataType: 'JSON',
                data: {
                    name: $('#search-name').val(),
                    status: $('#status').val()
                },
                beforeSend: function() {
                    $('#data').html('')
                    $('#loading').html(showLoading())
                    $('#pagination').html('')
                },
                success: function(response) {
                    if (response.data.data.length > 0) {
                        $.each(response.data.data, function(index, data) {
                            $('#data').append(cardNews(data))
                        })
                        $('#pagination').html(handlePaginate(response.data.paginate))
                    } else {
                        $('#loading').html(showNoData('Tidak ada data'))
                    }
                    $('.btn-delete').click(function() {
                        $('#form-delete').data('id', $(this).data('id'))
                        $('#modal-delete').modal('show')
                    })
                }
            })
        }

        $('#form-delete').submit(function(e) {
            $('.preloader').show()
            e.preventDefault()
            const id = $(this).data('id')
            var url = "{{ route('profile.news.delete', ['news' => ':id']) }}";
            url = url.replace(':id', id);

            $.ajax({
                url: url,
                type: 'POST',
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
                    Swal.fire({
                        title: 'Error!',
                        icon: 'error',
                        text: "Gagal menghapus data,Data sedang di gunakan"
                    })
                }
            })
        })

        function cardNews(data) {
            let status, text;
            if (data.status == 'active') {
                status = ' bg-light-success text-success',
                    text = 'Aktif'
            } else if (data.status == 'reject') {
                status = ' bg-light-danger text-danger'
                text = 'Tolak'
            } else if (data.status == 'draft') {
                status = 'bg-light-secondary text-secondary'
                text = 'Draft'
            } else {
                status = 'bg-light-warning fs-2 text-warning'
                text = 'Panding'
            }
            var detail = "{{ route('detail.news', ['news' => ':slug']) }}";
            detail = detail.replace(':slug', data.slug);
            var edit = "{{ route('profile.news.edit', ['newsId' => ':slug']) }}";
            edit = edit.replace(':slug', data.slug);

            return `
            <div class="card p-4 mt-4">
                <div class="row">
                    <div class="col-lg-2">
                        <div class="" style="margin-left: 2%;">
                                <img src="${data.photo}" alt="" style="object-fit:cover;" width="100%" height="120">
                        </div>
                    </div>
                    <div class="col-md-12 col-lg-8">
                        <div class="d-flex">
                            <div class="order-md-1" style="margin-left:20px;">
                                <h4>${data.name}</h4>
                                <p>${data.content}</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12 col-lg-2 mt-3 mt-lg-0 ">
                        <div class="d-flex justify-content-end">
                            <div class="text-md-right mt-md-0">
                                <span class="badge fw-bold ${status} fs-5">${text}</span>
                            </div>
                        </div>

                        <div class="mt-3 d-flex justify-content-end">
                            <svg xmlns="http://www.w3.org/2000/svg" width="23" height="23" viewBox="0 0 512 512">
                                <path
                                    d="M368.005 272h-96v96h96v-96zm-32-208v32h-160V64h-48v32h-24.01c-22.002 0-40 17.998-40 40v272c0 22.002 17.998 40 40 40h304.01c22.002 0 40-17.998 40-40V136c0-22.002-17.998-40-40-40h-24V64h-48zm72 344h-304.01V196h304.01v212z"
                                    fill="#0f4d89" />
                            </svg>
                            <p class="ms-2 fs-3"> Apr 25, 2023</p>
                        </div>

                        <div class="d-flex justify-content-end">
                            <button class="btn btn-sm m-1" style="background-color: #0F4D8A;">
                                <a href="${detail}">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="23"
                                        viewBox="0 0 512 512">
                                        <path fill="none" stroke="#ffffff" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="32"
                                            d="M255.66 112c-77.94 0-157.89 45.11-220.83 135.33a16 16 0 0 0-.27 17.77C82.92 340.8 161.8 400 255.66 400c92.84 0 173.34-59.38 221.79-135.25a16.14 16.14 0 0 0 0-17.47C428.89 172.28 347.8 112 255.66 112" />
                                        <circle cx="256" cy="256" r="80" fill="none" stroke="#ffffff"
                                            stroke-miterlimit="10" stroke-width="32" />
                                    </svg>
                                </a>
                            </button>

                            <a href="${edit}" class="btn btn-sm m-1"
                                style="background-color: #FFD643;">
                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="23" viewBox="0 0 512 512">
                                    <path
                                        d="M64 368v80h80l235.727-235.729-79.999-79.998L64 368zm377.602-217.602c8.531-8.531 8.531-21.334 0-29.865l-50.135-50.135c-8.531-8.531-21.334-8.531-29.865 0l-39.468 39.469 79.999 79.998 39.469-39.467z"
                                        fill="#ffffff" />
                                </svg>
                            </a>
                                <button type="submit" class="btn btn-sm m-1 btn-delete" data-id=${data.id} style="background-color: #C94F4F;"><svg
                                        xmlns="http://www.w3.org/2000/svg" width="18" height="23"
                                        viewBox="0 0 512 512">
                                        <path
                                            d="M128 405.429C128 428.846 147.198 448 170.667 448h170.667C364.802 448 384 428.846 384 405.429V160H128v245.429zM416 96h-80l-26.785-32H202.786L176 96H96v32h320V96z"
                                            fill="#ffffff" />
                                    </svg></button>
                        </div>
                    </div>
                </div>
            </div>
            `
        }
    </script>
@endsection

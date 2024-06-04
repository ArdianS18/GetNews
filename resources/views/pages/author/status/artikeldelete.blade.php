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
            max-height: 100%;
            height: auto;
            border-radius: ;
        }

        @media (max-width: 767px) {
            .card-detail img {
                width: 100%;
            }
        }
    </style>
@endsection

<head>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <title>Author | Delete Artikel</title>
</head>

@section('content')
    <div class="alert alert-warning d-flex align-items-center p-3">
        <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" viewBox="0 0 84 84" fill="none">
            <circle cx="42" cy="42" r="40" stroke="#FFAE1F " stroke-width="4" />
            <circle cx="42.1422" cy="59.5001" r="4.9" fill="#FFAE1F " />
            <path
                d="M36.7667 22.6095C36.6449 20.9852 37.93 19.6001 39.5589 19.6001L44.0975 19.6001C45.6988 19.6001 46.974 20.9406 46.894 22.5399L45.774 44.9399C45.6995 46.4301 44.4696 47.6001 42.9775 47.6001H41.2389C39.7737 47.6001 38.5563 46.4706 38.4467 45.0095L36.7667 22.6095Z"
                fill="#FFAE1F " />
        </svg>
        <div class="d-flex flex-column ms-3">
            <h5 class="text-warning" style="font-weight: 600;">Berita Dihapus</h5>
            <h6 class="text-warning" style="font-weight: bold; font-size:18px;">Berita yang dihapus akan hilang permanen
                secara otomatis setelah 30 hari</h6>
        </div>
    </div>
    <form class="d-flex gap-2">
        <div>
            <div class="position-relative d-flex">
                <div class="">
                    <input type="text" name="name" class="form-control search-chat py-2 ps-5" style="width: 200px"
                        id="search-name" placeholder="Search">
                    <i class="ti ti-search position-absolute top-50 translate-middle-y fs-6 text-dark ms-3"></i>
                </div>
            </div>
        </div>
    </form>

    <div class="tab-pane" id="data">

    </div>

    <div id="loading">
    </div>
    <div class="d-flex mt-2 justify-content-end">
        <nav id="pagination">
        </nav>
    </div>


    <x-delete-modal-component />
    @endsection
    @section('script')
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                @if (session('success'))
                    Swal.fire({
                        title: 'Success!',
                        text: '{{ session('success') }}',
                        icon: 'success',
                        confirmButtonText: 'OK'
                    });
                @endif

                @if (session('draft'))
                    Swal.fire({
                        title: 'Success Draft!',
                        text: '{{ session('draft') }}',
                        icon: 'warning',
                        confirmButtonText: 'OK'
                    });
                @endif
            });
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

            $('#loading').html('ha')

          
            function get(page) {
                $.ajax({
                    url: '{{ route('list.artikel.delete') }}?page=' + page,
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
                            $('.btn-delete').click(function() {
                            $('#form-delete').data('id', $(this).data('id'))
                            $('#modal-delete').modal('show')
                        })
                        $('.btn-edit').click(function() {
                            const id = $(this).data('id');
                            Swal.fire({
                                title: 'Apakah Anda yakin?',
                                text: 'Data akan dipulihkan.',
                                icon: 'warning',
                                showCancelButton: true,
                                confirmButtonColor: '#3085d6',
                                cancelButtonColor: '#d33',
                                confirmButtonText: 'Ya, Pulihkan!'
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    restore(id);
                                }
                            });
                        })
                        } else {
                            $('#loading').html(showNoData('Tidak ada data'))
                        }
                        
                    }
                })
            }

            function restore(id) {
                $('.preloader').show()
                url = "{{ route('profile.news.restore', ['news' => ':slug']) }}"
                url = url.replace(':slug', id)
                $.ajax({
                    url: url,
                    method: 'POST',
                    dataType: 'JSON',
                    success: function(response) {
                        get(1)
                        $('.preloader').hide()
                        $('#modal-delete').modal('hide')
                        Swal.fire({
                            title: 'Berhasil!',
                            icon: 'success',
                            text: response.message
                        })
                    }
                })
            }

            function limitString(str, maxLength) {
                return str.length > maxLength ? str.substring(0, maxLength) + '...' : str;
            }

            function cardNews(data) {
                let status, text;
                if (data.status == 'active') {
                    status = ' bg-light-success text-success',
                        text = 'Aktif'
                } else if (data.status == 'nonactive') {
                    status = ' bg-light-danger text-danger'
                    text = 'Tolak'
                } else if (data.status == 'draft') {
                    status = 'bg-light-secondary text-secondary'
                    text = 'Draft'
                } else {
                    status = 'bg-light-warning fs-2 text-warning'
                    text = 'Panding'
                }

                if (data.status == 'active') {
                    var detail =
                        "{{ route('news.user', ['news' => ':slug', 'year' => ':year', 'month' => ':month', 'day' => ':day']) }}";
                } else {
                    var detail = "{{ route('detail.news', ['news' => ':slug']) }}";
                }
                detail = detail.replace(':slug', data.slug);
                detail = detail.replace(':year', data.upload_date);
                detail = detail.replace(':month', data.upload_date);
                detail = detail.replace(':day', data.upload_date);
                var edit = "";
                edit = edit.replace(':slug', data.id);

                return `
            <div class="card p-4 mt-4">
                <div class="row">
                    <div class="col-lg-2">
                        <div class="mb-3">
                                <img src="${data.photo}" alt="" style="object-fit:cover;" width="100%" height="120">
                        </div>
                    </div>
                    <div class="col-md-12 col-lg-8">
                        <div class="">
                            <div class="order-md-1">
                                <h4>${limitString(data.name, 80)}</h4>
                                <p>${limitString(data.content, 500)}</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12 col-lg-2 mt-3 mt-lg-0 ">
                        <div class="d-flex justify-content-end">
                        
                        </div>

                        <div class="mt-3 d-flex justify-content-end">
                            <svg xmlns="http://www.w3.org/2000/svg" width="23" height="23" viewBox="0 0 512 512">
                                <path
                                    d="M368.005 272h-96v96h96v-96zm-32-208v32h-160V64h-48v32h-24.01c-22.002 0-40 17.998-40 40v272c0 22.002 17.998 40 40 40h304.01c22.002 0 40-17.998 40-40V136c0-22.002-17.998-40-40-40h-24V64h-48zm72 344h-304.01V196h304.01v212z"
                                    fill="#0f4d89" />
                            </svg>
                            <p class="ms-2 fs-3"> ${data.upload_date}</p>
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

                            <a  class="btn btn-sm btn-edit m-1"
                                style="background-color: #FFD643;" data-id="${data.id}">
                                <svg xmlns="http://www.w3.org/2000/svg" width="23" height="23" viewBox="0 0 24 24"><path fill="white" d="M12 14q-.825 0-1.412-.587T10 12t.588-1.412T12 10t1.413.588T14 12t-.587 1.413T12 14m0 7q-3.475 0-6.025-2.287T3.05 13H5.1q.35 2.6 2.313 4.3T12 19q2.925 0 4.963-2.037T19 12t-2.037-4.962T12 5q-1.725 0-3.225.8T6.25 8H9v2H3V4h2v2.35q1.275-1.6 3.113-2.475T12 3q1.875 0 3.513.713t2.85 1.924t1.925 2.85T21 12t-.712 3.513t-1.925 2.85t-2.85 1.925T12 21"/></svg>
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

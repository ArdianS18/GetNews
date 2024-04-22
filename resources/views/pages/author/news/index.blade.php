@extends('layouts.author.sidebar')

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
    <title>Author | Detail News</title>
</head>

@section('content')
    <div class="">
        <div class="d-flex gap-2 mb-3 mt-2">
            <form class="d-flex gap-2">
                <div>
                    <div class="position-relative d-flex">
                        <div class="input-group">
                            <input type="text" name="search"
                                class="form-control search-chat py-2 ps-5" style="width: 200px" id="search-name" placeholder="Search" value="">
                            <i class="ti ti-search position-absolute top-50 translate-middle-y fs-6 text-dark ms-3"></i>
                        </div>
                    </div>
                </div>

                <div>
                    <div class="d-flex gap-2">
                        <select class="form-select" style="width: 200px" name="opsilatest">
                            <option disabled selected value="">Pilih opsi</option>
                            <option value="terbaru">Terbaru</option>
                            <option value="terlama">Terlama</option>
                            <option value="">Tampilkan semua</option>
                        </select>
                    </div>
                </div>

                <div>
                    <div class="d-flex gap-2">
                        <select class="form-select" style="width: 200px" name="perpage">
                            <option value="10">10</option>
                            <option value="20">20</option>
                            <option value="50">50</option>
                            <option value="100">100</option>
                        </select>
                    </div>
                </div>

                <button type="submit">Pilih</button>
            </form>
        </div>
    </div>

    <div class="mt-4">
        <div class="mb-3">
            <table class="table">
                <thead>
                    <tr>
                        <th style="background-color: #D9D9D9;">No</th>
                        <th style="background-color: #D9D9D9;">Judul berita</th>
                        <th style="background-color: #D9D9D9;">Tanggal Upload</th>
                        <th style="background-color: #D9D9D9; border-radius: 0 5px 5px 0;">Option</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($news as $item)

                    <tr>
                        <td></td>
                        <td>{{ $item->news->name }}</td>
                        <td>{{ $item->news->upload_date }}</td>
                        <td>
                            <a href="/detail-news-admin/${data.id}" data-bs-toggle="tooltip"
                                title="Detail" class="btn btn-sm btn-primary btn-detail"
                                style="background-color:#0F4D8A">
                                <i><svg xmlns="http://www.w3.org/2000/svg" width="22" height="22"
                                        viewBox="0 0 24 24">
                                        <path fill="currentColor" d="M12 6.5a9.77 9.77 0 0 1 8.82 5.5c-1.65 3.37-5.02 5.5-8.82 5.5S4.83 15.37 3.18 12A9.77 9.77 0 0 1 12 6.5m0-2C7 4.5 2.73 7.61 1 12c1.73 4.39 6 7.5 11 7.5s9.27-3.11 11-7.5c-1.73-4.39-6-7.5-11-7.5m0 5a2.5 2.5 0 0 1 0 5a2.5 2.5 0 0 1 0-5m0-2c-2.48 0-4.5 2.02-4.5 4.5s2.02 4.5 4.5 4.5s4.5-2.02 4.5-4.5s-2.02-4.5-4.5-4.5" />
                                </svg></i>
                            </a>
                        </td>
                    </tr>

                    @empty
                    @endforelse
                </tbody>
        </table>

        <ul class="page-nav list-style text-center mt-20">
            <li><a href="{{ $news->previousPageUrl() }}"><i class="flaticon-arrow-left"></i></a></li>
            @for ($i = 1; $i <= $news->lastPage(); $i++)
                <li><a href="{{ $news->url($i) }}" class="btn btn-black {{ $news->currentPage() == $i ? 'active' : '' }}">{{ $i }}</a></li>
            @endfor
            <li><a href="{{ $news->nextPageUrl() }}"><i class="flaticon-arrow-right"></i></a></li>
        </ul>

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

        $(document).ready(function() {
            $('.sinop').summernote({
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
    </script>

    {{-- <script>
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



        $('#opsi-perpage').change(function() {
            clearTimeout(debounceTimer);
            debounceTimer = setTimeout(function() {
                get(1)
            }, 500);
        });

        function get(page) {
            $.ajax({
                url: "{{ route('approved-news.index') }}?page=" + page,
                method: 'Get',
                dataType: "JSON",
                data: {
                    name: $('#search-name').val(),
                    latest: $('#opsi-latest').val(),
                    perpage: $('#opsi-perpage').val()
                },
                beforeSend: function() {
                    $('#data').html("")
                    $('#loading').html(showLoading())
                    $('#pagination').html('')
                },
                success: function(response) {
                    var name = response.data.data
                    var latest = response.data.data
                    var perpage = response.data.data
                    $('#loading').html("")
                    if (response.data.data.length > 0) {
                        $.each(response.data.data, function(index, data) {
                            $('#data').append(rowTag(index, data))
                        })
                        $('#pagination').html(handlePaginate(response.data.paginate))
                    } else {
                        $('#loading').html(showNoData('Tidak ada data'))
                    }
                }
            })
        }

        function rowTag(index, data) {
            return `
            <tr>
                <td>${index + 1}</td>
                <td>${data.author_name}</td>
                <td>${data.email}</td>
                <td>${data.name}</td>
                <td>${data.upload_date}</td>
                <td>
                    <a href="/detail-news-admin/${data.id}" data-bs-toggle="tooltip"
                        title="Detail" class="btn btn-sm btn-primary btn-detail"
                        style="background-color:#0F4D8A">
                        <i><svg xmlns="http://www.w3.org/2000/svg" width="22" height="22"
                                viewBox="0 0 24 24">
                                <path fill="currentColor"
                                    d="M12 6.5a9.77 9.77 0 0 1 8.82 5.5c-1.65 3.37-5.02 5.5-8.82 5.5S4.83 15.37 3.18 12A9.77 9.77 0 0 1 12 6.5m0-2C7 4.5 2.73 7.61 1 12c1.73 4.39 6 7.5 11 7.5s9.27-3.11 11-7.5c-1.73-4.39-6-7.5-11-7.5m0 5a2.5 2.5 0 0 1 0 5a2.5 2.5 0 0 1 0-5m0-2c-2.48 0-4.5 2.02-4.5 4.5s2.02 4.5 4.5 4.5s4.5-2.02 4.5-4.5s-2.02-4.5-4.5-4.5" />
                            </svg></i>
                    </a>
                </td>
            </tr>
        `
        }
    </script> --}}
@endsection

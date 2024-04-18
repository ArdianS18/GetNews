@extends('layouts.admin.app')

@section('style')
    <style>
        .card-table {
            background-color: #fff;
            padding: 25px;
            border-radius: 10px;
        }
    </style>
@endsection

<head>
    <title>Admin | Faq-List</title>
</head>

@section('content')
    <div class="mb-4">
        <div class="d-flex justify-content-between">
            <div>
                <form class="d-flex">
                    <div class="input-group">
                        <input type="text" name="search" id="search-name" class="form-control search-chat py-2 px-5 ps-5"
                            value="{{ request('search') }}" placeholder="Cari..">
                        <i class="ti ti-search position-absolute top-50 translate-middle-y fs-6 text-dark ms-3"></i>
                    </div>
                </form>
            </div>
            <button type="button" style="background-color: #175A95;" class="btn btn-mdx text-white px-5"
                data-bs-toggle="modal" data-bs-target="#modal-create">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 2 30 24">
                    <path fill="currentColor"
                        d="M18 12.998h-5v5a1 1 0 0 1-2 0v-5H6a1 1 0 0 1 0-2h5v-5a1 1 0 0 1 2 0v5h5a1 1 0 0 1 0 2" />
                </svg>
                Tambah
            </button>
        </div>
    </div>


    <div class="modal fade" id="modal-create" tabindex="-1" aria-labelledby="tambahdataLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="tambahdataLabel">Tambah Data</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="form-create" method="post">
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="question" class="form-label">Pertanyaan:</label>
                            <input type="text" id="question" name="question" placeholder="Question"
                                value="{{ old('question') }}" class="form-control @error('question') is-invalid @enderror">
                            @error('question')
                                <span class="invalid-feedback" role="alert" style="color: red;">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="answer" class="form-label">Jawaban:</label>
                            <input type="text" id="answer" name="answer" placeholder="Answer"
                                value="{{ old('answer') }}" class="form-control @error('answer') is-invalid @enderror">
                            @error('answer')
                                <span class="invalid-feedback" role="alert" style="color: red;">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-rounded btn-light-danger text-danger"
                            data-bs-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-rounded btn-light-success text-success">Tambah</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="table-responsive rounded-2 mt-4">
        <table class="table border text-nowrap customize-table mb-0 align-middle">
            <thead>
                <tr>
                    <th class="text-white" style="background-color: #175A95; border-radius: 5px 0 0 5px;">No</th>
                    <th class="text-white" style="background-color: #175A95;">Pertanyaan</th>
                    <th class="text-white" style="background-color: #175A95;">Jawaban</th>
                    <th class="text-white" style="background-color: #175A95; border-radius: 0 5px 5px 0;">Aksi</th>
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


    <!-- Edit Modal -->
    <div class="modal fade" id="modal-update" tabindex="-1" aria-labelledby="modal-update Label" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <!-- Modal content -->
                <div class="modal-header">
                    <h3 class="modal-title">Edit data faq</h3>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <!-- Modal body -->
                <form id="form-update">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="question" class="form-label">Question:</label>
                            <input type="text" id="question" name="question"
                                class="form-control @error('question') is-invalid @enderror" placeholder="Question">
                            @error('question')
                                <span class="invalid-feedback" role="alert" style="color: red;">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="answer" class="form-label">Answer:</label>
                            <input type="text" id="update-answer" name="answer"
                                class="form-control @error('answer') is-invalid @enderror" placeholder="Answer">
                            @error('answer')
                                <span class="invalid-feedback" role="alert" style="color: red;">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" style="background-color: #C9C9C9;" class="btn"
                            data-bs-dismiss="modal">Batal</button>
                        <button type="submit" style="background-color: #175A95;" class="btn text-white">Edit</button>
                    </div>
                </form>
            </div>
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

        function get(page) {
            $.ajax({
                url: "{{ route('faq.index') }}?page=" + page,
                method: 'Get',
                dataType: "JSON",
                data: {
                    question: $('#search-name').val()
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


                        $('.btn-edit').click(function() {
                            var faqId = $(this).data('id');
                            var data = faq.find(faq => faq.id === faqId)

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

        function rowFaq(index, data) {
            return `
                <tr>
                    <td>${index + 1}</td>
                    <td>${data.question}</td>
                    <td>${data.answer}</td>
                    <td>
                        <!-- Edit Modal toggle -->
                        <button id="btn-edit-${data.id}" data-id="${data.id}" style="background-color: #FFD643;" class="btn btn-sm btn-edit text-white me-2">
                            <svg xmlns="http://www.w3.org/2000/svg" width="23" height="23" viewBox="0 0 24 24"><path fill="#ffffff" d="M5 21q-.825 0-1.412-.587T3 19V5q0-.825.588-1.412T5 3h8.925l-2 2H5v14h14v-6.95l2-2V19q0 .825-.587 1.413T19 21zm4-6v-4.25l9.175-9.175q.3-.3.675-.45t.75-.15q.4 0 .763.15t.662.45L22.425 3q.275.3.425.663T23 4.4t-.137.738t-.438.662L13.25 15zM21.025 4.4l-1.4-1.4zM11 13h1.4l5.8-5.8l-.7-.7l-.725-.7L11 11.575zm6.5-6.5l-.725-.7zl.7.7z"/></svg>
                        </button>
                        <button data-id="${data.id}" type="submit" style="background-color: #EF6E6E"
                            class="btn btn-sm btn-delete text-white">
                            <svg xmlns="http://www.w3.org/2000/svg" width="23" height="23" viewBox="0 0 24 24"><path fill="#ffffff" d="M7 21q-.825 0-1.412-.587T5 19V6q-.425 0-.712-.288T4 5t.288-.712T5 4h4q0-.425.288-.712T10 3h4q.425 0 .713.288T15 4h4q.425 0 .713.288T20 5t-.288.713T19 6v13q0 .825-.587 1.413T17 21zM17 6H7v13h10zm-7 11q.425 0 .713-.288T11 16V9q0-.425-.288-.712T10 8t-.712.288T9 9v7q0 .425.288.713T10 17m4 0q.425 0 .713-.288T15 16V9q0-.425-.288-.712T14 8t-.712.288T13 9v7q0 .425.288.713T14 17M7 6v13z"/></svg>    
                        </button>
                    </td>
                </tr>
        `
        }


        $('#form-create').submit(function(e) {
            $('.preloader').show();
            e.preventDefault();

            $.ajax({
                url: "{{ route('faq.store') }}",
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
                url: "faq/" + id,
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
                url: "faq/" + id,
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

@extends('layouts.admin.app')
@section('content')
    <div class="d-flex justify-content-between mb-3 mt-2">
        <div>
            <form class="position-relative">
                <input type="search" name="name" class="form-control search-chat py-2 ps-5" id="search-name"
                    placeholder="Search">
                <i class="ti ti-search position-absolute top-50 translate-middle-y fs-6 text-dark ms-3"></i>
            </form>
        </div>
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambahdataLabel">
            Tambah Data Faq
        </button>
    </div>

    <div class="modal fade" id="tambahdataLabel" tabindex="-1" aria-labelledby="tambahdataLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="tambahdataLabel">Tambah Data</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('faq.store') }}" method="post">
                    @csrf
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
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <table class="table">
        <thead>
            <tr>
                <th>No</th>
                <th>Pertanyaan</th>
                <th>Jawaban</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($faqs as $faq)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $faq->question }}</td>
                    <td>{{ $faq->answer }}</td>
                    <td>
                        <!-- Edit Modal toggle -->
                        <button class="btn btn-warning btn-edit" data-id="{{ $faq->id }}"
                            data-question="{{ $faq->question }}" data-answer="{{ $faq->answer }}"
                            id="btn-edit-{{ $faq->id }}">
                            Edit
                        </button>


                        <button type="submit" class="btn btn-danger btn-delete"
                            data-id="{{ $faq->id }}">Hapus</button>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5">
                        <div class="d-flex justify-content-center">
                            <div>
                                <img src="{{ asset('no-data.svg') }}" alt="">
                            </div>
                        </div>
                        <div class="text-center">
                            <h4>Ups... Ada kesalahan!!!</h4>
                        </div>
                        {{-- <button type="submit" class="btn btn-danger btn-delete" data-id="{{ $faq->id }}">Hapus</button> --}}
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>

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
                <form method="post" id="form-update">
                    @method('put')
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
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <x-delete-modal-component />
    
@endsection
@section('script')
    <script>
        $('.btn-edit').click(function() {
            const formData = getDataAttributes($(this).attr('id'))
            var actionUrl = `faq/${formData['id']}`;
            $('#form-update').attr('action', actionUrl);
            setFormValues('form-update', formData)
            $('#form-update').data('id', formData['id'])
            $('#modal-update').modal('show')
        })

        $('.btn-delete').click(function() {
            id = $(this).data('id')
            var actionUrl = `faq/${id}`;
            $('#form-delete').attr('action', actionUrl);
            $('#modal-delete').modal('show')
        })
    </script>
@endsection

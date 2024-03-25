@extends('layouts.admin.app')

@section('style')
<style>
    .card-table{
        background-color: #fff;
        padding: 25px;
        border-radius: 10px;
    }
</style>
@endsection

@section('content')

    <div class="card-table shadow-sm">
        <div class="d-flex justify-content-between">
            <div>
                <form class="d-flex">
                    <div class="input-group">
                        <input type="text" name="search" class="form-control search-chat py-2 px-5 ps-5" value="{{ request('search') }}" placeholder="Search">
                        <i class="ti ti-search position-absolute top-50 translate-middle-y fs-6 text-dark ms-3"></i>
                        <button type="submit" style="background-color: #C7C7C7;" class="btn btn-sm text-black px-4">Cari</button>
                    </div>
                </form>
            </div>
            <button type="button" style="background-color: #175A95;" class="btn btn-mdx text-white px-5" data-bs-toggle="modal" data-bs-target="#tambahdataLabel">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 2 30 24">
                    <path fill="currentColor" d="M18 12.998h-5v5a1 1 0 0 1-2 0v-5H6a1 1 0 0 1 0-2h5v-5a1 1 0 0 1 2 0v5h5a1 1 0 0 1 0 2" />
                </svg>
                Tambah
            </button>
        </div>
    </div>


    <div class="modal fade" id="tambahdataLabel" tabindex="-1" aria-labelledby="tambahdataLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="tambahdataLabel">Tambah Data</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('tag.create') }}" method="post">
                    @method('post')
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="tag" class="form-label">Tambahkan Tag: </label>
                            <input type="text" id="tag" name="name" placeholder="Tag"
                                value="{{ old('tag') }}" class="form-control @error('tag') is-invalid @enderror">
                            @error('tag')
                                <span class="invalid-feedback" role="alert" style="color: red;">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" style="background-color: #C9C9C9;" class="btn" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" style="background-color: #175A95;" class="btn text-white">Tambah</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="card-table shadow-sm mt-4">
        <table class="table">
            <thead>
                <tr>
                    <th class="text-white" style="background-color: #175A95; border-radius: 5px 0 0 5px;">No</th>
                    <th class="text-white" style="background-color: #175A95;">Tag</th>
                    <th class="text-white" style="background-color: #175A95; border-radius: 0 5px 5px 0;">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($tags as $tag)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $tag->name }}</td>
                        <td>
                            <button style="background-color: #FFD643;" class="btn btn-edit text-white me-2" data-id="{{ $tag->id }}"
                                data-name="{{ $tag->name }}" id="btn-edit-{{ $tag->id }}">
                                Edit
                            </button>
                            <button type="submit" style="background-color: #EF6E6E" class="btn btn-delete text-white"
                                data-id="{{ $tag->id }}">Hapus</button>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5">
                            <div class="d-flex justify-content-center">
                                <div>
                                    <img src="{{ asset('no-data.svg') }}" width="200px" alt="">
                                </div>
                            </div>
                            <div class="text-center">
                                <h4>Ups... Data tidak di temukan!!</h4>
                            </div>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        <div class="page d-flex mt-4">
            <div class="container">
                <div class="d-flex justify-content-end gap-2">
                    <a href="{{ $tags->previousPageUrl() }}" style="background-color: #175A95" class="btn text-white mr-2"><</a>
                    @for ($i = 1; $i <= $tags->lastPage(); $i++)
                    <a href="{{ $tags->url($i) }}" class="btn btn-black {{ $tags->currentPage() == $i ? 'active' : '' }}">{{ $i }}</a>
                    @endfor
                    <a href="{{ $tags->nextPageUrl() }}" style="background-color: #175A95" class="btn text-white">></a>
                </div>
            </div>
        </div>

    </div>


    <!-- Edit Modal -->
    <div class="modal fade" id="modal-update" tabindex="-1" aria-labelledby="modal-update Label" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <!-- Modal content -->
                <div class="modal-header">
                    <h3 class="modal-title">Edit data tag</h3>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <!-- Modal body -->
                <form method="post" id="form-update">
                    @method('post')
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="name" class="form-label">Update Tag:</label>
                            <input type="text" id="name" name="name"
                                class="form-control @error('name') is-invalid @enderror" placeholder="Tags">
                            @error('name')
                                <span class="invalid-feedback" role="alert" style="color: red;">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" style="background-color: #C9C9C9;" class="btn" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" style="background-color: #175A95;" class="btn text-white">Update</button>
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
            var actionUrl = `update-tag/${formData['id']}`;
            $('#form-update').attr('action', actionUrl);
            setFormValues('form-update', formData)
            $('#form-update').data('id', formData['id'])
            $('#modal-update').modal('show')
        })

        $('.btn-delete').click(function() {
            id = $(this).data('id')
            var actionUrl = `delete-tag/` + id;
            $('#form-delete').attr('action', actionUrl);
            $('#modal-delete').modal('show')
        })
    </script>
@endsection

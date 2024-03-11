@extends('layouts.admin.app')
@section('content')


        @if ($errors->any())
        @foreach ($errors->all() as $error)
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>{{ $error }}</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endforeach
        @endif

        @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>{{session('success') }}</strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif

        <div class="d-flex justify-content-between mb-3">
                <form class="d-flex">
                    <input type="text" name="name" class="form-control" placeholder="Cari Sub Categori">
                    <button type="submit" class="btn btn-outline-primary" style="margin-left: 8px;">Cari</button>
                </form>

            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 2 30 24">
                    <path fill="currentColor" d="M18 12.998h-5v5a1 1 0 0 1-2 0v-5H6a1 1 0 0 1 0-2h5v-5a1 1 0 0 1 2 0v5h5a1 1 0 0 1 0 2" />
                </svg>
                Tambah
            </button>
        </div>


        <table class="table text-center">
            <thead class="table">
                <th>No</th>
                <th>Name</th>
                <th>Aksi</th>
            </thead>
            @forelse ($subCategory as $sub)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$sub->name}}</td>
                <td class="d-flex justify-content-center gap-2">
                    <button type="button" class="btn btn-warning text-white" data-bs-toggle="modal" data-bs-target="#editModal{{ $sub->id }}"><svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 2 24 24">
                            <path fill="currentColor" d="M3 17.25V21h3.75L17.81 9.94l-3.75-3.75zM20.71 7.04a.996.996 0 0 0 0-1.41l-2.34-2.34a.996.996 0 0 0-1.41 0l-1.83 1.83l3.75 3.75z" />
                        </svg>
                        Edit
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="editModal{{ $sub->id }}" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="editModalLabel">Edit</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <form action="{{route('sub.category.update', ['subcategory' => $sub->id])}}" method="post">
                                    @csrf
                                    <div class="modal-body text-start">
                                        <label class="form-label mt-2">Name</label>
                                        <input class="form-control" type="text" name="name" value="{{ $sub->name }}">
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-outline-primary">Edit</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div>
                        <button type="submit" class="btn btn-danger btn-delete" data-id="{{ $sub->id }}">Hapus</button>
                    </div>
                </td>
            </tr>
            @empty
                <tr>
                    <td colspan="3">
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
        </table>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{route('sub.category.store', ['category' => $category->id])}}" method="post">
                    @csrf
                    <div class="modal-body">
                        <label class="form-label mt-2">Kategori</label>
                        <input class="form-control @error('name') is-invalid @enderror" type="text" name="name">
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-outline-primary">Buat data baru</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <x-delete-modal-component />

@endsection
@section('script')
    <script>
        $('.btn-delete').click(function() {
            id = $(this).data('id')
            var actionUrl = `/subcategories/${id}`;
            $('#form-delete').attr('action', actionUrl);
            $('#modal-delete').modal('show')
        })
    </script>
@endsection

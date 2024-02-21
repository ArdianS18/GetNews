<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Category</title>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>

</head>

<body>
    <div class="container mt-5">
        <div class="d-flex justify-content-between mb-3">
            <form class="d-flex" action="{{ route('categories.index') }}" method="GET">
                @csrf
                <input type="text" name="query" class="form-control" placeholder="Cari...">
                <button type="submit" class="btn btn-outline-primary" style="margin-left: 8px;">Cari</button>
            </form>
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 2 30 24">
                    <path fill="currentColor" d="M18 12.998h-5v5a1 1 0 0 1-2 0v-5H6a1 1 0 0 1 0-2h5v-5a1 1 0 0 1 2 0v5h5a1 1 0 0 1 0 2" />
                </svg>
                Tambah
            </button>
        </div>
    </div>


    <div class="container mt-3">
        <table class="table text-center">
            <thead class="table-primary">
                <th>No</th>
                <th>Kategori</th>
                <th>Aksi</th>
            </thead>
            @foreach ($categoris as $category)
            <tbody>
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$category->name}}</td>
                    <td class="d-flex justify-content-center gap-2">
                        <button type="button" class="btn btn-warning text-white" data-bs-toggle="modal" data-bs-target="#editModal{{ $category->id }}"><svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 2 24 24">
                                <path fill="currentColor" d="M3 17.25V21h3.75L17.81 9.94l-3.75-3.75zM20.71 7.04a.996.996 0 0 0 0-1.41l-2.34-2.34a.996.996 0 0 0-1.41 0l-1.83 1.83l3.75 3.75z" />
                            </svg>
                            Edit
                        </button>

                        <!-- Modal -->
                        <div class="modal fade" id="editModal{{ $category->id }}" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="editModalLabel">Edit</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <form action="{{route('categories.update', $category->id )}}" method="POST">
                                        @method('put')
                                        @csrf
                                        <div class="modal-body text-start">
                                            <label class="form-label mt-2">Kategori</label>
                                            <input class="form-control" type="text" name="name" value="{{ $category->name }}">
                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-outline-primary">Edit</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <div>
                            <!-- You must be the change you wish to see in the world. - Mahatma Gandhi -->
                            <form method="POST" action="{{ route('categories.destroy', $category->id) }}" onclick="return confirm('Yakin Akan menghapus data?')" class="d-inline">

                                @method('delete')
                                @csrf
                                <button class="btn btn-danger" ;" data-modal-target="popup-modal" data-modal-toggle="popup-modal"><svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 2 24 24">
                                        <path fill="currentColor" d="M6 19c0 1.1.9 2 2 2h8c1.1 0 2-.9 2-2V7H6zM19 4h-3.5l-1-1h-5l-1 1H5v2h14z" />
                                    </svg>
                                    Hapus
                                </button>
                            </form>
                        </div>
                        <a href="{{ route('categories.show', ['category' => $category->id])}}" class="btn btn-primary">Sub Categori</a>
                    </td>
                </tr>
            </tbody>
            @endforeach
        </table>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{route('categories.store')}}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <label class="form-label mt-2">Kategori</label>
                        <input class="form-control @error('name') is-invalid @enderror" type="text" name="name">
                        {{-- @error('name')
                    <span class="invalid-feedback" role="alert" style="color: red;">
                        <strong>{{ $message }}</strong>
                        </span>
                        @enderror --}}
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-outline-primary">Buat data baru</button>
                        </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>
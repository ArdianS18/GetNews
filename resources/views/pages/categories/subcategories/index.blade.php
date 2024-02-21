<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>

</head>
<body>
    <div class="container mt-3">
        <form>
            <input type="text" name="name" style="width: 200px; padding: 5px; border: 1px solid #ccc; border-radius: 5px;" placeholder="Cari Sub Categori">
            <button type="submit">Cari</button>
        </form>
        <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal">
            Tambah
          </button>
    </div>


    <div class="container mt-3">
        
        <table class="table table-success table-striped">
            <tr>
                <th>No</th>
                <th>Name</th>
                <th>Aksi</th>
            </tr>
            @foreach ($subCategory as $sub)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$sub->name}}</td>
                <td>
                    <ul>
                            <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#editModal{{ $sub->id }}">
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
                                    <div class="modal-body">
                                            <label class="form-label mt-2">Name</label>
                                            <input class="form-control" type="text" name="name"  value="{{ $sub->name }}">
                                          </div>
                                          <div class="modal-footer">
                                              <button type="submit" class="btn btn-secondary">Edit</button>
                                          </div>
                                      </form> </div>
                                </div>
                            </div>
                        </ul>
                    <ul>
                            <div>
                                <form action="{{route('sub.category.destroy', ['subcategory' => $sub->id])}}"
                                onclick="return confirm('Yakin Akan menghapus data?')" class="d-inline" method="post">
                                @method('delete')
                                @csrf
                                <button class="btn btn-danger" data-modal-target="popup-modal" data-modal-toggle="popup-modal">
                                    Hapus
                                </button>
                            </form>
                        </div>
                    </ul>
                </td>
            </tr>
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
        <form action="{{route('sub.category.store', ['category' => $category->id])}}" method="post">
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
                <button type="submit" class="btn btn-secondary">Buat data baru</button>
            </div>
        </form>
      </div>
    </div>
  </div>
</body>
</html>

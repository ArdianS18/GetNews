<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>News</title>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</head>

<body>
    <br>
    <div class="container">

    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambahdataLabel">
        Tambah Data News
    </button>

    <!-- Modal -->
    <div class="modal fade" id="tambahdataLabel" tabindex="-1" aria-labelledby="tambahdataLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="tambahdataLabel">Tambah Data</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('news.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="name" class="form-label">name:</label>
                            <input type="text" id="name" name="name" placeholder="name"
                                value="{{ old('name') }}" class="form-control @error('name') is-invalid @enderror">
                            @error('name')
                            <span class="invalid-feedback" role="alert" style="color: red;">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="photo" class="form-label">foto:</label>
                            <input type="file" id="photo" name="photo" placeholder="photo"
                                value="{{ old('photo') }}" class="form-control @error('photo') is-invalid @enderror">
                            @error('photo')
                            <span class="invalid-feedback" role="alert" style="color: red;">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="content" class="form-label">content:</label>
                            <input type="text" id="content" name="content" placeholder="content"
                                value="{{ old('content') }}" class="form-control @error('content') is-invalid @enderror">
                            @error('content')
                            <span class="invalid-feedback" role="alert" style="color: red;">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="sinopsis" class="form-label">sinopsis:</label>
                            <input type="text" id="sinopsis" name="sinopsis" placeholder="sinopsis"
                                value="{{ old('sinopsis') }}" class="form-control @error('sinopsis') is-invalid @enderror">
                            @error('sinopsis')
                            <span class="invalid-feedback" role="alert" style="color: red;">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="content" class="form-label">sub categori:</label>
                            <select class="form-select @error('sub_category_id') is-invalid @enderror" name="sub_category_id" value="{{ old('sub_category_id')}}" aria-label="Default select example">
                                <option selected>pilih sub kategori</option>
                                @foreach ($subCategories as $subCategory)
                                    <option value="{{$subCategory->id}}">{{$subCategory->name}}</option>
                                @endforeach
                            </select>
                            @error('sub_category_id')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{$message}}</strong>
                            </span>
                            @enderror
                        </div>
                        {{-- <div class="mb-3">
                            <label for="slug" class="form-label">slug:</label>
                            <input type="text" id="slug" name="slug" placeholder="slug"
                                value="{{ old('slug') }}" class="form-control @error('slug') is-invalid @enderror">
                            @error('slug')
                            <span class="invalid-feedback" role="alert" style="color: red;">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div> --}}
                        <div class="mb-3">
                            <label for="status" class="form-label">status:</label>
                            <select class="form-select @error('status') is-invalid @enderror" name="status" value="{{ old('status')}}" aria-label="Default select example">
                                <option selected>pilih sub kategori</option>
                                    <option value="active">Active</option>
                                    <option value="nonactive">NonActive</option>
                                    <option value="panding">Panding</option>
                            </select>
                            @error('status')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{$message}}</strong>
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
                <th>Nama Penulis</th>
                <th>Nama berita</th>
                <th>Gambar</th>
                <th>Content</th>
                <th>Sinopsis</th>
                <th>Sub Category</th>
                <th>Slug</th>
                <th>Status</th>
                <th>Option</th>
            </tr>
        </thead>
        <tbody>
            @foreach($news as $news)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{ $news->user->name}}</td>
                <td>{{ $news->name }}</td>
                <td><img width="100px" src="{{ asset('storage/' . $news->photo) }}" alt="{{ $news->photo }}"></td>
                <td>{{ $news->content }}</td>
                <td>{{ $news->sinopsis }}</td>
                <td>{{ $news->subCategory->name }}</td>
                <td>{{ $news->slug }}</td>
                <td>{{ $news->status }}</td>
                <td>
                  <!-- Edit Modal toggle -->
                    <button data-bs-toggle="modal" data-bs-target="#editdata{{ $news->id }}" class="btn btn-warning">
                        Edit
                    </button>

                    <!-- Edit Modal -->
                    <div class="modal fade" id="editdata{{ $news->id }}" tabindex="-1" aria-labelledby="editdata{{ $news->id }}Label" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <!-- Modal content -->
                                <div class="modal-header">
                                    <h3 class="modal-title">Edit data contactUs</h3>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                </div>
                                <!-- Modal body -->
                                <form action="{{ route('news.update', ['news' => $news->id]) }}" method="post">
                                    @method('put')
                                    @csrf
                                    <div class="modal-body">
                                        <div class="mb-3">
                                            <label for="name" class="form-label">name:</label>
                                            <input type="text" id="name" name="name"
                                                class="form-control @error('name') is-invalid @enderror"
                                                placeholder="name" value="{{ old('news', $news->name) }}">
                                            @error('name')
                                            <span class="invalid-feedback" role="alert" style="color: red;">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <label for="photo" class="form-label">photo:</label>
                                            <input type="file" id="photo" name="photo"
                                                class="form-control @error('photo') is-invalid @enderror"
                                                placeholder="photo" value="{{ old('news', $news->photo) }}">
                                            @error('photo')
                                            <span class="invalid-feedback" role="alert" style="color: red;">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <label for="content" class="form-label">content:</label>
                                            <input type="text" id="content" name="content"
                                                class="form-control @error('content') is-invalid @enderror"
                                                placeholder="content" value="{{ old('news', $news->content) }}">
                                            @error('content')
                                            <span class="invalid-feedback" role="alert" style="color: red;">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <label for="sinopsis" class="form-label">sinopsis:</label>
                                            <input type="text" id="sinopsis" name="sinopsis"
                                                class="form-control @error('sinopsis') is-invalid @enderror"
                                                placeholder="sinopsis" value="{{ old('news', $news->sinopsis) }}">
                                            @error('sinopsis')
                                            <span class="invalid-feedback" role="alert" style="color: red;">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <label for="sub_category_id" class="form-label">sub category:</label>
                                            <select class="form-select @error('sub_category_id') is-invalid @enderror" name="sub_category_id" value="{{ old('sub_categories_id')}}" aria-label="Default select example">
                                                <option selected>{{$news->subCategory->name}}</option>
                                                @foreach ($subCategories as $subCategory)
                                                    <option value="{{$subCategory->id}}">{{$subCategory->name}}</option>
                                                @endforeach
                                            </select>
                                                @error('sub_category_id')
                                            <span class="invalid-feedback" role="alert" style="color: red;">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <label for="status" class="form-label">status:</label>
                                            <select class="form-select @error('status') is-invalid @enderror" name="status" value="{{ old('status')}}" aria-label="Default select example">
                                                <option selected>{{$news->status}}</option>
                                                <option value="active">Active</option>
                                                <option value="nonactive">NonActive</option>
                                                <option value="panding">Panding</option>
                                            </select>
                                            @error('status')
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

                    <form action="{{ route('news.destroy', ['news' => $news->id]) }}" method="post" onsubmit="return confirm('Yakin Akan menghapus data?')"
                        class="d-inline">
                        @method('delete')
                        @csrf
                        <button type="submit" class="btn btn-danger">Hapus</button>
                    </form>

                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

</div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-pzjw8V+VbWFr6J3QKZZxCpZ8F+3t4zH1t03eNV6zEYl5S+XnvLx6D5IT00jM2JpL" crossorigin="anonymous"></script>
</body>

</html>

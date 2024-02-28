<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>News</title>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

    <!-- include libraries(jQuery, bootstrap) -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
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
                            <textarea name="sinopsis" id="sinopsis" cols="30" rows="10"  value="{{ old('sinopsis') }}""></textarea>
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
                <td>{!!$news->sinopsis!!}</td>
                <td>{{ $news->subCategory->name }}</td>
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
                                <form action="{{ route('news.update', ['news' => $news->id]) }}" method="post" enctype="multipart/form-data">
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
                                            <textarea name="sinopsis" id="" cols="30" rows="10" class="sinop form-control @error('sinopsis') is-invalid @enderror" >{!!$news->sinopsis!!}</textarea>
                                            @error('sinopsis')
                                            <span class="invalid-feedback" role="alert" style="color: red;">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <label for="sub_category_id" class="form-label">sub category:</label>
                                            <select class="form-select @error('sub_category_id') is-invalid @enderror" name="sub_category_id" value="{{ old('sub_categories_id')}}" aria-label="Default select example">
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

                    <button data-bs-toggle="modal" data-bs-target="#detaildata{{ $news->id }}" class="btn btn-primary">
                        Detail
                    </button>

                    <div class="modal fade" id="detaildata{{ $news->id }}" tabindex="-1" aria-labelledby="editdata{{ $news->id }}Label" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <!-- Modal content -->
                                <div class="modal-header">
                                    <h3 class="modal-title">Detail Data News</h3>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                </div>
                                <!-- Modal body -->
                                    <div class="modal-body">
                                        <table>
                                            <div class="md-3">
                                                <b>Nama User</b><br>
                                                <p>{{$news->user->name}}</p>
                                            </div>
                                            <div class="md-3">
                                                <b>Nama Berita</b><br>
                                                <p>{{$news->name}}</p>
                                            </div>
                                            <div class="md-3">
                                                <b>Gambar:</b><br>
                                                <p><img width="465px" src="{{ asset('storage/' . $news->photo) }}" alt="{{ $news->photo }}"></p>
                                            </div>
                                            <div class="md-3">
                                                <b>Content</b><br>
                                                <p>{{$news->content}}</p>
                                            </div>
                                            <div class="md-3">
                                                <b>Sinopsis</b><br>
                                                <p>{!!$news->sinopsis!!}</p>
                                            </div>
                                            <div class="md-3">
                                                <b>Sub Kategiori</b><br>
                                                <p>{{$news->subCategory->name}}</p>
                                            </div>
                                            <div class="md-3">
                                                <b>Status</b><br>
                                                <p>{{$news->status}}</p>
                                            </div>
                                        </table>

                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

</div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-pzjw8V+VbWFr6J3QKZZxCpZ8F+3t4zH1t03eNV6zEYl5S+XnvLx6D5IT00jM2JpL" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function() {
            $('#sinopsis').summernote({
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
</body>

</html>

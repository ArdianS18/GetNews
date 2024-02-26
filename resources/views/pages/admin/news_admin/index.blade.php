@extends('layouts.admin.app')

@section('content')
    <table class="table">
        <thead>
            <tr>
                <th>No</th>
                <th>Penulis</th>
                <th>Judul berita</th>
                <th>Status</th>
                <th>Option</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($news as $news)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $news->user->name }}</td>
                    <td>{{ $news->name }}</td>
                    <td>{{ $news->status }}</td>
                    <td>
                        <button class="btn btn-primary btn-detail" data-id="{{ $news->id }}"
                            data-photo='"<img width="400px" src="{{ asset('storage/' . $news->photo) }}">"' data-name="{{ $news->user->name }}" data-title="{{ $news->name }}"
                            data-content="{{ $news->content }}" data-synopsis="{{ $news->sinopsis }}"
                            data-subcategory="{{ $news->subCategory->name }}" data-status="{{ $news->status }}"
                            id="btn-detail-{{ $news->id }}">
                            Detail
                        </button>

                        <a href=""></a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="modal fade" id="modal-detail" tabindex="-1" aria-labelledby="modal-detail Label">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <!-- Modal content -->
                <div class="modal-header">
                    <h3 class="modal-title">Detail Data News</h3>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <!-- Modal body -->
                <div class="modal-body">
                    <table>
                        <div class="container">
                            <div class="md-3">
                                <b>Nama User</b><br>
                                <p id="detail-name"></p>
                            </div>
                            <div class="md-3">
                                <b>Nama Berita</b><br>
                                <p id="detail-title"></p>
                            </div>
                            <div class="md-3">
                                <b>Gambar:</b><br>
                                <p id="detail-photo" align="center"></p>
                            </div>
                            <div class="md-3">
                                <b>Sinopsis</b><br>
                                <p id="detail-content"></p>
                            </div>
                            <div class="md-3">
                                <b>Content</b><br>
                                <textarea id="detail-synopsis" class="form-control" rows="5"></textarea>
                            </div>
                            <div class="md-3">
                                <b>Sub Kategiori</b><br>
                                <p id="detail-subcategory"></p>
                            </div>
                            <div class="md-3">
                                <b>Status</b><br>
                                <p id="detail-status"></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection

@section('script')
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-pzjw8V+VbWFr6J3QKZZxCpZ8F+3t4zH1t03eNV6zEYl5S+XnvLx6D5IT00jM2JpL" crossorigin="anonymous">
</script>
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


<script>
    $('.btn-detail').click(function() {
        const formData = getDataAttributes($(this).attr('id'))

        handleDetail(formData)
        $('#modal-detail').modal('show')
    })
</script>
@endsection

@extends('layouts.admin.app')

@section('content')
    <div class="d-flex gap-2 mb-3 mt-2">
        <form class="d-flex gap-2">
            <div>
                <div class="position-relative d-flex">
                <input type="search" name="search" class="form-control search-chat py-2 ps-5" placeholder="Search">
                <i class="ti ti-search position-absolute top-50 translate-middle-y fs-6 text-dark ms-3"></i>
                </div>
            </div>

            <div>
                <div class="d-flex gap-2">
                    {{-- <input type="search" name="stat" class="form-control search-chat py-2 ps-5" placeholder="Search"> --}}
                    <select name="status" class="form-select">
                        <option value="">Pilih Status</option>
                        <option value="panding">Panding</option>
                        <option value="active">Approved</option>
                        <option value="nonactive">Reject</option>
                        <option value="primary">Primary</option>
                    </select>
                    <button type="submit" class="btn btn-primary">Filter</button>
                </div>
            </div>
        </form>

        <form id="approvalForm" action="{{ route('approved-all.news')}}" method="post">
            @method('put')
            @csrf
            <input type="hidden" name="checkedIds" id="checkedIdsInput">
            <button type="submit" class="btn btn-secondary">Approved semua</button>
        </form>

        <form id="rejectForm" action="{{ route('reject-all.news') }}" method="post">
            @method('put')
            @csrf
            <input type="hidden" name="checkedIdss" id="checkedIdssInput">
            <button type="submit" class="btn btn-danger">Reject semua</button>
        </form>
    </div>

    <table class="table">
        <thead>
            <tr>
                <th>
                    <input id="checkAll" type="checkbox" class="itemCheckbox" style="transform: scale(1);">
                </th>
                <th>No</th>
                <th>Penulis</th>
                <th>Judul berita</th>
                <th>Status</th>
                <th>Primary</th>
                <th>Option</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($news as $news)
                <tr class="checkboxRow">
                    <td><input type="checkbox" value="{{ $news->id }}" class="itemCheckbox" style="transform: scale(1);"></td>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $news->user->name }}</td>
                    <td>{{ $news->name }}</td>
                    <td>{{ $news->status }}</td>
                    <td>{{ $news->is_primary }}</td>
                    <td>

                        {{-- <a class="btn btn-success" href="{{route('approved-news', ['news' => $news->id, 'status' => 'active'])}}"> Approved </a> --}}
                        <div class="d-flex gap-2">
                            <form action="{{ route('approved-news', ['news' => $news->id]) }}" method="post">
                                @method('patch')
                                @csrf
                            <button type="submit" class="btn btn-success">Approved</button>
                        </form>

                        <form action="{{ route('reject-news', ['news' => $news->id]) }}" method="post">
                            @method('patch')
                            @csrf
                            <button type="submit" class="btn btn-success">Reject</button>
                        </form>

                        <button class="btn btn-primary btn-detail" data-id="{{ $news->id }}"
                            data-photo='"<img width="400px" src="{{ asset('storage/' . $news->photo) }}">"' data-name="{{ $news->user->name }}" data-title="{{ $news->name }}"
                            data-content="{{ $news->content }}" data-synopsis="{{$news->sinopsis}}"
                            data-subcategory="{{ $news->subCategory->name }}" data-status="{{ $news->status }}"
                            id="btn-detail-{{ $news->id }}">
                            Detail
                        </button>

                        <a href="{{ route('news.option.editor', ['news' => $news->id]) }}" class="btn btn-{{ $news->is_primary ? 'danger' : 'primary'}}">
                            {{ $news->is_primary ? 'Jangan tampilkan' : 'Tampilkan dihalaman utama'}}
                        </a>

                    </div>
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
                        <div class="container">
                            <div class="mb-3">
                                <b>Nama User</b><br>
                                <p id="detail-name"></p>
                            </div>
                            <div class="mb-3">
                                <b>Nama Berita</b><br>
                                <p id="detail-title"></p>
                            </div>
                            <div class="mb-3">
                                <b>Gambar:</b><br>
                                <p id="detail-photo" align="center"></p>
                            </div>
                            <div class="mb-3">
                                <b>Sinopsis</b><br>
                                <p id="detail-content"></p>
                            </div>
                            <div class="mb-3">
                                <b>Content</b><br>
                                <div>
                                    <p id="detail-synopsis"></p>
                                </div>
                            </div>
                            <div class="mb-3">
                                <b>Sub Kategiori</b><br>
                                <p id="detail-subcategory"></p>
                            </div>
                            <div class="mb-3">
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

<script>
    var isCheckedAll = false;
    function toggleCheckboxes() {
        var checkboxes = document.querySelectorAll('.itemCheckbox');
        checkboxes.forEach(function(checkbox) {
            checkbox.checked = isCheckedAll;
        });
        isCheckedAll = !isCheckedAll;
    }
    document.getElementById('checkAll').addEventListener('click', function() {
        toggleCheckboxes();
    });
</script>

<script>
    // Fungsi untuk mengirim ID yang dicentang ke formulir saat tombol diklik
    function sendCheckedIds() {
        var checkedIds = [];
        var checkboxes = document.querySelectorAll('.itemCheckbox:checked');
        checkboxes.forEach(function(checkbox) {
            checkedIds.push(checkbox.value);
        });
        // Setel nilai input tersembunyi dengan ID yang dicentang
        document.getElementById('checkedIdsInput').value = JSON.stringify(checkedIds);
    }

    // Tambahkan event listener untuk tombol "Approved semua" jika elemen tersebut tersedia di DOM
    var approvalForm = document.getElementById('approvalForm');
    if (approvalForm) {
        approvalForm.addEventListener('submit', function(event) {
            sendCheckedIds();
        });
    }
</script>

<script>
    // Fungsi untuk mengirim ID yang dicentang ke formulir saat tombol diklik
    function sendCheckedIds() {
        var checkedIds = [];
        var checkboxes = document.querySelectorAll('.itemCheckbox:checked');
        checkboxes.forEach(function(checkbox) {
            checkedIds.push(checkbox.value);
        });
        // Setel nilai input tersembunyi dengan ID yang dicentang
        document.getElementById('checkedIdssInput').value = JSON.stringify(checkedIds);
    }

    // Tambahkan event listener untuk tombol "Approved semua" jika elemen tersebut tersedia di DOM
    var approvalForm = document.getElementById('rejectForm');
    if (approvalForm) {
        approvalForm.addEventListener('submit', function(event) {
            sendCheckedIds();
        });
    }
</script>



<script>
    $('.btn-detail').click(function() {
        const formData = getDataAttributes($(this).attr('id'))
        $('#detail-synopsis').html(formData['synopsis'])
        handleDetail(formData)
        $('#modal-detail').modal('show')
    })
</script>
@endsection

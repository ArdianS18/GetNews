@extends('layouts.admin.app')

@section('style')
    <style>
        .card-table{
            background-color: #fff;
            padding: 25px;
            border-radius: 10px;
        }
        .table-border{
            border: 1px solid #DADADA;
            border-radius: 5px;
            /* padding: 25px; */
        }
    </style>
@endsection

@section('content')
    <div class="card-table">
        <div class="d-flex gap-2 mb-3 mt-2">
            <form class="d-flex gap-2">
                <div>
                    <div class="input-group">
                        <input type="text" name="search" class="form-control search-chat py-2 ps-5"placeholder="Search">
                        <i class="ti ti-search position-absolute top-50 translate-middle-y fs-6 text-dark ms-3"></i>
                        <button type="submit" class="btn btn-outline-primary">Cari</button>
                    </div>
                </div>

                <div>
                    {{-- <div class="d-flex gap-2">
                        <input type="search" name="stat" class="form-control search-chat py-2 ps-5" placeholder="Search">
                        <select name="status" class="form-select">
                            <option value="{{ request('status') }}">Pilih Status</option>
                            <option value="panding">Panding</option>
                            <option value="active">Approved</option>
                            <option value="nonactive">Reject</option>
                            <option value="primary">Primary</option>
                            <option value="">Tampilkan semua</option>
                        </select>
                        <button type="submit" class="btn btn-primary">Filter</button>
                    </div> --}}
                </div>
            </form>
        </div>
    </div>

    <div class="card-table mt-4 shadow-sm">
        <div class="table-border mb-3">
            <table class="table">
                <thead class="table">
                    <tr>
                        <th class="text-white" style="background-color: #175A95; border-radius: 5px 0 0 5px;">No</th>
                        <th class="text-white" style="background-color: #175A95;">Penulis</th>
                        <th class="text-white" style="background-color: #175A95;">Email</th>
                        <th class="text-white" style="background-color: #175A95;">Judul berita</th>
                        <th class="text-white" style="background-color: #175A95;">Tanggal Upload</th>
                        <th class="text-white" style="background-color: #175A95; border-radius: 0 5px 5px 0;">Option</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($news as $news)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $news->author->user->name }}</td>
                            <td>{{ $news->author->user->email }}</td>
                            <td>{{ $news->name }}</td>
                            <td>{{ \Carbon\Carbon::parse($news->upload_date)->format('d / M / Y') }}</td>
                            <td>

                                <div class="d-flex">
                                    <a data-bs-toggle="tooltip" title="Detail" href="{{ route('detail.news.admin', ['news' => $news->id]) }}" class="btn btn-sm btn-primary btn-detail" style="background-color:#0F4D8A">
                                        <i><svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24"><path fill="currentColor" d="M12 6.5a9.77 9.77 0 0 1 8.82 5.5c-1.65 3.37-5.02 5.5-8.82 5.5S4.83 15.37 3.18 12A9.77 9.77 0 0 1 12 6.5m0-2C7 4.5 2.73 7.61 1 12c1.73 4.39 6 7.5 11 7.5s9.27-3.11 11-7.5c-1.73-4.39-6-7.5-11-7.5m0 5a2.5 2.5 0 0 1 0 5a2.5 2.5 0 0 1 0-5m0-2c-2.48 0-4.5 2.02-4.5 4.5s2.02 4.5 4.5 4.5s4.5-2.02 4.5-4.5s-2.02-4.5-4.5-4.5"/></svg></i>
                                    </a>
                                    <button data-bs-toggle="tooltip" title="Hapus" type="submit" style="background-color: #EF6E6E" class="btn btn-sm btn-delete ms-2 text-white"
                                    data-id="{{ $news->id }}">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24"><path fill="#ffffff" d="M7 21q-.825 0-1.412-.587T5 19V6q-.425 0-.712-.288T4 5q0-.425.288-.712T5 4h4q0-.425.288-.712T10 3h4q.425 0 .713.288T15 4h4q.425 0 .713.288T20 5q0 .425-.288.713T19 6v13q0 .825-.587 1.413T17 21zM17 6H7v13h10zm-7 11q.425 0 .713-.288T11 16V9q0-.425-.288-.712T10 8q-.425 0-.712.288T9 9v7q0 .425.288.713T10 17m4 0q.425 0 .713-.288T15 16V9q0-.425-.288-.712T14 8q-.425 0-.712.288T13 9v7q0 .425.288.713T14 17M7 6v13z"/></svg>
                                    </button>


                                    {{-- <button class="btn btn-sm btn-primary btn-detail" style="background-color:#0F4D8A" data-id="{{ $news->id }}"
                                        data-photo='"<img width="400px" src="{{ asset('storage/' . $news->photo) }}">"' data-name="{{ $news->user->name }}" data-title="{{ $news->name }}"
                                        data-content="{{ $news->content }}" data-synopsis="{{$news->sinopsis}}" data-category="{{ $news->category->name }}" data-tags="{{ $news->tags }}"
                                        data-subcategory="{{ $news->subCategory->name }}" data-status="{{ $news->status }}" data-email="{{ $news->user->email }}" data-upload="{{ $news->upload_date }}"
                                        id="btn-detail-{{ $news->id }}">
                                        <i><svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24"><path fill="currentColor" d="M12 6.5a9.77 9.77 0 0 1 8.82 5.5c-1.65 3.37-5.02 5.5-8.82 5.5S4.83 15.37 3.18 12A9.77 9.77 0 0 1 12 6.5m0-2C7 4.5 2.73 7.61 1 12c1.73 4.39 6 7.5 11 7.5s9.27-3.11 11-7.5c-1.73-4.39-6-7.5-11-7.5m0 5a2.5 2.5 0 0 1 0 5a2.5 2.5 0 0 1 0-5m0-2c-2.48 0-4.5 2.02-4.5 4.5s2.02 4.5 4.5 4.5s4.5-2.02 4.5-4.5s-2.02-4.5-4.5-4.5"/></svg></i>
                                    </button> --}}

                                    @if ($news->is_primary == 1)
                                        <button data-bs-toggle="tooltip" title="berita di pin" class="btn btn-sm btn-warning ms-2">
                                            <i><svg xmlns="http://www.w3.org/2000/svg" width="21"height="21" viewBox="0 0 24 24"><path fill="currentColor" fill-rule="evenodd" d="M16 9V4h2V2H6v2h2v5c0 1.66-1.34 3-3 3v2h5.97v7l1 1l1-1v-7H19v-2c-1.66 0-3-1.34-3-3"/></svg></i>
                                        </button>
                                    @endif
                                </div>

                                {{-- <a href="{{ route('news.option.editor', ['news' => $news->id]) }}" class="btn btn-{{ $news->is_primary ? 'primary' : 'dark'}}">
                                    {{ $news->is_primary ? '' : ''}} <i><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"><path fill="currentColor" fill-rule="evenodd" d="M16 9V4h2V2H6v2h2v5c0 1.66-1.34 3-3 3v2h5.97v7l1 1l1-1v-7H19v-2c-1.66 0-3-1.34-3-3"/></svg></i>
                                </a> --}}

                            </div>
                        </td>
                    </tr>
                    @empty
                        <tr>
                            <td colspan="7">
                                <div class="d-flex justify-content-center">
                                    <div>
                                        <img src="{{ asset('no-data.svg') }}" alt="">
                                    </div>
                                </div>
                                <div class="text-center">
                                    <h4>Tidak ada data</h4>
                                </div>
                                {{-- <button type="submit" class="btn btn-danger btn-delete" data-id="{{ $faq->id }}">Hapus</button> --}}
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        {{-- <div class="page d-flex mt-4">
            <div class="container">
                <div class="d-flex justify-content-end gap-2">
                    <a href="{{ $news->previousPageUrl() }}" style="background-color: #175A95" class="btn text-white mr-2"><</a>
                    @for ($i = 1; $i <= $news->lastPage(); $i++)
                    <a href="{{ $news->url($i) }}" class="btn btn-black {{ $news->currentPage() == $i ? 'active' : '' }}">{{ $i }}</a>
                    @endfor
                    <a href="{{ $news->nextPageUrl() }}" style="background-color: #175A95" class="btn text-white">></a>
                </div>
            </div>
        </div> --}}

    </div>

    {{-- <div class="modal fade" id="modal-detail" tabindex="-1" aria-labelledby="modal-detail Label">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <!-- Modal content -->
                <div class="modal-header">
                    <h3 class="modal-title">Detail Data News</h3>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <!-- Modal body -->
                <div class="modal-body p-4">
                    <div class="container">
                            <div class="mb-3">
                                <div class="mb-3">
                                    <b>Taimnail</b>
                                </div>
                                <div>
                                    <p id="detail-photo"></p>
                                </div>
                            </div>
                            <div class="mb-3">
                                <div class="mb-3">
                                    <b>Nama</b>
                                </div>
                                <div>
                                    <p class="form-control" id="detail-name"></p>
                                </div>
                            </div>
                            <div class="mb-3">
                                <div class="mb-3">
                                    <b>Email</b>
                                </div>
                                <div>
                                    <p class="form-control" id="detail-email"></p>
                                </div>
                            </div>
                            <div class="mb-3">
                                <div class="mb-3">
                                    <b>Judul Berita</b>
                                </div>
                                <div>
                                    <p class="form-control" id="detail-title"></p>
                                </div>
                            </div>
                            <div class="mb-3">
                                <div class="mb-3">
                                    <b>Tanggal Upload</b>
                                </div>
                                <div>
                                    <p class="form-control" id="detail-upload"></p>
                                </div>
                            </div>
                            <div class="mb-3">
                                <div class="mb-3">
                                    <b>Sinopsis</b>
                                </div>
                                <div>
                                    <textarea cols="30" rows="5" id="detail-content" style="resize: none;"></textarea>
                                </div>
                            </div>
                            <div class="mb-3">
                                <div class="mb-3">
                                    <b>Kategori</b>
                                </div>
                                <div>
                                    <p class="form-control" id="detail-category"></p>
                                </div>
                            </div>
                            <div class="mb-3">
                                <div>
                                    <b>Sub Kategori</b>
                                </div>
                                <div>
                                    <p class="form-control" id="detail-subcategory"></p>
                                </div>
                            </div>
                            <div class="mb-3">
                                <div class="mb-3">
                                    <b>Tags</b>
                                </div>
                                <div>
                                    <p class="form-control" id="detail-tags"></p>
                                </div>
                            </div>
                            <div class="mb-3">
                                <div class="mb-3">
                                    <b>Content</b>
                                </div>
                                <div>
                                    <p class="form-control" id="detail-synopsis"></p>
                                </div>
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </div> --}}
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

<script>
    $('.btn-reject').click(function() {
        const formData = getDataAttributes($(this).attr('id'))
        $('#detail-synopsis').html(formData['synopsis'])
        handleDetail(formData)
        $('#modal-reject').modal('show')
    })
</script>
@endsection

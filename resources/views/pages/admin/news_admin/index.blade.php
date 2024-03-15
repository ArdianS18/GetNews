@extends('layouts.admin.app')

@section('content')
    <div class="d-flex gap-2 mb-3 mt-2">
        <form class="d-flex gap-2">
            <div>
                <div class="position-relative d-flex">
                    <div class="input-group">
                        <input type="text" name="query" class="form-control search-chat py-2 ps-5"placeholder="Search">
                        <i class="ti ti-search position-absolute top-50 translate-middle-y fs-6 text-dark ms-3"></i>
                        <button type="submit" class="btn btn-outline-primary">Cari</button>
                    </div>
                </div>
            </div>

            <div>
                <div class="d-flex gap-2">
                    {{-- <input type="search" name="stat" class="form-control search-chat py-2 ps-5" placeholder="Search"> --}}
                    <select name="status" class="form-select">
                        <option value="{{ request('status') }}">Pilih Status</option>
                        <option value="panding">Panding</option>
                        <option value="active">Approved</option>
                        <option value="nonactive">Reject</option>
                        <option value="primary">Primary</option>
                        <option value="">Tampilkan semua</option>
                    </select>
                    <button type="submit" class="btn btn-primary">Filter</button>
                </div>
            </div>
        </form>

        <form id="approvalForm" action="{{ route('approved-all.news')}}" method="post">
            @method('put')
            @csrf
            <input type="hidden" name="checkedIds" id="checkedIdsInput">
            <button type="submit" class="btn btn-secondary">Terima semua</button>
        </form>

        <form id="rejectForm" action="{{ route('reject-all.news') }}" method="post">
            @method('put')
            @csrf
            <input type="hidden" name="checkedIdss" id="checkedIdssInput">
            <button type="submit" class="btn btn-danger">Tolak semua</button>
        </form>
    </div>

    <table class="table">
        <thead>
            <tr>
                <th class="text-white" style="background-color: #175A95; border-radius: 5px 0 0 5px">
                    <input id="checkAll" type="checkbox" class="itemCheckbox" style="transform: scale(1);">
                </th>
                <th class="text-white" style="background-color: #175A95;">No</th>
                <th class="text-white" style="background-color: #175A95;">Penulis</th>
                <th class="text-white" style="background-color: #175A95;">Email</th>
                <th class="text-white" style="background-color: #175A95;">Judul berita</th>
                <th class="text-white" style="background-color: #175A95;">Tanggal Upload</th>
                <th class="text-white" style="background-color: #175A95; border-radius: 0 5px 5px 0;">Option</th>
                {{-- <th>No</th>
                <th>Penulis</th>
                <th>Email</th>
                <th>Judul berita</th>
                <th>Tanggal Upload</th>
                <th>Option</th> --}}
            </tr>
        </thead>
        <tbody>
            @forelse ($news as $news)
                <tr class="checkboxRow">
                    <td><input type="checkbox" value="{{ $news->id }}" class="itemCheckbox" style="transform: scale(1);"></td>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $news->author->user->name }}</td>
                    <td>{{ $news->author->user->email }}</td>
                    <td>{{ $news->name }}</td>
                    <td>{{ \Carbon\Carbon::parse($news->upload_date)->format('d / M / Y') }}</td>
                    <td>

                        <a href="{{ route('detail.news.admin', ['news' => $news->slug]) }}" class="btn btn-sm btn-primary btn-detail" style="background-color:#0F4D8A">
                            <i><svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24"><path fill="currentColor" d="M12 6.5a9.77 9.77 0 0 1 8.82 5.5c-1.65 3.37-5.02 5.5-8.82 5.5S4.83 15.37 3.18 12A9.77 9.77 0 0 1 12 6.5m0-2C7 4.5 2.73 7.61 1 12c1.73 4.39 6 7.5 11 7.5s9.27-3.11 11-7.5c-1.73-4.39-6-7.5-11-7.5m0 5a2.5 2.5 0 0 1 0 5a2.5 2.5 0 0 1 0-5m0-2c-2.48 0-4.5 2.02-4.5 4.5s2.02 4.5 4.5 4.5s4.5-2.02 4.5-4.5s-2.02-4.5-4.5-4.5"/></svg></i>
                        </a>

                        {{-- <button class="btn btn-primary btn-detail" data-id="{{ $news->id }}"
                            data-photo='"<img width="400px" src="{{ asset('storage/' . $news->photo) }}">"' data-name="{{ $news->user->name }}" data-title="{{ $news->name }}"
                            data-content="{{ $news->content }}" data-synopsis="{{$news->sinopsis}}" data-category="{{ $news->category->name }}" data-tags="{{ $news->tags }}"
                            data-subcategory="{{ $news->subCategory->name }}" data-status="{{ $news->status }}" data-email="{{ $news->user->email }}" data-upload="{{ $news->upload_date }}"
                            id="btn-detail-{{ $news->id }}">
                            Detail
                        </button> --}}
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
                            <h4>Tidak ada data yang ditampilkan</h4>
                        </div>
                        {{-- <button type="submit" class="btn btn-danger btn-delete" data-id="{{ $faq->id }}">Hapus</button> --}}
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <div class="modal fade" id="modal-reject" tabindex="-1" aria-labelledby="modal-reject Label">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <!-- Modal content -->
                <div class="modal-header">
                        <h3 class="modal-title ms-2 mt-2">Tolak Berita Ini?</h3>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <!-- Modal body -->
                <div class="modal-body">
                    <div class="container">
                        <div class="mb-3">
                            <div>
                                <h5 class="mb-3">Berikan Alasan</h5>
                            </div>
                            <div>
                                <textarea class="form-control" name="" id="" cols="30" rows="10" placeholder="Berita yang ditulis ada unsur penghinaan pihak tertentu" style="resize: none;"></textarea>
                            </div>
                        </div>

                        <div class="col-md-12 col-lg-12">
                                <div class="d-flex justify-content-end">
                                    <button class="btn btn-danger me-2">Hapus</button>
                                    <button class="btn btn-secondary">Batal</button>
                                </div>
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
    function sendCheckedIdss() {
        var checkedIdss = [];
        var checkboxes = document.querySelectorAll('.itemCheckbox:checked');
        checkboxes.forEach(function(checkbox) {
            checkedIdss.push(checkbox.value);
        });
        // Setel nilai input tersembunyi dengan ID yang dicentang
        document.getElementById('checkedIdssInput').value = JSON.stringify(checkedIdss);
    }

    // Tambahkan event listener untuk tombol "Approved semua" jika elemen tersebut tersedia di DOM
    var rejectForm = document.getElementById('rejectForm');
    if (rejectForm) {
        rejectForm.addEventListener('submit', function(event) {
            sendCheckedIdss();
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

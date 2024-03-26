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
    <div class="d-flex justify-content-between mb-3 mt-2">
        <div>
            <div class="input-group">
                <input type="text" name="search" class="form-control search-chat py-2 ps-5"placeholder="Search">
                <i class="ti ti-search position-absolute top-50 translate-middle-y fs-6 text-dark ms-3"></i>
                <button type="submit" class="btn btn-outline-primary">Cari</button>
            </div>
        </div>
        {{-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambahdataLabel">
            Tambah Data Faq
        </button> --}}
    </div>
</div>

<div class="card-table shadow-sm mt-4">
    <table class="table">
        <thead>
            <tr>
                <th class="text-white" style="background-color: #175A95; border-radius: 5px 0 0 5px">No</th>
                <th class="text-white" style="background-color: #175A95">Pelapor</th>
                <th class="text-white" style="background-color: #175A95">Judul Berita</th>
                <th class="text-white" style="background-color: #175A95">Penulis</th>
                <th class="text-white" style="background-color: #175A95; border-radius: 0 5px 5px 0;">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($reports as $report)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $report->user->name }}</td>
                    <td>{{ $report->news->name }}</td>
                    <td>{{ $report->user->name }}</td>
                    <td>
                        {{-- <!-- Edit Modal toggle -->
                        <button class="btn btn-warning btn-edit" data-id="{{ $report->id }}"
                            data-question="{{ $faq->question }}" data-answer="{{ $faq->answer }}"
                            id="btn-edit-{{ $faq->id }}">
                            Edit
                        </button> --}}

                        <button class="btn btn-sm btn-detail me-2" data-bs-toggle="tooltip" title="Detail" style="background-color: #175A95;" data-id="{{ $report->id }}"
                            data-message="{{ $report->message }}">
                            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 512 512"><path fill="none" stroke="#ffffff" stroke-linecap="round" stroke-linejoin="round" stroke-width="32" d="M255.66 112c-77.94 0-157.89 45.11-220.83 135.33a16 16 0 0 0-.27 17.77C82.92 340.8 161.8 400 255.66 400c92.84 0 173.34-59.38 221.79-135.25a16.14 16.14 0 0 0 0-17.47C428.89 172.28 347.8 112 255.66 112"/><circle cx="256" cy="256" r="80" fill="none" stroke="#ffffff" stroke-miterlimit="10" stroke-width="32"/></svg>
                        </button>

                        <button type="submit" data-bs-toggle="tooltip" title="Hapus" style="background-color: #EF6E6E;" class="btn btn-delete text-white"
                            data-id="{{ $report->id }}">Hapus</button>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5">
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


<x-delete-modal-component />


<div class="modal fade" id="modal-detail" tabindex="-1" aria-labelledby="modal-detail Label">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <!-- Modal content -->
            <div class="modal-header">
                <h3 class="modal-title">Laporan</h3>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <!-- Modal body -->
            <div class="modal-body p-4">
                <div class="container">
                        <div class="mb-3">
                            <div class="mb-3">
                                <b>Detail Laporan</b>
                            </div>
                            <div>
                                <textarea cols="30" rows="5" id="detail-content" style="resize: none;"></textarea>
                            </div>
                        </div>
                        
                    </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
    <script>
            $('.btn-detail').click(function() {
            const formData = getDataAttributes($(this).attr('id'))
            var actionUrl = `faq/${formData['id']}`;
            $('#form-detail').attr('action', actionUrl);
            setFormValues('form-update', formData)
            $('#form-detail').data('id', formData['id'])
            $('#modal-detail').modal('show')
        })
    </script>
@endsection

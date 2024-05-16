@extends('layouts.admin.app')

@section('content')

<div class="d-flex gap-2">
    <form class="d-flex gap-2">
        <div>
            <div class="position-relative d-flex">
                <div class="input-group">
                    <input type="text" name="search"
                        class="form-control search-chat py-2 ps-5" style="width: 200px" id="search-name" placeholder="Search">
                    <i class="ti ti-search position-absolute top-50 translate-middle-y fs-6 text-dark ms-3"></i>
                </div>
            </div>
        </div>

        <div>
            <div class="d-flex gap-2">
                <select class="form-select" id="opsi-latest" style="width: 200px">
                    <option disabled selected>Pilih opsi</option>
                    <option value="terbaru">Terbaru</option>
                    <option value="terlama">Terlama</option>
                </select>
            </div>
        </div>

        <div>
            <div class="d-flex gap-2">
                <select class="form-select" id="opsi-perpage" style="width: 200px">
                    <option value="Gambar">Gambar</option>
                    <option value="Video">Video</option>
                </select>
            </div>
        </div>

        <div>
            <div class="d-flex gap-2">
                <select class="form-select" id="opsi-perpage" style="width: 200px">
                    <option value="">Tampilkan semua</option>
                </select>
            </div>
        </div>
    </form>
</div>

<div class="table-responsive rounded-2 mt-4">
    <table class="table border text-nowrap customize-table mb-0 align-middle ">
        <thead>
            <tr>
                <th style="background-color: #D9D9D9;">No</th>
                <th style="background-color: #D9D9D9;">Jenis Iklan</th>
                <th style="background-color: #D9D9D9;">Tanggal Awal</th>
                <th style="background-color: #D9D9D9;">Tanggal Akhir</th>
                <th style="background-color: #D9D9D9;">Halaman</th>
                <th style="background-color: #D9D9D9;">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($advertisements as $advertisement)
                <tr>
                    <td>${index + 1}</td>
                    <td>{{ $advertisement->type }}</td>
                    <td>{{ $advertisement->start_date }}</td>
                    <td>{{ $advertisement->end_date }}</td>
                    <td>{{ $advertisement->page }}</td>
                    <td>
                        <div class="d-flex gap-2">
                            <form action="{{ route('destroy.iklan', ['id' => $advertisement->id]) }}" method="POST">
                                @method('delete')
                                @csrf
                                <button data-id="${data.id}" type="submit" style="background-color: #EF6E6E"
                                    class="btn btn-sm btn-delete text-white ms-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24"><path fill="#ffffff" d="M7 21q-.825 0-1.412-.587T5 19V6q-.425 0-.712-.288T4 5q0-.425.288-.712T5 4h4q0-.425.288-.712T10 3h4q.425 0 .713.288T15 4h4q.425 0 .713.288T20 5q0 .425-.288.713T19 6v13q0 .825-.587 1.413T17 21zM17 6H7v13h10zm-7 11q.425 0 .713-.288T11 16V9q0-.425-.288-.712T10 8q-.425 0-.712.288T9 9v7q0 .425.288.713T10 17m4 0q.425 0 .713-.288T15 16V9q0-.425-.288-.712T14 8q-.425 0-.712.288T13 9v7q0 .425.288.713T14 17M7 6v13z"/></svg>
                                </button>
                            </form>

                                <a href="/detail-news-admin/${data.id}" data-id="${data.id}" data-bs-toggle="tooltip" title="Detail" class="btn btn-sm btn-primary btn-detail" style="background-color: #0F4D8A;">
                                    <i><svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24"><path fill="currentColor" d="M12 6.5a9.77 9.77 0 0 1 8.82 5.5c-1.65 3.37-5.02 5.5-8.82 5.5S4.83 15.37 3.18 12A9.77 9.77 0 0 1 12 6.5m0-2C7 4.5 2.73 7.61 1 12c1.73 4.39 6 7.5 11 7.5s9.27-3.11 11-7.5c-1.73-4.39-6-7.5-11-7.5m0 5a2.5 2.5 0 0 1 0 5a2.5 2.5 0 0 1 0-5m0-2c-2.48 0-4.5 2.02-4.5 4.5s2.02 4.5 4.5 4.5s4.5-2.02 4.5-4.5s-2.02-4.5-4.5-4.5"/></svg></i>
                                </a>
                        </div>
                    </td>
                </tr>
            @empty
            @endforelse
        </tbody>
    </table>

    <div id="loading"></div>
    <div class="d-flex mt-2 justify-content-end">
        <nav id="pagination">
        </nav>
    </div>

</div>
@endsection

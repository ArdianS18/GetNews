@extends('layouts.admin.app')

@section('content')
<div class="">
    <div class="d-flex gap-2 mb-3 mt-2">
        <form class="d-flex gap-2">
            <div>
                <div class="position-relative d-flex">
                    <div class="">
                        <input type="text" name="search"
                            class="form-control search-chat py-2 px-5 ps-5" id="search-name" placeholder="Search">
                        <i class="ti ti-search position-absolute top-50 translate-middle-y fs-6 text-dark ms-3"></i>
                    </div>
                </div>
            </div>

            <div>
                <div class="d-flex gap-2">
                    <select class="form-select" id="opsi-perpage" style="width: 200px">
                        <option value="terbaru">Terbaru</option>
                        <option value="terlama">Terlama</option>
                    </select>
                </div>
            </div>
        </form>
    </div>
</div>

<div class="table-responsive rounded-2 mt-4">
    <table class="table border text-nowrap customize-table mb-0 align-middle">
        <thead>
            <tr>
                <th style="background-color: #D9D9D9;">Nama</th>
                <th style="background-color: #D9D9D9;">Email</th>
                <th style="background-color: #D9D9D9;">Nomer Telepon</th>
                <th style="background-color: #D9D9D9;">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($users as $user)
                <tr>
                    <td>
                        <img src="{{asset('assets/img/profile.svg')}}" class="rounded-circle me-2 user-profile" style="object-fit: cover" width="35" height="35" alt="" />
                        {{ $user->name }}
                    </td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->phone_number }}</td>
                    <td>
                        <button data-bs-toggle="tooltip" data-id="" title="Detail" class="btn btn-sm btn-primary btn-detail me-2" style="background-color:#5D87FF">
                            <i><svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 24 24"><path fill="currentColor" d="M12 6.5a9.77 9.77 0 0 1 8.82 5.5c-1.65 3.37-5.02 5.5-8.82 5.5S4.83 15.37 3.18 12A9.77 9.77 0 0 1 12 6.5m0-2C7 4.5 2.73 7.61 1 12c1.73 4.39 6 7.5 11 7.5s9.27-3.11 11-7.5c-1.73-4.39-6-7.5-11-7.5m0 5a2.5 2.5 0 0 1 0 5a2.5 2.5 0 0 1 0-5m0-2c-2.48 0-4.5 2.02-4.5 4.5s2.02 4.5 4.5 4.5s4.5-2.02 4.5-4.5s-2.02-4.5-4.5-4.5"/></svg></i>
                        </button>
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

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

    <div class="card-table shadow-sm">
        <div class="d-flex justify-content-between">
            <div class="d-flex justify-content-start gap-2 ">
                <form class="d-flex gap-2">

                    <div class="position-relative">
                        <div class="input-group">
                            <input type="text" name="search" class="form-control search-chat py-2 ps-5"placeholder="Search">
                            <i class="ti ti-search position-absolute top-50 translate-middle-y fs-6 text-dark ms-3"></i>
                            <button type="submit" class="btn btn-outline-primary">Cari</button>
                        </div>
                    </div>

                    {{-- <div class="d-flex gap-2">
                        <select name="status" class="form-select">
                            <option value="{{ request('status') }}">Pilih Status</option>
                            <option value="panding">Panding</option>
                            <option value="approved">Approved</option>
                            <option value="reject">Reject</option>
                            <option value="">Tampilkan semua</option>
                        </select>
                        <button type="submit" class="btn btn-primary">Filter</button>
                    </div> --}}
                </form>
            </div>
        </div>
    </div>

    <div class="mt-3 col-md-12 col-lg-12 card-table shadow-sm">
    <div class="table-responsive rounded-2 mb-3">
        <table class="table mb-3">
            <thead>
                <tr>
                    <th class="text-white" style="background-color: #175A95; border-radius: 5px 0 0 5px">No</th>
                    <th class="text-white" style="background-color: #175A95; ">Name</th>
                    <th class="text-white" style="background-color: #175A95; ">Email</th>
                    <th class="text-white" style="background-color: #175A95; ">Status</th>
                    <th class="text-white" style="background-color: #175A95; border-radius: 0 5px 5px 0">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($authors as $author)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{ $author->user->name}}</td>
                    <td>{{ $author->user->email }}</td>
                    <td>
                        @if ($author->banned)
                            <div class="
                            btn btn-lg
                            px-4
                            fs-4
                            btn-light-danger
                            text-danger
                            font-weight-medium
                            disabled
                            ">Nonaktif</div>
                        @else
                            <div class="
                            btn btn-lg
                            px-4
                            fs-4
                            btn-light-success
                            text-success
                            font-weight-medium
                            disabled
                            ">Aktif</div>
                        @endif
                    </td>
                    <td>
                        <div class="d-flex">

                            <!-- Detail Modal toggle -->
                            {{-- <button class="btn btn-primary btn-detail me-2" data-id="{{ $author->id }}"
                                data-name="{{ $user->name }}" data-nomor="{{ $user->nomor }}" data-nomor="{{ $user->nomor }}"
                                data-email="{{ $user->email }}" data-cv="{{ $user->cv }}" data-password="{{ $user->password }}" data-alamat="{{ $user->alamat }}"
                                id="btn-detail-{{ $user->id }}">
                                Detail
                            </button> --}}

                            {{-- <button type="submit" name="status" class="btn btn-success"  data-bs-toggle="modal" data-bs-target="#detail{{$user->id}}" value="approved">Detail</button> --}}
                                {{--
                            <form action="{{ route('user.approved', ['user' => $author->id]) }}" method="post">
                                @method('patch')
                                @csrf
                                <button type="submit" name="status" class="btn btn-rounded btn-light-success text-success me-2" value="approved">Terima</button>
                            </form> --}}

                            {{-- <form action="{{ route('user.reject', ['user' => $author->id]) }}" method="post">
                                @method('patch')
                                @csrf
                                <button type="submit" name="status" class="btn btn-rounded btn-lightsuccess text-success" value="reject">Banned</button>
                            </form> --}}

                            <button class="btn btn-sm btn-primary btn-detail me-2" data-bs-toggle="tooltip" title="Detail" style="background-color:#0F4D8A" data-id="{{ $author->id }}"
                                data-name="{{ $author->user->name }}" data-nomor="{{ $author->user->phone_number }}"
                                data-email="{{ $author->user->email }}" data-photo="{{ $author->user->photo }}" data-alamat="{{ $author->user->address }}"
                                id="btn-detail-{{ $author->user->id }}">
                                <i><svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24"><path fill="currentColor" d="M12 6.5a9.77 9.77 0 0 1 8.82 5.5c-1.65 3.37-5.02 5.5-8.82 5.5S4.83 15.37 3.18 12A9.77 9.77 0 0 1 12 6.5m0-2C7 4.5 2.73 7.61 1 12c1.73 4.39 6 7.5 11 7.5s9.27-3.11 11-7.5c-1.73-4.39-6-7.5-11-7.5m0 5a2.5 2.5 0 0 1 0 5a2.5 2.5 0 0 1 0-5m0-2c-2.48 0-4.5 2.02-4.5 4.5s2.02 4.5 4.5 4.5s4.5-2.02 4.5-4.5s-2.02-4.5-4.5-4.5"/></svg></i>
                            </button>

                            <a href="{{ route('banned.author', ['author' => $author->id]) }}" data-bs-toggle="tooltip" title="Unblock" class="btn btn-sm" style="background-color: #57ce5b;">
                                <svg xmlns="http://www.w3.org/2000/svg" width="23" height="23" viewBox="0 0 512 512"><circle cx="256" cy="256" r="208" fill="none" stroke="#ffffff" stroke-miterlimit="10" stroke-width="32"/><path fill="none" stroke="#ffffff" stroke-miterlimit="10" stroke-width="32" d="m108.92 108.92l294.16 294.16"/></svg>
                            </a>

                        </div>
                    </td>
                </tr>
                @empty
                    <tr>
                        <td colspan="5">
                            <div class="d-flex justify-content-center">
                                <div>
                                    <img src="{{ asset('assets/img/no-data.svg') }}" alt="">
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
    {{-- <x-delete-modal-component /> --}}



    <!-- Detail Modal -->
    <div class="modal fade" id="modal-detail" tabindex="-1"
    aria-labelledby="modal-detail Label" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <!-- Modal content -->
            <div class="modal-header">
                <h3 class="modal-title">Detail data Author</h3>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <!-- Modal body -->
            <form method="post" id="form-detail">
                @method('put')
                @csrf
                <div class="modal-body">
                    <div class="row container">

                        <div class="col-md-12 col-lg-12 mb-4">
                            <div class="d-flex justify-content-center">
                                <img src="{{ asset( Auth::user()->photo ? 'storage/'.Auth::user()->photo : "default.png")  }}" alt="photo" width="180" height="180" style="border-radius: 50%; object-fit:cover;"/>
                                {{-- <img src="{{ asset('assets/img/news/single-news-1.webp') }}" width="180" height="180" style="border-radius: 50%;" alt="photo"> --}}
                            </div>
                        </div>

                        <div class="col-md-12 col-lg-6 mb-3">
                            <label class="form-label" for="nomor">Nama</label>
                            <input type="text" id="name" name="name" placeholder="nama" value="{{ old('name') }}" class="form-control" readonly>
                        </div>

                        <div class="col-md-12 col-lg-6 mb-3">
                            <label class="form-label" for="nomor">Nomor Telepon</label>
                            <input type="text" id="nomor" name="nomor" placeholder="nomor telepon" value="{{ old('nomor') }}" class="form-control" readonly>
                        </div>

                        <div class="col-md-12 col-lg-6 mb-3">
                            <label class="form-label" for="nomor">Email</label>
                            <input type="text" id="email" name="email" placeholder="email" value="{{ old('name') }}" class="form-control" readonly>
                        </div>

                        <div class="col-md-12 col-lg-12 from-group mb-3">
                            <label class="form-label" for="alamat">Alamat</label>
                            <textarea name="alamat" id="alamat" rows="6" class="form-control" style="resize: none" readonly>{{old('alamat')}}</textarea>
                        </div>


                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" style="background-color: #C9C9C9;" class="btn" data-bs-dismiss="modal">Batal</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="page d-flex mt-4">
    <div class="container">
        <div class="d-flex justify-content-end gap-2">
            <a href="{{ $authors->previousPageUrl() }}" style="background-color: #175A95" class="btn text-white mr-2"><</a>
            @for ($i = 1; $i <= $authors->lastPage(); $i++)
            <a href="{{ $authors->url($i) }}" class="btn btn-black {{ $authors->currentPage() == $i ? 'active' : '' }}">{{ $i }}</a>
            @endfor
            <a href="{{ $authors->nextPageUrl() }}" style="background-color: #175A95" class="btn text-white">></a>
        </div>
    </div>
</div>
    <x-delete-modal-component />



</div>

@endsection

@section('script')
    <script>
        $('.btn-detail').click(function() {
            const formData = getDataAttributes($(this).attr('id'))
            var actionUrl = `user/${formData['id']}`;
            console.log(formData);
            $('#form-detail').attr('action', actionUrl);

            setFormValues('form-detail', formData)
            $('#form-detail').data('id', formData['id'])
            $('#form-detail').attr('action', );
            $('#modal-detail').modal('show')
        })

        $('.btn-update').click(function() {
            const formData = getDataAttributes($(this).attr('id'))
            var actionUrl = `user/${formData['id']}`;
            console.log(formData);
            $('#form-update').attr('action', actionUrl);

            setFormValues('form-update', formData)
            $('#form-update').data('id', formData['id'])
            $('#form-update').attr('action', );
            $('#modal-update').modal('show')
        })
    </script>
@endsection

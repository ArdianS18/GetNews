@extends('layouts.user.sidebar')

@section('style')
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

    <style>
        .card-profile {
            box-shadow: 0 5px 2px rgba(81, 81, 81, 0.1);
            border-radius: 10px;
            background-color: #fff;
        }

        .top-right {
            position: absolute;
            top: 8px;
            right: 16px;
            margin-top: 5px;
        }
    </style>
@endsection

<head>
    <title>User | Profile</title>
</head>

@section('content')
    <div class="">
        <div class="card">
            <div class="card-body p-0">
                <img src="{{ asset('assets/img/profile-bg.svg') }}" width="100%" height="150px"
                    style="border-radius: 10px 10px 0 0;" alt="" class="img-fluid">
                <div class="top-right">
                    <button class="btn btn-sm px-3 py-1 mt-2 text-white" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal{{ auth()->user()->id }}" style="background-color: #175A95;">Daftar Jadi Penulis</button>
                </div>

                <div class="align-items-center">
                    <div class="d-flex flex-column flex-lg-row justify-content-between">
                        <div class="col-lg-3 mt-n3 order-lg-2 order-1 justify-content-center justify-content-lg-start text-center text-lg-start">
                            <div class="mt-n5">
                                <div class="row align-items-center justify-content-center mt-5 mb-2">
                                    <div class="col-md-12 col-lg-9 d-flex align-items-center justify-content-center rounded-circle" style="width: 120px; height: 120px;";>
                                        <div class="border-4 border-white d-flex align-items-center justify-content-center rounded-circle overflow-hidden" style="width: 100px; height: 100px;">
                                          <img style="object-fit: cover" src="{{asset(Auth::user()->photo ? 'storage/'.Auth::user()->photo : "assets/img/profile.svg")}}" alt="" class="w-100 h-100">
                                        </div>
                                      </div>

                                    {{-- <div class="rounded-circle  overflow-hidden border border-white" style="width: 110px; height: 110px;">
                                        <img src="{{asset(Auth::user()->photo ? 'storage/'.Auth::user()->photo : "assets/img/profile.svg")}}" alt="" class="w-100 h-100" style="object-fit: cover">
                                    </div> --}}
                                    <div class="mt-5 col-md-12 col-lg-3 mt-lg-0 ms-lg-3">
                                        <h5 class="fs-5 mt-2 mb-0 fw-semibold">{{ auth()->user()->name }}</h5>
                                        <p class="mt-2 fs-4">Pengguna</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-2 order-lg-2 order-2 justify-content-center justify-content-lg-end text-center me-lg-5">
                            <div class="d-flex align-items-center justify-content-center justify-content-lg-between m-4 gap-5">
                                <div class="text-center">
                                    <i class="ti ti-coins fs-6 d-block mb-2"></i>
                                    <h5 class="mb-0 fw-semibold lh-1">{{ $coin }}</h5>
                                    <p class="mb-0 fs-4">Coin</p>
                                </div>
                                <div class="text-center">
                                    <i class="ti ti-user-circle fs-6 d-block mb-2"></i>
                                    <h5 class="mb-0 fw-semibold lh-1">{{ $following }}</h5>
                                    <p class="mb-0 fs-4">Mengikuti</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            {{-- <div class="shadow-sm" style="background-color: #ECF1F4;">
                <ul class="nav nav-pills user-profile-tab justify-content-end mt-2 rounded-2" id="pills-tab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button
                            class="nav-link position-relative active rounded-0 d-flex align-items-center justify-content-center bg-transparent fs-3 py-6"
                            id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button"
                            role="tab" aria-controls="pills-profile" aria-selected="true">
                            <i class="ti ti-user-circle me-2 fs-6"></i>
                            <span class="d-none d-md-block">Profile</span>
                        </button>
                    </li>
                </ul>
            </div> --}}
        </div>

        <div class="tab-content" id="pills-tabContent">
            <div class="tab-pane fade card p-4 shadow-sm" id="pills-berlangganan" role="tabpanel"
                aria-labelledby="pills-berlangganan-tab" tabindex="0">

                <!-- Row -->
                {{-- <div class="">
                    <table class="table">
                        <thead>
                            <tr>
                                <th class="text-white" style="background-color: #175A95; border-radius: 5px 0 0 5px;">
                                    Paket</th>
                                <th class="text-white" style="background-color: #175A95;">Harga</th>
                                <th class="text-white" style="background-color: #175A95;">Dimulai</th>
                                <th class="text-white" style="background-color: #175A95;">Berakhir</th>
                                <th class="text-white" style="background-color: #175A95;">Status</th>
                                <th class="text-white" style="background-color: #175A95; border-radius: 0 5px 5px 0;">Aksi
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>
                                    <button type="submit" style="background-color: #175A95"
                                        class="btn btn-sm btn-delete ms-2 text-white" data-id="">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22"
                                            viewBox="0 0 24 24">
                                            <path fill="currentColor"
                                                d="M12 6.5a9.77 9.77 0 0 1 8.82 5.5c-1.65 3.37-5.02 5.5-8.82 5.5S4.83 15.37 3.18 12A9.77 9.77 0 0 1 12 6.5m0-2C7 4.5 2.73 7.61 1 12c1.73 4.39 6 7.5 11 7.5s9.27-3.11 11-7.5c-1.73-4.39-6-7.5-11-7.5m0 5a2.5 2.5 0 0 1 0 5a2.5 2.5 0 0 1 0-5m0-2c-2.48 0-4.5 2.02-4.5 4.5s2.02 4.5 4.5 4.5s4.5-2.02 4.5-4.5s-2.02-4.5-4.5-4.5" />
                                        </svg>
                                    </button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div> --}}
                <!-- End Row -->
            </div>


            <div class="tab-pane fade show active card shadow-sm" id="pills-profile" role="tabpanel"
                aria-labelledby="pills-profile-tab" tabindex="0">
                <div class="row p-4">
                    <div class="mb-4">
                        <h4>Biodata</h4>
                    </div>

                    <div class="col-md-12 col-lg-6 mb-4">
                        <label class="form-label" for="email">Nama</label>
                        <input type="text" class="form-control" readonly value="{{ auth()->user()->name }}">
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-md-12 col-lg-6 mb-4">
                        <label class="form-label" for="phone_number">No Hp</label>
                        <input type="text" class="form-control" readonly value="{{ auth()->user()->phone_number }}">
                        @error('phone_number')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-md-12 col-lg-6 mb-4">
                        <label class="form-label" for="email">Email</label>
                        <input type="text" class="form-control" readonly value="{{ auth()->user()->email }}">
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-md-12 col-lg-6 mb-4">
                        <label class="form-label" for="email">Tanggal Lahir</label>
                        <input type="text" class="form-control" readonly value="{{ auth()->user()->birth_date }}">
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-md-12 col-lg-12 mb-3">
                        <label class="form-label" for="email">Alamat</label>
                        <textarea name="" class="form-control" placeholder="{{ auth()->user()->address }}" id="" cols="30" rows="5" readonly style="resize: none"></textarea>
                    </div>
                </div>

                <div class="d-flex justify-content-end mb-5">
                    <a href="{{ route('profile.user.update') }}">
                        <button class="btn btn-md px-4 py-1 text-white m-4" style="background-color: #175A95;">Edit profile</button>
                    </a>
                </div>
            </div>


        </div>

    </div>

    <div class="modal fade" id="exampleModal{{ auth()->user()->id }}" tabindex="-1"
        aria-labelledby="exampleModalLabel{{ auth()->user()->id }}" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel{{ auth()->user()->id }}">Daftar Author</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                <form method="post" action="{{ route('user.author', ['user' => auth()->user()->id]) }}"
                    enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <div class="modal-body">
                        <label class="form-label mt-2">Masukkan Cv</label>
                        <input class="form-control @error('cv')
                            is-invalid
                        @enderror" type="file" name="cv" itemtype="pdf">
                        @error('cv')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror

                        <div class="form-check mt-4">
                            <input class="form-check-input test" type="checkbox" value="" id="test">
                            <label class="form-check-label" for="flexCheckChecked">
                                saya telah membaca <a href="{{route('user.home')}}" style="color: #EA4949;">ketentuan & persyaratan</a>
                                dan menyetujui, jika melanggar saya akan menanggung kosekuensinya
                            </label>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" id="daftar" class="btn btn-outline-primary">Daftar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('script')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    // Periksa status checkbox saat halaman dimuat
    $(document).ready(function() {
        checkCheckbox();
    });

    // Fungsi untuk memeriksa status checkbox dan mengaktifkan/menonaktifkan tombol Daftar
    function checkCheckbox() {
        if ($('#test').prop('checked')) {
            $('#daftar').removeAttr('disabled'); // Enable the button
        } else {
            $('#daftar').attr('disabled', 'disabled'); // Disable the button
        }
    }

    // Tambahkan event listener ke checkbox
    $('.test').change(function() {
        checkCheckbox(); // Panggil fungsi untuk memeriksa status checkbox
    });
</script>

@endsection

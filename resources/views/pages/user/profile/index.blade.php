@extends('layouts.user.sidebar')

@section('style')
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
            margin-top: 70px;
        }

    </style>
@endsection

@section('content')
    <div class="">
        <div class="card">
            <div class="card-body p-0">
                <img src="{{ asset('assets/img/profile-bg.svg') }}" width="100%" height="150px"
                    style="border-radius: 10px 10px 0 0;" alt="" class="img-fluid">
                <div class="top-right">
                    <div class="d-flex justify-content-end">
                        <button class="btn btn-sm px-4 py-2 text-white m-4" type="button" data-bs-toggle="modal"
                            data-bs-target="#exampleModal{{ auth()->user()->id }}" style="background-color: #175A95;">Daftar Jadi
                            Penulis</button>
                    </div>
                </div>

                <div class="align-items-center">
                    <div class="d-flex justify-content-between">
                        <div class="col-lg-3 mt-n3 order-lg-2 order-1 justify-content-start">
                            <div class="mt-n5">
                                <div class="d-flex align-items-center justify-content-center mt-3 mb-2">
                                    <div class="d-flex align-items-center justify-content-center rounded-circle"
                                        style="width: 110px; height: 110px;";>
                                        <div class="border border-4 mt-4 border-white d-flex align-items-center justify-content-center rounded-circle overflow-hidden"
                                            style="width: 100px; height: 100px;";>
                                            <img src="{{asset(Auth::user()->photo ? 'storage/'.Auth::user()->photo : "assets/img/profile.svg")}}" alt="" class="w-100 h-100">
                                        </div>
                                    </div>
                                    <div class="mt-5 ms-3">
                                        <h5 class="fs-5 mt-2 mb-0 fw-semibold">{{ auth()->user()->name }}</h5>
                                        <p class="mt-2 fs-4">Penggguna</p>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="col-lg-2 order-lg-2 order-2 justify-content-end me-5">
                            <div class="d-flex align-items-center justify-content-between m-4">
                                <div class="text-center">
                                    <i class="ti ti-coins fs-6 d-block mb-2"></i>
                                    <h5 class="mb-0 fw-semibold lh-1">938</h5>
                                    <p class="mb-0 fs-4">Poin</p>
                                </div>
                                <div class="text-center">
                                    <i class="ti ti-user-circle fs-6 d-block mb-2"></i>
                                    <h5 class="mb-0 fw-semibold lh-1">{{ $following }}</h5>
                                    <p class="mb-0 fs-4">Mengikuti</p>
                                </div>
                                {{-- <div class="text-center">
                                    <i class="ti ti-user-check fs-6 d-block mb-2"></i>
                                    <h5 class="mb-0 fw-semibold lh-1">2,659</h5>
                                    <p class="mb-0 fs-4">Pengikut</p>
                                </div> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="shadow-sm" style="background-color: #ECF1F4;">
                <ul class="nav nav-pills user-profile-tab justify-content-end mt-2 rounded-2" id="pills-tab" role="tablist">
                    {{-- <li class="nav-item" role="presentation">
                        <button
                            class="nav-link position-relative active rounded-0 d-flex align-items-center justify-content-center bg-transparent fs-3 py-6"
                            id="pills-berlangganan-tab" data-bs-toggle="pill" data-bs-target="#pills-berlangganan"
                            type="button" role="tab" aria-controls="pills-berlangganan" aria-selected="false">
                            <svg xmlns="http://www.w3.org/2000/svg" class="me-2" width="20" height="20"
                                viewBox="0 0 256 256">
                                <path fill="currentColor"
                                    d="M181.92 153A55.58 55.58 0 0 1 137 197.92a7 7 0 0 1-1 .08a6 6 0 0 1-1-11.92c17.38-2.92 32.13-17.68 35.08-35.08a6 6 0 1 1 11.84 2m32.08-9a86 86 0 0 1-172 0c0-27.47 10.85-55.61 32.25-83.64a6 6 0 0 1 9-.67l26.34 25.56l23.09-63.31a6 6 0 0 1 9.47-2.56C163.72 37.33 214 85.4 214 144m-12 0c0-48.4-38.65-89.84-61.07-109.8l-23.29 63.86a6 6 0 0 1-9.82 2.25l-28-27.22C62.67 97.13 54 121 54 144a74 74 0 0 0 148 0" />
                            </svg>
                            <span class="d-none d-md-block">Berlangganan</span>
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button
                            class="nav-link position-relative rounded-0 d-flex align-items-center justify-content-center bg-transparent fs-3 py-6"
                            id="pills-friends-tab" data-bs-toggle="pill" data-bs-target="#pills-friends" type="button"
                            role="tab" aria-controls="pills-friends" aria-selected="false">
                            <svg xmlns="http://www.w3.org/2000/svg" class="me-2" width="20" height="20"
                                viewBox="0 0 24 24">
                                <g fill="none">
                                    <path
                                        d="m12.593 23.258l-.011.002l-.071.035l-.02.004l-.014-.004l-.071-.035c-.01-.004-.019-.001-.024.005l-.004.01l-.017.428l.005.02l.01.013l.104.074l.015.004l.012-.004l.104-.074l.012-.016l.004-.017l-.017-.427c-.002-.01-.009-.017-.017-.018m.265-.113l-.013.002l-.185.093l-.01.01l-.003.011l.018.43l.005.012l.008.007l.201.093c.012.004.023 0 .029-.008l.004-.014l-.034-.614c-.003-.012-.01-.02-.02-.022m-.715.002a.023.023 0 0 0-.027.006l-.006.014l-.034.614c0 .012.007.02.017.024l.015-.002l.201-.093l.01-.008l.004-.011l.017-.43l-.003-.012l-.01-.01z" />
                                    <path fill="currentColor"
                                        d="M12 3c2.314 0 4.456.408 6.058 1.109c.799.35 1.509.792 2.032 1.334c.485.5.845 1.128.902 1.856L21 7.5v10c0 .814-.381 1.51-.91 2.057c-.523.542-1.233.984-2.032 1.334C16.456 21.591 14.314 22 12 22c-2.314 0-4.456-.408-6.058-1.109c-.799-.35-1.509-.792-2.032-1.334c-.485-.5-.845-1.128-.902-1.856L3 17.5v-10c0-.814.381-1.51.91-2.057c.523-.542 1.233-.984 2.032-1.334C7.544 3.409 9.686 3 12 3m7 12.407a8.13 8.13 0 0 1-.942.484C16.456 16.591 14.314 17 12 17c-2.314 0-4.456-.408-6.058-1.109A8.122 8.122 0 0 1 5 15.407V17.5c0 .152.066.376.348.667c.286.296.748.608 1.396.892C8.038 19.625 9.895 20 12 20c2.105 0 3.962-.375 5.256-.941c.648-.284 1.11-.596 1.396-.892c.282-.29.348-.515.348-.667zm0-5a8.13 8.13 0 0 1-.942.484C16.456 11.591 14.314 12 12 12c-2.314 0-4.456-.408-6.058-1.109A8.122 8.122 0 0 1 5 10.407V12.5c0 .152.066.376.348.667c.286.296.748.608 1.396.892C8.038 14.625 9.895 15 12 15c2.105 0 3.962-.375 5.256-.941c.648-.284 1.11-.596 1.396-.892c.282-.29.348-.515.348-.667zM12 5c-2.105 0-3.962.375-5.256.941c-.648.284-1.11.596-1.396.892c-.282.29-.348.515-.348.667c0 .152.066.376.348.667c.286.296.748.608 1.396.892C8.038 9.625 9.895 10 12 10c2.105 0 3.962-.375 5.256-.941c.648-.284 1.11-.596 1.396-.892c.282-.29.348-.515.348-.667c0-.152-.066-.376-.348-.667c-.286-.296-.748-.608-1.396-.892C15.962 5.375 14.105 5 12 5" />
                                </g>
                            </svg>
                            <span class="d-none d-md-block">Pendapatan</span>
                        </button>
                    </li> --}}
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
            </div>
        </div>

        <div class="tab-content" id="pills-tabContent">

            {{-- <div class="d-flex justify-content-end">
                <button class="btn btn-sm px-4 py-2 text-white m-4" type="button" data-bs-toggle="modal"
                    data-bs-target="#exampleModal{{ auth()->user()->id }}" style="background-color: #175A95;">Daftar Jadi
                    Penulis</button>
            </div> --}}

            <div class="tab-pane fade card p-4 shadow-sm" id="pills-berlangganan" role="tabpanel"
                aria-labelledby="pills-berlangganan-tab" tabindex="0">

                <!-- Row -->
                <div class="">
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
                </div>
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
                        {{-- <textarea class="form-control" readonly value=""> --}}
                        <textarea name="" class="form-control" placeholder="{{ auth()->user()->address }}" id="" cols="30" rows="10" readonly></textarea>
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
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="post" action="{{ route('user.author', ['user' => auth()->user()->id]) }}"
                    enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <div class="modal-body">
                        <label class="form-label mt-2">Masukkan Cv</label>
                        <input class="form-control" type="file" name="cv">

                        <div class="form-check mt-4">
                            <input class="form-check-input test" type="checkbox" value="" id="test">
                            <label class="form-check-label" for="flexCheckChecked">
                                saya telah membaca <a href="{{route('privacy.policy')}}" style="color: #EA4949;">ketentuan & persyaratan</a>
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

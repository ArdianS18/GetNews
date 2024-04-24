@extends('layouts.user.sidebar')

@section('style')
    <style>
    .card.active {
        border: 1px solid #175A95;
        box-shadow: 0 3px 20px #175A95;
    }
    </style>
@endsection
@section('content')
<div class="card shadow-sm position-relative overflow-hidden" style="background-color: #183249;">
    <div class="card-body">
      <div class="row justify-content-between">
        <div class="col-8 text-white">
          <h4 class="fw-semibold mb-3 mt-2 text-white">Jumlah Koin</h4>
          <div class="d-flex">
            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24"><g fill="none"><path d="m12.593 23.258l-.011.002l-.071.035l-.02.004l-.014-.004l-.071-.035c-.01-.004-.019-.001-.024.005l-.004.01l-.017.428l.005.02l.01.013l.104.074l.015.004l.012-.004l.104-.074l.012-.016l.004-.017l-.017-.427c-.002-.01-.009-.017-.017-.018m.265-.113l-.013.002l-.185.093l-.01.01l-.003.011l.018.43l.005.012l.008.007l.201.093c.012.004.023 0 .029-.008l.004-.014l-.034-.614c-.003-.012-.01-.02-.02-.022m-.715.002a.023.023 0 0 0-.027.006l-.006.014l-.034.614c0 .012.007.02.017.024l.015-.002l.201-.093l.01-.008l.004-.011l.017-.43l-.003-.012l-.01-.01z"/><path fill="#fcd52f" d="M12 3c2.314 0 4.456.408 6.058 1.109c.799.35 1.509.792 2.032 1.334c.485.5.845 1.128.902 1.856L21 7.5v10c0 .814-.381 1.51-.91 2.057c-.523.542-1.233.984-2.032 1.334C16.456 21.591 14.314 22 12 22c-2.314 0-4.456-.408-6.058-1.109c-.799-.35-1.509-.792-2.032-1.334c-.485-.5-.845-1.128-.902-1.856L3 17.5v-10c0-.814.381-1.51.91-2.057c.523-.542 1.233-.984 2.032-1.334C7.544 3.409 9.686 3 12 3m7 12.407a8.13 8.13 0 0 1-.942.484C16.456 16.591 14.314 17 12 17c-2.314 0-4.456-.408-6.058-1.109A8.122 8.122 0 0 1 5 15.407V17.5c0 .152.066.376.348.667c.286.296.748.608 1.396.892C8.038 19.625 9.895 20 12 20c2.105 0 3.962-.375 5.256-.941c.648-.284 1.11-.596 1.396-.892c.282-.29.348-.515.348-.667zm0-5a8.13 8.13 0 0 1-.942.484C16.456 11.591 14.314 12 12 12c-2.314 0-4.456-.408-6.058-1.109A8.122 8.122 0 0 1 5 10.407V12.5c0 .152.066.376.348.667c.286.296.748.608 1.396.892C8.038 14.625 9.895 15 12 15c2.105 0 3.962-.375 5.256-.941c.648-.284 1.11-.596 1.396-.892c.282-.29.348-.515.348-.667zM12 5c-2.105 0-3.962.375-5.256.941c-.648.284-1.11.596-1.396.892c-.282.29-.348.515-.348.667c0 .152.066.376.348.667c.286.296.748.608 1.396.892C8.038 9.625 9.895 10 12 10c2.105 0 3.962-.375 5.256-.941c.648-.284 1.11-.596 1.396-.892c.282-.29.348-.515.348-.667c0-.152-.066-.376-.348-.667c-.286-.296-.748-.608-1.396-.892C15.962 5.375 14.105 5 12 5"/></g></svg>
            <h3 class="ms-2" style="color: #FCD52F">1234</h3>
            <h4 class="text-white ms-3 me-3">/</h4>
            <h5 class="text-white mt-1">Rp. 12.000</h5>
          </div>
        </div>
        <div class="col-3">
          <div class="text-center mb-n4">
            <img src="{{asset('assets/img/bg-coin.svg')}}" width="210px" alt="" class="img-fluid">
          </div>
        </div>
      </div>
    </div>
</div>

<div class="card p-4">
    <h4><b>Tarik Uang</b></h4>
    <h5 class="mt-5 fw-semibold mb-4">Pilih Nominal</h5>
    <div class="row">
        <div class="col-lg-6">
            <div class="row">
                <div class="col-lg-3">
                    <div class="card card-act p-4" onclick="selectCard(this)">
                        <div class="d-flex justify-content-center">
                            <h5><b>Rp.500</b></h5>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="card card-act p-4" onclick="selectCard(this)">
                        <div class="d-flex justify-content-center">
                            <h5><b>Rp.10.000</b></h5>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="card card-act p-4" onclick="selectCard(this)">
                        <div class="d-flex justify-content-center">
                            <h5><b>Rp.50.000</b></h5>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="card card-act p-4" onclick="selectCard(this)">
                        <div class="d-flex justify-content-center ">
                            <h5><b>Rp.100.000</b></h5>
                        </div>
                    </div>
                </div>
            </div>
            <p class="fs-4">Untuk menarik uang tunai,  Anda memerlukan saldo minimum Rp500. Batas penarikan hanya dapat dilakukan satu kali dalam satu hari</p>
            <h5 class="mt-5 fw-semibold mb-4">Tarik Uang Ke :</h5>
            <div class="d-flex">
                <p class="fs-5">Metode Penarikan : </p>
                <span class="fs-5 ms-4"  data-bs-toggle="modal" data-bs-target="#modal-create" style="color: #5D87FF;">Pilih Metode Penarikan</span>
            </div>

            <div class="mt-2 mb-4">
                <button class="btn btn-md text-white w-100" style="background-color: #FCD52F;">Tarik Uang</button>
            </div>
        </div>


        <div class="col-lg-6 d-flex justify-content-center">
            <img src="{{asset('assets/img/bg-tukar-coin.svg')}}" width="400px" alt="">
        </div>
    </div>
</div>

<div class="modal fade" id="modal-create" tabindex="-1" aria-labelledby="tambahdataLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header d-flex justify-content-center text-white rounded-top-3" style="background-color: #175A95;">
                <h5 class="text-white">Pilih Metode Pembayaran</h5>
            </div>
            <form id="form-create" method="post">
                <div class="modal-body">
                    <span class="fw-semibold text-dark fs-4">Bank</span>

                    <div class="row">
                        <div class="col-lg-6 mt-2">
                            <div class="card shadow-sm card p-3">
                                <div class="d-flex">
                                    <img src="{{asset('assets/img/bank-bri.svg')}}" width="100px" alt="">
                                    <div class="ms-4 mt-3">
                                        <p class="text-dark">BRI Virtual Account</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 mt-2">
                            <div class="card shadow-sm border p-3">
                                <div class="d-flex">
                                    <img src="{{asset('assets/img/bank-mandiri.svg')}}" width="100px" alt="">
                                    <div class="ms-4 mt-3">
                                        <p class="text-dark">Marndiri Virtual Account</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="card shadow-sm border p-3">
                                <div class="d-flex">
                                    <img src="{{asset('assets/img/bank-bca.svg')}}" width="100px" alt="">
                                    <div class="ms-4 mt-3">
                                        <p class="text-dark">BCA Virtual Account</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="card shadow-sm border p-3">
                                <div class="d-flex">
                                    <img src="{{asset('assets/img/bank-bni.svg')}}" width="100px" alt="">
                                    <div class="ms-4 mt-3">
                                        <p class="text-dark">BNI Virtual Account</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="card shadow-sm border p-3">
                                <div class="d-flex">
                                    <img src="{{asset('assets/img/bank-bsi.svg')}}" width="100px" alt="">
                                    <div class="ms-4 mt-3">
                                        <p class="text-dark fs-5">BSI Virtual Account</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    

                    <span class="fw-semibold text-dark fs-4">E-Wallet</span>

                    <div class="col-lg-6 mt-2">
                        <div class="card shadow-sm border p-3">
                            <div class="d-flex">
                                <img src="{{asset('assets/img/wallet-gopay.svg')}}" width="100px" alt="">
                                <div class="ms-4 mt-3">
                                    <p class="text-dark">Gopay</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6 mt-2">
                        <div class="card card-modal shadow-sm border p-3" onclick="selectCard2(this)">
                            <div class="d-flex">
                                <img src="{{asset('assets/img/wallet-ovo.svg')}}" width="100px" alt="">
                                <div class="ms-4 mt-3">
                                    <p class="text-dark">OVO</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="card card-modal shadow-sm border p-3" onclick="selectCard2(this)">
                            <div class="d-flex">
                                <img src="{{asset('assets/img/wallet-dana.svg')}}" width="100px" alt="">
                                <div class="ms-4 mt-3">
                                    <p class="text-dark">Dana</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="card card-modal shadow-sm border p-3" onclick="selectCard2(this)">
                            <div class="d-flex">
                                <img src="{{asset('assets/img/wallet-indomaret.svg')}}" width="100px" alt="">
                                <div class="ms-4 mt-3">
                                    <p class="text-dark">Indomart</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="card card-moadal shadow-sm border p-3" onclick="selectCard2(this)">
                            <div class="d-flex">
                                <img src="{{asset('assets/img/wallet-alfamart.svg')}}" width="100px" alt="">
                                <div class="ms-4 mt-3">
                                    <p class="text-dark">Alfamart</p>
                                </div>
                            </div>
                        </div>
                    </div>

                </div> 
                    
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-rounded btn-light-danger text-danger"
                        data-bs-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-rounded btn-light-success text-success">Tambah</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection

@section('script')
<script>
    function selectCard(selectedCard) {
        var cards = document.querySelectorAll('.card-act');
        
        cards.forEach(function(card) {
            card.classList.remove('active');
        });

        selectedCard.classList.add('active');
    }

    function selectCard2(selectedCard) {
        var cards = document.querySelectorAll('.card-modal');
        
        cards.forEach(function(card) {
            card.classList.remove('active');
        });

        selectedCard.classList.add('active');
    }
</script>
@endsection
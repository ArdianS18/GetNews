@extends('layouts.user.app')

@section('style')
<style>
    .card {
    box-shadow: 0  5px 2px rgba(0, 0, 0, 0.1);
      border: 1px solid #f4f4f4; /* Memberi ruang di sekitar elemen */
      /* margin-bottom: 20px;
      border-radius: 10px;  */
      /* padding: 3%; */
  }
</style>

@endsection

@section('content')

<div class="container" style="margin-top: 6%;">
    <div class="row mb-5">
        <div class="col-md-12 col-lg-6">
            <img width="600px" src="{{asset('assets/img/contact-us.svg')}}" alt="">
        </div>

        <div class="col-md-12 col-lg-6">
            <div class="contact-card">
                <h3><span style="color: #0F4D8A;" class="me-3">|</span>Contact</h3>

                <div class="row mt-5">
                    <div class="col-md-12 col-lg-4 mb-4 mb-lg-0 d-flex">
                        <div class="d-flex w-100 justify-content-center align-items-center contact-icon" style="background-color: #0F4D8A;">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24"><path fill="#ffffff" d="M19.95 21q-3.125 0-6.175-1.362t-5.55-3.863q-2.5-2.5-3.862-5.55T3 4.05q0-.45.3-.75t.75-.3H8.1q.35 0 .625.238t.325.562l.65 3.5q.05.4-.025.675T9.4 8.45L6.975 10.9q.5.925 1.187 1.787t1.513 1.663q.775.775 1.625 1.438T13.1 17l2.35-2.35q.225-.225.588-.337t.712-.063l3.45.7q.35.1.575.363T21 15.9v4.05q0 .45-.3.75t-.75.3"/></svg>
                        </div>
                        <div class="d-flex flex-column ms-3">
                            <b>Phone</b>
                            <span>+62123456789</span>
                        </div>
                    </div>

                    <div class="col-md-12 col-lg-4 mb-4 mb-lg-0 d-flex">
                        <div class="d-flex justify-content-center align-items-center contact-icon" style="background-color: #0F4D8A;">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24"><path fill="#ffffff" d="M4 20q-.825 0-1.412-.587T2 18V6q0-.825.588-1.412T4 4h16q.825 0 1.413.588T22 6v12q0 .825-.587 1.413T20 20zm8-7L4 8v10h16V8zm0-2l8-5H4zM4 8V6v12z"/></svg>
                        </div>
                        <div class="d-flex flex-column ms-3">
                            <b>Email</b>
                            <p>get@gmail.com</p>
                        </div>
                    </div>

                    <div class="col-md-12 col-lg-4 d-flex">
                        <div class="d-flex justify-content-center align-items-center contact-icon" style="background-color: #0F4D8A;">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24"><path fill="#ffffff" d="M12 12q.825 0 1.413-.587T14 10q0-.825-.587-1.412T12 8q-.825 0-1.412.588T10 10q0 .825.588 1.413T12 12m0 7.35q3.05-2.8 4.525-5.087T18 10.2q0-2.725-1.737-4.462T12 4Q9.475 4 7.738 5.738T6 10.2q0 1.775 1.475 4.063T12 19.35M12 22q-4.025-3.425-6.012-6.362T4 10.2q0-3.75 2.413-5.975T12 2q3.175 0 5.588 2.225T20 10.2q0 2.5-1.987 5.438T12 22m0-12"/></svg>
                        </div>
                        <div class="d-flex flex-column ms-3">
                            <b>Location</b>
                            <p>jager kulon omah</p>
                        </div>
                    </div>
                </div>

                <div class="mt-3">
                    <div class="mb-2">
                        <h5>Tuliskan Pesanmu disini</h5>
                    </div>
                    <form action="{{ route('contact.store') }}" class="comment-form" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <textarea name="message" id="message" class="form-control" cols="100" rows="6" placeholder="" style="resize: none"></textarea>
                                </div>
                            </div>
                            <div class="col-md-12 mt-3">
                                <button type="submit" class="btn text-white" style="background-color: #0F4D8A; padding-left:3rem; padding-right:3rem;">Kirim</button>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
</div>


@endsection

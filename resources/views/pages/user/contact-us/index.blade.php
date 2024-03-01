@extends('layouts.user-profile.app')

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
        <div class="row">
            <div class="col-md-12 col-lg-6">
                <img src="" alt="">
                <img width="600px" src="assets/img/contact-us.svg" alt="">

            </div>

            <div class="col-md-12 col-lg-6">
                <div class="card p-5">
                    <h3> <span style="color: #0F4D8A;">|</span>Contact</h3>
                    
                    <div class="row mt-5">
                        <div class="col-md-12 col-lg-4 d-flex">
                            <div class="d-flex justify-content-center align-items-center" style="background-color: #0F4D8A; width:50px; height: 50px; border-radius:5px;">
                                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 24 24"><path fill="#ffffff" d="M19.95 21q-3.125 0-6.175-1.362t-5.55-3.863q-2.5-2.5-3.862-5.55T3 4.05q0-.45.3-.75t.75-.3H8.1q.35 0 .625.238t.325.562l.65 3.5q.05.4-.025.675T9.4 8.45L6.975 10.9q.5.925 1.187 1.787t1.513 1.663q.775.775 1.625 1.438T13.1 17l2.35-2.35q.225-.225.588-.337t.712-.063l3.45.7q.35.1.575.363T21 15.9v4.05q0 .45-.3.75t-.75.3"/></svg>
                            </div>
                            
                            <div class="" style="margin-left: 7px;">
                                <b style="font-size: 14px;">Phone</b>
                                <p style="font-size: 14px;">+62-123-4567-89</p>
                            </div>
                        </div>

                        <div class="col-md-12 col-lg-4 d-flex">
                            <div class="d-flex justify-content-center align-items-center" style="background-color: #0F4D8A; width:50px; height: 50px; border-radius:5px;">
                                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24"><path fill="#ffffff" d="M12 12q.825 0 1.413-.587T14 10q0-.825-.587-1.412T12 8q-.825 0-1.412.588T10 10q0 .825.588 1.413T12 12m0 7.35q3.05-2.8 4.525-5.087T18 10.2q0-2.725-1.737-4.462T12 4Q9.475 4 7.738 5.738T6 10.2q0 1.775 1.475 4.063T12 19.35M12 22q-4.025-3.425-6.012-6.362T4 10.2q0-3.75 2.413-5.975T12 2q3.175 0 5.588 2.225T20 10.2q0 2.5-1.987 5.438T12 22m0-12"/></svg>
                            </div>
                            
                            <div class="d-flex flex-column " style="margin-left: 7px;">
                                <b>Email</b>
                                <p style="font-size: 14px;">get@gmail.com</p>
                            </div>
                        </div>

                        <div class="col-md-12 col-lg-4 d-flex">
                            <div class="d-flex justify-content-center align-items-center" style="background-color: #0F4D8A; width:50px; height: 50px; border-radius:5px;">
                            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24"><path fill="#ffffff" d="M12 12q.825 0 1.413-.587T14 10q0-.825-.587-1.412T12 8q-.825 0-1.412.588T10 10q0 .825.588 1.413T12 12m0 7.35q3.05-2.8 4.525-5.087T18 10.2q0-2.725-1.737-4.462T12 4Q9.475 4 7.738 5.738T6 10.2q0 1.775 1.475 4.063T12 19.35M12 22q-4.025-3.425-6.012-6.362T4 10.2q0-3.75 2.413-5.975T12 2q3.175 0 5.588 2.225T20 10.2q0 2.5-1.987 5.438T12 22m0-12"/></svg>            
                            </div>                
                            <div class="d-flex flex-column " style="margin-left: 7px;">
                                <b>Location</b>
                                <p style="font-size: 14px;">jager kulon omah</p>
                            </div>
                        </div>
                    </div>




                    <div class="mt-3">
                        <div class="mb-2">
                            <span style="font-size: 20px; color: #393939;">Tuliskan Pesanmu disini</span>
                        </div>
                        <form action="#" class="comment-form">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                <textarea name="messages" id="messages" cols="30" rows="6" placeholder=""></textarea>
                                </div>
                            </div>
                            <div class="col-md-12 mt-3">
                                <button class="btn btn- text-white" style="background-color: #0F4D8A; padding-left:3rem; padding-right:3rem;">Kirim</button>
                            </div>
                        </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>

    </div>

@endsection
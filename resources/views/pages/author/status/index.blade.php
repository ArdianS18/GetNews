@extends('layouts.author.sidebar')

@section('style')
<style>
    .news-card-a {
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        border: 1px solid #ddd; /* Memberi ruang di sekitar elemen */
        margin-bottom: 20px; 
        border-radius: 10px; 
        padding: 3%;
    }

  </style>
@endsection

@section('contentt')

<div class="container">
    <div class="tab-pane" id="status" role="tabpanel">
        <div class="container" style="margin-top: 5%;">
            <h3> <span style="color: #0F4D8A;">|</span>Status Berita</h3>


            <div class="news-card-a row mt-5">
                <div class="col-md-12 col-lg-3">
                    <img src="assets/img/news/news-50.webp" class="img-status" alt="Image" />
                </div>
                <div class="col-md-12 col-lg-4">
                    <h5>Jiraiya Banks Wants to Teach You How to Build a House</h5>
                    <p>akoako okaoko lok okao</p>
                    
                </div>
                <div class="col-md-12 col-lg-5 col-md-12 col-lg-5">
                    <div class="d-flex justify-content-end">
                    <button class="text-white btn btn-md" style="background-color: #F0CA40;  border-radius: 8px; padding-left: 3rem; padding-right: 3rem;">
                        Pending
                    </button>
                    </div>
                
                    
                    <div class="d-flex justify-content-end mt-1">
                        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 512 512"><path d="M368.005 272h-96v96h96v-96zm-32-208v32h-160V64h-48v32h-24.01c-22.002 0-40 17.998-40 40v272c0 22.002 17.998 40 40 40h304.01c22.002 0 40-17.998 40-40V136c0-22.002-17.998-40-40-40h-24V64h-48zm72 344h-304.01V196h304.01v212z" fill="#0f4d89"/>
                        <a href=""></a></svg>Apr 25, 2023        
                    </div>
                    <div class="d-flex justify-content-end mt-4">
                        <button class="btn m-2" style="background-color: #0F4D8A;"><svg xmlns="http://www.w3.org/2000/svg" width="23" height="30" viewBox="0 0 512 512"><path d="M64 368v80h80l235.727-235.729-79.999-79.998L64 368zm377.602-217.602c8.531-8.531 8.531-21.334 0-29.865l-50.135-50.135c-8.531-8.531-21.334-8.531-29.865 0l-39.468 39.469 79.999 79.998 39.469-39.467z" fill="#ffffff"/></svg></button>
                        <button class="btn m-2" style="background-color: #0F4D8A;"><svg xmlns="http://www.w3.org/2000/svg" width="23" height="30" viewBox="0 0 512 512"><path fill="none" stroke="#ffffff" stroke-linecap="round" stroke-linejoin="round" stroke-width="32" d="M255.66 112c-77.94 0-157.89 45.11-220.83 135.33a16 16 0 0 0-.27 17.77C82.92 340.8 161.8 400 255.66 400c92.84 0 173.34-59.38 221.79-135.25a16.14 16.14 0 0 0 0-17.47C428.89 172.28 347.8 112 255.66 112"/><circle cx="256" cy="256" r="80" fill="none" stroke="#ffffff" stroke-miterlimit="10" stroke-width="32"/></svg></button>
                        <button class="btn m-2" style="background-color: #C94F4F;"><svg xmlns="http://www.w3.org/2000/svg" width="23" height="30" viewBox="0 0 512 512"><path d="M128 405.429C128 428.846 147.198 448 170.667 448h170.667C364.802 448 384 428.846 384 405.429V160H128v245.429zM416 96h-80l-26.785-32H202.786L176 96H96v32h320V96z" fill="#ffffff"/></svg></button>
                    </div>
                </div>
                

            </div>
        </div>
    </div>
</div>
@endsection
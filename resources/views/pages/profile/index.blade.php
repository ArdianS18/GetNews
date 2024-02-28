@extends('layouts.user.app')

@section('style')
<style>
    .news-card-a {
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); /* Menambahkan shadow dengan warna dan opasitas tertentu */
        border: 1px solid #ddd;
        padding: 30px; /* Memberi ruang di sekitar elemen */
        margin-bottom: 20px; /* Memberi jarak antara elemen berikutnya */
        border-radius: 10px; 
    }

  </style>
@endsection

@section('content')

<div class="container">
    <div class="d-flex mt-4 news-card-img align-items-center">
        <div class="" style="border: 4px solid #0F4D8A; border-radius: 50%; padding: 7px;">
            <div class="img-profile"></div><img src="assets/img/news/trending-3.webp" alt="Profile Image" width="80px" style="border-radius: 50%;" />
        </div>
        <div style="margin-left: 2%;">
            <h4 class="mb-0">Hi, Daffa Prasetya</h4>
            <div class="text-center" style="margin-top: 2%">
                <button class="text-white btn btn-sm" style="background-color: #0F4D8A; border-radius: 10px; padding-left: 3rem; padding-right: 3rem;">
                    Edit Profile  
                </button>
            </div>
        </div>
    </div>


    <div class="row" style="margin-top: 5%;">
        <div class="col-md-12 col-lg-3">
            <h5>Pendapatan Keseluruhan</h5>
            <div class="d-flex text-center">
                <img src="assets/img/icons/coin.svg" class="mb-3" width="25px" alt="Image" />&nbsp;
                <p>1324</p>
            </div>
        </div>
        <div class="col-md-12 col-lg-3">
            <h5>Jumlah Pengikut</h5>
            <div class="d-flex text-center items-center">
                <img src="assets/img/icons/profile.svg" class="mb-3" width="25px" alt="Image" />&nbsp;
                <p>1.290</p>
            </div>
        </div>
        <div class="col-md-12 col-lg-3">
            <h5>Mengikuti</h5>
            <div class="d-flex text-center items-center">
                <img src="assets/img/icons/profile.svg" class="mb-3" width="25px" alt="Image" />&nbsp;
                <p>230</p>
            </div>
        </div>
        <div class="col-md-12 col-lg-3">
            <h5>Jumlah Like</h5>
            <div class="d-flex text-center items-center">
                <img src="assets/img/icons/like.svg" class="mb-3" width="25px" alt="Image" />&nbsp;
                <p>2.897</p>
            </div>
        </div>
    </div>

 
    <div class="d-flex justify-content-between" style="margin-top: 5%;">

        {{-- <div class="pp-news-box"> --}}
            <ul class="nav nav-tabs news-tablist-three" role="tablist">
                <li class="nav-item">
                    <button class="nav-link active btn btn-lg" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab">Home</button>
                </li>
                <li class="nav-item">
                    <button class="nav-link" data-bs-toggle="tab" data-bs-target="#statistika" type="button" role="tab">Statistika</button>
                </li>
                <li class="nav-item">
                    <button class="nav-link" data-bs-toggle="tab" data-bs-target="#status" type="button" role="tab">Status</button>
                </li>
            </ul>

            <a href="{{route('profile.berita.create')}}" class="text-white btn btn-lg justify-end" style="background-color: #0F4D8A; border-radius: 10px; padding-left: 3rem; padding-right: 3rem;">
                + Upload Berita
            </a>
        {{-- <button class="text-white btn btn-lg justify-end" style="background-color: #0F4D8A; border-radius: 10px; padding-left: 3rem; padding-right: 3rem;">
            
        </button> --}}
    </div>
    
    </div>
</div>


<div class="tab-content">
    <div class="tab-pane active" id="home" role="tabpanel">
        <div class="container" style="margin-top: 5%;">
            <h2><span style="color: #0F4D8A;">|</span>Berita Penulis</h2>
        
            <div class="row">
                <div class="news-card-img col-md-12 col-lg-3 mt-5">
                    <img src="assets/img/news/news-50.webp" class="img-home" width="400px" height="200px" alt="Image" />
                </div>
                <div class="news-card-info col-md-12 col-lg-3 mt-5">
                    <h5 class="news-cat"><a href="business-details.html">Jiraiya Banks Wants to Teach You How to Build a House</a></h5>
                    <p>Jiraiya Banks Wants to Teach You How to Build a House</p>
                    <ul class="row list-style">
                        <li class="col-md-12 col-lg-6"><svg xmlns="http://www.w3.org/2000/svg" width="23" height="23" viewBox="0 0 512 512"><path d="M368.005 272h-96v96h96v-96zm-32-208v32h-160V64h-48v32h-24.01c-22.002 0-40 17.998-40 40v272c0 22.002 17.998 40 40 40h304.01c22.002 0 40-17.998 40-40V136c0-22.002-17.998-40-40-40h-24V64h-48zm72 344h-304.01V196h304.01v212z" fill="#0f4d89"/></svg>
                        <a href="news-by-date.html" class="md-5">Feb 03, 2023</a></li>
                        <li class="col-md-12 col-lg-6"><svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 512 512"><path d="M198 448h172c15.7 0 28.6-9.6 34.2-23.4l57.1-135.4c1.7-4.4 2.6-9 2.6-14v-38.6c0-21.1-17-44.6-37.8-44.6H306.9l18-81.5.6-6c0-7.9-3.2-15.1-8.3-20.3L297 64 171 191.3c-6.8 6.9-11 16.5-11 27.1v192c0 21.1 17.2 37.6 38 37.6z" fill="#0f4d89"/><path d="M48 224h64v224H48z" fill="currentColor"/></svg>
                            <a href="news-by-date.html" class="md-5">1.203</a></li>
                    </ul>
                </div>
        
                <div class="news-card-img col-md-12 col-lg-3 mt-5">
                    <img src="assets/img/news/news-50.webp" class="img-home" alt="Image" />
                </div>
                <div class="news-card-info col-md-12 col-lg-3 mt-5">
                    <h5 class="news-cat"><a href="business-details.html">Jiraiya Banks Wants to Teach You How to Build a House</a></h5>
                    <p>Jiraiya Banks Wants to Teach You How to Build a House</p>
                    <ul class="row list-style">
                        <li class="col-md-12 col-lg-6"><svg xmlns="http://www.w3.org/2000/svg" width="23" height="23" viewBox="0 0 512 512"><path d="M368.005 272h-96v96h96v-96zm-32-208v32h-160V64h-48v32h-24.01c-22.002 0-40 17.998-40 40v272c0 22.002 17.998 40 40 40h304.01c22.002 0 40-17.998 40-40V136c0-22.002-17.998-40-40-40h-24V64h-48zm72 344h-304.01V196h304.01v212z" fill="#0f4d89"/></svg>
                        <a href="news-by-date.html" class="md-5">Feb 03, 2023</a></li>
                        <li class="col-md-12 col-lg-6"><svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 512 512"><path d="M198 448h172c15.7 0 28.6-9.6 34.2-23.4l57.1-135.4c1.7-4.4 2.6-9 2.6-14v-38.6c0-21.1-17-44.6-37.8-44.6H306.9l18-81.5.6-6c0-7.9-3.2-15.1-8.3-20.3L297 64 171 191.3c-6.8 6.9-11 16.5-11 27.1v192c0 21.1 17.2 37.6 38 37.6z" fill="#0f4d89"/><path d="M48 224h64v224H48z" fill="currentColor"/></svg>
                            <a href="news-by-date.html" class="md-5">1.203</a></li>
                    </ul>
                </div>
                
                <div class="news-card-img col-md-12 col-lg-3 mt-5">
                    <img src="assets/img/news/news-50.webp" class="img-home" alt="Image" />
                </div>
                <div class="news-card-info col-md-12 col-lg-3 mt-5">
                    <h5 class="news-cat"><a href="business-details.html">Jiraiya Banks Wants to Teach You How to Build a House</a></h5>
                    <p>Jiraiya Banks Wants to Teach You How to Build a House</p>
                    <ul class="row list-style">
                        <li class="col-md-12 col-lg-6"><svg xmlns="http://www.w3.org/2000/svg" width="23" height="23" viewBox="0 0 512 512"><path d="M368.005 272h-96v96h96v-96zm-32-208v32h-160V64h-48v32h-24.01c-22.002 0-40 17.998-40 40v272c0 22.002 17.998 40 40 40h304.01c22.002 0 40-17.998 40-40V136c0-22.002-17.998-40-40-40h-24V64h-48zm72 344h-304.01V196h304.01v212z" fill="#0f4d89"/></svg>
                        <a href="news-by-date.html" class="md-5">Feb 03, 2023</a></li>
                        <li class="col-md-12 col-lg-6"><svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 512 512"><path d="M198 448h172c15.7 0 28.6-9.6 34.2-23.4l57.1-135.4c1.7-4.4 2.6-9 2.6-14v-38.6c0-21.1-17-44.6-37.8-44.6H306.9l18-81.5.6-6c0-7.9-3.2-15.1-8.3-20.3L297 64 171 191.3c-6.8 6.9-11 16.5-11 27.1v192c0 21.1 17.2 37.6 38 37.6z" fill="#0f4d89"/><path d="M48 224h64v224H48z" fill="currentColor"/></svg>
                            <a href="news-by-date.html" class="md-5">1.203</a></li>
                    </ul>
                </div>
                
                <div class="news-card-img col-md-12 col-lg-3 mt-5">
                    <img src="assets/img/news/news-50.webp" class="img-home" alt="Image" />
                </div>
                <div class="news-card-info col-md-12 col-lg-3 mt-5">
                    <h5 class="news-cat"><a href="business-details.html">Jiraiya Banks Wants to Teach You How to Build a House</a></h5>
                    <p>Jiraiya Banks Wants to Teach You How to Build a House</p>
                    <ul class="row list-style">
                        <li class="col-md-12 col-lg-6"><svg xmlns="http://www.w3.org/2000/svg" width="23" height="23" viewBox="0 0 512 512"><path d="M368.005 272h-96v96h96v-96zm-32-208v32h-160V64h-48v32h-24.01c-22.002 0-40 17.998-40 40v272c0 22.002 17.998 40 40 40h304.01c22.002 0 40-17.998 40-40V136c0-22.002-17.998-40-40-40h-24V64h-48zm72 344h-304.01V196h304.01v212z" fill="#0f4d89"/></svg>
                        <a href="news-by-date.html" class="md-5">Feb 03, 2023</a></li>
                        <li class="col-md-12 col-lg-6"><svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 512 512"><path d="M198 448h172c15.7 0 28.6-9.6 34.2-23.4l57.1-135.4c1.7-4.4 2.6-9 2.6-14v-38.6c0-21.1-17-44.6-37.8-44.6H306.9l18-81.5.6-6c0-7.9-3.2-15.1-8.3-20.3L297 64 171 191.3c-6.8 6.9-11 16.5-11 27.1v192c0 21.1 17.2 37.6 38 37.6z" fill="#0f4d89"/><path d="M48 224h64v224H48z" fill="currentColor"/></svg>
                            <a href="news-by-date.html" class="md-5">1.203</a></li>
                    </ul>
                </div>
                
                <div class="news-card-img col-md-12 col-lg-3 mt-5">
                    <img src="assets/img/news/news-50.webp" class="img-home" alt="Image" />
                </div>
                <div class="news-card-info col-md-12 col-lg-3 mt-5">
                    <h5 class="news-cat"><a href="business-details.html">Jiraiya Banks Wants to Teach You How to Build a House</a></h5>
                    <p>Jiraiya Banks Wants to Teach You How to Build a House</p>
                    <ul class="row list-style">
                        <li class="col-md-12 col-lg-6"><svg xmlns="http://www.w3.org/2000/svg" width="23" height="23" viewBox="0 0 512 512"><path d="M368.005 272h-96v96h96v-96zm-32-208v32h-160V64h-48v32h-24.01c-22.002 0-40 17.998-40 40v272c0 22.002 17.998 40 40 40h304.01c22.002 0 40-17.998 40-40V136c0-22.002-17.998-40-40-40h-24V64h-48zm72 344h-304.01V196h304.01v212z" fill="#0f4d89"/></svg>
                        <a href="news-by-date.html" class="md-5">Feb 03, 2023</a></li>
                        <li class="col-md-12 col-lg-6"><svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 512 512"><path d="M198 448h172c15.7 0 28.6-9.6 34.2-23.4l57.1-135.4c1.7-4.4 2.6-9 2.6-14v-38.6c0-21.1-17-44.6-37.8-44.6H306.9l18-81.5.6-6c0-7.9-3.2-15.1-8.3-20.3L297 64 171 191.3c-6.8 6.9-11 16.5-11 27.1v192c0 21.1 17.2 37.6 38 37.6z" fill="#0f4d89"/><path d="M48 224h64v224H48z" fill="currentColor"/></svg>
                            <a href="news-by-date.html" class="md-5">1.203</a></li>
                    </ul>
                </div>
                
                <div class="news-card-img col-md-12 col-lg-3 mt-5">
                    <img src="assets/img/news/news-50.webp" class="img-home" alt="Image" />
                </div>
                <div class="news-card-info col-md-12 col-lg-3 mt-5">
                    <h5 class="news-cat"><a href="business-details.html">Jiraiya Banks Wants to Teach You How to Build a House</a></h5>
                    <p>Jiraiya Banks Wants to Teach You How to Build a House</p>
                    <ul class="row list-style">
                        <li class="col-md-12 col-lg-6"><svg xmlns="http://www.w3.org/2000/svg" width="23" height="23" viewBox="0 0 512 512"><path d="M368.005 272h-96v96h96v-96zm-32-208v32h-160V64h-48v32h-24.01c-22.002 0-40 17.998-40 40v272c0 22.002 17.998 40 40 40h304.01c22.002 0 40-17.998 40-40V136c0-22.002-17.998-40-40-40h-24V64h-48zm72 344h-304.01V196h304.01v212z" fill="#0f4d89"/></svg>
                        <a href="news-by-date.html" class="md-5">Feb 03, 2023</a></li>
                        <li class="col-md-12 col-lg-6"><svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 512 512"><path d="M198 448h172c15.7 0 28.6-9.6 34.2-23.4l57.1-135.4c1.7-4.4 2.6-9 2.6-14v-38.6c0-21.1-17-44.6-37.8-44.6H306.9l18-81.5.6-6c0-7.9-3.2-15.1-8.3-20.3L297 64 171 191.3c-6.8 6.9-11 16.5-11 27.1v192c0 21.1 17.2 37.6 38 37.6z" fill="#0f4d89"/><path d="M48 224h64v224H48z" fill="currentColor"/></svg>
                            <a href="news-by-date.html" class="md-5">1.203</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="tab-pane" id="statistika" role="tabpanel">
        <div class="container" style="margin-top: 5%;">
            <h2> <span style="color: #0F4D8A;">|</span>Analisis</h2>
    
            <div class="w-100 mt-5">
                <div class="d-md-flex align-items-start gap-3">
                    <div>
                        <h6 class="mb-0">Product Condition</h6>
                        <div class="d-flex align-items-center gap-3">
                            <h2 class="mt-2 fw-bold">75%</h2>
                            <span class="badge bg-primary px-2 py-1 d-flex align-items-center">
                                <i class="ti ti-chevron-down fs-4"></i>2.8% </span>
                        </div>
                    </div>
                </div>
                
                <div class="mt-4">
                    <div id="financial" style="min-height: 600px;">

                        <div id="chart"></div>

                        <div class="row" id="chart-info" style="margin-top: 5%;">
                            <div class="col-md-12 col-lg-4">
                                <h5>Jumlah Like</h5>
                                <div class="d-flex text-center items-center">
                                    <img src="assets/img/icons/like.svg" class="mb-3" width="25px" alt="Image" />&nbsp;
                                    <p>+ 2.897</p>
                                </div>
                            </div>
                            <div class="col-md-12 col-lg-4">
                                <h5>Jumlah Pengikut</h5>
                                <div class="d-flex text-center items-center">
                                    <img src="assets/img/icons/profile.svg" class="mb-3" width="25px" alt="Image" />&nbsp;
                                    <p>+ 1.290</p>
                                </div>
                            </div>
                            <div class="col-md-12 col-lg-4">
                                <h5>Pendapatan Keseluruhan</h5>
                                <div class="d-flex text-center">
                                    <img src="assets/img/icons/coin.svg" class="mb-3" width="25px" alt="Image" />&nbsp;
                                    <p>+ 1324</p>
                                </div>
                            </div>
                     
                        </div>
                          
                    </div>
                </div> 
            </div>
        </div>
    </div>
    
    <div class="tab-pane" id="status" role="tabpanel">
        <div class="container" style="margin-top: 5%;">
            <h2> <span style="color: #0F4D8A;">|</span>Status Berita</h2>
    

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
    











    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <script>
        var options = {
          series: [{
            name: "Desktops",
            data: [10, 41, 35, 51, 49, 62, 69, 91, 148]
        }],
          chart: {
          height: 350,
          type: 'line',
          zoom: {
            enabled: false
          }
        },
        dataLabels: {
          enabled: false
        },
        stroke: {
          curve: 'straight'
        },
        title: {
          text: 'Product Trends by Month',
          align: 'left'
        },
        grid: {
          row: {
            colors: ['#f3f3f3', 'transparent'], // takes an array which will be repeated on columns
            opacity: 0.5
          },
        },
        xaxis: {
          categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep'],
        }
        };

        var chart = new ApexCharts(document.querySelector("#chart"), options);
        chart.render();
    </script>
  </div>



  
@endsection


{{-- <!DOCTYPE html>
<html lang="zxx">
    <!-- Mirrored from templates.hibootstrap.com/baxo/default/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 26 Feb 2024 01:13:14 GMT -->
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />

        <link rel="stylesheet" href="assets/css/bootstrap.min.css" />
        <link rel="stylesheet" href="assets/css/remixicon.css" />
        <link rel="stylesheet" href="assets/css/uicons-regular-rounded.css" />
        <link rel="stylesheet" href="assets/css/flaticon_baxo.css" />
        <link rel="stylesheet" href="assets/css/swiper.bundle.min.css" />
        <link rel="stylesheet" href="assets/css/aos.css" />
        <link rel="stylesheet" href="assets/css/header.css" />
        <link rel="stylesheet" href="assets/css/style.css" />
        <link rel="stylesheet" href="assets/css/footer.css" />
        <link rel="stylesheet" href="assets/css/responsive.css" />
        <link rel="stylesheet" href="assets/css/dark-theme.css" />
        <title>Baxo - Responsive Blog HTML Template</title>
        <link rel="icon" type="image/png" href="assets/img/favicon.webp" />
    </head>
    <body>
        <div class="loader-wrapper">
            <div class="loader"></div>
            <div class="loader-section section-left"></div>
            <div class="loader-section section-right"></div>
        </div>

        <div class="switch-theme-mode">
            <label id="switch" class="switch">
                <input type="checkbox" onchange="toggleTheme()" id="slider" />
                <span class="slider round"></span>
            </label>
        </div>

        <div class="navbar-area header-one" id="navbar">
            <div class="container-fluid">
            
            </div>
        </div>

        <div class="responsive-navbar offcanvas offcanvas-end" data-bs-backdrop="static" tabindex="-1" id="navbarOffcanvas">
            <div class="offcanvas-header">
                <a href="index.html" class="logo d-inline-block">
                    <img class="logo-light" src="assets/img/logo.webp" alt="logo" />
                    <img class="logo-dark" src="assets/img/logo-white.webp" alt="logo" />
                </a>
                <button type="button" class="close-btn" data-bs-dismiss="offcanvas" aria-label="Close">
                    <i class="ri-close-line"></i>
                </button>
            </div>
            <div class="offcanvas-body">
                <div class="accordion" id="navbarAccordion">
                    <div class="accordion-item">
                        <button class="accordion-button collapsed active" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">Home</button>
                        <div id="collapseOne" class="accordion-collapse collapse" data-bs-parent="#navbarAccordion">
                            <div class="accordion-body">
                                <div class="accordion" id="navbarAccordion2">
                                    <div class="accordion-item">
                                        <a class="accordion-link active" href="index.html"> Home Demo One </a>
                                    </div>
                                    <div class="accordion-item">
                                        <a class="accordion-link" href="index-2.html"> Home Demo Two </a>
                                    </div>
                                    <div class="accordion-item">
                                        <a class="accordion-link" href="index-3.html"> Home Demo Three </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapbaxour" aria-expanded="false" aria-controls="collapbaxour">Pages</button>
                        <div id="collapbaxour" class="accordion-collapse collapse" data-bs-parent="#navbarAccordion">
                            <div class="accordion-body">
                                <div class="accordion" id="navbarAccordion45">
                                    <div class="accordion-item">
                                        <a class="accordion-link" href="about.html"> About Us </a>
                                    </div>
                                    <div class="accordion-item">
                                        <a class="accordion-link" href="contact.html"> Contact Us </a>
                                    </div>
                                    <div class="accordion-item">
                                        <a href="team.html" class="accordion-link"> Team </a>
                                    </div>
                                    <div class="accordion-item">
                                        <a href="author.html" class="accordion-link"> Author </a>
                                    </div>
                                    <div class="accordion-item">
                                        <a href="privacy-policy.html" class="accordion-link"> Privacy Policy </a>
                                    </div>
                                    <div class="accordion-item">
                                        <a href="terms-conditions.html" class="accordion-link"> Terms & Conditions </a>
                                    </div>
                                    <div class="accordion-item">
                                        <a href="error-404.html" class="accordion-link"> 404 Error Page </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">Business</button>
                        <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#navbarAccordion">
                            <div class="accordion-body">
                                <div class="accordion" id="navbarAccordion7">
                                    <div class="accordion-item">
                                        <a href="business.html" class="accordion-link"> Business News </a>
                                    </div>
                                    <div class="accordion-item">
                                        <a href="business-details.html" class="accordion-link"> Business News Details </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">Politics</button>
                        <div id="collapseThree" class="accordion-collapse collapse" data-bs-parent="#navbarAccordion">
                            <div class="accordion-body">
                                <div class="accordion" id="navbarAccordion30">
                                    <div class="accordion-item">
                                        <a href="politics.html" class="accordion-link"> Political News </a>
                                    </div>
                                    <div class="accordion-item">
                                        <a href="politics-details.html" class="accordion-link"> Political News Details </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">Video</button>
                        <div id="collapseFour" class="accordion-collapse collapse" data-bs-parent="#navbarAccordion">
                            <div class="accordion-body">
                                <div class="accordion" id="navbarAccordion11">
                                    <div class="accordion-item">
                                        <a href="featured-video.html" class="accordion-link"> Featured Video </a>
                                    </div>
                                    <div class="accordion-item">
                                        <a href="featured-video-details.html" class="accordion-link"> Featured Video Details </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFourth" aria-expanded="false" aria-controls="collapseFourth">Sports</button>
                        <div id="collapseFourth" class="accordion-collapse collapse" data-bs-parent="#navbarAccordion">
                            <div class="accordion-body">
                                <div class="accordion" id="navbarAccordion111">
                                    <div class="accordion-item">
                                        <a href="sports.html" class="accordion-link"> Sports News </a>
                                    </div>
                                    <div class="accordion-item">
                                        <a href="sports-details.html" class="accordion-link"> Sports News Details </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">Shop</button>
                        <div id="collapseFive" class="accordion-collapse collapse" data-bs-parent="#navbarAccordion">
                            <div class="accordion-body">
                                <div class="accordion" id="navbarAccordion70">
                                    <div class="accordion-item">
                                        <a href="shop-grid.html" class="accordion-link"> Shop Grid </a>
                                    </div>
                                    <div class="accordion-item">
                                        <a href="shop-left-sidebar.html" class="accordion-link"> Shop Left Sidebar </a>
                                    </div>
                                    <div class="accordion-item">
                                        <a href="shop-right-sidebar.html" class="accordion-link"> Shop Right Sidebar </a>
                                    </div>
                                    <div class="accordion-item">
                                        <a href="shop-details.html" class="accordion-link"> Shop Details </a>
                                    </div>
                                    <div class="accordion-item">
                                        <a href="cart.html" class="accordion-link"> Cart </a>
                                    </div>
                                    <div class="accordion-item">
                                        <a href="wishlist.html" class="accordion-link"> Wishlist </a>
                                    </div>
                                    <div class="accordion-item">
                                        <a href="checkout.html" class="accordion-link"> Checkout </a>
                                    </div>
                                    <div class="accordion-item">
                                        <a href="login.html" class="accordion-link"> Login </a>
                                    </div>
                                    <div class="accordion-item">
                                        <a href="signup.html" class="accordion-link"> Sign Up </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="offcanvas-contact-info">
                    <h4>Contact Info</h4>
                    <ul class="contact-info list-style">
                        <li>
                            <i class="ri-map-pin-fill"></i>
                            <p>28/A Street, New York, USA</p>
                        </li>
                        <li>
                            <i class="ri-mail-fill"></i>
                            <a href="https://templates.hibootstrap.com/cdn-cgi/l/email-protection#9df5f8f1f1f2ddfffce5f2b3fef2f0"><span class="__cf_email__" data-cfemail="fa929f969695ba989b8295d4999597">[email&#160;protected]</span></a>
                        </li>
                        <li>
                            <i class="ri-phone-fill"></i>
                            <a href="tel:1800123456789">+1 800 123 456 789</a>
                        </li>
                    </ul>
                    <ul class="social-profile list-style">
                        <li>
                            <a href="https://www.fb.com/" target="_blank"><i class="ri-facebook-fill"></i></a>
                        </li>
                        <li>
                            <a href="https://www.instagram.com/" target="_blank"><i class="ri-instagram-line"></i></a>
                        </li>
                        <li>
                            <a href="https://www.linkedin.com/" target="_blank"><i class="ri-linkedin-fill"></i></a>
                        </li>
                        <li>
                            <a href="https://www.twitter.com/" target="_blank"><i class="ri-twitter-fill"></i></a>
                        </li>
                    </ul>
                </div>
                <div class="others-option d-flex d-lg-none align-items-center">
                    <div class="option-item">
                        <a href="login.html" class="btn-two">Sign In</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade searchModal" id="searchModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form>
                        <input type="text" class="form-control" placeholder="Search here...." />
                        <button type="submit"><i class="fi fi-rr-search"></i></button>
                    </form>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><i class="ri-close-line"></i></button>
                </div>
            </div>
        </div>

        <div class="container-fluid pb-75">
            <div class="news-col-wrap">
                <div class="container">
                    <div class="d-flex mt-4 news-card-img align-items-center">
                        <div class="">
                            <img src="assets/img/news/trending-3.webp" alt="Profile Image" width="90px" style="border-radius: 50%;" />
                        </div>
                        <div style="margin-left: 2%;">
                            <h4 class="mb-0">Hi, Daffa Prasetya</h4>
                            <div class="text-center" style="margin-top: 2%">
                                <button class="text-white" style="background-color: #0F4D8A; border-radius: 10px; padding-left: 3rem; padding-right: 3rem;">
                                    Edit Profile  
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="p-2 grid grid-cols-1 xl:grid-cols-4">
        
            </div>
           
        </div>

        <div class="bg_gray editor-news pt-100 pb-75">
            <div class="container-fluid">
                <div class="row gx-5">
                    <div class="col-xl-6">
                        <div class="editor-box">
                            <div class="row align-items-end mb-40">
                                <div class="col-xl-6 col-md-6">
                                    <h2 class="section-title">Editor's Pick<img class="section-title-img" src="assets/img/section-img.webp" alt="Image" /></h2>
                                </div>
                                <div class="col-xl-6 col-md-6">
                                    <ul class="nav nav-tabs news-tablist" role="tablist">
                                        <li class="nav-item">
                                            <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#tab_1" type="button" role="tab">Poilitics</button>
                                        </li>
                                        <li class="nav-item">
                                            <button class="nav-link" data-bs-toggle="tab" data-bs-target="#tab_2" type="button" role="tab">Sports</button>
                                        </li>
                                        <li class="nav-item">
                                            <button class="nav-link" data-bs-toggle="tab" data-bs-target="#tab_3" type="button" role="tab">Business</button>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="tab-content editor-news-content">
                                <div class="tab-pane fade show active" id="tab_1" role="tabpanel">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="news-card-six">
                                                <div class="news-card-img">
                                                    <img src="assets/img/news/news-38.webp" alt="Image" />
                                                    <a href="business.html" class="news-cat">Politics</a>
                                                </div>
                                                <div class="news-card-info">
                                                    <div class="news-author">
                                                        <div class="news-author-img">
                                                            <img src="assets/img/author/author-thumb-1.webp" alt="Image" />
                                                        </div>
                                                        <h5>By <a href="author.html">OLIVIA EMMA</a></h5>
                                                    </div>
                                                    <h3><a href="business-details.html">How Maps Reshape American Politics In World</a></h3>
                                                    <ul class="news-metainfo list-style">
                                                        <li><i class="fi fi-rr-calendar-minus"></i><a href="news-by-date.html">Apr 03, 2023</a></li>
                                                        <li><i class="fi fi-rr-comment"></i>03</li>
                                                        <li><i class="fi fi-rr-clock-three"></i>15 Min Read</li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="news-card-six">
                                                <div class="news-card-img">
                                                    <img src="assets/img/news/news-39.webp" alt="Image" />
                                                    <a href="business.html" class="news-cat">Politics</a>
                                                </div>
                                                <div class="news-card-info">
                                                    <div class="news-author">
                                                        <div class="news-author-img">
                                                            <img src="assets/img/author/author-thumb-2.webp" alt="Image" />
                                                        </div>
                                                        <h5>By <a href="author.html">ELIJAH JAMES</a></h5>
                                                    </div>
                                                    <h3><a href="business-details.html">Will Humans be able to live in Mars in the future?</a></h3>
                                                    <ul class="news-metainfo list-style">
                                                        <li><i class="fi fi-rr-calendar-minus"></i><a href="news-by-date.html">Mar 22, 2023</a></li>
                                                        <li><i class="fi fi-rr-comment"></i>03</li>
                                                        <li><i class="fi fi-rr-clock-three"></i>10 Min Read</li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="news-card-six">
                                                <div class="news-card-img">
                                                    <img src="assets/img/news/news-40.webp" alt="Image" />
                                                    <a href="business.html" class="news-cat">Politics</a>
                                                </div>
                                                <div class="news-card-info">
                                                    <div class="news-author">
                                                        <div class="news-author-img">
                                                            <img src="assets/img/author/author-thumb-3.webp" alt="Image" />
                                                        </div>
                                                        <h5>By<a href="author.html">BANKS GAIN</a></h5>
                                                    </div>
                                                    <h3><a href="business-details.html">Here’s the proof momentum strategy work</a></h3>
                                                    <ul class="news-metainfo list-style">
                                                        <li><i class="fi fi-rr-calendar-minus"></i><a href="news-by-date.html">Apr 15, 2023</a></li>
                                                        <li><i class="fi fi-rr-comment"></i>03</li>
                                                        <li><i class="fi fi-rr-clock-three"></i>15 Min Read</li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="news-card-six">
                                                <div class="news-card-img">
                                                    <img src="assets/img/news/news-41.webp" alt="Image" />
                                                    <a href="business.html" class="news-cat">Politics</a>
                                                </div>
                                                <div class="news-card-info">
                                                    <div class="news-author">
                                                        <div class="news-author-img">
                                                            <img src="assets/img/author/author-thumb-4.webp" alt="Image" />
                                                        </div>
                                                        <h5>By <a href="author.html">HARPAR LUNA</a></h5>
                                                    </div>
                                                    <h3><a href="business-details.html">The Promise And Potential Of Synthetic Assets</a></h3>
                                                    <ul class="news-metainfo list-style">
                                                        <li><i class="fi fi-rr-calendar-minus"></i><a href="news-by-date.html">Apr 14, 2023</a></li>
                                                        <li><i class="fi fi-rr-comment"></i>03</li>
                                                        <li><i class="fi fi-rr-clock-three"></i>15 Min Read</li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="tab_2" role="tabpanel">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="news-card-six">
                                                <div class="news-card-img">
                                                    <img src="assets/img/news/news-42.webp" alt="Image" />
                                                    <a href="business.html" class="news-cat">Sports</a>
                                                </div>
                                                <div class="news-card-info">
                                                    <div class="news-author">
                                                        <div class="news-author-img">
                                                            <img src="assets/img/author/author-thumb-5.webp" alt="Image" />
                                                        </div>
                                                        <h5>By <a href="author.html">OLIVIA EMMA</a></h5>
                                                    </div>
                                                    <h3><a href="business-details.html">Joe Gibbs discusses Ty Gibbs incident at Martinsville</a></h3>
                                                    <ul class="news-metainfo list-style">
                                                        <li><i class="fi fi-rr-calendar-minus"></i><a href="news-by-date.html">Apr 07, 2023</a></li>
                                                        <li><i class="fi fi-rr-comment"></i>03</li>
                                                        <li><i class="fi fi-rr-clock-three"></i>12 Min Read</li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="news-card-six">
                                                <div class="news-card-img">
                                                    <img src="assets/img/news/news-43.webp" alt="Image" />
                                                    <a href="business.html" class="news-cat">Sports</a>
                                                </div>
                                                <div class="news-card-info">
                                                    <div class="news-author">
                                                        <div class="news-author-img">
                                                            <img src="assets/img/author/author-thumb-2.webp" alt="Image" />
                                                        </div>
                                                        <h5>By <a href="author.html">ELIJAH JAMES</a></h5>
                                                    </div>
                                                    <h3><a href="business-details.html">The Heart of a Champion: Mental Toughness in Sports</a></h3>
                                                    <ul class="news-metainfo list-style">
                                                        <li><i class="fi fi-rr-calendar-minus"></i><a href="news-by-date.html">Apr 03, 2023</a></li>
                                                        <li><i class="fi fi-rr-comment"></i>03</li>
                                                        <li><i class="fi fi-rr-clock-three"></i>15 Min Read</li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="news-card-six">
                                                <div class="news-card-img">
                                                    <img src="assets/img/news/news-44.webp" alt="Image" />
                                                    <a href="business.html" class="news-cat">Sports</a>
                                                </div>
                                                <div class="news-card-info">
                                                    <div class="news-author">
                                                        <div class="news-author-img">
                                                            <img src="assets/img/author/author-thumb-3.webp" alt="Image" />
                                                        </div>
                                                        <h5>By<a href="author.html">BANKS GAIN</a></h5>
                                                    </div>
                                                    <h3><a href="business-details.html">Breaking Barriers: Inspiring Stories in Sports</a></h3>
                                                    <ul class="news-metainfo list-style">
                                                        <li><i class="fi fi-rr-calendar-minus"></i><a href="news-by-date.html">Feb 03, 2023</a></li>
                                                        <li><i class="fi fi-rr-comment"></i>03</li>
                                                        <li><i class="fi fi-rr-clock-three"></i>12 Min Read</li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="news-card-six">
                                                <div class="news-card-img">
                                                    <img src="assets/img/news/news-45.webp" alt="Image" />
                                                    <a href="business.html" class="news-cat">Sports</a>
                                                </div>
                                                <div class="news-card-info">
                                                    <div class="news-author">
                                                        <div class="news-author-img">
                                                            <img src="assets/img/author/author-thumb-4.webp" alt="Image" />
                                                        </div>
                                                        <h5>By <a href="author.html">HARPAR LUNA</a></h5>
                                                    </div>
                                                    <h3><a href="business-details.html">Unleashing Your Inner Athlete: The Power of Sports</a></h3>
                                                    <ul class="news-metainfo list-style">
                                                        <li><i class="fi fi-rr-calendar-minus"></i><a href="news-by-date.html">Apr 03, 2023</a></li>
                                                        <li><i class="fi fi-rr-comment"></i>03</li>
                                                        <li><i class="fi fi-rr-clock-three"></i>14 Min Read</li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="tab_3" role="tabpanel">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="news-card-six">
                                                <div class="news-card-img">
                                                    <img src="assets/img/news/news-46.webp" alt="Image" />
                                                    <a href="business.html" class="news-cat">Business</a>
                                                </div>
                                                <div class="news-card-info">
                                                    <div class="news-author">
                                                        <div class="news-author-img">
                                                            <img src="assets/img/author/author-thumb-1.webp" alt="Image" />
                                                        </div>
                                                        <h5>By <a href="author.html">OLIVIA EMMA</a></h5>
                                                    </div>
                                                    <h3><a href="business-details.html">Navigating the Entrepreneurial Journey: Tips for Success</a></h3>
                                                    <ul class="news-metainfo list-style">
                                                        <li><i class="fi fi-rr-calendar-minus"></i><a href="news-by-date.html">Apr 15, 2023</a></li>
                                                        <li><i class="fi fi-rr-comment"></i>03</li>
                                                        <li><i class="fi fi-rr-clock-three"></i>15 Min Read</li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="news-card-six">
                                                <div class="news-card-img">
                                                    <img src="assets/img/news/news-47.webp" alt="Image" />
                                                    <a href="business.html" class="news-cat">Business</a>
                                                </div>
                                                <div class="news-card-info">
                                                    <div class="news-author">
                                                        <div class="news-author-img">
                                                            <img src="assets/img/author/author-thumb-2.webp" alt="Image" />
                                                        </div>
                                                        <h5>By <a href="author.html">ELIJAH JAMES</a></h5>
                                                    </div>
                                                    <h3><a href="business-details.html">Revolutionizing Business: The Power of Innovation</a></h3>
                                                    <ul class="news-metainfo list-style">
                                                        <li><i class="fi fi-rr-calendar-minus"></i><a href="news-by-date.html">Mar 03, 2023</a></li>
                                                        <li><i class="fi fi-rr-comment"></i>03</li>
                                                        <li><i class="fi fi-rr-clock-three"></i>10 Min Read</li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="news-card-six">
                                                <div class="news-card-img">
                                                    <img src="assets/img/news/news-48.webp" alt="Image" />
                                                    <a href="business.html" class="news-cat">Business</a>
                                                </div>
                                                <div class="news-card-info">
                                                    <div class="news-author">
                                                        <div class="news-author-img">
                                                            <img src="assets/img/author/author-thumb-3.webp" alt="Image" />
                                                        </div>
                                                        <h5>By<a href="author.html">BANKS GAIN</a></h5>
                                                    </div>
                                                    <h3><a href="business-details.html">From Start-Up to Scale-Up: Growing Your Business</a></h3>
                                                    <ul class="news-metainfo list-style">
                                                        <li><i class="fi fi-rr-calendar-minus"></i><a href="news-by-date.html">Feb 22, 2023</a></li>
                                                        <li><i class="fi fi-rr-comment"></i>03</li>
                                                        <li><i class="fi fi-rr-clock-three"></i>15 Min Read</li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="news-card-six">
                                                <div class="news-card-img">
                                                    <img src="assets/img/news/news-49.webp" alt="Image" />
                                                    <a href="business.html" class="news-cat">Business</a>
                                                </div>
                                                <div class="news-card-info">
                                                    <div class="news-author">
                                                        <div class="news-author-img">
                                                            <img src="assets/img/author/author-thumb-4.webp" alt="Image" />
                                                        </div>
                                                        <h5>By <a href="author.html">HARPAR LUNA</a></h5>
                                                    </div>
                                                    <h3><a href="business-details.html">Building a Thriving Business: Strategies for Success</a></h3>
                                                    <ul class="news-metainfo list-style">
                                                        <li><i class="fi fi-rr-calendar-minus"></i><a href="news-by-date.html">Feb 05, 2023</a></li>
                                                        <li><i class="fi fi-rr-comment"></i>03</li>
                                                        <li><i class="fi fi-rr-clock-three"></i>15 Min Read</li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6">
                        <div class="pp-news-box">
                            <ul class="nav nav-tabs news-tablist-two" role="tablist">
                                <li class="nav-item">
                                    <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#tab_10" type="button" role="tab">Popular News</button>
                                </li>
                                <li class="nav-item">
                                    <button class="nav-link" data-bs-toggle="tab" data-bs-target="#tab_11" type="button" role="tab">Recent News</button>
                                </li>
                            </ul>
                            <div class="tab-content news-tab-content">
                                <div class="tab-pane fade show active" id="tab_10" role="tabpanel">
                                    <div class="news-card-seven">
                                        <div class="news-card-img">
                                            <img src="assets/img/news/news-50.webp" alt="Image" />
                                        </div>
                                        <div class="news-card-info">
                                            <a href="business.html" class="news-cat">Lifestyle</a>
                                            <h3><a href="business-details.html">Jiraiya Banks Wants to Teach You How to Build a House</a></h3>
                                            <ul class="news-metainfo list-style">
                                                <li><i class="fi fi-rr-calendar-minus"></i><a href="news-by-date.html">Feb 03, 2023</a></li>
                                                <li><i class="fi fi-rr-comment"></i>03</li>
                                                <li><i class="fi fi-rr-clock-three"></i>15 Min Read</li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="news-card-seven">
                                        <div class="news-card-img">
                                            <img src="assets/img/news/news-51.webp" alt="Image" />
                                        </div>
                                        <div class="news-card-info">
                                            <a href="business.html" class="news-cat">Photography</a>
                                            <h3><a href="business-details.html">The Secret Math Behind Mind Reading Magic Tricks</a></h3>
                                            <ul class="news-metainfo list-style">
                                                <li><i class="fi fi-rr-calendar-minus"></i><a href="news-by-date.html">Apr 25, 2023</a></li>
                                                <li><i class="fi fi-rr-comment"></i>03</li>
                                                <li><i class="fi fi-rr-clock-three"></i>15 Min Read</li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="news-card-seven">
                                        <div class="news-card-img">
                                            <img src="assets/img/news/news-52.webp" alt="Image" />
                                        </div>
                                        <div class="news-card-info">
                                            <a href="business.html" class="news-cat">Business</a>
                                            <h3><a href="business-details.html">Recovery and Cleanup in Florida After Hurricane Ian</a></h3>
                                            <ul class="news-metainfo list-style">
                                                <li><i class="fi fi-rr-calendar-minus"></i><a href="news-by-date.html">Msr 15, 2023</a></li>
                                                <li><i class="fi fi-rr-comment"></i>03</li>
                                                <li><i class="fi fi-rr-clock-three"></i>15 Min Read</li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="news-card-seven">
                                        <div class="news-card-img">
                                            <img src="assets/img/news/news-53.webp" alt="Image" />
                                        </div>
                                        <div class="news-card-info">
                                            <a href="business.html" class="news-cat">Sports</a>
                                            <h3><a href="business-details.html">6 Romantic places You Want to Visit with Your Partner</a></h3>
                                            <ul class="news-metainfo list-style">
                                                <li><i class="fi fi-rr-calendar-minus"></i><a href="news-by-date.html">Feb 22, 2023</a></li>
                                                <li><i class="fi fi-rr-comment"></i>03</li>
                                                <li><i class="fi fi-rr-clock-three"></i>15 Min Read</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="tab_11" role="tabpanel">
                                    <div class="news-card-seven">
                                        <div class="news-card-img">
                                            <img src="assets/img/news/news-54.webp" alt="Image" />
                                        </div>
                                        <div class="news-card-info">
                                            <a href="business.html" class="news-cat">Lifestyle</a>
                                            <h3><a href="business-details.html">Discovering Your Personal Bliss: A Guide to a Fulfilling Lifestyle</a></h3>
                                            <ul class="news-metainfo list-style">
                                                <li><i class="fi fi-rr-calendar-minus"></i><a href="news-by-date.html">Feb 15, 2023</a></li>
                                                <li><i class="fi fi-rr-comment"></i>03</li>
                                                <li><i class="fi fi-rr-clock-three"></i>15 Min Read</li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="news-card-seven">
                                        <div class="news-card-img">
                                            <img src="assets/img/news/news-55.webp" alt="Image" />
                                        </div>
                                        <div class="news-card-info">
                                            <a href="business.html" class="news-cat">Photography</a>
                                            <h3><a href="business-details.html">Capturing Life's Moments: Tips for Better Photography</a></h3>
                                            <ul class="news-metainfo list-style">
                                                <li><i class="fi fi-rr-calendar-minus"></i><a href="news-by-date.html">Feb 14, 2023</a></li>
                                                <li><i class="fi fi-rr-comment"></i>03</li>
                                                <li><i class="fi fi-rr-clock-three"></i>15 Min Read</li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="news-card-seven">
                                        <div class="news-card-img">
                                            <img src="assets/img/news/news-56.webp" alt="Image" />
                                        </div>
                                        <div class="news-card-info">
                                            <a href="business.html" class="news-cat">Business</a>
                                            <h3><a href="business-details.html">Empowering Your Business: Strategies for Growth</a></h3>
                                            <ul class="news-metainfo list-style">
                                                <li><i class="fi fi-rr-calendar-minus"></i><a href="news-by-date.html">Feb 18, 2023</a></li>
                                                <li><i class="fi fi-rr-comment"></i>03</li>
                                                <li><i class="fi fi-rr-clock-three"></i>15 Min Read</li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="news-card-seven">
                                        <div class="news-card-img">
                                            <img src="assets/img/news/news-57.webp" alt="Image" />
                                        </div>
                                        <div class="news-card-info">
                                            <a href="business.html" class="news-cat">Sports</a>
                                            <h3><a href="business-details.html">Unleashing Your Inner Champion: The Excitement of Sports Competition</a></h3>
                                            <ul class="news-metainfo list-style">
                                                <li><i class="fi fi-rr-calendar-minus"></i><a href="news-by-date.html">Feb 22, 2023</a></li>
                                                <li><i class="fi fi-rr-comment"></i>03</li>
                                                <li><i class="fi fi-rr-clock-three"></i>12 Min Read</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="selected-news ptb-100">
            <div class="container-fluid">
                <div class="content-wrapper">
                    <div class="left-content">
                        <div class="row align-items-end mb-40">
                            <div class="col-md-7">
                                <h2 class="section-title">Selected Posts<img class="section-title-img" src="assets/img/section-img.webp" alt="Image" /></h2>
                            </div>
                            <div class="col-md-5 text-md-end">
                                <a href="business.html" class="link-one">View All News<i class="flaticon-right-arrow"></i></a>
                            </div>
                        </div>
                        <div class="row gx-45">
                            <div class="col-xl-7">
                                <div class="news-card-four">
                                    <img src="assets/img/news/news-31.webp" alt="Image" />
                                    <div class="news-card-info">
                                        <h3><a href="business-details.html">Kyrgios And Djokovic Agree To Post-match Meal</a></h3>
                                        <ul class="news-metainfo list-style">
                                            <li><i class="fi fi-rr-calendar-minus"></i><a href="news-by-date.html">Apr 25, 2023</a></li>
                                            <li><i class="fi fi-rr-clock-three"></i>15 Min Read</li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="news-card-five">
                                    <div class="news-card-img">
                                        <img src="assets/img/news/news-32.webp" alt="Image" />
                                        <a href="business.html" class="news-cat">Sports</a>
                                    </div>
                                    <div class="news-card-info">
                                        <h3><a href="business-details.html">Muga Nemo Aptent Quaerat Explicabo Urna Ni Like Ange</a></h3>
                                        <p>Lorem ipsum or lipsum as it is sometmes known is dum text used in laying print, graphic or web desi…</p>
                                        <ul class="news-metainfo list-style">
                                            <li><i class="fi fi-rr-calendar-minus"></i><a href="news-by-date.html">Feb 03, 2023</a></li>
                                            <li><i class="fi fi-rr-clock-three"></i>15 Min Read</li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="news-card-five">
                                    <div class="news-card-img">
                                        <img src="assets/img/news/news-33.webp" alt="Image" />
                                        <a href="business.html" class="news-cat">Fashion</a>
                                    </div>
                                    <div class="news-card-info">
                                        <h3><a href="business-details.html">Selective Focus Photography Of Orange Fox Life</a></h3>
                                        <p>Lorem ipsum or lipsum as it is sometmes known is dum text used in laying print, graphic or web desi…</p>
                                        <ul class="news-metainfo list-style">
                                            <li><i class="fi fi-rr-calendar-minus"></i><a href="news-by-date.html">Apr 03, 2023</a></li>
                                            <li><i class="fi fi-rr-clock-three"></i>15 Min Read</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-5">
                                <div class="news-card-two">
                                    <div class="news-card-img">
                                        <img src="assets/img/news/news-34.webp" alt="Image" />
                                        <a href="business.html" class="news-cat">Politics</a>
                                    </div>
                                    <div class="news-card-info">
                                        <h3><a href="business-details.html">Beyond Good & Evil 2 Has Been In Development Longer Than Literally Any Game, Ever</a></h3>
                                        <ul class="news-metainfo list-style">
                                            <li><i class="fi fi-rr-calendar-minus"></i><a href="news-by-date.html">Apr 15, 2023</a></li>
                                            <li><i class="fi fi-rr-clock-three"></i>15 Min Read</li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="news-card-three">
                                    <div class="news-card-img">
                                        <img src="assets/img/news/news-35.webp" alt="Image" />
                                    </div>
                                    <div class="news-card-info">
                                        <a href="business.html" class="news-cat">Travel</a>
                                        <h3><a href="business-details.html">World Trending Best 10 Website Travel Tips For Runners Groups Of</a></h3>
                                        <ul class="news-metainfo list-style">
                                            <li><i class="fi fi-rr-calendar-minus"></i><a href="news-by-date.html">Apr 22, 2023</a></li>
                                            <li><i class="fi fi-rr-clock-three"></i>15 Min Read</li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="news-card-three">
                                    <div class="news-card-img">
                                        <img src="assets/img/news/news-36.webp" alt="Image" />
                                    </div>
                                    <div class="news-card-info">
                                        <a href="business.html" class="news-cat">Business</a>
                                        <h3><a href="business-details.html">How To Find The Right Template For Your Specific Product</a></h3>
                                        <ul class="news-metainfo list-style">
                                            <li><i class="fi fi-rr-calendar-minus"></i><a href="news-by-date.html">Apr 15, 2023</a></li>
                                            <li><i class="fi fi-rr-clock-three"></i>15 Min Read</li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="news-card-three">
                                    <div class="news-card-img">
                                        <img src="assets/img/news/news-37.webp" alt="Image" />
                                    </div>
                                    <div class="news-card-info">
                                        <a href="business.html" class="news-cat">Health</a>
                                        <h3><a href="business-details.html">Life Health Continues To Spread Rapidly, Are Many People</a></h3>
                                        <ul class="news-metainfo list-style">
                                            <li><i class="fi fi-rr-calendar-minus"></i><a href="news-by-date.html">Apr 16, 2023</a></li>
                                            <li><i class="fi fi-rr-clock-three"></i>15 Min Read</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="promo-wrap">
                                    <div class="promo-card bg-f">
                                        <img src="assets/img/promo-shape-2.webp" alt="Image" class="promo-shape" />
                                        <div class="promo-content">
                                            <a href="index.html" class="logo"><img src="assets/img/logo-white.webp" alt="Image" /></a>
                                            <p>The European languages are members of the same family.</p>
                                        </div>
                                        <div class="promo-img">
                                            <img src="assets/img/promo-img.webp" alt="Image" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="sidebar">
                        <div class="sidebar-widget">
                            <h3 class="sidebar-widget-title">Social Links</h3>
                            <ul class="social-widget list-style">
                                <li>
                                    <a href="https://www.fb.com/" target="_blank">
                                        <span><img src="assets/img/icons/facebook.svg" alt="Image" /></span>
                                        Facebook
                                    </a>
                                    <p>
                                        28 <br />
                                        Likes
                                    </p>
                                </li>
                                <li>
                                    <a href="https://www.twitter.com/" target="_blank">
                                        <span><img src="assets/img/icons/twitter.svg" alt="Image" /></span>
                                        Twitter
                                    </a>
                                    <p>289k Followers</p>
                                </li>
                                <li>
                                    <a href="https://www.instagram.com/" target="_blank">
                                        <span><img src="assets/img/icons/instagram.svg" alt="Image" /></span>
                                        Instagram
                                    </a>
                                    <p>231k Followers</p>
                                </li>
                                <li>
                                    <a href="https://www.pinterest.com/" target="_blank">
                                        <span><img src="assets/img/icons/pinterest.svg" alt="Image" /></span>
                                        Pinterest
                                    </a>
                                    <p>28k Followers</p>
                                </li>
                                <li>
                                    <a href="https://www.youtube.com/" target="_blank">
                                        <span><img src="assets/img/icons/youtube.svg" alt="Image" /></span>
                                        Youtube
                                    </a>
                                    <p>159k Subscribers</p>
                                </li>
                                <li>
                                    <a href="https://www.soundcloud.com/" target="_blank">
                                        <span><img src="assets/img/icons/soundcloud.svg" alt="Image" /></span>
                                        Soundcloud
                                    </a>
                                    <p>31k Followers</p>
                                </li>
                                <li>
                                    <a href="https://www.behance.com/" target="_blank">
                                        <span><img src="assets/img/icons/behance.svg" alt="Image" /></span>
                                        Behance
                                    </a>
                                    <p>28 Followers</p>
                                </li>
                                <li>
                                    <a href="https://www.vimeo.com/" target="_blank">
                                        <span><img src="assets/img/icons/vimeo.svg" alt="Image" /></span>
                                        Vimeo
                                    </a>
                                    <p>55k Followers</p>
                                </li>
                                <li>
                                    <a href="https://www.telegram.com/" target="_blank">
                                        <span><img src="assets/img/icons/telegram.svg" alt="Image" /></span>
                                        Telegram
                                    </a>
                                    <p>788k Followers</p>
                                </li>
                            </ul>
                        </div>
                        <div class="sidebar-widget">
                            <div class="newsletter-widget">
                                <h2>Newsletter</h2>
                                <h6>Join 70,000 Subscribers</h6>
                                <form action="#">
                                    <input type="email" placeholder="Email Address" />
                                    <button type="submit">Subscribe<i class="flaticon-right-arrow-1"></i></button>
                                </form>
                                <p>By signing up, you agree to our <a href="privacy-policy.html">Privacy Policy</a></p>
                            </div>
                        </div>
                        <div class="sidebar-widget">
                            <h3 class="sidebar-widget-title">Popular Tags</h3>
                            <ul class="tag-list list-style">
                                <li><a href="news-by-tags.html">BUSINESS</a></li>
                                <li><a href="news-by-tags.html">FOOD</a></li>
                                <li><a href="news-by-tags.html">SCIENCE</a></li>
                                <li><a href="news-by-tags.html">LIFESTYLE</a></li>
                                <li><a href="news-by-tags.html">SPORTS</a></li>
                                <li><a href="news-by-tags.html">PHOTO</a></li>
                                <li><a href="news-by-tags.html">TECHNOLOGY</a></li>
                                <li><a href="news-by-tags.html">CONTENT</a></li>
                                <li><a href="news-by-tags.html">FEATURED</a></li>
                                <li><a href="news-by-tags.html">AUDIO</a></li>
                                <li><a href="news-by-tags.html">FASHION</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="bg_gray popular-news ptb-100">
            <div class="container-fluid">
                <div class="row align-items-end mb-40">
                    <div class="col-md-7">
                        <h2 class="section-title">Most Popular<img class="section-title-img" src="assets/img/section-img.webp" alt="Image" /></h2>
                    </div>
                    <div class="col-md-5 text-md-end">
                        <a href="business.html" class="link-one">View All News<i class="flaticon-right-arrow"></i></a>
                    </div>
                </div>
                <div class="row gx-55">
                    <div class="col-xl-6">
                        <div class="row">
                            <div class="col-12">
                                <div class="news-card-eleven">
                                    <div class="news-card-img">
                                        <img src="assets/img/news/news-26.webp" alt="Image" />
                                    </div>
                                    <div class="news-card-info">
                                        <div class="news-author">
                                            <div class="news-author-img">
                                                <img src="assets/img/author/author-thumb-1.webp" alt="Image" />
                                            </div>
                                            <h5>By <a href="author.html">OLIVIA EMMA</a></h5>
                                        </div>
                                        <h3><a href="business-details.html">Multiple Games & Updates For 2023 Holiday Season</a></h3>
                                        <ul class="news-metainfo list-style">
                                            <li><i class="fi fi-rr-calendar-minus"></i><a href="news-by-date.html">Feb 03, 2023</a></li>
                                            <li><i class="fi fi-rr-comment"></i>03</li>
                                            <li><i class="fi fi-rr-clock-three"></i>15 Min Read</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="news-card-ten">
                                    <a href="business.html" class="news-cat">Business</a>
                                    <h3><a href="business-details.html">First Prototype Flight Using Kinetic Launch System</a></h3>
                                    <ul class="news-metainfo list-style">
                                        <li><i class="fi fi-rr-calendar-minus"></i><a href="news-by-date.html">Apr 03, 2023</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="news-card-ten">
                                    <a href="business.html" class="news-cat">Inspiration</a>
                                    <h3><a href="business-details.html">A Comprehensive Guide To The Best Summer Dresses</a></h3>
                                    <ul class="news-metainfo list-style">
                                        <li><i class="fi fi-rr-calendar-minus"></i><a href="news-by-date.html">Mar 03, 2023</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="news-card-six">
                                    <div class="news-card-img">
                                        <img src="assets/img/news/news-27.webp" alt="Image" />
                                        <a href="business.html" class="news-cat">Health</a>
                                    </div>
                                    <div class="news-card-info">
                                        <div class="news-author">
                                            <div class="news-author-img">
                                                <img src="assets/img/author/author-thumb-1.webp" alt="Image" />
                                            </div>
                                            <h5>By <a href="author.html">OLIVIA EMMA</a></h5>
                                        </div>
                                        <h3><a href="business-details.html">I Thought I'd Found A Cheat Code For Parenting</a></h3>
                                        <ul class="news-metainfo list-style">
                                            <li><i class="fi fi-rr-calendar-minus"></i><a href="news-by-date.html">Apr 22, 2023</a></li>
                                            <li><i class="fi fi-rr-comment"></i>03</li>
                                            <li><i class="fi fi-rr-clock-three"></i>15 Min Read</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="news-card-six">
                                    <div class="news-card-img">
                                        <img src="assets/img/news/news-28.webp" alt="Image" />
                                        <a href="business.html" class="news-cat">Education</a>
                                    </div>
                                    <div class="news-card-info">
                                        <div class="news-author">
                                            <div class="news-author-img">
                                                <img src="assets/img/author/author-thumb-2.webp" alt="Image" />
                                            </div>
                                            <h5>By <a href="author.html">OLIVIA EMMA</a></h5>
                                        </div>
                                        <h3><a href="business-details.html">How To Make Your Life Routine More Fun And Eco-friendly</a></h3>
                                        <ul class="news-metainfo list-style">
                                            <li><i class="fi fi-rr-calendar-minus"></i><a href="news-by-date.html">Feb 14, 2023</a></li>
                                            <li><i class="fi fi-rr-comment"></i>03</li>
                                            <li><i class="fi fi-rr-clock-three"></i>15 Min Read</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="news-card-six">
                                    <div class="news-card-img">
                                        <img src="assets/img/news/news-29.webp" alt="Image" />
                                        <a href="business.html" class="news-cat">Technology</a>
                                    </div>
                                    <div class="news-card-info">
                                        <div class="news-author">
                                            <div class="news-author-img">
                                                <img src="assets/img/author/author-thumb-3.webp" alt="Image" />
                                            </div>
                                            <h5>By <a href="author.html">CLAIRE AUDREY</a></h5>
                                        </div>
                                        <h3><a href="business-details.html">You Can Read Any Of These Short Novels In A Weekend</a></h3>
                                        <ul class="news-metainfo list-style">
                                            <li><i class="fi fi-rr-calendar-minus"></i><a href="news-by-date.html">Feb 17, 2023</a></li>
                                            <li><i class="fi fi-rr-comment"></i>03</li>
                                            <li><i class="fi fi-rr-clock-three"></i>15 Min Read</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="news-card-six">
                                    <div class="news-card-img">
                                        <img src="assets/img/news/news-30.webp" alt="Image" />
                                        <a href="business.html" class="news-cat">Fashion</a>
                                    </div>
                                    <div class="news-card-info">
                                        <div class="news-author">
                                            <div class="news-author-img">
                                                <img src="assets/img/author/author-thumb-4.webp" alt="Image" />
                                            </div>
                                            <h5>By <a href="author.html">ELENA NAOMI</a></h5>
                                        </div>
                                        <h3><a href="business-details.html">Read 5 Best Novel In A Your Weekend Time</a></h3>
                                        <ul class="news-metainfo list-style">
                                            <li><i class="fi fi-rr-calendar-minus"></i><a href="news-by-date.html">Feb 19, 2023</a></li>
                                            <li><i class="fi fi-rr-comment"></i>03</li>
                                            <li><i class="fi fi-rr-clock-three"></i>15 Min Read</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="general-news ptb-100">
            <div class="container-fluid">
                <div class="content-wrapper">
                    <div class="left-content">
                        <div class="row align-items-end mb-40">
                            <div class="col-md-7">
                                <h2 class="section-title">General News<img class="section-title-img" src="assets/img/section-img.webp" alt="Image" /></h2>
                            </div>
                            <div class="col-md-5 text-md-end">
                                <a href="business.html" class="link-one">View All News<i class="flaticon-right-arrow"></i></a>
                            </div>
                        </div>
                        <div class="row justify-content-center">
                            <div class="col-xl-6">
                                <div class="news-card-twelve">
                                    <div class="news-card-img">
                                        <img src="assets/img/news/news-20.webp" alt="Image" />
                                    </div>
                                    <div class="news-card-info">
                                        <a href="business.html" class="news-cat">Fashion</a>
                                        <h3><a href="business-details.html">Is This The Beginning Of The End Of The Internet?</a></h3>
                                        <ul class="news-metainfo list-style">
                                            <li><i class="fi fi-rr-calendar-minus"></i><a href="news-by-date.html">Feb 22, 2023</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-6">
                                <div class="news-card-twelve">
                                    <div class="news-card-img">
                                        <img src="assets/img/news/news-21.webp" alt="Image" />
                                    </div>
                                    <div class="news-card-info">
                                        <a href="business.html" class="news-cat">Politics</a>
                                        <h3><a href="business-details.html">7 Steps To Get Professional Facial Results At Home</a></h3>
                                        <ul class="news-metainfo list-style">
                                            <li><i class="fi fi-rr-calendar-minus"></i><a href="news-by-date.html">Feb 25, 2023</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-6">
                                <div class="news-card-twelve">
                                    <div class="news-card-img">
                                        <img src="assets/img/news/news-22.webp" alt="Image" />
                                    </div>
                                    <div class="news-card-info">
                                        <a href="business.html" class="news-cat">Inspiration</a>
                                        <h3><a href="business-details.html">Creative Photography Ideas From Smart Devices</a></h3>
                                        <ul class="news-metainfo list-style">
                                            <li><i class="fi fi-rr-calendar-minus"></i><a href="news-by-date.html">Feb 18, 2023</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-6">
                                <div class="news-card-twelve">
                                    <div class="news-card-img">
                                        <img src="assets/img/news/news-23.webp" alt="Image" />
                                    </div>
                                    <div class="news-card-info">
                                        <a href="business.html" class="news-cat">Politics</a>
                                        <h3><a href="business-details.html">6 Romantic Places You Should Visit In 2023</a></h3>
                                        <ul class="news-metainfo list-style">
                                            <li><i class="fi fi-rr-calendar-minus"></i><a href="news-by-date.html">Feb 20, 2023</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-6">
                                <div class="news-card-twelve">
                                    <div class="news-card-img">
                                        <img src="assets/img/news/news-24.webp" alt="Image" />
                                    </div>
                                    <div class="news-card-info">
                                        <a href="business.html" class="news-cat">Sports</a>
                                        <h3><a href="business-details.html">The Best Place To Celebrate Birthday And Music</a></h3>
                                        <ul class="news-metainfo list-style">
                                            <li><i class="fi fi-rr-calendar-minus"></i><a href="news-by-date.html">Feb 27, 2023</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-6">
                                <div class="news-card-twelve">
                                    <div class="news-card-img">
                                        <img src="assets/img/news/news-25.webp" alt="Image" />
                                    </div>
                                    <div class="news-card-info">
                                        <a href="business.html" class="news-cat">Business</a>
                                        <h3><a href="business-details.html">Splurge Or Save Last Minute Pampering Gift Ideas</a></h3>
                                        <ul class="news-metainfo list-style">
                                            <li><i class="fi fi-rr-calendar-minus"></i><a href="news-by-date.html">Feb 18, 2023</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="ad-section">
                            <p>SPONSORED AD</p>
                        </div>
                        <div class="promo-wrap">
                            <div class="promo-card-two">
                                <img src="assets/img/promo-shape-1.webp" alt="Image" class="promo-shape" />
                                <div class="promo-content">
                                    <a href="index.html" class="logo">
                                        <img class="logo-light" src="assets/img/logo.webp" alt="Image" />
                                        <img class="logo-dark" src="assets/img/logo-white.webp" alt="Image" />
                                    </a>
                                    <p>The European languages are members of the same family separ existence is a Baxo. For science, music, sport, etc.</p>
                                </div>
                                <img src="assets/img/promo-img-2.webp" alt="Image" class="promo-img" />
                            </div>
                        </div>
                    </div>
                    <div class="sidebar">
                        <div class="sidebar-widget-two">
                            <div class="contact-widget">
                                <img src="assets/img/contact-bg.svg" alt="Image" class="contact-shape" />
                                <a href="index.html" class="logo">
                                    <img class="logo-light" src="assets/img/logo.webp" alt="Image" />
                                    <img class="logo-dark" src="assets/img/logo-white.webp" alt="Image" />
                                </a>
                                <p>Mauris mattis auctor cursus. Phasellus iso tellus tellus, imperdiet ut imperdiet eu, noiaculis a sem Donec vehicula luctus nunc in laoreet Aliquam</p>
                                <ul class="social-profile list-style">
                                    <li>
                                        <a href="https://www.fb.com/" target="_blank"><i class="flaticon-facebook-1"></i></a>
                                    </li>
                                    <li>
                                        <a href="https://www.twitter.com/" target="_blank"><i class="flaticon-twitter-1"></i></a>
                                    </li>
                                    <li>
                                        <a href="https://www.instagram.com/" target="_blank"><i class="flaticon-instagram-2"></i></a>
                                    </li>
                                    <li>
                                        <a href="https://www.linkedin.com/" target="_blank"><i class="flaticon-linkedin"></i></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="sidebar-widget">
                            <h3 class="sidebar-widget-title">Popular Posts</h3>
                            <div class="pp-post-wrap">
                                <div class="news-card-one">
                                    <div class="news-card-img">
                                        <img src="assets/img/news/news-thumb-4.webp" alt="Image" />
                                    </div>
                                    <div class="news-card-info">
                                        <h3><a href="business-details.html">Bernie Nonummy Pelopai Iatis Eum Litora</a></h3>
                                        <ul class="news-metainfo list-style">
                                            <li><i class="fi fi-rr-calendar-minus"></i><a href="news-by-date.html">Apr 22, 2023</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="news-card-one">
                                    <div class="news-card-img">
                                        <img src="assets/img/news/news-thumb-5.webp" alt="Image" />
                                    </div>
                                    <div class="news-card-info">
                                        <h3><a href="business-details.html">How Youth Viral Diseases May The Year 2023</a></h3>
                                        <ul class="news-metainfo list-style">
                                            <li><i class="fi fi-rr-calendar-minus"></i><a href="news-by-date.html">Apr 23, 2023</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="news-card-one">
                                    <div class="news-card-img">
                                        <img src="assets/img/news/news-thumb-6.webp" alt="Image" />
                                    </div>
                                    <div class="news-card-info">
                                        <h3><a href="business-details.html">Man Wearing Black Pullover Hoodie To Smoke</a></h3>
                                        <ul class="news-metainfo list-style">
                                            <li><i class="fi fi-rr-calendar-minus"></i><a href="news-by-date.html">Apr 14, 2023</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="news-card-one">
                                    <div class="news-card-img">
                                        <img src="assets/img/news/news-thumb-7.webp" alt="Image" />
                                    </div>
                                    <div class="news-card-info">
                                        <h3><a href="business-details.html">First Prototype Flight Using Kinetic Launch System</a></h3>
                                        <ul class="news-metainfo list-style">
                                            <li><i class="fi fi-rr-calendar-minus"></i><a href="news-by-date.html">Apr 07, 2023</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="news-card-one">
                                    <div class="news-card-img">
                                        <img src="assets/img/news/news-thumb-8.webp" alt="Image" />
                                    </div>
                                    <div class="news-card-info">
                                        <h3><a href="business-details.html">Beauty Queens Need Material & Products</a></h3>
                                        <ul class="news-metainfo list-style">
                                            <li><i class="fi fi-rr-calendar-minus"></i><a href="news-by-date.html">Apr 03, 2023</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="news-card-one">
                                    <div class="news-card-img">
                                        <img src="assets/img/news/news-thumb-9.webp" alt="Image" />
                                    </div>
                                    <div class="news-card-info">
                                        <h3><a href="business-details.html">That Woman Comes From Heaven Look Like Angel</a></h3>
                                        <ul class="news-metainfo list-style">
                                            <li><i class="fi fi-rr-calendar-minus"></i><a href="news-by-date.html">Apr 01, 2023</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="video-news-wrap pt-100 pb-75">
            <div class="container-fluid">
                <div class="row mb-50 align-items-center">
                    <div class="col-md-7">
                        <h2 class="section-title text-white">Featured Video<img class="section-title-img" src="assets/img/section-img.webp" alt="Image" /></h2>
                    </div>
                    <div class="col-md-5 text-md-end">
                        <a href="featured-video.html" class="link-one">View All Featured Video<i class="flaticon-right-arrow"></i></a>
                    </div>
                </div>
                <div class="scrollscreen featured-video-box">
                    <div class="row gx-4">
                        <div class="col-xl-7">
                            <div class="news-card-four">
                                <img src="assets/img/news/video/news-1.webp" alt="Image" />
                                <a class="play-now" href="#quickview-modal" data-bs-toggle="modal">
                                    <i class="flaticon-play-button"></i>
                                    <span class="ripple"></span>
                                </a>
                                <div class="news-card-info">
                                    <h3><a href="business-details.html">Apex Legends Season 11 Start Date, Time, & What To Expect</a></h3>
                                    <ul class="news-metainfo list-style">
                                        <li><i class="fi fi-rr-calendar-minus"></i><a href="news-by-date.html">Feb 27, 2023</a></li>
                                        <li><i class="fi fi-rr-clock-three"></i>15 Min Read</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="news-card-four">
                                <img src="assets/img/news/video/news-8.webp" alt="Image" />
                                <a class="play-now" href="#quickview-modal" data-bs-toggle="modal">
                                    <i class="flaticon-play-button"></i>
                                    <span class="ripple"></span>
                                </a>
                                <div class="news-card-info">
                                    <h3><a href="business-details.html">Navigating The Political Sphere: Insights And Analysis</a></h3>
                                    <ul class="news-metainfo list-style">
                                        <li><i class="fi fi-rr-calendar-minus"></i><a href="news-by-date.html">Feb 27, 2023</a></li>
                                        <li><i class="fi fi-rr-clock-three"></i>15 Min Read</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-5">
                            <div class="row">
                                <div class="col-xl-12 col-lg-6">
                                    <div class="news-card-eight">
                                        <img src="assets/img/news/video/news-2.webp" alt="Image" />
                                        <a class="play-now" href="#quickview-modal" data-bs-toggle="modal">
                                            <i class="flaticon-play-button"></i>
                                            <span class="ripple"></span>
                                        </a>
                                        <div class="news-card-info">
                                            <h3><a href="business-details.html">First Season Of ‘Battlefield’ Debuts June 9th With Map</a></h3>
                                            <ul class="news-metainfo list-style">
                                                <li><i class="fi fi-rr-calendar-minus"></i><a href="news-by-date.html">Feb 16, 2023</a></li>
                                                <li><i class="fi fi-rr-clock-three"></i>13 Min Read</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-12 col-lg-6">
                                    <div class="news-card-eight">
                                        <img src="assets/img/news/video/news-3.webp" alt="Image" />
                                        <a class="play-now" href="#quickview-modal" data-bs-toggle="modal">
                                            <i class="flaticon-play-button"></i>
                                            <span class="ripple"></span>
                                        </a>
                                        <div class="news-card-info">
                                            <h3><a href="business-details.html">Man wearing black pullover hoodie to smoke light in</a></h3>
                                            <ul class="news-metainfo list-style">
                                                <li><i class="fi fi-rr-calendar-minus"></i><a href="news-by-date.html">Feb 12, 2023</a></li>
                                                <li><i class="fi fi-rr-clock-three"></i>10 Min Read</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-12 col-lg-6">
                                    <div class="news-card-eight">
                                        <img src="assets/img/news/video/news-9.webp" alt="Image" />
                                        <a class="play-now" href="#quickview-modal" data-bs-toggle="modal">
                                            <i class="flaticon-play-button"></i>
                                            <span class="ripple"></span>
                                        </a>
                                        <div class="news-card-info">
                                            <h3><a href="business-details.html">How To Find The Right Template For Your Product</a></h3>
                                            <ul class="news-metainfo list-style">
                                                <li><i class="fi fi-rr-calendar-minus"></i><a href="news-by-date.html">Feb 12, 2023</a></li>
                                                <li><i class="fi fi-rr-clock-three"></i>10 Min Read</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="video-slider-wrap">
                    <div class="video-slider swiper">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
                                <div class="news-card-nine">
                                    <img src="assets/img/news/video/news-4.webp" alt="Image" />
                                    <a class="play-now" href="#quickview-modal" data-bs-toggle="modal">
                                        <i class="flaticon-play-button"></i>
                                        <span class="ripple"></span>
                                    </a>
                                    <div class="news-card-info">
                                        <h3><a href="business-details.html">5 things we know about GTA Trilogy: Definitive Edition so far</a></h3>
                                        <ul class="news-metainfo list-style">
                                            <li><i class="fi fi-rr-calendar-minus"></i><a href="news-by-date.html">Apr 25, 2023</a></li>
                                            <li><i class="fi fi-rr-clock-three"></i>25 Min Read</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="news-card-nine">
                                    <img src="assets/img/news/video/news-5.webp" alt="Image" />
                                    <a class="play-now" href="#quickview-modal" data-bs-toggle="modal">
                                        <i class="flaticon-play-button"></i>
                                        <span class="ripple"></span>
                                    </a>
                                    <div class="news-card-info">
                                        <h3><a href="business-details.html">Nintendo Switch Online’s Next Wave of N64 Games Confirmed</a></h3>
                                        <ul class="news-metainfo list-style">
                                            <li><i class="fi fi-rr-calendar-minus"></i><a href="news-by-date.html">Apr 23, 2023</a></li>
                                            <li><i class="fi fi-rr-clock-three"></i>15 Min Read</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="news-card-nine">
                                    <img src="assets/img/news/video/news-6.webp" alt="Image" />
                                    <a class="play-now" href="#quickview-modal" data-bs-toggle="modal">
                                        <i class="flaticon-play-button"></i>
                                        <span class="ripple"></span>
                                    </a>
                                    <div class="news-card-info">
                                        <h3><a href="business-details.html">Back 4 Blood developers Turtle Rock have been bought by Tencent</a></h3>
                                        <ul class="news-metainfo list-style">
                                            <li><i class="fi fi-rr-calendar-minus"></i><a href="news-by-date.html">Apr 15, 2023</a></li>
                                            <li><i class="fi fi-rr-clock-three"></i>10 Min Read</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="news-card-nine">
                                    <img src="assets/img/news/video/news-7.webp" alt="Image" />
                                    <a class="play-now" href="#quickview-modal" data-bs-toggle="modal">
                                        <i class="flaticon-play-button"></i>
                                        <span class="ripple"></span>
                                    </a>
                                    <div class="news-card-info">
                                        <h3><a href="business-details.html">Beauty queens need beauty material & products</a></h3>
                                        <ul class="news-metainfo list-style">
                                            <li><i class="fi fi-rr-calendar-minus"></i><a href="news-by-date.html">Apr 11, 2023</a></li>
                                            <li><i class="fi fi-rr-clock-three"></i>12 Min Read</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="video-prev"><i class="flaticon-left-arrow"></i></div>
                    <div class="video-next"><i class="flaticon-right-arrow"></i></div>
                </div>
            </div>
        </div>

        <div class="latest-news pb-100">
            <div class="container-fluid">
                <div class="content-wrapper">
                    <div class="left-content">
                        <div class="row align-items-end mb-40">
                            <div class="col-md-7">
                                <h2 class="section-title">Latest News<img class="section-title-img" src="assets/img/section-img.webp" alt="Image" /></h2>
                            </div>
                            <div class="col-md-5 text-md-end">
                                <a href="business.html" class="link-one">View All News<i class="flaticon-right-arrow"></i></a>
                            </div>
                        </div>
                        <div class="row gx-5">
                            <div class="col-xl-7">
                                <div class="scrollscreen">
                                    <div class="news-card-five">
                                        <div class="news-card-img">
                                            <img src="assets/img/news/news-9.webp" alt="Image" />
                                            <a href="business.html" class="news-cat">Lifestyle</a>
                                        </div>
                                        <div class="news-card-info">
                                            <h3><a href="business-details.html">Good Day To Take A Photo With Your Favorite Style</a></h3>
                                            <p>Lorem ipsum or lipsum as it is sometmes known is dum text used in laying print, graphic or desi…</p>
                                            <ul class="news-metainfo list-style">
                                                <li><i class="fi fi-rr-calendar-minus"></i><a href="news-by-date.html">Apr 22, 2023</a></li>
                                                <li><i class="fi fi-rr-clock-three"></i>15 Min Read</li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="news-card-five">
                                        <div class="news-card-img">
                                            <img src="assets/img/news/news-10.webp" alt="Image" />
                                            <a href="business.html" class="news-cat">Fashion</a>
                                        </div>
                                        <div class="news-card-info">
                                            <h3><a href="business-details.html">I Turned My Home Into A Fortress of Surveillance</a></h3>
                                            <p>Lorem ipsum or lipsum as it is sometmes known is dum text used in laying print, graphic or desi…</p>
                                            <ul class="news-metainfo list-style">
                                                <li><i class="fi fi-rr-calendar-minus"></i><a href="news-by-date.html">Apr 15, 2023</a></li>
                                                <li><i class="fi fi-rr-clock-three"></i>10 Min Read</li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="news-card-five">
                                        <div class="news-card-img">
                                            <img src="assets/img/news/news-11.webp" alt="Image" />
                                            <a href="business.html" class="news-cat">Science</a>
                                        </div>
                                        <div class="news-card-info">
                                            <h3><a href="business-details.html">Man Wearing Black Pullover Hoodie To Smoke Light In</a></h3>
                                            <p>Lorem ipsum or lipsum as it is sometmes known is dum text used in laying print, graphic or desi…</p>
                                            <ul class="news-metainfo list-style">
                                                <li><i class="fi fi-rr-calendar-minus"></i><a href="news-by-date.html">Apr 17, 2023</a></li>
                                                <li><i class="fi fi-rr-clock-three"></i>8 Min Read</li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="news-card-five">
                                        <div class="news-card-img">
                                            <img src="assets/img/news/news-12.webp" alt="Image" />
                                            <a href="business.html" class="news-cat">Photography</a>
                                        </div>
                                        <div class="news-card-info">
                                            <h3><a href="business-details.html">Recovery And Cleanup In Florida After Hurricane Ian</a></h3>
                                            <p>Lorem ipsum or lipsum as it is sometmes known is dum text used in laying print, graphic or desi…</p>
                                            <ul class="news-metainfo list-style">
                                                <li><i class="fi fi-rr-calendar-minus"></i><a href="news-by-date.html">Apr 12, 2023</a></li>
                                                <li><i class="fi fi-rr-clock-three"></i>13 Min Read</li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="news-card-five">
                                        <div class="news-card-img">
                                            <img src="assets/img/news/news-13.webp" alt="Image" />
                                            <a href="business.html" class="news-cat">Business</a>
                                        </div>
                                        <div class="news-card-info">
                                            <h3><a href="business-details.html">Apex Legends Season 11 Starting From August, 2023</a></h3>
                                            <p>Lorem ipsum or lipsum as it is sometmes known is dum text used in laying print, graphic or desi…</p>
                                            <ul class="news-metainfo list-style">
                                                <li><i class="fi fi-rr-calendar-minus"></i><a href="news-by-date.html">Apr 07, 2023</a></li>
                                                <li><i class="fi fi-rr-clock-three"></i>15 Min Read</li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="news-card-five">
                                        <div class="news-card-img">
                                            <img src="assets/img/news/news-14.webp" alt="Image" />
                                            <a href="business.html" class="news-cat">Travel</a>
                                        </div>
                                        <div class="news-card-info">
                                            <h3><a href="business-details.html">Creative Photography Ideas From Smart Devices</a></h3>
                                            <p>Lorem ipsum or lipsum as it is sometmes known is dum text used in laying print, graphic or desi…</p>
                                            <ul class="news-metainfo list-style">
                                                <li><i class="fi fi-rr-calendar-minus"></i><a href="news-by-date.html">Apr 05, 2023</a></li>
                                                <li><i class="fi fi-rr-clock-three"></i>11 Min Read</li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="news-card-five">
                                        <div class="news-card-img">
                                            <img src="assets/img/news/news-15.webp" alt="Image" />
                                            <a href="business.html" class="news-cat">Travel</a>
                                        </div>
                                        <div class="news-card-info">
                                            <h3><a href="business-details.html">6 Romantic Places You Want To Visit With Your Partner</a></h3>
                                            <p>Lorem ipsum or lipsum as it is sometmes known is dum text used in laying print, graphic or desi…</p>
                                            <ul class="news-metainfo list-style">
                                                <li><i class="fi fi-rr-calendar-minus"></i><a href="news-by-date.html">Apr 03, 2023</a></li>
                                                <li><i class="fi fi-rr-clock-three"></i>15 Min Read</li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="news-card-five">
                                        <div class="news-card-img">
                                            <img src="assets/img/news/news-16.webp" alt="Image" />
                                            <a href="business.html" class="news-cat">Fashion</a>
                                        </div>
                                        <div class="news-card-info">
                                            <h3><a href="business-details.html">7 Steps To Get Professional Facial Results At Home</a></h3>
                                            <p>Lorem ipsum or lipsum as it is sometmes known is dum text used in laying print, graphic or desi…</p>
                                            <ul class="news-metainfo list-style">
                                                <li><i class="fi fi-rr-calendar-minus"></i><a href="news-by-date.html">Apr 02, 2023</a></li>
                                                <li><i class="fi fi-rr-clock-three"></i>10 Min Read</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-5">
                                <div class="news-card-two">
                                    <div class="news-card-img">
                                        <img src="assets/img/news/news-17.webp" alt="Image" />
                                        <a href="business.html" class="news-cat">Technology</a>
                                    </div>
                                    <div class="news-card-info">
                                        <h3><a href="business-details.html">Elijah James: The Nashville Photographer Shares Her Unique Journey</a></h3>
                                        <ul class="news-metainfo list-style">
                                            <li><i class="fi fi-rr-calendar-minus"></i><a href="news-by-date.html">Feb 25, 2023</a></li>
                                            <li><i class="fi fi-rr-clock-three"></i>15 Min Read</li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="news-card-three">
                                    <div class="news-card-img">
                                        <img src="assets/img/news/news-18.webp" alt="Image" />
                                    </div>
                                    <div class="news-card-info">
                                        <a href="business.html" class="news-cat">Travel</a>
                                        <h3><a href="business-details.html">A Complimentary Day At Mandarin The Oriental</a></h3>
                                        <ul class="news-metainfo list-style">
                                            <li><i class="fi fi-rr-calendar-minus"></i><a href="news-by-date.html">Feb 23, 2023</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="news-card-three">
                                    <div class="news-card-img">
                                        <img src="assets/img/news/news-19.webp" alt="Image" />
                                    </div>
                                    <div class="news-card-info">
                                        <a href="business.html" class="news-cat">Business</a>
                                        <h3><a href="business-details.html">First prototype Flight Using Kinetic Launch System</a></h3>
                                        <ul class="news-metainfo list-style">
                                            <li><i class="fi fi-rr-calendar-minus"></i><a href="news-by-date.html">Feb 22, 2023</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="sidebar">
                        <div class="sidebar-widget">
                            <h3 class="sidebar-widget-title">Explore Topics</h3>
                            <ul class="category-widget list-style">
                                <li>
                                    <a href="business.html"><i class="flaticon-right-arrow"></i>Celebration <span>(6)</span></a>
                                </li>
                                <li>
                                    <a href="business.html"><i class="flaticon-right-arrow"></i>Culture<span>(3)</span></a>
                                </li>
                                <li>
                                    <a href="business.html"><i class="flaticon-right-arrow"></i>Fashion<span>(2)</span></a>
                                </li>
                                <li>
                                    <a href="business.html"><i class="flaticon-right-arrow"></i>Inspiration<span>(8)</span></a>
                                </li>
                                <li>
                                    <a href="business.html"><i class="flaticon-right-arrow"></i>Lifestyle<span>(6)</span></a>
                                </li>
                                <li>
                                    <a href="business.html"><i class="flaticon-right-arrow"></i>Politics<span>(2)</span></a>
                                </li>
                                <li>
                                    <a href="business.html"><i class="flaticon-right-arrow"></i>Trending<span>(4)</span></a>
                                </li>
                            </ul>
                        </div>
                        <div class="sidebar-widget">
                            <h3 class="sidebar-widget-title">Celebration</h3>
                            <div class="featured-widget">
                                <div class="featured-slider swiper">
                                    <div class="swiper-wrapper">
                                        <div class="swiper-slide">
                                            <div class="news-card-one">
                                                <div class="news-card-img">
                                                    <img src="assets/img/news/news-thumb-1.webp" alt="Image" />
                                                </div>
                                                <div class="news-card-info">
                                                    <h3><a href="business-details.html">How Youth Viral Diseases May The Year 2023</a></h3>
                                                    <ul class="news-metainfo list-style">
                                                        <li><i class="fi fi-rr-calendar-minus"></i><a href="news-by-date.html">Mar 24, 2023</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="swiper-slide">
                                            <div class="news-card-one">
                                                <div class="news-card-img">
                                                    <img src="assets/img/news/news-thumb-2.webp" alt="Image" />
                                                </div>
                                                <div class="news-card-info">
                                                    <h3><a href="business-details.html">Nintendo Switch Online’s Next Wave of N64 Games</a></h3>
                                                    <ul class="news-metainfo list-style">
                                                        <li><i class="fi fi-rr-calendar-minus"></i><a href="news-by-date.html">Mar 22, 2023</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="swiper-slide">
                                            <div class="news-card-one">
                                                <div class="news-card-img">
                                                    <img src="assets/img/news/news-thumb-3.webp" alt="Image" />
                                                </div>
                                                <div class="news-card-info">
                                                    <h3><a href="business-details.html">5 things We Know About GTA Definitive Edition</a></h3>
                                                    <ul class="news-metainfo list-style">
                                                        <li><i class="fi fi-rr-calendar-minus"></i><a href="news-by-date.html">Mar 14, 2023</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="featured-prev"><i class="flaticon-left-arrow"></i></div>
                                    <div class="featured-next"><i class="flaticon-right-arrow"></i></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container-fluid pb-50">
            <div class="instagram-slider swiper">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <a class="instagram-slide" href="https://www.instagram.com/" target="_blank">
                            <img src="assets/img/instagram/insta-1.webp" alt="Image" />
                            <span>@Baxo on Instagram<i class="flaticon-right-arrow"></i></span>
                        </a>
                    </div>
                    <div class="swiper-slide">
                        <a class="instagram-slide" href="https://www.instagram.com/" target="_blank">
                            <img src="assets/img/instagram/insta-2.webp" alt="Image" />
                            <span>@Baxo on Instagram<i class="flaticon-right-arrow"></i></span>
                        </a>
                    </div>
                    <div class="swiper-slide">
                        <a class="instagram-slide" href="https://www.instagram.com/" target="_blank">
                            <img src="assets/img/instagram/insta-3.webp" alt="Image" />
                            <span>@Baxo on Instagram<i class="flaticon-right-arrow"></i></span>
                        </a>
                    </div>
                    <div class="swiper-slide">
                        <a class="instagram-slide" href="https://www.instagram.com/" target="_blank">
                            <img src="assets/img/instagram/insta-4.webp" alt="Image" />
                            <span>@Baxo on Instagram<i class="flaticon-right-arrow"></i></span>
                        </a>
                    </div>
                    <div class="swiper-slide">
                        <a class="instagram-slide" href="https://www.instagram.com/" target="_blank">
                            <img src="assets/img/instagram/insta-5.webp" alt="Image" />
                            <span>@Baxo on Instagram<i class="flaticon-right-arrow"></i></span>
                        </a>
                    </div>
                    <div class="swiper-slide">
                        <a class="instagram-slide" href="https://www.instagram.com/" target="_blank">
                            <img src="assets/img/instagram/insta-6.webp" alt="Image" />
                            <span>@Baxo on Instagram<i class="flaticon-right-arrow-1"></i></span>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="container-fluid">
            <div class="footer-wrap">
                <div class="row align-items-center">
                    <div class="col-lg-4">
                        <p class="copyright-text">© <span>Baxo</span> is proudly owned by <a href="https://hibootstrap.com/">HiBootstrap</a></p>
                    </div>
                    <div class="col-lg-4 text-center">
                        <ul class="social-profile list-style">
                            <li>
                                <a href="https://www.fb.com/" target="_blank"><i class="flaticon-facebook-1"></i></a>
                            </li>
                            <li>
                                <a href="https://www.twitter.com/" target="_blank"><i class="flaticon-twitter-1"></i></a>
                            </li>
                            <li>
                                <a href="https://www.instagram.com/" target="_blank"><i class="flaticon-instagram-2"></i></a>
                            </li>
                            <li>
                                <a href="https://www.linkedin.com/" target="_blank"><i class="flaticon-linkedin"></i></a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-lg-4">
                        <div class="footer-right">
                            <button class="subscribe-btn" data-bs-toggle="modal" data-bs-target="#newsletter-popup">Become a subscriber<i class="flaticon-right-arrow"></i></button>
                            <p>Get all the latest posts delivered straight to your inbox.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <button type="button" id="backtotop" class="position-fixed text-center border-0 p-0">
            <i class="ri-arrow-up-line"></i>
        </button>

        <div class="modal fade" id="newsletter-popup" tabindex="-1" aria-labelledby="newsletter-popup" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-xl">
                <div class="modal-content">
                    <button type="button" class="btn_close" data-bs-dismiss="modal" aria-label="Close">
                        <i class="fi fi-rr-cross"></i>
                    </button>
                    <div class="modal-body">
                        <div class="newsletter-bg bg-f"></div>
                        <div class="newsletter-content">
                            <img src="assets/img/newsletter-icon.webp" alt="Image" class="newsletter-icon" />
                            <h2>Join Our Newsletter & Read The New Posts First</h2>
                            <form action="#" class="newsletter-form">
                                <input type="email" placeholder="Email Address" />
                                <button type="button" class="btn-one">Subscribe<i class="flaticon-arrow-right"></i></button>
                            </form>
                            <div class="form-check checkbox">
                                <input class="form-check-input" type="checkbox" id="test_21" />
                                <label class="form-check-label" for="test_21"> I've read and accept <a href="privacy-policy.html">Privacy Policy</a> </label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="quickview-modal" data-bs-keyboard="false" tabindex="-1" aria-labelledby="quickview-modal" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-xl">
                <div class="modal-content">
                    <button type="button" class="btn_close" data-bs-dismiss="modal" aria-label="Close">
                        <i class="ri-close-line"></i>
                    </button>
                    <div class="modal-body">
                        <div class="video-popup">
                            <iframe
                                width="885"
                                height="498"
                                src="https://www.youtube.com/embed/3FjT7etqxt8"
                                title="How to Design an Elvis Movie Poster in Photoshop"
                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                allowfullscreen
                            ></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script data-cfasync="false" src="../../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
        <script src="assets/js/bootstrap.bundle.min.js"></script>
        <script src="assets/js/swiper.bundle.min.js"></script>
        <script src="assets/js/aos.js"></script>
        <script src="assets/js/main.js"></script>
    </body>

    <!-- Mirrored from templates.hibootstrap.com/baxo/default/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 26 Feb 2024 01:14:38 GMT -->
</html> --}}

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
    @yield('content-upload')
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


    {{-- <div class="d-flex justify-content-between" style="margin-top: 5%;">

        <div class="pp-news-box">
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

    </div> --}}

    </div>
</div>

@yield('content')

<div class="tab-content">
    <div class="tab-pane active" id="home" role="tabpanel">
        <div class="container" style="margin-top: 5%;">
            <h3><span style="color: #0F4D8A;">|</span>Berita Penulis</h3>

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

    {{-- <div class="tab-pane" id="statistika" role="tabpanel">
        <div class="container" style="margin-top: 5%;">
            <h3> <span style="color: #0F4D8A;">|</span>Analisis</h3>

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
    </div> --}}

    {{-- <div class="tab-pane" id="status" role="tabpanel">
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
    </div> --}}



    {{-- <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
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
    </script> --}}
  </div>



@endsection

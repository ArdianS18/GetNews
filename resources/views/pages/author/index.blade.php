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
            <h4 class="mb-0">{{ Auth::user()->name }}</h4>
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

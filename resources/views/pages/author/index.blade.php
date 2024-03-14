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
    .img-home{
        margin-right: 10%;
    }

    .card-profile{
        box-shadow: 0  5px 2px rgba(0, 0, 0, 0.1);
        border: 1px solid #ddd;
        padding-left: 3%;
        padding-right: 3%;
        border-radius: 10px;
        padding-bottom: 3%;
    }

    .card-news{
        box-shadow: 0  5px 2px rgba(0, 0, 0, 0.1);
        border: 1px solid #ddd;
        padding-left: 3%;
        padding-right: 3%;
        border-radius: 10px;
        padding-bottom: 3%;
    }
  </style>
@endsection

@section('content')

<div class="container">

    <div class="card-profile">
        <div class="d-flex mt-4 news-card-img align-items-center">
            <div class="" style="border: 4px solid #0F4D8A; border-radius: 50%; padding: 7px;">
                <div class="img-profile"></div><img src="assets/img/news/trending-3.webp" alt="Profile Image" width="80px" style="border-radius: 50%;" />
            </div>
            <div class="ms-4 text-align-center">
                <h3 class="mb-4">{{ Auth::user()->name }}</h4>
                <div class="">
                    <button class="text-white btn btn-sm px-4" style="background-color: #0F4D8A; border-radius: 5px;">
                        Edit Profile
                    </button>
                </div>
            </div>
        </div>


        <div class="row justify-content-center" style="margin-top: 5%;">
            <div class="col-md-6 col-lg-3">
                <div class="mb-4">
                    <div class="">
                        <h5 class="card-title">Pendapatan Keseluruhan</h5>
                        <div class="d-flex text-center items-center mt-4">
                            <img src="assets/img/icons/coin.svg" class="mb-3 mx auto" width="25px" alt="Image" />&nbsp;
                            <p class="ms-2">1324</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-12 col-lg-3">
                <div class="mb-4">
                    <div class="Jumlah Pengikut">
                        <div class="">
                            <h5 class="card-title">Pengikut</h5>
                            <div class="d-flex text-center items-center mt-4">
                                <img src="assets/img/icons/profile.svg" class="mb-3" width="20px" alt="Image" />&nbsp;
                                <p class="ms-2">1.290</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-12 col-lg-3">
                <div class="mb-4">
                    <div class="Jumlah Pengikut">
                        <div class="">
                            <h5 class="card-title">Mengikuti</h5>
                            <div class="d-flex text-center items-center mt-4">
                                <img src="assets/img/icons/profile.svg" class="mb-3" width="20px" alt="Image" />&nbsp;
                                <p class="ms-2">230</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12 col-lg-3">
                <div class="mb-4">
                    <div class="Jumlah Pengikut">
                        <div class="">
                            <h5 class="card-title">Like</h5>
                            <div class="d-flex text-center items-center mt-4">
                                <img src="assets/img/icons/like.svg" class="mb-3" width="20px" alt="Image" />&nbsp;
                                <p class="ms-2">2.897</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="" role="tabpanel">
            <div class="container mt-4">
                <h3><span style="color: #0F4D8A;">|</span>Berita Penulis</h3>
    
                <div class="d-flex justify-content-between mb-5 mt-5">
                    <form class="d-flex" action="{{ route('categories.index') }}" method="GET">
                        @csrf
                        <div class="input-group">
                            <input type="text" name="query" class="form-control px-4" placeholder="Cari...">
                            <button type="submit" style="background-color: #E6E6E6" class="btn btn-outline px-4">Cari</button>
                        </div>
                    </form>
                    <div class="d-flex justify-content-end" style="background-color: #E6E6E6;">
                        <select name="status" class="form-select">
                            <option value="{{ request('status') }}">Filter</option>
                            {{-- <option value="panding">Panding</option>
                            <option value="active">Approved</option>
                            <option value="nonactive">Reject</option>
                            <option value="primary">Primary</option>
                            <option value="">Tampilkan semua</option> --}}
                        </select>
                    </div>

                </div>

                <div class="row">
                    @forelse ($news as $news)
                
                        <div class="col-md-12 col-lg-6  mb-5">
                            <div class="d-flex">
                                <div class="me-3">
                                    <img src="{{ asset('storage/' . $news->photo) }}" class="img-fluid" width="290px" height="160px" style="object-fit: cover;" alt="Image" />
                                </div>
                                <div class="">
                                    <h5 class="news-cat">{{ $news->name }}</h5>
                                    <p>{{ $news->sinopsis }}</p>
                                    <div class="d-flex">
                                        <div class="justify-content-start">
                                            <p><svg xmlns="http://www.w3.org/2000/svg" width="23" height="23" viewBox="0 0 512 512"><path d="M368.005 272h-96v96h96v-96zm-32-208v32h-160V64h-48v32h-24.01c-22.002 0-40 17.998-40 40v272c0 22.002 17.998 40 40 40h304.01c22.002 0 40-17.998 40-40V136c0-22.002-17.998-40-40-40h-24V64h-48zm72 344h-304.01V196h304.01v212z" fill="#0f4d89"/></svg>
                                        Feb 03, 2023</p>
                                        </div>
                                        <div class="ms-4">
                                            <p><svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 512 512"><path d="M198 448h172c15.7 0 28.6-9.6 34.2-23.4l57.1-135.4c1.7-4.4 2.6-9 2.6-14v-38.6c0-21.1-17-44.6-37.8-44.6H306.9l18-81.5.6-6c0-7.9-3.2-15.1-8.3-20.3L297 64 171 191.3c-6.8 6.9-11 16.5-11 27.1v192c0 21.1 17.2 37.6 38 37.6z" fill="#0f4d89"/><path d="M48 224h64v224H48z" fill="currentColor"/></svg>
                                                1.203
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
            
                    @empty
                        
                    @endforelse
                </div>  

            </div>
        </div>


    </div>
</div>




<div class="container mt-5">
  

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

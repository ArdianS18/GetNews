@extends('layouts.author.sidebar')

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
            <h5 class="text-white mt-1">Rp.12.000</h5>
          </div>
        </div>
        <div class="col-3">
          <div class="text-center mb-n4">
            <img src="{{asset('assets/img/bg-coin.svg')}}" width="170px" alt="">
          </div>
        </div>
      </div>
    </div>
    <div class="card-footer py-2" style="background-color: #222222;">
        <div class="d-flex justify-content-between">
            <h5 class="text-white mt-1">Rp.12.000</h5>

            <div class="d-flex">
                <a href="{{route('user.history.coin')}}" class="text-white fs-4">Riwayat</a>
                <span class="ms-3 me-3 text-white">|</span>
                <a href="{{route('user.tukar.coin')}}" class="text-white fs-4">
                    <div class="d-flex">
                        Tukarkan Koin
                        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 24 24"><path fill="#ffffff" d="M12.6 12L8.7 8.1q-.275-.275-.275-.7t.275-.7t.7-.275t.7.275l4.6 4.6q.15.15.213.325t.062.375t-.062.375t-.213.325l-4.6 4.6q-.275.275-.7.275t-.7-.275t-.275-.7t.275-.7z"/></svg>
                    </div>
                </a>
            </div>
        </div>
    </div>
</div>

<div class="card p-4">
    <div id="chart-coin"></div>
</div>

@endsection

@section('script')
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
        colors: ["#FFAE1F"],
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
            colors: ['#f3f3f3', 'transparent'],
            opacity: 0.5
          },
        },
        xaxis: {
          categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep'],
        }
        };

        var chart = new ApexCharts(document.querySelector("#chart-coin"), options);
        chart.render();
      
    </script>
@endsection
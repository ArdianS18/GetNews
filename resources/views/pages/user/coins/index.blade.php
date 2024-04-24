@extends('layouts.user.sidebar')

@section('content')
<div class="card shadow-sm position-relative overflow-hidden" style="background-color: #183249;">
    <div class="card-body">
      <div class="row justify-content-between">
        <div class="col-8 text-white">
          <h4 class="fw-semibold mb-3 mt-2 text-white">Pengisian Iklan</h4>
            <p>Layanan pengiklanan di getmedia.id</p>
        </div>
        <div class="col-3">
          <div class="text-center mb-n4">
            <img src="{{asset('assets/img/bg-coin.svg')}}" width="210px" alt="" class="img-fluid">
          </div>
        </div>
      </div>
    </div>
    <div class="card-footer py-2" style="background-color: #222222;">
        <div class="d-flex justify-content-between">
            <h5 class="text-white mt-1">Rp. 12.000</h5>

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

        var chart = new ApexCharts(document.querySelector("#chart-coin"), options);
        chart.render();
      
    </script>
@endsection
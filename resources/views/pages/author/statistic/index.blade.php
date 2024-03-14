@extends('layouts.author.sidebar')

@section('style')
    <style>
        .card-statistic{
            box-shadow: 0  5px 2px rgba(0, 0, 0, 0.1);
            border: 1px solid #ddd;
            padding-left: 3%;
            padding-right: 3%;
            border-radius: 10px;
        }
    </style>
@endsection

@section('content')
<div class="container">
    <div class="tab-pane" id="statistika" role="tabpanel">
        <div class="">

            <div class="card-statistic">
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

                            <div id="chart-info"></div>

                            <div class="row" style="margin-top: 5%;">
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
    </div>
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

    var chart = new ApexCharts(document.querySelector("#chart-info"), options);
    chart.render();
</script>
@endsection
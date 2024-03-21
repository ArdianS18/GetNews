@extends('layouts.author.sidebar')

@section('style')
    <style>
        .card-statistic {
            box-shadow: 0 5px 2px rgba(0, 0, 0, 0.1);
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
                                            <img src="assets/img/icons/like.svg" class="mb-3" width="25px"
                                                alt="Image" />&nbsp;
                                            <p>+ 2.897</p>
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-lg-4">
                                        <h5>Jumlah Pengikut</h5>
                                        <div class="d-flex text-center items-center">
                                            <img src="assets/img/icons/profile.svg" class="mb-3" width="25px"
                                                alt="Image" />&nbsp;
                                            <p>+ 1.290</p>
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-lg-4">
                                        <h5>Pendapatan Keseluruhan</h5>
                                        <div class="d-flex text-center">
                                            <img src="assets/img/icons/coin.svg" class="mb-3" width="25px"
                                                alt="Image" />&nbsp;
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
                    name: "koin",
                    data: [45, 52, 38, 24, 33, 26, 21, 20, 6, 8, 15, 10]
                },
                {
                    name: "Pengikut",
                    data: [35, 41, 62, 42, 13, 18, 29, 37, 36, 51, 32, 35]
                },
                {
                    name: 'Total Visits',
                    data: [87, 57, 74, 99, 75, 38, 62, 47, 82, 56, 45, 47]
                }
            ],
            chart: {
                height: 350,
                type: 'line',
            },
            dataLabels: {
                enabled: false
            },
            stroke: {
                width: [5, 7, 5],
                curve: 'smooth',
                dashArray: [0]
            },
            title: {
                text: 'Page Statistics',
                align: 'left'
            },
            legend: {
                tooltipHoverFormatter: function(val, opts) {
                    return val + ' - <strong>' + opts.w.globals.series[opts.seriesIndex][opts.dataPointIndex] +
                        '</strong>'
                }
            },
            markers: {
                size: 0,
                hover: {
                    sizeOffset: 6
                }
            },
            xaxis: {
                categories: ['01 Jan', '02 Jan', '03 Jan', '04 Jan', '05 Jan', '06 Jan', '07 Jan', '08 Jan', '09 Jan',
                    '10 Jan', '11 Jan', '12 Jan'
                ],
            },
            tooltip: {
                y: [{
                        title: {
                            formatter: function(val) {
                                return val + " (mins)"
                            }
                        }
                    },
                    {
                        title: {
                            formatter: function(val) {
                                return val + " per session"
                            }
                        }
                    },
                    {
                        title: {
                            formatter: function(val) {
                                return val;
                            }
                        }
                    }
                ]
            },
            grid: {
                borderColor: '#f1f1f1',
            },
            colors: ['#FFD643', '#175A95', '#EF6E6E'] // Ubah warna masing-masing chart di sini
        };

        var chart = new ApexCharts(document.querySelector("#chart-info"), options);
        chart.render();
    </script>
@endsection

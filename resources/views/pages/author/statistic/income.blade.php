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

        .border-primary {
        border-left: 2px solid #41739e !important
    }

    .border-danger {
        border-left: 2px solid #e68888 !important
    }

    .border-info {
        border-left: 2px solid #bacff0 !important
    }

    .border-warning {
        border-left: 2px solid #fce287 !important
    }
    </style>
    <link rel="stylesheet" href="{{ 'admin/dist/libs/prismjs/themes/prism-okaidia.min.css' }}">

@endsection

@section('content')
<div class="row">
    <div class="col-lg-4">
        <div class="card border-start border-warning">
            <div class="card-body">
                <div class="d-flex">
                    <div class="justify-contente-center col-lg-1 me-3">
                        <img src="{{ asset('assets/img/coin-ring.svg') }}" width="52px" alt="">
                    </div>
                    <div style="color: #e68888" class="ms-4 col-lg-11">
                        <h4>Pendapatan Keseluruhan</h4>
                        <h3 style="color: #FFD643">12344</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

    <div class="card">
        <div class="card-body">

            <div class="row">
                <div class="">
                    <div class="d-flex justify-content-between">
                        <div>
                            <h3>Statistik Berita Terpopuler</h3>
                        </div>
                        <div class="d-flex gap-3">
                            <div>
                                <select name="" id="mounth" class="form-select">

                                </select>
                            </div>
                            <div>
                                <select name="" id="year" class="form-select">

                                </select>
                            </div>
                        </div>
                    </div>
                    <div id="chart-trending">

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('script')
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <script>
        var dropdown = document.getElementById("year");

        var currentYear = new Date().getFullYear();

        var startYear = 2023;
        var endYear = currentYear + 5;

        for (var year = startYear; year <= endYear; year++) {
            var option = document.createElement("option");
            option.value = year;
            option.text = year;
            dropdown.appendChild(option);
        }
        var dropdown = document.getElementById("mounth");

        var months = [
            "Januari",
            "Februari",
            "Maret",
            "April",
            "Mei",
            "Juni",
            "Juli",
            "Agustus",
            "September",
            "Oktober",
            "November",
            "Desember"
        ];

        for (var i = 0; i < months.length; i++) {
            var option = document.createElement("option");
            option.value = i + 1;
            option.text = months[i]
            dropdown.appendChild(option);
        }

        var options = {
            series: [{
                    name: "koin",
                    data: [45, 52, 38, 24, 33, 26, 21, 20, 6, 8, 15, 10]
                },
                {
                    name: "Pengikut",
                    data: [35, -41, -62, -42, 13, 18, 29, 37, 36, 51, 32, 35]
                },
                {
                    name: 'Total Visits',
                    data: [87, 57, 74, 99, 75, 38, 62, 47, 82, 56, 45, 47]
                }
            ],
            chart: {
                height: 350,
                type: 'area',
                stacked: true,

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
                text: 'Info Dasar',
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

        var options1 = {
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
                dashArray: [0]
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

        var chart1 = new ApexCharts(document.querySelector("#chart-trending"), options1);
        chart1.render();
    </script>
@endsection

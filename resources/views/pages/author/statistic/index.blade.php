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
    <div class="tab-pane" id="statistika" role="tabpanel">
        <div class="">
            <div class="card">
                <div class="card-body">
                    <div class="row pb-4">
                        <div class="col-lg-12 d-flex align-items-stretch">
                            <div class="w-100">
                                <div class="mt-4">
                                    <div id="chart-info">

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="border-top">
                    <div class="row gx-0">
                        <div class="col-md-4 border-end">
                            <div class="p-4 py-3 py-md-4">
                                <p class="fs-4  mb-0">
                                    <span class="text-warning">
                                        <span class="round-8 bg-warning rounded-circle d-inline-block me-1"></span>
                                    </span>Pendapatan Keseluruhan
                                </p>
                                <h3 class=" mt-2 mb-0 badge bg-light-warning text-warning">3,350,00</h3>
                            </div>
                        </div>
                        <div class="col-md-4 border-end">
                            <div class="p-4 py-3 py-md-4">
                                <p class="fs-4  mb-0">
                                    <span class="text-danger">
                                        <span class="round-8 bg-danger rounded-circle d-inline-block me-1"></span>
                                    </span>Followers
                                </p>
                                <h3 class=" mt-2 mb-0 badge bg-light-danger text-danger">1,500+</h3>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="p-4 py-3 py-md-4">
                                <p class="fs-4  mb-0">
                                    <span class="text-info">
                                        <span class="round-8 bg-info rounded-circle d-inline-block me-1"></span>
                                    </span>Berita
                                </p>
                                <h3 class=" mt-2 mb-0 badge bg-light-primary text-primary">560</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
           
            <div class="row">
                <div class="col-md-8 col-sm-12">
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
                <div class="col-md-4 col-sm-12">
                    <div class="d-flex gap-3">
                        <div class="my-auto">
                            <span class="fs-5 badge bg-light-danger text-danger">
                                1
                            </span>
                        </div>
                        <div class="" style="max-width: 540px;">
                            <div class="row g-2">
                                <div class="col-md-4">
                                    <img src="{{ asset('assets/img/news/news-1.webp') }}" style="width: 100%; height: auto;"
                                        alt="">
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body p-2">
                                        <p class="card-text">Lorem ipsum koakwi kkoalk coeocnoa olawok acec
                                        </p>
                                        <div class="d-flex gap-3 align-items-center ms-0">
                                            <p class="card-text m-0"><svg xmlns="http://www.w3.org/2000/svg" width="15"
                                                    height="15" viewBox="0 0 2048 2048">
                                                    <path fill="#0f4d8a"
                                                        d="M1536 171h341v1877H0V171h341V0h171v171h853V0h171zm171 1706V683H171v1194zm0-1365V341H171v171z" />
                                                </svg><small style="color: #0f4d8a"> Apr 25, 2023</small></p>
                                            <p class="card-text"><svg xmlns="http://www.w3.org/2000/svg" width="20"
                                                    height="20" viewBox="0 0 24 24">
                                                    <path fill="#0f4d8a"
                                                        d="M12 9a3 3 0 0 1 3 3a3 3 0 0 1-3 3a3 3 0 0 1-3-3a3 3 0 0 1 3-3m0-4.5c5 0 9.27 3.11 11 7.5c-1.73 4.39-6 7.5-11 7.5S2.73 16.39 1 12c1.73-4.39 6-7.5 11-7.5M3.18 12a9.821 9.821 0 0 0 17.64 0a9.821 9.821 0 0 0-17.64 0" />
                                                </svg><small style="color: #0f4d8a"> 1.203</small></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex gap-3">
                        <div class="my-auto">
                            <span class="fs-5 badge bg-light-warning text-warning">
                                2
                            </span>
                        </div>
                        <div class="" style="max-width: 540px;">
                            <div class="row g-2">
                                <div class="col-md-4">
                                    <img src="{{ asset('assets/img/news/news-1.webp') }}" style="width: 100%; height: auto;"
                                        alt="">
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body p-2">
                                        <p class="card-text">Lorem ipsum koakwi kkoalk coeocnoa olawok acec
                                        </p>
                                        <div class="d-flex gap-3 align-items-center ms-0">
                                            <p class="card-text m-0"><svg xmlns="http://www.w3.org/2000/svg" width="15"
                                                    height="15" viewBox="0 0 2048 2048">
                                                    <path fill="#0f4d8a"
                                                        d="M1536 171h341v1877H0V171h341V0h171v171h853V0h171zm171 1706V683H171v1194zm0-1365V341H171v171z" />
                                                </svg><small style="color: #0f4d8a"> Apr 25, 2023</small></p>
                                            <p class="card-text"><svg xmlns="http://www.w3.org/2000/svg" width="20"
                                                    height="20" viewBox="0 0 24 24">
                                                    <path fill="#0f4d8a"
                                                        d="M12 9a3 3 0 0 1 3 3a3 3 0 0 1-3 3a3 3 0 0 1-3-3a3 3 0 0 1 3-3m0-4.5c5 0 9.27 3.11 11 7.5c-1.73 4.39-6 7.5-11 7.5S2.73 16.39 1 12c1.73-4.39 6-7.5 11-7.5M3.18 12a9.821 9.821 0 0 0 17.64 0a9.821 9.821 0 0 0-17.64 0" />
                                                </svg><small style="color: #0f4d8a"> 1.203</small></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex gap-3">
                        <div class="my-auto">
                            <span class="fs-5 badge bg-light-primary text-primary">
                                3
                            </span>
                        </div>
                        <div class="" style="max-width: 540px;">
                            <div class="row g-2">
                                <div class="col-md-4">
                                    <img src="{{ asset('assets/img/news/news-1.webp') }}"
                                        style="width: 100%; height: auto;" alt="">
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body p-2">
                                        <p class="card-text">Lorem ipsum koakwi kkoalk coeocnoa olawok acec
                                        </p>
                                        <div class="d-flex gap-3 align-items-center ms-0">
                                            <p class="card-text m-0"><svg xmlns="http://www.w3.org/2000/svg"
                                                    width="15" height="15" viewBox="0 0 2048 2048">
                                                    <path fill="#0f4d8a"
                                                        d="M1536 171h341v1877H0V171h341V0h171v171h853V0h171zm171 1706V683H171v1194zm0-1365V341H171v171z" />
                                                </svg><small style="color: #0f4d8a"> Apr 25, 2023</small></p>
                                            <p class="card-text"><svg xmlns="http://www.w3.org/2000/svg" width="20"
                                                    height="20" viewBox="0 0 24 24">
                                                    <path fill="#0f4d8a"
                                                        d="M12 9a3 3 0 0 1 3 3a3 3 0 0 1-3 3a3 3 0 0 1-3-3a3 3 0 0 1 3-3m0-4.5c5 0 9.27 3.11 11 7.5c-1.73 4.39-6 7.5-11 7.5S2.73 16.39 1 12c1.73-4.39 6-7.5 11-7.5M3.18 12a9.821 9.821 0 0 0 17.64 0a9.821 9.821 0 0 0-17.64 0" />
                                                </svg><small style="color: #0f4d8a"> 1.203</small></p>
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
                type: 'bar',

            },
            dataLabels: {
                enabled: false
            },
            stroke: {
                width: [5, 7, 5],
                curve: 'smooth',
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

@extends('layouts.author.sidebar')

@section('style')
<style>
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

    .border-light-blue {
        border-left: 2px solid #5D87FF !important
    }

    .border-light-red {
        border-left: 2px solid #EF6E6E !important
    }
</style>
<link rel="stylesheet" href="{{ 'admin/dist/libs/prismjs/themes/prism-okaidia.min.css' }}">
@endsection

<title>
    Author | News Statistik
</title>

@section('content')

<div class="card shadow-sm position-relative overflow-hidden" style="background-color: #175A95;">
    <div class="card-body px-4 py-4">
        <div class="row justify-content-between">
            <div class="col-8 text-white">
                <h4 class="fw-semibold mb-3 mt-2 text-white">Statistik Berita</h4>
                <p>Terus tingkatkan kualitas berita</p>
            </div>
            <div class="col-3">
                <div class="text-center mb-n4">
                    <img src="{{ asset('assets/img/bg-ajuan.svg') }}" width="250px" alt="">
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-4">
        <div class="card">
            <div class="card-body">
                <div class="d-flex">
                    <div class="d-flex justify-content-between col-12">
                        <div class="align-items-center justify-content-start text-start">
                            <div>
                                <h3 style="color: #175A95" class=" mb-2">Berita</h3>
                                <h3>{{ $count }}</h3>
                            </div>
                        </div>
                        <div class="justify-content-between">
                            <div class="bg-light-primary text-primary rounded d-flex align-items-center p-8 justify-content-center">
                                <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 20 20">
                                    <path fill="#175A95" d="M5 6.5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5M10.5 9a.5.5 0 0 0 0 1h2a.5.5 0 0 0 0-1zm-.5 3.5a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 0 1h-2a.5.5 0 0 1-.5-.5M5.5 9a.5.5 0 0 0-.5.5v3a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 .5-.5v-3a.5.5 0 0 0-.5-.5zm.5 3v-2h2v2zM2 5a2 2 0 0 1 2-2h10a2 2 0 0 1 2 2v1a2 2 0 0 1 2 2v5.5a2.5 2.5 0 0 1-2.5 2.5h-11A2.5 2.5 0 0 1 2 13.5zm13 0a1 1 0 0 0-1-1H4a1 1 0 0 0-1 1v8.5A1.5 1.5 0 0 0 4.5 15h11a1.5 1.5 0 0 0 1.5-1.5V8a1 1 0 0 0-1-1v6.5a.5.5 0 0 1-1 0z" />
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-4">
        <div class="card">
            <div class="card-body">
                <div class="d-flex">
                    <div class="d-flex justify-content-between col-12">
                        <div class="align-items-center justify-content-start text-start">
                            <div>
                                <h3 style="color: #175A95" class=" mb-2">Like</h3>
                                <h3>{{ $like }}</h3>
                            </div>
                        </div>
                        <div class="justify-content-between">
                            <div class="bg-light-primary text-primary rounded d-flex align-items-center p-8 justify-content-center">
                                <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 24 24">
                                    <g fill="none">
                                        <path fill="#175A95" d="m15 10l-.74-.123a.75.75 0 0 0 .74.873zM4 10v-.75a.75.75 0 0 0-.75.75zm16.522 2.392l.735.147zM6 20.75h11.36v-1.5H6zm12.56-11.5H15v1.5h3.56zm-2.82.873l.806-4.835l-1.48-.247l-.806 4.836zm-.92-6.873h-.214v1.5h.213zm-3.335 1.67L8.97 8.693l1.248.832l2.515-3.773zM7.93 9.25H4v1.5h3.93zM3.25 10v8h1.5v-8zm16.807 8.54l1.2-6l-1.47-.295l-1.2 6zM8.97 8.692a1.25 1.25 0 0 1-1.04.557v1.5c.92 0 1.778-.46 2.288-1.225zm7.576-3.405A1.75 1.75 0 0 0 14.82 3.25v1.5a.25.25 0 0 1 .246.291zm2.014 5.462c.79 0 1.38.722 1.226 1.495l1.471.294A2.75 2.75 0 0 0 18.56 9.25zm-1.2 10a2.75 2.75 0 0 0 2.697-2.21l-1.47-.295a1.25 1.25 0 0 1-1.227 1.005zm-2.754-17.5a3.75 3.75 0 0 0-3.12 1.67l1.247.832a2.25 2.25 0 0 1 1.873-1.002zM6 19.25c-.69 0-1.25-.56-1.25-1.25h-1.5A2.75 2.75 0 0 0 6 20.75z" />
                                        <path stroke="#175A95   " stroke-width="1.5" d="M8 10v10" />
                                    </g>
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-4">
        <div class="card">
            <div class="card-body">
                <div class="d-flex">
                    <div class="d-flex justify-content-between col-12">
                        <div class="align-items-center justify-content-start text-start">
                            <div>
                                <h3 style="color: #175A95" class=" mb-2">Pembaca</h3>
                                <h3>{{ $view }}</h3>
                            </div>
                        </div>
                        <div class="justify-content-between">
                            <div class="bg-light-primary text-primary rounded d-flex align-items-center p-8 justify-content-center">
                                <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 256 256">
                                    <path fill="#175A95" d="M247.31 124.76c-.35-.79-8.82-19.58-27.65-38.41C194.57 61.26 162.88 48 128 48S61.43 61.26 36.34 86.35C17.51 105.18 9 124 8.69 124.76a8 8 0 0 0 0 6.5c.35.79 8.82 19.57 27.65 38.4C61.43 194.74 93.12 208 128 208s66.57-13.26 91.66-38.34c18.83-18.83 27.3-37.61 27.65-38.4a8 8 0 0 0 0-6.5M128 192c-30.78 0-57.67-11.19-79.93-33.25A133.5 133.5 0 0 1 25 128a133.3 133.3 0 0 1 23.07-30.75C70.33 75.19 97.22 64 128 64s57.67 11.19 79.93 33.25A133.5 133.5 0 0 1 231.05 128c-7.21 13.46-38.62 64-103.05 64m0-112a48 48 0 1 0 48 48a48.05 48.05 0 0 0-48-48m0 80a32 32 0 1 1 32-32a32 32 0 0 1-32 32" />
                                </svg>
                            </div>
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
                <h3>Berita</h3>
                @forelse ($news as $item)
                <div class="d-flex gap-3 ms-1 mb-3 mt-4">
                    <div class="my-auto">
                        <span class="fs-5">
                            @if ($loop->iteration === 1)
                            <span class="badge bg-light-danger text-danger">{{ $loop->iteration }}</span>
                            @elseif ($loop->iteration === 2)
                            <span class="badge bg-light-primary text-primary">{{ $loop->iteration }}</span>
                            @else
                            <span class="badge bg-light-warning text-warning">{{ $loop->iteration }}</span>
                            @endif
                        </span>
                    </div>
                    <div class="">
                        <div class="row g-2">
                            <div class="col-md-4">
                                <img style="object-fit:cover;" width="100%" height="90" alt="" src="{{ asset('storage/' . $item->photo) }}">
                            </div>
                            <div class="col-md-8">
                                <div class="card-body p-2">
                                    <p class="card-text">{!! Illuminate\Support\Str::limit(strip_tags($item->name), 50, '...') !!}
                                    </p>
                                    <div class="d-flex gap-3 align-items-center ms-0">
                                        <p class="card-text m-0"><svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 2048 2048">
                                                <path fill="#EF6E6E" d="M1536 171h341v1877H0V171h341V0h171v171h853V0h171zm171 1706V683H171v1194zm0-1365V341H171v171z" />
                                            </svg><small class="ms-1">{{ \Carbon\Carbon::parse($item->upload_date)->format('M d Y') }}</small>
                                        </p>
                                        <p class="card-text"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24">
                                                <path fill="#EF6E6E" d="M12 9a3 3 0 0 1 3 3a3 3 0 0 1-3 3a3 3 0 0 1-3-3a3 3 0 0 1 3-3m0-4.5c5 0 9.27 3.11 11 7.5c-1.73 4.39-6 7.5-11 7.5S2.73 16.39 1 12c1.73-4.39 6-7.5 11-7.5M3.18 12a9.821 9.821 0 0 0 17.64 0a9.821 9.821 0 0 0-17.64 0" />
                                            </svg><small class="ms-1">{{ $item->views_count }}</small>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @empty
                <div class="d-flex justify-content-center">
                    <div>
                        <img src="{{ asset('assets/img/no-data.svg') }}" width="200px" alt="">
                    </div>
                </div>
                @endforelse

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

    // var news_statistic = <?php echo json_encode($newsStatistics); ?>;
    // var newsString = JSON.stringify(news_statistic);
    // var dataNews = JSON.parse(newsString);

    // var news = [];
    // for (var key in dataNews) {
    //     if (dataNews.hasOwnProperty(key)) {
    //         news.push(dataNews[key]);
    //     }
    // }

    // var options1 = {
    //     series: [{
    //             name: "Terbawah",
    //             data: news
    //         },
    //         {
    //             name: "Teratas",
    //             data: news
    //         },
    //         {
    //             name: 'Menengah',
    //             data: news
    //         }
    //     ],
    //     chart: {
    //         height: 350,
    //         type: 'bar',

    //     },
    //     dataLabels: {
    //         enabled: false
    //     },
    //     stroke: {
    //         width: [5, 7, 5],
    //         curve: 'smooth',
    //         dashArray: [0]
    //     },
    //     legend: {
    //         tooltipHoverFormatter: function(val, opts) {
    //             return val + ' - <strong>' + opts.w.globals.series[opts.seriesIndex][opts.dataPointIndex] +
    //                 '</strong>'
    //         }
    //     },
    //     markers: {
    //         size: 0,
    //         hover: {
    //             sizeOffset: 6
    //         }
    //     },
    //     xaxis: {
    //         categories: ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu', 'Minggu',],
    //     },
    //     tooltip: {
    //         y: [{
    //                 title: {
    //                     formatter: function(val) {
    //                         return val + " (mins)"
    //                     }
    //                 }
    //             },
    //             {
    //                 title: {
    //                     formatter: function(val) {
    //                         return val + " per session"
    //                     }
    //                 }
    //             },
    //             {
    //                 title: {
    //                     formatter: function(val) {
    //                         return val;
    //                     }
    //                 }
    //             }
    //         ]
    //     },
    //     grid: {
    //         borderColor: '#f1f1f1',
    //     },
    //     colors: ['#FFD643', '#175A95', '#EF6E6E'] // Ubah warna masing-masing chart di sini
    // };

    // var chart1 = new ApexCharts(document.querySelector("#chart-trending"), options1);
    // chart1.render();

    var news_statistic = <?php echo json_encode($newsStatistics); ?>;
    var dataNews = JSON.parse(JSON.stringify(news_statistic));

    var categories = ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu', 'Minggu'];
    var today = new Date();
    var days = [];
    for (var i = 6; i >= 0; i--) {
        var day = new Date(today);
        day.setDate(today.getDate() - i);
        var options = {
            weekday: 'long'
        };
        days.push(day.toLocaleDateString('id-ID', options));
    }

    var news = [
        [],
        [],
        []
    ];
    var i = 0;
    for (var key in dataNews) {
        if (dataNews.hasOwnProperty(key)) {
            news[i] = Object.values(dataNews[key]);
            i++;
        }
    }

    var options1 = {
        series: [{
                name: "Terbawah",
                data: news[2]
            },
            {
                name: "Menengah",
                data: news[1]
            },
            {
                name: 'Teratas',
                data: news[0]
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
                    '</strong>';
            }
        },
        markers: {
            size: 0,
            hover: {
                sizeOffset: 6
            }
        },
        xaxis: {
            categories: days,
        },
        tooltip: {
            y: [{
                    title: {
                        formatter: function(val) {
                            return val + " views";
                        }
                    }
                },
                {
                    title: {
                        formatter: function(val) {
                            return val + " views";
                        }
                    }
                },
                {
                    title: {
                        formatter: function(val) {
                            return val + " views";
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
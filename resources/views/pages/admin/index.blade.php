@extends('layouts.admin.app')
@section('style')
    <style>
        .border-primary{
            border-bottom: 2px solid #41739e !important
        }
        .border-danger{
            border-bottom: 2px solid #e68888 !important
        }
        .border-info{
            border-bottom: 2px solid #bacff0 !important
        }
        .border-warning{
            border-bottom: 2px solid #fce287 !important
        }
    </style>
      <link rel="stylesheet" href="{{ ('admin/dist/libs/prismjs/themes/prism-okaidia.min.css') }}">

@endsection
@section('content')
    <div class="row">
        <div class="col-12 col-md-6 col-lg-3">
            <div class="card border-bottom border-primary">
                <div class="card-body">
                    <div class="text-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" viewBox="0 0 24 24"><path fill=" #41739e" d="M16 17v2H2v-2s0-4 7-4s7 4 7 4m-3.5-9.5A3.5 3.5 0 1 0 9 11a3.5 3.5 0 0 0 3.5-3.5m3.44 5.5A5.32 5.32 0 0 1 18 17v2h4v-2s0-3.63-6.06-4M15 4a3.39 3.39 0 0 0-1.93.59a5 5 0 0 1 0 5.82A3.39 3.39 0 0 0 15 11a3.5 3.5 0 0 0 0-7"/></svg>
                    </div>
                    <div style="color: #41739e" class="text-center mt-2">
                        <h2 >Jumlah Pengunjung</h2>
                        <h3 style="color: #41739e">+ 530</h3>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-6 col-lg-3">
            <div class="card border-bottom border-danger">
                <div class="card-body">
                    <div class="text-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" viewBox="0 0 24 24"><path fill="#e68888" d="M14 20v-1.25q0-.4.163-.763t.437-.637l4.925-4.925q.225-.225.5-.325t.55-.1q.3 0 .575.113t.5.337l.925.925q.2.225.313.5t.112.55q0 .275-.1.563t-.325.512l-4.925 4.925q-.275.275-.637.425t-.763.15H15q-.425 0-.712-.288T14 20M4 19v-1.8q0-.85.438-1.562T5.6 14.55q1.55-.775 3.15-1.162T12 13q.925 0 1.825.113t1.8.362l-2.75 2.75q-.425.425-.65.975T12 18.35V20H5q-.425 0-.712-.288T4 19m16.575-3.6l.925-.975l-.925-.925l-.95.95zM12 12q-1.65 0-2.825-1.175T8 8q0-1.65 1.175-2.825T12 4q1.65 0 2.825 1.175T16 8q0 1.65-1.175 2.825T12 12"/></svg>
                    </div>
                    <div style="color: #e68888" class="text-center mt-2">
                        <h2 >Jumlah Penulis</h2>
                        <h3 style="color: #e68888">+ 530</h3>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-6 col-lg-3">
            <div class="card border-bottom border-info">
                <div class="card-body">
                    <div class="text-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" viewBox="0 0 24 24"><path fill="#bacff0" d="M12 12q-1.65 0-2.825-1.175T8 8q0-1.65 1.175-2.825T12 4q1.65 0 2.825 1.175T16 8q0 1.65-1.175 2.825T12 12m-8 8v-2.8q0-.85.438-1.562T5.6 14.55q1.55-.775 3.15-1.162T12 13q1.65 0 3.25.388t3.15 1.162q.725.375 1.163 1.088T20 17.2V20z"/></svg>
                    </div>
                    <div style="color: #bacff0" class="text-center mt-2">
                        <h2 >Jumlah User</h2>
                        <h3 style="color: #bacff0">+ 530</h3>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-6 col-lg-3">
            <div class="card border-bottom border-warning">
                <div class="card-body">
                    <div class="text-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" viewBox="0 0 24 24"><path fill="#fce287" d="m22 3l-1.67 1.67L18.67 3L17 4.67L15.33 3l-1.66 1.67L12 3l-1.67 1.67L8.67 3L7 4.67L5.33 3L3.67 4.67L2 3v16c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V3zM11 19H4v-6h7v6zm9 0h-7v-2h7v2zm0-4h-7v-2h7v2zm0-4H4V8h16v3z"/></svg>
                    </div>
                    <div style="color:#fce287" class="text-center mt-2">
                        <h2 >Jumlah Berita</h2>
                        <h3 style="color:#fce287">+ 530</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-9 col-12">
            <div class="card">
               <div class="card-body">
                <div class="row">
                    <div class="col-9">
                        <h4>Statistik</h4>
                        <div id="chart-writer">

                        </div>
                    </div>
                    <div class="col-3">
                        <h4 class="mb-3">Penulis</h4>
                        <div>
                            <div class="d-flex align-items-center">
                                <img src="{{ asset('default.png') }}" class="rounded-circle mb-3 img"
                                    width="40" height="40" />
                                <div class="ms-3">
                                    <p class="fs-4 fw-semibold fs-2 student-name">mohammad abdul kader al jaelani maulana malik ibrahim</p>
                                </div>
                            </div>
                        </div>
                        <div>
                            <div class="d-flex align-items-center">
                                <img src="{{ asset('default.png') }}" class="rounded-circle mb-3 img"
                                    width="40" height="40" />
                                <div class="ms-3">
                                    <p class="fs-4 fw-semibold fs-2 student-name">Mohammad Daffa</p>
                                </div>
                            </div>
                        </div>
                        <div>
                            <div class="d-flex align-items-center">
                                <img src="{{ asset('default.png') }}" class="rounded-circle mb-3 img"
                                    width="40" height="40" />
                                <div class="ms-3">
                                    <p class="fs-4 fw-semibold fs-2 student-name">Mohammad Daffa</p>
                                </div>
                            </div>
                        </div>
                        <div>
                            <div class="d-flex align-items-center">
                                <img src="{{ asset('default.png') }}" class="rounded-circle mb-3 img"
                                    width="40" height="40" />
                                <div class="ms-3">
                                    <p class="fs-4 fw-semibold fs-2 student-name">Mohammad Daffa</p>
                                </div>
                            </div>
                        </div>
                        <div>
                            <div class="d-flex align-items-center">
                                <img src="{{ asset('default.png') }}" class="rounded-circle mb-3 img"
                                    width="40" height="40" />
                                <div class="ms-3">
                                    <p class="fs-4 fw-semibold fs-2 student-name">Mohammad Daffa</p>
                                </div>
                            </div>
                        </div>
                        <div>
                            <div class="d-flex align-items-center">
                                <img src="{{ asset('default.png') }}" class="rounded-circle mb-3 img"
                                    width="40" height="40" />
                                <div class="ms-3">
                                    <p class="fs-4 fw-semibold fs-2 student-name">Mohammad Daffa</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
               </div>
            </div>
        </div>
        <div class="col-md-3 col-12">
            <div class="card">
                <div class="card-body">
                    <h4>Kategori Trending</h4>
                   <div>
                    <div class="fs-5 mb-3 mt-4" >
                        Pendidikan
                    </div>
                    <div class="fs-5 mb-3" >
                        Agama
                    </div>
                    <div class="fs-5 mb-3" >
                        Politik
                    </div>
                    <div class="fs-5 mb-3" >
                        Pendidikan
                    </div>
                    <div class="fs-5 mb-3" >
                        Agama
                    </div>
                    <div class="fs-5 mb-3" >
                        Politik
                    </div>
                    <div class="fs-5 mb-3" >
                        Pendidikan
                    </div>
                    <div class="fs-5 mb-3" >
                        Agama
                    </div>
                    <div class="fs-5 mb-3" >
                        Pendidikan
                    </div>
                   </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12 col-12">
            <div class="card">
               <div class="card-body">
                <div class="row">
                    <div class="col-md-7 col-lg-6">
                        <h4>Statistik</h4>
                        <div id="chart-news">

                        </div>
                    </div>
                    <div class="col-md-6 col-lg-6">
                        <h4 class="mb-3">Berita</h4>
                        <div>
                            <div class="d-flex gap-4 mb-3">
                                <div class="col-md-12 col-lg-6">
                                    <div class="card mb-3" style="max-width: 540px;">
                                        <div class="row g-2">
                                          <div class="col-md-4 bg-secondary">
                                          </div>
                                          <div class="col-md-8">
                                            <div class="card-body p-2">
                                              <p class="card-text">Lorem ipsum koakwi kkoalk coeocnoa olawok acec</p>
                                              <div class="d-flex justify-content-between align-items-center ms-0">
                                                  <p class="card-text m-0"><svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 2048 2048"><path fill="currentColor" d="M1536 171h341v1877H0V171h341V0h171v171h853V0h171zm171 1706V683H171v1194zm0-1365V341H171v171z"/></svg><small> Apr 25, 2023</small></p>
                                                  <p class="card-text"><svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 48 48"><path fill="none" stroke="currentColor" stroke-linejoin="round" stroke-width="4" d="M27.6 18.6v-7.2A5.4 5.4 0 0 0 22.2 6L15 22.2V42h20.916a3.6 3.6 0 0 0 3.6-3.06L42 22.74a3.6 3.6 0 0 0-3.6-4.14zM15 22h-4.806C8.085 21.963 6.283 23.71 6 25.8v12.6a4.158 4.158 0 0 0 4.194 3.6H15z"/></svg><small> 1.203</small></p>
                                              </div>
                                            </div>
                                          </div>
                                        </div>
                                      </div>
                                </div>
                                <div class="col-md-12 col-lg-6">
                                    <div class="card mb-3" style="max-width: 540px;">
                                        <div class="row g-2">
                                          <div class="col-md-4 bg-secondary">
                                          </div>
                                          <div class="col-md-8">
                                            <div class="card-body p-2">
                                              <p class="card-text">Lorem ipsum koakwi kkoalk coeocnoa olawok acec</p>
                                              <div class="d-flex justify-content-between align-items-center ms-0">
                                                  <p class="card-text m-0"><svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 2048 2048"><path fill="currentColor" d="M1536 171h341v1877H0V171h341V0h171v171h853V0h171zm171 1706V683H171v1194zm0-1365V341H171v171z"/></svg><small> Apr 25, 2023</small></p>
                                                  <p class="card-text"><svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 48 48"><path fill="none" stroke="currentColor" stroke-linejoin="round" stroke-width="4" d="M27.6 18.6v-7.2A5.4 5.4 0 0 0 22.2 6L15 22.2V42h20.916a3.6 3.6 0 0 0 3.6-3.06L42 22.74a3.6 3.6 0 0 0-3.6-4.14zM15 22h-4.806C8.085 21.963 6.283 23.71 6 25.8v12.6a4.158 4.158 0 0 0 4.194 3.6H15z"/></svg><small> 1.203</small></p>
                                              </div>
                                            </div>
                                          </div>
                                        </div>
                                      </div>
                                </div>
                            </div>

                            <div class="d-flex gap-4 mb-3">
                                <div class="col-md-12 col-lg-6">
                                    <div class="card mb-3" style="max-width: 540px;">
                                        <div class="row g-2">
                                          <div class="col-md-4 bg-secondary">
                                          </div>
                                          <div class="col-md-8">
                                            <div class="card-body p-2">
                                              <p class="card-text">Lorem ipsum koakwi kkoalk coeocnoa olawok acec</p>
                                              <div class="d-flex justify-content-between align-items-center ms-0">
                                                  <p class="card-text m-0"><svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 2048 2048"><path fill="currentColor" d="M1536 171h341v1877H0V171h341V0h171v171h853V0h171zm171 1706V683H171v1194zm0-1365V341H171v171z"/></svg><small> Apr 25, 2023</small></p>
                                                  <p class="card-text"><svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 48 48"><path fill="none" stroke="currentColor" stroke-linejoin="round" stroke-width="4" d="M27.6 18.6v-7.2A5.4 5.4 0 0 0 22.2 6L15 22.2V42h20.916a3.6 3.6 0 0 0 3.6-3.06L42 22.74a3.6 3.6 0 0 0-3.6-4.14zM15 22h-4.806C8.085 21.963 6.283 23.71 6 25.8v12.6a4.158 4.158 0 0 0 4.194 3.6H15z"/></svg><small> 1.203</small></p>
                                              </div>
                                            </div>
                                          </div>
                                        </div>
                                      </div>
                                </div>
                                <div class="col-md-12 col-lg-6">
                                    <div class="card mb-3" style="max-width: 540px;">
                                        <div class="row g-2">
                                          <div class="col-md-4 bg-secondary">
                                          </div>
                                          <div class="col-md-8">
                                            <div class="card-body p-2">
                                              <p class="card-text">Lorem ipsum koakwi kkoalk coeocnoa olawok acec</p>
                                              <div class="d-flex justify-content-between align-items-center ms-0">
                                                  <p class="card-text m-0"><svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 2048 2048"><path fill="currentColor" d="M1536 171h341v1877H0V171h341V0h171v171h853V0h171zm171 1706V683H171v1194zm0-1365V341H171v171z"/></svg><small> Apr 25, 2023</small></p>
                                                  <p class="card-text"><svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 48 48"><path fill="none" stroke="currentColor" stroke-linejoin="round" stroke-width="4" d="M27.6 18.6v-7.2A5.4 5.4 0 0 0 22.2 6L15 22.2V42h20.916a3.6 3.6 0 0 0 3.6-3.06L42 22.74a3.6 3.6 0 0 0-3.6-4.14zM15 22h-4.806C8.085 21.963 6.283 23.71 6 25.8v12.6a4.158 4.158 0 0 0 4.194 3.6H15z"/></svg><small> 1.203</small></p>
                                              </div>
                                            </div>
                                          </div>
                                        </div>
                                      </div>
                                </div>
                            </div>

                            <div class="d-flex gap-4 mb-3">
                                <div class="col-md-12 col-lg-6">
                                    <div class="card mb-3" style="max-width: 540px;">
                                        <div class="row g-2">
                                          <div class="col-md-4 bg-secondary">
                                          </div>
                                          <div class="col-md-8">
                                            <div class="card-body p-2">
                                              <p class="card-text">Lorem ipsum koakwi kkoalk coeocnoa olawok acec</p>
                                              <div class="d-flex justify-content-between align-items-center ms-0">
                                                  <p class="card-text m-0"><svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 2048 2048"><path fill="currentColor" d="M1536 171h341v1877H0V171h341V0h171v171h853V0h171zm171 1706V683H171v1194zm0-1365V341H171v171z"/></svg><small> Apr 25, 2023</small></p>
                                                  <p class="card-text"><svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 48 48"><path fill="none" stroke="currentColor" stroke-linejoin="round" stroke-width="4" d="M27.6 18.6v-7.2A5.4 5.4 0 0 0 22.2 6L15 22.2V42h20.916a3.6 3.6 0 0 0 3.6-3.06L42 22.74a3.6 3.6 0 0 0-3.6-4.14zM15 22h-4.806C8.085 21.963 6.283 23.71 6 25.8v12.6a4.158 4.158 0 0 0 4.194 3.6H15z"/></svg><small> 1.203</small></p>
                                              </div>
                                            </div>
                                          </div>
                                        </div>
                                      </div>
                                </div>
                                <div class="col-md-12 col-lg-6">
                                    <div class="card mb-3" style="max-width: 540px;">
                                        <div class="row g-2">
                                          <div class="col-md-4 bg-secondary">
                                          </div>
                                          <div class="col-md-8">
                                            <div class="card-body p-2">
                                              <p class="card-text">Lorem ipsum koakwi kkoalk coeocnoa olawok acec</p>
                                              <div class="d-flex justify-content-between align-items-center ms-0">
                                                  <p class="card-text m-0"><svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 2048 2048"><path fill="currentColor" d="M1536 171h341v1877H0V171h341V0h171v171h853V0h171zm171 1706V683H171v1194zm0-1365V341H171v171z"/></svg><small> Apr 25, 2023</small></p>
                                                  <p class="card-text"><svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 48 48"><path fill="none" stroke="currentColor" stroke-linejoin="round" stroke-width="4" d="M27.6 18.6v-7.2A5.4 5.4 0 0 0 22.2 6L15 22.2V42h20.916a3.6 3.6 0 0 0 3.6-3.06L42 22.74a3.6 3.6 0 0 0-3.6-4.14zM15 22h-4.806C8.085 21.963 6.283 23.71 6 25.8v12.6a4.158 4.158 0 0 0 4.194 3.6H15z"/></svg><small> 1.203</small></p>
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
               </div>
            </div>
        </div>
    </div>


    <div class="row">


    </div>
@endsection
@section('script')
<script src="{{ asset('admin/dist/libs/apexcharts/dist/apexcharts.min.js') }}"></script>
<script>
        var options = {
          series: [{
          data: [400, 430, 448, 470, 540, 580, 690, 1100, 1200, 1380]
        }],
          chart: {
          type: 'bar',
          height: 350
        },
        plotOptions: {
          bar: {
            borderRadius: 4,
            horizontal: false,
          }
        },
        title:{
            text:'Penulis Terbanyak'
        },
        dataLabels: {
          enabled: false
        },
        xaxis: {
          categories: ['South Korea', 'Canada', 'United Kingdom', 'Netherlands', 'Italy', 'France', 'Japan',
            'United States', 'China', 'Germany'
          ],
        }
        };

        var chart = new ApexCharts(document.querySelector("#chart-writer"), options);
        chart.render();

</script>

<script>
    var options = {
      series: [{
      data: [400, 430, 448, 470, 540, 580, 690, 1100, 1200, 1380]
    }],
      chart: {
      type: 'bar',
      height: 350
    },
    plotOptions: {
      bar: {
        borderRadius: 4,
        horizontal: false,
      }
    },
    title:{
        text:'Berita Tranding'
    },
    dataLabels: {
      enabled: false
    },
    xaxis: {
      categories: ['South Korea', 'Canada', 'United Kingdom', 'Netherlands', 'Italy', 'France', 'Japan',
        'United States', 'China', 'Germany'
      ],
    }
    };

    var chart = new ApexCharts(document.querySelector("#chart-news"), options);
    chart.render();

</script>

@endsection

@extends('layouts.admin.app')

@section('content')
<div class="card shadow-sm position-relative overflow-hidden"  style="background-color: #175A95;">
    <div class="card-body px-4 py-4">
      <div class="row justify-content-between">
        <div class="col-8 text-white">
          <h4 class="fw-semibold mb-3 mt-2 text-white">Fitur Berlangganan</h4>
            <p>Jadikan pengalaman membaca menjadi lebih baik</p>
        </div>
        <div class="col-3">
          <div class="text-center mb-n4">
            <img src="{{asset('assets/img/bg-ajuan.svg')}}" width="250px" alt="" class="img-fluid">
          </div>
        </div>
      </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-7">
        <div class="card p-4">
            <div class="table-responsive rounded-2 mt-4">
                <table class="table border text-nowrap customize-table mb-0 align-middle">
                    <thead>
                        <tr>
                            <th style="background-color: #DCDCDC;">No</th>
                            <th style="background-color: #DCDCDC;">Nama Fitur</th>
                            <th style="background-color: #DCDCDC;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="col-lg-5">
        <div class="card p-4">
            <div class="" id="chart-donut">

            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script src="{{ asset('admin/dist/libs/apexcharts/dist/apexcharts.min.js') }}"></script>
<script>
    
    var options = {
          series: [44, 55, 41, 17, 15],
          chart: {
          type: 'donut',
        },
        responsive: [{
          breakpoint: 480,
          options: {
            chart: {
              width: 200
            },
            legend: {
              position: 'bottom'
            }
          }
        }]
        };

        var chart = new ApexCharts(document.querySelector("#chart-donut"), options);
        chart.render();
</script>

@endsection
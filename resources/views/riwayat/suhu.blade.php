@extends('layouts.app')

@section('content')
<div class="header bg-gradient-primary pb-8 pt-5 pt-md-8">
        <div class="container-fluid">
        </div>
    </div>
 <div class="container-fluid mt--8">
    <div class="row">
        <div class="col">
            <livewire:tabel-suhu/>
        </div>
        <div class="col">
            <div class="card">
                <div class="card-header bg-transparent">
                    <div class="row align-items-center">
                        <div class="col">
                        <h5 class="text-muted text-uppercase ls-1 mb-2">Grafik Suhu Tubuh</h5>
                        <h5 class="text-muted mb-0">Riwayat 10 Pengukuran Terakhir</h5>
                        </div>
                        <div class="col">
                        {{-- <ul class="nav nav-pills justify-content-end">
                            <li class="nav-item mr-2 mr-md-0" data-toggle="chart" data-target="#chart-sales-dark" data-update="{&quot;data&quot;:{&quot;datasets&quot;:[{&quot;data&quot;:[0, 20, 10, 30, 15, 40, 20, 60, 60]}]}}" data-prefix="$" data-suffix="k">
                            <a href="#" class="nav-link py-2 px-3 active" data-toggle="tab">
                                <span class="d-none d-md-block">Month</span>
                                <span class="d-md-none">M</span>
                            </a>
                            </li>
                            <li class="nav-item" data-toggle="chart" data-target="#chart-sales-dark" data-update="{&quot;data&quot;:{&quot;datasets&quot;:[{&quot;data&quot;:[0, 20, 5, 25, 10, 30, 15, 40, 40]}]}}" data-prefix="$" data-suffix="k">
                            <a href="#" class="nav-link py-2 px-3" data-toggle="tab">
                                <span class="d-none d-md-block">Week</span>
                                <span class="d-md-none">W</span>
                            </a>
                            </li>
                        </ul> --}}
                        </div>
                    </div>
                    </div>
                <div class="card-body">
                    <div class="chart">
                        <!-- Chart wrapper -->
                        <canvas height="500" width="500" id="chart-suhu" class="chart-canvas"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
 </div>
@endsection

@push('css')
    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap4.min.css"> --}}
    <link rel="stylesheet" href="{{ asset('assets') }}/vendor/datatables.net-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="{{ asset('assets') }}/vendor/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css">
    <link rel="stylesheet" href="{{ asset('assets') }}/vendor/datatables.net-select-bs4/css/select.bootstrap4.min.css">
    <link rel="stylesheet" href="{{ asset('assets') }}/css/argon.css?v=1.1.0" type="text/css">
@endpush


@push('js')
    <script>
        var url = "{{url('chart-suhu')}}";
        var suhu = new Array();
        var tanggal = new Array();
        $(document).ready(function(){
          $.get(url, function(response){
            response.forEach(function(data){
                suhu.push(data.suhu);
                var date = new Date(data.created_at);
                var day = date.getDay();
                var month = date.getMonth()+1;
                var year = date.getFullYear();
                var fullDate = day+"-"+month+"-"+year
                tanggal.push(fullDate);
            });
            var ctx = document.getElementById("chart-suhu").getContext('2d');
                var myChart = new Chart(ctx, {
                  type: 'line',
                  data: {
                      labels:tanggal,
                      datasets: [{
                          label: 'Suhu',
                            fill:false,
                          data: suhu
                      }]
                  },
                  options: {
                    //  responsive: true,
				title: {
					display: true,
					text: 'Chart'
				},
				tooltips: {
					mode: 'index',
					intersect: false,
				},
				hover: {
					mode: 'nearest',
					intersect: true
				},
				scales: {
					xAxes: [{
						display: true,
						scaleLabel: {
							display: true,
							labelString: 'Tanggal Pemeriksaan'
						}
					}],
					yAxes: [{
						display: true,
						scaleLabel: {
							display: true,
							labelString: 'Celcius'
						}
					}]
				}
                  }
              });
          });
        });
    </script>
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.min.js"></script>
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.extension.js"></script>

    <script src="{{ asset('assets') }}/vendor/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="{{ asset('assets') }}/vendor/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="{{ asset('assets') }}/vendor/datatables.net-buttons/js/dataTables.buttons.min.js"></script>

    <script src="{{ asset('assets') }}/vendor/datatables.net-select/js/dataTables.select.min.js"></script>
    {{-- <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap4.min.js"></script> --}}
    <script>
        $(document).ready(function() {
            $('#tabel-suhu').DataTable({
                language: {
                    paginate: {
                        next: '<i class="fas fa-angle-right">',
                        previous: '<i class="fas fa-angle-left">'
                    }
                }
            });
        } );
    </script>
@endpush

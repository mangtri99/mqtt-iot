@extends('layouts.app', ['titlePage' => __('Riwayat Detak Jantung dan SpO2')])

@section('content')
<div class="header bg-gradient-primary pb-8 pt-5 pt-md-8">
        <div class="container-fluid">
            <input type="hidden" value="{{auth()->user()->id}}" id="user_id">
        </div>
    </div>
 <div class="container-fluid mt--8">
    <div class="row">
        <div class="col">
            <livewire:tabel-detak/>
        </div>
        {{-- <div class="col">
            <div class="card bg-white">
                <div class="card-header bg-transparent">
                    <div class="row align-items-center">
                        <div class="col">
                        <h5 class="text-muted text-uppercase ls-1 mb-2">Grafik Detak Jantung dan Kadar Oksigen</h5>
                        <h5 class="text-muted mb-0">Riwayat 10 Pengukuran Terakhir</h5>
                        </div>
                        <div class="col">
                        </div>
                    </div>
                    </div>
                <div class="card-body">
                    <div class="chart">
                        <!-- Chart wrapper -->
                        <canvas height="500" width="500" id="chart-detak" class="chart-canvas"></canvas>
                    </div>
                </div>
            </div>
        </div> --}}
        @include('chart.chart-detak')
    </div>
 </div>
@endsection

@push('css')
    <link rel="stylesheet" href="{{ asset('assets') }}/vendor/datatables.net-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="{{ asset('assets') }}/vendor/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css">
    <link rel="stylesheet" href="{{ asset('assets') }}/vendor/datatables.net-select-bs4/css/select.bootstrap4.min.css">
    <link rel="stylesheet" href="{{ asset('assets') }}/css/argon.css?v=1.1.0" type="text/css">
@endpush

@push('js')
    {{-- <script>
        var id_user = $('#user_id').val();
        var url = "{{url('chart-detak')}}" + "/" + id_user;
        var bpm = new Array();
        var oksigen = new Array();
        var tanggal = new Array();
        $(document).ready(function(){
          $.get(url, function(response){
            response.forEach(function(data){
                bpm.push(data.bpm);
                oksigen.push(data.oksigen);
                var date = new Date(data.created_at);
                var day = date.getDay();
                var month = date.getMonth()+1;
                var year = date.getFullYear();
                var fullDate = day+"/"+month+"/"+year
                tanggal.push(fullDate);
            });
            var ctx = document.getElementById("chart-detak").getContext('2d');
                var myChart = new Chart(ctx, {
                  type: 'line',
                  data: {
                      labels:tanggal,
                      datasets: [{
                          label: 'Detak Jantung (bpm)',
                            fill:false,
                          data: bpm
                      },{
                          label: 'Oksigen(%)',
                            fill:false,
                          data: oksigen
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
							labelString: 'Value'
						}
					}]
				}
                  }
              });
          });
        });
    </script> --}}

    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.min.js"></script>
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.extension.js"></script>

    {{-- <script src="{{ asset('assets') }}/vendor/jquery/dist/jquery.min.js"></script> --}}
    {{-- <script src="{{ asset('assets') }}/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script> --}}

    <script src="{{ asset('assets') }}/vendor/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="{{ asset('assets') }}/vendor/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="{{ asset('assets') }}/vendor/datatables.net-select/js/dataTables.select.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#tabel-detak').DataTable({
                language: {
                    paginate: {
                        next: '<i class="fas fa-angle-right">',
                        previous: '<i class="fas fa-angle-right">'
                    }
                }
            });
        } );
    </script>
@endpush



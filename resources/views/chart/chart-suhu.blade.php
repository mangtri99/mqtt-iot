<div class="{{(request()->is('riwayat-suhu')) ? 'col-12' : ''}}">
    <div class="card">
        <div class="card-header bg-transparent">
            <div class="row align-items-center">
                <div class="col">
                <h5 class="text-muted text-uppercase ls-1 mb-2">Grafik Suhu Tubuh</h5>
                <h5 class="text-muted mb-0">Riwayat 10 Pengukuran Terakhir</h5>
                </div>
                <div class="col">
                </div>
            </div>
            </div>
        <div class="card-body">
            <div class="">
                <!-- Chart wrapper -->
                <canvas height="300" width="600" id="chart-suhu" class=""></canvas>
            </div>
        </div>
    </div>
</div>

@push('js')
    {{-- <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.min.js"></script>
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.extension.js"></script> --}}
    <script>
        var id_user = $('#user_id').val();
        var url = "{{url('chart-suhu')}}" + "/" + id_user;
        var suhu = new Array();
        var tanggal = new Array();
        $(document).ready(function(){
          $.get(url, function(response){
              console.log(response)
            response.forEach(function(data){
                suhu.push(data.suhu);
                var date = new Date(data.created_at);
                var day = date.getDate();
                console.log(day)
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
                        data: suhu,
                        borderColor: '#f41212',
                        backgroundColor: '#f41212'
                      }]
                  },
                options: {
                    interaction: {
                        intersect: false,
                        mode: 'index',
                    },
                    responsive: true,
                    plugins: {
                        autocolors: false,
                        annotation: {
                            annotations: {
                                line1: {
                                    type: 'line',
                                    yMin: 37.5,
                                    yMax: 37.5,
                                    borderColor: 'rgb(255, 99, 132)',
                                    borderWidth: 4,
                                    label: {
                                        color: '#a88d32',
                                        content: 'Batas Atas Suhu!',
                                        position: 'center',
                                        enabled: true
                                    }
                                }
                            }
                        },
                        title: {
                            display: true,
                            text: 'Chart Suhu Tubuh'
                        }
                    },
                    scales: {
                        x: {
                            display: true,
                            title: {
                                display: true,
                                text: 'Tanggal Pemeriksaan',
                                color: '#32a852',
                                font: {
                                    size: 18,
                                    weight: 'bold',
                                    lineHeight: 1.2,
                                },
                                padding: {top: 10, left: 0, right: 0, bottom: 0}
                            }
                        },
                        y: {
                            title: {
                                display: true,
                                text: 'Celcius',
                                color: '#a83e32',
                                font: {
                                    size: 14,
                                    weight: 'bold',
                                    lineHeight: 1.2,
                                },
                            },
                            min: 35,
                            max: 39,
                            type: 'linear',
                            display: true,
                            position: 'left',
                        },
                        y1: {
                            type: 'linear',
                            display: true,
                            position: 'right',
                            // grid line settings
                            grid: {
                                drawOnChartArea: false, // only want the grid lines for one axis to show up
                            },
                        },
                    }
                  }
              });
          });
        });
    </script>
@endpush

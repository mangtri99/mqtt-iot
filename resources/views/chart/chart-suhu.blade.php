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
            <div class="chart">
                <!-- Chart wrapper -->
                <canvas height="600" width="600" id="chart-suhu" class="chart-canvas"></canvas>
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
                          data: suhu
                      }]
                  },
                options: {
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
                            ticks: {
                                max: 40,
                                min: 30,
                                stepSize: 2
                                // suggestedMin: 30,
                            },
                            display: true,
                            scaleLabel: {
                                display: true,
                                labelString: 'Celcius'
                            },

                        }]
                    }
                  }
              });
          });
        });
    </script>
@endpush

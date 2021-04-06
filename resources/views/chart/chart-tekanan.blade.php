<div class="{{(request()->is('riwayat-tekanan')) ? 'col' : ''}}">
    <div class="card bg-white">
        <div class="card-header bg-transparent">
            <div class="row align-items-center">
                <div class="col">
                <h5 class="text-muted text-uppercase ls-1 mb-2">Grafik Tekanan Darah</h5>
                <h5 class="text-muted mb-0">Riwayat 10 Pengukuran Terakhir</h5>
                </div>
                <div class="col">
                </div>
            </div>
            </div>
        <div class="card-body">
            <div class="chart">
                <!-- Chart wrapper -->
                <canvas height="600" width="500" id="chart-tensi" class="chart-canvas"></canvas>
            </div>
        </div>
    </div>
</div>
@push('js')
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.min.js"></script>
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.extension.js"></script>
    <script>
        var id_user = $('#user_id').val();
        var url3 = "{{url('chart-tensi')}}" + "/" + id_user;
        var sistole = new Array();
        var diastole = new Array();
        var tanggal3 = new Array();
        $(document).ready(function(){
          $.get(url3, function(response){
            response.forEach(function(data){
                sistole.push(data.sistole);
                diastole.push(data.diastole);
                var date = new Date(data.created_at);
                var day = date.getDate();
                var month = date.getMonth()+1;
                var year = date.getFullYear();
                var fullDate = day+"/"+month+"/"+year
                tanggal3.push(fullDate);
            });
            var ctx3 = document.getElementById("chart-tensi").getContext('2d');
                var myChart3 = new Chart(ctx3, {
                  type: 'line',
                  data: {
                      labels:tanggal3,
                      datasets: [{
                          label: 'Sistole',
                            fill:false,
                          data: sistole,
                          borderColor: '#ed3326',
                          backgroundColor: '#ed3326'
                      },{
                          label: 'Diastole',
                            fill:false,
                          data: diastole,
                          borderColor: '#3eed26',
                          backgroundColor: '#3eed26'
                      }]
                  },
                  options: {
                      legend: {
                        display: true,
                        align: 'start',
                        position: 'bottom',
                        labels: {
                            boxWidth: 20,
                        }
                    },
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
                                labelString: 'mmHg'
                            },
                            ticks: {
                                min: 50,
                                max: 150,
                                stepSize: 15,
                            }
                        }]
                    }
                  }
              });
          });
        });
    </script>
@endpush

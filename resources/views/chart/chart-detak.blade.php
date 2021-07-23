<div class="{{(request()->is('riwayat-detak')) ? 'col' : ''}}">
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
                <canvas height="600" width="500" id="chart-detak" class="chart-canvas"></canvas>
            </div>
        </div>
    </div>
</div>

@push('js')

<script>
        var id_user = $('#user_id').val();
        var url2 = "{{url('chart-detak')}}" + "/" + id_user;
        var bpm = new Array();
        var oksigen = new Array();
        var tanggal2 = new Array();
        $(document).ready(function(){
          $.get(url2, function(response){

            response.forEach(function(data){
                bpm.push(data.bpm);
                oksigen.push(data.oksigen);
                var date = new Date(data.created_at);
                var day = date.getDate();
                console.log(date)
                var month = date.getMonth()+1;
                var year = date.getFullYear();
                var fullDate = day+"/"+month+"/"+year
                tanggal2.push(fullDate);
            });
            var ctx2 = document.getElementById("chart-detak").getContext('2d');
                var myChart2 = new Chart(ctx2, {
                  type: 'line',
                  data: {
                      labels:tanggal2,
                      datasets: [{
                          label: 'BPM',
                            fill:false,
                          data: bpm,
                          borderColor: '#f41212',
                          backgroundColor: '#f41212',
                      },{
                          label: 'SpO2',
                            fill:false,
                          data: oksigen,
                          borderColor: '#6694e7',
                          backgroundColor: '#6694e7'
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
                                labelString: 'Value'
                            },
                            ticks: {
                                min: 40,
                                max: 150,
                                stepSize: 30
                            }
                        }]
                    }
                  }
              });
          });
        });
    </script>
@endpush

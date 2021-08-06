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
            {{-- <div class="chart"> --}}
                <!-- Chart wrapper -->
                <canvas height="300" width="500" id="chart-detak" class=""></canvas>
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
                                    yMin: 100,
                                    yMax: 100,
                                    borderColor: 'rgb(255, 99, 132)',
                                    borderWidth: 4,
                                    label: {
                                        color: '#a88d32',
                                        content: 'Batas atas BPM!',
                                        position: 'end',
                                        enabled: true
                                    }
                                },
                                // line2: {
                                //     type: 'line',
                                //     yMin: 95,
                                //     yMax: 95,
                                //     borderColor: 'rgb(168, 164, 50)',
                                //     borderWidth: 4,
                                //     label: {
                                //         color: '#a88d32',
                                //         content: 'Batas bawah SpO2!',
                                //         position: 'end',
                                //         enabled: true
                                //     }
                                // }
                            }
                        },
                        title: {
                            display: true,
                            text: 'Chart Detak Jantung dan Saturasi Oksigen'
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
                                text: 'BPM',
                                color: '#a83e32',
                                font: {
                                    size: 14,
                                    weight: 'bold',
                                    lineHeight: 1.2,
                                },
                            },
                            min: 50,
                            max: 120,
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

                //   options: {
                //     responsive: true,
                //     // plugins: {
                //     //     autocolors: false,
                //     //     annotation: {
                //     //         annotations: {
                //     //             line1: {
                //     //             type: 'line',
                //     //             yMin: 80,
                //     //             yMax: 80,
                //     //             borderColor: 'rgb(255, 99, 132)',
                //     //             borderWidth: 2,
                //     //             }
                //     //         }
                //     //     }
                //     // },
                //     legend: {
                //         display: true,
                //         align: 'start',
                //         position: 'bottom',
                //         labels: {
                //             boxWidth: 20,
                //         }
                //     },
                //     //  responsive: true,
                //     title: {
                //         display: true,
                //         text: 'Chart'
                //     },
                //     tooltips: {
                //         mode: 'index',
                //         intersect: false,
                //     },
                //     hover: {
                //         mode: 'nearest',
                //         intersect: true
                //     },
                //     scales: {
                //         xAxes: [{
                //             display: true,
                //             scaleLabel: {
                //                 display: true,
                //                 labelString: 'Tanggal Pemeriksaan'
                //             }
                //         }],
                //         yAxes: [{
                //             display: true,
                //             scaleLabel: {
                //                 display: true,
                //                 labelString: 'Value'
                //             },
                //             // ticks: {
                //             //     min: 40,
                //             //     max: 150,
                //             //     stepSize: 30
                //             // }
                //         }]
                //     }
                //   }
              });
          });
        });
    </script>
@endpush

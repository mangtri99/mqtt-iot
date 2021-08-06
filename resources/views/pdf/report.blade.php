<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="noindex">

    <title>Report</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <style>
        .text-right {
            text-align: right;
        }
        .tabel-row {
            border: 1px solid #adabab;
        }

        .page-break {
            page-break-after: always;
        }

    </style>

</head>
<body class="login-page" style="background: white">
    <div>
        <div class="row" style="justify-items: center; ">
            <div class="col-xs-1"></div>
            <div class="col-xs-1" style="margin-top: 20px" style="align-items: center">
            <img style="align-items: center" width="80px" src="https://upload.wikimedia.org/wikipedia/id/2/2d/Logo-unud-baru.png" alt="logo">
            </div>
            <div class="col-xs-7" style="font-size: 10pt; text-align: center;">
                <h2 style="font-size: 16pt;">Rumah Sakit Universitas Udayana</h2>
                Jl. Raya Kampus Unud, Jimbaran, Bali 80233<br>
                Telp. 081330092930 Fax. (0361) 21520<br>
                Website : www.rsunud.com Email : rsunud@unud.ac.id<br>
                <br>
            </div>
        </div>
        <hr>

        {{-- <div style="margin-bottom: 0px">&nbsp;</div> --}}

        <div class="row" style="margin-bottom: 10px">
            <div class="col-xs-5">

                <h4>Yth.</h4>
                <p style="margin-bottom: 0px">{{$user_export->name}}</p>
                <p style="margin-bottom: 0px">{{\Carbon\Carbon::parse($user_export->tanggal_lahir)->isoFormat('D, MMMM Y')}} / {{$user_export->usia}} Thn</p>
                <p style="margin-bottom: 0px">
                    {{$user_export->jenis_kelamin}}
                </p>
                <p style="margin-bottom: 0px">
                    {{$user_export->alamat}}
                </p>
            </div>

            <div class="col-xs-6">
                <p class="text-right"><strong> Tanggal Laporan: </strong>{{\Carbon\Carbon::now()->isoFormat('D MMMM Y')}}</p>
                {{-- <table style="width: 100%">
                    <tbody>
                        <tr>
                            <td class="text-right"></td>
                        </tr>
                    </tbody>
                </table> --}}

                <div style="margin-bottom: 0px">&nbsp;</div>

                {{-- <table style="width: 100%; margin-bottom: 20px">
                    <tbody>
                        <tr class="well" style="padding: 5px">
                            <th style="padding: 5px"><div> Balance Due (CAD) </div></th>
                            <td style="padding: 5px" class="text-right"><strong> $600 </strong></td>
                        </tr>
                    </tbody>
                </table> --}}
            </div>
        </div>
        <div style="margin-bottom: 10px"></div>
        <h4>A. &nbsp; Hasil Kesehatan Terakhir</h4>
        <table class="table table-bordered">
            <thead style="background-color: #F5F5F5">
                <tr>
                    <th>No</th>
                    <th>Data</th>
                    <th>Hasil</th>
                    <th>Keterangan</th>
                </tr>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>Suhu Tubuh</td>
                        <td>{{$last_suhu->suhu}}</td>
                        @if ($last_suhu->suhu > 37)
                            <td>Tinggi</td>
                        @elseif($last_suhu->suhu < 36)
                            <td>Rendah</td>
                        @else
                            <td>Normal</td>
                        @endif
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>Detak Jantung</td>
                        <td>{{$last_detak->bpm}}</td>
                        <td>{{$last_detak->detak_status}}</td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>Saturasi Oksigen</td>
                        <td>{{$last_detak->oksigen}}</td>
                        @if($last_detak->oksigen < 95)
                            <td>Rendah</td>
                        @else
                            <td>Normal</td>
                        @endif
                    </tr>
                    <tr>
                        <td>4</td>
                        <td>Tekanan Darah</td>
                        <td>{{$last_tekanan->sistole}}/{{$last_tekanan->diastole}}</td>
                        <td>{{$last_tekanan->tekanan_status}}</td>
                    </tr>
                </tbody>
            </thead>
        </table>
        <h4>B. &nbsp; Rangkuman Riwayat Kesehatan </h4>

        <table class="table table-bordered">
            <thead style="background-color: #F5F5F5">
                <tr>
                    <th>No</th>
                    <th>Data</th>
                    <th>Tertinggi</th>
                    <th>Terendah</th>
                    <th>Rata-rata</th>
                </tr>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>Suhu Tubuh</td>
                        <td>{{$suhu_tinggi->suhu}} &deg;C</td>
                        <td>{{$suhu_rendah->suhu}} &deg;C</td>
                        <td>{{number_format((float) $suhu_rata2, 2)}} &deg;C</td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>Detak Jantung</td>
                        <td>{{$detak_tinggi->bpm}} bpm</td>
                        <td>{{$detak_rendah->bpm}} bpm</td>
                        <td>{{number_format((float) $detak_rata2, 2)}} bpm</td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>Kadar Oksigen</td>
                        <td>{{$oksigen_tinggi->oksigen}} %</td>
                        <td>{{$oksigen_rendah->oksigen}} %</td>
                        <td>{{number_format((float) $oksigen_rata2, 2)}} %</td>
                    </tr>
                    <tr>
                        <td>4</td>
                        <td>Tekanan Darah</td>
                        <td>{{$tekanan_tinggi->sistole}}/{{$tekanan_tinggi->diastole}} mmHg</td>
                        <td>{{$tekanan_rendah->sistole}}/{{$tekanan_rendah->diastole}} mmHg</td>
                        <td>{{number_format((int) $tekanan_rata2_sistole)}}/{{number_format((float) $tekanan_rata2_diastole)}} mmHg</td>
                    </tr>
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="4">
                            <h5 class="font-weight-bold text-right"><strong> Jumlah Pengukuran yang dilakukan </strong></h5>
                        </td>
                        <td class="font-weight-bold"><h5> <strong>{{$total_pengukuran}}</strong></h5></td>
                    </tr>
                </tfoot>
            </thead>
        </table>
        <h4>C. &nbsp; Rincian Riwayat Pengukuran </h4>
        <p> &nbsp; Berikut rincian 10 data pengukuran terakhir yang dilakukan </p>

        <table class="table table-bordered">
            <thead style="background-color: #F5F5F5">
                <tr>
                    <th>No</th>
                    <th>Tanggal Periksa</th>
                    <th>Suhu Tubuh</th>
                    <th>Detak Jantung</th>
                    <th>Kadar Oksigen (SpO2)</th>
                    <th>Tekanan Darah</th>
                </tr>
            </thead>
            <tbody>
                @if($total_pengukuran > 10)
                    @for($i = 0; $i < 10; $i++)
                    <tr>
                        <td>{{$i+1}}</td>
                        <td>{{ $data_rangkum[0]->suhu[$i]->created_at->format("d-m-Y - H:i") }}</td>
                        <td>{{ $data_rangkum[0]->suhu[$i]->suhu }} &deg;C</td>
                        <td>{{ $data_rangkum[0]->detak[$i]->bpm }} bpm</td>
                        <td>{{ $data_rangkum[0]->detak[$i]->oksigen }} %</td>
                        <td>{{ $data_rangkum[0]->tekanan_darah[$i]->sistole}}/{{$data_rangkum[0]->tekanan_darah[$i]->diastole }} mmHg</td>
                    </tr>
                    @endfor
                @else
                    @for($i = 0; $i < $total_pengukuran; $i++)
                    <tr>
                        <td>{{$i+1}}</td>
                        <td>{{ $data_rangkum[0]->suhu[$i]->created_at->format("d-m-Y - H:i") }}</td>
                        <td>{{ $data_rangkum[0]->suhu[$i]->suhu }} &deg;C</td>
                        <td>{{ $data_rangkum[0]->detak[$i]->bpm }} bpm</td>
                        <td>{{ $data_rangkum[0]->detak[$i]->oksigen }} %</td>
                        <td>{{ $data_rangkum[0]->tekanan_darah[$i]->sistole}}/{{$data_rangkum[0]->tekanan_darah[$i]->diastole }} mmHg</td>
                    </tr>
                    @endfor
                @endif
            </tbody>
        </table>
            <div style="margin-bottom: 0px">&nbsp;</div>
        </div>
        <div style="display: flex; justify-content: flex-end;">
            <div class="col-xs-6"></div>
            <div class="col-xs-5" style="margin-bottom: 10px">
                <div class="text-right">
                    <p>Keterangan</p>
                    <table class="table table-bordered" style="width: 100%; font-size: 8pt;">
                        <thead>
                            <tr style="background-color: #F5F5F5">
                                <th>Objek</th>
                                <th>Rendah</th>
                                <th>Normal</th>
                                <th>Tinggi</th>
                            </tr>
                        </thead>
                            <tbody>
                                <tr>
                                    <td>Suhu Tubuh </td>
                                    <td> <p style="margin-bottom: 0px"> Kurang dari 36 &deg;C  </p> </td>
                                    <td> 36 &deg;C - 37.2 &deg;C </td>
                                    <td> Lebih dari 37.2 &deg;C </td>
                                </tr>
                                <tr>
                                    <td> Detak Jantung </td>
                                    <td>
                                        Kurang dari 60 bpm
                                    </td>
                                    <td> 60 - 100 bpm </td>
                                    <td> Lebih dari 100 bpm </td>
                                </tr>
                                <tr>
                                    <td> Saturasi Oksigen </td>
                                    <td> Kurang dari 95% </td>
                                    <td> 95 - 100% </td>
                                    <td> Lebih dari 100% </td>
                                </tr>
                                <tr>
                                    <td> Tekanan Darah </td>
                                    <td> Kurang dari 90/60 mmHg </td>
                                    <td> 120-139/60-90 mmHg </td>
                                    <td> Lebih dari 140/90 mmHg </td>
                                </tr>
                            </tbody>
                    </table>
                </div>
            </div>
        </div>
    </body>
    </html>

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
            <div class="col-xs-6">
                <h4>Yth.</h4>
                <table>
                    <tr>
                        <td>{{auth()->user()->name}}</td>
                    </tr>
                    <tr>
                        <td>{{\Carbon\Carbon::parse(auth()->user()->tanggal_lahir)->isoFormat('d, MMMM Y')}} / {{Auth::user()->usia}} Thn</td>
                    </tr>
                    <tr>
                        <td>{{auth()->user()->jenis_kelamin}}</td>
                    </tr>
                    <tr>
                        <td>{{auth()->user()->alamat}}</td>
                    </tr>
                    <tr>
                        <td></td>
                    </tr>
                </table>
            </div>

            <div class="col-xs-5">
                <table style="width: 100%">
                    <tbody>
                        <tr>
                            <td class="text-right"><strong> Tanggal Laporan: </strong>{{\Carbon\Carbon::now()->isoFormat('D MMMM Y')}}</td>
                        </tr>
                    </tbody>
                </table>

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
                    {{-- <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$data->created_at->format("d-m-Y - H:i")}}</td>
                        <td>{{$data->suhu->suhu}} &deg;C</td>
                        <td>{{$data[0]->detak->bpm}} bpm</td>
                        <td>{{$data[0]->detak->oksigen}} %</td>
                        <td>{{$data[0]->tekanan_darah->sistole}}/{{$data->tekanan_darah->sistole}} mmHg</td>
                    </tr> --}}

            </tbody>
        </table>
        {{-- <div class="page-break"></div>
        <h4>C. &nbsp; Lampiran Rincian Riwayat Pengukuran</h4>
        <h4 class="text-center" style="margin-bottom: 20px;">10 Data Suhu Tubuh Terakhir</h4>
        <table class="table table-bordered">
            <thead style="background: #F5F5F5;">
                <tr>
                    <th>No</th>
                    <th>Suhu</th>
                    <th>Keterangan</th>
                    <th>Tanggal Periksa</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data_suhu as $suhu)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$suhu->suhu}} &deg;C</td>
                    @if ($suhu->suhu > 37)
                        <td>Tinggi</td>
                    @elseif($suhu->suhu < 35)
                        <td>Rendah</td>
                    @else
                        <td>Normal</td>
                    @endif
                    <td>{{$suhu->created_at->format("d-m-Y - H:i")}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div style="margin-bottom: 10px"></div>
        <h4 class="text-center" style="margin-bottom: 20px;">10 Data Detak Jantung dan Kadar Oksigen Terakhir</h4>
        <table class="table table-bordered">
            <thead style="background: #F5F5F5;">
                <tr>
                    <th>No</th>
                    <th>Detak Jantung</th>
                    <th>Kadar Oksigen</th>
                    <th>Keterangan Detak Jantung</th>
                    <th>Keterangan Kadar Oksigen</th>
                    <th>Tanggal Periksa</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data_detak as $detak)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$detak->bpm}} bpm</td>
                    <td>{{$detak->oksigen}} %</td>
                    <td>{{$detak->detak_status}}</td>
                    <td>
                        @if($detak->oksigen < 90)
                            Rendah
                        @elseif(($detak->oksigen > 90) && ($detak->oksigen < 100))
                            Normal
                        @else
                            Tinggi
                        @endif
                    </td>
                    <td>{{$detak->created_at->format("d-m-Y - H:i")}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div style="margin-bottom: 10px"></div>
        <h4 class="text-center" style="margin-bottom: 20px;">10 Data Tekanan Darah Terakhir</h4>
        <table class="table table-bordered" >
            <thead style="background: #F5F5F5;">
                <tr>
                    <th>No</th>
                    <th>Sistole</th>
                    <th>Keterangan</th>
                    <th>Tanggal Periksa</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data_tekanan as $tekanan)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$tekanan->sistole}} / {{$tekanan->diastole}} mmHg</td>
                    <td>{{$tekanan->tekanan_status}}</td>
                    <td>{{$tekanan->created_at->format("d-m-Y - H:i")}}</td>
                </tr>
                @endforeach
            </tbody>
        </table> --}}

            {{-- <div class="row">
                <div class="col-xs-6"></div>
                <div class="col-xs-5">
                    <table style="width: 100%">
                        <tbody>
                            <tr class="well" style="padding: 5px">
                                <th style="padding: 5px"><div> Balance Due (CAD) </div></th>
                                <td style="padding: 5px" class="text-right"><strong> $600 </strong></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div> --}}

            <div style="margin-bottom: 0px">&nbsp;</div>

            {{-- <div class="row">
                <div class="col-xs-8 invbody-terms">
                    Thank you for your business. <br>
                    <br>
                    <h4>Payment Terms</h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad eius quia, aut doloremque, voluptatibus quam ipsa sit sed enim nam dicta. Soluta eaque rem necessitatibus commodi, autem facilis iusto impedit!</p>
                </div>
            </div> --}}
        </div>

    </body>
    </html>

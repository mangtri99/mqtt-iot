<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <style>
            table{
                border-collapse: collapse;
            }
            td, th {
                border: 1px solid #dddddd;
                padding: 8px;
            }
            .header-pdf{
                display: flex;
                justify-content: center;
                align-items: center;
            }
            .header-judul{
                margin-bottom: 0px;
                margin-top: 0px;
                text-align: center;
                font-size: 14pt;

            }
            .judul{
                text-align: left;
                height: 50px;
                font-size: 16pt;
                margin-block-end:
            }

        </style>


    <body>
        <div>
            <div class="header-pdf">
                <img width="80px" src="https://upload.wikimedia.org/wikipedia/id/2/2d/Logo-unud-baru.png" alt="logo">
                <div style="align-items: center;">
                    <h1 style="text-align: center;">Rumah Sakit Universitas Udyana</h1>
                    <p class="header-judul">Jalan Raya Kampus Unud, Bukit Jimbaran 80811 Bali</p>
                    <p class="header-judul">Telp. 081330092930 Fax. (0361) 21520</p>
                    <p class="header-judul">Website : www.rsunud.com Email : rsunud@unud.ac.id</p>
                </div>
            </div>
            <hr style="margin-top: -10px;">
            <div>
                <h3 style="text-align: center;">Riwayat Pengukuran Alat Monitoring Kesehatan IoT</h3>
            </div>
            <div style="margin-top: 20px;">
                <table style="width: 100%" style="border-collapse: collapse;">
                    <thead style="background-color: rgb(152, 167, 236)">
                    <tr class="judul">
                        <th scope="col" data-sort="name">No</th>
                        <th scope="col" data-sort="budget">Suhu</th>
                        <th scope="col" data-sort="status">Keterangan</th>
                        <th scope="col" data-sort="status">Tanggal Periksa</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($data_suhu as $suhu)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$suhu->suhu}}</td>
                            @if ($suhu->suhu > 37)
                                <td>Tinggi</td>
                            @else
                                <td>Normal</td>
                            @endif

                            <td>{{$suhu->created_at->format("d-m-Y")}}</td>
                        </tr>
                    @endforeach
                    </tbody>

                </table>
                </div>
        </div>

    </body>
</html>

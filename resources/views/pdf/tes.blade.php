<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!-- Icons -->
        <link href="assets/vendor/nucleo/css/nucleo.css" rel="stylesheet">
        <link href="assets/vendor/@fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet">
        <!-- Argon CSS -->
        <link type="text/css" href="assets/css/argon.css?v=1.0.0" rel="stylesheet">
        <style>
            .header-judul{
                margin-bottom: 0px;
                margin-top: 0px;
                text-align: center;
                font-size: 12pt;

            }
        </style>
    </head>
    <body style="background-color: white;">
        <div style="display: flex" class="justify-content-center align-items-center">
            <img style="marin-left: 20px" width="100px" height="100px" src="https://upload.wikimedia.org/wikipedia/id/2/2d/Logo-unud-baru.png" alt="logo">
            <div>
                <h1 style="text-align: center;" >Rumah Sakit Universitas Udyana</h1>
                <p class="header-judul">Jalan Raya Kampus Unud, Bukit Jimbaran 80811 Bali</p>
                <p class="header-judul">Telp. 081330092930 Fax. (0361) 21520</p>
                <p class="header-judul">Website : www.rsunud.com Email : rsunud@unud.ac.id</p>
            </div>
        </div>
        <hr>
    <!-- Light table -->
        <div class="px-4 py-3">
        <table class="table align-items-center mt-3" id="tabel-suhu">
            <thead class="thead-light">
                <tr>
                    <th scope="col" class="sort" data-sort="name">No</th>
                    <th scope="col" class="sort" data-sort="budget">Suhu</th>
                    <th scope="col" class="sort" data-sort="status">Keterangan</th>
                    <th scope="col" class="sort" data-sort="status">Tanggal Periksa</th>
                </tr>
            </thead>
            <tbody class="list">
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
    </body>
</html>

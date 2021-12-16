<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <div>
        <p>Anda baru saja melakukan pengukuran dengan alat monitoring kesehatan berbasis IOT, pada tanggal: {{$user['date']->format('d-m-Y')}}, pukul: {{$user['date']->format('H:i')}}</p>
        <p>Berikut hasil pengukuran kesehatan anda : </p>
        <ul>
            <li style="margin-bottom: 10px;">Suhu Tubuh &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : {{$user['suhu']}} C |
                @if ($user['status_suhu'] == 'Tinggi')
                    <strong style="background-color: red; color: white;">
                        {{$user['status_suhu']}}
                    </strong>
                @elseif($user['status_suhu'] == 'Rendah')
                    <strong style="background-color: blue; color: white;">
                        {{$user['status_suhu']}}
                    </strong>
                @else
                    <strong style="background-color: green; color: white;">
                        {{$user['status_suhu']}}
                    </strong>
                @endif
            </li>
            <li style="margin-bottom: 10px;">Detak Jantung &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : {{$user['bpm']}} bpm |
                @if ($user['status_bpm'] == 'Tinggi')
                    <strong style="background-color: red; color: white;">
                        {{$user['status_bpm']}}
                    </strong>
                @elseif($user['status_bpm'] == 'Rendah')
                    <strong style="background-color: blue; color: white;">
                        {{$user['status_bpm']}}
                    </strong>
                @else
                    <strong style="background-color: green; color: white;">
                        {{$user['status_bpm']}}
                    </strong>
                @endif
            </li>
            <li style="margin-bottom: 10px;">Saturasi Oksigen &nbsp; : {{$user['spo2']}} % |
                @if ($user['status_spo2'] == 'Tinggi')
                    <strong style="background-color: red; color: white;">
                        {{$user['status_spo2']}}
                    </strong>
                @elseif($user['status_spo2'] == 'Rendah')
                    <strong style="background-color: blue; color: white;">
                        {{$user['status_spo2']}}
                    </strong>
                @else
                    <strong style="background-color: green; color: white;">
                        {{$user['status_spo2']}}
                    </strong>
                @endif
            </li>
            <li style="margin-bottom: 10px;">Tekanan Darah &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: {{$user['sistole']}}/{{$user['diastole']}} |
                @if ($user['status_tekanan'] == 'Tinggi')
                    <strong style="background-color: red; color: white;">
                        {{$user['status_tekanan']}}
                    </strong>
                @elseif($user['status_tekanan'] == 'Rendah')
                    <strong style="background-color: blue; color: white;">
                        {{$user['status_tekanan']}}
                    </strong>
                @else
                    <strong style="background-color: green; color: white;">
                        {{$user['status_tekanan']}}
                    </strong>
                @endif
            </li>
        </ul>
        <p>Jaga kesehatan anda dengan melakukan check kesehatan secara rutin. Lihat Riwayat Kesehatan Anda di <a href="http://health.bengkel-kuy.com">sini</a> </p>
        <br>
        <a href="http://health.bengkel-kuy.com">http://health.bengkel-kuy.com</a>
    </div>
</body>
</html>

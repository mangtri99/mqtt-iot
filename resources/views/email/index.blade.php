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
            <li style="margin-bottom: 10px;">Suhu Tubuh &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : <strong>{{$user['suhu']}} &deg;C</strong> |
                @if ($user['status_suhu'] == 'Tinggi')
                    <strong style="background-color: red; color: white; padding: 2px 2px;">
                        {{$user['status_suhu']}}
                    </strong>
                @elseif($user['status_suhu'] == 'Rendah')
                    <strong style="background-color: blue; color: white; padding: 2px 2px;">
                        {{$user['status_suhu']}}
                    </strong>
                @else
                    <strong style="background-color: green; color: white; padding: 2px 2px;">
                        {{$user['status_suhu']}}
                    </strong>
                @endif
            </li>
            <li style="margin-bottom: 10px;">Detak Jantung &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : <strong>{{$user['bpm']}} bpm</strong> |
                @if ($user['status_bpm'] == 'Tinggi')
                    <strong style="background-color: red; color: white; padding: 2px 2px;">
                        {{$user['status_bpm']}}
                    </strong>
                @elseif($user['status_bpm'] == 'Rendah')
                    <strong style="background-color: blue; color: white; padding: 2px 2px;">
                        {{$user['status_bpm']}}
                    </strong>
                @else
                    <strong style="background-color: green; color: white; padding: 2px 2px;">
                        {{$user['status_bpm']}}
                    </strong>
                @endif
            </li>
            <li style="margin-bottom: 10px;">Saturasi Oksigen &nbsp; : <strong>{{$user['spo2']}} % </strong>|
                @if ($user['status_spo2'] == 'Tinggi')
                    <strong style="background-color: red; color: white; padding: 2px 2px;">
                        {{$user['status_spo2']}}
                    </strong>
                @elseif($user['status_spo2'] == 'Rendah')
                    <strong style="background-color: blue; color: white; padding: 2px 2px;">
                        {{$user['status_spo2']}}
                    </strong>
                @else
                    <strong style="background-color: green; color: white; padding: 2px 2px;">
                        {{$user['status_spo2']}}
                    </strong>
                @endif
            </li>
            <li style="margin-bottom: 10px;">Tekanan Darah &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <strong>{{$user['sistole']}}/{{$user['diastole']}} mmHg</strong> |
                @if ($user['status_tekanan'] == 'Tinggi')
                    <strong style="background-color: red; color: white; padding: 2px 2px;">
                        {{$user['status_tekanan']}}
                    </strong>
                @elseif($user['status_tekanan'] == 'Rendah')
                    <strong style="background-color: blue; color: white; padding: 2px 2px;">
                        {{$user['status_tekanan']}}
                    </strong>
                @else
                    <strong style="background-color: green; color: white; padding: 2px 2px;">
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

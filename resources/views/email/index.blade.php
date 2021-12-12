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
        <p>Anda baru saja melakukan pengukuran dengan alat monitoring kesehatan berbasis IOT, pada tanggal {{$user['date']}}, pukul : {{$user['date']}}</p>
        <p>Berikut hasil pengukuran kesehatan anda</p>
        <ul>
            <li>Suhu Tubuh &nbsp;: {{$user['suhu']}} C | Normal </li>
            <li>Detak Jantung &nbsp;: {{$user['bpm']}} bpm | Normal </li>
            <li>Saturasi Oksigen &nbsp; : {{$user['spo2']}} % | Normal </li>
            <li>Tekanan Darah &nbsp; : {{$user['sistole']}}/{{$user['diastole']}} | Normal </li>
        </ul>
        <p>Cek Riwayat Kesehatan Anda di sini </p>
        <br>
        <a href="http://health.bengkel-kuy.com">http://health.bengkel-kuy.com</a>
    </div>
</body>
</html>

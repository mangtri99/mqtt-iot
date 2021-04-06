@extends('layouts.app', ['titlePage' => __('Dashboard User')])

@section('content')
    <div class="header bg-gradient-primary pb-8 pt-5 pt-md-8">
        <div class="container-fluid">
            <div class="header-body">
                @if ($message = Session::get('error'))
                    <div class="alert alert-success alert-block">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        <strong>{{ $message }}</strong>
                    </div>
                @endif
                <h2 class="font-weight-bold text-white mb-3">Riwayat Kesehatan Terakhir</h2>
                <h4 class="font-weight-bold text-white mb-3">Update Terakhir,
                    @if (isset($suhu->created_at))
                        {{$suhu->created_at->isoFormat('D MMMM Y - H:m ')}}
                    @else
                        (Anda belum pernah melakukan pengukuran)
                    @endif
                </h4>
                <div class="row justify-content-end mb-4 mr-1">
                    <a class="btn btn-default" href="{{route('export.suhu', auth()->user()->id)}}">

                            <i class="fas fa-file-pdf text-white"></i>
                            Export Laporan Kesehatan

                    </a>
                </div>
                <!-- Card stats -->
                <div class="row">
                    <div class="col-xl-3 col-lg-6">
                        <div class="card card-stats mb-4 mb-xl-0">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col" style="padding-right: 30px;">
                                        <h5 class="card-title text-uppercase text-muted mb-0">Suhu Tubuh
                                        </h5>
                                        <span class="h2 font-weight-bold mb-0">
                                            @if (isset($suhu->suhu))
                                                {{$suhu->suhu}}
                                            @else
                                                -
                                            @endif
                                        </span>
                                    </div>
                                    <div class="col-auto">
                                        <div class="icon icon-shape bg-info text-white rounded-circle shadow">
                                            <i class="fas fa-thermometer-three-quarters"></i>
                                        </div>
                                    </div>
                                </div>
                                <p class="mt-3 mb-0 text-muted text-sm">
                                    <span class="text-success mr-2">
                                    @if (isset($suhu->suhu))
                                        @if ($suhu->suhu >= 37)
                                            <i class="fas fa-arrow-up"></i>
                                            Tinggi
                                        @elseif($suhu->suhu < 37)
                                            <i class="fas fa-arrow-up"></i>
                                            Rendah
                                        @else
                                            <i class="fas fa-minus"></i>
                                            Normal
                                        @endif
                                    @else
                                        <i class="fas fa-arrow-up"></i>
                                        No Data
                                    @endif
                                    </span>
                                    <span class="text-nowrap">
                                        @if (isset($suhu->created_at))
                                            {{$suhu->created_at->format("d-m-Y")}}
                                        @else
                                            -
                                        @endif
                                    </span>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-6">
                        <div class="card card-stats mb-4 mb-xl-0">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <h5 class="card-title text-uppercase text-muted mb-0">Detak Jantung</h5>
                                        <span class="h2 font-weight-bold mb-0">
                                            @if (isset($detak->bpm))
                                                {{$detak->bpm}}
                                            @else
                                                -
                                            @endif
                                        </span>
                                    </div>
                                    <div class="col-auto">
                                        <div class="icon icon-shape bg-warning text-white rounded-circle shadow">
                                            <i class="fas fa-heartbeat"></i>
                                        </div>
                                    </div>
                                </div>
                                <p class="mt-3 mb-0 text-muted text-sm">
                                    <span class="text-success mr-2">
                                    @if (isset($detak->bpm))
                                        @if (($detak->bpm < 70) && (Auth::user()->usia < 10))
                                            <i class="fas fa-arrow-down"></i>
                                            Rendah
                                        @elseif(($detak->bpm > 70) && ($detak->bpm < 120) && (Auth::user()->usia < 10))
                                            <i class="fas fa-minus"></i>
                                            Normal
                                        @elseif(($detak->bpm > 120) && (Auth::user()->usia < 10)))
                                            <i class="fas fa-arrow-up"></i>
                                            Tinggi
                                        @elseif(($detak->bpm < 60 ) && (Auth::user()->usia > 10))
                                            <i class="fas fa-arrow-down"></i>
                                            Rendah
                                        @elseif(($detak->bpm > 60) && ($detak->bpm < 100) && (Auth::user()->usia > 10))
                                            <i class="fas fa-minus"></i>
                                            Normal

                                        @else
                                            <i class="fas fa-arrow-up"></i>
                                            Tinggi
                                        @endif
                                    @else
                                        <i class="fas fa-minus"></i>
                                            No Data
                                    @endif
                                    </span>
                                    <span class="text-nowrap">
                                        @if (isset($detak->created_at))
                                            {{$detak->created_at->format("d-m-Y")}}
                                        @else
                                            -
                                        @endif
                                    </span>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-6">
                        <div class="card card-stats mb-4 mb-xl-0">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col" style="padding-right: 0px">
                                        <h5 class="card-title text-uppercase text-muted mb-0">Saturasi Oksigen</h5>
                                        <span class="h2 font-weight-bold mb-0">
                                            @if (isset($detak->oksigen))
                                                {{$detak->oksigen}}
                                            @else
                                                -
                                            @endif
                                        </span>
                                    </div>
                                    <div class="col-auto" style="padding-left: 0px">
                                        <div class="icon icon-shape bg-yellow text-white rounded-circle shadow">
                                            <i class="fas fa-atom"></i>
                                        </div>
                                    </div>
                                </div>
                                <p class="mt-3 mb-0 text-muted text-sm">
                                    <span class="text-success mr-2">
                                        @if (isset($detak->oksigen))
                                            @if($detak->oksigen < 90)
                                                <i class="fas fa-arrow-down"></i>
                                            @elseif(($detak->oksigen > 90) && ($detak->oksigen < 100))
                                                <i class="fas fa-minus"></i>
                                                Normal
                                            @else
                                                <i class="fas fa-arrow-up"></i>
                                                Tinggi
                                            @endif
                                        @else
                                            <i class="fas fa-minus"></i>
                                                No Data
                                        @endif
                                    </span>
                                    <span class="text-wrap">
                                        @if (isset($detak->created_at))
                                            {{$detak->created_at->format("d-m-Y")}}
                                        @else
                                            -
                                        @endif
                                    </span>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-6">
                        <div class="card card-stats mb-4 mb-xl-0">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col" style="padding-right: 10px;">
                                        <h5 class="card-title text-uppercase text-muted mb-0">Tekanan Darah</h5>
                                    <span class="h2 font-weight-bold mb-0">
                                        @if (isset($tekananDarah->sistole))
                                            {{$tekananDarah->sistole}} / {{$tekananDarah->diastole}}
                                        @else
                                            -
                                        @endif
                                    </span>
                                    </div>
                                    <div class="col-auto">
                                        <div class="icon icon-shape bg-danger text-white rounded-circle shadow">
                                            <i class="fas fa-tint"></i>
                                        </div>
                                    </div>
                                </div>
                                <p class="mt-3 mb-0 text-muted text-sm">
                                    <span class="text-success mr-2">
                                        @if (isset($tekananDarah))
                                             <i class="fas fa-minus"></i>
                                            {{$tekananDarah->tekanan_status}}
                                        @else
                                            <i class="fas fa-minus"></i>
                                            No Data
                                        @endif
                                    </span>
                                    <span class="text-nowrap">
                                        @if (isset($tekananDarah->created_at))
                                            {{$tekananDarah->created_at->format("d-m-Y")}}
                                        @else
                                            -
                                        @endif
                                    </span>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid mt--7">
        <div class="row mt-5">
            <div class="col-lg-5">
                <div class="card shadow">
                    <div class="card-header">
                        <h5 class="h3 mb-0">Data Diri Anda</h5>
                    </div>
                    <div class="card-body">
                        <h4>Nama :</h4>
                        <p class="text-sm">{{ auth()->user()->name }}</p>
                        <h4>Tanggal Lahir / Usia :</h4>
                        <p class="text-sm">{{\Carbon\Carbon::parse(auth()->user()->tanggal_lahir)->isoFormat('D MMMM Y')}} / {{Auth::user()->usia}} Thn</p>
                        <h4>Jenis Kelamin</h4>
                        <p class="text-sm">
                            @if (auth()->user()->jenis_kelamin)
                                {{auth()->user()->jenis_kelamin}}
                            @else
                                -
                            @endif
                        </p>
                        <h4>Alamat :</h4>
                        <p class="text-sm">
                            @if (auth()->user()->alamat)
                                {{auth()->user()->alamat}}
                            @else
                                -
                            @endif
                        </p>
                        <h4>No. Telp</h4>
                        <p class="text-sm">
                            @if (auth()->user()->no_telp)
                                {{auth()->user()->no_telp}}
                            @else
                                -
                            @endif
                        </p>

                    </div>
                </div>
            </div>
            <div class="col-lg-7">
                <div class="card shadow">
                    <!-- Card header -->
                    <div class="card-header">
                    <!-- Title -->
                    <h5 class="h3 mb-0">Informasi Kesehatan Anda</h5>
                    </div>
                    <!-- Card body -->
                    <div class="card-body">
                    <!-- List group -->
                    @if ($suhu)
                    <ul class="list-group list-group-flush list my--3">
                        <li class="list-group-item px-0">
                        <div class="row align-items-center">
                            <div class="col-auto">
                            <!-- Avatar -->
                            <a href="#" class="avatar rounded-circle" style="background-color: white">
                                <img alt="Image placeholder" src="../assets/img/theme/thermometer.png">
                            </a>
                            </div>
                            <div class="col">
                            <h5>Data Pengukuran Suhu Tubuh</h5>
                            <div>
                                <ul class="text-sm mb-0 list-unstyled">
                                    <li class=""> Rata-rata :  {{number_format((float) $suhu_rata2, 2)}} &deg;C</li>
                                    <li class=""> Tinggi :  {{$suhu_tinggi->suhu}} &deg;C</li>
                                    <li class=""> Rendah :  {{$suhu_rendah->suhu}} &deg;C</li>
                                </ul>
                            </div>
                            </div>
                        </div>
                        </li>
                        <li class="list-group-item px-0">
                        <div class="row align-items-center">
                            <div class="col-auto">
                            <!-- Avatar -->
                            <a href="#" class="avatar rounded-circle" style="background-color: white">
                                <img alt="Image placeholder" src="../assets/img/theme/heartbeat.jpg">
                            </a>
                            </div>
                            <div class="col">
                            <h5>Data Pengukuran Detak Jantung</h5>
                            <div>
                                <ul class="text-sm mb-0 list-unstyled">
                                    <li class=""> Rata-rata :  {{number_format((float) $detak_rata2, 2)}} bpm </li>
                                    <li class=""> Tinggi :  {{$detak_tinggi->bpm}} bpm</li>
                                    <li class=""> Rendah :  {{$detak_rendah->bpm}} bpm</li>
                                </ul>
                            </div>
                            </div>
                        </div>
                        </li>
                        <li class="list-group-item px-0">
                        <div class="row align-items-center">
                            <div class="col-auto">
                            <!-- Avatar -->
                            <a href="#" class="avatar rounded-circle" style="background-color: white">
                                <img alt="Image placeholder" src="../assets/img/theme/oxygen.png">
                            </a>
                            </div>
                            <div class="col">
                            <h5>Data Pengukuran Kadar Oksigen</h5>
                            <div>
                                <ul class="text-sm mb-0 list-unstyled">
                                    <li class=""> Rata-rata :  {{number_format((float) $oksigen_rata2, 2)}} %</li>
                                    <li class=""> Tinggi :  {{$oksigen_tinggi->oksigen}} %</li>
                                    <li class=""> Rendah :  {{$oksigen_rendah->oksigen}} %</li>
                                </ul>
                            </div>
                            </div>
                        </div>
                        </li>
                        <li class="list-group-item px-0">
                        <div class="row align-items-center">
                            <div class="col-auto">
                            <!-- Avatar -->
                            <a href="#" class="avatar rounded-circle" style="background-color: white">
                                <img alt="Image placeholder" src="../assets/img/theme/blood.png">
                            </a>
                            </div>
                            <div class="col">
                            <h5>Data Pengukuran Tekanan Darah</h5>
                            <div>
                                <ul class="text-sm mb-0 list-unstyled">
                                    <li class=""> Rata-rata :  {{number_format((int) $tekanan_rata2_sistole)}}/{{number_format((float) $tekanan_rata2_diastole)}} mmHg</li>
                                    <li class=""> Tinggi :  {{$tekanan_tinggi->sistole}}/{{$tekanan_tinggi->diastole}} mmHg</li>
                                    <li class=""> Rendah :  {{$tekanan_rendah->sistole}}/{{$tekanan_rendah->diastole}} mmHg</li>
                                </ul>
                            </div>
                            </div>
                        </div>
                        </li>
                        <h4 class="mt-3">Jumlah Pengukuran yang dilakukan : {{$total_pengukuran}} </h4>
                    </ul>
                    @else
                    <p> No Data </p>
                    @endif
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection

@push('js')

@endpush

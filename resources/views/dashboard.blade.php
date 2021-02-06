@extends('layouts.app')

@section('content')
    <div class="header bg-gradient-primary pb-8 pt-5 pt-md-8">
        <div class="container-fluid">
            <div class="header-body">
                <h2 class="font-weight-bold text-white mb-3">Riwayat Kesehatan Terakhir</h2>
                <h4 class="font-weight-bold text-white mb-3">Update Terakhir, {{$suhu->created_at->isoFormat('D MMMM Y - H:m ')}}</h4>
                <div class="row justify-content-end mb-4 mr-1">
                    <a class="btn btn-default" href="{{route('export.suhu')}}">

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
                                        <span class="h2 font-weight-bold mb-0">{{$suhu->suhu}}</span>
                                    </div>
                                    <div class="col-auto">
                                        <div class="icon icon-shape bg-info text-white rounded-circle shadow">
                                            <i class="fas fa-thermometer-three-quarters"></i>
                                        </div>
                                    </div>
                                </div>
                                <p class="mt-3 mb-0 text-muted text-sm">
                                    <span class="text-success mr-2">
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
                                    </span>
                                    <span class="text-nowrap">{{$suhu->created_at->format("d-m-Y")}}</span>
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
                                        <span class="h2 font-weight-bold mb-0">{{$detak->bpm}}</span>
                                    </div>
                                    <div class="col-auto">
                                        <div class="icon icon-shape bg-warning text-white rounded-circle shadow">
                                            <i class="fas fa-heartbeat"></i>
                                        </div>
                                    </div>
                                </div>
                                <p class="mt-3 mb-0 text-muted text-sm">
                                    <span class="text-success mr-2">
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
                                    </span>
                                    <span class="text-nowrap">{{$detak->created_at->format("d-m-Y")}}</span>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-6">
                        <div class="card card-stats mb-4 mb-xl-0">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <h5 class="card-title text-uppercase text-muted mb-0">Kadar Oksigen</h5>
                                        <span class="h2 font-weight-bold mb-0">{{$detak->oksigen}}</span>
                                    </div>
                                    <div class="col-auto">
                                        <div class="icon icon-shape bg-yellow text-white rounded-circle shadow">
                                            <i class="fas fa-atom"></i>
                                        </div>
                                    </div>
                                </div>
                                <p class="mt-3 mb-0 text-muted text-sm">
                                    <span class="text-success mr-2">
                                        @if($detak->oksigen < 90)
                                            <i class="fas fa-arrow-down"></i>
                                        @elseif(($detak->oksigen > 90) && ($detak->oksigen < 100))
                                            <i class="fas fa-minus"></i>
                                            Normal
                                        @else
                                            <i class="fas fa-arrow-up"></i>
                                            Tinggi
                                        @endif
                                    </span>
                                    <span class="text-wrap">{{$detak->created_at->format("d-m-Y")}}</span>
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
                                    <span class="h2 font-weight-bold mb-0">{{$tekananDarah->sistole}} / {{$tekananDarah->diastole}}</span>
                                    </div>
                                    <div class="col-auto">
                                        <div class="icon icon-shape bg-danger text-white rounded-circle shadow">
                                            <i class="fas fa-tint"></i>
                                        </div>
                                    </div>
                                </div>
                                <p class="mt-3 mb-0 text-muted text-sm">
                                    <span class="text-success mr-2">
                                        <i class="fas fa-minus"></i>
                                        {{$tekananDarah->tekanan_status}} </span>
                                    <span class="text-nowrap">{{$tekananDarah->created_at->format("d-m-Y")}}</span>
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
                        <p class="text-sm">{{\Carbon\Carbon::parse(auth()->user()->tanggal_lahir)->format('d, M Y')}} / {{Auth::user()->usia}} Thn</p>
                        <h4>Jenis Kelamin</h4>
                        <p class="text-sm">{{auth()->user()->jenis_kelamin}}</p>
                        <h4>Alamat :</h4>
                        <p class="text-sm">{{auth()->user()->alamat}}</p>
                        <h4>No. Telp</h4>
                        <p class="text-sm">{{auth()->user()->no_telp}}</p>
                        <p>{{\Carbon\Carbon::now()}}</p>
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
                    <ul class="list-group list-group-flush list my--3">
                        <li class="list-group-item px-0">
                        <div class="row align-items-center">
                            <div class="col-auto">
                            <!-- Avatar -->
                            <a href="#" class="avatar rounded-circle">
                                <img alt="Image placeholder" src="../assets/img/theme/angular.jpg">
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
                            <a href="#" class="avatar rounded-circle">
                                <img alt="Image placeholder" src="../assets/img/theme/angular.jpg">
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
                            <a href="#" class="avatar rounded-circle">
                                <img alt="Image placeholder" src="../assets/img/theme/sketch.jpg">
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
                            <a href="#" class="avatar rounded-circle">
                                <img alt="Image placeholder" src="../assets/img/theme/react.jpg">
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
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection

@push('js')

@endpush

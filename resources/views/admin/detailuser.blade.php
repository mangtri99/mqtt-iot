@extends('admin.layouts.admin', ['titlePage' => __('Detail User')])
@section('content')
@php
    $isTekanan = false;
@endphp
<div x-data="{ tab: 'suhu' }">
    <div class="row">
        <div class="col">
            <div class="card">
                <!-- Card body -->
                <div class="card-body">
                <div class="row align-items-center">
                    <div class="col-auto">
                    <!-- Avatar -->
                    <a href="#" class="avatar avatar-xl rounded-circle">
                        <input type="hidden" value="{{$user_avatar->id}}" id="user_id">
                        <img alt="Image placeholder" src="{{$user_avatar->avatar_user}}">
                    </a>
                    </div>
                    <div class="col ml--2">
                        <h3 class="mb-0">
                            <a href="#!">{{$user_avatar->name}}</a>
                        </h3>
                        <p class="text-sm mb-0">{{\Carbon\Carbon::parse($user_avatar->tanggal_lahir)->isoFormat('D MMMM Y')}} / {{$user_avatar->usia}} Thn</p>
                        <p class="text-sm mb-0">{{$user_avatar->jenis_kelamin}}</p>
                        <p class="text-sm mb-0">{{$user_avatar->alamat}}</p>
                        <span class="text-success">●</span>
                        <small>ID : {{$user_avatar->no_pasien}}</small>
                    </div>
                    <div class="col-auto align-items-bottom">
                        {{-- <button type="button" class="btn btn-sm btn-primary">Add</button> --}}
                        <a href="{{route('export.suhu', $user_avatar->id)}}" class="btn btn-primary text-sm">
                            <i class="fas fa-lg fa-file-pdf mr-2"></i>Laporan Kesehatan
                        </a>
                    </div>
                </div>
                </div>
            </div>
            <div class="card mb-4">
                <div class="card-header border-0">
                    <div class="d-flex justify-content-between">
                        <h3 class="mb-2 text-muted">Riwayat Pemeriksaan</h3>

                    </div>
                </div>
                <!-- Light table -->
                <div class="px-4 py-3">
                    <table class="table table-flush mt-3" id="tabel-info">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col" class="sort" >No</th>
                                <th scope="col" class="sort" >Tanggal Periksa</th>
                                <th scope="col" class="sort" >Suhu Tubuh</th>
                                <th scope="col" class="sort" >BPM</th>
                                <th scope="col" class="sort" >SpO2</th>
                                <th scope="col" class="sort" >Tekanan Darah</th>
                            </tr>
                        </thead>
                        <tbody class="list">
                            @for($i = 0; $i < $user_count; $i++)
                                <tr>
                                    <td>{{$i+1}}</td>
                                    <td>{{ $user_detail[0]->suhu[$i]->created_at->format("d-m-Y - H:i") }}</td>
                                    <td>{{ $user_detail[0]->suhu[$i]->suhu }} &deg;C</td>
                                    <td>{{ $user_detail[0]->detak[$i]->bpm }} bpm</td>
                                    <td>{{ $user_detail[0]->detak[$i]->oksigen }} %</td>
                                    <td>{{ $user_detail[0]->tekanan_darah[$i]->sistole}}/{{$user_detail[0]->tekanan_darah[$i]->diastole }} mmHg</td>
                                </tr>
                            @endfor
                        </tbody>
                    </table>
                </div>
                <div class="d-flex justify-content-start py-3 pl-4 font-weight-bold">
                    Total Pemeriksaan : {{$user_count}}
                </div>
            </div>
        </div>
    </div>
    <div >
        <ul class="nav nav-tabs">
            <li class="nav-item">
                <button :class="{ 'active': tab === 'suhu' } " class="nav-link" @click="tab = 'suhu'" >Chart Suhu Tubuh</button>
            </li>
            <li class="nav-item">
                <button :class="{ 'active': tab === 'detak' } " class="nav-link" @click="tab = 'detak'" >Chart Detak Jantung dan SpO2</button>
            </li>
            <li class="nav-item">
                <button :class="{ 'active': tab === 'tekanan' } " class="nav-link" @click="tab = 'tekanan'" >Chart Tekanan Darah</button>
            </li>
        </ul>
        <div x-show="tab === 'suhu'" x-cloak>
            @include('chart.chart-suhu')
        </div>
        <div x-show="tab === 'detak'" x-cloak>
            @include('chart.chart-detak')
        </div>
        <div x-show="tab === 'tekanan'" x-cloak>
            @include('chart.chart-tekanan')
        </div>
    </div>
</div>
@endsection

@push('css')
    <link rel="stylesheet" href="{{asset('assets')}}/vendor/datatables.net-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="{{asset('assets')}}/vendor/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css">
    <link rel="stylesheet" href="{{asset('assets')}}/vendor/datatables.net-select-bs4/css/select.bootstrap4.min.css">
@endpush

@push('js')
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.5.0/dist/chart.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/chartjs-plugin-annotation/1.0.2/chartjs-plugin-annotation.min.js" integrity="sha512-FuXN8O36qmtA+vRJyRoAxPcThh/1KJJp7WSRnjCpqA+13HYGrSWiyzrCHalCWi42L5qH1jt88lX5wy5JyFxhfQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="{{ asset('assets') }}/vendor/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="{{ asset('assets') }}/vendor/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="{{ asset('assets') }}/vendor/datatables.net-select/js/dataTables.select.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#tabel-info').DataTable({
                language: {
                    paginate: {
                        next: '<i class="fas fa-angle-right">',
                        previous: '<i class="fas fa-angle-right">'
                    }
                }
            });
        } );
    </script>
@endpush

@extends('layouts.app', ['titlePage' => __('Riwayat Detak Jantung dan SpO2')])

@section('content')
<div class="header bg-gradient-primary pb-8 pt-5 pt-md-8">
        <div class="container-fluid">
            <input type="hidden" value="{{auth()->user()->id}}" id="user_id">
        </div>
    </div>
 <div class="container-fluid mt--8">
    <div class="row">
        <div class="col">
            <livewire:tabel-detak/>
        </div>
        {{-- <div class="col">
            <div class="card bg-white">
                <div class="card-header bg-transparent">
                    <div class="row align-items-center">
                        <div class="col">
                        <h5 class="text-muted text-uppercase ls-1 mb-2">Grafik Detak Jantung dan Kadar Oksigen</h5>
                        <h5 class="text-muted mb-0">Riwayat 10 Pengukuran Terakhir</h5>
                        </div>
                        <div class="col">
                        </div>
                    </div>
                    </div>
                <div class="card-body">
                    <div class="chart">
                        <!-- Chart wrapper -->
                        <canvas height="500" width="500" id="chart-detak" class="chart-canvas"></canvas>
                    </div>
                </div>
            </div>
        </div> --}}
        @include('chart.chart-detak')
    </div>
 </div>
@endsection

@push('css')
    <link rel="stylesheet" href="{{ asset('assets') }}/vendor/datatables.net-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="{{ asset('assets') }}/vendor/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css">
    <link rel="stylesheet" href="{{ asset('assets') }}/vendor/datatables.net-select-bs4/css/select.bootstrap4.min.css">
    <link rel="stylesheet" href="{{ asset('assets') }}/css/argon.css?v=1.1.0" type="text/css">
@endpush

@push('js')

    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.5.0/dist/chart.min.js"></script>
    {{-- <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.extension.js"></script> --}}
    {{-- <script src="{{ asset('argon') }}/vendor/chart.js/dist/chartjs-plugin-annotation.min.js"></script> --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/chartjs-plugin-annotation/1.0.2/chartjs-plugin-annotation.min.js" integrity="sha512-FuXN8O36qmtA+vRJyRoAxPcThh/1KJJp7WSRnjCpqA+13HYGrSWiyzrCHalCWi42L5qH1jt88lX5wy5JyFxhfQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    {{-- <script src="{{ asset('assets') }}/vendor/jquery/dist/jquery.min.js"></script> --}}
    {{-- <script src="{{ asset('assets') }}/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script> --}}

    <script src="{{ asset('assets') }}/vendor/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="{{ asset('assets') }}/vendor/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="{{ asset('assets') }}/vendor/datatables.net-select/js/dataTables.select.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#tabel-detak').DataTable({
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



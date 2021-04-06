@extends('admin.layouts.admin', ['titlePage' => __('Dashboard Admin')])
@section('content')
    <div class="row">
        <div class="col-xl-3 col-md-6">
          <div class="card bg-gradient-primary border-0">
            <!-- Card body -->
            <div class="card-body">
              <div class="row">
                <div class="col">
                  <h5 class="card-title text-uppercase text-muted mb-0 text-white">User Terdaftar</h5>
                  <span class="h2 font-weight-bold mb-0 text-white">{{$user_total}}</span>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-md-6">
          <div class="card bg-gradient-info border-0">
            <!-- Card body -->
            <div class="card-body">
              <div class="row">
                <div class="col">
                  <h5 class="card-title text-uppercase text-muted mb-0 text-white">Total Penggunaan Alat</h5>
                  <span class="h2 font-weight-bold mb-0 text-white">{{$jumlah_pengukuran}}</span>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
            <div class="col">
                <div class="card mb-4">
            <div class="card-header border-0">
                <div class="d-flex justify-content-between">
                    <h3 class="mb-2 text-muted">Daftar Pasien</h3>
                </div>
            </div>
            <!-- Light table -->
            <div class="px-4 py-3">
                <table class="table table-flush mt-3" id="tabel-user">
                    <thead class="thead-light">
                        <tr>
                            <th scope="col" class="sort" >No</th>
                            <th scope="col" class="sort" >Nama</th>
                            <th scope="col" class="sort" >No Pasien</th>
                            <th scope="col" class="sort" >Tanggal Lahir</th>
                            <th scope="col" class="sort" >Jenis Kelamin</th>
                            <th scope="col" class="sort" >Aksi</th>
                        </tr>
                        </thead>
                        <tbody class="list">
                            @foreach ($daftar as $data)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$data->name}}</td>
                                    <td>{{$data->no_pasien}}</td>
                                    <td>{{$data->tanggal_lahir}}</td>
                                    <td>{{$data->jenis_kelamin}}</td>
                                    <td>
                                        <a class="btn btn-sm btn-primary" href="{{route('admin.user.detail',['user' => $data->id])}}">Detail</a>
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>

                    </table>
                    </div>
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
    <script src="{{ asset('assets') }}/vendor/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="{{ asset('assets') }}/vendor/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="{{ asset('assets') }}/vendor/datatables.net-select/js/dataTables.select.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#tabel-user').DataTable({
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

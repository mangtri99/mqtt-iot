<div class="card mb-4">
    <div class="card-header border-0">
        <div class="d-flex justify-content-between">
            <h3 class="mb-2 text-muted">Riwayat Suhu Tubuh</h3>
            {{-- <a class="btn btn-default" href="{{route('export.suhu')}}">
                <i class="fas fa-file-pdf text-white"></i>
                 Export ke PDF
            </a> --}}
        </div>
    </div>
    <!-- Light table -->
    <div class="px-4 py-3">
    <table class="table align-items-center table-flush mt-3" id="tabel-suhu">
        <thead class="thead-light">
        <tr>
            <th scope="col" class="sort" data-sort="name">No</th>
            <th scope="col" class="sort" data-sort="budget">Suhu</th>
            <th scope="col" class="sort" data-sort="status">Keterangan</th>
            <th scope="col" class="sort" data-sort="status">Tanggal Periksa</th>
        </tr>
        </thead>
        <tbody class="list">
        @foreach ($riwayat_suhu as $suhu)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$suhu->suhu}}</td>
                @if ($suhu->suhu > 37)
                    <td>Tinggi</td>
                @else
                    <td>Normal</td>
                @endif

                <td>{{$suhu->created_at->isoFormat("d-M-Y - HH:mm")}}</td>
            </tr>
        @endforeach
        </tbody>

    </table>
    </div>
</div>

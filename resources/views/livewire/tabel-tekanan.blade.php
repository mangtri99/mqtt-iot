<div class="card mb-4">
    <div class="card-header border-0">
        <div class="d-flex justify-content-between">
            <h3 class="mb-2 text-muted">Riwayat Tekanan Darah</h3>

        </div>
    </div>
    <!-- Light table -->
    <div class="px-4 py-3 ">
    <table class="table align-items-center table-flush mt-3" id="tabel-tekanan">
        <thead class="thead-light">
        <tr>
            <th scope="col" class="sort" data-sort="name">No</th>
            <th scope="col" class="sort" data-sort="status">Tanggal Periksa</th>
            <th scope="col" class="sort" data-sort="budget">Tekanan Darah</th>
            <th scope="col" class="sort" data-sort="status">Keterangan</th>

        </tr>
        </thead>
        <tbody class="list">
        @foreach ($riwayat_tekanan as $tekanan)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$tekanan->created_at->format("d-m-Y - H:i")}}</td>
                <td>{{$tekanan->sistole}} / {{$tekanan->diastole}} mmHg</td>
                <td>{{$tekanan->tekanan_status}}</td>

            </tr>
        @endforeach
        </tbody>

    </table>
    </div>
</div>

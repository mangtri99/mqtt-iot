<div class="card mb-4">
    <div class="card-header border-0">
        <div class="d-flex justify-content-between">
            <h3 class="mb-2 text-muted">Riwayat Tekanan Darah</h3>
            <button class="btn btn-default">
                <i class="fas fa-file-pdf text-white"></i>
                 Export ke PDF
            </button>
        </div>
    </div>
    <!-- Light table -->
    <div class="px-4 py-3 ">
    <table class="table align-items-center table-flush mt-3" id="tabel-tekanan">
        <thead class="thead-light">
        <tr>
            <th scope="col" class="sort" data-sort="name">No</th>
            <th scope="col" class="sort" data-sort="budget">Sistole</th>
            <th scope="col" class="sort" data-sort="status">Diastole</th>
            <th scope="col" class="sort" data-sort="status">Keterangan</th>
            <th scope="col" class="sort" data-sort="status">Tanggal Periksa</th>
        </tr>
        </thead>
        <tbody class="list">
        @foreach ($riwayat_tekanan as $tekanan)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$tekanan->sistole}}</td>
                <td>{{$tekanan->diastole}}</td>
                @if ($tekanan->sistole > 120 && $tekanan->diastole > 80)
                    <td>Tekanan Darah Tinggi (Hipertensi)</td>
                @elseif ( $tekanan->sistole < 90 && $tekanan->diastole < 60)
                    <td>Tekanan Darah Rendah (Hipertensi)</td>
                @else
                    <td>Tekanan Darah Normal</td>
                @endif
                <td>{{$tekanan->created_at->format("d-m-Y")}}</td>
            </tr>
        @endforeach
        </tbody>

    </table>
    </div>
</div>

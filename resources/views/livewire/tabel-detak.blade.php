<div class="card mb-4">
    <div class="card-header border-0">
        <div class="d-flex justify-content-between">
            <h3 class="mb-2 text-muted">Riwayat Detak Jantung dan Kadar Oksigen</h3>
            <button class="btn btn-default">
                <i class="fas fa-file-pdf text-white"></i>
                 Export ke PDF
            </button>
        </div>
    </div>
    <!-- Light table -->
    <div class="px-4 py-3">
    <table class="table table-flush mt-3" id="tabel-detak">
        <thead class="thead-light">
        <tr>
            <th scope="col" class="sort" >No</th>
            <th scope="col" class="sort" >Detak Jantung</th>
            <th scope="col" class="sort" >Keterangan</th>
            <th scope="col" class="sort" >Kadar Oksigen</th>
            <th scope="col" class="sort" >Keterangan</th>
            <th scope="col" class="sort" >Tanggal Periksa</th>
        </tr>
        </thead>
        <tbody class="list">
        @foreach ($riwayat_detak as $detak)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$detak->bpm}}</td>
                @if ($detak->bpm > 100)
                    <td>BPM Tinggi</td>
                @elseif($detak->bpm<60)
                    <td>BPM Rendah</td>
                @else
                    <td>BPM Normal</td>
                @endif

                <td>{{$detak->oksigen}} %</td>
                @if ($detak->oksigen > 90)
                    <td>Kadar Oksigen Rendah</td>
                @else
                    <td>Kadar Oksigen Normal</td>
                @endif
                <td>{{$detak->created_at->format("d-m-Y")}}</td>
            </tr>
        @endforeach
        </tbody>

    </table>
    </div>
</div>

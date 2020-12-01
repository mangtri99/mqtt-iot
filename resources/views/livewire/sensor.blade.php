<div>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">suhu</th>
                <th scope="col">created</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $d)
                <tr>
                    <td>{{$d->id}}</td>
                    <td>{{$d->suhu}}</td>
                    <td>{{$d->created_at}}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{$data->links()}}

</div>

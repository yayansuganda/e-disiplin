<table class="table table-hover">
    <tr>
        <th>Nama Pangkat/Golongan</th>
        <th>Nomor SK</th>
        <th>Tanggal SK</th>
        <th>TMT Golongan</th>


    </tr>
    @foreach ($model as $item)
    <tr>
        <td>{{ $item->nama_pangkat }} - {{ $item->nama_golongan }}</td>
        <td>{{ $item->nomor_sk }}</td>
        <td>{{ $item->tanggal_sk }}</td>
        <td>{{ $item->tmt_golongan }}</td>


    </tr>
    @endforeach
</table>

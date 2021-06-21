<table class="table table-hover">
    <tr>
        <th>Nama Anak</th>
        <th>Jenis Kelamin</th>
        <th>Tempat Lahir</th>
        <th>Tanggal Lahir</th>


    </tr>
    @foreach ($model as $item)
    <tr>
        <td>{{ $item->nama_anak }}</td>
        <td>{{ $item->jenis_kelamin_anak }}</td>
        <td>{{ $item->tempat_lahir_anak }}</td>
        <td>{{ $item->tanggal_lahir_anak }}</td>


    </tr>
    @endforeach
</table>

<table class="table table-hover">
    <tr>
        <th>Nama Dilat</th>
        <th>Penyelenggara</th>
        <th>Tanggal Mulai</th>
        <th>Tanggal Selesai</th>


    </tr>
    @foreach ($model as $item)
    <tr>
        <td>{{ $item->nama_diklat }}</td>
        <td>{{ $item->penyelenggara }}</td>
        <td>{{ $item->tanggal_mulai }}</td>
        <td>{{ $item->tanggal_selesai }}</td>


    </tr>
    @endforeach
</table>

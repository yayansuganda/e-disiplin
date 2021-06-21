<table class="table table-hover">
    <tr>
        <th>Nama Keluarga</th>
        <th>Hubungan Keluarga</th>
        <th>Tempat Lahir</th>
        <th>Tanggal Lahir</th>


    </tr>
    @foreach ($model as $item)
    <tr>
        <td>{{ $item->nama_keluarga }}</td>
        <td>{{ $item->nama_m_hubungan_keluarga }}</td>
        <td>{{ $item->tempat_lahir }}</td>
        <td>{{ $item->tanggal_lahir }}</td>


    </tr>
    @endforeach
</table>

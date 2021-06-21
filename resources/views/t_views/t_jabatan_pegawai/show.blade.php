<table class="table table-hover">
    <tr>
        <th>Jenis Jabatan</th>
        <th>Nama Jabatan</th>
        <th>TMT Jabatan</th>
    </tr>
    @foreach ($model as $item)
    <tr>
        <td>{{ $item->nama_m_jenis_jabatan }}</td>
        <td>{{ $item->nama_m_jabatan }}</td>
        <td>{{ $item->tmt_jabatan }}</td>

    </tr>
    @endforeach
</table>

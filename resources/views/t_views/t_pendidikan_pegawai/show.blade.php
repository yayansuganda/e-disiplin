<table class="table table-hover">
    <tr>
        <th>Nama Pendidikan</th>
        <th>Nama Sekolah</th>
        <th>Tahun Lulus</th>


    </tr>
    @foreach ($model as $item)
    <tr>
        <td>{{ $item->nama_m_tingkat_pendidikan }}</td>
        <td>{{ $item->nama_sekolah }}</td>
        <td>{{ $item->tahun_lulus }}</td>

    </tr>
    @endforeach
</table>

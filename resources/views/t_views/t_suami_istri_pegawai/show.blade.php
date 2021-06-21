<table class="table table-hover">
    <tr>
        <th>Nama Suami/Istri</th>
        <th>Tanggal Menikah</th>
        <th>Nomor Karsu/Karis</th>
    </tr>
    @foreach ($model as $item)
    <tr>
        <td>{{ $item->nama_suami_istri }}</td>
        <td>{{ $item->tanggal_menikah }}</td>
        <td>{{ $item->nomor_kartu_su_is }}</td>

    </tr>
    @endforeach
</table>

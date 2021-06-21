<table>
    <thead>
<tr></tr>
<tr></tr>
<tr></tr>
<tr>
    <td>Nama Pegawai</td>
    <td>: {{$daftar_kehadiran[0]['nama_pegawai']}}</td>
</tr>
<tr>
    <td>Nama SKPD</td>
    <td>: {{$daftar_kehadiran[0]['nama_skpd']}}</td>
</tr>
<tr>
    <td>Tahun</td>
    <td>: {{$daftar_kehadiran[0]['tahun']}}</td>
</tr>
<tr></tr>


            <tr>
                <th  >Bulan</th>
                <th  >Hari Aktif</th>
                <th  >Hadir</th>
                <th  >I</th>
                <th  >C</th>
                <th  >S</th>
                <th  >DL</th>
                <th  >DIK/TB</th>
                <th  >TL</th>
                <th  >TTW</th>
                <th  >TK</th>
            </tr>

    </thead>
    <tbody>

                @foreach ($daftar_kehadiran as $kehadiran)
                <tr>
                    <td>{{$kehadiran->bulan}}</td>
                    <td>{{$kehadiran->hari_aktif}}</td>
                    <td>{{$kehadiran->hadir}}</td>
                    <td>{{$kehadiran->i}}</td>
                    <td>{{$kehadiran->c}}</td>
                    <td>{{$kehadiran->s}}</td>
                    <td>{{$kehadiran->dl}}</td>
                    <td>{{$kehadiran->dik_tb}}</td>
                    <td>{{$kehadiran->tl}}</td>
                    <td>{{$kehadiran->ttw}}</td>
                    <td>{{$kehadiran->tk}}</td>
                </tr>
                @endforeach



<tr></tr>
<tr></tr>
<tr></tr>
<tr></tr>
<tr><td>.</td></tr>

    </tbody>

</table>

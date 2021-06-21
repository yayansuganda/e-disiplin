<div class="panel panel-inverse">

    <div class="panel-body">
        <table id="data" class="table table-striped table-bordered data" style="width:100%">
            <thead>
                <tr>
                    <th class="text-nowrap">Bulan</th>
                    <th class="text-nowrap">Hari Aktif</th>
                    <th class="text-nowrap">Hadir</th>
                    <th class="text-nowrap">I</th>
                    <th class="text-nowrap">C</th>
                    <th class="text-nowrap">S</th>
                    <th class="text-nowrap">DL</th>
                    <th class="text-nowrap">DIK/TB</th>
                    <th class="text-nowrap">TL</th>
                    <th class="text-nowrap">TTW</th>
                    <th class="text-nowrap">TK</th>
                    <th class="text-nowrap">Action</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $namaBulan = array("Januari","Februaru","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember");
                @endphp
                @foreach ($model as $item)
                    <tr>
                        <td>{{$namaBulan[$item->bulan - 1]}}</td>
                        <td>{{$item->hari_aktif}}</td>
                        <td>{{$item->hadir}}</td>
                        <td>{{$item->i}}</td>
                        <td>{{$item->c}}</td>
                        <td>{{$item->s}}</td>
                        <td>{{$item->dl}}</td>
                        <td>{{$item->dik_tb}}</td>
                        <td>{{$item->tl}}</td>
                        <td>{{$item->ttw}}</td>
                        <td>{{$item->tk}}</td>
                        <td><a href="{{route('kehadiran.edit', $item->id_kehadiran_pegawai)}}" class="modal-show edit btn btn-icon btn-primary btn-sm" title="Edit"><i class="fa fa-edit"></i></button></a>
                            <a href="{{route('kehadiran.destroy', $item->id_kehadiran_pegawai)}}" class="btn-delete btn btn-icon btn-danger btn-sm" title="Delete"><i class="fa fa-trash"></i></i></button></a>
                        </td>

                    </tr>

                @endforeach

            </tbody>
        </table>
    </div>
</div>


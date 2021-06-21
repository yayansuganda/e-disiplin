
<!-- begin panel -->
<div class="panel panel-inverse">
    <ol class="pull-right">
    <a href="{{route('usulan_layanan_kenaikan_pangkat.show', Request::segment(3))}}" class="btn btn-sm btn-success modal-show" title="Create Usulan Kenaikan Pangkat Pegawai" data-toggle="modal">Tambah Data Pegawai</a>
    </ol>

    <div class="panel-body">
            <table id="data-table-fixed-header"  class="table table-striped table-bordered data" style="width:100%">
                    <thead>
                        <tr>
                            <th class="text-nowrap">No</th>
                            <th class="text-nowrap">Nip</th>
                            <th class="text-nowrap">Nama Pegawai</th>
                            <th class="text-nowrap">Gol/Pangkat Terakhir</th>
                            <th class="text-nowrap">L.Pangkat</th>
                            <th class="text-nowrap">Naik Ke</th>
                            <th class="text-nowrap">Status Berkas</th>
                            <th class="text-nowrap">Status Proses</th>
                            <th class="text-nowrap">Action</th>
                        </tr>
                    </thead>
                    <tbody>

                    </tbody>
                </table>

    </div>
</div>

<!-- end panel -->

<script>

var id_usulan = "{{ Request::segment(1) }}";

console.log(id_usulan);

var oTable = $('.data').DataTable({
    autoWidth:true,
    processing: true,
    serverSide: true,
    Searchable: true,
    ajax: "{{ route('table.daftar_usulan_pegawai', Request::segment(3))}}",
    columns: [
            {data: 'DT_RowIndex', name: 'id_layanan_kenaikan_pangkat'},
            {data: 'nip', name: 'nip', visible: false },
            {
                data: 'nama_pegawai',
                render: function ( data, type, row ) {
                    // Combine the first and last names into a single table field
                    return '<strong>'+row.gelar_depan+' '+row.nama_pegawai+ ' ' +row.gelar_belakang+'</strong></br>'+row.nip;
                }
            },
            {
                data: 'nama_pangkat_terakhir',
                render: function ( data, type, row ) {
                    // Combine the first and last names into a single table field
                    return '<strong>'+row.nama_pangkat_terakhir+' </br> '+row.nama_golongan_terakhir+ '</strong>';
                },
            },
            {data: 'nama_m_layanan_kenaikan_pangkat', name: 'nama_m_layanan_kenaikan_pangkat'},
            {data: 'nama_golongan', name: 'nama_golongan'},
            {data: 'status_berkas', name: 'status_berkas'},
            {data: 'status_proses', name: 'status_proses'},


            {data: 'action', name: 'action', orderable: false}
        ]
});


</script>

@extends('layouts.sidebar2')

@section('content')

<div id="content" class="content">

    <!-- end breadcrumb -->
    <!-- begin page-header -->
    <h1 class="page-header">Usulan Tidak Memenuhi Syarat</h1>
    <!-- end page-header -->

<!-- begin panel -->
<div class="panel panel-inverse">
    <div class="panel-heading">
        <div class="panel-heading-btn">
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-redo"></i></a>
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
        </div>
        <h4 class="panel-title">Berkas Tidak Memenuhi Syarat (TMS)</h4>
    </div>

    <div class="panel-body">

        <table id="data-table-responsive"  class="table table-striped table-bordered data2 " style="width:100%">
            <thead>
                <tr>
                    <th class="text-nowrap">No</th>
                    <th class="text-nowrap">Nip</th>
                    <th class="text-nowrap">Nama Pegawai</th>
                    <th class="text-nowrap">Status Berkas</th>
                    <th class="text-nowrap">Status Proses</th>
                    <th class="text-nowrap">Keterangan</th>
                    <th class="text-nowrap">Action</th>
                </tr>
            </thead>
            <tbody>

            </tbody>
        </table>

    </div>
</div>
<!-- end panel -->


</div>
<!-- end #content -->

@endsection

@push('scripts')
<script>
var oTable2 = $('.data2').DataTable({
    autoWidth:true,
    processing: true,
    serverSide: true,
    ajax: "{{ route('table.daftar_pegawai_tms')}}",
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
            {data: 'status_berkas', name: 'status_berkas'},
            {data: 'status_proses', name: 'status_proses'},

            {data: 'keterangan', name: 'keterangan'},
            {data: 'action', name: 'action', orderable: false}
        ]
});
</script>
@endpush

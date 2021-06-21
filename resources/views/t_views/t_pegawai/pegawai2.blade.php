@extends('layouts.sidebar')

@section('content')

<div id="content" class="content">
    <!-- begin breadcrumb -->

    <!-- end breadcrumb -->
    <!-- begin page-header -->
    <h1 class="page-header">Input Hukuman Disiplin</h1>
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
        <h4 class="panel-title">Panel Title here</h4>
    </div>

    <div class="panel-body">


        <table id="data-table-responsive" class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th class="text-nowrap">No</th>
                    <th class="text-nowrap">Nama Pegawai</th>
                    <th class="text-nowrap">Tempat/Tanggal Lahir</th>
                    <th class="text-nowrap">Jenis Kelamin</th>
                    <th class="text-nowrap">Agama</th>
                    <th class="text-nowrap">Status Pernikahan</th>
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
var oTable = $('#data-table-responsive').DataTable({
    processing: true,
    serverSide: true,
    ajax: "{{ route('table.pegawai2')}}",
    columns: [
            {data: 'DT_RowIndex', name: 'nip'},
            {
                data: null,
                render: function ( data, type, row ) {
                    // Combine the first and last names into a single table field
                    return '<strong>'+row.gelar_depan+' '+row.nama_pegawai+ ' ' +row.gelar_belakang+'</strong></br>'+row.nip;
                }
            },
            {
                data: 'tempat_lahir',
                render: function ( data, type, row ) {
                    // Combine the first and last names into a single table field
                    return row.tempat_lahir+'</br>'+row.tanggal_lahir;
                }
            },
            {data: 'jenis_kelamin', name: 'jenis_kelamin'},
            {data: 'nama_m_agama', name: 'nama_m_agama'},
            {data: 'nama_m_pernikahan', name: 'nama_m_pernikahan'},
            {data: 'action', name: 'action', orderable: false}
        ]
});
</script>
@endpush

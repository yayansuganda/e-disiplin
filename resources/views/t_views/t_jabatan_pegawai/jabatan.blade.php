@extends('layouts.sidebar2')

@section('content')

<div id="content" class="content">
    <!-- begin breadcrumb -->
    <ol class="pull-right">
        <a href="{{route('jabatan.create')}}" class="btn btn-sm btn-success modal-show" title="Create Jabatan Pegawai" data-toggle="modal">Add New Data Pegawai</a>
    </ol>
    <!-- end breadcrumb -->
    <!-- begin page-header -->
    <h1 class="page-header">Page with Top Menu <small>header small text goes here...</small></h1>
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
                    <th class="text-nowrap">Jenis Jabatan</th>
                    <th class="text-nowrap">Nama Jabatan</th>
                    <th class="text-nowrap">Nama Subbidang</th>
                    <th class="text-nowrap">Nama Bidang</th>
                    <th class="text-nowrap">Nama SKPD</th>
                    <th class="text-nowrap">TMT Jabatan</th>
                    <th class="text-nowrap">Tanggal SK</th>
                    <th class="text-nowrap">Nomor SK</th>
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
    ajax: "{{ route('table.jabatan')}}",
    columns: [
            {data: 'DT_RowIndex', name: 'id_jabatan'},
            {data: 'nama_m_jenis_jabatan', name: 'nama_m_jenis_diklat'},
            {data: 'nama_m_jabatan', name: 'nama_m_jabatan'},
            {data: 'nama_m_skpd_subbidang', name: 'nama_m_skpd_subbidang'},
            {data: 'nama_m_skpd_bidang', name: 'nama_m_skpd_bidang'},
            {data: 'nama_m_skpd', name: 'nama_m_skpd'},
            {data: 'tmt_jabatan', name: 'tmt_jabatan'},
            {data: 'tanggal_sk', name: 'tanggal_sk'},
            {data: 'nomor_sk', name: 'nomor_sk'},
            {data: 'action', name: 'action', orderable: false}
        ]
});
</script>
@endpush

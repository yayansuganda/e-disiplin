@extends('layouts.sidebar2')

@section('content')

<div id="content" class="content">
    <!-- begin breadcrumb -->
    <ol class="pull-right">
        <a href="{{route('golongan.create')}}" class="btn btn-sm btn-success modal-show" title="Create Golongan Pegawai" data-toggle="modal">Add New Data Pegawai</a>
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
                    <th class="text-nowrap">Golongan/Ruang</th>
                    <th class="text-nowrap">Nama Pangkat</th>
                    <th class="text-nowrap">Nomor SK</th>
                    <th class="text-nowrap">Tanggal SK</th>
                    <th class="text-nowrap">TMT Golongan</th>
                    <th class="text-nowrap">Nomor BKN</th>
                    <th class="text-nowrap">Tanggal BKN</th>
                    <th class="text-nowrap">Jenis KP</th>
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
    ajax: "{{ route('table.golongan')}}",
    columns: [
            {data: 'DT_RowIndex', name: 'nip'},
            {data: 'nama_golongan', name: 'nama_golongan'},
            {data: 'nama_pangkat', name: 'nama_pangkat'},
            {data: 'nomor_sk', name: 'nomor_sk'},
            {data: 'tanggal_sk', name: 'tanggal_sk'},
            {data: 'tmt_golongan', name: 'tmt_golongan'},
            {data: 'nomor_bkn', name: 'nomor_bkn'},
            {data: 'tanggal_bkn', name: 'tanggal_bkn'},
            {data: 'id_m_jenis_kp', name: 'id_m_jenis_kp'},
            {data: 'action', name: 'action', orderable: false}
        ]
});
</script>
@endpush

@extends('layouts.sidebar2')

@section('content')

<div id="content" class="content">
    <!-- begin breadcrumb -->
    <ol class="pull-right">
        <a href="{{route('diklat.create')}}" class="btn btn-sm btn-success modal-show" title="Create Diklat Pegawai" data-toggle="modal">Add New Data Pegawai</a>
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
                    <th class="text-nowrap">Jenis Diklat</th>
                    <th class="text-nowrap">Nama Diklat</th>
                    <th class="text-nowrap">Tanggal Mulai</th>
                    <th class="text-nowrap">Tanggal Selesai</th>
                    <th class="text-nowrap">Penyelenggara</th>
                    <th class="text-nowrap">Alamat Diklat</th>
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
    ajax: "{{ route('table.diklat')}}",
    columns: [
            {data: 'DT_RowIndex', name: 'id_diklat'},
            {data: 'nama_m_jenis_diklat', name: 'nama_m_jenis_diklat'},
            {data: 'nama_diklat', name: 'nama_diklat'},
            {data: 'tanggal_mulai', name: 'tanggal_mulai'},
            {data: 'tanggal_selesai', name: 'tanggal_selesai'},
            {data: 'penyelenggara', name: 'penyelenggara'},
            {data: 'alamat_diklat', name: 'alamat_diklat'},
            {data: 'action', name: 'action', orderable: false}
        ]
});
</script>
@endpush

@extends('layouts.sidebar2')

@section('content')

<div id="content" class="content">
    <!-- begin breadcrumb -->
    <ol class="pull-right">
        <a href="{{route('suami_istri.create')}}" class="btn btn-sm btn-success modal-show" title="Create Suami/Istri Pegawai" data-toggle="modal">Add New Data Pegawai</a>
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
                    <th class="text-nowrap">Nama Suami/Istri</th>
                    <th class="text-nowrap">Tanggal Menikah</th>
                    <th class="text-nowrap">Nomor Kartu Suami/Istri</th>
                    <th class="text-nowrap">Status PNS</th>
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
    ajax: "{{ route('table.suami_istri')}}",
    columns: [
            {data: 'DT_RowIndex', name: 'id_suami_istri'},
            {data: 'nama_suami_istri', name: 'nama_suami_istri'},
            {data: 'tanggal_menikah', name: 'tanggal_menikah'},
            {data: 'nomor_kartu_su_is', name: 'nomor_kartu_su_is'},
            {data: 'status_pns', name: 'status_pns'},
            {data: 'action', name: 'action', orderable: false}
        ]
});
</script>
@endpush

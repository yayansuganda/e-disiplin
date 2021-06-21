@extends('layouts.sidebar')

@section('content')

<div id="content" class="content">
    <!-- begin breadcrumb -->
    <ol class="pull-right">
        <a href="{{route('pelanggaran_hd.create')}}" class="btn btn-sm btn-success modal-show" title="Create Pelanggaran HD" data-toggle="modal">Add New Data</a>
    </ol>
    <!-- end breadcrumb -->
    <!-- begin page-header -->
    <h1 class="page-header">Master Pelanggaran HD</h1>
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
        <h4 class="panel-title">Data Pelanggaran HD</h4>
    </div>

    <div class="panel-body">

        <table id="data-table-responsive" class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th class="text-nowrap">No</th>
                    <th class="text-nowrap">Nama Pelanggaran</th>
                    <th class="text-nowrap">Kategori</th>
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
    ajax: "{{ route('table.m_pelanggaran_hd')}}",
    columns: [
            {data: 'DT_RowIndex', name: 'id_m_jenis_pelanggaran_hd'},
            {data: 'nama_m_jenis_pelanggaran_hd', name: 'nama_m_jenis_pelanggaran_hd'},
            {data: 'kategori_pelanggaran_hd', name: 'kategori_pelanggaran_hd'},

            {data: 'action', name: 'action', orderable: false}
        ]
});
</script>
@endpush

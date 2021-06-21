@extends('layouts.sidebar2')

@section('content')

<div id="content" class="content">
    <!-- begin breadcrumb -->
    <ol class="pull-right">
        <a href="{{route('prajabatan_cpns_pns.create')}}" class="btn btn-sm btn-success modal-show" title="Create Prajabatan CPNS/PNS" data-toggle="modal">Add New Data Pegawai</a>
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
                    <th class="text-nowrap">Status Kepegawaian</th>
                    <th class="text-nowrap">TMT CPNS</th>
                    <th class="text-nowrap">Tanggal SK CPNS</th>
                    <th class="text-nowrap">Nomor SK CPNS</th>
                    <th class="text-nowrap">TMT PNS</th>
                    <th class="text-nowrap">Tanggal SK PNS</th>
                    <th class="text-nowrap">Nomor SK PNS</th>
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
    ajax: "{{ route('table.datas_prajabatan_cpns_pns')}}",
    columns: [
            {data: 'DT_RowIndex', name: 'id_t_prajabatan_cpns_pns'},
            {data: 'nama_m_status_kepegawaian', name: 'nama_m_status_kepegawaian'},
            {data: 'tmt_cpns', name: 'tmt_cpns'},
            {data: 'tanggal_sk_cpns', name: 'tanggal_sk_cpns'},
            {data: 'nomor_sk_cpns', name: 'nomor_sk_cpns'},
            {data: 'tmt_pns', name: 'tmt_pns'},
            {data: 'tanggal_sk_pns', name: 'tanggal_sk_pns'},
            {data: 'nomor_sk_pns', name: 'nomor_sk_pns'},
            {data: 'action', name: 'action', orderable: false}
        ]
});
</script>
@endpush

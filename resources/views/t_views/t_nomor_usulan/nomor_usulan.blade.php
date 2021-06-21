@extends('layouts.sidebar2')

@section('content')

<div id="content" class="content">
    <!-- begin breadcrumb -->
    <ol class="pull-right">
            <a href="{{url('nomor_usulan/'.Request::segment(2).'/create')}}" class="btn btn-sm btn-success modal-show" title="Create Data Pegawai" data-toggle="modal">Add New Nomor Usulan</a>
    </ol>
    <!-- end breadcrumb -->
    <!-- begin page-header -->
    <h1 class="page-header">Data Nomor Usulan</h1>
    <!-- end page-header -->

<!-- begin panel -->
<div class="panel panel-inverse">
    <div class="panel-heading">

    </div>

    <div class="panel-body">

        <table id="data-table-responsive" class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th class="text-nowrap">No</th>
                    <th class="text-nowrap">Nomor Usul</th>
                    <th class="text-nowrap">Tanggal Usul</th>
                    <th class="text-nowrap">Satuan Kerja</th>
                    <th class="text-nowrap">Pilih Nama Pegawai</th>
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

var id_usulan = "{{ Request::segment(2) }}";

console.log(id_usulan);

var oTable = $('#data-table-responsive').DataTable({
    processing: true,
    serverSide: true,
    ajax: "{{ route('data.usulan', Request::segment(2))}}",
    columns: [
            {data: 'DT_RowIndex', name: 'id_usulan'},
            {data: 'nomor_usulan', name: 'nomor_usulan'},
            {data: 'tanggal_usulan', name: 'tanggal_usulan'},
            {data: 'nama_m_skpd', name: 'nama_m_skpd'},
            {data: 'action2', name: 'action2'},
            {data: 'action', name: 'action', orderable: false}
        ]
});
</script>
@endpush

@extends('layouts.sidebar2')

@section('content')

<div id="content" class="content">

    <!-- begin breadcrumb -->

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




        <div class="form-group row">
            <label class="col-md-2 text-md-right col-form-label">Pilih Nama SKPD</label>
            <div class="col-md-10">
                {!!  Form::select('id_m_skpd',$nama_skpd,null,['placeholder'=>'Pilih','class' => 'form-control default-select2','id'=>'id_m_skpd']) !!}

            </div>
        </div>



        <table id="data-table-responsive" class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th class="text-nowrap">No</th>
                    <th class="text-nowrap">Nip</th>
                    <th class="text-nowrap">Nama Pegawai</th>
                    <th class="text-nowrap">Pangkat Terakhir</th>
                    <th class="text-nowrap">Naik Ke pangkat</th>
                    <th class="text-nowrap">Keterangan</th>
                    <th class="text-nowrap">Action</th>
                </tr>
            </thead>
            <tbody>
                <td colspan="7"><center>Pilih Nama SKPD</center></td>
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

$('#id_m_skpd').on('change', function(e){
    var id = e.target.value;

    $('#data-table-responsive').dataTable({
            destroy: true,
            responsive: true,
            processing: true,
            serverSide: true,
            searching:false,
            ajax: "{{ url('/table/layanan_kenaikan_pangkat_opd')}}" + "/" + id,
            columns: [
            {data: 'DT_RowIndex', name: 'id_layanan_kenaikan_pangkat'},
            {data: 'nip', name: 'nip'},
            {data: 'nama_pegawai', name: 'nama_pegawai'},
            {data: 'nama_pangkat_terakhir', name: 'nama_pangkat_terakhir'},
            {data: 'nama_golongan', name: 'nama_golongan'},
            {data: 'keterangan', name: 'keterangan'},
            {data: 'action', name: 'action', orderable: false}
        ]
        });

});
</script>
@endpush

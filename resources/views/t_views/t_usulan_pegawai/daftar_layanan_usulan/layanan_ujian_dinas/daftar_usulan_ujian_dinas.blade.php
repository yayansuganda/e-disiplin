@extends('layouts.sidebar2')

@section('content')

<div id="content" class="content">

    <!-- begin breadcrumb -->

    <!-- end breadcrumb -->
    <!-- begin page-header -->
    <h1 class="page-header">Daftar Usulan Ujian Dinas</h1>
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
        <h4 class="panel-title">Usulan Ujian Dinas</h4>
    </div>

    <div class="panel-body">




        <div class="form-group row">
            <label class="col-md-2 text-md-right col-form-label">Pilih Nama SKPD</label>
            <div class="col-md-10">
                {!!  Form::select('id_m_skpd',$nama_skpd,null,['placeholder'=>'Pilih','class' => 'form-control default-select22','id'=>'id_m_skpd']) !!}

            </div>
        </div>



        <table id="data-table-responsive" class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th class="text-nowrap">No</th>
                    <th class="text-nowrap">Nama Pegawai</th>
                    <th class="text-nowrap">Pangkat/Golongan Terakhir</th>
                    <th class="text-nowrap">Nama SKPD</th>
                    <th class="text-nowrap">Status Usulan</th>
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

$('.default-select22').select2({
        placeholder : "---Pilih---"
    });

$('#data-table-responsive').dataTable({
            destroy: true,
            responsive: true,
            processing: true,
            serverSide: true,
            searching:false,
            ajax: "{{ url('/table/daftar_usulan_ujian_dinas')}}" + "/" + 0,
            columns: [
            {data: 'DT_RowIndex', name: 'id_usulan_pegawai'},
            {
                data: 'nip',
                render: function ( data, type, row ) {
                    // Combine the first and last names into a single table field
                    return '<strong>'+row.nama_pegawai+' </br> '+row.nip+ '</strong>';
                },
            },
            {
                data: 'nama_pangkat',
                render: function ( data, type, row ) {
                    // Combine the first and last names into a single table field
                    return '<strong>'+row.nama_pangkat+' </br> '+row.nama_golongan+ '</strong>';
                },
            },
            {data: 'nama_m_skpd', name: 'nama_m_skpd'},
            {data: 'status_proses', name: 'status_proses'},
            {data: 'keterangan', name: 'keterangan'},
            {data: 'action', name: 'action', orderable: false}
        ]
        });



$('#id_m_skpd').on('change', function(e){
    var id = e.target.value;
    console.log(id);
    $('#data-table-responsive').dataTable({
            destroy: true,
            responsive: true,
            processing: true,
            serverSide: true,
            searching:false,
            ajax: "{{ url('/table/daftar_usulan_ujian_dinas')}}" + "/" + id,
            columns: [
            {data: 'DT_RowIndex', name: 'id_usulan_pegawai'},
            {
                data: 'nip',
                render: function ( data, type, row ) {
                    // Combine the first and last names into a single table field
                    return '<strong>'+row.nama_pegawai+' </br> '+row.nip+ '</strong>';
                },
            },
            {
                data: 'nama_pangkat',
                render: function ( data, type, row ) {
                    // Combine the first and last names into a single table field
                    return '<strong>'+row.nama_pangkat+' </br> '+row.nama_golongan+ '</strong>';
                },
            },
            {data: 'keterangan', name: 'keterangan'},
            {data: 'action', name: 'action', orderable: false}
        ]
        });

});
</script>
@endpush

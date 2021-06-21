@extends('layouts.sidebar')

@section('content')

<div id="content" class="content">


<!-- begin panel -->
<div class="panel panel-inverse">
    <div class="panel-heading">



        <div class="pull-right">


              <select id="nama_skpd" name="nama_skpd" class="productChosen ">
                <option label="---pilih---">
                @foreach($skpd as $item)
                    <option value="{{$item->nama_m_skpd}}">{{$item->nama_m_skpd}}</option>

                        @foreach ($item->bidang as $item_bidang)
                            @if ($item_bidang->id_m_skpd == "25")
                            <option value="{{$item_bidang->nama_m_skpd_bidang}}">{{$item_bidang->nama_m_skpd_bidang}}</option>
                            @endif
                        @endforeach


                @endforeach

            </select>


            <!-- <a href="{{route('kehadiran.create')}}" class="btn btn-xs btn-success modal-show" title="Create Jabatan Pegawai" data-toggle="modal">Add New Data</a> -->

        </div>
        <h4 class="panel-title">Data Jumlah Kehadiran Pegawai</h4>
    </div>

<br>


    <div class="panel-body">

        <table id="data-table-responsive" class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th class="text-nowrap">No</th>
                    <th class="text-nowrap">Nama Pegawai</th>
                    <th class="text-nowrap">Nama Pegawai</th>
                    <th class="text-nowrap">Tahun</th>
                    <th class="text-nowrap">Hari Aktif</th>
                    <th class="text-nowrap">Hadir</th>
                    <th class="text-nowrap">I</th>
                    <th class="text-nowrap">C</th>
                    <th class="text-nowrap">S</th>
                    <th class="text-nowrap">DL</th>
                    <th class="text-nowrap">DIK/TB</th>
                    <th class="text-nowrap">TL</th>
                    <th class="text-nowrap">TTW</th>
                    <th class="text-nowrap">TK</th>
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
    destroy: true,
    processing: true,
    serverSide: true,
    searching:true,
    ajax:  "{{ route('table.kehadiran','TAMPIL')}}",
    columns: [
            {data: 'DT_RowIndex', name: 'id_kehadiran_pegawai'},
            {
                data: null,
                render: function ( data, type, row ) {
                    // Combine the first and last names into a single table field
                    return '<strong>'+row.gelar_depan+' '+row.nama_pegawai+ ' ' +row.gelar_belakang+'</strong></br>'+row.nip;
                }
            },
            {data: 'nama_pegawai', name: 'nama_pegawai', visible: false},
            {data: 'tahun', name: 'tahun'},
            {data: 'hari_aktif', name: 'hari_aktif'},
            {data: 'hadir', name: 'hadir'},
            {data: 'i', name: 'i'},
            {data: 'c', name: 'c'},
            {data: 's', name: 's'},
            {data: 'dl', name: 'dl'},
            {data: 'dik_tb', name: 'dik_tb'},
            {data: 'tl', name: 'tl'},
            {data: 'ttw', name: 'ttw'},
            {data: 'tk', name: 'tk'},
            {data: 'action', name: 'action', orderable: false}
        ]
});



$(document).ready(function(){
    //Chosen
$('.productChosen').chosen( { width: '300px', placeholder_text_single: "Filter Berdasarkan Unit Kerja", no_results_text: "Oops, nothing found!" } );


})


$('select[name="nama_skpd"]').on('change', function() {
            var namaskpd = $(this).val();



            var oTable = $('#data-table-responsive').DataTable({
                destroy: true,
                processing: true,
                serverSide: true,
                searching:true,
                ajax:  "{{ url('table/kehadiran_pegawai')}}/"+namaskpd,
                columns: [
                        {data: 'DT_RowIndex', name: 'id_kehadiran_pegawai'},
                        {
                            data: null,
                            render: function ( data, type, row ) {
                                // Combine the first and last names into a single table field
                                return '<strong>'+row.gelar_depan+' '+row.nama_pegawai+ ' ' +row.gelar_belakang+'</strong></br>'+row.nip;
                            }
                        },
                        {data: 'nama_pegawai', name: 'nama_pegawai', visible: false},
                        {data: 'tahun', name: 'tahun'},
                        {data: 'hari_aktif', name: 'hari_aktif'},
                        {data: 'hadir', name: 'hadir'},
                        {data: 'i', name: 'i'},
                        {data: 'c', name: 'c'},
                        {data: 's', name: 's'},
                        {data: 'dl', name: 'dl'},
                        {data: 'dik_tb', name: 'dik_tb'},
                        {data: 'tl', name: 'tl'},
                        {data: 'ttw', name: 'ttw'},
                        {data: 'tk', name: 'tk'},
                        {data: 'action', name: 'action', orderable: false}
                    ]
            });
});



</script>
@endpush

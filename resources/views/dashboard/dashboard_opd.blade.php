@extends('layouts.sidebar')

@section('content')

<div id="content" class="content">




    <div class="row ">



        <div class="col-md-4" >
            <div class="panel panel-default" style="height:250px">

                <div class="panel-body">
                    <h4><center>DAFTAR PEGAWAI TK = 5 - 25 </center></h4>
                    <table id="data-tk-5" style="width:100%" class="table table-striped table-bordered data">
                        <thead>
                            <tr>
                                <th class="text-nowrap">Nama Pegawai</th>
                                <th class="text-nowrap">TK</th>
                                <th class="text-nowrap">Action</th>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>


        <div class="col-md-4" >
            <div class="panel panel-default" style="height:250px">

                <div class="panel-body">
                    <h4><center>DAFTAR PEGAWAI TK = 26 - 45</center></h4>
                    <table id="data-tk-10" style="width:100%" class="table table-striped table-bordered data">
                        <thead>
                            <tr>
                                <th class="text-nowrap" >No</th>
                                <th class="text-nowrap">Nama Pegawai</th>
                                <th class="text-nowrap">TK</th>
                                <th class="text-nowrap">Action</th>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>


        <div class="col-md-4" >
            <div class="panel panel-default" style="height:250px">

                <div class="panel-body">
                    <h4><center>DAFTAR PEGAWAI TK >= 46</center></h4>
                    <table id="data-tk-15" style="width:100%" class="table table-striped table-bordered data">
                        <thead>
                            <tr>
                                <th class="text-nowrap" >No</th>
                                <th class="text-nowrap">Nama Pegawai</th>
                                <th class="text-nowrap">TK</th>
                                <th class="text-nowrap">Action</th>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>



        <div class="col-md-6">
            <div id="container-pendidikan"  ></div>
        </div>

        <div class="col-md-6">

            <div id="container-jenis-jabatan"  ></div>
        </div>


    </div>






</div>
<!-- end #content -->


@endsection

@push('scripts')

<script>
// Radialize the colors
Highcharts.setOptions({
    colors: Highcharts.map(Highcharts.getOptions().colors, function (color) {
        return {
            radialGradient: {
                cx: 0.5,
                cy: 0.3,
                r: 0.7
            },
            stops: [
                [0, color],
                [1, Highcharts.Color(color).brighten(-0.3).get('rgb')] // darken
            ]
        };
    })
});





function Highcharts_Pendidikan() {
    Highcharts.chart('container-pendidikan', {
        chart: {
            plotBackgroundColor: null,
            plotBorderWidth: null,
            plotShadow: false,
            type: 'pie'
        },
        title: {
            text: 'JUMLAH PELANGGARAN BERDASARKAN JENIS PELANGGARAN'
        },
        tooltip: {
            pointFormat: '{series.name}: <b>{point.y}</b>'
        },
        plotOptions: {
            pie: {
                allowPointSelect: true,
                cursor: 'pointer',
                dataLabels: {
                    enabled: true,
                    format: '<b>{point.name}</b>: {point.y} ',
                    connectorColor: 'silver'
                }
            }
        },
        series: [{
        name: 'Share',
        data: [
            { name: 'Pelanggaran Ringan', y: 6 },
            { name: 'Pelanggaran Sedang', y: 2 },
            { name: 'Pelanggaran Berat', y: 1 }
        ]
    }]
    });
}





function Highcharts_JenisJabatan() {
    Highcharts.chart('container-jenis-jabatan', {
        chart: {
            plotBackgroundColor: null,
            plotBorderWidth: null,
            plotShadow: false,
            type: 'pie'
        },
        title: {
            text: 'JUMLAH PEGAWAI BERDASARKAN JENIS JABATAN'
        },
        tooltip: {
            pointFormat: '{series.name}: <b>{point.y}</b>'
        },
        plotOptions: {
            pie: {
                allowPointSelect: true,
                cursor: 'pointer',
                dataLabels: {
                    enabled: true,
                    format: '<b>{point.name}</b>: {point.y} ',
                    connectorColor: 'silver'
                }
            }
        },
        series: [{

            name: 'Jumlah',
            data: [
                    @foreach ($chart_jenis_jabatan as $record)
                    { name: '{{$record->nama_m_jenis_jabatan}}', y: {{$record->total}} },
                    @endforeach
                    ]
        }]
    });
}






Highcharts_Pendidikan();
Highcharts_JenisJabatan();


$('#data-tk-5').DataTable({
    scrollY: "150px",
    processing: true,
    serverSide: true,
    searching:false,
    paginate:false,
    info:false,
    ajax:  "{{ route('table.tk_panggilan')}}",
    columns: [
            {data: 'nama_pegawai', name: 'nama_pegawai'},
            {data: 'tk', name: 'tk'},
            {data: 'action', name: 'action', orderable: false}
        ]
});

</script>

@endpush












@extends('layouts.sidebar')

@section('content')

<div id="content" class="content">




    <div class="row ">



        <div class="col-md-4">
            <div id="container-pendidikan"  ></div>
        </div>

        <div class="col-md-4">

            <div id="container-jenis-jabatan"  ></div>
        </div>


        <div class="col-md-4" >
            <div class="panel panel-default" style="height:400px">

                <div class="panel-body">
                    <h4><center>DAFTAR PEGAWAI TK >= 5</center></h4>
                    <table id="data-table-responsive" style="width:100%" class="table table-striped table-bordered data">
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
                <!-- end panel-body -->
            </div>
            <!-- end panel -->

        </div>

        <div class="col-md-12">
            <br>
            <div id="container-skpd"  ></div>
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



$('select[name="id_m_skpd"]').on('change', function() {
    var id = $(this).val();

    $.getJSON("{{ url('chart_filter/admin/')}}/"+id, function(data) {
    // Populate series

        var processed_series = new Array();
        $.each(data.chart_pangkat_golongan_terakhir, function(i, item) {
            processed_series.push(item.nama_pangkat);
        });

        function chart_PangkatGolongan() {
            var processed_data = new Array();
            $.each(data.chart_pangkat_golongan_terakhir, function(i, item) {
                processed_data.push({
                    name: item.nama_pangkat,
                    y: item.total,
                });
            });
        return processed_data;
        }


        function chart_Pendidikan() {
            var proses_pendidikan = new Array();

            $.each(data.chart_pendidikan, function(i, item) {
                proses_pendidikan.push({
                    name: item.nama_m_tingkat_pendidikan,
                    y: item.total,
                });
            });
        return proses_pendidikan;
        }


        function chart_Eselonisasi() {
            var proses_eselonisasi = new Array();

            $.each(data.chart_eselon, function(i, item) {
                proses_eselonisasi.push({
                    name: item.nama_m_eselon,
                    y: item.total,
                });
            });
        return proses_eselonisasi;
        }

        function chart_JenisJabatan() {
            var proses_jenis_jabatan = new Array();

            $.each(data.chart_jenis_jabatan, function(i, item) {
                proses_jenis_jabatan.push({
                    name: item.nama_m_jenis_jabatan,
                    y: item.total,
                });
            });
        return proses_jenis_jabatan;
        }


        Highcharts.chart('container-pangkat-golongan', {
            chart: {
                plotBackgroundColor: null,
                plotBorderWidth: null,
                plotShadow: false,
                type: 'bar'
            },
            title: {
                text: 'JUMLAH DATA BERDASARKAN PANGKAT GOLONGAN'
            },
            xAxis: {
                categories:  processed_series,
                title: {
                    text: null
                }
            },

            tooltip: {
                pointFormat: '{series.name}: <b>{point.y}</b>'
            },
            plotOptions: {
                bar: {
                    dataLabels: {
                        enabled: true
                    }
                }
            },
            legend: {
                enabled:false
            },

            credits: {
                enabled: false
            },
            series: [{

                    name: 'Jumlah',
                    colorByPoint: true,
                    data:  chart_PangkatGolongan()
                    }]
        });

        // Build the chart
        Highcharts.chart('container-pendidikan', {
            chart: {
                plotBackgroundColor: null,
                plotBorderWidth: null,
                plotShadow: false,
                type: 'pie'
            },
            title: {
                text: 'JUMLAH PEGAWAI BERDASARKAN PENDIDIKAN'
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
                data:   chart_Pendidikan() ,


            }]
        });


        // Build the chart
        Highcharts.chart('container-eselonisasi', {
            chart: {
                plotBackgroundColor: null,
                plotBorderWidth: null,
                plotShadow: false,
                type: 'pie'
            },
            title: {
                text: 'JUMLAH PEGAWAI BERDASARKAN ESELONISASI'
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
                data: chart_Eselonisasi()
            }]
        });



        // Build the chart
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
                data: chart_JenisJabatan()
            }]
        });




    });
});













function Highcharts_skpd() {
    Highcharts.chart('container-skpd', {
        chart: {
            plotBackgroundColor: null,
            plotBorderWidth: null,
            plotShadow: false,
            type: 'column'
        },
        title: {
            text: 'JUMLAH DATA PEGAWAI BERDASARKAN SEMUA SKPD'
        },
        xAxis: {
            categories: [
                            @foreach ($chart_skpd as $record)
                            '{{$record->nama_m_skpd}}',
                            @endforeach
                        ],
            title: {
                text: null
            }
        },

        tooltip: {
            pointFormat: '{series.name}: <b>{point.y}</b>'
        },
        plotOptions: {
            bar: {
                dataLabels: {
                    enabled: true
                }
            }
        },
        legend: {
            enabled:false
        },

        credits: {
            enabled: false
        },
        scrollbar: {
            barBackgroundColor: 'gray',
            barBorderRadius: 7,
            barBorderWidth: 0,
            buttonBackgroundColor: 'gray',
            buttonBorderWidth: 0,
            buttonArrowColor: 'yellow',
            buttonBorderRadius: 7,
            rifleColor: 'yellow',
            trackBackgroundColor: 'white',
            trackBorderWidth: 1,
            trackBorderColor: 'silver',
            trackBorderRadius: 7
        },
        series: [{

                name: 'Jumlah',
                colorByPoint: true,
                data: [
                    @foreach ($chart_skpd as $record)
                    {{$record->total}},
                    @endforeach
                ],
                dataLabels: {
                enabled: true,
                rotation: -90,
                color: '#FFFFFF',
                align: 'right',
                format: '{point.y}', // one decimal
                y: -30, // 10 pixels down from the top
                style: {
                            fontSize: '13px',
                            fontFamily: 'Verdana, sans-serif'
                        }
                    }
                }]
    });
}





function Highcharts_PangkatGolongan() {
    Highcharts.chart('container-pangkat-golongan', {
        chart: {
            plotBackgroundColor: null,
            plotBorderWidth: null,
            plotShadow: false,
            type: 'bar'
        },
        title: {
            text: 'JUMLAH DATA BERDASARKAN PANGKAT GOLONGAN'
        },
        xAxis: {
            categories:  [
                            @foreach ($chart_pangkat_golongan_terakhir as $record)
                            '{{$record->nama_pangkat}}',
                            @endforeach
                        ],
            title: {
                text: null
            }
        },

        tooltip: {
            pointFormat: '{series.name}: <b>{point.y}</b>'
        },
        plotOptions: {
            bar: {
                dataLabels: {
                    enabled: true
                }
            }
        },
        legend: {
            enabled:false
        },

        credits: {
            enabled: false
        },
        series: [{

                name: 'Jumlah',
                colorByPoint: true,
                data: [
                            @foreach ($chart_pangkat_golongan_terakhir as $record)
                            { name: '{{$record->nama_pangkat}}', y: {{$record->total}} },
                            @endforeach
                    ]
                }]
    });
}



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


function Highcharts_Eselonisasi() {
    Highcharts.chart('container-eselonisasi', {
        chart: {
            plotBackgroundColor: null,
            plotBorderWidth: null,
            plotShadow: false,
            type: 'pie'
        },
        title: {
            text: 'JUMLAH PEGAWAI BERDASARKAN ESELONISASI'
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
                    @foreach ($chart_eselon as $record)
                    { name: '{{$record->nama_m_eselon}}', y: {{$record->total}} },
                    @endforeach
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


Highcharts_skpd();
Highcharts_Pendidikan();
Highcharts_JenisJabatan();


$('#reset').click(function(){
    $("#id_m_skpd").val('').trigger('change');
    Highcharts_skpd();
    Highcharts_PangkatGolongan();
    Highcharts_Pendidikan();
    Highcharts_Eselonisasi();
    Highcharts_JenisJabatan();
});


$('#data-table-responsive').DataTable({
    scrollY: "300px",
    processing: true,
    serverSide: true,
    searching:false,
    paginate:false,
    info:false,
    ajax:  "{{ route('table.tk')}}",
    columns: [
            {data: 'DT_RowIndex', name: 'id_kehadiran_pegawai', orderable:false},
            {data: 'nama_pegawai', name: 'nama_pegawai'},
            {data: 'tk', name: 'tk'},
            {data: 'action', name: 'action', orderable: false}
        ]
});

</script>

@endpush












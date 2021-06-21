<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Invoice</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <!-- ================== BEGIN BASE CSS STYLE ================== -->

    <style>
        body{
            font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
            color:#333;
            text-align:left;
            font-size:12px;
            margin:0;
        }

        .container{
            margin:0 auto;
            margin-top:35px;
            padding:20px;
            width:auto;
            height:auto;
            background-color:#fff;
        }
        caption{
            font-size:28px;
            margin-bottom:15px;
        }
        table{
            border:1px solid #333;
            border-collapse:collapse;
            margin:0 auto;
            width:auto;
        }
        td, tr, th{
            padding:12px;
            border:1px solid #333;
            width:185px;
        }
        th{
            background-color: #f0f0f0;
        }
        h4, p{
            margin:0px;
        }

    .left    { text-align: left;}
   .right   { text-align: right;}
   .center  { text-align: center;}
   .justify { text-align: justify;}

    </style>
</head>
<body>
    <div class="container">
            <caption>
                    Daftar Nominatif Usulan Pegawai
                </caption>
        @foreach ($nama_skpds as $item)
        <pre>
            <strong>Nama SKPD : {{$item->nama_m_skpd}}</strong>
        </pre>
       @endforeach
        <table>


            <tbody>
                <tr>
                    <th width="30%">No</th>
                    <th>Nip</th>
                    <th>Nama</th>
                    <th>Tempat</th>
                    <th>Tanggal Lahir</th>

                </tr>
                <tr>
                    <td colspan="5"><strong> A.Jabatan Struktural</strong></td>
                </tr>

                @php $no = 1; @endphp
                @foreach ($daftar_nominatif as $nominatif)
                @if ($nominatif->id_m_layanan_kenaikan_pangkat == 3)
                <tr>
                    <td>{{$no++}}</td>
                    <td>{{$nominatif->nip}}</td>
                    <td>{{$nominatif->gelar_depan}} {{$nominatif->nama_pegawai}} {{$nominatif->gelar_belakang}}</td>

                    <td></td>
                    <td></td>

                </tr>
                @endif
                @endforeach

                <tr>
                    <td colspan="5"><strong> B.Jabatan Fungsional</strong></td>
                </tr>

                @php $no = 1; @endphp
                @foreach ($daftar_nominatif as $nominatif)
                @if ($nominatif->id_m_layanan_kenaikan_pangkat == 2)

                <tr>
                    <td>{{$no++}}</td>
                    <td>{{$nominatif->nip}}</td>
                    <td>{{$nominatif->gelar_depan}} {{$nominatif->nama_pegawai}} {{$nominatif->gelar_belakang}}</td>

                    <td></td>
                    <td></td>

                </tr>
                @endif

                @endforeach

                <tr>
                    <td colspan="5"><strong> C.Jabatan Pelaksana</strong></td>
                </tr>

                @php $no = 1; @endphp
                @foreach ($daftar_nominatif as $nominatif)

                @if ($nominatif->id_m_layanan_kenaikan_pangkat == 4)


                <tr>
                    <td>{{$no++}}</td>
                    <td>{{$nominatif->nip}}</td>
                    <td>{{$nominatif->gelar_depan}} {{$nominatif->nama_pegawai}} {{$nominatif->gelar_belakang}}</td>
                    <td></td>
                    <td></td>

                </tr>
                @endif
                @endforeach


            </tbody>
        </table>


<br>
<br>
<br>
<br>
<br>

<div>
<pre>
    <strong>                                                                                                                                      Kepala Dinas</strong>
<br>
<br>
<br>
<br>

    <strong>                                                                                                                                   (__________________)</strong>

</pre>
</div>

    </div>
</body>
</html>

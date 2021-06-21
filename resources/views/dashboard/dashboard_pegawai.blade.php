@extends('layouts.sidebar_pegawai')

@section('content')

<div id="content" class="content">



			<div class="profile">
				<div class="profile-header">
					<!-- BEGIN profile-header-cover -->
					<div class="profile-header-cover"></div>
					<!-- END profile-header-cover -->
					<!-- BEGIN profile-header-content -->
					<div class="profile-header-content">
						<!-- BEGIN profile-header-img -->
						<div class="profile-header-img">
							<img src="../assets/img/user/user-13.jpg" alt="">
						</div>
						<!-- END profile-header-img -->
						<!-- BEGIN profile-header-info -->
						<div class="profile-header-info">
                        <h4 class="m-t-10 m-b-5">{{auth()->user()->profile->gelar_depan.' '.auth()->user()->profile->nama_pegawai.' '.auth()->user()->profile->gelar_belakang}}</h4>
                        <p class="m-b-10">{{ auth()->user()->nip }}</p>
							<a href="#" class="btn btn-xs btn-yellow">Edit Profile</a>
						</div>
						<!-- END profile-header-info -->
					</div>
					<!-- END profile-header-content -->
					<!-- BEGIN profile-header-tab -->
					<ul class="profile-header-tab underline nav nav-tabs">

                        <li class="nav-item"><a href="#profile" class="nav-link active" data-toggle="tab"><b>PROFIL</b></a></li>
                        <li class="nav-item"><a href="#keluarga" class="nav-link" data-toggle="tab"><b>KELUARGA</b></a></li>
                        <li class="nav-item"><a href="#anak" class="nav-link" data-toggle="tab"><b>ANAK</b></a></li>
                        <li class="nav-item"><a href="#suami_istri" class="nav-link" data-toggle="tab"><b>SUAMI/ISTRI</b></a></li>
                        <li class="nav-item"><a href="#pendidikan" class="nav-link" data-toggle="tab"><b>PENDIDIKAN FORMAL</b></a></li>
                        <li class="nav-item"><a href="#kursus" class="nav-link" data-toggle="tab"><b>KURSUS</b></a></li>
                        <li class="nav-item"><a href="#jabatan" class="nav-link" data-toggle="tab"><b>JABATAN</b></a></li>
                        <li class="nav-item"><a href="#pangkat_golongan" class="nav-link" data-toggle="tab"><b>PANGKAT/GOLONGAN</b></a></li>
                        <li class="nav-item"><a href="#penghargaan" class="nav-link" data-toggle="tab"><b>PENGHARGAAN</b></a></li>
                        <li class="nav-item"><a href="#dp3" class="nav-link" data-toggle="tab"><b>DP3</b></a></li>
                        <li class="nav-item"><a href="#hukuman_disiplin" class="nav-link" data-toggle="tab"><b>H.DISIPLIN</b></a></li>
                        <li class="nav-item"><a href="#prajabatan-cpns-pns" class="nav-link" data-toggle="tab"><b>PRAJAB.PNS/CPNS</b></a></li>
                        <li class="nav-item"><a href="#arsip" class="nav-link" data-toggle="tab"><b>ARSIP</b></a></li>

                    </ul>
					<!-- END profile-header-tab -->
				</div>
			</div>
			<!-- end profile -->
			<!-- begin profile-content -->
            <div class="profile-content">
            	<!-- begin tab-content -->
            	<div class="tab-content p-0">


            		<!-- begin #profile-about tab -->
            		<div class="tab-pane fade show active" id="profile">
						<div class="table-responsive">
							<table class="table table-profile">
								<tbody id="profil_pegawai">


								</tbody>
							</table>
						</div>
                    </div>


            		<div class="tab-pane fade in" id="keluarga">
                        <div class="panel panel-inverse">
                            <ol class="pull-right">
                                <a href="{{route('keluarga_kandung.create')}}" class="btn btn-sm btn-success modal-show" title="Create Kursus Pegawai" data-toggle="modal">Add New Data</a>
                            </ol>
                            <div class="panel-body">
                                <table id="data-keluarga" class="table table-striped table-bordered" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th class="text-nowrap">No</th>
                                            <th class="text-nowrap">Nama Keluarga</th>
                                            <th class="text-nowrap">Hubungan Keluarga</th>
                                            <th class="text-nowrap">Tempat Lahir</th>
                                            <th class="text-nowrap">Tanggal Lahir</th>
                                            <th class="text-nowrap">Status Hidup</th>
                                            <th class="text-nowrap">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>


            		<div class="tab-pane fade in" id="anak">
                        <div class="panel panel-inverse">
                                <ol class="pull-right">
                                    <a href="{{route('anak.create')}}" class="btn btn-sm btn-success modal-show" title="Create Kursus Pegawai" data-toggle="modal">Add New Data</a>
                                </ol>
                                <div class="panel-body">
                                    <table id="data-anak" class="table table-striped table-bordered" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th class="text-nowrap">No</th>
                                                <th class="text-nowrap">Nama Anak</th>
                                                <th class="text-nowrap">Jenis Kelamin</th>
                                                <th class="text-nowrap">Tempat Lahir</th>
                                                <th class="text-nowrap">Tanggal Lahir</th>
                                                <th class="text-nowrap">Status Anak</th>
                                                <th class="text-nowrap">Pekerjaan</th>
                                                <th class="text-nowrap">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                    </div>


            		<div class="tab-pane fade in" id="suami_istri">
                        <div class="panel panel-inverse">
                            <ol class="pull-right">
                                <a href="{{route('suami_istri.create')}}" class="btn btn-sm btn-success modal-show" title="Create Kursus Pegawai" data-toggle="modal">Add New Data</a>
                            </ol>
                            <div class="panel-body">
                                <table id="data-suami-istri" class="table table-striped table-bordered" style="width:100%">
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
                    </div>


                    <div class="tab-pane fade in" id="pendidikan">
                        <div class="panel panel-inverse">
                            <ol class="pull-right">
                                <a href="{{route('pendidikan.create')}}" class="btn btn-sm btn-success modal-show" title="Create Kursus Pegawai" data-toggle="modal">Add New Data</a>
                            </ol>
                            <div class="panel-body">
                                <table id="data-pendidikan" class="table table-striped table-bordered" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th class="text-nowrap">No</th>
                                            <th class="text-nowrap">Tingkat Pendidikan</th>
                                            <th class="text-nowrap">Tahun Lulus</th>
                                            <th class="text-nowrap">Nomor Ijazah</th>
                                            <th class="text-nowrap">Nama Sekolah</th>
                                            <th class="text-nowrap">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>


                    <div class="tab-pane fade in" id="kursus">
                        <div class="panel panel-inverse">
                            <ol class="pull-right">
                                <a href="{{route('kursus.create')}}" class="btn btn-sm btn-success modal-show" title="Create Kursus Pegawai" data-toggle="modal">Add New Data</a>
                            </ol>
                            <div class="panel-body">
                                <table id="data-kursus" class="table table-striped table-bordered" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th class="text-nowrap">No</th>
                                            <th class="text-nowrap">Nama Kursus</th>
                                            <th class="text-nowrap">Alamat Kursus</th>
                                            <th class="text-nowrap">Tanggal Mulai</th>
                                            <th class="text-nowrap">Tanggal Selesai</th>
                                            <th class="text-nowrap">Penyelenggara</th>
                                            <th class="text-nowrap">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>


                    <div class="tab-pane fade in" id="jabatan">
                        <div class="panel panel-inverse">
                            <ol class="pull-right">
                                <a href="{{route('jabatan.create')}}" class="btn btn-sm btn-success modal-show" title="Create Kursus Pegawai" data-toggle="modal">Add New Data</a>
                            </ol>
                            <div class="panel-body">
                                <table id="data-jabatan" class="table table-striped table-bordered" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th class="text-nowrap">No</th>
                                            <th class="text-nowrap">Jenis Jabatan</th>
                                            <th class="text-nowrap">Nama Jabatan</th>
                                            <th class="text-nowrap">Nama Subbidang</th>
                                            <th class="text-nowrap">Nama Bidang</th>
                                            <th class="text-nowrap">Nama SKPD</th>
                                            <th class="text-nowrap">TMT Jabatan</th>
                                            <th class="text-nowrap">Tanggal SK</th>
                                            <th class="text-nowrap">Nomor SK</th>
                                            <th class="text-nowrap">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>


                    <div class="tab-pane fade in" id="pangkat_golongan">
                        <div class="panel panel-inverse">
                            <ol class="pull-right">
                                <a href="{{route('golongan.create')}}" class="btn btn-sm btn-success modal-show" title="Create Kursus Pegawai" data-toggle="modal">Add New Data</a>
                            </ol>
                            <div class="panel-body">
                                <table id="data-pangkat-golongan" class="table table-striped table-bordered" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th class="text-nowrap">No</th>
                                            <th class="text-nowrap">Golongan/Ruang</th>
                                            <th class="text-nowrap">Nama Pangkat</th>
                                            <th class="text-nowrap">Nomor SK</th>
                                            <th class="text-nowrap">Tanggal SK</th>
                                            <th class="text-nowrap">TMT Golongan</th>
                                            <th class="text-nowrap">Nomor BKN</th>
                                            <th class="text-nowrap">Tanggal BKN</th>
                                            <th class="text-nowrap">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>


                    <div class="tab-pane fade in" id="penghargaan">
                        <div class="panel panel-inverse">
                            <ol class="pull-right">
                                <a href="{{route('penghargaan.create')}}" class="btn btn-sm btn-success modal-show" title="Create Kursus Pegawai" data-toggle="modal">Add New Data</a>
                            </ol>
                            <div class="panel-body">
                                <table id="data-penghargaan" class="table table-striped table-bordered" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th class="text-nowrap">No</th>
                                            <th class="text-nowrap">Nama Penghargaan</th>
                                            <th class="text-nowrap">Tanggal Perolehan</th>
                                            <th class="text-nowrap">Nomor</th>
                                            <th class="text-nowrap">Negara Instansi Pemberi</th>
                                            <th class="text-nowrap">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>


                    <div class="tab-pane fade in" id="dp3">
                        <div class="panel panel-inverse">
                            <ol class="pull-right">
                                <a href="{{route('dp3.create')}}" class="btn btn-sm btn-success modal-show" title="Create Kursus Pegawai" data-toggle="modal">Add New Data</a>
                            </ol>
                            <div class="panel-body">
                                <table id="data-dp3" class="table table-striped table-bordered" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th class="text-nowrap">No</th>
                                            <th class="text-nowrap">Tahun Penilaian</th>
                                            <th class="text-nowrap">Nama Pegawai</th>
                                            <th class="text-nowrap">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>


                    <div class="tab-pane fade in" id="hukuman_disiplin">
                        <div class="panel panel-inverse">
                            <ol class="pull-right">
                                <a href="{{route('hukuman.create')}}" class="btn btn-sm btn-success modal-show" title="Create Kursus Pegawai" data-toggle="modal">Add New Data</a>
                            </ol>
                            <div class="panel-body">
                                <table id="data-hukuman-disiplin" class="table table-striped table-bordered" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th class="text-nowrap">No</th>
                                            <th class="text-nowrap">Nama Jenis HD</th>
                                            <th class="text-nowrap">Nama Jenis Pelanggaran</th>
                                            <th class="text-nowrap">Nomor SK</th>
                                            <th class="text-nowrap">Tanggal SK</th>
                                            <th class="text-nowrap">TMT HD</th>
                                            <th class="text-nowrap">Masa HD</th>
                                            <th class="text-nowrap">Tanggal Akhir HD</th>
                                            <th class="text-nowrap">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>


                    <div class="tab-pane fade show" id="prajabatan-cpns-pns">
                            <ol class="pull-right">
                                <a href="{{route('prajabatan_cpns_pns.edit', auth()->user()->nip)}}" class="modal-show edit btn btn-icon btn-primary btn-sm" title="Update Data Prajabatan"><i class="fa fa-edit"></i></button></a>

                            </ol>
                        <div class="table-responsive">

                            <div class="panel-body">
                                    <table class="table table-striped">
                                    <tbody id="prajabatan_cpns_pns">

                                    </tbody>
                                    </table>
                                </div>

                        </div>
                    </div>


                    <div class="tab-pane fade in" id="arsip">
                            <div class="panel panel-inverse">
                                <ol class="pull-right">
                                    <a href="{{route('kursus.create')}}" class="btn btn-sm btn-success modal-show" title="Create Kursus Pegawai" data-toggle="modal">Add New Data</a>
                                </ol>
                                <div class="panel-body">

                                    data arsip

                                </div>
                            </div>
                        </div>






				</div>
            </div>



</div>
<!-- end #content -->

@endsection

@push('scripts')


<script type="text/javascript">

    $.ajax({
    dataType: 'json',
    type:'GET',
    url: "{{ route('table.profil_show', auth()->user()->nip)}}",
    }).done(function(data){
        $('#profil_pegawai').empty();
        $.each(data.profil_pegawai, function(index, elementdata){
            $('#profil_pegawai').append("<tr>"+
                                            "<td width='150px'>NIP Baru</td>"+
                                            "<td width='10px'>:</td>"+
                                            "<td>"+elementdata.nip+"</td>"+
                                        "</tr>"+
                                        "<tr>"+
                                            "<td width='150px'>NIP Lama</td>"+
                                            "<td width='10px'>:</td>"+
                                            "<td>"+elementdata.nip_lama+"</td>"+
                                        "</tr>"+
                                        "<tr>"+
                                            "<td width='150px'>Kegemaran</td>"+
                                            "<td width='10px'>:</td>"+
                                            "<td>"+elementdata.gelar_depan+" "+elementdata.nama_pegawai+" "+elementdata.gelar_belakang+"</td>"+
                                        "</tr>"+
                                        "<tr>"+
                                            "<td width='150px'>Tempat/Tanggal Lahir</td>"+
                                            "<td width='10px'>:</td>"+
                                            "<td>"+elementdata.tempat_lahir+" / "+elementdata.tanggal_lahir+"</td>"+
                                        "</tr>"+
                                        "<tr>"+
                                            "<td width='150px'>Jenis Kelamin</td>"+
                                            "<td width='10px'>:</td>"+
                                            "<td>"+elementdata.jenis_kelamin+"</td>"+
                                        "</tr>"+
                                        "<tr>"+
                                            "<td width='150px'>Agama</td>"+
                                            "<td width='10px'>:</td>"+
                                            "<td>"+elementdata.nama_m_agama+"</td>"+
                                        "</tr>"+
                                        "<tr>"+
                                            "<td width='150px'>Status Pernikahan</td>"+
                                            "<td width='10px'>:</td>"+
                                            "<td>"+elementdata.nama_m_pernikahan+"</td>"+
                                        "</tr>"+
                                        "<tr>"+
                                            "<td width='150px'>Nomor KTP</td>"+
                                            "<td width='10px'>:</td>"+
                                            "<td>"+elementdata.nomor_ktp+"</td>"+
                                        "</tr>"+
                                        "<tr>"+
                                            "<td width='150px'>Nomor HP</td>"+
                                            "<td width='10px'>:</td>"+
                                            "<td>"+elementdata.nomor_hp+"</td>"+
                                        "</tr>"+
                                        "<tr>"+
                                            "<td width='150px'>Email</td>"+
                                            "<td width='10px'>:</td>"+
                                            "<td>"+elementdata.email_pegawai+"</td>"+
                                        "</tr>"+
                                        "<tr>"+
                                            "<td width='150px'>Alamat</td>"+
                                            "<td width='10px'>:</td>"+
                                            "<td>"+elementdata.alamat+"</td>"+
                                        "</tr>"+
                                        "<tr>"+
                                            "<td width='150px'>Nomor NPWP</td>"+
                                            "<td width='10px'>:</td>"+
                                            "<td>"+elementdata.nama_m_agama+"</td>"+
                                        "</tr>"+
                                        "<tr>"+
                                            "<td width='150px'>Nomor BPJS</td>"+
                                            "<td width='10px'>:</td>"+
                                            "<td>"+elementdata.nomor_bpjs+"</td>"+
                                        "</tr>" );
        });


        $('#prajabatan_cpns_pns').empty();
        $.each(data.prajabatan_cpns_pns, function(index, elementdata){
            $('#prajabatan_cpns_pns').append("<tr>"+
                                            "<td width='150px'>Status Pegawai</td>"+
                                            "<td width='10px'>:</td>"+
                                            "<td>"+elementdata.nama_m_status_kepegawaian+"</td>"+
                                            "</tr>"+
                                            "<tr>"+
                                                "<td width='150px'>TMT CPNS</td>"+
                                                "<td width='10px'>:</td>"+
                                                "<td>"+elementdata.tmt_cpns+"</td>"+
                                            "</tr>"+
                                            "<tr>"+
                                                "<td width='150px'>Tanggal SK CPNS</td>"+
                                                "<td width='10px'>:</td>"+
                                                "<td>"+elementdata.tanggal_sk_cpns+"</td>"+
                                            "</tr>"+
                                            "<tr>"+
                                                "<td width='150px'>TMT PNS</td>"+
                                                "<td width='10px'>:</td>"+
                                                "<td>"+elementdata.tmt_pns+"</td>"+
                                            "</tr>"+
                                            "<tr>"+
                                                "<td width='150px'>Tanggal SK PNS</td>"+
                                                "<td width='10px'>:</td>"+
                                                "<td>"+elementdata.tanggal_sk_pns+"</td>"+
                                            "</tr>"+
                                            "<tr>"+
                                                "<td width='150px'>Nomor SK PNS</td>"+
                                                "<td width='10px'>:</td>"+
                                                "<td>"+elementdata.nomor_sk_pns+"</td>"+
                                            "</tr>"+
                                            "<tr>"+
                                                "<td width='150px'>Nomor Kartu Suami/Istri</td>"+
                                                "<td width='10px'>:</td>"+
                                                "<td>"+elementdata.karis_karsu+"</td>"+
                                            "</tr>"+
                                            "<tr>"+
                                                "<td width='150px'>Nomor Karpeg</td>"+
                                                "<td width='10px'>:</td>"+
                                                "<td>"+elementdata.karpeg+"</td>"+
                                            "</tr>" );
        });



    });



    $('#data-keluarga').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('table.keluarga_kandung', auth()->user()->nip)}}",
        columns: [
                {data: 'DT_RowIndex', name: 'id_keluarga_kandung'},
                {data: 'nama_keluarga', name: 'nama_keluarga'},
                {data: 'nama_m_hubungan_keluarga', name: 'nama_m_hubungan_keluarga'},
                {data: 'nama_kecamatan', name: 'nama_kecamatan'},
                {data: 'tanggal_lahir', name: 'tanggal_lahir'},
                {data: 'status_hidup', name: 'status_hidup'},
                {data: 'action', name: 'action', orderable: false}
            ]
    });


    $('#data-anak').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('table.anak',auth()->user()->nip)}}",
        columns: [
                {data: 'DT_RowIndex', name: 'id_anak'},
                {data: 'nama_anak', name: 'nama_anak'},
                {data: 'jenis_kelamin_anak', name: 'jenis_kelamin_anak'},
                {data: 'tempat_lahir_anak', name: 'tempat_lahir_anak'},
                {data: 'tanggal_lahir_anak', name: 'tanggal_lahir_anak'},
                {data: 'status_anak', name: 'status_anak'},
                {data: 'pekerjaan', name: 'pekerjaan'},
                {data: 'action', name: 'action', orderable: false}
            ]
    });


    $('#data-suami-istri').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('table.suami_istri', auth()->user()->nip)}}",
        columns: [
                {data: 'DT_RowIndex', name: 'id_suami_istri'},
                {data: 'nama_suami_istri', name: 'nama_suami_istri'},
                {data: 'tanggal_menikah', name: 'tanggal_menikah'},
                {data: 'nomor_kartu_su_is', name: 'nomor_kartu_su_is'},
                {data: 'status_pns', name: 'status_pns'},
                {data: 'action', name: 'action', orderable: false}
            ]
    });


    $('#data-pendidikan').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('table.pendidikan', auth()->user()->nip)}}",
        columns: [
                {data: 'DT_RowIndex', name: 'id_pendidikan_pegawai'},
                {data: 'nama_m_tingkat_pendidikan', name: 'nama_m_tingkat_pendidikan'},
                {data: 'tahun_lulus', name: 'tahun_lulus'},
                {data: 'nomor_ijazah', name: 'nomor_ijazah'},
                {data: 'nama_sekolah', name: 'nama_sekolah'},
                {data: 'action', name: 'action', orderable: false}
            ]
    });


    $('#data-kursus').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('table.kursus', auth()->user()->nip)}}",
        columns: [
                {data: 'DT_RowIndex', name: 'id_kursus'},
                {data: 'nama_kursus', name: 'nama_kursus'},
                {data: 'alamat_kursus', name: 'alamat_kursus'},
                {data: 'tanggal_mulai', name: 'tanggal_mulai'},
                {data: 'tanggal_selesai', name: 'tanggal_selesai'},
                {data: 'penyelenggara', name: 'penyelenggara'},
                {data: 'action', name: 'action', orderable: false}
            ]
    });


    $('#data-jabatan').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('table.jabatan', auth()->user()->nip)}}",
        columns: [
                {data: 'DT_RowIndex', name: 'id_jabatan'},
                {data: 'nama_m_jenis_jabatan', name: 'nama_m_jenis_diklat'},
                {data: 'nama_m_jabatan', name: 'nama_m_jabatan'},
                {data: 'nama_m_skpd_subbidang', name: 'nama_m_skpd_subbidang'},
                {data: 'nama_m_skpd_bidang', name: 'nama_m_skpd_bidang'},
                {data: 'nama_m_skpd', name: 'nama_m_skpd'},
                {data: 'tmt_jabatan', name: 'tmt_jabatan'},
                {data: 'tanggal_sk', name: 'tanggal_sk'},
                {data: 'nomor_sk', name: 'nomor_sk'},
                {data: 'action', name: 'action', orderable: false}
            ]
    });


    $('#data-pangkat-golongan').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('table.golongan',auth()->user()->nip)}}",
        columns: [
                {data: 'DT_RowIndex', name: 'nip'},
                {data: 'nama_golongan', name: 'nama_golongan'},
                {data: 'nama_pangkat', name: 'nama_pangkat'},
                {data: 'nomor_sk', name: 'nomor_sk'},
                {data: 'tanggal_sk', name: 'tanggal_sk'},
                {data: 'tmt_golongan', name: 'tmt_golongan'},
                {data: 'nomor_bkn', name: 'nomor_bkn'},
                {data: 'tanggal_bkn', name: 'tanggal_bkn'},
                {data: 'action', name: 'action', orderable: false}
            ]
    });


    $('#data-penghargaan').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('table.penghargaan', auth()->user()->nip)}}",
        columns: [
                {data: 'DT_RowIndex', name: 'id_penghargaan'},
                {data: 'nama_penghargaan', name: 'nama_penghargaan'},
                {data: 'tanggal_perolehan', name: 'tanggal_perolehan'},
                {data: 'nomor', name: 'nomor'},
                {data: 'negara_instansi_pemberi', name: 'negara_instansi_pemberi'},
                {data: 'action', name: 'action', orderable: false}
            ]
    });


    $('#data-dp3').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('table.dp3', auth()->user()->nip)}}",
        columns: [
                {data: 'DT_RowIndex', name: 'id_dp3'},
                {data: 'tahun_penilaian', name: 'tahun_penilaian'},
                {data: 'nama_pegawai', name: 'nama_pegawai'},
                {data: 'action', name: 'action', orderable: false}
            ]
    });


    $('#data-hukuman-disiplin').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('table.hukuman', auth()->user()->nip)}}",
        columns: [
                {data: 'DT_RowIndex', name: 'id_hukuman_hd'},
                {data: 'nama_m_jenis_hd', name: 'nama_m_jenis_hd'},
                {data: 'nama_m_jenis_pelanggaran_hd', name: 'nama_m_jenis_pelanggaran_hd'},
                {data: 'nomor_sk_hd', name: 'nomor_sk_hd'},
                {data: 'tanggal_sk_hd', name: 'tanggal_sk_hd'},
                {data: 'tmt_hd', name: 'tmt_hd'},
                {data: 'masa_hd', name: 'masa_hd'},
                {data: 'tanggal_akhir_hd', name: 'tanggal_akhir_hd'},
                {data: 'action', name: 'action', orderable: false}
            ]
    });



    </script>



@endpush

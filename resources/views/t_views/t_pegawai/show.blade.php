
<!-- begin #content -->
			<!-- begin profile -->
			<div class="profile">
				<div class="profile-header">
					<!-- BEGIN profile-header-cover -->
					<div class="profile-header-cover"></div>
					<!-- END profile-header-cover -->
					<!-- BEGIN profile-header-content -->
					<div class="profile-header-content">
						<!-- BEGIN profile-header-img -->
						<div class="profile-header-img">
							<a href="#"><img src="../assets/img/user/user-13.jpg" alt=""></a>
						</div>
						<!-- END profile-header-img -->
						<!-- BEGIN profile-header-info -->
						<div class="profile-header-info">
							<h4 class="m-t-10 m-b-5">{{ $model->gelar_depan }} {{ $model->nama_pegawai }} {{ $model->gelar_belakang }}</h4>
                            <strong>{{ $model->nip }}</strong></br>
                            <strong>{{ $model->nama_pangkat }}.{{ $model->nama_golongan }}</strong> </br>
                            <strong>{{ $model->nama_m_jabatan }}</strong>

						</div>
						<!-- END profile-header-info -->
					</div>
					<!-- END profile-header-content -->
					<!-- BEGIN profile-header-tab -->
					<ul class="profile-header-tab underline nav nav-tabs">

                        <li class="nav-item"><a href="#profile" class="nav-link active" data-toggle="tab"><b>PROFIL</b></a></li>
                        <li class="nav-item"><a href="#hukuman_disiplin" class="nav-link" data-toggle="tab"><b>H.DISIPLIN</b></a></li>
                        <li class="nav-item"><a href="#data_kehadiran" class="nav-link" data-toggle="tab"><b>KEHADIRAN</b></a></li>
                        <li class="nav-item"><a href="#data_panggilan" class="nav-link" data-toggle="tab"><b>PANGGILAN PEMERIKSAAN</b></a></li>
                        <li class="nav-item"><a href="#data_sk" class="nav-link" data-toggle="tab"><b>SK HUKUMAN DISIPLIN</b></a></li>

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
						<div class="row">
                            <div class="col-md-6">
                                <table class="table table-profile">
                                <tbody id="profil-pegawai">

                                </tbody>
                                </table>
                            </div>

                            <div class="col-md-6">
                                    <table class="table table-profile">
                                        <tbody id="profil-pegawai2">


                                        </tbody>
                                    </table>
                                </div>
						</div>
                    </div>


            		<div class="tab-pane fade in" id="keluarga">
                        <div class="panel panel-inverse">
                            <ol class="pull-right">
                                <a href="{{route('create_data.keluarga_kandung',Request::segment(2))}}" class="btn btn-sm btn-success modal-show" title="Create Keluarga" data-toggle="modal">Add New Data</a>
                            </ol>
                            <div class="panel-body">
                                <table id="data-keluarga" class="table table-striped table-bordered data" style="width:100%">
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
                                    <a href="{{route('create_data.anak', Request::segment(2))}}" class="btn btn-sm btn-success modal-show" title="Create Anak" data-toggle="modal">Add New Data</a>
                                </ol>
                                <div class="panel-body">
                                    <table id="data-anak" class="table table-striped table-bordered data" style="width:100%">
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
                                <a href="{{route('create_data.suami_istri', Request::segment(2))}}" class="btn btn-sm btn-success modal-show" title="Create Suami/Istri" data-toggle="modal">Add New Data</a>
                            </ol>
                            <div class="panel-body">
                                <table id="data-suami-istri" class="table table-striped table-bordered data" style="width:100%">
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
                                <a href="{{route('create_data.pendidikan',Request::segment(2))}}" class="btn btn-sm btn-success modal-show" title="Create Pendidikan" data-toggle="modal">Add New Data</a>
                            </ol>
                            <div class="panel-body">
                                <table id="data-pendidikan" class="table table-striped table-bordered data" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th class="text-nowrap">No</th>
                                            <th class="text-nowrap">Tingkat Pendidikan</th>
                                            <th class="text-nowrap">Tahun Lulus</th>
                                            <th class="text-nowrap">Nomor Ijazah</th>
                                            <th class="text-nowrap">File Ijazah</th>
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


                    <div class="tab-pane fade in" id="diklat">
                        <div class="panel panel-inverse">
                            <ol class="pull-right">
                                <a href="{{route('create_data.diklat', Request::segment(2))}}" class="btn btn-sm btn-success modal-show" title="Create Diklat" data-toggle="modal">Add New Data</a>
                            </ol>
                            <div class="panel-body">
                                <table id="data-diklat" class="table table-striped table-bordered data" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th class="text-nowrap">No</th>
                                            <th class="text-nowrap">Jenis Diklat</th>
                                            <th class="text-nowrap">Nama Diklat</th>
                                            <th class="text-nowrap">Tanggal Mulai/Selesai</th>
                                            <th class="text-nowrap">Penyelenggara</th>
                                            <th class="text-nowrap">Alamat Diklat</th>
                                            <th class="text-nowrap">File Diklat</th>
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
                                <a href="{{route('create_data.jabatan', Request::segment(2))}}" class="btn btn-sm btn-success modal-show" title="Create Jabatan Pegawai" data-toggle="modal">Add New Data</a>
                            </ol>
                            <div class="panel-body">
                                <table id="data-jabatan" class="table table-striped table-bordered data" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th class="text-nowrap">No</th>
                                            <th class="text-nowrap">Jenis / TMT Jabatan</th>
                                            <th class="text-nowrap">Nama Jabatan</th>
                                            <th class="text-nowrap">Nama Bidang</th>
                                            <th class="text-nowrap">Nama SKPD</th>
                                            <th class="text-nowrap">Nomor / Tanggal SK</th>
                                            <th class="text-nowrap">File Jabatan</th>
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
                                <a href="{{route('create_data.golongan', Request::segment(2))}}" class="btn btn-sm btn-success modal-show" title="Create Golongan Pegawai" data-toggle="modal">Add New Data</a>
                            </ol>
                            <div class="panel-body">
                                <table id="data-pangkat-golongan" class="table table-striped table-bordered data" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th class="text-nowrap">No</th>
                                            <th class="text-nowrap">Nama Pangkat/Golongan</th>
                                            <th class="text-nowrap">Nomor/Tanggal SK</th>
                                            <th class="text-nowrap">TMT Golongan</th>
                                            <th class="text-nowrap">Nomor/Tanggal BKN</th>
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
                                <a href="{{route('create_data.penghargaan', Request::segment(2))}}" class="btn btn-sm btn-success modal-show" title="Create Penghargaan Pegawai" data-toggle="modal">Add New Data</a>
                            </ol>
                            <div class="panel-body">
                                <table id="data-penghargaan" class="table table-striped table-bordered data" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th class="text-nowrap">No</th>
                                            <th class="text-nowrap">Nama Penghargaan</th>
                                            <th class="text-nowrap">Tanggal Perolehan</th>
                                            <th class="text-nowrap">Nomor</th>
                                            <th class="text-nowrap">Negara Instansi Pemberi</th>
                                            <th class="text-nowrap">File Penghargaan</th>
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
                                <a href="{{route('create_data.dp3', Request::segment(2))}}" class="btn btn-sm btn-success modal-show" title="Create DP3" data-toggle="modal">Add New Data</a>
                            </ol>
                            <div class="panel-body">
                                <table id="data-dp3" class="table table-striped table-bordered data" style="width:100%">
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
                                <a href="{{route('create_data.hukuman', Request::segment(2))}}" class="btn btn-sm btn-success modal-show" title="Create Hukuman" data-toggle="modal">Add New Data</a>
                            </ol>
                            <div class="panel-body">
                                <table id="data-hukuman-disiplin" class="table table-striped table-bordered data" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th class="text-nowrap">No</th>
                                            <th class="text-nowrap">Jenis HD</th>
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



                    <div class="tab-pane fade in" id="data_kehadiran">
                            <div class="panel panel-inverse">

                                    <form method="POST" id="search-form" role="form">
                                            <div class="form-group row m-b-11">
                                                <div class="col-md-12">
                                                    <div class="row row-space-20">

                                                        <label class="col-md-1 text-md-right col-form-label">Tahun</label>
                                                        <div class="col-4">
                                                            <div class="input-group date datepicker-default"   data-date-format="yyyy" >
                                                                {!! Form::text('tahun',null, ['class' => 'form-control', 'placeholder'=>'Tahun', 'id'=>'tahun']) !!}
                                                                <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                                            </div>
                                                        </div>

                                                        <label class="col-md-1 text-md-right col-form-label">Bulan</label>
                                                        <div class="col-4">
                                                            <div class="input-group date2 datepicker-default"   data-date-format="m" >
                                                                {!! Form::text('bulan',null, ['class' => 'form-control', 'placeholder'=>'Bulan', 'id'=>'bulan']) !!}
                                                                <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                                            </div>
                                                        </div>


                                                        <span class="col-auto">
                                                            <button class="btn btn-primary" type="submit"><i class="fe fe-search"></i>  Search</button>
                                                     </span>


                                                    </div>
                                                </div>


                                            </div>

                                        </form>

                                <div class="panel-body">
                                    <table id="data-kehadiran" class="table table-striped table-bordered data" style="width:100%">
                                        <thead>
                                                <tr>
                                                    <th class="text-nowrap">No</th>
                                                    <th class="text-nowrap">Nama Pegawai</th>
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
                        </div>



                        <div class="tab-pane fade in" id="data_panggilan">
                                <div class="panel panel-inverse">

                                    <div class="panel-body">
                                        <table id="data-panggilan" class="table table-striped table-bordered data" style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th class="text-nowrap">No</th>
                                                    <th class="text-nowrap">Nomor Surat</th>
                                                    <th class="text-nowrap">Hari</th>
                                                    <th class="text-nowrap">Tanggal</th>
                                                    <th class="text-nowrap">Jam</th>
                                                    <th class="text-nowrap">Tempat</th>
                                                    <th class="text-nowrap">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>



                            <div class="tab-pane fade in" id="data_sk">
                                    <div class="panel panel-inverse">

                                        <div class="panel-body">
                                            <table id="data-sk" class="table table-striped table-bordered data" style="width:100%">
                                                <thead>
                                                    <tr>
                                                        <th class="text-nowrap">No</th>
                                                        <th class="text-nowrap">Nomor Keputusan</th>
                                                        <th class="text-nowrap">Tanggal Laporan</th>
                                                        <th class="text-nowrap">Tanggal Pelanggaran</th>
                                                        <th class="text-nowrap">Pasal-Angka-Huruf</th>
                                                        <th class="text-nowrap">Tanggal Di Hukum</th>
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
                                <a href="{{route('prajabatan_cpns_pns.edit', Request::segment(2))}}" class="modal-show edit btn btn-icon btn-primary btn-sm" title="Update Data Prajabatan"><i class="fa fa-edit"></i></button></a>

                            </ol>
                            <div class="row">
                                <div class="col-md-6">
                                    <table class="table table-profile">
                                    <tbody id="prajabatan_cpns_pns">

                                    </tbody>
                                    </table>
                                </div>

                                <div class="col-md-6">
                                        <table class="table table-profile">
                                            <tbody id="prajabatan_cpns_pns2">


                                            </tbody>
                                        </table>
                                    </div>
                            </div>
                    </div>


                    <div class="tab-pane fade in" id="arsip">
                            <div class="panel panel-inverse">

                                <div class="panel-body">

                                    <table id="data-arsip" class="table table-striped table-bordered" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th class="text-nowrap">No</th>
                                                <th class="text-nowrap">Nama File</th>
                                                <th class="text-nowrap">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php $no = 1; $jml_nip = strlen($model->nip) @endphp
                                            @foreach ($files as $items=>$item)
                                            <tr>
                                                <td>{{ $no++ }}</td>
                                                <td>{{substr($item,8+$jml_nip)}}</td>
                                                <td>
                                                    <a href="{{url('preview_file_pegawai/'.$model->nip.'/'.substr($item,8+$jml_nip))}}"  title="Preview File {{substr($item,8+$jml_nip)}}" class="btn-show-preview btn btn-inverse btn-sm btn-block"><strong><i class="fa fa-eye"></i> View</strong></a>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>

                                </div>
                            </div>
                        </div>



                        <div class="tab-pane fade in" id="mutasi">
                            <div class="panel panel-inverse">
                                <ol class="pull-right">
                                    <a href="{{route('create_data.mutasi', Request::segment(2))}}" class="btn btn-sm btn-success modal-show" title="Create Mutasi" data-toggle="modal">Add New Data</a>
                                </ol>
                                <div class="panel-body">
                                    <table id="data-mutasi" class="table table-striped table-bordered data" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th class="text-nowrap">No</th>
                                                <th class="text-nowrap">Jenis Mutasi</th>
                                                <th class="text-nowrap">Instansi/Unit Kerja</th>
                                                <th class="text-nowrap">Nomor/Tanggal SK</th>
                                                <th class="text-nowrap">File SK</th>
                                                <th class="text-nowrap">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>


                        <div class="tab-pane fade in" id="cuti">
                            <div class="panel panel-inverse">
                                <ol class="pull-right">
                                    <a href="{{route('create_data.cuti', Request::segment(2))}}" class="btn btn-sm btn-success modal-show" title="Create Cuti" data-toggle="modal">Add New Data</a>
                                </ol>
                                <div class="panel-body">
                                    <table id="data-cuti" class="table table-striped table-bordered data" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th class="text-nowrap">No</th>
                                                <th class="text-nowrap">Jenis Cuti</th>
                                                <th class="text-nowrap">Nomor SK</th>
                                                <th class="text-nowrap">Tanggal SK</th>
                                                <th class="text-nowrap">File SK</th>
                                                <th class="text-nowrap">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>


                        <div class="tab-pane fade in" id="kgb">
                            <div class="panel panel-inverse">
                                <ol class="pull-right">
                                    <a href="{{route('create_data.kgb', Request::segment(2))}}" class="btn btn-sm btn-success modal-show" title="Create KGB" data-toggle="modal">Add New Data</a>
                                </ol>
                                <div class="panel-body">
                                    <table id="data-kgb" class="table table-striped table-bordered data" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th class="text-nowrap">No</th>
                                                <th class="text-nowrap">Pangkat/Golongan</th>
                                                <th class="text-nowrap">TMT KGB</th>
                                                <th class="text-nowrap">Gaji Pokok</th>
                                                <th class="text-nowrap">Nomor SK</th>
                                                <th class="text-nowrap">Tanggal Sk</th>
                                                <th class="text-nowrap">File SK KGB</th>
                                                <th class="text-nowrap">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>


                        <div class="tab-pane fade in" id="tugas_belajar">
                            <div class="panel panel-inverse">
                                <ol class="pull-right">
                                    <a href="{{route('create_data.tugas_belajar', Request::segment(2))}}" class="btn btn-sm btn-success modal-show" title="Create Tugas Belajar" data-toggle="modal">Add New Data</a>
                                </ol>
                                <div class="panel-body">
                                    <table id="data-tugas_belajar" class="table table-striped table-bordered data" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th class="text-nowrap">No</th>
                                                <th class="text-nowrap">Nama Sekolah/Universitas</th>
                                                <th class="text-nowrap">Nomor SK</th>
                                                <th class="text-nowrap">Tanggal Sk</th>
                                                <th class="text-nowrap">File SK KGB</th>
                                                <th class="text-nowrap">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>


                        <div class="tab-pane fade in" id="angka_kredit">
                                <div class="panel panel-inverse">
                                    <ol class="pull-right">
                                        <a href="{{route('create_data.pak', Request::segment(2))}}" class="btn btn-sm btn-success modal-show" title="Create PAK" data-toggle="modal">Add New Data</a>
                                    </ol>
                                    <div class="panel-body">
                                        <table id="data-pak" class="table table-striped table-bordered data" style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th class="text-nowrap">No</th>
                                                    <th class="text-nowrap">Nomor SK</th>
                                                    <th class="text-nowrap">Tanggal Sk</th>
                                                    <th class="text-nowrap">Kredit Utama</th>
                                                    <th class="text-nowrap">Kredit Penunjang </th>
                                                    <th class="text-nowrap">Total Kredit</th>
                                                    <th class="text-nowrap">Jabatan</th>
                                                    <th class="text-nowrap">File PAK</th>
                                                    <th class="text-nowrap">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>





				</div>
            </div>

<script type="text/javascript">

$.ajax({
dataType: 'json',
type:'GET',
url: "{{ route('table.profil_show', Request::segment(2))}}",
}).done(function(data){
    $('#profil-pegawai').empty();
    $('#profil-pegawai2').empty();
    $.each(data.profil_pegawai, function(index, elementdata){
        console.log(elementdata);
        $('#profil-pegawai').append("<tr>"+
                                        "<td  >NIP Baru</td>"+
                                        "<td  >:</td>"+
                                        "<td>{{Request::segment(2)}}</td>"+
                                    "</tr>"+
                                    "<tr>"+
                                        "<td width='150px'>NIP Lama</td>"+
                                        "<td width='10px'>:</td>"+
                                        "<td>"+elementdata.nip_lama+"</td>"+
                                    "</tr>"+
                                    "<tr>"+
                                        "<td width='150px'>Nama</td>"+
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
                                        "<td width='150px'>Email</td>"+
                                        "<td width='10px'>:</td>"+
                                        "<td>"+elementdata.email_pegawai+"</td>"+
                                    "</tr>"+
                                    "<tr>"+
                                        "<td width='150px'>Nomor HP</td>"+
                                        "<td width='10px'>:</td>"+
                                        "<td>"+elementdata.nomor_hp+"</td>"+
                                    "</tr>"+
                                    "<tr>"+
                                        "<td width='150px'>Alamat</td>"+
                                        "<td width='10px'>:</td>"+
                                        "<td>"+elementdata.alamat+"</td>"+
                                    "</tr>");

        $('#profil-pegawai2').append("<tr>"+
                                        "<td width='150px'>Status Pernikahan</td>"+
                                        "<td width='10px'>:</td>"+
                                        "<td>"+elementdata.nama_m_pernikahan+"</td>"+
                                    "</tr>"+
                                    "<tr>"+
                                        "<td width='150px'>File Surat Nikah</td>"+
                                        "<td width='10px'>:</td>"+
                                        "<td><a href='download_surat_nikah/{{Request::segment(2)}}'><i class='fas fa-lg fa-fw m-r-10 fa-cloud-download-alt'></i>"+elementdata.nama_file_surat_nikah+"</a></td>"+
                                    "</tr>"+
                                    "<tr>"+
                                        "<td width='150px'>Nomor KTP</td>"+
                                        "<td width='10px'>:</td>"+
                                        "<td>"+elementdata.nomor_ktp+"</td>"+
                                    "</tr>"+
                                    "<tr>"+
                                        "<td width='150px'>File KTP</td>"+
                                        "<td width='10px'>:</td>"+
                                        "<td><a href='/download_ktp/{{Request::segment(2)}}'><i class='fas fa-lg fa-fw m-r-10 fa-cloud-download-alt'></i>"+elementdata.nama_file_ktp+"</a></td>"+
                                    "</tr>"+
                                    "<tr>"+
                                        "<td width='150px'>Nomor BPJS</td>"+
                                        "<td width='10px'>:</td>"+
                                        "<td>"+elementdata.nomor_bpjs+"</td>"+
                                    "</tr>"+
                                    "<tr>"+
                                        "<td width='150px'>File BPJS</td>"+
                                        "<td width='10px'>:</td>"+
                                        "<td><a href='/download_bpjs/{{Request::segment(2)}}'><i class='fas fa-lg fa-fw m-r-10 fa-cloud-download-alt'></i>"+elementdata.nama_file_bpjs+"</a></td>"+
                                    "</tr>"+
                                    "<tr>"+
                                        "<td width='150px'>Nomor NPWP</td>"+
                                        "<td width='10px'>:</td>"+
                                        "<td>"+elementdata.nomor_npwp+"</td>"+
                                    "</tr>"+
                                    "<tr>"+
                                        "<td width='150px'>File NPWP</td>"+
                                        "<td width='10px'>:</td>"+
                                        "<td><a href='/download_npwp/{{Request::segment(2)}}'><i class='fas fa-lg fa-fw m-r-10 fa-cloud-download-alt'></i>"+elementdata.nama_file_npwp+"</a></td>"+
                                    "</tr>");
    });


    $('#prajabatan_cpns_pns').empty();
    $('#prajabatan_cpns_pns2').empty();
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
                                            "<td width='150px'>Nomor SK CPNS</td>"+
                                            "<td width='10px'>:</td>"+
                                            "<td>"+elementdata.nomor_sk_cpns+"</td>"+
                                        "</tr>"+
                                        "<tr>"+
                                            "<td width='150px'>Tanggal SK CPNS</td>"+
                                            "<td width='10px'>:</td>"+
                                            "<td>"+elementdata.tanggal_sk_cpns+"</td>"+
                                        "</tr>"+
                                        "<tr>"+
                                            "<td width='150px'>File SK CPNS</td>"+
                                            "<td width='10px'>:</td>"+
                                            "<td><a href='/download_file_sk_cpns/{{Request::segment(2)}}'><i class='fas fa-lg fa-fw m-r-10 fa-cloud-download-alt'></i>"+elementdata.nama_file_sk_cpns+"</a></td>"+
                                        "</tr>"+
                                        "<tr>"+
                                            "<td width='150px'>TMT SK PNS</td>"+
                                            "<td width='10px'>:</td>"+
                                            "<td>"+elementdata.tmt_cpns+"</td>"+
                                        "</tr>"+
                                        "<tr>"+
                                            "<td width='150px'>Nomor SK PNS</td>"+
                                            "<td width='10px'>:</td>"+
                                            "<td>"+elementdata.nomor_sk_pns+"</td>"+
                                        "</tr>"+
                                        "<tr>"+
                                            "<td width='150px'>Tanggal SK PNS</td>"+
                                            "<td width='10px'>:</td>"+
                                            "<td>"+elementdata.tanggal_sk_pns+"</td>"+
                                        "</tr>"+
                                        "<tr>"+
                                            "<td width='150px'>File SK PNS</td>"+
                                            "<td width='10px'>:</td>"+
                                            "<td><a href='/download_file_sk_pns/{{Request::segment(2)}}'><i class='fas fa-lg fa-fw m-r-10 fa-cloud-download-alt'></i>"+elementdata.nama_file_sk_pns+"</a></td>"+
                                        "</tr>" );

        $('#prajabatan_cpns_pns2').append("<tr>"+
                                        "<td width='150px'>Nomor Karsu/Karis</td>"+
                                        "<td width='10px'>:</td>"+
                                        "<td>"+elementdata.karis_karsu+"</td>"+
                                        "</tr>"+
                                        "<tr>"+
                                            "<td width='150px'>File Karis/Karsu</td>"+
                                            "<td width='10px'>:</td>"+
                                            "<td><a href='/download_file_karsu_karis/{{Request::segment(2)}}'><i class='fas fa-lg fa-fw m-r-10 fa-cloud-download-alt'></i>"+elementdata.nama_file_karsu_karis+"</a></td>"+
                                        "</tr>"+
                                        "<tr>"+
                                            "<td width='150px'>Nomor Karpeg</td>"+
                                            "<td width='10px'>:</td>"+
                                            "<td>"+elementdata.karpeg+"</td>"+
                                        "</tr>"+
                                        "<tr>"+
                                            "<td width='150px'>File Karpeg</td>"+
                                            "<td width='10px'>:</td>"+
                                            "<td><a href='/download_file_karpeg/{{Request::segment(2)}}'><i class='fas fa-lg fa-fw m-r-10 fa-cloud-download-alt'></i>"+elementdata.nama_file_karpeg+"</a></td>"+
                                        "</tr>"+
                                        "<tr>"+
                                            "<td width='150px'>Nomor STTPL</td>"+
                                            "<td width='10px'>:</td>"+
                                            "<td>"+elementdata.nomor_sttpl+"</td>"+
                                        "</tr>"+
                                        "<tr>"+
                                            "<td width='150px'>Tanggal STTPL</td>"+
                                            "<td width='10px'>:</td>"+
                                            "<td>"+elementdata.tanggal_sttpl+"</td>"+
                                        "</tr>"+
                                        "<tr>"+
                                            "<td width='150px'>File STTPL</td>"+
                                            "<td width='10px'>:</td>"+
                                            "<td><a href='/download_file_sttpl/{{Request::segment(2)}}'><i class='fas fa-lg fa-fw m-r-10 fa-cloud-download-alt'></i>"+elementdata.nama_file_sttpl+"</a></td>"+
                                        "</tr>"+
                                        "<tr>"+
                                            "<td width='150px'>Taspen</td>"+
                                            "<td width='10px'>:</td>"+
                                            "<td>"+elementdata.taspen+"</td>"+
                                        "</tr>"+
                                        "<tr>"+
                                            "<td width='150px'>File Taspen</td>"+
                                            "<td width='10px'>:</td>"+
                                            "<td><a href='/download_file_taspen/{{Request::segment(2)}}'><i class='fas fa-lg fa-fw m-r-10 fa-cloud-download-alt'></i>"+elementdata.nama_file_taspen+"</a></td>"+

                                        "</tr>" );



    });



});



$('#data-keluarga').DataTable({
    processing: true,
    serverSide: true,
    ajax: "{{ route('table.keluarga_kandung', Request::segment(2))}}",
    columns: [
            {data: 'DT_RowIndex', name: 'id_keluarga_kandung'},
            {data: 'nama_keluarga', name: 'nama_keluarga'},
            {data: 'nama_m_hubungan_keluarga', name: 'nama_m_hubungan_keluarga'},
            {data: 'nama_kabupaten', name: 'nama_kabupaten'},
            {data: 'tanggal_lahir', name: 'tanggal_lahir'},
            {data: 'status_hidup', name: 'status_hidup'},
            {data: 'action', name: 'action', orderable: false}
        ]
});


$('#data-anak').DataTable({
    processing: true,
    serverSide: true,
    ajax: "{{ route('table.anak',Request::segment(2))}}",
    columns: [
            {data: 'DT_RowIndex', name: 'id_anak'},
            {data: 'nama_anak', name: 'nama_anak'},
            {data: 'jenis_kelamin_anak', name: 'jenis_kelamin_anak'},
            {data: 'nama_kabupaten', name: 'nama_kabupaten'},
            {data: 'tanggal_lahir_anak', name: 'tanggal_lahir_anak'},
            {data: 'status_anak', name: 'status_anak'},
            {data: 'pekerjaan', name: 'pekerjaan'},
            {data: 'action', name: 'action', orderable: false}
        ]
});


$('#data-suami-istri').DataTable({
    processing: true,
    serverSide: true,
    ajax: "{{ route('table.suami_istri', Request::segment(2))}}",
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
    ajax: "{{ route('table.pendidikan', Request::segment(2))}}",
    columns: [
            {data: 'DT_RowIndex', name: 'id_pendidikan_pegawai'},
            {data: 'nama_m_tingkat_pendidikan', name: 'nama_m_tingkat_pendidikan'},
            {data: 'tanggal_ijazah', name: 'tanggal_ijazah'},
            {data: 'nomor_ijazah', name: 'nomor_ijazah'},
            {data: 'nama_file_ijazah', name: 'nama_file_ijazah',
                fnCreatedCell: function (nTd, sData, oData, iRow, iCol) {
                    if(oData.nama_file_ijazah) {
                        $(nTd).html("<a href='/download_file_ijazah/"+oData.id_pendidikan_pegawai+"'><i class='fas fa-lg fa-fw m-r-10 fa-cloud-download-alt'></i>"+oData.nama_file_ijazah+"</a>");
                    }
                }
            },
            {data: 'nama_sekolah', name: 'nama_sekolah'},
            {data: 'action', name: 'action', orderable: false}
        ]
});


$('#data-diklat').DataTable({
    processing: true,
    serverSide: true,
    ajax: "{{ route('table.diklat', Request::segment(2))}}",
    columns: [
        {data: 'DT_RowIndex', name: 'id_diklat'},
            {data: 'jenis_diklat', name: 'jenis_diklat'},
            {data: 'nama_diklat', name: 'nama_diklat'},
            {
                data: 'tanggal_mulai',
                render: function ( data, type, row ) {
                    // Combine the first and last names into a single table field
                    return row.tanggal_mulai+' / '+row.tanggal_selesai;
                },
            },
            {data: 'penyelenggara', name: 'penyelenggara'},
            {data: 'alamat_diklat', name: 'alamat_diklat'},
            {data: 'nama_file_diklat', name: 'nama_file_diklat',
                fnCreatedCell: function (nTd, sData, oData, iRow, iCol) {
                    if(oData.nama_file_diklat) {
                        $(nTd).html("<a href='/download_file_diklat/"+oData.id_diklat+"'><i class='fas fa-lg fa-fw m-r-10 fa-cloud-download-alt'></i>"+oData.nama_file_diklat+"</a>");
                    }
                }
            },
            {data: 'action', name: 'action', orderable: false}
        ]
});


$('#data-jabatan').DataTable({
    processing: true,
    serverSide: true,
    ajax: "{{ route('table.jabatan', Request::segment(2))}}",
    columns: [
            {data: 'DT_RowIndex', name: 'id_jabatan'},
            {
                data: 'nama_m_jenis_jabatan',
                render: function ( data, type, row ) {
                    return row.nama_m_jenis_jabatan+' </br> '+row.tmt_jabatan;
                },
            },
            {data: 'nama_m_jabatan', name: 'nama_m_jabatan'},
            {data: 'unit_unor', name: 'unit_unor'},
            {data: 'nama_m_skpd', name: 'nama_m_skpd'},
            {
                data: 'nomor_sk',
                render: function ( data, type, row ) {
                    return row.nomor_sk+' </br> '+row.tanggal_sk;
                },
            },
            {
                data: null,
                render: function ( data, type, row ) {
                    // Combine the first and last names into a single table field
                    return '<a href="download_file_sk_jabatan/'+row.id_jabatan+'"><i class="fas fa-lg fa-fw m-r-10 fa-cloud-download-alt"></i>'+row.nama_file_sk_jabatan+'</a> </br><a href="download_file_sk_pelantikan_jabatan/'+row.id_jabatan+'"><i class="fas fa-lg fa-fw m-r-10 fa-cloud-download-alt"></i> '+row.nama_file_sk_pelantikan_jabatan+'</a></br><a href="download_file_sumpah_jabatan/'+row.id_jabatan+'"><i class="fas fa-lg fa-fw m-r-10 fa-cloud-download-alt"></i> '+ row.nama_file_sumpah_jabatan +'</a>';
                },
            },
            {data: 'action', name: 'action', orderable: false}
        ]
});


$('#data-pangkat-golongan').DataTable({
    processing: true,
    serverSide: true,
    ajax: "{{ route('table.golongan',Request::segment(2))}}",
    columns: [
            {data: 'DT_RowIndex', name: 'nip'},
            {
                data: 'nama_pangkat',
                render: function ( data, type, row ) {
                    // Combine the first and last names into a single table field
                    return row.nama_pangkat+' </br> '+row.nama_golongan;
                },
            },
            {
                data: 'nomor_sk',
                render: function ( data, type, row ) {
                    // Combine the first and last names into a single table field
                    return row.nomor_sk+' </br> '+row.tanggal_sk;
                },
            },
            {
                data: 'tmt_golongan',
                render: function ( data, type, row ) {
                    // Combine the first and last names into a single table field
                    return row.tmt_golongan+' </br><a href="download_file_sk_pangkat_golongan/'+row.id_golongan_pegawai+'"><i class="fas fa-lg fa-fw m-r-10 fa-cloud-download-alt"></i>'+row.nama_file_sk_kenaikan_pangkat;
                },
            },
            {
                data: 'nomor_bkn',
                render: function ( data, type, row ) {
                    // Combine the first and last names into a single table field
                    return row.nomor_bkn+' </br> '+row.tanggal_bkn;
                },
            },
            {data: 'action', name: 'action', orderable: false}
        ]
});


$('#data-penghargaan').DataTable({
    processing: true,
    serverSide: true,
    ajax: "{{ route('table.penghargaan', Request::segment(2))}}",
    columns: [
            {data: 'DT_RowIndex', name: 'id_penghargaan'},
            {data: 'nama_penghargaan', name: 'nama_penghargaan'},
            {data: 'tanggal_perolehan', name: 'tanggal_perolehan'},
            {data: 'nomor', name: 'nomor'},
            {data: 'negara_instansi_pemberi', name: 'negara_instansi_pemberi'},
            {
                data: 'nama_file_penghargaan',
                render: function ( data, type, row ) {
                    // Combine the first and last names into a single table field
                    return '<a href="download_file_penghargaan/'+row.id_penghargaan+'"><i class="fas fa-lg fa-fw m-r-10 fa-cloud-download-alt"></i>'+row.nama_file_penghargaan+'</a>';
                },
            },
            {data: 'action', name: 'action', orderable: false}
        ]
});


$('#data-dp3').DataTable({
    processing: true,
    serverSide: true,
    ajax: "{{ route('table.dp3', Request::segment(2))}}",
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
    ajax: "{{ route('table.hukuman', Request::segment(2))}}",
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


$('#data-panggilan').DataTable({
    processing: true,
    serverSide: true,
    ajax: "{{ route('table.panggilan_pemeriksaan', Request::segment(2))}}",
    columns: [
            {data: 'DT_RowIndex', name: 'id_panggilan'},
            {data: 'nomor_surat', name: 'nomor_surat'},
            {data: 'hari', name: 'hari'},
            {data: 'tanggal', name: 'tanggal'},
            {data: 'jam', name: 'jam'},
            {data: 'tempat', name: 'tempat'},
            {data: 'action', name: 'action', orderable: false}
        ]
});


$('#data-sk').DataTable({
    processing: true,
    serverSide: true,
    ajax: "{{ route('table.sk_hd_pegawai', Request::segment(2))}}",
    columns: [
            {data: 'DT_RowIndex', name: 'id_sk'},
            {data: 'nomor', name: 'nomor'},
            {data: 'laporan_dari_tanggal', name: 'laporan_dari_tanggal'},
            {data: 'tanggal_pelanggaran', name: 'tanggal_pelanggaran'},
            {
                data: null,
                render: function ( data, type, row ) {
                    // Combine the first and last names into a single table field
                    return '<strong>Pasal :'+row.pasal_hd+'<br> Angka :'+row.angka_hd+ ' <br> Huruf :' +row.huruf_hd+'</strong></br>'
                }
            },
            {data: 'tanggal_di_hukum', name: 'tanggal_di_hukum'},
            {data: 'action', name: 'action', orderable: false}
        ]
});


$('#search-form').on('submit', function(e) {
        oTable.draw();
        e.preventDefault();

    });



    $('.date').datepicker({
        format: " yyyy",
        viewMode: "years",
        minViewMode: "years"
    });


    $("#bulan").datepicker( {
    format: "m",
    viewMode: "months",
    minViewMode: "months"
});

var oTable = $('#data-kehadiran').DataTable({
    processing: true,
    serverSide: true,
    ajax: {
            url: "{{ route('table.kehadiran2', Request::segment(2)) }}",
            data: function (d) {
                d.tahun = $('input[name=tahun]').val();
                d.bulan = $('input[name=bulan]').val();

            }
        },
    columns: [
            {data: 'DT_RowIndex', name: 'id_kehadiran_pegawai'},
            {
                data: null,
                render: function ( data, type, row ) {
                    // Combine the first and last names into a single table field
                    return '<strong>'+row.gelar_depan+' '+row.nama_pegawai+ ' ' +row.gelar_belakang+'</strong></br>'+row.nip;
                }
            },
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


$('#data-mutasi').DataTable({
    processing: true,
    serverSide: true,
    ajax: "{{ route('table.mutasi', Request::segment(2))}}",
    columns: [
            {data: 'DT_RowIndex', name: 'id_mutasi'},
            {data: 'jenis_mutasi', name: 'jenis_mutasi'},
            {data: 'nama_m_skpd', name: 'nama_m_skpd'},
            {
                data: 'nomor_sk_mutasi',
                render: function ( data, type, row ) {
                    // Combine the first and last names into a single table field
                    return row.nomor_sk_mutasi+'</br>'+row.tanggal_sk_mutasi;
                },
            },
            {
                data: null,
                render: function ( data, type, row ) {
                    // Combine the first and last names into a single table field
                    return '<a href="download_file_sk_mutasi/'+row.id_mutasi+'"><i class="fas fa-lg fa-fw m-r-10 fa-cloud-download-alt"></i> '+row.nama_file_sk_mutasi+'</a>';
                },
            },
            {data: 'action', name: 'action', orderable: false}
        ]
});


$('#data-cuti').DataTable({
    processing: true,
    serverSide: true,
    ajax: "{{ route('table.cuti', Request::segment(2))}}",
    columns: [
            {data: 'DT_RowIndex', name: 'id_cuti'},
            {data: 'jenis_cuti', name: 'jenis_cuti'},
            {data: 'nomor_sk_cuti', name: 'nomor_sk_cuti'},
            {data: 'tanggal_sk_cuti', name: 'tanggal_sk_cuti'},
            {
                data: 'nama_file_sk_cuti',
                render: function ( data, type, row ) {
                    // Combine the first and last names into a single table field
                    return '<a href="download_file_sk_cuti/'+row.id_cuti+'"><i class="fas fa-lg fa-fw m-r-10 fa-cloud-download-alt"></i> '+row.nama_file_sk_cuti+'</a>';
                },
            },
            {data: 'action', name: 'action', orderable: false}
        ]
});


$('#data-kgb').DataTable({
    processing: true,
    serverSide: true,
    ajax: "{{ route('table.kgb', Request::segment(2))}}",
    columns: [
            {data: 'DT_RowIndex', name: 'id_kgb'},
            {
                data: 'nama_pangkat',
                render: function ( data, type, row ) {
                    // Combine the first and last names into a single table field
                    return '<strong>'+row.nama_pangkat+' </br> '+row.nama_golongan+ '</strong>';
                },
            },
            {data: 'tmt_kgb', name: 'tmt_kgb'},
            {data: 'gaji_pokok', name: 'gaji_pokok'},
            {data: 'nomor_sk_kgb', name: 'nomor_sk_kgb'},
            {data: 'tanggal_sk_kgb', name: 'tanggal_sk_kgb'},
            {
                data: 'nama_file_sk_kgb',
                render: function ( data, type, row ) {
                    // Combine the first and last names into a single table field
                    return '<a href="download_file_sk_kgb/'+row.id_kgb+'"><i class="fas fa-lg fa-fw m-r-10 fa-cloud-download-alt"></i> '+row.nama_file_sk_kgb+'</a>';
                },
            },
            {data: 'action', name: 'action', orderable: false}
        ]
});


$('#data-tugas_belajar').DataTable({
    processing: true,
    serverSide: true,
    ajax: "{{ route('table.tugas_belajar', Request::segment(2))}}",
    columns: [
            {data: 'DT_RowIndex', name: 'id_tugas_belajar'},
            {data: 'nama_sekolah_universitas', name: 'nama_sekolah_universitas'},
            {data: 'nomor_sk_tugas_belajar', name: 'nomor_sk_tugas_belajar'},
            {data: 'tanggal_sk_tugas_belajar', name: 'tanggal_sk_tugas_belajar'},
            {data: 'nama_file_sk_tugas_belajar', name: 'nama_file_sk_tugas_belajar',
                fnCreatedCell: function (nTd, sData, oData, iRow, iCol) {
                    if(oData.nama_file_sk_tugas_belajar) {
                        $(nTd).html("<a href='/download_file_sk_tugas_belajar/"+oData.id_tugas_belajar+"'><i class='fas fa-lg fa-fw m-r-10 fa-cloud-download-alt'></i>"+oData.nama_file_sk_tugas_belajar+"</a>");
                    }
                }
            },
            {data: 'action', name: 'action', orderable: false}
        ]
});

$('#data-pak').DataTable({
    processing: true,
    serverSide: true,
    ajax: "{{ route('table.pak', Request::segment(2))}}",
    columns: [
            {data: 'DT_RowIndex', name: 'id_pak'},
            {data: 'nomor_sk_pak', name: 'nomor_sk_pak'},
            {data: 'tanggal_sk_pak', name: 'tanggal_sk_pak'},
            {data: 'kredit_utama_baru', name: 'kredit_utama_baru'},
            {data: 'kredit_penunjang_baru', name: 'kredit_penunjang_baru'},
            {data: 'total_kredit_baru', name: 'total_kredit_baru'},
            {data: 'nama_m_jabatan', name: 'nama_m_jabatan'},
            {data: 'nama_file_pak', name: 'nama_file_pak',
                fnCreatedCell: function (nTd, sData, oData, iRow, iCol) {
                    if(oData.nama_file_pak) {
                        $(nTd).html("<a href='/download_file_pak/"+oData.id_pak+"'><i class='fas fa-lg fa-fw m-r-10 fa-cloud-download-alt'></i>"+oData.nama_file_pak+"</a>");
                    }
                }
            },
            {data: 'action', name: 'action', orderable: false}
        ]
});

$('#data-arsip').DataTable();

</script>

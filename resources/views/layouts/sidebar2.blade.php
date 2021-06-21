<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->
<head>
	<meta charset="utf-8" />
	<title>Color Admin | Page with Top Menu</title>
	<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
	<meta content="" name="description" />
    <meta content="" name="author" />
    <meta name="csrf-token" content="{{ csrf_token() }}">


	<!-- ================== BEGIN BASE CSS STYLE ================== -->
	<link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <link href="{{ asset('assets/plugins/jquery-ui/jquery-ui.min.css') }}" rel="stylesheet" />
     <!-- ================== BEGIN PAGE LEVEL JS ================== -->
    <link href="{{ asset('assets/plugins/jstree/dist/themes/default/style.min.css')}}" rel="stylesheet" />
	<!-- ================== END PAGE LEVEL JS ================== -->
	<link href="{{ asset('assets/plugins/bootstrap/4.1.0/css/bootstrap.min.css') }}" rel="stylesheet" />
	<link href="{{ asset('assets/plugins/font-awesome/5.0/css/fontawesome-all.min.css') }}" rel="stylesheet" />
	<link href="{{ asset('assets/plugins/animate/animate.min.css') }}" rel="stylesheet" />
	<link href="{{ asset('assets/css/default/style.min.css') }}" rel="stylesheet" />
	<link href="{{ asset('assets/css/default/style-responsive.min.css') }}" rel="stylesheet" />
	<link href="{{ asset('assets/css/default/theme/default.css') }}" rel="stylesheet" id="theme" />
    <!-- ================== END BASE CSS STYLE ================== -->



    <!-- ================== BEGIN PAGE LEVEL STYLE ================== -->
	<link href="{{ asset('assets/plugins/DataTables/media/css/dataTables.bootstrap.min.css') }}" rel="stylesheet" />
	<link href="{{ asset('assets/plugins/DataTables/extensions/Responsive/css/responsive.bootstrap.min.css') }}" rel="stylesheet" />
    <!-- ================== END PAGE LEVEL STYLE ================== -->

    <!-- ================== BEGIN PAGE LEVEL STYLE ================== -->
    <link href="{{ asset('assets/plugins/gritter/css/jquery.gritter.css') }}" rel="stylesheet" />
    <!-- ================== END PAGE LEVEL STYLE ================== -->

    <!-- ================== BEGIN PAGE LEVEL STYLE ================== -->
	<link href="{{ asset('assets/plugins/bootstrap-datepicker/css/bootstrap-datepicker.css') }}" rel="stylesheet" />
	<link href="{{ asset('assets/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.css') }}" rel="stylesheet" />
	<link href="{{ asset('assets/plugins/ionRangeSlider/css/ion.rangeSlider.css') }}" rel="stylesheet" />
	<link href="{{ asset('assets/plugins/ionRangeSlider/css/ion.rangeSlider.skinNice.css') }}" rel="stylesheet" />
	<link href="{{ asset('assets/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css') }}" rel="stylesheet" />
	<link href="{{ asset('assets/plugins/bootstrap-timepicker/css/bootstrap-timepicker.min.css') }}" rel="stylesheet" />
	<link href="{{ asset('assets/plugins/password-indicator/css/password-indicator.css') }}" rel="stylesheet" />
	<link href="{{ asset('assets/plugins/bootstrap-combobox/css/bootstrap-combobox.css') }}" rel="stylesheet" />
	<link href="{{ asset('assets/plugins/bootstrap-select/bootstrap-select.min.css') }}" rel="stylesheet" />
	<link href="{{ asset('assets/plugins/bootstrap-tagsinput/bootstrap-tagsinput.css') }}" rel="stylesheet" />
	<link href="{{ asset('assets/plugins/jquery-tag-it/css/jquery.tagit.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/plugins/bootstrap-daterangepicker/daterangepicker.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/plugins/select2/dist/css/select2.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/plugins/bootstrap-eonasdan-datetimepicker/build/css/bootstrap-datetimepicker.min.css') }}" rel="stylesheet" />
	<!-- ================== END PAGE LEVEL STYLE ================== -->

	<!-- ================== BEGIN BASE JS ================== -->
	<script src="{{ asset('assets/plugins/pace/pace.min.js') }}"></script>
    <!-- ================== END BASE JS ================== -->

    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/data.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>
    <script src="https://code.highcharts.com/modules/export-data.js"></script>

    <style type="text/css">



        [type=file] {

            filter: alpha(opacity=0);
            opacity: 0;
        }
        input,
        [type=file] + label {
        border: 1px solid #CCC;
        border-radius: 3px;
        text-align: left;
        padding: 6px;
        position: relative;
        }
        [type=file] + label {
        text-align: center;
        /* Decorative */
        background: #333;
        color: #fff;
        border: none;
        cursor: pointer;
        }
        [type=file] + label:hover {
        background: #3399ff;
        }


    </style>



</head>
<body>
	<!-- begin #page-loader -->
	<div id="page-loader" class="fade show"><span class="spinner"></span></div>
	<!-- end #page-loader -->

	<!-- begin #page-container -->
	<div id="page-container" class="page-container fade page-sidebar-fixed page-header-fixed">
		<!-- begin #header -->
		<div id="header" class="header navbar-default">
			<!-- begin navbar-header -->
			<div class="navbar-header">
            <a href="#" class="navbar-brand"><span class="navbar-logo"></span> <b>e-Human Resources Sumbawa Barat</b></a>

            <button type="button" class="navbar-toggle" data-click="sidebar-toggled">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
			</div>
			<!-- end navbar-header -->

			<!-- begin header-nav -->
			<ul class="navbar-nav navbar-right">
				<li>
					<form class="navbar-form">
						<div class="form-group">
							<input type="text" class="form-control" placeholder="Enter keyword" />
							<button type="submit" class="btn btn-search"><i class="fa fa-search"></i></button>
						</div>
					</form>
				</li>
				<li class="dropdown">
					<a href="javascript:;" data-toggle="dropdown" class="dropdown-toggle f-s-14">
						<i class="fa fa-bell"></i>
						<span class="label">5</span>
					</a>
					<ul class="dropdown-menu media-list dropdown-menu-right">
						<li class="dropdown-header">NOTIFICATIONS (5)</li>
						<li class="media">
							<a href="javascript:;">
								<div class="media-left">
									<i class="fa fa-bug media-object bg-silver-darker"></i>
								</div>
								<div class="media-body">
									<h6 class="media-heading">Server Error Reports <i class="fa fa-exclamation-circle text-danger"></i></h6>
									<div class="text-muted f-s-11">3 minutes ago</div>
								</div>
							</a>
						</li>
						<li class="media">
							<a href="javascript:;">
								<div class="media-left">
									<img src="../assets/img/user/user-1.jpg" class="media-object" alt="" />
									<i class="fab fa-facebook-messenger text-primary media-object-icon"></i>
								</div>
								<div class="media-body">
									<h6 class="media-heading">John Smith</h6>
									<p>Quisque pulvinar tellus sit amet sem scelerisque tincidunt.</p>
									<div class="text-muted f-s-11">25 minutes ago</div>
								</div>
							</a>
						</li>
						<li class="media">
							<a href="javascript:;">
								<div class="media-left">
									<img src="../assets/img/user/user-2.jpg" class="media-object" alt="" />
									<i class="fab fa-facebook-messenger text-primary media-object-icon"></i>
								</div>
								<div class="media-body">
									<h6 class="media-heading">Olivia</h6>
									<p>Quisque pulvinar tellus sit amet sem scelerisque tincidunt.</p>
									<div class="text-muted f-s-11">35 minutes ago</div>
								</div>
							</a>
						</li>
						<li class="media">
							<a href="javascript:;">
								<div class="media-left">
									<i class="fa fa-plus media-object bg-silver-darker"></i>
								</div>
								<div class="media-body">
									<h6 class="media-heading"> New User Registered</h6>
									<div class="text-muted f-s-11">1 hour ago</div>
								</div>
							</a>
						</li>
						<li class="media">
							<a href="javascript:;">
								<div class="media-left">
									<i class="fa fa-envelope media-object bg-silver-darker"></i>
									<i class="fab fa-google text-warning media-object-icon f-s-14"></i>
								</div>
								<div class="media-body">
									<h6 class="media-heading"> New Email From John</h6>
									<div class="text-muted f-s-11">2 hour ago</div>
								</div>
							</a>
						</li>
						<li class="dropdown-footer text-center">
							<a href="javascript:;">View more</a>
						</li>
					</ul>
				</li>
				<li class="dropdown navbar-user">
					<a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown">
						<img src="../assets/img/user/user-13.jpg" alt="" /> {{auth()->user()->profile->nama_pegawai}}
					</a>
					<div class="dropdown-menu dropdown-menu-right">
						<a href="javascript:;" class="dropdown-item">Edit Profile</a>
						<a href="javascript:;" class="dropdown-item"><span class="badge badge-danger pull-right">2</span> Inbox</a>
						<a href="javascript:;" class="dropdown-item">Calendar</a>
						<a href="javascript:;" class="dropdown-item">Setting</a>
						<div class="dropdown-divider"></div>
						<a href="{{ url('logout') }}" class="dropdown-item">Log Out</a>
					</div>
				</li>
			</ul>
			<!-- end header navigation right -->
		</div>
		<!-- end #header -->

		<!-- begin #sidebar -->
		<div id="sidebar" class="sidebar">
			<!-- begin sidebar scrollbar -->
			<div data-scrollbar="true" data-height="100%">
				<!-- begin sidebar user -->
				<ul class="nav">
					<li class="nav-profile">
						<a href="javascript:;" data-toggle="nav-profile">
							<div class="cover with-shadow"></div>
							<div class="image">
								<img src="../assets/img/user/user-13.jpg" alt="" />
							</div>
							<div class="info">

                                <small>{{auth()->user()->profile->gelar_depan.' '.auth()->user()->profile->nama_pegawai.' '.auth()->user()->profile->gelar_belakang}}</small>
								<small>{{auth()->user()->profile->nip}}</small>

							</div>
						</a>
					</li>
				</ul>
				<!-- end sidebar user -->
				<!-- begin sidebar nav -->
				<ul class="nav">
					<li class="nav-header">Navigation</li>


					<li >


                    @if (auth()->user()->id_role == 1)
                     <a href="{{url('admin')}}">
                    @elseif (auth()->user()->id_role == 2)
                     <a href="{{url('skpd')}}">
                    @elseif (auth()->user()->id_role == 3)
                     <a href="{{url('opd')}}">
                    @elseif (auth()->user()->id_role == 4)
                     <a href="{{url('dashboard_pegawai')}}">
                    @endif

						    <i class="fa fa-th-large"></i>
						    <span>Dashboard</span>
					    </a>
                    </li>

                    @if (auth()->user()->id_role == 1)
                    <li class="has-sub">
                        <a href="javascript:;">
                            <b class="caret"></b>
                            <i class="fa fa-file-alt"></i>
                            <span>Data Master</span>
                        </a>
                        <ul class="sub-menu">
                            <li><a href="{{url('m_skpd')}}">SKPD</a></li>
                            <li><a href="{{url('m_jabatan')}}">Jabatan</a></li>
                            <li><a href="{{url('m_unor')}}">Unit Organisasi (UNOR)</a></li>

                        </ul>
                    </li>

                    <li>
                        <a href="{{url('pegawai')}}">
                            <i class="fa fa-address-book"></i>
                            <span>Data Pegawai</span>
                        </a>
                    </li>


                    <li>
                        <a href="{{url('user')}}">
                            <i class="fa fa-users"></i>
                            <span>Data User</span>
                        </a>
                    </li>

                    @endif


                    @if (auth()->user()->id_role == 2)

                    <li class="has-sub">
                            <a href="javascript:;">
                                <b class="caret"></b>
                                <i class="fa fa-book"></i>
                                <span>Layanan Usulan ASN</span>
                            </a>
                            <ul class="sub-menu">
                                    <li><a href="{{url('nomor_usulan/usulan_kenaikan_pangkat')}}">Usul Kenaikan Pangkat</a></li>
                                    <li><a href="{{url('nomor_usulan/usulan_gaji_berkala')}}">Usulan Gaji Berkala</a></li>
                                    <li><a href="{{url('nomor_usulan/usulan_jafung')}}">Usulan Jafung</a></li>
                                    <li><a href="{{url('nomor_usulan/usulan_pensiun')}}">Usulan Pensiun</a></li>
                                    <li><a href="{{url('nomor_usulan/usulan_mutasi')}}">Usulan Mutasi</a></li>
                                    <li><a href="{{url('nomor_usulan/usulan_ujian_pi')}}">Usulan Ujian PI</a></li>

                                    <li><a href="{{url('nomor_usulan/usulan_perbaikan_data')}}">Usulan Perbaikan Data</a></li>
                                    <li><a href="{{url('nomor_usulan/usulan_diklat')}}">Usulan Diklat</a></li>
                                    <li><a href="{{url('nomor_usulan/usulan_ujian_dinas')}}">Usulan Ujian Dinas</a></li>
                                    <li><a href="{{url('nomor_usulan/usulan_peningkatan_pendidikan')}}">Usulan Peningkatan Pendidikan</a></li>

                                    <li><a href="{{url('nomor_usulan/usulan_cuti')}}">Usulan Cuti</a></li>
                                    <li><a href="{{url('nomor_usulan/usulan_karis_karsu')}}">Usulan Karis/Karsu</a></li>
                                    <li><a href="{{url('nomor_usulan/usulan_karpeg')}}">Usulan Karpeg</a></li>
                                    <li><a href="{{url('nomor_usulan/usulan_taspen')}}">Usulan Taspen</a></li>
                            </ul>
                        </li>

                        <li class="has-sub">
                            <a href="javascript:;">
                                <b class="caret"></b>
                                <i class="fa fa-file-alt"></i>
                                <span>Berkas TMS & BTL</span>
                            </a>
                            <ul class="sub-menu">
                                    <li><a href="{{url('berkas_tms')}}">Tidak Memenuhi Syarat (TMS)</a></li>
                                    <li><a href="{{url('berkas_btl')}}">Berkas Tidak Lengkap (BTL)</a></li>

                            </ul>
                        </li>

                        <li>
                            <a href="user/ubahpassword/{{auth()->user()->id}}" class="btn-show " title="Update Password"></button>

                                <i class="fa fa-key"></i>
                                <span>Ubah Password</span>
                            </a>
                        </li>

                    @endif


                    @if (auth()->user()->id_role == 3)


                    <li class="has-sub">
                        <a href="javascript:;">
                            <b class="caret"></b>
                            <i class="fa fa-th-large"></i>
                            <span>Bidang Mutasi</span>
                        </a>
                        <ul class="sub-menu">
                            <li><a href="{{url('layanan_kenaikan_pangkat_opd')}}">Daftar Usulan Kenaikan Pangkat</a></li>
                            <li><a href="{{url('daftar_usulan_kgb')}}">Daftar Usulan KGB</a></li>
                            <li><a href="{{url('daftar_usulan_jafung')}}">Daftar Usulan Jafung</a></li>
                            <li><a href="{{url('daftar_usulan_pensiun')}}">Daftar Usulan Pensiun</a></li>
                            <li><a href="{{url('daftar_usulan_mutasi')}}">Daftar Usulan Mutasi</a></li>
                            <li><a href="{{url('daftar_usulan_ujian_pi')}}">Daftar Usulan Ujian PI</a></li>
                        </ul>
                    </li>


                    <li class="has-sub">
                        <a href="javascript:;">
                            <b class="caret"></b>
                            <i class="fa fa-th-large"></i>
                            <span>Bidang PIP</span>
                        </a>
                        <ul class="sub-menu">
                            <li><a href="{{url('daftar_usulan_perbaikan_data')}}">Daftar Usulan Perbaikan Data</a></li>
                            <li><a href="{{url('daftar_usulan_diklat')}}">Daftar Usulan Diklat</a></li>
                            <li><a href="{{url('daftar_usulan_ujian_dinas')}}">Daftar Usulan Ujian Dinas</a></li>
                            <li><a href="{{url('daftar_usulan_peningkatan_pendidikan')}}">Daftar Usulan Peningkatan Pendidikan</a></li>
                        </ul>
                    </li>

                    <li class="has-sub">
                        <a href="javascript:;">
                            <b class="caret"></b>
                            <i class="fa fa-th-large"></i>
                            <span>Bidang PPA</span>
                        </a>
                        <ul class="sub-menu">
                            <li><a href="{{url('daftar_usulan_cuti')}}">Daftar Usulan Cuti</a></li>
                            <li><a href="{{url('daftar_usulan_karis_karsu')}}">Daftar Usulan Karis/Karsu</a></li>
                            <li><a href="{{url('daftar_usulan_karpeg')}}">Daftar Usulan Karpeg</a></li>
                            <li><a href="{{url('daftar_usulan_taspen')}}">Daftar Usulan Taspen</a></li>
                        </ul>
                    </li>

                    <li>
                        <a href="user/ubahpassword/{{auth()->user()->id}}" class="btn-show " title="Update Password"></button>

                            <i class="fa fa-th-large"></i>
                            <span>Ubah Password</span>
                        </a>
                    </li>

                    @endif



				</ul>
				<!-- end sidebar nav -->
			</div>
			<!-- end sidebar scrollbar -->
		</div>
		<div class="sidebar-bg"></div>
		<!-- end #sidebar -->



            @yield('content')

            @include('layouts._modal_view_detail_pegawai')
            @include('layouts._modal_create_data_pegawai')
            @include('layouts._modal2')
            @include('layouts._modalpreview')




        <!-- begin theme-panel -->
        <div class="theme-panel theme-panel-lg">
            <a href="javascript:;" data-click="theme-panel-expand" class="theme-collapse-btn"><i class="fa fa-cog"></i></a>
            <div class="theme-panel-content">
                <h5 class="m-t-0">Color Theme</h5>
                <ul class="theme-list clearfix">
                    <li><a href="javascript:;" class="bg-red" data-theme="red" data-theme-file="../assets/css/default/theme/red.css" data-click="theme-selector" data-toggle="tooltip" data-trigger="hover" data-container="body" data-title="Red">&nbsp;</a></li>
                    <li><a href="javascript:;" class="bg-pink" data-theme="pink" data-theme-file="../assets/css/default/theme/pink.css" data-click="theme-selector" data-toggle="tooltip" data-trigger="hover" data-container="body" data-title="Pink">&nbsp;</a></li>
                    <li><a href="javascript:;" class="bg-orange" data-theme="orange" data-theme-file="../assets/css/default/theme/orange.css" data-click="theme-selector" data-toggle="tooltip" data-trigger="hover" data-container="body" data-title="Orange">&nbsp;</a></li>
                    <li><a href="javascript:;" class="bg-yellow" data-theme="yellow" data-theme-file="../assets/css/default/theme/yellow.css" data-click="theme-selector" data-toggle="tooltip" data-trigger="hover" data-container="body" data-title="Yellow">&nbsp;</a></li>
                    <li><a href="javascript:;" class="bg-lime" data-theme="lime" data-theme-file="../assets/css/default/theme/lime.css" data-click="theme-selector" data-toggle="tooltip" data-trigger="hover" data-container="body" data-title="Lime">&nbsp;</a></li>
                    <li><a href="javascript:;" class="bg-green" data-theme="green" data-theme-file="../assets/css/default/theme/green.css" data-click="theme-selector" data-toggle="tooltip" data-trigger="hover" data-container="body" data-title="Green">&nbsp;</a></li>
                    <li><a href="javascript:;" class="bg-teal" data-theme="default" data-theme-file="../assets/css/default/theme/default.css" data-click="theme-selector" data-toggle="tooltip" data-trigger="hover" data-container="body" data-title="Default">&nbsp;</a></li>
                    <li><a href="javascript:;" class="bg-aqua" data-theme="aqua" data-theme-file="../assets/css/default/theme/aqua.css" data-click="theme-selector" data-toggle="tooltip" data-trigger="hover" data-container="body" data-title="Aqua">&nbsp;</a></li>
                    <li><a href="javascript:;" class="bg-blue" data-theme="blue" data-theme-file="../assets/css/default/theme/blue.css" data-click="theme-selector" data-toggle="tooltip" data-trigger="hover" data-container="body" data-title="Blue">&nbsp;</a></li>
                    <li><a href="javascript:;" class="bg-purple" data-theme="purple" data-theme-file="../assets/css/default/theme/purple.css" data-click="theme-selector" data-toggle="tooltip" data-trigger="hover" data-container="body" data-title="Purple">&nbsp;</a></li>
                    <li><a href="javascript:;" class="bg-indigo" data-theme="indigo" data-theme-file="../assets/css/default/theme/indigo.css" data-click="theme-selector" data-toggle="tooltip" data-trigger="hover" data-container="body" data-title="Indigo">&nbsp;</a></li>
                    <li><a href="javascript:;" class="bg-black" data-theme="black" data-theme-file="../assets/css/default/theme/black.css" data-click="theme-selector" data-toggle="tooltip" data-trigger="hover" data-container="body" data-title="Black">&nbsp;</a></li>
                </ul>
                <div class="divider"></div>
                <div class="row m-t-10">
                    <div class="col-md-6 control-label text-inverse f-w-600">Header Styling</div>
                    <div class="col-md-6">
                        <select name="header-styling" class="form-control form-control-sm">
                            <option value="1">default</option>
                            <option value="2">inverse</option>
                        </select>
                    </div>
                </div>
                <div class="row m-t-10">
                    <div class="col-md-6 control-label text-inverse f-w-600">Header</div>
                    <div class="col-md-6">
                        <select name="header-fixed" class="form-control form-control-sm">
                            <option value="1">fixed</option>
                            <option value="2">default</option>
                        </select>
                    </div>
                </div>
                <div class="row m-t-10">
                    <div class="col-md-6 control-label text-inverse f-w-600">Sidebar Styling</div>
                    <div class="col-md-6">
                        <select name="sidebar-styling" class="form-control form-control-sm">
                            <option value="1">default</option>
                            <option value="2">grid</option>
                        </select>
                    </div>
                </div>
                <div class="row m-t-10">
                    <div class="col-md-6 control-label text-inverse f-w-600">Sidebar</div>
                    <div class="col-md-6">
                        <select name="sidebar-fixed" class="form-control form-control-sm">
                            <option value="1">fixed</option>
                            <option value="2">default</option>
                        </select>
                    </div>
                </div>
                <div class="row m-t-10">
                    <div class="col-md-6 control-label text-inverse f-w-600">Sidebar Gradient</div>
                    <div class="col-md-6">
                        <select name="content-gradient" class="form-control form-control-sm">
                            <option value="1">disabled</option>
                            <option value="2">enabled</option>
                        </select>
                    </div>
                </div>
                <div class="row m-t-10">
                    <div class="col-md-6 control-label text-inverse f-w-600">Content Styling</div>
                    <div class="col-md-6">
                        <select name="content-styling" class="form-control form-control-sm">
                            <option value="1">default</option>
                            <option value="2">black</option>
                        </select>
                    </div>
                </div>
                <div class="row m-t-10">
                    <div class="col-md-6 control-label text-inverse f-w-600">Direction</div>
                    <div class="col-md-6">
                        <select name="direction" class="form-control form-control-sm">
                            <option value="1">LTR</option>
                            <option value="2">RTL</option>
                        </select>
                    </div>
                </div>

            </div>
        </div>
        <!-- end theme-panel -->

		<!-- begin scroll to top btn -->
		<a href="javascript:;" class="btn btn-icon btn-circle btn-success btn-scroll-to-top fade" data-click="scroll-top"><i class="fa fa-angle-up"></i></a>
		<!-- end scroll to top btn -->
	</div>
	<!-- end page container -->

	<!-- ================== BEGIN BASE JS ================== -->
	<script src="{{ asset('assets/plugins/jquery/jquery-3.2.1.min.js') }}"></script>
	<script src="{{ asset('assets/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
	<script src="{{ asset('assets/plugins/bootstrap/4.1.0/js/bootstrap.bundle.min.js') }}"></script>
	<!--[if lt IE 9]>
		<script src="../assets/crossbrowserjs/html5shiv.js"></script>
		<script src="../assets/crossbrowserjs/respond.min.js"></script>
		<script src="../assets/crossbrowserjs/excanvas.min.js"></script>
	<![endif]-->
	<script src="{{ asset('assets/plugins/slimscroll/jquery.slimscroll.min.js') }}"></script>
	<script src="{{ asset('assets/plugins/js-cookie/js.cookie.js') }}"></script>
	<script src="{{ asset('assets/js/theme/default.min.js') }}"></script>
	<script src="{{ asset('assets/js/apps.min.js') }}"></script>
    <!-- ================== END BASE JS ================== -->



    <!-- ================== BEGIN PAGE LEVEL JS ================== -->
	<script src="{{ asset('assets/plugins/DataTables/media/js/jquery.dataTables.js') }}"></script>
	<script src="{{ asset('assets/plugins/DataTables/media/js/dataTables.bootstrap.min.js') }}"></script>
	<script src="{{ asset('assets/plugins/DataTables/extensions/Responsive/js/dataTables.responsive.min.js') }}"></script>
	<script src="{{ asset('assets/js/demo/table-manage-default.demo.min.js') }}"></script>
    <!-- ================== END PAGE LEVEL JS ================== -->

    <!-- ================== BEGIN PAGE LEVEL JS ================== -->
	<script src="{{ asset('assets/plugins/gritter/js/jquery.gritter.js') }}"></script>
	<script src="{{ asset('assets/js/demo/ui-modal-notification.demo.min.js') }}"></script>
    <!-- ================== END PAGE LEVEL JS ================== -->

    <!-- ================== BEGIN PAGE LEVEL JS ================== -->
	<script src="{{ asset('assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js') }}"></script>
	<script src="{{ asset('assets/plugins/ionRangeSlider/js/ion-rangeSlider/ion.rangeSlider.min.js') }}"></script>
	<script src="{{ asset('assets/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js') }}"></script>
	<script src="{{ asset('assets/plugins/masked-input/masked-input.min.js') }}"></script>
	<script src="{{ asset('assets/plugins/bootstrap-timepicker/js/bootstrap-timepicker.min.js') }}"></script>
	<script src="{{ asset('assets/plugins/password-indicator/js/password-indicator.js') }}"></script>
	<script src="{{ asset('assets/plugins/bootstrap-combobox/js/bootstrap-combobox.js') }}"></script>
	<script src="{{ asset('assets/plugins/bootstrap-select/bootstrap-select.min.js') }}"></script>
	<script src="{{ asset('assets/plugins/bootstrap-tagsinput/bootstrap-tagsinput.min.js') }}"></script>
	<script src="{{ asset('assets/plugins/bootstrap-tagsinput/bootstrap-tagsinput-typeahead.js') }}"></script>
	<script src="{{ asset('assets/plugins/jquery-tag-it/js/tag-it.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/bootstrap-daterangepicker/moment.js') }}"></script>
    <script src="{{ asset('assets/plugins/bootstrap-daterangepicker/daterangepicker.js') }}"></script>
    <script src="{{ asset('assets/plugins/select2/dist/js/select2.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/bootstrap-eonasdan-datetimepicker/build/js/bootstrap-datetimepicker.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/bootstrap-show-password/bootstrap-show-password.js') }}"></script>
    <script src="{{ asset('assets/plugins/bootstrap-colorpalette/js/bootstrap-colorpalette.js') }}"></script>
    <script src="{{ asset('assets/plugins/jquery-simplecolorpicker/jquery.simplecolorpicker.js') }}"></script>
    <script src="{{ asset('assets/plugins/clipboard/clipboard.min.js') }}"></script>
	<script src="{{ asset('assets/js/demo/form-plugins.demo.min.js') }}"></script>
    <!-- ================== END PAGE LEVEL JS ================== -->



    <!-- ================== BEGIN PAGE LEVEL JS ================== -->
    <script src="{{ asset('js/sweetalert2/sweetalert2.all.min.js') }}"></script>
    <script src="{{ asset('js/app.js') }}"></script>

    <!-- ================== END PAGE LEVEL JS ================== -->

     <!-- ================== BEGIN PAGE LEVEL JS ================== -->
	<script src="{{ asset('assets/plugins/jstree/dist/jstree.min.js') }}"></script>
	<script src="{{ asset('assets/js/demo/ui-tree.demo.min.js') }}"></script>
	<!-- ================== END PAGE LEVEL JS ================== -->

    <!-- ================== BEGIN PAGE LEVEL JS ================== -->
	<script src="{{asset('assets/js/demo/login-v2.demo.min.js')}}"></script>
	<!-- ================== END PAGE LEVEL JS ================== -->

    @stack('scripts')

    <script>
		$(document).ready(function() {
			App.init();
            TreeView.init();
            TableManageDefault.init();
            Notification.init();
            FormPlugins.init();
            LoginV2.init();
		});
	</script>
</body>
</html>

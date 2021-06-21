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
	<link href="{{ asset('assets/plugins/bootstrap/4.1.0/css/bootstrap.min.css') }}" rel="stylesheet" />
	<link href="{{ asset('assets/plugins/font-awesome/5.0/css/fontawesome-all.min.css') }}" rel="stylesheet" />
	<link href="{{ asset('assets/plugins/animate/animate.min.css') }}" rel="stylesheet" />
	<link href="{{ asset('assets/css/material/style.min.css') }}" rel="stylesheet" />
	<link href="{{ asset('assets/css/material/style-responsive.min.css') }}" rel="stylesheet" />
	<link href="{{ asset('assets/css/material/theme/default.css') }}" rel="stylesheet" id="theme" />
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

    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/chosen/1.4.2/chosen.min.css">
	<!-- ================== END PAGE LEVEL STYLE ================== -->

	<!-- ================== BEGIN BASE JS ================== -->
	<script src="{{ asset('assets/plugins/pace/pace.min.js') }}"></script>
    <!-- ================== END BASE JS ================== -->

    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/data.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>
    <script src="https://code.highcharts.com/modules/export-data.js"></script>

    <!--<style type="text/css">
        th,td { white-space:nowrap }
        div.dataTables_wrapper {
            overflow-x:scroll;
            width: auto;
            margin: 0 auto;
        }




    </style> -->


</head>
<body>
	<!-- begin #page-loader -->
	<div id="page-loader" class="fade show"><span class="spinner"></span></div>
	<!-- end #page-loader -->

	<!-- begin #page-container -->
	<div id="page-container" class="page-container fade page-without-sidebar page-header-fixed page-with-top-menu">
		<!-- begin #header -->
		<div id="header" class="header navbar-default">
			<!-- begin navbar-header -->
			<div class="navbar-header">

				<a href="#" class="navbar-brand"><img  width="30px" height="40px" src="{{asset('login/images/8.png')}}" > <b>e-Disiplin Sumbawa Barat</b></a>
				<button type="button" class="navbar-toggle" data-click="top-menu-toggled">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
			</div>
			<!-- end navbar-header -->

			<!-- begin header navigation right -->
			<ul class="navbar-nav navbar-right">


				<li class="dropdown navbar-user">
					<a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown">
						<img src="{{ asset('assets/img/user/user-13.jpg') }}" alt="" />
						<span class="hidden-xs">Admin BKD</span> <b class="caret"></b>
					</a>
					<ul class="dropdown-menu">
						<li class="arrow"></li>
						<li>

                            <a href="user/ubahpassword/{{auth()->user()->id}}" class="btn-show " title="Update Password">Ubah Password</a>
                        </li>
						<li class="divider"></li>
						<a href="{{ url('logout') }}" class="dropdown-item">Log Out</a>

					</ul>
				</li>
			</ul>
			<!-- end header navigation right -->
		</div>
		<!-- end #header -->

	<!-- begin #top-menu -->
    <div id="top-menu" class="top-menu">
        <!-- begin top-menu nav -->
        <ul class="nav">
            @if (auth()->user()->id_role == 1)
                <li>
                    <a href="{{url('admin')}}">
                        <i class="fa fa-american-sign-language-interpreting"></i>
                        <span>Dashboard</span>
                    </a>
                </li>

                <li class="has-sub">
                    <a href="javascript:;">
                        <b class="caret"></b>
                        <i class="fa fa-american-sign-language-interpreting"></i>
                        <span>Input Data</span>
                    </a>
                    <ul class="sub-menu">
                        <li><a href="{{url('pegawai_hd')}}">Hukuman Disiplin</a></li>
                        <li><a href="{{url('sk_hd')}}">SK Hukuman Disiplin</a></li>
                        <li><a href="{{url('panggilan')}}">Input Panggilan Pemeriksaan</a></li>

                    </ul>
                </li>

            <li>
                <a href="{{url('kehadiran')}}">
                    <i class="fa fa-american-sign-language-interpreting"></i>
                    <span>Kehadiran</span>
                </a>
            </li>

            <li>
                <a href="{{route('import_data.kehadiran') }}" class="modal-show" title="Import Data Kehadiran" data-toggle="modal"><i class="fa fa-american-sign-language-interpreting"></i>Import File Excel</a>

            </li>

            <li>
            <a href="{{url('user')}}">
                    <i class="fa fa-american-sign-language-interpreting"></i>
                    <span>Data User</span>
                </a>
            </li>

            <li class="has-sub">
                    <a href="javascript:;">
                        <b class="caret"></b>
                        <i class="fa fa-american-sign-language-interpreting"></i>
                        <span>Data Master</span>
                    </a>
                    <ul class="sub-menu">
                        <li><a href="{{url('pegawai')}}">Data Pegawai</a></li>
                        <li><a href="{{url('pelanggaran_hd')}}">Jenis Pelanggaran HD</a></li>
                        <li><a href="{{url('m_k_jenis_hd')}}">Jenis Hukuman Disiplin</a></li>

                    </ul>
                </li>
            @endif

            @if (auth()->user()->id_role == 2)
                <li>
                    <a href="{{url('skpd')}}">
                        <i class="fa fa-american-sign-language-interpreting"></i>
                        <span>Dashboard</span>
                    </a>
                </li>

                <li class="has-sub">
                    <a href="javascript:;">
                        <b class="caret"></b>
                        <i class="fa fa-american-sign-language-interpreting"></i>
                        <span>Input Data</span>
                    </a>
                    <ul class="sub-menu">
                        <li><a href="{{url('pegawai_hd')}}">Hukuman Disiplin</a></li>
                        <li><a href="{{url('sk_hd')}}">SK Hukuman Disiplin</a></li>
                        <li><a href="{{url('panggilan')}}">Input Panggilan Pemeriksaan</a></li>

                    </ul>
                </li>
            @endif



            @if (auth()->user()->id_role == 8)
            <li class="has-sub">
                <a href="javascript:;">
                    <b class="caret"></b>
                    <i class="fa fa-american-sign-language-interpreting"></i>
                    <span>Laporan</span>
                </a>
                <ul class="sub-menu">

                <li><a href="{{route('duk.print')}}">Pembebasan Sementara <br>Dari Tugas Jabatan</a></li>
                    <li><a href="javascript:;">Keputusan Hukuman Disiplin <br>Teguran Lisan</a></li>
                    <li><a href="javascript:;">Keputusan Hukuman Disiplin <br>Teguran Tertulis</a></li>
                    <li><a href="javascript:;">Keputusan Hukuman Disiplin <br>Teguran Tidak Puas Secara Tertulis</a></li>


                </ul>
            </li>
            @endif

            <li class="menu-control menu-control-left">
                <a href="javascript:;" data-click="prev-menu"><i class="fa fa-angle-left"></i></a>
            </li>
            <li class="menu-control menu-control-right">
                <a href="javascript:;" data-click="next-menu"><i class="fa fa-angle-right"></i></a>
            </li>
        </ul>
        <!-- end top-menu nav -->
    </div>
    <!-- end #top-menu -->

		<!-- begin #content -->


            @yield('content')



            @include('layouts._modal_view_detail_pegawai')

            @include('layouts._modal_create_data_pegawai')

            @include('layouts._modal2')





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

	<script src="{{ asset('assets/plugins/DataTables/extensions/FixedColumns/js/dataTables.fixedColumns.min.js') }}"></script>
    <script src="{{ asset('assets/js/demo/table-manage-fixed-columns.demo.min.js') }}"></script>

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

    <script src="//cdnjs.cloudflare.com/ajax/libs/chosen/1.4.2/chosen.jquery.min.js"></script>

    @stack('scripts')

    <script>
		$(document).ready(function() {
			App.init();
            TableManageDefault.init();
            TableManageFixedColumns.init();
            Notification.init();
            FormPlugins.init();
            Profile.init();
		});
	</script>
</body>
</html>

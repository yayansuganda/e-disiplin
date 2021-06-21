@extends('layouts.sidebar2')

@section('content')

<div id="content" class="content">

        <div class="row">
			    <!-- begin col-3 -->
			    <div class="col-lg-3 col-md-6">
			        <div class="widget widget-stats bg-gradient-teal">
						<div class="stats-icon stats-icon-lg"><i class="fa fa-globe fa-fw"></i></div>
			        	<div class="stats-content">
							<div class="stats-number">JUMLAH USULAN BIDANG MUTASI</div>
							<div class="stats-progress progress">
								<div class="progress-bar" style="width: 70.1%;"></div>
							</div>
                        </div>
			        </div>
			    </div>
			    <!-- end col-3 -->
			    <!-- begin col-3 -->
			    <div class="col-lg-3 col-md-6">
			        <div class="widget widget-stats bg-gradient-blue">
			            <div class="stats-icon stats-icon-lg"><i class="fa fa-dollar-sign fa-fw"></i></div>
						<div class="stats-content">
							<div class="stats-number">JUMLAH USULAN BIDANG PIP</div>
							<div class="stats-progress progress">
								<div class="progress-bar" style="width: 40.5%;"></div>
							</div>
						</div>
			        </div>
			    </div>
			    <!-- end col-3 -->
			    <!-- begin col-3 -->
			    <div class="col-lg-3 col-md-6">
			        <div class="widget widget-stats bg-gradient-purple">
			            <div class="stats-icon stats-icon-lg"><i class="fa fa-archive fa-fw"></i></div>
			        	<div class="stats-content">
							<div class="stats-number">JUMLAH USULAN BIDANG PPA</div>
							<div class="stats-progress progress">
								<div class="progress-bar" style="width: 76.3%;"></div>
							</div>
						</div>
			        </div>
			    </div>
			    <!-- end col-3 -->
			</div>
			<!-- end row -->

</div>


@endsection

@push('scripts')

@endpush


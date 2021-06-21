@extends('layouts.sidebar2')

@section('content')



{!! Form::model($model,  [
    'route'=>$model->exists ? ['pegawai.update', $model->nip] : 'pegawai.store',
    'method'=> $model->exists ? 'PUT' : 'POST'
]) !!}



<div class="form-group row m-b-10">
    <div class="col-md-12">

        <ul class="nav nav-tabs">
            <li class="nav-items">
                <a href="#default-tab-1" data-toggle="tab" class="nav-link active">
                    <span class="d-sm-none">Tab 1</span>
                    <span class="d-sm-block d-none">Data Pribadi</span>
                </a>
            </li>
            <li class="nav-items">
                <a href="#default-tab-2" data-toggle="tab" class="nav-link">
                    <span class="d-sm-none">Tab 2</span>
                    <span class="d-sm-block d-none">Posisi Jabatan</span>
                </a>
            </li>
            <li class="">
                <a href="#default-tab-3" data-toggle="tab" class="nav-link">
                    <span class="d-sm-none">Tab 3</span>
                    <span class="d-sm-block d-none">Data Lainnya</span>
                </a>
            </li>
        </ul>
        <!-- end nav-tabs -->
        <!-- begin tab-content -->
        <div class="tab-content">
            <!-- begin tab-pane -->
            <div class="tab-pane fade active show" id="default-tab-1">

                    <div class="form-group row m-b-10">
                        <div class="col-md-10">
                            <div class="row row-space-6">

                                <label class="col-md-2 text-md-right col-form-label">Nip Baru</label>
                                <div class="col-4">
                                    {!! Form::text('nip',null, ['class' => 'form-control', 'id'=>'nip', 'readonly']) !!}
                                </div>

                                <label class="col-md-2 text-md-right col-form-label">Nip Lama</label>
                                <div class="col-4">
                                        {!! Form::text('nip_lama',null, ['class' => 'form-control', 'id'=>'nip_lama', 'readonly']) !!}

                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="form-group row m-b-10">
                            <div class="col-md-10">
                                <div class="row row-space-6">

                                    <label class="col-md-2 text-md-right col-form-label">Nama Pegawai</label>
                                    <div class="col-4">
                                        {!! Form::text('nama_pegawai',null, ['class' => 'form-control', 'id'=>'nama_pegawai', 'readonly']) !!}
                                    </div>

                                    <label class="col-md-2 text-md-right col-form-label">Gelar Depan</label>
                                    <div class="col-1">
                                            {!! Form::text('gelar_depan',null, ['class' => 'form-control', 'id'=>'gelar_depan']) !!}
                                    </div>

                                    <label class="col-md-2 text-md-right col-form-label">Gelar Belakang</label>
                                    <div class="col-1">
                                            {!! Form::text('gelar_belakang',null, ['class' => 'form-control', 'id'=>'gelar_belakang']) !!}
                                    </div>

                                </div>
                            </div>
                        </div>

                        <div class="form-group row m-b-10">
                            <div class="col-md-10">
                                <div class="row row-space-6">

                                    <label class="col-md-2 text-md-right col-form-label">Tempat Lahir</label>
                                    <div class="col-4">
                                        {!! Form::text('tempat_lahir',null, ['class' => 'form-control', 'id'=>'tempat_lahir']) !!}
                                    </div>

                                    <label class="col-md-2 text-md-right col-form-label">Tanggal Lahir</label>
                                    <div class="col-4">
                                        <div class="input-group date datepicker-default"   data-date-format="dd-mm-yyyy" >
                                            {!! Form::text('tanggal_lahir',null, ['class' => 'form-control', 'placeholder'=>'Pilih Tanggal', 'id'=>'tanggal_lahir']) !!}
                                            <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>

                        <div class="form-group row m-b-10">
                            <div class="col-md-10">
                                <div class="row row-space-6">

                                    <label class="col-md-2 text-md-right col-form-label">Agama</label>
                                    <div class="col-4">
                                        {!! Form::text('agama',null, ['class' => 'form-control', 'id'=>'agama']) !!}
                                    </div>

                                    <label class="col-md-2 text-md-right col-form-label">Email</label>
                                    <div class="col-4">
                                            {!! Form::text('email',null, ['class' => 'form-control', 'id'=>'email']) !!}
                                    </div>

                                </div>
                            </div>
                        </div>

                        <div class="form-group row m-b-10">
                                <div class="col-md-10">
                                    <div class="row row-space-6">

                                        <label class="col-md-2 text-md-right col-form-label">Alamat</label>
                                        <div class="col-4">
                                            {!! Form::text('alamat',null, ['class' => 'form-control', 'id'=>'alamat']) !!}
                                        </div>

                                        <label class="col-md-2 text-md-right col-form-label">Jenis Kelamin</label>
                                        <div class="col-4">
                                                {!! Form::text('jenis_kelamin',null, ['class' => 'form-control', 'id'=>'jenis_kelamin']) !!}

                                        </div>

                                    </div>
                                </div>
                            </div>

                        <div class="form-group row m-b-10">
                            <div class="col-md-10">
                                <div class="row row-space-6">

                                    <label class="col-md-2 text-md-right col-form-label">Jenis Dokument</label>
                                    <div class="col-4">
                                        {!! Form::text('jenis_dokument',null, ['class' => 'form-control', 'id'=>'jenis_dokument']) !!}
                                    </div>

                                    <label class="col-md-2 text-md-right col-form-label">Nomor Dokument</label>
                                    <div class="col-4">
                                            {!! Form::text('nomor_dokument',null, ['class' => 'form-control', 'id'=>'nomor_dokument']) !!}

                                    </div>

                                </div>
                            </div>
                        </div>

                        <div class="form-group row m-b-10">
                            <div class="col-md-10">
                                <div class="row row-space-6">

                                    <label class="col-md-2 text-md-right col-form-label">Nomor HP</label>
                                    <div class="col-4">
                                        {!! Form::text('nomor_hp',null, ['class' => 'form-control', 'id'=>'nomor_hp']) !!}
                                    </div>

                                    <label class="col-md-2 text-md-right col-form-label">Nomor Telephone</label>
                                    <div class="col-4">
                                            {!! Form::text('nomor_telephone',null, ['class' => 'form-control', 'id'=>'nomor_telephone']) !!}

                                    </div>

                                </div>
                            </div>
                        </div>

                        <div class="form-group row m-b-10">
                            <div class="col-md-10">
                                <div class="row row-space-6">

                                    <label class="col-md-2 text-md-right col-form-label">Status Pegawai</label>
                                    <div class="col-4">
                                        {!! Form::text('nama_m_status_kepegawaian',null, ['class' => 'form-control', 'id'=>'nama_m_status_kepegawaian', 'readonly']) !!}
                                    </div>

                                    <label class="col-md-2 text-md-right col-form-label">Jenis Pegawai</label>
                                    <div class="col-4">
                                            {!! Form::text('nama_m_jenis_pegawai',null, ['class' => 'form-control', 'id'=>'nama_m_jenis_pegawai', 'readonly']) !!}

                                    </div>

                                </div>
                            </div>
                        </div>

                        <div class="form-group row m-b-10">
                            <div class="col-md-10">
                                <div class="row row-space-6">

                                    <label class="col-md-2 text-md-right col-form-label">Kedudukan PNS</label>
                                    <div class="col-4">
                                        {!! Form::text('kedudukan_pns',null, ['class' => 'form-control', 'id'=>'kedudukan_pns', 'readonly']) !!}
                                    </div>

                                    <label class="col-md-2 text-md-right col-form-label">Nomor Seri Karpeg</label>
                                    <div class="col-4">
                                            {!! Form::text('karpeg',null, ['class' => 'form-control', 'id'=>'karpeg', 'readonly']) !!}

                                    </div>

                                </div>
                            </div>
                        </div>

                        <div class="form-group row m-b-10">
                            <div class="col-md-10">
                                <div class="row row-space-6">

                                    <label class="col-md-2 text-md-right col-form-label">TMT CPNS</label>
                                    <div class="col-4">
                                        <div class="input-group date datepicker-default"   data-date-format="dd-mm-yyyy" >
                                            {!! Form::text('tmt_cpns',null, ['class' => 'form-control', 'placeholder'=>'Tanggal Menikah', 'id'=>'tmt_cpns', 'readonly']) !!}
                                            <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                        </div>
                                    </div>

                                    <label class="col-md-2 text-md-right col-form-label">TMT PNS</label>
                                    <div class="col-4">
                                            <div class="input-group date datepicker-default"   data-date-format="dd-mm-yyyy" >
                                                {!! Form::text('tmt_pns',null, ['class' => 'form-control', 'placeholder'=>'Tanggal Menikah', 'id'=>'tmt_pns', 'readonly']) !!}
                                                <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                            </div>
                                    </div>

                                </div>
                            </div>
                        </div>

                        <div class="form-group row m-b-10">
                                <div class="col-md-10">
                                    <div class="row row-space-6">

                                        <label class="col-md-2 text-md-right col-form-label">Tingkat Pendidikan</label>
                                        <div class="col-4">
                                            {!! Form::text('nama_m_tingkat_pendidikan',null, ['class' => 'form-control', 'id'=>'nama_m_tingkat_pendidikan', 'readonly']) !!}
                                        </div>

                                        <label class="col-md-2 text-md-right col-form-label">Diklat Struktural</label>
                                        <div class="col-4">
                                                {!! Form::text('nama_diklat_struktural',null, ['class' => 'form-control', 'id'=>'nama_diklat_struktural', 'readonly']) !!}

                                        </div>

                                    </div>
                                </div>
                            </div>


            </div>
            <!-- end tab-pane -->
            <!-- begin tab-pane -->
            <div class="tab-pane fade" id="default-tab-2">


                    <div class="col-md-10 offset-md-2">


                            <div class="form-group row m-b-10">
                                    <label class="col-md-3 text-md-right col-form-label">Jenis Jabatan</label>
                                    <div class="col-md-6">
                                        {!!  Form::text('nama_m_jenis_jabatan',null,['placeholder'=>'Pilih','class' => 'form-control default-select2','id'=>'nama_m_jenis_jabatan', 'readonly']) !!}
                                    </div>
                                </div>

                                <div class="form-group row m-b-10">
                                    <label class="col-md-3 text-md-right col-form-label">Nama Jabatan</label>
                                    <div class="col-md-6">
                                        {!!  Form::text('nama_m_jabatan',null,['class' => 'form-control default-select2','id'=>'nama_m_jabatan', 'readonly']) !!}
                                    </div>
                                </div>


                            <div class="form-group row m-b-10">
                                <label class="col-md-3 text-md-right col-form-label">TMT Jabatan</label>
                                <div class="col-6">
                                    <div class="input-group date datepicker-default"   data-date-format="dd-mm-yyyy" >
                                        {!! Form::text('tmt_jabatan',null, ['class' => 'form-control', 'placeholder'=>'TMT Jabatan', 'id'=>'tmt_jabatan', 'readonly']) !!}
                                        <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row m-b-10">
                                <label class="col-md-3 text-md-right col-form-label">Instansi Kerja</label>
                                <div class="col-md-6">
                                    {!! Form::text('instansi_kerja',null, ['class' => 'form-control', 'id'=>'instansi_kerja', 'readonly']) !!}
                                </div>
                            </div>

                            <div class="form-group row m-b-10">
                                <label class="col-md-3 text-md-right col-form-label">Unit Organisasi</label>
                                <div class="col-md-6">
                                    {!! Form::text('unit_organisasi',null, ['class' => 'form-control', 'id'=>'unit_organisasi', 'readonly']) !!}
                                </div>
                            </div>

                            <div class="form-group row m-b-10">
                                <label class="col-md-3 text-md-right col-form-label">Nomor / Tanggal SK</label>
                                <div class="col-md-6">
                                    <div class="row row-space-6">
                                        <div class="col-6">
                                            {!! Form::text('nomor_sk',null, ['class' => 'form-control', 'placeholder'=>'Nomor SK', 'id'=>'nomor_sk', 'readonly']) !!}
                                        </div>

                                        <div class="col-6">
                                            <div class="input-group date datepicker-default"   data-date-format="dd-mm-yyyy" >
                                                {!! Form::text('tanggal_sk',null, ['class' => 'form-control', 'placeholder'=>'Pilih Tanggal', 'id'=>'tanggal_lahir', 'readonly']) !!}
                                                <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row m-b-10">
                                <label class="col-md-3 text-md-right col-form-label">TMT Pelantikan</label>
                                <div class="col-6">
                                    <div class="input-group date datepicker-default"   data-date-format="dd-mm-yyyy" >
                                        {!! Form::text('tmt_pelantikan',null, ['class' => 'form-control', 'placeholder'=>'TMT Pelantikan', 'id'=>'tmt_pelantikan', 'readonly']) !!}
                                        <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                    </div>
                                </div>
                            </div>


                        </div>



            </div>
            <!-- end tab-pane -->
            <!-- begin tab-pane -->
            <div class="tab-pane fade" id="default-tab-3">


                    <div class="form-group row m-b-10">
                            <div class="col-md-12">
                                <div class="row row-space-6">
                            <label class="col-md-3 text-md-right col-form-label">Nomor Surat K.Dokter</label>

                                    <div class="col-3">
                                        {!! Form::text('nomor_surat_ket_dokter',null, ['class' => 'form-control', 'placeholder'=>'Nomor Surat ', 'id'=>'nomor_surat_ket_dokter']) !!}
                                    </div>

                                    <label class="col-md-3 text-md-right col-form-label">Tanggal Surat K.Dokter</label>
                                    <div class="col-3 ">
                                        <div class="input-group date datepicker-default"   data-date-format="dd-mm-yyyy" >
                                            {!! Form::text('tanggal_surat_ket_dokter',null, ['class' => 'form-control', 'placeholder'=>'Tanggal Surat', 'id'=>'tanggal_surat_ket_dokter']) !!}
                                            <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="form-group row m-b-10">
                                <div class="col-md-12">
                                    <div class="row row-space-6">
                                <label class="col-md-3 text-md-right col-form-label">Nomor Surat K.Bebas Narkoba</label>

                                        <div class="col-3">
                                            {!! Form::text('nomor_surat_ket_b_n',null, ['class' => 'form-control', 'placeholder'=>'Nomor Surat ', 'id'=>'tanggal_surat_ket_b_n']) !!}
                                        </div>

                                        <label class="col-md-3 text-md-right col-form-label">Tanggal Surat K.Bebas Narkoba</label>
                                        <div class="col-3 ">
                                            <div class="input-group date datepicker-default"   data-date-format="dd-mm-yyyy" >
                                                {!! Form::text('tanggal_surat_ket_b_n',null, ['class' => 'form-control', 'placeholder'=>'Tanggal Surat', 'id'=>'tanggal_surat_ket_b_n']) !!}
                                                <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="form-group row m-b-10">
                                    <div class="col-md-12">
                                        <div class="row row-space-6">
                                    <label class="col-md-3 text-md-right col-form-label">Nomor SKCK</label>

                                            <div class="col-3">
                                                {!! Form::text('nomor_skck',null, ['class' => 'form-control', 'placeholder'=>'Nomor SKCK ', 'id'=>'nomor_skck']) !!}
                                            </div>

                                            <label class="col-md-3 text-md-right col-form-label">Tanggal SKCK</label>
                                            <div class="col-3 ">
                                                <div class="input-group date datepicker-default"   data-date-format="dd-mm-yyyy" >
                                                    {!! Form::text('tanggal_skck',null, ['class' => 'form-control', 'placeholder'=>'Tanggal SKCK', 'id'=>'tanggal_skck']) !!}
                                                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <div class="form-group row m-b-10">
                                        <div class="col-md-12">
                                            <div class="row row-space-6">
                                        <label class="col-md-3 text-md-right col-form-label">Akte Kelahiran</label>

                                                <div class="col-3">
                                                    {!! Form::text('akte_kelahiran',null, ['class' => 'form-control', 'placeholder'=>'Akte Kelahiran ', 'id'=>'akte_kelahiran']) !!}
                                                </div>

                                                <label class="col-md-3 text-md-right col-form-label">Status Hidup</label>
                                                <div class="col-3 ">
                                                        {!! Form::text('status_hidup',null, ['class' => 'form-control', 'placeholder'=>'Status Hidup ', 'id'=>'status_hidup']) !!}

                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="form-group row m-b-10">
                                            <div class="col-md-12">
                                                <div class="row row-space-6">
                                            <label class="col-md-3 text-md-right col-form-label">Akte Meninggal</label>

                                                    <div class="col-3">
                                                        {!! Form::text('akte_meninggal',null, ['class' => 'form-control', 'placeholder'=>'Akte Meninggal ', 'id'=>'akte_meninggal']) !!}
                                                    </div>

                                                    <label class="col-md-3 text-md-right col-form-label">Tanggal Meninggal</label>
                                                    <div class="col-3 ">
                                                        <div class="input-group date datepicker-default"   data-date-format="dd-mm-yyyy" >
                                                            {!! Form::text('tanggal_meninggal',null, ['class' => 'form-control', 'placeholder'=>'Tanggal Meninggal', 'id'=>'tanggal_meninggal']) !!}
                                                            <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group row m-b-10">
                                                <div class="col-md-12">
                                                    <div class="row row-space-6">
                                                <label class="col-md-3 text-md-right col-form-label">Nomor Askes</label>

                                                        <div class="col-3">
                                                            {!! Form::text('nomor_askes',null, ['class' => 'form-control', 'placeholder'=>'Nomor Askes ', 'id'=>'nomor_askes']) !!}
                                                        </div>

                                                        <label class="col-md-3 text-md-right col-form-label">Nomor Taspen</label>
                                                        <div class="col-3 ">
                                                                {!! Form::text('nomor_taspen',null, ['class' => 'form-control', 'placeholder'=>'Nomor Taspen ', 'id'=>'nomor_taspen']) !!}

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>



                                            <div class="form-group row m-b-10">
                                                    <div class="col-md-12">
                                                        <div class="row row-space-6">
                                                    <label class="col-md-3 text-md-right col-form-label">Nomor NPWP</label>

                                                            <div class="col-3">
                                                                {!! Form::text('nomor_npwp',null, ['class' => 'form-control', 'placeholder'=>'Nomor NPWP ', 'id'=>'nomor_npwp']) !!}
                                                            </div>

                                                            <label class="col-md-3 text-md-right col-form-label">Tanggal NPWP</label>
                                                            <div class="col-3 ">
                                                                <div class="input-group date datepicker-default"   data-date-format="dd-mm-yyyy" >
                                                                    {!! Form::text('tanggal_npwp',null, ['class' => 'form-control', 'placeholder'=>'Tanggal NPWP', 'id'=>'ta nggal_npwp']) !!}
                                                                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>



            </div>
            <!-- end tab-pane -->
        </div>



    </div>
</div>

{!! Form::close() !!}









@endsection

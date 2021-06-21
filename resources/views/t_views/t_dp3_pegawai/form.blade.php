{!! Form::model($model,  [
    'route'=>$model->exists ? ['update_data.dp3', $model->id_dp3] : 'dp3.store',
    'method'=> $model->exists ? 'POST' : 'POST'
]) !!}


<div class="row">
    <div class="col-md-10 offset-md-2">

        <div class="form-group row m-b-10">
                <label class="col-md-2 col-form-label">Tahun Penilaian</label>
                <div class="col-7">
                    <div class="input-group date datepicker-default"   data-date-format="yyyy" >
                        {!! Form::text('tahun_penilaian',null, ['class' => 'form-control', 'placeholder'=>'Tahun Penilaian', 'id'=>'tahun_penilaian']) !!}
                        <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                    </div>
                </div>
            </div>

            <div class="form-group row m-b-10">
                <label class="col-md-2 text-md-right col-form-label">File DP3</label>
                <div class="col-md-7">
                    {!!  Form::file('path_dp3',['placeholder'=>'Pilih','class' => 'form-control','id'=>'path_dp3','hidden'=>true]) !!}
                    <label for="path_dp3" class="btn-block">{{$model->exists == '' || $model->path_dp3 == '' ? 'Pilih File' : $model->nama_file_dp3}}</label>
                </div>
            </div>

        <div class="form-group row m-b-10">
            <div class="col-md-7">
                {!! Form::text('nip',$model->exists == '' ? $model2->nip : null, ['class' => 'form-control', 'id'=>'nip','hidden'=>true]) !!}
            </div>
        </div>

        <div class="form-group row m-b-10">
            <div class="col-md-9">

                <ul class="nav nav-tabs">
                    <li class="nav-items">
                        <a href="#default-tab-1" data-toggle="tab" class="nav-link active">
                            <span class="d-sm-none">Tab 1</span>
                            <span class="d-sm-block d-none">Penilaian</span>
                        </a>
                    </li>
                    <li class="nav-items">
                        <a href="#default-tab-2" data-toggle="tab" class="nav-link">
                            <span class="d-sm-none">Tab 2</span>
                            <span class="d-sm-block d-none">Pejabat Penilai</span>
                        </a>
                    </li>
                    <li class="">
                        <a href="#default-tab-3" data-toggle="tab" class="nav-link">
                            <span class="d-sm-none">Tab 3</span>
                            <span class="d-sm-block d-none">Atasan Pejabat Penilai</span>
                        </a>
                    </li>
                </ul>
                <!-- end nav-tabs -->
                <!-- begin tab-content -->
                <div class="tab-content">
                    <!-- begin tab-pane -->
                    <div class="tab-pane fade active show" id="default-tab-1">

                            <div class="form-group row m-b-10">
                                <div class="col-md-12">
                                    <div class="row row-space-6">

                                        <label class="col-md-3 text-md-right col-form-label">Kesetiaan</label>
                                        <div class="col-3">
                                            {!! Form::text('kesetiaan',null, ['class' => 'form-control', 'id'=>'kesetiaan']) !!}
                                        </div>

                                        <label class="col-md-3 text-md-right col-form-label">Prestasi Kerja</label>
                                        <div class="col-3">
                                                {!! Form::text('prestasi_kerja',null, ['class' => 'form-control', 'id'=>'prestasi_kerja']) !!}

                                        </div>

                                    </div>
                                </div>
                            </div>

                            <div class="form-group row m-b-10">
                                    <div class="col-md-12">
                                        <div class="row row-space-6">

                                            <label class="col-md-3 text-md-right col-form-label">Tanggung Jawab</label>
                                            <div class="col-3">
                                                {!! Form::text('tanggung_jawab',null, ['class' => 'form-control', 'id'=>'tanggung_jawab']) !!}
                                            </div>

                                            <label class="col-md-3 text-md-right col-form-label">Ketaatan</label>
                                            <div class="col-3">
                                                    {!! Form::text('ketaatan',null, ['class' => 'form-control', 'id'=>'ketaatan']) !!}
                                            </div>

                                        </div>
                                    </div>
                                </div>

                                <div class="form-group row m-b-10">
                                    <div class="col-md-12">
                                        <div class="row row-space-6">

                                            <label class="col-md-3 text-md-right col-form-label">Kejujuran</label>
                                            <div class="col-3">
                                                {!! Form::text('kejujuran',null, ['class' => 'form-control', 'id'=>'kejujuran']) !!}
                                            </div>

                                            <label class="col-md-3 text-md-right col-form-label">Kerjasama</label>
                                            <div class="col-3">
                                                    {!! Form::text('kerjasama',null, ['class' => 'form-control', 'id'=>'kerjasama']) !!}
                                            </div>

                                        </div>
                                    </div>
                                </div>

                                <div class="form-group row m-b-10">
                                    <div class="col-md-12">
                                        <div class="row row-space-6">

                                            <label class="col-md-3 text-md-right col-form-label">Prakarsa</label>
                                            <div class="col-3">
                                                {!! Form::text('prakarsa',null, ['class' => 'form-control', 'id'=>'prakarsa']) !!}
                                            </div>

                                            <label class="col-md-3 text-md-right col-form-label">Kepemimpinan</label>
                                            <div class="col-3">
                                                    {!! Form::text('kepemimpinan',null, ['class' => 'form-control', 'id'=>'kepemimpinan']) !!}
                                            </div>

                                        </div>
                                    </div>
                                </div>


                    </div>
                    <!-- end tab-pane -->
                    <!-- begin tab-pane -->
                    <div class="tab-pane fade" id="default-tab-2">

                            <div class="form-group row m-b-10">
                                <label class="col-md-4 text-md-right col-form-label">Nama Pejabat Penilai</label>
                                <div class="col-md-7">
                                    {!!  Form::select('nip_pp',$pegawai,null,['placeholder'=>'Pilih','class' => 'form-control default-select2','id'=>'nip_pp']) !!}
                                </div>
                            </div>

                            <div class="form-group row m-b-10">
                                <label class="col-md-4 text-md-right col-form-label">Jabatan Pejabat Penilai</label>
                                <div class="col-md-7">
                                    {!! Form::text('nama_jabatan_pp',null, ['class' => 'form-control', 'id'=>'nama_jabatan_pp','readonly'=>true]) !!}
                                </div>
                            </div>

                            <div class="form-group row m-b-10">
                                <label class="col-md-4 text-md-right col-form-label">Golongan/Ruang</label>
                                <div class="col-md-7">
                                     {!! Form::text('nama_golongan_pp',null, ['class' => 'form-control', 'id'=>'nama_golongan_pp' ,'readonly'=>true]) !!}
                                </div>
                            </div>

                            <div class="form-group row m-b-10">
                                <label class="col-md-4 text-md-right col-form-label">Pangkat</label>
                                <div class="col-md-7">
                                   {!! Form::text('nama_pangkat_pp',null, ['class' => 'form-control', 'id'=>'nama_pangkat_pp' ,'readonly'=>true]) !!}
                                </div>
                            </div>

                            <div class="form-group row m-b-10">
                                <label class="col-md-4 text-md-right col-form-label">Instansi Kerja</label>
                                <div class="col-md-7">
                                   {!! Form::text('instansi_kerja_pp',null, ['class' => 'form-control', 'id'=>'instansi_kerja_pp' ,'readonly'=>true]) !!}
                                </div>
                            </div>

                    </div>
                    <!-- end tab-pane -->
                    <!-- begin tab-pane -->
                    <div class="tab-pane fade" id="default-tab-3">

                            <div class="form-group row m-b-10">
                                    <label class="col-md-4 text-md-right col-form-label">Nama Atasan Pejabat Penilai</label>
                                    <div class="col-md-7">
                                    {!!  Form::select('nip_atasan_pp',$pegawai,null,['placeholder'=>'Pilih','class' => 'form-control default-select2','id'=>'nip_atasan_pp']) !!}

                                    </div>
                                </div>

                                <div class="form-group row m-b-10">
                                    <label class="col-md-4 text-md-right col-form-label">Jabatan Atasan Pejabat Penilai</label>
                                    <div class="col-md-7">
                                       {!! Form::text('nama_jabatan_atasan_pp',null, ['class' => 'form-control', 'id'=>'nama_jabatan_atasan_pp','readonly'=>true]) !!}
                                    </div>
                                </div>

                                <div class="form-group row m-b-10">
                                    <label class="col-md-4 text-md-right col-form-label">Golongan/Ruang</label>
                                    <div class="col-md-7">
                                       {!! Form::text('nama_golongan_atasan_pp',null, ['class' => 'form-control', 'id'=>'nama_golongan_atasan_pp' ,'readonly'=>true]) !!}
                                    </div>
                                </div>

                                <div class="form-group row m-b-10">
                                    <label class="col-md-4 text-md-right col-form-label">Pangkat</label>
                                    <div class="col-md-7">
                                        {!! Form::text('nama_pangkat_atasan_pp',null, ['class' => 'form-control', 'id'=>'nama_pangkat_atasan_pp' ,'readonly'=>true]) !!}

                                    </div>
                                </div>

                                <div class="form-group row m-b-10">
                                    <label class="col-md-4 text-md-right col-form-label">Instansi Kerja</label>
                                    <div class="col-md-7">
                                       {!! Form::text('instansi_kerja_atasan_pp',null, ['class' => 'form-control', 'id'=>'instansi_kerja_atasan_pp' ,'readonly'=>true]) !!}
                                    </div>
                                </div>



                    </div>
                    <!-- end tab-pane -->
                </div>



            </div>
        </div>



    </div>
</div>

{!! Form::close() !!}

<script>
        $('.default-select2').css('width', '100%');
        $('.default-select2').select2({
            dropdownParent: $('#modal'),
            placeholder : "---Pilih---",
            allowClear: true
        });

        $('.date').datepicker({
            format: " yyyy",
            viewMode: "years",
            minViewMode: "years"
        });


        $(document).ready(function() {
            $('select[name="nip_pp"]').on('change', function() {
                var stateID = $(this).val();
                console.log(stateID);
                if(stateID) {
                    $.ajax({
                        url: '/dp3_nama_jabatan_pp/ajax/'+stateID,
                        type: "GET",
                        dataType: "json",
                        success:function(data) {
                            $('[name="nama_jabatan_pp"]').empty();
                            $.each(data.nama_jabatan, function(key, value) {
                                $('[name="nama_jabatan_pp"]').val(value.nama_m_jabatan);
                                $('[name="instansi_kerja_pp"]').val(value.nama_m_skpd);
                            });


                            $('[name="nama_golongan_pp"]').empty();
                            $('[name="nama_pangkat_pp"]').empty();
                            $.each(data.nama_golongan_pangkat, function(key, value) {
                                $('[name="nama_golongan_pp"]').val(value.nama_golongan);
                                $('[name="nama_pangkat_pp"]').val(value.nama_pangkat);
                            });
                        }
                    });
                }else{
                    $('select[name="nama_jabatan_pp"]').empty();
                }
            });
        });


        $(document).ready(function() {
            $('select[name="nip_atasan_pp"]').on('change', function() {
                var stateID = $(this).val();
                console.log(stateID);
                if(stateID) {
                    $.ajax({
                        url: '/dp3_nama_jabatan_atasan_pp/ajax/'+stateID,
                        type: "GET",
                        dataType: "json",
                        success:function(data) {
                            $('[name="nama_jabatan_atasan_pp"]').empty();
                            $.each(data.nama_jabatan, function(key, value) {
                                $('[name="nama_jabatan_atasan_pp"]').val(value.nama_m_jabatan);
                                $('[name="instansi_kerja_atasan_pp"]').val(value.nama_m_skpd);
                            });


                            $('[name="nama_golongan_atasan_pp"]').empty();
                            $('[name="nama_pangkat_atasan_pp"]').empty();
                            $.each(data.nama_golongan_pangkat, function(key, value) {
                                $('[name="nama_golongan_atasan_pp"]').val(value.nama_golongan);
                                $('[name="nama_pangkat_atasan_pp"]').val(value.nama_pangkat);
                            });
                        }
                    });
                }else{
                    $('select[name="nama_jabatan_pp"]').empty();
                }
            });
        });


        $("[type=file]").on("change", function(){
            // Name of file and placeholder
            var file = this.files[0].name;
            var dflt = $(this).attr("placeholder");
            if($(this).val()!=""){
                $(this).next().text(file);
            } else {
                $(this).next().text(dflt);
            }
        });


    </script>







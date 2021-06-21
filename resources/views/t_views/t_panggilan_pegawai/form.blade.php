{!! Form::model($model,  [
    'route'=>$model->exists ? ['update_data.panggilan', $model->id_panggilan] : 'panggilan.store',
    'method'=> $model->exists ? 'POST' : 'POST'
]) !!}


<div class="row">
    <div class="col-md-10 offset-md-2">

        <div class="form-group row m-b-10">
                <label class="col-md-2 col-form-label">Nomor Surat</label>
                <div class="col-7">
                {!! Form::text('nomor_surat',null, ['class' => 'form-control', 'id'=>'nomor_surat']) !!}

                </div>
            </div>

            <div class="form-group row m-b-10">
                <label class="col-md-2 col-form-label">Panggilan Ke</label>
                <div class="col-7">
                {!! Form::text('surat_panggilan',null, ['class' => 'form-control', 'id'=>'surat_panggilan']) !!}

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
                        <a href="#default-tab-2" data-toggle="tab" class="nav-link active">
                            <span class="d-sm-none">Tab 2</span>
                            <span class="d-sm-block d-none">Pegawai Yang Di Panggil</span>
                        </a>
                    </li>
                    <li class="">
                        <a href="#default-tab-3" data-toggle="tab" class="nav-link">
                            <span class="d-sm-none">Tab 3</span>
                            <span class="d-sm-block d-none">Pegawai Pemeriksa</span>
                        </a>
                    </li>
                </ul>
                <!-- end nav-tabs -->
                <!-- begin tab-content -->
                <div class="tab-content">
                    <!-- begin tab-pane -->

                    <!-- begin tab-pane -->
                    <div class="tab-pane fade active show" id="default-tab-2">

                            <div class="form-group row m-b-10">
                                <label class="col-md-4 text-md-right col-form-label">Nama Pegawai</label>
                                <div class="col-md-7">
                                        {!! Form::text('nama_pegawai',$model2->nama_pegawai, ['class' => 'form-control', 'id'=>'nama_pegawai' ,'readonly'=>true]) !!}
                                        {!! Form::text('nip_periksa',$model2->nip, ['class' => 'form-control', 'id'=>'nip_periksa' ,'hidden'=>true]) !!}

                                </div>
                            </div>

                            <div class="form-group row m-b-10">
                                <label class="col-md-4 text-md-right col-form-label">Jabatan Pejabat Penilai</label>
                                <div class="col-md-7">
                                    {!! Form::text('jabatan_periksa',null, ['class' => 'form-control', 'id'=>'jabatan_periksa','readonly'=>true]) !!}
                                </div>
                            </div>

                            <div class="form-group row m-b-10">
                                <label class="col-md-4 text-md-right col-form-label">Golongan/Ruang</label>
                                <div class="col-md-7">
                                     {!! Form::text('pangkat_periksa',null, ['class' => 'form-control', 'id'=>'pangkat_periksa' ,'readonly'=>true]) !!}
                                </div>
                            </div>


                            <div class="form-group row m-b-10">
                                <label class="col-md-4 text-md-right col-form-label">Instansi Kerja</label>
                                <div class="col-md-7">
                                   {!! Form::text('unit_kerja_periksa',null, ['class' => 'form-control', 'id'=>'unit_kerja_periksa' ,'readonly'=>true]) !!}
                                </div>
                            </div>

                    </div>
                    <!-- end tab-pane -->
                    <!-- begin tab-pane -->
                    <div class="tab-pane fade" id="default-tab-3">

                            <div class="form-group row m-b-10">
                                    <label class="col-md-4 text-md-right col-form-label">Nama Pemeriksa</label>
                                    <div class="col-md-7">
                                    {!!  Form::select('nip_pemeriksa',$pegawai,null,['placeholder'=>'Pilih','class' => 'form-control default-select2','id'=>'nip_pemeriksa']) !!}

                                    </div>
                                </div>

                                <div class="form-group row m-b-10">
                                    <label class="col-md-4 text-md-right col-form-label">Jabatan</label>
                                    <div class="col-md-7">
                                       {!! Form::text('jabatan_pemeriksa',null, ['class' => 'form-control', 'id'=>'jabatan_pemeriksa','readonly'=>true]) !!}
                                    </div>
                                </div>

                                <div class="form-group row m-b-10">
                                    <label class="col-md-4 text-md-right col-form-label">Pangkat</label>
                                    <div class="col-md-7">
                                       {!! Form::text('pangkat_pemeriksa',null, ['class' => 'form-control', 'id'=>'pangkat_pemeriksa' ,'readonly'=>true]) !!}
                                    </div>
                                </div>




                    </div>
                    <!-- end tab-pane -->

                </div>




            </div>
        </div>

        <div class="form-group row m-b-10">
                <label class="col-md-1 col-form-label">Hari</label>
                <div class="col-4">
                {!! Form::text('hari',null, ['class' => 'form-control', 'id'=>'hari']) !!}

                </div>

                <label class="col-md-1 col-form-label">Tanggal</label>
                <div class="col-4">
                        <div class="input-group date datepicker-default"   data-date-format="dd-mm-yyyy" >
                                {!! Form::text('tanggal',null, ['class' => 'form-control', 'placeholder'=>'Tanggal Mulai', 'id'=>'tanggal']) !!}
                                <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                            </div>
                </div>
            </div>

            <div class="form-group row m-b-10">
                    <label class="col-md-1 col-form-label">Jam</label>
                    <div class="col-4">
                    {!! Form::text('jam',null, ['class' => 'form-control', 'id'=>'jam']) !!}

                    </div>

                    <label class="col-md-1 col-form-label">Tempat</label>
                    <div class="col-4">
                    {!! Form::text('tempat',null, ['class' => 'form-control', 'id'=>'tempat']) !!}

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

        $('.date').datepicker();



        $.ajax({
            url: '/dp3_nama_jabatan_pp/ajax/'+"{{Request::segment(2)}}",
            type: "GET",
            dataType: "json",
            success:function(data) {
                $('[name="jabatan_periksa"]').empty();
                $.each(data.nama_jabatan, function(key, value) {
                    $('[name="jabatan_periksa"]').val(value.nama_m_jabatan);
                    $('[name="unit_kerja_periksa"]').val(value.nama_m_skpd);
                });


                $('[name="pangkat_periksa"]').empty();
                $.each(data.nama_golongan_pangkat, function(key, value) {
                    $('[name="pangkat_periksa"]').val(value.nama_golongan);
                });
            }
        });


        $(document).ready(function() {
            $('select[name="nip_pemeriksa"]').on('change', function() {
                var stateID = $(this).val();
                console.log(stateID);
                if(stateID) {
                    $.ajax({
                        url: '/dp3_nama_jabatan_atasan_pp/ajax/'+stateID,
                        type: "GET",
                        dataType: "json",
                        success:function(data) {
                            $('[name="jabatan_pemeriksa"]').empty();
                            $.each(data.nama_jabatan, function(key, value) {
                                $('[name="jabatan_pemeriksa"]').val(value.nama_m_jabatan);
                            });


                            $('[name="pangkat_pemeriksa"]').empty();
                            $.each(data.nama_golongan_pangkat, function(key, value) {
                                $('[name="pangkat_pemeriksa"]').val(value.nama_golongan);
                            });
                        }
                    });
                }else{
                    $('select[name="jabatan_pemeriksa"]').empty();
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







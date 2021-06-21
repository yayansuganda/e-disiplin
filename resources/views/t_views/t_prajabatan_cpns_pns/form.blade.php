{!! Form::model($model,  [
    'route'=>$model->exists ? ['update_data.prajabatan_cpns_pns', $model->nip] : 'prajabatan_cpns_pns.store',
    'method'=> $model->exists ? 'POST' : 'POST',
    'enctype' => 'multipart/form-data'
]) !!}


<div class="row">
    <div class="col-md-10 offset-md-2">

            <div class="form-group row m-b-10">
                <div class="col-md-9">
                    <div class="row row-space-6">
                        <div class="col-md-9">
                            {!! Form::text('nip',$model->exists == '' ? $model2->nip : null, ['class' => 'form-control', 'id'=>'nip', 'hidden'=>true]) !!}
                        </div>
                    </div>
                </div>
            </div>

            <div class="form-group row m-b-10">
                <div class="col-md-9">
                    <div class="row row-space-6">
                        <label class="col-md-3 text-md-right col-form-label">Status Kepegawaian</label>
                        <div class="col-9 ">
                            {!!  Form::select('id_m_status_kepegawaian',$status_kepegawaian,null,['placeholder'=>'Pilih','class' => 'form-control default-select2','id'=>'id_m_status_kepegawaian']) !!}
                        </div>
                    </div>
                </div>
            </div>

            <div class="form-group row m-b-10">
                <div class="col-md-9">
                    <div class="row row-space-6">
                        <label class="col-md-3 text-md-right col-form-label">TMT CPNS</label>
                        <div class="col-3">
                            <div class="input-group date datepicker-default"   data-date-format="dd-mm-yyyy" >
                                {!! Form::text('tmt_cpns',null, ['class' => 'form-control', 'placeholder'=>'TMT CPNS', 'id'=>'tmt_cpns']) !!}
                                <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                            </div>
                        </div>

                        <label class="col-md-3 text-md-right col-form-label">TMT PNS</label>
                        <div class="col-3 ">
                            <div class="input-group date datepicker-default"   data-date-format="dd-mm-yyyy" >
                                {!! Form::text('tmt_pns',null, ['class' => 'form-control', 'placeholder'=>'TMT PNS', 'id'=>'tmt_pns']) !!}
                                <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="form-group row m-b-10">
                <div class="col-md-9">
                    <div class="row row-space-6">
                        <label class="col-md-3 text-md-right col-form-label">Nomor SK CPNS</label>
                        <div class="col-3">
                            {!! Form::text('nomor_sk_cpns',null, ['class' => 'form-control', 'placeholder'=>'Nomor Sk CPNS', 'id'=>'nomor_sk_cpns']) !!}
                        </div>

                        <label class="col-md-3 text-md-right col-form-label">Tanggal SK CPNS</label>
                        <div class="col-3 ">
                            <div class="input-group date datepicker-default"   data-date-format="dd-mm-yyyy" >
                                {!! Form::text('tanggal_sk_cpns',null, ['class' => 'form-control', 'placeholder'=>'Pilih', 'id'=>'tanggal_sk_cpns']) !!}
                                <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="form-group row m-b-10">
                <div class="col-md-9">
                    <div class="row row-space-6">
                        <label class="col-md-3 text-md-right col-form-label">Upload SK CPNS</label>
                        <div class="col-9 ">
                            {!!  Form::file('path_sk_cpns',['placeholder'=>'Pilih','class' => 'form-control','id'=>'path_sk_cpns','hidden'=>true]) !!}
                            <label for="path_sk_cpns" class="btn-block">{{$model->exists == '' || $model->nama_file_sk_cpns == '' ? 'Pilih File' : $model->nama_file_sk_cpns}}</label>
                        </div>
                    </div>
                </div>
            </div>


            <div class="form-group row m-b-10">
                <div class="col-md-9">
                    <div class="row row-space-6">
                        <label class="col-md-3 text-md-right col-form-label">Nomor SK PNS</label>
                        <div class="col-3">
                            {!! Form::text('nomor_sk_pns',null, ['class' => 'form-control', 'placeholder'=>'Nomor Sk PNS', 'id'=>'nomor_sk_pns']) !!}
                        </div>

                        <label class="col-md-3 text-md-right col-form-label">Tanggal SK PNS</label>
                        <div class="col-3 ">
                            <div class="input-group date datepicker-default"   data-date-format="dd-mm-yyyy" >
                                {!! Form::text('tanggal_sk_pns',null, ['class' => 'form-control', 'placeholder'=>'Pilih', 'id'=>'tanggal_sk_pns']) !!}
                                <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="form-group row m-b-10">
                <div class="col-md-9">
                    <div class="row row-space-6">
                        <label class="col-md-3 text-md-right col-form-label">Upload SK PNS</label>
                        <div class="col-9 ">
                            {!!  Form::file('path_sk_pns',[ 'placeholder'=>'Pilih','class' => 'form-control','id'=>'path_sk_pns','hidden'=>true]) !!}
                            <label for="path_sk_pns" class="btn-block">{{$model->exists == '' || $model->nama_file_sk_pns == '' ? 'Pilih File' : $model->nama_file_sk_pns}}</label>

                        </div>
                    </div>
                </div>
            </div>


            <div class="form-group row m-b-10">
                <div class="col-md-9">
                    <div class="row row-space-6">
                        <label class="col-md-3 text-md-right col-form-label">Karis/Karsu</label>
                        <div class="col-3">
                            {!! Form::text('karis_karsu',null, ['class' => 'form-control', 'placeholder'=>'Karis/Karsu', 'id'=>'karis_karsu']) !!}
                        </div>

                        <label class="col-md-3 text-md-right col-form-label">Karpeg</label>
                        <div class="col-3 ">
                            {!! Form::text('karpeg',null, ['class' => 'form-control', 'placeholder'=>'Nomor Karpeg', 'id'=>'karpeg']) !!}
                        </div>
                    </div>
                </div>
            </div>

            <div class="form-group row m-b-10">
                <div class="col-md-9">
                    <div class="row row-space-6">
                        <label class="col-md-3 text-md-right col-form-label">Upload Karsu/Karis</label>
                        <div class="col-9 ">
                            {!!  Form::file('path_karsu_karis',['placeholder'=>'Pilih','class' => 'form-control','id'=>'path_karsu_karis','hidden'=>true]) !!}
                            <label for="path_karsu_karis" class="btn-block">{{$model->exists == '' || $model->nama_file_karsu_karis == '' ? 'Pilih File' : $model->nama_file_karsu_karis}}</label>

                        </div>
                    </div>
                </div>
            </div>

            <div class="form-group row m-b-10">
                <div class="col-md-9">
                    <div class="row row-space-6">
                        <label class="col-md-3 text-md-right col-form-label">Upload Karpeg</label>
                        <div class="col-9 ">
                            {!!  Form::file('path_karpeg',['placeholder'=>'Pilih','class' => 'form-control','id'=>'path_karpeg2','hidden'=>true]) !!}
                            <label for="path_karpeg2" class="btn-block">{{$model->exists == '' || $model->nama_file_karpeg == '' ? 'Pilih File' : $model->nama_file_karpeg}}</label>

                        </div>
                    </div>
                </div>
            </div>


            <div class="form-group row m-b-10">
                <div class="col-md-9">
                    <div class="row row-space-6">
                        <label class="col-md-3 text-md-right col-form-label">Nomor STTPL</label>
                        <div class="col-3">
                            {!! Form::text('nomor_sttpl',null, ['class' => 'form-control', 'placeholder'=>'Nomor STTPL', 'id'=>'nomor_sttpl']) !!}
                        </div>

                        <label class="col-md-3 text-md-right col-form-label">Tanggal STTPL</label>
                        <div class="col-3 ">
                            <div class="input-group date datepicker-default"   data-date-format="dd-mm-yyyy" >
                                {!! Form::text('tanggal_sttpl',null, ['class' => 'form-control', 'placeholder'=>'Pilih', 'id'=>'tanggal_sttpl']) !!}
                                <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="form-group row m-b-10">
                <div class="col-md-9">
                    <div class="row row-space-6">
                        <label class="col-md-3 text-md-right col-form-label">Upload STTPL</label>
                        <div class="col-9 ">
                            {!!  Form::file('path_sttpl',['placeholder'=>'Pilih','class' => 'form-control','id'=>'path_sttpl2','hidden'=>true]) !!}
                            <label for="path_sttpl2" class="btn-block">{{$model->exists == '' || $model->nama_file_sttpl == '' ? 'Pilih File' : $model->nama_file_sttpl}}</label>

                        </div>
                    </div>
                </div>
            </div>

            <div class="form-group row m-b-10">
                <div class="col-md-9">
                    <div class="row row-space-6">
                        <label class="col-md-3 text-md-right col-form-label">Taspen</label>
                        <div class="col-9 ">
                            {!! Form::text('taspen',null, ['class' => 'form-control', 'placeholder'=>'Pilih', 'id'=>'taspen']) !!}
                        </div>
                    </div>
                </div>
            </div>

            <div class="form-group row m-b-10">
                <div class="col-md-9">
                    <div class="row row-space-6">
                        <label class="col-md-3 text-md-right col-form-label">Upload Taspen</label>
                        <div class="col-9 ">
                            {!!  Form::file('path_taspen',['placeholder'=>'Pilih','class' => 'form-control','id'=>'path_taspen2','hidden'=>true]) !!}
                            <label for="path_taspen2" class="btn-block">{{$model->exists == '' || $model->nama_file_taspen == '' ? 'Pilih File' : $model->nama_file_taspen}}</label>
                        </div>
                    </div>
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

    $('.date').datepicker();


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


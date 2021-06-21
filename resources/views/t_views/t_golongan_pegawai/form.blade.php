{!! Form::model($model,  [
    'route'=>$model->exists ? ['update_data.golongan', $model->id_golongan_pegawai] : 'golongan.store',
    'method'=> $model->exists ? 'POST' : 'POST'
]) !!}


<div class="row">
    <div class="col-md-10 offset-md-2">



            <div class="form-group row m-b-10">
                <div class="col-md-6">
                    {!! Form::text('nip',$model->exists == '' ? $model2->nip : null, ['class' => 'form-control', 'id'=>'nip', 'hidden'=>true]) !!}
                </div>
            </div>

            <div class="form-group row m-b-10">
                <label class="col-md-3 text-md-right col-form-label">Pangkat/Golongan</label>
                <div class="col-md-6">
                    <div class="row row-space-6">
                    <div class="col-6">
                        {!!  Form::select('id_m_pangkat_golongan',$m_ruang_golongan,null,['placeholder'=>'Pilih','class' => 'form-control default-select2','id'=>'id_m_pangkat_golongan']) !!}
                    </div>

                    <div class="col-6">
                         {!! Form::text('nama_pangkat',null, ['class' => 'form-control', 'placeholder'=>'Nama Pangkat', 'id'=>'nama_pangkat','readonly'=>true]) !!}
                        </div>
                    </div>
                </div>
            </div>

            <div class="form-group row m-b-10">
                <label class="col-md-3 text-md-right col-form-label">Nomor / Tanggal SK</label>
                <div class="col-md-6">
                    <div class="row row-space-6">
                        <div class="col-6">
                            {!! Form::text('nomor_sk',null, ['class' => 'form-control', 'placeholder'=>'Nomor SK', 'id'=>'nomor_sk']) !!}
                        </div>

                        <div class="col-6">
                            <div class="input-group date datepicker-default"   data-date-format="dd-mm-yyyy" >
                                {!! Form::text('tanggal_sk',null, ['class' => 'form-control', 'placeholder'=>'Pilih Tanggal', 'id'=>'tanggal_lahir']) !!}
                                <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="form-group row m-b-10">
                <label class="col-md-3 text-md-right col-form-label">TMT Golongan</label>
                <div class="col-md-6">
                    <div class="input-group date datepicker-default"   data-date-format="dd-mm-yyyy" >
                        {!! Form::text('tmt_golongan',null, ['class' => 'form-control', 'placeholder'=>'Pilih Tanggal', 'id'=>'tmt_golongan']) !!}
                        <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                    </div>
                </div>
            </div>

            <div class="form-group row m-b-10">
                <label class="col-md-3 text-md-right col-form-label">Nomor & Tanggal BKN</label>
                <div class="col-md-6">
                    <div class="row row-space-6">
                        <div class="col-6">
                            {!! Form::text('nomor_bkn',null, ['class' => 'form-control', 'placeholder'=>'Nomor BKN', 'id'=>'nomor_bkn']) !!}
                        </div>

                        <div class="col-6">
                            <div class="input-group date datepicker-default"   data-date-format="dd-mm-yyyy" >
                                {!! Form::text('tanggal_bkn',null, ['class' => 'form-control', 'placeholder'=>'Pilih Tanggal', 'id'=>'tanggal_bkn']) !!}
                                <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="form-group row m-b-10">
                <label class="col-md-3 text-md-right col-form-label">Jenis KP</label>
                <div class="col-md-6">
                    {!!  Form::select('id_m_jenis_kp',$jenis_kp,null,['placeholder'=>'Pilih','class' => 'form-control default-select2','id'=>'id_m_jenis_kp']) !!}

                </div>
            </div>

            <div class="form-group row m-b-10">
                <label class="col-md-3 text-md-right col-form-label">File SK Kenaikan Pangkat</label>
                <div class="col-md-6">
                    {!!  Form::file('path_sk_kenaikan_pangkat',['placeholder'=>'Pilih','class' => 'form-control','id'=>'path_sk_kenaikan_pangkat','hidden'=>true]) !!}
                    <label for="path_sk_kenaikan_pangkat" class="btn-block">{{$model->exists == '' || $model->nama_file_sk_kenaikan_pangkat == '' ? 'Pilih File' : $model->nama_file_sk_kenaikan_pangkat}}</label>
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

    $(document).ready(function() {
        $('select[name="id_m_pangkat_golongan"]').on('change', function() {
            var stateID = $(this).val();
            console.log(stateID);
            if(stateID) {
                $.ajax({
                    url: '/m_jenis_pangkat/ajax/'+stateID,
                    type: "GET",
                    dataType: "json",
                    success:function(data) {
                        $('[name="nama_pangkat"]').empty();
                        $.each(data, function(key, value) {
                            $('[name="nama_pangkat"]').val(value);
                        });
                    }
                });
            }else{
                $('select[name="id_m_jenis_pangkat"]').empty();
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


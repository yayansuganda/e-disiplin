{!! Form::model($model,  [
    'route'=>$model->exists ? ['update_data.keluarga_kandung', $model->id_keluarga_kandung] : 'keluarga_kandung.store',
    'method'=> 'POST'
]) !!}


<div class="row">
    <div class="col-md-10 offset-md-2">

            <div class="form-group row m-b-10">
                <div class="col-md-6">
                    {!! Form::text('nip',$model->exists == '' ? $model2->nip : null, ['class' => 'form-control', 'id'=>'nip', 'hidden'=>true]) !!}

                </div>
            </div>

            <div class="form-group row m-b-10">
                <label class="col-md-3 text-md-right col-form-label">Nama Keluarga</label>
                <div class="col-md-6">
                    {!! Form::text('nama_keluarga',null, ['class' => 'form-control', 'id'=>'nama_keluarga']) !!}
                </div>
            </div>

            <div class="form-group row m-b-10">
                <label class="col-md-3 text-md-right col-form-label">Hubungan Keluarga</label>
                <div class="col-md-6">
                    {!!  Form::select('id_m_hubungan_keluarga',$hubungan_keluarga,null,['placeholder'=>'Pilih','class' => 'form-control default-select2','id'=>'id_m_hubungan_keluarga']) !!}
                </div>
            </div>

            <div class="form-group row m-b-10">
                <label class="col-md-3 text-md-right col-form-label">Tempat Lahir</label>
                <div class="col-md-6">
                    {!!  Form::select('tempat_lahir',$tempat_lahir,null,['placeholder'=>'Pilih','class' => 'form-control default-select2','id'=>'tempat_lahir']) !!}
                </div>
            </div>

            <div class="form-group row m-b-10">
                <label class="col-md-3 text-md-right col-form-label">Tanggal Lahir</label>
                <div class="col-6">
                    <div class="input-group date datepicker-default"   data-date-format="dd-mm-yyyy" >
                        {!! Form::text('tanggal_lahir',null, ['class' => 'form-control', 'placeholder'=>'Tanggal Lahir', 'id'=>'tanggal_lahir']) !!}
                        <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                    </div>
                </div>
            </div>

            <div class="form-group row m-b-10">
                <label class="col-md-3 text-md-right col-form-label">Status Hidup</label>
                <div class="col-md-9">
                    <div class="form-check form-check-inline">
                        {!! Form::radio('status_hidup', 'Hidup', true ) !!}
                        <label class="form-check-label" for="defaultInlineRadio1">Hidup</label>
                    </div>
                    <div class="form-check form-check-inline">
                            {!! Form::radio('status_hidup', 'Meninggal', false ) !!}
                        <label class="form-check-label" for="defaultInlineRadio2">Meninggal</label>
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

</script>


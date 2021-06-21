{!! Form::model($model,  [
    'route'=>$model->exists ? ['update_data.anak', $model->id_anak] : 'anak.store',
    'method'=> $model->exists ? 'POST' : 'POST'
]) !!}


<div class="row">
    <div class="col-md-10 offset-md-2">

            <div class="form-group row m-b-10">
                <div class="col-md-6">
                        {!! Form::text('nip',$model->exists == '' ? $model2->nip : null, ['class' => 'form-control', 'id'=>'nip','hidden'=>true]) !!}
                </div>
            </div>

            <div class="form-group row m-b-10">
                <label class="col-md-3 text-md-right col-form-label">Nama Anak</label>
                <div class="col-md-6">
                    {!! Form::text('nama_anak',null, ['class' => 'form-control', 'id'=>'nama_anak']) !!}
                </div>
            </div>

            <div class="form-group row m-b-10">
                <label class="col-md-3 text-md-right col-form-label">Jenis Kelamin</label>
                <div class="col-md-9">
                    <div class="form-check form-check-inline">
                        {!! Form::radio('jenis_kelamin_anak', 'Laki-Laki', true ) !!}
                        <label class="form-check-label" for="defaultInlineRadio1">Laki-Laki</label>
                    </div>
                    <div class="form-check form-check-inline">
                            {!! Form::radio('jenis_kelamin_anak', 'Perempuan', false ) !!}
                        <label class="form-check-label" for="defaultInlineRadio2">Perempuan</label>
                    </div>
                </div>
            </div>

            <div class="form-group row m-b-10">
                <label class="col-md-3 text-md-right col-form-label">Tempat Lahir</label>
                <div class="col-md-6">
                    {!!  Form::select('tempat_lahir_anak',$tempat_lahir,null,['placeholder'=>'Pilih','class' => 'form-control default-select2','id'=>'tempat_lahir_anak']) !!}
                </div>
            </div>

            <div class="form-group row m-b-10">
                <label class="col-md-3 text-md-right col-form-label">Tanggal Lahir</label>
                <div class="col-6">
                    <div class="input-group date datepicker-default"   data-date-format="dd-mm-yyyy" >
                        {!! Form::text('tanggal_lahir_anak',null, ['class' => 'form-control', 'placeholder'=>'Tanggal Lahir', 'id'=>'tanggal_lahir_anak']) !!}
                        <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                    </div>
                </div>
            </div>

            <div class="form-group row m-b-10">
                <label class="col-md-3 text-md-right col-form-label">Status Anak</label>
                <div class="col-md-6">
                    <select id="status_anak" name="status_anak" class="default-select2 form-control ">
                        <option label="---pilih---">
                                <option value="Anak Kandung" {{$model->status_anak == 'Anak Kandung' ? 'selected' : null}}>Anak Kandung</option>
                                <option value="Anak Tiri" {{$model->status_anak == 'Anak Tiri' ? 'selected' : null}}>Anak Tiri</option>
                                <option value="Anak Angkat" {{$model->status_anak == 'Anak Angkat' ? 'selected' : null}}>Anak Angkat</option>

                </select>
                </div>
            </div>

            <div class="form-group row m-b-10">
                <label class="col-md-3 text-md-right col-form-label">Pekerjaan</label>
                <div class="col-md-6">
                    {!! Form::text('pekerjaan',null, ['class' => 'form-control', 'id'=>'pekerjaan']) !!}
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


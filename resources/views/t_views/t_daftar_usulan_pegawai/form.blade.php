{!! Form::model($model,  [
    'route'=>$model->exists ? ['daftar_usulan_pegawai.update', $model->id_anak] : 'daftar_usulan_pegawai.store',
    'method'=> $model->exists ? 'PUT' : 'POST'
]) !!}


<div class="row">
    <div class="col-md-10 offset-md-2">

            <div class="form-group row m-b-10">
                <label class="col-md-3 text-md-right col-form-label">Nama Pegawai</label>
                <div class="col-md-6">
                        {!! Form::text('id_usulan_pegawai',null, ['class' => 'form-control', 'id'=>'id_usulan_pegawai']) !!}


                </div>
            </div>

            <div class="form-group row m-b-10">
                <label class="col-md-3 text-md-right col-form-label">Nama Pegawai</label>
                <div class="col-md-6">
                    {!!  Form::select('nip',$pegawai,null,['placeholder'=>'Pilih','class' => 'form-control default-select2','id'=>'nip']) !!}
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


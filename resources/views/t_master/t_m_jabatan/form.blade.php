{!! Form::model($model,  [
    'route'=>$model->exists ? ['update_data.m_jabatan', $model->id_m_jabatan] : 'm_jabatan.store',
    'method'=> $model->exists ? 'POST' : 'POST'
]) !!}


<div class="row">
    <div class="col-md-10 offset-md-2">



            <div class="form-group row m-b-10">
                <label class="col-md-3 text-md-right col-form-label">Jenis Jabatan</label>
                <div class="col-md-6">
                    {!!  Form::select('id_m_jenis_jabatan',$jenis_jabatan,null,['placeholder'=>'Pilih','class' => 'form-control default-select2','id'=>'id_m_jenis_jabatan']) !!}
                </div>
            </div>


            <div class="form-group row m-b-10">
                <label class="col-md-3 text-md-right col-form-label">Nama Jabatan</label>
                <div class="col-md-6">
                    {!! Form::text('nama_m_jabatan',null, ['class' => 'form-control', 'id'=>'nama_m_jabatan']) !!}
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

</script>


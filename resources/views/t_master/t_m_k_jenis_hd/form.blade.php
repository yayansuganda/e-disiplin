{!! Form::model($model,  [
    'route'=>$model->exists ? ['update_data.m_k_jenis_hd', $model->id_k_jenis_hd] : 'm_k_jenis_hd.store',
    'method'=> $model->exists ? 'POST' : 'POST'
]) !!}


<div class="row">
    <div class="col-md-10 offset-md-2">


        <div class="form-group row m-b-10">
            <label class="col-md-3 text-md-right col-form-label">Jenis HD</label>
            <div class="col-md-6">
                {!!  Form::select('id_m_jenis_hd',$jenis_hd,null,['placeholder'=>'Pilih','class' => 'form-control default-select2','id'=>'id_m_jenis_hd']) !!}
            </div>
        </div>


            <div class="form-group row m-b-10">
                <label class="col-md-3 text-md-right col-form-label">Nama K.Jenis HD</label>
                <div class="col-md-6">
                    {!! Form::textarea('nama_k_jenis_hd',null, ['class' => 'form-control', 'id'=>'nama_k_jenis_hd','rows'=>3]) !!}
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


{!! Form::model($model,  [
    'route'=>$model->exists ? ['update_data.m_skpd', $model->id_m_skpd] : 'm_skpd.store',
    'method'=> $model->exists ? 'POST' : 'POST'
]) !!}


<div class="row">
    <div class="col-md-10 offset-md-2">




            <div class="form-group row m-b-10">
                <label class="col-md-3 text-md-right col-form-label">Nama SKPD</label>
                <div class="col-md-6">
                    {!! Form::textarea('nama_m_skpd',null, ['class' => 'form-control', 'id'=>'nama_m_skpd','rows'=>3]) !!}
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


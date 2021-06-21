{!! Form::model($model,  [
    'route'=>$model->exists ? ['update_data.subbidang', $model->id_m_skpd_subbidang] : 'unor_subbidang.store_subbidang',
    'method'=> $model->exists ? 'POST' : 'POST'
]) !!}


<div class="row">
    <div class="col-md-10 offset-md-2">



            {!! Form::text('id_m_skpd_bidang',$unor_bidang->id_m_skpd_bidang, ['class' => 'form-control', 'id'=>'id_m_skpd_bidang']) !!}

            <div class="form-group row m-b-10">
                <label class="col-md-3 text-md-right col-form-label">Nama Subbidang</label>
                <div class="col-md-6">
                    {!! Form::textarea('nama_m_skpd_subbidang',null, ['class' => 'form-control', 'id'=>'nama_m_skpd_subbidang']) !!}
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


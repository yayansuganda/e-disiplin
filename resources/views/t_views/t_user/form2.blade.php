{!! Form::model($model,  [
    'route'=>$model->exists ? ['user.update', $model->id] : 'user.store',
    'method'=> $model->exists ? 'POST' : 'POST'
]) !!}


<div class="row">
    <div class="col-md-10 offset-md-2">

            <div class="form-group row m-b-10">
                <label class="col-md-3 text-md-right col-form-label">Nama</label>
                <div class="col-md-6">
                    {!!  Form::select('nip',$pegawai,null,['placeholder'=>'Pilih','class' => 'form-control default-select2','id'=>'nip']) !!}
                </div>
            </div>

            <div class="form-group row m-b-10">
                <label class="col-md-3 text-md-right col-form-label">Email</label>
                <div class="col-md-6">
                    {!! Form::text('email',null, ['class' => 'form-control', 'id'=>'email']) !!}
                </div>
            </div>

            <div class="form-group row m-b-10">
                <label class="col-md-3 text-md-right col-form-label">Role</label>
                <div class="col-md-6">
                    {!!  Form::select('id_role',$rolepegawai,null,['placeholder'=>'Pilih','class' => 'form-control default-select2','id'=>'id_role']) !!}
                </div>
            </div>

            <div class="form-group row m-b-10">
                <label class="col-md-3 text-md-right col-form-label">Nama SKPD</label>
                <div class="col-md-6">
                    {!!  Form::select('id_m_skpd',$nama_skpd,null,['placeholder'=>'Pilih','class' => 'form-control default-select2','id'=>'id_m_skpd']) !!}
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


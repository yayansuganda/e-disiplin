{!! Form::model($model,  [
    'route'=>$model->exists ? ['user.ubah_password', $model->id] : 'user.store',
    'method'=> $model->exists ? 'POST' : 'POST'
]) !!}


<div class="row">
    <div class="col-md-10 offset-md-2">

            <div class="form-group row m-b-10">
                <label class="col-md-3 text-md-right col-form-label">New Password</label>
                <div class="col-md-6">
                    {!! Form::password('password', ['class' => 'form-control', 'id'=>'password']) !!}

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


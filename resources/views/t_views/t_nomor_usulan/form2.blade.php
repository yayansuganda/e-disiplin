
{!! Form::model($model,  [
    'route'=>['nomor_usulan.update', $model->id_usulan] ,
    'method'=>'POST',
    'enctype' => 'multipart/form-data'
]) !!}


<div class="row">


    <div class="col-md-10 offset-md-2">

        <div class="form-group row m-b-10">
            <label class="col-md-3 text-md-right col-form-label">Nomor / Tanggal Usulan</label>
            <div class="col-md-6">
                <div class="row row-space-6">
                    <div class="col-6">
                        {!! Form::text('nomor_usulan',null, ['class' => 'form-control', 'placeholder'=>'Nomor SK', 'id'=>'nomor_usulan']) !!}
                    </div>

                    <div class="col-6">
                        <div class="input-group date datepicker-default"   data-date-format="dd-mm-yyyy" >
                            {!! Form::text('tanggal_usulan',null, ['class' => 'form-control', 'placeholder'=>'Pilih Tanggal', 'id'=>'tanggal_usulan']) !!}
                            <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="form-group row m-b-10">
            <div class="col-md-6">
                {!! Form::text('satuan_kerja',auth()->user()->id_m_skpd, ['class' => 'form-control', 'placeholder'=>'Pilih Tanggal', 'id'=>'satuan_kerja', 'hidden'=>true]) !!}
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



{!! Form::model($model,  [
    'route'=>$model->exists ? ['update_data.kursus', $model->id_kursus] : 'kursus.store',
    'method'=> $model->exists ? 'POST' : 'POST'
]) !!}


<div class="row">
    <div class="col-md-10 offset-md-2">



            <div class="form-group row m-b-10">
                <div class="col-md-6">
                        {!! Form::text('nip',$model->exists == '' ? $model2->nip : null, ['class' => 'form-control', 'id'=>'nip']) !!}
                </div>
            </div>

            <div class="form-group row m-b-10">
                <label class="col-md-3 text-md-right col-form-label">Nama Kursus</label>
                <div class="col-md-6">
                    {!! Form::text('nama_kursus',null, ['class' => 'form-control', 'id'=>'nama_kursus']) !!}
                </div>
            </div>

            <div class="form-group row m-b-15">
                    <label class="col-md-3 text-md-right col-form-label">Alamat Kursus</label>
                    <div class="col-md-6">
                        {!! Form::textarea('alamat_kursus',null, ['class' => 'form-control', 'id'=>'alamat_kursus', 'rows'=>'2']) !!}
                    </div>
                </div>


                <div class="form-group row m-b-10">
                        <label class="col-md-3 text-md-right col-form-label">Tanggal Mulai</label>
                        <div class="col-6">
                            <div class="input-group date datepicker-default"   data-date-format="dd-mm-yyyy" >
                                {!! Form::text('tanggal_mulai',null, ['class' => 'form-control', 'placeholder'=>'Tanggal Mulai', 'id'=>'tanggal_mulai']) !!}
                                <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                            </div>
                        </div>
                    </div>


                    <div class="form-group row m-b-10">
                            <label class="col-md-3 text-md-right col-form-label">Tanggal Selesai</label>
                            <div class="col-6">
                                <div class="input-group date datepicker-default"   data-date-format="dd-mm-yyyy" >
                                    {!! Form::text('tanggal_selesai',null, ['class' => 'form-control', 'placeholder'=>'Tanggal Selesai', 'id'=>'tanggal_selesai']) !!}
                                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                </div>
                            </div>
                        </div>


                        <div class="form-group row m-b-10">
                                <label class="col-md-3 text-md-right col-form-label">Penyelenggara</label>
                                <div class="col-md-6">
                                    {!! Form::text('penyelenggara',null, ['class' => 'form-control', 'id'=>'penyelenggara']) !!}
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


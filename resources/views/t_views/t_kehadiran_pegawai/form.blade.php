{!! Form::model($model,  [
    'route'=>$model->exists ? ['kehadiran.update', $model->id_kehadiran_pegawai] : 'kehadiran.store',
    'method'=> $model->exists ? 'PUT' : 'POST',
]) !!}


<div class="row">
    <div class="col-md-10 offset-md-2">

            <div class="form-group row m-b-10">
                <label class="col-md-2 text-md-right col-form-label">Nama Pegawai</label>
                <div class="col-md-7">
                    {!!  Form::select('nip',$pegawai,null,['placeholder'=>'Pilih','class' => 'form-control default-select2','id'=>'nip']) !!}
                </div>
            </div>

            <div class="form-group row m-b-9">
                <div class="col-md-12">
                    <div class="row row-space-12">

                        <label class="col-md-2 text-md-right col-form-label">Hari Aktif</label>
                        <div class="col-3">
                            {!! Form::text('hari_aktif',null, ['class' => 'form-control', 'id'=>'hari_aktif']) !!}
                        </div>

                        <label class="col-md-1 text-md-right col-form-label">Hadir</label>
                        <div class="col-3">
                            {!! Form::text('hadir',null, ['class' => 'form-control', 'id'=>'hadir']) !!}

                        </div>

                    </div>
                </div>
            </div>

            <div class="form-group row m-b-9">
                <div class="col-md-12">
                    <div class="row row-space-12">

                        <label class="col-md-2 text-md-right col-form-label">Ijin</label>
                        <div class="col-3">
                            {!! Form::text('i',null, ['class' => 'form-control', 'id'=>'i']) !!}
                        </div>

                        <label class="col-md-1 text-md-right col-form-label">Cuti</label>
                        <div class="col-3">
                                {!! Form::text('c',null, ['class' => 'form-control', 'id'=>'c']) !!}

                        </div>

                    </div>
                </div>
            </div>


            <div class="form-group row m-b-10">
                <div class="col-md-12">
                    <div class="row row-space-12">

                        <label class="col-md-2 text-md-right col-form-label">Sakit</label>
                        <div class="col-3">
                            {!! Form::text('s',null, ['class' => 'form-control', 'id'=>'s']) !!}
                        </div>

                        <label class="col-md-1 text-md-right col-form-label">DL</label>
                        <div class="col-3">
                                {!! Form::text('dl',null, ['class' => 'form-control', 'id'=>'dl']) !!}

                        </div>

                    </div>
                </div>
            </div>


            <div class="form-group row m-b-10">
                <div class="col-md-12">
                    <div class="row row-space-6">

                        <label class="col-md-2 text-md-right col-form-label">DIK/TB</label>
                        <div class="col-3">
                            {!! Form::text('dik_tb',null, ['class' => 'form-control', 'id'=>'dik_tb']) !!}
                        </div>

                        <label class="col-md-1 text-md-right col-form-label">TL</label>
                        <div class="col-3">
                                {!! Form::text('tl',null, ['class' => 'form-control', 'id'=>'tl']) !!}

                        </div>

                    </div>
                </div>
            </div>


            <div class="form-group row m-b-10">
                <div class="col-md-12">
                    <div class="row row-space-6">

                        <label class="col-md-2 text-md-right col-form-label">TTW</label>
                        <div class="col-3">
                            {!! Form::text('ttw',null, ['class' => 'form-control', 'id'=>'ttw']) !!}
                        </div>

                        <label class="col-md-1 text-md-right col-form-label">TK</label>
                        <div class="col-3">
                                {!! Form::text('tk',null, ['class' => 'form-control', 'id'=>'tk']) !!}

                        </div>

                    </div>
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


{!! Form::model($model,  [
    'route'=>$model->exists ? ['update_data.diklat', $model->id_diklat] : 'diklat.store',
    'method'=> $model->exists ? 'POST' : 'POST'
]) !!}


<div class="row">
    <div class="col-md-10 offset-md-2">



            <div class="form-group row m-b-10">
                <div class="col-md-6">
                    {!! Form::text('nip',$model->exists == '' ? $model2->nip : null, ['class' => 'form-control', 'id'=>'nip','hidden'=>true]) !!}
                </div>
            </div>

            <div class="form-group row m-b-10">
                <label class="col-md-3 text-md-right col-form-label">Jenis Diklat</label>
                <div class="col-md-6">
                    {!!  Form::select('jenis_diklat',$jenis_diklat,null,['placeholder'=>'Pilih','class' => 'form-control default-select2','id'=>'jenis_diklat']) !!}
                </div>
            </div>

            <div class="form-group row m-b-10">
                <label class="col-md-3 text-md-right col-form-label">Nama Diklat</label>
                <div class="col-md-6">
                    {!! Form::text('nama_diklat',null, ['class' => 'form-control', 'id'=>'nama_diklat']) !!}
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

            <div class="form-group row m-b-15">
                <label class="col-md-3 text-md-right col-form-label">Alamat Diklat</label>
                <div class="col-md-6">
                    {!! Form::textarea('alamat_diklat',null, ['class' => 'form-control', 'id'=>'alamat_diklat', 'rows'=>'2']) !!}
                </div>
            </div>

            <div class="form-group row m-b-15">
                <label class="col-md-3 text-md-right col-form-label">File Diklat</label>
                <div class="col-md-6">
                    {!!  Form::file('path_diklat',['placeholder'=>'Pilih','class' => 'form-control','id'=>'path_diklat','hidden'=>true]) !!}
                    <label for="path_diklat" class="btn-block">{{$model->exists == '' || $model->nama_file_diklat == '' ? 'Pilih File' : $model->nama_file_diklat}}</label>
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

    $("[type=file]").on("change", function(){
        // Name of file and placeholder
        var file = this.files[0].name;
        var dflt = $(this).attr("placeholder");
        if($(this).val()!=""){
            $(this).next().text(file);
        } else {
            $(this).next().text(dflt);
        }
    });

</script>


{!! Form::model($model,  [
    'route'=>$model->exists ? ['update_data.penghargaan', $model->id_penghargaan] : 'penghargaan.store',
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
                <label class="col-md-3 text-md-right col-form-label">Nama Penghargaan</label>
                <div class="col-md-6">
                    {!! Form::text('nama_penghargaan',null, ['class' => 'form-control', 'id'=>'nama_penghargaan']) !!}
                </div>
            </div>

            <div class="form-group row m-b-10">
                <label class="col-md-3 text-md-right col-form-label">Tanggal Perolehan</label>
                <div class="col-6">
                    <div class="input-group date datepicker-default"   data-date-format="dd-mm-yyyy" >
                        {!! Form::text('tanggal_perolehan',null, ['class' => 'form-control', 'placeholder'=>'Tanggal Perolehan', 'id'=>'tanggal_perolehan']) !!}
                        <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                    </div>
                </div>
            </div>

            <div class="form-group row m-b-10">
                <label class="col-md-3 text-md-right col-form-label">Nomor</label>
                <div class="col-md-6">
                    {!! Form::text('nomor',null, ['class' => 'form-control', 'id'=>'nomor']) !!}
                </div>
            </div>

            <div class="form-group row m-b-10">
                <label class="col-md-3 text-md-right col-form-label">Negara Instansi Pemberi</label>
                <div class="col-md-6">
                    {!! Form::text('negara_instansi_pemberi',null, ['class' => 'form-control', 'id'=>'negara_instansi_pemberi']) !!}
                </div>
            </div>

            <div class="form-group row m-b-10">
                <label class="col-md-3 text-md-right col-form-label">Upload Penghargaan</label>
                <div class="col-md-6">
                    {!!  Form::file('path_penghargaan',['placeholder'=>'Pilih','class' => 'form-control','id'=>'path_penghargaan','hidden'=>true]) !!}
                    <label for="path_penghargaan" class="btn-block">{{$model->exists == '' || $model->nama_file_penghargaan == '' ? 'Pilih File' : $model->nama_file_penghargaan}}</label>
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


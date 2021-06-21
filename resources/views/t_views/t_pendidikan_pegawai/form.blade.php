{!! Form::model($model,  [
    'route'=>$model->exists ? ['update_data.pendidikan', $model->id_pendidikan_pegawai] : 'pendidikan.store',
    'method'=> $model->exists ? 'POST' : 'POST'
]) !!}


<div class="row">
    <div class="col-md-10 offset-md-2">



            <div class="form-group row m-b-10">
                <div class="col-md-6">
                        {!! Form::text('nip',$model->exists == '' ? $model2->nip : null, ['class' => 'form-control', 'id'=>'nip', 'hidden'=>true]) !!}
                </div>
            </div>

            <div class="form-group row m-b-10">
                <label class="col-md-3 text-md-right col-form-label">Tingkat Pendidikan</label>
                <div class="col-md-6">
                    {!!  Form::select('id_m_tingkat_pendidikan',$tingkat_pendidikan,null,['placeholder'=>'Pilih','class' => 'form-control default-select2','id'=>'id_m_tingkat_pendidikan']) !!}
                </div>
            </div>

            <div class="form-group row m-b-10">
                    <label class="col-md-3 text-md-right col-form-label">Tahun Lulus Sesuai Ijazah</label>
                    <div class="col-6">
                        <div class="input-group date datepicker-default"   data-date-format="dd-mm-yyyy" >
                            {!! Form::text('tanggal_ijazah',null, ['class' => 'form-control', 'placeholder'=>'Tanggal Lulus', 'id'=>'tanggal_ijazah']) !!}
                            <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                        </div>
                    </div>
                </div>

            <div class="form-group row m-b-10">
                <label class="col-md-3 text-md-right col-form-label">Nomor Ijazah</label>
                <div class="col-md-6">
                        {!! Form::text('nomor_ijazah',null, ['class' => 'form-control', 'placeholder'=>'Nomor Ijazah', 'id'=>'nomor_ijazah']) !!}
                </div>
            </div>

            <div class="form-group row m-b-10">
                <label class="col-md-3 text-md-right col-form-label">Upload Ijazah</label>
                <div class="col-md-6">
                    {!!  Form::file('path_ijazah',['placeholder'=>'Pilih','class' => 'form-control','id'=>'path_ijazah','hidden'=>true]) !!}
                    <label for="path_ijazah" class="btn-block">{{$model->exists == '' || $model->nama_file_ijazah == '' ? 'Pilih File' : $model->nama_file_ijazah}}</label>
                </div>
            </div>

            <div class="form-group row m-b-10">
                <label class="col-md-3 text-md-right col-form-label">Nama Sekolah</label>
                <div class="col-md-6">
                        {!! Form::text('nama_sekolah',null, ['class' => 'form-control', 'placeholder'=>'Nama Sekolah', 'id'=>'nama_sekolah']) !!}
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


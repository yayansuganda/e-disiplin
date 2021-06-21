{!! Form::model($model,  [
    'route'=>$model->exists ? ['update_data.tugas_belajar', $model->id_tugas_belajar] : 'tugas_belajar.store',
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
                <label class="col-md-3 text-md-right col-form-label">Nama Sekolah/Universitas</label>
                <div class="col-md-6">
                    {!! Form::text('nama_sekolah_universitas',null, ['class' => 'form-control', 'placeholder'=>'Nama Sekolah/Universitas', 'id'=>'nama_sekolah_universitas']) !!}
                </div>
            </div>

            <div class="form-group row m-b-10">
                <label class="col-md-3 text-md-right col-form-label">Nomor SK</label>
                <div class="col-md-6">
                    {!! Form::text('nomor_sk_tugas_belajar',null, ['class' => 'form-control', 'placeholder'=>'Nomor SK', 'id'=>'nomor_sk_tugas_belajar']) !!}
                </div>
            </div>

            <div class="form-group row m-b-10">
                <label class="col-md-3 text-md-right col-form-label">Tanggal SK</label>
                <div class="col-6">
                    <div class="input-group date datepicker-default"   data-date-format="dd-mm-yyyy" >
                        {!! Form::text('tanggal_sk_tugas_belajar',null, ['class' => 'form-control', 'placeholder'=>'Tanggal SK', 'id'=>'tanggal_sk_tugas_belajar']) !!}
                        <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                    </div>
                </div>
            </div>

            <div class="form-group row m-b-10">
                <label class="col-md-3 text-md-right col-form-label">File SK Tugas Belajar</label>
                <div class="col-md-6">
                    {!!  Form::file('path_sk_tugas_belajar',['placeholder'=>'Pilih','class' => 'form-control','id'=>'path_sk_tugas_belajar','hidden'=>true]) !!}
                    <label for="path_sk_tugas_belajar" class="btn-block">{{$model->exists == '' || $model->nama_file_sk_tugas_belajar == '' ? 'Pilih File' : $model->nama_file_sk_tugas_belajar}}</label>
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


{!! Form::model($model,  [
    'route'=>$model->exists ? ['update_data.mutasi', $model->id_mutasi] : 'mutasi.store',
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
                <label class="col-md-3 text-md-right col-form-label">Jenis Mutasi</label>
                <div class="col-md-6">
                        <select id="jenis_mutasi" name="jenis_mutasi" class="default-select2 form-control">
                            <option label="---pilih---">
                            <option value="Mutasi antar Instansi dari dan ke Pemerintah KSB" {{$model->jenis_mutasi == 'Mutasi antar Instansi dari dan ke Pemerintah KSB'  ? 'selected' : ''}}>Mutasi antar Instansi dari dan ke Pemerintah KSB</option>
                            <option value="Mutasi antar SKPD KSB" {{$model->jenis_mutasi == 'Mutasi antar SKPD KSB'  ? 'selected' : ''}}>Mutasi antar SKPD KSB</option>
                        </select>
                </div>
            </div>


            <div class="form-group row m-b-10">
                <label class="col-md-3 text-md-right col-form-label">Instansi/Unit Kerja Baru</label>
                <div class="col-md-6">
                    {!!  Form::select('instansi_unit_kerja_baru',$nama_skpd,null,['placeholder'=>'Pilih','class' => 'form-control default-select2','id'=>'instansi_unit_kerja_baru']) !!}

                </div>
            </div>

            <div class="form-group row m-b-10">
                <label class="col-md-3 text-md-right col-form-label">Nomor SK</label>
                <div class="col-md-6">
                        {!! Form::text('nomor_sk_mutasi',null, ['class' => 'form-control', 'placeholder'=>'Nomor SK', 'id'=>'nomor_sk_mutasi']) !!}
                </div>
            </div>

            <div class="form-group row m-b-10">
                <label class="col-md-3 text-md-right col-form-label">Tanggal SK</label>
                <div class="col-6">
                    <div class="input-group date datepicker-default"   data-date-format="dd-mm-yyyy" >
                        {!! Form::text('tanggal_sk_mutasi',null, ['class' => 'form-control', 'placeholder'=>'Tanggal SK', 'id'=>'tanggal_sk_mutasi']) !!}
                        <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                    </div>
                </div>
            </div>

            <div class="form-group row m-b-10">
                <label class="col-md-3 text-md-right col-form-label">File SK Mutasi</label>
                <div class="col-md-6">
                    {!!  Form::file('path_sk_mutasi',['placeholder'=>'Pilih','class' => 'form-control','id'=>'path_sk_mutasi','hidden'=>true]) !!}
                    <label for="path_sk_mutasi" class="btn-block">{{$model->exists == '' || $model->nama_file_sk_mutasi == '' ? 'Pilih File' : $model->nama_file_sk_mutasi}}</label>
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


{!! Form::model($model,  [
    'route'=>$model->exists ? ['update_data.cuti', $model->id_cuti] : 'cuti.store',
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
                <label class="col-md-3 text-md-right col-form-label">Jenis Cuti</label>
                <div class="col-md-6">
                        <select id="jenis_cuti" name="jenis_cuti" class="default-select2 form-control">
                            <option label="---pilih---">
                            @foreach($jenis_cuti as $data)
                                <option value="{{$data->nama_m_jenis_cuti}}" {{$model->jenis_cuti == $data->nama_m_jenis_cuti  ? 'selected' : ''}}>{{$data->nama_m_jenis_cuti}} </option>
                            @endforeach

                        </select>
                </div>
            </div>

            <div class="form-group row m-b-10">
                <label class="col-md-3 text-md-right col-form-label">Nomor SK</label>
                <div class="col-md-6">
                        {!! Form::text('nomor_sk_cuti',null, ['class' => 'form-control', 'placeholder'=>'Nomor SK', 'id'=>'nomor_sk_cuti']) !!}
                </div>
            </div>

            <div class="form-group row m-b-10">
                <label class="col-md-3 text-md-right col-form-label">Tanggal SK</label>
                <div class="col-6">
                    <div class="input-group date datepicker-default"   data-date-format="dd-mm-yyyy" >
                        {!! Form::text('tanggal_sk_cuti',null, ['class' => 'form-control', 'placeholder'=>'Tanggal SK', 'id'=>'tanggal_sk_cuti']) !!}
                        <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                    </div>
                </div>
            </div>

            <div class="form-group row m-b-10">
                <label class="col-md-3 text-md-right col-form-label">File SK Cuti</label>
                <div class="col-md-6">
                    {!!  Form::file('path_sk_cuti',['placeholder'=>'Pilih','class' => 'form-control','id'=>'path_sk_cuti','hidden'=>true]) !!}
                    <label for="path_sk_cuti" class="btn-block">{{$model->exists == '' || $model->nama_file_sk_cuti == '' ? 'Pilih File' : $model->nama_file_sk_cuti}}</label>
                </div>
            </div>

            <div class="form-group row m-b-10">
                <label class="col-md-3 text-md-right col-form-label">Tanggal Mulai</label>
                <div class="col-6">
                    <div class="input-group date datepicker-default"   data-date-format="dd-mm-yyyy" >
                        {!! Form::text('tanggal_mulai_cuti',null, ['class' => 'form-control', 'placeholder'=>'Tanggal Mulai', 'id'=>'tanggal_mulai_cuti']) !!}
                        <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                    </div>
                </div>
            </div>

            <div class="form-group row m-b-10">
                <label class="col-md-3 text-md-right col-form-label">Tanggal Selesai</label>
                <div class="col-6">
                    <div class="input-group date datepicker-default"   data-date-format="dd-mm-yyyy" >
                        {!! Form::text('tanggal_selesai_cuti',null, ['class' => 'form-control', 'placeholder'=>'Tanggal Selesai', 'id'=>'tanggal_selesai_cuti']) !!}
                        <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
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


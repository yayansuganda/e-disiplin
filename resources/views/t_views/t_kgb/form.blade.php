{!! Form::model($model,  [
    'route'=>$model->exists ? ['update_data.kgb', $model->id_kgb] : 'kgb.store',
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
                <label class="col-md-3 text-md-right col-form-label">Pangkat/Golongan</label>
                <div class="col-md-6">
                    <div class="row row-space-6">
                    <div class="col-6">
                        {!!  Form::select('nama_golongan',$m_ruang_golongan,null,['placeholder'=>'Pilih','class' => 'form-control default-select2','id'=>'nama_golongan']) !!}
                    </div>

                    <div class="col-6">
                        {!! Form::text('nama_pangkat',null, ['class' => 'form-control', 'placeholder'=>'Nama Pangkat', 'id'=>'nama_pangkat','readonly'=>true]) !!}
                    </div>
                    </div>
                </div>
            </div>

            <div class="form-group row m-b-10">
                <label class="col-md-3 text-md-right col-form-label">TMT KGB</label>
                <div class="col-6">
                    <div class="input-group date datepicker-default"   data-date-format="dd-mm-yyyy" >
                        {!! Form::text('tmt_kgb',null, ['class' => 'form-control', 'placeholder'=>'TMT KGB', 'id'=>'tmt_kgb']) !!}
                        <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                    </div>
                </div>
            </div>

            <div class="form-group row m-b-10">
                <label class="col-md-3 text-md-right col-form-label">Gaji Pokok</label>
                <div class="col-md-6">
                    {!! Form::text('gaji_pokok',null, ['class' => 'form-control', 'placeholder'=>'Gaji Pokok', 'id'=>'gaji_pokok']) !!}
                </div>
            </div>

            <div class="form-group row m-b-10">
                <label class="col-md-3 text-md-right col-form-label">Nomor SK</label>
                <div class="col-md-6">
                    {!! Form::text('nomor_sk_kgb',null, ['class' => 'form-control', 'placeholder'=>'Nomor SK', 'id'=>'nomor_sk_kgb']) !!}
                </div>
            </div>

            <div class="form-group row m-b-10">
                <label class="col-md-3 text-md-right col-form-label">Tanggal SK</label>
                <div class="col-6">
                    <div class="input-group date datepicker-default"   data-date-format="dd-mm-yyyy" >
                        {!! Form::text('tanggal_sk_kgb',null, ['class' => 'form-control', 'placeholder'=>'Tanggal SK', 'id'=>'tanggal_sk_kgb']) !!}
                        <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                    </div>
                </div>
            </div>

            <div class="form-group row m-b-10">
                <label class="col-md-3 text-md-right col-form-label">File SK KGB</label>
                <div class="col-md-6">
                    {!!  Form::file('path_sk_kgb',['placeholder'=>'Pilih','class' => 'form-control','id'=>'path_sk_kgb','hidden'=>true]) !!}
                    <label for="path_sk_kgb" class="btn-block">{{$model->exists == '' || $model->nama_file_sk_kgb == '' ? 'Pilih File' : $model->nama_file_sk_kgb}}</label>
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


    $(document).ready(function() {
        $('select[name="id_m_pangkat_golongan"]').on('change', function() {
            var stateID = $(this).val();
            console.log(stateID);
            if(stateID) {
                $.ajax({
                    url: '/m_jenis_pangkat/ajax/'+stateID,
                    type: "GET",
                    dataType: "json",
                    success:function(data) {
                        $('[name="nama_pangkat"]').empty();
                        $.each(data, function(key, value) {
                            $('[name="nama_pangkat"]').val(value);
                        });
                    }
                });
            }else{
                $('select[name="id_m_jenis_pangkat"]').empty();
            }
        });
    });

</script>


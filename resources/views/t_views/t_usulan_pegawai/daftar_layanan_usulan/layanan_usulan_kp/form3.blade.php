{!! Form::model($model,  [
    'route'=>$model->exists ? ['layanan_kenaikan_pangkat_opd.update', $model->id_layanan_kenaikan_pangkat] : 'layanan_kenaikan_pangkat_opd.store',
    'method'=> $model->exists ? 'PUT' : 'POST'
]) !!}


<div class="row">
    <div class="col-md-10 offset-md-2">

            <div class="form-group row m-b-10">
                    <label class="col-md-3 text-md-right col-form-label">Nip Pegawai</label>
                    <div class="col-md-6">
                        {!! Form::text('nip',null, ['class' => 'form-control', 'id'=>'nip', 'readonly']) !!}
                    </div>
                </div>



            <div class="form-group row m-b-10">
                <label class="col-md-3 text-md-right col-form-label">Status Berkas</label>
                <div class="col-md-6">

                        <select id="status_berkas" name="status_berkas" class="default-select2 form-control">
                                <option label="---pilih---">
                                    @foreach($status_berkas as $key=>$value)
                                        <option value="{{$value}}" >{{$value}}</option>
                                    @endforeach

                        </select>

                </div>
            </div>

            <div class="form-group row m-b-10">
                <label class="col-md-3 text-md-right col-form-label">Status Proses</label>
                <div class="col-md-6">
                        <select id="status_proses" name="status_proses" class="default-select2 form-control">
                                <option label="---pilih---">
                                    @foreach($status_proses as $key=>$value)
                                        <option value="{{$value}}" >{{$value}}</option>
                                    @endforeach

                        </select>
                </div>
            </div>

            <div class="form-group row m-b-10">
                <label class="col-md-3 text-md-right col-form-label">Naik Pangkat/Golongan</label>

                <div class="col-md-6">
                    {!!  Form::select('id_m_pangkat_golongan',$pangkat_golongan,null,['placeholder'=>'Pilih','class' => 'form-control default-select2','id'=>'id_m_pangkat_golongan']) !!}
                </div>
            </div>

            <div class="form-group row m-b-10">
                    <label class="col-md-3 text-md-right col-form-label">Nomor / Tanggal SK</label>
                    <div class="col-md-6">
                        <div class="row row-space-6">
                            <div class="col-6">
                                {!! Form::text('nomor_sk',null, ['class' => 'form-control', 'placeholder'=>'Nomor SK', 'id'=>'nomor_sk']) !!}
                            </div>

                            <div class="col-6">
                                <div class="input-group date datepicker-default"   data-date-format="dd-mm-yyyy" >
                                    {!! Form::text('tanggal_sk',null, ['class' => 'form-control', 'placeholder'=>'Pilih Tanggal', 'id'=>'tanggal_sk']) !!}
                                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="form-group row m-b-10">
                    <label class="col-md-3 text-md-right col-form-label">File SK Kenaikan Pangkat</label>
                    <div class="col-md-6">
                        {!!  Form::file('path_sk_kenaikan_pangkat',['placeholder'=>'Pilih','class' => 'form-control','id'=>'path_sk_kenaikan_pangkat','hidden'=>true]) !!}
                        <label for="path_sk_kenaikan_pangkat" class="btn-block">{{$model->exists == '' || $model->nama_file_sk_kenaikan_pangkat == '' ? 'Pilih File' : $model->nama_file_sk_kenaikan_pangkat}}</label>
                    </div>
                </div>


            <div class="form-group row m-b-10">
                <label class="col-md-3 text-md-right col-form-label">TMT Golongan</label>
                <div class="col-md-6">
                    <div class="input-group date datepicker-default"   data-date-format="dd-mm-yyyy" >
                        {!! Form::text('tmt_golongan',null, ['class' => 'form-control', 'placeholder'=>'Pilih Tanggal', 'id'=>'tmt_golongan']) !!}
                        <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                    </div>
                </div>
            </div>

            <div class="form-group row m-b-10">
                <label class="col-md-3 text-md-right col-form-label">Nomor & Tanggal BKN</label>
                <div class="col-md-6">
                    <div class="row row-space-6">
                        <div class="col-6">
                            {!! Form::text('nomor_bkn',null, ['class' => 'form-control', 'placeholder'=>'Nomor BKN', 'id'=>'nomor_bkn']) !!}
                        </div>

                        <div class="col-6">
                            <div class="input-group date datepicker-default"   data-date-format="dd-mm-yyyy" >
                                {!! Form::text('tanggal_bkn',null, ['class' => 'form-control', 'placeholder'=>'Pilih Tanggal', 'id'=>'tanggal_bkn']) !!}
                                <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="form-group row m-b-10">
                <label class="col-md-3 text-md-right col-form-label">Jenis KP</label>
                <div class="col-md-6">
                    {!!  Form::select('id_m_jenis_kp',$jenis_kp,null,['placeholder'=>'Pilih','class' => 'form-control default-select2','id'=>'id_m_jenis_kp']) !!}

                </div>
            </div>



            <div class="form-group row m-b-10">
                    <label class="col-md-3 text-md-right col-form-label">Keterangan</label>

                <div class="col-md-6">
                    {!! Form::textarea('keterangan',null,['class'=>'form-control', 'rows' => 2, 'id'=>'keterangan']) !!}
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

    $("#nomor_sk").prop('disabled', true);
    $("#tanggal_sk").prop('disabled', true);
    $("#tmt_golongan").prop('disabled', true);
    $("#nomor_bkn").prop('disabled', true);
    $("#tanggal_bkn").prop('disabled', true);
    $("#tmt_golongan").prop('disabled', true);
    $('#id_m_jenis_kp').attr('disabled', true);
    $('#id_m_pangkat_golongan').attr('disabled', true);


    $('#status_proses').on('change', function(e){
    var id = e.target.value;
        console.log(id);
    if (id == 'Selesai') {
        $("#nomor_sk").prop('disabled', false);
        $("#tanggal_sk").prop('disabled', false);
        $("#tmt_golongan").prop('disabled', false);
        $("#nomor_bkn").prop('disabled', false);
        $("#tanggal_bkn").prop('disabled', false);
        $("#tmt_golongan").prop('disabled', false);
        $('#id_m_jenis_kp').attr('disabled', false);
        $('#id_m_pangkat_golongan').attr('disabled', false);
   } else if (id == 'Dalam Proses') {
        $("#nomor_sk").prop('disabled', true);
        $("#tanggal_sk").prop('disabled', true);
        $("#tmt_golongan").prop('disabled', true);
        $("#nomor_bkn").prop('disabled', true);
        $("#tanggal_bkn").prop('disabled', true);
        $("#tmt_golongan").prop('disabled', true);
        $('#id_m_jenis_kp').attr('disabled', true);
        $('#id_m_pangkat_golongan').attr('disabled', true);
    } else if (id == 'Ditunda') {
        $("#nomor_sk").prop('disabled', true);
        $("#tanggal_sk").prop('disabled', true);
        $("#tmt_golongan").prop('disabled', true);
        $("#nomor_bkn").prop('disabled', true);
        $("#tanggal_bkn").prop('disabled', true);
        $("#tmt_golongan").prop('disabled', true);
        $('#id_m_jenis_kp').attr('disabled', true);
        $('#id_m_pangkat_golongan').attr('disabled', true);
    } else if (id == 'Dibatalkan') {
        $("#nomor_sk").prop('disabled', true);
        $("#tanggal_sk").prop('disabled', true);
        $("#tmt_golongan").prop('disabled', true);
        $("#nomor_bkn").prop('disabled', true);
        $("#tanggal_bkn").prop('disabled', true);
        $("#tmt_golongan").prop('disabled', true);
        $('#id_m_jenis_kp').attr('disabled', true);
        $('#id_m_pangkat_golongan').attr('disabled', true);
   }

});
document.getElementById("id_pangkat_golongan").disable = true;
document.getElementById("tmt_golongan").disabled = true;


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


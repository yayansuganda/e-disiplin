{!! Form::model($model,  [
    'route'=>$model->exists ? ['update_data.jabatan', $model->id_jabatan] : 'jabatan.store',
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
                <label class="col-md-3 text-md-right col-form-label">Jenis Jabatan</label>
                <div class="col-md-6">
                    {!!  Form::select('id_m_jenis_jabatan',$jenis_jabatan,null,['placeholder'=>'Pilih','class' => 'form-control default-select2','id'=>'id_m_jenis_jabatan']) !!}
                </div>

            </div>


            <div class="form-group row m-b-10">
            <label class="col-md-3 text-md-right col-form-label">Unit Unor</label>
                <div class="col-md-5">
                    {!! Form::text('unit_unor',null, ['class' => 'form-control', 'id'=>'unit_unor', 'readonly']) !!}

                </div>
                <a href="#unor" class="btn btn-sm btn-success" data-toggle="modal">Demo</a>
            </div>

            <div class="form-group row m-b-10">
                <label class="col-md-3 text-md-right col-form-label">Unit Organisasi Induk</label>
                <div class="col-md-6">
                        {!! Form::text('nama_m_skpd',null, ['class' => 'form-control', 'id'=>'nama_m_skpd', 'readonly']) !!}
                </div>
            </div>

            <div class="form-group row m-b-10" id="tampil3">
                    <label class="col-md-3 text-md-right col-form-label">Nama Jabatan</label>
                    <div class="col-md-6">
                        {!!  Form::select('nama_m_jabatan', $model->exists == '' ? [] : $nama_jabatan,null,['placeholder'=>'Pilih','class' => 'form-control default-select2','id'=>'nama_m_jabatan']) !!}

                    </div>
                </div>


            <div class="form-group row m-b-10" id="tampil1">
                <label class="col-md-3 text-md-right col-form-label">Nama Jabatan Struktural</label>
                <div class="col-md-6">
                        {!! Form::text('nama_m_jabatan',null, ['class' => 'form-control', 'id'=>'nama_m_jabatan2']) !!}
                </div>
            </div>

            <div class="form-group row m-b-10" id="tampil2">
                <label class="col-md-3 text-md-right col-form-label">Eselon</label>
                <div class="col-md-6">
                        {!!  Form::select('id_eselon',$eselon,null,['placeholder'=>'Pilih','class' => 'form-control default-select2','id'=>'id_eselon']) !!}

                </div>
            </div>

            <div class="form-group row m-b-10">
                <label class="col-md-3 text-md-right col-form-label">TMT Jabatan</label>
                <div class="col-6">
                    <div class="input-group date datepicker-default"   data-date-format="dd-mm-yyyy" >
                        {!! Form::text('tmt_jabatan',null, ['class' => 'form-control', 'placeholder'=>'Pilih Tanggal', 'id'=>'tmt_jabatan']) !!}
                        <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                    </div>
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
                                {!! Form::text('tanggal_sk',null, ['class' => 'form-control', 'placeholder'=>'Pilih Tanggal', 'id'=>'tanggal_lahir']) !!}
                                <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="form-group row m-b-10">
                <label class="col-md-3 text-md-right col-form-label">Upload SK Jabatan</label>
                <div class="col-md-6">
                    {!!  Form::file('path_sk_jabatan',['placeholder'=>'Pilih','class' => 'form-control','id'=>'path_sk_jabatan','hidden'=>true]) !!}
                    <label for="path_sk_jabatan" class="btn-block">{{$model->exists == '' || $model->nama_file_sk_jabatan == '' ? 'Pilih File' : $model->nama_file_sk_jabatan}}</label>
                </div>
            </div>

            <div class="form-group row m-b-10">
                <label class="col-md-3 text-md-right col-form-label">TMT Pelantikan</label>
                <div class="col-6">
                    <div class="input-group date datepicker-default"   data-date-format="dd-mm-yyyy" >
                        {!! Form::text('tmt_pelantikan',null, ['class' => 'form-control', 'placeholder'=>'Pilih Tanggal', 'id'=>'tmt_pelantikan']) !!}
                        <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                    </div>
                </div>
            </div>

            <div class="form-group row m-b-10">
                <label class="col-md-3 text-md-right col-form-label">Upload SK Pelantikan</label>
                <div class="col-md-6">
                    {!!  Form::file('path_sk_pelantikan_jabatan',['placeholder'=>'Pilih','class' => 'form-control','id'=>'path_sk_pelantikan_jabatan','hidden'=>true]) !!}
                    <label for="path_sk_pelantikan_jabatan" class="btn-block">{{$model->exists == '' || $model->nama_file_sk_pelantikan_jabatan == '' ? 'Pilih File' : $model->nama_file_sk_pelantikan_jabatan}}</label>
                </div>
            </div>

            <div class="form-group row m-b-10">
                <label class="col-md-3 text-md-right col-form-label">Upload Sumpah Jabatan</label>
                <div class="col-md-6">
                    {!!  Form::file('path_sumpah_jabatan',['placeholder'=>'Pilih','class' => 'form-control','id'=>'path_sumpah_jabatan','hidden'=>true]) !!}
                    <label for="path_sumpah_jabatan" class="btn-block">{{$model->exists == '' || $model->nama_file_sumpah_jabatan == '' ? 'Pilih File' : $model->nama_file_sumpah_jabatan}}</label>
                </div>
            </div>


        </div>


        <div class="modal fade" id="unor" style="max-width:500px;margin:auto">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Modal Dialog</h4>
                            <button type="button" class="close" dismiss="modal" aria-hidden="true">×</button>
                        </div>
                        <div class="modal-body">

                                <div class="form-group row m-b-10">
                                        <label class="col-md-3 text-md-right col-form-label">Kategori Unit Unor</label>
                                        <div class="col-md-6">
                                                    <select id="kategori_unor" name="kategori_unor" class="default-select2 form-control detail">
                                                            <option label="---pilih---">
                                                            <option value="SKPD" {{$model->ket == 'SKPD' ? 'selected' : null}}>SKPD</option>
                                                            <option value="Bidang" {{$model->ket == 'Bidang' ? 'selected' : null}}>Bidang</option>
                                                            <option value="Sub Bidang" {{$model->ket == 'Sub Bidang' ? 'selected' : null}}>Sub Bidang</option>
                                                    </select>
                                        </div>
                                    </div>

                                    <div class="form-group row m-b-10">
                                    <label class="col-md-3 text-md-right col-form-label">Unit Unor</label>
                                        <div class="col-md-5">
                                            {!!  Form::select('nama_unor', [] ,null,['placeholder'=>'Pilih','class' => 'form-control default-select2','id'=>'nama_unor']) !!}
                                        </div>
                                    </div>


                        </div>
                        <div class="modal-footer">
                            <a href="#" id="reset" class="btn btn-white">Pilih</a>
                        </div>
                    </div>
                </div>
            </div>




    </div>
</div>

{!! Form::close() !!}

<script>



@if ($model->id_m_jenis_jabatan == 1)
$("#tampil3").css("display","none");

@else
$("#tampil1").css("display","none");
$("#tampil2").css("display","none");
@endif



$('#reset').click(function(){
    $("#unor").modal('hide');
});

$('#proses').click(function(){

    $('[name="nama_pangkat"]').val(value);

    $("#unor").modal('hide');
});



    $('.default-select2').css('width', '100%');
    $('.default-select2').select2({
        dropdownParent: $('#modal'),
        placeholder : "---Pilih---",
        allowClear: true
    });

    $('.date').datepicker();

    $(document).ready(function() {


        $('select[name="nama_m_jabatan"]').on('change', function() {
            var nama_jabatan = $(this).val();
            $('[name="nama_m_jabatan"]').val('');
            $('[name="nama_m_jabatan"]').val(nama_jabatan);

        });

        $('select[name="id_m_jenis_jabatan"]').on('change', function() {
            var jenis_jabatan = $(this).val();


            $('[name="nama_m_skpd"]').val('');
            $('[name="nama_unor"]').val('');
            $('[name="nama_m_jabatan"]').val('');

            if ($('select[name="id_m_jenis_jabatan"]').val() == 1 ) {
            $("#tampil1").slideDown("fast");
            $("#tampil2").slideDown("fast");
            $("#tampil3").slideUp("fast");
            } else if ($('select[name="id_m_jenis_jabatan"]').val() == 2 || $('select[name="id_m_jenis_jabatan"]').val() == 3  ) {
            $("#tampil3").slideDown("fast");
            $("#tampil1").slideUp("fast");
            $("#tampil2").slideUp("fast");
            }


            $.ajax({
                    url: '/m_jenis_jabatan/ajax/'+jenis_jabatan,
                    type: "GET",
                    dataType: "json",
                    success:function(data) {
                        $('.default-select2').select2({
                        dropdownParent: $('#modal'),
                        placeholder : "---Pilih---",
                        allowClear: true
                        });
                        $('select[name="nama_m_jabatan"]').empty();
                        $('select[name="nama_m_jabatan"]').append('<option value="">--Pilih--</option>');
                        $.each(data, function(key, value) {
                            $('select[name="nama_m_jabatan"]').append('<option value="'+ key +'">'+ value +'</option>');
                        });
                    }
                });



            if (jenis_jabatan == 2 || jenis_jabatan == 3) {
                $("#id_eselon").val('').trigger('change');
            }

        $('select[name="nama_unor"]').on('change', function() {
            var stateID_unit_unor = $(this).val();
            document.getElementById('unit_unor').value = stateID_unit_unor;
            document.getElementById('nama_m_jabatan2').value = "KEPALA "+stateID_unit_unor;

                $.ajax({
                    url: '/nama_skpd/ajax/'+stateID_unit_unor,
                    type: "GET",
                    dataType: "json",
                    success:function(data) {
                        $.each(data, function(key, value) {
                            $('select[name="id_m_skpd"]').append('<option value="'+ key +'">'+ value +'</option>');
                            $('[name="nama_m_skpd"]').val(value);
                        });
                    }
                });
        });




        });




        $('select[name="kategori_unor"]').on('change', function() {
            var stateID_kategori_unor = $(this).val();
            if(stateID_kategori_unor) {
                $.ajax({
                    url: '/nama_unor/ajax/'+stateID_kategori_unor,
                    type: "GET",
                    dataType: "json",
                    success:function(data) {
                        $('.default-select2').select2({
                        dropdownParent: $('#modal'),
                        placeholder : "---Pilih---",
                        allowClear: true
                        });
                        $('select[name="nama_unor"]').empty();
                        $('select[name="id_m_skpd"]').empty();

                        $('select[name="nama_unor"]').append('<option value="">--Pilih--</option>');
                        $.each(data, function(key, value) {
                            $('select[name="nama_unor"]').append('<option value="'+ value +'">'+ value +'</option>');
                        });


                    }
                });
            }else{
                $('select[name="nama_unor"]').empty();
            }





        });
    });







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


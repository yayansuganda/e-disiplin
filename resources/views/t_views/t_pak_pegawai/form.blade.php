{!! Form::model($model,  [
    'route'=>$model->exists ? ['update_data.pak', $model->id_pak] : 'pak.store',
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
                <label class="col-md-3 text-md-right col-form-label">Nomor & Tanggal SK</label>
                <div class="col-md-6">
                    <div class="row row-space-6">
                        <div class="col-6">
                            {!! Form::text('nomor_sk_pak',null, ['class' => 'form-control', 'placeholder'=>'Nomor SK', 'id'=>'nomor_sk_pak']) !!}
                        </div>

                        <div class="col-6">
                            <div class="input-group date datepicker-default"   data-date-format="dd-mm-yyyy" >
                                {!! Form::text('tanggal_sk_pak',null, ['class' => 'form-control', 'placeholder'=>'Pilih Tanggal', 'id'=>'tanggal_sk_pak']) !!}
                                <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="form-group row m-b-10">
                <label class="col-md-3 text-md-right col-form-label">Bulan Mulai & Selesai Penilaian</label>
                <div class="col-md-6">
                    <div class="row row-space-6">
                        <div class="col-6">
                            <div class="input-group date_month datepicker-default"   data-date-format="MM" >
                                {!! Form::text('bulan_mulai_penilaian',null, ['class' => 'form-control', 'placeholder'=>'Bulan Mulai Penilaian', 'id'=>'bulan_mulai_penilaian']) !!}
                                <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="input-group date_month datepicker-default"   data-date-format="MM" >
                                {!! Form::text('bulan_selesai_penilaian',null, ['class' => 'form-control', 'placeholder'=>'Bulan Selesai Penilaian', 'id'=>'bulan_selesai_penilaian']) !!}
                                <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="form-group row m-b-10">
                    <label class="col-md-3 text-md-right col-form-label">Tahun Mulai & Selesai Penilaian</label>
                    <div class="col-md-6">
                        <div class="row row-space-6">
                            <div class="col-6">
                                <div class="input-group date datepicker-default"   data-date-format="yyyy" >
                                    {!! Form::text('tahun_mulai_penilaian',null, ['class' => 'form-control', 'placeholder'=>'Tahun Mulai Penilaian', 'id'=>'tahun_mulai_penilaian']) !!}
                                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                </div>
                            </div>

                            <div class="col-6">
                                <div class="input-group date datepicker-default"   data-date-format="yyyy" >
                                    {!! Form::text('tahun_selesai_penilaian',null, ['class' => 'form-control', 'placeholder'=>'Tahun Selesai Penilaian', 'id'=>'tahun_selesai_penilaian']) !!}
                                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>



            <div class="form-group row m-b-10">
                <label class="col-md-3 text-md-right col-form-label">Kredit Utama Baru</label>
                <div class="col-md-6">
                    {!! Form::text('kredit_utama_baru',"0", ['class' => 'form-control', 'placeholder'=>'Di isi dengan angka', 'id'=>'kredit_utama_baru', 'onchange'=>'total()']) !!}
                </div>
            </div>

            <div class="form-group row m-b-10">
                <label class="col-md-3 text-md-right col-form-label">Kredit Penunjang Baru</label>
                <div class="col-md-6">
                    {!! Form::text('kredit_penunjang_baru',"0", ['class' => 'form-control', 'placeholder'=>'Di isi dengan angka', 'id'=>'kredit_penunjang_baru','onchange'=>'total()']) !!}
                </div>
            </div>

            <div class="form-group row m-b-10">
                <label class="col-md-3 text-md-right col-form-label">Total Kredit Baru</label>
                <div class="col-md-6">
                    {!! Form::text('total_kredit_baru',null, ['class' => 'form-control', 'placeholder'=>'Di isi dengan angka', 'id'=>'total_kredit_baru','readonly'=>true]) !!}
                </div>
            </div>



            <div class="form-group row m-b-10">
                <label class="col-md-3 text-md-right col-form-label">Jabatan</label>
                <div class="col-md-6">
                    {!!  Form::select('id_jabatan',$jabatan_pegawai,null,['placeholder'=>'Pilih','class' => 'form-control default-select2','id'=>'id_jabatan']) !!}

                </div>
            </div>

            <div class="form-group row m-b-10">
                <label class="col-md-3 text-md-right col-form-label">File SK PAK</label>
                <div class="col-md-6">
                    {!!  Form::file('path_pak',['placeholder'=>'Pilih','class' => 'form-control','id'=>'path_pak','hidden'=>true]) !!}
                    <label for="path_pak" class="btn-block">{{$model->exists == '' || $model->nama_file_pak == '' ? 'Pilih File' : $model->nama_file_pak}}</label>
                </div>
            </div>


        </div>



    </div>
</div>

{!! Form::close() !!}

<script>

function total() {
    var kredit_utama = parseInt(document.getElementById('kredit_utama_baru').value);
    var kredit_penunjang_utama = parseInt(document.getElementById('kredit_penunjang_baru').value);

    var total_harga = kredit_utama + kredit_penunjang_utama;

    document.getElementById('total_kredit_baru').value = total_harga;
}



    $('.default-select2').css('width', '100%');
    $('.default-select2').select2({
        dropdownParent: $('#modal'),
        placeholder : "---Pilih---",
        allowClear: true
    });

    $('.date').datepicker();

    $('#bulan_mulai_penilaian,#bulan_selesai_penilaian').datepicker({
        format: "MM",
        viewMode: "months",
        minViewMode: "months"
    });

    $('#tahun_mulai_penilaian,#tahun_selesai_penilaian').datepicker({
        format: "yyyy",
        viewMode: "years",
        minViewMode: "years"
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


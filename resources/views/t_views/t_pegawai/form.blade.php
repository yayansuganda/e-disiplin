{!! Form::model($model,  [
    'route'=>$model->exists ? ['pegawai.update', $model->nip] : 'pegawai.store',
    'method'=> $model->exists ? 'PUT' : 'POST'
]) !!}


<div class="row">
    <div class="col-md-10 offset-md-1">



        <div class="form-group row m-b-10">
            <div class="col-md-12">
                <div class="row row-space-6">
            <label class="col-md-2 text-md-right col-form-label">Nip Baru</label>

                    <div class="col-4">
                        {!! Form::text('nip',null, ['class' => 'form-control', 'placeholder'=>'Nip Baru', 'id'=>'nip']) !!}
                    </div>

                    <label class="col-md-2 text-md-right col-form-label">Nip Lama</label>
                    <div class="col-4 ">
                        {!! Form::text('nip_lama',null, ['class' => 'form-control', 'placeholder'=>'Nip Lama', 'id'=>'nip_lama']) !!}

                    </div>
                </div>
            </div>
        </div>

        <div class="form-group row m-b-10">
            <div class="col-md-12">
                <div class="row row-space-6">
                    <label class="col-md-2 text-md-right col-form-label">Nama Pegawai</label>

                    <div class="col-10">
                        {!! Form::text('nama_pegawai',null, ['class' => 'form-control', 'placeholder'=>'Nama Pegawai', 'id'=>'nama_pegawai']) !!}
                    </div>

                </div>
            </div>
        </div>

            <div class="form-group row m-b-10">
                <div class="col-md-12">

                    <div class="row row-space-6">
                <label class="col-md-2 text-md-right col-form-label">G.Depan</label>

                        <div class="col-4">
                            {!! Form::text('gelar_depan',null, ['class' => 'form-control', 'placeholder'=>'Gelar Depan', 'id'=>'gelar_depan']) !!}
                        </div>

                        <label class="col-md-2 text-md-right col-form-label">G.Belakang</label>
                        <div class="col-4 ">
                            {!! Form::text('gelar_belakang',null, ['class' => 'form-control', 'placeholder'=>'Gelar Belakang', 'id'=>'gelar_belakang']) !!}

                        </div>
                    </div>
                </div>
            </div>

            <div class="form-group row m-b-10">
                <div class="col-md-12">
                    <div class="row row-space-6">
                            <label class="col-md-2 text-md-right col-form-label">Tempat Lahir</label>
                            <div class="col-4 ">
                            {!!  Form::select('tempat_lahir',$tempat_lahir_pegawai,null,['placeholder'=>'Pilih','class' => 'form-control default-select2','id'=>'tempat_lahir']) !!}

                            </div>

                        <label class="col-md-2 text-md-right col-form-label">Tanggal Lahir</label>

                        <div class="col-4">
                            <div class="input-group date datepicker-default"   data-date-format="dd-mm-yyyy" >
                                {!! Form::text('tanggal_lahir',null, ['class' => 'form-control', 'placeholder'=>'Tanggal Lahir', 'id'=>'tanggal_lahir']) !!}
                                <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="form-group row m-b-10">
                    <div class="col-md-12">
                        <div class="row row-space-6">
                            <label class="col-md-2 text-md-right col-form-label">Jenis Kelamin</label>

                            <div class="col-md-4">
                                <div class="form-check form-check-inline">
                                    {!! Form::radio('jenis_kelamin', 'Laki-Laki', true ) !!}
                                    <label class="form-check-label" for="defaultInlineRadio1">Laki-Laki</label>
                                </div>
                                <div class="form-check form-check-inline">
                                        {!! Form::radio('jenis_kelamin', 'Perempuan', false ) !!}
                                    <label class="form-check-label" for="defaultInlineRadio2">Perempuan</label>
                                </div>
                            </div>

                            <label class="col-md-2 text-md-right col-form-label">Agama</label>
                            <div class="col-4 ">
                            {!!  Form::select('id_m_agama',$agama_pegawai,null,['placeholder'=>'Pilih','class' => 'form-control default-select2','id'=>'id_m_agama']) !!}

                            </div>
                        </div>
                    </div>
                </div>

            <div class="form-group row m-b-10">
                <div class="col-md-12">
                    <div class="row row-space-6">
                        <label class="col-md-2 text-md-right col-form-label">S.Menikah</label>

                        <div class="col-4">
                            {!!  Form::select('id_m_pernikahan',$pernikahan,null,['placeholder'=>'Pilih','class' => 'form-control default-select2','id'=>'id_m_pernikahan']) !!}

                        </div>

                        <label class="col-md-2 text-md-right col-form-label">Nomor KTP</label>
                        <div class="col-4 ">
                            {!! Form::text('nomor_ktp',null, ['class' => 'form-control', 'placeholder'=>'Nomor KTP', 'id'=>'nomor_ktp']) !!}

                        </div>
                    </div>
                </div>
            </div>

            <div class="form-group row m-b-10">
                <div class="col-md-12">
                    <div class="row row-space-6">

                        <label class="col-md-2 text-md-right col-form-label">File S.Nikah</label>
                        <div class="col-4">
                            {!!  Form::file('path_surat_nikah',['placeholder'=>'Pilih','class' => 'form-control','id'=>'path_surat_nikah','hidden'=>true]) !!}
                            <label for="path_surat_nikah" class="btn-block">{{$model->exists == '' || $model->nama_file_surat_nikah == '' ? 'Pilih File' : $model->nama_file_surat_nikah}}</label>
                        </div>

                        <label class="col-md-2 text-md-right col-form-label">File KTP</label>
                        <div class="col-4 ">
                            {!!  Form::file('path_ktp',['placeholder'=>'Pilih','class' => 'form-control','id'=>'path_ktp','hidden'=>true]) !!}
                            <label for="path_ktp" class="btn-block">{{$model->exists == '' || $model->nama_file_ktp == '' ? 'Pilih File' : $model->nama_file_ktp}}</label>

                        </div>
                    </div>
                </div>
            </div>

            <div class="form-group row m-b-10">
                <div class="col-md-12">
                    <div class="row row-space-6">
                        <label class="col-md-2 text-md-right col-form-label">Nomor HP</label>

                        <div class="col-4">
                            {!! Form::text('nomor_hp',null, ['class' => 'form-control', 'placeholder'=>'Nomor HP', 'id'=>'nomor_hp']) !!}
                        </div>

                        <label class="col-md-2 text-md-right col-form-label">Email</label>
                        <div class="col-4">
                            {!! Form::text('email_pegawai',null, ['class' => 'form-control', 'placeholder'=>'Email', 'id'=>'email_pegawai']) !!}

                        </div>
                    </div>
                </div>
            </div>

            <div class="form-group row m-b-10">
                <div class="col-md-12">
                    <div class="row row-space-6">
                        <label class="col-md-2 text-md-right col-form-label">Alamat</label>

                        <div class="col-10">
                            {!! Form::textarea('alamat',null, ['class' => 'form-control', 'placeholder'=>'Alamat', 'id'=>'alamat','rows'=>2]) !!}
                        </div>

                    </div>
                </div>
            </div>

            <div class="form-group row m-b-10">
                <div class="col-md-12">
                    <div class="row row-space-6">
                        <label class="col-md-2 text-md-right col-form-label">No.NPWP</label>

                        <div class="col-4">
                            {!! Form::text('nomor_npwp',null, ['class' => 'form-control', 'placeholder'=>'Nomor NPWP', 'id'=>'nomor_npwp']) !!}
                        </div>

                        <label class="col-md-2 text-md-right col-form-label">No.BPJS</label>
                        <div class="col-4">
                            {!! Form::text('nomor_bpjs',null, ['class' => 'form-control', 'placeholder'=>'Nomor BPJS', 'id'=>'nomor_bpjs']) !!}

                        </div>
                    </div>
                </div>
            </div>


            <div class="form-group row m-b-10">
                <div class="col-md-12">
                    <div class="row row-space-6">
                        <label class="col-md-2 text-md-right col-form-label">File BPJS</label>
                        <div class="col-4">
                            {!!  Form::file('path_bpjs',['placeholder'=>'Pilih','class' => 'form-control','id'=>'path_bpjs','hidden'=>true]) !!}
                            <label for="path_bpjs" class="btn-block">{{$model->exists == '' || $model->nama_file_bpjs == '' ? 'Pilih File' : $model->nama_file_bpjs}}</label>

                        </div>

                        <label class="col-md-2 text-md-right col-form-label">File NPWP</label>
                        <div class="col-4 ">
                            {!!  Form::file('path_npwp',['placeholder'=>'Pilih','class' => 'form-control','id'=>'path_npwp','hidden'=>true]) !!}
                            <label for="path_npwp" class="btn-block">{{$model->exists == '' || $model->nama_file_npwp == '' ? 'Pilih File' : $model->nama_file_npwp}}</label>

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


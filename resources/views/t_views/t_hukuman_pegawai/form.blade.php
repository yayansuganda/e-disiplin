{!! Form::model($model,  [
    'route'=>$model->exists ? ['hukuman.update', $model->id_hukuman_hd] : 'hukuman.store',
    'method'=> $model->exists ? 'PUT' : 'POST'
]) !!}


<div class="row">
    <div class="col-md-10 offset-md-2">

            <div class="form-group row m-b-10">
                    <div class="col-md-6">
                        {!! Form::text('nip',$model->exists == '' ? $model2->nip : null, ['class' => 'form-control', 'id'=>'nip', 'hidden'=>true]) !!}
                    </div>
                </div>

            <div class="form-group row m-b-10">
                <label class="col-md-3 text-md-right col-form-label">Pangkat/Golongan</label>
                <div class="col-md-6">
                    <div class="row row-space-6">
                    <div class="col-6">
                        {!! Form::text('nama_golongan',$pangkat_golongan->nama_pangkat, ['class' => 'form-control', 'placeholder'=>'Nama Golongan', 'id'=>'nama_golongan','readonly'=>true]) !!}

                    </div>

                    <div class="col-6">
                        {!! Form::text('nama_pangkat',$pangkat_golongan->nama_golongan, ['class' => 'form-control', 'placeholder'=>'Nama Pangkat', 'id'=>'nama_pangkat','readonly'=>true]) !!}
                    </div>
                    </div>
                </div>
            </div>

            <div class="form-group row m-b-10">
                    <label class="col-md-3 text-md-right col-form-label">Jenis Hukuman</label>
                    <div class="col-md-6">
                        {!!  Form::select('id_m_jenis_hd',$jenis_hd,null,['placeholder'=>'Pilih','class' => 'form-control default-select2','id'=>'id_m_jenis_hd']) !!}
                    </div>
                </div>

                <div class="form-group row m-b-10">
                        <label class="col-md-3 text-md-right col-form-label">Jenis Kategori HD</label>
                        <div class="col-md-6">
                            {!!  Form::select('id_k_jenis_hd',$model->id_k_jenis_hd == '' ? [] : $jenis_k_hukuman,null,['placeholder'=>'Pilih','selected'=>true,'class' => 'form-control default-select2','id'=>'id_k_jenis_hd']) !!}
                        </div>
                    </div>

                    <div class="form-group row m-b-10">
                            <label class="col-md-3 text-md-right col-form-label">Jenis Pelanggaran HD</label>
                            <div class="col-md-6">
                                {!!  Form::select('id_m_jenis_pelanggaran_hd', $jenis_pelanggaran_hd,null,['placeholder'=>'Pilih','selected'=>true,'class' => 'form-control default-select2','id'=>'id_m_jenis_pelanggaran_hd']) !!}
                            </div>
                        </div>

                        <div class="form-group row m-b-10">
                                <label class="col-md-3 text-md-right col-form-label">Kategori Pelanggaran HD</label>
                                <div class="col-md-6">
                                    {!! Form::text('kategori_pelanggaran',null, ['class' => 'form-control', 'placeholder'=>'Nama Golongan', 'id'=>'kategori_pelanggaran','readonly'=>true]) !!}
                                </div>
                            </div>

                            <div class="form-group row m-b-10">
                                    <label class="col-md-3 text-md-right col-form-label">Nomor / Tanggal SK</label>
                                    <div class="col-md-6">
                                        <div class="row row-space-6">
                                            <div class="col-6">
                                                {!! Form::text('nomor_sk_hd',null, ['class' => 'form-control', 'placeholder'=>'Nomor SK', 'id'=>'nomor_sk_hd']) !!}
                                            </div>

                                            <div class="col-6">
                                                <div class="input-group date datepicker-default"   data-date-format="dd-mm-yyyy" >
                                                    {!! Form::text('tanggal_sk_hd',null, ['class' => 'form-control', 'placeholder'=>'Pilih Tanggal', 'id'=>'tanggal_sk_hd']) !!}
                                                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>


            <div class="form-group row m-b-10">
                    <label class="col-md-3 text-md-right col-form-label">TMT HD</label>
                    <div class="col-6">
                        <div class="input-group date datepicker-default"   data-date-format="dd-mm-yyyy" >
                            {!! Form::text('tmt_hd',null, ['class' => 'form-control', 'placeholder'=>'TMT hd', 'id'=>'tmt_hd']) !!}
                            <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                        </div>
                    </div>
                </div>



            <div class="form-group row m-b-10">
                <label class="col-md-3 text-md-right col-form-label">Masa HD</label>
                <div class="col-md-6">
                    {!! Form::text('masa_hd',null, ['class' => 'form-control', 'id'=>'masa_hd']) !!}
                </div>
            </div>

            <div class="form-group row m-b-10">
                    <label class="col-md-3 text-md-right col-form-label">Tanggal Akhir HD</label>
                    <div class="col-6">
                        <div class="input-group date datepicker-default"   data-date-format="dd-mm-yyyy" >
                            {!! Form::text('tanggal_akhir_hd',null, ['class' => 'form-control', 'placeholder'=>'Tanggal Akhir HD', 'id'=>'tanggal_akhir_hd']) !!}
                            <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                        </div>
                    </div>
                </div>


                        <div class="form-group row m-b-10">
                                <label class="col-md-3 text-md-right col-form-label">Nomor PP</label>
                                <div class="col-md-6">
                                    {!! Form::text('nomor_pp',null, ['class' => 'form-control', 'id'=>'nomor_pp']) !!}
                                </div>
                            </div>

                            <div class="form-group row m-b-10">
                                    <label class="col-md-3 text-md-right col-form-label">Keterangan</label>
                                    <div class="col-md-6">
                                        {!! Form::text('keterangan',null, ['class' => 'form-control', 'id'=>'keterangan']) !!}
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





    $('select[name="id_m_jenis_hd"]').on('change', function() {
            var stateID = $(this).val();
            console.log(stateID);
            if(stateID) {
                $.ajax({
                    url: '/k_jenis_hd/ajax/'+stateID,
                    type: "GET",
                    dataType: "json",
                    success:function(data) {
                        $('select[name="id_k_jenis_hd"]').empty();
                        $('select[name="id_k_jenis_hd"]').append('<option value="0" selected="true">--Pilih--</option>');
                        $.each(data, function(key, value) {
                            $('select[name="id_k_jenis_hd"]').append('<option value="'+ key +'">'+ value +'</option>');
                        });
                    }
                });
            }else{
                $('select[name="id_k_jenis_hd"]').empty();
            }
        });


        $(document).ready(function() {
        $('select[name="id_m_jenis_pelanggaran_hd"]').on('change', function() {
            var stateID = $(this).val();
            console.log(stateID);
            if(stateID) {
                $.ajax({
                    url: '/kategori_kewajiban/ajax/'+stateID,
                    type: "GET",
                    dataType: "json",
                    success:function(data) {
                        $('[name="kategori_pelanggaran"]').empty();
                        $.each(data, function(key, value) {
                            $('[name="kategori_pelanggaran"]').val(value);
                        });
                    }
                });
            }else{
                $('select[name="kategori_kewajiban"]').empty();
            }
        });
    });


</script>


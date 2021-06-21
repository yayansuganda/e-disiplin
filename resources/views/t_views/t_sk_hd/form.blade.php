{!! Form::model($model,  [
    'route'=>$model->exists ? ['update_data.sk_hd', $model->id_sk] : 'sk_hd.store',
    'method'=> $model->exists ? 'POST' : 'POST'
]) !!}


<div class="row">
    <div class="col-md-10 offset-md-2">



            <div class="form-group row m-b-10">
                <div class="col-md-6">
                    {!! Form::text('nip_pelanggar',$model->exists == '' ? $model2->nip : null, ['class' => 'form-control', 'id'=>'nip_pelanggar', 'hidden'=>true]) !!}
                </div>
            </div>

            <div class="form-group row m-b-10">
                <label class="col-md-3 text-md-right col-form-label">Nama Keputusan</label>
                <div class="col-md-6">

                         {!! Form::text('nama_keputusan',null, ['class' => 'form-control', 'placeholder'=>'Nama Pangkat', 'id'=>'nama_keputusan']) !!}

                </div>
            </div>

            <div class="form-group row m-b-10">
                    <label class="col-md-3 text-md-right col-form-label">Nomor</label>
                    <div class="col-md-6">
                             {!! Form::text('nomor',null, ['class' => 'form-control', 'placeholder'=>'Nomor', 'id'=>'nomor']) !!}
                    </div>
                </div>

            <div class="form-group row m-b-10">
                <label class="col-md-3 text-md-right col-form-label">Laporan Dari & Sampai Tanggal</label>
                <div class="col-md-6">
                    <div class="row row-space-6">
                        <div class="col-6">
                            <div class="input-group date datepicker-default"   data-date-format="dd-mm-yyyy" >
                                {!! Form::text('laporan_dari_tanggal',null, ['class' => 'form-control', 'placeholder'=>'Dari Tanggal', 'id'=>'laporan_dari_tanggal']) !!}
                                <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="input-group date datepicker-default"   data-date-format="dd-mm-yyyy" >
                                {!! Form::text('laporan_sampai_tanggal',null, ['class' => 'form-control', 'placeholder'=>'Sampai Tanggal', 'id'=>'laporan_sampai_tanggal']) !!}
                                <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="form-group row m-b-10">
                <label class="col-md-3 text-md-right col-form-label">Tanggal Pelanggaran</label>
                <div class="col-md-6">
                    <div class="input-group date datepicker-default"   data-date-format="dd-mm-yyyy" >
                        {!! Form::text('tanggal_pelanggaran',null, ['class' => 'form-control', 'placeholder'=>'Pilih Tanggal', 'id'=>'tanggal_pelanggaran']) !!}
                        <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                    </div>
                </div>
            </div>

            <div class="form-group row m-b-10">
                <label class="col-md-3 text-md-right col-form-label">Pasal</label>
                <div class="col-md-2">
                        {!! Form::text('pasal_hd',null, ['class' => 'form-control', 'id'=>'pasal_hd']) !!}
                </div>

                <label class="col-md-1 text-md-right col-form-label">Angka</label>
                <div class="col-md-1">
                        {!! Form::text('angka_hd',null, ['class' => 'form-control', 'id'=>'angka_hd']) !!}
                </div>

                <label class="col-md-1 text-md-right col-form-label">Huruf</label>
                <div class="col-md-1">
                        {!! Form::text('huruf_hd',null, ['class' => 'form-control', 'id'=>'huruf_hd']) !!}
                </div>
            </div>

            <div class="form-group row m-b-10">
                <label class="col-md-3 text-md-right col-form-label">Mengingat 1</label>
                <div class="col-md-6">
                        {!! Form::textarea('mengingat_1',null, ['class' => 'form-control', 'rows'=>2, 'id'=>'mengingat_1']) !!}

                </div>
            </div>


            <div class="form-group row m-b-10">
                    <label class="col-md-3 text-md-right col-form-label">Mengingat 2</label>
                    <div class="col-md-6">
                            {!! Form::textarea('mengingat_2',null, ['class' => 'form-control', 'rows'=>2, 'id'=>'mengingat_2']) !!}

                    </div>
                </div>


            <div class="form-group row m-b-10">
                <label class="col-md-3 text-md-right col-form-label">Tanggal Di Hukum</label>
                <div class="col-md-6">
                    <div class="input-group date datepicker-default"   data-date-format="dd-mm-yyyy" >
                        {!! Form::text('tanggal_di_hukum',null, ['class' => 'form-control', 'placeholder'=>'Pilih Tanggal', 'id'=>'tanggal_di_hukum']) !!}
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


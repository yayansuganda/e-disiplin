{!! Form::model($model,  [
    'route'=>['update_create.data_verifikasi_usulan_perbaikan_data', $model->id_usulan_pegawai],
    'method'=> $model->exists ? 'POST' : 'POST'
]) !!}


<div class="row">

        <div class="col-lg-8 col-md-6">
                        <div class="form-group row m-b-10">
                                <div class="col-md-6">
                                        {!! Form::text('nip',$model->exists == '' ? $model2->nip : null, ['class' => 'form-control', 'id'=>'nip','hidden'=>true]) !!}
                                </div>
                            </div>

                            <div class="form-group row m-b-10">
                                <label class="col-md-3 text-md-right col-form-label">Nama Pegawai</label>
                                <div class="col-md-8">
                                <label class="col-md-8  col-form-label">{{$model->nama_pegawai}}</label>

                                </div>
                            </div>

                            <div class="form-group row m-b-10">
                                <label class="col-md-3 text-md-right col-form-label">Pangkat/Golongan</label>
                                <div class="col-md-8">
                                    <div class="row row-space-6">
                                    <div class="col-6">
                                        {!! Form::text('nama_golongan',$model->exists == '' ? $model3->nama_golongan : null, ['class' => 'form-control', 'id'=>'nama_golongan','readonly'=>true]) !!}
                                    </div>

                                    <div class="col-6">
                                        {!! Form::text('nama_pangkat',$model->exists == '' ? $model3->nama_pangkat : null, ['class' => 'form-control', 'id'=>'nama_pangkat','readonly'=>true]) !!}
                                    </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row m-b-10">
                                <label class="col-md-3 text-md-right col-form-label">Jenis Ujian PI</label>
                                <div class="col-md-8">
                                    {!! Form::textarea('lainnya',null,['class'=>'form-control', 'rows' => 3, 'id'=>'lainnya', 'readonly'=>true]) !!}
                                 </div>
                            </div>

                            <div class="form-group row m-b-10">
                                <label class="col-md-3 text-md-right col-form-label">Status Berkas</label>
                                <div class="col-md-8">

                                        <select id="status_berkas" name="status_berkas" class="default-select2 form-control ">
                                                <option label="---pilih---">
                                                    @foreach($status_berkas as $key=>$value)
                                                        <option value="{{$value}}" {{$value == $model->status_berkas ? 'selected' : null}}>{{$value}}</option>
                                                    @endforeach

                                        </select>

                                </div>
                            </div>

                            <div class="form-group row m-b-10">
                                <label class="col-md-3 text-md-right col-form-label">Status Proses</label>
                                <div class="col-md-8">
                                        <select id="status_proses" name="status_proses" class="default-select2 form-control detail">
                                                <option label="---pilih---">
                                                    @foreach($status_proses as $key=>$value)
                                                        <option value="{{$value}}" {{$value == $model->status_proses ? 'selected' : null}}>{{$value}}</option>
                                                    @endforeach

                                        </select>
                                </div>
                            </div>
                            <div id="tampil">


                                <div class="form-group row m-b-10">
                                    <div class="col-md-8">
                                        {!! Form::text('nip',$model->exists == '' ? $model2->nip : null, ['class' => 'form-control', 'id'=>'nip', 'hidden'=>true]) !!}
                                    </div>
                                </div>


                            </div>

                            <div class="form-group row m-b-10">
                                <label class="col-md-3 text-md-right col-form-label">Keterangan</label>

                            <div class="col-md-8">
                                {!! Form::textarea('keterangan',null,['class'=>'form-control', 'rows' => 2, 'id'=>'keterangan']) !!}
                            </div>
                        </div>
            </div>
            <!-- end col-3 -->
            <!-- begin col-3 -->
            <div class="col-lg-4 col-md-6">
                <h3><center><i><u> </u></i></center></h3>
                <br>
            <a href="{{route('pegawai.show', $model->nip)}}" data-dismiss="modal" class="btn-show btn btn-lg btn-primary btn-block">
                        <i class="fas fa-10x fa-fw m-r-10 fa-address-card"></i><br />
                        <strong><b>DATA PEGAWAI</b></strong>
                      </a>




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
        $('select[name="id_m_jenis_jabatan"]').on('change', function() {
            var stateID = $(this).val();
            console.log(stateID);
            if(stateID) {
                $.ajax({
                    url: '/m_jenis_jabatan/ajax/'+stateID,
                    type: "GET",
                    dataType: "json",
                    success:function(data) {
                        $('.default-select2').select2({
                        dropdownParent: $('#modal'),
                        placeholder : "---Pilih---",
                        allowClear: true
                        });
                        $('select[name="id_m_jabatan"]').empty();
                        $('select[name="id_m_jabatan"]').append('<option value="">--Pilih--</option>');
                        $.each(data, function(key, value) {
                            $('select[name="id_m_jabatan"]').append('<option value="'+ key +'">'+ value +'</option>');
                        });
                    }
                });
            }else{
                $('select[name="nama_m_jabatan"]').empty();
            }
        });
    });



        $('select[name="id_m_skpd_subbidang"]').on('change', function() {
            var stateID = $(this).val();
            console.log(stateID);
            if(stateID) {
                $.ajax({
                    url: '/nama_skpd_bidang/ajax/'+stateID,
                    type: "GET",
                    dataType: "json",
                    success:function(data) {
                        $('[name="id_m_skpd_bidang"]').empty();
                        $.each(data, function(key, value) {
                            $('select[name="id_m_skpd_bidang"]').append('<option value="'+ key +'">'+ value +'</option>');

                        });
                    }
                });
            }else{
                $('select[name="id_m_jenis_pangkat"]').empty();
            }
        });


        $('select[name="id_m_skpd_subbidang"]').on('change', function() {
            var stateID = $(this).val();
            console.log(stateID);
            if(stateID) {
                $.ajax({
                    url: '/nama_skpd/ajax/'+stateID,
                    type: "GET",
                    dataType: "json",
                    success:function(data) {
                        $('[name="id_m_skpd"]').empty();
                        $.each(data, function(key, value) {
                            $('select[name="id_m_skpd"]').append('<option value="'+ key +'">'+ value +'</option>');

                        });
                    }
                });
            }else{
                $('select[name="id_m_skpd"]').empty();
            }
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



    $("#tampil").css("display","none");

    $('select[name="status_proses"]').on('change', function() {
            var stateID = $(this).val();
            console.log(stateID);
            if (stateID == "Selesai" ) {
            $("#tampil").slideDown("fast");
            } else {
            $("#tampil").slideUp("fast");
            }
            });


</script>


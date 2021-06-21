{!! Form::model($model,  [
    'route'=>['update_create.data_verifikasi_usulan_cuti', $model->id_usulan_pegawai],
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
                                <label class="col-md-3 text-md-right col-form-label">Jenis Cuti</label>
                                <div class="col-md-8">
                                    {!! Form::text('jenis_cuti',$model->exists == '' ? null : $model->lainnya, ['class' => 'form-control', 'id'=>'jenis_cuti', 'readonly' => true]) !!}
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
                                            <div class="col-md-6">
                                                    {!! Form::text('nip',$model->exists == '' ? $model2->nip : null, ['class' => 'form-control', 'id'=>'nip','hidden'=>true]) !!}
                                            </div>
                                        </div>

                                        <div class="form-group row m-b-10">
                                            <label class="col-md-3 text-md-right col-form-label">Nomor SK</label>
                                            <div class="col-md-8">
                                                    {!! Form::text('nomor_sk_cuti',null, ['class' => 'form-control', 'placeholder'=>'Nomor SK', 'id'=>'nomor_sk_cuti']) !!}
                                            </div>
                                        </div>

                                        <div class="form-group row m-b-10">
                                            <label class="col-md-3 text-md-right col-form-label">Tanggal SK</label>
                                            <div class="col-8">
                                                <div class="input-group date datepicker-default"   data-date-format="dd-mm-yyyy" >
                                                    {!! Form::text('tanggal_sk_cuti',null, ['class' => 'form-control', 'placeholder'=>'Tanggal SK', 'id'=>'tanggal_sk_cuti']) !!}
                                                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group row m-b-10">
                                            <label class="col-md-3 text-md-right col-form-label">File SK Cuti</label>
                                            <div class="col-md-8">
                                                {!!  Form::file('path_sk_cuti',['placeholder'=>'Pilih','class' => 'form-control','id'=>'path_sk_cuti','hidden'=>true]) !!}
                                                <label for="path_sk_cuti" class="btn-block">{{$model->exists == '' || $model->nama_file_sk_cuti == '' ? 'Pilih File' : $model->nama_file_sk_cuti}}</label>
                                            </div>
                                        </div>

                                        <div class="form-group row m-b-10">
                                            <label class="col-md-3 text-md-right col-form-label">Tanggal Mulai</label>
                                            <div class="col-8">
                                                <div class="input-group date datepicker-default"   data-date-format="dd-mm-yyyy" >
                                                    {!! Form::text('tanggal_mulai_cuti',null, ['class' => 'form-control', 'placeholder'=>'Tanggal Mulai', 'id'=>'tanggal_mulai_cuti']) !!}
                                                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group row m-b-10">
                                            <label class="col-md-3 text-md-right col-form-label">Tanggal Selesai</label>
                                            <div class="col-8">
                                                <div class="input-group date datepicker-default"   data-date-format="dd-mm-yyyy" >
                                                    {!! Form::text('tanggal_selesai_cuti',null, ['class' => 'form-control', 'placeholder'=>'Tanggal Selesai', 'id'=>'tanggal_selesai_cuti']) !!}
                                                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                                </div>
                                            </div>
                                        </div>
                                </div>

                            </div>
            <!-- end col-3 -->
            <!-- begin col-3 -->
            <div class="col-lg-4 col-md-6">
                <h3><center><i><u> Daftar File Persyaratan </u></i></center></h3>
                <br>

                @if ($model->lainnya == 'Mutasi antar Instansi dari dan ke Pemerintah KSB')


                        @if ($data_prajabatan->nama_file_sk_cpns != null)
                            <a href="{{url('preview_file_pegawai/'.$model->nip.'/'.$data_prajabatan->nama_file_sk_cpns)}}"  title="Preview File {{$data_prajabatan->nama_file_sk_cpns}}" class="btn-show-preview btn btn-inverse btn-sm btn-block"><i class="fas fa-lg fa-fw m-r-10 fa-file-pdf"></i><strong>CPNS</strong></a>
                        @else
                            <a class="btn btn-default disabled btn-sm btn-block"><i class="fas fa-lg fa-fw m-r-10 fa-file-pdf"></i><strong>FILE CPNS BELUM DI UPLOAD</strong></a>
                        @endif

                        @if ($data_prajabatan->nama_file_sk_pns != null)
                            <a href="{{url('preview_file_pegawai/'.$model->nip.'/'.$data_prajabatan->nama_file_sk_pns)}}"  title="Preview File {{$data_prajabatan->nama_file_sk_pns}}" class="btn-show-preview btn btn-inverse btn-sm btn-block"><i class="fas fa-lg fa-fw m-r-10 fa-file-pdf"></i><strong>PNS</strong></a>
                        @else
                            <a class="btn btn-default disabled btn-sm btn-block"><i class="fas fa-lg fa-fw m-r-10 fa-file-pdf"></i><strong>FILE PNS BELUM DI UPLOAD</strong></a>
                        @endif

                        @if ($data_prajabatan->nama_file_karpeg != null)
                            <a href="{{url('preview_file_pegawai/'.$model->nip.'/'.$data_prajabatan->nama_file_karpeg)}}" title="Preview File {{$data_prajabatan->nama_file_karpeg}}" class="btn-show-preview btn btn-inverse btn-sm btn-block"><i class="fas fa-lg fa-fw m-r-10 fa-file-pdf"></i><strong>KARPEG</strong></a>
                        @else
                            <a class="btn btn-default disabled btn-sm btn-block"><i class="fas fa-lg fa-fw m-r-10 fa-file-pdf"></i><strong>FILE KARPEG BELUM DI UPLOAD</strong></a>
                        @endif


                        @if ($sk_pangkat_golongan_terakhir != null)
                            @if ($sk_pangkat_golongan_terakhir->nama_file_sk_kenaikan_pangkat != null)
                                <a href="{{url('preview_file_pegawai/'.$model->nip.'/'.$sk_pangkat_golongan_terakhir->nama_file_sk_kenaikan_pangkat)}}" title="Preview File {{$data_prajabatan->nama_file_karpeg}}" class="btn-show-preview btn btn-inverse btn-sm btn-block"><i class="fas fa-lg fa-fw m-r-10 fa-file-pdf"></i><strong>SK PANGKAT TERAKHIR</strong></a>
                            @else
                                <a class="btn btn-default disabled btn-sm btn-block"><i class="fas fa-lg fa-fw m-r-10 fa-file-pdf"></i><strong>SK PANGKAT BELUM DI UPLOAD</strong></a>
                            @endif
                        @else
                            <a class="btn btn-default disabled btn-sm btn-block"><i class="fas fa-lg fa-fw m-r-10 fa-file-pdf"></i><strong>SK PANGKAT BELUM DI UPLOAD</strong></a>
                        @endif

                        @if ($sk_jabatan_terakhir != null)
                            @if ($sk_jabatan_terakhir->nama_file_sk_jabatan != null)
                                <a href="{{url('preview_file_pegawai/'.$model->nip.'/'.$sk_jabatan_terakhir->nama_file_sk_jabatan)}}" title="Preview File {{$sk_jabatan_terakhir->nama_file_sk_jabatan}}" class="btn-show-preview btn btn-inverse btn-sm btn-block"><i class="fas fa-lg fa-fw m-r-10 fa-file-pdf"></i><strong>SK JABATAN TERAKHIR</strong></a>
                            @else
                                <a class="btn btn-default disabled btn-sm btn-block"><i class="fas fa-lg fa-fw m-r-10 fa-file-pdf"></i><strong>SK JABATAN BELUM DI UPLOAD</strong></a>
                            @endif
                        @else
                            <a class="btn btn-default disabled btn-sm btn-block"><i class="fas fa-lg fa-fw m-r-10 fa-file-pdf"></i><strong>SK JABATAN BELUM DI UPLOAD</strong></a>
                        @endif



                @else

                        @if ($data_prajabatan->nama_file_sk_cpns != null)
                        <a href="{{url('preview_file_pegawai/'.$model->nip.'/'.$data_prajabatan->nama_file_sk_cpns)}}"  title="Preview File {{$data_prajabatan->nama_file_sk_cpns}}" class="btn-show-preview btn btn-inverse btn-sm btn-block"><i class="fas fa-lg fa-fw m-r-10 fa-file-pdf"></i><strong>CPNS</strong></a>
                        @else
                            <a class="btn btn-default disabled btn-sm btn-block"><i class="fas fa-lg fa-fw m-r-10 fa-file-pdf"></i><strong>FILE CPNS BELUM DI UPLOAD</strong></a>
                        @endif

                        @if ($data_prajabatan->nama_file_sk_pns != null)
                            <a href="{{url('preview_file_pegawai/'.$model->nip.'/'.$data_prajabatan->nama_file_sk_pns)}}"  title="Preview File {{$data_prajabatan->nama_file_sk_pns}}" class="btn-show-preview btn btn-inverse btn-sm btn-block"><i class="fas fa-lg fa-fw m-r-10 fa-file-pdf"></i><strong>PNS</strong></a>
                        @else
                            <a class="btn btn-default disabled btn-sm btn-block"><i class="fas fa-lg fa-fw m-r-10 fa-file-pdf"></i><strong>FILE PNS BELUM DI UPLOAD</strong></a>
                        @endif

                        @if ($data_prajabatan->nama_file_karpeg != null)
                            <a href="{{url('preview_file_pegawai/'.$model->nip.'/'.$data_prajabatan->nama_file_karpeg)}}" title="Preview File {{$data_prajabatan->nama_file_karpeg}}" class="btn-show-preview btn btn-inverse btn-sm btn-block"><i class="fas fa-lg fa-fw m-r-10 fa-file-pdf"></i><strong>KARPEG</strong></a>
                        @else
                            <a class="btn btn-default disabled btn-sm btn-block"><i class="fas fa-lg fa-fw m-r-10 fa-file-pdf"></i><strong>FILE KARPEG BELUM DI UPLOAD</strong></a>
                        @endif


                        @if ($sk_pangkat_golongan_terakhir != null)
                            @if ($sk_pangkat_golongan_terakhir->nama_file_sk_kenaikan_pangkat != null)
                                <a href="{{url('preview_file_pegawai/'.$model->nip.'/'.$sk_pangkat_golongan_terakhir->nama_file_sk_kenaikan_pangkat)}}" title="Preview File {{$data_prajabatan->nama_file_karpeg}}" class="btn-show-preview btn btn-inverse btn-sm btn-block"><i class="fas fa-lg fa-fw m-r-10 fa-file-pdf"></i><strong>SK PANGKAT TERAKHIR</strong></a>
                            @else
                                <a class="btn btn-default disabled btn-sm btn-block"><i class="fas fa-lg fa-fw m-r-10 fa-file-pdf"></i><strong>SK PANGKAT BELUM DI UPLOAD</strong></a>
                            @endif
                        @else
                            <a class="btn btn-default disabled btn-sm btn-block"><i class="fas fa-lg fa-fw m-r-10 fa-file-pdf"></i><strong>SK PANGKAT BELUM DI UPLOAD</strong></a>
                        @endif

                        @if ($sk_jabatan_terakhir != null)
                            @if ($sk_jabatan_terakhir->nama_file_sk_jabatan != null)
                                <a href="{{url('preview_file_pegawai/'.$model->nip.'/'.$sk_jabatan_terakhir->nama_file_sk_jabatan)}}" title="Preview File {{$sk_jabatan_terakhir->nama_file_sk_jabatan}}" class="btn-show-preview btn btn-inverse btn-sm btn-block"><i class="fas fa-lg fa-fw m-r-10 fa-file-pdf"></i><strong>SK JABATAN TERAKHIR</strong></a>
                            @else
                                <a class="btn btn-default disabled btn-sm btn-block"><i class="fas fa-lg fa-fw m-r-10 fa-file-pdf"></i><strong>SK JABATAN BELUM DI UPLOAD</strong></a>
                            @endif
                        @else
                            <a class="btn btn-default disabled btn-sm btn-block"><i class="fas fa-lg fa-fw m-r-10 fa-file-pdf"></i><strong>SK JABATAN BELUM DI UPLOAD</strong></a>
                        @endif



                @endif




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


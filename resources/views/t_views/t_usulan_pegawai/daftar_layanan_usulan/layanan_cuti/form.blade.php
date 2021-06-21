{!! Form::model($model,  [
    'route'=>$model->exists ? ['update_data.usulan_cuti', $model->id_usulan_pegawai] : 'usulan_cuti.store',
    'method'=> $model->exists ? 'POST' : 'POST',
    'enctype' => 'multipart/form-data'
]) !!}

<div class="row">
    <div class="col-md-10 offset-md-2">

            <div class="form-group row m-b-10">
                <label class="col-md-3 text-md-right col-form-label">Nomor Usulan</label>
                <div class="col-md-6">
                    {!! Form::text('id_m_skpd',auth()->user()->id_m_skpd, ['class' => 'form-control', 'id'=>'id_m_skpd', 'hidden'=>true]) !!}

                    {!! Form::text('id_usulan',$model->exists == '' ? $model2->id_usulan : null, ['class' => 'form-control', 'id'=>'id_usulan','hidden'=>true]) !!}

                    {!! Form::text('nomor_usulan',$model->exists == '' ? $model2->nomor_usulan : null, ['class' => 'form-control', 'id'=>'nomor_usulan', 'readonly'=>true]) !!}

                </div>
            </div>


            <div class="form-group row m-b-10">
                <label class="col-md-3 text-md-right col-form-label">Nama Pegawai</label>
                <div class="col-md-6">

                        <select id="nip" name="nip" class="default-select2 form-control">
                                <option label="---pilih---">
                            @foreach($pegawai as $data_pegawai)
                                <option value="{{$data_pegawai->nip}}" {{$model->nip == $data_pegawai->nip  ? 'selected' : ''}}>{{$data_pegawai->nip}} - {{$data_pegawai->gelar_depan}} {{$data_pegawai->nama_pegawai}}, {{$data_pegawai->gelar_belakang}}</option>
                            @endforeach

                        </select>

                </div>
            </div>

            <div class="form-group row m-b-10">
                <label class="col-md-3 text-md-right col-form-label">Golongan/Pangkat Terakhir</label>
                <div class="col-md-2">
                    {!! Form::text('nama_golongan',null, ['class' => 'form-control', 'id'=>'nama_golongan','readonly']) !!}
                </div>
                <div class="col-md-4">
                    {!! Form::text('nama_pangkat',null, ['class' => 'form-control', 'id'=>'nama_pangkat','readonly']) !!}
                </div>
            </div>


            <div class="form-group row m-b-10">
                <label class="col-md-3 text-md-right col-form-label">Jenis Usulan Cuti</label>
                <div class="col-md-6">

                    <select id="lainnya" name="lainnya" class="default-select2 form-control">
                        <option label="---pilih---">
                        @foreach($jenis_cuti as $data)
                            <option value="{{$data->nama_m_jenis_cuti}}" {{$model->lainnya == $data->nama_m_jenis_cuti  ? 'selected' : ''}}>{{$data->nama_m_jenis_cuti}} </option>
                        @endforeach

                    </select>

                </div>
            </div>


            <div class="form-group row m-b-10">
                <div class="col-md-6">
                    {!! Form::text('status_berkas','Usulan', ['class' => 'form-control', 'id'=>'status_berkas', 'hidden'=>true]) !!}
                    {!! Form::text('status_proses','Belum Diproses', ['class' => 'form-control', 'id'=>'status_proses', 'hidden'=>true]) !!}

                </div>
            </div>

            <div class="form-group row m-b-10">
                <div class="col-md-6">
                    {!! Form::text('keterangan',null, ['class' => 'form-control', 'id'=>'keterangan', 'hidden'=>true]) !!}
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
        $('select[name="nip"]').on('change', function() {
            var stateID = $(this).val();
            console.log(stateID);
            if(stateID) {
                $.ajax({
                    url: '/nama_pangkat_golongan_terakhir/ajax/'+stateID,
                    type: "GET",
                    dataType: "json",
                    success:function(data) {
                        $('[name="nama_pangkat"]').empty();
                        $('[name="nama_golongan"]').empty();

                        $.each(data, function(key, value) {
                            $('[name="nama_pangkat"]').val(value.nama_pangkat);
                            $('[name="nama_golongan"]').val(value.nama_golongan);

                        });
                    }
                });
            }else{
                $('select[name="nip"]').empty();
            }
        });
    });

</script>


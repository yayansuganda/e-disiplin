{!! Form::model($model,  [
    'route'=>'usulan_layanan_kenaikan_pangkat.store',
    'method'=>'POST',
    'files' => true
]) !!}


<div class="row">
    <div class="col-md-10 offset-md-2">

            <div class="form-group row m-b-10">
                    <label class="col-md-3 text-md-right col-form-label">Nomor Usulan</label>
                    <div class="col-md-6">
                        {!! Form::text('id_m_skpd',auth()->user()->id_m_skpd, ['class' => 'form-control', 'id'=>'id_m_skpd', 'hidden'=>true]) !!}

                        {!! Form::text('id_usulan',null, ['class' => 'form-control', 'id'=>'id_usulan', 'hidden'=>true]) !!}

                        {!! Form::text('nomor_usulan',null, ['class' => 'form-control', 'id'=>'nomor_usulan', 'readonly']) !!}
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
                    {!! Form::text('nama_golongan_terakhir',null, ['class' => 'form-control', 'id'=>'nama_golongan_terakhir','readonly']) !!}
                </div>
                <div class="col-md-4">
                    {!! Form::text('nama_pangkat_terakhir',null, ['class' => 'form-control', 'id'=>'nama_pangkat_terakhir','readonly']) !!}
                </div>
            </div>

            <div class="form-group row m-b-10">
                <label class="col-md-3 text-md-right col-form-label">Layanan Kenaikan Pangkat</label>
                <div class="col-md-6">
                    {!!  Form::select('id_m_layanan_kenaikan_pangkat',$layanan_kp,null,['placeholder'=>'Pilih','class' => 'form-control default-select2','id'=>'id_m_layanan_kenaikan_pangkat']) !!}
                </div>
            </div>

            <div class="form-group row m-b-10">
                <label class="col-md-3 text-md-right col-form-label">Pangkat/Golongan</label>
                <div class="col-md-6">
                    {!!  Form::select('id_m_pangkat_golongan',$pangkat_golongan,null,['placeholder'=>'Pilih','class' => 'form-control default-select2','id'=>'id_m_pangkat_golongan']) !!}
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
                        $('[name="nama_pangkat_terakhir"]').empty();
                        $('[name="nama_golongan_terakhir"]').empty();

                        $.each(data, function(key, value) {
                            $('[name="nama_pangkat_terakhir"]').val(value.nama_pangkat);
                            $('[name="nama_golongan_terakhir"]').val(value.nama_golongan);

                        });
                    }
                });
            }else{
                $('select[name="nip"]').empty();
            }
        });
    });

</script>


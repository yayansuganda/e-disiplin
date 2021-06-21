{!! Form::model($model,  [
    'route'=>$model->exists ? ['update_data.m_pelanggaran_hd', $model->id_m_jenis_pelanggaran_hd] : 'pelanggaran_hd.store',
    'method'=> $model->exists ? 'POST' : 'POST'
]) !!}


<div class="row">
    <div class="col-md-10 offset-md-2">



            <div class="form-group row m-b-10">
                <label class="col-md-3 text-md-right col-form-label">Nama Pelanggaran HD</label>
                <div class="col-md-6">
                    <select id="kategori_pelanggaran_hd" name="kategori_pelanggaran_hd" class="default-select2 form-control">
                        <option label="---pilih---">
                        <option value="Kewajiban" {{$model->kategori_pelanggaran_hd == 'Kewajiban'  ? 'selected' : ''}}>Kewajiban</option>
                        <option value="Larangan" {{$model->kategori_pelanggaran_hd == 'Larangan'  ? 'selected' : ''}}>Larangan</option>
                </select>
                </div>
            </div>

            <div class="form-group row m-b-10">
                <label class="col-md-3 text-md-right col-form-label">Nama Pelanggaran HD</label>
                <div class="col-md-6">
                    {!! Form::textarea('nama_m_jenis_pelanggaran_hd',null, ['class' => 'form-control', 'id'=>'nama_m_jenis_pelanggaran_hd','rows'=>3]) !!}
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

</script>


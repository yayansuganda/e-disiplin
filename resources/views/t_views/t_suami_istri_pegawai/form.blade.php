{!! Form::model($model,  [
    'route'=>$model->exists ? ['update_data.suami_istri', $model->id_suami_istri] : 'suami_istri.store',
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
                <label class="col-md-3 text-md-right col-form-label">Nama Suami/Istri</label>
                <div class="col-md-6">
                    {!! Form::text('nama_suami_istri',null, ['class' => 'form-control', 'id'=>'nama_suami_istri']) !!}
                </div>
            </div>

            <div class="form-group row m-b-10">
                <label class="col-md-3 text-md-right col-form-label">Status PNS</label>
                <div class="col-md-9">
                    <div class="form-check form-check-inline">
                        {!! Form::radio('status_pns', 'Tidak', true ) !!}
                        <label class="form-check-label" for="defaultInlineRadio1">Tidak</label>
                    </div>
                    <div class="form-check form-check-inline">
                            {!! Form::radio('status_pns', 'Ya', false ) !!}
                        <label class="form-check-label" for="defaultInlineRadio2">PNS</label>
                    </div>
                </div>
            </div>

            <div class="form-group row m-b-10">
                <label class="col-md-3 text-md-right col-form-label">Tanggal Menikah</label>
                <div class="col-6">
                    <div class="input-group date datepicker-default"   data-date-format="dd-mm-yyyy" >
                        {!! Form::text('tanggal_menikah',null, ['class' => 'form-control', 'placeholder'=>'Tanggal Menikah', 'id'=>'tanggal_menikah']) !!}
                        <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                    </div>
                </div>
            </div>

            <div class="form-group row m-b-10">
                <label class="col-md-3 text-md-right col-form-label">Nomor Kartu Suami/Istri</label>
                <div class="col-md-6">
                    {!! Form::text('nomor_kartu_su_is',null, ['class' => 'form-control', 'id'=>'nomor_kartu_su_is']) !!}
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

</script>

